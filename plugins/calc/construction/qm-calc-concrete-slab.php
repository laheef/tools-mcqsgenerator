<?php

/**
 * Concrete slab
 * /construction/concrete-slab
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Concrete slab',
    'meta' => ['title' => 'Concrete Slab Calculator: Cubic Yards and Bags', 'description' => 'Turn a slab\'s length, width and thickness into cubic yards of ready-mix, and the number of 80 lb bags you would need if you mix it yourself. All shown.', 'h1' => 'Concrete slab', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Slab length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'The longer dimension',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Slab width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'The shorter dimension',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Slab thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'help' => 'Four inches for a path, five or six for a drive',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Over-order',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '5',
                    'help' => 'Five to ten per cent covers an uneven subgrade',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area',
                    'label' => 'Slab area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'volume_ft3',
                    'label' => 'Concrete volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'volume_yd3',
                    'label' => 'Concrete volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'bags_80lb',
                    'label' => 'Bags of 80 lb mix',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Concrete slab',
            'results' => [
                'area' => 'length*width',
                'volume_ft3' => 'length*width*thickness/12*(1+waste/100)',
                'volume_yd3' => 'length*width*thickness/12/27*(1+waste/100)',
                'bags_80lb' => 'ceil(length*width*thickness/12*(1+waste/100)/0.6)',
                'length' => 'area/width',
                'width' => 'area/length',
                'thickness' => 'volume_ft3*12/(length*width*(1+waste/100))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Concrete is ordered by the cubic yard: <strong>volume = length × width × thickness ÷ 27</strong>, with the thickness converted from inches to feet first. One 80 lb bag yields 0.6 ft³, so bags follow by division.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A slab is the most common concrete pour there is, and the two numbers that matter are the yardage to order and the bag count if you are mixing by hand. Getting the thickness into the same unit as the plan dimensions is where most of the errors happen.</p><p>The page reports <strong>slab area and concrete volume (ft³) and concrete volume (yd³) and bags of 80 lb mix</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Slab area</strong></td><td><code>Slab length × Slab width</code></td></tr><tr><td><strong>Concrete volume (ft³)</strong></td><td><code>Slab length × Slab width × Slab thickness ÷ 12 × (1+Over-order ÷ 100)</code></td></tr><tr><td><strong>Concrete volume (yd³)</strong></td><td><code>Slab length × Slab width × Slab thickness ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code></td></tr><tr><td><strong>Bags of 80 lb mix</strong></td><td><code>ceil(Slab length × Slab width × Slab thickness ÷ 12 × (1+Over-order ÷ 100) ÷ 0.6)</code></td></tr><tr><td><strong>Slab length</strong></td><td><code>Slab area ÷ Slab width</code></td></tr><tr><td><strong>Slab width</strong></td><td><code>Slab area ÷ Slab length</code></td></tr><tr><td><strong>Slab thickness</strong></td><td><code>Concrete volume (ft³) × 12 ÷ (Slab length × Slab width × (1+Over-order ÷ 100))</code></td></tr></tbody></table><p><p>Dividing the thickness by twelve puts it in feet, so length × width × thickness is cubic feet; dividing by 27 gives cubic yards, which is how ready-mix is sold. An 80 lb bag of premixed concrete fills 0.6 ft³ and a 60 lb bag 0.45 ft³.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports slab area and concrete volume (ft³) and concrete volume (yd³) and bags of 80 lb mix.</p><ul><li><strong>Slab length</strong> — in ft. The longer dimension</li><li><strong>Slab width</strong> — in ft. The shorter dimension</li><li><strong>Slab thickness</strong> — in in. Four inches for a path, five or six for a drive</li><li><strong>Over-order</strong> — in %. Five to ten per cent covers an uneven subgrade</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Slab area</strong> — in ft²</li><li><strong>Concrete volume</strong> — in ft³</li><li><strong>Concrete volume</strong> — in yd³</li><li><strong>Bags of 80 lb mix</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Slab length = 20 ft, Slab width = 10 ft, Slab thickness = 4 in, Over-order = 5 % — and the results panel reads:</p><ul><li><strong>Slab area</strong> = <code>Slab length × Slab width</code> = <strong>200 ft²</strong></li><li><strong>Concrete volume</strong> = <code>Slab length × Slab width × Slab thickness ÷ 12 × (1+Over-order ÷ 100)</code> = <strong>70 ft³</strong></li><li><strong>Concrete volume</strong> = <code>Slab length × Slab width × Slab thickness ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code> = <strong>2.593 yd³</strong></li><li><strong>Bags of 80 lb mix</strong> = <code>ceil(Slab length × Slab width × Slab thickness ÷ 12 × (1+Over-order ÷ 100) ÷ 0.6)</code> = <strong>117</strong></li></ul><p>With the numbers written into the formula, the first result is <code>20 × 10 = 200</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 20 × 10 ft patio at 4 in: 200 ft², 70.0 ft³ and 2.59 yd³ with five per cent over — order 2¾ yards — or 117 bags of 80 lb mix, which is why anyone pouring more than about a yard calls for a truck.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the yardage with the truck's minimum: most ready-mix suppliers charge a short-load fee below 3 to 5 yd³, so a small slab is often cheaper bagged. Above about 4 yd³ the truck wins on both price and consistency.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Slab area</th><th>Concrete volume</th><th>Concrete volume</th><th>Bags of 80 lb mix</th></tr></thead><tbody><tr><td><strong>Slab length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10.26 %</td></tr><tr><td><strong>Slab width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10.26 %</td></tr><tr><td><strong>Slab thickness</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10.26 %</td></tr><tr><td><strong>Over-order</strong> +10 %</td><td>+0 %</td><td>+0.48 %</td><td>+0.48 %</td><td>+0.85 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Slab length</strong>: a ten per cent move there shifts the result by about 10.3 per cent. The least sensitive is <strong>Over-order</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Slab length = 40, Slab width = 20, Slab thickness = 6, Over-order = 10, the page reports <strong>Slab area</strong> = 800 ft², <strong>Concrete volume</strong> = 440 ft³, <strong>Concrete volume</strong> = 16.296 yd³, <strong>Bags of 80 lb mix</strong> = 734. A 40 × 20 ft driveway at 6 in: 440 ft³, 16.3 yd³ with ten per cent — two trucks.</li><li>With Slab length = 8, Slab width = 4, Slab thickness = 4, Over-order = 5, the page reports <strong>Slab area</strong> = 32 ft², <strong>Concrete volume</strong> = 11.2 ft³, <strong>Concrete volume</strong> = 0.415 yd³, <strong>Bags of 80 lb mix</strong> = 19. A small walkway: 11.2 ft³, 0.41 yd³, or 19 bags — the case where bags make sense.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Thickness left in inches.</strong> Entering 4 where feet are expected gives a volume twelve times too small, and the error survives a sanity check because 2.47 yd³ looks reasonable.</li><li><strong>Subgrade not levelled.</strong> Over-excavation is why the over-order exists; five per cent on a slab on grade is not padding, it is the ruts.</li><li><strong>Bag yield confused between sizes.</strong> An 80 lb bag is 0.6 ft³ and a 60 lb bag 0.45 ft³; the two are not interchangeable.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Slab area (ft²), Concrete volume (ft³), Concrete volume (yd³), Bags of 80 lb mix.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Lengths in feet, thickness in inches, volume in cubic feet and cubic yards. The bag count is a whole number rounded up, because a part bag cannot be bought.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need slab length and slab width and slab thickness and over-order. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Slab area and concrete volume (ft³) and concrete volume (yd³) and bags of 80 lb mix should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Slab length</strong> ×10</td><td>200</td><td>2 000</td><td>ten times larger</td></tr><tr><td><strong>Slab width</strong> ×10</td><td>200</td><td>2 000</td><td>ten times larger</td></tr><tr><td><strong>Slab thickness</strong> ×10</td><td>200</td><td>200</td><td>unchanged</td></tr><tr><td><strong>Over-order</strong> ×10</td><td>200</td><td>200</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>No reinforcement.</strong> Mesh or rebar does not change the volume, but it does change the cover you need.</li><li><strong>Flat slabs only.</strong> Footings, steps and curved shapes need their own volumes.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering ready-mix for a patio or shed base.</li></li><li><li>Deciding between bags and a truck.</li></li><li><li>Checking a concrete quote.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/cubic-yard">Cubic yard</a> <a href="/construction/concrete-weight">Concrete weight</a> <a href="/construction/rebar">Rebar</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Concrete slab calculator work out?', 'a' => <<<'TXT'
            It returns slab area and concrete volume (ft³) and concrete volume (yd³) and bags of 80 lb mix from slab length and slab width and slab thickness and over-order. The relationship is Slab length × Slab width.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Slab length (ft), Slab width (ft), Slab thickness (in), Over-order (%). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: slab length in ft; slab width in ft; slab thickness in in; over-order in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many bags of concrete make a yard?', 'a' => '45 bags of 80 lb mix, or 60 bags of 60 lb mix, per cubic yard. Both round up, and both assume the stated yield.'],
            ['q' => 'How thick should a slab be?', 'a' => 'Four inches for a footpath or patio, five to six for a driveway carrying cars, and more with a proper base and reinforcement for anything heavier.'],
        ],
        'related' => [
            ['path' => '/construction/cubic-yard', 'name' => 'Cubic yard'],
            ['path' => '/construction/concrete-weight', 'name' => 'Concrete weight'],
            ['path' => '/construction/rebar', 'name' => 'Rebar'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
