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
    'meta' => ['title' => 'Dog age Calculator — Formula, Units & Example', 'description' => 'Human age, Dog age and Human age are results, and each can be typed into. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Dog age Calculator', 'updated' => '2026-08-10'],
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
        'intro' => 'Dog age works out Human age and Dog age from Size. There is no hidden constant here: change human age and size moves with it.',
        'sections' => [
            ['title' => 'How the Dog age calculator works', 'html' => <<<'TXT'
            <p>Dog age answers one question from 2 numbers, and the answer is Human age, Dog age and Human age.</p><p>Written with the labels from the form, Human age = get_human_years(Dog age, Size).</p><p>The result panel carries Human age, Dog age and Human age, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Size</strong> — a plain number, no unit</li><li><strong>Dog age</strong> — a plain number, no unit</li></ul><p>The answers come back as Human age, Dog age, Human age. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Human age is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Human age</strong> = <code>get_human_years(Dog age, Size)</code></li><li><strong>Dog age</strong> = <code>e^((1 ÷ 16) × Human age − 31 ÷ 16)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Human age</strong> = <code>get_human_years(Dog age, Size)</code> — the form to use when Dog age and Size are the values you have.</li><li><strong>Dog age</strong> = <code>e^((1 ÷ 16) × Human age − 31 ÷ 16)</code> — the form to use when Human age are the values you have.</li><li><strong>Human age</strong> = <code>16 × ln(Dog age) + 31</code> — the form to use when Dog age are the values you have.</li></ul><p>Any one of Human age, Dog age and Human age can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Human age, Dog age and Human age are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Size left as a guess.</strong> Anything typed into Size is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Dog age left as a guess.</strong> Anything typed into Dog age is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Size and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Size</strong> takes a plain number with no unit attached. The page reads it when it works out Human age. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Size is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dog age</strong> takes a plain number with no unit attached. The page reads it when it works out Human age. Have it to hand before you start: Dog age is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Human age</strong> is a plain number. It is worked out from Dog age and Size. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Dog age</strong> is a plain number. It is worked out from Human age. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Human age</strong> is a plain number. It is worked out from Dog age. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Size and Dog age. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Size into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Human age with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Human age is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Size and Dog age is what you already know and Human age and Dog age is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/grass-seed">Grass seed Calculator</a>, <a href="/biology/growing-degree-days">Growing Degree Days Calculator</a> and <a href="/biology/guinea-pig-pregnancy">Guinea pig pregnancy</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that Dog age leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/biology/grass-seed">Grass seed Calculator</a>, <a href="/biology/growing-degree-days">Growing Degree Days Calculator</a> and <a href="/biology/guinea-pig-pregnancy">Guinea pig pregnancy</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Dog age is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Size and Dog age beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog age calculator work out?', 'a' => 'Human age, Dog age and Human age, from Dog age and Size. The relationship is Human age = get_human_years(Dog age, Size).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Size, Dog age. Fill size and dog age and leave Human age empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Human age, Dog age and Human age blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Human age is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
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
