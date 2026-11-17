<?php

/**
 * Actual cash value
 * /finance/actual-cash-value
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Actual cash value',
    'meta' => ['title' => 'Actual cash value: Formula, Steps & Results', 'description' => 'Enter purchase price and expected life of the item and get actual cash value back. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Actual cash value Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'purchase_price',
                            'label' => 'Purchase price',
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
                            'name' => 'expectedLife',
                            'label' => 'Expected life of the item',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'currentLife',
                            'label' => 'Current life of the item',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualCashValue',
                            'label' => 'Actual cash value',
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
            'title' => 'actualCashValue = purchase_price * (expectedLife-currentLife) / expectedLife',
            'results' => ['purchase_price' => '-actualCashValue*expectedLife/(currentLife - expectedLife)', 'expectedLife' => '-currentLife*purchase_price/(actualCashValue - purchase_price)', 'actualCashValue' => 'purchase_price*(-currentLife + expectedLife)/expectedLife', 'currentLife' => 'expectedLife*(-actualCashValue + purchase_price)/purchase_price'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Actual cash value takes Purchase price, Expected life of the item and Current life of the item and returns Actual cash value. There is no hidden constant here: change actual cash value and purchase price moves with it. The main result, Actual cash value, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Actual cash value calculator works', 'html' => <<<'TXT'
            <p>The Actual cash value calculator applies one relationship to 3 numbers and reports Actual cash value.</p><p>In the form&#039;s own words, Actual cash value = Purchase price × ( − Current life of the item + Expected life of the item) ÷ Expected life of the item.</p><p>The answers are Actual cash value; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Purchase price</strong> — in USD</li><li><strong>Expected life of the item</strong> — in years</li><li><strong>Current life of the item</strong> — in years</li></ul><p>The answer comes back as Actual cash value in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Purchase price = 10 USD, Expected life of the item = 100 yrs and Current life of the item = 1000 yrs; the answers are <strong>Actual cash value</strong> = -90 USD.</p><ul><li><strong>Actual cash value</strong> = -90 USD</li></ul><p>The line behind those figures is <strong>Actual cash value</strong> = <code>Purchase price × ( − Current life of the item + Expected life of the item) ÷ Expected life of the item</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Actual cash value</strong> = -90 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Expected life of the item offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Actual cash value</strong> = <code>Purchase price × ( − Current life of the item + Expected life of the item) ÷ Expected life of the item</code></li><li><strong>Purchase price</strong> = <code>− Actual cash value × Expected life of the item ÷ (Current life of the item − Expected life of the item)</code></li><li><strong>Expected life of the item</strong> = <code>− Current life of the item × Purchase price ÷ (Actual cash value − Purchase price)</code></li><li><strong>Current life of the item</strong> = <code>Expected life of the item × ( − Actual cash value + Purchase price) ÷ Purchase price</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Actual cash value</strong> = <code>Purchase price × ( − Current life of the item + Expected life of the item) ÷ Expected life of the item</code> — the form to use when Purchase price, Current life of the item and Expected life of the item are the values you have.</li><li><strong>Purchase price</strong> = <code>− Actual cash value × Expected life of the item ÷ (Current life of the item − Expected life of the item)</code> — the form to use when Actual cash value, Expected life of the item and Current life of the item are the values you have.</li><li><strong>Expected life of the item</strong> = <code>− Current life of the item × Purchase price ÷ (Actual cash value − Purchase price)</code> — the form to use when Current life of the item, Purchase price and Actual cash value are the values you have.</li><li><strong>Current life of the item</strong> = <code>Expected life of the item × ( − Actual cash value + Purchase price) ÷ Purchase price</code> — the form to use when Expected life of the item, Actual cash value and Purchase price are the values you have.</li></ul><p>Any one of Actual cash value, Purchase price and Expected life of the item can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Purchase price from 10 to 20, leaving every other box alone. The panel moves from <strong>Actual cash value</strong> -90 USD to <strong>Actual cash value</strong> -180 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Expected life of the item and Current life of the item is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Actual cash value is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Purchase price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Purchase price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Expected life of the item left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Expected life of the item is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Purchase price to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Actual cash value form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Purchase price</strong> takes a plain number with no unit attached. The page reads it when it works out Expected life of the item, Actual cash value and Current life of the item. Fill it from a measurement rather than a memory — Purchase price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Expected life of the item</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The page reads it when it works out Purchase price, Actual cash value and Current life of the item. Fill it from a measurement rather than a memory — Expected life of the item is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Current life of the item</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The page reads it when it works out Purchase price, Expected life of the item and Actual cash value. Fill it from a measurement rather than a memory — Current life of the item is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Actual cash value</strong> is a plain number and the page's own defaults put it at -90. It is worked out from Purchase price, Current life of the item and Expected life of the item. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Actual cash value</th></tr></thead><tbody><tr><td><strong>Purchase price</strong> +10%</td><td>-10%</td></tr><tr><td><strong>Expected life of the item</strong> +10%</td><td>+10.1%</td></tr><tr><td><strong>Current life of the item</strong> +10%</td><td>-11.11%</td></tr></tbody></table><p>Ranked by leverage, Current life of the item sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Purchase price = 5 USD, Expected life of the item = 50 yrs and Current life of the item = 500 yrs and the page reports <strong>Actual cash value</strong> = -45 USD.</li><li>Feed in Purchase price = 30 USD, Expected life of the item = 100 yrs and Current life of the item = 1000 yrs and the page reports <strong>Actual cash value</strong> = -270 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Actual cash value actually offers.</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Actual cash value follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Purchase price, Expected life of the item and Current life of the item are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Purchase price, Expected life of the item and Current life of the item measured, Actual cash value wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/roth-ira">Roth IRA Calculator</a>, <a href="/finance/rule-of-72">Rule of 72</a> and <a href="/finance/rv-loan">RV loan Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Actual cash value calculator work out?', 'a' => <<<'TXT'
            Actual cash value, from Purchase price, Current life of the item and Expected life of the item. The relationship is Actual cash value = Purchase price × ( − Current life of the item + Expected life of the item) ÷ Expected life of the item.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Purchase price (USD), Expected life of the item (years), Current life of the item (years). Fill purchase price, expected life of the item and current life of the item and leave Actual cash value empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Actual cash value, Purchase price, Expected life of the item and Current life of the item blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Actual cash value = -90 USD. The figures come from Purchase price as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Actual cash value is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Purchase price blank and the page solves for it, reporting Actual cash value instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Actual cash value keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/roth-ira', 'name' => 'Roth IRA Calculator'],
            ['path' => '/finance/rule-of-72', 'name' => 'Rule of 72'],
            ['path' => '/finance/rv-loan', 'name' => 'RV loan Calculator'],
        ],
        'authors' => [],
    ],
];
