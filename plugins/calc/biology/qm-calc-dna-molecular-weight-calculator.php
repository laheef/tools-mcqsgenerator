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
    'meta' => ['title' => 'DNA Molecular Weight Calculator — Formula & Results', 'description' => 'Molecular weight of a DNA molecule, single- or double-stranded, from its base composition. It returns length, gc content, molecular weight, one strand…', 'h1' => 'DNA Molecular Weight Calculator', 'updated' => '2026-10-29'],
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
        Molecular weight of a DNA molecule, single- or double-stranded, from its base composition. It returns length, gc content, molecular weight, one strand, molecular weight of the molecule, molecular weight and amount in 1 µg, and the panel shows all of them at once.
        
        It is what you need to convert a mass in nanograms into picomoles for a ligation, and to work out how much of a PCR product is in a band on a gel.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the DNA Molecular Weight', 'html' => <<<'TXT'
            <p>ssDNA = 313.21·A + 304.20·T + 289.18·C + 329.21·G − 61.96 (Da). dsDNA = 2 × ssDNA. pmol per µg = 10⁶ ÷ MW</p>
            <figure class="calc-figure"><img src="/uploads/biology/dna-molecular-weight-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: DNA Molecular Weight Calculator — Residue mass of each base (Da)" title="DNA Molecular Weight Calculator"><figcaption>Residue mass of each base (Da)</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>A, T, C, G</code></td><td>counts of each base</td><td>bases</td></tr><tr><td><code>MW</code></td><td>molecular weight</td><td>g/mol = Da</td></tr><tr><td><code>Da</code></td><td>dalton, one atomic mass unit</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the DNA Molecular Weight?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>under 50 bp</td><td><strong>Oligonucleotide</strong></td><td>order by scale, not by mass</td></tr><tr><td>100 – 3 000 bp</td><td><strong>Typical PCR product</strong></td><td>a 1 kb dsDNA is about 660 kDa</td></tr><tr><td>above 10 000 bp</td><td><strong>Plasmid or genomic fragment</strong></td><td>handle shear-sensitive</td></tr></tbody></table>
            <ul><li><p>A base pair of double-stranded DNA weighs about 618–660 Da depending on GC content; the often quoted 660 Da per bp is the average over equal base frequencies.</p></li><li><p>Pairing does not consume mass: a duplex weighs the sum of its two strands. Because the complement has the same composition as the strand you pasted, the duplex is exactly twice the single strand.</p></li><li><p>RNA uses uracil, which is 306.17 Da, so an RNA strand of the same sequence weighs slightly more than the equivalent DNA.</p></li><li><p>The figure here is the free-acid mass, summed from the exact residue masses (about 618 Da per base pair at 50% GC). The rounded 660 Da per base pair used for quick bench arithmetic is the sodium salt, which adds a sodium counterion for every phosphate — that is why the µg-to-pmol converter, which uses 660, returns about 7% fewer picomoles per microgram.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Reporting the duplex mass for a single-stranded oligo, which doubles the number.</li><li>Using the 660 Da/bp shortcut for a GC-rich molecule; at 70% GC, a base pair is closer to 640 Da.</li><li>Forgetting that a 5′ modification (biotin, phosphate, a fluorophore) adds its own mass.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much does a 1 kb DNA fragment weigh?', 'a' => 'About 660 kDa double-stranded, roughly 1.1 × 10⁻¹⁸ g per molecule.'],
            ['q' => 'How many pmol are in 100 ng of a 500 bp dsDNA?', 'a' => '100 ng ÷ 330 000 g/mol = 3 × 10⁻¹³ mol ≈ 0.30 pmol.'],
            ['q' => 'Does the calculator handle RNA?', 'a' => 'Yes — choose RNA and uracil is counted at its own residue mass.'],
            ['q' => 'What does the DNA Molecular Weight actually calculate?', 'a' => <<<'TXT'
            It returns length, gc content, molecular weight, one strand, molecular weight of the molecule, molecular weight and amount in 1 µg. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];
