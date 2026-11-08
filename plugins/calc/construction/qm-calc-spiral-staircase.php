<?php

/**
 * Spiral staircase
 * /construction/spiral-staircase
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Spiral staircase',
    'meta' => ['title' => 'Spiral Staircase Calculator: Treads and Turns', 'description' => 'Work out the treads, the turns, the walking distance and the tread width of a spiral staircase from the rise and the tread angle. and the well it needs in plan.', 'h1' => 'Spiral staircase', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'total_rise',
                    'label' => 'Floor-to-floor rise',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '108',
                    'help' => 'Finished floor to finished floor',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'riser',
                    'label' => 'Riser height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '7.5',
                    'help' => '7½ to 9 for a spiral',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tread_angle',
                    'label' => 'Tread angle',
                    'type' => 'number',
                    'suffix' => '°',
                    'default' => '30',
                    'help' => 'The pie angle of one tread — 30° is twelve a turn',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'outer_radius',
                    'label' => 'Outer radius',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '30',
                    'help' => 'Centre to the outside edge',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'inner_radius',
                    'label' => 'Inner radius',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'Centre to the newel, half its diameter',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'treads',
                    'label' => 'Treads',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'turns',
                    'label' => 'Turns',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'walkline',
                    'label' => 'Walking distance',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'tread_width',
                    'label' => 'Tread width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Spiral staircase',
            'results' => [
                'treads' => 'ceil(total_rise/riser)',
                'turns' => 'ceil(total_rise/riser)*tread_angle/360',
                'walkline' => '2*pi*(outer_radius+inner_radius)/2/12*ceil(total_rise/riser)*tread_angle/360',
                'tread_width' => 'outer_radius-inner_radius',
                'riser' => 'total_rise/ceil(total_rise/riser)',
                'tread_angle' => 'turns*360/ceil(total_rise/riser)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A spiral stair is a ring of treads: <strong>treads = rise ÷ riser</strong>, and <strong>turns = treads × tread angle ÷ 360</strong>. The walking line is the circle halfway between the two rails.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Spiral stairs buy floor area with discomfort: the treads are wedges, the walking line is narrow, and the whole flight fits in a circle two or three feet across. The useful numbers are how many treads it takes to climb the rise, how far round it goes, and how far you actually walk.</p><p>The page reports <strong>treads and turns and walking distance and tread width</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Treads</strong></td><td><code>ceil(Floor-to-floor rise ÷ Riser height)</code></td></tr><tr><td><strong>Turns</strong></td><td><code>ceil(Floor-to-floor rise ÷ Riser height) × Tread angle ÷ 360</code></td></tr><tr><td><strong>Walking distance</strong></td><td><code>2 × pi × (Outer radius+Inner radius) ÷ 2 ÷ 12 × ceil(Floor-to-floor rise ÷ Riser height) × Tread angle ÷ 360</code></td></tr><tr><td><strong>Tread width</strong></td><td><code>Outer radius-Inner radius</code></td></tr><tr><td><strong>Riser height</strong></td><td><code>Floor-to-floor rise ÷ ceil(Floor-to-floor rise ÷ Riser height)</code></td></tr><tr><td><strong>Tread angle</strong></td><td><code>Turns × 360 ÷ ceil(Floor-to-floor rise ÷ Riser height)</code></td></tr></tbody></table><p><p>The tread angle decides how many treads make a full turn — 30° gives twelve, 15° gives twenty-four. The walking distance follows the circle at the midpoint of the tread, which is where a person actually puts their feet.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports treads and turns and walking distance and tread width.</p><ul><li><strong>Floor-to-floor rise</strong> — in in. Finished floor to finished floor</li><li><strong>Riser height</strong> — in in. 7½ to 9 for a spiral</li><li><strong>Tread angle</strong> — in °. The pie angle of one tread — 30° is twelve a turn</li><li><strong>Outer radius</strong> — in in. Centre to the outside edge</li><li><strong>Inner radius</strong> — in in. Centre to the newel, half its diameter</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Treads</strong></li><li><strong>Turns</strong></li><li><strong>Walking distance</strong> — in ft</li><li><strong>Tread width</strong> — in in</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Floor-to-floor rise = 108 in, Riser height = 7.5 in, Tread angle = 30 °, Outer radius = 30 in, Inner radius = 6 in — and the results panel reads:</p><ul><li><strong>Treads</strong> = <code>ceil(Floor-to-floor rise ÷ Riser height)</code> = <strong>15</strong></li><li><strong>Turns</strong> = <code>ceil(Floor-to-floor rise ÷ Riser height) × Tread angle ÷ 360</code> = <strong>1.25</strong></li><li><strong>Walking distance</strong> = <code>2 × pi × (Outer radius+Inner radius) ÷ 2 ÷ 12 × ceil(Floor-to-floor rise ÷ Riser height) × Tread angle ÷ 360</code> = <strong>11.781 ft</strong></li><li><strong>Tread width</strong> = <code>Outer radius-Inner radius</code> = <strong>24 in</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(108 ÷ 7.5) = 15</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 108 in rise at 7.5 in is 15 treads. At 30° each that is 1.25 turns, and the walkline — a circle of 18 in radius — comes to 11.8 ft of travel to climb 9 ft.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the turns against the plan: more than about 1.5 turns and the stair is working in a shaft rather than a room. A tread width under 24 in is tight for carrying anything up.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Treads</th><th>Turns</th><th>Walking distance</th><th>Tread width</th></tr></thead><tbody><tr><td><strong>Floor-to-floor rise</strong> +10 %</td><td>+6.67 %</td><td>+6.67 %</td><td>+6.67 %</td><td>+0 %</td></tr><tr><td><strong>Riser height</strong> +10 %</td><td>−6.67 %</td><td>−6.67 %</td><td>−6.67 %</td><td>+0 %</td></tr><tr><td><strong>Tread angle</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Outer radius</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+8.33 %</td><td>+12.5 %</td></tr><tr><td><strong>Inner radius</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+1.67 %</td><td>−2.5 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Outer radius</strong>: a ten per cent move there shifts the result by about 12.5 per cent. The least sensitive is <strong>Inner radius</strong>, at 2.5 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Floor-to-floor rise = 96, Riser height = 8, Tread angle = 24, Outer radius = 36, Inner radius = 8, the page reports <strong>Treads</strong> = 12, <strong>Turns</strong> = 0.8, <strong>Walking distance</strong> = 9.215 ft, <strong>Tread width</strong> = 28 in. A wider, slower turn — fifteen treads at 24°, so exactly one full turn.</li><li>With Floor-to-floor rise = 120, Riser height = 9, Tread angle = 30, Outer radius = 26, Inner radius = 6, the page reports <strong>Treads</strong> = 14, <strong>Turns</strong> = 1.167, <strong>Walking distance</strong> = 9.774 ft, <strong>Tread width</strong> = 20 in. A steep compact stair to a loft: fewer, taller, tighter.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Total run used like a straight stair.</strong> A spiral has no run — it has turns.</li><li><strong>Inner radius entered as the diameter.</strong> The radius is half the newel's diameter.</li><li><strong>Headroom ignored.</strong> A spiral needs the same clear height as any stair, and the turns decide where it is.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Treads, Turns, Walking distance (ft), Tread width (in).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Rise and riser in inches, radii in inches, the tread angle in degrees, the count of treads and turns as plain numbers, and the walking distance in feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need floor-to-floor rise and riser height and tread angle and outer radius and inner radius. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Treads and turns and walking distance and tread width should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Floor-to-floor rise</strong> ×10</td><td>15</td><td>144</td><td>×9.6</td></tr><tr><td><strong>Riser height</strong> ×10</td><td>15</td><td>2</td><td>×0.133</td></tr><tr><td><strong>Tread angle</strong> ×10</td><td>15</td><td>15</td><td>unchanged</td></tr><tr><td><strong>Outer radius</strong> ×10</td><td>15</td><td>15</td><td>unchanged</td></tr><tr><td><strong>Inner radius</strong> ×10</td><td>15</td><td>15</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Circular plan.</strong> A landing or an oval tread changes the walkline.</li><li><strong>Comfort not modelled.</strong> Codes limit spiral stairs in dwellings only.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a loft stair fits the rise.</li></li><li><li>Working out how far a spiral turns.</li></li><li><li>Sizing the well it needs.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/stairs">Stairs</a> <a href="/construction/concrete-stairs">Concrete stairs</a> <a href="/construction/ladder-angle">Ladder angle</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Spiral staircase calculator work out?', 'a' => <<<'TXT'
            It returns treads and turns and walking distance and tread width from floor-to-floor rise and riser height and tread angle and outer radius and inner radius. The relationship is ceil(Floor-to-floor rise ÷ Riser height).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Floor-to-floor rise (in), Riser height (in), Tread angle (°), Outer radius (in), Inner radius (in). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: floor-to-floor rise in in; riser height in in; tread angle in °; outer radius in in; inner radius in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many treads does a spiral stair need?', 'a' => 'The rise divided by the riser, rounded up — fifteen for a 108 in rise at 7½ in.'],
            ['q' => 'What is the walking line on a spiral stair?', 'a' => 'The circle halfway between the inner and outer edges, where people actually step.'],
        ],
        'related' => [
            ['path' => '/construction/stairs', 'name' => 'Stairs'],
            ['path' => '/construction/concrete-stairs', 'name' => 'Concrete stairs'],
            ['path' => '/construction/ladder-angle', 'name' => 'Ladder angle'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
