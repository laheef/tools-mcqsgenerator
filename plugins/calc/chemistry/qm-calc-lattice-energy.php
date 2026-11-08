<?php

/**
 * Lattice Energy Calculator
 * /chemistry/lattice-energy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lattice Energy Calculator',
    'meta' => ['title' => 'Lattice Energy Calculator: Kapustinskii Equation', 'description' => 'Estimate a salt\'s lattice energy from its ion charges, its formula-unit ion count and the two ionic radii, using the Kapustinskii equation in picometres.', 'h1' => 'Lattice Energy Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'charge_cation',
                    'label' => 'Charge of the cation',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Magnitude only: 1 for Na⁺, 2 for Ca²⁺',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'charge_anion',
                    'label' => 'Charge of the anion',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Magnitude only: 1 for Cl⁻, 2 for O²⁻',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ions',
                    'label' => 'Ions per formula unit',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Two for NaCl, three for CaCl₂',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'radius_cation',
                    'label' => 'Radius of the cation',
                    'type' => 'number',
                    'suffix' => 'pm',
                    'default' => '102',
                    'help' => 'Sodium is 102 pm',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'radius_anion',
                    'label' => 'Radius of the anion',
                    'type' => 'number',
                    'suffix' => 'pm',
                    'default' => '181',
                    'help' => 'Chloride is 181 pm',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'lattice_energy',
                    'label' => 'Lattice energy',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kJ/mol',
                ],
                [
                    'name' => 'distance',
                    'label' => 'Internuclear distance',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'pm',
                ],
                [
                    'name' => 'energy_per_ion',
                    'label' => 'Lattice energy per ion',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kJ/mol',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Lattice Energy',
            'results' => [
                'distance' => 'radius_cation+radius_anion',
                'lattice_energy' => '120250*ions*charge_cation*charge_anion/(radius_cation+radius_anion)*(1-34.5/(radius_cation+radius_anion))',
                'energy_per_ion' => '120250*ions*charge_cation*charge_anion/(radius_cation+radius_anion)*(1-34.5/(radius_cation+radius_anion))/ions',
                'charge_cation' => 'lattice_energy/(120250*ions*charge_anion/(radius_cation+radius_anion)*(1-34.5/(radius_cation+radius_anion)))',
                'charge_anion' => 'lattice_energy/(120250*ions*charge_cation/(radius_cation+radius_anion)*(1-34.5/(radius_cation+radius_anion)))',
                'ions' => 'lattice_energy/(120250*charge_cation*charge_anion/(radius_cation+radius_anion)*(1-34.5/(radius_cation+radius_anion)))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Kapustinskii's equation estimates lattice energy from nothing but charges and radii: <strong>U = 120 250 · ν · z₊·z₋ ÷ r · (1 − 34.5 ÷ r)</strong>, with r the sum of the radii in picometres. It has no structural input at all, which is what makes it useful.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Lattice energy is what holds an ionic solid together, and it predicts melting points, solubility and hardness better than any other single number. Measuring it needs a Born–Haber cycle; estimating it needs only this equation.</p><p>The page reports <strong>lattice energy and internuclear distance and lattice energy per ion</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Internuclear distance</strong></td><td><code>Radius of the cation+Radius of the anion</code></td></tr><tr><td><strong>Lattice energy</strong></td><td><code>120250 × Ions per formula unit × Charge of the cation × Charge of the anion ÷ (Radius of the cation+Radius of the anion) × (1-34.5 ÷ (Radius of the cation+Radius of the anion))</code></td></tr><tr><td><strong>Lattice energy per ion</strong></td><td><code>120250 × Ions per formula unit × Charge of the cation × Charge of the anion ÷ (Radius of the cation+Radius of the anion) × (1-34.5 ÷ (Radius of the cation+Radius of the anion)) ÷ Ions per formula unit</code></td></tr><tr><td><strong>Charge of the cation</strong></td><td><code>Lattice energy ÷ (120250 × Ions per formula unit × Charge of the anion ÷ (Radius of the cation+Radius of the anion) × (1-34.5 ÷ (Radius of the cation+Radius of the anion)))</code></td></tr><tr><td><strong>Charge of the anion</strong></td><td><code>Lattice energy ÷ (120250 × Ions per formula unit × Charge of the cation ÷ (Radius of the cation+Radius of the anion) × (1-34.5 ÷ (Radius of the cation+Radius of the anion)))</code></td></tr><tr><td><strong>Ions per formula unit</strong></td><td><code>Lattice energy ÷ (120250 × Charge of the cation × Charge of the anion ÷ (Radius of the cation+Radius of the anion) × (1-34.5 ÷ (Radius of the cation+Radius of the anion)))</code></td></tr></tbody></table><p><p>The first factor counts the electrostatic attraction — charge products and ion count over distance — and the bracket in 34.5/r corrects for the repulsion of the electron clouds as they touch. That bracket is why the energy does not rise quite as fast as 1/r suggests.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports lattice energy and internuclear distance and lattice energy per ion.</p><ul><li><strong>Charge of the cation</strong>. Magnitude only: 1 for Na⁺, 2 for Ca²⁺</li><li><strong>Charge of the anion</strong>. Magnitude only: 1 for Cl⁻, 2 for O²⁻</li><li><strong>Ions per formula unit</strong>. Two for NaCl, three for CaCl₂</li><li><strong>Radius of the cation</strong> — in pm. Sodium is 102 pm</li><li><strong>Radius of the anion</strong> — in pm. Chloride is 181 pm</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Lattice energy</strong> — in kJ/mol</li><li><strong>Internuclear distance</strong> — in pm</li><li><strong>Lattice energy per ion</strong> — in kJ/mol</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Charge of the cation = 1, Charge of the anion = 1, Ions per formula unit = 2, Radius of the cation = 102 pm, Radius of the anion = 181 pm — and the results panel reads:</p><ul><li><strong>Lattice energy</strong> = <code>120250 × Ions per formula unit × Charge of the cation × Charge of the anion ÷ (Radius of the cation+Radius of the anion) × (1-34.5 ÷ (Radius of the cation+Radius of the anion))</code> = <strong>746.223 kJ/mol</strong></li><li><strong>Internuclear distance</strong> = <code>Radius of the cation+Radius of the anion</code> = <strong>283 pm</strong></li><li><strong>Lattice energy per ion</strong> = <code>120250 × Ions per formula unit × Charge of the cation × Charge of the anion ÷ (Radius of the cation+Radius of the anion) × (1-34.5 ÷ (Radius of the cation+Radius of the anion)) ÷ Ions per formula unit</code> = <strong>373.111 kJ/mol</strong></li></ul><p>With the numbers written into the formula, the first result is <code>120250 × 2 × 1 × 1 ÷ (102+181) × (1-34.5 ÷ (102+181)) = 746.223</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Sodium chloride: one and one charges, two ions, and a 283 pm separation. The first factor is 850 kJ/mol and the bracket brings it to 746 — close to the Born–Haber value of 787, and about as good as an equation with no structure in it gets.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Doubling a charge quadruples the energy: magnesium oxide, with 2+ and 2−, is about five times sodium chloride's lattice energy and melts at 2 852 °C rather than 801 °C. Shrinking the ions does the same thing, less dramatically.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Lattice energy</th><th>Internuclear distance</th><th>Lattice energy per ion</th></tr></thead><tbody><tr><td><strong>Charge of the cation</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Charge of the anion</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Ions per formula unit</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−1.523 × 10<sup>-14</sup> %</td></tr><tr><td><strong>Radius of the cation</strong> +10 %</td><td>−3.01 %</td><td>+3.6 %</td><td>−3.01 %</td></tr><tr><td><strong>Radius of the anion</strong> +10 %</td><td>−5.23 %</td><td>+6.4 %</td><td>−5.23 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Charge of the cation</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Radius of the cation</strong>, at 3.6 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Charge of the cation = 2, Charge of the anion = 2, Ions per formula unit = 2, Radius of the cation = 72, Radius of the anion = 140, the page reports <strong>Lattice energy</strong> = 3 799.284 kJ/mol, <strong>Internuclear distance</strong> = 212 pm, <strong>Lattice energy per ion</strong> = 1 899.642 kJ/mol. Magnesium oxide: 3 799 kJ/mol, which is why it is refractory enough for furnace linings.</li><li>With Charge of the cation = 1, Charge of the anion = 1, Ions per formula unit = 2, Radius of the cation = 138, Radius of the anion = 181, the page reports <strong>Lattice energy</strong> = 672.382 kJ/mol, <strong>Internuclear distance</strong> = 319 pm, <strong>Lattice energy per ion</strong> = 336.191 kJ/mol. Potassium chloride, with the larger cation: 672 kJ/mol against sodium chloride's 746.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Signed charges entered.</strong> The equation takes magnitudes; a −1 for the anion makes the lattice energy negative, which no ionic solid has.</li><li><strong>Ions per formula unit miscounted.</strong> CaCl₂ has three, not two, and the energy scales directly with it.</li><li><strong>Radii in the wrong units.</strong> The 34.5 constant assumes picometres. Nanometres or angstroms give an answer that looks plausible and is wrong by a factor of ten.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Lattice energy (kJ/mol), Internuclear distance (pm), Lattice energy per ion (kJ/mol).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Radii in picometres and charges as plain numbers give kilojoules per mole, because 120 250 carries the 1/(4πε₀) and the Avogadro factor together. The internuclear distance comes back in picometres.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need charge of the cation and charge of the anion and ions per formula unit and radius of the cation and radius of the anion. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Lattice energy and internuclear distance and lattice energy per ion should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Charge of the cation</strong> ×10</td><td>746.223</td><td>7 462.23</td><td>ten times larger</td></tr><tr><td><strong>Charge of the anion</strong> ×10</td><td>746.223</td><td>7 462.23</td><td>ten times larger</td></tr><tr><td><strong>Ions per formula unit</strong> ×10</td><td>746.223</td><td>7 462.23</td><td>ten times larger</td></tr><tr><td><strong>Radius of the cation</strong> ×10</td><td>746.223</td><td>194.497</td><td>×0.261</td></tr><tr><td><strong>Radius of the anion</strong> ×10</td><td>746.223</td><td>123.515</td><td>×0.166</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It ignores structure.</strong> Kapustinskii's equation has no idea whether the salt is rock salt, caesium chloride or something else, and the real values differ by a few per cent because of it.</li><li><strong>It needs ionic radii.</strong> Those are themselves estimated, and the answer inherits their uncertainty.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ranking salts by melting point before measuring one.</li></li><li><li>Estimating a lattice energy when a Born–Haber cycle has missing data.</li></li><li><li>Showing why 2+ / 2− salts are so refractory.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/percent-ionic-character">Percent ionic character</a> <a href="/chemistry/effective-charge">Effective nuclear charge</a> <a href="/chemistry/cubic-cell">Cubic cell</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lattice Energy calculator work out?', 'a' => <<<'TXT'
            It returns lattice energy and internuclear distance and lattice energy per ion from charge of the cation and charge of the anion and ions per formula unit and radius of the cation and radius of the anion. The relationship is Radius of the cation+Radius of the anion.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Charge of the cation, Charge of the anion, Ions per formula unit, Radius of the cation (pm), Radius of the anion (pm). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: radius of the cation in pm; radius of the anion in pm. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why does the equation not need the crystal structure?', 'a' => <<<'TXT'
            Because Kapustinskii showed the Madelung constant divided by the ion count is nearly the same for every structure type — so a formula that ignores structure still lands within a few per cent.
            TXT],
            ['q' => 'Why is my answer smaller than the data book?', 'a' => 'The book value is usually the Born–Haber value, which is exact for that structure. Kapustinskii is an estimate, typically within about five per cent.'],
        ],
        'related' => [
            ['path' => '/chemistry/percent-ionic-character', 'name' => 'Percent ionic character'],
            ['path' => '/chemistry/effective-charge', 'name' => 'Effective nuclear charge'],
            ['path' => '/chemistry/cubic-cell', 'name' => 'Cubic cell'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
