<?php

/**
 * Crushed stone
 * /construction/crushed-stone
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Crushed stone',
    'meta' => ['title' => 'Crushed Stone Calculator: Tons for a Base Course', 'description' => 'Size a crushed stone base course in tons and yards, with the compaction factor that turns loose stone into the finished layer the detail asks for. All shown.', 'h1' => 'Crushed stone', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Area length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '40',
                    'help' => 'Along the base',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Area width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Across it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Compacted depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'help' => 'The finished thickness',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'compaction',
                    'label' => 'Compaction',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '20',
                    'help' => 'Twenty per cent is typical for crushed stone',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Loose density',
                    'type' => 'number',
                    'suffix' => 'tons/yd³',
                    'default' => '1.4',
                    'help' => '1.4 for ¾ in crushed stone',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'loose_volume',
                    'label' => 'Loose stone volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'compacted_volume',
                    'label' => 'Compacted volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'tons',
                    'label' => 'Stone to order',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'tons',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Crushed stone',
            'results' => [
                'area' => 'length*width',
                'loose_volume' => 'length*width*depth/12/27/(1-compaction/100)',
                'compacted_volume' => 'length*width*depth/12/27',
                'tons' => 'length*width*depth/12/27/(1-compaction/100)*density',
                'length' => 'area/width',
                'width' => 'area/length',
                'depth' => 'compacted_volume*27*12/(length*width)',
                'compaction' => '(1-compacted_volume/loose_volume)*100',
                'density' => 'tons/loose_volume',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A compacted base is thinner than the loose stone that makes it. For a finished depth <strong>d</strong>, the loose volume is <strong>d ÷ (1 − compaction)</strong> — typically 20 to 25 per cent more stone goes in than the finished layer measures.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A crushed stone base is what stops a driveway failing, and it is ordered by the ton before it is compacted. The gap between loose and compacted volume is the single number that makes a base course come out at the depth the detail asks for.</p><p>The page reports <strong>area and loose stone volume and compacted volume and stone to order</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area</strong></td><td><code>Area length × Area width</code></td></tr><tr><td><strong>Loose stone volume</strong></td><td><code>Area length × Area width × Compacted depth ÷ 12 ÷ 27 ÷ (1-Compaction ÷ 100)</code></td></tr><tr><td><strong>Compacted volume</strong></td><td><code>Area length × Area width × Compacted depth ÷ 12 ÷ 27</code></td></tr><tr><td><strong>Stone to order</strong></td><td><code>Area length × Area width × Compacted depth ÷ 12 ÷ 27 ÷ (1-Compaction ÷ 100) × Loose density</code></td></tr><tr><td><strong>Area length</strong></td><td><code>Area ÷ Area width</code></td></tr><tr><td><strong>Area width</strong></td><td><code>Area ÷ Area length</code></td></tr><tr><td><strong>Compacted depth</strong></td><td><code>Compacted volume × 27 × 12 ÷ (Area length × Area width)</code></td></tr><tr><td><strong>Compaction</strong></td><td><code>(1-Compacted volume ÷ Loose stone volume) × 100</code></td></tr><tr><td><strong>Loose density</strong></td><td><code>Stone to order ÷ Loose stone volume</code></td></tr></tbody></table><p><p>Dividing the finished volume by one minus the compaction fraction gives the loose volume that will compact to it. Twenty per cent is a fair figure for ¾ in crushed stone placed in two lifts and rolled.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports area and loose stone volume and compacted volume and stone to order.</p><ul><li><strong>Area length</strong> — in ft. Along the base</li><li><strong>Area width</strong> — in ft. Across it</li><li><strong>Compacted depth</strong> — in in. The finished thickness</li><li><strong>Compaction</strong> — in %. Twenty per cent is typical for crushed stone</li><li><strong>Loose density</strong> — in tons/yd³. 1.4 for ¾ in crushed stone</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in ft²</li><li><strong>Loose stone volume</strong> — in yd³</li><li><strong>Compacted volume</strong> — in yd³</li><li><strong>Stone to order</strong> — in tons</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Area length = 40 ft, Area width = 12 ft, Compacted depth = 4 in, Compaction = 20 %, Loose density = 1.4 tons/yd³ — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Area length × Area width</code> = <strong>480 ft²</strong></li><li><strong>Loose stone volume</strong> = <code>Area length × Area width × Compacted depth ÷ 12 ÷ 27 ÷ (1-Compaction ÷ 100)</code> = <strong>7.407 yd³</strong></li><li><strong>Compacted volume</strong> = <code>Area length × Area width × Compacted depth ÷ 12 ÷ 27</code> = <strong>5.926 yd³</strong></li><li><strong>Stone to order</strong> = <code>Area length × Area width × Compacted depth ÷ 12 ÷ 27 ÷ (1-Compaction ÷ 100) × Loose density</code> = <strong>10.37 tons</strong></li></ul><p>With the numbers written into the formula, the first result is <code>40 × 12 = 480</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 40 × 12 ft drive with a four-inch compacted base: 480 ft², 5.9 yd³ compacted, so 7.4 yd³ loose and 10.4 tons at 1.4 tons/yd³ — the base costs as much stone as the surface course.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the depth against the traffic: four inches compacted is a light driveway, six for cars over soft subgrade, and eight to twelve for a road. Compaction matters more than thickness past a point.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Loose stone volume</th><th>Compacted volume</th><th>Stone to order</th></tr></thead><tbody><tr><td><strong>Area length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Area width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Compacted depth</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Compaction</strong> +10 %</td><td>+0 %</td><td>+2.56 %</td><td>+0 %</td><td>+2.56 %</td></tr><tr><td><strong>Loose density</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Loose density</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Compaction</strong>, at 2.6 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Area length = 20, Area width = 10, Compacted depth = 4, Compaction = 25, Loose density = 1.45, the page reports <strong>Area</strong> = 200 ft², <strong>Loose stone volume</strong> = 3.292 yd³, <strong>Compacted volume</strong> = 2.469 yd³, <strong>Stone to order</strong> = 4.774 tons. A small pad with a hard-compacting stone: 2.47 yd³ finished, 3.29 loose, 4.8 tons.</li><li>With Area length = 100, Area width = 20, Compacted depth = 6, Compaction = 20, Loose density = 1.4, the page reports <strong>Area</strong> = 2 000 ft², <strong>Loose stone volume</strong> = 46.296 yd³, <strong>Compacted volume</strong> = 37.037 yd³, <strong>Stone to order</strong> = 64.815 tons. A long drive: 37 yd³ finished, 46 yd³ loose and 65 tons — four deliveries.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Loose depth specified as finished depth.</strong> The base comes out 20 per cent thin and fails within a season.</li><li><strong>Compaction assumed for a single lift.</strong> Six inches compacted is placed in two lifts, and rolling each one is what delivers the number.</li><li><strong>Density of the finished layer used.</strong> The box wants the loose density you are ordering, not the compacted density.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (ft²), Loose stone volume (yd³), Compacted volume (yd³), Stone to order (tons).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Area in feet, depth in inches, volumes in cubic yards and weight in short tons. The compaction percentage is a plain number applied to the volume before the density.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need area length and area width and compacted depth and compaction and loose density. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Area and loose stone volume and compacted volume and stone to order should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Area length</strong> ×10</td><td>480</td><td>4 800</td><td>ten times larger</td></tr><tr><td><strong>Area width</strong> ×10</td><td>480</td><td>4 800</td><td>ten times larger</td></tr><tr><td><strong>Compacted depth</strong> ×10</td><td>480</td><td>480</td><td>unchanged</td></tr><tr><td><strong>Compaction</strong> ×10</td><td>480</td><td>480</td><td>unchanged</td></tr><tr><td><strong>Loose density</strong> ×10</td><td>480</td><td>480</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One layer.</strong> A geotextile and a sub-base are separate items.</li><li><strong>Typical compaction only.</strong> The real figure depends on the stone's grading and the roller.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering a driveway base course.</li></li><li><li>Checking a contractor's tonnage.</li></li><li><li>Working out how much a lift will shrink.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/gravel">Gravel</a> <a href="/construction/road-base">Road base</a> <a href="/construction/cubic-yard">Cubic yard</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Crushed stone calculator work out?', 'a' => <<<'TXT'
            It returns area and loose stone volume and compacted volume and stone to order from area length and area width and compacted depth and compaction and loose density. The relationship is Area length × Area width.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Area length (ft), Area width (ft), Compacted depth (in), Compaction (%), Loose density (tons/yd³). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: area length in ft; area width in ft; compacted depth in in; compaction in %; loose density in tons/yd³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does a yard of crushed stone weigh?', 'a' => 'About 1.4 tons loose for ¾ in stone, and 1.5 for larger or wetter stone.'],
            ['q' => 'How much does stone compact?', 'a' => 'Twenty to twenty-five per cent for a well-graded crushed stone placed and rolled in lifts.'],
        ],
        'related' => [
            ['path' => '/construction/gravel', 'name' => 'Gravel'],
            ['path' => '/construction/road-base', 'name' => 'Road base'],
            ['path' => '/construction/cubic-yard', 'name' => 'Cubic yard'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
