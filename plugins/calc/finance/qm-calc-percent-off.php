<?php

/**
 * Percent off
 * /finance/percent-off
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Percent off',
    'meta' => ['title' => 'Percent off Calculator: Formula, Steps & Examples', 'description' => 'Percent off takes original price and returns final price. Each figure is computed from the boxes you fill, never read from a table. Any box can be the unknown.', 'h1' => 'Percent off Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'before',
                            'label' => 'Original price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'discount',
                            'label' => 'Percent off',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                        [
                            'name' => 'discount2',
                            'label' => '2^^nd^^ percent off',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'second_discount_CB',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Add second stackable percent off' => '1', '' => '0'],
                            'dataset' => 'second',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Final price and savings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'after',
                            'label' => 'Final price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'you_save',
                            'label' => 'Savings',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'total_discount',
                            'label' => 'Total percent off',
                            'type' => 'number',
                            'help' => 'Total percent off including two discounts.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Sales tax',
            'note' => 'If selected, tax will be calculated on the final price. Different tax rules may apply to different deals, and they may vary across states.',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'tax_included',
                            'label' => 'Include tax?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', '' => '0'],
                            'dataset' => 'if_tax',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'sales_tax',
                            'label' => 'Sales tax',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'after = before * (1 - discount) * (1 - discount2)+tax_included*sales_tax*before*(1 - discount) * (1 - discount2)',
            'results' => [
                'discount2' => <<<'TXT'
                (after + before*discount*sales_tax*tax_included + before*discount - before*sales_tax*tax_included - before)/(before*(discount*sales_tax*tax_included + discount - sales_tax*tax_included - 1))
                TXT,
                'before' => <<<'TXT'
                after/(discount*discount2*sales_tax*tax_included + discount*discount2 - discount*sales_tax*tax_included - discount - discount2*sales_tax*tax_included - discount2 + sales_tax*tax_included + 1)
                TXT,
                'discount' => <<<'TXT'
                (after + before*discount2*sales_tax*tax_included + before*discount2 - before*sales_tax*tax_included - before)/(before*(discount2*sales_tax*tax_included + discount2 - sales_tax*tax_included - 1))
                TXT,
                'tax_included' => '(after - before*discount*discount2 + before*discount + before*discount2 - before)/(before*sales_tax*(discount*discount2 - discount - discount2 + 1))',
                'sales_tax' => '(after - before*discount*discount2 + before*discount + before*discount2 - before)/(before*tax_included*(discount*discount2 - discount - discount2 + 1))',
                'after' => <<<'TXT'
                before*(discount*discount2*sales_tax*tax_included + discount*discount2 - discount*sales_tax*tax_included - discount - discount2*sales_tax*tax_included - discount2 + sales_tax*tax_included + 1)
                TXT,
            ],
        ],
        [
            'title' => 'you_save = ((tax_included*sales_tax*before)+before) - after',
            'results' => [
                'before' => '(after + you_save)/(sales_tax*tax_included + 1)',
                'sales_tax' => '(after - before + you_save)/(before*tax_included)',
                'tax_included' => '(after - before + you_save)/(before*sales_tax)',
                'you_save' => '-after + before*sales_tax*tax_included + before',
                'after' => 'before*sales_tax*tax_included + before - you_save',
            ],
        ],
        [
            'title' => 'total_discount = 1 - (1 - discount) * (1 - discount2)',
            'results' => ['discount2' => '(discount - total_discount)/(discount - 1)', 'discount' => '(discount2 - total_discount)/(discount2 - 1)', 'total_discount' => '-discount*discount2 + discount + discount2'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Percent off turns Original price, Percent off and Final price into 2^^nd^^ percent off. There is no hidden constant here: change 2^^nd^^ percent off and original price moves with it. The main result, 2^^nd^^ percent off, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Percent off calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Percent off: it takes 7 numbers and reports 2^^nd^^ percent off.</p><p>The answers are 2^^nd^^ percent off; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 7 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Original price</strong> — in USD</li><li><strong>Percent off</strong> — in percent</li><li><strong>Final price</strong> — in USD</li><li><strong>Savings</strong> — in USD</li><li><strong>Total percent off</strong> — in percent. Total percent off including two discounts.</li><li><strong>Include tax?</strong> — a plain number, no unit</li><li><strong>Sales tax</strong> — in percent</li></ul><p>The result box is 2^^nd^^ percent off in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Second discount CB = 0; the answers are <strong>Include tax?</strong> = 0.</p><ul><li><strong>Include tax?</strong> = 0</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Include tax?</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: 2^^nd^^ percent off offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Savings</strong> = <code>− Final price + Original price × Sales tax × Include tax? + Original price</code></li><li><strong>Original price</strong> = <code>(Final price + Savings) ÷ (Sales tax × Include tax? + 1)</code></li><li><strong>Sales tax</strong> = <code>(Final price − Original price + Savings) ÷ (Original price × Include tax?)</code></li><li><strong>Include tax?</strong> = <code>(Final price − Original price + Savings) ÷ (Original price × Sales tax)</code></li><li><strong>Final price</strong> = <code>Original price × Sales tax × Include tax? + Original price − Savings</code></li><li><strong>Total percent off</strong> = <code>− Percent off × 2^^nd^^ percent off + Percent off + 2^^nd^^ percent off</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Savings</strong> = <code>− Final price + Original price × Sales tax × Include tax? + Original price</code> — the form to use when Final price, Original price, Sales tax and Include tax? are the values you have.</li><li><strong>Original price</strong> = <code>(Final price + Savings) ÷ (Sales tax × Include tax? + 1)</code> — the form to use when Final price, Savings, Sales tax and Include tax? are the values you have.</li><li><strong>Sales tax</strong> = <code>(Final price − Original price + Savings) ÷ (Original price × Include tax?)</code> — the form to use when Final price, Original price, Savings and Include tax? are the values you have.</li><li><strong>Include tax?</strong> = <code>(Final price − Original price + Savings) ÷ (Original price × Sales tax)</code> — the form to use when Final price, Original price, Savings and Sales tax are the values you have.</li><li><strong>Final price</strong> = <code>Original price × Sales tax × Include tax? + Original price − Savings</code> — the form to use when Original price, Sales tax, Include tax? and Savings are the values you have.</li><li><strong>Total percent off</strong> = <code>− Percent off × 2^^nd^^ percent off + Percent off + 2^^nd^^ percent off</code> — the form to use when Percent off and 2^^nd^^ percent off are the values you have.</li><li><strong>2^^nd^^ percent off</strong> = <code>(Percent off − Total percent off) ÷ (Percent off − 1)</code> — the form to use when Percent off and Total percent off are the values you have.</li><li><strong>Percent off</strong> = <code>(2^^nd^^ percent off − Total percent off) ÷ (2^^nd^^ percent off − 1)</code> — the form to use when 2^^nd^^ percent off and Total percent off are the values you have.</li></ul><p>Any one of Final price, 2^^nd^^ percent off and Original price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Percent off, Total percent off and Sales tax is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with 2^^nd^^ percent off is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Original price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Original price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Percent off left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Percent off is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Original price to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Original price</strong> takes a plain number with no unit attached. It feeds 2^^nd^^ percent off, Percent off and Include tax?. Have it to hand before you start: Original price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Percent off</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds 2^^nd^^ percent off, Original price and Include tax?. Have it to hand before you start: Percent off is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Final price</strong> takes a plain number with no unit attached. It feeds 2^^nd^^ percent off, Original price and Percent off. Have it to hand before you start: Final price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Savings</strong> takes a plain number with no unit attached. It feeds Original price, Sales tax and Include tax?. Have it to hand before you start: Savings is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total percent off</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Total percent off including two discounts. It feeds 2^^nd^^ percent off and Percent off. Have it to hand before you start: Total percent off is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Include tax?</strong> takes a plain number with no unit attached. It feeds 2^^nd^^ percent off, Original price and Percent off. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Include tax? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Sales tax</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds 2^^nd^^ percent off, Original price and Percent off. Have it to hand before you start: Sales tax is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>2^^nd^^ percent off</strong> is a percent figure. The value follows from Final price, Original price, Percent off and Sales tax. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Second discount CB = 0, the answer is <strong>Include tax?</strong> = 0.</li><li>With Second discount CB = 0, the answer is <strong>Include tax?</strong> = 0.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> 2^^nd^^ percent off follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Original price, Percent off and Final price are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Original price, Percent off and Final price and the number you are missing is 2^^nd^^ percent off.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/boat-loan">Boat loan</a>, <a href="/finance/bond-convexity">Bond convexity</a> and <a href="/finance/bond-current-yield">Bond current yield Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Percent off calculator work out?', 'a' => '2^^nd^^ percent off, from Original price, Percent off, 2^^nd^^ percent off and Sales tax.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Original price (USD), Percent off (percent), Final price (USD), Savings (USD), Total percent off (percent). With original price, percent off and final price in place, 2^^nd^^ percent off can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Final price, 2^^nd^^ percent off, Original price and Percent off blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Include tax? = 0. The figures come from Original price as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            2^^nd^^ percent off is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Original price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to 2^^nd^^ percent off at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/boat-loan', 'name' => 'Boat loan'],
            ['path' => '/finance/bond-convexity', 'name' => 'Bond convexity'],
            ['path' => '/finance/bond-current-yield', 'name' => 'Bond current yield Calculator'],
        ],
        'authors' => [],
    ],
];
