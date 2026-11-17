<?php

/**
 * Enterprise value
 * /finance/enterprise-value
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Enterprise value',
    'meta' => ['title' => 'Enterprise value — Formula, Steps & Examples', 'description' => 'Enter market capitalization and minority interest and get enterprise value back. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Enterprise value Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
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
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'enterprise_value = market_capitalization + value_of_debt + minority_interest + preferred_shares -  cash_and_cash_equivalents',
            'results' => [
                'minority_interest' => 'cash_and_cash_equivalents + enterprise_value - market_capitalization - preferred_shares - value_of_debt',
                'cash_and_cash_equivalents' => '-enterprise_value + market_capitalization + minority_interest + preferred_shares + value_of_debt',
                'market_capitalization' => 'cash_and_cash_equivalents + enterprise_value - minority_interest - preferred_shares - value_of_debt',
                'enterprise_value' => '-cash_and_cash_equivalents + market_capitalization + minority_interest + preferred_shares + value_of_debt',
                'preferred_shares' => 'cash_and_cash_equivalents + enterprise_value - market_capitalization - minority_interest - value_of_debt',
                'value_of_debt' => 'cash_and_cash_equivalents + enterprise_value - market_capitalization - minority_interest - preferred_shares',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Market capitalization, Minority interest and Preferred shares into Enterprise value and the answer comes back as Enterprise value. The arithmetic is the whole method: enterprise value is worked out from market capitalization by one formula, applied once. Enterprise value comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Enterprise value calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Enterprise value: it takes 5 numbers and reports Enterprise value.</p><p>The relationship it solves reads Enterprise value = − Cash and cash equivalents + Market capitalization + Minority interest + Preferred shares + Value of debt.</p><p>The result panel carries Enterprise value, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Market capitalization</strong> — in USD</li><li><strong>Minority interest</strong> — in USD</li><li><strong>Preferred shares</strong> — in USD</li><li><strong>Value of debt</strong> — in USD</li><li><strong>Cash and cash equivalents</strong> — in USD</li></ul><p>What you get back is Enterprise value in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Market capitalization = 10 USD, Minority interest = 100 USD, Preferred shares = 1000 USD, Value of debt = 10 USD and Cash and cash equivalents = 100 USD — through the same formula and the panel reports <strong>Enterprise value</strong> = 1020 USD.</p><ul><li><strong>Enterprise value</strong> = 1020 USD</li></ul><p>The line behind those figures is <strong>Enterprise value</strong> = <code>− Cash and cash equivalents + Market capitalization + Minority interest + Preferred shares + Value of debt</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Enterprise value</strong> = 1020. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Enterprise value is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Enterprise value</strong> = <code>− Cash and cash equivalents + Market capitalization + Minority interest + Preferred shares + Value of debt</code></li><li><strong>Minority interest</strong> = <code>Cash and cash equivalents + Enterprise value − Market capitalization − Preferred shares − Value of debt</code></li><li><strong>Cash and cash equivalents</strong> = <code>− Enterprise value + Market capitalization + Minority interest + Preferred shares + Value of debt</code></li><li><strong>Market capitalization</strong> = <code>Cash and cash equivalents + Enterprise value − Minority interest − Preferred shares − Value of debt</code></li><li><strong>Preferred shares</strong> = <code>Cash and cash equivalents + Enterprise value − Market capitalization − Minority interest − Value of debt</code></li><li><strong>Value of debt</strong> = <code>Cash and cash equivalents + Enterprise value − Market capitalization − Minority interest − Preferred shares</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Enterprise value</strong> = <code>− Cash and cash equivalents + Market capitalization + Minority interest + Preferred shares + Value of debt</code> — the form to use when Cash and cash equivalents, Market capitalization, Minority interest and Preferred shares are the values you have.</li><li><strong>Minority interest</strong> = <code>Cash and cash equivalents + Enterprise value − Market capitalization − Preferred shares − Value of debt</code> — the form to use when Cash and cash equivalents, Enterprise value, Market capitalization and Preferred shares are the values you have.</li><li><strong>Cash and cash equivalents</strong> = <code>− Enterprise value + Market capitalization + Minority interest + Preferred shares + Value of debt</code> — the form to use when Enterprise value, Market capitalization, Minority interest and Preferred shares are the values you have.</li><li><strong>Market capitalization</strong> = <code>Cash and cash equivalents + Enterprise value − Minority interest − Preferred shares − Value of debt</code> — the form to use when Cash and cash equivalents, Enterprise value, Minority interest and Preferred shares are the values you have.</li><li><strong>Preferred shares</strong> = <code>Cash and cash equivalents + Enterprise value − Market capitalization − Minority interest − Value of debt</code> — the form to use when Cash and cash equivalents, Enterprise value, Market capitalization and Minority interest are the values you have.</li><li><strong>Value of debt</strong> = <code>Cash and cash equivalents + Enterprise value − Market capitalization − Minority interest − Preferred shares</code> — the form to use when Cash and cash equivalents, Enterprise value, Market capitalization and Minority interest are the values you have.</li></ul><p>Any one of Enterprise value, Minority interest and Cash and cash equivalents can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Market capitalization, from 10 to 20 — and the answers go from <strong>Enterprise value</strong> 1020 USD to <strong>Enterprise value</strong> 1030 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Enterprise value is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Market capitalization left as a guess.</strong> Anything typed into Market capitalization is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Minority interest left as a guess.</strong> Anything typed into Minority interest is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Preferred shares left as a guess.</strong> Anything typed into Preferred shares is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Market capitalization is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Market capitalization</strong> takes a plain number with no unit attached. The page reads it when it works out Minority interest, Cash and cash equivalents and Enterprise value. Have it to hand before you start: Market capitalization is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Minority interest</strong> takes a plain number with no unit attached. The page reads it when it works out Cash and cash equivalents, Market capitalization and Enterprise value. Have it to hand before you start: Minority interest is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Preferred shares</strong> takes a plain number with no unit attached. The page reads it when it works out Minority interest, Cash and cash equivalents and Market capitalization. Have it to hand before you start: Preferred shares is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Value of debt</strong> takes a plain number with no unit attached. The page reads it when it works out Minority interest, Cash and cash equivalents and Market capitalization. Have it to hand before you start: Value of debt is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cash and cash equivalents</strong> takes a plain number with no unit attached. The page reads it when it works out Minority interest, Market capitalization and Enterprise value. Have it to hand before you start: Cash and cash equivalents is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Enterprise value</strong> is a plain number and the page's own defaults put it at 1020. The value follows from Cash and cash equivalents, Market capitalization, Minority interest and Preferred shares. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Enterprise value</th></tr></thead><tbody><tr><td><strong>Market capitalization</strong> +10%</td><td>+0.1%</td></tr><tr><td><strong>Minority interest</strong> +10%</td><td>+0.98%</td></tr><tr><td><strong>Preferred shares</strong> +10%</td><td>+9.8%</td></tr><tr><td><strong>Value of debt</strong> +10%</td><td>+0.1%</td></tr><tr><td><strong>Cash and cash equivalents</strong> +10%</td><td>-0.98%</td></tr></tbody></table><p>The steepest column belongs to Preferred shares: ten per cent there moves an answer by about 9.8 per cent, which is why that is the number to measure twice. By contrast, Market capitalization and Value of debt barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Market capitalization = 5 USD, Minority interest = 50 USD, Preferred shares = 500 USD, Value of debt = 5 USD and Cash and cash equivalents = 50 USD, the answer is <strong>Enterprise value</strong> = 510 USD.</li><li>With Market capitalization = 30 USD, Minority interest = 100 USD, Preferred shares = 1000 USD, Value of debt = 10 USD and Cash and cash equivalents = 100 USD, the answer is <strong>Enterprise value</strong> = 1040 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Enterprise value is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Market capitalization, Minority interest and Preferred shares and the number you are missing is Enterprise value.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/partially-amortized-loan">Partially amortized loan</a>, <a href="/finance/pay-raise">Pay raise Calculator</a> and <a href="/finance/payback-period">Payback period</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Enterprise value calculator work out?', 'a' => <<<'TXT'
            Enterprise value, from Cash and cash equivalents, Market capitalization, Minority interest and Preferred shares. The relationship is Enterprise value = − Cash and cash equivalents + Market capitalization + Minority interest + Preferred shares + Value of debt.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Market capitalization (USD), Minority interest (USD), Preferred shares (USD), Value of debt (USD), Cash and cash equivalents (USD). Fill market capitalization, minority interest and preferred shares and leave Enterprise value empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Enterprise value, Minority interest, Cash and cash equivalents and Market capitalization blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Enterprise value = 1020 USD. That comes from the page\'s own defaults, entered in Market capitalization; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Enterprise value is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Market capitalization left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Enterprise value at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/partially-amortized-loan', 'name' => 'Partially amortized loan'],
            ['path' => '/finance/pay-raise', 'name' => 'Pay raise Calculator'],
            ['path' => '/finance/payback-period', 'name' => 'Payback period'],
        ],
        'authors' => [],
    ],
];
