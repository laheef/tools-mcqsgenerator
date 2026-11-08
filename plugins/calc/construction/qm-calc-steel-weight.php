<?php

/**
 * Steel weight
 * /construction/steel-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Steel weight',
    'meta' => ['title' => 'Steel Weight Calculator: Round and Square Bar', 'description' => 'Work out the weight of a round or square steel bar from its size and length, in pounds and kilograms, at 490 pounds to the cubic foot. The formula is shown.', 'h1' => 'Steel weight', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'size',
                    'label' => 'Size',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '1',
                    'help' => 'Diameter or side',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'factor',
                    'label' => 'Section factor',
                    'type' => 'number',
                    'default' => '0.785',
                    'help' => '0.785 round, 1.000 square',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'One bar',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'count',
                    'label' => 'Bars',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Same size',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area_in2',
                    'label' => 'Section area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in²',
                ],
                [
                    'name' => 'weight_each',
                    'label' => 'Weight each',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'weight_total',
                    'label' => 'Total weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'weight_kg',
                    'label' => 'Total weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kg',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Steel weight',
            'results' => [
                'area_in2' => 'size*size*factor',
                'weight_each' => 'size*size*factor*length*12*0.2836',
                'weight_total' => 'size*size*factor*length*12*0.2836*count',
                'weight_kg' => 'size*size*factor*length*12*0.2836*count/2.20462',
                'size' => 'sqrt(area_in2/factor)',
                'factor' => 'area_in2/(size*size)',
                'length' => 'weight_each/(area_in2*12*0.2836)',
                'count' => 'weight_total/weight_each',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A bar is its section times its length: <strong>weight = size² × factor × length × 12 × 0.2836</strong>, with a factor of 0.785 for round stock and 1.000 for square.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Steel is bought by weight and worked by length, and the two only meet through the section. A bar's weight per foot is the number a fabricator knows off the book; this calculator derives it from first principles so any size can be checked.</p><p>The page reports <strong>section area and weight each and total weight (lb) and total weight (kg)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Section area</strong></td><td><code>Size × Size × Section factor</code></td></tr><tr><td><strong>Weight each</strong></td><td><code>Size × Size × Section factor × Length × 12 × 0.2836</code></td></tr><tr><td><strong>Total weight (lb)</strong></td><td><code>Size × Size × Section factor × Length × 12 × 0.2836 × Bars</code></td></tr><tr><td><strong>Total weight (kg)</strong></td><td><code>Size × Size × Section factor × Length × 12 × 0.2836 × Bars ÷ 2.20462</code></td></tr><tr><td><strong>Size</strong></td><td><code>√(Section area ÷ Section factor)</code></td></tr><tr><td><strong>Section factor</strong></td><td><code>Section area ÷ (Size × Size)</code></td></tr><tr><td><strong>Length</strong></td><td><code>Weight each ÷ (Section area × 12 × 0.2836)</code></td></tr><tr><td><strong>Bars</strong></td><td><code>Total weight (lb) ÷ Weight each</code></td></tr></tbody></table><p><p>Steel is 490 lb/ft³, which is 0.2836 lb per cubic inch — the constant that does all the work here. The section factor carries the shape, 0.785 for a round bar and 1.000 for square stock, and the length in feet goes in as inches.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports section area and weight each and total weight (lb) and total weight (kg).</p><ul><li><strong>Size</strong> — in in. Diameter or side</li><li><strong>Section factor</strong>. 0.785 round, 1.000 square</li><li><strong>Length</strong> — in ft. One bar</li><li><strong>Bars</strong>. Same size</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Section area</strong> — in in²</li><li><strong>Weight each</strong> — in lb</li><li><strong>Total weight</strong> — in lb</li><li><strong>Total weight</strong> — in kg</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Size = 1 in, Section factor = 0.785, Length = 20 ft, Bars = 1 — and the results panel reads:</p><ul><li><strong>Section area</strong> = <code>Size × Size × Section factor</code> = <strong>0.785 in²</strong></li><li><strong>Weight each</strong> = <code>Size × Size × Section factor × Length × 12 × 0.2836</code> = <strong>53.43 lb</strong></li><li><strong>Total weight</strong> = <code>Size × Size × Section factor × Length × 12 × 0.2836 × Bars</code> = <strong>53.43 lb</strong></li><li><strong>Total weight</strong> = <code>Size × Size × Section factor × Length × 12 × 0.2836 × Bars ÷ 2.20462</code> = <strong>24.236 kg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 × 1 × 0.785 = 0.785</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 1 in round bar 20 ft long has a section of 0.785 in² and weighs 53.43 lb — 53.43 lb for the bar, or 24.236 kg. The same size in square stock is heavier, because the square encloses more of the circle.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the weight each against a stock table: 1 in round bar is 2.67 lb/ft, so a 20 ft bar is about 53 lb. A result far from the book is usually a diameter entered as a radius.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Section area</th><th>Weight each</th><th>Total weight</th><th>Total weight</th></tr></thead><tbody><tr><td><strong>Size</strong> +10 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td></tr><tr><td><strong>Section factor</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Length</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Bars</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Size</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Length</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Size = 1.5, Section factor = 1, Length = 10, Bars = 4, the page reports <strong>Section area</strong> = 2.25 in², <strong>Weight each</strong> = 76.572 lb, <strong>Total weight</strong> = 306.288 lb, <strong>Total weight</strong> = 138.93 kg. Four short square bars: the count carries the total.</li><li>With Size = 0.5, Section factor = 0.785, Length = 20, Bars = 10, the page reports <strong>Section area</strong> = 0.196 in², <strong>Weight each</strong> = 13.358 lb, <strong>Total weight</strong> = 133.576 lb, <strong>Total weight</strong> = 60.589 kg. A bundle of small round bar, where the per-bar weight is under a pound a foot.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Diameter entered as radius.</strong> The volume comes out four times too small.</li><li><strong>Hollow sections.</strong> This assumes solid bar.</li><li><strong>Length in inches.</strong> It is feet, multiplied by twelve internally.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Section area (in²), Weight each (lb), Total weight (lb), Total weight (kg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Size in inches, length in feet, section in square inches, weight in pounds and kilograms, with the section factor as a plain number.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need size and section factor and length and bars. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Section area and weight each and total weight (lb) and total weight (kg) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Size</strong> ×10</td><td>0.785</td><td>78.5</td><td>×100</td></tr><tr><td><strong>Section factor</strong> ×10</td><td>0.785</td><td>7.85</td><td>ten times larger</td></tr><tr><td><strong>Length</strong> ×10</td><td>0.785</td><td>0.785</td><td>unchanged</td></tr><tr><td><strong>Bars</strong> ×10</td><td>0.785</td><td>0.785</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Solid sections only.</strong> Tube and angle need their own area.</li><li><strong>Plain carbon steel.</strong> Stainless is about three per cent heavier.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a delivery weight.</li></li><li><li>Sizing a lifting sling.</li></li><li><li>Estimating freight.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/steel-plate-weight">Steel plate weight</a> <a href="/construction/metal-weight">Metal weight</a> <a href="/construction/pipe-weight">Pipe weight</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Steel weight calculator work out?', 'a' => <<<'TXT'
            It returns section area and weight each and total weight (lb) and total weight (kg) from size and section factor and length and bars. The relationship is Size × Size × Section factor.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Size (in), Section factor, Length (ft), Bars. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: size in in; length in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does 1 inch round bar weigh per foot?', 'a' => 'About 2.67 lb/ft at 490 lb/ft³.'],
            ['q' => 'How do I work out steel weight?', 'a' => 'Volume in cubic inches times 0.2836 gives pounds.'],
        ],
        'related' => [
            ['path' => '/construction/steel-plate-weight', 'name' => 'Steel plate weight'],
            ['path' => '/construction/metal-weight', 'name' => 'Metal weight'],
            ['path' => '/construction/pipe-weight', 'name' => 'Pipe weight'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
