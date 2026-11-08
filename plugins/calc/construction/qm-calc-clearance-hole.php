<?php

/**
 * Clearance hole
 * /construction/clearance-hole
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Clearance hole',
    'meta' => ['title' => 'Clearance Hole Calculator: Diameter, Edge and Area', 'description' => 'Work out the clearance hole for a bolt: the finished hole diameter, the edge distance a plate needs and the hole\'s cross-section area. The formula is shown.', 'h1' => 'Clearance hole', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'bolt_diameter',
                    'label' => 'Bolt diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.5',
                    'help' => 'Nominal shank',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'clearance',
                    'label' => 'Clearance',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.0625',
                    'help' => 'One sixteenth for a free fit',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Plate thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.5',
                    'help' => 'Material being drilled',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hole_diameter',
                    'label' => 'Hole diameter',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'edge_distance',
                    'label' => 'Edge distance',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'hole_area',
                    'label' => 'Hole area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in²',
                ],
                [
                    'name' => 'grip_ratio',
                    'label' => 'Thickness to bolt',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Clearance hole',
            'results' => [
                'hole_diameter' => 'bolt_diameter+clearance',
                'edge_distance' => '1.5*bolt_diameter',
                'hole_area' => 'pi/4*pow(bolt_diameter+clearance,2)',
                'grip_ratio' => 'thickness/bolt_diameter',
                'bolt_diameter' => 'hole_diameter-clearance',
                'clearance' => 'hole_diameter-bolt_diameter',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Hole = bolt + clearance</strong>; the edge distance is one and a half bolt diameters, and the area follows from the hole diameter.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A bolt hole is deliberately bigger than the bolt. The clearance is what lets a bolt drop in with the parts slightly out of line, and the edge distance is what stops the plate tearing out when the bolt is tightened or loaded.</p><p>The page reports <strong>hole diameter and edge distance and hole area and thickness to bolt</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Hole diameter</strong></td><td><code>Bolt diameter+Clearance</code></td></tr><tr><td><strong>Edge distance</strong></td><td><code>1.5 × Bolt diameter</code></td></tr><tr><td><strong>Hole area</strong></td><td><code>pi ÷ 4 × (Bolt diameter+Clearance)^2</code></td></tr><tr><td><strong>Thickness to bolt</strong></td><td><code>Plate thickness ÷ Bolt diameter</code></td></tr><tr><td><strong>Bolt diameter</strong></td><td><code>Hole diameter-Clearance</code></td></tr><tr><td><strong>Clearance</strong></td><td><code>Hole diameter-Bolt diameter</code></td></tr></tbody></table><p><p>The hole is the nominal bolt diameter plus the clearance class, which is about a sixteenth of an inch for a normal fit and less for a machined one. The edge distance of one and a half diameters is a structural rule of thumb, and the hole area is a circle of the finished diameter.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports hole diameter and edge distance and hole area and thickness to bolt.</p><ul><li><strong>Bolt diameter</strong> — in in. Nominal shank</li><li><strong>Clearance</strong> — in in. One sixteenth for a free fit</li><li><strong>Plate thickness</strong> — in in. Material being drilled</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Hole diameter</strong> — in in</li><li><strong>Edge distance</strong> — in in</li><li><strong>Hole area</strong> — in in²</li><li><strong>Thickness to bolt</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Bolt diameter = 0.5 in, Clearance = 0.062 in, Plate thickness = 0.5 in — and the results panel reads:</p><ul><li><strong>Hole diameter</strong> = <code>Bolt diameter+Clearance</code> = <strong>0.562 in</strong></li><li><strong>Edge distance</strong> = <code>1.5 × Bolt diameter</code> = <strong>0.75 in</strong></li><li><strong>Hole area</strong> = <code>pi ÷ 4 × (Bolt diameter+Clearance)^2</code> = <strong>0.249 in²</strong></li><li><strong>Thickness to bolt</strong> = <code>Plate thickness ÷ Bolt diameter</code> = <strong>1</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.5+0.062 = 0.562</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 0.5 in bolt with 0.062 in of clearance needs a 0.562 in hole, 0.75 in of edge distance, and removes 0.249 in² of plate. At 0.5 in thick the grip ratio is 1.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the grip ratio: under one and the plate is thin against the bolt, so a washer is doing the work; over four and the bolt is long and the shear plane is far from the nut.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Hole diameter</th><th>Edge distance</th><th>Hole area</th><th>Thickness to bolt</th></tr></thead><tbody><tr><td><strong>Bolt diameter</strong> +10 %</td><td>+8.89 %</td><td>+10 %</td><td>+18.57 %</td><td>−9.09 %</td></tr><tr><td><strong>Clearance</strong> +10 %</td><td>+1.11 %</td><td>+0 %</td><td>+2.23 %</td><td>+0 %</td></tr><tr><td><strong>Plate thickness</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Bolt diameter</strong>: a ten per cent move there shifts the result by about 18.6 per cent. The least sensitive is <strong>Clearance</strong>, at 2.2 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Bolt diameter = 0.75, Clearance = 0.062, Plate thickness = 0.75, the page reports <strong>Hole diameter</strong> = 0.812 in, <strong>Edge distance</strong> = 1.125 in, <strong>Hole area</strong> = 0.518 in², <strong>Thickness to bolt</strong> = 1. A heavier bolt in a thicker plate.</li><li>With Bolt diameter = 0.375, Clearance = 0.031, the page reports <strong>Hole diameter</strong> = 0.406 in, <strong>Edge distance</strong> = 0.562 in, <strong>Hole area</strong> = 0.13 in², <strong>Thickness to bolt</strong> = 1.333. A machined fit on a small bolt: half the usual clearance.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Hole drilled at the nominal size.</strong> The bolt will not pass.</li><li><strong>Edge distance measured to the hole edge.</strong> It is to the centre.</li><li><strong>Clearance ignored on a slotted joint.</strong> Slots need more.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Hole diameter (in), Edge distance (in), Hole area (in²), Thickness to bolt.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Bolt, clearance, thickness and distances in inches, area in square inches.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need bolt diameter and clearance and plate thickness. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Hole diameter and edge distance and hole area and thickness to bolt should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Bolt diameter</strong> ×10</td><td>0.562</td><td>5.062</td><td>×9</td></tr><tr><td><strong>Clearance</strong> ×10</td><td>0.562</td><td>1.125</td><td>×2</td></tr><tr><td><strong>Plate thickness</strong> ×10</td><td>0.562</td><td>0.562</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Structural rule of thumb.</strong> Code edge distances vary by joint.</li><li><strong>No tolerance stack-up.</strong> Machined assemblies need a fit calculation.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Drilling a bolted connection.</li></li><li><li>Checking edge distance before cutting plate.</li></li><li><li>Sizing a bolt for a bracket.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/bolt-circle">Bolt circle</a> <a href="/construction/bolt-torque">Bolt torque</a> <a href="/construction/box-fill">Box fill</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Clearance hole calculator work out?', 'a' => <<<'TXT'
            It returns hole diameter and edge distance and hole area and thickness to bolt from bolt diameter and clearance and plate thickness. The relationship is Bolt diameter+Clearance.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Bolt diameter (in), Clearance (in), Plate thickness (in). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: bolt diameter in in; clearance in in; plate thickness in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much bigger should a bolt hole be?', 'a' => 'About a sixteenth of an inch over the bolt for a normal fit, less for a precision fit.'],
            ['q' => 'What is the minimum edge distance for a bolt?', 'a' => 'One and a half bolt diameters from the centre to the edge as a rule of thumb.'],
        ],
        'related' => [
            ['path' => '/construction/bolt-circle', 'name' => 'Bolt circle'],
            ['path' => '/construction/bolt-torque', 'name' => 'Bolt torque'],
            ['path' => '/construction/box-fill', 'name' => 'Box fill'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
