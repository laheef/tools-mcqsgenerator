<?php

/**
 * Microscope Magnification Calculator
 * /biology/microscope-magnification
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Microscope Magnification Calculator',
    'meta' => ['title' => 'Microscope Magnification Calculator — Biology', 'description' => 'Total magnification is the objective times the eyepiece, but what people usually need is the reverse: how big the object actually is. Free microscope magnific', 'h1' => 'Microscope Magnification Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'objective',
                            'label' => 'Objective magnification',
                            'type' => 'number',
                            'suffix' => '×',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'eyepiece',
                            'label' => 'Eyepiece magnification',
                            'type' => 'number',
                            'suffix' => '×',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'field_number',
                            'label' => 'Field number',
                            'type' => 'number',
                            'help' => 'Eyepiece field number, usually 18–22',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'measured',
                            'label' => 'Measured image size',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'On the printed or on-screen image',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total magnification',
                            'type' => 'number',
                            'suffix' => '×',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fov',
                            'label' => 'Field of view',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'actual',
                            'label' => 'Actual specimen size',
                            'type' => 'number',
                            'suffix' => 'µm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Magnification',
            'results' => ['total' => 'objective*eyepiece', 'fov' => 'field_number/objective', 'actual' => 'measured/(objective*eyepiece)*1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Microscope Magnification turns Objective magnification, Eyepiece magnification and Field number into Total magnification and Field of view. It is a single relationship that reads Total magnification out of Objective magnification, not a table of canned results keyed by them. Units for Total magnification default to × and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Microscope Magnification calculator works', 'html' => <<<'TXT'
            <p>The Microscope Magnification calculator applies one relationship to 4 numbers and reports Total magnification, Field of view and Actual specimen size.</p><p>In the form&#039;s own words, Total magnification = Objective magnification × Eyepiece magnification.</p><p>What comes back is Total magnification, Field of view and Actual specimen size — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Objective magnification</strong> — in ×</li><li><strong>Eyepiece magnification</strong> — in ×</li><li><strong>Field number</strong> — a plain number, no unit. Eyepiece field number, usually 18–22</li><li><strong>Measured image size</strong> — in mm. On the printed or on-screen image</li></ul><p>The result boxes are Total magnification in ×, Field of view in mm, Actual specimen size in µm; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Objective magnification = 40 ×, Eyepiece magnification = 10 ×, Field number = 20 and Measured image size = 25 mm gives &lt;strong&gt;Total magnification&lt;/strong&gt; = 400 ×, &lt;strong&gt;Field of view&lt;/strong&gt; = 0.5 mm and &lt;strong&gt;Actual specimen size&lt;/strong&gt; = 62.5 µm.</p><ul><li><strong>Total magnification</strong> = 400 ×</li><li><strong>Field of view</strong> = 0.5 mm</li><li><strong>Actual specimen size</strong> = 62.5 µm</li></ul><p>The line behind those figures is <strong>Total magnification</strong> = <code>Objective magnification × Eyepiece magnification</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Total magnification&lt;/strong&gt; = 400, &lt;strong&gt;Field of view&lt;/strong&gt; = 0.5 and &lt;strong&gt;Actual specimen size&lt;/strong&gt; = 62.5 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Total magnification takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total magnification</strong> = <code>Objective magnification × Eyepiece magnification</code></li><li><strong>Field of view</strong> = <code>Field number ÷ Objective magnification</code></li><li><strong>Actual specimen size</strong> = <code>Measured image size ÷ (Objective magnification × Eyepiece magnification) × 1000</code></li></ul><p>Any one of Total magnification, Field of view and Actual specimen size can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Objective magnification from 40 to 80, leaving every other box alone. The panel moves from &lt;strong&gt;Total magnification&lt;/strong&gt; 400 ×, &lt;strong&gt;Field of view&lt;/strong&gt; 0.5 mm and &lt;strong&gt;Actual specimen size&lt;/strong&gt; 62.5 µm to &lt;strong&gt;Total magnification&lt;/strong&gt; 800 ×, &lt;strong&gt;Field of view&lt;/strong&gt; 0.25 mm and &lt;strong&gt;Actual specimen size&lt;/strong&gt; 31.25 µm.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total magnification, Field of view and Actual specimen size are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Objective magnification is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Objective magnification, Eyepiece magnification and Field number and the number you are missing is Total magnification and Field of view.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-harness-size">Dog harness size</a>, <a href="/biology/dog-heat-cycle">Dog heat cycle</a> and <a href="/biology/dog-life-expectancy">Dog life expectancy Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Microscope Magnification calculator work out?', 'a' => <<<'TXT'
            Total magnification, Field of view and Actual specimen size, from Objective magnification and Eyepiece magnification. The relationship is Total magnification = Objective magnification × Eyepiece magnification.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Objective magnification (×), Eyepiece magnification (×), Field number, Measured image size (mm). With objective, eyepiece and field_number in place, Total magnification can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total magnification, Field of view and Actual specimen size blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total magnification = 400 ×, Field of view = 0.5 mm and Actual specimen size = 62.5 µm. The figures come from Objective magnification as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Total magnification is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Objective magnification left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Total magnification keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-harness-size', 'name' => 'Dog harness size'],
            ['path' => '/biology/dog-heat-cycle', 'name' => 'Dog heat cycle'],
            ['path' => '/biology/dog-life-expectancy', 'name' => 'Dog life expectancy Calculator'],
        ],
        'authors' => [],
    ],
];
