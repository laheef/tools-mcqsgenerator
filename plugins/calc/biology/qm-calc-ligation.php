<?php

/**
 * Ligation
 * /biology/ligation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Ligation',
    'meta' => ['title' => 'Ligation Calculator: Formula, Steps & Examples', 'description' => '<strong>vector mass</strong> is what the Ligation calculator works out, and it gets there from the insert length, the vector length and the insert mass.', 'h1' => 'Ligation Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'insertLength',
                            'label' => 'Insert length',
                            'type' => 'number',
                            'unit' => '271',
                            'unit_default' => 'kb',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vectorLength',
                            'label' => 'Vector length',
                            'type' => 'number',
                            'unit' => '271',
                            'unit_default' => 'kb',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vectorMass',
                            'label' => 'Vector mass',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'ng',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratio',
                            'label' => 'Insert / vector ratio',
                            'type' => 'select',
                            'options' => [
                                '1:1' => '1',
                                '2:1' => '2',
                                '3:1' => '3',
                                '5:1' => '5',
                                '7:1' => '7',
                            ],
                            'dataset' => 'ratio',
                            'control' => 'DROPDOWN',
                            'help' => 'Molar ratio of insert to vector.',
                            'default' => '3:1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'requiredMassInsert',
                            'label' => 'Insert mass',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'ng',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'requiredMassInsert= (vectorMass * insertLength)/vectorLength * ratio',
            'results' => [
                'vectorMass' => 'requiredMassInsert*vectorLength/(insertLength*ratio)',
                'vectorLength' => 'insertLength*ratio*vectorMass/requiredMassInsert',
                'insertLength' => 'requiredMassInsert*vectorLength/(ratio*vectorMass)',
                'ratio' => 'requiredMassInsert*vectorLength/(insertLength*vectorMass)',
                'requiredMassInsert' => 'insertLength*ratio*vectorMass/vectorLength',
            ],
        ],
    ],
    'article' => [
        'intro' => '<strong>vector mass</strong> is what the Ligation calculator works out, and it gets there from the insert length, the vector length and the insert mass.',
        'sections' => [
            ['title' => 'How does the Ligation calculator work?', 'html' => <<<'TXT'
            <p>The Ligation calculator takes the values in the form, applies the relationship described below and reports <strong>vector mass</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the insert / vector ratio); then you type in the insert length, the vector length and the insert mass.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in kilobases. The unit chip switches it to any of the 2 supported units.</li><li>A measured quantity, entered by default in kilobases. The unit chip switches it to any of the 2 supported units.</li><li>Pick the option that matches your case — 5 options, such as 1:1, 2:1 and 3:1. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in nanograms. </li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Insert length</strong></td><td>A measured quantity, 2 units available.</td><td>kilobases</td><td>You supply it</td></tr><tr><td><strong>Vector length</strong></td><td>A measured quantity, 2 units available.</td><td>kilobases</td><td>You supply it</td></tr><tr><td><strong>Vector mass</strong></td><td>A measured quantity, 29 units available.</td><td>nanograms</td><td>Calculated</td></tr><tr><td><strong>Insert / vector ratio</strong></td><td>One of 5 options, such as 1:1, 2:1 and 3:1.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Insert mass</strong></td><td>A measured quantity, 29 units available.</td><td>nanograms</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Ligation calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Vector mass</span><span class="formula-eq">=</span><span class="formula-rhs">insert mass × vector length ÷ (insert length × insert ÷ vector ratio)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in nanograms, and convertible to any of the 29 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>DNA, opening in kilobases</li><li>DNA, opening in kilobases</li><li>Mass, opening in nanograms</li><li>Mass, opening in nanograms</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Ligation calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 3 figures keep coming back — the insert length, the vector length and the insert mass — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Write the answer down with its unit. </li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Ligation calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/livestock-fence">Livestock fence cost</a>, <a href="/biology/llama">Llama</a> and <a href="/biology/log-reduction">Log Reduction</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Ligation calculator work out?', 'a' => <<<'TXT'
            It returns vector mass, derived from the insert length, the vector length and the insert mass. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Ligation calculator?', 'a' => <<<'TXT'
            The form asks for the insert length, the vector length and the insert mass, which is 4 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter insert length in a different unit?', 'a' => <<<'TXT'
            Yes. Insert length opens in kilobases and the chip beside it offers 2 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Ligation calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/livestock-fence', 'name' => 'Livestock fence cost'],
            ['path' => '/biology/llama', 'name' => 'Llama'],
            ['path' => '/biology/log-reduction', 'name' => 'Log Reduction'],
        ],
    ],
];
