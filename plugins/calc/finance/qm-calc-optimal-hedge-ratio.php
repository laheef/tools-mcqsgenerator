<?php

/**
 * Optimal hedge ratio
 * /finance/optimal-hedge-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Optimal hedge ratio',
    'meta' => ['title' => 'Optimal hedge ratio — Free Online Calculator', 'description' => 'Enter standard deviation of changes in spot price and standard deviation of changes in future price and get optimal hedge ratio back. A worked example follows.', 'h1' => 'Optimal hedge ratio Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'std_spot',
                            'label' => 'Standard deviation of changes in spot price',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'std_future',
                            'label' => 'Standard deviation of changes in future price',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'correlation',
                            'label' => 'Correlation coefficient',
                            'type' => 'number',
                            'help' => 'The correlation coefficient between the changes in the spot and futures prices.',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'optimal_hedge',
                            'label' => 'Optimal hedge ratio',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'optimal_hedge = correlation * (std_spot / std_future)',
            'results' => ['optimal_hedge' => 'correlation*std_spot/std_future', 'std_spot' => 'optimal_hedge*std_future/correlation', 'correlation' => 'optimal_hedge*std_future/std_spot', 'std_future' => 'correlation*std_spot/optimal_hedge'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Optimal hedge ratio works out Optimal hedge ratio from Standard deviation of changes in spot price, Standard deviation of changes in future price and Correlation coefficient. There is no hidden constant here: change optimal hedge ratio and standard deviation of changes in spot price moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Optimal hedge ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Optimal hedge ratio: it takes 3 numbers and reports Optimal hedge ratio.</p><p>In the form&#039;s own words, Optimal hedge ratio = Correlation coefficient × Standard deviation of changes in spot price ÷ Standard deviation of changes in future price.</p><p>What comes back is Optimal hedge ratio — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Standard deviation of changes in spot price</strong> — a plain number, no unit</li><li><strong>Standard deviation of changes in future price</strong> — a plain number, no unit</li><li><strong>Correlation coefficient</strong> — a plain number, no unit. The correlation coefficient between the changes in the spot and futures prices.</li></ul><p>What you get back is Optimal hedge ratio, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Standard deviation of changes in spot price = 10, Standard deviation of changes in future price = 100 and Correlation coefficient = 1000 gives <strong>Optimal hedge ratio</strong> = 100.</p><ul><li><strong>Optimal hedge ratio</strong> = 100</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Optimal hedge ratio</strong> = <code>Correlation coefficient × Standard deviation of changes in spot price ÷ Standard deviation of changes in future price</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Optimal hedge ratio</strong> = 100. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Optimal hedge ratio is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Optimal hedge ratio</strong> = <code>Correlation coefficient × Standard deviation of changes in spot price ÷ Standard deviation of changes in future price</code></li><li><strong>Standard deviation of changes in spot price</strong> = <code>Optimal hedge ratio × Standard deviation of changes in future price ÷ Correlation coefficient</code></li><li><strong>Correlation coefficient</strong> = <code>Optimal hedge ratio × Standard deviation of changes in future price ÷ Standard deviation of changes in spot price</code></li><li><strong>Standard deviation of changes in future price</strong> = <code>Correlation coefficient × Standard deviation of changes in spot price ÷ Optimal hedge ratio</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Optimal hedge ratio</strong> = <code>Correlation coefficient × Standard deviation of changes in spot price ÷ Standard deviation of changes in future price</code> — the form to use when Correlation coefficient, Standard deviation of changes in spot price and Standard deviation of changes in future price are the values you have.</li><li><strong>Standard deviation of changes in spot price</strong> = <code>Optimal hedge ratio × Standard deviation of changes in future price ÷ Correlation coefficient</code> — the form to use when Optimal hedge ratio, Standard deviation of changes in future price and Correlation coefficient are the values you have.</li><li><strong>Correlation coefficient</strong> = <code>Optimal hedge ratio × Standard deviation of changes in future price ÷ Standard deviation of changes in spot price</code> — the form to use when Optimal hedge ratio, Standard deviation of changes in future price and Standard deviation of changes in spot price are the values you have.</li><li><strong>Standard deviation of changes in future price</strong> = <code>Correlation coefficient × Standard deviation of changes in spot price ÷ Optimal hedge ratio</code> — the form to use when Correlation coefficient, Standard deviation of changes in spot price and Optimal hedge ratio are the values you have.</li></ul><p>Any one of Optimal hedge ratio, Standard deviation of changes in spot price and Correlation coefficient can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Standard deviation of changes in spot price from 10 to 20, leaving every other box alone. The panel moves from <strong>Optimal hedge ratio</strong> 100 to <strong>Optimal hedge ratio</strong> 200.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Optimal hedge ratio is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Standard deviation of changes in spot price left as a guess.</strong> Anything typed into Standard deviation of changes in spot price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Standard deviation of changes in future price left as a guess.</strong> Anything typed into Standard deviation of changes in future price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Correlation coefficient left as a guess.</strong> Anything typed into Correlation coefficient is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Standard deviation of changes in spot price and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Optimal hedge ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Standard deviation of changes in spot price</strong> takes a plain number with no unit attached. Change it and Optimal hedge ratio, Correlation coefficient and Standard deviation of changes in future price changes with it. Fill it from a measurement rather than a memory — Standard deviation of changes in spot price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Standard deviation of changes in future price</strong> takes a plain number with no unit attached. Change it and Optimal hedge ratio, Standard deviation of changes in spot price and Correlation coefficient changes with it. Fill it from a measurement rather than a memory — Standard deviation of changes in future price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Correlation coefficient</strong> takes a plain number with no unit attached. The correlation coefficient between the changes in the spot and futures prices. Change it and Optimal hedge ratio, Standard deviation of changes in spot price and Standard deviation of changes in future price changes with it. Fill it from a measurement rather than a memory — Correlation coefficient is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Optimal hedge ratio</strong> is a plain number and the page's own defaults put it at 100. It is worked out from Correlation coefficient, Standard deviation of changes in spot price and Standard deviation of changes in future price. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Optimal hedge ratio</th></tr></thead><tbody><tr><td><strong>Standard deviation of changes in spot price</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Standard deviation of changes in future price</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Correlation coefficient</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Standard deviation of changes in spot price: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Standard deviation of changes in spot price = 5, Standard deviation of changes in future price = 50 and Correlation coefficient = 500 and the page reports <strong>Optimal hedge ratio</strong> = 50.</li><li>Feed in Standard deviation of changes in spot price = 30, Standard deviation of changes in future price = 100 and Correlation coefficient = 1000 and the page reports <strong>Optimal hedge ratio</strong> = 300.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Optimal hedge ratio is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Standard deviation of changes in spot price, Standard deviation of changes in future price and Correlation coefficient are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Standard deviation of changes in spot price, Standard deviation of changes in future price and Correlation coefficient measured, Optimal hedge ratio wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/dupont-analysis">DuPont analysis Calculator</a>, <a href="/finance/ear">EAR Calculator</a> and <a href="/finance/early-loan-payoff">Early loan payoff Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Optimal hedge ratio calculator work out?', 'a' => <<<'TXT'
            Optimal hedge ratio, from Correlation coefficient, Standard deviation of changes in spot price and Standard deviation of changes in future price. The relationship is Optimal hedge ratio = Correlation coefficient × Standard deviation of changes in spot price ÷ Standard deviation of changes in future price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Standard deviation of changes in spot price, Standard deviation of changes in future price, Correlation coefficient. With standard deviation of changes in spot price, standard deviation of changes in future price and correlation coefficient in place, Optimal hedge ratio can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Optimal hedge ratio, Standard deviation of changes in spot price, Correlation coefficient and Standard deviation of changes in future price blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Optimal hedge ratio = 100. That comes from the page's own defaults, entered in Standard deviation of changes in spot price; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Optimal hedge ratio is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Standard deviation of changes in spot price blank and the page solves for it, reporting Optimal hedge ratio instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Optimal hedge ratio keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/dupont-analysis', 'name' => 'DuPont analysis Calculator'],
            ['path' => '/finance/ear', 'name' => 'EAR Calculator'],
            ['path' => '/finance/early-loan-payoff', 'name' => 'Early loan payoff Calculator'],
        ],
        'authors' => [],
    ],
];
