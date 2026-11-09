<?php

/**
 * Feed conversion ratio
 * /biology/fcr
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Feed conversion ratio',
    'meta' => ['title' => 'Feed conversion ratio Calculator: Units & Formula', 'description' => 'Enter total feed consumed, product type and initial animal(s) weight and Feed conversion ratio returns total weight gain by the animal(s) and FCR (meat).', 'h1' => 'Feed conversion ratio Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => 'Feed conversion ratio (FCR)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_feed',
                            'label' => 'Total feed consumed',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'productType',
                            'label' => 'Product type',
                            'type' => 'select',
                            'options' => ['Meat' => '0', 'Egg' => '1', 'Milk' => '2'],
                            'dataset' => 'product_typeDS',
                            'help' => 'Select the product the animal is being raised for.',
                            'default' => 'Meat',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'starting_weight',
                            'label' => 'Initial animal(s) weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_weight',
                            'label' => 'Final animal(s) weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_product',
                            'label' => 'Total weight gain by the animal(s)',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'milk_weight',
                            'label' => 'Weight of milk produced',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eggs_weight',
                            'label' => 'Weight of eggs produced',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numEggs',
                            'label' => 'Number of eggs produced',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fcr_meat',
                            'label' => 'FCR (meat)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fcr_milk',
                            'label' => 'FCR (milk)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fcr_eggs',
                            'label' => 'FCR (eggs)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fcr_NumEggs',
                            'label' => 'FCR (per dozen eggs)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Feed cost',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight_bought',
                            'label' => 'Weight of feed bought',
                            'type' => 'number',
                            'help' => 'Total weight of the feed purchased.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'expected_return',
                            'label' => 'Expected return',
                            'type' => 'number',
                            'help' => 'The weight of meat produced.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'expected_return_milk',
                            'label' => 'Expected return milk',
                            'type' => 'number',
                            'help' => 'The weight of milk produced.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'expected_return_eggs',
                            'label' => 'Expected return (eggs\' weight)',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'expected_return_NumEggs',
                            'label' => 'Expected return (eggs\' number)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_FeedPerWeight',
                            'label' => 'Cost of feed per unit weight',
                            'type' => 'number',
                            'help' => 'Cost of purchasing a unit weight of the feed.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cost_feed',
                            'label' => 'Total cost of feed',
                            'type' => 'number',
                            'suffix' => '$',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Economic FCR',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_feed_economic',
                            'label' => 'Total feed consumed',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_weight_animals',
                            'label' => 'Total weight of the live animals',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_weight_animals_byProducts',
                            'label' => 'Total weight of animal by-products',
                            'type' => 'number',
                            'help' => 'By-products include hide &amp; skin, feathers, blood, etc.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_weight_animal_slaughtered',
                            'label' => 'Total weight of slaughtered animals',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'economic_fcr',
                            'label' => 'Economic FCR',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Technical FCR',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_feed_technical',
                            'label' => 'Total feed consumed',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_of_animals',
                            'label' => 'Number of animals that left the farmhouse',
                            'type' => 'number',
                            'help' => 'Total number of animals that left the farm, including those lost to mortality.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'technical_fcr',
                            'label' => 'Technical FCR',
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
            'title' => 'total_product = final_weight - starting_weight',
            'results' => ['starting_weight' => 'final_weight - total_product', 'final_weight' => 'starting_weight + total_product', 'total_product' => 'final_weight - starting_weight'],
        ],
        [
            'title' => 'total_weight_animal_slaughtered = total_weight_animals - total_weight_animals_byProducts',
            'results' => ['total_weight_animals' => 'total_weight_animal_slaughtered + total_weight_animals_byProducts', 'total_weight_animals_byProducts' => '-total_weight_animal_slaughtered + total_weight_animals', 'total_weight_animal_slaughtered' => 'total_weight_animals - total_weight_animals_byProducts'],
        ],
        [
            'title' => 'economic_fcr = total_feed_economic / total_weight_animal_slaughtered',
            'results' => ['total_feed_economic' => 'economic_fcr*total_weight_animal_slaughtered', 'economic_fcr' => 'total_feed_economic/total_weight_animal_slaughtered', 'total_weight_animal_slaughtered' => 'total_feed_economic/economic_fcr'],
        ],
        [
            'title' => 'technical_fcr = total_feed_technical  / num_of_animals',
            'results' => ['technical_fcr' => 'total_feed_technical/num_of_animals', 'num_of_animals' => 'total_feed_technical/technical_fcr', 'total_feed_technical' => 'num_of_animals*technical_fcr'],
        ],
        [
            'title' => 'fcr_meat = total_feed / total_product',
            'results' => ['total_product' => 'total_feed/fcr_meat', 'total_feed' => 'fcr_meat*total_product', 'fcr_meat' => 'total_feed/total_product'],
        ],
        [
            'title' => 'fcr_milk = total_feed / milk_weight',
            'results' => ['total_feed' => 'fcr_milk*milk_weight', 'fcr_milk' => 'total_feed/milk_weight', 'milk_weight' => 'total_feed/fcr_milk'],
        ],
        [
            'title' => 'fcr_NumEggs = (total_feed * 12) / numEggs',
            'results' => ['total_feed' => '(1/12)*fcr_NumEggs*numEggs', 'fcr_NumEggs' => '12*total_feed/numEggs', 'numEggs' => '12*total_feed/fcr_NumEggs'],
        ],
        [
            'title' => 'fcr_eggs = total_feed / eggs_weight',
            'results' => ['eggs_weight' => 'total_feed/fcr_eggs', 'total_feed' => 'eggs_weight*fcr_eggs', 'fcr_eggs' => 'total_feed/eggs_weight'],
        ],
        [
            'title' => 'total_cost_feed = cost_FeedPerWeight * weight_bought',
            'results' => ['cost_FeedPerWeight' => 'total_cost_feed/weight_bought', 'weight_bought' => 'total_cost_feed/cost_FeedPerWeight', 'total_cost_feed' => 'cost_FeedPerWeight*weight_bought'],
        ],
        [
            'title' => 'expected_return = weight_bought / fcr_meat',
            'results' => ['expected_return' => 'weight_bought/fcr_meat', 'weight_bought' => 'expected_return*fcr_meat', 'fcr_meat' => 'weight_bought/expected_return'],
        ],
        [
            'title' => 'expected_return_milk = weight_bought / fcr_milk',
            'results' => ['fcr_milk' => 'weight_bought/expected_return_milk', 'weight_bought' => 'expected_return_milk*fcr_milk', 'expected_return_milk' => 'weight_bought/fcr_milk'],
        ],
        [
            'title' => 'expected_return_NumEggs = weight_bought * numEggs / total_feed',
            'results' => ['total_feed' => 'numEggs*weight_bought/expected_return_NumEggs', 'weight_bought' => 'expected_return_NumEggs*total_feed/numEggs', 'expected_return_NumEggs' => 'numEggs*weight_bought/total_feed', 'numEggs' => 'expected_return_NumEggs*total_feed/weight_bought'],
        ],
        [
            'title' => 'expected_return_eggs = weight_bought / fcr_eggs',
            'results' => ['expected_return_eggs' => 'weight_bought/fcr_eggs', 'weight_bought' => 'expected_return_eggs*fcr_eggs', 'fcr_eggs' => 'weight_bought/expected_return_eggs'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Feed conversion ratio takes Initial animal(s) weight and Final animal(s) weight and returns Total feed consumed and Total weight gain by the animal(s). There is no hidden constant here: change total feed consumed and initial animal(s) weight moves with it. The main result, Total feed consumed, is reported in kilograms.
        TXT,
        'sections' => [
            ['title' => 'How the Feed conversion ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Feed conversion ratio: it takes 2 numbers and reports Total feed consumed, Total weight gain by the animal(s) and Weight of milk produced.</p><p>In the form&#039;s own words, Total weight gain by the animal(s) = Final animal(s) weight − Initial animal(s) weight.</p><p>The result panel carries Total feed consumed, Total weight gain by the animal(s), Weight of milk produced and Weight of eggs produced, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Initial animal(s) weight</strong> — in kilograms</li><li><strong>Final animal(s) weight</strong> — in kilograms</li></ul><p>The result boxes are Total feed consumed in kilograms, Total weight gain by the animal(s) in kilograms, Weight of milk produced in liters, Weight of eggs produced in kilograms, Number of eggs produced, FCR (meat), FCR (milk), FCR (eggs), FCR (per dozen eggs), Weight of feed bought in kilograms, Expected return in kilograms, Expected return milk in kilograms, Expected return (eggs&#039; weight) in kilograms, Expected return (eggs&#039; number), Cost of feed per unit weight in kilograms, Total cost of feed in $, Total feed consumed in kilograms, Total weight of the live animals in kilograms, Total weight of animal by-products in kilograms, Total weight of slaughtered animals in kilograms, Economic FCR, Total feed consumed in kilograms, Number of animals that left the farmhouse, Technical FCR; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Total feed consumed offers 7 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total weight gain by the animal(s)</strong> = <code>Final animal(s) weight − Initial animal(s) weight</code></li><li><strong>Initial animal(s) weight</strong> = <code>Final animal(s) weight − Total weight gain by the animal(s)</code></li><li><strong>Final animal(s) weight</strong> = <code>Initial animal(s) weight + Total weight gain by the animal(s)</code></li><li><strong>Total weight of slaughtered animals</strong> = <code>Total weight of the live animals − Total weight of animal by-products</code></li><li><strong>Total weight of the live animals</strong> = <code>Total weight of slaughtered animals + Total weight of animal by-products</code></li><li><strong>Total weight of animal by-products</strong> = <code>− Total weight of slaughtered animals + Total weight of the live animals</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total weight gain by the animal(s)</strong> = <code>Final animal(s) weight − Initial animal(s) weight</code> — the form to use when Final animal(s) weight and Initial animal(s) weight are the values you have.</li><li><strong>Initial animal(s) weight</strong> = <code>Final animal(s) weight − Total weight gain by the animal(s)</code> — the form to use when Final animal(s) weight and Total weight gain by the animal(s) are the values you have.</li><li><strong>Final animal(s) weight</strong> = <code>Initial animal(s) weight + Total weight gain by the animal(s)</code> — the form to use when Initial animal(s) weight and Total weight gain by the animal(s) are the values you have.</li><li><strong>Total weight of slaughtered animals</strong> = <code>Total weight of the live animals − Total weight of animal by-products</code> — the form to use when Total weight of the live animals and Total weight of animal by-products are the values you have.</li><li><strong>Total weight of the live animals</strong> = <code>Total weight of slaughtered animals + Total weight of animal by-products</code> — the form to use when Total weight of slaughtered animals and Total weight of animal by-products are the values you have.</li><li><strong>Total weight of animal by-products</strong> = <code>− Total weight of slaughtered animals + Total weight of the live animals</code> — the form to use when Total weight of slaughtered animals and Total weight of the live animals are the values you have.</li><li><strong>Economic FCR</strong> = <code>Total feed consumed ÷ Total weight of slaughtered animals</code> — the form to use when Total feed consumed and Total weight of slaughtered animals are the values you have.</li><li><strong>Total feed consumed</strong> = <code>Economic FCR × Total weight of slaughtered animals</code> — the form to use when Economic FCR and Total weight of slaughtered animals are the values you have.</li></ul><p>Any one of Total weight gain by the animal(s), Initial animal(s) weight and Final animal(s) weight can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Initial animal(s) weight and Final animal(s) weight is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total feed consumed, Total weight gain by the animal(s) and Weight of milk produced are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Initial animal(s) weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial animal(s) weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Final animal(s) weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Final animal(s) weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Initial animal(s) weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Feed conversion ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial animal(s) weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. It feeds Final animal(s) weight and Total weight gain by the animal(s). Fill it from a measurement rather than a memory — Initial animal(s) weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Final animal(s) weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. It feeds Initial animal(s) weight and Total weight gain by the animal(s). Fill it from a measurement rather than a memory — Final animal(s) weight is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Initial animal(s) weight and Final animal(s) weight ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Initial animal(s) weight — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Total feed consumed in kg against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total feed consumed follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and liters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial animal(s) weight and Final animal(s) weight are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Initial animal(s) weight and Final animal(s) weight is what you already know and Total feed consumed and Total weight gain by the animal(s) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Feed conversion ratio calculator work out?', 'a' => <<<'TXT'
            Total feed consumed, Total weight gain by the animal(s), Weight of milk produced and Weight of eggs produced, from Final animal(s) weight and Initial animal(s) weight. The relationship is Total weight gain by the animal(s) = Final animal(s) weight − Initial animal(s) weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial animal(s) weight (kilograms), Final animal(s) weight (kilograms). With initial animal(s) weight and final animal(s) weight in place, Total feed consumed can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total weight gain by the animal(s), Initial animal(s) weight, Final animal(s) weight and Total weight of slaughtered animals blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total feed consumed is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial animal(s) weight blank and the page solves for it, reporting Total feed consumed instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total feed consumed at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/trihybrid-cross-punnett-square', 'name' => 'Trihybrid cross Punnett square Calculator'],
            ['path' => '/biology/trypan-blue-cell-viability', 'name' => 'Trypan Blue Cell Viability Calculator'],
            ['path' => '/biology/turtle-tank', 'name' => 'Turtle tank Calculator'],
        ],
        'authors' => [],
    ],
];
