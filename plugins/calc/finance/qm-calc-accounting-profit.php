<?php

/**
 * Accounting profit
 * /finance/accounting-profit
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Accounting profit',
    'meta' => ['title' => 'Accounting profit Calculator: Free, With Steps', 'description' => 'Accounting profit takes total revenue, operation expenses and interest and returns total explicit costs. The formula is printed in the form\'s own words.', 'h1' => 'Accounting profit Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Rev',
                            'label' => 'Total revenue',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '100000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'OpExp',
                            'label' => 'Operation expenses',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '25000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Int',
                            'label' => 'Interest',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '12000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Dep',
                            'label' => 'Depreciation',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '10000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Tax',
                            'label' => 'Taxes',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '15000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CostsExpl',
                            'label' => 'Total explicit costs',
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
                            'name' => 'AP',
                            'label' => 'Accounting profit',
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
            'title' => 'AP = Rev - CostsExpl',
            'results' => ['Rev' => 'AP + CostsExpl', 'AP' => '-CostsExpl + Rev', 'CostsExpl' => '-AP + Rev'],
        ],
        [
            'title' => 'CostsExpl = OpExp + Dep + Int + Tax',
            'results' => [
                'Int' => 'CostsExpl - Dep - OpExp - Tax',
                'Dep' => 'CostsExpl - Int - OpExp - Tax',
                'CostsExpl' => 'Dep + Int + OpExp + Tax',
                'OpExp' => 'CostsExpl - Dep - Int - Tax',
                'Tax' => 'CostsExpl - Dep - Int - OpExp',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Accounting profit works out Operation expenses and Interest from Total revenue and Total explicit costs. It is a single relationship that reads operation expenses out of total revenue, not a table of canned results keyed by them. Units for Operation expenses default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Accounting profit calculator works', 'html' => <<<'TXT'
            <p>The Accounting profit calculator applies one relationship to 2 numbers and reports Operation expenses, Interest and Depreciation.</p><p>In the form&#039;s own words, Accounting profit = − Total explicit costs + Total revenue.</p><p>The answers are Operation expenses, Interest, Depreciation and Taxes; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Total revenue</strong> — in USD</li><li><strong>Total explicit costs</strong> — in USD</li></ul><p>The result boxes are Operation expenses in USD, Interest in USD, Depreciation in USD, Taxes in USD, Accounting profit in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Total revenue = 100000 USD, Operation expenses = 25000 USD, Interest = 12000 USD, Depreciation = 10000 USD, Taxes = 15000 USD and Total explicit costs = 1000 USD gives <strong>Accounting profit</strong> = 99000 USD.</p><ul><li><strong>Accounting profit</strong> = 99000 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Accounting profit</strong> = <code>− Total explicit costs + Total revenue</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Accounting profit</strong> = 99000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Operation expenses is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Accounting profit</strong> = <code>− Total explicit costs + Total revenue</code></li><li><strong>Total revenue</strong> = <code>Accounting profit + Total explicit costs</code></li><li><strong>Total explicit costs</strong> = <code>− Accounting profit + Total revenue</code></li><li><strong>Interest</strong> = <code>Total explicit costs − Depreciation − Operation expenses − Taxes</code></li><li><strong>Depreciation</strong> = <code>Total explicit costs − Interest − Operation expenses − Taxes</code></li><li><strong>Operation expenses</strong> = <code>Total explicit costs − Depreciation − Interest − Taxes</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Accounting profit</strong> = <code>− Total explicit costs + Total revenue</code> — the form to use when Total explicit costs and Total revenue are the values you have.</li><li><strong>Total revenue</strong> = <code>Accounting profit + Total explicit costs</code> — the form to use when Accounting profit and Total explicit costs are the values you have.</li><li><strong>Total explicit costs</strong> = <code>− Accounting profit + Total revenue</code> — the form to use when Accounting profit and Total revenue are the values you have.</li><li><strong>Total explicit costs</strong> = <code>Depreciation + Interest + Operation expenses + Taxes</code> — the form to use when Depreciation, Interest, Operation expenses and Taxes are the values you have.</li><li><strong>Interest</strong> = <code>Total explicit costs − Depreciation − Operation expenses − Taxes</code> — the form to use when Total explicit costs, Depreciation, Operation expenses and Taxes are the values you have.</li><li><strong>Depreciation</strong> = <code>Total explicit costs − Interest − Operation expenses − Taxes</code> — the form to use when Total explicit costs, Interest, Operation expenses and Taxes are the values you have.</li><li><strong>Operation expenses</strong> = <code>Total explicit costs − Depreciation − Interest − Taxes</code> — the form to use when Total explicit costs, Depreciation, Interest and Taxes are the values you have.</li><li><strong>Taxes</strong> = <code>Total explicit costs − Depreciation − Interest − Operation expenses</code> — the form to use when Total explicit costs, Depreciation, Interest and Operation expenses are the values you have.</li></ul><p>Any one of Accounting profit, Total revenue and Total explicit costs can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Total revenue from 100000 to 200000, leaving every other box alone. The panel moves from <strong>Accounting profit</strong> 99000 USD to <strong>Accounting profit</strong> 199000 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Operation expenses, Interest and Depreciation are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Total revenue left as a guess.</strong> Anything typed into Total revenue is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Total explicit costs left as a guess.</strong> Anything typed into Total explicit costs is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Total revenue to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Accounting profit form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total revenue</strong> takes a plain number with no unit attached. The page reads it when it works out Accounting profit and Total explicit costs. Fill it from a measurement rather than a memory — Total revenue is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total explicit costs</strong> takes a plain number with no unit attached. The page reads it when it works out Total revenue, Accounting profit and Interest. Fill it from a measurement rather than a memory — Total explicit costs is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Operation expenses</strong> is a plain number. The value follows from Total explicit costs, Depreciation, Interest and Taxes. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Interest</strong> is a plain number. The value follows from Total explicit costs, Depreciation, Operation expenses and Taxes. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Depreciation</strong> is a plain number. The value follows from Total explicit costs, Interest, Operation expenses and Taxes. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Taxes</strong> is a plain number. The value follows from Total explicit costs, Depreciation, Interest and Operation expenses. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Accounting profit</strong> is a plain number and the page's own defaults put it at 99000. The value follows from Total explicit costs and Total revenue. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Accounting profit</th></tr></thead><tbody><tr><td><strong>Total revenue</strong> +10%</td><td>+10.1%</td></tr><tr><td><strong>Operation expenses</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Interest</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Depreciation</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Taxes</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total explicit costs</strong> +10%</td><td>-0.1%</td></tr></tbody></table><p>The steepest column belongs to Total revenue: ten per cent there moves an answer by about 10.1 per cent, which is why that is the number to measure twice. By contrast, Total explicit costs, Operation expenses and Interest barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Total revenue = 50000 USD, Operation expenses = 12500 USD, Interest = 6000 USD, Depreciation = 5000 USD, Taxes = 7500 USD and Total explicit costs = 500 USD and the page reports <strong>Accounting profit</strong> = 49500 USD.</li><li>Feed in Total revenue = 300000 USD, Operation expenses = 25000 USD, Interest = 12000 USD, Depreciation = 10000 USD, Taxes = 15000 USD and Total explicit costs = 1000 USD and the page reports <strong>Accounting profit</strong> = 299000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Operation expenses is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total revenue and Total explicit costs are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Total revenue and Total explicit costs is what you already know and Operation expenses and Interest is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/debt-to-capital">Debt-to-capital ratio Calculator</a>, <a href="/finance/defensive-interval-ratio">Defensive interval ratio Calculator</a> and <a href="/finance/deferred-annuity">Deferred annuity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Accounting profit calculator work out?', 'a' => <<<'TXT'
            Operation expenses, Interest, Depreciation and Taxes, from Total explicit costs and Total revenue. The relationship is Accounting profit = − Total explicit costs + Total revenue.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total revenue (USD), Total explicit costs (USD). Fill total revenue and total explicit costs and leave Operation expenses empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Accounting profit, Total revenue, Total explicit costs and Interest blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Accounting profit = 99000 USD. That comes from the page\'s own defaults, entered in Total revenue; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Operation expenses is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total revenue blank and the page solves for it, reporting Operation expenses instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Operation expenses keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/debt-to-capital', 'name' => 'Debt-to-capital ratio Calculator'],
            ['path' => '/finance/defensive-interval-ratio', 'name' => 'Defensive interval ratio Calculator'],
            ['path' => '/finance/deferred-annuity', 'name' => 'Deferred annuity Calculator'],
        ],
        'authors' => [],
    ],
];
