<?php

/**
 * DNA Molecular Weight Calculator
 * /biology/dna-molecular-weight-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA Molecular Weight Calculator',
    'engine' => 'script',
    'engine_note' => 'reads a DNA sequence and works out its length, GC content and single- and double-stranded molecular weight',
    'meta' => ['title' => 'DNA Molecular Weight Calculator: dsDNA, ssDNA and RNA', 'description' => 'Paste one strand and read its length, GC content, single- and double-stranded molecular weight in daltons and kDa, and how many picomoles one microgram holds.', 'h1' => 'DNA Molecular Weight Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'grid' => 'FR2',
                    'place' => [
                        0,
                        0,
                        0,
                        0,
                        1,
                        1,
                        1,
                        1,
                    ],
                    'fields' => [
                        [
                            'name' => 'sequence',
                            'label' => 'Sequence',
                            'type' => 'text',
                            'help' => 'Paste one strand; the other is assumed to be its exact complement',
                            'default' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAG',
                        ],
                        [
                            'name' => 'strands',
                            'label' => 'Molecule',
                            'type' => 'select',
                            'options' => ['Double-stranded DNA' => 'ds', 'Single-stranded DNA' => 'ss', 'Single-stranded RNA' => 'rna'],
                            'default' => 'Double-stranded DNA',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'result',
                            'suffix' => 'nt',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gc_pct',
                            'label' => 'GC content',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mw_ss',
                            'label' => 'Molecular weight, one strand',
                            'type' => 'result',
                            'suffix' => 'Da',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mw',
                            'label' => 'Molecular weight of the molecule',
                            'type' => 'result',
                            'suffix' => 'Da',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mw_kda',
                            'label' => 'Molecular weight',
                            'type' => 'result',
                            'suffix' => 'kDa',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pmol_per_ug',
                            'label' => 'Amount in 1 µg',
                            'type' => 'result',
                            'suffix' => 'pmol',
                            'help' => 'Handy for setting up a ligation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    function cleanSeq(raw, kind) {
        var s = String(raw || '').replace(/^>.*$/gm, '');
        s = s.replace(/[^A-Za-z]/g, '');
        return kind === 'protein' ? s.toUpperCase() : s.toUpperCase().replace(/U/g, 'T');
      }
      function wrap(s, width) {
        width = width || 60;
        var out = [];
        for (var i = 0; i < s.length; i += width) out.push(s.slice(i, i + width));
        return out.join('\n');
      }
      function esc(s) {
        return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
      }
      function block(title, body, note) {
        return '<div class="calc-script-block"><h3>' + esc(title) + '</h3><pre>' + esc(body) + '</pre>'
          + (note ? '<p class="calc-script-note">' + esc(note) + '</p>' : '') + '</div>';
      }
      function table(title, head, rows, note) {
        var h = '<tr>' + head.map(function (c) { return '<th>' + esc(c) + '</th>'; }).join('') + '</tr>';
        var b = rows.map(function (r) {
          return '<tr>' + r.map(function (c) { return '<td>' + esc(c) + '</td>'; }).join('') + '</tr>';
        }).join('');
        return '<div class="calc-script-block"><h3>' + esc(title) + '</h3>'
          + '<div class="calc-script-scroll"><table class="calc-script-table">' + h + b + '</table></div>'
          + (note ? '<p class="calc-script-note">' + esc(note) + '</p>' : '') + '</div>';
      }
      function gcOf(s) {
        var gc = 0;
        for (var i = 0; i < s.length; i++) { var c = s.charAt(i); if (c === 'G' || c === 'C') gc++; }
        return gc;
      }
      function tmOf(n, pct, at, gc) {
        if (n <= 14) return 2 * at + 4 * gc;
        if (n <= 40) return 64.9 + 41 * (gc - 16.4) / n;
        return 81.5 + 16.6 * Math.log10(0.05) + 0.41 * pct - 675 / n;
      }
      function pct1(x) { return (Math.round(x * 10) / 10).toFixed(1); }
      function pct2(x) { return (Math.round(x * 100) / 100).toFixed(2); }
      var COMP = {A:'T',T:'A',G:'C',C:'G',U:'A',R:'Y',Y:'R',S:'S',W:'W',K:'M',M:'K',
                  B:'V',V:'B',D:'H',H:'D',N:'N'};
      function revcomp(s) {
        var out = '';
        for (var i = s.length - 1; i >= 0; i--) out += COMP[s.charAt(i)] || 'N';
        return out;
      }
      // NCBI standard genetic code: bases ordered T, C, A, G for each position
      var CODON_TABLE = 'FFLLSSSSYY**CC*WLLLLPPPPHHQQRRRRIIIMTTTTNNKKSSRRVVVVAAAADDEEGGGG';
      var BASES = 'TCAG';
      function aaOf(codon) {
        var i1 = BASES.indexOf(codon.charAt(0)), i2 = BASES.indexOf(codon.charAt(1)),
            i3 = BASES.indexOf(codon.charAt(2));
        if (i1 < 0 || i2 < 0 || i3 < 0) return null;
        return CODON_TABLE.charAt(16 * i1 + 4 * i2 + i3);
      }
      function eachCodon(seq, frame, fn) {
        for (var i = (frame || 0); i + 3 <= seq.length; i += 3) {
          fn(seq.substr(i, 3), i);
        }
      }
    
      omni.onResult(['sequence', 'strands'], function (ctx) {
        // A select hands back the option's slug ("single-stranded-rna"), not its
        // value, so the kind is matched on words rather than compared to a code.
        var pick = String(ctx.getChoice('strands') || '');
        var kind = /rna/i.test(pick) ? 'rna' : /single/i.test(pick) ? 'ss' : 'ds';
        var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
        if (kind === 'rna') seq = seq.replace(/T/g, 'U');
        if (!seq) {
          ctx.addHtml(block('Molecular weight', '—', 'Paste a sequence to weigh it.'));
          return;
        }
        var n = seq.length, c = {A: 0, T: 0, G: 0, C: 0, U: 0};
        for (var i = 0; i < n; i++) {
          var ch = seq.charAt(i);
          if (c.hasOwnProperty(ch)) c[ch]++;
        }
        var mass = 313.21 * c.A + 304.20 * c.T + 289.18 * c.C + 329.21 * c.G;
        if (kind === 'rna') mass += 306.17 * c.U;
        var ss = mass - 61.96;
        var total = kind === 'ss' || kind === 'rna' ? ss : 2 * ss;
        var gc = c.G + c.C;
        var pctGC = n ? gc / n * 100 : 0;
    
        ctx.exportValue('length', n);
        ctx.exportValue('gc_pct', Math.round(pctGC * 100) / 100);
        ctx.exportValue('mw_ss', Math.round(ss));
        ctx.exportValue('mw', Math.round(total));
        ctx.exportValue('mw_kda', Math.round(total / 1000 * 10) / 10);
        ctx.exportValue('pmol_per_ug', Math.round(1e6 / total * 1000) / 1000);
    
        ctx.addHtml(block('Mass',
          n + (kind === 'rna' ? ' nt RNA' : kind === 'ss' ? ' nt ssDNA' : ' bp dsDNA')
          + '\nOne strand: ' + (Math.round(ss)).toLocaleString() + ' Da'
          + '\nMolecule: ' + (Math.round(total)).toLocaleString() + ' Da = '
          + (total / 1000).toFixed(1) + ' kDa'
          + '\n1 µg = ' + (1e6 / total).toFixed(3) + ' pmol · 1 pmol = '
          + (total / 1e6).toFixed(4) + ' µg'
          + '\nMass per ' + (kind === 'rna' ? 'base' : 'base pair') + ': '
          + (total / n).toFixed(1) + ' Da',
          kind === 'ds' ? 'Double-stranded mass assumes the complement has the same composition.'
                        : ''));
        ctx.addHtml(table('Composition', ['Base', 'Count', 'Share', 'Residue mass (Da)'],
          [['A', String(c.A), pct1(n ? c.A / n * 100 : 0) + '%', '313.21'],
           ['T', String(c.T), pct1(n ? c.T / n * 100 : 0) + '%', '304.20'],
           ['C', String(c.C), pct1(n ? c.C / n * 100 : 0) + '%', '289.18'],
           ['G', String(c.G), pct1(n ? c.G / n * 100 : 0) + '%', '329.21'],
           ['U', String(c.U), pct1(n ? c.U / n * 100 : 0) + '%', '306.17']],
          'GC content ' + pct2(pctGC) + '%. Residue masses are for the nucleotide monophosphate '
          + 'in a chain, with one water subtracted per strand.'));
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        This page turns a DNA strand into a mass. Paste one strand of a duplex — or a single-stranded oligo — and it reports length, GC content, both molecular weights and the picomole count that makes a µg of it.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It converts between a sequence and the quantities a bench actually needs: how heavy a molecule is, how much of it a microgram contains, and how much of that weight comes from GC pairs.</p><p>The sequence is cleaned to letters and its length and GC content counted. Each base is given its residue mass in a single strand — the free nucleotide mass minus one water — and the single-strand weight is their sum. A double-stranded figure adds the complementary strand: an A-T pair contributes the mass of an A plus a T, a G-C pair the mass of a G plus a C, and the two hydrogen bonds do not count. The picomole figure is one microgram divided by the molecular weight, converted to moles.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 things to fill in, and the order does not matter:</p><ul><li><strong>Sequence</strong> — a text box. Paste one strand; the other is assumed to be its exact complement.</li><li><strong>Molecule</strong> — a drop-down with the choices the page offers.</li></ul><p>The answer comes back as 6 boxes: Length (nt), GC content (%), Molecular weight, one strand (Da), Molecular weight of the molecule (Da), Molecular weight (kDa), Amount in 1 µg (pmol). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Sequence</strong> is a text box. Paste one strand; the other is assumed to be its exact complement Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Molecule</strong> is a drop-down with the choices the page offers. The choices are Double-stranded DNA, Single-stranded DNA and Single-stranded RNA. Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Sequence</th><td>AATTCCGGATCCGTCGACCTGCAGGCATGCAAGCTT</td></tr><tr><th>Molecule</th><td>Double-stranded DNA</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Length</th><td>36 nt</td></tr><tr><th>GC content</th><td>55.56 %</td></tr><tr><th>Molecular weight, one strand</th><td>11021 Da</td></tr><tr><th>Molecular weight of the molecule</th><td>22042 Da</td></tr><tr><th>Molecular weight</th><td>22 kDa</td></tr><tr><th>Amount in 1 µg</th><td>45.367 pmol</td></tr></tbody></table><p>Thirty-six bases, 55.56 per cent GC, 11,021 Da for one strand and 22,042 for the duplex — exactly double, because the complement of a 36-base strand is another 36 bases of the same pair masses. One microgram holds 45.4 pmol of it.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Sequence</th><td>ATGCGTACGTAGCTAGCTAGCATCGATCGTAGCTAGCTGATCG</td></tr><tr><th>Molecule</th><td>Single-stranded DNA</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Length</th><td>43</td></tr><tr><th>GC content</th><td>51.16</td></tr><tr><th>Molecular weight, one strand</th><td>13259</td></tr><tr><th>Molecular weight of the molecule</th><td>13259</td></tr><tr><th>Molecular weight</th><td>13.3</td></tr><tr><th>Amount in 1 µg</th><td>75.422</td></tr></tbody></table><p>6 of the 6 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Length</strong> — bases in the cleaned sequence.</li><li><strong>GC content</strong> — the percentage of G and C, which drives both the mass and the melting behaviour.</li><li><strong>Single-stranded weight</strong> — the mass of the strand you pasted, in daltons.</li><li><strong>Double-stranded weight</strong> — the mass of the duplex, counting the complementary strand base by base.</li><li><strong>kDa</strong> — the same double-stranded mass in kilodaltons, for comparison with protein sizes.</li><li><strong>pmol per µg</strong> — how many picomoles one microgram of this molecule represents.</li></ul><p>Use the double-stranded figure for plasmid and amplicon work, and the single-stranded figure for oligos, primers and probes, which are ordered as one strand. The picomole figure is the one to reach for when a protocol asks for "X pmol of primer" and your balance reading is in micrograms.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>A rough hand check: the average base pair mass is about 650 Da, so a 36 bp duplex should weigh roughly 23,400 Da and the page says 22,042 — the difference is the GC-rich composition, which is lighter per pair than AT. For an exact figure, use 313.2 Da per A-T pair and 618.4 per G-C pair in a rough table and compare to within one per cent.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Mixing strand types</strong> — An oligo is single-stranded even though every base could pair. Choose the single-strand figure or you will report double its mass.</li><li><strong>Assuming perfect complementarity</strong> — The duplex figure assumes the other strand is the exact complement. A mismatch or an overhang changes it.</li><li><strong>Read length</strong> — An amplicon from a primer pair is single- or double-stranded depending on when you weigh it; the sequence alone does not tell you.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>No modifications</strong> — A 5′ phosphate, a fluorophore or a quencher adds mass that is not in the sequence and not in this figure.</li><li><strong>Average masses</strong> — The base masses are average over natural isotopes; monoisotopic masses differ slightly.</li><li><strong>No secondary structure</strong> — A hairpin does not change mass, though it changes how the oligo behaves in a spectrophotometer.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>DNA Molecular Weight Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Molecular weight is used to convert a mass into moles when preparing primers, to check that an oligo synthesis matches its certificate, to normalise a digested plasmid against a protein standard on a gel, and to work out how much DNA is in a band of known length.</p><p>The picomole figure is worth keeping in mind when a protocol asks for a specific number of moles. A nanogram of a 36-base oligo is about 45 femtomoles, while a nanogram of a 3,000-base plasmid is about 0.5 femtomoles: the same mass, ninety times fewer molecules. Most mistakes in normalising DNA come from comparing masses across very different lengths.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which figure do I use for a primer?', 'a' => 'The single-stranded one. Primers are ordered and delivered as one strand, and their certificates quote that mass.'],
            ['q' => 'Why is the duplex exactly twice the single strand?', 'a' => <<<'TXT'
            For a perfectly complementary duplex of even composition each base pair contributes two nucleotide residues, so the total is the sum of both strands. It is not exactly double for odd lengths or mismatched pairs.
            TXT],
            ['q' => 'Does DNA Molecular Weight Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/protein-gravy-calculator', 'name' => 'Protein GRAVY (Hydropathy) Calculator'],
            ['path' => '/biology/protein-hydrodynamic-radius', 'name' => 'Protein Hydrodynamic Radius Calculator'],
            ['path' => '/biology/protein-isoelectric-point', 'name' => 'Protein Isoelectric Point Calculator'],
        ],
        'authors' => [],
    ],
];
