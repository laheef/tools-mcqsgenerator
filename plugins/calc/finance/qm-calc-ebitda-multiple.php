<?php

/**
 * EBITDA multiple
 * /finance/ebitda-multiple
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'EBITDA multiple',
    'meta' => ['title' => 'EBITDA multiple — Formula, Steps & Examples', 'description' => 'EBITDA multiple works out enterprise value from cash and cash equivalents and market capitalization. Every box can be solved for, not only the one in the title.', 'h1' => 'EBITDA multiple Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_and_cash_equivalents',
                            'label' => 'Cash and cash equivalents',
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
                            'name' => 'market_capitalization',
                            'label' => 'Market capitalization',
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
                            'name' => 'minority_interest',
                            'label' => 'Minority interest',
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
                            'name' => 'preferred_shares',
                            'label' => 'Preferred shares',
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
                            'name' => 'value_of_debt',
                            'label' => 'Value of debt',
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
                            'name' => 'enterprise_value',
                            'label' => 'Enterprise value',
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
                            'name' => 'EBITDA',
                            'label' => 'EBITDA',
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
                            'name' => 'ebitda_multiple',
                            'label' => 'EBITDA multiple',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'ebitda_multiple= enterprise_value/EBITDA',
            'results' => ['enterprise_value' => 'EBITDA*ebitda_multiple', 'EBITDA' => 'enterprise_value/ebitda_multiple', 'ebitda_multiple' => 'enterprise_value/EBITDA'],
        ],
        [
            'title' => 'enterprise_value = market_capitalization + value_of_debt + minority_interest + preferred_shares - cash_and_cash_equivalents',
            'results' => [
                'minority_interest' => 'cash_and_cash_equivalents + enterprise_value - market_capitalization - preferred_shares - value_of_debt',
                'market_capitalization' => 'cash_and_cash_equivalents + enterprise_value - minority_interest - preferred_shares - value_of_debt',
                'enterprise_value' => '-cash_and_cash_equivalents + market_capitalization + minority_interest + preferred_shares + value_of_debt',
                'value_of_debt' => 'cash_and_cash_equivalents + enterprise_value - market_capitalization - minority_interest - preferred_shares',
                'cash_and_cash_equivalents' => '-enterprise_value + market_capitalization + minority_interest + preferred_shares + value_of_debt',
                'preferred_shares' => 'cash_and_cash_equivalents + enterprise_value - market_capitalization - minority_interest - value_of_debt',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        EBITDA multiple turns Enterprise value and EBITDA into Cash and cash equivalents and Market capitalization. There is no hidden constant here: change cash and cash equivalents and enterprise value moves with it. The main result, Cash and cash equivalents, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the EBITDA multiple calculator works', 'html' => <<<'TXT'
            <p>EBITDA multiple answers one question from 2 numbers, and the answer is Cash and cash equivalents, Market capitalization and Minority interest.</p><p>The relationship it solves reads EBITDA multiple = Enterprise value ÷ EBITDA.</p><p>What comes back is Cash and cash equivalents, Market capitalization, Minority interest and Preferred shares — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Enterprise value</strong> — in USD</li><li><strong>EBITDA</strong> — in USD</li></ul><p>What you get back is Cash and cash equivalents in USD, Market capitalization in USD, Minority interest in USD, Preferred shares in USD, Value of debt in USD, EBITDA multiple, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Cash and cash equivalents = 10 USD, Market capitalization = 100 USD, Minority interest = 1000 USD, Preferred shares = 10 USD, Value of debt = 100 USD, EBITDA = 1000 USD and EBITDA multiple = 10 gives <strong>Enterprise value</strong> = 10000 USD.</p><ul><li><strong>Enterprise value</strong> = 10000 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>EBITDA multiple</strong> = <code>Enterprise value ÷ EBITDA</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Enterprise value</strong> = 10000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Cash and cash equivalents takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>EBITDA multiple</strong> = <code>Enterprise value ÷ EBITDA</code></li><li><strong>Enterprise value</strong> = <code>EBITDA × EBITDA multiple</code></li><li><strong>EBITDA</strong> = <code>Enterprise value ÷ EBITDA multiple</code></li><li><strong>Minority interest</strong> = <code>Cash and cash equivalents + Enterprise value − Market capitalization − Preferred shares − Value of debt</code></li><li><strong>Market capitalization</strong> = <code>Cash and cash equivalents + Enterprise value − Minority interest − Preferred shares − Value of debt</code></li><li><strong>Value of debt</strong> = <code>Cash and cash equivalents + Enterprise value − Market capitalization − Minority interest − Preferred shares</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>EBITDA multiple</strong> = <code>Enterprise value ÷ EBITDA</code> — the form to use when Enterprise value and EBITDA are the values you have.</li><li><strong>Enterprise value</strong> = <code>EBITDA × EBITDA multiple</code> — the form to use when EBITDA and EBITDA multiple are the values you have.</li><li><strong>EBITDA</strong> = <code>Enterprise value ÷ EBITDA multiple</code> — the form to use when Enterprise value and EBITDA multiple are the values you have.</li><li><strong>Enterprise value</strong> = <code>− Cash and cash equivalents + Market capitalization + Minority interest + Preferred shares + Value of debt</code> — the form to use when Cash and cash equivalents, Market capitalization, Minority interest and Preferred shares are the values you have.</li><li><strong>Minority interest</strong> = <code>Cash and cash equivalents + Enterprise value − Market capitalization − Preferred shares − Value of debt</code> — the form to use when Cash and cash equivalents, Enterprise value, Market capitalization and Preferred shares are the values you have.</li><li><strong>Market capitalization</strong> = <code>Cash and cash equivalents + Enterprise value − Minority interest − Preferred shares − Value of debt</code> — the form to use when Cash and cash equivalents, Enterprise value, Minority interest and Preferred shares are the values you have.</li><li><strong>Value of debt</strong> = <code>Cash and cash equivalents + Enterprise value − Market capitalization − Minority interest − Preferred shares</code> — the form to use when Cash and cash equivalents, Enterprise value, Market capitalization and Minority interest are the values you have.</li><li><strong>Cash and cash equivalents</strong> = <code>− Enterprise value + Market capitalization + Minority interest + Preferred shares + Value of debt</code> — the form to use when Enterprise value, Market capitalization, Minority interest and Preferred shares are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of EBITDA multiple, Enterprise value and EBITDA can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Cash and cash equivalents from 10 to 20, leaving every other box alone. The panel moves from <strong>Enterprise value</strong> 10000 USD to <strong>Enterprise value</strong> 10000 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cash and cash equivalents, Market capitalization and Minority interest are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Enterprise value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Enterprise value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>EBITDA left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If EBITDA is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Enterprise value is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the EBITDA multiple form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Enterprise value</strong> takes a plain number with no unit attached. It feeds EBITDA, EBITDA multiple and Minority interest. Fill it from a measurement rather than a memory — Enterprise value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>EBITDA</strong> takes a plain number with no unit attached. It feeds Enterprise value and EBITDA multiple. Fill it from a measurement rather than a memory — EBITDA is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Cash and cash equivalents</strong> is a plain number. The value follows from Enterprise value, Market capitalization, Minority interest and Preferred shares. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Market capitalization</strong> is a plain number. The value follows from Cash and cash equivalents, Enterprise value, Minority interest and Preferred shares. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Minority interest</strong> is a plain number. The value follows from Cash and cash equivalents, Enterprise value, Market capitalization and Preferred shares. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Preferred shares</strong> is a plain number. The value follows from Cash and cash equivalents, Enterprise value, Market capitalization and Minority interest. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Value of debt</strong> is a plain number. The value follows from Cash and cash equivalents, Enterprise value, Market capitalization and Minority interest. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>EBITDA multiple</strong> is a plain number. The value follows from Enterprise value and EBITDA. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Enterprise value</th></tr></thead><tbody><tr><td><strong>Cash and cash equivalents</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Market capitalization</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Minority interest</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Preferred shares</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Value of debt</strong> +10%</td><td>+0%</td></tr><tr><td><strong>EBITDA</strong> +10%</td><td>+10%</td></tr><tr><td><strong>EBITDA multiple</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, EBITDA sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Cash and cash equivalents, Market capitalization and Minority interest barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Cash and cash equivalents = 5 USD, Market capitalization = 50 USD, Minority interest = 500 USD, Preferred shares = 5 USD, Value of debt = 50 USD, EBITDA = 500 USD and EBITDA multiple = 5 and the page reports <strong>Enterprise value</strong> = 2500 USD.</li><li>Feed in Cash and cash equivalents = 30 USD, Market capitalization = 100 USD, Minority interest = 1000 USD, Preferred shares = 10 USD, Value of debt = 100 USD, EBITDA = 1000 USD and EBITDA multiple = 10 and the page reports <strong>Enterprise value</strong> = 10000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cash and cash equivalents follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Enterprise value and EBITDA are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Enterprise value and EBITDA is what you already know and Cash and cash equivalents and Market capitalization is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/real-estate-commission-vat">Real estate commission w/ VAT Calculator</a>, <a href="/finance/real-gdp">Real GDP Calculator</a> and <a href="/finance/real-interest-rate">Real interest rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the EBITDA multiple calculator work out?', 'a' => <<<'TXT'
            Cash and cash equivalents, Market capitalization, Minority interest and Preferred shares, from Enterprise value and EBITDA. The relationship is EBITDA multiple = Enterprise value ÷ EBITDA.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Enterprise value (USD), EBITDA (USD). Fill enterprise value and EBITDA and leave Cash and cash equivalents empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. EBITDA multiple, Enterprise value, EBITDA and Minority interest can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Enterprise value = 10000 USD. The figures come from Enterprise value as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Cash and cash equivalents is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Enterprise value blank and the page solves for it, reporting Cash and cash equivalents instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Cash and cash equivalents keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/real-estate-commission-vat', 'name' => 'Real estate commission w/ VAT Calculator'],
            ['path' => '/finance/real-gdp', 'name' => 'Real GDP Calculator'],
            ['path' => '/finance/real-interest-rate', 'name' => 'Real interest rate Calculator'],
        ],
        'authors' => [],
    ],
];
