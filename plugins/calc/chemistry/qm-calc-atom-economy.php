<?php

/**
 * Atom Economy Calculator
 * /chemistry/atom-economy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Atom Economy Calculator',
    'meta' => ['title' => 'Atom Economy Calculator: How Much Becomes Product', 'description' => 'Measure what share of the atoms you paid for ends up in the product, by comparing the product\'s molar mass with the total mass of everything the reaction makes.', 'h1' => 'Atom Economy Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'product_molar_mass',
                    'label' => 'Molar mass of the desired product',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '56.08',
                    'help' => 'Calcium oxide is 56.08',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'products_molar_mass',
                    'label' => 'Total molar mass of all products',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '100.09',
                    'help' => 'CaO plus CO₂ is 56.08 + 44.01, so 100.09',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'atom_economy',
                    'label' => 'Atom economy',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'waste_per_100g',
                    'label' => 'Waste per 100 g of product',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'use_fraction',
                    'label' => 'Fraction of mass used',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Atom Economy',
            'results' => [
                'atom_economy' => 'product_molar_mass/products_molar_mass*100',
                'waste_per_100g' => '(products_molar_mass-product_molar_mass)/product_molar_mass*100',
                'use_fraction' => 'product_molar_mass/products_molar_mass',
                'product_molar_mass' => 'atom_economy*products_molar_mass/100',
                'products_molar_mass' => 'product_molar_mass*100/atom_economy',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Atom economy asks how much of the reactant mass survives into the product: <strong>% = Mr product ÷ Σ Mr all products × 100</strong>. It is a property of the route, not of your technique, so it cannot be improved by working more carefully — only by choosing a different reaction.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Two routes to the same molecule can differ enormously in how much material they throw away. Atom economy is the figure green chemistry uses to say so, because it counts every atom in the equation rather than only the ones you weighed.</p><p>The page reports <strong>atom economy and waste per 100 g of product and fraction of mass used</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Atom economy</strong></td><td><code>Molar mass of the desired product ÷ Total molar mass of all products × 100</code></td></tr><tr><td><strong>Waste per 100 g of product</strong></td><td><code>(Total molar mass of all products-Molar mass of the desired product) ÷ Molar mass of the desired product × 100</code></td></tr><tr><td><strong>Fraction of mass used</strong></td><td><code>Molar mass of the desired product ÷ Total molar mass of all products</code></td></tr><tr><td><strong>Molar mass of the desired product</strong></td><td><code>Atom economy × Total molar mass of all products ÷ 100</code></td></tr><tr><td><strong>Total molar mass of all products</strong></td><td><code>Molar mass of the desired product × 100 ÷ Atom economy</code></td></tr></tbody></table><p><p>The denominator is the sum of all products, by their coefficients, not just the one you want. A reaction with a single product — an addition or a rearrangement — scores 100 % by definition; a substitution that ejects a leaving group cannot.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports atom economy and waste per 100 g of product and fraction of mass used.</p><ul><li><strong>Molar mass of the desired product</strong> — in g/mol. Calcium oxide is 56.08</li><li><strong>Total molar mass of all products</strong> — in g/mol. CaO plus CO₂ is 56.08 + 44.01, so 100.09</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Atom economy</strong> — in %</li><li><strong>Waste per 100 g of product</strong> — in g</li><li><strong>Fraction of mass used</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Molar mass of the desired product = 56.08 g/mol, Total molar mass of all products = 100.09 g/mol — and the results panel reads:</p><ul><li><strong>Atom economy</strong> = <code>Molar mass of the desired product ÷ Total molar mass of all products × 100</code> = <strong>56.03 %</strong></li><li><strong>Waste per 100 g of product</strong> = <code>(Total molar mass of all products-Molar mass of the desired product) ÷ Molar mass of the desired product × 100</code> = <strong>78.477 g</strong></li><li><strong>Fraction of mass used</strong> = <code>Molar mass of the desired product ÷ Total molar mass of all products</code> = <strong>0.56</strong></li></ul><p>With the numbers written into the formula, the first result is <code>56.08 ÷ 100.09 × 100 = 56.03</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>CaCO₃ → CaO + CO₂ keeps 56.08 of 100.09 units of mass, which is 56.0 %. The other 44 % leaves as carbon dioxide, and no amount of careful weighing brings it back.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Above 90 % the route is nearly additive and the waste problem is solvent, not stoichiometry. Below 50 % every kilogram of product creates at least a kilogram of by-product, which is a disposal cost as well as a design fault.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Atom economy</th><th>Waste per 100 g of product</th><th>Fraction of mass used</th></tr></thead><tbody><tr><td><strong>Molar mass of the desired product</strong> +10 %</td><td>+10 %</td><td>−20.68 %</td><td>+10 %</td></tr><tr><td><strong>Total molar mass of all products</strong> +10 %</td><td>−9.09 %</td><td>+22.74 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Total molar mass of all products</strong>: a ten per cent move there shifts the result by about 22.7 per cent. The least sensitive is <strong>Molar mass of the desired product</strong>, at 20.7 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Molar mass of the desired product = 151.16, Total molar mass of all products = 151.16, the page reports <strong>Atom economy</strong> = 100 %, <strong>Waste per 100 g of product</strong> = 0 g, <strong>Fraction of mass used</strong> = 1. An addition reaction with one product: 100 %, which is the ceiling by definition.</li><li>With Molar mass of the desired product = 180.16, Total molar mass of all products = 342.3, the page reports <strong>Atom economy</strong> = 52.632 %, <strong>Waste per 100 g of product</strong> = 89.998 g, <strong>Fraction of mass used</strong> = 0.526. A glycoside synthesis that keeps 52.6 % of the mass leaves 90 g of by-product per 100 g of product.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting only the desired product's mass.</strong> The denominator is every product, coefficients included.</li><li><strong>Confusing it with percent yield.</strong> Yield measures what you collected; economy measures what the equation allows. A 100 % yield of a 30 % economy route is still wasteful.</li><li><strong>Forgetting solvent and reagents.</strong> Atom economy ignores them entirely, so a solvent-heavy process can look excellent on this page.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Atom economy (%), Waste per 100 g of product (g), Fraction of mass used.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Molar masses in grams per mole cancel in the ratio, so the result is a percentage. The waste figure is grams of by-product per 100 g of desired product, which is the number a process chemist budgets for.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need molar mass of the desired product and total molar mass of all products. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Atom economy and waste per 100 g of product and fraction of mass used should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Molar mass of the desired product</strong> ×10</td><td>56.03</td><td>560.296</td><td>ten times larger</td></tr><tr><td><strong>Total molar mass of all products</strong> ×10</td><td>56.03</td><td>5.603</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It ignores energy and solvents.</strong> A 100 % atom economy reaction that needs ten litres of dichloromethane per gram is not green.</li><li><strong>It says nothing about toxicity.</strong> The by-product's harm is not in the mass balance.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Comparing two synthetic routes before choosing one.</li></li><li><li>Reporting a green-chemistry metric to a tutor or a review.</li></li><li><li>Estimating by-product tonnage for a given production volume.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/percent-yield">Percent yield</a> <a href="/chemistry/theoretical-yield">Theoretical yield</a> <a href="/chemistry/molar-mass">Molar mass</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Atom Economy calculator work out?', 'a' => <<<'TXT'
            It returns atom economy and waste per 100 g of product and fraction of mass used from molar mass of the desired product and total molar mass of all products. The relationship is Molar mass of the desired product ÷ Total molar mass of all products × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Molar mass of the desired product (g/mol), Total molar mass of all products (g/mol). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: molar mass of the desired product in g/mol; total molar mass of all products in g/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Does atom economy change with yield?', 'a' => <<<'TXT'
            No. Yield depends on how well the reaction runs; atom economy depends only on the balanced equation. A route can have 100 % atom economy and a 40 % yield, or the reverse.
            TXT],
            ['q' => 'Why is a Diels-Alder reaction so highly rated?', 'a' => <<<'TXT'
            It is an addition: two molecules become one, with no atoms left over. Atom economy is 100 % by construction, which is why it appears in so many green-chemistry examples.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/percent-yield', 'name' => 'Percent yield'],
            ['path' => '/chemistry/theoretical-yield', 'name' => 'Theoretical yield'],
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
