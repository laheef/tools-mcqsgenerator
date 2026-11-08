<?php

/**
 * Material removal rate
 * /construction/material-removal-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Material removal rate',
    'meta' => ['title' => 'Material Removal Rate Calculator: MRR for Milling', 'description' => 'Work out the cubic inches a milling cut removes per minute from the width and depth of cut and the feed rate, with the metric equivalent. Units shown.', 'h1' => 'Material removal rate', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'width_cut',
                    'label' => 'Width of cut',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.5',
                    'help' => 'Radial engagement',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth_cut',
                    'label' => 'Depth of cut',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.1',
                    'help' => 'Axial engagement',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'feed_rate',
                    'label' => 'Feed rate',
                    'type' => 'number',
                    'suffix' => 'in/min',
                    'default' => '20',
                    'help' => 'Table travel',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mrr',
                    'label' => 'Removal rate',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in³/min',
                ],
                [
                    'name' => 'mrr_cm3',
                    'label' => 'Removal rate',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm³/min',
                ],
                [
                    'name' => 'mrr_hour',
                    'label' => 'Removal per hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in³/h',
                ],
                [
                    'name' => 'time_per_in3',
                    'label' => 'Time per in³',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Material removal rate',
            'results' => [
                'mrr' => 'width_cut*depth_cut*feed_rate',
                'mrr_cm3' => 'width_cut*depth_cut*feed_rate*16.3871',
                'mrr_hour' => 'width_cut*depth_cut*feed_rate*60',
                'time_per_in3' => '1/(width_cut*depth_cut*feed_rate)',
                'width_cut' => 'mrr/(depth_cut*feed_rate)',
                'depth_cut' => 'mrr/(width_cut*feed_rate)',
                'feed_rate' => 'mrr/(width_cut*depth_cut)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>MRR = width of cut × depth of cut × feed rate</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The removal rate is the productivity number in a machine shop. Two cuts that produce the same finish can differ tenfold in cubic inches a minute, and the rate is what decides whether a job takes an hour or a day.</p><p>The page reports <strong>removal rate (in³/min) and removal rate (cm³/min) and removal per hour and time per in³</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Removal rate (in³ per min)</strong></td><td><code>Width of cut × Depth of cut × Feed rate</code></td></tr><tr><td><strong>Removal rate (cm³ per min)</strong></td><td><code>Width of cut × Depth of cut × Feed rate × 16.3871</code></td></tr><tr><td><strong>Removal per hour</strong></td><td><code>Width of cut × Depth of cut × Feed rate × 60</code></td></tr><tr><td><strong>Time per in³</strong></td><td><code>1 ÷ (Width of cut × Depth of cut × Feed rate)</code></td></tr><tr><td><strong>Width of cut</strong></td><td><code>Removal rate (in³ per min) ÷ (Depth of cut × Feed rate)</code></td></tr><tr><td><strong>Depth of cut</strong></td><td><code>Removal rate (in³ per min) ÷ (Width of cut × Feed rate)</code></td></tr><tr><td><strong>Feed rate</strong></td><td><code>Removal rate (in³ per min) ÷ (Width of cut × Depth of cut)</code></td></tr></tbody></table><p><p>The tool sweeps a rectangular channel, so the volume removed each minute is the width engaged times the depth times the distance travelled in that minute. Multiply by sixteen point three nine for cubic centimetres.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports removal rate (in³/min) and removal rate (cm³/min) and removal per hour and time per in³.</p><ul><li><strong>Width of cut</strong> — in in. Radial engagement</li><li><strong>Depth of cut</strong> — in in. Axial engagement</li><li><strong>Feed rate</strong> — in in/min. Table travel</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Removal rate</strong> — in in³/min</li><li><strong>Removal rate</strong> — in cm³/min</li><li><strong>Removal per hour</strong> — in in³/h</li><li><strong>Time per in³</strong> — in min</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Width of cut = 0.5 in, Depth of cut = 0.1 in, Feed rate = 20 in/min — and the results panel reads:</p><ul><li><strong>Removal rate</strong> = <code>Width of cut × Depth of cut × Feed rate</code> = <strong>1 in³/min</strong></li><li><strong>Removal rate</strong> = <code>Width of cut × Depth of cut × Feed rate × 16.3871</code> = <strong>16.387 cm³/min</strong></li><li><strong>Removal per hour</strong> = <code>Width of cut × Depth of cut × Feed rate × 60</code> = <strong>60 in³/h</strong></li><li><strong>Time per in³</strong> = <code>1 ÷ (Width of cut × Depth of cut × Feed rate)</code> = <strong>1 min</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.5 × 0.1 × 20 = 1</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 0.5 in wide cut 0.1 in deep at 20 in/min removes 1 in³/min — 16.387 cm³/min — which is 1 min of cutting for every cubic inch.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the rate against the spindle power: a horsepower removes roughly one cubic inch of steel a minute, three of aluminium. A rate well above that is asking for more power than the machine has.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Removal rate</th><th>Removal rate</th><th>Removal per hour</th><th>Time per in³</th></tr></thead><tbody><tr><td><strong>Width of cut</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Depth of cut</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Feed rate</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Width of cut</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Feed rate</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Width of cut = 2, Depth of cut = 0.25, Feed rate = 40, the page reports <strong>Removal rate</strong> = 20 in³/min, <strong>Removal rate</strong> = 327.742 cm³/min, <strong>Removal per hour</strong> = 1 200 in³/h, <strong>Time per in³</strong> = 0.05 min. A heavy roughing pass: ten times the removal.</li><li>With Width of cut = 0.25, Depth of cut = 0.02, Feed rate = 5, the page reports <strong>Removal rate</strong> = 0.025 in³/min, <strong>Removal rate</strong> = 0.41 cm³/min, <strong>Removal per hour</strong> = 1.5 in³/h, <strong>Time per in³</strong> = 40 min. A finishing pass: a small, precise cut.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Feed in inches per tooth.</strong> The form wants inches per minute.</li><li><strong>Depth entered in millimetres.</strong> Keep the units consistent.</li><li><strong>Rate read as power.</strong> The two relate, but they differ by material.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Removal rate (in³/min), Removal rate (cm³/min), Removal per hour (in³/h), Time per in³ (min).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Cut dimensions in inches, feed in inches per minute, removal in cubic inches and cubic centimetres per minute.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need width of cut and depth of cut and feed rate. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Removal rate (in³/min) and removal rate (cm³/min) and removal per hour and time per in³ should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Width of cut</strong> ×10</td><td>1</td><td>10</td><td>ten times larger</td></tr><tr><td><strong>Depth of cut</strong> ×10</td><td>1</td><td>10</td><td>ten times larger</td></tr><tr><td><strong>Feed rate</strong> ×10</td><td>1</td><td>10</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Full engagement.</strong> Partial cuts need the true engaged width.</li><li><strong>No tool life.</strong> Higher rates wear the edge faster.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Estimating machining time.</li></li><li><li>Comparing two roughing strategies.</li></li><li><li>Checking a cut against spindle power.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/spindle-speed">Spindle speed</a> <a href="/construction/k-factor">K-factor</a> <a href="/construction/punch-force">Punch force</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Material removal rate calculator work out?', 'a' => <<<'TXT'
            It returns removal rate (in³/min) and removal rate (cm³/min) and removal per hour and time per in³ from width of cut and depth of cut and feed rate. The relationship is Width of cut × Depth of cut × Feed rate.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Width of cut (in), Depth of cut (in), Feed rate (in/min). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: width of cut in in; depth of cut in in; feed rate in in/min. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How is material removal rate calculated?', 'a' => 'Width of cut times depth of cut times feed rate.'],
            ['q' => 'How much steel can one horsepower remove?', 'a' => 'Roughly a cubic inch a minute in mild steel.'],
        ],
        'related' => [
            ['path' => '/construction/spindle-speed', 'name' => 'Spindle speed'],
            ['path' => '/construction/k-factor', 'name' => 'K-factor'],
            ['path' => '/construction/punch-force', 'name' => 'Punch force'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
