<?php

/**
 * Ramp slope
 * /construction/ramp-slope
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Ramp slope',
    'meta' => ['title' => 'Ramp Slope Calculator: Run, Length and Gradient', 'description' => 'Work out the run a ramp needs for a given rise at a chosen slope ratio, with the sloping length, the gradient in per cent and the deck area. Units shown.', 'h1' => 'Ramp slope', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'rise',
                    'label' => 'Rise',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '24',
                    'help' => 'Height to climb',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'slope_ratio',
                    'label' => 'Slope ratio',
                    'type' => 'number',
                    'suffix' => '1 in',
                    'default' => '12',
                    'help' => 'Twelve is the accessible standard',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Ramp width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '4',
                    'help' => 'Deck width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'run_ft',
                    'label' => 'Run',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'length_ft',
                    'label' => 'Sloping length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'slope_pct',
                    'label' => 'Gradient',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'deck_ft2',
                    'label' => 'Deck area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Ramp slope',
            'results' => [
                'run_ft' => 'rise*slope_ratio/12',
                'length_ft' => 'sqrt(pow(rise,2)+pow(rise*slope_ratio,2))/12',
                'slope_pct' => '100/slope_ratio',
                'deck_ft2' => 'sqrt(pow(rise,2)+pow(rise*slope_ratio,2))/12*width',
                'rise' => 'run_ft*12/slope_ratio',
                'slope_ratio' => 'run_ft*12/rise',
                'width' => 'deck_ft2/length_ft',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Run = rise × ratio</strong>; the sloping length is the square root of rise squared plus run squared.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A ramp is described by its ratio — one in twelve means twelve inches of run for every inch of rise — and a ratio is easy to misread as a per cent grade. The two are reciprocals of each other, so one in twelve is eight and a third per cent, not twelve.</p><p>The page reports <strong>run and sloping length and gradient and deck area</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Run</strong></td><td><code>Rise × Slope ratio ÷ 12</code></td></tr><tr><td><strong>Sloping length</strong></td><td><code>√((Rise)^2+(Rise × Slope ratio)^2) ÷ 12</code></td></tr><tr><td><strong>Gradient</strong></td><td><code>100 ÷ Slope ratio</code></td></tr><tr><td><strong>Deck area</strong></td><td><code>√((Rise)^2+(Rise × Slope ratio)^2) ÷ 12 × Ramp width</code></td></tr><tr><td><strong>Rise</strong></td><td><code>Run × 12 ÷ Slope ratio</code></td></tr><tr><td><strong>Slope ratio</strong></td><td><code>Run × 12 ÷ Rise</code></td></tr><tr><td><strong>Ramp width</strong></td><td><code>Deck area ÷ Sloping length</code></td></tr></tbody></table><p><p>The run comes straight from the ratio once the rise and the ratio are in the same units. The sloping length is the hypotenuse of the rise and the run, and the deck area multiplies that length by the width of the ramp rather than its plan.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports run and sloping length and gradient and deck area.</p><ul><li><strong>Rise</strong> — in in. Height to climb</li><li><strong>Slope ratio</strong> — in 1 in. Twelve is the accessible standard</li><li><strong>Ramp width</strong> — in ft. Deck width</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Run</strong> — in ft</li><li><strong>Sloping length</strong> — in ft</li><li><strong>Gradient</strong> — in %</li><li><strong>Deck area</strong> — in ft²</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Rise = 24 in, Slope ratio = 12 1 in, Ramp width = 4 ft — and the results panel reads:</p><ul><li><strong>Run</strong> = <code>Rise × Slope ratio ÷ 12</code> = <strong>24 ft</strong></li><li><strong>Sloping length</strong> = <code>√((Rise)^2+(Rise × Slope ratio)^2) ÷ 12</code> = <strong>24.083 ft</strong></li><li><strong>Gradient</strong> = <code>100 ÷ Slope ratio</code> = <strong>8.333 %</strong></li><li><strong>Deck area</strong> = <code>√((Rise)^2+(Rise × Slope ratio)^2) ÷ 12 × Ramp width</code> = <strong>96.333 ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>24 × 12 ÷ 12 = 24</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 24 in rise at one in 12 needs a 24 ft run and a 24.083 ft ramp, which is a 8.333 % gradient and 96.333 ft² of deck.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the gradient against the ratio: one in twelve is about eight per cent, one in eight is twelve and a half. Anything steeper than one in eight is a step with a surface, not a ramp.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Run</th><th>Sloping length</th><th>Gradient</th><th>Deck area</th></tr></thead><tbody><tr><td><strong>Rise</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Slope ratio</strong> +10 %</td><td>+10 %</td><td>+9.93 %</td><td>−9.09 %</td><td>+9.93 %</td></tr><tr><td><strong>Ramp width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Rise</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Ramp width</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Rise = 12, Slope ratio = 8, the page reports <strong>Run</strong> = 8 ft, <strong>Sloping length</strong> = 8.062 ft, <strong>Gradient</strong> = 12.5 %, <strong>Deck area</strong> = 32.249 ft². A short garden ramp at the steepest sensible ratio.</li><li>With Rise = 36, Slope ratio = 12, Ramp width = 5, the page reports <strong>Run</strong> = 36 ft, <strong>Sloping length</strong> = 36.125 ft, <strong>Gradient</strong> = 8.333 %, <strong>Deck area</strong> = 180.624 ft². Three feet up at the accessible ratio: a long ramp needing a landing.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Ratio read as per cent.</strong> One in twelve is 8.33 per cent.</li><li><strong>Run measured on the slope.</strong> The run is horizontal.</li><li><strong>Landings left out.</strong> Long ramps need resting platforms.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Run (ft), Sloping length (ft), Gradient (%), Deck area (ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Rise in inches, run and length in feet, width in feet, gradient in per cent.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need rise and slope ratio and ramp width. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Run and sloping length and gradient and deck area should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Rise</strong> ×10</td><td>24</td><td>240</td><td>ten times larger</td></tr><tr><td><strong>Slope ratio</strong> ×10</td><td>24</td><td>240</td><td>ten times larger</td></tr><tr><td><strong>Ramp width</strong> ×10</td><td>24</td><td>24</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Straight ramp.</strong> A switchback adds landings.</li><li><strong>No handrails or curbs.</strong> Both take material and cost.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Designing an accessible entrance.</li></li><li><li>Checking a shed or garage ramp.</li></li><li><li>Costing the deck for a sloped path.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/elevation-grade">Elevation grade</a> <a href="/construction/ladder-angle">Ladder angle</a> <a href="/construction/stairs">Stairs</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Ramp slope calculator work out?', 'a' => 'It returns run and sloping length and gradient and deck area from rise and slope ratio and ramp width. The relationship is Rise × Slope ratio ÷ 12.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Rise (in), Slope ratio (1 in), Ramp width (ft). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: rise in in; slope ratio in 1 in; ramp width in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is the standard ramp slope?', 'a' => 'One in twelve, which is about eight and a third per cent.'],
            ['q' => 'How long a ramp do I need for 24 inches?', 'a' => 'Twenty four feet of run at one in twelve, or about thirty four feet of sloping surface.'],
        ],
        'related' => [
            ['path' => '/construction/elevation-grade', 'name' => 'Elevation grade'],
            ['path' => '/construction/ladder-angle', 'name' => 'Ladder angle'],
            ['path' => '/construction/stairs', 'name' => 'Stairs'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
