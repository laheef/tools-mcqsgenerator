<?php

/**
 * Primer Dimer Checker
 * /biology/primer-dimer-checker
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Primer Dimer Checker',
    'meta' => ['title' => 'Primer Dimer Checker Calculator — Formula & Results', 'description' => <<<'TXT'
    Primer Dimer Checker works out 3′ complementary run from forward primer (5′→3′). Each box lists the units it accepts, and the answer converts between them.
    TXT, 'h1' => 'Primer Dimer Checker', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'forward' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ATGGCCATTGTAATGGGCCG', 'c' => null],
                ],
            ],
            'reverse' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'CTATCGGGCACCCTTTCAG', 'c' => null],
                ],
            ],
            'tail_run' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'any_run' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'self_fwd' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'self_rev' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'hairpin_fwd' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'hairpin_rev' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'risk' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-primer-dimer-checker',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'forward',
                                    'l' => 'Forward primer (5′→3′)',
                                    'h' => 'Paste the primer',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'reverse',
                                    'l' => 'Reverse primer (5′→3′)',
                                    'h' => 'Paste the primer',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'tail_run',
                                    'l' => '3′ complementary run',
                                    'h' => '3 or more is a risk',
                                    'suf' => 'bases',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'any_run',
                                    'l' => 'Longest complementary run',
                                    'h' => 'Anywhere in the pair',
                                    'suf' => 'bases',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'self_fwd',
                                    'l' => 'Forward self-dimer run',
                                    'suf' => 'bases',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'self_rev',
                                    'l' => 'Reverse self-dimer run',
                                    'suf' => 'bases',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'hairpin_fwd',
                                    'l' => 'Forward hairpin stem',
                                    'h' => '4 or more can misprime',
                                    'suf' => 'bases',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'hairpin_rev',
                                    'l' => 'Reverse hairpin stem',
                                    'suf' => 'bases',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'risk',
                                    'l' => 'Dimer risk score',
                                    'h' => '0 is clean, 10 is a guaranteed dimer',
                                    'suf' => 'of 10',
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
          var COMP = {A:'T',T:'A',G:'C',C:'G',U:'A',R:'Y',Y:'R',S:'S',W:'W',K:'M',M:'K',
                      B:'V',V:'B',D:'H',H:'D',N:'N'};
          function revcomp(s) {
            var out = '';
            for (var i = s.length - 1; i >= 0; i--) out += COMP[s.charAt(i)] || 'N';
            return out;
          }
        
          function longestRun(a, b) {
            // longest stretch where a[i..] pairs with b[..] read backwards
            a = a.slice(0, 60); b = b.slice(0, 60);
            var best = 0;
            for (var i = 0; i < a.length; i++) {
              for (var j = 0; j < b.length; j++) {
                var k = 0;
                while (i + k < a.length && j - k >= 0 && COMP[a.charAt(i + k)] === b.charAt(j - k)) k++;
                if (k > best) best = k;
              }
            }
            return best;
          }
          function endRun(a, b) {
            // Two primers anneal antiparallel, so their 3' ends sit opposite each other:
            // position 1 from the 3' end of one pairs with position 1 from the 3' end of
            // the other. The run is how far that pairing continues before a mismatch.
            var best = 0;
            for (var k = 1; k <= Math.min(a.length, b.length); k++) {
              if (COMP[a.charAt(a.length - k)] === b.charAt(b.length - k)) best = k; else break;
            }
            return best;
          }
          function hairpinStem(p) {
            // a stem needs a loop of at least three bases between the two halves
            var best = 0;
            for (var loop = 3; loop <= 12; loop++) {
              for (var i = 0; i + loop < p.length; i++) {
                var k = 0;
                while (i - k >= 0 && i + loop + k < p.length
                       && COMP[p.charAt(i - k)] === p.charAt(i + loop + k)) k++;
                if (k > best) best = k;
              }
            }
            return best;
          }
          omni.onResult(['forward', 'reverse'], function (ctx) {
            var f = cleanSeq(ctx.getRawInput('forward'), 'dna').slice(0, 100);
            var r = cleanSeq(ctx.getRawInput('reverse'), 'dna').slice(0, 100);
            if (!f || !r) {
              ctx.addHtml(block('Primer dimers', '—', 'Paste both primers to check the pair.'));
              return;
            }
            var tail = Math.max(endRun(f, r), endRun(r, f));
            var any = longestRun(f, r);
            var selfF = longestRun(f, f), selfR = longestRun(r, r);
            var hairF = hairpinStem(f), hairR = hairpinStem(r);
            var score = 0;
            if (tail >= 2) score += Math.min(6, Math.pow(3, tail - 2));
            if (Math.max(selfF, selfR) >= 4) score += 2;
            if (Math.max(hairF, hairR) >= 4) score += 2;
            score = Math.min(10, score);
        
            ctx.exportValue('tail_run', tail);
            ctx.exportValue('any_run', any);
            ctx.exportValue('self_fwd', selfF);
            ctx.exportValue('self_rev', selfR);
            ctx.exportValue('hairpin_fwd', hairF);
            ctx.exportValue('hairpin_rev', hairR);
            ctx.exportValue('risk', score);
        
            var verdict = tail >= 5 ? 'Redesign the pair'
              : tail >= 3 ? 'Risk of dimers — consider a redesign'
              : 'No significant 3′ complementarity';
            ctx.addHtml(block('Verdict',
              verdict + '\n3′ complementary run: ' + tail + ' base' + (tail === 1 ? '' : 's')
              + '\nLongest run anywhere: ' + any + ' bases'
              + '\nSelf-dimers: forward ' + selfF + ', reverse ' + selfR
              + '\nHairpin stems: forward ' + hairF + ', reverse ' + hairR
              + '\nRisk score: ' + score + '/10',
              tail >= 3
                ? 'A polymerase can extend a 3′ duplex of three or more bases, so the primer pair will '
                  + 'amplify a dimer. Move the 3′ end a base or two, or trim it.'
                : 'Nothing at the 3′ ends can be extended, which is what matters for dimer formation.'));
            ctx.addHtml(table('Detail', ['Check', 'Bases', 'Reads as'],
              [['3′ cross-dimer', String(tail), tail >= 3 ? 'extendable — a real risk' : 'not extendable'],
               ['Anywhere in the pair', String(any), any >= 6 ? 'strong but not extendable' : 'minor'],
               ['Forward self-dimer', String(selfF), selfF >= 5 ? 'will self-pair' : 'acceptable'],
               ['Reverse self-dimer', String(selfR), selfR >= 5 ? 'will self-pair' : 'acceptable'],
               ['Forward hairpin', String(hairF), hairF >= 4 ? 'stable enough to misprime' : 'unlikely'],
               ['Reverse hairpin', String(hairR), hairR >= 4 ? 'stable enough to misprime' : 'unlikely']]));
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Primer Dimer Checker turns Forward primer (5′→3′) and Reverse primer (5′→3′) into 3′ complementary run and Longest complementary run. There is no hidden constant here: change 3′ complementary run and forward primer (5′→3′) moves with it. The main result, 3′ complementary run, is reported in bases.
        TXT,
        'sections' => [
            ['title' => 'How the Primer Dimer Checker calculator works', 'html' => <<<'TXT'
            <p>The Primer Dimer Checker calculator applies one relationship to 2 numbers and reports 3′ complementary run, Longest complementary run and Forward self-dimer run.</p><p>The answers are 3′ complementary run, Longest complementary run, Forward self-dimer run and Reverse self-dimer run; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Forward primer (5′→3′)</strong> — a plain number, no unit. Paste the primer</li><li><strong>Reverse primer (5′→3′)</strong> — a plain number, no unit. Paste the primer</li></ul><p>What you get back is 3′ complementary run in bases, Longest complementary run in bases, Forward self-dimer run in bases, Reverse self-dimer run in bases, Forward hairpin stem in bases, Reverse hairpin stem in bases, Dimer risk score in of 10, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: 3′ complementary run takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with 3′ complementary run, Longest complementary run and Forward self-dimer run are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Forward primer (5′→3′) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Forward primer (5′→3′) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Reverse primer (5′→3′) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Reverse primer (5′→3′) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Forward primer (5′→3′) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Primer Dimer Checker form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Forward primer (5′→3′)</strong> takes a plain number with no unit attached. Paste the primer. Fill it from a measurement rather than a memory — Forward primer (5′→3′) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Reverse primer (5′→3′)</strong> takes a plain number with no unit attached. Paste the primer. Fill it from a measurement rather than a memory — Reverse primer (5′→3′) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>3′ complementary run</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Longest complementary run</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Forward self-dimer run</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Reverse self-dimer run</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Forward hairpin stem</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Reverse hairpin stem</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Dimer risk score</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Pasting the sequence correctly', 'html' => <<<'TXT'
            <p><strong>Forward primer (5′→3′)</strong> and <strong>Reverse primer (5′→3′)</strong> takes text, not a number, so the way it is pasted decides whether the analysis is right.</p><ul><li><strong>No header line.</strong> A FASTA file starts with a line that begins with &quot;&gt;&quot; — a name, not a sequence. Paste from the line below it, or that line is read as characters of its own.</li><li><strong>No spaces or line numbers.</strong> Nucleotide and protein text is often printed in blocks of sixty or eighty characters. Line breaks are usually fine; spaces, tabs and the numbers down the side are not.</li><li><strong>Case is a choice you make.</strong> Upper-case is the convention, but lower-case is often used to mark a region such as soft-masked repeats. Whether the page folds case or respects it is part of what it is telling you, so keep the case you mean.</li><li><strong>Ambiguous characters are not rare.</strong> Sites where the read was uncertain are usually written as N or as a degenerate code. They are counted like any other character, which is right, but it means the answer describes the text as written rather than the molecule as it is.</li></ul><p>The quick check is always the same: does the reported length match the text you pasted? If 3′ complementary run, Longest complementary run, Forward self-dimer run and Reverse self-dimer run disagree with what you can count by eye, the box is holding something you did not intend to give it.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes Primer Dimer Checker, works through it, and the panel lists Forward primer (5′→3′) and Reverse primer (5′→3′).</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is 3′ complementary run, Longest complementary run, Forward self-dimer run and Reverse self-dimer run — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Forward primer (5′→3′) and Reverse primer (5′→3′) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Forward primer (5′→3′) — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check 3′ complementary run in bases against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> 3′ complementary run follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Forward primer (5′→3′) and Reverse primer (5′→3′) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Forward primer (5′→3′) and Reverse primer (5′→3′) and the number you are missing is 3′ complementary run and Longest complementary run.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/specific-growth-rate-od">Specific Growth Rate from OD Calculator</a>, <a href="/biology/specific-growth-rate-from-od">Specific Growth Rate from OD Readings Calculator</a> and <a href="/biology/specific-productivity-qp">Specific Productivity (qP) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Primer Dimer Checker calculator work out?', 'a' => '3′ complementary run, Longest complementary run, Forward self-dimer run and Reverse self-dimer run.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Forward primer (5′→3′), Reverse primer (5′→3′). Enter forward primer (5′→3′) and reverse primer (5′→3′); 3′ complementary run is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            3′ complementary run is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: 3′ complementary run is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of 3′ complementary run keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/specific-growth-rate-od', 'name' => 'Specific Growth Rate from OD Calculator'],
            ['path' => '/biology/specific-growth-rate-from-od', 'name' => 'Specific Growth Rate from OD Readings Calculator'],
            ['path' => '/biology/specific-productivity-qp', 'name' => 'Specific Productivity (qP) Calculator'],
        ],
        'authors' => [],
    ],
];
