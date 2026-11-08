<?php

/**
 * Moles to Atoms Calculator
 * /chemistry/moles-to-atoms
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Moles to Atoms Calculator',
    'meta' => ['title' => 'Moles to Atoms Calculator: Avogadro\'s Count', 'description' => 'Multiply moles by Avogadro\'s number to get the molecule count, then by the number of atoms in a formula unit for the total number of atoms in the sample.', 'h1' => 'Moles to Atoms Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'moles',
                    'label' => 'Amount of substance (n)',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '0.5',
                    'help' => 'Moles of the compound',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'atoms_per_unit',
                    'label' => 'Atoms per formula unit',
                    'type' => 'number',
                    'default' => '2',
                    'help' => '2 for O₂, 3 for H₂O, 24 for C₆H₁₂O₆',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molecules',
                    'label' => 'Formula units (molecules)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'atoms',
                    'label' => 'Atoms',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Moles to Atoms',
            'results' => ['molecules' => 'moles*602214076000000000000000', 'atoms' => 'moles*602214076000000000000000*atoms_per_unit', 'moles' => 'molecules/602214076000000000000000', 'atoms_per_unit' => 'atoms/molecules'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>One mole holds Avogadro's number of particles, so the particle count is <strong>N = n × N<sub>A</sub></strong>. For a compound there are two counts worth having: the number of formula units and the number of atoms, which is that first number multiplied by how many atoms one unit contains.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Atom counts matter whenever a reaction happens at a surface, in a single molecule, or in a detector that registers individual events. The mole is a bookkeeping unit; the count is what the physics sees.</p><p>The page reports <strong>formula units (molecules) and atoms</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Formula units (molecules)</strong></td><td><code>Amount of substance (n) × 6.022 × 10<sup>23< ÷ sup></code></td></tr><tr><td><strong>Atoms</strong></td><td><code>Amount of substance (n) × 6.022 × 10<sup>23< ÷ sup> × Atoms per formula unit</code></td></tr><tr><td><strong>Amount of substance (n)</strong></td><td><code>Formula units (molecules) ÷ 6.022 × 10<sup>23< ÷ sup></code></td></tr><tr><td><strong>Atoms per formula unit</strong></td><td><code>Atoms ÷ Formula units (molecules)</code></td></tr></tbody></table><p><p>Count the atoms in the formula carefully before typing the second box: C₆H₁₂O₆ has 6 + 12 + 6 = 24 atoms, not 3. The page multiplies, it does not read formulae.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports formula units (molecules) and atoms.</p><ul><li><strong>Amount of substance (n)</strong> — in mol. Moles of the compound</li><li><strong>Atoms per formula unit</strong>. 2 for O₂, 3 for H₂O, 24 for C₆H₁₂O₆</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Formula units (molecules)</strong></li><li><strong>Atoms</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Amount of substance (n) = 0.5 mol, Atoms per formula unit = 2 — and the results panel reads:</p><ul><li><strong>Formula units (molecules)</strong> = <code>Amount of substance (n) × 6.022 × 10<sup>23< ÷ sup></code> = <strong>3.011 × 10<sup>23</sup></strong></li><li><strong>Atoms</strong> = <code>Amount of substance (n) × 6.022 × 10<sup>23< ÷ sup> × Atoms per formula unit</code> = <strong>6.022 × 10<sup>23</sup></strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.5 × 6.022 × 10<sup>23< ÷ sup> = 3.011 × 10<sup>23</sup></code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Half a mole of O₂ contains 3.011 × 10²³ molecules and 6.022 × 10²³ atoms, because each molecule carries two oxygen atoms. Notice that the atom count equals one mole's worth exactly — 0.5 mol × 2 atoms is 1 mol of atoms.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the relationship between the two results before trusting either: the atom count should be a small whole multiple of the molecule count. If it is not, the atoms-per-unit figure was typed with a decimal point in it.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Formula units (molecules)</th><th>Atoms</th></tr></thead><tbody><tr><td><strong>Amount of substance (n)</strong> +10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Atoms per formula unit</strong> +10 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Amount of substance (n)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Atoms per formula unit</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Amount of substance (n) = 1, Atoms per formula unit = 1, the page reports <strong>Formula units (molecules)</strong> = 6.022 × 10<sup>23</sup>, <strong>Atoms</strong> = 6.022 × 10<sup>23</sup>. One mole of a monatomic element is Avogadro's number of atoms — the definition.</li><li>With Amount of substance (n) = 0.25, Atoms per formula unit = 24, the page reports <strong>Formula units (molecules)</strong> = 1.506 × 10<sup>23</sup>, <strong>Atoms</strong> = 3.613 × 10<sup>24</sup>. 0.25 mol of glucose holds 6 mol of atoms in total, 24 per molecule.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting molecules as atoms.</strong> For O₂ the two differ by a factor of two — the single most common error on this page.</li><li><strong>Using the empirical formula count.</strong> C₆H₁₂O₆ and CH₂O share a ratio but not a molecule; the count per molecule depends on which one you mean.</li><li><strong>Exponent slips when typing moles.</strong> 0.001 mol is a thousand times smaller than 1 mol, and the answer inherits the error exactly.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Formula units (molecules), Atoms.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Neither result carries a unit: both are counts. They are printed in scientific notation because even a micromole runs to seventeen digits.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need amount of substance (n) and atoms per formula unit. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Formula units (molecules) and atoms should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Amount of substance (n)</strong> ×10</td><td>3.011 × 10<sup>23</sup></td><td>3.011 × 10<sup>24</sup></td><td>ten times larger</td></tr><tr><td><strong>Atoms per formula unit</strong> ×10</td><td>3.011 × 10<sup>23</sup></td><td>3.011 × 10<sup>23</sup></td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It is a count of formula units, not of distinct species.</strong> In solution a salt may be dissociated, and then the ion count, not the formula-unit count, is what reacts.</li><li><strong>It says nothing about state.</strong> The same count of molecules can be a gas, a liquid or a solid.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Working out how many molecules sit in a monolayer on a surface.</li></li><li><li>Converting a molar concentration into molecules per litre.</li></li><li><li>Checking that a stoichiometric ratio makes sense in particles as well as in moles.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/avogadro">Avogadro&#x27;s number</a> <a href="/chemistry/mole">Mole</a> <a href="/chemistry/percent-composition">Percent composition</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Moles to Atoms calculator work out?', 'a' => <<<'TXT'
            It returns formula units (molecules) and atoms from amount of substance (n) and atoms per formula unit. The relationship is Amount of substance (n) × 6.022 × 10<sup>23< ÷ sup>.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Amount of substance (n) (mol), Atoms per formula unit. Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: amount of substance (n) in mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many atoms are in a mole of a compound?', 'a' => 'Avogadro\'s number times the number of atoms in one formula unit. A mole of water holds 1.806 × 10²⁴ atoms: three per molecule.'],
        ],
        'related' => [
            ['path' => '/chemistry/avogadro', 'name' => 'Avogadro\'s number'],
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
            ['path' => '/chemistry/percent-composition', 'name' => 'Percent composition'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
