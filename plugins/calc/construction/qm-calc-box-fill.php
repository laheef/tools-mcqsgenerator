<?php

/**
 * Box fill
 * /construction/box-fill
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Box fill',
    'meta' => ['title' => 'Box Fill Calculator: Conductor Volume and Fill', 'description' => 'Check an electrical box against its volume allowance: conductors, devices, clamps and grounds counted in volume units and compared with capacity. Units shown.', 'h1' => 'Box fill', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'box_volume',
                    'label' => 'Box volume',
                    'type' => 'number',
                    'suffix' => 'in³',
                    'default' => '22',
                    'help' => 'Stamped inside the box',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'conductors',
                    'label' => 'Current-carrying conductors',
                    'type' => 'number',
                    'default' => '8',
                    'help' => 'Count every one that enters',
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
                    'help' => 'One allowance if present',
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
                    'name' => 'fill_volume',
                    'label' => 'Fill volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in³',
                ],
                [
                    'name' => 'fill_pct',
                    'label' => 'Fill',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'spare_volume',
                    'label' => 'Spare volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in³',
                ],
                [
                    'name' => 'unit_count',
                    'label' => 'Volume units',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Box fill',
            'results' => [
                'fill_volume' => '(conductors+2*devices+clamps+grounds)*conductor_volume',
                'fill_pct' => '(conductors+2*devices+clamps+grounds)*conductor_volume/box_volume*100',
                'spare_volume' => 'box_volume-(conductors+2*devices+clamps+grounds)*conductor_volume',
                'unit_count' => 'conductors+2*devices+clamps+grounds',
                'conductors' => 'box_volume*1/conductor_volume-2*devices-clamps-grounds',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Volume = (conductors + 2 × devices + clamps + grounds) × unit volume</strong>, compared with the box volume.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A box that is too full is a code violation and a fire risk: the wires cannot shed heat, and the insulation is damaged when the device is folded back. Box fill is counted in volume units rather than wires because a device takes the space of two conductors and a clamp takes one.</p><p>The page reports <strong>fill volume and fill and spare volume and volume units</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Fill volume</strong></td><td><code>(Current-carrying conductors+2 × Devices+Clamps+Grounds) × Volume per conductor</code></td></tr><tr><td><strong>Fill</strong></td><td><code>(Current-carrying conductors+2 × Devices+Clamps+Grounds) × Volume per conductor ÷ Box volume × 100</code></td></tr><tr><td><strong>Spare volume</strong></td><td><code>Box volume-(Current-carrying conductors+2 × Devices+Clamps+Grounds) × Volume per conductor</code></td></tr><tr><td><strong>Volume units</strong></td><td><code>Current-carrying conductors+2 × Devices+Clamps+Grounds</code></td></tr><tr><td><strong>Current-carrying conductors</strong></td><td><code>Box volume × 1 ÷ Volume per conductor-2 × Devices-Clamps-Grounds</code></td></tr></tbody></table><p><p>Each current-carrying conductor counts once, each device twice, each clamp once and all the grounds together once. Multiply that unit count by the volume the largest conductor requires and compare with the cubic inches stamped inside the box.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports fill volume and fill and spare volume and volume units.</p><ul><li><strong>Box volume</strong> — in in³. Stamped inside the box</li><li><strong>Current-carrying conductors</strong>. Count every one that enters</li><li><strong>Volume per conductor</strong> — in in³. From the wire gauge table</li><li><strong>Devices</strong>. Each counts as two</li><li><strong>Clamps</strong>. One allowance if present</li><li><strong>Grounds</strong>. One allowance for all</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Fill volume</strong> — in in³</li><li><strong>Fill</strong> — in %</li><li><strong>Spare volume</strong> — in in³</li><li><strong>Volume units</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Box volume = 22 in³, Current-carrying conductors = 8, Volume per conductor = 2.25 in³, Devices = 1, Clamps = 1, Grounds = 1 — and the results panel reads:</p><ul><li><strong>Fill volume</strong> = <code>(Current-carrying conductors+2 × Devices+Clamps+Grounds) × Volume per conductor</code> = <strong>27 in³</strong></li><li><strong>Fill</strong> = <code>(Current-carrying conductors+2 × Devices+Clamps+Grounds) × Volume per conductor ÷ Box volume × 100</code> = <strong>122.727 %</strong></li><li><strong>Spare volume</strong> = <code>Box volume-(Current-carrying conductors+2 × Devices+Clamps+Grounds) × Volume per conductor</code> = <strong>-5 in³</strong></li><li><strong>Volume units</strong> = <code>Current-carrying conductors+2 × Devices+Clamps+Grounds</code> = <strong>12</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(8+2 × 1+1+1) × 2.25 = 27</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>12 volume units at 2.25 in³ each need 27 in³, which is 122.727 of a 22 in³ box, leaving -5 in³ spare.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the fill against a hundred: under it and the box passes. Slightly over, a deeper box of the same footprint is usually the cheapest fix; well over means the box is the wrong size for the circuit.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Fill volume</th><th>Fill</th><th>Spare volume</th><th>Volume units</th></tr></thead><tbody><tr><td><strong>Box volume</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+44 %</td><td>+0 %</td></tr><tr><td><strong>Current-carrying conductors</strong> +10 %</td><td>−13.7 %</td><td>−13.7 %</td><td>+74 %</td><td>−13.7 %</td></tr><tr><td><strong>Volume per conductor</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−54 %</td><td>+0 %</td></tr><tr><td><strong>Devices</strong> +10 %</td><td>+1.67 %</td><td>+1.67 %</td><td>−9 %</td><td>+1.67 %</td></tr><tr><td><strong>Clamps</strong> +10 %</td><td>+0.83 %</td><td>+0.83 %</td><td>−4.5 %</td><td>+0.83 %</td></tr><tr><td><strong>Grounds</strong> +10 %</td><td>+0.83 %</td><td>+0.83 %</td><td>−4.5 %</td><td>+0.83 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Current-carrying conductors</strong>: a ten per cent move there shifts the result by about 74 per cent. The least sensitive is <strong>Grounds</strong>, at 4.5 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Box volume = 18, Current-carrying conductors = 6, Devices = 0, Clamps = 0, Grounds = 1, the page reports <strong>Fill volume</strong> = 15.75 in³, <strong>Fill</strong> = 87.5 %, <strong>Spare volume</strong> = 2.25 in³, <strong>Volume units</strong> = 7. A junction with no device: only the conductors and a ground.</li><li>With Box volume = 30, Current-carrying conductors = 10, Volume per conductor = 2.25, the page reports <strong>Fill volume</strong> = 31.5 in³, <strong>Fill</strong> = 105 %, <strong>Spare volume</strong> = -1.5 in³, <strong>Volume units</strong> = 14. A larger box taking a heavier conductor count.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Devices counted as one.</strong> They count as two units.</li><li><strong>Grounds counted individually.</strong> One allowance covers them all.</li><li><strong>Unit volume guessed.</strong> It comes from the wire gauge table.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Fill volume (in³), Fill (%), Spare volume (in³), Volume units.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Box volume and allowances in cubic inches, counts as pieces, fill in per cent.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need box volume and current-carrying conductors and volume per conductor and devices and clamps and grounds. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Fill volume and fill and spare volume and volume units should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Box volume</strong> ×10</td><td>27</td><td>27</td><td>unchanged</td></tr><tr><td><strong>Current-carrying conductors</strong> ×10</td><td>27</td><td>139</td><td>×5.148</td></tr><tr><td><strong>Volume per conductor</strong> ×10</td><td>27</td><td>270</td><td>ten times larger</td></tr><tr><td><strong>Devices</strong> ×10</td><td>27</td><td>67.5</td><td>×2.5</td></tr><tr><td><strong>Clamps</strong> ×10</td><td>27</td><td>47.25</td><td>×1.75</td></tr><tr><td><strong>Grounds</strong> ×10</td><td>27</td><td>47.25</td><td>×1.75</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Standard boxes.</strong> Pendant boxes and boxes with barriers have their own rules.</li><li><strong>No code book.</strong> Confirm against your edition before signing off.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a box before wiring.</li></li><li><li>Choosing a deeper box for a device.</li></li><li><li>Teaching the volume-unit rule.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/clearance-hole">Clearance hole</a> <a href="/construction/junction-box-sizing">Junction box sizing</a> <a href="/construction/hole-volume">Hole volume</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Box fill calculator work out?', 'a' => <<<'TXT'
            It returns fill volume and fill and spare volume and volume units from box volume and current-carrying conductors and volume per conductor and devices and clamps and grounds. The relationship is (Current-carrying conductors+2 × Devices+Clamps+Grounds) × Volume per conductor.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Box volume (in³), Current-carrying conductors, Volume per conductor (in³), Devices, Clamps, Grounds. The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: box volume in in³; volume per conductor in in³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many conductors fit in a 22 cubic inch box?', 'a' => 'Twelve volume units at 2.25 each fills it exactly, so fewer once a device is fitted.'],
            ['q' => 'Does a ground wire count as a conductor?', 'a' => 'It takes one volume allowance for all the grounds together, not one each.'],
        ],
        'related' => [
            ['path' => '/construction/clearance-hole', 'name' => 'Clearance hole'],
            ['path' => '/construction/junction-box-sizing', 'name' => 'Junction box sizing'],
            ['path' => '/construction/hole-volume', 'name' => 'Hole volume'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
