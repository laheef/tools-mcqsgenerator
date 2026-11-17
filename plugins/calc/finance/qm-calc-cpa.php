<?php

/**
 * CPA (cost per acquisition)
 * /finance/cpa
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CPA (cost per acquisition)',
    'meta' => ['title' => 'CPA (cost per acquisition) — Formula & Results', 'description' => 'CPA (cost per acquisition) takes number of clicks and returns total ad spend. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'CPA (cost per acquisition) Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Total ad spend',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_click',
                            'label' => 'Number of clicks',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cpc',
                            'label' => 'Average cost per click (CPC)',
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
                            'name' => 'ad_spend',
                            'label' => 'Total ad spend',
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
        [
            'title' => 'Cost per acquisition',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'conv',
                            'label' => 'Total attributed conversions',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cpa',
                            'label' => 'Cost per acquisition (CPA)',
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
            'title' => 'ad_spend = num_click * cpc ',
            'results' => ['cpc' => 'ad_spend/num_click', 'num_click' => 'ad_spend/cpc', 'ad_spend' => 'cpc*num_click'],
        ],
        [
            'title' => 'cpa = ad_spend / conv',
            'results' => ['conv' => 'ad_spend/cpa', 'ad_spend' => 'conv*cpa', 'cpa' => 'ad_spend/conv'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        CPA (cost per acquisition) takes Number of clicks and Average cost per click (CPC) and returns Total ad spend and Total attributed conversions. There is no hidden constant here: change total ad spend and number of clicks moves with it. The main result, Total ad spend, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the CPA (cost per acquisition) calculator works', 'html' => <<<'TXT'
            <p>CPA (cost per acquisition) answers one question from 2 numbers, and the answer is Total ad spend, Total attributed conversions and Cost per acquisition (CPA).</p><p>In the form&#039;s own words, Total ad spend = Average cost per click (CPC) × Number of clicks.</p><p>What comes back is Total ad spend, Total attributed conversions and Cost per acquisition (CPA) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Number of clicks</strong> — a plain number, no unit</li><li><strong>Average cost per click (CPC)</strong> — in USD</li></ul><p>The answers come back as Total ad spend in USD, Total attributed conversions, Cost per acquisition (CPA) in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Number of clicks = 10, Average cost per click (CPC) = 100 USD, Total attributed conversions = 1000 and Cost per acquisition (CPA) = 10 USD gives <strong>Total ad spend</strong> = 1000 USD.</p><ul><li><strong>Total ad spend</strong> = 1000 USD</li></ul><p>That is <strong>Total ad spend</strong> = <code>Average cost per click (CPC) × Number of clicks</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Total ad spend</strong> = 1000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Total ad spend takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total ad spend</strong> = <code>Average cost per click (CPC) × Number of clicks</code></li><li><strong>Average cost per click (CPC)</strong> = <code>Total ad spend ÷ Number of clicks</code></li><li><strong>Number of clicks</strong> = <code>Total ad spend ÷ Average cost per click (CPC)</code></li><li><strong>Cost per acquisition (CPA)</strong> = <code>Total ad spend ÷ Total attributed conversions</code></li><li><strong>Total attributed conversions</strong> = <code>Total ad spend ÷ Cost per acquisition (CPA)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total ad spend</strong> = <code>Average cost per click (CPC) × Number of clicks</code> — the form to use when Average cost per click (CPC) and Number of clicks are the values you have.</li><li><strong>Average cost per click (CPC)</strong> = <code>Total ad spend ÷ Number of clicks</code> — the form to use when Total ad spend and Number of clicks are the values you have.</li><li><strong>Number of clicks</strong> = <code>Total ad spend ÷ Average cost per click (CPC)</code> — the form to use when Total ad spend and Average cost per click (CPC) are the values you have.</li><li><strong>Cost per acquisition (CPA)</strong> = <code>Total ad spend ÷ Total attributed conversions</code> — the form to use when Total ad spend and Total attributed conversions are the values you have.</li><li><strong>Total attributed conversions</strong> = <code>Total ad spend ÷ Cost per acquisition (CPA)</code> — the form to use when Total ad spend and Cost per acquisition (CPA) are the values you have.</li><li><strong>Total ad spend</strong> = <code>Total attributed conversions × Cost per acquisition (CPA)</code> — the form to use when Total attributed conversions and Cost per acquisition (CPA) are the values you have.</li></ul><p>Any one of Total ad spend, Average cost per click (CPC) and Number of clicks can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Number of clicks from 10 to 20, leaving every other box alone. The panel moves from <strong>Total ad spend</strong> 1000 USD to <strong>Total ad spend</strong> 2000 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total ad spend, Total attributed conversions and Cost per acquisition (CPA) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Number of clicks left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of clicks is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Average cost per click (CPC) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Average cost per click (CPC) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Number of clicks and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the CPA (cost per acquisition) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Number of clicks</strong> takes a plain number with no unit attached. The page reads it when it works out Average cost per click (CPC) and Total ad spend. Fill it from a measurement rather than a memory — Number of clicks is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Average cost per click (CPC)</strong> takes a plain number with no unit attached. The page reads it when it works out Number of clicks and Total ad spend. Fill it from a measurement rather than a memory — Average cost per click (CPC) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Total ad spend</strong> is a plain number and the page's own defaults put it at 1000. The value follows from Average cost per click (CPC) and Number of clicks. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total attributed conversions</strong> is a plain number. The value follows from Total ad spend and Cost per acquisition (CPA). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Cost per acquisition (CPA)</strong> is a plain number. The value follows from Total ad spend and Total attributed conversions. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total ad spend</th></tr></thead><tbody><tr><td><strong>Number of clicks</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Average cost per click (CPC)</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Total attributed conversions</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Cost per acquisition (CPA)</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Average cost per click (CPC) sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Total attributed conversions and Cost per acquisition (CPA) barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Number of clicks = 5, Average cost per click (CPC) = 50 USD, Total attributed conversions = 500 and Cost per acquisition (CPA) = 5 USD and the page reports <strong>Total ad spend</strong> = 250 USD.</li><li>Feed in Number of clicks = 30, Average cost per click (CPC) = 100 USD, Total attributed conversions = 1000 and Cost per acquisition (CPA) = 10 USD and the page reports <strong>Total ad spend</strong> = 3000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total ad spend follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Number of clicks and Average cost per click (CPC) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Number of clicks and Average cost per click (CPC) is what you already know and Total ad spend and Total attributed conversions is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/net-operating-working-capital">Net operating working capital</a>, <a href="/finance/net-profit-margin">Net profit margin Calculator</a> and <a href="/finance/nps">Net promoter score Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CPA (cost per acquisition) calculator work out?', 'a' => <<<'TXT'
            Total ad spend, Total attributed conversions and Cost per acquisition (CPA), from Average cost per click (CPC) and Number of clicks. The relationship is Total ad spend = Average cost per click (CPC) × Number of clicks.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of clicks, Average cost per click (CPC) (USD). Enter number of clicks and average cost per click (CPC); Total ad spend is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total ad spend, Average cost per click (CPC), Number of clicks and Cost per acquisition (CPA) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Total ad spend = 1000 USD. That comes from the page\'s own defaults, entered in Number of clicks; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Total ad spend is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Number of clicks blank and the page solves for it, reporting Total ad spend instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Total ad spend keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/net-operating-working-capital', 'name' => 'Net operating working capital'],
            ['path' => '/finance/net-profit-margin', 'name' => 'Net profit margin Calculator'],
            ['path' => '/finance/nps', 'name' => 'Net promoter score Calculator'],
        ],
        'authors' => [],
    ],
];
