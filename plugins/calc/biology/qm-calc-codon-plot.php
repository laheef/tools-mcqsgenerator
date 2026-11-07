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
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Codons read, Rare codons (w ≤ 0.2) and Runs of 3+ rare codons are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Coding sequence (DNA) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Coding sequence (DNA) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Window size left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Window size is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Coding sequence (DNA) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Coding sequence (DNA)</strong> takes a plain number with no unit attached. Paste the open reading frame; long sequences are summarised window by window. Have it to hand before you start: Coding sequence (DNA) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Window size</strong> is measured in codons. How many codons each summary point covers. Have it to hand before you start: Window size is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Codons read</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Rare codons (w ≤ 0.2)</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Runs of 3+ rare codons</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Pasting the sequence correctly', 'html' => <<<'TXT'
            <p>The box labelled &lt;strong&gt;Coding sequence (DNA)&lt;/strong&gt; is the input the whole page is built around. It holds characters, and the page reads every one of them.</p><ul><li><strong>No header line.</strong> If the text was copied out of a file, check that the first line is not a description. Anything before the first real base or residue is counted as data.</li><li><strong>No spaces or line numbers.</strong> Sequence viewers wrap the text and number the lines. The numbers are not part of the sequence, and a paste that includes them will fail or, worse, half-succeed.</li><li><strong>Case is a choice you make.</strong> Many tools treat upper and lower case as the same letters and others do not. Paste the sequence in the case that carries the meaning you intend.</li><li><strong>Ambiguous characters are not rare.</strong> An N in a sequence, an X in a protein, or an IUPAC code standing for two possible bases is a real value, not a typo. The page will count it; interpret the answer with that in mind.</li></ul><p>Paste once, check the first and last few characters of what landed in the box, and then read Codons read, Rare codons (w ≤ 0.2) and Runs of 3+ rare codons. If one of those figures is impossible — a length that does not match the text, a count larger than the sequence — the paste is the thing to look at first, not the formula.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Codon Plot is not a single equation with a single answer. It reads Coding sequence (DNA) and Window size, applies the analysis the page is built around, and reports Codons read, Rare codons (w ≤ 0.2) and Runs of 3+ rare codons.</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Codons read, Rare codons (w ≤ 0.2) and Runs of 3+ rare codons. They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Coding sequence (DNA) and Window size. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Coding sequence (DNA) into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Codons read with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Codons read follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Coding sequence (DNA) and Window size are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Coding sequence (DNA) and Window size is what you already know and Codons read and Rare codons (w ≤ 0.2) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/vapor-pressure-deficit">Vapor pressure deficit Calculator</a>, <a href="/biology/vegetable-seed">Vegetable seed</a> and <a href="/biology/vegetable-yield">Vegetable yield</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Codon Plot calculator work out?', 'a' => 'Codons read, Rare codons (w ≤ 0.2) and Runs of 3+ rare codons.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Coding sequence (DNA), Window size (codons). With sequence and window in place, Codons read can stay blank and the page will work it out.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Codons read is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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
