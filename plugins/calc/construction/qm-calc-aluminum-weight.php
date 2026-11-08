<?php

/**
 * Aluminium weight
 * /construction/aluminum-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Aluminium weight',
    'meta' => ['title' => 'Aluminium Weight Calculator: Bar and Sheet Tool', 'description' => 'Work out what an aluminium bar or sheet weighs from its dimensions, in pounds and kilograms, at 169 pounds to the cubic foot. The formula and units are shown.', 'h1' => 'Aluminium weight', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '48',
                    'help' => 'Longest dimension',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '24',
                    'help' => 'Second dimension',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.125',
                    'help' => 'Thickness or diameter',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'count',
                    'label' => 'Pieces',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Same size',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_in3',
                    'label' => 'Volume each',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in³',
                ],
                [
                    'name' => 'weight_each',
                    'label' => 'Weight each',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'weight_total',
                    'label' => 'Total weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'weight_kg',
                    'label' => 'Total weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kg',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Aluminium weight',
            'results' => [
                'volume_in3' => 'length*width*thickness',
                'weight_each' => 'length*width*thickness*0.0975',
                'weight_total' => 'length*width*thickness*0.0975*count',
                'weight_kg' => 'length*width*thickness*0.0975*count/2.20462',
                'length' => 'weight_each/(width*thickness*0.0975)',
                'width' => 'weight_each/(length*thickness*0.0975)',
                'thickness' => 'weight_each/(length*width*0.0975)',
                'count' => 'weight_total/weight_each',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Weight = length × width × thickness × 0.0975</strong>, with the dimensions in inches and 0.0975 the weight of a cubic inch of aluminium.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Aluminium is chosen for its weight, so getting the weight right is the whole point of choosing it. At about a third of steel by volume, a panel that is impossible in steel is carryable in aluminium, and the arithmetic is one density away.</p><p>The page reports <strong>volume each and weight each and total weight (lb) and total weight (kg)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume each</strong></td><td><code>Length × Width × Thickness</code></td></tr><tr><td><strong>Weight each</strong></td><td><code>Length × Width × Thickness × 0.0975</code></td></tr><tr><td><strong>Total weight (lb)</strong></td><td><code>Length × Width × Thickness × 0.0975 × Pieces</code></td></tr><tr><td><strong>Total weight (kg)</strong></td><td><code>Length × Width × Thickness × 0.0975 × Pieces ÷ 2.20462</code></td></tr><tr><td><strong>Length</strong></td><td><code>Weight each ÷ (Width × Thickness × 0.0975)</code></td></tr><tr><td><strong>Width</strong></td><td><code>Weight each ÷ (Length × Thickness × 0.0975)</code></td></tr><tr><td><strong>Thickness</strong></td><td><code>Weight each ÷ (Length × Width × 0.0975)</code></td></tr><tr><td><strong>Pieces</strong></td><td><code>Total weight (lb) ÷ Weight each</code></td></tr></tbody></table><p><p>Aluminium is 169 lb/ft³, which is 0.0975 lb per cubic inch. Alloys run from about 0.095 to 0.101, so the difference across the range is under six per cent.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports volume each and weight each and total weight (lb) and total weight (kg).</p><ul><li><strong>Length</strong> — in in. Longest dimension</li><li><strong>Width</strong> — in in. Second dimension</li><li><strong>Thickness</strong> — in in. Thickness or diameter</li><li><strong>Pieces</strong>. Same size</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume each</strong> — in in³</li><li><strong>Weight each</strong> — in lb</li><li><strong>Total weight</strong> — in lb</li><li><strong>Total weight</strong> — in kg</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Length = 48 in, Width = 24 in, Thickness = 0.125 in, Pieces = 1 — and the results panel reads:</p><ul><li><strong>Volume each</strong> = <code>Length × Width × Thickness</code> = <strong>144 in³</strong></li><li><strong>Weight each</strong> = <code>Length × Width × Thickness × 0.0975</code> = <strong>14.04 lb</strong></li><li><strong>Total weight</strong> = <code>Length × Width × Thickness × 0.0975 × Pieces</code> = <strong>14.04 lb</strong></li><li><strong>Total weight</strong> = <code>Length × Width × Thickness × 0.0975 × Pieces ÷ 2.20462</code> = <strong>6.368 kg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>48 × 24 × 0.125 = 144</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A quarter-inch sheet 48 by 24 in is 144 in³ — 14.04 lb in aluminium, or 6.368 kg — against about three times that in steel.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the per-square-foot figure in your head: an eighth of an inch of aluminium is 1.76 lb/ft². If a result is near ten times that, a gauge number has been entered as a thickness.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume each</th><th>Weight each</th><th>Total weight</th><th>Total weight</th></tr></thead><tbody><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Thickness</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Pieces</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Thickness</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Length = 96, Width = 48, Thickness = 0.25, Pieces = 4, the page reports <strong>Volume each</strong> = 1 152 in³, <strong>Weight each</strong> = 112.32 lb, <strong>Total weight</strong> = 449.28 lb, <strong>Total weight</strong> = 203.79 kg. Four sheets at 8 by 4 — the sort of order that arrives on a pallet.</li><li>With Length = 36, Width = 2, Thickness = 2, Pieces = 6, the page reports <strong>Volume each</strong> = 144 in³, <strong>Weight each</strong> = 14.04 lb, <strong>Total weight</strong> = 84.24 lb, <strong>Total weight</strong> = 38.211 kg. Six short square bars, where the count matters more than the unit weight.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Density typed as 169.</strong> That is per cubic foot, not per cubic inch.</li><li><strong>Extrusion entered as flat.</strong> A box extrusion has voids.</li><li><strong>Millimetres used throughout.</strong> The result is out by 16 000 times.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume each (in³), Weight each (lb), Total weight (lb), Total weight (kg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dimensions in inches, volume in cubic inches, weight in pounds and kilograms.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need length and width and thickness and pieces. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Volume each and weight each and total weight (lb) and total weight (kg) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length</strong> ×10</td><td>144</td><td>1 440</td><td>ten times larger</td></tr><tr><td><strong>Width</strong> ×10</td><td>144</td><td>1 440</td><td>ten times larger</td></tr><tr><td><strong>Thickness</strong> ×10</td><td>144</td><td>1 440</td><td>ten times larger</td></tr><tr><td><strong>Pieces</strong> ×10</td><td>144</td><td>144</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Solid rectangular stock.</strong> Tubes and extrusions need their own area.</li><li><strong>Alloy grade ignored.</strong> The spread across grades is small.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a sheet can be lifted.</li></li><li><li>Comparing aluminium with steel.</li></li><li><li>Estimating freight.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/metal-weight">Metal weight</a> <a href="/construction/plate-weight">Plate weight</a> <a href="/construction/steel-weight">Steel weight</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Aluminium weight calculator work out?', 'a' => <<<'TXT'
            It returns volume each and weight each and total weight (lb) and total weight (kg) from length and width and thickness and pieces. The relationship is Length × Width × Thickness.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (in), Width (in), Thickness (in), Pieces. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: length in in; width in in; thickness in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does aluminium weigh per square foot?', 'a' => 'About 14.1 lb per square foot per inch of thickness.'],
            ['q' => 'How much lighter is aluminium than steel?', 'a' => 'About 34 per cent of steel\'s weight for the same volume.'],
        ],
        'related' => [
            ['path' => '/construction/metal-weight', 'name' => 'Metal weight'],
            ['path' => '/construction/plate-weight', 'name' => 'Plate weight'],
            ['path' => '/construction/steel-weight', 'name' => 'Steel weight'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
