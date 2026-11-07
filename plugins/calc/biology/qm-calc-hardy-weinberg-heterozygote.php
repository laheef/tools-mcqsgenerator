<?php

/**
 * Hardy–Weinberg from the Heterozygote Frequency
 * /biology/hardy-weinberg-heterozygote
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hardy–Weinberg from the Heterozygote Frequency',
    'meta' => ['title' => 'Hardy–Weinberg from the Heterozygote Frequency', 'description' => 'Hardy–Weinberg from the Heterozygote Frequency works out q (lower root) and q (upper root) from Heterozygote frequency (2pq). The arithmetic is the whole…', 'h1' => 'Hardy–Weinberg from the Heterozygote Frequency', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'hetero',
                            'label' => 'Heterozygote frequency (2pq)',
                            'type' => 'number',
                            'help' => 'Between 0 and 0.5',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.42',
                        ],
                        [
                            'name' => 'q_low',
                            'label' => 'q (lower root)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q_high',
                            'label' => 'q (upper root)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p_low',
                            'label' => 'p for the lower root',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'homo_low',
                            'label' => 'Homozygote frequency, lower root',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'max_note',
                            'label' => 'Maximum possible 2pq',
                            'type' => 'number',
                            'help' => '0.5',
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
            'title' => 'Roots',
            'results' => [
                'q_low' => '(1-sqrt(1-2*hetero))/2',
                'q_high' => '(1+sqrt(1-2*hetero))/2',
                'p_low' => '1-(1-sqrt(1-2*hetero))/2',
                'homo_low' => 'pow(1-(1-sqrt(1-2*hetero))/2,2)+pow((1-sqrt(1-2*hetero))/2,2)',
                'max_note' => '0.5',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Hardy–Weinberg from the Heterozygote Frequency works out q (lower root) and q (upper root) from Heterozygote frequency (2pq). The arithmetic is the whole method: q (lower root) is worked out from Heterozygote frequency (2pq) by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Hardy–Weinberg from the Heterozygote Frequency calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Hardy–Weinberg from the Heterozygote Frequency: it takes 1 number and reports q (lower root), q (upper root) and p for the lower root.</p><p>The relationship it solves reads q (lower root) = (1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2.</p><p>The answers are q (lower root), q (upper root), p for the lower root and Homozygote frequency, lower root; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Heterozygote frequency (2pq)</strong> — a plain number, no unit. Between 0 and 0.5</li></ul><p>What you get back is q (lower root), q (upper root), p for the lower root, Homozygote frequency, lower root, Maximum possible 2pq, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Heterozygote frequency (2pq) = 0.42 — through the same formula and the panel reports &lt;strong&gt;q (lower root)&lt;/strong&gt; = 0.3, &lt;strong&gt;q (upper root)&lt;/strong&gt; = 0.7, &lt;strong&gt;p for the lower root&lt;/strong&gt; = 0.7, &lt;strong&gt;Homozygote frequency, lower root&lt;/strong&gt; = 0.58 and &lt;strong&gt;Maximum possible 2pq&lt;/strong&gt; = 0.5.</p><ul><li><strong>q (lower root)</strong> = 0.3</li><li><strong>q (upper root)</strong> = 0.7</li><li><strong>p for the lower root</strong> = 0.7</li><li><strong>Homozygote frequency, lower root</strong> = 0.58</li><li><strong>Maximum possible 2pq</strong> = 0.5</li></ul><p>That is <strong>q (lower root)</strong> = <code>(1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;q (lower root)&lt;/strong&gt; = 0.3, &lt;strong&gt;q (upper root)&lt;/strong&gt; = 0.7, &lt;strong&gt;p for the lower root&lt;/strong&gt; = 0.7, &lt;strong&gt;Homozygote frequency, lower root&lt;/strong&gt; = 0.58 and &lt;strong&gt;Maximum possible 2pq&lt;/strong&gt; = 0.5. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as q (lower root) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>q (lower root)</strong> = <code>(1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2</code></li><li><strong>q (upper root)</strong> = <code>(1 + √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2</code></li><li><strong>p for the lower root</strong> = <code>1 − (1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2</code></li><li><strong>Homozygote frequency, lower root</strong> = <code>(1 − (1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2)^(2) + ((1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2)^(2)</code></li><li><strong>Maximum possible 2pq</strong> = <code>0.5</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of q (lower root), q (upper root) and p for the lower root can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Heterozygote frequency (2pq), from 0.42 to 0.84 — and the answers go from &lt;strong&gt;q (lower root)&lt;/strong&gt; 0.3, &lt;strong&gt;q (upper root)&lt;/strong&gt; 0.7, &lt;strong&gt;p for the lower root&lt;/strong&gt; 0.7, &lt;strong&gt;Homozygote frequency, lower root&lt;/strong&gt; 0.58 and &lt;strong&gt;Maximum possible 2pq&lt;/strong&gt; 0.5 to &lt;strong&gt;q (lower root)&lt;/strong&gt; 0.5, &lt;strong&gt;q (upper root)&lt;/strong&gt; 0.5, &lt;strong&gt;p for the lower root&lt;/strong&gt; 0.5, &lt;strong&gt;Homozygote frequency, lower root&lt;/strong&gt; 0.5 and &lt;strong&gt;Maximum possible 2pq&lt;/strong&gt; 0.5.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> q (lower root), q (upper root) and p for the lower root are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Heterozygote frequency (2pq) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Heterozygote frequency (2pq) and the number you are missing is q (lower root) and q (upper root).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/mushroom-yield">Mushroom Yield Calculator</a>, <a href="/biology/mutation-frequency">Mutation frequency</a> and <a href="/biology/mutation-rate">Mutation rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hardy–Weinberg from the Heterozygote Frequency calculator work out?', 'a' => <<<'TXT'
            q (lower root), q (upper root), p for the lower root and Homozygote frequency, lower root, from Heterozygote frequency (2pq). The relationship is q (lower root) = (1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Heterozygote frequency (2pq). Fill hetero and leave q (lower root) empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. q (lower root), q (upper root), p for the lower root and Homozygote frequency, lower root can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            q (lower root) = 0.3, q (upper root) = 0.7, p for the lower root = 0.7, Homozygote frequency, lower root = 0.58 and Maximum possible 2pq = 0.5. The figures come from Heterozygote frequency (2pq) as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            q (lower root) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Heterozygote frequency (2pq) blank and the page solves for it, reporting q (lower root) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. q (lower root) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/mushroom-yield', 'name' => 'Mushroom Yield Calculator'],
            ['path' => '/biology/mutation-frequency', 'name' => 'Mutation frequency'],
            ['path' => '/biology/mutation-rate', 'name' => 'Mutation rate Calculator'],
        ],
        'authors' => [],
    ],
];
