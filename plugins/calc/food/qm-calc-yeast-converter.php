<?php

/**
 * Yeast converter
 * /food/yeast-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Yeast converter',
    'meta' => ['title' => 'Yeast converter Calculator — Formula, Units & Example', 'description' => 'Convert yeast quantity between types and common measures for a recipe. Check the ingredient, packing and units before using the result.', 'h1' => 'Yeast converter Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'I want to convert from',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_type',
                            'label' => 'Type',
                            'type' => 'select',
                            'options' => ['Active dry yeast' => '1', 'Instant yeast' => '2', 'Compressed fresh baker\'s yeast' => '3', 'Brewers\' yeast' => '4'],
                            'dataset' => 'Yeast Type',
                            'control' => 'DROPDOWN',
                            'defaults' => [
                                ['value' => 'Active dry yeast', 'when' => null],
                                ['value' => 'Active dry yeast', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'active_dry_yeast_qty',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'unit' => '394',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'instant_yeast_qty',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'unit' => '394',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fresh_baker_yeast_qty',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'unit' => '394',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'brewer_yeast_qty',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'unit' => '394',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'I want to convert to',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_type',
                            'label' => 'Type',
                            'type' => 'select',
                            'options' => ['Active dry yeast' => '1', 'Instant yeast' => '2', 'Compressed fresh baker\'s yeast' => '3', 'Brewers\' yeast' => '4'],
                            'dataset' => 'Yeast Type',
                            'control' => 'DROPDOWN',
                            'defaults' => [
                                ['value' => 'Compressed fresh baker\'s yeast', 'when' => null],
                                ['value' => 'Instant yeast', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Please choose two different types of yeast to make the best use of this calculator .'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'active_dry_yeast_qty_2',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'unit' => '394',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'instant_yeast_qty_2',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'unit' => '394',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fresh_baker_yeast_qty_2',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'unit' => '394',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'brewer_yeast_qty_2',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'unit' => '394',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'instant_yeast_qty = active_dry_yeast_qty * 2 / 3',
            'results' => ['active_dry_yeast_qty' => '(3/2)*instant_yeast_qty', 'instant_yeast_qty' => '(2/3)*active_dry_yeast_qty'],
        ],
        [
            'title' => 'fresh_baker_yeast_qty = active_dry_yeast_qty * 2',
            'results' => ['fresh_baker_yeast_qty' => '2*active_dry_yeast_qty', 'active_dry_yeast_qty' => '(1/2)*fresh_baker_yeast_qty'],
        ],
        [
            'title' => 'brewer_yeast_qty = active_dry_yeast_qty / 0.45',
            'results' => ['active_dry_yeast_qty' => '(9/20)*brewer_yeast_qty', 'brewer_yeast_qty' => '(20/9)*active_dry_yeast_qty'],
        ],
        [
            'title' => 'active_dry_yeast_qty_2 = active_dry_yeast_qty',
            'results' => ['active_dry_yeast_qty_2' => 'active_dry_yeast_qty', 'active_dry_yeast_qty' => 'active_dry_yeast_qty_2'],
        ],
        [
            'title' => 'instant_yeast_qty_2 = instant_yeast_qty',
            'results' => ['instant_yeast_qty_2' => 'instant_yeast_qty', 'instant_yeast_qty' => 'instant_yeast_qty_2'],
        ],
        [
            'title' => 'fresh_baker_yeast_qty_2 = fresh_baker_yeast_qty',
            'results' => ['fresh_baker_yeast_qty' => 'fresh_baker_yeast_qty_2', 'fresh_baker_yeast_qty_2' => 'fresh_baker_yeast_qty'],
        ],
        [
            'title' => 'brewer_yeast_qty_2 = active_dry_yeast_qty / 0.45',
            'results' => ['brewer_yeast_qty_2' => '(20/9)*active_dry_yeast_qty', 'active_dry_yeast_qty' => '(9/20)*brewer_yeast_qty_2'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Yeast reads one of quantity from the other, so either can be the value you fill in. Quantity is opened in tablespoons; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Yeast calculator works', 'html' => <<<'TXT'
            <p>Yeast answers one question from 1 number, and the answer is Quantity, Quantity and Quantity.</p><p>The relationship it solves reads Quantity = (2 ÷ 3) × Quantity.</p><p>The result panel carries Quantity, Quantity, Quantity and Quantity, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Quantity</strong> — in tablespoons</li></ul><p>The answers come back as Quantity in tablespoons, Quantity in tablespoons, Quantity in tablespoons, Quantity in tablespoons, Quantity in tablespoons, Quantity in tablespoons, Quantity in tablespoons. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Quantity offers 6 units and opens on tablespoons, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Quantity</strong> = <code>(2 ÷ 3) × Quantity</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Quantity</strong> = <code>(2 ÷ 3) × Quantity</code> — the form to use when Quantity are the values you have.</li><li><strong>Quantity</strong> = <code>(3 ÷ 2) × Quantity</code> — the form to use when Quantity are the values you have.</li><li><strong>Quantity</strong> = <code>2 × Quantity</code> — the form to use when Quantity are the values you have.</li><li><strong>Quantity</strong> = <code>(1 ÷ 2) × Quantity</code> — the form to use when Quantity are the values you have.</li><li><strong>Quantity</strong> = <code>(20 ÷ 9) × Quantity</code> — the form to use when Quantity are the values you have.</li><li><strong>Quantity</strong> = <code>(9 ÷ 20) × Quantity</code> — the form to use when Quantity are the values you have.</li><li><strong>Quantity</strong> = <code>Quantity</code> — the form to use when Quantity are the values you have.</li><li><strong>Quantity</strong> = <code>Quantity</code> — the form to use when Quantity are the values you have.</li></ul><p>Any one of Quantity, Quantity and Quantity can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Quantity is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Quantity, Quantity and Quantity are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Quantity left as a guess.</strong> If Quantity is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Convert Quantity to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Quantity</strong> is a tablespoons quantity: the page opens it in tbsp and converts anything else you pick before the formula runs. It feeds Quantity, Quantity and Quantity. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Quantity</strong> is a tablespoons figure. The value follows from Quantity. </li><li><strong>Quantity</strong> is a tablespoons figure. The value follows from Quantity. </li><li><strong>Quantity</strong> is a tablespoons figure. The value follows from Quantity. </li><li><strong>Quantity</strong> is a tablespoons figure. The value follows from Quantity. </li><li><strong>Quantity</strong> is a tablespoons figure. The value follows from Quantity. </li><li><strong>Quantity</strong> is a tablespoons figure. The value follows from Quantity. </li><li><strong>Quantity</strong> is a tablespoons figure. The value follows from Quantity. </li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>tablespoons</strong> — opens in <em>tbsp</em>, and the chip also carries cups, g, lb, oz and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Quantity. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Quantity into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Quantity in tbsp with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Quantity follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are tablespoons and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Quantity are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Quantity and the number you are missing is Quantity and Quantity.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/sourdough">Sourdough</a>, <a href="/food/bakers-percentage">Baker&#x27;s percentage</a> and <a href="/food/self-rising-flour">Self-rising flour</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Yeast calculator work out?', 'a' => 'Quantity, Quantity, Quantity and Quantity, from Quantity. The relationship is Quantity = (2 ÷ 3) × Quantity.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Quantity (tablespoons). With quantity in place, Quantity can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Quantity, Quantity, Quantity and Quantity blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Quantity is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Quantity left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Quantity keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/sourdough', 'name' => 'Sourdough'],
            ['path' => '/food/bakers-percentage', 'name' => 'Baker\'s percentage'],
            ['path' => '/food/self-rising-flour', 'name' => 'Self-rising flour']
        ],
    ],
];
