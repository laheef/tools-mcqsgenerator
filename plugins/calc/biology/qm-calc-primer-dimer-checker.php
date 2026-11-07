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
    'meta' => ['title' => 'Primer Dimer Checker Calculator — Formula & Results', 'description' => 'Primer dimers are the most common reason a PCR reaction produces no product: the primers pair with each other or with themselves and the polymerase extends…', 'h1' => 'Primer Dimer Checker', 'updated' => '2026-10-29'],
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
        Primer dimers are the most common reason a PCR reaction produces no product: the primers pair with each other or with themselves and the polymerase extends that product instead. It returns 3′ complementary run, longest complementary run, forward self-dimer run, reverse self-dimer run, forward hairpin stem, reverse hairpin stem and dimer risk score, and the panel shows all of them at once.
        
        This tool scores the 3′ complementarity of a pair, each primer's self-dimer and its hairpin, and says plainly whether the pair is safe.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Primer Dimer Checker', 'html' => <<<'TXT'
            <p>A 3′ run of k complementary bases contributes 3^(k−1) to the risk: 4 bases is 27× the chance of a 2-base match, because the polymerase only needs a short 3′ duplex to extend</p>
            <figure class="calc-figure"><img src="/uploads/biology/primer-dimer-checker.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Primer Dimer Checker — Dimer risk rises sharply with the length of the 3′ run" title="Primer Dimer Checker"><figcaption>Dimer risk rises sharply with the length of the 3′ run</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>3′ run</code></td><td>complementary bases at the 3′ ends, which can be extended</td><td>bases</td></tr><tr><td><code>hairpin</code></td><td>a primer folding back on itself</td><td>bases</td></tr><tr><td><code>ΔG</code></td><td>free energy of the dimer — lower is worse</td><td>kcal/mol</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Primer Dimer Checker?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>3′ run 0–2</td><td><strong>Safe</strong></td><td>no extension possible in practice</td></tr><tr><td>3′ run 3–4</td><td><strong>Watch</strong></td><td>some dimer forms; consider a redesign</td></tr><tr><td>3′ run 5+</td><td><strong>Redesign</strong></td><td>the pair will amplify a dimer instead of the target</td></tr></tbody></table>
            <ul><li><p>Only 3′ complementarity is extendable. A strong match in the middle of two primers looks alarming but the polymerase has no 3′ end to extend there.</p></li><li><p>Self-dimers matter as much as cross-dimers: a primer that can pair with another copy of itself doubles its own effective concentration.</p></li><li><p>A hairpin with a stem of four or more G–C pairs is stable enough to compete with template binding, especially at low annealing temperatures.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Checking only the forward primer against the reverse, and not each against itself.</li><li>Judging a dimer by the total number of complementary bases instead of the 3′ run.</li><li>Ignoring a 3′ G/C clamp that also happens to be complementary to the other primer's 3′ end.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many complementary bases cause a primer dimer?', 'a' => 'Three at the 3′ end is already a risk because that is where the polymerase extends; five or more will almost always dimerise.'],
            ['q' => 'What is the difference between a self-dimer and a hairpin?', 'a' => 'A self-dimer is two copies of the primer pairing; a hairpin is one primer folding back on itself.'],
            ['q' => 'Does a dimer always stop the PCR?', 'a' => 'No, but it consumes primers and polymerase, so the target product appears late or not at all, and a low band appears on the gel.'],
            ['q' => 'What does the Primer Dimer Checker actually calculate?', 'a' => <<<'TXT'
            It returns 3′ complementary run, longest complementary run, forward self-dimer run, reverse self-dimer run, forward hairpin stem, reverse hairpin stem and dimer risk score. Each one is derived by the formula on this page, so you can check any figure by hand.
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
