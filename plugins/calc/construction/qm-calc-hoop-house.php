<?php

/**
 * Hoop house
 * /construction/hoop-house
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hoop house',
    'meta' => ['title' => 'Hoop House Calculator: Cover Area and Heater', 'description' => 'Work out the plastic a hoop house or gable greenhouse needs, its volume and the heater size in BTU, from its length, width and roof height. Units shown.', 'h1' => 'Hoop house', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '24',
                    'help' => 'Along the ridge',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Span',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wall_height',
                    'label' => 'Side wall height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '4',
                    'help' => 'Eave to ground',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rise',
                    'label' => 'Roof rise',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '4',
                    'help' => 'Eave to ridge',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'delta_t',
                    'label' => 'Temperature lift',
                    'type' => 'number',
                    'suffix' => '°F',
                    'default' => '30',
                    'help' => 'Inside above outside',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cover_area',
                    'label' => 'Cover area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
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
                    'name' => 'heater_btu',
                    'label' => 'Heater',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'BTU/h',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Hoop house',
            'results' => [
                'cover_area' => '2*length*wall_height+2*length*sqrt(pow(width/2,2)+pow(rise,2))+2*(width*wall_height+width*rise/2)',
                'volume_ft3' => 'length*(width*wall_height+width*rise/2)',
                'heater_btu' => '(2*length*wall_height+2*length*sqrt(pow(width/2,2)+pow(rise,2))+2*(width*wall_height+width*rise/2))*delta_t*1.2',
                'length' => 'volume_ft3/(width*wall_height+width*rise/2)',
                'width' => 'volume_ft3/(length*wall_height+length*rise/2)',
                'rise' => '2*volume_ft3/(length*width)-2*wall_height',
                'delta_t' => 'heater_btu/cover_area/1.2',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>Cover area</strong> is the two side walls, the two roof slopes and the two gable ends; <strong>heater BTU = area × temperature lift × 1.2</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Greenhouse plastic is ordered by the square foot and heat by the BTU, and both come from the same envelope. The gable ends and the roof pitch are where the estimate usually drifts, because a greenhouse is all surface and very little floor.</p><p>The page reports <strong>cover area and volume and heater</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Cover area</strong></td><td><code>2 × Length × Side wall height+2 × Length × √((Width ÷ 2)^2+(Roof rise)^2)+2 × (Width × Side wall height+Width × Roof rise ÷ 2)</code></td></tr><tr><td><strong>Volume</strong></td><td><code>Length × (Width × Side wall height+Width × Roof rise ÷ 2)</code></td></tr><tr><td><strong>Heater</strong></td><td><code>(2 × Length × Side wall height+2 × Length × √((Width ÷ 2)^2+(Roof rise)^2)+2 × (Width × Side wall height+Width × Roof rise ÷ 2)) × Temperature lift × 1.2</code></td></tr><tr><td><strong>Length</strong></td><td><code>Volume ÷ (Width × Side wall height+Width × Roof rise ÷ 2)</code></td></tr><tr><td><strong>Width</strong></td><td><code>Volume ÷ (Length × Side wall height+Length × Roof rise ÷ 2)</code></td></tr><tr><td><strong>Roof rise</strong></td><td><code>2 × Volume ÷ (Length × Width)-2 × Side wall height</code></td></tr><tr><td><strong>Temperature lift</strong></td><td><code>Heater ÷ Cover area ÷ 1.2</code></td></tr></tbody></table><p><p>The cover is the two side walls, two roof slopes, and the gable ends — the rectangular part plus the triangle above it. The heater figure uses 1.2 BTU per square foot per degree, which is a single-skin plastic house; a double-skin house is nearer 0.7 and a glass house 1.0.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports cover area and volume and heater.</p><ul><li><strong>Length</strong> — in ft. Along the ridge</li><li><strong>Width</strong> — in ft. Span</li><li><strong>Side wall height</strong> — in ft. Eave to ground</li><li><strong>Roof rise</strong> — in ft. Eave to ridge</li><li><strong>Temperature lift</strong> — in °F. Inside above outside</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Cover area</strong> — in ft²</li><li><strong>Volume</strong> — in ft³</li><li><strong>Heater</strong> — in BTU/h</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Length = 24 ft, Width = 12 ft, Side wall height = 4 ft, Roof rise = 4 ft, Temperature lift = 30 °F — and the results panel reads:</p><ul><li><strong>Cover area</strong> = <code>2 × Length × Side wall height+2 × Length × √((Width ÷ 2)^2+(Roof rise)^2)+2 × (Width × Side wall height+Width × Roof rise ÷ 2)</code> = <strong>682.133 ft²</strong></li><li><strong>Volume</strong> = <code>Length × (Width × Side wall height+Width × Roof rise ÷ 2)</code> = <strong>1 728 ft³</strong></li><li><strong>Heater</strong> = <code>(2 × Length × Side wall height+2 × Length × √((Width ÷ 2)^2+(Roof rise)^2)+2 × (Width × Side wall height+Width × Roof rise ÷ 2)) × Temperature lift × 1.2</code> = <strong>24 556.785 BTU/h</strong></li></ul><p>With the numbers written into the formula, the first result is <code>2 × 24 × 4+2 × 24 × sqrt(pow(12 ÷ 2,2)+pow(4,2))+2 × (12 × 4+12 × 4 ÷ 2) = 682.133</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A house 24 by 12 with 4 ft walls and a 4 ft rise needs 682.133 ft² of cover, so a 24 ft wide roll about 28 ft long. It holds 1 728 ft³, and holding 30 °F above outside takes 24 556.785 BTU/h.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the cover area against the footprint: here it is more than twice the floor, which is normal. If it comes out close to the floor area, the gable ends have been left out of the formula somewhere.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Cover area</th><th>Volume</th><th>Heater</th></tr></thead><tbody><tr><td><strong>Length</strong> +10 %</td><td>+7.89 %</td><td>+10 %</td><td>+7.89 %</td></tr><tr><td><strong>Width</strong> +10 %</td><td>+5.67 %</td><td>+10 %</td><td>+5.67 %</td></tr><tr><td><strong>Side wall height</strong> +10 %</td><td>+4.22 %</td><td>+6.67 %</td><td>+4.22 %</td></tr><tr><td><strong>Roof rise</strong> +10 %</td><td>+2.32 %</td><td>+3.33 %</td><td>+2.32 %</td></tr><tr><td><strong>Temperature lift</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Roof rise</strong>, at 3.3 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Length = 40, Width = 20, Side wall height = 5, Roof rise = 6, Temperature lift = 25, the page reports <strong>Cover area</strong> = 1 652.952 ft², <strong>Volume</strong> = 6 400 ft³, <strong>Heater</strong> = 49 588.569 BTU/h. A larger house: the cover rises with the length, the end walls stay fixed.</li><li>With Length = 12, Width = 8, Side wall height = 3, Roof rise = 2, Temperature lift = 35, the page reports <strong>Cover area</strong> = 243.331 ft², <strong>Volume</strong> = 384 ft³, <strong>Heater</strong> = 10 219.913 BTU/h. A small cold frame house, where the heater is barely needed.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Floor area used as cover.</strong> The cover is always larger.</li><li><strong>Rise measured as total height.</strong> It is the ridge above the eave.</li><li><strong>Heater sized for the coldest night.</strong> It is the temperature lift that matters, not the outdoor number.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Cover area (ft²), Volume (ft³), Heater (BTU/h).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dimensions in feet, cover in square feet, volume in cubic feet, temperature lift in Fahrenheit degrees and heater output in BTU per hour.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need length and width and side wall height and roof rise and temperature lift. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Cover area and volume and heater should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length</strong> ×10</td><td>682.133</td><td>5 525.329</td><td>×8.1</td></tr><tr><td><strong>Width</strong> ×10</td><td>682.133</td><td>4 518.393</td><td>×6.624</td></tr><tr><td><strong>Side wall height</strong> ×10</td><td>682.133</td><td>3 274.133</td><td>×4.8</td></tr><tr><td><strong>Roof rise</strong> ×10</td><td>682.133</td><td>2 709.48</td><td>×3.972</td></tr><tr><td><strong>Temperature lift</strong> ×10</td><td>682.133</td><td>682.133</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A gable profile.</strong> A quonset or a lean-to has a different envelope.</li><li><strong>Steady-state heat only.</strong> Thermal mass slows the response and a real design needs the worst night.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering greenhouse plastic.</li></li><li><li>Sizing a space heater.</li></li><li><li>Comparing a gable house with a hoop.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/fence">Fence</a> <a href="/construction/insulation">Insulation</a> <a href="/construction/heat-loss">Heat loss</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hoop house calculator work out?', 'a' => <<<'TXT'
            It returns cover area and volume and heater from length and width and side wall height and roof rise and temperature lift. The relationship is 2 × Length × Side wall height+2 × Length × √((Width ÷ 2)^2+(Roof rise)^2)+2 × (Width × Side wall height+Width × Roof rise ÷ 2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (ft), Width (ft), Side wall height (ft), Roof rise (ft), Temperature lift (°F). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: length in ft; width in ft; side wall height in ft; roof rise in ft; temperature lift in °F. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much plastic does a 24 by 12 hoop house need?', 'a' => 'About 682 ft² for a 4 ft wall and 4 ft rise, which is a 24 ft wide roll about 28 ft long.'],
            ['q' => 'How many BTU to heat a greenhouse?', 'a' => 'About 1.2 BTU per square foot of cover per degree Fahrenheit for single plastic.'],
        ],
        'related' => [
            ['path' => '/construction/fence', 'name' => 'Fence'],
            ['path' => '/construction/insulation', 'name' => 'Insulation'],
            ['path' => '/construction/heat-loss', 'name' => 'Heat loss'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
