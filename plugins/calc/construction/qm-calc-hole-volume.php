<?php

/**
 * Hole volume
 * /construction/hole-volume
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hole volume',
    'meta' => ['title' => 'Hole Volume Calculator: Cubic Feet and Gallons', 'description' => 'Work out the volume of a round hole in cubic feet, cubic yards and gallons, from its diameter and depth, for footings, planting or a soakaway. Units shown.', 'h1' => 'Hole volume', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'diameter',
                    'label' => 'Diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Across the hole',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '36',
                    'help' => 'Bottom to grade',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_ft3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'volume_yd3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'gallons',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Hole volume',
            'results' => [
                'volume_ft3' => 'pi/4*pow(diameter/12,2)*depth/12',
                'volume_yd3' => 'pi/4*pow(diameter/12,2)*depth/12/27',
                'gallons' => 'pi/4*pow(diameter/12,2)*depth/12*7.48052',
                'diameter' => '12*sqrt(4*volume_ft3/(pi*depth/12))',
                'depth' => '48*volume_ft3/(pi*pow(diameter/12,2))',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p>A hole is a cylinder: <strong>volume = π × (diameter ÷ 2)² × depth</strong>, with both dimensions converted to feet first.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A hole is the one volume nobody measures twice and everybody under-estimates: a round hole looks small at the top and holds a surprising amount once it is three feet deep. The gallons figure is there for the case where the hole fills with water, which on a clay site it will.</p><p>The page reports <strong>volume (ft³) and volume (yd³) and volume (gal)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume (ft³)</strong></td><td><code>pi ÷ 4 × (Diameter ÷ 12)^2 × Depth ÷ 12</code></td></tr><tr><td><strong>Volume (yd³)</strong></td><td><code>pi ÷ 4 × (Diameter ÷ 12)^2 × Depth ÷ 12 ÷ 27</code></td></tr><tr><td><strong>Volume (gal)</strong></td><td><code>pi ÷ 4 × (Diameter ÷ 12)^2 × Depth ÷ 12 × 7.48052</code></td></tr><tr><td><strong>Diameter</strong></td><td><code>12 × √(4 × Volume (ft³) ÷ (pi × Depth ÷ 12))</code></td></tr><tr><td><strong>Depth</strong></td><td><code>48 × Volume (ft³) ÷ (pi × (Diameter ÷ 12)^2)</code></td></tr></tbody></table><p><p>Both dimensions are halved and divided by twelve inside the formula, so the input can stay in the inches a tape gives. The result is a cylinder, which is right for an augered hole and close enough for a dug one.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports volume (ft³) and volume (yd³) and volume (gal).</p><ul><li><strong>Diameter</strong> — in in. Across the hole</li><li><strong>Depth</strong> — in in. Bottom to grade</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume</strong> — in ft³</li><li><strong>Volume</strong> — in yd³</li><li><strong>Volume</strong> — in gal</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Diameter = 12 in, Depth = 36 in — and the results panel reads:</p><ul><li><strong>Volume</strong> = <code>pi ÷ 4 × (Diameter ÷ 12)^2 × Depth ÷ 12</code> = <strong>2.356 ft³</strong></li><li><strong>Volume</strong> = <code>pi ÷ 4 × (Diameter ÷ 12)^2 × Depth ÷ 12 ÷ 27</code> = <strong>0.087 yd³</strong></li><li><strong>Volume</strong> = <code>pi ÷ 4 × (Diameter ÷ 12)^2 × Depth ÷ 12 × 7.48052</code> = <strong>17.626 gal</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pi ÷ 4 × pow(12 ÷ 12,2) × 36 ÷ 12 = 2.356</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A twelve inch hole three feet deep holds 2.356 ft³ — 0.087 yd³, or 17.626 gallons if it fills. The same hole twice as wide holds four times as much, because the diameter is squared.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the gallons against the cubic feet: 7.48 to one. That ratio is the quickest check that the diameter was entered in inches rather than feet.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume</th><th>Volume</th><th>Volume</th></tr></thead><tbody><tr><td><strong>Diameter</strong> +10 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td></tr><tr><td><strong>Depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Diameter</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Depth</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Diameter = 18, Depth = 48, the page reports <strong>Volume</strong> = 7.069 ft³, <strong>Volume</strong> = 0.262 yd³, <strong>Volume</strong> = 52.877 gal. A tree-planting hole: wide and deep, and a lot of backfill to find.</li><li>With Diameter = 8, Depth = 24, the page reports <strong>Volume</strong> = 0.698 ft³, <strong>Volume</strong> = 0.026 yd³, <strong>Volume</strong> = 5.222 gal. A fence post hole — small enough to fill with a couple of bags.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Diameter entered as radius.</strong> The formula halves it; the volume comes out four times too big.</li><li><strong>Depth measured to the top of the spoil.</strong> It is the hole, not the mound.</li><li><strong>Water table ignored.</strong> A hole that fills changes both the volume and the pour.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume (ft³), Volume (yd³), Volume (gal).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Diameter and depth in inches; volume in cubic feet, cubic yards and US gallons, at 7.48 gallons to the cubic foot.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need diameter and depth. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Volume (ft³) and volume (yd³) and volume (gal) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Diameter</strong> ×10</td><td>2.356</td><td>235.619</td><td>×100</td></tr><tr><td><strong>Depth</strong> ×10</td><td>2.356</td><td>23.562</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A cylinder.</strong> A bell-shaped or square hole needs its own section.</li><li><strong>No displacement.</strong> A post standing in the hole takes up some of it.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing concrete for a post hole.</li></li><li><li>Estimating backfill for planting.</li></li><li><li>Working out how much water a hole will hold.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/post-hole-concrete">Post hole concrete</a> <a href="/construction/concrete-tube">Concrete tube</a> <a href="/construction/tank-volume">Tank volume</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hole volume calculator work out?', 'a' => 'It returns volume (ft³) and volume (yd³) and volume (gal) from diameter and depth. The relationship is pi ÷ 4 × (Diameter ÷ 12)^2 × Depth ÷ 12.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Diameter (in), Depth (in). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: diameter in in; depth in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much concrete does a 12 inch hole 3 feet deep take?', 'a' => '0.79 ft³ — about two bags of 80 lb mix once the post is allowed for.'],
            ['q' => 'How many gallons in a cubic foot?', 'a' => '7.48 US gallons.'],
        ],
        'related' => [
            ['path' => '/construction/post-hole-concrete', 'name' => 'Post hole concrete'],
            ['path' => '/construction/concrete-tube', 'name' => 'Concrete tube'],
            ['path' => '/construction/tank-volume', 'name' => 'Tank volume'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
