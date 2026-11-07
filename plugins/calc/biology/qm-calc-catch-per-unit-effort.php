<?php

/**
 * Catch Per Unit Effort Calculator
 * /biology/catch-per-unit-effort
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Catch Per Unit Effort Calculator',
    'meta' => ['title' => 'Catch Per Unit Effort Calculator — Formula & Results', 'description' => 'Enter Catch, Effort and CPUE in an earlier survey into Catch Per Unit Effort and the answer comes back as Catch per unit effort and Change in CPUE.', 'h1' => 'Catch Per Unit Effort Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'catch_count',
                            'label' => 'Catch',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '340',
                        ],
                        [
                            'name' => 'effort',
                            'label' => 'Effort',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'help' => 'Hours, hooks, tows or traps',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'cpue',
                            'label' => 'Catch per unit effort',
                            'type' => 'number',
                            'suffix' => '/hour',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'previous',
                            'label' => 'CPUE in an earlier survey',
                            'type' => 'number',
                            'suffix' => '/hour',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'change',
                            'label' => 'Change in CPUE',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'decline_rate',
                            'label' => 'Implied annual change',
                            'type' => 'number',
                            'suffix' => '%/year',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'CPUE',
            'results' => ['cpue' => 'catch_count/effort', 'change' => '(catch_count/effort-previous)/previous*100', 'decline_rate' => '(catch_count/effort-previous)/previous*100/5'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Catch, Effort and CPUE in an earlier survey into Catch Per Unit Effort and the answer comes back as Catch per unit effort and Change in CPUE. The arithmetic is the whole method: Catch per unit effort is worked out from Catch by one formula, applied once. Catch per unit effort comes back in /hour unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Catch Per Unit Effort calculator works', 'html' => <<<'TXT'
            <p>The Catch Per Unit Effort calculator applies one relationship to 3 numbers and reports Catch per unit effort, Change in CPUE and Implied annual change.</p><p>The relationship it solves reads Catch per unit effort = Catch ÷ Effort.</p><p>The result panel carries Catch per unit effort, Change in CPUE and Implied annual change, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Catch</strong> — in individuals</li><li><strong>Effort</strong> — in hours. Hours, hooks, tows or traps</li><li><strong>CPUE in an earlier survey</strong> — in /hour</li></ul><p>The result boxes are Catch per unit effort in /hour, Change in CPUE in %, Implied annual change in %/year; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Catch = 340 individuals, Effort = 40 hours and CPUE in an earlier survey = 12 /hour; the answers are &lt;strong&gt;Catch per unit effort&lt;/strong&gt; = 8.5 /hour, &lt;strong&gt;Change in CPUE&lt;/strong&gt; = -29.17 % and &lt;strong&gt;Implied annual change&lt;/strong&gt; = -5.83 %/year.</p><ul><li><strong>Catch per unit effort</strong> = 8.5 /hour</li><li><strong>Change in CPUE</strong> = -29.17 %</li><li><strong>Implied annual change</strong> = -5.83 %/year</li></ul><p>That is <strong>Catch per unit effort</strong> = <code>Catch ÷ Effort</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Catch per unit effort&lt;/strong&gt; = 8.5, &lt;strong&gt;Change in CPUE&lt;/strong&gt; = -29.17 and &lt;strong&gt;Implied annual change&lt;/strong&gt; = -5.83. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Catch per unit effort is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Catch per unit effort</strong> = <code>Catch ÷ Effort</code></li><li><strong>Change in CPUE</strong> = <code>(Catch ÷ Effort − CPUE in an earlier survey) ÷ CPUE in an earlier survey × 100</code></li><li><strong>Implied annual change</strong> = <code>(Catch ÷ Effort − CPUE in an earlier survey) ÷ CPUE in an earlier survey × 100 ÷ 5</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Catch per unit effort, Change in CPUE and Implied annual change can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Catch, from 340 to 680 — and the answers go from &lt;strong&gt;Catch per unit effort&lt;/strong&gt; 8.5 /hour, &lt;strong&gt;Change in CPUE&lt;/strong&gt; -29.17 % and &lt;strong&gt;Implied annual change&lt;/strong&gt; -5.83 %/year to &lt;strong&gt;Catch per unit effort&lt;/strong&gt; 17 /hour, &lt;strong&gt;Change in CPUE&lt;/strong&gt; 41.67 % and &lt;strong&gt;Implied annual change&lt;/strong&gt; 8.33 %/year.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Catch per unit effort, Change in CPUE and Implied annual change are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Catch to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Catch, Effort and CPUE in an earlier survey measured, Catch per unit effort and Change in CPUE wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/dilution-calculator-c1v1">Dilution (C1V1 = C2V2) Calculator</a>, <a href="/biology/dna-concentration">DNA concentration</a> and <a href="/biology/dna-copy-number">DNA copy number Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Catch Per Unit Effort calculator work out?', 'a' => 'Catch per unit effort, Change in CPUE and Implied annual change, from Catch and Effort. The relationship is Catch per unit effort = Catch ÷ Effort.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Catch (individuals), Effort (hours), CPUE in an earlier survey (/hour). Fill catch_count, effort and previous and leave Catch per unit effort empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Catch per unit effort, Change in CPUE and Implied annual change can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Catch per unit effort = 8.5 /hour, Change in CPUE = -29.17 % and Implied annual change = -5.83 %/year. Those are the defaults written into the form — move Catch and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Catch per unit effort is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Catch blank and the page solves for it, reporting Catch per unit effort instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Catch per unit effort at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/dilution-calculator-c1v1', 'name' => 'Dilution (C1V1 = C2V2) Calculator'],
            ['path' => '/biology/dna-concentration', 'name' => 'DNA concentration'],
            ['path' => '/biology/dna-copy-number', 'name' => 'DNA copy number Calculator'],
        ],
        'authors' => [],
    ],
];
