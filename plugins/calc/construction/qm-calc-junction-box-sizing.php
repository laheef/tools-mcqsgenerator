<?php

/**
 * Junction box sizing
 * /construction/junction-box-sizing
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Junction box sizing',
    'meta' => ['title' => 'Junction Box Sizing Calculator: Volume Required', 'description' => 'Work out the volume a junction box needs from its conductors, devices, clamps and grounds, and the smallest standard box that will hold them. Units shown.', 'h1' => 'Junction box sizing', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'conductors',
                    'label' => 'Current-carrying conductors',
                    'type' => 'number',
                    'default' => '8',
                    'help' => 'Count every one',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'devices',
                    'label' => 'Devices',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Each counts as two',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'clamps',
                    'label' => 'Clamps',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'One allowance if fitted',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'grounds',
                    'label' => 'Grounds',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'One allowance for all',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'conductor_volume',
                    'label' => 'Volume per conductor',
                    'type' => 'number',
                    'suffix' => 'in³',
                    'default' => '2.25',
                    'help' => 'From the wire gauge table',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'unit_count',
                    'label' => 'Volume units',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'required_volume',
                    'label' => 'Volume required',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in³',
                ],
                [
                    'name' => 'min_box',
                    'label' => 'Smallest box',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in³',
                ],
                [
                    'name' => 'units_left',
                    'label' => 'Units at',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Junction box sizing',
            'results' => [
                'unit_count' => 'conductors+2*devices+clamps+grounds',
                'required_volume' => '(conductors+2*devices+clamps+grounds)*conductor_volume',
                'min_box' => 'ceil((conductors+2*devices+clamps+grounds)*conductor_volume/5)*5',
                'units_left' => 'ceil((conductors+2*devices+clamps+grounds)*conductor_volume/5)*5/conductor_volume',
                'conductors' => 'unit_count-2*devices-clamps-grounds',
                'devices' => '(unit_count-conductors-clamps-grounds)/2',
                'clamps' => 'unit_count-conductors-2*devices-grounds',
                'grounds' => 'unit_count-conductors-2*devices-clamps',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Volume = (conductors + 2 × devices + clamps + grounds) × unit volume</strong>, then rounded up to a box size.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Choosing a box is the reverse of checking one: the wiring is known, and the question is how much cubic inches it needs. Because boxes come in a handful of standard volumes, the practical answer is the next size up from the arithmetic.</p><p>The page reports <strong>volume units and volume required and smallest box and units at</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume units</strong></td><td><code>Current-carrying conductors+2 × Devices+Clamps+Grounds</code></td></tr><tr><td><strong>Volume required</strong></td><td><code>(Current-carrying conductors+2 × Devices+Clamps+Grounds) × Volume per conductor</code></td></tr><tr><td><strong>Smallest box</strong></td><td><code>ceil((Current-carrying conductors+2 × Devices+Clamps+Grounds) × Volume per conductor ÷ 5) × 5</code></td></tr><tr><td><strong>Units at</strong></td><td><code>ceil((Current-carrying conductors+2 × Devices+Clamps+Grounds) × Volume per conductor ÷ 5) × 5 ÷ Volume per conductor</code></td></tr><tr><td><strong>Current-carrying conductors</strong></td><td><code>Volume units-2 × Devices-Clamps-Grounds</code></td></tr><tr><td><strong>Devices</strong></td><td><code>(Volume units-Current-carrying conductors-Clamps-Grounds) ÷ 2</code></td></tr><tr><td><strong>Clamps</strong></td><td><code>Volume units-Current-carrying conductors-2 × Devices-Grounds</code></td></tr><tr><td><strong>Grounds</strong></td><td><code>Volume units-Current-carrying conductors-2 × Devices-Clamps</code></td></tr></tbody></table><p><p>Each conductor counts once, each device twice, each clamp once, and all the grounds together once. Those units times the volume a single conductor of the circuit requires gives the volume needed. The standard box sizes step in fives, so the requirement is rounded up to the next multiple of five.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports volume units and volume required and smallest box and units at.</p><ul><li><strong>Current-carrying conductors</strong>. Count every one</li><li><strong>Devices</strong>. Each counts as two</li><li><strong>Clamps</strong>. One allowance if fitted</li><li><strong>Grounds</strong>. One allowance for all</li><li><strong>Volume per conductor</strong> — in in³. From the wire gauge table</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume units</strong></li><li><strong>Volume required</strong> — in in³</li><li><strong>Smallest box</strong> — in in³</li><li><strong>Units at</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Current-carrying conductors = 8, Devices = 1, Clamps = 1, Grounds = 1, Volume per conductor = 2.25 in³ — and the results panel reads:</p><ul><li><strong>Volume units</strong> = <code>Current-carrying conductors+2 × Devices+Clamps+Grounds</code> = <strong>12</strong></li><li><strong>Volume required</strong> = <code>(Current-carrying conductors+2 × Devices+Clamps+Grounds) × Volume per conductor</code> = <strong>27 in³</strong></li><li><strong>Smallest box</strong> = <code>ceil((Current-carrying conductors+2 × Devices+Clamps+Grounds) × Volume per conductor ÷ 5) × 5</code> = <strong>30 in³</strong></li><li><strong>Units at</strong> = <code>ceil((Current-carrying conductors+2 × Devices+Clamps+Grounds) × Volume per conductor ÷ 5) × 5 ÷ Volume per conductor</code> = <strong>13.333</strong></li></ul><p>With the numbers written into the formula, the first result is <code>8+2 × 1+1+1 = 12</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>12 volume units at 2.25 in³ need 27 in³, so the smallest sensible box is 30 in³, which holds 13.333 units.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the box size against the requirement: a box near the bottom of its size will be crowded when the device is folded back. Half a size of headroom is worth the small extra cost.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume units</th><th>Volume required</th><th>Smallest box</th><th>Units at</th></tr></thead><tbody><tr><td><strong>Current-carrying conductors</strong> +10 %</td><td>+6.67 %</td><td>+6.67 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Devices</strong> +10 %</td><td>+1.67 %</td><td>+1.67 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Clamps</strong> +10 %</td><td>+0.83 %</td><td>+0.83 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Grounds</strong> +10 %</td><td>+0.83 %</td><td>+0.83 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Volume per conductor</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Volume per conductor</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Grounds</strong>, at 0.8 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Current-carrying conductors = 6, Devices = 0, Clamps = 0, Grounds = 1, the page reports <strong>Volume units</strong> = 7, <strong>Volume required</strong> = 15.75 in³, <strong>Smallest box</strong> = 20 in³, <strong>Units at</strong> = 8.889. A splice box: conductors and a ground only.</li><li>With Current-carrying conductors = 12, Devices = 2, Volume per conductor = 2.25, the page reports <strong>Volume units</strong> = 18, <strong>Volume required</strong> = 40.5 in³, <strong>Smallest box</strong> = 45 in³, <strong>Units at</strong> = 20. A busy box with two devices.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Devices counted once.</strong> They take two units each.</li><li><strong>Grounds counted individually.</strong> One allowance covers them.</li><li><strong>Volume per conductor guessed.</strong> It comes from the gauge table.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume units, Volume required (in³), Smallest box (in³), Units at.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Counts as pieces, volume in cubic inches, box size in cubic inches.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need current-carrying conductors and devices and clamps and grounds and volume per conductor. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Volume units and volume required and smallest box and units at should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Current-carrying conductors</strong> ×10</td><td>12</td><td>84</td><td>×7</td></tr><tr><td><strong>Devices</strong> ×10</td><td>12</td><td>30</td><td>×2.5</td></tr><tr><td><strong>Clamps</strong> ×10</td><td>12</td><td>21</td><td>×1.75</td></tr><tr><td><strong>Grounds</strong> ×10</td><td>12</td><td>21</td><td>×1.75</td></tr><tr><td><strong>Volume per conductor</strong> ×10</td><td>12</td><td>12</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Standard boxes.</strong> Special boxes have their own rules.</li><li><strong>No code check.</strong> Confirm against your edition.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Choosing a box for a junction.</li></li><li><li>Checking a box already fitted.</li></li><li><li>Teaching the volume-unit method.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/box-fill">Box fill</a> <a href="/construction/clearance-hole">Clearance hole</a> <a href="/construction/hole-volume">Hole volume</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Junction box sizing calculator work out?', 'a' => <<<'TXT'
            It returns volume units and volume required and smallest box and units at from current-carrying conductors and devices and clamps and grounds and volume per conductor. The relationship is Current-carrying conductors+2 × Devices+Clamps+Grounds.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Current-carrying conductors, Devices, Clamps, Grounds, Volume per conductor (in³). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: volume per conductor in in³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many cubic inches do I need?', 'a' => 'The volume units times the volume per conductor — the form does it and rounds to a box size.'],
            ['q' => 'Does a device count as two conductors?', 'a' => 'Yes, two volume units of the largest conductor.'],
        ],
        'related' => [
            ['path' => '/construction/box-fill', 'name' => 'Box fill'],
            ['path' => '/construction/clearance-hole', 'name' => 'Clearance hole'],
            ['path' => '/construction/hole-volume', 'name' => 'Hole volume'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
