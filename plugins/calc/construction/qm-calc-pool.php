<?php

/**
 * Pool
 * /construction/pool
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pool',
    'meta' => ['title' => 'Pool Volume Calculator: Gallons in a Rectangle', 'description' => 'Work out a rectangular swimming pool\'s volume in gallons from its length, width and the shallow and deep ends, with the average depth beside it. Units shown.', 'h1' => 'Pool', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Pool length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '24',
                    'help' => 'Wall to wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Pool width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Wall to wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'shallow',
                    'label' => 'Shallow depth',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '3',
                    'help' => 'At the shallow end',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'deep',
                    'label' => 'Deep depth',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '6',
                    'help' => 'At the deep end',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'avg_depth',
                    'label' => 'Average depth',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
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
                    'name' => 'gallons',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal',
                ],
                [
                    'name' => 'litres',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Pool',
            'results' => [
                'avg_depth' => '(shallow+deep)/2',
                'volume_ft3' => 'length*width*(shallow+deep)/2',
                'gallons' => 'length*width*(shallow+deep)/2*7.48052',
                'litres' => 'length*width*(shallow+deep)/2*28.3168',
                'length' => 'volume_ft3/(width*(shallow+deep)/2)',
                'width' => 'volume_ft3/(length*(shallow+deep)/2)',
                'shallow' => '2*volume_ft3/(length*width)-deep',
                'deep' => '2*volume_ft3/(length*width)-shallow',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p>A pool with a slope holds the average of its two depths: <strong>gallons = length × width × (shallow + deep) ÷ 2 × 7.48</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Pool chemicals are dosed by volume, and a pool is the rare volume where the depth is not constant: the average of the two ends is the right approximation for a constant slope, and the wrong one for a hopper bottom or a sport pool with a flat middle.</p><p>The page reports <strong>average depth and volume (ft³) and volume (gal) and volume (L)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Average depth</strong></td><td><code>(Shallow depth+Deep depth) ÷ 2</code></td></tr><tr><td><strong>Volume (ft³)</strong></td><td><code>Pool length × Pool width × (Shallow depth+Deep depth) ÷ 2</code></td></tr><tr><td><strong>Volume (gal)</strong></td><td><code>Pool length × Pool width × (Shallow depth+Deep depth) ÷ 2 × 7.48052</code></td></tr><tr><td><strong>Volume (L)</strong></td><td><code>Pool length × Pool width × (Shallow depth+Deep depth) ÷ 2 × 28.3168</code></td></tr><tr><td><strong>Pool length</strong></td><td><code>Volume (ft³) ÷ (Pool width × (Shallow depth+Deep depth) ÷ 2)</code></td></tr><tr><td><strong>Pool width</strong></td><td><code>Volume (ft³) ÷ (Pool length × (Shallow depth+Deep depth) ÷ 2)</code></td></tr><tr><td><strong>Shallow depth</strong></td><td><code>2 × Volume (ft³) ÷ (Pool length × Pool width)-Deep depth</code></td></tr><tr><td><strong>Deep depth</strong></td><td><code>2 × Volume (ft³) ÷ (Pool length × Pool width)-Shallow depth</code></td></tr></tbody></table><p><p>Averaging the ends is exact for a plane sloping floor and close enough for most domestic pools. The gallons then follow from the cubic feet at 7.48 to the cubic foot.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports average depth and volume (ft³) and volume (gal) and volume (L).</p><ul><li><strong>Pool length</strong> — in ft. Wall to wall</li><li><strong>Pool width</strong> — in ft. Wall to wall</li><li><strong>Shallow depth</strong> — in ft. At the shallow end</li><li><strong>Deep depth</strong> — in ft. At the deep end</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Average depth</strong> — in ft</li><li><strong>Volume</strong> — in ft³</li><li><strong>Volume</strong> — in gal</li><li><strong>Volume</strong> — in L</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Pool length = 24 ft, Pool width = 12 ft, Shallow depth = 3 ft, Deep depth = 6 ft — and the results panel reads:</p><ul><li><strong>Average depth</strong> = <code>(Shallow depth+Deep depth) ÷ 2</code> = <strong>4.5 ft</strong></li><li><strong>Volume</strong> = <code>Pool length × Pool width × (Shallow depth+Deep depth) ÷ 2</code> = <strong>1 296 ft³</strong></li><li><strong>Volume</strong> = <code>Pool length × Pool width × (Shallow depth+Deep depth) ÷ 2 × 7.48052</code> = <strong>9 694.754 gal</strong></li><li><strong>Volume</strong> = <code>Pool length × Pool width × (Shallow depth+Deep depth) ÷ 2 × 28.3168</code> = <strong>36 698.573 L</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(3+6) ÷ 2 = 4.5</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 24 by 12 ft pool from 3 ft to 6 ft: an average depth of 4.5 ft, 1 296 ft³ of water and 9 694.754 US gallons. That is the number on the chlorine chart, and it is the one to get right.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the average depth against the two ends: it sits halfway, and a pool with a diving hopper holds more than that suggests. If the gallons look low against the filter's turnover rating, the deep end is probably deeper than entered.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Average depth</th><th>Volume</th><th>Volume</th><th>Volume</th></tr></thead><tbody><tr><td><strong>Pool length</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Pool width</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Shallow depth</strong> +10 %</td><td>+3.33 %</td><td>+3.33 %</td><td>+3.33 %</td><td>+3.33 %</td></tr><tr><td><strong>Deep depth</strong> +10 %</td><td>+6.67 %</td><td>+6.67 %</td><td>+6.67 %</td><td>+6.67 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Pool length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Shallow depth</strong>, at 3.3 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Pool length = 32, Pool width = 16, Shallow depth = 3.5, Deep depth = 8, the page reports <strong>Average depth</strong> = 5.75 ft, <strong>Volume</strong> = 2 944 ft³, <strong>Volume</strong> = 22 022.651 gal, <strong>Volume</strong> = 83 364.659 L. A pool with a diving end: the average depth carries the extra volume.</li><li>With Pool length = 16, Pool width = 8, Shallow depth = 4, Deep depth = 4, the page reports <strong>Average depth</strong> = 4 ft, <strong>Volume</strong> = 512 ft³, <strong>Volume</strong> = 3 830.026 gal, <strong>Volume</strong> = 14 498.202 L. A flat-bottom plunge pool, where both ends are the same.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Water depth taken as wall height.</strong> The water sits below the coping.</li><li><strong>Deep end measured at the drain.</strong> It is the deepest point of the floor.</li><li><strong>A hopper bottom averaged.</strong> The straight average understates it.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Average depth (ft), Volume (ft³), Volume (gal), Volume (L).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dimensions in feet, the average depth in feet, volume in cubic feet, US gallons and litres.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need pool length and pool width and shallow depth and deep depth. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Average depth and volume (ft³) and volume (gal) and volume (l) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Pool length</strong> ×10</td><td>4.5</td><td>4.5</td><td>unchanged</td></tr><tr><td><strong>Pool width</strong> ×10</td><td>4.5</td><td>4.5</td><td>unchanged</td></tr><tr><td><strong>Shallow depth</strong> ×10</td><td>4.5</td><td>18</td><td>×4</td></tr><tr><td><strong>Deep depth</strong> ×10</td><td>4.5</td><td>31.5</td><td>×7</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Rectangular plan.</strong> Freeform and oval pools need a different area.</li><li><strong>A linear slope.</strong> A hopper or a sport pool is not a wedge.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Dosing a pool.</li></li><li><li>Sizing a pump and filter.</li></li><li><li>Estimating a fill.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/round-pool-volume">Round pool volume</a> <a href="/construction/tank-volume">Tank volume</a> <a href="/construction/pond">Pond</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pool calculator work out?', 'a' => <<<'TXT'
            It returns average depth and volume (ft³) and volume (gal) and volume (L) from pool length and pool width and shallow depth and deep depth. The relationship is (Shallow depth+Deep depth) ÷ 2.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Pool length (ft), Pool width (ft), Shallow depth (ft), Deep depth (ft). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: pool length in ft; pool width in ft; shallow depth in ft; deep depth in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many gallons is a 24 by 12 pool?', 'a' => 'About 9 695 US gallons at an average depth of 4.5 ft.'],
            ['q' => 'How do I find the average depth?', 'a' => 'Add the shallow and deep ends and halve it, which is right for a constant slope.'],
        ],
        'related' => [
            ['path' => '/construction/round-pool-volume', 'name' => 'Round pool volume'],
            ['path' => '/construction/tank-volume', 'name' => 'Tank volume'],
            ['path' => '/construction/pond', 'name' => 'Pond'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
