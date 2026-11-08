<?php

/**
 * Taper
 * /construction/taper
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Taper',
    'meta' => ['title' => 'Taper Calculator: Per Inch, Per Foot and Angle', 'description' => 'Work out the taper of a turned part from its two diameters and its length, per inch, per foot and as an included angle in degrees. The formula is shown.', 'h1' => 'Taper', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'large_diameter',
                    'label' => 'Large diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '1',
                    'help' => 'At the big end',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'small_diameter',
                    'label' => 'Small diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.8',
                    'help' => 'At the small end',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'help' => 'Between the two diameters',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'taper_per_inch',
                    'label' => 'Taper per inch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in/in',
                ],
                [
                    'name' => 'taper_per_ft',
                    'label' => 'Taper per foot',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in/ft',
                ],
                [
                    'name' => 'half_angle',
                    'label' => 'Half angle',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°',
                ],
                [
                    'name' => 'included_angle',
                    'label' => 'Included angle',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Taper',
            'results' => [
                'taper_per_inch' => '(large_diameter-small_diameter)/length',
                'taper_per_ft' => '(large_diameter-small_diameter)/length*12',
                'half_angle' => 'atan((large_diameter-small_diameter)/(2*length))*180/pi',
                'included_angle' => '2*atan((large_diameter-small_diameter)/(2*length))*180/pi',
                'large_diameter' => 'small_diameter+taper_per_inch*length',
                'small_diameter' => 'large_diameter-taper_per_inch*length',
                'length' => '(large_diameter-small_diameter)/taper_per_inch',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Taper per inch = (D − d) ÷ length</strong>; the half angle is its arctangent halved.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A taper is quoted on a drawing as a difference in diameter over a length, but it is cut on a lathe by setting the compound slide to an angle. Converting one to the other is the first thing that happens at the machine.</p><p>The page reports <strong>taper per inch and taper per foot and half angle and included angle</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Taper per inch</strong></td><td><code>(Large diameter-Small diameter) ÷ Length</code></td></tr><tr><td><strong>Taper per foot</strong></td><td><code>(Large diameter-Small diameter) ÷ Length × 12</code></td></tr><tr><td><strong>Half angle</strong></td><td><code>atan((Large diameter-Small diameter) ÷ (2 × Length)) × 180 ÷ pi</code></td></tr><tr><td><strong>Included angle</strong></td><td><code>2 × atan((Large diameter-Small diameter) ÷ (2 × Length)) × 180 ÷ pi</code></td></tr><tr><td><strong>Large diameter</strong></td><td><code>Small diameter+Taper per inch × Length</code></td></tr><tr><td><strong>Small diameter</strong></td><td><code>Large diameter-Taper per inch × Length</code></td></tr><tr><td><strong>Length</strong></td><td><code>(Large diameter-Small diameter) ÷ Taper per inch</code></td></tr></tbody></table><p><p>The difference between the diameters over the length is the taper per inch, and twelve of those make the taper per foot. The half angle is the arctangent of the radius change over the length — half the diameter difference, because the axis runs down the middle.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports taper per inch and taper per foot and half angle and included angle.</p><ul><li><strong>Large diameter</strong> — in in. At the big end</li><li><strong>Small diameter</strong> — in in. At the small end</li><li><strong>Length</strong> — in in. Between the two diameters</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Taper per inch</strong> — in in/in</li><li><strong>Taper per foot</strong> — in in/ft</li><li><strong>Half angle</strong> — in °</li><li><strong>Included angle</strong> — in °</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Large diameter = 1 in, Small diameter = 0.8 in, Length = 4 in — and the results panel reads:</p><ul><li><strong>Taper per inch</strong> = <code>(Large diameter-Small diameter) ÷ Length</code> = <strong>0.05 in/in</strong></li><li><strong>Taper per foot</strong> = <code>(Large diameter-Small diameter) ÷ Length × 12</code> = <strong>0.6 in/ft</strong></li><li><strong>Half angle</strong> = <code>atan((Large diameter-Small diameter) ÷ (2 × Length)) × 180 ÷ pi</code> = <strong>1.432 °</strong></li><li><strong>Included angle</strong> = <code>2 × atan((Large diameter-Small diameter) ÷ (2 × Length)) × 180 ÷ pi</code> = <strong>2.864 °</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(1-0.8) ÷ 4 = 0.05</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A part turning down from 1 in to 0.8 in over 4 in has 0.05 in/in of taper per inch — 0.6 in/ft per foot — a half angle of 1.432 ° and an included angle of 2.864 °.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the included angle against the length: a few degrees is a self-holding taper like a Morse, twenty or more is a chamfer. Mistaking the two is the commonest error at the lathe.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Taper per inch</th><th>Taper per foot</th><th>Half angle</th><th>Included angle</th></tr></thead><tbody><tr><td><strong>Large diameter</strong> +10 %</td><td>+50 %</td><td>+50 %</td><td>+49.96 %</td><td>+49.96 %</td></tr><tr><td><strong>Small diameter</strong> +10 %</td><td>−40 %</td><td>−40 %</td><td>−39.99 %</td><td>−39.99 %</td></tr><tr><td><strong>Length</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Large diameter</strong>: a ten per cent move there shifts the result by about 50 per cent. The least sensitive is <strong>Length</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Large diameter = 1, Small diameter = 0.6, Length = 6, the page reports <strong>Taper per inch</strong> = 0.067 in/in, <strong>Taper per foot</strong> = 0.8 in/ft, <strong>Half angle</strong> = 1.909 °, <strong>Included angle</strong> = 3.818 °. A gentle taper over a long length.</li><li>With Large diameter = 2, Small diameter = 1, Length = 1, the page reports <strong>Taper per inch</strong> = 1 in/in, <strong>Taper per foot</strong> = 12 in/ft, <strong>Half angle</strong> = 26.565 °, <strong>Included angle</strong> = 53.13 °. A steep taper: a chamfer rather than a fit.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Half angle set on the compound.</strong> Most lathes swivel to half the included angle.</li><li><strong>Length measured along the slope.</strong> Use the axial length.</li><li><strong>Diameter difference halved twice.</strong> The formula already halves it.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Taper per inch (in/in), Taper per foot (in/ft), Half angle (°), Included angle (°).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Diameters and length in inches, taper per inch and per foot in inches, angles in degrees.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need large diameter and small diameter and length. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Taper per inch and taper per foot and half angle and included angle should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Large diameter</strong> ×10</td><td>0.05</td><td>2.3</td><td>×46</td></tr><tr><td><strong>Small diameter</strong> ×10</td><td>0.05</td><td>-1.75</td><td>×-35</td></tr><tr><td><strong>Length</strong> ×10</td><td>0.05</td><td>0.005</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Straight taper.</strong> A bell or a radius is a different profile.</li><li><strong>No fit allowance.</strong> Clearance is a separate decision.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting a compound slide.</li></li><li><li>Checking a taper gauge.</li></li><li><li>Turning a self-holding taper.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/countersink-depth">Countersink depth</a> <a href="/construction/thread">Thread</a> <a href="/construction/spindle-speed">Spindle speed</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Taper calculator work out?', 'a' => <<<'TXT'
            It returns taper per inch and taper per foot and half angle and included angle from large diameter and small diameter and length. The relationship is (Large diameter-Small diameter) ÷ Length.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Large diameter (in), Small diameter (in), Length (in). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: large diameter in in; small diameter in in; length in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I convert taper per foot to an angle?', 'a' => 'Halve the diameter change, divide by the length in feet, and take the arctangent in degrees.'],
            ['q' => 'What is the taper of a Morse 2?', 'a' => 'About 0.0500 per inch, or roughly 1.43 degrees of half angle.'],
        ],
        'related' => [
            ['path' => '/construction/countersink-depth', 'name' => 'Countersink depth'],
            ['path' => '/construction/thread', 'name' => 'Thread'],
            ['path' => '/construction/spindle-speed', 'name' => 'Spindle speed'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
