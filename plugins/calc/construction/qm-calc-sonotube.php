<?php

/**
 * Sonotube
 * /construction/sonotube
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sonotube',
    'meta' => ['title' => 'Sonotube Calculator: One Pier and Its Concrete', 'description' => 'Size one cardboard pier tube: the concrete it holds, the 80 lb bags it needs and the tube surface you will be buying for the pour itself. Units shown.', 'h1' => 'Sonotube', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'diameter',
                    'label' => 'Tube diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => '8, 10, 12 or 16 in are the common sizes',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Tube height above the base',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '4',
                    'help' => 'The full length of tube you fill',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Over-order',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Settlement and an uneven hole',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_ft3',
                    'label' => 'Concrete per tube',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'volume_yd3',
                    'label' => 'Concrete per tube',
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
                    'name' => 'tube_area',
                    'label' => 'Tube surface area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Sonotube',
            'results' => [
                'volume_ft3' => 'pi*pow(diameter/24,2)*height',
                'volume_yd3' => 'pi*pow(diameter/24,2)*height*(1+waste/100)/27',
                'bags_80lb' => 'ceil(pi*pow(diameter/24,2)*height*(1+waste/100)/0.6-0.000000001)',
                'tube_area' => 'pi*diameter/12*height',
                'diameter' => '24*sqrt(volume_ft3/(pi*height))',
                'height' => 'volume_ft3/(pi*pow(diameter/24,2))',
                'waste' => '(volume_yd3*27/(pi*pow(diameter/24,2)*height)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A Sonotube takes the volume of a cylinder: <strong>π·(d/24)²·h</strong> cubic feet for a diameter <strong>d</strong> inches and height <strong>h</strong> feet. That divides by 0.6 to give 80 lb bags.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Sonotubes are how a deck or a fence line gets its concrete piers without a carpenter-built form. One tube's volume decides the bags you carry to the hole, and the surface area tells you how much tube to buy.</p><p>The page reports <strong>concrete per tube (ft³) and concrete per tube (yd³) and bags of 80 lb mix and tube surface area</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Concrete per tube (ft³)</strong></td><td><code>pi × (Tube diameter ÷ 24)^2 × Tube height above the base</code></td></tr><tr><td><strong>Concrete per tube (yd³)</strong></td><td><code>pi × (Tube diameter ÷ 24)^2 × Tube height above the base × (1+Over-order ÷ 100) ÷ 27</code></td></tr><tr><td><strong>Bags of 80 lb mix</strong></td><td><code>ceil(pi × (Tube diameter ÷ 24)^2 × Tube height above the base × (1+Over-order ÷ 100) ÷ 0.6-0.000000001)</code></td></tr><tr><td><strong>Tube surface area</strong></td><td><code>pi × Tube diameter ÷ 12 × Tube height above the base</code></td></tr><tr><td><strong>Tube diameter</strong></td><td><code>24 × √(Concrete per tube (ft³) ÷ (pi × Tube height above the base))</code></td></tr><tr><td><strong>Tube height above the base</strong></td><td><code>Concrete per tube (ft³) ÷ (pi × (Tube diameter ÷ 24)^2)</code></td></tr><tr><td><strong>Over-order</strong></td><td><code>(Concrete per tube (yd³) × 27 ÷ (pi × (Tube diameter ÷ 24)^2 × Tube height above the base)-1) × 100</code></td></tr></tbody></table><p><p>The 24 converts diameter in inches to radius in feet. The surface area is the circumference in feet times the height — the actual card you wrap around the pour, which matters when the tube is cut from stock.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports concrete per tube (ft³) and concrete per tube (yd³) and bags of 80 lb mix and tube surface area.</p><ul><li><strong>Tube diameter</strong> — in in. 8, 10, 12 or 16 in are the common sizes</li><li><strong>Tube height above the base</strong> — in ft. The full length of tube you fill</li><li><strong>Over-order</strong> — in %. Settlement and an uneven hole</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Concrete per tube</strong> — in ft³</li><li><strong>Concrete per tube</strong> — in yd³</li><li><strong>Bags of 80 lb mix</strong></li><li><strong>Tube surface area</strong> — in ft²</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Tube diameter = 12 in, Tube height above the base = 4 ft, Over-order = 10 % — and the results panel reads:</p><ul><li><strong>Concrete per tube</strong> = <code>pi × (Tube diameter ÷ 24)^2 × Tube height above the base</code> = <strong>3.142 ft³</strong></li><li><strong>Concrete per tube</strong> = <code>pi × (Tube diameter ÷ 24)^2 × Tube height above the base × (1+Over-order ÷ 100) ÷ 27</code> = <strong>0.128 yd³</strong></li><li><strong>Bags of 80 lb mix</strong> = <code>ceil(pi × (Tube diameter ÷ 24)^2 × Tube height above the base × (1+Over-order ÷ 100) ÷ 0.6-0.000000001)</code> = <strong>6</strong></li><li><strong>Tube surface area</strong> = <code>pi × Tube diameter ÷ 12 × Tube height above the base</code> = <strong>12.566 ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pi × pow(12 ÷ 24,2) × 4 = 3.142</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 12 in tube four feet tall holds 3.14 ft³, or 0.128 yd³ with ten per cent — six bags of 80 lb mix. Its surface is 12.6 ft², so a 12 ft tube makes most of a second one.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the size against the load: a 12 in pier is right for most decks, 16 in for a porch post carrying a roof. The depth below grade should reach the frost line in cold climates, and the height above grade is what you actually fill.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Concrete per tube</th><th>Concrete per tube</th><th>Bags of 80 lb mix</th><th>Tube surface area</th></tr></thead><tbody><tr><td><strong>Tube diameter</strong> +10 %</td><td>+21 %</td><td>+21 %</td><td>+16.67 %</td><td>+10 %</td></tr><tr><td><strong>Tube height above the base</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+16.67 %</td><td>+10 %</td></tr><tr><td><strong>Over-order</strong> +10 %</td><td>+0 %</td><td>+0.91 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Tube diameter</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Over-order</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Tube diameter = 8, Tube height above the base = 3, Over-order = 10, the page reports <strong>Concrete per tube</strong> = 1.047 ft³, <strong>Concrete per tube</strong> = 0.043 yd³, <strong>Bags of 80 lb mix</strong> = 2, <strong>Tube surface area</strong> = 6.283 ft². An 8 in fence post tube: 1.05 ft³ and two bags.</li><li>With Tube diameter = 16, Tube height above the base = 6, Over-order = 10, the page reports <strong>Concrete per tube</strong> = 8.378 ft³, <strong>Concrete per tube</strong> = 0.341 yd³, <strong>Bags of 80 lb mix</strong> = 16, <strong>Tube surface area</strong> = 25.133 ft². A 16 in porch pier six feet tall: 8.4 ft³, 0.34 yd³ and 16 bags.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The tube measured from the hole's bottom.</strong> Concrete only fills the tube, not the excavated bell around it.</li><li><strong>Diameter entered as radius.</strong> The formula halves it already.</li><li><strong>Waste left at zero.</strong> Cardboard tubes bulge and the top is never cut level to the millimetre.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Concrete per tube (ft³), Concrete per tube (yd³), Bags of 80 lb mix, Tube surface area (ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Diameter in inches, height in feet, volume in cubic feet, bags of 80 lb mix and surface area in square feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need tube diameter and tube height above the base and over-order. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Concrete per tube (ft³) and concrete per tube (yd³) and bags of 80 lb mix and tube surface area should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Tube diameter</strong> ×10</td><td>3.142</td><td>314.159</td><td>×100</td></tr><tr><td><strong>Tube height above the base</strong> ×10</td><td>3.142</td><td>31.416</td><td>ten times larger</td></tr><tr><td><strong>Over-order</strong> ×10</td><td>3.142</td><td>3.142</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Round tubes only.</strong> Square forms and flared bases need their own volumes.</li><li><strong>No reinforcement allowance.</strong> A rebar cage displaces a little concrete; the over-order covers it.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Working out bags for a single pier.</li></li><li><li>Buying tube by the foot.</li></li><li><li>Checking a deck's pier size.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/concrete-tube">Concrete tube</a> <a href="/construction/post-hole-concrete">Post hole concrete</a> <a href="/construction/concrete-column">Concrete column</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sonotube calculator work out?', 'a' => <<<'TXT'
            It returns concrete per tube (ft³) and concrete per tube (yd³) and bags of 80 lb mix and tube surface area from tube diameter and tube height above the base and over-order. The relationship is pi × (Tube diameter ÷ 24)^2 × Tube height above the base.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Tube diameter (in), Tube height above the base (ft), Over-order (%). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: tube diameter in in; tube height above the base in ft; over-order in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much concrete does a 12 inch Sonotube hold?', 'a' => 'About 0.785 ft³ per foot of height, so four feet takes 3.14 ft³ — six 80 lb bags.'],
            ['q' => 'Can the tube stay in the ground?', 'a' => 'Yes. Sonotubes are left in place; the cardboard is inert in soil and keeps the concrete from picking up dirt.'],
        ],
        'related' => [
            ['path' => '/construction/concrete-tube', 'name' => 'Concrete tube'],
            ['path' => '/construction/post-hole-concrete', 'name' => 'Post hole concrete'],
            ['path' => '/construction/concrete-column', 'name' => 'Concrete column'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
