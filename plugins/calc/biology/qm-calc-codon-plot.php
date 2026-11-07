<?php

/**
 * Codon Plot Calculator
 * /biology/codon-plot
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Codon Plot Calculator',
    'meta' => ['title' => 'Codon Plot Calculator: Formula, Steps & Results', 'description' => <<<'TXT'
    Codon Plot takes Coding sequence (DNA) and Window size and returns Codons read and Rare codons (w ≤ 0.2). It is a single relationship that reads Codons read…
    TXT, 'h1' => 'Codon Plot Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => <<<'TXT'
                    ATGGCTAGCAAAGGAGAAGAACTTTTCACTGGAGTTGTCCCAATTCTTGTTGAATTAGATGGTGATGTTAATGGGCACAAATTTTCTGTCAGTGGAGAGGGTGAAGGTGATGCAACATACGGAAAACTTACCCTTAAATTTATTTGCACTACTGGAAAACTACCTGTTCCATGGCCAACACTTGTCACTACTTTCTCTTATGGTGTTCAATGCTTTTCAAGATACCCAGATCATATGAAACGGCATGACTTTTTCAAGAGTGCCATGCCCGAAGGTTATGTACAGGAAAGAACTATATTTTTCAAAGATGACGGGAACTACAAGACACGTGCTGAAGTCAAGTTTGAAGGTGATACCCTTGTTAATAGAATCGAGTTAAAAGGTATTGATTTTAAAGAAGATGGAAACATTCTTGGACACAAATTGGAATACAACTATAACTCACACAATGTATACATCATGGCAGACAAACAAAAGAATGGAATCAAAGTTAACTTCAAAATTAGACACAACATTGAAGATGGAAGCGTTCAACTAGCAGACCATTATCAACAAAATACTCCAATTGGCGATGGCCCTGTCCTTTTACCAGACAACCATTACCTGTCCACACAATCTGCCCTTTCGAAAGATCCCAACGAAAAGAGAGACCACATGGTCCTTCTTGAGTTTGTAACAGCTGCTGGGATTACACATGGCATGGATGAACTATACAAATAA
                    TXT, 'c' => null],
                ],
            ],
            'window' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '30', 'c' => null],
                ],
            ],
            'codons' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rare' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'clusters' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-codon-plot',
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
                                    'h' => 'Paste the open reading frame; long sequences are summarised window by window',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'window',
                                    'l' => 'Window size',
                                    'h' => 'How many codons each summary point covers',
                                    'suf' => 'codons',
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'codons',
                                    'l' => 'Codons read',
                                    'h' => 'Whole codons only',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'rare',
                                    'l' => 'Rare codons (w ≤ 0.2)',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'clusters',
                                    'l' => 'Runs of 3+ rare codons',
                                    'h' => 'The stalling risk',
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
        
          // Relative adaptiveness in E. coli (the standard published table), two decimals.
          var W_ECOLI = {
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
          };
          // Eight steps from empty to full, so the track reads at a glance in text.
          var GLYPH = ['·', '▁', '▂', '▃', '▄', '▅', '▆', '█'];
          function bar(w) {
            var i = Math.round(Math.max(0, Math.min(1, w)) * (GLYPH.length - 1));
            return GLYPH[i];
          }
          omni.onResult(['sequence', 'window'], function (ctx) {
            var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
            var win = Math.round(Number(ctx.getRawInput('window')) || 30);
            if (!(win >= 1)) win = 30;
            win = Math.min(win, 500);
            if (seq.length < 6) {
              ctx.addHtml(block('Codon plot', '—', 'Paste a coding sequence of at least 6 bp.'));
              ctx.exportValue('codons', 0); ctx.exportValue('rare', 0); ctx.exportValue('clusters', 0);
              return;
            }
            var n = Math.floor(seq.length / 3);
            var scores = [], details = [], rare = 0, i;
            for (i = 0; i < n; i++) {
              var cod = seq.substr(i * 3, 3);
              var w = W_ECOLI[cod];
              if (w === undefined) { scores.push(null); details.push(null); continue; }
              scores.push(w);
              details.push(cod);
              if (w <= 0.2) rare++;
            }
            // runs of three or more scoring rare codons
            var runs = [], run = 0, runStart = 0;
            for (i = 0; i <= scores.length; i++) {
              var isRare = i < scores.length && scores[i] !== null && scores[i] <= 0.2;
              if (isRare) { if (run === 0) runStart = i + 1; run++; }
              else {
                if (run >= 3) runs.push({ start: runStart, len: run, codons: details.slice(runStart - 1, runStart - 1 + run).join(' ') });
                run = 0;
              }
            }
            // window averages for the summary table
            var rows = [], worst = null;
            for (i = 0; i < n; i += win) {
              var sum = 0, cnt = 0, rareInWin = 0;
              for (var j = i; j < Math.min(i + win, n); j++) {
                if (scores[j] === null) continue;
                sum += scores[j]; cnt++;
                if (scores[j] <= 0.2) rareInWin++;
              }
              var mean = cnt ? sum / cnt : 0;
              rows.push([(i + 1) + '–' + Math.min(i + win, n), cnt ? mean.toFixed(2) : '—',
                         String(rareInWin), rareInWin >= 3 ? 'check' : 'ok']);
              if (!worst || rareInWin > worst.rare) worst = { start: i + 1, rare: rareInWin };
            }
            // the track itself, wrapped to 60 codons per line
            var track = '';
            for (i = 0; i < n; i += 60) {
              var line = '';
              for (var k = i; k < Math.min(i + 60, n); k++) line += scores[k] === null ? '?' : bar(scores[k]);
              track += line + '\n';
            }
            var meanAll = 0, cntAll = 0;
            for (i = 0; i < n; i++) if (scores[i] !== null) { meanAll += scores[i]; cntAll++; }
            meanAll = cntAll ? meanAll / cntAll : 0;
            ctx.exportValue('codons', n);
            ctx.exportValue('rare', rare);
            ctx.exportValue('clusters', runs.length);
            var head = block('Codon plot — ' + n + ' codons',
              'Mean w            ' + meanAll.toFixed(3) + '\nRare codons       ' + rare
              + '\nRuns of 3+        ' + runs.length
              + '\nWorst window      ' + (worst ? worst.start + ' (first codon)' : '—'),
              'Legend: · w=0  ▁▂▃▄▅▆ rising  █ w=1.  A codon the table does not know is drawn as ?.');
            var runRows = runs.slice(0, 12).map(function (r) {
              return [String(r.start), String(r.len), r.codons];
            });
            var html = head + block('Track (one character per codon, 60 per line)', track)
              + table('Windows', ['Codons', 'Mean w', 'Rare', 'Verdict'], rows.slice(0, 20),
                      rows.length > 20 ? 'First 20 windows shown.' : '')
              + table('Runs of three or more rare codons', ['First codon', 'Length', 'Codons'],
                      runRows.length ? runRows : [['—', '0', 'none']],
                      runs.length > 12 ? 'First 12 runs shown.' : '');
            ctx.addHtml(html);
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Codon Plot takes Coding sequence (DNA) and Window size and returns Codons read and Rare codons (w ≤ 0.2). It is a single relationship that reads Codons read out of Coding sequence (DNA), not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Codon Plot calculator works', 'html' => <<<'TXT'
            <p>Codon Plot answers one question from 2 numbers, and the answer is Codons read, Rare codons (w ≤ 0.2) and Runs of 3+ rare codons.</p><p>The answers are Codons read, Rare codons (w ≤ 0.2) and Runs of 3+ rare codons; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Coding sequence (DNA)</strong> — a plain number, no unit. Paste the open reading frame; long sequences are summarised window by window</li><li><strong>Window size</strong> — in codons. How many codons each summary point covers</li></ul><p>What you get back is Codons read, Rare codons (w ≤ 0.2), Runs of 3+ rare codons, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Codons read takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Codons read, Rare codons (w ≤ 0.2) and Runs of 3+ rare codons are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Coding sequence (DNA) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Coding sequence (DNA) and Window size is what you already know and Codons read and Rare codons (w ≤ 0.2) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/vapor-pressure-deficit">Vapor pressure deficit Calculator</a>, <a href="/biology/vegetable-seed">Vegetable seed</a> and <a href="/biology/vegetable-yield">Vegetable yield</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which values do I need before I start?', 'a' => 'Coding sequence (DNA), Window size (codons). With sequence and window in place, Codons read can stay blank and the page will work it out.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Codons read is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Codons read, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Codons read keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/vapor-pressure-deficit', 'name' => 'Vapor pressure deficit Calculator'],
            ['path' => '/biology/vegetable-seed', 'name' => 'Vegetable seed'],
            ['path' => '/biology/vegetable-yield', 'name' => 'Vegetable yield'],
        ],
        'authors' => [],
    ],
];
