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
    'meta' => ['title' => 'DNA Molecular Weight Calculator — Formula & Results', 'description' => 'DNA Molecular Weight Calculator takes sequence and molecule and returns length and GC content. Every box can be solved for, not only the one in the title.', 'h1' => 'DNA Molecular Weight Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAG', 'c' => null],
                ],
            ],
            'strands' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'double-stranded-dna', 'c' => null],
                ],
                'ds' => 'ds-strands',
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gc_pct' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mw_ss' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mw' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mw_kda' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'pmol_per_ug' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-dna-molecular-weight-calculator',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'sequence',
                                    'l' => 'Sequence',
                                    'h' => 'Paste one strand; the other is assumed to be its exact complement',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'strands',
                                    'l' => 'Molecule',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-strands',
                                    'opts' => [
                                        ['double-stranded-dna', 'Double-stranded DNA', 'ds'],
                                        ['single-stranded-dna', 'Single-stranded DNA', 'ss'],
                                        ['single-stranded-rna', 'Single-stranded RNA', 'rna'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'l' => 'Length',
                                    'suf' => 'nt',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc_pct',
                                    'l' => 'GC content',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mw_ss',
                                    'l' => 'Molecular weight, one strand',
                                    'suf' => 'Da',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'mw',
                                    'l' => 'Molecular weight of the molecule',
                                    'suf' => 'Da',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'mw_kda',
                                    'l' => 'Molecular weight',
                                    'suf' => 'kDa',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'pmol_per_ug',
                                    'l' => 'Amount in 1 µg',
                                    'h' => 'Handy for setting up a ligation',
                                    'suf' => 'pmol',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [],
        'datasets' => [
            'ds-strands' => [
                'name' => 'Molecule',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'double-stranded-dna', 'label' => 'Double-stranded DNA', 'value' => 'ds'],
                    ['uid' => 'single-stranded-dna', 'label' => 'Single-stranded DNA', 'value' => 'ss'],
                    ['uid' => 'single-stranded-rna', 'label' => 'Single-stranded RNA', 'value' => 'rna'],
                ],
            ],
        ],
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
            var pick = String(ctx.getRawInput('strands') || '');
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
    ],
    'article' => [
        'intro' => <<<'TXT'
        DNA Molecular Weight turns Sequence and Molecule into Length and GC content. The arithmetic is the whole method: length is worked out from sequence by one formula, applied once. Length comes back in nt unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the DNA Molecular Weight calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind DNA Molecular Weight: it takes 2 numbers and reports Length, GC content and Molecular weight, one strand.</p><p>What comes back is Length, GC content, Molecular weight, one strand and Molecular weight of the molecule — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Sequence</strong> — a plain number, no unit. Paste one strand; the other is assumed to be its exact complement</li><li><strong>Molecule</strong> — a plain number, no unit</li></ul><p>What you get back is Length in nt, GC content in %, Molecular weight, one strand in Da, Molecular weight of the molecule in Da, Molecular weight in kDa, Amount in 1 µg in pmol, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Length takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Length, GC content and Molecular weight, one strand are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Sequence left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Sequence is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Molecule left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Molecule is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Sequence and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Sequence</strong> takes a plain number with no unit attached. Paste one strand; the other is assumed to be its exact complement. Have it to hand before you start: Sequence is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Molecule</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Molecule is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Length</strong> is a plain number. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>GC content</strong> is a plain number. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Molecular weight, one strand</strong> is a plain number. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Molecular weight of the molecule</strong> is a plain number. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Molecular weight</strong> is a plain number. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Amount in 1 µg</strong> is a plain number. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Pasting the sequence correctly', 'html' => <<<'TXT'
            <p>The box labelled <strong>Sequence</strong> is the input the whole page is built around. It holds characters, and the page reads every one of them.</p><ul><li><strong>No header line.</strong> If the text was copied out of a file, check that the first line is not a description. Anything before the first real base or residue is counted as data.</li><li><strong>No spaces or line numbers.</strong> Sequence viewers wrap the text and number the lines. The numbers are not part of the sequence, and a paste that includes them will fail or, worse, half-succeed.</li><li><strong>Case is a choice you make.</strong> Many tools treat upper and lower case as the same letters and others do not. Paste the sequence in the case that carries the meaning you intend.</li><li><strong>Ambiguous characters are not rare.</strong> An N in a sequence, an X in a protein, or an IUPAC code standing for two possible bases is a real value, not a typo. The page will count it; interpret the answer with that in mind.</li></ul><p>Paste once, check the first and last few characters of what landed in the box, and then read Length, GC content, Molecular weight, one strand and Molecular weight of the molecule. If one of those figures is impossible — a length that does not match the text, a count larger than the sequence — the paste is the thing to look at first, not the formula.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>DNA Molecular Weight is not a single equation with a single answer. It reads Sequence and Molecule, applies the analysis the page is built around, and reports Length, GC content, Molecular weight, one strand and Molecular weight of the molecule.</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Length, GC content, Molecular weight, one strand and Molecular weight of the molecule. They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Length follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Sequence and Molecule are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Sequence and Molecule measured, Length and GC content wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/protein-gravy-calculator">Protein GRAVY (Hydropathy) Calculator</a>, <a href="/biology/protein-hydrodynamic-radius">Protein Hydrodynamic Radius Calculator</a> and <a href="/biology/protein-isoelectric-point">Protein Isoelectric Point Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from DNA Molecular Weight is a number to act on, so the useful question is what to do with Length (nt), GC content (%) and Molecular weight, one strand (Da) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Sequence and Molecule alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA Molecular Weight calculator work out?', 'a' => 'Length, GC content, Molecular weight, one strand and Molecular weight of the molecule.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Sequence, Molecule. Fill sequence and molecule and leave Length empty if you would rather have that one solved instead.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Length is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'Every box has to have a number in it. What this page returns is Length, so an empty input simply leaves the result blank rather than choosing a new unknown.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Length keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/protein-gravy-calculator', 'name' => 'Protein GRAVY (Hydropathy) Calculator'],
            ['path' => '/biology/protein-hydrodynamic-radius', 'name' => 'Protein Hydrodynamic Radius Calculator'],
            ['path' => '/biology/protein-isoelectric-point', 'name' => 'Protein Isoelectric Point Calculator'],
        ],
        'authors' => [],
    ],
];
