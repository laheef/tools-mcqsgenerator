<?php

/**
 * Tidal Volume and Lung Capacity Calculator
 * /biology/tidal-volume-lung-capacity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tidal Volume and Lung Capacity Calculator',
    'meta' => ['title' => 'Tidal Volume and Lung Capacity Calculator — Biology', 'description' => 'Tidal Volume and Lung Capacity takes Height, Respiratory rate and Tidal volume per kg ideal body weight and returns Ideal body weight and Tidal volume.', 'h1' => 'Tidal Volume and Lung Capacity Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'height',
                            'label' => 'Height',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '175',
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Respiratory rate',
                            'type' => 'number',
                            'suffix' => 'breaths/min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '14',
                        ],
                        [
                            'name' => 'per_kg',
                            'label' => 'Tidal volume per kg ideal body weight',
                            'type' => 'number',
                            'suffix' => 'mL/kg',
                            'help' => '6–8 is the usual target',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7',
                        ],
                        [
                            'name' => 'ibw',
                            'label' => 'Ideal body weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vt',
                            'label' => 'Tidal volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'minute',
                            'label' => 'Minute ventilation',
                            'type' => 'number',
                            'suffix' => 'L/min',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dead_space',
                            'label' => 'Anatomical dead space',
                            'type' => 'number',
                            'suffix' => 'mL',
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
            'title' => 'Volumes',
            'results' => ['ibw' => '50+0.91*(height-152.4)', 'vt' => '(50+0.91*(height-152.4))*per_kg', 'minute' => '(50+0.91*(height-152.4))*per_kg*rate/1000', 'dead_space' => '(50+0.91*(height-152.4))*2.2'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Tidal Volume and Lung Capacity takes Height, Respiratory rate and Tidal volume per kg ideal body weight and returns Ideal body weight and Tidal volume. There is no hidden constant here: change Ideal body weight and Height moves with it. The main result, Ideal body weight, is reported in kg.
        TXT,
        'sections' => [
            ['title' => 'How the Tidal Volume and Lung Capacity calculator works', 'html' => <<<'TXT'
            <p>Tidal Volume and Lung Capacity answers one question from 3 numbers, and the answer is Ideal body weight, Tidal volume and Minute ventilation.</p><p>Written with the labels from the form, Ideal body weight = 50 + 0.91 × (Height − 152.4).</p><p>The result panel carries Ideal body weight, Tidal volume, Minute ventilation and Anatomical dead space, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Height</strong> — in cm</li><li><strong>Respiratory rate</strong> — in breaths/min</li><li><strong>Tidal volume per kg ideal body weight</strong> — in mL/kg. 6–8 is the usual target</li></ul><p>The result boxes are Ideal body weight in kg, Tidal volume in mL, Minute ventilation in L/min, Anatomical dead space in mL; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Height = 175 cm, Respiratory rate = 14 breaths/min and Tidal volume per kg ideal body weight = 7 mL/kg; the answers are &lt;strong&gt;Ideal body weight&lt;/strong&gt; = 70.57 kg, &lt;strong&gt;Tidal volume&lt;/strong&gt; = 494 mL, &lt;strong&gt;Minute ventilation&lt;/strong&gt; = 6.92 L/min and &lt;strong&gt;Anatomical dead space&lt;/strong&gt; = 155 mL.</p><ul><li><strong>Ideal body weight</strong> = 70.57 kg</li><li><strong>Tidal volume</strong> = 494 mL</li><li><strong>Minute ventilation</strong> = 6.92 L/min</li><li><strong>Anatomical dead space</strong> = 155 mL</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Ideal body weight</strong> = <code>50 + 0.91 × (Height − 152.4)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Ideal body weight&lt;/strong&gt; = 70.57, &lt;strong&gt;Tidal volume&lt;/strong&gt; = 494, &lt;strong&gt;Minute ventilation&lt;/strong&gt; = 6.92 and &lt;strong&gt;Anatomical dead space&lt;/strong&gt; = 155 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Ideal body weight takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Ideal body weight</strong> = <code>50 + 0.91 × (Height − 152.4)</code></li><li><strong>Tidal volume</strong> = <code>(50 + 0.91 × (Height − 152.4)) × Tidal volume per kg ideal body weight</code></li><li><strong>Minute ventilation</strong> = <code>(50 + 0.91 × (Height − 152.4)) × Tidal volume per kg ideal body weight × Respiratory rate ÷ 1000</code></li><li><strong>Anatomical dead space</strong> = <code>(50 + 0.91 × (Height − 152.4)) × 2.2</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Ideal body weight</strong> = <code>50 + 0.91 × (Height − 152.4)</code> — the form to use when Height are the values you have.</li><li><strong>Tidal volume</strong> = <code>(50 + 0.91 × (Height − 152.4)) × Tidal volume per kg ideal body weight</code> — the form to use when Height and Tidal volume per kg ideal body weight are the values you have.</li><li><strong>Minute ventilation</strong> = <code>(50 + 0.91 × (Height − 152.4)) × Tidal volume per kg ideal body weight × Respiratory rate ÷ 1000</code> — the form to use when Height, Tidal volume per kg ideal body weight and Respiratory rate are the values you have.</li><li><strong>Anatomical dead space</strong> = <code>(50 + 0.91 × (Height − 152.4)) × 2.2</code> — the form to use when Height are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Ideal body weight, Tidal volume and Minute ventilation can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Height from 175 to 350, leaving every other box alone. The panel moves from &lt;strong&gt;Ideal body weight&lt;/strong&gt; 70.57 kg, &lt;strong&gt;Tidal volume&lt;/strong&gt; 494 mL, &lt;strong&gt;Minute ventilation&lt;/strong&gt; 6.92 L/min and &lt;strong&gt;Anatomical dead space&lt;/strong&gt; 155 mL to &lt;strong&gt;Ideal body weight&lt;/strong&gt; 230 kg, &lt;strong&gt;Tidal volume&lt;/strong&gt; 1609 mL, &lt;strong&gt;Minute ventilation&lt;/strong&gt; 22.52 L/min and &lt;strong&gt;Anatomical dead space&lt;/strong&gt; 506 mL.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Ideal body weight, Tidal volume and Minute ventilation are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Height left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Height is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Respiratory rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Respiratory rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Tidal volume per kg ideal body weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Tidal volume per kg ideal body weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Height and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Height</strong> is measured in cm. It feeds Ideal body weight, Tidal volume and Minute ventilation. Have it to hand before you start: Height is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Respiratory rate</strong> is measured in breaths/min. It feeds Minute ventilation. Have it to hand before you start: Respiratory rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Tidal volume per kg ideal body weight</strong> is measured in mL/kg. 6–8 is the usual target. It feeds Tidal volume and Minute ventilation. Have it to hand before you start: Tidal volume per kg ideal body weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Ideal body weight</strong> is a plain number and the page's own defaults put it at 70.57. The value follows from Height. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Tidal volume</strong> is a plain number and the page's own defaults put it at 494. The value follows from Height and Tidal volume per kg ideal body weight. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Minute ventilation</strong> is a plain number and the page's own defaults put it at 6.92. The value follows from Height, Tidal volume per kg ideal body weight and Respiratory rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Anatomical dead space</strong> is a plain number and the page's own defaults put it at 155. The value follows from Height. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Ideal body weight</th><th>Tidal volume</th><th>Minute ventilation</th><th>Anatomical dead space</th></tr></thead><tbody><tr><td><strong>Height</strong> +10%</td><td>+22.57%</td><td>+22.57%</td><td>+22.57%</td><td>+22.57%</td></tr><tr><td><strong>Respiratory rate</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Tidal volume per kg ideal body weight</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Height sits at the top — a ten per cent error in that box shows up as roughly 22.6 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Height = 87.5 cm, Respiratory rate = 7 breaths/min and Tidal volume per kg ideal body weight = 3.5 mL/kg, the answer is <strong>Ideal body weight</strong> = -9.06 kg, <strong>Tidal volume</strong> = -31.71 mL, <strong>Minute ventilation</strong> = -0.2219 L/min and <strong>Anatomical dead space</strong> = -19.93 mL.</li><li>With Height = 525 cm, Respiratory rate = 14 breaths/min and Tidal volume per kg ideal body weight = 7 mL/kg, the answer is <strong>Ideal body weight</strong> = 389 kg, <strong>Tidal volume</strong> = 2723 mL, <strong>Minute ventilation</strong> = 38.13 L/min and <strong>Anatomical dead space</strong> = 856 mL.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Ideal body weight follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Height, Respiratory rate and Tidal volume per kg ideal body weight measured, Ideal body weight and Tidal volume wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/horse-gestation">Horse gestation Calculator</a>, <a href="/biology/horse-weight">Horse weight Calculator</a> and <a href="/biology/how-big-will-my-cat-get">How big will my cat get Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tidal Volume and Lung Capacity calculator work out?', 'a' => <<<'TXT'
            Ideal body weight, Tidal volume, Minute ventilation and Anatomical dead space, from Height. The relationship is Ideal body weight = 50 + 0.91 × (Height − 152.4).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Height (cm), Respiratory rate (breaths/min), Tidal volume per kg ideal body weight (mL/kg). Fill height, rate and per_kg and leave Ideal body weight empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Ideal body weight, Tidal volume, Minute ventilation and Anatomical dead space can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Ideal body weight = 70.57 kg, Tidal volume = 494 mL, Minute ventilation = 6.92 L/min and Anatomical dead space = 155 mL. The figures come from Height as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Ideal body weight is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Height left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Ideal body weight keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/horse-gestation', 'name' => 'Horse gestation Calculator'],
            ['path' => '/biology/horse-weight', 'name' => 'Horse weight Calculator'],
            ['path' => '/biology/how-big-will-my-cat-get', 'name' => 'How big will my cat get Calculator'],
        ],
        'authors' => [],
    ],
];
