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
    'meta' => ['title' => 'Microscope Magnification Calculator: Units & Formula', 'description' => 'Enter objective magnification, eyepiece magnification and field number and Microscope Magnification Calculator returns total magnification and field of view.', 'h1' => 'Microscope Magnification Calculator', 'updated' => '2026-10-29'],
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
        Microscope Magnification turns Objective magnification, Eyepiece magnification and Field number into Total magnification and Field of view. It is a single relationship that reads total magnification out of objective magnification, not a table of canned results keyed by them. Units for Total magnification default to × and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Microscope Magnification calculator works', 'html' => <<<'TXT'
            <p>The Microscope Magnification calculator applies one relationship to 4 numbers and reports Total magnification, Field of view and Actual specimen size.</p><p>In the form&#039;s own words, Total magnification = Objective magnification × Eyepiece magnification.</p><p>What comes back is Total magnification, Field of view and Actual specimen size — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Objective magnification</strong> — in ×</li><li><strong>Eyepiece magnification</strong> — in ×</li><li><strong>Field number</strong> — a plain number, no unit. Eyepiece field number, usually 18–22</li><li><strong>Measured image size</strong> — in mm. On the printed or on-screen image</li></ul><p>The result boxes are Total magnification in ×, Field of view in mm, Actual specimen size in µm; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Objective magnification = 40 ×, Eyepiece magnification = 10 ×, Field number = 20 and Measured image size = 25 mm gives <strong>Total magnification</strong> = 400 ×, <strong>Field of view</strong> = 0.5 mm and <strong>Actual specimen size</strong> = 62.5 µm.</p><ul><li><strong>Total magnification</strong> = 400 ×</li><li><strong>Field of view</strong> = 0.5 mm</li><li><strong>Actual specimen size</strong> = 62.5 µm</li></ul><p>The line behind those figures is <strong>Total magnification</strong> = <code>Objective magnification × Eyepiece magnification</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Total magnification</strong> = 400, <strong>Field of view</strong> = 0.5 and <strong>Actual specimen size</strong> = 62.5 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Total magnification takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total magnification</strong> = <code>Objective magnification × Eyepiece magnification</code></li><li><strong>Field of view</strong> = <code>Field number ÷ Objective magnification</code></li><li><strong>Actual specimen size</strong> = <code>Measured image size ÷ (Objective magnification × Eyepiece magnification) × 1000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total magnification</strong> = <code>Objective magnification × Eyepiece magnification</code> — the form to use when Objective magnification and Eyepiece magnification are the values you have.</li><li><strong>Field of view</strong> = <code>Field number ÷ Objective magnification</code> — the form to use when Field number and Objective magnification are the values you have.</li><li><strong>Actual specimen size</strong> = <code>Measured image size ÷ (Objective magnification × Eyepiece magnification) × 1000</code> — the form to use when Measured image size, Objective magnification and Eyepiece magnification are the values you have.</li></ul><p>Any one of Total magnification, Field of view and Actual specimen size can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Objective magnification from 40 to 80, leaving every other box alone. The panel moves from <strong>Total magnification</strong> 400 ×, <strong>Field of view</strong> 0.5 mm and <strong>Actual specimen size</strong> 62.5 µm to <strong>Total magnification</strong> 800 ×, <strong>Field of view</strong> 0.25 mm and <strong>Actual specimen size</strong> 31.25 µm.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box cannot be typed into: the results are worked out from the inputs above, and a past answer has to be entered as one of those inputs instead.</li><li><strong>Objective magnification left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Objective magnification is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Eyepiece magnification left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Eyepiece magnification is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Field number left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Field number is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Objective magnification is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Objective magnification</strong> is measured in ×. Change it and Total magnification, Field of view and Actual specimen size changes with it. Have it to hand before you start: Objective magnification is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Eyepiece magnification</strong> is measured in ×. Change it and Total magnification and Actual specimen size changes with it. Have it to hand before you start: Eyepiece magnification is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Field number</strong> takes a plain number with no unit attached. Eyepiece field number, usually 18–22. Change it and Field of view changes with it. Have it to hand before you start: Field number is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Measured image size</strong> is measured in mm. On the printed or on-screen image. Change it and Actual specimen size changes with it. Have it to hand before you start: Measured image size is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Total magnification</strong> is a plain number and the page's own defaults put it at 400. The value follows from Objective magnification and Eyepiece magnification. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Field of view</strong> is a plain number and the page's own defaults put it at 0.5. The value follows from Field number and Objective magnification. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Actual specimen size</strong> is a plain number and the page's own defaults put it at 62.5. The value follows from Measured image size, Objective magnification and Eyepiece magnification. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total magnification</th><th>Field of view</th><th>Actual specimen size</th></tr></thead><tbody><tr><td><strong>Objective magnification</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Eyepiece magnification</strong> +10%</td><td>+10%</td><td>+0%</td><td>-9.09%</td></tr><tr><td><strong>Field number</strong> +10%</td><td>+0%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Measured image size</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Field number sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Objective magnification = 20 ×, Eyepiece magnification = 5 ×, Field number = 10 and Measured image size = 12.5 mm, the answer is <strong>Total magnification</strong> = 100 ×, <strong>Field of view</strong> = 0.5 mm and <strong>Actual specimen size</strong> = 125 µm.</li><li>With Objective magnification = 120 ×, Eyepiece magnification = 10 ×, Field number = 20 and Measured image size = 25 mm, the answer is <strong>Total magnification</strong> = 1200 ×, <strong>Field of view</strong> = 0.1667 mm and <strong>Actual specimen size</strong> = 20.83 µm.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total magnification follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Objective magnification, Eyepiece magnification and Field number are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
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
            Objective magnification (×), Eyepiece magnification (×), Field number, Measured image size (mm). With objective magnification, eyepiece magnification and field number in place, Total magnification can stay blank and the page will work it out.
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
