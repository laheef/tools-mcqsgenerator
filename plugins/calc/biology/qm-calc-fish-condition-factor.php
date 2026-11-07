<?php

/**
 * Fish Condition Factor Calculator
 * /biology/fish-condition-factor
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fish Condition Factor Calculator',
    'meta' => ['title' => 'Fish Condition Factor Calculator — Formula & Results', 'description' => 'Fish Condition Factor Calculator reports condition factor (K) and Expected weight at K = 1. Every box can be solved for, not only the one in the title.', 'h1' => 'Fish Condition Factor Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Fish weight',
                            'type' => 'number',
                            'suffix' => 'g',
                            'help' => 'Total body weight',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '250',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Fork length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Fork of the tail to the snout',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'k',
                            'label' => 'Condition factor (K)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'expected',
                            'label' => 'Expected weight at K = 1',
                            'type' => 'number',
                            'suffix' => 'g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'deviation',
                            'label' => 'Weight against K = 1',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Condition',
            'results' => [
                'k' => 'weight/length^3*100',
                'expected' => 'length^3/100',
                'deviation' => '(k-1)*100',
                'weight' => 'k*length^3/100',
                'length' => 'cbrt(weight*100/k)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fish Condition Factor takes Fish weight and Fork length and returns Condition factor (K) and Expected weight at K = 1. The arithmetic is the whole method: condition factor (K) is worked out from fish weight by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Fish Condition Factor calculator works', 'html' => <<<'TXT'
            <p>Fish Condition Factor answers one question from 2 numbers, and the answer is Condition factor (K), Expected weight at K = 1 and Weight against K = 1.</p><p>In the form&#039;s own words, Condition factor (K) = Fish weight ÷ Fork length ^ 3 × 100.</p><p>What comes back is Condition factor (K), Expected weight at K = 1 and Weight against K = 1 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Fish weight</strong> — in g. Total body weight</li><li><strong>Fork length</strong> — in cm. Fork of the tail to the snout</li></ul><p>The answers come back as Condition factor (K), Expected weight at K = 1 in g, Weight against K = 1 in %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Fish weight = 250 g and Fork length = 25 cm; the answers are <strong>Condition factor (K)</strong> = 1.6, <strong>Expected weight at K = 1</strong> = 156 g and <strong>Weight against K = 1</strong> = 60 %.</p><ul><li><strong>Condition factor (K)</strong> = 1.6</li><li><strong>Expected weight at K = 1</strong> = 156 g</li><li><strong>Weight against K = 1</strong> = 60 %</li></ul><p>That is <strong>Condition factor (K)</strong> = <code>Fish weight ÷ Fork length ^ 3 × 100</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Condition factor (K)</strong> = 1.6, <strong>Expected weight at K = 1</strong> = 156 and <strong>Weight against K = 1</strong> = 60 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Condition factor (K) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Condition factor (K)</strong> = <code>Fish weight ÷ Fork length ^ 3 × 100</code></li><li><strong>Expected weight at K = 1</strong> = <code>Fork length ^ 3 ÷ 100</code></li><li><strong>Weight against K = 1</strong> = <code>(Condition factor (K) − 1) × 100</code></li><li><strong>Fish weight</strong> = <code>Condition factor (K) × Fork length ^ 3 ÷ 100</code></li><li><strong>Fork length</strong> = <code>cbrt(Fish weight × 100 ÷ Condition factor (K))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Condition factor (K)</strong> = <code>Fish weight ÷ Fork length ^ 3 × 100</code> — the form to use when Fish weight and Fork length are the values you have.</li><li><strong>Expected weight at K = 1</strong> = <code>Fork length ^ 3 ÷ 100</code> — the form to use when Fork length are the values you have.</li><li><strong>Weight against K = 1</strong> = <code>(Condition factor (K) − 1) × 100</code> — the form to use when Condition factor (K) are the values you have.</li><li><strong>Fish weight</strong> = <code>Condition factor (K) × Fork length ^ 3 ÷ 100</code> — the form to use when Condition factor (K) and Fork length are the values you have.</li><li><strong>Fork length</strong> = <code>cbrt(Fish weight × 100 ÷ Condition factor (K))</code> — the form to use when Fish weight and Condition factor (K) are the values you have.</li></ul><p>Any one of Condition factor (K), Expected weight at K = 1 and Weight against K = 1 can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Fish weight, from 250 to 500 — and the answers go from <strong>Condition factor (K)</strong> 1.6, <strong>Expected weight at K = 1</strong> 156 g and <strong>Weight against K = 1</strong> 60 % to <strong>Condition factor (K)</strong> 3.2, <strong>Expected weight at K = 1</strong> 156 g and <strong>Weight against K = 1</strong> 220 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Condition factor (K), Expected weight at K = 1 and Weight against K = 1 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Fish weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Fish weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Fork length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Fork length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Fish weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Fish weight</strong> is measured in g. Total body weight. The page reads it when it works out Condition factor (K) and Fork length. Have it to hand before you start: Fish weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Fork length</strong> is measured in cm. Fork of the tail to the snout. The page reads it when it works out Condition factor (K), Expected weight at K = 1 and Fish weight. Have it to hand before you start: Fork length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Condition factor (K)</strong> is a plain number and the page's own defaults put it at 1.6. It is worked out from Fish weight and Fork length. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Expected weight at K = 1</strong> is a plain number and the page's own defaults put it at 156. It is worked out from Fork length. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Weight against K = 1</strong> is a plain number and the page's own defaults put it at 60. It is worked out from Condition factor (K). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Condition factor (K)</th><th>Expected weight at K = 1</th><th>Weight against K = 1</th></tr></thead><tbody><tr><td><strong>Fish weight</strong> +10%</td><td>+10%</td><td>+0%</td><td>+26.67%</td></tr><tr><td><strong>Fork length</strong> +10%</td><td>-24.87%</td><td>+33.1%</td><td>-66.32%</td></tr></tbody></table><p>Ranked by leverage, Fork length sits at the top — a ten per cent error in that box shows up as roughly 66.3 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Fish weight = 125 g and Fork length = 12.5 cm, the answer is <strong>Condition factor (K)</strong> = 6.4, <strong>Expected weight at K = 1</strong> = 19.53 g and <strong>Weight against K = 1</strong> = 540 %.</li><li>With Fish weight = 750 g and Fork length = 25 cm, the answer is <strong>Condition factor (K)</strong> = 4.8, <strong>Expected weight at K = 1</strong> = 156 g and <strong>Weight against K = 1</strong> = 380 %.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Condition factor (K) is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Fish weight and Fork length is what you already know and Condition factor (K) and Expected weight at K = 1 is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/species-richness">Species Richness Calculator</a>, <a href="/biology/specific-growth-rate-od">Specific Growth Rate from OD Calculator</a> and <a href="/biology/specific-growth-rate-from-od">Specific Growth Rate from OD Readings Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Fish Condition Factor is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Fish weight and Fork length beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fish Condition Factor calculator work out?', 'a' => <<<'TXT'
            Condition factor (K), Expected weight at K = 1 and Weight against K = 1, from Fish weight and Fork length. The relationship is Condition factor (K) = Fish weight ÷ Fork length ^ 3 × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Fish weight (g), Fork length (cm). Fill fish weight and fork length and leave Condition factor (K) empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Condition factor (K), Expected weight at K = 1, Weight against K = 1 and Fish weight blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Condition factor (K) = 1.6, Expected weight at K = 1 = 156 g and Weight against K = 1 = 60 %. The figures come from Fish weight as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Condition factor (K) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Fish weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Condition factor (K) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/species-richness', 'name' => 'Species Richness Calculator'],
            ['path' => '/biology/specific-growth-rate-od', 'name' => 'Specific Growth Rate from OD Calculator'],
            ['path' => '/biology/specific-growth-rate-from-od', 'name' => 'Specific Growth Rate from OD Readings Calculator'],
        ],
        'authors' => [],
    ],
];
