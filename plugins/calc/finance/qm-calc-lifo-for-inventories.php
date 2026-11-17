<?php

/**
 * LIFO for inventories
 * /finance/lifo-for-inventories
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'LIFO for inventories',
    'meta' => ['title' => 'LIFO for inventories: Formula, Steps & Results', 'description' => 'LIFO for inventories turns 1st units purchased price, number of units purchased 1st time and 2nd units purchased price into revenue. Any box can be the unknown.', 'h1' => 'LIFO for inventories Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Inventories bought',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p1',
                            'label' => '1st units purchased price',
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
                            'name' => 'q1',
                            'label' => 'Number of units purchased 1st time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p2',
                            'label' => '2nd units purchased price',
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
                            'name' => 'q2',
                            'label' => 'Number of units purchased 2nd time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p3',
                            'label' => '3rd units purchased price',
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
                            'name' => 'q3',
                            'label' => 'Number of units purchased 3rd time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p4',
                            'label' => '4th units purchased price',
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
                            'name' => 'q4',
                            'label' => 'Number of units purchased 4th time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p5',
                            'label' => '5th units purchased price',
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
                            'name' => 'q5',
                            'label' => 'Number of units purchased 5th time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p6',
                            'label' => '6th units purchased price',
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
                            'name' => 'q6',
                            'label' => 'Number of units purchased 6th time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p7',
                            'label' => '7th units purchased price',
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
                            'name' => 'q7',
                            'label' => 'Number of units purchased 7th time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p8',
                            'label' => '8th units purchased price',
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
                            'name' => 'q8',
                            'label' => 'Number of units purchased 8th time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p9',
                            'label' => '9th units purchased price',
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
                            'name' => 'q9',
                            'label' => 'Number of units purchased 9th time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p10',
                            'label' => '10th units purchased price',
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
                            'name' => 'q10',
                            'label' => 'Number of units purchased 10th time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Your inventory value is {{global.currencySymbol}}{{inventory_value.value}}.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Units sold',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'units_sold',
                            'label' => 'Total units sold',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sell_price',
                            'label' => 'Selling price',
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
                        ['type' => 'note', 'text' => <<<'TXT'
                        Your inventory remaining value is {{global.currencySymbol}}{{remaining_inventory_value.value}}. Your cost of goods sold (COGS) is {{global.currencySymbol}}{{cogs.value}}. {{error_msg.valueMarkdown}}
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Revenue and margin',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue',
                            'label' => 'Revenue',
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
                        ['type' => 'note', 'text' => '{{prof_msg.value}} {{global.currencySymbol}}{{profit.value}}; meanwhile, your gross margin is {{gross_margin.value}}%.'],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'profit_msg',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Hey!  You have a loss of' => '0', 'Congrats!  Your profit is' => '1', 'You cannot sell more than you have! You are not a magician . Try again with a lower value of total units sold.' => '2'],
                            'dataset' => 'profit_string',
                            'control' => 'DROPDOWN',
                            'default' => 'Congrats!  Your profit is',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loss_msg',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Hey!  You have a loss of' => '0', 'Congrats!  Your profit is' => '1', 'You cannot sell more than you have! You are not a magician . Try again with a lower value of total units sold.' => '2'],
                            'dataset' => 'profit_string',
                            'control' => 'DROPDOWN',
                            'default' => 'Hey!  You have a loss of',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oversold_err_msg',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Hey!  You have a loss of' => '0', 'Congrats!  Your profit is' => '1', 'You cannot sell more than you have! You are not a magician . Try again with a lower value of total units sold.' => '2'],
                            'dataset' => 'profit_string',
                            'control' => 'DROPDOWN',
                            'default' => 'You cannot sell more than you have! You are not a magician . Try again with a lower value of total units sold.',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'revenue=units_sold*sell_price',
            'results' => ['revenue' => 'sell_price*units_sold', 'units_sold' => 'revenue/sell_price', 'sell_price' => 'revenue/units_sold'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.onResult([],function(ctx,values){var units_sold=values.units_sold,sell_price=values.sell_price;var pList=[];var qList=[];for(var i=0;i<10;i++){if(values["p".concat(i)]&&values["q".concat(i)]){pList.push(values["p".concat(i)]);qList.push(values["q".concat(i)])}}["inventory_value","remaining_inventory_value","cogs","profit","gross_margin","prof_msg"].forEach(function(key){return ctx.exportValue(key,null)});ctx.exportValue("error_msg","\0");if(mathjs.sum(qList)<units_sold){ctx.exportValue("error_msg",ctx.getRawInput("oversold_err_msg"));return}if(pList.length===0||qList.length===0){return}var inventory_value=pList.reduce(function(sum,price,i){return sum+price*(qList[i]||0)},0);var toSell=Number(units_sold)||0;var salePrice=Number(sell_price)||0;var revenue=toSell*salePrice;var COGS=0;var remainingQty=qList.slice();for(var _i=remainingQty.length-1;_i>=0&&toSell>0;_i--){var used=Math.min(remainingQty[_i],toSell);COGS+=used*pList[_i];remainingQty[_i]-=used;toSell-=used}var remaining_inventory_value=remainingQty.reduce(function(sum,qty,i){return sum+qty*pList[i]},0);var profit=revenue-COGS;var gross_margin=profit/revenue*100;var prof_msg=profit>0?ctx.getRawInput("profit_msg"):ctx.getRawInput("loss_msg");ctx.exportValue("inventory_value",inventory_value.toFixed(2));ctx.exportValue("remaining_inventory_value",remaining_inventory_value.toFixed(2));ctx.exportValue("cogs",COGS.toFixed(2));ctx.exportValue("profit",profit.toFixed(2));ctx.exportValue("gross_margin",gross_margin.toFixed(2));ctx.exportValue("prof_msg",prof_msg)});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        LIFO for inventories turns Total units sold and Selling price into Revenue. The arithmetic is the whole method: revenue is worked out from total units sold by one formula, applied once. Revenue comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the LIFO for inventories calculator works', 'html' => <<<'TXT'
            <p>LIFO for inventories answers one question from 2 numbers, and the answer is Revenue.</p><p>Written with the labels from the form, Revenue = Selling price × Total units sold.</p><p>The result panel carries Revenue, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Total units sold</strong> — a plain number, no unit</li><li><strong>Selling price</strong> — in USD</li></ul><p>The answer comes back as Revenue in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Revenue takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Revenue</strong> = <code>Selling price × Total units sold</code></li><li><strong>Total units sold</strong> = <code>Revenue ÷ Selling price</code></li><li><strong>Selling price</strong> = <code>Revenue ÷ Total units sold</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Revenue</strong> = <code>Selling price × Total units sold</code> — the form to use when Selling price and Total units sold are the values you have.</li><li><strong>Total units sold</strong> = <code>Revenue ÷ Selling price</code> — the form to use when Revenue and Selling price are the values you have.</li><li><strong>Selling price</strong> = <code>Revenue ÷ Total units sold</code> — the form to use when Revenue and Total units sold are the values you have.</li></ul><p>Any one of Revenue, Total units sold and Selling price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Revenue is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Total units sold left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total units sold is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Selling price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Selling price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Total units sold to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the LIFO for inventories form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total units sold</strong> takes a plain number with no unit attached. Change it and Revenue and Selling price changes with it. Fill it from a measurement rather than a memory — Total units sold is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Selling price</strong> takes a plain number with no unit attached. Change it and Revenue and Total units sold changes with it. Fill it from a measurement rather than a memory — Selling price is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Revenue</strong> is a plain number. The value follows from Selling price and Total units sold. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Total units sold and Selling price ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Total units sold — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Revenue in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Revenue follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total units sold and Selling price are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Total units sold and Selling price is what you already know and Revenue is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/ttm-trailing-twelve-months">TTM (trailing twelve months) Calculator</a>, <a href="/finance/turnover-rate">Turnover rate</a> and <a href="/finance/uk-coin-weight">UK coin weight Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>LIFO for inventories is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>A criterion for choosing between these pages: LIFO for inventories answers a different question from the one above, even where the two share a sentence of explanation.</p><p>The nearest are <a href="/finance/ttm-trailing-twelve-months">TTM (trailing twelve months) Calculator</a>, <a href="/finance/turnover-rate">Turnover rate</a> and <a href="/finance/uk-coin-weight">UK coin weight Calculator</a>. Each takes its own inputs and reports its own answer, and none of them shares a stored value with this page — open two in separate tabs and they will not interfere.</p><p>If the value you need is not the one reported here but a step before or after it, one of those pages probably reports it directly rather than making you convert by hand.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from LIFO for inventories is a number to act on, so the useful question is what to do with Revenue (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Total units sold and Selling price alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the LIFO for inventories calculator work out?', 'a' => 'Revenue, from Selling price and Total units sold. The relationship is Revenue = Selling price × Total units sold.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Total units sold, Selling price (USD). With total units sold and selling price in place, Revenue can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Revenue, Total units sold and Selling price blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Revenue is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total units sold blank and the page solves for it, reporting Revenue instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Revenue keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/ttm-trailing-twelve-months', 'name' => 'TTM (trailing twelve months) Calculator'],
            ['path' => '/finance/turnover-rate', 'name' => 'Turnover rate'],
            ['path' => '/finance/uk-coin-weight', 'name' => 'UK coin weight Calculator'],
        ],
        'authors' => [],
    ],
];
