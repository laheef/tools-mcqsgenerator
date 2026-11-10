<?php

/**
 * Reverse Translate Calculator
 * /biology/reverse-translate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Reverse Translate Calculator',
    'engine' => 'script',
    'engine_note' => 'turns a protein sequence into codons, choosing between the synonymous ones',
    'meta' => ['title' => 'Reverse Translate Protein to DNA with Codon Choice', 'description' => 'Turn a protein sequence back into DNA using host-preferred or GC-balanced codons, with an optional stop, and read the length, GC content and melting point.', 'h1' => 'Reverse Translate Calculator', 'updated' => '2026-10-29'],
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
                            'name' => 'protein',
                            'label' => 'Protein sequence',
                            'type' => 'text',
                            'help' => 'Single-letter code; spaces, digits and FASTA headers are ignored',
                            'default' => 'MKTAYIAKQRQISFVKSHFSRQLEERLGLIEVQAPILSRVGDGTQDNLSGAEKAVQV',
                        ],
                        [
                            'name' => 'strategy',
                            'label' => 'Codon choice',
                            'type' => 'select',
                            'options' => ['E. coli, most used codon' => 'ecoli', 'Human, most used codon' => 'human', 'GC-balanced (50%)' => 'gc', 'Avoid rare codons (GC-rich hosts)' => 'gchost'],
                            'default' => 'E. coli, most used codon',
                        ],
                        [
                            'name' => 'tail',
                            'label' => 'Add a stop codon',
                            'type' => 'select',
                            'options' => ['Yes' => 'yes', 'No' => 'no'],
                            'default' => 'Yes',
                        ],
                        [
                            'name' => 'length_aa',
                            'label' => 'Protein length',
                            'type' => 'result',
                            'suffix' => 'aa',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'length',
                            'label' => 'DNA length',
                            'type' => 'result',
                            'suffix' => 'nt',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gc_pct',
                            'label' => 'GC content of the DNA',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'codons',
                            'label' => 'Codons',
                            'type' => 'result',
                            'help' => 'Includes the stop codon when one is added',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tm',
                            'label' => 'Melting temperature of the duplex',
                            'type' => 'result',
                            'suffix' => '°C',
                            'help' => 'At 50 mM monovalent salt',
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
    
      // Codon preference lists, most used first, per host. Only the relative order
      // matters here; it reproduces the ordering of the Kazusa usage tables closely
      // enough for a design starting point.
      var ECOL = {
        A: ['GCG','GCA','GCT','GCC'], R: ['CGT','CGC','CGG','CGA','AGA','AGG'],
        N: ['AAC','AAT'], D: ['GAT','GAC'], C: ['TGC','TGT'], Q: ['CAG','CAA'],
        E: ['GAA','GAG'], G: ['GGC','GGT','GGG','GGA'], H: ['CAT','CAC'],
        I: ['ATT','ATC','ATA'], L: ['CTG','TTA','TTA','CTT','CTC','TTA','TTG','TTA'],
        K: ['AAA','AAG'], M: ['ATG'], F: ['TTT','TTC'], P: ['CCG','CCA','CCT','CCC'],
        S: ['AGC','TCT','TCC','TCG','AGT','TCA'], T: ['ACC','ACG','ACT','ACA'],
        W: ['TGG'], Y: ['TAT','TAC'], V: ['GTG','GTT','GTC','GTA'], '*': ['TAA','TGA','TAG']
      };
      var HUMAN = {
        A: ['GCC','GCT','GCA','GCG'], R: ['AGG','AGA','CGG','CGC','CGT','CGA'],
        N: ['AAC','AAT'], D: ['GAC','GAT'], C: ['TGC','TGT'], Q: ['CAG','CAA'],
        E: ['GAG','GAA'], G: ['GGC','GGG','GGA','GGT'], H: ['CAC','CAT'],
        I: ['ATC','ATT','ATA'], L: ['CTG','CTC','TTG','CTT','TTA','CTA'],
        K: ['AAG','AAA'], M: ['ATG'], F: ['TTC','TTT'], P: ['CCC','CCG','CCA','CCT'],
        S: ['AGC','TCC','TCT','TCG','AGT','TCA'], T: ['ACC','ACA','ACT','ACG'],
        W: ['TGG'], Y: ['TAC','TAT'], V: ['GTG','GTC','GTT','GTA'], '*': ['TGA','TAA','TAG']
      };
      function gcCount(c) { return (c === 'G' || c === 'C') ? 1 : 0; }
      function pickCodon(aa, strategy) {
        var table = strategy === 'human' ? HUMAN : ECOL;
        var list = table[aa];
        if (!list || !list.length) return null;
        if (strategy === 'ecoli' || strategy === 'human') return list[0];
        // GC-balanced or GC-rich host: choose by how close the codon sits to 50% GC
        var best = list[0], bestScore = 9;
        for (var i = 0; i < list.length; i++) {
          var g = gcCount(list[i].charAt(0)) + gcCount(list[i].charAt(1)) + gcCount(list[i].charAt(2));
          var score = Math.abs(g - (strategy === 'gc' ? 1.5 : 2.4));
          if (score < bestScore) { bestScore = score; best = list[i]; }
        }
        return best;
      }
      omni.onResult(['protein', 'strategy', 'tail'], function (ctx) {
        var raw = String(ctx.getRawInput('protein') || '').replace(/^>.*$/gm, '')
          .replace(/[^A-Za-z]/g, '').toUpperCase();
        if (!raw) {
          ctx.addHtml(block('Reverse translation', '—', 'Paste a protein sequence to back-translate.'));
          return;
        }
        var stratSlug = String(ctx.getChoice('strategy') || '');
        var strategy = /human/i.test(stratSlug) ? 'human'
          : /gc-balanced/i.test(stratSlug) ? 'gc'
          : /avoid/i.test(stratSlug) ? 'gchost' : 'ecoli';
        var addStop = !/^no/i.test(String(ctx.getChoice('tail') || 'yes').trim());
        var dna = '', unknown = [], residues = 0;
        for (var i = 0; i < raw.length; i++) {
          var aa = raw.charAt(i);
          if (aa === '*') { dna += 'TAA'; continue; }
          var codon = pickCodon(aa, strategy);
          if (!codon) { unknown.push(aa); dna += 'NNN'; continue; }
          dna += codon;
          residues++;
        }
        if (addStop) dna += pickCodon('*', strategy);
        var n = dna.length, gc = gcOf(dna.replace(/N/g, ''));
        var pct = n ? gc / n * 100 : 0;
        ctx.exportValue('length_aa', residues);
        ctx.exportValue('length', n);
        ctx.exportValue('gc_pct', Math.round(pct * 100) / 100);
        ctx.exportValue('codons', Math.floor(n / 3));
        ctx.exportValue('tm', Math.round(tmOf(n, pct, n - gc, gc) * 10) / 10);
    
        ctx.addHtml(block('Reverse-translated DNA (5′→3′)', wrap(dna, 60),
          n + ' nt · ' + Math.floor(n / 3) + ' codons · GC ' + pct1(pct) + '%'
          + (unknown.length ? ' · unrecognised letters replaced by NNN: '
             + Array.from(new Set(unknown)).join(' ') : '')));
        if (unknown.length) {
          ctx.addHtml(block('Check your input',
            'These characters are not amino acid codes: ' + Array.from(new Set(unknown)).join(' ')
            + '\nThey were written as NNN, which a synthesiser will not accept.'));
        }
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Reverse translation writes the DNA that could encode a protein. There is no single answer — most residues have several codons — so the page picks codons according to a strategy and shows the DNA it produced with its composition.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It converts a protein into a DNA sequence using a codon table chosen for a host or balanced for GC content, adds a stop codon if you ask, and reports the length, GC percentage and melting temperature of the result.</p><p>The protein is cleaned and read residue by residue. Each residue is looked up in the chosen strategy: the most-used codon for the host, the most GC-rich or most AT-rich synonyms, or a balance between them. The chosen codons are concatenated, a stop is appended if requested, and the composition of the DNA is measured on the result.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 things to fill in, and the order does not matter:</p><ul><li><strong>Protein sequence</strong> — a text box. Single-letter code; spaces, digits and FASTA headers are ignored.</li><li><strong>Codon choice</strong> — a drop-down with the choices the page offers.</li><li><strong>Add a stop codon</strong> — a drop-down with the choices the page offers.</li></ul><p>The answer comes back as 5 boxes: Protein length (aa), DNA length (nt), GC content of the DNA (%), Codons, Melting temperature of the duplex (°C). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Protein sequence</strong> is a text box. Single-letter code; spaces, digits and FASTA headers are ignored Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Codon choice</strong> is a drop-down with the choices the page offers. The choices are E. coli, most used codon, Human, most used codon, GC-balanced (50%) and Avoid rare codons (GC-rich hosts). Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Add a stop codon</strong> is a drop-down with the choices the page offers. The choices are Yes and No. Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Protein sequence</th><td>MKTAYIAKQRQISFVKSHFSRQDILDLWQ</td></tr><tr><th>Codon choice</th><td>E. coli</td></tr><tr><th>Add a stop codon</th><td>Yes</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Protein length</th><td>29 aa</td></tr><tr><th>DNA length</th><td>90 nt</td></tr><tr><th>GC content of the DNA</th><td>42.22 %</td></tr><tr><th>Codons</th><td>30</td></tr><tr><th>Melting temperature of the duplex</th><td>69.7 °C</td></tr></tbody></table><p>A 29-residue protein becomes 90 bases — three per residue — with a GC content of 42.22 per cent, using E. coli's preferred codons and a stop. The codon count of 30 includes that stop.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Protein sequence</th><td>MKWVTFISLLFLFSSAYSR</td></tr><tr><th>Codon choice</th><td>E. coli</td></tr><tr><th>Add a stop codon</th><td>No</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Protein length</th><td>19</td></tr><tr><th>DNA length</th><td>57</td></tr><tr><th>GC content of the DNA</th><td>45.61</td></tr><tr><th>Codons</th><td>19</td></tr><tr><th>Melting temperature of the duplex</th><td>66.8</td></tr></tbody></table><p>5 of the 5 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Protein length</strong> — residues in the paste.</li><li><strong>DNA length</strong> — bases produced, three per residue plus the stop if requested.</li><li><strong>GC content</strong> — the GC percentage of the DNA produced.</li><li><strong>Codons</strong> — codon count in the result, including the stop.</li><li><strong>Melting temperature</strong> — the predicted duplex melting point of the DNA produced.</li></ul><p>The GC content is the figure that decides whether the DNA is comfortable to synthesise. Very high GC means secondary structure and failed synthesis; very low GC means weak hybridisation and poor amplification. The DNA length should always be three times the residue count, plus three if a stop was added.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Translate the first three codons of the output back with a genetic-code table; they should give the first three residues of your protein. Then check that the length is exactly three times the residue count, plus three for the stop.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>DNA pasted as protein</strong> — A nucleotide sequence will reverse translate into a long string of alanine, threonine, glycine and cysteine — three times the length you expected is the giveaway.</li><li><strong>Stop codons</strong> — Whether the DNA ends with a stop is a setting. Forgetting it changes the length by three and can leave a construct without a terminator.</li><li><strong>One strategy</strong> — The codons are chosen by one rule. A codon-optimised gene for expression may need a different balance than one written for GC content.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>No full optimisation</strong> — The page does not avoid restriction sites, repeats or strong secondary structure.</li><li><strong>One codon per residue</strong> — Except where a degenerate strategy is offered, a single codon is chosen.</li><li><strong>Standard code</strong> — Alternative genetic codes are not applied.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Reverse Translate Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reverse translation is used to design a gene for synthesis, to write a peptide as orderable DNA, to check that a construct encodes the protein intended, and to see how much the GC content of a gene depends on the codons chosen.</p><p>The interesting comparison is between strategies. The same protein translated with host-preferred codons and with GC-balanced codons gives two DNA sequences with noticeably different GC content, and it is the lower one that usually synthesises and amplifies more easily. Running both takes a moment and often saves a redesign later.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Is there one right DNA sequence for a protein?', 'a' => 'No. Most residues have several codons, and the choice trades expression, GC content and synthesis difficulty against each other.'],
            ['q' => 'Why is my DNA longer than three times the protein?', 'a' => 'Because a stop codon was added, or because the paste contained characters that were read as extra residues. Check the residue count first.'],
            ['q' => 'Does Reverse Translate Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/relative-abundance', 'name' => 'Relative Abundance Calculator'],
            ['path' => '/biology/respiratory-quotient', 'name' => 'Respiratory Quotient Calculator'],
            ['path' => '/biology/restriction-digest', 'name' => 'Restriction Digest Calculator'],
        ],
        'authors' => [],
    ],
];
