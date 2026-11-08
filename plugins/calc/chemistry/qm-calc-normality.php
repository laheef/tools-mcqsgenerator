<?php

/**
 * Normality Calculator
 * /chemistry/normality
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Normality Calculator',
    'meta' => ['title' => 'Normality Calculator: N and Equivalents per Litre', 'description' => 'Convert molarity to normality with the n-factor of an acid, base or salt, and see how many equivalents a given volume of the solution actually carries.', 'h1' => 'Normality Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'molarity',
                    'label' => 'Molarity (M)',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.1',
                    'help' => 'Moles per litre of solution',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'n_factor',
                    'label' => 'Equivalents per mole (n)',
                    'type' => 'number',
                    'default' => '2',
                    'help' => '2 for H₂SO₄, 1 for HCl, 3 for H₃PO₄, 5 for KMnO₄ in acid',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume',
                    'label' => 'Volume of solution (V)',
                    'type' => 'number',
                    'suffix' => 'L',
                    'default' => '0.5',
                    'help' => 'The portion you are working with',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'normality',
                    'label' => 'Normality (N)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'eq/L',
                ],
                [
                    'name' => 'equivalents',
                    'label' => 'Equivalents in that volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'eq',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Normality',
            'results' => [
                'normality' => 'molarity*n_factor',
                'equivalents' => 'molarity*n_factor*volume',
                'molarity' => 'normality/n_factor',
                'n_factor' => 'normality/molarity',
                'volume' => 'equivalents/(molarity*n_factor)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Normality counts equivalents rather than moles: <strong>N = M × n</strong>, where the n-factor is the number of protons, hydroxide ions or electrons one formula unit contributes to the reaction. For sulfuric acid the n-factor is 2, for sodium hydroxide 1, and for potassium permanganate in acid solution 5.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Normality is the unit titrations were written in for a century, and it survives because it makes the arithmetic of neutralisation trivial: one equivalent of acid neutralises one equivalent of base, whatever the formula. No stoichiometric coefficients to carry through the calculation.</p><p>The page reports <strong>normality (N) and equivalents in that volume</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Normality (N)</strong></td><td><code>Molarity (M) × Equivalents per mole (n)</code></td></tr><tr><td><strong>Equivalents in that volume</strong></td><td><code>Molarity (M) × Equivalents per mole (n) × Volume of solution (V)</code></td></tr><tr><td><strong>Molarity (M)</strong></td><td><code>Normality (N) ÷ Equivalents per mole (n)</code></td></tr><tr><td><strong>Equivalents per mole (n)</strong></td><td><code>Normality (N) ÷ Molarity (M)</code></td></tr><tr><td><strong>Volume of solution (V)</strong></td><td><code>Equivalents in that volume ÷ (Molarity (M) × Equivalents per mole (n))</code></td></tr></tbody></table><p><p>The n-factor is not a property of the substance alone — it depends on the reaction. Sulfuric acid is 1 for a single proton exchange, 2 when both protons react, and permanganate is 5 in acid but 3 in neutral solution.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports normality (N) and equivalents in that volume.</p><ul><li><strong>Molarity (M)</strong> — in mol/L. Moles per litre of solution</li><li><strong>Equivalents per mole (n)</strong>. 2 for H₂SO₄, 1 for HCl, 3 for H₃PO₄, 5 for KMnO₄ in acid</li><li><strong>Volume of solution (V)</strong> — in L. The portion you are working with</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Normality (N)</strong> — in eq/L</li><li><strong>Equivalents in that volume</strong> — in eq</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Molarity (M) = 0.1 mol/L, Equivalents per mole (n) = 2, Volume of solution (V) = 0.5 L — and the results panel reads:</p><ul><li><strong>Normality (N)</strong> = <code>Molarity (M) × Equivalents per mole (n)</code> = <strong>0.2 eq/L</strong></li><li><strong>Equivalents in that volume</strong> = <code>Molarity (M) × Equivalents per mole (n) × Volume of solution (V)</code> = <strong>0.1 eq</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.1 × 2 = 0.2</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>0.1 M sulfuric acid has a normality of 0.2 N, and 0.5 L of it carries 0.1 equivalents of acid — enough to neutralise 0.1 mol of sodium hydroxide, because the n-factor of NaOH is 1.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Normality is always equal to or larger than molarity, and the ratio between them is the n-factor. If a normality comes out smaller than the molarity, the n-factor was entered below 1 and the calculation is wrong.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Normality (N)</th><th>Equivalents in that volume</th></tr></thead><tbody><tr><td><strong>Molarity (M)</strong> +10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Equivalents per mole (n)</strong> +10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Volume of solution (V)</strong> +10 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Molarity (M)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Volume of solution (V)</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Molarity (M) = 1, Equivalents per mole (n) = 1, Volume of solution (V) = 1, the page reports <strong>Normality (N)</strong> = 1 eq/L, <strong>Equivalents in that volume</strong> = 1 eq. A monoprotic acid is the case where normality and molarity coincide.</li><li>With Molarity (M) = 0.02, Equivalents per mole (n) = 5, Volume of solution (V) = 0.25, the page reports <strong>Normality (N)</strong> = 0.1 eq/L, <strong>Equivalents in that volume</strong> = 0.025 eq. 0.02 M permanganate in acid is 0.1 N; a 250 mL portion carries 25 meq of oxidising power.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>n-factor guessed from the formula.</strong> It comes from the reaction, not the subscripts; acetic acid is monoprotic however many hydrogens it has.</li><li><strong>Normality used where molarity is meant.</strong> Thermodynamics, equilibrium and spectroscopy all use molarity. Normality is for stoichiometric matching only.</li><li><strong>Mixed acid and base definitions.</strong> For a base the n-factor counts hydroxide ions or protons accepted, not protons donated.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Normality (N) (eq/L), Equivalents in that volume (eq).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The equivalent is not a mole and has no single SI unit; the result is reported in eq/L, which is numerically the same as meq/mL. Both are written N.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need molarity (M) and equivalents per mole (n) and volume of solution (V). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Normality (n) and equivalents in that volume should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Molarity (M)</strong> ×10</td><td>0.2</td><td>2</td><td>ten times larger</td></tr><tr><td><strong>Equivalents per mole (n)</strong> ×10</td><td>0.2</td><td>2</td><td>ten times larger</td></tr><tr><td><strong>Volume of solution (V)</strong> ×10</td><td>0.2</td><td>0.2</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It needs a defined reaction.</strong> Without knowing what the substance is reacting with, the n-factor is only a convention.</li><li><strong>It is not a thermodynamic concentration.</strong> Equilibrium constants are not written in normality.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Titration calculations written in the old equivalent style.</li></li><li><li>Water treatment and effluent dosing, where equivalents match directly.</li></li><li><li>Redox work: the electron count is the n-factor.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/molarity">Molarity</a> <a href="/chemistry/molality">Molality</a> <a href="/chemistry/titration">Titration</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Normality calculator work out?', 'a' => <<<'TXT'
            It returns normality (N) and equivalents in that volume from molarity (M) and equivalents per mole (n) and volume of solution (V). The relationship is Molarity (M) × Equivalents per mole (n).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Molarity (M) (mol/L), Equivalents per mole (n), Volume of solution (V) (L). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: molarity (M) in mol/L; volume of solution (V) in L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Is 1 N always 1 M?', 'a' => <<<'TXT'
            Only when the n-factor is 1 — hydrochloric acid or sodium hydroxide, for example. Sulfuric acid at 1 M is 2 N, and potassium permanganate in acid is 5 N per mole.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/molarity', 'name' => 'Molarity'],
            ['path' => '/chemistry/molality', 'name' => 'Molality'],
            ['path' => '/chemistry/titration', 'name' => 'Titration'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
