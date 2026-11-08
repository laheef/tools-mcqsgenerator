<?php

/**
 * Concrete tube
 * /construction/concrete-tube
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Concrete tube',
    'meta' => ['title' => 'Concrete Tube Calculator: Footing Tubes in Bulk', 'description' => 'Size a run of cardboard footing tubes at once: concrete volume, 80 lb bags and the tube length to buy, for any number of piers of the same size. All shown.', 'h1' => 'Concrete tube', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'diameter',
                    'label' => 'Tube diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '10',
                    'help' => 'Inside diameter of the tube',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Pour depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '36',
                    'help' => 'The tube\'s buried length plus any above grade',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'count',
                    'label' => 'Number of tubes',
                    'type' => 'number',
                    'default' => '8',
                    'help' => 'Piers in the run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Over-order',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Tubes never fill exactly',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'concrete_each',
                    'label' => 'Concrete per tube',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'concrete_total',
                    'label' => 'Concrete, all tubes',
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
                [
                    'name' => 'tube_length',
                    'label' => 'Tube to buy',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Concrete tube',
            'results' => [
                'concrete_each' => 'pi*pow(diameter/24,2)*depth/12',
                'concrete_total' => 'pi*pow(diameter/24,2)*depth/12*count*(1+waste/100)/27',
                'bags_80lb' => 'ceil(pi*pow(diameter/24,2)*depth/12*count*(1+waste/100)/0.6)',
                'tube_length' => 'depth/12*count',
                'diameter' => '24*sqrt(concrete_each/(pi*depth/12))',
                'depth' => 'concrete_each*12/(pi*pow(diameter/24,2))',
                'count' => 'tube_length*12/depth',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Each tube is a cylinder, so a run of <strong>n</strong> piers of diameter <strong>d</strong> and depth <strong>h</strong> takes <strong>n·π·(d/24)²·h</strong> cubic feet of concrete, and <strong>n·π·d·h</strong> square inches of tube wall.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Deck and porch piers are usually a run of identical tubes, so the useful answer is the total: how many yards, how many bags, and how much tube to buy. The tube length is sold in eight-foot sections, which is what the last result is for.</p><p>The page reports <strong>concrete per tube and concrete, all tubes and bags of 80 lb mix and tube to buy</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Concrete per tube</strong></td><td><code>pi × (Tube diameter ÷ 24)^2 × Pour depth ÷ 12</code></td></tr><tr><td><strong>Concrete, all tubes</strong></td><td><code>pi × (Tube diameter ÷ 24)^2 × Pour depth ÷ 12 × Number of tubes × (1+Over-order ÷ 100) ÷ 27</code></td></tr><tr><td><strong>Bags of 80 lb mix</strong></td><td><code>ceil(pi × (Tube diameter ÷ 24)^2 × Pour depth ÷ 12 × Number of tubes × (1+Over-order ÷ 100) ÷ 0.6)</code></td></tr><tr><td><strong>Tube to buy</strong></td><td><code>Pour depth ÷ 12 × Number of tubes</code></td></tr><tr><td><strong>Tube diameter</strong></td><td><code>24 × √(Concrete per tube ÷ (pi × Pour depth ÷ 12))</code></td></tr><tr><td><strong>Pour depth</strong></td><td><code>Concrete per tube × 12 ÷ (pi × (Tube diameter ÷ 24)^2)</code></td></tr><tr><td><strong>Number of tubes</strong></td><td><code>Tube to buy × 12 ÷ Pour depth</code></td></tr></tbody></table><p><p>Both the diameter and the depth are converted to feet inside the formula, so the per-tube volume is direct. The tube length is simply the depth in feet times the count, before any cutting allowance.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports concrete per tube and concrete, all tubes and bags of 80 lb mix and tube to buy.</p><ul><li><strong>Tube diameter</strong> — in in. Inside diameter of the tube</li><li><strong>Pour depth</strong> — in in. The tube&#x27;s buried length plus any above grade</li><li><strong>Number of tubes</strong>. Piers in the run</li><li><strong>Over-order</strong> — in %. Tubes never fill exactly</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Concrete per tube</strong> — in ft³</li><li><strong>Concrete, all tubes</strong> — in yd³</li><li><strong>Bags of 80 lb mix</strong></li><li><strong>Tube to buy</strong> — in ft</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Tube diameter = 10 in, Pour depth = 36 in, Number of tubes = 8, Over-order = 10 % — and the results panel reads:</p><ul><li><strong>Concrete per tube</strong> = <code>pi × (Tube diameter ÷ 24)^2 × Pour depth ÷ 12</code> = <strong>1.636 ft³</strong></li><li><strong>Concrete, all tubes</strong> = <code>pi × (Tube diameter ÷ 24)^2 × Pour depth ÷ 12 × Number of tubes × (1+Over-order ÷ 100) ÷ 27</code> = <strong>0.533 yd³</strong></li><li><strong>Bags of 80 lb mix</strong> = <code>ceil(pi × (Tube diameter ÷ 24)^2 × Pour depth ÷ 12 × Number of tubes × (1+Over-order ÷ 100) ÷ 0.6)</code> = <strong>24</strong></li><li><strong>Tube to buy</strong> = <code>Pour depth ÷ 12 × Number of tubes</code> = <strong>24 ft</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pi × pow(10 ÷ 24,2) × 36 ÷ 12 = 1.636</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Eight 10 in tubes 36 in deep: each holds π × 0.174 × 3 = 1.64 ft³, so the run needs 13.1 ft³ — 0.53 yd³ with ten per cent, or 24 bags. The tube itself is 24 ft, three eight-foot sections.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the diameter against the load: a 10 in pier is generous for a deck, and 8 in is the usual minimum. The depth is what the frost line and the load decide, not the deck height.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Concrete per tube</th><th>Concrete, all tubes</th><th>Bags of 80 lb mix</th><th>Tube to buy</th></tr></thead><tbody><tr><td><strong>Tube diameter</strong> +10 %</td><td>+21 %</td><td>+21 %</td><td>+25 %</td><td>+0 %</td></tr><tr><td><strong>Pour depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+12.5 %</td><td>+10 %</td></tr><tr><td><strong>Number of tubes</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+12.5 %</td><td>+10 %</td></tr><tr><td><strong>Over-order</strong> +10 %</td><td>+0 %</td><td>+0.91 %</td><td>+4.17 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Tube diameter</strong>: a ten per cent move there shifts the result by about 25 per cent. The least sensitive is <strong>Over-order</strong>, at 4.2 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Tube diameter = 12, Pour depth = 48, Number of tubes = 12, Over-order = 10, the page reports <strong>Concrete per tube</strong> = 3.142 ft³, <strong>Concrete, all tubes</strong> = 1.536 yd³, <strong>Bags of 80 lb mix</strong> = 70, <strong>Tube to buy</strong> = 48 ft. Twelve 12 in piers four feet deep: 3.14 ft³ each, 1.54 yd³ to order and 70 bags.</li><li>With Tube diameter = 8, Pour depth = 24, Number of tubes = 4, Over-order = 5, the page reports <strong>Concrete per tube</strong> = 0.698 ft³, <strong>Concrete, all tubes</strong> = 0.109 yd³, <strong>Bags of 80 lb mix</strong> = 5, <strong>Tube to buy</strong> = 8 ft. Four small post holes: 0.73 ft³ each, 0.11 yd³ total, five bags.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Tube diameter used as the hole.</strong> The hole is dug wider than the tube; the concrete fills the tube, not the hole.</li><li><strong>Depth measured above grade only.</strong> The buried length is most of the volume.</li><li><strong>Waste set to zero.</strong> Cardboard tubes settle and bow, and a level cut never catches every pier.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Concrete per tube (ft³), Concrete, all tubes (yd³), Bags of 80 lb mix, Tube to buy (ft).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Diameter and depth are in inches, the cured volume in cubic feet and cubic yards, and the tube length in feet — the unit the supplier sells in.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need tube diameter and pour depth and number of tubes and over-order. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Concrete per tube and concrete, all tubes and bags of 80 lb mix and tube to buy should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Tube diameter</strong> ×10</td><td>1.636</td><td>163.625</td><td>×100</td></tr><tr><td><strong>Pour depth</strong> ×10</td><td>1.636</td><td>16.362</td><td>ten times larger</td></tr><tr><td><strong>Number of tubes</strong> ×10</td><td>1.636</td><td>1.636</td><td>unchanged</td></tr><tr><td><strong>Over-order</strong> ×10</td><td>1.636</td><td>1.636</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Round tubes only.</strong> Square footing forms need a different volume.</li><li><strong>No bell or flare.</strong> A flared footing base is a separate volume.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering tubes for a deck.</li></li><li><li>Buying concrete for a pier run.</li></li><li><li>Sizing a short-load delivery.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/sonotube">Sonotube</a> <a href="/construction/concrete-column">Concrete column</a> <a href="/construction/post-hole-concrete">Post hole concrete</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Concrete tube calculator work out?', 'a' => <<<'TXT'
            It returns concrete per tube and concrete, all tubes and bags of 80 lb mix and tube to buy from tube diameter and pour depth and number of tubes and over-order. The relationship is pi × (Tube diameter ÷ 24)^2 × Pour depth ÷ 12.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Tube diameter (in), Pour depth (in), Number of tubes, Over-order (%). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: tube diameter in in; pour depth in in; over-order in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What size tube do I need for a deck?', 'a' => 'Ten inches is the usual minimum for a deck pier, twelve for anything carrying a roof. The depth is set by the frost line and the soil.'],
            ['q' => 'Can I pour tubes with a bag mix?', 'a' => 'Yes, up to a point — 23 bags is manageable in an afternoon; 70 is not, and a short-load delivery becomes the cheaper route.'],
        ],
        'related' => [
            ['path' => '/construction/sonotube', 'name' => 'Sonotube'],
            ['path' => '/construction/concrete-column', 'name' => 'Concrete column'],
            ['path' => '/construction/post-hole-concrete', 'name' => 'Post hole concrete'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
