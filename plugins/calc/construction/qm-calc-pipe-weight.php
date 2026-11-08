<?php

/**
 * Pipe weight
 * /construction/pipe-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pipe weight',
    'meta' => ['title' => 'Pipe Weight Calculator per Foot and per Length', 'description' => 'Work out a pipe\'s weight per foot and per length from its outside diameter and wall thickness, in pounds and kilograms, for steel pipe of any size. Units shown.', 'h1' => 'Pipe weight', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'outside_diameter',
                    'label' => 'Outside diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2.375',
                    'help' => '2 in pipe is 2.375 OD',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wall',
                    'label' => 'Wall thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.154',
                    'help' => 'Schedule 40 in 2 in is 0.154',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '21',
                    'help' => 'One length, usually 21 or 40 ft',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'inside_diameter',
                    'label' => 'Inside diameter',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'weight_per_ft',
                    'label' => 'Weight per foot',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb/ft',
                ],
                [
                    'name' => 'weight_total',
                    'label' => 'Weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'weight_kg',
                    'label' => 'Weight',
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
            'title' => 'Pipe weight',
            'results' => [
                'inside_diameter' => 'outside_diameter-2*wall',
                'weight_per_ft' => 'pi*wall*(outside_diameter-wall)*12*0.2836',
                'weight_total' => 'pi*wall*(outside_diameter-wall)*12*0.2836*length',
                'weight_kg' => 'pi*wall*(outside_diameter-wall)*12*0.2836*length/2.20462',
                'outside_diameter' => 'inside_diameter+2*wall',
                'wall' => '(outside_diameter-sqrt(pow(outside_diameter,2)-4*weight_per_ft/(pi*12*0.2836)))/2',
                'length' => 'weight_total/weight_per_ft',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Weight per foot = π × wall × (outside − wall) × 12 × 0.2836</strong>: the annular section, which is the outside circle less the bore.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Pipe is priced and handled by weight, and nominal size is neither the outside nor the inside diameter: 2 in pipe is 2.375 in across the outside whatever the schedule. The annular formula is the only way to get from the numbers on the stencil to the number on the ticket.</p><p>The page reports <strong>inside diameter and weight per foot and weight (lb) and weight (kg)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Inside diameter</strong></td><td><code>Outside diameter-2 × Wall thickness</code></td></tr><tr><td><strong>Weight per foot</strong></td><td><code>pi × Wall thickness × (Outside diameter-Wall thickness) × 12 × 0.2836</code></td></tr><tr><td><strong>Weight (lb)</strong></td><td><code>pi × Wall thickness × (Outside diameter-Wall thickness) × 12 × 0.2836 × Length</code></td></tr><tr><td><strong>Weight (kg)</strong></td><td><code>pi × Wall thickness × (Outside diameter-Wall thickness) × 12 × 0.2836 × Length ÷ 2.20462</code></td></tr><tr><td><strong>Outside diameter</strong></td><td><code>Inside diameter+2 × Wall thickness</code></td></tr><tr><td><strong>Wall thickness</strong></td><td><code>(Outside diameter-√((Outside diameter)^2-4 × Weight per foot ÷ (pi × 12 × 0.2836))) ÷ 2</code></td></tr><tr><td><strong>Length</strong></td><td><code>Weight (lb) ÷ Weight per foot</code></td></tr></tbody></table><p><p>π times wall times the mean diameter gives the metal section; times twelve gives a foot; times 0.2836 gives pounds. The inside diameter is the outside less twice the wall, which is the bore the fluid actually sees.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports inside diameter and weight per foot and weight (lb) and weight (kg).</p><ul><li><strong>Outside diameter</strong> — in in. 2 in pipe is 2.375 OD</li><li><strong>Wall thickness</strong> — in in. Schedule 40 in 2 in is 0.154</li><li><strong>Length</strong> — in ft. One length, usually 21 or 40 ft</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Inside diameter</strong> — in in</li><li><strong>Weight per foot</strong> — in lb/ft</li><li><strong>Weight</strong> — in lb</li><li><strong>Weight</strong> — in kg</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Outside diameter = 2.375 in, Wall thickness = 0.154 in, Length = 21 ft — and the results panel reads:</p><ul><li><strong>Inside diameter</strong> = <code>Outside diameter-2 × Wall thickness</code> = <strong>2.067 in</strong></li><li><strong>Weight per foot</strong> = <code>pi × Wall thickness × (Outside diameter-Wall thickness) × 12 × 0.2836</code> = <strong>3.657 lb/ft</strong></li><li><strong>Weight</strong> = <code>pi × Wall thickness × (Outside diameter-Wall thickness) × 12 × 0.2836 × Length</code> = <strong>76.794 lb</strong></li><li><strong>Weight</strong> = <code>pi × Wall thickness × (Outside diameter-Wall thickness) × 12 × 0.2836 × Length ÷ 2.20462</code> = <strong>34.833 kg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>2.375-2 × 0.154 = 2.067</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Two-inch schedule 40 pipe — 2.375 in outside, 0.154 in wall — has an inside diameter of 2.067 in and weighs 3.657 lb/ft. A 21 ft length is 76.794 lb, or 34.833 kg.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the weight per foot against the tables: 2 in schedule 40 is 3.65 lb/ft, and schedule 80 is nearly half again. If the result is well under the table, the wall has been entered as a bore measurement.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Inside diameter</th><th>Weight per foot</th><th>Weight</th><th>Weight</th></tr></thead><tbody><tr><td><strong>Outside diameter</strong> +10 %</td><td>+11.49 %</td><td>+10.69 %</td><td>+10.69 %</td><td>+10.69 %</td></tr><tr><td><strong>Wall thickness</strong> +10 %</td><td>−1.49 %</td><td>+9.24 %</td><td>+9.24 %</td><td>+9.24 %</td></tr><tr><td><strong>Length</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Outside diameter</strong>: a ten per cent move there shifts the result by about 11.5 per cent. The least sensitive is <strong>Wall thickness</strong>, at 9.2 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Outside diameter = 4.5, Wall thickness = 0.237, Length = 21, the page reports <strong>Inside diameter</strong> = 4.026 in, <strong>Weight per foot</strong> = 10.802 lb/ft, <strong>Weight</strong> = 226.84 lb, <strong>Weight</strong> = 102.893 kg. Four-inch schedule 40: a two-person length at about 90 lb.</li><li>With Outside diameter = 6.625, Wall thickness = 0.28, Length = 40, the page reports <strong>Inside diameter</strong> = 6.065 in, <strong>Weight per foot</strong> = 18.994 lb/ft, <strong>Weight</strong> = 759.778 lb, <strong>Weight</strong> = 344.63 kg. Six-inch pipe in a 40 ft length — a crane or a side-boom job.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Nominal size used as diameter.</strong> Look up the actual OD for the size.</li><li><strong>Inside diameter entered as outside.</strong> The weight collapses.</li><li><strong>Schedule forgotten.</strong> The same nominal size in schedule 80 is much heavier.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Inside diameter (in), Weight per foot (lb/ft), Weight (lb), Weight (kg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Diameters and wall in inches, length in feet, weight per foot and total in pounds, with kilograms beside them.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need outside diameter and wall thickness and length. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Inside diameter and weight per foot and weight (lb) and weight (kg) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Outside diameter</strong> ×10</td><td>2.067</td><td>23.442</td><td>×11.341</td></tr><tr><td><strong>Wall thickness</strong> ×10</td><td>2.067</td><td>-0.705</td><td>×-0.341</td></tr><tr><td><strong>Length</strong> ×10</td><td>2.067</td><td>2.067</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Plain carbon steel.</strong> Stainless, PVC and copper have their own densities.</li><li><strong>No coating or lining.</strong> Concrete-lined pipe is much heavier.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a length can be carried.</li></li><li><li>Estimating a pipe order.</li></li><li><li>Sizing a support or a hanger.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/pipe-volume">Pipe volume</a> <a href="/construction/steel-weight">Steel weight</a> <a href="/construction/metal-weight">Metal weight</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pipe weight calculator work out?', 'a' => <<<'TXT'
            It returns inside diameter and weight per foot and weight (lb) and weight (kg) from outside diameter and wall thickness and length. The relationship is Outside diameter-2 × Wall thickness.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Outside diameter (in), Wall thickness (in), Length (ft). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: outside diameter in in; wall thickness in in; length in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does 2 inch schedule 40 pipe weigh?', 'a' => 'About 3.65 lb per foot, or 77 lb in a 21 ft length.'],
            ['q' => 'What is the outside diameter of 2 inch pipe?', 'a' => '2.375 inches, whatever the wall thickness.'],
        ],
        'related' => [
            ['path' => '/construction/pipe-volume', 'name' => 'Pipe volume'],
            ['path' => '/construction/steel-weight', 'name' => 'Steel weight'],
            ['path' => '/construction/metal-weight', 'name' => 'Metal weight'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
