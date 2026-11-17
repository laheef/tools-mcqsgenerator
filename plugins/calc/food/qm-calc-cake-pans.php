<?php

/**
 * Cake pan
 * /food/cake-pans
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cake pan',
    'meta' => ['title' => 'Cake pan Calculator: Formula, Steps & Examples', 'description' => 'Compare cake-pan capacities and scale a recipe between pan shapes using dimensions and volume. Check units and follow the recipe or package directions.', 'h1' => 'Cake pan Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Baking pan in recipe',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shape1',
                            'label' => 'Shape',
                            'type' => 'select',
                            'options' => ['Round ◯' => '1', 'Rectangle/square ⎕' => '2'],
                            'dataset' => 'shapes',
                            'default' => 'Round ◯',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'd1',
                            'label' => 'Pan diameter',
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
                            'name' => 'a1',
                            'label' => 'Side a',
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
                            'name' => 'b1',
                            'label' => 'Side b',
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
                            'name' => 'h1',
                            'label' => 'Pan height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '5', 'when' => null],
                                ['value' => '2', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area_1_c',
                            'label' => 'Pan volume',
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
                            'name' => 'area_1_r',
                            'label' => 'Pan volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Your baking pan',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shape2',
                            'label' => 'Shape',
                            'type' => 'select',
                            'options' => ['Round ◯' => '1', 'Rectangle/square ⎕' => '2'],
                            'dataset' => 'shapes',
                            'default' => 'Round ◯',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'd2',
                            'label' => 'Pan diameter',
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
                            'name' => 'a2',
                            'label' => 'Side a',
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
                            'name' => 'b2',
                            'label' => 'Side b',
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
                            'name' => 'h2',
                            'label' => 'Pan height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '5', 'when' => null],
                                ['value' => '2', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area_2_c',
                            'label' => 'Pan volume',
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
                            'name' => 'area_2_r',
                            'label' => 'Pan volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratio_cc',
                            'label' => 'Pans\' volume ratio',
                            'type' => 'number',
                            'help' => 'Volume of your your pan : volume of the other pan',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratio_cr',
                            'label' => 'Pans\' volume ratio',
                            'type' => 'number',
                            'help' => 'Volume of your your pan : volume of the other pan',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratio_rc',
                            'label' => 'Pans\' volume ratio',
                            'type' => 'number',
                            'help' => 'Volume of your your pan : volume of the other pan',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratio_rr',
                            'label' => 'Pans\' volume ratio',
                            'type' => 'number',
                            'help' => 'Volume of your your pan : volume of the other pan',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'shape1 == 1 and shape2 ==  1 and ratio_cc>1', 'text' => 'You need {{ratioP_cc.value}}% of the ingredients of the original recipe.'],
                                ['when' => 'shape1 == 2 and shape2 ==  2 and ratio_rr>1', 'text' => 'You need {{ratioP_rr.value}}% of the ingredients of the original recipe.'],
                                ['when' => 'shape1 == 2 and shape2 ==  1 and ratio_rc>1', 'text' => 'You need {{ratioP_rc.value}}% of the ingredients of the original recipe.'],
                                ['when' => 'shape1 == 1 and shape2 ==  2 and ratio_cr>1', 'text' => 'You need {{ratioP_cr.value}}% of the ingredients of the original recipe.'],
                                ['when' => 'shape1 == 1 and shape2 ==  1 and ratio_cc<1', 'text' => 'That means that you need {{ratioP_cc.value}}% of the ingredients of the original recipe.'],
                                ['when' => 'shape1 == 2 and shape2 ==  2 and ratio_rr<1', 'text' => 'That means that you need {{ratioP_rr.value}}% of the ingredients of the original recipe.'],
                                ['when' => 'shape1 == 2 and shape2 ==  1 and ratio_rc<1', 'text' => 'That means that you need {{ratioP_rc.value}}% of the ingredients of the original recipe.'],
                                ['when' => 'shape1 == 1 and shape2 ==  2 and ratio_cr<1', 'text' => 'That means that you need {{ratioP_cr.value}}% of the ingredients of the original recipe.'],
                                ['when' => <<<'TXT'
                                 (shape1 == 1 and shape2 ==  1 and ratio_cc == 1) or (shape1 == 2 and shape2 ==  2 and ratio_rr==1) or (shape1 == 2 and shape2 ==  1 and ratio_rc==1) or (shape1 == 1 and shape2 ==  2 and ratio_cr==1)
                                TXT, 'text' => 'That means that you need exactly the same amount of the ingredients as in the original recipe.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratioP_cc',
                            'label' => 'Ratio p cc',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratioP_cr',
                            'label' => 'Ratio p cr',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratioP_rc',
                            'label' => 'Ratio p rc',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratioP_rr',
                            'label' => 'Ratio p rr',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'area_1_c = (pi * (d1/2)^2 * h1*shape1)',
            'results' => ['shape1' => '4*area_1_c/(PI*pow(d1, 2)*h1)', 'h1' => '4*area_1_c/(PI*pow(d1, 2)*shape1)', 'area_1_c' => '(1/4)*PI*pow(d1, 2)*h1*shape1', 'd1' => '2*sqrt(area_1_c/(h1*shape1))/sqrt(PI)'],
        ],
        [
            'title' => 'area_1_r = (a1 * b1 * h1)',
            'results' => ['a1' => 'area_1_r/(b1*h1)', 'h1' => 'area_1_r/(a1*b1)', 'area_1_r' => 'a1*b1*h1', 'b1' => 'area_1_r/(a1*h1)'],
        ],
        [
            'title' => 'area_2_c = (pi * (d2/2)^2 * h2*shape2)',
            'results' => ['d2' => '2*sqrt(area_2_c/(h2*shape2))/sqrt(PI)', 'area_2_c' => '(1/4)*PI*pow(d2, 2)*h2*shape2', 'shape2' => '4*area_2_c/(PI*pow(d2, 2)*h2)', 'h2' => '4*area_2_c/(PI*pow(d2, 2)*shape2)'],
        ],
        [
            'title' => 'area_2_r = (a2 * b2 * h2)',
            'results' => ['h2' => 'area_2_r/(a2*b2)', 'b2' => 'area_2_r/(a2*h2)', 'area_2_r' => 'a2*b2*h2', 'a2' => 'area_2_r/(b2*h2)'],
        ],
        [
            'title' => 'ratio_cc = one_way(area_2_c /area_1_c ) ',
            'results' => ['ratio_cc' => '(area_2_c/area_1_c)'],
        ],
        [
            'title' => 'ratio_rr = one_way(area_2_r /area_1_r ) ',
            'results' => ['ratio_rr' => '(area_2_r/area_1_r)'],
        ],
        [
            'title' => 'ratio_rc = one_way(area_2_c /area_1_r ) ',
            'results' => ['ratio_rc' => '(area_2_c/area_1_r)'],
        ],
        [
            'title' => 'ratio_cr = one_way(area_2_r /area_1_c ) ',
            'results' => ['ratio_cr' => '(area_2_r/area_1_c)'],
        ],
        [
            'title' => 'ratioP_cc= one_way(ratio_cc)',
            'results' => ['ratioP_cc' => '((area_2_c/area_1_c))'],
        ],
        [
            'title' => 'ratioP_rr= one_way(ratio_rr)',
            'results' => ['ratioP_rr' => '((area_2_r/area_1_r))'],
        ],
        [
            'title' => 'ratioP_rc= one_way(ratio_rc)',
            'results' => ['ratioP_rc' => '((area_2_c/area_1_r))'],
        ],
        [
            'title' => 'ratioP_cr= one_way(ratio_cr)',
            'results' => ['ratioP_cr' => '((area_2_r/area_1_c))'],
        ],
    ],
    'js' => '"use strict";omni.define("get_vol",function(shape,areaC,areaR){var area;if(shape==1){area=areaC}else{area=areaR}return area});//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Cake pan reads one of side a and side b from the other, so either can be the value you fill in. Side a comes back in centimeters unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Cake pan calculator works', 'html' => <<<'TXT'
            <p>Cake pan answers one question from 3 numbers, and the answer is Side a, Side b and Pan volume.</p><p>Written with the labels from the form, Pan volume = (1 ÷ 4) × PI × (Pan diameter)^(2) × Pan height × Shape.</p><p>The result panel carries Side a, Side b, Pan volume and Pan volume, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Shape</strong> — a plain number, no unit</li><li><strong>Pan diameter</strong> — in centimeters</li><li><strong>Pan height</strong> — in centimeters</li></ul><p>The result boxes are Side a in centimeters, Side b in centimeters, Pan volume in liters, Pan volume in liters, Shape, Pan diameter in centimeters, Side a in centimeters, Side b in centimeters, Pan height in centimeters, Pan volume in liters, Pan volume in liters, Pans&#039; volume ratio, Pans&#039; volume ratio, Pans&#039; volume ratio, Pans&#039; volume ratio, Ratio p cc in percent, Ratio p cr in percent, Ratio p rc in percent, Ratio p rr in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Shape = 1, Pan diameter = 10 cm, Side a = 100 cm, Side b = 1000 cm, Pan height = 5 cm, Pan volume = 100 liters, Shape = 1, Pan diameter = 1000 cm, Side a = 10 cm, Side b = 100 cm, Pan height = 5 cm, Pan volume = 10 liters, Pan volume = 100 liters, Pans&amp;#039; volume ratio = 1000, Pans&amp;#039; volume ratio = 10, Pans&amp;#039; volume ratio = 100, Pans&amp;#039; volume ratio = 1000, Ratio p cc = 10 perc, Ratio p cr = 100 perc, Ratio p rc = 1000 perc and Ratio p rr = 10 perc — through the same formula and the panel reports <strong>Pan volume</strong> = 393 liters.</p><ul><li><strong>Pan volume</strong> = 393 liters</li></ul><p>The line behind those figures is <strong>Pan volume</strong> = <code>(1 ÷ 4) × PI × (Pan diameter)^(2) × Pan height × Shape</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Pan volume</strong> = 393. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Side a lists 7 options and opens on centimeters. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Pan volume</strong> = <code>(1 ÷ 4) × PI × (Pan diameter)^(2) × Pan height × Shape</code></li><li><strong>Shape</strong> = <code>4 × Pan volume ÷ (PI × (Pan diameter)^(2) × Pan height)</code></li><li><strong>Pan height</strong> = <code>4 × Pan volume ÷ (PI × (Pan diameter)^(2) × Shape)</code></li><li><strong>Pan diameter</strong> = <code>2 × √(Pan volume ÷ (Pan height × Shape)) ÷ √(PI)</code></li><li><strong>Side a</strong> = <code>Pan volume ÷ (Side b × Pan height)</code></li><li><strong>Side b</strong> = <code>Pan volume ÷ (Side a × Pan height)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Pan volume</strong> = <code>(1 ÷ 4) × PI × (Pan diameter)^(2) × Pan height × Shape</code> — the form to use when Pan diameter, Pan height and Shape are the values you have.</li><li><strong>Shape</strong> = <code>4 × Pan volume ÷ (PI × (Pan diameter)^(2) × Pan height)</code> — the form to use when Pan volume, Pan diameter and Pan height are the values you have.</li><li><strong>Pan height</strong> = <code>4 × Pan volume ÷ (PI × (Pan diameter)^(2) × Shape)</code> — the form to use when Pan volume, Pan diameter and Shape are the values you have.</li><li><strong>Pan diameter</strong> = <code>2 × √(Pan volume ÷ (Pan height × Shape)) ÷ √(PI)</code> — the form to use when Pan volume, Pan height and Shape are the values you have.</li><li><strong>Pan volume</strong> = <code>Side a × Side b × Pan height</code> — the form to use when Side a, Side b and Pan height are the values you have.</li><li><strong>Side a</strong> = <code>Pan volume ÷ (Side b × Pan height)</code> — the form to use when Pan volume, Side b and Pan height are the values you have.</li><li><strong>Pan height</strong> = <code>Pan volume ÷ (Side a × Side b)</code> — the form to use when Pan volume, Side a and Side b are the values you have.</li><li><strong>Side b</strong> = <code>Pan volume ÷ (Side a × Pan height)</code> — the form to use when Pan volume, Side a and Pan height are the values you have.</li></ul><p>Any one of Pan volume, Shape and Pan height can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Shape, from 1 to 2 — and the answers go from <strong>Pan volume</strong> 393 liters to <strong>Pan volume</strong> 785 liters.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Pan diameter and Pan height carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Side a, Side b and Pan volume are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Shape left as a guess.</strong> Anything typed into Shape is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Pan diameter left as a guess.</strong> Anything typed into Pan diameter is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> If Shape is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Shape</strong> takes a plain number with no unit attached. The page reads it when it works out Pan height, Pan volume and Pan diameter. Check the field label and unit before calculating.</li><li><strong>Pan diameter</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. The page reads it when it works out Shape, Pan height and Pan volume. Check the field label and unit before calculating.</li><li><strong>Pan height</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. The page reads it when it works out Shape, Pan volume and Pan diameter. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Shape, Pan diameter and Pan height. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Shape into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Side a in cm with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Side a is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are centimeters, liters and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Shape, Pan diameter and Pan height are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Shape, Pan diameter and Pan height measured, Side a and Side b wanted.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/water-cooling">Water cooling Calculator</a>, <a href="/food/wedding-alcohol">Wedding alcohol Calculator</a> and <a href="/food/yeast-converter">Yeast converter Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Cake pan is a number to act on, so the useful question is what to do with Side a (cm), Side b (cm) and Pan volume (liters) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> Write down Shape, Pan diameter and Pan height alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cake pan calculator work out?', 'a' => <<<'TXT'
            Side a, Side b, Pan volume and Pan volume, from Pan diameter, Pan height and Shape. The relationship is Pan volume = (1 ÷ 4) × PI × (Pan diameter)^(2) × Pan height × Shape.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Shape, Pan diameter (centimeters), Pan height (centimeters). Fill shape, pan diameter and pan height and leave Side a empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Pan volume, Shape, Pan height and Pan diameter blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'Are the Cake pan results exact?', 'a' => 'It uses the values and assumptions represented in the form. Real ingredients and conditions can vary, so check units and follow the recipe, product label or safety instructions that apply.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Side a is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Shape left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Side a keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/cake-serving', 'name' => 'Cake serving'],
            ['path' => '/food/cake-pricing', 'name' => 'Cake pricing'],
            ['path' => '/food/perfect-pancake', 'name' => 'Perfect pancake']
        ],
    ],
];
