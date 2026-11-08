<?php

/**
 * Molar Mass Calculator
 * /chemistry/molar-mass
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Molar Mass Calculator',
    'meta' => ['title' => 'Molar Mass Calculator: Mass Over Moles, g/mol', 'description' => 'Divide a weighed sample by the number of moles it holds to confirm its molar mass in g/mol, then read the mass of a single molecule of the compound in grams.', 'h1' => 'Molar Mass Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'mass',
                    'label' => 'Mass of sample (m)',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '5.85',
                    'help' => 'Weighed mass, in grams',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'moles',
                    'label' => 'Amount of substance (n)',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '0.1',
                    'help' => 'Moles present in that mass',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass',
                    'label' => 'Molar mass (M)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g/mol',
                ],
                [
                    'name' => 'molecule_mass',
                    'label' => 'Mass of one molecule',
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
            'title' => 'Molar Mass',
            'results' => ['molar_mass' => 'mass/moles', 'molecule_mass' => 'mass/moles/602214076000000000000000', 'mass' => 'molar_mass*moles', 'moles' => 'mass/molar_mass'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Molar mass is the mass one mole of a substance carries, <strong>M = m ÷ n</strong>, reported in g/mol. Weigh a sample, know how many moles it contains — from a titration, from a known formula, or from the page's own mole calculator — and this one returns the molar mass and the mass of one molecule of the substance.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Molar mass is how an identity is confirmed. A compound with a formula mass of 58.44 g/mol that comes out of the arithmetic at 118.7 is not the compound the label claims — usually a hydrate, a dimer, or a salt that has picked up a counter-ion.</p><p>The page reports <strong>molar mass (M) and mass of one molecule</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Molar mass (M)</strong></td><td><code>Mass of sample (m) ÷ Amount of substance (n)</code></td></tr><tr><td><strong>Mass of one molecule</strong></td><td><code>Mass of sample (m) ÷ Amount of substance (n) ÷ 6.022 × 10<sup>23< ÷ sup></code></td></tr><tr><td><strong>Mass of sample (m)</strong></td><td><code>Molar mass (M) × Amount of substance (n)</code></td></tr><tr><td><strong>Amount of substance (n)</strong></td><td><code>Mass of sample (m) ÷ Molar mass (M)</code></td></tr></tbody></table><p><p>The calculation is a division, so it is the mass that carries the precision. A four-figure balance and a five-figure mole count give a molar mass good to four figures, whatever the display shows.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports molar mass (M) and mass of one molecule.</p><ul><li><strong>Mass of sample (m)</strong> — in g. Weighed mass, in grams</li><li><strong>Amount of substance (n)</strong> — in mol. Moles present in that mass</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Molar mass (M)</strong> — in g/mol</li><li><strong>Mass of one molecule</strong> — in g</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass of sample (m) = 5.85 g, Amount of substance (n) = 0.1 mol — and the results panel reads:</p><ul><li><strong>Molar mass (M)</strong> = <code>Mass of sample (m) ÷ Amount of substance (n)</code> = <strong>58.5 g/mol</strong></li><li><strong>Mass of one molecule</strong> = <code>Mass of sample (m) ÷ Amount of substance (n) ÷ 6.022 × 10<sup>23< ÷ sup></code> = <strong>9.714 × 10<sup>-23</sup> g</strong></li></ul><p>With the numbers written into the formula, the first result is <code>5.85 ÷ 0.1 = 58.5</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>5.85 g of sodium chloride is 0.1 mol, so the molar mass is 5.85 ÷ 0.1 = 58.5 g/mol — within 0.1 % of the tabulated 58.44. The second result divides that by Avogadro's number: 9.7 × 10⁻²³ g for a single NaCl formula unit.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the answer with the formula mass you expected. A match to within a per cent is confirmation; a ratio of exactly 2 or 3 usually means a dimer or a missing coefficient in the formula you assumed; a fraction such as 0.5 means the mole count belongs to a two-ion formula unit.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Molar mass (M)</th><th>Mass of one molecule</th></tr></thead><tbody><tr><td><strong>Mass of sample (m)</strong> +10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Amount of substance (n)</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Mass of sample (m)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Amount of substance (n)</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass of sample (m) = 18.015, Amount of substance (n) = 1, the page reports <strong>Molar mass (M)</strong> = 18.015 g/mol, <strong>Mass of one molecule</strong> = 2.991 × 10<sup>-23</sup> g. One mole of water weighs 18.015 g, so the molar mass is 18.015 g/mol.</li><li>With Mass of sample (m) = 0.5, Amount of substance (n) = 0.01, the page reports <strong>Molar mass (M)</strong> = 50 g/mol, <strong>Mass of one molecule</strong> = 8.303 × 10<sup>-23</sup> g. A 0.5 g sample containing 0.01 mol has a molar mass of 50 g/mol.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Moles taken from the mass instead of measured.</strong> If n was itself calculated from m using an assumed molar mass, dividing gives the assumption back and confirms nothing.</li><li><strong>Water of crystallisation left out of the mole count.</strong> A hydrated salt has fewer formula units per gram than the anhydrous one, so the molar mass comes out high.</li><li><strong>Mass of solution used as mass of solute.</strong> A dissolved sample weighs less than the solution it sits in; use the mass that is actually the substance.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Molar mass (M) (g/mol), Mass of one molecule (g).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>g/mol and Da are numerically identical: 58.44 g/mol is 58.44 Da. The second result is per molecule, so it is reported in grams and runs to 22 orders of magnitude below it.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass of sample (m) and amount of substance (n). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Molar mass (m) and mass of one molecule should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass of sample (m)</strong> ×10</td><td>58.5</td><td>585</td><td>ten times larger</td></tr><tr><td><strong>Amount of substance (n)</strong> ×10</td><td>58.5</td><td>5.85</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It reports an average.</strong> Natural isotopic abundance is what makes chlorine 35.45 g/mol rather than 35; a single isotopologue has a different, exact mass.</li><li><strong>It cannot identify the substance.</strong> Isomers share a molar mass exactly; the number is necessary but not sufficient.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Confirming that the solid in the bottle is what the label says.</li></li><li><li>Deriving the formula mass to use in every later stoichiometry step.</li></li><li><li>Spotting a hydrate: the difference between the answer and the formula mass, divided by 18.015, is the number of water molecules.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/mole">Mole</a> <a href="/chemistry/molecular-weight">Molecular weight</a> <a href="/chemistry/average-atomic-mass">Average atomic mass</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Molar Mass calculator work out?', 'a' => <<<'TXT'
            It returns molar mass (M) and mass of one molecule from mass of sample (m) and amount of substance (n). The relationship is Mass of sample (m) ÷ Amount of substance (n).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mass of sample (m) (g), Amount of substance (n) (mol). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass of sample (m) in g; amount of substance (n) in mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Is molar mass the same as molecular weight?', 'a' => <<<'TXT'
            Numerically yes — both are the mass of one mole in g/mol, and in daltons for a single molecule. Molar mass is the stricter term when the substance is ionic and has no discrete molecules.
            TXT],
            ['q' => 'How many decimals should I keep?', 'a' => 'As many as your mass measurement supports and no more. The page prints three decimals; the underlying value keeps full precision for any further step.'],
        ],
        'related' => [
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
            ['path' => '/chemistry/molecular-weight', 'name' => 'Molecular weight'],
            ['path' => '/chemistry/average-atomic-mass', 'name' => 'Average atomic mass'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
