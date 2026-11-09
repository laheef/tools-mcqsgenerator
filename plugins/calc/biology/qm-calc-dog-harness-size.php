<?php

/**
 * Dog harness size
 * /biology/dog-harness-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog harness size',
    'meta' => ['title' => 'Dog harness size Calculator: Units & Formula', 'description' => 'Dog harness size turns weight and girth into min Weight Print and Max Weight Print. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Dog harness size Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'If you\'re unsure how to measure and weigh your dog, read the "How do I measure a dog for a harness?" section of the accompanying article.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => ' Weight',
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
                            'name' => 'girth',
                            'label' => ' Girth',
                            'type' => 'number',
                            'help' => 'Chest circumference, measured by wrapping a tailor\'s tape around the widest area of the dog\'s chest.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => <<<'TXT'
                                (weight > 0 and weight <= 5 and girth >= 8 and girth <=10) or (weight > 0 and weight < 5 and not(hasValue(girth))) or (girth >= 8 and girth < 9 and not(hasValue(weight)))
                                TXT, 'text' => 'Your dog size category is XX-Small. The recommended leash size for the dog with the above measurements is 5/16" (0.79&nbsp;cm) wide.'],
                                ['when' => '(weight == 5 and not(hasValue(girth))) or (girth >= 9 and girth <= 10 and not(hasValue(weight)))', 'text' => <<<'TXT'
                                Your dog size category is XX-Small to X-Small. The recommended leash size for the dog with the above measurement is 5/16" (0.79&nbsp;cm) to 3/8" (0.95&nbsp;cm) wide.
                                TXT],
                                ['when' => <<<'TXT'
                                (weight == 5 and girth > 10 and girth <=15) or (weight > 5 and weight <= 10 and girth >= 9 and girth <= 15) or (weight > 5 and weight < 10 and not(hasValue(girth))) or (girth > 10 and girth < 13 and not(hasValue(weight)))
                                TXT, 'text' => 'Your dog size category is X-Small. The recommended leash size for the dog with the above measurements is 3/8" (0.95&nbsp;cm) wide.'],
                                ['when' => '(weight == 10 and not(hasValue(girth))) or (girth >= 13 and girth <= 15 and not(hasValue(weight)))', 'text' => <<<'TXT'
                                Your dog size category is X-Small to Small. The recommended leash size for the dog with the above measurement is 3/8" (0.95&nbsp;cm) to 5/8" (1.59&nbsp;cm) wide.
                                TXT],
                                ['when' => <<<'TXT'
                                (weight == 10 and girth > 15 and girth <= 23) or (weight > 10 and weight <= 25 and girth >= 13 and girth <= 23) or (weight > 10 and weight < 25 and not(hasValue(girth))) or (girth > 15 and girth < 18 and not(hasValue(weight)))
                                TXT, 'text' => 'Your dog size category is Small. The recommended leash size for the dog with the above measurements is 5/8" (1.59&nbsp;cm) wide.'],
                                ['when' => '(weight == 25 and not(hasValue(girth))) or (girth >= 18 and girth < 22 and not(hasValue(weight)))', 'text' => <<<'TXT'
                                Your dog size category is Small to Medium. The recommended leash size for the dog with the above measurement is 5/8" (1.59&nbsp;cm) to 3/4" (1.905&nbsp;cm) wide.
                                TXT],
                                ['when' => <<<'TXT'
                                (weight == 25 and girth > 23 and girth <= 29) or (weight > 25 and weight <= 55 and girth >= 18 and girth <=29) or (weight > 25 and weight < 55 and not(hasValue(girth)))
                                TXT, 'text' => 'Your dog size category is Medium. The recommended leash size for the dog with the above measurements is 3/4" (1.905&nbsp;cm) wide.'],
                                ['when' => 'girth >= 22 and girth <= 23 and not(hasValue(weight))', 'text' => <<<'TXT'
                                Your dog size category is Small to Large. The recommended leash size for the dog with the above measurement is 5/8" (1.59&nbsp;cm) to 1" (2.54&nbsp;cm) wide, two-ply for strong pullers.
                                TXT],
                                ['when' => 'weight == 55 and not(hasValue(girth)) or (girth > 23 and girth < 28 and not(hasValue(weight)))', 'text' => <<<'TXT'
                                Your dog size category is Medium to Large. The recommended leash size for the dog with the above measurement is 3/4" (1.905&nbsp;cm) wide to 1" (2.54&nbsp;cm) wide, two-ply for strong pullers.
                                TXT],
                                ['when' => <<<'TXT'
                                (weight == 55 and girth > 29 and girth <= 39) or (weight > 55 and weight <= 75 and girth >= 22 and girth <= 39) or (weight > 55 and weight < 75 and not(hasValue(girth)))
                                TXT, 'text' => 'Your dog size category is Large. The recommended leash size for the dog with the above measurements is 1" (2.54&nbsp;cm) width, two-ply for strong pullers.'],
                                ['when' => 'girth >= 28 and girth <= 29 and not(hasValue(weight))', 'text' => <<<'TXT'
                                Your dog size category is Medium to X-Large. The recommended leash size for the dog with the above measurement is 3/4" (1.905&nbsp;cm) wide to 1.25" (3.175&nbsp;cm) wide, two-ply for strong pullers.
                                TXT],
                                ['when' => 'weight == 75 and not(hasValue(girth)) or (girth > 29 and girth <= 39 and not(hasValue(weight)))', 'text' => <<<'TXT'
                                Your dog size category is Large to X-Large. The recommended leash size for the dog with the above measurement is 1" (2.54&nbsp;cm) to 1.25" (3.18&nbsp;cm) wide, two-ply for strong pullers.
                                TXT],
                                ['when' => <<<'TXT'
                                (weight == 75 and girth > 39 and girth <= 48) or (weight > 75 and weight <= 343 and girth >= 28 and girth <= 48) or (weight > 75 and weight <= 343 and not(hasValue(girth))) or (girth > 39 and girth <= 48 and not(hasValue(weight)))
                                TXT, 'text' => <<<'TXT'
                                Your dog size category is X-Large. The recommended leash size for the dog with the above measurements is 1.25" (3.175&nbsp;cm) width, two-ply for strong pullers.
                                TXT],
                                ['when' => '(hasValue(weight) and (girth < minGirthPrint or girth > maxGirthPrint)) or (hasValue(girth) and (weight < minWeightPrint or weight > maxWeightPrint))', 'text' => 'The measurements entered seem unlikely; please double-check.&nbsp;'],
                                ['when' => <<<'TXT'
                                ((hasValue(weight) and weight <= 343 and not(hasValue(girth))) or (not(hasValue(weight)) and hasValue(girth) and girth >= 8)) and(((weight == 5 and not(hasValue(girth))) or (girth >= 9 and girth <= 10 and not(hasValue(weight)))) or ((weight == 10 and not(hasValue(girth))) or (girth >= 13 and girth <= 15 and not(hasValue(weight)))) or ((weight == 25 and not(hasValue(girth))) or (girth >= 18 and girth < 22 and not(hasValue(weight)))) or (girth >= 22 and girth <= 23 and not(hasValue(weight))) or (weight == 55 and not(hasValue(girth)) or (girth > 23 and girth < 28 and not(hasValue(weight)))) or (girth >= 28 and girth <= 29 and not(hasValue(weight))) or (weight == 75 and not(hasValue(girth)) or (girth > 29 and girth <= 39 and not(hasValue(weight)))))
                                TXT, 'text' => 'Please complete your inputs to obtain the final dog harness size estimate.&nbsp;'],
                                ['when' => 'hasValue(weight) and not(hasValue(girth)) and weight <= 343', 'text' => <<<'TXT'
                                With the weight you entered, the girth value must be from {{minGirthPrint.value}}&nbsp;{{minGirthPrint.unit}} to {{maxGirthPrint.value}}&nbsp;{{maxGirthPrint.unit}} ({{minGirthPrint_imperial.value}}&nbsp;{{minGirthPrint_imperial.unit}} to {{maxGirthPrint_imperial.value}}&nbsp;{{maxGirthPrint_imperial.unit}}).&nbsp;
                                TXT],
                                ['when' => 'not(hasValue(weight)) and hasValue(girth) and minWeightPrint > 0', 'text' => <<<'TXT'
                                With the girth you entered, the weight must be from {{minWeightPrint.value}}&nbsp;{{minWeightPrint.unit}} to {{maxWeightPrint.value}}&nbsp;{{maxWeightPrint.unit}} ({{minWeightPrint_imperial.value}}&nbsp;{{minWeightPrint_imperial.unit}} to {{maxWeightPrint_imperial.value}}&nbsp;{{maxWeightPrint_imperial.unit}}).&nbsp;
                                TXT],
                                ['when' => 'not(hasValue(weight)) and hasValue(girth) and minWeightPrint == 0 and girth >= 8 and girth <= 48', 'text' => <<<'TXT'
                                With the girth you entered, the weight must be {{maxWeightPrint.value}}&nbsp;{{maxWeightPrint.unit}} ({{maxWeightPrint_imperial.value}}&nbsp;{{maxWeightPrint_imperial.unit}}) or less.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden printed variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'minGirthPrint',
                            'label' => 'Min girth print',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maxGirthPrint',
                            'label' => 'Max girth print',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'minWeightPrint',
                            'label' => 'Min weight print',
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
                            'name' => 'maxWeightPrint',
                            'label' => 'Max weight print',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
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
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'minWeightPrint_imperial',
                            'label' => 'Min weight print imperial',
                            'type' => 'presentation',
                            'unit' => '22',
                            'unit_default' => 'lb',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maxWeightPrint_imperial',
                            'label' => 'Max weight print imperial',
                            'type' => 'presentation',
                            'unit' => '22',
                            'unit_default' => 'lb',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'minGirthPrint_imperial',
                            'label' => 'Min girth print imperial',
                            'type' => 'presentation',
                            'unit' => '4',
                            'unit_default' => 'inch',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maxGirthPrint_imperial',
                            'label' => 'Max girth print imperial',
                            'type' => 'presentation',
                            'unit' => '4',
                            'unit_default' => 'inch',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'minWeightPrint = get_minWeight(girth)',
            'results' => ['minWeightPrint' => 'get_minWeight(girth)'],
        ],
        [
            'title' => 'maxWeightPrint = get_maxWeight(girth)',
            'results' => ['maxWeightPrint' => 'get_maxWeight(girth)'],
        ],
        [
            'title' => 'minGirthPrint = get_minGirth(weight)',
            'results' => ['minGirthPrint' => 'get_minGirth(weight)'],
        ],
        [
            'title' => 'maxGirthPrint = get_maxGirth(weight)',
            'results' => ['maxGirthPrint' => 'get_maxGirth(weight)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_minWeight",function(girth){if(girth<8){return 0}else if(girth>=8&&girth<9){return 0}else if(girth>=9&&girth<=10){return 0}else if(girth>10&&girth<13){return 5}else if(girth>=13&&girth<=15){return 5}else if(girth>15&&girth<18){return 10}else if(girth>=18&&girth<22){return 10}else if(girth>=22&&girth<=23){return 10}else if(girth>23&&girth<28){return 25}else if(girth>=28&&girth<=29){return 25}else if(girth>29&&girth<=39){return 55}else if(girth>39&&girth<=48){return 75}else if(girth>48){return 75}});omni.define("get_maxWeight",function(girth){if(girth<8){return 0}else if(girth>=8&&girth<9){return 5}else if(girth>=9&&girth<=10){return 10}else if(girth>10&&girth<13){return 10}else if(girth>=13&&girth<=15){return 25}else if(girth>15&&girth<18){return 25}else if(girth>=18&&girth<22){return 55}else if(girth>=22&&girth<=23){return 75}else if(girth>23&&girth<28){return 75}else if(girth>=28&&girth<=29){return 343}else if(girth>29&&girth<=39){return 343}else if(girth>39&&girth<=48){return 343}else if(girth>48){return 343}});omni.define("get_minGirth",function(weight){if(weight>0&&weight<5){return 8}else if(weight===5){return 8}else if(weight>5&&weight<10){return 9}else if(weight===10){return 9}else if(weight>10&&weight<25){return 13}else if(weight===25){return 13}else if(weight>25&&weight<55){return 18}else if(weight===55){return 18}else if(weight>55&&weight<75){return 22}else if(weight===75){return 22}else if(weight>75){return 28}});omni.define("get_maxGirth",function(weight){if(weight>0&&weight<5){return 10}else if(weight===5){return 15}else if(weight>5&&weight<10){return 15}else if(weight===10){return 23}else if(weight>10&&weight<25){return 23}else if(weight===25){return 29}else if(weight>25&&weight<55){return 29}else if(weight===55){return 39}else if(weight>55&&weight<75){return 39}else if(weight===75){return 48}else if(weight>75){return 48}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Dog harness size works out Min girth print and Max girth print from Girth. Nothing is looked up on this page: min girth print is computed from girth and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Dog harness size calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dog harness size: it takes 1 number and reports Min girth print, Max girth print and Min weight print.</p><p>Written with the labels from the form, Min weight print = get_minWeight(Girth).</p><p>The answers are Min girth print, Max girth print, Min weight print and Max weight print; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Girth</strong> — in centimeters. Chest circumference, measured by wrapping a tailor&#039;s tape around the widest area of the dog&#039;s chest.</li></ul><p>The answers come back as Min girth print, Max girth print, Min weight print, Max weight print. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Weight lists 7 options and opens on kilograms. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Min weight print</strong> = <code>get_minWeight(Girth)</code></li><li><strong>Max weight print</strong> = <code>get_maxWeight(Girth)</code></li><li><strong>Min girth print</strong> = <code>get_minGirth(Weight)</code></li><li><strong>Max girth print</strong> = <code>get_maxGirth(Weight)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Min weight print</strong> = <code>get_minWeight(Girth)</code> — the form to use when Girth are the values you have.</li><li><strong>Max weight print</strong> = <code>get_maxWeight(Girth)</code> — the form to use when Girth are the values you have.</li><li><strong>Min girth print</strong> = <code>get_minGirth(Weight)</code> — the form to use when Weight are the values you have.</li><li><strong>Max girth print</strong> = <code>get_maxGirth(Weight)</code> — the form to use when Weight are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Min weight print, Max weight print and Min girth print can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Girth carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Min girth print, Max girth print and Min weight print are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Girth left as a guess.</strong> Anything typed into Girth is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Girth to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dog harness size form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Girth</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Chest circumference, measured by wrapping a tailor&#039;s tape around the widest area of the dog&#039;s chest. Change it and Min weight print and Max weight print changes with it. Fill it from a measurement rather than a memory — Girth is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Min girth print</strong> is a plain number. It is computed from Weight, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Max girth print</strong> is a plain number. It is computed from Weight, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Min weight print</strong> is a plain number. It is computed from Girth, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Max weight print</strong> is a plain number. It is computed from Girth, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Dog harness size actually offers.</p><ul><li><strong>centimeters</strong> — opens in <em>cm</em>, and the chip also carries cm, m, in, ft, yd and μm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Girth ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Girth — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Min girth print against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Min girth print is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover centimeters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Girth and the number you are missing is Min girth print and Max girth print.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Dog harness size is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog harness size calculator work out?', 'a' => 'Min girth print, Max girth print, Min weight print and Max weight print, from Girth. The relationship is Min weight print = get_minWeight(Girth).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Girth (centimeters). With girth in place, Min girth print can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Min weight print, Max weight print, Min girth print and Max girth print can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Min girth print is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Girth blank and the page solves for it, reporting Min girth print instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Min girth print keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/bacterial-growth-curve', 'name' => 'Bacterial Growth Curve (generation time) Calculator'],
            ['path' => '/biology/basal-area', 'name' => 'Basal area Calculator'],
            ['path' => '/biology/basal-metabolic-rate', 'name' => 'Basal Metabolic Rate (Mifflin–St Jeor) Calculator'],
        ],
        'authors' => [],
    ],
];
