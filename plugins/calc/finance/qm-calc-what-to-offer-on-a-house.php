<?php

/**
 * What to offer on a house
 * /finance/what-to-offer-on-a-house
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'What to offer on a house',
    'meta' => ['title' => 'What to offer on a house — Formula & Results', 'description' => 'What to offer on a house takes fair market value (FMV) and returns offer amount (O). Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'What to offer on a house Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fairMarketValue',
                            'label' => 'Fair market value (FMV)',
                            'type' => 'number',
                            'suffix' => '$',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costOfRenovation',
                            'label' => 'Cost of renovation (COR)',
                            'type' => 'number',
                            'suffix' => '$',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'desiredDiscount',
                            'label' => 'Desired discount (DD)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'desiredProfit',
                            'label' => 'Desired profit (DP)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'offer',
                            'label' => 'Offer amount (O)',
                            'type' => 'number',
                            'suffix' => '$',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'offer = fairMarketValue - costOfRenovation - (desiredProfit/100*fairMarketValue) -(desiredDiscount/100*fairMarketValue) ',
            'results' => [
                'desiredProfit' => '(-100*costOfRenovation + fairMarketValue*(100 - desiredDiscount) - 100*offer)/fairMarketValue',
                'costOfRenovation' => '-1/100*desiredDiscount*fairMarketValue - 1/100*desiredProfit*fairMarketValue + fairMarketValue - offer',
                'desiredDiscount' => '(-100*costOfRenovation + fairMarketValue*(100 - desiredProfit) - 100*offer)/fairMarketValue',
                'fairMarketValue' => '100*(-costOfRenovation - offer)/(desiredDiscount + desiredProfit - 100)',
                'offer' => '-costOfRenovation - 1/100*desiredDiscount*fairMarketValue - 1/100*desiredProfit*fairMarketValue + fairMarketValue',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Fair market value (FMV), Cost of renovation (COR) and Desired discount (DD) into What to offer on a house and the answer comes back as Offer amount (O). There is no hidden constant here: change offer amount (O) and fair market value (FMV) moves with it. The main result, Offer amount (O), is reported in $.
        TXT,
        'sections' => [
            ['title' => 'How the What to offer on a house calculator works', 'html' => <<<'TXT'
            <p>The What to offer on a house calculator applies one relationship to 4 numbers and reports Offer amount (O).</p><p>The relationship it solves reads Offer amount (O) = − Cost of renovation (COR) − 1 ÷ 100 × Desired discount (DD) × Fair market value (FMV) − 1 ÷ 100 × Desired profit (DP) × Fair market value (FMV) + Fair market value (FMV).</p><p>What comes back is Offer amount (O) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Fair market value (FMV)</strong> — in $</li><li><strong>Cost of renovation (COR)</strong> — in $</li><li><strong>Desired discount (DD)</strong> — in %</li><li><strong>Desired profit (DP)</strong> — in %</li></ul><p>The answer comes back as Offer amount (O) in $. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Fair market value (FMV) = 10 $, Cost of renovation (COR) = 100 $, Desired discount (DD) = 1000 % and Desired profit (DP) = 10 %; the answers are <strong>Offer amount (O)</strong> = -191 $.</p><ul><li><strong>Offer amount (O)</strong> = -191 $</li></ul><p>That is <strong>Offer amount (O)</strong> = <code>− Cost of renovation (COR) − 1 ÷ 100 × Desired discount (DD) × Fair market value (FMV) − 1 ÷ 100 × Desired profit (DP) × Fair market value (FMV) + Fair market value (FMV)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Offer amount (O)</strong> = -191. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Offer amount (O) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Offer amount (O)</strong> = <code>− Cost of renovation (COR) − 1 ÷ 100 × Desired discount (DD) × Fair market value (FMV) − 1 ÷ 100 × Desired profit (DP) × Fair market value (FMV) + Fair market value (FMV)</code></li><li><strong>Desired profit (DP)</strong> = <code>( − 100 × Cost of renovation (COR) + Fair market value (FMV) × (100 − Desired discount (DD)) − 100 × Offer amount (O)) ÷ Fair market value (FMV)</code></li><li><strong>Cost of renovation (COR)</strong> = <code>− 1 ÷ 100 × Desired discount (DD) × Fair market value (FMV) − 1 ÷ 100 × Desired profit (DP) × Fair market value (FMV) + Fair market value (FMV) − Offer amount (O)</code></li><li><strong>Desired discount (DD)</strong> = <code>( − 100 × Cost of renovation (COR) + Fair market value (FMV) × (100 − Desired profit (DP)) − 100 × Offer amount (O)) ÷ Fair market value (FMV)</code></li><li><strong>Fair market value (FMV)</strong> = <code>100 × ( − Cost of renovation (COR) − Offer amount (O)) ÷ (Desired discount (DD) + Desired profit (DP) − 100)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Offer amount (O)</strong> = <code>− Cost of renovation (COR) − 1 ÷ 100 × Desired discount (DD) × Fair market value (FMV) − 1 ÷ 100 × Desired profit (DP) × Fair market value (FMV) + Fair market value (FMV)</code> — the form to use when Cost of renovation (COR), Desired discount (DD), Fair market value (FMV) and Desired profit (DP) are the values you have.</li><li><strong>Desired profit (DP)</strong> = <code>( − 100 × Cost of renovation (COR) + Fair market value (FMV) × (100 − Desired discount (DD)) − 100 × Offer amount (O)) ÷ Fair market value (FMV)</code> — the form to use when Cost of renovation (COR), Fair market value (FMV), Desired discount (DD) and Offer amount (O) are the values you have.</li><li><strong>Cost of renovation (COR)</strong> = <code>− 1 ÷ 100 × Desired discount (DD) × Fair market value (FMV) − 1 ÷ 100 × Desired profit (DP) × Fair market value (FMV) + Fair market value (FMV) − Offer amount (O)</code> — the form to use when Desired discount (DD), Fair market value (FMV), Desired profit (DP) and Offer amount (O) are the values you have.</li><li><strong>Desired discount (DD)</strong> = <code>( − 100 × Cost of renovation (COR) + Fair market value (FMV) × (100 − Desired profit (DP)) − 100 × Offer amount (O)) ÷ Fair market value (FMV)</code> — the form to use when Cost of renovation (COR), Fair market value (FMV), Desired profit (DP) and Offer amount (O) are the values you have.</li><li><strong>Fair market value (FMV)</strong> = <code>100 × ( − Cost of renovation (COR) − Offer amount (O)) ÷ (Desired discount (DD) + Desired profit (DP) − 100)</code> — the form to use when Cost of renovation (COR), Offer amount (O), Desired discount (DD) and Desired profit (DP) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Offer amount (O), Desired profit (DP) and Cost of renovation (COR) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Fair market value (FMV) from 10 to 20, leaving every other box alone. The panel moves from <strong>Offer amount (O)</strong> -191 $ to <strong>Offer amount (O)</strong> -282 $.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Offer amount (O) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Fair market value (FMV) left as a guess.</strong> Anything typed into Fair market value (FMV) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Cost of renovation (COR) left as a guess.</strong> Anything typed into Cost of renovation (COR) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Desired discount (DD) left as a guess.</strong> Anything typed into Desired discount (DD) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Fair market value (FMV) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the What to offer on a house form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Fair market value (FMV)</strong> is measured in $. Change it and Desired profit (DP), Cost of renovation (COR) and Desired discount (DD) changes with it. Fill it from a measurement rather than a memory — Fair market value (FMV) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cost of renovation (COR)</strong> is measured in $. Change it and Desired profit (DP), Desired discount (DD) and Fair market value (FMV) changes with it. Fill it from a measurement rather than a memory — Cost of renovation (COR) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Desired discount (DD)</strong> is measured in %. Change it and Desired profit (DP), Cost of renovation (COR) and Fair market value (FMV) changes with it. Fill it from a measurement rather than a memory — Desired discount (DD) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Desired profit (DP)</strong> is measured in %. Change it and Cost of renovation (COR), Desired discount (DD) and Fair market value (FMV) changes with it. Fill it from a measurement rather than a memory — Desired profit (DP) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Offer amount (O)</strong> is a plain number and the page's own defaults put it at -191. The value follows from Cost of renovation (COR), Desired discount (DD), Fair market value (FMV) and Desired profit (DP). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Offer amount (O)</th></tr></thead><tbody><tr><td><strong>Fair market value (FMV)</strong> +10%</td><td>-4.76%</td></tr><tr><td><strong>Cost of renovation (COR)</strong> +10%</td><td>-5.24%</td></tr><tr><td><strong>Desired discount (DD)</strong> +10%</td><td>-5.24%</td></tr><tr><td><strong>Desired profit (DP)</strong> +10%</td><td>-0.05%</td></tr></tbody></table><p>The steepest column belongs to Cost of renovation (COR): ten per cent there moves an answer by about 5.2 per cent, which is why that is the number to measure twice. By contrast, Desired profit (DP) barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Fair market value (FMV) = 5 $, Cost of renovation (COR) = 50 $, Desired discount (DD) = 500 % and Desired profit (DP) = 5 % and the page reports <strong>Offer amount (O)</strong> = -70.25 $.</li><li>Feed in Fair market value (FMV) = 30 $, Cost of renovation (COR) = 100 $, Desired discount (DD) = 1000 % and Desired profit (DP) = 10 % and the page reports <strong>Offer amount (O)</strong> = -373 $.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Offer amount (O) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Fair market value (FMV), Cost of renovation (COR) and Desired discount (DD) is what you already know and Offer amount (O) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/net-income">Net income</a>, <a href="/finance/net-operating-assets">Net operating assets Calculator</a> and <a href="/finance/net-operating-income">Net operating income Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the What to offer on a house calculator work out?', 'a' => <<<'TXT'
            Offer amount (O), from Cost of renovation (COR), Desired discount (DD), Fair market value (FMV) and Desired profit (DP). The relationship is Offer amount (O) = − Cost of renovation (COR) − 1 ÷ 100 × Desired discount (DD) × Fair market value (FMV) − 1 ÷ 100 × Desired profit (DP) × Fair market value (FMV) + Fair market value (FMV).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Fair market value (FMV) ($), Cost of renovation (COR) ($), Desired discount (DD) (%), Desired profit (DP) (%). Fill fair market value (FMV), cost of renovation (COR) and desired discount (DD) and leave Offer amount (O) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Offer amount (O), Desired profit (DP), Cost of renovation (COR) and Desired discount (DD) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Offer amount (O) = -191 $. Those are the defaults written into the form — move Fair market value (FMV) and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Offer amount (O) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Fair market value (FMV) blank and the page solves for it, reporting Offer amount (O) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Offer amount (O) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/net-income', 'name' => 'Net income'],
            ['path' => '/finance/net-operating-assets', 'name' => 'Net operating assets Calculator'],
            ['path' => '/finance/net-operating-income', 'name' => 'Net operating income Calculator'],
        ],
        'authors' => [],
    ],
];
