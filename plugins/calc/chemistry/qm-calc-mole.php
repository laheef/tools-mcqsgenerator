<?php

/**
 * Mole Calculator
 * /chemistry/mole
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mole Calculator',
    'meta' => ['title' => 'Mole Calculator: Mass to Moles and Particles', 'description' => 'Type a weighed mass and the molar mass of a substance and the calculator returns moles and a molecule count, with the formula and every rearrangement shown.', 'h1' => 'Mole Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'mass',
                    'label' => 'Mass of sample (m)',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '36.46',
                    'help' => 'Weighed mass of the substance, in grams',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass',
                    'label' => 'Molar mass (M)',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '36.46',
                    'help' => 'Mass of one mole of the substance — 36.46 for HCl, 18.015 for water',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'moles',
                    'label' => 'Amount of substance (n)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
                [
                    'name' => 'particles',
                    'label' => 'Number of particles (N)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Mole',
            'results' => ['moles' => 'mass/molar_mass', 'particles' => 'mass/molar_mass*602214076000000000000000', 'mass' => 'moles*molar_mass', 'molar_mass' => 'mass/moles'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A mole is a counting unit: 6.022 140 76 × 10²³ particles, whether those are atoms, ions or molecules. The number of moles in a sample is its mass divided by its molar mass, <strong>n = m ÷ M</strong>, and this calculator applies that one relationship in both directions — type the mass and molar mass to get moles, or type moles and one of the other two to get the missing quantity.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The arithmetic is trivial; what people come to the page for is the answer in a readable form. A mass in grams says nothing about how many particles are reacting, because atoms differ in mass. Moles put every substance on the same footing, which is why every balanced equation is written in them.</p><p>The page reports <strong>amount of substance (n) and number of particles (N)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Amount of substance (n)</strong></td><td><code>Mass of sample (m) ÷ Molar mass (M)</code></td></tr><tr><td><strong>Number of particles (N)</strong></td><td><code>Mass of sample (m) ÷ Molar mass (M) × 6.022 × 10<sup>23< ÷ sup></code></td></tr><tr><td><strong>Mass of sample (m)</strong></td><td><code>Amount of substance (n) × Molar mass (M)</code></td></tr><tr><td><strong>Molar mass (M)</strong></td><td><code>Mass of sample (m) ÷ Amount of substance (n)</code></td></tr></tbody></table><p><p>Molar mass is the bridge between the two: it carries the units g mol⁻¹, so grams divided by g mol⁻¹ leaves moles. If you only have a formula, add up the atomic masses — water is 2 × 1.008 + 15.999 = 18.015 g/mol.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports amount of substance (n) and number of particles (N).</p><ul><li><strong>Mass of sample (m)</strong> — in g. Weighed mass of the substance, in grams</li><li><strong>Molar mass (M)</strong> — in g/mol. Mass of one mole of the substance — 36.46 for HCl, 18.015 for water</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Amount of substance (n)</strong> — in mol</li><li><strong>Number of particles (N)</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass of sample (m) = 36.46 g, Molar mass (M) = 36.46 g/mol — and the results panel reads:</p><ul><li><strong>Amount of substance (n)</strong> = <code>Mass of sample (m) ÷ Molar mass (M)</code> = <strong>1 mol</strong></li><li><strong>Number of particles (N)</strong> = <code>Mass of sample (m) ÷ Molar mass (M) × 6.022 × 10<sup>23< ÷ sup></code> = <strong>6.022 × 10<sup>23</sup></strong></li></ul><p>With the numbers written into the formula, the first result is <code>36.46 ÷ 36.46 = 1</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>36.46 g of hydrogen chloride is 36.46 ÷ 36.46 = 1 mol, and that mole holds 6.022 × 10²³ HCl molecules. The values above are chosen so the answer is exactly one mole and the particle count is exactly Avogadro's number.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>The two results answer different questions. <strong>Amount of substance</strong> is the chemist's count, the one that goes into stoichiometry. <strong>Number of particles</strong> is the same quantity written as objects, which is useful for colligative properties and for anything involving a single molecule.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Amount of substance (n)</th><th>Number of particles (N)</th></tr></thead><tbody><tr><td><strong>Mass of sample (m)</strong> +10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Molar mass (M)</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p><p>Both results move in proportion to mass and both move against molar mass, so a molar mass entered 10 % too high gives an answer 9.09 % too low.</p></p><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Mass of sample (m)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Molar mass (M)</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass of sample (m) = 18.015, Molar mass (M) = 18.015, the page reports <strong>Amount of substance (n)</strong> = 1 mol, <strong>Number of particles (N)</strong> = 6.022 × 10<sup>23</sup>. One mole of water weighs 18.015 g.</li><li>With Mass of sample (m) = 180.16, Molar mass (M) = 180.16, the page reports <strong>Amount of substance (n)</strong> = 1 mol, <strong>Number of particles (N)</strong> = 6.022 × 10<sup>23</sup>. The same pattern holds for glucose: its own molar mass in grams is one mole.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Molar mass of an element mistaken for its molecule.</strong> Oxygen gas is O₂, 32.00 g/mol, not the 16.00 g/mol atomic mass. Halving the molar mass doubles the moles and nothing on the page will flag it.</li><li><strong>Percentage purity ignored.</strong> A 90 % pure sample of 36.46 g holds 0.9 mol, not 1 mol. Multiply the weighed mass by the purity before entering it.</li><li><strong>Hydrated salts.</strong> CuSO₄·5H₂O has a molar mass of 249.68 g/mol, not 159.61; the water of crystallisation counts.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Amount of substance (n) (mol), Number of particles (N).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The particle count has no unit — it is a number of objects. Written out it runs to twenty-four digits, so the page reports it in scientific notation.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass of sample (m) and molar mass (M). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Amount of substance (n) and number of particles (n) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass of sample (m)</strong> ×10</td><td>1</td><td>10</td><td>ten times larger</td></tr><tr><td><strong>Molar mass (M)</strong> ×10</td><td>1</td><td>0.1</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes a pure, identified substance.</strong> A mixture has a molar mass only if you define an average; the page has no way to know what you weighed.</li><li><strong>It cannot tell elements from compounds.</strong> Whether 32 g/mol means O₂ or S is outside the arithmetic — the number you enter is the one used.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Converting a bench weight into the amount a balanced equation asks for.</li></li><li><li>Checking a solution's strength before diluting it.</li></li><li><li>Turning a measured mass of a gas into the moles that occupy a stated volume.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/molar-mass">Molar mass</a> <a href="/chemistry/grams-to-moles">Grams to moles</a> <a href="/chemistry/avogadro">Avogadro&#x27;s number</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mole calculator work out?', 'a' => <<<'TXT'
            It returns amount of substance (n) and number of particles (N) from mass of sample (m) and molar mass (M). The relationship is Mass of sample (m) ÷ Molar mass (M).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mass of sample (m) (g), Molar mass (M) (g/mol). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass of sample (m) in g; molar mass (M) in g/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is a mole in plain terms?', 'a' => <<<'TXT'
            6.022 140 76 × 10²³ particles — the number of particles as there are atoms in 12 g of carbon-12. It is a count, not a mass, which is why the same one mole weighs different amounts in different substances.
            TXT],
            ['q' => 'Why does the page report particles as well as moles?', 'a' => <<<'TXT'
            Because two of the same question are often useful in one go. Stoichiometry wants moles; colligative properties, spectroscopy and single-molecule work want the count.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
            ['path' => '/chemistry/grams-to-moles', 'name' => 'Grams to moles'],
            ['path' => '/chemistry/avogadro', 'name' => 'Avogadro\'s number'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
