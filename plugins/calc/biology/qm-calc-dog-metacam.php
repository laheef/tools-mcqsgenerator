<?php

/**
 * Dog Metacam dosage
 * /biology/dog-metacam
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog Metacam dosage',
    'meta' => ['title' => 'Dog Metacam dosage — Free Online Calculator', 'description' => 'The Dog Metacam dosage calculator takes the numbers you enter and reports the result immediately. The Dog Metacam dosage calculator takes the values in the…', 'h1' => 'Dog Metacam dosage Calculator', 'updated' => '2026-08-19'],
    'raw' => [
        'vars' => [
            'firstAmount' => [
                'type' => 'presentation',
                'rnd' => ['standard', '2'],
            ],
            'firstDay' => [
                'type' => 'presentation',
                'rnd' => ['standard', '2'],
            ],
            'firstDay1' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'firstDay25' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'form' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '7VGWgiiuqgQ9oauf9Y-FX', 'c' => null],
                ],
                'ds' => 'TRR5AsgdrtJ17KJeQBZ3f',
            ],
            'otherAmount' => [
                'type' => 'presentation',
                'rnd' => ['standard', '2'],
            ],
            'otherDoses' => [
                'type' => 'presentation',
                'rnd' => ['standard', '2'],
            ],
            'strength' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'DEJeWo4vYzTQZEAzJycqy', 'c' => null],
                ],
                'ds' => 'tnJx2UvaK7hQR0FxEcECK',
            ],
            'tabletsMaintain1' => [
                'type' => 'dependent',
                'rnd' => ['standard', '4'],
            ],
            'tabletsMaintain25' => [
                'type' => 'dependent',
                'rnd' => ['standard', '4'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'QF2XHGxne2uhU569dzfgD',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Did you know that you can create your own tailored calculator using our AI Editor? Try it now ➔'],
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
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Dog\'s weight',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'form',
                                    'vt' => 'valueSelect',
                                    'l' => 'Metacam form',
                                    'ds' => 'TRR5AsgdrtJ17KJeQBZ3f',
                                    'opts' => [
                                        ['7VGWgiiuqgQ9oauf9Y-FX', 'Solution', '1'],
                                        ['7Q_N5DWXImC3WsRqelNZD', 'Tablets', '0'],
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
                                    'n' => 'strength',
                                    'vt' => 'valueSelect',
                                    'l' => 'Solution\'s strength',
                                    'ds' => 'tnJx2UvaK7hQR0FxEcECK',
                                    'opts' => [
                                        ['DEJeWo4vYzTQZEAzJycqy', '0.5 mg/mL', '0.5'],
                                        ['rStrmtF9SxWuO_2VmDhlj', '1.5 mg/mL', '1.5'],
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
                                    't' => 'x',
                                    'c' => [
                                        ['not(hasValue(weight))', 'Input your dog\'s weight to get the results...&nbsp;'],
                                        ['form==1 and weight>0', <<<'TXT'
                                        1️⃣ On the first day of therapy, your dog should receive {{firstDay.value}}&nbsp;mg of Metacam, which translates to {{firstAmount.value}} ml of the solution. ➡️ For the treatments after day 1, your dog should receive {{otherDoses.value}}&nbsp;mg of Metacam daily, which is {{otherAmount.value}}&nbsp;ml of the solution.
                                        TXT],
                                        ['form==0 and weight<=20', <<<'TXT'
                                        1️⃣ On the first day of therapy, your dog should receive {{firstDay1.value}} tablet(s) of Metacam 1&nbsp;mg. ➡️ For the treatments after day 1, your dog should receive about {{tabletsMaintain1.value}}&nbsp;tablet(s) of Metacam 1&nbsp;mg.&nbsp;
                                        TXT],
                                        ['form==0 and weight>20', <<<'TXT'
                                        1️⃣ On the first day of therapy, your dog should receive {{firstDay25.value}} tablet(s) of Metacam 2.5 mg. ➡️ For the treatments after day 1, your dog should receive {{tabletsMaintain25.value}} tablet(s) of Metacam 2.5 mg.
                                        TXT],
                                        ['form==0 and weight<4', 'For smaller dogs, Metacam solution would be a better choice.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'sBSHW3h1ZlN_39P6Nkb1z',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'firstDay', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'otherDoses', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'firstAmount', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'otherAmount', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'tabletsMaintain1', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'tabletsMaintain25', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'firstDay1', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'firstDay25', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'supp-results',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'tabletsMaintain1', 'vt' => 'dependent', 'l' => 'Tablets Maintain1'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'tabletsMaintain25', 'vt' => 'dependent', 'l' => 'Tablets Maintain25'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'tabletsMaintain1 = get_tablets_1(weight)',
                'var' => [
                    [
                        'l' => 'tabletsMaintain1',
                        'f' => 'get_tablets_1(weight)',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'tabletsMaintain25 = get_tablets_25(weight)',
                'var' => [
                    [
                        'l' => 'tabletsMaintain25',
                        'f' => 'get_tablets_25(weight)',
                        'r' => ['weight'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'TRR5AsgdrtJ17KJeQBZ3f' => [
                'name' => 'form',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '7VGWgiiuqgQ9oauf9Y-FX', 'label' => 'Solution', 'value' => '1'],
                    ['uid' => '7Q_N5DWXImC3WsRqelNZD', 'label' => 'Tablets', 'value' => '0'],
                ],
            ],
            'tnJx2UvaK7hQR0FxEcECK' => [
                'name' => 'tablets_strength',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'DEJeWo4vYzTQZEAzJycqy', 'label' => '0.5 mg/mL', 'value' => '0.5'],
                    ['uid' => 'rStrmtF9SxWuO_2VmDhlj', 'label' => '1.5 mg/mL', 'value' => '1.5'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("get_tablets_1",function(weight){if(weight>=4&&weight<=7){return 0.5}else if(weight<=10){return 1}else if(weight<=15){return 1.5}else if(weight<=20){return 2}else{return 1}});omni.define("get_tablets_25",function(weight){if(weight>20&&weight<=25){return 1}else if(weight<=35){return 1.5}else if(weight<=50){return 2}else{return 1}});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => 'The Dog Metacam dosage calculator takes the numbers you enter and reports the result immediately.',
        'sections' => [
            ['title' => 'How does the Dog Metacam dosage calculator work?', 'html' => <<<'TXT'
            <p>The Dog Metacam dosage calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the metacam form and the solution's strength); then you type in the dog's weight.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as solution and tablets. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 2 options, such as 0.5 mg/mL and 1.5 mg/mL. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Dog's weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Metacam form</strong></td><td>One of 2 options, such as solution and tablets.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Solution's strength</strong></td><td>One of 2 options, such as 0.5 mg/mL and 1.5 mg/mL.</td><td>choice</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Dog Metacam dosage calculator', 'html' => <<<'TXT'
            <p>This one is not a single closed-form equation. It is driven by a page script that applies a set of rules — lookups, cut-offs and conditional branches — and the numbers you see are the script's output rather than the rearrangement of one line of algebra. The rules are what make the tool useful: a plain formula cannot express a table of thresholds or a choice between cases.</p>
            <p>Practically, that means you can trust the result but cannot reproduce it with a pocket calculator. If you need to show your working, quote the inputs and the output rather than an equation.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dog Metacam dosage calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 1 figures keep coming back — the dog's weight — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Keep the units you enter consistent. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Dog Metacam dosage calculator, these are the ones that matter:</p>
            <ul><li>The 2 drop-downs on this page offer a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li><li>There is nothing to invert here: the result is produced in one direction only, from the values you supply.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — dog's weight for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dog-onion-toxicity">Dog onion toxicity</a>, <a href="/biology/dog-pregnancy">Dog pregnancy</a> and <a href="/biology/dog-quality-of-life">Dog quality of life</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Dog Metacam dosage calculator?', 'a' => <<<'TXT'
            The form asks for the dog's weight, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter dog\'s weight in a different unit?', 'a' => <<<'TXT'
            Yes. Dog's weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (2 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Dog Metacam dosage calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. The calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/dog-onion-toxicity', 'name' => 'Dog onion toxicity'],
            ['path' => '/biology/dog-pregnancy', 'name' => 'Dog pregnancy'],
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
        ],
    ],
];
