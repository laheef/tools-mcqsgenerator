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
    'meta' => ['title' => 'Amino Acid Composition Calculator — Formula & Results', 'description' => 'Amino Acid Composition turns Protein sequence into Length and Molecular weight. Single-letter code; headers, spaces and digits are ignoredThe answers come…', 'h1' => 'Amino Acid Composition Calculator', 'updated' => '2026-10-29'],
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
        Amino Acid Composition turns Protein sequence into Length and Molecular weight. The arithmetic is the whole method: Length is worked out from Protein sequence by one formula, applied once. Length comes back in aa unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Amino Acid Composition calculator works', 'html' => <<<'TXT'
            <p>Amino Acid Composition answers one question from 1 number, and the answer is Length, Molecular weight and GRAVY.</p><p>What comes back is Length, Molecular weight, GRAVY and Aromatic residues (F + W + Y) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Protein sequence</strong> — a plain number, no unit. Single-letter code; headers, spaces and digits are ignored</li></ul><p>The answers come back as Length in aa, Molecular weight in kDa, GRAVY, Aromatic residues (F + W + Y) in %, Acidic minus basic residues, Cysteines. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Length takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Length, Molecular weight and GRAVY are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Protein sequence and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Protein sequence measured, Length and Molecular weight wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/osmolarity-osmotic-pressure">Osmolarity / Osmotic Pressure Calculator</a>, <a href="/biology/pasture-stocking-rate">Pasture Stocking Rate Calculator</a> and <a href="/biology/pcr-annealing-temperature">PCR Annealing Temperature Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Amino Acid Composition calculator work out?', 'a' => 'Length, Molecular weight, GRAVY and Aromatic residues (F + W + Y).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Protein sequence. Fill protein and leave Length empty if you would rather have that one solved instead.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Length is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'Every box has to have a number in it. What this page returns is Length, so an empty input simply leaves the result blank rather than choosing a new unknown.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Length keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/osmolarity-osmotic-pressure', 'name' => 'Osmolarity / Osmotic Pressure Calculator'],
            ['path' => '/biology/pasture-stocking-rate', 'name' => 'Pasture Stocking Rate Calculator'],
            ['path' => '/biology/pcr-annealing-temperature', 'name' => 'PCR Annealing Temperature Calculator'],
        ],
        'authors' => [],
    ],
];
