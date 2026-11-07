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
    'meta' => ['title' => 'Dog age Calculator — Formula, Units & Example', 'description' => 'Dog age works out Human age and Dog age from Size and Dog age. There is no hidden constant here: change Human age and Size moves with it.', 'h1' => 'Dog age Calculator', 'updated' => '2026-08-10'],
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
        'intro' => 'Dog age works out Human age and Dog age from Size and Dog age. There is no hidden constant here: change Human age and Size moves with it.',
        'sections' => [
            ['title' => 'How the Dog age calculator works', 'html' => <<<'TXT'
            <p>Dog age answers one question from 2 numbers, and the answer is Human age, Dog age and Human age.</p><p>Written with the labels from the form, Human age = get_human_years(Dog age, Size).</p><p>The result panel carries Human age, Dog age and Human age, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Size</strong> — a plain number, no unit</li><li><strong>Dog age</strong> — a plain number, no unit</li></ul><p>The answers come back as Human age, Dog age, Human age. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Human age is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Human age</strong> = <code>get_human_years(Dog age, Size)</code></li><li><strong>Dog age</strong> = <code>e^((1 ÷ 16) × Human age − 31 ÷ 16)</code></li></ul><p>Any one of Human age, Dog age and Human age can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Human age, Dog age and Human age are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Size and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Size and Dog age is what you already know and Human age and Dog age is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/grass-seed">Grass seed Calculator</a>, <a href="/biology/growing-degree-days">Growing Degree Days Calculator</a> and <a href="/biology/guinea-pig-pregnancy">Guinea pig pregnancy</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog age calculator work out?', 'a' => 'Human age, Dog age and Human age, from Dog age and Size. The relationship is Human age = get_human_years(Dog age, Size).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Size, Dog age. Fill size and dog_years and leave Human age empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Human age, Dog age and Human age blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Human age is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Size left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Human age keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/grass-seed', 'name' => 'Grass seed Calculator'],
            ['path' => '/biology/growing-degree-days', 'name' => 'Growing Degree Days Calculator'],
            ['path' => '/biology/guinea-pig-pregnancy', 'name' => 'Guinea pig pregnancy'],
        ],
        'authors' => [],
    ],
];
