<?php

/**
 * Amino Acid Composition Calculator
 * /biology/amino-acid-composition
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Amino Acid Composition Calculator',
    'engine' => 'script',
    'engine_note' => 'reads a protein sequence and works out its length, molecular weight, GRAVY, aromatic fraction, charge balance and cysteine count',
    'meta' => ['title' => 'Amino Acid Composition Calculator: MW, GRAVY and Charge', 'description' => 'Paste a protein sequence and read its length, molecular weight, GRAVY, aromatic fraction, charge balance and cysteine count, worked out in the browser.', 'h1' => 'Amino Acid Composition Calculator', 'updated' => '2026-10-29'],
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
                    ],
                    'fields' => [
                        [
                            'name' => 'protein',
                            'label' => 'Protein sequence',
                            'type' => 'text',
                            'help' => 'Single-letter code; headers, spaces and digits are ignored',
                            'default' => 'MKTAYIAKQRQISFVKSHFSRQLEERLGLIEVQAPILSRVGDGTQDNLSGAEKAVQVKVKAL',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'result',
                            'suffix' => 'aa',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mw_kda',
                            'label' => 'Molecular weight',
                            'type' => 'result',
                            'suffix' => 'kDa',
                            'help' => 'Average residue masses, no modifications',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gravy',
                            'label' => 'GRAVY',
                            'type' => 'result',
                            'help' => 'Positive means hydrophobic',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'aromatic',
                            'label' => 'Aromatic residues (F + W + Y)',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'charge_balance',
                            'label' => 'Acidic minus basic residues',
                            'type' => 'result',
                            'help' => 'Positive means acidic overall',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cysteine',
                            'label' => 'Cysteines',
                            'type' => 'result',
                            'help' => 'Pairs set the maximum number of disulfides',
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
    
      var AA_MASS = {A: 89.09, R: 174.20, N: 132.12, D: 133.10, C: 121.16, E: 147.13, Q: 146.15,
                     G: 75.07, H: 155.16, I: 131.17, L: 131.17, K: 146.19, M: 149.21, F: 165.19,
                     P: 115.13, S: 105.09, T: 119.12, W: 204.23, Y: 181.19, V: 117.15};
      var AA_HYDRO = {A: 1.8, R: -4.5, N: -3.5, D: -3.5, C: 2.5, E: -3.5, Q: -3.5, G: -0.4,
                      H: -3.2, I: 4.5, L: 3.8, K: -3.9, M: 1.9, F: 2.8, P: -1.6, S: -0.8,
                      T: -0.7, W: -0.9, Y: -1.3, V: 4.2};
      var AA_NAME = {A: 'Ala', R: 'Arg', N: 'Asn', D: 'Asp', C: 'Cys', E: 'Glu', Q: 'Gln',
                     G: 'Gly', H: 'His', I: 'Ile', L: 'Leu', K: 'Lys', M: 'Met', F: 'Phe',
                     P: 'Pro', S: 'Ser', T: 'Thr', W: 'Trp', Y: 'Tyr', V: 'Val'};
      omni.onResult(['protein'], function (ctx) {
        var p = String(ctx.getRawInput('protein') || '').replace(/^>.*$/gm, '')
          .replace(/[^A-Za-z*]/g, '').toUpperCase().replace(/\*/g, '');
        if (!p) {
          ctx.addHtml(block('Amino acid composition', '—', 'Paste a protein sequence.'));
          return;
        }
        var counts = {}, known = 0, mass = 0, hydro = 0, unknown = 0;
        for (var i = 0; i < p.length; i++) {
          var aa = p.charAt(i);
          if (!AA_MASS[aa]) { unknown++; continue; }
          counts[aa] = (counts[aa] || 0) + 1;
          known++;
          mass += AA_MASS[aa];
          hydro += AA_HYDRO[aa];
        }
        if (!known) {
          ctx.addHtml(block('Amino acid composition', '—',
            'No amino acid codes found. Use the single-letter alphabet: ACDEFGHIKLMNPQRSTVWY.'));
          return;
        }
        mass = mass - (known - 1) * 18.015 + 18.015;
        var gravy = hydro / known;
        var aromatic = ((counts.F || 0) + (counts.W || 0) + (counts.Y || 0)) / known * 100;
        var acidic = (counts.D || 0) + (counts.E || 0);
        var basic = (counts.K || 0) + (counts.R || 0) + (counts.H || 0);
    
        ctx.exportValue('length', known);
        ctx.exportValue('mw_kda', Math.round(mass / 1000 * 100) / 100);
        ctx.exportValue('gravy', Math.round(gravy * 1000) / 1000);
        ctx.exportValue('aromatic', Math.round(aromatic * 100) / 100);
        ctx.exportValue('charge_balance', acidic - basic);
        ctx.exportValue('cysteine', counts.C || 0);
    
        var order = 'ACDEFGHIKLMNPQRSTVWY'.split('');
        var rows = order.filter(function (a) { return counts[a]; }).map(function (a) {
          return [a, AA_NAME[a], String(counts[a]),
                  pct1(counts[a] / known * 100) + '%',
                  (counts[a] * AA_MASS[a]).toFixed(0),
                  ((counts[a] * AA_MASS[a]) / mass * 100).toFixed(1) + '%'];
        });
        ctx.addHtml(block('Summary',
          known + ' residues · ' + (mass / 1000).toFixed(2) + ' kDa\nGRAVY '
          + gravy.toFixed(3) + ' · aromatic ' + pct1(aromatic) + '% · acidic ' + acidic
          + ' / basic ' + basic
          + (unknown ? '\nIgnored ' + unknown + ' character' + (unknown === 1 ? '' : 's')
             + ' that are not amino acid codes' : ''),
          gravy > 0.2 ? 'Net hydrophobic: consider a membrane or buried domain.'
            : gravy < -0.5 ? 'Strongly hydrophilic: likely soluble and surface-exposed.'
            : 'Balanced hydropathy, typical of a soluble globular protein.'));
        ctx.addHtml(table('Composition', ['Code', 'Residue', 'Count', 'Share', 'Mass (Da)', 'Share of mass'],
          rows, 'Masses are average residue masses; the total subtracts one water per peptide bond.'));
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Amino acid composition reads one protein sequence and describes it in six numbers: how long it is, how heavy, how hydrophobic, how aromatic, how charged and how many cysteines it carries. Nothing is uploaded — the sequence is read letter by letter in the tab you are looking at.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>The page takes a protein in single-letter code and turns it into the handful of figures people actually ask for: length, average molecular weight, GRAVY, the share of aromatic residues, the acidic-minus-basic balance and the cysteine count.</p><p>It cleans the paste first, keeping only letters, so a FASTA header line, a row of digits from a sequence viewer or a stray space cannot change the answer. It then walks the cleaned string once, counting each residue against a table of average residue masses and against the Kyte-Doolittle hydropathy scale. The molecular weight is the sum of the free amino-acid masses minus one water molecule for every peptide bond; GRAVY is the sum of the hydropathy values divided by the number of residues; the aromatic figure is the count of phenylalanine, tryptophan and tyrosine as a percentage of the chain.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 things to fill in, and the order does not matter:</p><ul><li><strong>Protein sequence</strong> — a text box. Single-letter code; headers, spaces and digits are ignored.</li></ul><p>The answer comes back as 6 boxes: Length (aa), Molecular weight (kDa), GRAVY, Aromatic residues (F + W + Y) (%), Acidic minus basic residues, Cysteines. They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Protein sequence</strong> is a text box. Single-letter code; headers, spaces and digits are ignored Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Protein sequence</th><td>MKTAYIAKQRQISFVKSHFSRQDILDLWQ</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Length</th><td>29 aa</td></tr><tr><th>Molecular weight</th><td>3.56 kDa</td></tr><tr><th>GRAVY</th><td>-0.476</td></tr><tr><th>Aromatic residues (F + W + Y)</th><td>13.79 %</td></tr><tr><th>Acidic minus basic residues</th><td>-4</td></tr><tr><th>Cysteines</th><td>0</td></tr></tbody></table><p>Twenty-nine residues, 3.56 kDa, a GRAVY of −0.476 and no cysteine: the sequence is small, slightly hydrophilic and carries no disulfide bond. The charge balance of −4 says the acidic residues outnumber the basic ones by four, which is the first thing to check against a calculated pI.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Protein sequence</th><td>MKWVTFISLLFLFSSAYSRGVFRRDTHKSEIAHRFKDLGEEHFK</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Length</th><td>44</td></tr><tr><th>Molecular weight</th><td>5.34</td></tr><tr><th>GRAVY</th><td>-0.323</td></tr><tr><th>Aromatic residues (F + W + Y)</th><td>18.18</td></tr><tr><th>Acidic minus basic residues</th><td>-6</td></tr><tr><th>Cysteines</th><td>0</td></tr></tbody></table><p>5 of the 6 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Length</strong> — the number of residues after headers, spaces and digits are removed.</li><li><strong>Molecular weight</strong> — the sum of average residue masses in kilodaltons, with one water lost per peptide bond. No modifications, no isotopes, no signal peptide removal.</li><li><strong>GRAVY</strong> — the grand average of hydropathy: positive is hydrophobic, negative is hydrophilic, and the scale runs roughly from −4.5 to +4.5.</li><li><strong>Aromatic residues</strong> — phenylalanine, tryptophan and tyrosine as a percentage of the chain — the residues that absorb at 280 nm.</li><li><strong>Acidic minus basic</strong> — aspartate and glutamate counted against lysine, arginine and histidine. Positive means the chain is net acidic at neutral pH.</li><li><strong>Cysteines</strong> — how many cysteine residues there are. Two are needed for one disulfide bond, and only if they are close enough to pair.</li></ul><p>Read the six figures as a description of one molecule, not as six unrelated measurements. A negative GRAVY with a charge balance near zero describes a soluble, globular protein; a positive GRAVY with a high aromatic percentage describes something that prefers a membrane or a hydrophobic core. The cysteine count is the ceiling on disulfide bonds, never the number of bonds itself.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>A molecular weight is checkable by hand. Count the residues, multiply by an average residue mass of about 110 Da, and compare: 29 residues gives roughly 3.2 kDa, and the page says 3.56 because the sequence is rich in the heavier residues. For an exact figure, add the free amino-acid masses from a table and subtract 18.015 Da for every peptide bond. GRAVY is easier still: add the Kyte-Doolittle values for each residue and divide by the length.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>DNA pasted by mistake</strong> — A nucleotide string is made of A, C, G and T, and all four are real amino-acid letters. The page will happily read a 39-base oligo as a 39-residue peptide and report a weight for it.</li><li><strong>Ambiguous codes</strong> — X, B, Z and J are accepted as letters but carry no mass on a table of the twenty standard residues, so a sequence full of X will come out lighter than the protein it stands for.</li><li><strong>Modifications</strong> — A phosphorylated serine, a glycosylated asparagine or an N-terminal acetyl group changes the mass, and none of them is in the string.</li><li><strong>The length box</strong> — If you typed a length yourself, it is the sequence that decides the other five figures, not the number beside it.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Average, not monoisotopic</strong> — The mass is the average over natural isotope abundance, which is what a mass spectrometer reports for a large protein and what a gel image is consistent with. A monoisotopic mass can differ in the third decimal place for a short peptide.</li><li><strong>Counts, not bonds</strong> — The page counts cysteines; it cannot know which of them are bonded, so it will not tell you how many disulfides a folded protein has.</li><li><strong>Composition only</strong> — Nothing here describes secondary structure, stability or function. Two proteins with identical composition can fold into entirely different shapes.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Amino Acid Composition Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Composition figures come up whenever a protein is being handled rather than studied: checking that a synthetic peptide matches the mass the supplier quoted, estimating how much of a protein a gel band contains, deciding whether a construct will run at the position a ladder predicts, or finding out whether a sequence is unusual enough in its aromatic content to explain a strange absorbance reading.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why does the page ignore my FASTA header?', 'a' => <<<'TXT'
            The header is a description, not sequence. Keeping only letters drops the ">" line and its text, which is what you want: otherwise the letters of the description would be counted as residues.
            TXT],
            ['q' => 'Is the molecular weight the same as the one my mass spec reports?', 'a' => <<<'TXT'
            Close, but not identical. This is an average mass with no modifications; a mass spectrometer reports the masses of the actual ions, including every phosphorylation and every N-terminal methionine that was or was not removed.
            TXT],
            ['q' => 'What does a positive GRAVY mean?', 'a' => 'Hydrophobic overall. Values above roughly +0.5 usually mean a membrane-spanning or core-forming protein; values below −0.5 usually mean a soluble one.'],
            ['q' => 'Does Amino Acid Composition Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/osmolarity-osmotic-pressure', 'name' => 'Osmolarity / Osmotic Pressure Calculator'],
            ['path' => '/biology/pasture-stocking-rate', 'name' => 'Pasture Stocking Rate Calculator'],
            ['path' => '/biology/pcr-annealing-temperature', 'name' => 'PCR Annealing Temperature Calculator'],
        ],
        'authors' => [],
    ],
];
