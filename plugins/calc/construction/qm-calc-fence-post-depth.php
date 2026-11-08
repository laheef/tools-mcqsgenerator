<?php

/**
 * Fence post depth
 * /construction/fence-post-depth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fence post depth',
    'meta' => ['title' => 'Fence Post Depth Calculator: Footing and Concrete', 'description' => 'Find how deep a fence post should sit from the frost line and the rule of thirds, plus the hole depth and the bags of concrete it takes. See the steps.', 'h1' => 'Fence post depth', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'above_grade',
                    'label' => 'Post above ground',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '6',
                    'help' => 'Finished fence height',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'frost_depth',
                    'label' => 'Frost depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '36',
                    'help' => 'Your local frost line',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'embed_ratio',
                    'label' => 'Embed ratio',
                    'type' => 'number',
                    'default' => '0.33',
                    'help' => 'A third of the height as a rule',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hole_diameter',
                    'label' => 'Hole diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '10',
                    'help' => 'Wider than the post',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gravel_base',
                    'label' => 'Gravel base',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'Drainage under the post',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'below_grade',
                    'label' => 'Below grade',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'post_length',
                    'label' => 'Post length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'hole_depth',
                    'label' => 'Hole depth',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'concrete_ft3',
                    'label' => 'Concrete',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'bags',
                    'label' => 'Bags of 80 lb',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Fence post depth',
            'results' => [
                'below_grade' => 'max(frost_depth, above_grade*12*embed_ratio)',
                'post_length' => 'above_grade*12+max(frost_depth, above_grade*12*embed_ratio)',
                'hole_depth' => 'max(frost_depth, above_grade*12*embed_ratio)+gravel_base',
                'concrete_ft3' => '3.14159265/4*pow(hole_diameter,2)*(max(frost_depth, above_grade*12*embed_ratio)+gravel_base)/1728',
                'bags' => 'ceil(3.14159265/4*pow(hole_diameter,2)*(max(frost_depth, above_grade*12*embed_ratio)+gravel_base)/1728/0.6)',
                'above_grade' => '(post_length-below_grade)/12',
                'frost_depth' => 'below_grade',
                'embed_ratio' => 'below_grade/(above_grade*12)',
                'gravel_base' => 'hole_depth-below_grade',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Depth below grade = the larger of the frost line and a third of the height above ground</strong>; the hole adds a gravel base.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A fence post fails at the bottom, not the top. Two rules decide how far down it goes: it must sit below the frost line so the ground cannot lift it, and it should be buried about a third of its exposed height so the lever arm of a leaning fence does not pull it over.</p><p>The page reports <strong>below grade and post length and hole depth and concrete and bags of 80 lb</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Below grade</strong></td><td><code>max(Frost depth, Post above ground × 12 × Embed ratio)</code></td></tr><tr><td><strong>Post length</strong></td><td><code>Post above ground × 12+max(Frost depth, Post above ground × 12 × Embed ratio)</code></td></tr><tr><td><strong>Hole depth</strong></td><td><code>max(Frost depth, Post above ground × 12 × Embed ratio)+Gravel base</code></td></tr><tr><td><strong>Concrete</strong></td><td><code>3.14159265 ÷ 4 × (Hole diameter)^2 × (max(Frost depth, Post above ground × 12 × Embed ratio)+Gravel base) ÷ 1728</code></td></tr><tr><td><strong>Bags of 80 lb</strong></td><td><code>ceil(3.14159265 ÷ 4 × (Hole diameter)^2 × (max(Frost depth, Post above ground × 12 × Embed ratio)+Gravel base) ÷ 1728 ÷ 0.6)</code></td></tr><tr><td><strong>Post above ground</strong></td><td><code>(Post length-Below grade) ÷ 12</code></td></tr><tr><td><strong>Frost depth</strong></td><td><code>Below grade</code></td></tr><tr><td><strong>Embed ratio</strong></td><td><code>Below grade ÷ (Post above ground × 12)</code></td></tr><tr><td><strong>Gravel base</strong></td><td><code>Hole depth-Below grade</code></td></tr></tbody></table><p><p>The form takes the larger of the two rules, so a mild climate still gets the one third depth and a cold one gets the frost depth. Six inches of gravel at the bottom keeps water off the post and are added to the hole but not to the post.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports below grade and post length and hole depth and concrete and bags of 80 lb.</p><ul><li><strong>Post above ground</strong> — in ft. Finished fence height</li><li><strong>Frost depth</strong> — in in. Your local frost line</li><li><strong>Embed ratio</strong>. A third of the height as a rule</li><li><strong>Hole diameter</strong> — in in. Wider than the post</li><li><strong>Gravel base</strong> — in in. Drainage under the post</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Below grade</strong> — in in</li><li><strong>Post length</strong> — in in</li><li><strong>Hole depth</strong> — in in</li><li><strong>Concrete</strong> — in ft³</li><li><strong>Bags of 80 lb</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Post above ground = 6 ft, Frost depth = 36 in, Embed ratio = 0.33, Hole diameter = 10 in, Gravel base = 6 in — and the results panel reads:</p><ul><li><strong>Below grade</strong> = <code>max(Frost depth, Post above ground × 12 × Embed ratio)</code> = <strong>36 in</strong></li><li><strong>Post length</strong> = <code>Post above ground × 12+max(Frost depth, Post above ground × 12 × Embed ratio)</code> = <strong>108 in</strong></li><li><strong>Hole depth</strong> = <code>max(Frost depth, Post above ground × 12 × Embed ratio)+Gravel base</code> = <strong>42 in</strong></li><li><strong>Concrete</strong> = <code>3.14159265 ÷ 4 × (Hole diameter)^2 × (max(Frost depth, Post above ground × 12 × Embed ratio)+Gravel base) ÷ 1728</code> = <strong>1.909 ft³</strong></li><li><strong>Bags of 80 lb</strong> = <code>ceil(3.14159265 ÷ 4 × (Hole diameter)^2 × (max(Frost depth, Post above ground × 12 × Embed ratio)+Gravel base) ÷ 1728 ÷ 0.6)</code> = <strong>4</strong></li></ul><p>With the numbers written into the formula, the first result is <code>max(36, 6 × 12 × 0.33) = 36</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 6 ft post in a 36 in frost line sits 36 in below grade, so it needs a 108 in post in a 42 in hole holding 1.909 ft³ of concrete — 4 bags.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the post length against twice the height above ground: a post of about half as much again as the fence is tall is normal. A post barely longer than the fence means the embed ratio has been set too low for a windy site.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Below grade</th><th>Post length</th><th>Hole depth</th><th>Concrete</th><th>Bags of 80 lb</th></tr></thead><tbody><tr><td><strong>Post above ground</strong> +10 %</td><td>+0 %</td><td>+6.67 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Frost depth</strong> +10 %</td><td>+10 %</td><td>+3.33 %</td><td>+8.57 %</td><td>+8.57 %</td><td>+0 %</td></tr><tr><td><strong>Embed ratio</strong> +10 %</td><td>+10 %</td><td>+3.33 %</td><td>+8.57 %</td><td>+8.57 %</td><td>+0 %</td></tr><tr><td><strong>Hole diameter</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+21 %</td><td>+0 %</td></tr><tr><td><strong>Gravel base</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+1.43 %</td><td>+1.43 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Hole diameter</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Gravel base</strong>, at 1.4 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Frost depth = 48, Post above ground = 6, the page reports <strong>Below grade</strong> = 48 in, <strong>Post length</strong> = 120 in, <strong>Hole depth</strong> = 54 in, <strong>Concrete</strong> = 2.454 ft³, <strong>Bags of 80 lb</strong> = 5. A cold climate: the frost line governs and the post gets long.</li><li>With Frost depth = 12, Post above ground = 8, the page reports <strong>Below grade</strong> = 31.68 in, <strong>Post length</strong> = 127.68 in, <strong>Hole depth</strong> = 37.68 in, <strong>Concrete</strong> = 1.713 ft³, <strong>Bags of 80 lb</strong> = 3. A mild climate and a tall fence: the rule of thirds governs.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Frost line ignored.</strong> Frost heave lifts shallow posts.</li><li><strong>Gravel left out.</strong> Water sits against the post and rots it.</li><li><strong>Concrete poured dry and unmixed.</strong> It sets weak.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Below grade (in), Post length (in), Hole depth (in), Concrete (ft³), Bags of 80 lb.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Height above ground in feet, depth and hole dimensions in inches, concrete in cubic feet and eighty pound bags.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need post above ground and frost depth and embed ratio and hole diameter and gravel base. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Below grade and post length and hole depth and concrete and bags of 80 lb should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Post above ground</strong> ×10</td><td>36</td><td>237.6</td><td>×6.6</td></tr><tr><td><strong>Frost depth</strong> ×10</td><td>36</td><td>360</td><td>ten times larger</td></tr><tr><td><strong>Embed ratio</strong> ×10</td><td>36</td><td>360</td><td>ten times larger</td></tr><tr><td><strong>Hole diameter</strong> ×10</td><td>36</td><td>36</td><td>unchanged</td></tr><tr><td><strong>Gravel base</strong> ×10</td><td>36</td><td>36</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Soil posts only.</strong> Rock, sand and fill behave differently.</li><li><strong>No wind load.</strong> A gate post needs more depth and a bigger hole.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing posts before the dig.</li></li><li><li>Checking a contractor's footing depth.</li></li><li><li>Ordering concrete for a run of posts.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/post-hole-concrete">Post hole concrete</a> <a href="/construction/fence-estimate">Fence estimate</a> <a href="/construction/fence">Fence</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fence post depth calculator work out?', 'a' => <<<'TXT'
            It returns below grade and post length and hole depth and concrete and bags of 80 lb from post above ground and frost depth and embed ratio and hole diameter and gravel base. The relationship is max(Frost depth, Post above ground × 12 × Embed ratio).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Post above ground (ft), Frost depth (in), Embed ratio, Hole diameter (in), Gravel base (in). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: post above ground in ft; frost depth in in; hole diameter in in; gravel base in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How deep should a fence post be?', 'a' => 'Below the local frost line, and never less than a third of the height above ground.'],
            ['q' => 'How much concrete for one post?', 'a' => 'About a cubic foot and a half for a ten inch hole three feet deep, so two bags.'],
        ],
        'related' => [
            ['path' => '/construction/post-hole-concrete', 'name' => 'Post hole concrete'],
            ['path' => '/construction/fence-estimate', 'name' => 'Fence estimate'],
            ['path' => '/construction/fence', 'name' => 'Fence'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
