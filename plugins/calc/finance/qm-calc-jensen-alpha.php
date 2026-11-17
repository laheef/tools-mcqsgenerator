<?php

/**
 * Jensen's alpha
 * /finance/jensen-alpha
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Jensen\'s alpha',
    'meta' => ['title' => 'Jensen\'s alpha Calculator — Formula, Units & Example', 'description' => 'Jensen\'s alpha turns beginning portfolio value and ending portfolio value into portfolio\'s return. Every box can be solved for, not only the one in the title.', 'h1' => 'Jensen\'s alpha Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Portfolio\'s return',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beginn_port',
                            'label' => 'Beginning portfolio value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ending_port',
                            'label' => 'Ending portfolio value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'port_return',
                            'label' => 'Portfolio\'s return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Jensen\'s alpha',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'free',
                            'label' => 'Risk-free rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'port_beta',
                            'label' => 'Portfolio\'s beta',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'market_rate_return',
                            'label' => 'Market rate of return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '11',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'jensen_alpha',
                            'label' => 'Jensen\'s alpha',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'jensen_alpha>0', 'text' => 'Your investment returns beat the market! '],
                                ['when' => 'jensen_alpha==0', 'text' => 'Your investment perfomance is on par with the market!'],
                                ['when' => 'jensen_alpha<0', 'text' => 'Your investment performance is lower than the market...'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'jensen_alpha = port_return - (free + port_beta * (market_rate_return - free))',
            'results' => [
                'port_return' => '-free*port_beta + free + jensen_alpha + market_rate_return*port_beta',
                'jensen_alpha' => 'free*port_beta - free - market_rate_return*port_beta + port_return',
                'market_rate_return' => '(free*port_beta - free - jensen_alpha + port_return)/port_beta',
                'free' => '(jensen_alpha + market_rate_return*port_beta - port_return)/(port_beta - 1)',
                'port_beta' => '(free + jensen_alpha - port_return)/(free - market_rate_return)',
            ],
        ],
        [
            'title' => 'port_return = (ending_port - beginn_port) / beginn_port',
            'results' => ['beginn_port' => 'ending_port/(port_return + 1)', 'port_return' => '(-beginn_port + ending_port)/beginn_port', 'ending_port' => 'beginn_port*(port_return + 1)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Portfolio's return, Risk-free rate and Portfolio's beta into Jensen's alpha and the answer comes back as Beginning portfolio value and Ending portfolio value. The arithmetic is the whole method: beginning portfolio value is worked out from portfolio's return by one formula, applied once. Beginning portfolio value comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Jensen\'s alpha calculator works', 'html' => <<<'TXT'
            <p>The Jensen&#039;s alpha calculator applies one relationship to 4 numbers and reports Beginning portfolio value, Ending portfolio value and Jensen&#039;s alpha.</p><p>Written with the labels from the form, Jensen&#039;s alpha = Risk-free rate × Portfolio&#039;s beta − Risk-free rate − Market rate of return × Portfolio&#039;s beta + Portfolio&#039;s return.</p><p>The result panel carries Beginning portfolio value, Ending portfolio value and Jensen&#039;s alpha, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Portfolio&#039;s return</strong> — in percent</li><li><strong>Risk-free rate</strong> — in percent</li><li><strong>Portfolio&#039;s beta</strong> — a plain number, no unit</li><li><strong>Market rate of return</strong> — in percent</li></ul><p>The result boxes are Beginning portfolio value in USD, Ending portfolio value in USD, Jensen&#039;s alpha in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Beginning portfolio value = 10 USD, Ending portfolio value = 100 USD, Risk-free rate = 1000 perc, Portfolio&amp;#039;s beta = 10, Market rate of return = 11 perc and Jensen&amp;#039;s alpha = 1000 perc gives <strong>Portfolio&amp;#039;s return</strong> = -7890 perc.</p><ul><li><strong>Portfolio&#039;s return</strong> = -7890 perc</li></ul><p>The line behind those figures is <strong>Jensen&#039;s alpha</strong> = <code>Risk-free rate × Portfolio&#039;s beta − Risk-free rate − Market rate of return × Portfolio&#039;s beta + Portfolio&#039;s return</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Portfolio&amp;#039;s return</strong> = -7890. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Jensen&#039;s alpha lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Jensen&#039;s alpha</strong> = <code>Risk-free rate × Portfolio&#039;s beta − Risk-free rate − Market rate of return × Portfolio&#039;s beta + Portfolio&#039;s return</code></li><li><strong>Portfolio&#039;s return</strong> = <code>− Risk-free rate × Portfolio&#039;s beta + Risk-free rate + Jensen&#039;s alpha + Market rate of return × Portfolio&#039;s beta</code></li><li><strong>Market rate of return</strong> = <code>(Risk-free rate × Portfolio&#039;s beta − Risk-free rate − Jensen&#039;s alpha + Portfolio&#039;s return) ÷ Portfolio&#039;s beta</code></li><li><strong>Risk-free rate</strong> = <code>(Jensen&#039;s alpha + Market rate of return × Portfolio&#039;s beta − Portfolio&#039;s return) ÷ (Portfolio&#039;s beta − 1)</code></li><li><strong>Portfolio&#039;s beta</strong> = <code>(Risk-free rate + Jensen&#039;s alpha − Portfolio&#039;s return) ÷ (Risk-free rate − Market rate of return)</code></li><li><strong>Beginning portfolio value</strong> = <code>Ending portfolio value ÷ (Portfolio&#039;s return + 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Jensen&#039;s alpha</strong> = <code>Risk-free rate × Portfolio&#039;s beta − Risk-free rate − Market rate of return × Portfolio&#039;s beta + Portfolio&#039;s return</code> — the form to use when Risk-free rate, Portfolio&#039;s beta, Market rate of return and Portfolio&#039;s return are the values you have.</li><li><strong>Portfolio&#039;s return</strong> = <code>− Risk-free rate × Portfolio&#039;s beta + Risk-free rate + Jensen&#039;s alpha + Market rate of return × Portfolio&#039;s beta</code> — the form to use when Risk-free rate, Portfolio&#039;s beta, Jensen&#039;s alpha and Market rate of return are the values you have.</li><li><strong>Market rate of return</strong> = <code>(Risk-free rate × Portfolio&#039;s beta − Risk-free rate − Jensen&#039;s alpha + Portfolio&#039;s return) ÷ Portfolio&#039;s beta</code> — the form to use when Risk-free rate, Portfolio&#039;s beta, Jensen&#039;s alpha and Portfolio&#039;s return are the values you have.</li><li><strong>Risk-free rate</strong> = <code>(Jensen&#039;s alpha + Market rate of return × Portfolio&#039;s beta − Portfolio&#039;s return) ÷ (Portfolio&#039;s beta − 1)</code> — the form to use when Jensen&#039;s alpha, Market rate of return, Portfolio&#039;s beta and Portfolio&#039;s return are the values you have.</li><li><strong>Portfolio&#039;s beta</strong> = <code>(Risk-free rate + Jensen&#039;s alpha − Portfolio&#039;s return) ÷ (Risk-free rate − Market rate of return)</code> — the form to use when Risk-free rate, Jensen&#039;s alpha, Portfolio&#039;s return and Market rate of return are the values you have.</li><li><strong>Portfolio&#039;s return</strong> = <code>( − Beginning portfolio value + Ending portfolio value) ÷ Beginning portfolio value</code> — the form to use when Beginning portfolio value and Ending portfolio value are the values you have.</li><li><strong>Beginning portfolio value</strong> = <code>Ending portfolio value ÷ (Portfolio&#039;s return + 1)</code> — the form to use when Ending portfolio value and Portfolio&#039;s return are the values you have.</li><li><strong>Ending portfolio value</strong> = <code>Beginning portfolio value × (Portfolio&#039;s return + 1)</code> — the form to use when Beginning portfolio value and Portfolio&#039;s return are the values you have.</li></ul><p>Any one of Jensen&#039;s alpha, Portfolio&#039;s return and Market rate of return can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Beginning portfolio value, from 10 to 20 — and the answers go from <strong>Portfolio&amp;#039;s return</strong> -7890 perc to <strong>Portfolio&amp;#039;s return</strong> -7890 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Portfolio&#039;s return, Risk-free rate and Market rate of return carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Beginning portfolio value, Ending portfolio value and Jensen&#039;s alpha are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Portfolio&#039;s return left as a guess.</strong> Anything typed into Portfolio&amp;#039;s return is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Risk-free rate left as a guess.</strong> Anything typed into Risk-free rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Portfolio&#039;s return is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Portfolio&#039;s return</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Jensen's alpha, Market rate of return and Risk-free rate. Have it to hand before you start: Portfolio&#039;s return is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Risk-free rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Portfolio's return, Jensen's alpha and Market rate of return. Have it to hand before you start: Risk-free rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Portfolio&#039;s beta</strong> takes a plain number with no unit attached. It feeds Portfolio's return, Jensen's alpha and Market rate of return. Have it to hand before you start: Portfolio&#039;s beta is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Market rate of return</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Portfolio's return, Jensen's alpha and Risk-free rate. Have it to hand before you start: Market rate of return is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Beginning portfolio value</strong> is a plain number. It is worked out from Ending portfolio value and Portfolio's return. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Ending portfolio value</strong> is a plain number. It is worked out from Beginning portfolio value and Portfolio's return. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Jensen&#039;s alpha</strong> is a percent figure. It is worked out from Risk-free rate, Portfolio's beta, Market rate of return and Portfolio's return. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Portfolio&#039;s return</th></tr></thead><tbody><tr><td><strong>Beginning portfolio value</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Ending portfolio value</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Risk-free rate</strong> +10%</td><td>-11.41%</td></tr><tr><td><strong>Portfolio&#039;s beta</strong> +10%</td><td>-12.53%</td></tr><tr><td><strong>Market rate of return</strong> +10%</td><td>+0.14%</td></tr><tr><td><strong>Jensen&#039;s alpha</strong> +10%</td><td>+1.27%</td></tr></tbody></table><p>The steepest column belongs to Portfolio&#039;s beta: ten per cent there moves an answer by about 12.5 per cent, which is why that is the number to measure twice. By contrast, Market rate of return, Beginning portfolio value and Ending portfolio value barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Beginning portfolio value is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Portfolio&#039;s return, Risk-free rate and Portfolio&#039;s beta are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Portfolio&#039;s return, Risk-free rate and Portfolio&#039;s beta is what you already know and Beginning portfolio value and Ending portfolio value is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/accounting-profit">Accounting profit Calculator</a>, <a href="/finance/accrual-ratio">Accrual ratio</a> and <a href="/finance/accumulated-depreciation">Accumulated depreciation Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Jensen\'s alpha calculator work out?', 'a' => <<<'TXT'
            Beginning portfolio value, Ending portfolio value and Jensen's alpha, from Risk-free rate, Portfolio's beta, Market rate of return and Portfolio's return. The relationship is Jensen's alpha = Risk-free rate × Portfolio's beta − Risk-free rate − Market rate of return × Portfolio's beta + Portfolio's return.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Portfolio's return (percent), Risk-free rate (percent), Portfolio's beta, Market rate of return (percent). Enter portfolio's return, risk-free rate and portfolio's beta; Beginning portfolio value is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Jensen's alpha, Portfolio's return, Market rate of return and Risk-free rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Portfolio\'s return = -7890 perc. Those are the defaults written into the form — move Portfolio\'s return and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Beginning portfolio value is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Portfolio's return left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Beginning portfolio value at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/accounting-profit', 'name' => 'Accounting profit Calculator'],
            ['path' => '/finance/accrual-ratio', 'name' => 'Accrual ratio'],
            ['path' => '/finance/accumulated-depreciation', 'name' => 'Accumulated depreciation Calculator'],
        ],
        'authors' => [],
    ],
];
