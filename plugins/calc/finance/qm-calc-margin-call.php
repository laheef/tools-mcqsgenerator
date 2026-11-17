<?php

/**
 * Margin call
 * /finance/margin-call
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Margin call',
    'meta' => ['title' => 'Margin call Calculator: Formula, Steps & Examples', 'description' => 'Margin call works out point value and number of points from initial deposit, current initial margin per contract and current maintenance margin per contract.', 'h1' => 'Margin call Calculator', 'updated' => '2024-06-24'],
    'sections' => [
        [
            'title' => 'Account details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_deposit',
                            'label' => 'Initial deposit',
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
                            'name' => 'current_initial_margin',
                            'label' => 'Current initial margin per contract',
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
                            'name' => 'current_maintenance_margin',
                            'label' => 'Current maintenance margin per contract',
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
                            'name' => 'number_of_contracts',
                            'label' => 'Number of futures contracts',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Contract specification',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'trading_direction_VS',
                            'label' => 'Trading direction?',
                            'type' => 'select',
                            'options' => ['Long position' => '0', 'Short position' => '1'],
                            'dataset' => 'Trading direction DS',
                            'default' => 'Long position',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'futures_contract_VS',
                            'label' => 'Select your futures contract:',
                            'type' => 'select',
                            'options' => [
                                'E-Mini S&P 500' => '12.5',
                                'E-Mini NASDAQ-100' => '5',
                                'E-Mini Russel 2000' => '5',
                                'Crude oil WTI' => '10',
                                'Palladium PA' => '5',
                                'E-mini Dow (YM) Globex' => '5',
                                'Custom' => '',
                            ],
                            'dataset' => 'Future contract DS',
                            'control' => 'DROPDOWN',
                            'default' => 'E-Mini S&P 500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tick_value',
                            'label' => 'Tick value',
                            'type' => 'result',
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
                            'name' => 'tick_per_point',
                            'label' => 'Number of ticks per point',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'point_value',
                            'label' => 'Point value',
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
            'title' => 'Trading',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'buying_contract_price',
                            'label' => 'Add your buying contract price',
                            'type' => 'number',
                            'suffix' => 'points',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'selling_contract_price',
                            'label' => 'Add your selling contract price',
                            'type' => 'number',
                            'suffix' => 'points',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_points',
                            'label' => 'Number of points',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'profit_loss_long',
                            'label' => 'Profit / loss for a long position',
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
                            'name' => 'profit_loss_short',
                            'label' => 'Profit / loss for a short position',
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
                    'place' => [0, 0, 0],
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'trading_direction_VS == 0 and profit_loss_long > 0', 'text' => 'Congratulations, you are making profits in your futures long position. Consider investing that money into a high ROCE company.'],
                                ['when' => 'trading_direction_VS == 1 and profit_loss_long < 0', 'text' => 'Congratulations, you are making profits in your futures short position. Consider investing that money into a high free cash flow margin company.'],
                            ],
                        ],
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'trading_direction_VS == 0 and hasValue(current_account_value_long)', 'text' => 'Your current account value is {{current_account_value_long.monetaryValue}}.'],
                                ['when' => 'trading_direction_VS == 1 and hasValue(current_account_value_short)', 'text' => 'Your current account value is {{current_account_value_short.monetaryValue}}.'],
                            ],
                        ],
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'trading_direction_VS == 0 and (current_account_value_long < current_total_maintenance_margin)', 'text' => 'You will get a margin call. Better put {{margin_refill_long.monetaryValue}} in your account.'],
                                ['when' => 'trading_direction_VS == 1 and (current_account_value_short < current_total_maintenance_margin)', 'text' => 'You will get a margin call. Better put {{margin_refill_short.monetaryValue}} in your account.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Total margin amounts',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_total_initial_margin',
                            'label' => 'Current total initial margin',
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
                            'name' => 'current_total_maintenance_margin',
                            'label' => 'Current total maintenance margin',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 0, 1, 1],
                    'fields' => [
                        [
                            'name' => 'current_account_value_long',
                            'label' => 'Current account value long',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'current_account_value_short',
                            'label' => 'Current account value short',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'margin_refill_long',
                            'label' => 'Margin refill long',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'margin_refill_short',
                            'label' => 'Margin refill short',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'profit_loss_long = tick_value * tick_per_point * number_of_points * number_of_contracts',
            'results' => [
                'tick_per_point' => 'profit_loss_long/(number_of_contracts*number_of_points*tick_value)',
                'profit_loss_long' => 'number_of_contracts*number_of_points*tick_per_point*tick_value',
                'tick_value' => 'profit_loss_long/(number_of_contracts*number_of_points*tick_per_point)',
                'number_of_contracts' => 'profit_loss_long/(number_of_points*tick_per_point*tick_value)',
                'number_of_points' => 'profit_loss_long/(number_of_contracts*tick_per_point*tick_value)',
            ],
        ],
        [
            'title' => 'number_of_points = selling_contract_price - buying_contract_price',
            'results' => ['selling_contract_price' => 'buying_contract_price + number_of_points', 'buying_contract_price' => '-number_of_points + selling_contract_price', 'number_of_points' => '-buying_contract_price + selling_contract_price'],
        ],
        [
            'title' => 'profit_loss_short = -profit_loss_long',
            'results' => ['profit_loss_short' => '-profit_loss_long', 'profit_loss_long' => '-profit_loss_short'],
        ],
        [
            'title' => 'point_value = tick_value * tick_per_point',
            'results' => ['tick_value' => 'point_value/tick_per_point', 'tick_per_point' => 'point_value/tick_value', 'point_value' => 'tick_per_point*tick_value'],
        ],
        [
            'title' => 'current_total_initial_margin = number_of_contracts * current_initial_margin',
            'results' => ['number_of_contracts' => 'current_total_initial_margin/current_initial_margin', 'current_total_initial_margin' => 'current_initial_margin*number_of_contracts', 'current_initial_margin' => 'current_total_initial_margin/number_of_contracts'],
        ],
        [
            'title' => 'current_total_maintenance_margin = number_of_contracts * current_maintenance_margin',
            'results' => ['number_of_contracts' => 'current_total_maintenance_margin/current_maintenance_margin', 'current_total_maintenance_margin' => 'current_maintenance_margin*number_of_contracts', 'current_maintenance_margin' => 'current_total_maintenance_margin/number_of_contracts'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Margin call takes Initial deposit, Current initial margin per contract and Current maintenance margin per contract and returns Tick value and Number of ticks per point. Nothing is looked up on this page: tick value is computed from initial deposit and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Tick value is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Margin call calculator works', 'html' => <<<'TXT'
            <p>The Margin call calculator applies one relationship to 18 numbers and reports Tick value and Number of ticks per point.</p><p>In the form&#039;s own words, Profit / loss for a long position = Number of futures contracts × Number of points × Number of ticks per point × Tick value.</p><p>What comes back is Tick value and Number of ticks per point — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 18 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Initial deposit</strong> — in USD</li><li><strong>Current initial margin per contract</strong> — in USD</li><li><strong>Current maintenance margin per contract</strong> — in USD</li><li><strong>Number of futures contracts</strong> — a plain number, no unit</li><li><strong>Trading direction?</strong> — a plain number, no unit</li><li><strong>Select your futures contract</strong> — a plain number, no unit</li><li><strong>Point value</strong> — in USD</li><li><strong>Add your buying contract price</strong> — in points</li><li><strong>Add your selling contract price</strong> — in points</li><li><strong>Number of points</strong> — a plain number, no unit</li><li><strong>Profit / loss for a long position</strong> — in USD</li><li><strong>Profit / loss for a short position</strong> — in USD</li><li><strong>Current total initial margin</strong> — in USD</li><li><strong>Current total maintenance margin</strong> — in USD</li><li><strong>Current account value long</strong> — in USD</li><li><strong>Current account value short</strong> — in USD</li><li><strong>Margin refill long</strong> — in USD</li><li><strong>Margin refill short</strong> — in USD</li></ul><p>What you get back is Tick value in USD, Number of ticks per point, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Initial deposit = 3 USD, Trading direction? = 0 and Select your futures contract = 12.5 — through the same formula and the panel reports <strong>Point value</strong> = 0 USD.</p><ul><li><strong>Point value</strong> = 0 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Profit / loss for a long position</strong> = <code>Number of futures contracts × Number of points × Number of ticks per point × Tick value</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Point value</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Tick value takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Profit / loss for a long position</strong> = <code>Number of futures contracts × Number of points × Number of ticks per point × Tick value</code></li><li><strong>Number of ticks per point</strong> = <code>Profit / loss for a long position ÷ (Number of futures contracts × Number of points × Tick value)</code></li><li><strong>Tick value</strong> = <code>Profit / loss for a long position ÷ (Number of futures contracts × Number of points × Number of ticks per point)</code></li><li><strong>Number of futures contracts</strong> = <code>Profit / loss for a long position ÷ (Number of points × Number of ticks per point × Tick value)</code></li><li><strong>Number of points</strong> = <code>Profit / loss for a long position ÷ (Number of futures contracts × Number of ticks per point × Tick value)</code></li><li><strong>Add your selling contract price</strong> = <code>Add your buying contract price + Number of points</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Profit / loss for a long position</strong> = <code>Number of futures contracts × Number of points × Number of ticks per point × Tick value</code> — the form to use when Number of futures contracts, Number of points, Number of ticks per point and Tick value are the values you have.</li><li><strong>Number of ticks per point</strong> = <code>Profit / loss for a long position ÷ (Number of futures contracts × Number of points × Tick value)</code> — the form to use when Profit / loss for a long position, Number of futures contracts, Number of points and Tick value are the values you have.</li><li><strong>Tick value</strong> = <code>Profit / loss for a long position ÷ (Number of futures contracts × Number of points × Number of ticks per point)</code> — the form to use when Profit / loss for a long position, Number of futures contracts, Number of points and Number of ticks per point are the values you have.</li><li><strong>Number of futures contracts</strong> = <code>Profit / loss for a long position ÷ (Number of points × Number of ticks per point × Tick value)</code> — the form to use when Profit / loss for a long position, Number of points, Number of ticks per point and Tick value are the values you have.</li><li><strong>Number of points</strong> = <code>Profit / loss for a long position ÷ (Number of futures contracts × Number of ticks per point × Tick value)</code> — the form to use when Profit / loss for a long position, Number of futures contracts, Number of ticks per point and Tick value are the values you have.</li><li><strong>Number of points</strong> = <code>− Add your buying contract price + Add your selling contract price</code> — the form to use when Add your buying contract price and Add your selling contract price are the values you have.</li><li><strong>Add your selling contract price</strong> = <code>Add your buying contract price + Number of points</code> — the form to use when Add your buying contract price and Number of points are the values you have.</li><li><strong>Add your buying contract price</strong> = <code>− Number of points + Add your selling contract price</code> — the form to use when Number of points and Add your selling contract price are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Profit / loss for a long position, Number of ticks per point and Tick value can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Initial deposit, from 3 to 6 — and the answers go from <strong>Point value</strong> 0 USD to <strong>Point value</strong> 0 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Tick value and Number of ticks per point are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Initial deposit left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial deposit is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Current initial margin per contract left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current initial margin per contract is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Current maintenance margin per contract left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current maintenance margin per contract is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Initial deposit to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Initial deposit, Current initial margin per contract, Current maintenance margin per contract and Number of futures contracts. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Initial deposit into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Tick value in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Tick value follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial deposit, Current initial margin per contract and Current maintenance margin per contract are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Initial deposit, Current initial margin per contract and Current maintenance margin per contract and the number you are missing is Tick value and Number of ticks per point.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/annual-salary">Annual salary Calculator</a>, <a href="/finance/annual-salary-per-hour">Annual salary per hour Calculator</a> and <a href="/finance/annual-to-monthly-salary">Annual to monthly salary Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Margin call is a number to act on, so the useful question is what to do with Tick value (USD) and Number of ticks per point once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Initial deposit, Current initial margin per contract, Current maintenance margin per contract and Number of futures contracts alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Margin call calculator work out?', 'a' => <<<'TXT'
            Tick value and Number of ticks per point, from Number of futures contracts, Number of points, Number of ticks per point and Tick value. The relationship is Profit / loss for a long position = Number of futures contracts × Number of points × Number of ticks per point × Tick value.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial deposit (USD), Current initial margin per contract (USD), Current maintenance margin per contract (USD), Number of futures contracts, Trading direction?. Fill initial deposit, current initial margin per contract and current maintenance margin per contract and leave Tick value empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Profit / loss for a long position, Number of ticks per point, Tick value and Number of futures contracts can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Point value = 0 USD. That comes from the page\'s own defaults, entered in Initial deposit; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Tick value is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Initial deposit left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Tick value at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/annual-salary', 'name' => 'Annual salary Calculator'],
            ['path' => '/finance/annual-salary-per-hour', 'name' => 'Annual salary per hour Calculator'],
            ['path' => '/finance/annual-to-monthly-salary', 'name' => 'Annual to monthly salary Calculator'],
        ],
        'authors' => [],
    ],
];
