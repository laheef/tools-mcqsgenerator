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
    'meta' => ['title' => 'Hardy–Weinberg from the Heterozygote Frequency', 'description' => 'Enter heterozygote frequency (2pq) and Hardy–Weinberg from the Heterozygote Frequency returns p for the lower root and homozygote frequency, lower root.', 'h1' => 'Hardy–Weinberg from the Heterozygote Frequency', 'updated' => '2026-10-29'],
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
        Hardy–Weinberg from the Heterozygote Frequency works out q (lower root) and q (upper root) from Heterozygote frequency (2pq). The arithmetic is the whole method: q (lower root) is worked out from heterozygote frequency (2pq) by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Hardy–Weinberg from the Heterozygote Frequency calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Hardy–Weinberg from the Heterozygote Frequency: it takes 1 number and reports q (lower root), q (upper root) and p for the lower root.</p><p>The relationship it solves reads q (lower root) = (1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2.</p><p>The answers are q (lower root), q (upper root), p for the lower root and Homozygote frequency, lower root; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Heterozygote frequency (2pq)</strong> — a plain number, no unit. Between 0 and 0.5</li></ul><p>What you get back is q (lower root), q (upper root), p for the lower root, Homozygote frequency, lower root, Maximum possible 2pq, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Heterozygote frequency (2pq) = 0.42 — through the same formula and the panel reports <strong>q (lower root)</strong> = 0.3, <strong>q (upper root)</strong> = 0.7, <strong>p for the lower root</strong> = 0.7, <strong>Homozygote frequency, lower root</strong> = 0.58 and <strong>Maximum possible 2pq</strong> = 0.5.</p><ul><li><strong>q (lower root)</strong> = 0.3</li><li><strong>q (upper root)</strong> = 0.7</li><li><strong>p for the lower root</strong> = 0.7</li><li><strong>Homozygote frequency, lower root</strong> = 0.58</li><li><strong>Maximum possible 2pq</strong> = 0.5</li></ul><p>That is <strong>q (lower root)</strong> = <code>(1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>q (lower root)</strong> = 0.3, <strong>q (upper root)</strong> = 0.7, <strong>p for the lower root</strong> = 0.7, <strong>Homozygote frequency, lower root</strong> = 0.58 and <strong>Maximum possible 2pq</strong> = 0.5. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as q (lower root) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>q (lower root)</strong> = <code>(1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2</code></li><li><strong>q (upper root)</strong> = <code>(1 + √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2</code></li><li><strong>p for the lower root</strong> = <code>1 − (1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2</code></li><li><strong>Homozygote frequency, lower root</strong> = <code>(1 − (1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2)^(2) + ((1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2)^(2)</code></li><li><strong>Maximum possible 2pq</strong> = <code>0.5</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>q (lower root)</strong> = <code>(1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2</code> — the form to use when Heterozygote frequency (2pq) are the values you have.</li><li><strong>q (upper root)</strong> = <code>(1 + √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2</code> — the form to use when Heterozygote frequency (2pq) are the values you have.</li><li><strong>p for the lower root</strong> = <code>1 − (1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2</code> — the form to use when Heterozygote frequency (2pq) are the values you have.</li><li><strong>Homozygote frequency, lower root</strong> = <code>(1 − (1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2)^(2) + ((1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2)^(2)</code> — the form to use when Heterozygote frequency (2pq) are the values you have.</li><li><strong>Maximum possible 2pq</strong> = <code>0.5</code> — the form to use when the other values are known.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of q (lower root), q (upper root) and p for the lower root can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Heterozygote frequency (2pq), from 0.42 to 0.84 — and the answers go from <strong>q (lower root)</strong> 0.3, <strong>q (upper root)</strong> 0.7, <strong>p for the lower root</strong> 0.7, <strong>Homozygote frequency, lower root</strong> 0.58 and <strong>Maximum possible 2pq</strong> 0.5 to <strong>q (lower root)</strong> 0.5, <strong>q (upper root)</strong> 0.5, <strong>p for the lower root</strong> 0.5, <strong>Homozygote frequency, lower root</strong> 0.5 and <strong>Maximum possible 2pq</strong> 0.5.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> q (lower root), q (upper root) and p for the lower root are results: they are worked out from the boxes above and cannot be typed into, so a past answer has to be entered as one of the inputs instead.</li><li><strong>Heterozygote frequency (2pq) left as a guess.</strong> Anything typed into Heterozygote frequency (2pq) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Heterozygote frequency (2pq) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Hardy–Weinberg from the Heterozygote Frequency form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Heterozygote frequency (2pq)</strong> takes a plain number with no unit attached. Between 0 and 0.5. Change it and q (lower root), q (upper root) and p for the lower root changes with it. Fill it from a measurement rather than a memory — Heterozygote frequency (2pq) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>q (lower root)</strong> is a plain number and the page's own defaults put it at 0.3. The value follows from Heterozygote frequency (2pq). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>q (upper root)</strong> is a plain number and the page's own defaults put it at 0.7. The value follows from Heterozygote frequency (2pq). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>p for the lower root</strong> is a plain number and the page's own defaults put it at 0.7. The value follows from Heterozygote frequency (2pq). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Homozygote frequency, lower root</strong> is a plain number and the page's own defaults put it at 0.58. The value follows from Heterozygote frequency (2pq). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Maximum possible 2pq</strong> is a plain number and the page's own defaults put it at 0.5. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>q (lower root)</th><th>q (upper root)</th><th>p for the lower root</th><th>Homozygote frequency, lower root</th><th>Maximum possible 2pq</th></tr></thead><tbody><tr><td><strong>Heterozygote frequency (2pq)</strong> +10%</td><td>+20.72%</td><td>-8.88%</td><td>-8.88%</td><td>-7.24%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Heterozygote frequency (2pq): ten per cent there moves an answer by about 20.7 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Heterozygote frequency (2pq) = 0.21 and the page reports <strong>q (lower root)</strong> = 0.1192, <strong>q (upper root)</strong> = 0.8808, <strong>p for the lower root</strong> = 0.8808, <strong>Homozygote frequency, lower root</strong> = 0.79 and <strong>Maximum possible 2pq</strong> = 0.5.</li><li>Feed in Heterozygote frequency (2pq) = 1.26 and the page reports <strong>q (lower root)</strong> = 0.5, <strong>q (upper root)</strong> = 0.5, <strong>p for the lower root</strong> = 0.5, <strong>Homozygote frequency, lower root</strong> = 0.5 and <strong>Maximum possible 2pq</strong> = 0.5.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind q (lower root) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Heterozygote frequency (2pq) and the number you are missing is q (lower root) and q (upper root).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/mushroom-yield">Mushroom Yield Calculator</a>, <a href="/biology/mutation-frequency">Mutation frequency</a> and <a href="/biology/mutation-rate">Mutation rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hardy–Weinberg from the Heterozygote Frequency calculator work out?', 'a' => <<<'TXT'
            q (lower root), q (upper root), p for the lower root and Homozygote frequency, lower root, from Heterozygote frequency (2pq). The relationship is q (lower root) = (1 − √(1 − 2 × Heterozygote frequency (2pq))) ÷ 2.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Heterozygote frequency (2pq). Fill heterozygote frequency (2pq) and leave q (lower root) empty if you would rather have that one solved instead.'],
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
