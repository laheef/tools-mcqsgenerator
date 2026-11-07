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
    'meta' => ['title' => 'Amino Acid Composition Calculator — Formula & Results', 'description' => 'Amino acid composition counts each residue in a protein and the share of the chain it makes up. It returns length, molecular weight, gravy, aromatic residues…', 'h1' => 'Amino Acid Composition Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'protein' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'MKTAYIAKQRQISFVKSHFSRQLEERLGLIEVQAPILSRVGDGTQDNLSGAEKAVQVKVKAL', 'c' => null],
                ],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mw_kda' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gravy' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'aromatic' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'charge_balance' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'cysteine' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-amino-acid-composition',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'protein',
                                    'l' => 'Protein sequence',
                                    'h' => 'Single-letter code; headers, spaces and digits are ignored',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'l' => 'Length',
                                    'suf' => 'aa',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'mw_kda',
                                    'l' => 'Molecular weight',
                                    'h' => 'Average residue masses, no modifications',
                                    'suf' => 'kDa',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gravy',
                                    'l' => 'GRAVY',
                                    'h' => 'Positive means hydrophobic',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'aromatic',
                                    'l' => 'Aromatic residues (F + W + Y)',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'charge_balance',
                                    'l' => 'Acidic minus basic residues',
                                    'h' => 'Positive means acidic overall',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'cysteine',
                                    'l' => 'Cysteines',
                                    'h' => 'Pairs set the maximum number of disulfides',
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
        'datasets' => [],
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
    ],
    'article' => [
        'intro' => <<<'TXT'
        Amino acid composition counts each residue in a protein and the share of the chain it makes up. It returns length, molecular weight, gravy, aromatic residues (f + w + y), acidic minus basic residues and cysteines, and the panel shows all of them at once.
        
        From those counts it derives molecular weight, GRAVY hydrophobicity, aromatic content and the acidic-to-basic balance.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Amino Acid Composition', 'html' => <<<'TXT'
            <p>Molecular weight = Σ(residue masses) − (n − 1) × 18.015. GRAVY = Σ(hydropathy × count) ÷ n. Share of an amino acid = count ÷ n × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/amino-acid-composition.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Amino Acid Composition Calculator — Kyte–Doolittle hydropathy, most and least hydrophobic" title="Amino Acid Composition Calculator"><figcaption>Kyte–Doolittle hydropathy, most and least hydrophobic</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>n</code></td><td>number of residues</td><td>aa</td></tr><tr><td><code>GRAVY</code></td><td>grand average of hydropathicity (Kyte–Doolittle)</td><td>—</td></tr><tr><td><code>Da</code></td><td>dalton</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Amino Acid Composition?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>GRAVY above 0.2</td><td><strong>Hydrophobic</strong></td><td>likely membrane-associated or a membrane domain</td></tr><tr><td>GRAVY −0.2 to 0.2</td><td><strong>Mixed</strong></td><td>soluble globular proteins typically sit here</td></tr><tr><td>GRAVY below −0.5</td><td><strong>Very hydrophilic</strong></td><td>highly soluble, often disordered</td></tr></tbody></table>
            <ul><li><p>GRAVY is the mean Kyte–Doolittle hydropathy. A value above about 0.2 across a window of 19–20 residues is the classic signal of a transmembrane helix.</p></li><li><p>Cysteine count matters downstream: an even number can form disulfide bonds, and free cysteines cause aggregation in formulation.</p></li><li><p>The mass here is the unmodified chain. Signal peptides are cleaved, glycosylation adds several kDa, and a His-tag adds about 0.8 kDa per histidine.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Assuming an extinction coefficient from composition alone — Trp and Tyr are close, but disulfides also contribute at 280 nm.</li><li>Comparing GRAVY of a full-length protein with that of its mature, processed form.</li><li>Treating percent composition as conserved: it varies widely between unrelated proteins of the same size.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I calculate protein molecular weight from sequence?', 'a' => 'Add the average residue masses and subtract one water molecule per peptide bond.'],
            ['q' => 'What does a positive GRAVY mean?', 'a' => 'The protein is net hydrophobic — often a membrane protein or a hydrophobic domain.'],
            ['q' => 'Why does cysteine count matter?', 'a' => 'Two cysteines can form a disulfide bond; unpaired ones drive aggregation and need to be capped or removed.'],
            ['q' => 'What does the Amino Acid Composition actually calculate?', 'a' => <<<'TXT'
            It returns length, molecular weight, gravy, aromatic residues (f + w + y), acidic minus basic residues and cysteines. Each one is derived by the formula on this page, so you can check any figure by hand.
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
