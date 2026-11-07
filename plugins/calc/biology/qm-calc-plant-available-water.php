<?php

/**
 * Field Capacity and Plant Available Water Calculator
 * /biology/plant-available-water
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Field Capacity and Plant Available Water Calculator',
    'meta' => ['title' => 'Field Capacity and Plant Available Water Calculator', 'description' => <<<'TXT'
    Field Capacity and Plant Available Water takes Field capacity, Permanent wilting point and Rooting depth and returns Plant available water and Available water…
    TXT, 'h1' => 'Field Capacity and Plant Available Water Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'fc',
                            'label' => 'Field capacity',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Volumetric water content',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '32',
                        ],
                        [
                            'name' => 'pwp',
                            'label' => 'Permanent wilting point',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'depth',
                            'label' => 'Rooting depth',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '600',
                        ],
                        [
                            'name' => 'current',
                            'label' => 'Current water content',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                        [
                            'name' => 'paw',
                            'label' => 'Plant available water',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'paw_mm',
                            'label' => 'Available water in the root zone',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'deficit',
                            'label' => 'Deficit to refill',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'days',
                            'label' => 'Days until wilting at 5 mm/day',
                            'type' => 'number',
                            'suffix' => 'days',
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
            'title' => 'Water',
            'results' => ['paw' => 'fc-pwp', 'paw_mm' => '(fc-pwp)/100*depth', 'deficit' => '(fc-current)/100*depth', 'days' => '(current-pwp)/100*depth/5'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Field Capacity and Plant Available Water takes Field capacity, Permanent wilting point and Rooting depth and returns Plant available water and Available water in the root zone. There is no hidden constant here: change Plant available water and Field capacity moves with it. The main result, Plant available water, is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Field Capacity and Plant Available Water calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Field Capacity and Plant Available Water: it takes 4 numbers and reports Plant available water, Available water in the root zone and Deficit to refill.</p><p>The relationship it solves reads Plant available water = Field capacity − Permanent wilting point.</p><p>What comes back is Plant available water, Available water in the root zone, Deficit to refill and Days until wilting at 5 mm/day — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Field capacity</strong> — in %. Volumetric water content</li><li><strong>Permanent wilting point</strong> — in %</li><li><strong>Rooting depth</strong> — in mm</li><li><strong>Current water content</strong> — in %</li></ul><p>What you get back is Plant available water in %, Available water in the root zone in mm, Deficit to refill in mm, Days until wilting at 5 mm/day in days, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Field capacity = 32 %, Permanent wilting point = 15 %, Rooting depth = 600 mm and Current water content = 24 % — through the same formula and the panel reports &lt;strong&gt;Plant available water&lt;/strong&gt; = 17 %, &lt;strong&gt;Available water in the root zone&lt;/strong&gt; = 102 mm, &lt;strong&gt;Deficit to refill&lt;/strong&gt; = 48 mm and &lt;strong&gt;Days until wilting at 5 mm/day&lt;/strong&gt; = 10.8 days.</p><ul><li><strong>Plant available water</strong> = 17 %</li><li><strong>Available water in the root zone</strong> = 102 mm</li><li><strong>Deficit to refill</strong> = 48 mm</li><li><strong>Days until wilting at 5 mm/day</strong> = 10.8 days</li></ul><p>The line behind those figures is <strong>Plant available water</strong> = <code>Field capacity − Permanent wilting point</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Plant available water&lt;/strong&gt; = 17, &lt;strong&gt;Available water in the root zone&lt;/strong&gt; = 102, &lt;strong&gt;Deficit to refill&lt;/strong&gt; = 48 and &lt;strong&gt;Days until wilting at 5 mm/day&lt;/strong&gt; = 10.8 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Plant available water takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Plant available water</strong> = <code>Field capacity − Permanent wilting point</code></li><li><strong>Available water in the root zone</strong> = <code>(Field capacity − Permanent wilting point) ÷ 100 × Rooting depth</code></li><li><strong>Deficit to refill</strong> = <code>(Field capacity − Current water content) ÷ 100 × Rooting depth</code></li><li><strong>Days until wilting at 5 mm/day</strong> = <code>(Current water content − Permanent wilting point) ÷ 100 × Rooting depth ÷ 5</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Plant available water</strong> = <code>Field capacity − Permanent wilting point</code> — the form to use when Field capacity and Permanent wilting point are the values you have.</li><li><strong>Available water in the root zone</strong> = <code>(Field capacity − Permanent wilting point) ÷ 100 × Rooting depth</code> — the form to use when Field capacity, Permanent wilting point and Rooting depth are the values you have.</li><li><strong>Deficit to refill</strong> = <code>(Field capacity − Current water content) ÷ 100 × Rooting depth</code> — the form to use when Field capacity, Current water content and Rooting depth are the values you have.</li><li><strong>Days until wilting at 5 mm/day</strong> = <code>(Current water content − Permanent wilting point) ÷ 100 × Rooting depth ÷ 5</code> — the form to use when Current water content, Permanent wilting point and Rooting depth are the values you have.</li></ul><p>Any one of Plant available water, Available water in the root zone and Deficit to refill can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Field capacity from 32 to 64, leaving every other box alone. The panel moves from &lt;strong&gt;Plant available water&lt;/strong&gt; 17 %, &lt;strong&gt;Available water in the root zone&lt;/strong&gt; 102 mm, &lt;strong&gt;Deficit to refill&lt;/strong&gt; 48 mm and &lt;strong&gt;Days until wilting at 5 mm/day&lt;/strong&gt; 10.8 days to &lt;strong&gt;Plant available water&lt;/strong&gt; 49 %, &lt;strong&gt;Available water in the root zone&lt;/strong&gt; 294 mm, &lt;strong&gt;Deficit to refill&lt;/strong&gt; 240 mm and &lt;strong&gt;Days until wilting at 5 mm/day&lt;/strong&gt; 10.8 days.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Plant available water, Available water in the root zone and Deficit to refill are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Field capacity left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Field capacity is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Permanent wilting point left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Permanent wilting point is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Rooting depth left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Rooting depth is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Field capacity is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Field Capacity and Plant Available Water form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Field capacity</strong> is measured in %. Volumetric water content. Change it and Plant available water, Available water in the root zone and Deficit to refill changes with it. Fill it from a measurement rather than a memory — Field capacity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Permanent wilting point</strong> is measured in %. Change it and Plant available water, Available water in the root zone and Days until wilting at 5 mm/day changes with it. Fill it from a measurement rather than a memory — Permanent wilting point is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Rooting depth</strong> is measured in mm. Change it and Available water in the root zone, Deficit to refill and Days until wilting at 5 mm/day changes with it. Fill it from a measurement rather than a memory — Rooting depth is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Current water content</strong> is measured in %. Change it and Deficit to refill and Days until wilting at 5 mm/day changes with it. Fill it from a measurement rather than a memory — Current water content is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Plant available water</strong> is a plain number and the page's own defaults put it at 17. The value follows from Field capacity and Permanent wilting point. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Available water in the root zone</strong> is a plain number and the page's own defaults put it at 102. The value follows from Field capacity, Permanent wilting point and Rooting depth. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Deficit to refill</strong> is a plain number and the page's own defaults put it at 48. The value follows from Field capacity, Current water content and Rooting depth. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Days until wilting at 5 mm/day</strong> is a plain number and the page's own defaults put it at 10.8. The value follows from Current water content, Permanent wilting point and Rooting depth. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Plant available water</th><th>Available water in the root zone</th><th>Deficit to refill</th><th>Days until wilting at 5 mm/day</th></tr></thead><tbody><tr><td><strong>Field capacity</strong> +10%</td><td>+18.82%</td><td>+18.82%</td><td>+40%</td><td>+0%</td></tr><tr><td><strong>Permanent wilting point</strong> +10%</td><td>-8.82%</td><td>-8.82%</td><td>+0%</td><td>-16.67%</td></tr><tr><td><strong>Rooting depth</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Current water content</strong> +10%</td><td>+0%</td><td>+0%</td><td>-30%</td><td>+26.67%</td></tr></tbody></table><p>Ranked by leverage, Field capacity sits at the top — a ten per cent error in that box shows up as roughly 40 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Plant available water follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Field capacity, Permanent wilting point and Rooting depth measured, Plant available water and Available water in the root zone wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dog-quality-of-life">Dog quality of life</a>, <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a> and <a href="/biology/dog-size">Dog size Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Field Capacity and Plant Available Water calculator work out?', 'a' => <<<'TXT'
            Plant available water, Available water in the root zone, Deficit to refill and Days until wilting at 5 mm/day, from Field capacity and Permanent wilting point. The relationship is Plant available water = Field capacity − Permanent wilting point.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Field capacity (%), Permanent wilting point (%), Rooting depth (mm), Current water content (%). Fill fc, pwp and depth and leave Plant available water empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Plant available water, Available water in the root zone, Deficit to refill and Days until wilting at 5 mm/day blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Plant available water = 17 %, Available water in the root zone = 102 mm, Deficit to refill = 48 mm and Days until wilting at 5 mm/day = 10.8 days. The figures come from Field capacity as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Plant available water is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Field capacity blank and the page solves for it, reporting Plant available water instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Plant available water keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size Calculator'],
        ],
        'authors' => [],
    ],
];
