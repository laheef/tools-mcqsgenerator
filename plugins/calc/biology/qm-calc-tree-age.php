<?php

/**
 * Tree age
 * /biology/tree-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tree age',
    'meta' => ['title' => 'Tree age Calculator: Formula, Steps & Examples', 'description' => <<<'TXT'
    Give the Tree age calculator the growth factor and the age and it returns <strong>diameter at breast height</strong>. The Tree age calculator takes the values…
    TXT, 'h1' => 'Tree age Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'age' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'circumferenceAtBreastHeight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'custom_variable' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'diameterAtBreastHeight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'treeSpecies' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'PVQdS--FPRXFdBgiaUgCL', 'c' => null],
                ],
                'ds' => 'yq2HmsdM8paF4SWgInGpQ',
            ],
        ],
        'groups' => [
            [
                'uid' => 'Hy6ptAVURGiLywajTuQMD',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'treeSpecies',
                                    'vt' => 'valueSelect',
                                    'l' => 'Tree species',
                                    'ds' => 'yq2HmsdM8paF4SWgInGpQ',
                                    'opts' => [
                                        ['1o-rBU3ADQjnXgQQug1JL', 'American beech', '6'],
                                        ['PVQdS--FPRXFdBgiaUgCL', 'American elm', '4'],
                                        ['NfC90Wh3MnVshShZQw4It', 'American sycamore', '4.000001'],
                                        ['JNJ4fj9bDGGY6n6hdKKVJ', 'Austrian pine', '4.5'],
                                        ['3UUo2gcYcJN8_kVVjNON4', 'Basswood', '3.000010'],
                                        ['tip6_ioiOiYZVw_Rd33CA', 'Black cherry', '5'],
                                        ['-lbXkF_5osQSvZRXsI9wm', 'Black maple', '5.000001'],
                                        ['dXoCKol2oAHcWvkXcadBw', 'Black walnut', '4.5000001'],
                                        ['1lx2PKu29IZ430gEKPdxH', 'Black willow', '2'],
                                        ['lvlnLsuewyZ6vAMDx3gcs', 'Box elder', '3.000011'],
                                        ['I3fmSIEPLSPgI7Mwgu2r9', 'Bradford pear', '3'],
                                        ['i9HD5HZB7fj0E-sRrnbk5', 'Common horse chestnut', '8'],
                                        ['2-eI0GfA9e_LWeScWsWef', 'Colorado blue spruce', '4.5000002'],
                                        ['27ITiRjtOvtmgXyRhz4qs', 'Cottonwood', '2.000001'],
                                        ['Yq69VW2cZWJJxk_i7IzDf', 'Dogwood', '7.000010'],
                                        ['zuD3bkcDWIGV4gDwcrn7u', 'Douglas fir', '5.000002'],
                                        ['PIdJTKDnsh2SAsWpnF2EO', 'European beech', '4.000002'],
                                        ['TwL-VMiflqFU2qis0Ak85', 'European white birch', '5.000003'],
                                        ['EZUtUXn7OOkGLimA1rRl8', 'Green ash', '4.000003'],
                                        ['Gwphu1CAsDJuQSCJ_gsSH', 'Honey locust', '3.000012'],
                                        ['a0FW3saTbHl4yna_gbNCt', 'Ironwood', '7'],
                                        ['HwCyEDzrhgnf49r3DkIKU', 'Kentucky coffee tree', '3.000001'],
                                        ['6ihG2VoqFJdIzysVmhRnq', 'Littleleaf linden', '3.000002'],
                                        ['i_ibRgLomL8eMDbt4hQz1', 'Northern red oak', '4.000004'],
                                        ['mh0-XRJgF3vMopkNLWMio', 'Norway maple', '4.5000003'],
                                        ['Zx8MNpMOHVxVHSYA0iFRx', 'Norway spruce', '5.000004'],
                                        ['B7_DlroODsgT4rS3DuDNu', 'Pin oak', '3.000003'],
                                        ['AZ38hPEEeh67JDYHNMWnz', 'Quaking aspen', '2.000001'],
                                        ['BpY1gM6yl0ebnnl2oZLuf', 'Redbud', '7.000001'],
                                        ['0GIULERc9CzKj-U1aBnmS', 'Red maple', '4.5000004'],
                                        ['PLPL_c3TpCiT049oPgfH2', 'River birch', '3.5'],
                                        ['v44R37W_svalLoiA9CAxx', 'Scarlet oak', '4.000005'],
                                        ['qmELUvkumkYHdze3zqBwg', 'Scotch pine', '3.5000001'],
                                        ['-Yh6fXpHdm5UAYlO20J0T', 'Shagbark hickory', '7.5'],
                                        ['UcCHgDUTDaYjzBl3VIq1Q', 'Shingle oak', '6.000001'],
                                        ['z3Fy5GdtqVFJJSj2t9qje', 'Shumard oak', '3.000004'],
                                        ['mtQvITRk-DmAB67XzWHO9', 'Silver maple', '3.000005'],
                                        ['D8O92X-tP8aqdzIfGQ6op', 'Sugar maple', '5.5000001'],
                                        ['1JS5xrwPjfRTOiZhdxtyG', 'Sweet gum', '4.000006'],
                                        ['JG9LJ2lPwv6GcLpf8oOeI', 'Tulip tree', '3.000006'],
                                        ['FkoTCmvU3NJaLXCQrv0jg', 'White ash', '5.000005'],
                                        ['fIpF5dAfqsl9uLi85VfR2', 'White fir', '7.5000001'],
                                        ['PY_ThhxoiZ0IDWfwdcCJD', 'White oak', '5.000006'],
                                        ['fDfXRfEqphhoS25p-v2s4', 'White pine', '5.000007'],
                                        ['eeU-G3t2S49k7JxpI_X3x', 'Yellow buckeye', '5.000008'],
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
                                    'n' => 'custom_variable',
                                    'vt' => 'numerical',
                                    'l' => 'Growth factor',
                                    'h' => 'Enter the growth factor if you can\'t find your tree in the list above. Most tree species have growth factors of 3, 4, or 5.',
                                    'oo' => 1,
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
                                    'n' => 'circumferenceAtBreastHeight',
                                    'vt' => 'numerical',
                                    'l' => 'Circumference at breast height',
                                    'h' => 'Breast height is 4.5 ft or 1.3 m from the ground.',
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
                                    'n' => 'diameterAtBreastHeight',
                                    'vt' => 'numerical',
                                    'l' => 'Diameter at breast height',
                                    'h' => 'Breast height is 4.5 ft or 1.3 m from the ground.',
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
                                    'n' => 'age',
                                    'vt' => 'numerical',
                                    'l' => 'Age',
                                    'us' => '19',
                                    'du' => 'yrs',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'age = treeSpecies * diameterAtBreastHeight',
                'var' => [
                    [
                        'l' => 'diameterAtBreastHeight',
                        'f' => 'age/treeSpecies',
                        'r' => ['treeSpecies', 'age'],
                    ],
                    [
                        'l' => 'treeSpecies',
                        'f' => 'age/diameterAtBreastHeight',
                        'r' => ['diameterAtBreastHeight', 'age'],
                    ],
                    [
                        'l' => 'age',
                        'f' => 'diameterAtBreastHeight*treeSpecies',
                        'r' => ['diameterAtBreastHeight', 'treeSpecies'],
                    ],
                ],
            ],
            [
                'formula' => 'diameterAtBreastHeight = circumferenceAtBreastHeight / pi',
                'var' => [
                    [
                        'l' => 'circumferenceAtBreastHeight',
                        'f' => 'PI*diameterAtBreastHeight',
                        'r' => ['diameterAtBreastHeight'],
                    ],
                    [
                        'l' => 'diameterAtBreastHeight',
                        'f' => 'circumferenceAtBreastHeight/PI',
                        'r' => ['circumferenceAtBreastHeight'],
                    ],
                ],
            ],
            [
                'formula' => 'treeSpecies = custom_variable',
                'var' => [
                    [
                        'l' => 'treeSpecies',
                        'f' => 'custom_variable',
                        'r' => ['custom_variable'],
                    ],
                    [
                        'l' => 'custom_variable',
                        'f' => 'treeSpecies',
                        'r' => ['treeSpecies'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'yq2HmsdM8paF4SWgInGpQ' => [
                'name' => 'treeSpecies',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => '1o-rBU3ADQjnXgQQug1JL', 'label' => 'American beech', 'value' => '6'],
                    ['uid' => 'PVQdS--FPRXFdBgiaUgCL', 'label' => 'American elm', 'value' => '4'],
                    ['uid' => 'NfC90Wh3MnVshShZQw4It', 'label' => 'American sycamore', 'value' => '4.000001'],
                    ['uid' => 'JNJ4fj9bDGGY6n6hdKKVJ', 'label' => 'Austrian pine', 'value' => '4.5'],
                    ['uid' => '3UUo2gcYcJN8_kVVjNON4', 'label' => 'Basswood', 'value' => '3.000010'],
                    ['uid' => 'tip6_ioiOiYZVw_Rd33CA', 'label' => 'Black cherry', 'value' => '5'],
                    ['uid' => '-lbXkF_5osQSvZRXsI9wm', 'label' => 'Black maple', 'value' => '5.000001'],
                    ['uid' => 'dXoCKol2oAHcWvkXcadBw', 'label' => 'Black walnut', 'value' => '4.5000001'],
                    ['uid' => '1lx2PKu29IZ430gEKPdxH', 'label' => 'Black willow', 'value' => '2'],
                    ['uid' => 'lvlnLsuewyZ6vAMDx3gcs', 'label' => 'Box elder', 'value' => '3.000011'],
                    ['uid' => 'I3fmSIEPLSPgI7Mwgu2r9', 'label' => 'Bradford pear', 'value' => '3'],
                    ['uid' => 'i9HD5HZB7fj0E-sRrnbk5', 'label' => 'Common horse chestnut', 'value' => '8'],
                    ['uid' => '2-eI0GfA9e_LWeScWsWef', 'label' => 'Colorado blue spruce', 'value' => '4.5000002'],
                    ['uid' => '27ITiRjtOvtmgXyRhz4qs', 'label' => 'Cottonwood', 'value' => '2.000001'],
                    ['uid' => 'Yq69VW2cZWJJxk_i7IzDf', 'label' => 'Dogwood', 'value' => '7.000010'],
                    ['uid' => 'zuD3bkcDWIGV4gDwcrn7u', 'label' => 'Douglas fir', 'value' => '5.000002'],
                    ['uid' => 'PIdJTKDnsh2SAsWpnF2EO', 'label' => 'European beech', 'value' => '4.000002'],
                    ['uid' => 'TwL-VMiflqFU2qis0Ak85', 'label' => 'European white birch', 'value' => '5.000003'],
                    ['uid' => 'EZUtUXn7OOkGLimA1rRl8', 'label' => 'Green ash', 'value' => '4.000003'],
                    ['uid' => 'Gwphu1CAsDJuQSCJ_gsSH', 'label' => 'Honey locust', 'value' => '3.000012'],
                    ['uid' => 'a0FW3saTbHl4yna_gbNCt', 'label' => 'Ironwood', 'value' => '7'],
                    ['uid' => 'HwCyEDzrhgnf49r3DkIKU', 'label' => 'Kentucky coffee tree', 'value' => '3.000001'],
                    ['uid' => '6ihG2VoqFJdIzysVmhRnq', 'label' => 'Littleleaf linden', 'value' => '3.000002'],
                    ['uid' => 'i_ibRgLomL8eMDbt4hQz1', 'label' => 'Northern red oak', 'value' => '4.000004'],
                    ['uid' => 'mh0-XRJgF3vMopkNLWMio', 'label' => 'Norway maple', 'value' => '4.5000003'],
                    ['uid' => 'Zx8MNpMOHVxVHSYA0iFRx', 'label' => 'Norway spruce', 'value' => '5.000004'],
                    ['uid' => 'B7_DlroODsgT4rS3DuDNu', 'label' => 'Pin oak', 'value' => '3.000003'],
                    ['uid' => 'AZ38hPEEeh67JDYHNMWnz', 'label' => 'Quaking aspen', 'value' => '2.000001'],
                    ['uid' => 'BpY1gM6yl0ebnnl2oZLuf', 'label' => 'Redbud', 'value' => '7.000001'],
                    ['uid' => '0GIULERc9CzKj-U1aBnmS', 'label' => 'Red maple', 'value' => '4.5000004'],
                    ['uid' => 'PLPL_c3TpCiT049oPgfH2', 'label' => 'River birch', 'value' => '3.5'],
                    ['uid' => 'v44R37W_svalLoiA9CAxx', 'label' => 'Scarlet oak', 'value' => '4.000005'],
                    ['uid' => 'qmELUvkumkYHdze3zqBwg', 'label' => 'Scotch pine', 'value' => '3.5000001'],
                    ['uid' => '-Yh6fXpHdm5UAYlO20J0T', 'label' => 'Shagbark hickory', 'value' => '7.5'],
                    ['uid' => 'UcCHgDUTDaYjzBl3VIq1Q', 'label' => 'Shingle oak', 'value' => '6.000001'],
                    ['uid' => 'z3Fy5GdtqVFJJSj2t9qje', 'label' => 'Shumard oak', 'value' => '3.000004'],
                    ['uid' => 'mtQvITRk-DmAB67XzWHO9', 'label' => 'Silver maple', 'value' => '3.000005'],
                    ['uid' => 'D8O92X-tP8aqdzIfGQ6op', 'label' => 'Sugar maple', 'value' => '5.5000001'],
                    ['uid' => '1JS5xrwPjfRTOiZhdxtyG', 'label' => 'Sweet gum', 'value' => '4.000006'],
                    ['uid' => 'JG9LJ2lPwv6GcLpf8oOeI', 'label' => 'Tulip tree', 'value' => '3.000006'],
                    ['uid' => 'FkoTCmvU3NJaLXCQrv0jg', 'label' => 'White ash', 'value' => '5.000005'],
                    ['uid' => 'fIpF5dAfqsl9uLi85VfR2', 'label' => 'White fir', 'value' => '7.5000001'],
                    ['uid' => 'PY_ThhxoiZ0IDWfwdcCJD', 'label' => 'White oak', 'value' => '5.000006'],
                    ['uid' => 'fDfXRfEqphhoS25p-v2s4', 'label' => 'White pine', 'value' => '5.000007'],
                    ['uid' => 'eeU-G3t2S49k7JxpI_X3x', 'label' => 'Yellow buckeye', 'value' => '5.000008'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => 'Give the Tree age calculator the growth factor and the age and it returns <strong>diameter at breast height</strong>.',
        'sections' => [
            ['title' => 'How does the Tree age calculator work?', 'html' => <<<'TXT'
            <p>The Tree age calculator takes the values in the form, applies the relationship described below and reports <strong>diameter at breast height</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the growth factor and the age.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in years. </li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Tree species</strong></td><td>One of 45 options, such as american beech, american elm and american sycamore.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Growth factor</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Circumference at breast height</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Diameter at breast height</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Age</strong></td><td>A measured quantity, 27 units available.</td><td>years</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Tree age calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Diameter at breast height</span><span class="formula-eq">=</span><span class="formula-rhs">age ÷ tree species</span></div><div class="formula-row"><span class="formula-lhs">Circumference at breast height</span><span class="formula-eq">=</span><span class="formula-rhs">PI × diameter at breast height</span></div><div class="formula-row"><span class="formula-lhs">Tree species</span><span class="formula-eq">=</span><span class="formula-rhs">growth factor</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Open the page and it is already filled in. With the values it starts from — <strong>Tree species</strong> set to American elm — it reports <strong>Growth factor</strong> = 4.</p><p>Those are real numbers produced by the same engine that runs when you press Calculate, so you can change any single box afterwards and watch the answer move from this starting point.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Growth factor</strong> = 4 should be roughly the size you expected from <strong>Tree species</strong> set to American elm.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>The option the calculation settles on.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Time, opening in years</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Tree age calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — the growth factor and the age — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/tree-diameter">Tree diameter</a>, <a href="/biology/tree-height">Tree height</a> and <a href="/biology/tree-leaves">Leaves on tree</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tree age calculator work out?', 'a' => <<<'TXT'
            It returns diameter at breast height, derived from the growth factor and the age. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Tree age calculator?', 'a' => <<<'TXT'
            The form asks for the growth factor and the age, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter circumference at breast height in a different unit?', 'a' => <<<'TXT'
            Yes. Circumference at breast height opens in centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Growth factor = 4. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Tree age calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/tree-diameter', 'name' => 'Tree diameter'],
            ['path' => '/biology/tree-height', 'name' => 'Tree height'],
            ['path' => '/biology/tree-leaves', 'name' => 'Leaves on tree'],
        ],
    ],
];
