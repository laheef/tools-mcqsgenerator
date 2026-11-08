<?php

/**
 * Theoretical Yield Calculator
 * /chemistry/theoretical-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Theoretical Yield Calculator',
    'meta' => ['title' => 'Theoretical Yield Calculator: Mass of Product', 'description' => 'Convert the mass of your limiting reagent into the mass of product the balanced equation allows, using the mole ratio and the molar mass of the product.', 'h1' => 'Theoretical Yield Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'reagent_mass',
                    'label' => 'Mass of limiting reagent',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '10',
                    'help' => 'Weighed mass of the reagent that runs out first',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'reagent_molar_mass',
                    'label' => 'Molar mass of that reagent',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '100.09',
                    'help' => 'Calcium carbonate is 100.09',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mole_ratio',
                    'label' => 'Moles of product per mole of reagent',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'From the balanced equation; one mole of CaCO₃ gives one mole of CaO',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'product_molar_mass',
                    'label' => 'Molar mass of the product',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '56.08',
                    'help' => 'Calcium oxide is 56.08',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'reagent_moles',
                    'label' => 'Moles of limiting reagent',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
                [
                    'name' => 'product_moles',
                    'label' => 'Moles of product',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
                [
                    'name' => 'product_mass',
                    'label' => 'Theoretical yield',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Theoretical Yield',
            'results' => [
                'reagent_moles' => 'reagent_mass/reagent_molar_mass',
                'product_moles' => 'reagent_mass/reagent_molar_mass*mole_ratio',
                'product_mass' => 'reagent_mass/reagent_molar_mass*mole_ratio*product_molar_mass',
                'reagent_mass' => 'product_mass/(mole_ratio*product_molar_mass)*reagent_molar_mass',
                'reagent_molar_mass' => 'reagent_mass/(product_mass/(mole_ratio*product_molar_mass))',
                'mole_ratio' => 'product_moles/(reagent_mass/reagent_molar_mass)',
                'product_molar_mass' => 'product_mass/product_moles',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The theoretical yield is what the balanced equation permits, not what you collected: <strong>mass of product = (mass of reagent ÷ Mr reagent) × ratio × Mr product</strong>. Enter the limiting reagent — the one that runs out first — and the page returns the moles and the mass of product.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Every yield figure — percent yield, atom economy, cost per kilogram — is measured against the theoretical yield. Getting it right first means the batch record can be believed afterwards.</p><p>The page reports <strong>moles of limiting reagent and moles of product and theoretical yield</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Moles of limiting reagent</strong></td><td><code>Mass of limiting reagent ÷ Molar mass of that reagent</code></td></tr><tr><td><strong>Moles of product</strong></td><td><code>Mass of limiting reagent ÷ Molar mass of that reagent × Moles of product per mole of reagent</code></td></tr><tr><td><strong>Theoretical yield</strong></td><td><code>Mass of limiting reagent ÷ Molar mass of that reagent × Moles of product per mole of reagent × Molar mass of the product</code></td></tr><tr><td><strong>Mass of limiting reagent</strong></td><td><code>Theoretical yield ÷ (Moles of product per mole of reagent × Molar mass of the product) × Molar mass of that reagent</code></td></tr><tr><td><strong>Molar mass of that reagent</strong></td><td><code>Mass of limiting reagent ÷ (Theoretical yield ÷ (Moles of product per mole of reagent × Molar mass of the product))</code></td></tr><tr><td><strong>Moles of product per mole of reagent</strong></td><td><code>Moles of product ÷ (Mass of limiting reagent ÷ Molar mass of that reagent)</code></td></tr><tr><td><strong>Molar mass of the product</strong></td><td><code>Theoretical yield ÷ Moles of product</code></td></tr></tbody></table><p><p>The three steps are mass to moles, moles across the equation, moles back to mass. The middle step is the only one that uses the chemistry; the outer two are arithmetic on molar masses.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports moles of limiting reagent and moles of product and theoretical yield.</p><ul><li><strong>Mass of limiting reagent</strong> — in g. Weighed mass of the reagent that runs out first</li><li><strong>Molar mass of that reagent</strong> — in g/mol. Calcium carbonate is 100.09</li><li><strong>Moles of product per mole of reagent</strong>. From the balanced equation; one mole of CaCO₃ gives one mole of CaO</li><li><strong>Molar mass of the product</strong> — in g/mol. Calcium oxide is 56.08</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Moles of limiting reagent</strong> — in mol</li><li><strong>Moles of product</strong> — in mol</li><li><strong>Theoretical yield</strong> — in g</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass of limiting reagent = 10 g, Molar mass of that reagent = 100.09 g/mol, Moles of product per mole of reagent = 1, Molar mass of the product = 56.08 g/mol — and the results panel reads:</p><ul><li><strong>Moles of limiting reagent</strong> = <code>Mass of limiting reagent ÷ Molar mass of that reagent</code> = <strong>0.1 mol</strong></li><li><strong>Moles of product</strong> = <code>Mass of limiting reagent ÷ Molar mass of that reagent × Moles of product per mole of reagent</code> = <strong>0.1 mol</strong></li><li><strong>Theoretical yield</strong> = <code>Mass of limiting reagent ÷ Molar mass of that reagent × Moles of product per mole of reagent × Molar mass of the product</code> = <strong>5.603 g</strong></li></ul><p>With the numbers written into the formula, the first result is <code>10 ÷ 100.09 = 0.1</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Heating 10 g of calcium carbonate: 10 ÷ 100.09 = 0.0999 mol of CaCO₃, which the equation converts one-for-one into 0.0999 mol of CaO, and 0.0999 × 56.08 = 5.60 g. The missing 4.4 g leaves as carbon dioxide.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>If the yield you collect is larger than this figure, the product is wet, impure, or the equation is unbalanced. A theoretical yield is an upper bound, and nothing in a beaker exceeds it.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Moles of limiting reagent</th><th>Moles of product</th><th>Theoretical yield</th></tr></thead><tbody><tr><td><strong>Mass of limiting reagent</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Molar mass of that reagent</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Moles of product per mole of reagent</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Molar mass of the product</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Moles of product per mole of reagent</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Molar mass of that reagent</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass of limiting reagent = 25, Molar mass of that reagent = 105.99, Moles of product per mole of reagent = 1, Molar mass of the product = 58.44, the page reports <strong>Moles of limiting reagent</strong> = 0.236 mol, <strong>Moles of product</strong> = 0.236 mol, <strong>Theoretical yield</strong> = 13.784 g. 25 g of sodium carbonate gives 0.236 mol and 13.8 g of sodium chloride against two moles of HCl per mole of carbonate.</li><li>With Mass of limiting reagent = 4.6, Molar mass of that reagent = 46.07, Moles of product per mole of reagent = 2, Molar mass of the product = 18.015, the page reports <strong>Moles of limiting reagent</strong> = 0.1 mol, <strong>Moles of product</strong> = 0.2 mol, <strong>Theoretical yield</strong> = 3.598 g. 4.6 g of ethanol burns to 0.2 mol of water, which is 3.6 g — the ratio of three to one is not what the equation says, two is.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The wrong reagent treated as limiting.</strong> Compare mole ratios, not masses: the reagent with fewer moles than the equation needs is the one that sets the yield.</li><li><strong>Mole ratio read upside down.</strong> It is moles of product per mole of reagent, which for a 2 : 3 equation is 1.5, not 0.67.</li><li><strong>Molar masses mixed up.</strong> The reagent's molar mass divides the reagent's mass; the product's multiplies. Swapping them produces a plausible, wrong answer.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Moles of limiting reagent (mol), Moles of product (mol), Theoretical yield (g).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Mass in grams with molar mass in grams per mole gives moles. If the reagent is weighed in milligrams, convert to grams first or the yield comes out a thousand times too small.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass of limiting reagent and molar mass of that reagent and moles of product per mole of reagent and molar mass of the product. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Moles of limiting reagent and moles of product and theoretical yield should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass of limiting reagent</strong> ×10</td><td>0.1</td><td>0.999</td><td>ten times larger</td></tr><tr><td><strong>Molar mass of that reagent</strong> ×10</td><td>0.1</td><td>0.01</td><td>ten times smaller</td></tr><tr><td><strong>Moles of product per mole of reagent</strong> ×10</td><td>0.1</td><td>0.1</td><td>unchanged</td></tr><tr><td><strong>Molar mass of the product</strong> ×10</td><td>0.1</td><td>0.1</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes a balanced equation.</strong> An unbalanced one shifts every ratio and silently changes the answer.</li><li><strong>It assumes complete reaction.</strong> Equilibrium, side reactions and losses are what percent yield measures — this page is the ceiling, not the forecast.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting the target mass for a batch before weighing anything.</li></li><li><li>Working out how much reagent a required mass of product needs.</li></li><li><li>Supplying the denominator in a percent yield calculation.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/percent-yield">Percent yield</a> <a href="/chemistry/actual-yield">Actual yield</a> <a href="/chemistry/mole">Mole</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Theoretical Yield calculator work out?', 'a' => <<<'TXT'
            It returns moles of limiting reagent and moles of product and theoretical yield from mass of limiting reagent and molar mass of that reagent and moles of product per mole of reagent and molar mass of the product. The relationship is Mass of limiting reagent ÷ Molar mass of that reagent.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mass of limiting reagent (g), Molar mass of that reagent (g/mol), Moles of product per mole of reagent, Molar mass of the product (g/mol). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass of limiting reagent in g; molar mass of that reagent in g/mol; molar mass of the product in g/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I know which reagent is limiting?', 'a' => 'Divide each reagent\'s moles by its coefficient in the balanced equation. The smallest quotient is the limiting reagent, and that is the one this page wants.'],
            ['q' => 'Why is the theoretical yield always higher than what I get?', 'a' => <<<'TXT'
            Because it assumes no losses: no side reaction, no product left in the flask, no transfer losses on the filter. Real yields of 70–90 % are normal and excellent.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/percent-yield', 'name' => 'Percent yield'],
            ['path' => '/chemistry/actual-yield', 'name' => 'Actual yield'],
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
