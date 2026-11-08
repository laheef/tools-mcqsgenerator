<?php

/**
 * Snow load
 * /construction/snow-load
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Snow load',
    'meta' => ['title' => 'Snow Load Calculator: Roof Load from Ground Snow', 'description' => 'Turn a ground snow load into the load a roof actually carries, using the exposure, thermal and importance factors and a slope reduction. from the code factors.', 'h1' => 'Snow load', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'ground',
                    'label' => 'Ground snow load',
                    'type' => 'number',
                    'suffix' => 'psf',
                    'default' => '30',
                    'help' => 'From the local building code map',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'exposure',
                    'label' => 'Exposure factor',
                    'type' => 'number',
                    'default' => '1.0',
                    'help' => '1.0 sheltered, 1.2 exposed, 0.9 in a city centre',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thermal',
                    'label' => 'Thermal factor',
                    'type' => 'number',
                    'default' => '1.1',
                    'help' => '1.1 cold roof, 0.85 warm and well insulated',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'importance',
                    'label' => 'Importance factor',
                    'type' => 'number',
                    'default' => '1.0',
                    'help' => '1.0 ordinary, 1.1 for a high-occupancy building',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'slope',
                    'label' => 'Roof slope',
                    'type' => 'number',
                    'suffix' => '°',
                    'default' => '30',
                    'help' => 'The roof angle in degrees',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area',
                    'label' => 'Roof area',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '1500',
                    'help' => 'The surface that carries it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'flat_load',
                    'label' => 'Flat roof snow load',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'psf',
                ],
                [
                    'name' => 'slope_factor',
                    'label' => 'Slope factor',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'roof_load',
                    'label' => 'Roof snow load',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'psf',
                ],
                [
                    'name' => 'total_load',
                    'label' => 'Total snow on the roof',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Snow load',
            'results' => [
                'flat_load' => '0.7*exposure*thermal*importance*ground',
                'slope_factor' => 'min(1,max(0,1-(slope-30)/40))',
                'roof_load' => '0.7*exposure*thermal*importance*ground*min(1,max(0,1-(slope-30)/40))',
                'total_load' => '0.7*exposure*thermal*importance*ground*min(1,max(0,1-(slope-30)/40))*area',
                'ground' => 'flat_load/(0.7*exposure*thermal*importance)',
                'slope' => '30+40*(1-slope_factor)',
                'area' => 'total_load/roof_load',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p>The flat roof snow load is <strong>0.7 × Ce × Ct × I × Pg</strong>. A slope sheds snow above 30°, and the roof load falls to nothing by about 70°.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Ground snow and roof snow are not the same number, and the difference is the reason roofs in snowy country are built to a load a visitor from the ground would never guess. Wind blows snow off a roof, a warm roof melts it, and a steep roof sheds it — all three reduce what the structure has to carry.</p><p>The page reports <strong>flat roof snow load and slope factor and roof snow load and total snow on the roof</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Flat roof snow load</strong></td><td><code>0.7 × Exposure factor × Thermal factor × Importance factor × Ground snow load</code></td></tr><tr><td><strong>Slope factor</strong></td><td><code>min(1,max(0,1-(Roof slope-30) ÷ 40))</code></td></tr><tr><td><strong>Roof snow load</strong></td><td><code>0.7 × Exposure factor × Thermal factor × Importance factor × Ground snow load × min(1,max(0,1-(Roof slope-30) ÷ 40))</code></td></tr><tr><td><strong>Total snow on the roof</strong></td><td><code>0.7 × Exposure factor × Thermal factor × Importance factor × Ground snow load × min(1,max(0,1-(Roof slope-30) ÷ 40)) × Roof area</code></td></tr><tr><td><strong>Ground snow load</strong></td><td><code>Flat roof snow load ÷ (0.7 × Exposure factor × Thermal factor × Importance factor)</code></td></tr><tr><td><strong>Roof slope</strong></td><td><code>30+40 × (1-Slope factor)</code></td></tr><tr><td><strong>Roof area</strong></td><td><code>Total snow on the roof ÷ Roof snow load</code></td></tr></tbody></table><p><p>The 0.7 is the conversion from ground to roof snow in the code, and the three factors adjust it for exposure, heat and consequence. The slope factor is 1.0 up to 30° and falls linearly to zero at 70°, which is the shed behaviour of a steep pitch.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports flat roof snow load and slope factor and roof snow load and total snow on the roof.</p><ul><li><strong>Ground snow load</strong> — in psf. From the local building code map</li><li><strong>Exposure factor</strong>. 1.0 sheltered, 1.2 exposed, 0.9 in a city centre</li><li><strong>Thermal factor</strong>. 1.1 cold roof, 0.85 warm and well insulated</li><li><strong>Importance factor</strong>. 1.0 ordinary, 1.1 for a high-occupancy building</li><li><strong>Roof slope</strong> — in °. The roof angle in degrees</li><li><strong>Roof area</strong> — in ft². The surface that carries it</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Flat roof snow load</strong> — in psf</li><li><strong>Slope factor</strong></li><li><strong>Roof snow load</strong> — in psf</li><li><strong>Total snow on the roof</strong> — in lb</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Ground snow load = 30 psf, Exposure factor = 1, Thermal factor = 1.1, Importance factor = 1, Roof slope = 30 °, Roof area = 1 500 ft² — and the results panel reads:</p><ul><li><strong>Flat roof snow load</strong> = <code>0.7 × Exposure factor × Thermal factor × Importance factor × Ground snow load</code> = <strong>23.1 psf</strong></li><li><strong>Slope factor</strong> = <code>min(1,max(0,1-(Roof slope-30) ÷ 40))</code> = <strong>1</strong></li><li><strong>Roof snow load</strong> = <code>0.7 × Exposure factor × Thermal factor × Importance factor × Ground snow load × min(1,max(0,1-(Roof slope-30) ÷ 40))</code> = <strong>23.1 psf</strong></li><li><strong>Total snow on the roof</strong> = <code>0.7 × Exposure factor × Thermal factor × Importance factor × Ground snow load × min(1,max(0,1-(Roof slope-30) ÷ 40)) × Roof area</code> = <strong>34 650 lb</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.7 × 1 × 1.1 × 1 × 30 = 23.1</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 30 psf ground load on an ordinary cold roof in a suburban exposure gives 23.1 psf flat. At 30° the slope factor is still 1.0, so the roof carries 23.1 psf — nearly 35 000 lb over 1 500 ft² of roof.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the roof load against the ground load: it is usually lower, but not always — a fully exposed cold roof can take the full ground figure. The total is what a truss or rafter is designed against, together with the dead load.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Flat roof snow load</th><th>Slope factor</th><th>Roof snow load</th><th>Total snow on the roof</th></tr></thead><tbody><tr><td><strong>Ground snow load</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Exposure factor</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Thermal factor</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Importance factor</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Roof slope</strong> +10 %</td><td>+0 %</td><td>−7.5 %</td><td>−7.5 %</td><td>−7.5 %</td></tr><tr><td><strong>Roof area</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Exposure factor</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Roof slope</strong>, at 7.5 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Ground snow load = 50, Exposure factor = 1, Thermal factor = 1.1, Importance factor = 1, Roof slope = 20, Roof area = 2 000, the page reports <strong>Flat roof snow load</strong> = 38.5 psf, <strong>Slope factor</strong> = 1, <strong>Roof snow load</strong> = 38.5 psf, <strong>Total snow on the roof</strong> = 77 000 lb. A heavy-snow region on a shallow roof, where nothing sheds and nothing is discounted.</li><li>With Ground snow load = 60, Exposure factor = 0.9, Thermal factor = 0.85, Importance factor = 1.1, Roof slope = 45, Roof area = 1 200, the page reports <strong>Flat roof snow load</strong> = 35.343 psf, <strong>Slope factor</strong> = 0.625, <strong>Roof snow load</strong> = 22.089 psf, <strong>Total snow on the roof</strong> = 26 507.25 lb. A warm, sheltered roof at a steep pitch, where two factors reduce the load and one raises it.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Ground load used as roof load.</strong> The 0.7 and the factors exist for a reason.</li><li><strong>Drifts ignored.</strong> A valley beside a taller roof can carry several times the uniform load.</li><li><strong>Slope in x/12 typed as degrees.</strong> A 6/12 roof is 26.6°, not 6°.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Flat roof snow load (psf), Slope factor, Roof snow load (psf), Total snow on the roof (lb).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Loads in pounds per square foot, the slope in degrees, the factors as plain numbers, and the total load in pounds at the area you enter.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need ground snow load and exposure factor and thermal factor and importance factor and roof slope and roof area. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Flat roof snow load and slope factor and roof snow load and total snow on the roof should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Ground snow load</strong> ×10</td><td>23.1</td><td>231</td><td>ten times larger</td></tr><tr><td><strong>Exposure factor</strong> ×10</td><td>23.1</td><td>231</td><td>ten times larger</td></tr><tr><td><strong>Thermal factor</strong> ×10</td><td>23.1</td><td>231</td><td>ten times larger</td></tr><tr><td><strong>Importance factor</strong> ×10</td><td>23.1</td><td>231</td><td>ten times larger</td></tr><tr><td><strong>Roof slope</strong> ×10</td><td>23.1</td><td>23.1</td><td>unchanged</td></tr><tr><td><strong>Roof area</strong> ×10</td><td>23.1</td><td>23.1</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Uniform load only.</strong> Drifts, rain-on-snow and sliding snow are separate cases in the code.</li><li><strong>A simplified clause.</strong> Use the full code for anything but an ordinary building.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a roof against a ground snow map.</li></li><li><li>Seeing what a steeper pitch actually saves.</li></li><li><li>Feeding a truss or rafter design.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/roof-truss">Roof truss</a> <a href="/construction/roof-pitch">Roof pitch</a> <a href="/construction/wood-beam-span">Wood beam span</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Snow load calculator work out?', 'a' => <<<'TXT'
            It returns flat roof snow load and slope factor and roof snow load and total snow on the roof from ground snow load and exposure factor and thermal factor and importance factor and roof slope and roof area. The relationship is 0.7 × Exposure factor × Thermal factor × Importance factor × Ground snow load.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Ground snow load (psf), Exposure factor, Thermal factor, Importance factor, Roof slope (°), Roof area (ft²). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: ground snow load in psf; roof slope in °; roof area in ft². The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is roof snow load less than ground snow load?', 'a' => 'Wind blows some off, a warm roof melts some, and the code\'s 0.7 factor accounts for the rest.'],
            ['q' => 'At what pitch does snow slide off a roof?', 'a' => 'Above 30° it starts to shed, and by 70° the code assumes it does not stay.'],
        ],
        'related' => [
            ['path' => '/construction/roof-truss', 'name' => 'Roof truss'],
            ['path' => '/construction/roof-pitch', 'name' => 'Roof pitch'],
            ['path' => '/construction/wood-beam-span', 'name' => 'Wood beam span'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
