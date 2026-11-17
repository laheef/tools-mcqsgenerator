<?php

/**
 * Coffee to water ratio
 * /food/coffee-to-water-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Coffee to water ratio',
    'meta' => ['title' => 'Coffee to water ratio — Free Online Calculator', 'description' => 'Find a coffee-to-water ratio for your brew style, strength and batch size. Check serving sizes and labels before relying on the estimate.', 'h1' => 'Coffee to water ratio Calculator', 'updated' => '2024-05-31'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'brew',
                            'label' => 'Brew type',
                            'type' => 'select',
                            'options' => ['general formula' => '1', 'French press' => '2', 'drip or pour over' => '3', 'cold brew' => '4'],
                            'dataset' => 'type',
                            'default' => 'general formula',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'strength1',
                            'label' => 'Strength',
                            'type' => 'select',
                            'options' => ['regular' => '18', 'strong' => '15'],
                            'dataset' => 'ratios_general',
                            'default' => 'regular',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'strength2',
                            'label' => 'Strength',
                            'type' => 'select',
                            'options' => ['regular' => '17', 'strong' => '11'],
                            'dataset' => 'ratios_french',
                            'default' => 'regular',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'strength3',
                            'label' => 'Strength',
                            'type' => 'select',
                            'options' => ['regular' => '17', 'strong' => '15'],
                            'dataset' => 'ratios_drip',
                            'default' => 'regular',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'strength4',
                            'label' => 'Strength',
                            'type' => 'select',
                            'options' => ['regular' => '8', 'strong' => '5'],
                            'dataset' => 'ratios_cold',
                            'default' => 'regular',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratio1',
                            'label' => 'which means 1 part coffee to',
                            'type' => 'number',
                            'suffix' => 'parts water',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratio2',
                            'label' => 'which means 1 part coffee to',
                            'type' => 'number',
                            'suffix' => 'parts water',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratio3',
                            'label' => 'which means 1 part coffee to',
                            'type' => 'number',
                            'suffix' => 'parts water',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratio4',
                            'label' => 'which means 1 part coffee to',
                            'type' => 'number',
                            'suffix' => 'parts water',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water1',
                            'label' => 'Amount of water',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water2',
                            'label' => 'Amount of water',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water3',
                            'label' => 'Amount of water',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water4',
                            'label' => 'Amount of water',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coffee1',
                            'label' => 'Amount of coffee',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coffee2',
                            'label' => 'Amount of coffee',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coffee3',
                            'label' => 'Amount of coffee',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coffee4',
                            'label' => 'Amount of coffee',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'ratio1=strength1',
            'results' => ['ratio1' => 'strength1', 'strength1' => 'ratio1'],
        ],
        [
            'title' => 'ratio2=strength2',
            'results' => ['ratio2' => 'strength2', 'strength2' => 'ratio2'],
        ],
        [
            'title' => 'ratio3=strength3',
            'results' => ['strength3' => 'ratio3', 'ratio3' => 'strength3'],
        ],
        [
            'title' => 'ratio4=strength4',
            'results' => ['strength4' => 'ratio4', 'ratio4' => 'strength4'],
        ],
        [
            'title' => 'water1 = coffee1*ratio1',
            'results' => ['coffee1' => 'water1/ratio1', 'water1' => 'coffee1*ratio1', 'ratio1' => 'water1/coffee1'],
        ],
        [
            'title' => 'water2 = coffee2*ratio2',
            'results' => ['water2' => 'coffee2*ratio2', 'ratio2' => 'water2/coffee2', 'coffee2' => 'water2/ratio2'],
        ],
        [
            'title' => 'water3 = coffee3*ratio3',
            'results' => ['water3' => 'coffee3*ratio3', 'coffee3' => 'water3/ratio3', 'ratio3' => 'water3/coffee3'],
        ],
        [
            'title' => 'water4 = coffee4*ratio4',
            'results' => ['water4' => 'coffee4*ratio4', 'coffee4' => 'water4/ratio4', 'ratio4' => 'water4/coffee4'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => 'Coffee to water ratio works in both directions, between strength and which means 1 part coffee to.',
        'sections' => [
            ['title' => 'How the Coffee to water ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Coffee to water ratio: it takes 1 number and reports Strength, Strength and Strength.</p><p>Written with the labels from the form, which means 1 part coffee to = Strength.</p><p>The answers are Strength, Strength, Strength and which means 1 part coffee to; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Strength</strong> — a plain number, no unit</li></ul><p>The result boxes are Strength, Strength, Strength, which means 1 part coffee to in parts water, which means 1 part coffee to in parts water, which means 1 part coffee to in parts water, which means 1 part coffee to in parts water, Amount of water in milliliters, Amount of water in milliliters, Amount of water in milliliters, Amount of water in milliliters, Amount of coffee in grams, Amount of coffee in grams, Amount of coffee in grams, Amount of coffee in grams; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Brew type = 1; the answers are <strong>Strength</strong> = 18, <strong>Strength</strong> = 17, <strong>Strength</strong> = 17, <strong>Strength</strong> = 8, <strong>which means 1 part coffee to</strong> = 18 parts water, <strong>which means 1 part coffee to</strong> = 17 parts water, <strong>which means 1 part coffee to</strong> = 17 parts water and <strong>which means 1 part coffee to</strong> = 8 parts water.</p><ul><li><strong>Strength</strong> = 18</li><li><strong>Strength</strong> = 17</li><li><strong>Strength</strong> = 17</li><li><strong>Strength</strong> = 8</li><li><strong>which means 1 part coffee to</strong> = 18 parts water</li><li><strong>which means 1 part coffee to</strong> = 17 parts water</li><li><strong>which means 1 part coffee to</strong> = 17 parts water</li><li><strong>which means 1 part coffee to</strong> = 8 parts water</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>which means 1 part coffee to</strong> = <code>Strength</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Strength</strong> = 18, <strong>Strength</strong> = 17, <strong>Strength</strong> = 17, <strong>Strength</strong> = 8, <strong>which means 1 part coffee to</strong> = 18, <strong>which means 1 part coffee to</strong> = 17, <strong>which means 1 part coffee to</strong> = 17 and <strong>which means 1 part coffee to</strong> = 8 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Amount of water offers 16 units and opens on milliliters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>which means 1 part coffee to</strong> = <code>Strength</code></li><li><strong>Strength</strong> = <code>which means 1 part coffee to</code></li><li><strong>Amount of water</strong> = <code>Amount of coffee × which means 1 part coffee to</code></li><li><strong>Amount of coffee</strong> = <code>Amount of water ÷ which means 1 part coffee to</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>which means 1 part coffee to</strong> = <code>Strength</code> — the form to use when Strength are the values you have.</li><li><strong>Strength</strong> = <code>which means 1 part coffee to</code> — the form to use when which means 1 part coffee to are the values you have.</li><li><strong>which means 1 part coffee to</strong> = <code>Strength</code> — the form to use when Strength are the values you have.</li><li><strong>Strength</strong> = <code>which means 1 part coffee to</code> — the form to use when which means 1 part coffee to are the values you have.</li><li><strong>which means 1 part coffee to</strong> = <code>Strength</code> — the form to use when Strength are the values you have.</li><li><strong>Strength</strong> = <code>which means 1 part coffee to</code> — the form to use when which means 1 part coffee to are the values you have.</li><li><strong>which means 1 part coffee to</strong> = <code>Strength</code> — the form to use when Strength are the values you have.</li><li><strong>Strength</strong> = <code>which means 1 part coffee to</code> — the form to use when which means 1 part coffee to are the values you have.</li></ul><p>Any one of which means 1 part coffee to, Strength and which means 1 part coffee to can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Brew type, from 1 to 2 — and the answers go from <strong>Strength</strong> 18, <strong>Strength</strong> 17, <strong>Strength</strong> 17, <strong>Strength</strong> 8, <strong>which means 1 part coffee to</strong> 18 parts water, <strong>which means 1 part coffee to</strong> 17 parts water, <strong>which means 1 part coffee to</strong> 17 parts water and <strong>which means 1 part coffee to</strong> 8 parts water to <strong>Strength</strong> 18, <strong>Strength</strong> 17, <strong>Strength</strong> 17, <strong>Strength</strong> 8, <strong>which means 1 part coffee to</strong> 18 parts water, <strong>which means 1 part coffee to</strong> 17 parts water, <strong>which means 1 part coffee to</strong> 17 parts water and <strong>which means 1 part coffee to</strong> 8 parts water.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Strength, Strength and Strength are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Strength left as a guess.</strong> If Strength is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Convert Strength to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Coffee to water ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Strength</strong> takes a plain number with no unit attached. It feeds which means 1 part coffee to. Fill it from a measurement rather than a memory — Strength is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Strength ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Strength — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Strength against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Strength follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are milliliters and grams and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Strength are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Strength measured, Strength and Strength wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/taco-bar">Taco bar Calculator</a>, <a href="/food/thanksgiving-calories">Thanksgiving Calories</a> and <a href="/food/thanksgiving">Thanksgiving</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Coffee to water ratio is a number to act on, so the useful question is what to do with Strength, Strength and Strength once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> Write down Strength alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Coffee to water ratio calculator work out?', 'a' => 'Strength, Strength, Strength and which means 1 part coffee to, from Strength. The relationship is which means 1 part coffee to = Strength.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Strength. Fill strength and leave Strength empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of which means 1 part coffee to, Strength, which means 1 part coffee to and Strength blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'Are the Coffee to water ratio results exact?', 'a' => 'No. Nutrition and caffeine vary with brands, recipes, preparation and serving size. Use the product label for a closer estimate; this calculator is not individualized health advice.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Strength is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Strength blank and the page solves for it, reporting Strength instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Strength keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/food/coffee-ratio', 'name' => 'Coffee ratio'],
            ['path' => '/food/cold-brew-ratio', 'name' => 'Cold brew ratio'],
            ['path' => '/food/coffee', 'name' => 'Coffee']
        ],
    ],
];
