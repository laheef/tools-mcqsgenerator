<?php

/**
 * Dog age
 * /biology/dog-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog age',
    'meta' => ['title' => 'Dog age Calculator — Formula, Units & Example', 'description' => 'Give the Dog age calculator the dog age and the human age and it returns <strong>human age</strong>. The Dog age calculator takes the values in the form…', 'h1' => 'Dog age Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'breed' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'KFXfXTPpOb6U8nxxWFQYm', 'c' => null],
                ],
                'ds' => '1519',
            ],
            'dog_age_labr' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'dog_years' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'human_age_labr' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'human_years' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'size' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'brO1i4l5PDGv8gOSiCqr-', 'c' => null],
                ],
                'ds' => '182',
            ],
        ],
        'groups' => [
            [
                'uid' => 'Rou0bxIeiKV9zdIi80dio',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'breed',
                                    'vt' => 'valueSelect',
                                    'l' => 'Breed',
                                    'ds' => '1519',
                                    'opts' => [
                                        ['KFXfXTPpOb6U8nxxWFQYm', 'Labrador', '0.000000000000000'],
                                        ['G_5a9oXwdg7tMrtwd90ig', 'Other', '1.000000000000000'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'size',
                                    'vt' => 'valueSelect',
                                    'l' => 'Size',
                                    'ds' => '182',
                                    'opts' => [
                                        ['Om1v69CW4TjWZDDbyw-qH', 'Small', '0.000000000000000'],
                                        ['brO1i4l5PDGv8gOSiCqr-', 'Medium', '1.000000000000000'],
                                        ['cA4I_ciCmCzWQtdF9IltR', 'Large', '2.000000000000000'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dog_years', 'vt' => 'numerical', 'l' => 'Dog age'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'human_years',
                                    'vt' => 'numerical',
                                    'l' => 'Human age',
                                    'h' => 'How old is your dog in human years?',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dog_age_labr', 'vt' => 'numerical', 'l' => 'Dog age'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'human_age_labr',
                                    'vt' => 'numerical',
                                    'l' => 'Human age',
                                    'h' => 'How old is your labrador in human years?',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'What makes Labradors so special? Check out the section "Labrador dog research is here!" in the text to find out.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'human_years = get_human_years(dog_years, size)',
                'var' => [
                    [
                        'l' => 'human_years',
                        'f' => 'get_human_years(dog_years, size)',
                        'r' => ['dog_years', 'size'],
                    ],
                ],
            ],
            [
                'formula' => ' human_age_labr = 16 * ln(dog_age_labr) + 31',
                'var' => [
                    [
                        'l' => 'dog_age_labr',
                        'f' => 'exp((1/16)*human_age_labr - 31/16)',
                        'r' => ['human_age_labr'],
                    ],
                    [
                        'l' => 'human_age_labr',
                        'f' => '16*log(dog_age_labr) + 31',
                        'r' => ['dog_age_labr'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '182' => [
                'name' => 'size',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'Om1v69CW4TjWZDDbyw-qH', 'label' => 'Small', 'value' => '0.000000000000000'],
                    ['uid' => 'brO1i4l5PDGv8gOSiCqr-', 'label' => 'Medium', 'value' => '1.000000000000000'],
                    ['uid' => 'cA4I_ciCmCzWQtdF9IltR', 'label' => 'Large', 'value' => '2.000000000000000'],
                ],
            ],
            '1519' => [
                'name' => 'breed',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'KFXfXTPpOb6U8nxxWFQYm', 'label' => 'Labrador', 'value' => '0.000000000000000'],
                    ['uid' => 'G_5a9oXwdg7tMrtwd90ig', 'label' => 'Other', 'value' => '1.000000000000000'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("get_human_years",function(dog_years,size){var roundedHumanYears=getRoundedValue(dog_years,function(index){return data[index][size]});return roundedHumanYears});var data=[[0,0,0],[15,15,15],[24,24,24],[28,28,28],[32,32,32],[36,36,36],[40,42,45],[44,47,50],[48,51,55],[52,56,61],[56,60,66],[60,65,72],[64,69,77],[68,74,82],[72,78,88],[76,83,93],[80,87,99],[84,92,104],[88,96,109],[92,101,115]];function getRoundedValue(index,getValue){var afterDecimalPoint=index%1;if(afterDecimalPoint===0){return getValue(index)}var lowerIndex=Math.floor(index);var lowerValue=getValue(lowerIndex);var higherIndex=Math.ceil(index);var higherValue=getValue(higherIndex);var difference=higherValue-lowerValue;return lowerValue+afterDecimalPoint*difference}//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => 'Give the Dog age calculator the dog age and the human age and it returns <strong>human age</strong>.',
        'sections' => [
            ['title' => 'How does the Dog age calculator work?', 'html' => <<<'TXT'
            <p>The Dog age calculator takes the values in the form, applies the relationship described below and reports <strong>human age</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the breed and the size); then you type in the dog age and the human age (2).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as labrador and other. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as small, medium and large. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Breed</strong></td><td>One of 2 options, such as labrador and other.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Size</strong></td><td>One of 3 options, such as small, medium and large.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Dog age</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Human age</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Dog age (2)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Human age (2)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Dog age calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Human age</span><span class="formula-eq">=</span><span class="formula-rhs">(dog age, size)</span></div><div class="formula-row"><span class="formula-lhs">Dog age</span><span class="formula-eq">=</span><span class="formula-rhs">the exponential of ((1 ÷ 16) × human age − 31 ÷ 16)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Breed</strong> set to Labrador, <strong>Size</strong> set to Medium and <strong>Human age</strong> = 10. The calculator returns <strong>Dog age</strong> = 0.2691.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Dog age</strong> = 0.2691 should be roughly the size you expected from <strong>Breed</strong> set to Labrador and <strong>Size</strong> set to Medium.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dog age calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — the dog age and the human age — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Dog age calculator, these are the ones that matter:</p>
            <ul><li>The 2 drop-downs on this page offer a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dog-bmi">Dog BMI</a>, <a href="/biology/dog-calorie">Dog calorie</a> and <a href="/biology/dog-chocolate-toxicity">Dog chocolate toxicity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog age calculator work out?', 'a' => <<<'TXT'
            It returns human age, derived from the dog age and the human age. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Dog age calculator?', 'a' => <<<'TXT'
            The form asks for the dog age and the human age, which is 4 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (2 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Dog age = 0.2691. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Dog age calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/dog-bmi', 'name' => 'Dog BMI'],
            ['path' => '/biology/dog-calorie', 'name' => 'Dog calorie'],
            ['path' => '/biology/dog-chocolate-toxicity', 'name' => 'Dog chocolate toxicity'],
        ],
    ],
];
