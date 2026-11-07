<?php

/**
 * Codon Adaptation Index Calculator
 * /biology/codon-adaptation-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Codon Adaptation Index Calculator',
    'meta' => ['title' => 'Codon Adaptation Index Calculator — Formula & Results', 'description' => 'Codon Adaptation Index works out Codon adaptation index and Codons scored from Coding sequence (DNA) and Reference host. It is a single relationship that…', 'h1' => 'Codon Adaptation Index Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ATGGCTAAAGGTGAAGAACTGTTCACTGGTGTTGTACCAATCTTAGTTGAACTGGATGGTGATGTTAACGGTCATAAATTT', 'c' => null],
                ],
            ],
            'host' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'e-coli-k-12', 'c' => null],
                ],
                'ds' => 'ds-host',
            ],
            'cai' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'codons' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rare' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gc3' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-codon-adaptation-index',
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
                                    'l' => 'Coding sequence (DNA)',
                                    'h' => 'Paste the open reading frame; the first codon is read as the start',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'host',
                                    'l' => 'Reference host',
                                    'h' => 'The codon usage table the weights come from',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-host',
                                    'opts' => [
                                        ['e-coli-k-12', 'E. coli K-12', 'ecoli'],
                                        ['human-homo-sapiens', 'Human (Homo sapiens)', 'human'],
                                        ['yeast-s-cerevisiae', 'Yeast (S. cerevisiae)', 'yeast'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'cai',
                                    'l' => 'Codon adaptation index',
                                    'h' => 'Geometric mean of the weights',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'codons',
                                    'l' => 'Codons scored',
                                    'h' => 'Met, Trp and stops are excluded',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'rare',
                                    'l' => 'Rare codons (w ≤ 0.2)',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc3',
                                    'l' => 'GC at third position',
                                    'suf' => '%',
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
            'ds-host' => [
                'name' => 'Reference host',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'e-coli-k-12', 'label' => 'E. coli K-12', 'value' => 'ecoli'],
                    ['uid' => 'human-homo-sapiens', 'label' => 'Human (Homo sapiens)', 'value' => 'human'],
                    ['uid' => 'yeast-s-cerevisiae', 'label' => 'Yeast (S. cerevisiae)', 'value' => 'yeast'],
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
          // A select arrives here as the option *uid* the panel generated from the label,
          // not as its value, so resolve by normalised containment and take the longest
          // match (otherwise "hindiii" would be caught by a shorter key like "hin").
          function resolve(raw, map, fallback) {
            var n = String(raw || '').toLowerCase().replace(/[^a-z0-9]/g, '');
            if (Object.prototype.hasOwnProperty.call(map, raw)) return map[raw];
            var keys = Object.keys(map).sort(function (a, b) { return b.length - a.length; });
            for (var i = 0; i < keys.length; i++) {
              var k = keys[i].toLowerCase().replace(/[^a-z0-9]/g, '');
              if (k && n.indexOf(k) >= 0) return map[keys[i]];
            }
            return fallback;
          }
          var BASES = 'TCAG';
          var AA_ORDER = 'FFLLSSSSYY**CC*WLLLLPPPPHHQQRRRRIIIMTTTTNNKKSSRRVVVVAAAADDEEGGGG';
          function aaOf(codon) {
            var i1 = BASES.indexOf(codon.charAt(0)), i2 = BASES.indexOf(codon.charAt(1)),
                i3 = BASES.indexOf(codon.charAt(2));
            if (i1 < 0 || i2 < 0 || i3 < 0) return null;
            return AA_ORDER.charAt(i1 * 16 + i2 * 4 + i3);
          }
          var STOPS = { TAA: 1, TAG: 1, TGA: 1 };
          var MASS = { A: 71.0788, R: 156.1875, N: 114.1038, D: 115.0886, C: 103.1388,
                       E: 129.1155, Q: 128.1307, G: 57.0519, H: 137.1411, I: 113.1594,
                       L: 113.1594, K: 128.1741, M: 131.1926, F: 147.1766, P: 97.1167,
                       S: 87.0782, T: 101.1051, W: 186.2132, Y: 163.1760, V: 99.1326 };
          function peptideMass(s) {
            var m = 0, n = 0;
            for (var i = 0; i < s.length; i++) {
              var x = MASS[s.charAt(i)];
              if (x) { m += x; n++; }
            }
            return n ? m + 18.01524 : 0;
          }
        
          var CODON_W = {
            ecoli: {
              TTT: 0.57, TTC: 1.00, TTA: 0.13, TTG: 0.13, CTT: 0.10, CTC: 0.10, CTA: 0.04, CTG: 1.00,
              ATT: 0.51, ATC: 1.00, ATA: 0.08, ATG: 1.00,
              GTT: 0.60, GTC: 0.42, GTA: 0.27, GTG: 1.00,
              TCT: 0.60, TCC: 0.60, TCA: 0.14, TCG: 0.14, AGT: 0.31, AGC: 1.00,
              CCT: 0.35, CCC: 0.22, CCA: 0.35, CCG: 1.00,
              ACT: 0.49, ACC: 1.00, ACA: 0.13, ACG: 0.27,
              GCT: 0.53, GCC: 0.58, GCA: 0.45, GCG: 1.00,
              TAT: 0.57, TAC: 1.00, CAT: 0.57, CAC: 1.00, CAA: 0.34, CAG: 1.00,
              AAT: 0.49, AAC: 1.00, AAA: 1.00, AAG: 0.25, GAT: 0.63, GAC: 1.00,
              GAA: 0.68, GAG: 1.00, TGT: 0.46, TGC: 1.00, TGG: 1.00,
              CGT: 1.00, CGC: 0.55, CGA: 0.06, CGG: 0.03, AGA: 0.03, AGG: 0.02,
              GGT: 1.00, GGC: 0.74, GGA: 0.19, GGG: 0.15
            },
            human: {
              TTT: 0.93, TTC: 1.00, TTA: 0.29, TTG: 0.50, CTT: 0.53, CTC: 0.79, CTA: 0.28, CTG: 1.00,
              ATT: 0.74, ATC: 0.87, ATA: 0.35, ATG: 1.00,
              GTT: 0.60, GTC: 0.79, GTA: 0.46, GTG: 1.00,
              TCT: 0.75, TCC: 0.88, TCA: 0.58, TCG: 0.22, AGT: 0.67, AGC: 1.00,
              CCT: 0.83, CCC: 1.00, CCA: 0.83, CCG: 0.28,
              ACT: 0.82, ACC: 1.00, ACA: 0.90, ACG: 0.38,
              GCT: 0.79, GCC: 1.00, GCA: 0.73, GCG: 0.29,
              TAT: 0.87, TAC: 1.00, CAT: 0.83, CAC: 1.00, CAA: 0.51, CAG: 1.00,
              AAT: 0.88, AAC: 1.00, AAA: 0.86, AAG: 1.00, GAT: 0.93, GAC: 1.00,
              GAA: 0.84, GAG: 1.00, TGT: 0.87, TGC: 1.00, TGG: 1.00,
              CGT: 0.48, CGC: 0.63, CGA: 0.31, CGG: 1.00, AGA: 0.62, AGG: 0.65,
              GGT: 0.62, GGC: 0.83, GGA: 1.00, GGG: 0.79
            },
            yeast: {
              TTT: 0.60, TTC: 1.00, TTA: 0.29, TTG: 1.00, CTT: 0.13, CTC: 0.06, CTA: 0.14, CTG: 0.11,
              ATT: 0.99, ATC: 1.00, ATA: 0.39, ATG: 1.00,
              GTT: 1.00, GTC: 0.62, GTA: 0.44, GTG: 0.28,
              TCT: 1.00, TCC: 0.74, TCA: 0.51, TCG: 0.15, AGT: 0.51, AGC: 0.33,
              CCT: 1.00, CCC: 0.30, CCA: 0.79, CCG: 0.09,
              ACT: 1.00, ACC: 0.79, ACA: 0.62, ACG: 0.26,
              GCT: 1.00, GCC: 0.52, GCA: 0.71, GCG: 0.19,
              TAT: 0.87, TAC: 1.00, CAT: 0.73, CAC: 1.00, CAA: 1.00, CAG: 0.31,
              AAT: 1.00, AAC: 0.83, AAA: 1.00, AAG: 0.58, GAT: 1.00, GAC: 0.72,
              GAA: 1.00, GAG: 0.45, TGT: 1.00, TGC: 0.63, TGG: 1.00,
              CGT: 0.14, CGC: 0.06, CGA: 0.07, CGG: 0.04, AGA: 1.00, AGG: 0.66,
              GGT: 1.00, GGC: 0.39, GGA: 0.31, GGG: 0.24
            }
          };
          var DEGENERATE = { A: 'GCN', C: 'TGY', D: 'GAY', E: 'GAR', F: 'TTY', G: 'GGN',
                             H: 'CAY', I: 'ATH', K: 'AAR', L: 'YTN', M: 'ATG', N: 'AAY',
                             P: 'CCN', Q: 'CAR', R: 'MGN', S: 'WSN', T: 'ACN', V: 'GTN',
                             W: 'TGG', Y: 'TAY', '*': 'TAR' };
        
          omni.onResult(['sequence', 'host'], function (ctx) {
            var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
            var key = resolve(ctx.getRawInput('host'), { ecoli: 'ecoli', human: 'human', yeast: 'yeast' }, 'ecoli');
            var W = CODON_W[key] || CODON_W.ecoli;
            if (seq.length < 3) {
              ctx.addHtml(block('Codon adaptation index', '—', 'Paste a coding sequence of at least 3 bp.'));
              ctx.exportValue('cai', 0); ctx.exportValue('codons', 0);
              ctx.exportValue('rare', 0); ctx.exportValue('gc3', 0);
              return;
            }
            var usable = Math.floor(seq.length / 3);
            if (usable * 3 !== seq.length) {
              seq = seq.slice(0, usable * 3);
            }
            var sumLn = 0, scored = 0, rare = 0, gc3 = 0, gc3n = 0, unknown = 0;
            var counts = {}, rareList = [];
            for (var i = 0; i + 3 <= seq.length; i += 3) {
              var cod = seq.substr(i, 3);
              var aa = aaOf(cod);
              if (aa === null) { unknown++; continue; }
              if (aa === '*' || cod === 'ATG' || cod === 'TGG') continue;
              var w = W[cod];
              if (w === undefined) { unknown++; continue; }
              counts[cod] = (counts[cod] || 0) + 1;
              scored++;
              // a zero weight would make ln() infinite; the tables have none, but guard anyway
              sumLn += Math.log(Math.max(w, 0.005));
              gc3n++;
              if (cod.charAt(2) === 'G' || cod.charAt(2) === 'C') gc3++;
              if (w <= 0.2) {
                rare++;
                if (rareList.length < 12) rareList.push(cod + ' (w ' + w.toFixed(2) + ', position ' + (i + 1) + ')');
              }
            }
            var cai = scored ? Math.exp(sumLn / scored) : 0;
            var pct3 = gc3n ? gc3 / gc3n * 100 : 0;
            ctx.exportValue('cai', Math.round(cai * 10000) / 10000);
            ctx.exportValue('codons', scored);
            ctx.exportValue('rare', rare);
            ctx.exportValue('gc3', Math.round(pct3 * 100) / 100);
        
            var verdict = cai >= 0.8 ? 'well adapted for this host'
              : cai >= 0.6 ? 'moderately adapted — a native gene expressed at a modest level'
              : cai >= 0.4 ? 'poorly adapted — codon optimisation is worth considering'
              : 'very poorly adapted — expect a low yield as it stands';
            var rows = [];
            var order = Object.keys(counts).sort(function (a, b) { return counts[b] - counts[a]; });
            for (var k = 0; k < order.length && k < 15; k++) {
              var c = order[k];
              rows.push([c, aaOf(c) || '?', String(counts[c]), W[c].toFixed(2)]);
            }
            var html = block('Codon adaptation index (' + key + ')',
              'CAI                ' + cai.toFixed(4) + '\n'
              + 'Codons scored      ' + scored + '\n'
              + 'Rare codons (w≤0.2) ' + rare + '\n'
              + 'GC at third base   ' + pct3.toFixed(1) + ' %',
              'Reading: ' + verdict + '.');
            html += table('Most used codons in this sequence', ['Codon', 'Amino acid', 'Count', 'w'], rows);
            html += block('Rare codons', rare ? rareList.join('\n') : 'None below w = 0.2.',
              unknown ? unknown + ' codon(s) skipped as ambiguous or incomplete.' : '');
            ctx.addHtml(html);
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Codon Adaptation Index works out Codon adaptation index and Codons scored from Coding sequence (DNA) and Reference host. It is a single relationship that reads Codon adaptation index out of Coding sequence (DNA), not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Codon Adaptation Index calculator works', 'html' => <<<'TXT'
            <p>The Codon Adaptation Index calculator applies one relationship to 2 numbers and reports Codon adaptation index, Codons scored and Rare codons (w ≤ 0.2).</p><p>The answers are Codon adaptation index, Codons scored, Rare codons (w ≤ 0.2) and GC at third position; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Coding sequence (DNA)</strong> — a plain number, no unit. Paste the open reading frame; the first codon is read as the start</li><li><strong>Reference host</strong> — a plain number, no unit. The codon usage table the weights come from</li></ul><p>The answers come back as Codon adaptation index, Codons scored, Rare codons (w ≤ 0.2), GC at third position in %. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Codon adaptation index is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Codon adaptation index, Codons scored and Rare codons (w ≤ 0.2) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Coding sequence (DNA) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Coding sequence (DNA) and Reference host and the number you are missing is Codon adaptation index and Codons scored.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/guinea-pig-age">Guinea pig years to human years</a>, <a href="/biology/gypsum-application-rate">Gypsum Application Rate Calculator</a> and <a href="/biology/hamster-age">Hamster age Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Codon Adaptation Index calculator work out?', 'a' => 'Codon adaptation index, Codons scored, Rare codons (w ≤ 0.2) and GC at third position.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Coding sequence (DNA), Reference host. Enter sequence and host; Codon adaptation index is the box to leave alone unless it is the value you came for.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Codon adaptation index is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Codon adaptation index, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Codon adaptation index at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/guinea-pig-age', 'name' => 'Guinea pig years to human years'],
            ['path' => '/biology/gypsum-application-rate', 'name' => 'Gypsum Application Rate Calculator'],
            ['path' => '/biology/hamster-age', 'name' => 'Hamster age Calculator'],
        ],
        'authors' => [],
    ],
];
