<?php

/**
 * Effective Nuclear Charge Calculator
 * /chemistry/effective-charge
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Effective Nuclear Charge Calculator',
    'meta' => ['title' => 'Effective Nuclear Charge Calculator: Slater', 'description' => 'Turn an atomic number and a shielding constant into the effective nuclear charge an outer electron feels, and into the orbital energy it then implies.', 'h1' => 'Effective Nuclear Charge Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'atomic_number',
                    'label' => 'Atomic number Z',
                    'type' => 'number',
                    'default' => '11',
                    'help' => 'Protons in the nucleus',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'shielding',
                    'label' => 'Shielding constant σ',
                    'type' => 'number',
                    'suffix' => ' ',
                    'default' => '8.8',
                    'help' => 'From Slater\'s rules; 8.8 for sodium\'s 3s electron',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'principal_n',
                    'label' => 'Principal quantum number n',
                    'type' => 'number',
                    'default' => '3',
                    'help' => '3 for the 3s electron of sodium',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'effective_charge',
                    'label' => 'Effective nuclear charge',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'orbital_energy',
                    'label' => 'Orbital energy',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'eV',
                ],
                [
                    'name' => 'ionization_energy',
                    'label' => 'Ionisation energy it predicts',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'eV',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Effective Nuclear Charge',
            'results' => [
                'effective_charge' => 'atomic_number-shielding',
                'orbital_energy' => '-13.6*pow(atomic_number-shielding,2)/pow(principal_n,2)',
                'ionization_energy' => '13.6*pow(atomic_number-shielding,2)/pow(principal_n,2)',
                'atomic_number' => 'effective_charge+shielding',
                'shielding' => 'atomic_number-effective_charge',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Inner electrons screen the nucleus, so an outer electron feels less than the full charge: <strong>Z<sub>eff</sub> = Z − σ</strong>. The page reports Z<sub>eff</sub>, the hydrogen-like energy of the orbital and the ionisation energy it predicts.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Why does sodium lose its outer electron so much more easily than neon holds its own? Both have the same number of electrons in the second shell. The answer is that sodium's eleventh proton is barely screened, while neon's tenth is not screened at all — and that difference is what Z<sub>eff</sub> measures.</p><p>The page reports <strong>effective nuclear charge and orbital energy and ionisation energy it predicts</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Effective nuclear charge</strong></td><td><code>Atomic number Z-Shielding constant σ</code></td></tr><tr><td><strong>Orbital energy</strong></td><td><code>-13.6 × (Atomic number Z-Shielding constant σ)^2 ÷ (Principal quantum number n)^2</code></td></tr><tr><td><strong>Ionisation energy it predicts</strong></td><td><code>13.6 × (Atomic number Z-Shielding constant σ)^2 ÷ (Principal quantum number n)^2</code></td></tr><tr><td><strong>Atomic number Z</strong></td><td><code>Effective nuclear charge+Shielding constant σ</code></td></tr><tr><td><strong>Shielding constant σ</strong></td><td><code>Atomic number Z-Effective nuclear charge</code></td></tr></tbody></table><p><p>Slater's rules assign 0.35 of shielding to each electron in the same shell, 0.85 to each in the shell below and a full 1.00 to everything further in. For sodium's 3s electron that is 8 × 0.85 + 2 × 1.00 = 8.8, leaving Z<sub>eff</sub> = 2.2 out of a nuclear charge of 11.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports effective nuclear charge and orbital energy and ionisation energy it predicts.</p><ul><li><strong>Atomic number Z</strong>. Protons in the nucleus</li><li><strong>Shielding constant σ</strong>. From Slater&#x27;s rules; 8.8 for sodium&#x27;s 3s electron</li><li><strong>Principal quantum number n</strong>. 3 for the 3s electron of sodium</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Effective nuclear charge</strong></li><li><strong>Orbital energy</strong> — in eV</li><li><strong>Ionisation energy it predicts</strong> — in eV</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Atomic number Z = 11, Shielding constant σ = 8.8, Principal quantum number n = 3 — and the results panel reads:</p><ul><li><strong>Effective nuclear charge</strong> = <code>Atomic number Z-Shielding constant σ</code> = <strong>2.2</strong></li><li><strong>Orbital energy</strong> = <code>-13.6 × (Atomic number Z-Shielding constant σ)^2 ÷ (Principal quantum number n)^2</code> = <strong>-7.314 eV</strong></li><li><strong>Ionisation energy it predicts</strong> = <code>13.6 × (Atomic number Z-Shielding constant σ)^2 ÷ (Principal quantum number n)^2</code> = <strong>7.314 eV</strong></li></ul><p>With the numbers written into the formula, the first result is <code>11-8.8 = 2.2</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Sodium: 11 − 8.8 = 2.2, which is the effective charge its outer electron feels. The hydrogen-like orbital energy is −13.6 × 2.2² ÷ 3² = −7.31 eV, and the ionisation energy it predicts, 7.31 eV, is close to the measured 5.14 — a good estimate from an arithmetic rule.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare Z<sub>eff</sub> across a period: it rises from about 2.2 at sodium to nearly 6 at chlorine, which is why ionisation energy and electronegativity both increase to the right, and why atomic radius falls.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Effective nuclear charge</th><th>Orbital energy</th><th>Ionisation energy it predicts</th></tr></thead><tbody><tr><td><strong>Atomic number Z</strong> +10 %</td><td>+50 %</td><td>−125 %</td><td>+125 %</td></tr><tr><td><strong>Shielding constant σ</strong> +10 %</td><td>−40 %</td><td>+64 %</td><td>−64 %</td></tr><tr><td><strong>Principal quantum number n</strong> +10 %</td><td>+0 %</td><td>+17.36 %</td><td>−17.36 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Atomic number Z</strong>: a ten per cent move there shifts the result by about 125 per cent. The least sensitive is <strong>Principal quantum number n</strong>, at 17.4 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Atomic number Z = 3, Shielding constant σ = 1.7, Principal quantum number n = 2, the page reports <strong>Effective nuclear charge</strong> = 1.3, <strong>Orbital energy</strong> = -5.746 eV, <strong>Ionisation energy it predicts</strong> = 5.746 eV. Lithium's 2s electron: Z_eff 1.3 and an orbital energy of −5.75 eV, close to its measured 5.39 eV ionisation energy.</li><li>With Atomic number Z = 17, Shielding constant σ = 10.9, Principal quantum number n = 3, the page reports <strong>Effective nuclear charge</strong> = 6.1, <strong>Orbital energy</strong> = -56.228 eV, <strong>Ionisation energy it predicts</strong> = 56.228 eV. Chlorine: Z_eff 6.1, which is nearly three times sodium's — the same shell, a much tighter hold.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Full electron count used as σ.</strong> Shielding only counts electrons closer to the nucleus than the one you are asking about, weighted by Slater's coefficients.</li><li><strong>Z<sub>eff</sub> read as the nuclear charge.</strong> It is what the electron feels, and it is always smaller than Z for an outer electron.</li><li><strong>The hydrogen-like energy taken literally.</strong> That formula is exact only for one electron; the estimate here is a first approximation.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Effective nuclear charge, Orbital energy (eV), Ionisation energy it predicts (eV).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Z and σ are plain counts and the result is too. The energies are in electronvolts, because the 13.6 eV Rydberg constant is what the hydrogen-like expression is built on.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need atomic number Z and shielding constant σ and principal quantum number n. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Effective nuclear charge and orbital energy and ionisation energy it predicts should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Atomic number Z</strong> ×10</td><td>2.2</td><td>101.2</td><td>×46</td></tr><tr><td><strong>Shielding constant σ</strong> ×10</td><td>2.2</td><td>-77</td><td>×-35</td></tr><tr><td><strong>Principal quantum number n</strong> ×10</td><td>2.2</td><td>2.2</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Slater's rules are approximate.</strong> They were fitted to the elements known in 1930 and are poorest for transition metals and for f-block elements.</li><li><strong>It is one number for one electron.</strong> Different electrons in the same atom feel different effective charges, which is why each needs its own shielding constant.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Estimating an ionisation energy without a data table.</li></li><li><li>Explaining the trend in atomic radius across a period.</li></li><li><li>Finding the shielding constant a measured ionisation energy implies.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/electronegativity">Electronegativity</a> <a href="/chemistry/atom">Atom</a> <a href="/chemistry/lattice-energy">Lattice energy</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Effective Nuclear Charge calculator work out?', 'a' => <<<'TXT'
            It returns effective nuclear charge and orbital energy and ionisation energy it predicts from atomic number Z and shielding constant σ and principal quantum number n. The relationship is Atomic number Z-Shielding constant σ.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Atomic number Z, Shielding constant σ, Principal quantum number n. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => 'It matters that every box is in the unit printed beside it: . The page converts nothing on its own, so a mixed set of units is the most common wrong answer.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is sodium\'s effective charge only 2.2 when it has 11 protons?', 'a' => 'Because ten inner electrons screen almost all of that charge. The outer electron feels roughly two units, which is why sodium ionises so easily.'],
            ['q' => 'Can I get Z_eff from an ionisation energy?', 'a' => 'Yes — rearrange the orbital energy relation: Z_eff = n × √(IE ÷ 13.6). The page\'s ionisation result is the same calculation the other way round.'],
        ],
        'related' => [
            ['path' => '/chemistry/electronegativity', 'name' => 'Electronegativity'],
            ['path' => '/chemistry/atom', 'name' => 'Atom'],
            ['path' => '/chemistry/lattice-energy', 'name' => 'Lattice energy'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
