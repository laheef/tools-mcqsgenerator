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
    'meta' => ['title' => 'DNA Molecular Weight Calculator — Formula & Results', 'description' => <<<'TXT'
    DNA Molecular Weight turns Sequence and Molecule into Length and GC content. A result box can be typed into, and doing so changes the question rather than the…
    TXT, 'h1' => 'DNA Molecular Weight Calculator', 'updated' => '2026-10-29'],
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
        DNA Molecular Weight turns Sequence and Molecule into Length and GC content. The arithmetic is the whole method: Length is worked out from Sequence by one formula, applied once. Length comes back in nt unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the DNA Molecular Weight calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind DNA Molecular Weight: it takes 2 numbers and reports Length, GC content and Molecular weight, one strand.</p><p>What comes back is Length, GC content, Molecular weight, one strand and Molecular weight of the molecule — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Sequence</strong> — a plain number, no unit. Paste one strand; the other is assumed to be its exact complement</li><li><strong>Molecule</strong> — a plain number, no unit</li></ul><p>What you get back is Length in nt, GC content in %, Molecular weight, one strand in Da, Molecular weight of the molecule in Da, Molecular weight in kDa, Amount in 1 µg in pmol, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Length takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Length, GC content and Molecular weight, one strand are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Sequence and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Sequence and Molecule measured, Length and GC content wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/protein-gravy-calculator">Protein GRAVY (Hydropathy) Calculator</a>, <a href="/biology/protein-hydrodynamic-radius">Protein Hydrodynamic Radius Calculator</a> and <a href="/biology/protein-isoelectric-point">Protein Isoelectric Point Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA Molecular Weight calculator work out?', 'a' => 'Length, GC content, Molecular weight, one strand and Molecular weight of the molecule.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Sequence, Molecule. Fill sequence and strands and leave Length empty if you would rather have that one solved instead.'],
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
