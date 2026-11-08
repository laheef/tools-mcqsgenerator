<?php

/**
 * Floor joist
 * /construction/floor-joist
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Floor joist',
    'meta' => ['title' => 'Floor Joist Calculator: Count, Span and Board Feet', 'description' => 'Work out how many floor joists a floor needs, their board feet and the hangers, from the floor size, the joist spacing and the actual section. and the timber.', 'h1' => 'Floor joist', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Floor length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'Along the joists',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Floor width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Across the joists',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'spacing',
                    'label' => 'Joist spacing',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '16',
                    'help' => '12, 16 or 19.2 in centres',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'joist_depth',
                    'label' => 'Joist depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '9.25',
                    'help' => 'Actual 2 × 10 is 9¼',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'joist_width',
                    'label' => 'Joist width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '1.5',
                    'help' => 'Actual 2 × 10 is 1½',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Wastage',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Cutting and culling',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'joists',
                    'label' => 'Joists',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'linear_feet',
                    'label' => 'Joist linear feet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'board_feet',
                    'label' => 'Board feet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'bf',
                ],
                [
                    'name' => 'hangers',
                    'label' => 'Hangers',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Floor joist',
            'results' => [
                'joists' => 'ceil((width*12/spacing+1)*(1+waste/100))',
                'linear_feet' => 'ceil((width*12/spacing+1)*(1+waste/100))*length',
                'board_feet' => 'ceil((width*12/spacing+1)*(1+waste/100))*length*joist_depth*joist_width/12',
                'hangers' => 'ceil((width*12/spacing+1)*(1+waste/100))*2',
                'length' => 'linear_feet/joists',
                'width' => '(joists/(1+waste/100)-1)*spacing/12',
                'spacing' => 'width*12/(joists/(1+waste/100)-1)',
                'waste' => '(joists/(width*12/spacing+1)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Joists run at a fixed spacing across a floor: <strong>count = span in inches ÷ spacing + 1</strong>, times the waste, and the timber is that many joists times their length and section.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The joist count sets the deck, the subfloor and the hangers all at once, and it is the number the lumber yard asks for first. The spacing is a structural decision made elsewhere; the calculator's job is to turn it into a length of timber and a box of hardware.</p><p>The page reports <strong>joists and joist linear feet and board feet and hangers</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Joists</strong></td><td><code>ceil((Floor width × 12 ÷ Joist spacing+1) × (1+Wastage ÷ 100))</code></td></tr><tr><td><strong>Joist linear feet</strong></td><td><code>ceil((Floor width × 12 ÷ Joist spacing+1) × (1+Wastage ÷ 100)) × Floor length</code></td></tr><tr><td><strong>Board feet</strong></td><td><code>ceil((Floor width × 12 ÷ Joist spacing+1) × (1+Wastage ÷ 100)) × Floor length × Joist depth × Joist width ÷ 12</code></td></tr><tr><td><strong>Hangers</strong></td><td><code>ceil((Floor width × 12 ÷ Joist spacing+1) × (1+Wastage ÷ 100)) × 2</code></td></tr><tr><td><strong>Floor length</strong></td><td><code>Joist linear feet ÷ Joists</code></td></tr><tr><td><strong>Floor width</strong></td><td><code>(Joists ÷ (1+Wastage ÷ 100)-1) × Joist spacing ÷ 12</code></td></tr><tr><td><strong>Joist spacing</strong></td><td><code>Floor width × 12 ÷ (Joists ÷ (1+Wastage ÷ 100)-1)</code></td></tr><tr><td><strong>Wastage</strong></td><td><code>(Joists ÷ (Floor width × 12 ÷ Joist spacing+1)-1) × 100</code></td></tr></tbody></table><p><p>Spacing is measured from the face of the first joist, so a width divided by spacing gives the spaces and one more gives the joists. The hangers are two per joist because a floor joist is hung at both ends unless it bears on a wall.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports joists and joist linear feet and board feet and hangers.</p><ul><li><strong>Floor length</strong> — in ft. Along the joists</li><li><strong>Floor width</strong> — in ft. Across the joists</li><li><strong>Joist spacing</strong> — in in. 12, 16 or 19.2 in centres</li><li><strong>Joist depth</strong> — in in. Actual 2 × 10 is 9¼</li><li><strong>Joist width</strong> — in in. Actual 2 × 10 is 1½</li><li><strong>Wastage</strong> — in %. Cutting and culling</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Joists</strong></li><li><strong>Joist linear feet</strong> — in ft</li><li><strong>Board feet</strong> — in bf</li><li><strong>Hangers</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Floor length = 20 ft, Floor width = 12 ft, Joist spacing = 16 in, Joist depth = 9.25 in, Joist width = 1.5 in, Wastage = 10 % — and the results panel reads:</p><ul><li><strong>Joists</strong> = <code>ceil((Floor width × 12 ÷ Joist spacing+1) × (1+Wastage ÷ 100))</code> = <strong>11</strong></li><li><strong>Joist linear feet</strong> = <code>ceil((Floor width × 12 ÷ Joist spacing+1) × (1+Wastage ÷ 100)) × Floor length</code> = <strong>220 ft</strong></li><li><strong>Board feet</strong> = <code>ceil((Floor width × 12 ÷ Joist spacing+1) × (1+Wastage ÷ 100)) × Floor length × Joist depth × Joist width ÷ 12</code> = <strong>254.375 bf</strong></li><li><strong>Hangers</strong> = <code>ceil((Floor width × 12 ÷ Joist spacing+1) × (1+Wastage ÷ 100)) × 2</code> = <strong>22</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil((12 × 12 ÷ 16+1) × (1+10 ÷ 100)) = 11</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 20 × 12 ft floor on 16 in centres: 10 joists before waste, 11 with ten per cent, 220 linear feet and 254 board feet in 2 × 10, plus 22 hangers. The subfloor above it is nine sheets of 4 × 8 with ten per cent over.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the joist count against the width: one joist per 16 inches is about three quarters of a joist per foot. A count near one per foot means 12 in centres, which is what a heavy tile floor or a hot tub asks for.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Joists</th><th>Joist linear feet</th><th>Board feet</th><th>Hangers</th></tr></thead><tbody><tr><td><strong>Floor length</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Floor width</strong> +10 %</td><td>+9.09 %</td><td>+9.09 %</td><td>+9.09 %</td><td>+9.09 %</td></tr><tr><td><strong>Joist spacing</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Joist depth</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Joist width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Wastage</strong> +10 %</td><td>+9.09 %</td><td>+9.09 %</td><td>+9.09 %</td><td>+9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Joist width</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Joist spacing</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Floor length = 24, Floor width = 16, Joist spacing = 12, Joist depth = 11.25, Joist width = 1.5, Wastage = 10, the page reports <strong>Joists</strong> = 19, <strong>Joist linear feet</strong> = 456 ft, <strong>Board feet</strong> = 641.25 bf, <strong>Hangers</strong> = 38. A floor over a tiled area at 12 in centres in 2 × 12 — a stiff floor for stone.</li><li>With Floor length = 16, Floor width = 10, Joist spacing = 19.2, Joist depth = 7.25, Joist width = 1.5, Wastage = 5, the page reports <strong>Joists</strong> = 8, <strong>Joist linear feet</strong> = 128 ft, <strong>Board feet</strong> = 116 bf, <strong>Hangers</strong> = 16. A small floor on the 19.2 in module, which divides a 4 × 8 sheet evenly.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Spacing measured as gap.</strong> 16 in centres means 16 in from one joist to the next, not a 16 in gap between them.</li><li><strong>Waste left at zero.</strong> Joists are cut to length on site and the ends are never all good.</li><li><strong>Section guessed.</strong> Depth and width must be the actual dressed size for the board-foot figure to mean anything.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Joists, Joist linear feet (ft), Board feet (bf), Hangers.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Floor and joist lengths in feet, spacing and section in inches, the count in whole joists, hangers as a count of hardware, and the timber in board feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need floor length and floor width and joist spacing and joist depth and joist width and wastage. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Joists and joist linear feet and board feet and hangers should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Floor length</strong> ×10</td><td>11</td><td>11</td><td>unchanged</td></tr><tr><td><strong>Floor width</strong> ×10</td><td>11</td><td>101</td><td>×9.182</td></tr><tr><td><strong>Joist spacing</strong> ×10</td><td>11</td><td>3</td><td>×0.273</td></tr><tr><td><strong>Joist depth</strong> ×10</td><td>11</td><td>11</td><td>unchanged</td></tr><tr><td><strong>Joist width</strong> ×10</td><td>11</td><td>11</td><td>unchanged</td></tr><tr><td><strong>Wastage</strong> ×10</td><td>11</td><td>20</td><td>×1.818</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Count and quantity only.</strong> Whether a given depth spans the distance is a separate check.</li><li><strong>No bridging or blocking.</strong> Both are extra material.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering joists for a floor.</li></li><li><li>Counting hangers.</li></li><li><li>Converting a joist layout to board feet.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/framing">Framing</a> <a href="/construction/plywood">Plywood</a> <a href="/construction/wood-beam-span">Wood beam span</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Floor joist calculator work out?', 'a' => <<<'TXT'
            It returns joists and joist linear feet and board feet and hangers from floor length and floor width and joist spacing and joist depth and joist width and wastage. The relationship is ceil((Floor width × 12 ÷ Joist spacing+1) × (1+Wastage ÷ 100)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Floor length (ft), Floor width (ft), Joist spacing (in), Joist depth (in), Joist width (in), Wastage (%). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: floor length in ft; floor width in ft; joist spacing in in; joist depth in in; joist width in in; wastage in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many joists do I need for a 12 ft span?', 'a' => 'Ten at 16 in centres before waste — nine spaces plus the closing joist.'],
            ['q' => 'Does joist spacing change the board feet?', 'a' => 'Yes: going from 16 to 12 in centres adds a third more joists for the same floor.'],
        ],
        'related' => [
            ['path' => '/construction/framing', 'name' => 'Framing'],
            ['path' => '/construction/plywood', 'name' => 'Plywood'],
            ['path' => '/construction/wood-beam-span', 'name' => 'Wood beam span'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
