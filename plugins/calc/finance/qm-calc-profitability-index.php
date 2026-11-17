<?php

/**
 * Profitability index
 * /finance/profitability-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Profitability index',
    'meta' => ['title' => 'Profitability index: Formula, Steps & Results', 'description' => 'Enter initial investment and PV of future cash flow and get Profitability index (PI) back. Every box can be solved for, not only the one in the title.', 'h1' => 'Profitability index Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Initial_Investment',
                            'label' => 'Initial investment',
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
                            'name' => 'present_val',
                            'label' => 'PV of future cash flow',
                            'type' => 'number',
                            'help' => 'Present value of future cash flow',
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
                            'name' => 'prof_index',
                            'label' => 'Profitability index (PI)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'advanced_mode',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Calculate PI if the PV of future cash flow is unknown' => '1', '' => '0'],
                            'dataset' => 'advanced mode',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Future cash flows',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Initial_Investment_advanced',
                            'label' => 'Initial investment',
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
                            'label' => 'Discount rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'years',
                            'label' => 'Number of years',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year1',
                            'label' => 'Year 1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year2',
                            'label' => 'Year 2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year3',
                            'label' => 'Year 3',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year4',
                            'label' => 'Year 4',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year5',
                            'label' => 'Year 5',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year6',
                            'label' => 'Year 6',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year7',
                            'label' => 'Year 7',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year8',
                            'label' => 'Year 8',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year9',
                            'label' => 'Year 9',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year10',
                            'label' => 'Year 10',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results using future cash flows',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'y1',
                            'label' => 'PV for year 1',
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
                            'name' => 'y2',
                            'label' => 'PV for year 2',
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
                            'name' => 'y3',
                            'label' => 'PV for year 3',
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
                            'name' => 'y4',
                            'label' => 'PV for year 4',
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
                            'name' => 'y5',
                            'label' => 'PV for year 5',
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
                            'name' => 'y6',
                            'label' => 'PV for year 6',
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
                            'name' => 'y7',
                            'label' => 'PV for year 7',
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
                            'name' => 'y8',
                            'label' => 'PV for year 8',
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
                            'name' => 'y9',
                            'label' => 'PV for year 9',
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
                            'name' => 'y10',
                            'label' => 'PV for year 10',
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
                            'name' => 'PV_advanced',
                            'label' => 'Total PV of future cash flows',
                            'type' => 'number',
                            'help' => 'Sum of the present value of future flows',
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
                            'name' => 'PI_advanced',
                            'label' => 'Profitability index',
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
            'title' => 'prof_index = present_val / Initial_Investment',
            'results' => ['prof_index' => 'present_val/Initial_Investment', 'present_val' => 'Initial_Investment*prof_index', 'Initial_Investment' => 'present_val/prof_index'],
        ],
        [
            'title' => 'PV_advanced = one_way(y1+y2+y3+y4+y5+y6+y7+y8+y9+y10)',
            'results' => ['PV_advanced' => <<<'TXT'
            ((year1/(discount + 1)) + (year10/pow(discount + 1, 10)) + (year2/pow(discount + 1, 2)) + (year3/pow(discount + 1, 3)) + (year4/pow(discount + 1, 4)) + (year5/pow(discount + 1, 5)) + (year6/pow(discount + 1, 6)) + (year7/pow(discount + 1, 7)) + (year8/pow(discount + 1, 8)) + (year9/pow(discount + 1, 9)))
            TXT],
        ],
        [
            'title' => 'PI_advanced = one_way(PV_advanced / Initial_Investment_advanced)',
            'results' => ['PI_advanced' => <<<'TXT'
            (((year1/(discount + 1)) + (year10/pow(discount + 1, 10)) + (year2/pow(discount + 1, 2)) + (year3/pow(discount + 1, 3)) + (year4/pow(discount + 1, 4)) + (year5/pow(discount + 1, 5)) + (year6/pow(discount + 1, 6)) + (year7/pow(discount + 1, 7)) + (year8/pow(discount + 1, 8)) + (year9/pow(discount + 1, 9)))/Initial_Investment_advanced)
            TXT],
        ],
        [
            'title' => 'y1 = one_way(year1 / (1+discount)^1)',
            'results' => ['y1' => '(year1/(discount + 1))'],
        ],
        [
            'title' => 'y2 = one_way(year2 / (1+discount)^2)',
            'results' => ['y2' => '(year2/pow(discount + 1, 2))'],
        ],
        [
            'title' => 'y3 = one_way(year3 / (1+discount)^3)',
            'results' => ['y3' => '(year3/pow(discount + 1, 3))'],
        ],
        [
            'title' => 'y4 = one_way(year4 / (1+discount)^4)',
            'results' => ['y4' => '(year4/pow(discount + 1, 4))'],
        ],
        [
            'title' => 'y5 = one_way(year5 / (1+discount)^5)',
            'results' => ['y5' => '(year5/pow(discount + 1, 5))'],
        ],
        [
            'title' => 'y6 = one_way(year6 / (1+discount)^6)',
            'results' => ['y6' => '(year6/pow(discount + 1, 6))'],
        ],
        [
            'title' => 'y7 = one_way(year7 / (1+discount)^7)',
            'results' => ['y7' => '(year7/pow(discount + 1, 7))'],
        ],
        [
            'title' => 'y8 = one_way(year8 / (1+discount)^8)',
            'results' => ['y8' => '(year8/pow(discount + 1, 8))'],
        ],
        [
            'title' => 'y9 = one_way(year9 / (1+discount)^9)',
            'results' => ['y9' => '(year9/pow(discount + 1, 9))'],
        ],
        [
            'title' => 'y10 = one_way(year10 / (1+discount)^10) ',
            'results' => ['y10' => '(year10/pow(discount + 1, 10))'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Profitability index works out Profitability index (PI) and PV for year 1 from Initial investment and PV of future cash flow. It is a single relationship that reads profitability index (PI) out of initial investment, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Profitability index calculator works', 'html' => <<<'TXT'
            <p>The Profitability index calculator applies one relationship to 2 numbers and reports Profitability index (PI), PV for year 1 and PV for year 2.</p><p>Written with the labels from the form, Profitability index (PI) = PV of future cash flow ÷ Initial investment.</p><p>The result panel carries Profitability index (PI), PV for year 1, PV for year 2 and PV for year 3, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Initial investment</strong> — in USD</li><li><strong>PV of future cash flow</strong> — in USD. Present value of future cash flow</li></ul><p>The result boxes are Profitability index (PI), PV for year 1 in USD, PV for year 2 in USD, PV for year 3 in USD, PV for year 4 in USD, PV for year 5 in USD, PV for year 6 in USD, PV for year 7 in USD, PV for year 8 in USD, PV for year 9 in USD, PV for year 10 in USD, Total PV of future cash flows in USD, Profitability index; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Advanced mode = 0, Initial investment = 3 USD, Discount rate = 4 perc, Number of years = 1, Year 1 = 6 USD, Year 2 = 7 USD, Year 3 = 8 USD, Year 4 = 9 USD, Year 5 = 10 USD, Year 6 = 2 USD, Year 7 = 3 USD, Year 8 = 4 USD, Year 9 = 5 USD and Year 10 = 6 USD — through the same formula and the panel reports <strong>Total PV of future cash flows</strong> = 1.56 USD, <strong>Profitability index</strong> = 0.5206, <strong>PV for year 1</strong> = 1.2 USD, <strong>PV for year 2</strong> = 0.28 USD, <strong>PV for year 3</strong> = 0.064 USD, <strong>PV for year 4</strong> = 0.0144 USD, <strong>PV for year 5</strong> = 0.0032 USD, <strong>PV for year 6</strong> = 1.280e-4 USD, <strong>PV for year 7</strong> = 3.840e-5 USD, <strong>PV for year 8</strong> = 1.024e-5 USD, <strong>PV for year 9</strong> = 2.560e-6 USD and <strong>PV for year 10</strong> = 6.144e-7 USD.</p><ul><li><strong>Total PV of future cash flows</strong> = 1.56 USD</li><li><strong>Profitability index</strong> = 0.5206</li><li><strong>PV for year 1</strong> = 1.2 USD</li><li><strong>PV for year 2</strong> = 0.28 USD</li><li><strong>PV for year 3</strong> = 0.064 USD</li><li><strong>PV for year 4</strong> = 0.0144 USD</li><li><strong>PV for year 5</strong> = 0.0032 USD</li><li><strong>PV for year 6</strong> = 1.280e-4 USD</li><li><strong>PV for year 7</strong> = 3.840e-5 USD</li><li><strong>PV for year 8</strong> = 1.024e-5 USD</li><li><strong>PV for year 9</strong> = 2.560e-6 USD</li><li><strong>PV for year 10</strong> = 6.144e-7 USD</li></ul><p>That is <strong>Profitability index (PI)</strong> = <code>PV of future cash flow ÷ Initial investment</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total PV of future cash flows</strong> = 1.56, <strong>Profitability index</strong> = 0.5206, <strong>PV for year 1</strong> = 1.2, <strong>PV for year 2</strong> = 0.28, <strong>PV for year 3</strong> = 0.064, <strong>PV for year 4</strong> = 0.0144, <strong>PV for year 5</strong> = 0.0032, <strong>PV for year 6</strong> = 1.280e-4, <strong>PV for year 7</strong> = 3.840e-5, <strong>PV for year 8</strong> = 1.024e-5, <strong>PV for year 9</strong> = 2.560e-6 and <strong>PV for year 10</strong> = 6.144e-7. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Discount rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Profitability index (PI)</strong> = <code>PV of future cash flow ÷ Initial investment</code></li><li><strong>PV of future cash flow</strong> = <code>Initial investment × Profitability index (PI)</code></li><li><strong>Initial investment</strong> = <code>PV of future cash flow ÷ Profitability index (PI)</code></li><li><strong>PV for year 1</strong> = <code>(Year 1 ÷ (Discount rate + 1))</code></li><li><strong>PV for year 2</strong> = <code>(Year 2 ÷ (Discount rate + 1)^(2))</code></li><li><strong>PV for year 3</strong> = <code>(Year 3 ÷ (Discount rate + 1)^(3))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Profitability index (PI)</strong> = <code>PV of future cash flow ÷ Initial investment</code> — the form to use when PV of future cash flow and Initial investment are the values you have.</li><li><strong>PV of future cash flow</strong> = <code>Initial investment × Profitability index (PI)</code> — the form to use when Initial investment and Profitability index (PI) are the values you have.</li><li><strong>Initial investment</strong> = <code>PV of future cash flow ÷ Profitability index (PI)</code> — the form to use when PV of future cash flow and Profitability index (PI) are the values you have.</li><li><strong>PV for year 1</strong> = <code>(Year 1 ÷ (Discount rate + 1))</code> — the form to use when Year 1 and Discount rate are the values you have.</li><li><strong>PV for year 2</strong> = <code>(Year 2 ÷ (Discount rate + 1)^(2))</code> — the form to use when Year 2 and Discount rate are the values you have.</li><li><strong>PV for year 3</strong> = <code>(Year 3 ÷ (Discount rate + 1)^(3))</code> — the form to use when Year 3 and Discount rate are the values you have.</li><li><strong>PV for year 4</strong> = <code>(Year 4 ÷ (Discount rate + 1)^(4))</code> — the form to use when Year 4 and Discount rate are the values you have.</li><li><strong>PV for year 5</strong> = <code>(Year 5 ÷ (Discount rate + 1)^(5))</code> — the form to use when Year 5 and Discount rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Profitability index (PI), PV of future cash flow and Initial investment can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Profitability index (PI), PV for year 1 and PV for year 2 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial investment left as a guess.</strong> Anything typed into Initial investment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>PV of future cash flow left as a guess.</strong> Anything typed into PV of future cash flow is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Initial investment and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Profitability index form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial investment</strong> takes a plain number with no unit attached. The page reads it when it works out Profitability index (PI) and PV of future cash flow. Fill it from a measurement rather than a memory — Initial investment is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>PV of future cash flow</strong> takes a plain number with no unit attached. Present value of future cash flow. The page reads it when it works out Profitability index (PI) and Initial investment. Fill it from a measurement rather than a memory — PV of future cash flow is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Initial investment and PV of future cash flow ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Initial investment — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Profitability index (PI) against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Profitability index (PI) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Initial investment and PV of future cash flow is what you already know and Profitability index (PI) and PV for year 1 is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/after-tax-cost-of-debt">After-tax cost of debt Calculator</a>, <a href="/finance/agi">AGI Calculator</a> and <a href="/finance/alabama-tax">Alabama tax Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Profitability index is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Profitability index calculator work out?', 'a' => <<<'TXT'
            Profitability index (PI), PV for year 1, PV for year 2 and PV for year 3, from PV of future cash flow and Initial investment. The relationship is Profitability index (PI) = PV of future cash flow ÷ Initial investment.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial investment (USD), PV of future cash flow (USD). With initial investment and PV of future cash flow in place, Profitability index (PI) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Profitability index (PI), PV of future cash flow, Initial investment and Total PV of future cash flows can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total PV of future cash flows = 1.56 USD, Profitability index = 0.5206, PV for year 1 = 1.2 USD, PV for year 2 = 0.28 USD, PV for year 3 = 0.064 USD, PV for year 4 = 0.0144 USD, PV for year 5 = 0.0032 USD, PV for year 6 = 1.280e-4 USD, PV for year 7 = 3.840e-5 USD, PV for year 8 = 1.024e-5 USD, PV for year 9 = 2.560e-6 USD and PV for year 10 = 6.144e-7 USD. The figures come from Initial investment as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Profitability index (PI) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial investment blank and the page solves for it, reporting Profitability index (PI) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Profitability index (PI) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/after-tax-cost-of-debt', 'name' => 'After-tax cost of debt Calculator'],
            ['path' => '/finance/agi', 'name' => 'AGI Calculator'],
            ['path' => '/finance/alabama-tax', 'name' => 'Alabama tax Calculator'],
        ],
        'authors' => [],
    ],
];
