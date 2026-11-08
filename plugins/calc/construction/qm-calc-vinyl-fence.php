<?php

/**
 * Vinyl fence
 * /construction/vinyl-fence
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vinyl fence',
    'meta' => ['title' => 'Vinyl Fence Calculator: Panels, Posts and Rails', 'description' => 'Work out vinyl fence panels, posts and rails for a run, then price them: panels at a price each and posts at their own rate. The formula and units are shown.', 'h1' => 'Vinyl fence', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Fence length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '100',
                    'help' => 'Straight run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Fence height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '6',
                    'help' => 'Panel height',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'panel_width',
                    'label' => 'Panel width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Nominal width of one panel',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'panel_price',
                    'label' => 'Panel price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '60',
                    'help' => 'Each panel',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'post_price',
                    'label' => 'Post price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '25',
                    'help' => 'Each post',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'panels',
                    'label' => 'Panels',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'posts',
                    'label' => 'Posts',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rails',
                    'label' => 'Rails',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Vinyl fence',
            'results' => [
                'panels' => 'ceil(length/panel_width)',
                'posts' => 'ceil(length/panel_width)+1',
                'rails' => 'ceil(length/panel_width)*2',
                'cost' => 'ceil(length/panel_width)*panel_price+(ceil(length/panel_width)+1)*post_price',
                'length' => 'panels*panel_width',
                'panel_width' => 'length/panels',
                'post_price' => '(cost-panels*panel_price)/(panels+1)',
                'panel_price' => '(cost-(panels+1)*post_price)/panels',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Panels = length ÷ panel width</strong>, <strong>posts = panels + 1</strong>, <strong>rails = panels × 2</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Vinyl fencing is sold as a kit of parts: a panel that drops between two posts, a top and bottom rail already in the panel, and posts bought separately. Because panels are rigid and fixed width, the count is a division rather than a measurement.</p><p>The page reports <strong>panels and posts and rails and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Panels</strong></td><td><code>ceil(Fence length ÷ Panel width)</code></td></tr><tr><td><strong>Posts</strong></td><td><code>ceil(Fence length ÷ Panel width)+1</code></td></tr><tr><td><strong>Rails</strong></td><td><code>ceil(Fence length ÷ Panel width) × 2</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(Fence length ÷ Panel width) × Panel price+(ceil(Fence length ÷ Panel width)+1) × Post price</code></td></tr><tr><td><strong>Fence length</strong></td><td><code>Panels × Panel width</code></td></tr><tr><td><strong>Panel width</strong></td><td><code>Fence length ÷ Panels</code></td></tr><tr><td><strong>Post price</strong></td><td><code>(Cost-Panels × Panel price) ÷ (Panels+1)</code></td></tr><tr><td><strong>Panel price</strong></td><td><code>(Cost-(Panels+1) × Post price) ÷ Panels</code></td></tr></tbody></table><p><p>The run divided by the panel width gives the panels, rounded up because a partial panel is still a panel. Posts are one more than panels, since both ends need one, and each panel brings two rails.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports panels and posts and rails and cost.</p><ul><li><strong>Fence length</strong> — in ft. Straight run</li><li><strong>Fence height</strong> — in ft. Panel height</li><li><strong>Panel width</strong> — in ft. Nominal width of one panel</li><li><strong>Panel price</strong> — in $. Each panel</li><li><strong>Post price</strong> — in $. Each post</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Panels</strong></li><li><strong>Posts</strong></li><li><strong>Rails</strong></li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Fence length = 100 ft, Fence height = 6 ft, Panel width = 8 ft, Panel price = 60 $, Post price = 25 $ — and the results panel reads:</p><ul><li><strong>Panels</strong> = <code>ceil(Fence length ÷ Panel width)</code> = <strong>13</strong></li><li><strong>Posts</strong> = <code>ceil(Fence length ÷ Panel width)+1</code> = <strong>14</strong></li><li><strong>Rails</strong> = <code>ceil(Fence length ÷ Panel width) × 2</code> = <strong>26</strong></li><li><strong>Cost</strong> = <code>ceil(Fence length ÷ Panel width) × Panel price+(ceil(Fence length ÷ Panel width)+1) × Post price</code> = <strong>1 130 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(100 ÷ 8) = 13</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>104 ft of 6 ft fence in 8 ft panels is 13 panels, 14 posts and 26 rails, which comes to 1 130 at the prices on the form.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the panels against the run: a nominal eight foot panel rarely leaves a remainder of more than a foot, so the panel count should be within one of the run divided by eight. More than that means the panel width is not what you think.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Panels</th><th>Posts</th><th>Rails</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Fence length</strong> +10 %</td><td>+15.38 %</td><td>+14.29 %</td><td>+15.38 %</td><td>+15.04 %</td></tr><tr><td><strong>Fence height</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Panel width</strong> +10 %</td><td>−7.69 %</td><td>−7.14 %</td><td>−7.69 %</td><td>−7.52 %</td></tr><tr><td><strong>Panel price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+6.9 %</td></tr><tr><td><strong>Post price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+3.1 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Fence length</strong>: a ten per cent move there shifts the result by about 15.4 per cent. The least sensitive is <strong>Fence height</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Fence length = 96, Panel width = 6, the page reports <strong>Panels</strong> = 16, <strong>Posts</strong> = 17, <strong>Rails</strong> = 32, <strong>Cost</strong> = 1 385 $. Six foot panels divide a short run evenly.</li><li>With Fence length = 150, Panel width = 8, Post price = 35, the page reports <strong>Panels</strong> = 19, <strong>Posts</strong> = 20, <strong>Rails</strong> = 38, <strong>Cost</strong> = 1 840 $. A long run with heavier posts.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Panels assumed to include posts.</strong> They do not.</li><li><strong>Partial panels ignored.</strong> A run is rounded up.</li><li><strong>Slopes.</strong> Racked panels cost more than stepped ones.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Panels, Posts, Rails, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Run and panel width in feet, panel and post prices each.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need fence length and fence height and panel width and panel price and post price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Panels and posts and rails and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Fence length</strong> ×10</td><td>13</td><td>130</td><td>ten times larger</td></tr><tr><td><strong>Fence height</strong> ×10</td><td>13</td><td>13</td><td>unchanged</td></tr><tr><td><strong>Panel width</strong> ×10</td><td>13</td><td>2</td><td>×0.154</td></tr><tr><td><strong>Panel price</strong> ×10</td><td>13</td><td>13</td><td>unchanged</td></tr><tr><td><strong>Post price</strong> ×10</td><td>13</td><td>13</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Straight runs.</strong> Corners add a post and often a bracket.</li><li><strong>No gates.</strong> A gate kit is priced separately.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Pricing a vinyl fence run.</li></li><li><li>Comparing panel widths.</li></li><li><li>Checking a kit's post count.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/vinyl-fence-cost">Vinyl fence cost</a> <a href="/construction/fence">Fence</a> <a href="/construction/vinyl-siding">Vinyl siding</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Vinyl fence calculator work out?', 'a' => <<<'TXT'
            It returns panels and posts and rails and cost from fence length and fence height and panel width and panel price and post price. The relationship is ceil(Fence length ÷ Panel width).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Fence length (ft), Fence height (ft), Panel width (ft), Panel price ($), Post price ($). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: fence length in ft; fence height in ft; panel width in ft; panel price in $; post price in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many posts for a vinyl fence?', 'a' => 'One more than the number of panels, so both ends are closed.'],
            ['q' => 'Do vinyl panels come with posts?', 'a' => 'No — panels and posts are sold separately, which is why both prices are here.'],
        ],
        'related' => [
            ['path' => '/construction/vinyl-fence-cost', 'name' => 'Vinyl fence cost'],
            ['path' => '/construction/fence', 'name' => 'Fence'],
            ['path' => '/construction/vinyl-siding', 'name' => 'Vinyl siding'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
