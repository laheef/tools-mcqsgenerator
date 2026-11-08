<?php

/**
 * Molar Ratio Calculator
 * /chemistry/molar-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Molar Ratio Calculator',
    'meta' => ['title' => 'Molar Ratio Calculator: Moles of A to Moles of B', 'description' => 'Use the coefficients from a balanced equation to convert moles of one substance into moles of another, and to check the ratio the reaction actually requires.', 'h1' => 'Molar Ratio Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'moles_a',
                    'label' => 'Moles of substance A',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '0.5',
                    'help' => 'Whatever you started with, in moles',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'coeff_a',
                    'label' => 'Coefficient of A',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'From the balanced equation',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'coeff_b',
                    'label' => 'Coefficient of B',
                    'type' => 'number',
                    'default' => '3',
                    'help' => 'From the balanced equation',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'moles_b',
                    'label' => 'Moles of substance B',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
                [
                    'name' => 'ratio',
                    'label' => 'Molar ratio B to A',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'a_per_b',
                    'label' => 'Moles of A needed per mole of B',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Molar Ratio',
            'results' => [
                'moles_b' => 'moles_a*coeff_b/coeff_a',
                'ratio' => 'coeff_b/coeff_a',
                'a_per_b' => 'coeff_a/coeff_b',
                'moles_a' => 'moles_b*coeff_a/coeff_b',
                'coeff_b' => 'moles_b*coeff_a/moles_a',
                'coeff_a' => 'moles_a*coeff_b/moles_b',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Molar ratio is the bridge across an equation: <strong>n(B) = n(A) × coefficient B ÷ coefficient A</strong>. It is the middle step in every stoichiometry problem, and the one where moles get lost if the equation is not balanced first.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Moles are the only currency that crosses an equation. Grams do not, litres of solution do not, and the coefficients are the exchange rate — which is why an unbalanced equation produces a confident, wrong answer.</p><p>The page reports <strong>moles of substance B and molar ratio B to A and moles of A needed per mole of B</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Moles of substance B</strong></td><td><code>Moles of substance A × Coefficient of B ÷ Coefficient of A</code></td></tr><tr><td><strong>Molar ratio B to A</strong></td><td><code>Coefficient of B ÷ Coefficient of A</code></td></tr><tr><td><strong>Moles of A needed per mole of B</strong></td><td><code>Coefficient of A ÷ Coefficient of B</code></td></tr><tr><td><strong>Moles of substance A</strong></td><td><code>Moles of substance B × Coefficient of A ÷ Coefficient of B</code></td></tr><tr><td><strong>Coefficient of B</strong></td><td><code>Moles of substance B × Coefficient of A ÷ Moles of substance A</code></td></tr><tr><td><strong>Coefficient of A</strong></td><td><code>Moles of substance A × Coefficient of B ÷ Moles of substance B</code></td></tr></tbody></table><p><p>The ratio is dimensionless and fixed by the equation: 1 : 3 means every mole of A consumes three of B. The last result inverts it, so 0.333 mol of A per mole of B is the same fact read the other way.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports moles of substance B and molar ratio B to A and moles of A needed per mole of B.</p><ul><li><strong>Moles of substance A</strong> — in mol. Whatever you started with, in moles</li><li><strong>Coefficient of A</strong>. From the balanced equation</li><li><strong>Coefficient of B</strong>. From the balanced equation</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Moles of substance B</strong> — in mol</li><li><strong>Molar ratio B to A</strong></li><li><strong>Moles of A needed per mole of B</strong> — in mol</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Moles of substance A = 0.5 mol, Coefficient of A = 1, Coefficient of B = 3 — and the results panel reads:</p><ul><li><strong>Moles of substance B</strong> = <code>Moles of substance A × Coefficient of B ÷ Coefficient of A</code> = <strong>1.5 mol</strong></li><li><strong>Molar ratio B to A</strong> = <code>Coefficient of B ÷ Coefficient of A</code> = <strong>3</strong></li><li><strong>Moles of A needed per mole of B</strong> = <code>Coefficient of A ÷ Coefficient of B</code> = <strong>0.333 mol</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.5 × 3 ÷ 1 = 1.5</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>0.5 mol of A against a coefficient of 1, with B at a coefficient of 3, gives 1.5 mol of B. If you only have 1.2 mol of B in the flask, B is the limiting reagent regardless of how much A was weighed out.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the moles you have with the moles the ratio demands, substance by substance. The one that falls short first is limiting, and the ratio then fixes everything downstream from it.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Moles of substance B</th><th>Molar ratio B to A</th><th>Moles of A needed per mole of B</th></tr></thead><tbody><tr><td><strong>Moles of substance A</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Coefficient of A</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Coefficient of B</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Coefficient of A</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Coefficient of B</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Moles of substance A = 0.25, Coefficient of A = 2, Coefficient of B = 3, the page reports <strong>Moles of substance B</strong> = 0.375 mol, <strong>Molar ratio B to A</strong> = 1.5, <strong>Moles of A needed per mole of B</strong> = 0.667 mol. Ammonia synthesis at 2 : 3 gives 0.375 mol of ammonia from 0.25 mol of nitrogen.</li><li>With Moles of substance A = 2, Coefficient of A = 1, Coefficient of B = 2, the page reports <strong>Moles of substance B</strong> = 4 mol, <strong>Molar ratio B to A</strong> = 2, <strong>Moles of A needed per mole of B</strong> = 0.5 mol. Two moles of methane and a 1 : 2 ratio need four moles of oxygen — double what looks like an equal partnership.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Ratio applied to grams.</strong> Converting mass to moles first is not optional; the coefficients count particles, not kilograms.</li><li><strong>Coefficients from an unbalanced equation.</strong> Balance it, then read them off.</li><li><strong>The ratio inverted.</strong> 1 : 3 is not 3 : 1; decide which substance is A before typing.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Moles of substance B (mol), Molar ratio B to A, Moles of A needed per mole of B (mol).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The moles are in mol and the coefficients are unitless. If your amount is in millimoles the ratio still works, and the answer comes back in millimoles.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need moles of substance A and coefficient of A and coefficient of B. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Moles of substance b and molar ratio b to a and moles of a needed per mole of b should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Moles of substance A</strong> ×10</td><td>1.5</td><td>15</td><td>ten times larger</td></tr><tr><td><strong>Coefficient of A</strong> ×10</td><td>1.5</td><td>0.15</td><td>ten times smaller</td></tr><tr><td><strong>Coefficient of B</strong> ×10</td><td>1.5</td><td>15</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes a single reaction.</strong> Competing pathways consume the same reagent in different ratios and this page cannot see them.</li><li><strong>It assumes complete conversion.</strong> Real conversions stop short, which is what percent yield is for.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Converting a weighed amount of one reagent into the moles another needs.</li></li><li><li>Finding the limiting reagent before starting a reaction.</li></li><li><li>Reading a balanced equation as a set of working ratios.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/theoretical-yield">Theoretical yield</a> <a href="/chemistry/mole">Mole</a> <a href="/chemistry/molar-mass">Molar mass</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Molar Ratio calculator work out?', 'a' => <<<'TXT'
            It returns moles of substance B and molar ratio B to A and moles of A needed per mole of B from moles of substance A and coefficient of A and coefficient of B. The relationship is Moles of substance A × Coefficient of B ÷ Coefficient of A.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Moles of substance A (mol), Coefficient of A, Coefficient of B. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: moles of substance A in mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Do I use moles or mass for the ratio?', 'a' => 'Moles. The coefficients count molecules, so the ratio is between amounts in moles — convert any mass first with the substance\'s molar mass.'],
            ['q' => 'What if the ratio is 1 : 1.5?', 'a' => 'Multiply both coefficients by two to clear the fraction: 2 : 3. The ratio is unchanged, and whole-number coefficients are easier to check.'],
        ],
        'related' => [
            ['path' => '/chemistry/theoretical-yield', 'name' => 'Theoretical yield'],
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
