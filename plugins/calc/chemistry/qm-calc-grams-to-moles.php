<?php

/**
 * Grams to Moles Calculator
 * /chemistry/grams-to-moles
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Grams to Moles Calculator',
    'meta' => ['title' => 'Grams to Moles Calculator: g to mol and mmol', 'description' => 'Convert grams to moles with the molar mass, reported in mol, mmol and micromoles, so a protocol written at any of those scales can be followed exactly.', 'h1' => 'Grams to Moles Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'mass',
                    'label' => 'Mass (m)',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '100',
                    'help' => 'What the balance reads',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass',
                    'label' => 'Molar mass (M)',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '18.015',
                    'help' => 'Sum of the atomic masses; 18.015 for water',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'moles',
                    'label' => 'Amount (n)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
                [
                    'name' => 'millimoles',
                    'label' => 'Amount',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mmol',
                ],
                [
                    'name' => 'micromoles',
                    'label' => 'Amount',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'µmol',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Grams to Moles',
            'results' => [
                'moles' => 'mass/molar_mass',
                'millimoles' => 'mass/molar_mass*1000',
                'micromoles' => 'mass/molar_mass*1000000',
                'mass' => 'moles*molar_mass',
                'molar_mass' => 'mass/moles',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Grams and moles are the two ways of saying how much of a substance you have, and the molar mass converts between them: <strong>n = m ÷ M</strong>. This page takes the mass you weighed and the molar mass of the compound, and reports the amount in moles, millimoles and micromoles, because a bench protocol is usually written in one of the last two.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Most mistakes in a wet lab happen in this conversion, not in the reaction. A protocol asking for 2 mmol and a balance reading in grams need one exact division between them, and doing it three times at three scales is how people stop making it in their heads.</p><p>The page reports <strong>amount (mol) and amount (mmol) and amount (µmol)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Amount (mol)</strong></td><td><code>Mass (m) ÷ Molar mass (M)</code></td></tr><tr><td><strong>Amount (mmol)</strong></td><td><code>Mass (m) ÷ Molar mass (M) × 1000</code></td></tr><tr><td><strong>Amount (µmol)</strong></td><td><code>Mass (m) ÷ Molar mass (M) × 1000000</code></td></tr><tr><td><strong>Mass (m)</strong></td><td><code>Amount (mol) × Molar mass (M)</code></td></tr><tr><td><strong>Molar mass (M)</strong></td><td><code>Mass (m) ÷ Amount (mol)</code></td></tr></tbody></table><p><p>The three results are the same quantity in different units, so they move together. If the mole figure is right the millimole figure is right, and the page is only saving you the decimal point.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports amount (mol) and amount (mmol) and amount (µmol).</p><ul><li><strong>Mass (m)</strong> — in g. What the balance reads</li><li><strong>Molar mass (M)</strong> — in g/mol. Sum of the atomic masses; 18.015 for water</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Amount (n)</strong> — in mol</li><li><strong>Amount</strong> — in mmol</li><li><strong>Amount</strong> — in µmol</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass (m) = 100 g, Molar mass (M) = 18.015 g/mol — and the results panel reads:</p><ul><li><strong>Amount (n)</strong> = <code>Mass (m) ÷ Molar mass (M)</code> = <strong>5.551 mol</strong></li><li><strong>Amount</strong> = <code>Mass (m) ÷ Molar mass (M) × 1000</code> = <strong>5 550.93 mmol</strong></li><li><strong>Amount</strong> = <code>Mass (m) ÷ Molar mass (M) × 1000000</code> = <strong>5.551 × 10<sup>6</sup> µmol</strong></li></ul><p>With the numbers written into the formula, the first result is <code>100 ÷ 18.015 = 5.551</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>100 g of water is 100 ÷ 18.015 = 5.551 mol, which is 5 551 mmol or 5.55 × 10⁶ µmol. All three results describe the same beaker.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Cross-check the magnitude before anything else: molecular compounds sit in the tens to hundreds of g/mol, so a gram is a millimole to a few tens of millimoles. Salts and metals are similar. A figure a thousand times out is a molar mass entered in the wrong units, not a new compound.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Amount (n)</th><th>Amount</th><th>Amount</th></tr></thead><tbody><tr><td><strong>Mass (m)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Molar mass (M)</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Mass (m)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Molar mass (M)</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass (m) = 58.44, Molar mass (M) = 58.44, the page reports <strong>Amount (n)</strong> = 1 mol, <strong>Amount</strong> = 1 000 mmol, <strong>Amount</strong> = 1 × 10<sup>6</sup> µmol. One molar mass in grams is exactly one mole, which is the quickest check of any conversion.</li><li>With Mass (m) = 0.006, Molar mass (M) = 58.44, the page reports <strong>Amount (n)</strong> = 9.925 × 10<sup>-5</sup> mol, <strong>Amount</strong> = 0.099 mmol, <strong>Amount</strong> = 99.247 µmol. 5.8 mg of salt is about 0.1 mmol — the scale most bench protocols are written at.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Molar mass typed in kDa.</strong> A protein of 66 kDa is 66 000 g/mol; entering 66 multiplies the answer by a thousand.</li><li><strong>Mass of a solution used as mass of solute.</strong> A 10 % solution weighs ten times the solute in it.</li><li><strong>Rounding the molar mass too early.</strong> Using 18 instead of 18.015 costs 0.08 %, which matters when the answer feeds a second calculation.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Amount (n) (mol), Amount (mmol), Amount (µmol).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>mmol is 10⁻³ mol and µmol is 10⁻⁶ mol. A molar mass in g/mol with a mass in grams gives moles directly; any other mass unit has to be converted first.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass (m) and molar mass (M). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Amount (mol) and amount (mmol) and amount (µmol) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass (m)</strong> ×10</td><td>5.551</td><td>55.509</td><td>ten times larger</td></tr><tr><td><strong>Molar mass (M)</strong> ×10</td><td>5.551</td><td>0.555</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It needs the right molar mass.</strong> Hydrates, counter-ions and impurities all change it, and the page cannot see any of them.</li><li><strong>It assumes the sample is what the label says.</strong> A purity figure has to be applied to the mass before it is entered here.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Scaling a recipe written in millimoles to the grams a balance can weigh.</li></li><li><li>Preparing a stock solution of a stated molarity.</li></li><li><li>Converting a purchased vial's stated mass into the amount a protocol asks for.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/mole">Mole</a> <a href="/chemistry/molar-mass">Molar mass</a> <a href="/chemistry/moles-to-atoms">Moles to atoms</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Grams to Moles calculator work out?', 'a' => 'It returns amount (mol) and amount (mmol) and amount (µmol) from mass (m) and molar mass (M). The relationship is Mass (m) ÷ Molar mass (M).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mass (m) (g), Molar mass (M) (g/mol). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass (m) in g; molar mass (M) in g/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I go the other way — moles to grams?', 'a' => 'Multiply by the molar mass. The page does that too: type the moles into the amount box and clear the mass box, and it solves for the mass instead.'],
            ['q' => 'Does this work for gases and solutions?', 'a' => <<<'TXT'
            Yes for the mass-to-mole step; it is the same division for any substance. What changes is how you get the mass in the first place — for solutions you need the density and the strength.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
            ['path' => '/chemistry/moles-to-atoms', 'name' => 'Moles to atoms'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
