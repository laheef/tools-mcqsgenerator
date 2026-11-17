<?php

/**
 * FIFO for inventories
 * /finance/fifo-for-inventories
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'FIFO for inventories',
    'meta' => ['title' => 'FIFO for inventories — Free Online Calculator', 'description' => 'FIFO for inventories works out revenues from 1st units purchased price and number of units purchased 1st time. The formula is printed in the form\'s own words.', 'h1' => 'FIFO for inventories Calculator', 'updated' => '2026-09-28'],
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
                        ['type' => 'note', 'text' => 'Your inventory value is ${{inventory_value.value}}.'],
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
                            'label' => 'Revenues',
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
    "use strict";omni.onResult([],function(ctx,values){var units_sold=values.units_sold,sell_price=values.sell_price;var pList=[];var qList=[];for(var i=0;i<10;i++){if(values["p".concat(i)]&&values["q".concat(i)]){pList.push(values["p".concat(i)]);qList.push(values["q".concat(i)])}}["inventory_value","remaining_inventory_value","cogs","profit","gross_margin","prof_msg"].forEach(function(key){return ctx.exportValue(key,null)});ctx.exportValue("error_msg","\0");if(mathjs.sum(qList)<units_sold){ctx.exportValue("error_msg",ctx.getRawInput("oversold_err_msg"));return}if(pList.length===0||qList.length===0){return}var inventory_value=pList.reduce(function(sum,price,i){return sum+price*(qList[i]||0)},0);var toSell=Number(units_sold)||0;var salePrice=Number(sell_price)||0;var revenue=toSell*salePrice;var COGS=0;var remainingQty=qList.slice();for(var _i=0;_i<remainingQty.length&&toSell>0;_i++){var used=Math.min(remainingQty[_i],toSell);COGS+=used*pList[_i];remainingQty[_i]-=used;toSell-=used}var remaining_inventory_value=remainingQty.reduce(function(sum,qty,i){return sum+qty*pList[i]},0);var profit=revenue-COGS;var gross_margin=revenue>0?profit/revenue*100:0;var prof_msg=profit>0?ctx.getRawInput("profit_msg"):ctx.getRawInput("loss_msg");ctx.exportValue("inventory_value",inventory_value.toFixed(2));ctx.exportValue("remaining_inventory_value",remaining_inventory_value.toFixed(2));ctx.exportValue("cogs",COGS.toFixed(2));ctx.exportValue("profit",profit.toFixed(2));ctx.exportValue("gross_margin",gross_margin.toFixed(2));ctx.exportValue("prof_msg",prof_msg)});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        FIFO for inventories works out Revenues from Total units sold and Selling price. The arithmetic is the whole method: revenues is worked out from total units sold by one formula, applied once. Revenues comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the FIFO for inventories calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind FIFO for inventories: it takes 2 numbers and reports Revenues.</p><p>Written with the labels from the form, Revenues = Selling price × Total units sold.</p><p>The result panel carries Revenues, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Total units sold</strong> — a plain number, no unit</li><li><strong>Selling price</strong> — in USD</li></ul><p>What you get back is Revenues in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Revenues is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Revenues</strong> = <code>Selling price × Total units sold</code></li><li><strong>Total units sold</strong> = <code>Revenues ÷ Selling price</code></li><li><strong>Selling price</strong> = <code>Revenues ÷ Total units sold</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Revenues</strong> = <code>Selling price × Total units sold</code> — the form to use when Selling price and Total units sold are the values you have.</li><li><strong>Total units sold</strong> = <code>Revenues ÷ Selling price</code> — the form to use when Revenues and Selling price are the values you have.</li><li><strong>Selling price</strong> = <code>Revenues ÷ Total units sold</code> — the form to use when Revenues and Total units sold are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Revenues, Total units sold and Selling price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Revenues is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Total units sold left as a guess.</strong> Anything typed into Total units sold is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Selling price left as a guess.</strong> Anything typed into Selling price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Total units sold to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Total units sold</strong> takes a plain number with no unit attached. Change it and Revenues and Selling price changes with it. Have it to hand before you start: Total units sold is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Selling price</strong> takes a plain number with no unit attached. Change it and Revenues and Total units sold changes with it. Have it to hand before you start: Selling price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Revenues</strong> is a plain number. The value follows from Selling price and Total units sold. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Total units sold and Selling price. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Total units sold into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Revenues in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Revenues is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total units sold and Selling price are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Total units sold and Selling price and the number you are missing is Revenues.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/expected-utility">Expected utility Calculator</a>, <a href="/finance/expense-ratio">Expense ratio Calculator</a> and <a href="/finance/fha-loan">FHA loan Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that FIFO for inventories leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/finance/expected-utility">Expected utility Calculator</a>, <a href="/finance/expense-ratio">Expense ratio Calculator</a> and <a href="/finance/fha-loan">FHA loan Calculator</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from FIFO for inventories is a number to act on, so the useful question is what to do with Revenues (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Total units sold and Selling price alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the FIFO for inventories calculator work out?', 'a' => 'Revenues, from Selling price and Total units sold. The relationship is Revenues = Selling price × Total units sold.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Total units sold, Selling price (USD). Enter total units sold and selling price; Revenues is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Revenues, Total units sold and Selling price can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Revenues is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Total units sold left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Revenues keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/expected-utility', 'name' => 'Expected utility Calculator'],
            ['path' => '/finance/expense-ratio', 'name' => 'Expense ratio Calculator'],
            ['path' => '/finance/fha-loan', 'name' => 'FHA loan Calculator'],
        ],
        'authors' => [],
    ],
];
