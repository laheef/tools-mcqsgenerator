<?php

/**
 * Dog quality of life
 * /biology/dog-quality-of-life
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog quality of life',
    'meta' => ['title' => 'Dog quality of life — Free Online Calculator', 'description' => <<<'TXT'
    The Dog quality of life calculator returns your result from the 6 fields on the form. The Dog quality of life calculator takes the values in the form, applies…
    TXT, 'h1' => 'Dog quality of life Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'item1' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => '8sGHxdXKoGDpxOFbptD01'],
            'item2' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'bzbDGvhVn5TYWpBWwrTF6'],
            'item3' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'tzm4ypFs70eS7p5T6HqVQ'],
            'item4' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'XcazeDkn-_kri5kYngEIN'],
            'item5' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => '3AKr1ovOIG40EiqDKHWlY'],
            'item6' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'VZo0_JsO_6YCinkqc2omQ'],
            'results' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'RF19CQlhbVQGtIpWVUEDV',
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
                                        [null, 'Below are key factors that contribute to your dog\'s quality of life. Use your honest judgment and select which options apply to your dog most accurately.'],
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
                                    'n' => 'item1',
                                    'vt' => 'valueSelect',
                                    'l' => 'Mobility',
                                    'h' => 'Your dog\'s ability to move and get from one place to another. &nbsp;',
                                    'ds' => '8sGHxdXKoGDpxOFbptD01',
                                    'opts' => [
                                        ['sap_OqDDR_lD-SmvJBHLi', 'Bare minimum', '0'],
                                        ['ZlpHQ6FV7G9xpXrRTivoF', 'Poor', '1'],
                                        ['qIVjB5jhoToIW9eYtS9xE', 'Good', '2'],
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
                                    'n' => 'item2',
                                    'vt' => 'valueSelect',
                                    'l' => 'Nutrition (food intake)',
                                    'ds' => 'bzbDGvhVn5TYWpBWwrTF6',
                                    'opts' => [
                                        ['d50lV-rVKZJ9Eoen6AIyu', 'None', '0'],
                                        ['K4IYjOTCnrsoPuCiQvy2a', 'Poor or requires hand feeding', '1'],
                                        ['YqVdZdclSsqT-25EOXh3D', 'Good', '2'],
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
                                    'n' => 'item3',
                                    'vt' => 'valueSelect',
                                    'l' => 'Hydration (water intake)',
                                    'ds' => 'tzm4ypFs70eS7p5T6HqVQ',
                                    'opts' => [
                                        ['9yQwTuF63xyIwaQCCYoeE', ' No intake (not drinking)', '0'],
                                        ['YyuJEpevd_Zlhz9YVMEwE', 'Poor or increased intake', '1'],
                                        ['xe4c0uRQTC_UCbDgVjjhw', ' Adequate intake', '2'],
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
                                    'n' => 'item6',
                                    'vt' => 'valueSelect',
                                    'l' => 'Urination and defecation.',
                                    'ds' => 'VZo0_JsO_6YCinkqc2omQ',
                                    'opts' => [
                                        ['5TgC2ZLkQUP-NshTQ_TUU', 'None', '0'],
                                        ['qlx4yBweHVxmu_GWWmh1e', 'Reduced or irregular ', '1'],
                                        ['c4djlDL0McdcxrpIZ52-w', 'Normal ', '2'],
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
                                    'n' => 'item4',
                                    'vt' => 'valueSelect',
                                    'l' => 'Interaction and attitude',
                                    'ds' => 'XcazeDkn-_kri5kYngEIN',
                                    'opts' => [
                                        ['e7atfEuSQIE57MDb42z3n', 'Hides in the closet or under the bed', '0'],
                                        ['4O7nf2YN4MEY9oN30LdGp', 'Some Interaction', '1'],
                                        ['fi_bxctRZAmmija8DEvLb', 'Interacts normally ', '2'],
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
                                    'n' => 'item5',
                                    'vt' => 'valueSelect',
                                    'l' => 'Favorite things',
                                    'ds' => '3AKr1ovOIG40EiqDKHWlY',
                                    'opts' => [
                                        ['LDgNQXf_OG5TxsqJAw3ka', 'No interest in their favorite toys and activities', '0'],
                                        ['6Y1rTYKGYX_3iecJCr_F6', 'Decrease of interest in their favorite toys and activities', '1'],
                                        ['0q50aFAlJXN4y5nf0s1P-', ' Normal enthusiasm for favorite toys and activities', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'results', 'vt' => 'numerical', 'l' => ''],
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
                                        ['results <= 5', 'Unfortunately, this result is low and it may be a reason to consider that your pet is suffering.&nbsp;'],
                                        ['results >= 6 and results<=8', <<<'TXT'
                                        According to this results, your dog's quality of life may require intervention. Consider making an appointment with your local veterinarian to address the necessary behavioral and health changes of your four-legged best friend's lifestyle
                                        TXT],
                                        ['results>=9 and  results<=12', '🎉 Congratulations, this result means that everything is okay, and your dog has a good quality of life.'],
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
                'formula' => 'results =  one_way(item1 + item2 + item3 + item4 + item5 + item6)',
                'var' => [
                    [
                        'l' => 'results',
                        'f' => '(item1 + item2 + item3 + item4 + item5 + item6)',
                        'r' => [
                            'item1',
                            'item2',
                            'item3',
                            'item4',
                            'item5',
                            'item6',
                        ],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '8sGHxdXKoGDpxOFbptD01' => [
                'name' => 'Mobility',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'sap_OqDDR_lD-SmvJBHLi', 'label' => 'Bare minimum', 'value' => '0'],
                    ['uid' => 'ZlpHQ6FV7G9xpXrRTivoF', 'label' => 'Poor', 'value' => '1'],
                    ['uid' => 'qIVjB5jhoToIW9eYtS9xE', 'label' => 'Good', 'value' => '2'],
                ],
            ],
            'bzbDGvhVn5TYWpBWwrTF6' => [
                'name' => 'Appetite',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'd50lV-rVKZJ9Eoen6AIyu', 'label' => 'None', 'value' => '0'],
                    ['uid' => 'K4IYjOTCnrsoPuCiQvy2a', 'label' => 'Poor or requires hand feeding', 'value' => '1'],
                    ['uid' => 'YqVdZdclSsqT-25EOXh3D', 'label' => 'Good', 'value' => '2'],
                ],
            ],
            'tzm4ypFs70eS7p5T6HqVQ' => [
                'name' => 'Hydration',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '9yQwTuF63xyIwaQCCYoeE', 'label' => ' No intake (not drinking)', 'value' => '0'],
                    ['uid' => 'YyuJEpevd_Zlhz9YVMEwE', 'label' => 'Poor or increased intake', 'value' => '1'],
                    ['uid' => 'xe4c0uRQTC_UCbDgVjjhw', 'label' => ' Adequate intake', 'value' => '2'],
                ],
            ],
            'XcazeDkn-_kri5kYngEIN' => [
                'name' => 'INTERACTION',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'e7atfEuSQIE57MDb42z3n', 'label' => 'Hides in the closet or under the bed', 'value' => '0'],
                    ['uid' => '4O7nf2YN4MEY9oN30LdGp', 'label' => 'Some Interaction', 'value' => '1'],
                    ['uid' => 'fi_bxctRZAmmija8DEvLb', 'label' => 'Interacts normally ', 'value' => '2'],
                ],
            ],
            'VZo0_JsO_6YCinkqc2omQ' => [
                'name' => 'elimination (urination and/or defecation)',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '5TgC2ZLkQUP-NshTQ_TUU', 'label' => 'None', 'value' => '0'],
                    ['uid' => 'qlx4yBweHVxmu_GWWmh1e', 'label' => 'Reduced or irregular ', 'value' => '1'],
                    ['uid' => 'c4djlDL0McdcxrpIZ52-w', 'label' => 'Normal ', 'value' => '2'],
                ],
            ],
            '3AKr1ovOIG40EiqDKHWlY' => [
                'name' => 'FAVORITE THINGS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'LDgNQXf_OG5TxsqJAw3ka', 'label' => 'No interest in their favorite toys and activities', 'value' => '0'],
                    ['uid' => '6Y1rTYKGYX_3iecJCr_F6', 'label' => 'Decrease of interest in their favorite toys and activities', 'value' => '1'],
                    ['uid' => '0q50aFAlJXN4y5nf0s1P-', 'label' => ' Normal enthusiasm for favorite toys and activities', 'value' => '2'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => 'The Dog quality of life calculator returns your result from the 6 fields on the form.',
        'sections' => [
            ['title' => 'How does the Dog quality of life calculator work?', 'html' => <<<'TXT'
            <p>The Dog quality of life calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the mobility, the nutrition (food intake) and the hydration (water intake)).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 3 options, such as bare minimum, poor and good. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as none, poor or requires hand feeding and good. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as no intake (not drinking), poor or increased intake and adequate intake. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as none, reduced or irregular and normal. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as hides in the closet or under the bed, some Interaction and interacts normally. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as no interest in their favorite toys and activities, decrease of interest in their favorite toys and activities and normal enthusiasm for favorite toys and activities. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li></ul><p>6 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Mobility</strong></td><td>One of 3 options, such as bare minimum, poor and good.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Nutrition (food intake)</strong></td><td>One of 3 options, such as none, poor or requires hand feeding and good.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Hydration (water intake)</strong></td><td>One of 3 options, such as no intake (not drinking), poor or increased intake and adequate intake.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Urination and defecation.</strong></td><td>One of 3 options, such as none, reduced or irregular and normal.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Interaction and attitude</strong></td><td>One of 3 options, such as hides in the closet or under the bed, some Interaction and interacts normally.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Favorite things</strong></td><td>One of 3 options, such as no interest in their favorite toys and activities, decrease of interest in their favorite toys and activities and normal enthusiasm for favorite toys and activities.</td><td>choice</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Dog quality of life calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Results</span><span class="formula-eq">=</span><span class="formula-rhs">(mobility + nutrition (food intake) + hydration (water intake) + interaction and attitude + favorite things + urination and defecation.)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dog quality of life calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Round only at the end. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Keep the units you enter consistent. </li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity</a>, <a href="/biology/dog-size">Dog size</a> and <a href="/biology/dog-water-intake">Dog water intake</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Dog quality of life calculator?', 'a' => <<<'TXT'
            The form asks for a few values, which is 6 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (6 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Dog quality of life calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. The calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size'],
            ['path' => '/biology/dog-water-intake', 'name' => 'Dog water intake'],
        ],
    ],
];
