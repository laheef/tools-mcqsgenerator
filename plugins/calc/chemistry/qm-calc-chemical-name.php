<?php

/**
 * Chemical name
 * /chemistry/chemical-name
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Chemical name',
    'meta' => ['title' => 'Chemical Name Calculator: Ionic Formula From Charges', 'description' => 'Turn the charges on a cation and an anion into the subscripts of a neutral ionic formula, and read the molar mass of the compound those subscripts describe.', 'h1' => 'Chemical name', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'cation_charge',
                    'label' => 'Charge on the cation',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Magnitude only — 2 for calcium',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'anion_charge',
                    'label' => 'Charge on the anion',
                    'type' => 'number',
                    'default' => '3',
                    'help' => 'Magnitude only — 3 for nitride',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cation_mass',
                    'label' => 'Molar mass of the cation',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '40.08',
                    'help' => '40.08 for calcium',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'anion_mass',
                    'label' => 'Molar mass of the anion',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '14.01',
                    'help' => '14.01 for nitride',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cation_count',
                    'label' => 'Cations per formula unit',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'anion_count',
                    'label' => 'Anions per formula unit',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'formula_mass',
                    'label' => 'Molar mass of the compound',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g/mol',
                ],
                [
                    'name' => 'net_charge',
                    'label' => 'Net charge of the formula unit',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Chemical name',
            'results' => [
                'cation_count' => 'anion_charge/gcd(cation_charge,anion_charge)',
                'anion_count' => 'cation_charge/gcd(cation_charge,anion_charge)',
                'formula_mass' => '(anion_charge/gcd(cation_charge,anion_charge))*cation_mass+(cation_charge/gcd(cation_charge,anion_charge))*anion_mass',
                'net_charge' => '(anion_charge/gcd(cation_charge,anion_charge))*cation_charge-(cation_charge/gcd(cation_charge,anion_charge))*anion_charge',
                'cation_mass' => '(formula_mass-(cation_charge/gcd(cation_charge,anion_charge))*anion_mass)/(anion_charge/gcd(cation_charge,anion_charge))',
                'anion_mass' => '(formula_mass-(anion_charge/gcd(cation_charge,anion_charge))*cation_mass)/(cation_charge/gcd(cation_charge,anion_charge))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>An ionic formula is neutral overall, so the charges have to cancel: with a charge z<sub>+</sub> on the cation and z<sub>−</sub> on the anion, the subscripts are <strong>z<sub>−</sub>/g</strong> cations and <strong>z<sub>+</sub>/g</strong> anions, where g is the greatest common divisor of the two charges.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Naming an ionic compound is the reverse of writing its formula, and the formula is nothing more than the smallest whole-number ratio that makes the charges cancel. The subscripts follow from the charges alone.</p><p>The page reports <strong>cations per formula unit and anions per formula unit and molar mass of the compound and net charge of the formula unit</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Cations per formula unit</strong></td><td><code>Charge on the anion ÷ gcd(Charge on the cation,Charge on the anion)</code></td></tr><tr><td><strong>Anions per formula unit</strong></td><td><code>Charge on the cation ÷ gcd(Charge on the cation,Charge on the anion)</code></td></tr><tr><td><strong>Molar mass of the compound</strong></td><td><code>(Charge on the anion ÷ gcd(Charge on the cation,Charge on the anion)) × Molar mass of the cation+(Charge on the cation ÷ gcd(Charge on the cation,Charge on the anion)) × Molar mass of the anion</code></td></tr><tr><td><strong>Net charge of the formula unit</strong></td><td><code>(Charge on the anion ÷ gcd(Charge on the cation,Charge on the anion)) × Charge on the cation-(Charge on the cation ÷ gcd(Charge on the cation,Charge on the anion)) × Charge on the anion</code></td></tr><tr><td><strong>Molar mass of the cation</strong></td><td><code>(Molar mass of the compound-(Charge on the cation ÷ gcd(Charge on the cation,Charge on the anion)) × Molar mass of the anion) ÷ (Charge on the anion ÷ gcd(Charge on the cation,Charge on the anion))</code></td></tr><tr><td><strong>Molar mass of the anion</strong></td><td><code>(Molar mass of the compound-(Charge on the anion ÷ gcd(Charge on the cation,Charge on the anion)) × Molar mass of the cation) ÷ (Charge on the cation ÷ gcd(Charge on the cation,Charge on the anion))</code></td></tr></tbody></table><p><p>Dividing both charges by their greatest common divisor keeps the ratio in its lowest terms: calcium and nitride, 2 and 3, give three calcium to two nitride — Ca₃N₂. Without the divisor, magnesium oxide would come out as Mg₂O₂ instead of MgO.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports cations per formula unit and anions per formula unit and molar mass of the compound and net charge of the formula unit.</p><ul><li><strong>Charge on the cation</strong>. Magnitude only — 2 for calcium</li><li><strong>Charge on the anion</strong>. Magnitude only — 3 for nitride</li><li><strong>Molar mass of the cation</strong> — in g/mol. 40.08 for calcium</li><li><strong>Molar mass of the anion</strong> — in g/mol. 14.01 for nitride</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Cations per formula unit</strong></li><li><strong>Anions per formula unit</strong></li><li><strong>Molar mass of the compound</strong> — in g/mol</li><li><strong>Net charge of the formula unit</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Charge on the cation = 2, Charge on the anion = 3, Molar mass of the cation = 40.08 g/mol, Molar mass of the anion = 14.01 g/mol — and the results panel reads:</p><ul><li><strong>Cations per formula unit</strong> = <code>Charge on the anion ÷ gcd(Charge on the cation,Charge on the anion)</code> = <strong>3</strong></li><li><strong>Anions per formula unit</strong> = <code>Charge on the cation ÷ gcd(Charge on the cation,Charge on the anion)</code> = <strong>2</strong></li><li><strong>Molar mass of the compound</strong> = <code>(Charge on the anion ÷ gcd(Charge on the cation,Charge on the anion)) × Molar mass of the cation+(Charge on the cation ÷ gcd(Charge on the cation,Charge on the anion)) × Molar mass of the anion</code> = <strong>148.26 g/mol</strong></li><li><strong>Net charge of the formula unit</strong> = <code>(Charge on the anion ÷ gcd(Charge on the cation,Charge on the anion)) × Charge on the cation-(Charge on the cation ÷ gcd(Charge on the cation,Charge on the anion)) × Charge on the anion</code> = <strong>0</strong></li></ul><p>With the numbers written into the formula, the first result is <code>3 ÷ gcd(2,3) = 3</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Calcium (2+) with nitride (3−): three Ca²⁺ carry +6 and two N³⁻ carry −6, so the formula is Ca₃N₂ and its molar mass is 3 × 40.08 + 2 × 14.01 = 148.26 g/mol. The net charge comes back as zero, which is the check.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>If net charge is not zero the two charges cannot be paired as entered — a common sign that one of them was written with the wrong magnitude, such as sulfate as 1− rather than 2−.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Cations per formula unit</th><th>Anions per formula unit</th><th>Molar mass of the compound</th><th>Net charge of the formula unit</th></tr></thead><tbody><tr><td><strong>Charge on the cation</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+1.89 %</td><td>—</td></tr><tr><td><strong>Charge on the anion</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+8.11 %</td><td>—</td></tr><tr><td><strong>Molar mass of the cation</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+8.11 %</td><td>—</td></tr><tr><td><strong>Molar mass of the anion</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+1.89 %</td><td>—</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Charge on the cation</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Molar mass of the anion</strong>, at 1.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Charge on the cation = 1, Charge on the anion = 2, Molar mass of the cation = 22.99, Molar mass of the anion = 96.06, the page reports <strong>Cations per formula unit</strong> = 2, <strong>Anions per formula unit</strong> = 1, <strong>Molar mass of the compound</strong> = 142.04 g/mol, <strong>Net charge of the formula unit</strong> = 0. Sodium and sulfate: two sodiums per sulfate, Na₂SO₄, 142.04 g/mol.</li><li>With Charge on the cation = 2, Charge on the anion = 1, Molar mass of the cation = 40.08, Molar mass of the anion = 35.45, the page reports <strong>Cations per formula unit</strong> = 1, <strong>Anions per formula unit</strong> = 2, <strong>Molar mass of the compound</strong> = 110.98 g/mol, <strong>Net charge of the formula unit</strong> = 0. Calcium and chloride: one calcium to two chlorides, CaCl₂, 110.98 g/mol — the divisor keeps the ratio in its lowest terms.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Charges written with signs.</strong> The page wants magnitudes; a 2+ entered as −2 would give a negative subscript.</li><li><strong>The divisor skipped.</strong> Charges of 2 and 4 give one to two, not two to four.</li><li><strong>Polyatomic ions taken apart.</strong> A sulfate is one anion with one molar mass; it is not a sulfur and four separate oxygens for this purpose.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Cations per formula unit, Anions per formula unit, Molar mass of the compound (g/mol), Net charge of the formula unit.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The charges are dimensionless counts and the subscripts that come out are counts as well. Molar masses in grams per mole give the compound's molar mass in the same unit, and the net charge is dimensionless.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need charge on the cation and charge on the anion and molar mass of the cation and molar mass of the anion. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Cations per formula unit and anions per formula unit and molar mass of the compound and net charge of the formula unit should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Charge on the cation</strong> ×10</td><td>3</td><td>3</td><td>unchanged</td></tr><tr><td><strong>Charge on the anion</strong> ×10</td><td>3</td><td>15</td><td>×5</td></tr><tr><td><strong>Molar mass of the cation</strong> ×10</td><td>3</td><td>3</td><td>unchanged</td></tr><tr><td><strong>Molar mass of the anion</strong> ×10</td><td>3</td><td>3</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not name the compound.</strong> It gives the formula and its mass; the name follows the usual cation-then-anion pattern.</li><li><strong>It assumes a simple ionic pair.</strong> Hydrates and mixed salts need extra water or ion terms.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Writing the formula of an ionic compound from its ions.</li></li><li><li>Getting the molar mass of a salt you have just named.</li></li><li><li>Checking a formula a student has written.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/molar-mass">Molar mass</a> <a href="/chemistry/net-ionic-equation">Net ionic equation</a> <a href="/chemistry/percent-composition">Percent composition</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Chemical name calculator work out?', 'a' => <<<'TXT'
            It returns cations per formula unit and anions per formula unit and molar mass of the compound and net charge of the formula unit from charge on the cation and charge on the anion and molar mass of the cation and molar mass of the anion. The relationship is Charge on the anion ÷ gcd(Charge on the cation,Charge on the anion).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Charge on the cation, Charge on the anion, Molar mass of the cation (g/mol), Molar mass of the anion (g/mol). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: molar mass of the cation in g/mol; molar mass of the anion in g/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is the formula MgO and not Mg₂O₂?', 'a' => <<<'TXT'
            Because formulas are written in the lowest whole-number ratio. Both charges are 2, so the greatest common divisor of 2 and 2 is 2, and the subscripts become 1 and 1.
            TXT],
            ['q' => 'How do I handle a polyatomic ion?', 'a' => 'Treat it as one anion with its own charge and molar mass, and put the whole ion in brackets when its subscript is more than one.'],
        ],
        'related' => [
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
            ['path' => '/chemistry/net-ionic-equation', 'name' => 'Net ionic equation'],
            ['path' => '/chemistry/percent-composition', 'name' => 'Percent composition'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
