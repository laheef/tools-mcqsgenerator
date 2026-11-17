<?php

/**
 * Self-rising flour
 * /food/self-rising-flour
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Self-rising flour',
    'meta' => ['title' => 'Self-rising flour Calculator: Free, With Steps', 'description' => 'Convert all-purpose flour into a self-rising flour mixture by calculating the flour and leavening amounts. Use as a guide.', 'h1' => 'Self-rising flour Calculator', 'updated' => '2026-08-04'],
    'sections' => [
        [
            'title' => 'To make self-rising flour...',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'self_rising_type',
                            'label' => 'Which type of flour are you making?',
                            'type' => 'select',
                            'options' => ['US self-rising flour' => '0', 'UK self-rising flour' => '1'],
                            'dataset' => 'type',
                            'help' => 'US self-rising flour adds extra salt.&nbsp;',
                            'default' => 'US self-rising flour',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'self_rising_flour_US',
                            'label' => 'How much self-rising flour do you need?',
                            'type' => 'number',
                            'unit' => '74',
                            'unit_default' => 'cups',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'self_rising_flour_UK',
                            'label' => 'How much self-rising flour do you need?',
                            'type' => 'number',
                            'unit' => '74',
                            'unit_default' => 'cups',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '...you will need:',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'all_flour_US',
                            'label' => 'All-purpose flour',
                            'type' => 'number',
                            'unit' => '74',
                            'unit_default' => 'cups',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'baking_powder_US',
                            'label' => 'Baking powder',
                            'type' => 'number',
                            'help' => 'The ratio is 2 teaspoons of baking powder for 1 cup of flour.',
                            'unit' => '658',
                            'unit_default' => 'tspBP',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salt',
                            'label' => 'Salt',
                            'type' => 'number',
                            'help' => 'The ratio is 1/4 teaspoons of salt for 1 cup of flour.',
                            'unit' => '101',
                            'unit_default' => 'teesp',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'all_flour_UK',
                            'label' => 'All-purpose flour',
                            'type' => 'number',
                            'unit' => '74',
                            'unit_default' => 'cups',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'baking_powder_UK',
                            'label' => 'Baking powder',
                            'type' => 'number',
                            'help' => 'The ratio is 2 teaspoons of baking powder for 1 cup of flour.',
                            'unit' => '658',
                            'unit_default' => 'tspBP',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'baking_powder_US = 9.6/125*(all_flour_US)',
            'results' => ['baking_powder_US' => '(48/625)*all_flour_US', 'all_flour_US' => '(625/48)*baking_powder_US'],
        ],
        [
            'title' => 'baking_powder_UK = 9.6/125*(all_flour_UK)',
            'results' => ['baking_powder_UK' => '(48/625)*all_flour_UK', 'all_flour_UK' => '(625/48)*baking_powder_UK'],
        ],
        [
            'title' => 'salt = 1.5/125*(all_flour_US)',
            'results' => ['salt' => '(3/250)*all_flour_US', 'all_flour_US' => '(250/3)*salt'],
        ],
        [
            'title' => 'self_rising_flour_US = all_flour_US + 9.6/125*(all_flour_US) + 1.5/125*(all_flour_US)',
            'results' => ['self_rising_flour_US' => '(1361/1250)*all_flour_US', 'all_flour_US' => '(1250/1361)*self_rising_flour_US'],
        ],
        [
            'title' => 'self_rising_flour_UK = all_flour_UK + 9.6/125*(all_flour_UK)',
            'results' => ['self_rising_flour_UK' => '(673/625)*all_flour_UK', 'all_flour_UK' => '(625/673)*self_rising_flour_UK'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Self-rising flour works in both directions, between how much self-rising flour do you need? and baking powder. The main result, How much self-rising flour do you need?, is reported in cups.
        TXT,
        'sections' => [
            ['title' => 'How the Self-rising flour calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Self-rising flour: it takes 1 number and reports How much self-rising flour do you need?, How much self-rising flour do you need? and Baking powder.</p><p>In the form&#039;s own words, Baking powder = (48 ÷ 625) × All-purpose flour.</p><p>The result panel carries How much self-rising flour do you need?, How much self-rising flour do you need?, Baking powder and Salt, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>All-purpose flour</strong> — in cups</li></ul><p>What you get back is How much self-rising flour do you need? in cups, How much self-rising flour do you need? in cups, Baking powder in teaspoons, Salt in teaspoons (5ml), All-purpose flour in cups, Baking powder in teaspoons, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: How much self-rising flour do you need? offers 7 units and opens on cups, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Baking powder</strong> = <code>(48 ÷ 625) × All-purpose flour</code></li><li><strong>All-purpose flour</strong> = <code>(625 ÷ 48) × Baking powder</code></li><li><strong>Salt</strong> = <code>(3 ÷ 250) × All-purpose flour</code></li><li><strong>How much self-rising flour do you need?</strong> = <code>(1361 ÷ 1250) × All-purpose flour</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Baking powder</strong> = <code>(48 ÷ 625) × All-purpose flour</code> — the form to use when All-purpose flour are the values you have.</li><li><strong>All-purpose flour</strong> = <code>(625 ÷ 48) × Baking powder</code> — the form to use when Baking powder are the values you have.</li><li><strong>Baking powder</strong> = <code>(48 ÷ 625) × All-purpose flour</code> — the form to use when All-purpose flour are the values you have.</li><li><strong>All-purpose flour</strong> = <code>(625 ÷ 48) × Baking powder</code> — the form to use when Baking powder are the values you have.</li><li><strong>Salt</strong> = <code>(3 ÷ 250) × All-purpose flour</code> — the form to use when All-purpose flour are the values you have.</li><li><strong>All-purpose flour</strong> = <code>(250 ÷ 3) × Salt</code> — the form to use when Salt are the values you have.</li><li><strong>How much self-rising flour do you need?</strong> = <code>(1361 ÷ 1250) × All-purpose flour</code> — the form to use when All-purpose flour are the values you have.</li><li><strong>All-purpose flour</strong> = <code>(1250 ÷ 1361) × How much self-rising flour do you need?</code> — the form to use when How much self-rising flour do you need? are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Baking powder, All-purpose flour and Baking powder can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside All-purpose flour is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with How much self-rising flour do you need?, How much self-rising flour do you need? and Baking powder are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>All-purpose flour left as a guess.</strong> If All-purpose flour is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If All-purpose flour is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>All-purpose flour</strong> is a cups quantity: the page opens it in cups and converts anything else you pick before the formula runs. The page reads it when it works out Baking powder, Salt and How much self-rising flour do you need?. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>How much self-rising flour do you need?</strong> is a cups figure. The value follows from All-purpose flour. </li><li><strong>How much self-rising flour do you need?</strong> is a cups figure. The value follows from All-purpose flour. </li><li><strong>Baking powder</strong> is a teaspoons figure. The value follows from All-purpose flour. </li><li><strong>Salt</strong> is a teaspoons (5ml) figure. The value follows from All-purpose flour. </li><li><strong>All-purpose flour</strong> is a cups figure. The value follows from Baking powder. </li><li><strong>Baking powder</strong> is a teaspoons figure. The value follows from All-purpose flour. </li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>cups</strong> — opens in <em>cups</em>, and the chip also carries cups, kg, dag, dl, lb and oz. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>teaspoons</strong> — opens in <em>tspBP</em>, and the chip also carries g and tbsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>teaspoons (5ml)</strong> — opens in <em>teesp</em>, and the chip also carries g, tsp and cups. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> How much self-rising flour do you need? follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are cups, teaspoons and teaspoons (5ml) and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes All-purpose flour are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when All-purpose flour is what you already know and How much self-rising flour do you need? and How much self-rising flour do you need? is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/grams-to-cups">Grams to cups</a>, <a href="/food/pancake-recipe">Pancake recipe</a> and <a href="/food/perfect-pancake">Perfect pancake</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Self-rising flour is a number to act on, so the useful question is what to do with How much self-rising flour do you need? (cups), How much self-rising flour do you need? (cups) and Baking powder (tspBP) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> Write down All-purpose flour alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Self-rising flour calculator work out?', 'a' => <<<'TXT'
            How much self-rising flour do you need?, How much self-rising flour do you need?, Baking powder and Salt, from All-purpose flour. The relationship is Baking powder = (48 ÷ 625) × All-purpose flour.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'All-purpose flour (cups). With all-purpose flour in place, How much self-rising flour do you need? can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Baking powder, All-purpose flour, Baking powder and All-purpose flour can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            How much self-rising flour do you need? is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With All-purpose flour left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to How much self-rising flour do you need? at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/food/grams-to-cups', 'name' => 'Grams to cups'],
            ['path' => '/food/pancake-recipe', 'name' => 'Pancake recipe'],
            ['path' => '/food/perfect-pancake', 'name' => 'Perfect pancake']
        ],
    ],
];
