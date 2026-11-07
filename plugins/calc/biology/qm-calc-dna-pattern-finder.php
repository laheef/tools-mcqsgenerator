<?php

/**
 * DNA Pattern Finder
 * /biology/dna-pattern-finder
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA Pattern Finder',
    'meta' => ['title' => 'DNA Pattern Finder Calculator: Steps & Units', 'description' => 'DNA Pattern Finder searches a sequence for an IUPAC pattern on one strand or both and reports every match with its position. Either strand, or both at once.', 'h1' => 'DNA Pattern Finder', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'TTTGAATTCTTGGATCCAAGCTTAAAGAATTCAAGCTTGATATCGAATTCCCC', 'c' => null],
                ],
            ],
            'pattern' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'GAATTC', 'c' => null],
                ],
            ],
            'strand' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'both-strands', 'c' => null],
                ],
                'ds' => 'ds-strand',
            ],
            'matches_fwd' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'matches_rev' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'spacing' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-dna-pattern-finder',
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
                                    'h' => 'Paste DNA; headers, spaces and digits are ignored',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'pattern',
                                    'l' => 'Pattern (IUPAC allowed)',
                                    'h' => 'N = any base, R = A/G, Y = C/T, W = A/T, S = G/C, K = G/T, M = A/C',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'strand',
                                    'l' => 'Strand',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-strand',
                                    'opts' => [
                                        ['both-strands', 'Both strands', 'both'],
                                        ['forward-only', 'Forward only', 'forward'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'matches_fwd',
                                    'l' => 'Matches, forward strand',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'matches_rev',
                                    'l' => 'Matches, reverse strand',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'total',
                                    'l' => 'Total sites',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'spacing',
                                    'l' => 'Average spacing',
                                    'h' => 'Blank when there is only one site',
                                    'suf' => 'bp',
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
            'ds-strand' => [
                'name' => 'Strand',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'both-strands', 'label' => 'Both strands', 'value' => 'both'],
                    ['uid' => 'forward-only', 'label' => 'Forward only', 'value' => 'forward'],
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
        
          var IUPAC = {A:'A', C:'C', G:'G', T:'T', U:'T', R:'[AG]', Y:'[CT]', S:'[GC]', W:'[AT]',
                       K:'[GT]', M:'[AC]', B:'[CGT]', D:'[AGT]', H:'[ACT]', V:'[ACG]', N:'[ACGT]'};
          function patternToRegex(p) {
            var out = '';
            for (var i = 0; i < p.length; i++) {
              var c = p.charAt(i);
              if (!IUPAC[c]) return null;
              out += IUPAC[c];
            }
            return out;
          }
          function findAll(hay, re) {
            var g = new RegExp(re, 'g'), hits = [], m;
            while ((m = g.exec(hay)) !== null) {
              hits.push(m.index + 1);
              if (m.index === g.lastIndex) g.lastIndex++;
              if (hits.length > 5000) break;
            }
            return hits;
          }
          omni.onResult(['sequence', 'pattern', 'strand'], function (ctx) {
            var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
            var raw = String(ctx.getRawInput('pattern') || '').replace(/[^A-Za-z]/g, '').toUpperCase()
              .replace(/U/g, 'T');
            if (!seq) {
              ctx.addHtml(block('Pattern search', '—', 'Paste a sequence to search.'));
              return;
            }
            if (!raw) {
              ctx.addHtml(block('Pattern search', '—', 'Type the motif to look for, for example GAATTC.'));
              return;
            }
            var re = patternToRegex(raw);
            if (!re) {
              ctx.addHtml(block('Pattern search', 'Not a valid pattern',
                'Use only A, C, G, T and the IUPAC codes R Y S W K M B D H V N.'));
              return;
            }
            var fwd = findAll(seq, re);
            var rev = [];
            if (!/forward-only/i.test(String(ctx.getRawInput('strand') || ''))) {
              var rc = revcomp(seq);
              findAll(rc, re).forEach(function (p) {
                var start = seq.length - (p - 1) - raw.length + 1;
                if (fwd.indexOf(start) < 0) rev.push(start);
              });
            }
            var all = fwd.concat(rev).sort(function (a, b) { return a - b; });
            ctx.exportValue('matches_fwd', fwd.length);
            ctx.exportValue('matches_rev', rev.length);
            ctx.exportValue('total', all.length);
            if (all.length > 1 && all[all.length - 1] > all[0]) {
              ctx.exportValue('spacing', Math.round((all[all.length - 1] - all[0]) / (all.length - 1)));
            } else {
              ctx.exportValue('spacing', '');
            }
        
            ctx.addHtml(block('Pattern found',
              all.length + ' site' + (all.length === 1 ? '' : 's') + ' for ' + raw
              + (rev.length ? ' (' + fwd.length + ' forward, ' + rev.length + ' reverse)' : '')
              + ' in ' + seq.length + ' bp\n'
              + (all.length ? 'Positions: ' + all.slice(0, 60).join(', ') + (all.length > 60 ? ' …' : '') : '—'),
              all.length ? 'Positions are 1-based on the forward strand.' : 'No site found.'));
            if (all.length) {
              var rows = all.slice(0, 30).map(function (p) {
                var ctxs = seq.substr(Math.max(0, p - 6), raw.length + 10);
                return [String(p), p + raw.length - 1 > seq.length ? '—' : String(p + raw.length - 1),
                        (fwd.indexOf(p) >= 0 ? 'forward' : 'reverse'), ctxs];
              });
              ctx.addHtml(table('First sites', ['Start', 'End', 'Strand', 'Context ±5 bp'], rows));
            }
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        DNA Pattern Finder turns Sequence, Pattern (IUPAC allowed) and Strand into Matches, forward strand and Matches, reverse strand. Nothing is looked up on this page: matches, forward strand is computed from sequence and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the DNA Pattern Finder calculator works', 'html' => <<<'TXT'
            <p>DNA Pattern Finder answers one question from 3 numbers, and the answer is Matches, forward strand, Matches, reverse strand and Total sites.</p><p>The answers are Matches, forward strand, Matches, reverse strand, Total sites and Average spacing; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Sequence</strong> — a plain number, no unit. Paste DNA; headers, spaces and digits are ignored</li><li><strong>Pattern (IUPAC allowed)</strong> — a plain number, no unit. N = any base, R = A/G, Y = C/T, W = A/T, S = G/C, K = G/T, M = A/C</li><li><strong>Strand</strong> — a plain number, no unit</li></ul><p>What you get back is Matches, forward strand, Matches, reverse strand, Total sites, Average spacing in bp, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Matches, forward strand takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Matches, forward strand, Matches, reverse strand and Total sites are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Sequence left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Sequence is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Pattern (IUPAC allowed) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Pattern (IUPAC allowed) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Strand left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Strand is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Sequence to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Sequence</strong> takes a plain number with no unit attached. Paste DNA; headers, spaces and digits are ignored. Have it to hand before you start: Sequence is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Pattern (IUPAC allowed)</strong> takes a plain number with no unit attached. N = any base, R = A/G, Y = C/T, W = A/T, S = G/C, K = G/T, M = A/C. Have it to hand before you start: Pattern (IUPAC allowed) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Strand</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Strand is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Matches, forward strand</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Matches, reverse strand</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total sites</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Average spacing</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Pasting the sequence correctly', 'html' => <<<'TXT'
            <p>The box labelled <strong>Sequence</strong> and <strong>Pattern (IUPAC allowed)</strong> is the input the whole page is built around. It holds characters, and the page reads every one of them.</p><ul><li><strong>No header line.</strong> If the text was copied out of a file, check that the first line is not a description. Anything before the first real base or residue is counted as data.</li><li><strong>No spaces or line numbers.</strong> Sequence viewers wrap the text and number the lines. The numbers are not part of the sequence, and a paste that includes them will fail or, worse, half-succeed.</li><li><strong>Case is a choice you make.</strong> Many tools treat upper and lower case as the same letters and others do not. Paste the sequence in the case that carries the meaning you intend.</li><li><strong>Ambiguous characters are not rare.</strong> An N in a sequence, an X in a protein, or an IUPAC code standing for two possible bases is a real value, not a typo. The page will count it; interpret the answer with that in mind.</li></ul><p>Paste once, check the first and last few characters of what landed in the box, and then read Matches, forward strand, Matches, reverse strand, Total sites and Average spacing. If one of those figures is impossible — a length that does not match the text, a count larger than the sequence — the paste is the thing to look at first, not the formula.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>DNA Pattern Finder is not a single equation with a single answer. It reads Sequence, Pattern (IUPAC allowed) and Strand, applies the analysis the page is built around, and reports Matches, forward strand, Matches, reverse strand, Total sites and Average spacing.</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Matches, forward strand, Matches, reverse strand, Total sites and Average spacing. They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Matches, forward strand follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Sequence, Pattern (IUPAC allowed) and Strand are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Sequence, Pattern (IUPAC allowed) and Strand measured, Matches, forward strand and Matches, reverse strand wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/goat-years-to-human-years">Goat Years to Human Years Calculator</a>, <a href="/biology/goldfish-years-to-human-years">Goldfish Years to Human Years Calculator</a> and <a href="/biology/ghk-membrane-potential">Goldman–Hodgkin–Katz Membrane Potential Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from DNA Pattern Finder is a number to act on, so the useful question is what to do with Matches, forward strand, Matches, reverse strand and Total sites once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Sequence, Pattern (IUPAC allowed) and Strand alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA Pattern Finder calculator work out?', 'a' => 'Matches, forward strand, Matches, reverse strand, Total sites and Average spacing.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sequence, Pattern (IUPAC allowed), Strand. With sequence, pattern (IUPAC allowed) and strand in place, Matches, forward strand can stay blank and the page will work it out.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Matches, forward strand is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Matches, forward strand, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Matches, forward strand at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/goat-years-to-human-years', 'name' => 'Goat Years to Human Years Calculator'],
            ['path' => '/biology/goldfish-years-to-human-years', 'name' => 'Goldfish Years to Human Years Calculator'],
            ['path' => '/biology/ghk-membrane-potential', 'name' => 'Goldman–Hodgkin–Katz Membrane Potential Calculator'],
        ],
        'authors' => [],
    ],
];
