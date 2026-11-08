<?php

/**
 * Solution Dilution Calculator
 * /chemistry/solution-dilution
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Solution Dilution Calculator',
    'meta' => ['title' => 'Solution Dilution Calculator: C1 V1 = C2 V2', 'description' => 'Dilute a stock to a target strength: enter the stock concentration and the volumes to get the strength you end up with, or the volume you must take out.', 'h1' => 'Solution Dilution Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'c1',
                    'label' => 'Stock concentration (C₁)',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '2',
                    'help' => 'Strength of the solution in the bottle',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'v1',
                    'label' => 'Volume taken (V₁)',
                    'type' => 'number',
                    'suffix' => 'mL',
                    'default' => '50',
                    'help' => 'How much stock is pipetted out',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'v2',
                    'label' => 'Final volume (V₂)',
                    'type' => 'number',
                    'suffix' => 'mL',
                    'default' => '500',
                    'help' => 'The volume it is made up to',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'c2',
                    'label' => 'Diluted concentration (C₂)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L',
                ],
                [
                    'name' => 'c2_mm',
                    'label' => 'Diluted concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mmol/L',
                ],
                [
                    'name' => 'diluent_volume',
                    'label' => 'Diluent to add',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mL',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Solution Dilution',
            'results' => [
                'c2' => 'c1*v1/v2',
                'c2_mm' => 'c1*v1/v2*1000',
                'diluent_volume' => 'v2-v1',
                'c1' => 'c2*v2/v1',
                'v1' => 'c2*v2/c1',
                'v2' => 'c1*v1/c2',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Dilution conserves the amount of solute, so the product of concentration and volume is the same before and after: <strong>C₁V₁ = C₂V₂</strong>. Enter the stock strength and either pair of volumes and the page returns whatever is missing — the diluted concentration, the volume to take, or the volume to make it up to.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>This is the single most-used equation in a laboratory. Almost nothing is used at the strength it is bought at; almost everything is a dilution of a stock, and the amount of solute is what has to be preserved.</p><p>The page reports <strong>diluted concentration (mol/L) and diluted concentration (mmol/L) and diluent to add</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Diluted concentration (mol per L)</strong></td><td><code>Stock concentration (C₁) × Volume taken (V₁) ÷ Final volume (V₂)</code></td></tr><tr><td><strong>Diluted concentration (mmol per L)</strong></td><td><code>Stock concentration (C₁) × Volume taken (V₁) ÷ Final volume (V₂) × 1000</code></td></tr><tr><td><strong>Diluent to add</strong></td><td><code>Final volume (V₂)-Volume taken (V₁)</code></td></tr><tr><td><strong>Stock concentration (C₁)</strong></td><td><code>Diluted concentration (mol per L) × Final volume (V₂) ÷ Volume taken (V₁)</code></td></tr><tr><td><strong>Volume taken (V₁)</strong></td><td><code>Diluted concentration (mol per L) × Final volume (V₂) ÷ Stock concentration (C₁)</code></td></tr><tr><td><strong>Final volume (V₂)</strong></td><td><code>Stock concentration (C₁) × Volume taken (V₁) ÷ Diluted concentration (mol per L)</code></td></tr></tbody></table><p><p>Any consistent unit of concentration works, and any consistent unit of volume works, because both sides are products. That is why a method can mix molarity with millilitres without converting anything — but not molarity with milligrams.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports diluted concentration (mol/L) and diluted concentration (mmol/L) and diluent to add.</p><ul><li><strong>Stock concentration (C₁)</strong> — in mol/L. Strength of the solution in the bottle</li><li><strong>Volume taken (V₁)</strong> — in mL. How much stock is pipetted out</li><li><strong>Final volume (V₂)</strong> — in mL. The volume it is made up to</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Diluted concentration (C₂)</strong> — in mol/L</li><li><strong>Diluted concentration</strong> — in mmol/L</li><li><strong>Diluent to add</strong> — in mL</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Stock concentration (C₁) = 2 mol/L, Volume taken (V₁) = 50 mL, Final volume (V₂) = 500 mL — and the results panel reads:</p><ul><li><strong>Diluted concentration (C₂)</strong> = <code>Stock concentration (C₁) × Volume taken (V₁) ÷ Final volume (V₂)</code> = <strong>0.2 mol/L</strong></li><li><strong>Diluted concentration</strong> = <code>Stock concentration (C₁) × Volume taken (V₁) ÷ Final volume (V₂) × 1000</code> = <strong>200 mmol/L</strong></li><li><strong>Diluent to add</strong> = <code>Final volume (V₂)-Volume taken (V₁)</code> = <strong>450 mL</strong></li></ul><p>With the numbers written into the formula, the first result is <code>2 × 50 ÷ 500 = 0.2</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>50 mL of 2 M stock made up to 500 mL gives 0.2 mol/L — a tenfold dilution. 450 mL of diluent was added, and the second result confirms the strength in millimoles: 200 mmol/L.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>The ratio V₂ ÷ V₁ is the dilution factor, so the answer can always be checked against it: a tenfold dilution is a tenth of the strength, and the concentration should be one decimal place different, not two.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Diluted concentration (C₂)</th><th>Diluted concentration</th><th>Diluent to add</th></tr></thead><tbody><tr><td><strong>Stock concentration (C₁)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Volume taken (V₁)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−1.11 %</td></tr><tr><td><strong>Final volume (V₂)</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+11.11 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Final volume (V₂)</strong>: a ten per cent move there shifts the result by about 11.1 per cent. The least sensitive is <strong>Volume taken (V₁)</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Stock concentration (C₁) = 1, Volume taken (V₁) = 1, Final volume (V₂) = 1 000, the page reports <strong>Diluted concentration (C₂)</strong> = 0.001 mol/L, <strong>Diluted concentration</strong> = 1 mmol/L, <strong>Diluent to add</strong> = 999 mL. 1 mL of 1 M into a litre is 1 mmol/L — a thousandfold dilution.</li><li>With Stock concentration (C₁) = 0.1, Volume taken (V₁) = 10, Final volume (V₂) = 10, the page reports <strong>Diluted concentration (C₂)</strong> = 0.1 mol/L, <strong>Diluted concentration</strong> = 100 mmol/L, <strong>Diluent to add</strong> = 0 mL. Taking the whole volume leaves the concentration unchanged, which is a useful check that the formula is oriented correctly.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Diluent volume used as final volume.</strong> Adding 450 mL to 50 mL gives 500 mL; adding 500 mL gives 550 mL and a slightly weaker solution than intended.</li><li><strong>Mixing concentration units.</strong> C₁ in mol/L and C₂ in g/L breaks the equation silently.</li><li><strong>Assuming volumes add.</strong> Ethanol and water famously do not; make up to the mark rather than trusting the arithmetic of volumes.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Diluted concentration (C₂) (mol/L), Diluted concentration (mmol/L), Diluent to add (mL).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Concentrations must share a unit across C₁ and C₂, and volumes must share a unit across V₁ and V₂. The two pairs do not have to match each other.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need stock concentration (C₁) and volume taken (V₁) and final volume (V₂). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Diluted concentration (mol/l) and diluted concentration (mmol/l) and diluent to add should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Stock concentration (C₁)</strong> ×10</td><td>0.2</td><td>2</td><td>ten times larger</td></tr><tr><td><strong>Volume taken (V₁)</strong> ×10</td><td>0.2</td><td>2</td><td>ten times larger</td></tr><tr><td><strong>Final volume (V₂)</strong> ×10</td><td>0.2</td><td>0.02</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes the solute is conserved.</strong> If the stock is a suspension or a volatile solute, the real concentration after dilution is lower.</li><li><strong>It says nothing about activity.</strong> Doubling the dilution does not halve the activity coefficient in a non-ideal solution.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Making a working solution from a concentrated stock.</li></li><li><li>Working out what concentration a given pipetting scheme will produce.</li></li><li><li>Scaling a method up or down while keeping the same final strength.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/dilution-factor">Dilution factor</a> <a href="/chemistry/serial-dilution">Serial dilution</a> <a href="/chemistry/molarity">Molarity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Solution Dilution calculator work out?', 'a' => <<<'TXT'
            It returns diluted concentration (mol/L) and diluted concentration (mmol/L) and diluent to add from stock concentration (C₁) and volume taken (V₁) and final volume (V₂). The relationship is Stock concentration (C₁) × Volume taken (V₁) ÷ Final volume (V₂).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Stock concentration (C₁) (mol/L), Volume taken (V₁) (mL), Final volume (V₂) (mL). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: stock concentration (C₁) in mol/L; volume taken (V₁) in mL; final volume (V₂) in mL. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What if I know the concentration I want but not the volume to take?', 'a' => 'Clear the V₁ box and enter the target concentration as C₂. The page solves for the volume directly: V₁ = C₂V₂ ÷ C₁.'],
            ['q' => 'Does this work for percent solutions?', 'a' => 'Yes, as long as both concentrations are in the same percent convention. Percent w/v and molarity cannot be mixed in one equation.'],
        ],
        'related' => [
            ['path' => '/chemistry/dilution-factor', 'name' => 'Dilution factor'],
            ['path' => '/chemistry/serial-dilution', 'name' => 'Serial dilution'],
            ['path' => '/chemistry/molarity', 'name' => 'Molarity'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
