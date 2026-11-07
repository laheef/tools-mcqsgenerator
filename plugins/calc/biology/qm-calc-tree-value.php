<?php

/**
 * Tree value
 * /biology/tree-value
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tree value',
    'meta' => ['title' => 'Tree value Calculator — Formula, Units & Example', 'description' => 'The Tree value calculator turns the circumference and the height into the answer. The Tree value calculator takes the values in the form, applies the…', 'h1' => 'Tree value Calculator', 'updated' => '2026-09-28'],
    'raw' => [
        'vars' => [
            'circumference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'height' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'treeType' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'CsswwsY_xCcR-tUxvmpiQ', 'c' => null],
                ],
                'ds' => 'Vn2lmUiLp3koGP41Ie9fs',
            ],
            'treeValue' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'UQYmpaMzvckRAaqW7Epwm',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'treeType',
                                    'vt' => 'valueSelect',
                                    'l' => 'Tree type',
                                    'ds' => 'Vn2lmUiLp3koGP41Ie9fs',
                                    'opts' => [
                                        ['CsswwsY_xCcR-tUxvmpiQ', 'Beech', '1.06'],
                                        ['F43u0kLzNyZ_TyK-dyWoj', 'Black Cherry', '2.3'],
                                        ['UEca05piuyM6YzB_LWaNy', 'Black Ebony', '55.75'],
                                        ['53bpTcqki97S4XLSlLqst', 'Black Locust', '1.75'],
                                        ['N8wjCmEY_uXQVMxSQeJ50', 'Black Walnut', '3.85'],
                                        ['WT9DFSoUDbIH7U0YFABC3', 'Chestnut', '3.08'],
                                        ['KmXXLB_8hlUPZskZ26cRq', 'Douglas Fir', '1.05'],
                                        ['Lx-GO-LkMhP_ns1joiXsw', 'Elm', '1.35'],
                                        ['koBYML_SocgMpWcsC9ohA', 'Eucalyptus', '2.1'],
                                        ['oB3NJyRzUTYYjSvCwB0h6', 'Fruit Wood', '18.12'],
                                        ['ulZ-ezE71ajW4kOasyi4_', 'Poplar', '0.35'],
                                        ['Z-56zv44KHTCrxk0dtP32', 'Loblolly Pine', '0.55'],
                                        ['xbSZ6gRvXPXaLlZR0_BMF', 'Mahogany', '15.16'],
                                        ['YeVec-KYG9is6slW4RvIs', 'Paper Birch', '0.65'],
                                        ['zCy2rsF9YifuHKocJ-D1s', 'Paulownia', '1.85'],
                                        ['orTVBpiybtHCB4LP73aTt', 'Red Oak', '2.15'],
                                        ['MlIjv0FB0tizYQv6M7erS', 'Rosewood', '11.12'],
                                        ['WYs_X6SJyc8yiTe-uY4-M', 'Maple', '2.44'],
                                        ['O2IPf1KfP_QVpcdL1t-Ot', 'Teak', '8.88'],
                                        ['hM4PZlq2CmY7p3oiYsjgI', 'Cedar', '3.15'],
                                        ['XukhWij08JASp7cANYSHv', 'White Ash', '2.58'],
                                        ['5FqRP5kh3ieTkpmBHqPnC', 'White Oak', '3.53'],
                                        ['98DnJ2EXK7U0bas8dx7v2', 'White Pine', '1.85'],
                                        ['6IvMN18Fv8LWjoRzNQG6y', 'Yellow Birch', '3.18'],
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
                                    'n' => 'circumference',
                                    'vt' => 'numerical',
                                    'l' => 'Circumference',
                                    'us' => '4',
                                    'du' => 'cm',
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
                                    'n' => 'height',
                                    'vt' => 'numerical',
                                    'l' => 'Height',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'treeValue',
                                    'vt' => 'numerical',
                                    'l' => 'Tree value',
                                    'suf' => '$',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'treeValue = treeType * circumference * height ',
                'var' => [
                    [
                        'l' => 'treeValue',
                        'f' => 'circumference*height*treeType',
                        'r' => ['treeType', 'circumference', 'height'],
                    ],
                    [
                        'l' => 'treeType',
                        'f' => 'treeValue/(circumference*height)',
                        'r' => ['treeValue', 'circumference', 'height'],
                    ],
                    [
                        'l' => 'circumference',
                        'f' => 'treeValue/(height*treeType)',
                        'r' => ['treeValue', 'treeType', 'height'],
                    ],
                    [
                        'l' => 'height',
                        'f' => 'treeValue/(circumference*treeType)',
                        'r' => ['treeValue', 'treeType', 'circumference'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'Vn2lmUiLp3koGP41Ie9fs' => [
                'name' => 'treeTypeDS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'CsswwsY_xCcR-tUxvmpiQ', 'label' => 'Beech', 'value' => '1.06'],
                    ['uid' => 'F43u0kLzNyZ_TyK-dyWoj', 'label' => 'Black Cherry', 'value' => '2.3'],
                    ['uid' => 'UEca05piuyM6YzB_LWaNy', 'label' => 'Black Ebony', 'value' => '55.75'],
                    ['uid' => '53bpTcqki97S4XLSlLqst', 'label' => 'Black Locust', 'value' => '1.75'],
                    ['uid' => 'N8wjCmEY_uXQVMxSQeJ50', 'label' => 'Black Walnut', 'value' => '3.85'],
                    ['uid' => 'WT9DFSoUDbIH7U0YFABC3', 'label' => 'Chestnut', 'value' => '3.08'],
                    ['uid' => 'KmXXLB_8hlUPZskZ26cRq', 'label' => 'Douglas Fir', 'value' => '1.05'],
                    ['uid' => 'Lx-GO-LkMhP_ns1joiXsw', 'label' => 'Elm', 'value' => '1.35'],
                    ['uid' => 'koBYML_SocgMpWcsC9ohA', 'label' => 'Eucalyptus', 'value' => '2.1'],
                    ['uid' => 'oB3NJyRzUTYYjSvCwB0h6', 'label' => 'Fruit Wood', 'value' => '18.12'],
                    ['uid' => 'ulZ-ezE71ajW4kOasyi4_', 'label' => 'Poplar', 'value' => '0.35'],
                    ['uid' => 'Z-56zv44KHTCrxk0dtP32', 'label' => 'Loblolly Pine', 'value' => '0.55'],
                    ['uid' => 'xbSZ6gRvXPXaLlZR0_BMF', 'label' => 'Mahogany', 'value' => '15.16'],
                    ['uid' => 'YeVec-KYG9is6slW4RvIs', 'label' => 'Paper Birch', 'value' => '0.65'],
                    ['uid' => 'zCy2rsF9YifuHKocJ-D1s', 'label' => 'Paulownia', 'value' => '1.85'],
                    ['uid' => 'orTVBpiybtHCB4LP73aTt', 'label' => 'Red Oak', 'value' => '2.15'],
                    ['uid' => 'MlIjv0FB0tizYQv6M7erS', 'label' => 'Rosewood', 'value' => '11.12'],
                    ['uid' => 'WYs_X6SJyc8yiTe-uY4-M', 'label' => 'Maple', 'value' => '2.44'],
                    ['uid' => 'O2IPf1KfP_QVpcdL1t-Ot', 'label' => 'Teak', 'value' => '8.88'],
                    ['uid' => 'hM4PZlq2CmY7p3oiYsjgI', 'label' => 'Cedar', 'value' => '3.15'],
                    ['uid' => 'XukhWij08JASp7cANYSHv', 'label' => 'White Ash', 'value' => '2.58'],
                    ['uid' => '5FqRP5kh3ieTkpmBHqPnC', 'label' => 'White Oak', 'value' => '3.53'],
                    ['uid' => '98DnJ2EXK7U0bas8dx7v2', 'label' => 'White Pine', 'value' => '1.85'],
                    ['uid' => '6IvMN18Fv8LWjoRzNQG6y', 'label' => 'Yellow Birch', 'value' => '3.18'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => 'The Tree value calculator turns the circumference and the height into the answer.',
        'sections' => [
            ['title' => 'How does the Tree value calculator work?', 'html' => <<<'TXT'
            <p>The Tree value calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the tree type); then you type in the circumference and the height.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 24 options, such as beech, black Cherry and black Ebony. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Tree type</strong></td><td>One of 24 options, such as beech, black Cherry and black Ebony.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Circumference</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Height</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in meters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Tree value calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — the circumference and the height — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Tree value calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/trihybrid-cross-punnett-square">Trihybrid cross Punnett square</a>, <a href="/biology/turtle-tank">Turtle tank</a> and <a href="/biology/vapor-pressure-deficit">Vapor pressure deficit</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Tree value calculator?', 'a' => <<<'TXT'
            The form asks for the circumference and the height, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter circumference in a different unit?', 'a' => <<<'TXT'
            Yes. Circumference opens in centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Tree value calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/trihybrid-cross-punnett-square', 'name' => 'Trihybrid cross Punnett square'],
            ['path' => '/biology/turtle-tank', 'name' => 'Turtle tank'],
            ['path' => '/biology/vapor-pressure-deficit', 'name' => 'Vapor pressure deficit'],
        ],
    ],
];
