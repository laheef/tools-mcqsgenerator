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
    'meta' => ['title' => 'Ligation Calculator: Formula, Steps & Examples', 'description' => 'Ligation takes insert length, vector length and vector mass and returns insert mass. No sign-up: type the numbers, press Calculate and read the answer.', 'h1' => 'Ligation Calculator', 'updated' => '2026-08-06'],
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
        Ligation turns Insert length, Vector length and Vector mass into Insert mass. It is a single relationship that reads insert mass out of insert length, not a table of canned results keyed by them. Units for Insert mass default to nanograms and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Ligation calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Ligation: it takes 4 numbers and reports Insert mass.</p><p>Written with the labels from the form, Insert mass = Insert length × Insert / vector ratio × Vector mass ÷ Vector length.</p><p>What comes back is Insert mass — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Insert length</strong> — in kilobases</li><li><strong>Vector length</strong> — in kilobases</li><li><strong>Vector mass</strong> — in nanograms</li><li><strong>Insert / vector ratio</strong> — a plain number, no unit. Molar ratio of insert to vector.</li></ul><p>What you get back is Insert mass in nanograms, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Insert length = 10 kb, Vector length = 100 kb, Vector mass = 1000 ng and Insert / vector ratio = 3 gives <strong>Insert mass</strong> = 300 ng.</p><ul><li><strong>Insert mass</strong> = 300 ng</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Insert mass</strong> = <code>Insert length × Insert / vector ratio × Vector mass ÷ Vector length</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Insert mass</strong> = 300 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Insert mass offers 27 units and opens on nanograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Insert mass</strong> = <code>Insert length × Insert / vector ratio × Vector mass ÷ Vector length</code></li><li><strong>Vector mass</strong> = <code>Insert mass × Vector length ÷ (Insert length × Insert / vector ratio)</code></li><li><strong>Vector length</strong> = <code>Insert length × Insert / vector ratio × Vector mass ÷ Insert mass</code></li><li><strong>Insert length</strong> = <code>Insert mass × Vector length ÷ (Insert / vector ratio × Vector mass)</code></li><li><strong>Insert / vector ratio</strong> = <code>Insert mass × Vector length ÷ (Insert length × Vector mass)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Insert mass</strong> = <code>Insert length × Insert / vector ratio × Vector mass ÷ Vector length</code> — the form to use when Insert length, Insert / vector ratio, Vector mass and Vector length are the values you have.</li><li><strong>Vector mass</strong> = <code>Insert mass × Vector length ÷ (Insert length × Insert / vector ratio)</code> — the form to use when Insert mass, Vector length, Insert length and Insert / vector ratio are the values you have.</li><li><strong>Vector length</strong> = <code>Insert length × Insert / vector ratio × Vector mass ÷ Insert mass</code> — the form to use when Insert length, Insert / vector ratio, Vector mass and Insert mass are the values you have.</li><li><strong>Insert length</strong> = <code>Insert mass × Vector length ÷ (Insert / vector ratio × Vector mass)</code> — the form to use when Insert mass, Vector length, Insert / vector ratio and Vector mass are the values you have.</li><li><strong>Insert / vector ratio</strong> = <code>Insert mass × Vector length ÷ (Insert length × Vector mass)</code> — the form to use when Insert mass, Vector length, Insert length and Vector mass are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Insert mass, Vector mass and Vector length can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Insert length from 10 to 20, leaving every other box alone. The panel moves from <strong>Insert mass</strong> 300 ng to <strong>Insert mass</strong> 600 ng.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Insert length, Vector length and Vector mass is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Insert mass is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Insert length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Insert length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Vector length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Vector length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Insert length to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Ligation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Insert length</strong> is a kilobases quantity: the page opens it in kb and converts anything else you pick before the formula runs. It feeds Vector mass, Vector length and Insert / vector ratio. Fill it from a measurement rather than a memory — Insert length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Vector length</strong> is a kilobases quantity: the page opens it in kb and converts anything else you pick before the formula runs. It feeds Vector mass, Insert length and Insert / vector ratio. Fill it from a measurement rather than a memory — Vector length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Vector mass</strong> is a nanograms quantity: the page opens it in ng and converts anything else you pick before the formula runs. It feeds Vector length, Insert length and Insert / vector ratio. Fill it from a measurement rather than a memory — Vector mass is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Insert / vector ratio</strong> takes a plain number with no unit attached. Molar ratio of insert to vector. It feeds Vector mass, Vector length and Insert length. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Insert / vector ratio is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Insert mass</strong> is a nanograms figure and the page's own defaults put it at 300 ng. It is worked out from Insert length, Insert / vector ratio, Vector mass and Vector length. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Insert mass</th></tr></thead><tbody><tr><td><strong>Insert length</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Vector length</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Vector mass</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Insert / vector ratio</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Insert length sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Insert length = 5 kb, Vector length = 50 kb, Vector mass = 500 ng and Insert / vector ratio = 1.5 and the page reports <strong>Insert mass</strong> = 75 ng.</li><li>Feed in Insert length = 30 kb, Vector length = 100 kb, Vector mass = 1000 ng and Insert / vector ratio = 3 and the page reports <strong>Insert mass</strong> = 900 ng.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Ligation actually offers.</p><ul><li><strong>nanograms</strong> — 27 units. It opens in <em>ng</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>kilobases</strong> — 2 units. It opens in <em>kb</em>, and the chip also carries kb. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Insert mass follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover nanograms and kilobases. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Insert length, Vector length and Vector mass is what you already know and Insert mass is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/cat-pregnancy">Cat pregnancy Calculator</a>, <a href="/biology/cat-quality-of-life">Cat quality of life Calculator</a> and <a href="/biology/catch-per-unit-effort">Catch Per Unit Effort Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Ligation calculator work out?', 'a' => <<<'TXT'
            Insert mass, from Insert length, Insert / vector ratio, Vector mass and Vector length. The relationship is Insert mass = Insert length × Insert / vector ratio × Vector mass ÷ Vector length.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Insert length (kilobases), Vector length (kilobases), Vector mass (nanograms), Insert / vector ratio. Fill insert length, vector length and vector mass and leave Insert mass empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Insert mass, Vector mass, Vector length and Insert length can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Insert mass = 300 ng. The figures come from Insert length as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Insert mass is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Insert length blank and the page solves for it, reporting Insert mass instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Insert mass at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/cat-pregnancy', 'name' => 'Cat pregnancy Calculator'],
            ['path' => '/biology/cat-quality-of-life', 'name' => 'Cat quality of life Calculator'],
            ['path' => '/biology/catch-per-unit-effort', 'name' => 'Catch Per Unit Effort Calculator'],
        ],
        'authors' => [],
    ],
];
