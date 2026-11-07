<?php

/**
 * Protein Isoelectric Point Calculator
 * /biology/protein-isoelectric-point
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Protein Isoelectric Point Calculator',
    'meta' => ['title' => 'Protein Isoelectric Point Calculator — Biology', 'description' => 'A protein\'s isoelectric point is the pH at which its net charge is exactly zero. It returns isoelectric point, net charge at the given ph, length, molecular…', 'h1' => 'Protein Isoelectric Point Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'protein' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'MKTAYIAKQRQISFVKSHFSRQLEERLGLIEVQAPILSRVGDGTQDNLSGAEKAVQVKVKAL', 'c' => null],
                ],
            ],
            'ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '7.0', 'c' => null],
                ],
            ],
            'pi' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'charge' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mw_kda' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'acidic' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'basic' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gravy' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-protein-isoelectric-point',
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
                                    'n' => 'ph',
                                    'l' => 'pH for the charge calculation',
                                    'h' => 'Net charge is reported at this pH',
                                    'suf' => 'pH',
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'pi',
                                    'l' => 'Isoelectric point',
                                    'suf' => 'pH',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'charge',
                                    'l' => 'Net charge at the given pH',
                                    'suf' => 'e',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'l' => 'Length',
                                    'suf' => 'aa',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mw_kda',
                                    'l' => 'Molecular weight',
                                    'h' => 'Average residue masses, no PTMs',
                                    'suf' => 'kDa',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'acidic',
                                    'l' => 'Acidic residues (D + E)',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'basic',
                                    'l' => 'Basic residues (K + R + H)',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gravy',
                                    'l' => 'GRAVY (hydrophobicity)',
                                    'h' => 'Positive means hydrophobic',
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
        
          var PKA = {D: 3.65, E: 4.25, C: 8.18, Y: 10.07, H: 6.00, K: 10.53, R: 12.48,
                     nterm: 8.20, cterm: 3.65};
          var MASS = {A: 89.09, R: 174.20, N: 132.12, D: 133.10, C: 121.16, E: 147.13, Q: 146.15,
                      G: 75.07, H: 155.16, I: 131.17, L: 131.17, K: 146.19, M: 149.21, F: 165.19,
                      P: 115.13, S: 105.09, T: 119.12, W: 204.23, Y: 181.19, V: 117.15};
          var HYDRO = {A: 1.8, R: -4.5, N: -3.5, D: -3.5, C: 2.5, E: -3.5, Q: -3.5, G: -0.4,
                       H: -3.2, I: 4.5, L: 3.8, K: -3.9, M: 1.9, F: 2.8, P: -1.6, S: -0.8,
                       T: -0.7, W: -0.9, Y: -1.3, V: 4.2};
          function netCharge(counts, n, ph) {
            var pos = counts.K / (1 + Math.pow(10, ph - PKA.K))
                    + counts.R / (1 + Math.pow(10, ph - PKA.R))
                    + counts.H / (1 + Math.pow(10, ph - PKA.H))
                    + 1 / (1 + Math.pow(10, ph - PKA.nterm));
            var neg = counts.D / (1 + Math.pow(10, PKA.D - ph))
                    + counts.E / (1 + Math.pow(10, PKA.E - ph))
                    + counts.C / (1 + Math.pow(10, PKA.C - ph))
                    + counts.Y / (1 + Math.pow(10, PKA.Y - ph))
                    + 1 / (1 + Math.pow(10, PKA.cterm - ph));
            return pos - neg;
          }
          omni.onResult(['protein', 'ph'], function (ctx) {
            var p = String(ctx.getRawInput('protein') || '').replace(/^>.*$/gm, '')
              .replace(/[^A-Za-z*]/g, '').toUpperCase().replace(/\*/g, '');
            if (!p) {
              ctx.addHtml(block('Isoelectric point', '—', 'Paste a protein sequence.'));
              return;
            }
            var counts = {D: 0, E: 0, C: 0, Y: 0, H: 0, K: 0, R: 0};
            var mass = 0, hydro = 0, known = 0;
            for (var i = 0; i < p.length; i++) {
              var aa = p.charAt(i);
              if (counts.hasOwnProperty(aa)) counts[aa]++;
              if (MASS[aa]) { mass += MASS[aa]; hydro += HYDRO[aa]; known++; }
            }
            mass = mass - (known - 1) * 18.015 + 18.015;   // peptide bonds, plus terminal water
            var ph = Number(ctx.getRawInput('ph'));
            if (!isFinite(ph)) ph = 7;
        
            var lo = 0, hi = 14;
            for (var k = 0; k < 60; k++) {
              var mid = (lo + hi) / 2;
              if (netCharge(counts, p.length, mid) > 0) lo = mid; else hi = mid;
            }
            var pi = (lo + hi) / 2;
            var charge = netCharge(counts, p.length, ph);
            var gravy = known ? hydro / known : 0;
        
            ctx.exportValue('pi', Math.round(pi * 100) / 100);
            ctx.exportValue('charge', Math.round(charge * 100) / 100);
            ctx.exportValue('length', p.length);
            ctx.exportValue('mw_kda', Math.round(mass / 1000 * 100) / 100);
            ctx.exportValue('acidic', counts.D + counts.E);
            ctx.exportValue('basic', counts.K + counts.R + counts.H);
            ctx.exportValue('gravy', Math.round(gravy * 1000) / 1000);
        
            ctx.addHtml(block('Isoelectric point',
              'pI = ' + pi.toFixed(2) + '\nNet charge at pH ' + ph.toFixed(1) + ' = '
              + (charge >= 0 ? '+' : '') + charge.toFixed(2) + ' e'
              + '\nLength ' + p.length + ' aa · mass ' + (mass / 1000).toFixed(2) + ' kDa'
              + '\nGRAVY ' + gravy.toFixed(3) + ' (' + (gravy > 0 ? 'hydrophobic' : 'hydrophilic') + ')',
              'Calculated with solution pKa values; PTMs and bound ions are not included.'));
            ctx.addHtml(table('Ionisable groups', ['Group', 'pKa', 'Residues', 'State at pH ' + ph.toFixed(1)],
              [['Asp (D)', '3.65', String(counts.D), counts.D ? (ph > 3.65 ? 'deprotonated (−)' : 'protonated (0)') : '—'],
               ['Glu (E)', '4.25', String(counts.E), counts.E ? (ph > 4.25 ? 'deprotonated (−)' : 'protonated (0)') : '—'],
               ['Cys (C)', '8.18', String(counts.C), counts.C ? (ph > 8.18 ? 'deprotonated (−)' : 'protonated (0)') : '—'],
               ['Tyr (Y)', '10.07', String(counts.Y), counts.Y ? (ph > 10.07 ? 'deprotonated (−)' : 'protonated (0)') : '—'],
               ['His (H)', '6.00', String(counts.H), counts.H ? (ph < 6 ? 'protonated (+)' : 'neutral') : '—'],
               ['Lys (K)', '10.53', String(counts.K), counts.K ? (ph < 10.53 ? 'protonated (+)' : 'neutral') : '—'],
               ['Arg (R)', '12.48', String(counts.R), counts.R ? (ph < 12.48 ? 'protonated (+)' : 'neutral') : '—'],
               ['N-terminus', '8.20', '1', ph < 8.2 ? 'protonated (+)' : 'neutral'],
               ['C-terminus', '3.65', '1', ph > 3.65 ? 'deprotonated (−)' : 'neutral']]));
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        A protein's isoelectric point is the pH at which its net charge is exactly zero. It returns isoelectric point, net charge at the given ph, length, molecular weight, acidic residues (d + e), basic residues (k + r + h) and gravy (hydrophobicity), and the panel shows all of them at once.
        
        It is found by summing the charge of every ionisable residue at each trial pH and bisecting until the sum vanishes.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Protein Isoelectric Point', 'html' => <<<'TXT'
            <p>Z(pH) = Σ (+) ÷ (1 + 10^(pH − pKa)) − Σ (−) ÷ (1 + 10^(pKa − pH)). pI is the pH at which Z = 0, found by bisection between 0 and 14</p>
            <figure class="calc-figure"><img src="/uploads/biology/protein-isoelectric-point.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Protein Isoelectric Point Calculator — Net charge against pH for the example protein" title="Protein Isoelectric Point Calculator"><figcaption>Net charge against pH for the example protein</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>Z</code></td><td>net charge in units of the elementary charge</td><td>e</td></tr><tr><td><code>pI</code></td><td>isoelectric point</td><td>pH</td></tr><tr><td><code>pKa</code></td><td>acid dissociation constant of each ionisable group</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Protein Isoelectric Point?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>pI below 5</td><td><strong>Acidic</strong></td><td>binds anion exchangers such as Q Sepharose</td></tr><tr><td>pI 5 – 7.5</td><td><strong>Neutral</strong></td><td>poor solubility near its pI; buffer away from it</td></tr><tr><td>pI above 7.5</td><td><strong>Basic</strong></td><td>binds cation exchangers such as SP Sepharose</td></tr></tbody></table>
            <ul><li><p>Solubility is lowest at the pI because the protein has no net charge and molecules aggregate. Purification buffers are usually set one pH unit away from it.</p></li><li><p>The pKa values used are the standard solution values (D 3.65, E 4.25, C 8.18, Y 10.07, H 6.0, K 10.53, R 12.48, N-terminus 8.2, C-terminus 3.65). Real pKa values shift in a folded protein, so a measured pI can differ by half a unit.</p></li><li><p>Modifications are ignored: phosphorylation adds negative charges and moves the pI down, while a His-tag or a nuclear localisation signal moves it up.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Assuming the calculated pI equals the value on an IEF gel — glycosylation and PTMs shift it.</li><li>Running an ion-exchange step at the pI, where the protein has no charge to bind with.</li><li>Forgetting that the N- and C-termini contribute, which matters for short peptides.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a typical protein pI?', 'a' => 'Most cytosolic proteins sit between 5 and 7; the human proteome averages around 6.5.'],
            ['q' => 'How is pI calculated?', 'a' => 'By finding the pH where the sum of positive and negative charges is zero, using the Henderson-Hasselbalch equation for every ionisable group.'],
            ['q' => 'Why is my measured pI different?', 'a' => 'Post-translational modification, bound ions, glycosylation and the local environment of each residue all shift the true value.'],
            ['q' => 'What does the Protein Isoelectric Point actually calculate?', 'a' => <<<'TXT'
            It returns isoelectric point, net charge at the given ph, length, molecular weight, acidic residues (d + e), basic residues (k + r + h) and gravy (hydrophobicity). Each one is derived by the formula on this page, so you can check any figure by hand.
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
