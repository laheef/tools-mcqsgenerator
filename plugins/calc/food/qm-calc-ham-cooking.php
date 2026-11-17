<?php

/**
 * Ham cooking time
 * /food/ham-cooking
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Ham cooking time',
    'meta' => ['title' => 'Ham cooking time — Formula, Steps & Examples', 'description' => 'Estimate ham cooking time from its cut, weight and preparation method. Follow safe-handling directions and verify doneness with a thermometer.', 'h1' => 'Ham cooking time Calculator', 'updated' => '2026-08-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ham_type',
                            'label' => 'Ham type ',
                            'type' => 'select',
                            'options' => ['Smoked, cook-before-eating' => '1', 'Smoked, cooked' => '2', 'Fresh, uncooked' => '3', 'Country ham' => '4'],
                            'dataset' => 'ham_type',
                            'help' => 'What kind of ham are you cooking?',
                            'default' => 'Smoked, cook-before-eating',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'smoked_cut_1',
                            'label' => 'Cut ',
                            'type' => 'select',
                            'options' => [
                                'Whole leg, bone in' => '19',
                                'Half leg, bone in' => '23.5',
                                'Shank or butt, bone in' => '37.5',
                                'Arm picnic shoulder, boneless' => '32.5',
                                'Shoulder roll, boneless' => '37.501',
                            ],
                            'dataset' => 'smoked_cut_1',
                            'help' => 'What cut of the pig are you cooking?',
                            'default' => 'Whole leg, bone in',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'smoked_cut_2',
                            'label' => 'Cut ',
                            'type' => 'select',
                            'options' => [
                                'Whole leg, bone in' => '16.5',
                                'Half leg, bone in' => '21',
                                'Arm picnic shoulder, boneless' => '27.5',
                                'Canned, boneless' => '17.5',
                                'Vacuum packed, boneless' => '12.5',
                                'Spiral cut, whole or half' => '14',
                            ],
                            'dataset' => 'smoked_cut_2',
                            'control' => 'DROPDOWN',
                            'help' => 'What cut of the pig are you cooking?',
                            'default' => 'Whole leg, bone in',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fresh_cut',
                            'label' => 'Cut ',
                            'type' => 'select',
                            'options' => ['Whole leg, bone in' => '24', 'Whole leg, boneless' => '26', 'Half leg, bone in' => '37.5'],
                            'dataset' => 'fresh_cut',
                            'help' => 'What cut of the pig are you cooking?',
                            'default' => 'Whole leg, bone in',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'country_cut',
                            'label' => 'Country',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '22.5', 'when' => null],
                                ['value' => '22.5', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'No matter the weight, soak for 4 to 12 hours in the refrigerator prior to cooking. This applies to both whole and half-cut.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Weight ',
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
                            'name' => 'smoked_cut_time_1',
                            'label' => 'Recommended cooking time ⏲',
                            'type' => 'number',
                            'help' => 'Small deviations may occur. Refer to the article to see the full ranges of time your ham might need.',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'smoked_cut_time_2',
                            'label' => 'Recommended cooking time ⏲',
                            'type' => 'number',
                            'help' => 'Small deviations may occur. Refer to the article to see the full ranges of time your ham might need.',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fresh_cut_time',
                            'label' => 'Recommended cooking time ⏲',
                            'type' => 'number',
                            'help' => 'Small deviations may occur. Refer to the article to see the full ranges of time your ham might need.',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'country_cut_time',
                            'label' => 'Recommended cooking time ⏲',
                            'type' => 'number',
                            'help' => 'Small deviations may occur. Refer to the article to see the full ranges of time your ham might need.',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => ' Oven temperature: 325 °F / 160 °C  Minimal internal temperature of the meat: 145 °F / 63 °C'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'smoked_cut_time_1 = weight * smoked_cut_1',
            'results' => ['smoked_cut_time_1' => 'smoked_cut_1*weight', 'weight' => 'smoked_cut_time_1/smoked_cut_1', 'smoked_cut_1' => 'smoked_cut_time_1/weight'],
        ],
        [
            'title' => 'smoked_cut_time_2 = weight * smoked_cut_2',
            'results' => ['weight' => 'smoked_cut_time_2/smoked_cut_2', 'smoked_cut_time_2' => 'smoked_cut_2*weight', 'smoked_cut_2' => 'smoked_cut_time_2/weight'],
        ],
        [
            'title' => 'fresh_cut_time = weight * fresh_cut',
            'results' => ['fresh_cut_time' => 'fresh_cut*weight', 'fresh_cut' => 'fresh_cut_time/weight', 'weight' => 'fresh_cut_time/fresh_cut'],
        ],
        [
            'title' => 'country_cut_time = weight * country_cut',
            'results' => ['country_cut' => 'country_cut_time/weight', 'country_cut_time' => 'country_cut*weight', 'weight' => 'country_cut_time/country_cut'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Ham cooking time takes Weight and returns Cut and Cut. Nothing is looked up on this page: cut is computed from weight and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Ham cooking time calculator works', 'html' => <<<'TXT'
            <p>The Ham cooking time calculator applies one relationship to 2 numbers and reports Cut, Cut and Country.</p><p>The relationship it solves reads Recommended cooking time ⏲ = Cut × Weight.</p><p>What comes back is Cut, Cut, Country and Recommended cooking time ⏲ — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Cut</strong> — a plain number, no unit. What cut of the pig are you cooking?</li><li><strong>Weight</strong> — in kilograms</li></ul><p>The result boxes are Cut, Cut, Country, Recommended cooking time ⏲ in minutes, Recommended cooking time ⏲ in minutes, Recommended cooking time ⏲ in minutes, Recommended cooking time ⏲ in minutes; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Ham type = 1; the answers are <strong>Cut</strong> = 19, <strong>Cut</strong> = 16.5 and <strong>Cut</strong> = 24.</p><ul><li><strong>Cut</strong> = 19</li><li><strong>Cut</strong> = 16.5</li><li><strong>Cut</strong> = 24</li></ul><p>That is <strong>Recommended cooking time ⏲</strong> = <code>Cut × Weight</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Cut</strong> = 19, <strong>Cut</strong> = 16.5 and <strong>Cut</strong> = 24 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Recommended cooking time ⏲ offers 5 units and opens on minutes, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Recommended cooking time ⏲</strong> = <code>Cut × Weight</code></li><li><strong>Weight</strong> = <code>Recommended cooking time ⏲ ÷ Cut</code></li><li><strong>Cut</strong> = <code>Recommended cooking time ⏲ ÷ Weight</code></li><li><strong>Country</strong> = <code>Recommended cooking time ⏲ ÷ Weight</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Recommended cooking time ⏲</strong> = <code>Cut × Weight</code> — the form to use when Cut and Weight are the values you have.</li><li><strong>Weight</strong> = <code>Recommended cooking time ⏲ ÷ Cut</code> — the form to use when Recommended cooking time ⏲ and Cut are the values you have.</li><li><strong>Cut</strong> = <code>Recommended cooking time ⏲ ÷ Weight</code> — the form to use when Recommended cooking time ⏲ and Weight are the values you have.</li><li><strong>Recommended cooking time ⏲</strong> = <code>Cut × Weight</code> — the form to use when Cut and Weight are the values you have.</li><li><strong>Weight</strong> = <code>Recommended cooking time ⏲ ÷ Cut</code> — the form to use when Recommended cooking time ⏲ and Cut are the values you have.</li><li><strong>Cut</strong> = <code>Recommended cooking time ⏲ ÷ Weight</code> — the form to use when Recommended cooking time ⏲ and Weight are the values you have.</li><li><strong>Recommended cooking time ⏲</strong> = <code>Cut × Weight</code> — the form to use when Cut and Weight are the values you have.</li><li><strong>Cut</strong> = <code>Recommended cooking time ⏲ ÷ Weight</code> — the form to use when Recommended cooking time ⏲ and Weight are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Recommended cooking time ⏲, Weight and Cut can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Ham type, from 1 to 2 — and the answers go from <strong>Cut</strong> 19, <strong>Cut</strong> 16.5 and <strong>Cut</strong> 24 to <strong>Cut</strong> 19, <strong>Cut</strong> 16.5 and <strong>Cut</strong> 24.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Weight is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cut, Cut and Country are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cut left as a guess.</strong> If Cut is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Weight left as a guess.</strong> If Weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Cut and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Cut</strong> takes a plain number with no unit attached. What cut of the pig are you cooking?. Change it and Recommended cooking time ⏲ and Weight changes with it. Check the field label and unit before calculating.</li><li><strong>Weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. Change it and Recommended cooking time ⏲, Cut and Recommended cooking time ⏲ changes with it. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Cut</strong> is a plain number and the page's own defaults put it at 16.5. It is computed from Recommended cooking time ⏲ and Weight, so it changes the moment any of them does. </li><li><strong>Cut</strong> is a plain number and the page's own defaults put it at 24. It is computed from Recommended cooking time ⏲ and Weight, so it changes the moment any of them does. </li><li><strong>Country</strong> is a plain number. It is computed from Recommended cooking time ⏲ and Weight, so it changes the moment any of them does. </li><li><strong>Recommended cooking time ⏲</strong> is a minutes figure. It is computed from Cut and Weight, so it changes the moment any of them does. </li><li><strong>Recommended cooking time ⏲</strong> is a minutes figure. It is computed from Cut and Weight, so it changes the moment any of them does. </li><li><strong>Recommended cooking time ⏲</strong> is a minutes figure. It is computed from Cut and Weight, so it changes the moment any of them does. </li><li><strong>Recommended cooking time ⏲</strong> is a minutes figure. It is computed from Country and Weight, so it changes the moment any of them does. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cut</th><th>Cut</th><th>Cut</th></tr></thead><tbody><tr><td><strong>Ham type</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Ham type sits at the top — a ten per cent error in that box shows up as roughly 0 per cent in the answer. By contrast, Ham type barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Ham type = 0.5, the answer is <strong>Cut</strong> = 19, <strong>Cut</strong> = 16.5 and <strong>Cut</strong> = 24.</li><li>With Ham type = 3, the answer is <strong>Cut</strong> = 19, <strong>Cut</strong> = 16.5 and <strong>Cut</strong> = 24.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>minutes</strong> — opens in <em>min</em>, and the chip also carries min, hrs, days and µs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cut follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are minutes and kilograms and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Cut and Weight are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cut and Weight and the number you are missing is Cut and Cut.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/popcorn">Popcorn Calculator</a>, <a href="/food/pounds-to-cups">Pounds to cups Calculator</a> and <a href="/food/priming-sugar">Priming sugar Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Ham cooking time calculator work out?', 'a' => 'Cut, Cut, Country and Recommended cooking time ⏲, from Cut and Weight. The relationship is Recommended cooking time ⏲ = Cut × Weight.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Cut, Weight (kilograms). With cut and weight in place, Cut can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Recommended cooking time ⏲, Weight, Cut and Recommended cooking time ⏲ can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'Are the Ham cooking time results exact?', 'a' => 'No. The time is an estimate from the listed inputs and cannot account for every appliance, starting temperature or portion. Follow product directions and verify safe doneness with a thermometer where relevant.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Cut is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Cut left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Cut at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/food/how-much-ham-per-person', 'name' => 'How much ham per person'],
            ['path' => '/food/turkey-cooking-time', 'name' => 'Turkey cooking time'],
            ['path' => '/food/steak-cook-time', 'name' => 'Steak cook time']
        ],
    ],
];
