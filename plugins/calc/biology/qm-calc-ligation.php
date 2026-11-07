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
    'meta' => ['title' => 'Ligation Calculator: Formula, Steps & Examples', 'description' => 'Ligation turns Insert length, Vector length and Insert / vector ratio into Vector mass. It is a single relationship that reads Vector mass out of Insert…', 'h1' => 'Ligation Calculator', 'updated' => '2026-08-06'],
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
        'intro' => <<<'TXT'
        Ligation turns Insert length, Vector length and Insert / vector ratio into Vector mass. It is a single relationship that reads Vector mass out of Insert length, not a table of canned results keyed by them. Units for Vector mass default to nanograms and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Ligation calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Ligation: it takes 4 numbers and reports Vector mass.</p><p>Written with the labels from the form, Vector mass = Insert mass × Vector length ÷ (Insert length × Insert / vector ratio).</p><p>What comes back is Vector mass — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Insert length</strong> — in kilobases</li><li><strong>Vector length</strong> — in kilobases</li><li><strong>Insert / vector ratio</strong> — a plain number, no unit. Molar ratio of insert to vector.</li><li><strong>Insert mass</strong> — in nanograms</li></ul><p>What you get back is Vector mass in nanograms, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Insert length = 10 kb, Vector length = 100 kb, Insert / vector ratio = 3 and Insert mass = 1000 ng gives &lt;strong&gt;Vector mass&lt;/strong&gt; = 3333 ng.</p><ul><li><strong>Vector mass</strong> = 3333 ng</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Vector mass</strong> = <code>Insert mass × Vector length ÷ (Insert length × Insert / vector ratio)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Vector mass&lt;/strong&gt; = 3333 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Vector mass offers 27 units and opens on nanograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Vector mass</strong> = <code>Insert mass × Vector length ÷ (Insert length × Insert / vector ratio)</code></li><li><strong>Vector length</strong> = <code>Insert length × Insert / vector ratio × Vector mass ÷ Insert mass</code></li><li><strong>Insert length</strong> = <code>Insert mass × Vector length ÷ (Insert / vector ratio × Vector mass)</code></li><li><strong>Insert / vector ratio</strong> = <code>Insert mass × Vector length ÷ (Insert length × Vector mass)</code></li><li><strong>Insert mass</strong> = <code>Insert length × Insert / vector ratio × Vector mass ÷ Vector length</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Vector mass, Vector length and Insert length can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Insert length from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Vector mass&lt;/strong&gt; 3333 ng to &lt;strong&gt;Vector mass&lt;/strong&gt; 1667 ng.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Insert length, Vector length and Insert mass is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Vector mass is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Insert length to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Insert length, Vector length and Insert / vector ratio is what you already know and Vector mass is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/cat-pregnancy">Cat pregnancy Calculator</a>, <a href="/biology/cat-quality-of-life">Cat quality of life Calculator</a> and <a href="/biology/catch-per-unit-effort">Catch Per Unit Effort Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Ligation calculator work out?', 'a' => <<<'TXT'
            Vector mass, from Insert mass, Vector length, Insert length and Insert / vector ratio. The relationship is Vector mass = Insert mass × Vector length ÷ (Insert length × Insert / vector ratio).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Insert length (kilobases), Vector length (kilobases), Insert / vector ratio, Insert mass (nanograms). Fill insertLength, vectorLength and ratio and leave Vector mass empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Vector mass, Vector length, Insert length and Insert / vector ratio can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Vector mass = 3333 ng. The figures come from Insert length as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Vector mass is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Insert length blank and the page solves for it, reporting Vector mass instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Vector mass at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/cat-pregnancy', 'name' => 'Cat pregnancy Calculator'],
            ['path' => '/biology/cat-quality-of-life', 'name' => 'Cat quality of life Calculator'],
            ['path' => '/biology/catch-per-unit-effort', 'name' => 'Catch Per Unit Effort Calculator'],
        ],
        'authors' => [],
    ],
];
