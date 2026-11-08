<?php

/**
 * Serial Dilution Calculator
 * /chemistry/serial-dilution
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Serial Dilution Calculator',
    'meta' => ['title' => 'Serial Dilution Calculator: Concentration After Steps', 'description' => 'Follow a dilution series down its steps: the concentration after any number of transfers, the total dilution factor, and the fold change at each stage.', 'h1' => 'Serial Dilution Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'stock_conc',
                    'label' => 'Starting concentration',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '1',
                    'help' => 'Anything on a single scale — molarity, mg/mL, cells per mL',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'dilution_factor',
                    'label' => 'Dilution factor per step',
                    'type' => 'number',
                    'default' => '10',
                    'help' => '10 means one part sample plus nine parts diluent',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'steps',
                    'label' => 'Number of steps',
                    'type' => 'number',
                    'default' => '3',
                    'help' => 'Each step is a separate transfer and mix',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'final_conc',
                    'label' => 'Concentration after the last step',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L',
                ],
                [
                    'name' => 'total_factor',
                    'label' => 'Total dilution factor',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fold_dilution',
                    'label' => 'Fold dilution',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Serial Dilution',
            'results' => [
                'final_conc' => 'stock_conc/pow(dilution_factor,steps)',
                'total_factor' => 'pow(dilution_factor,steps)',
                'fold_dilution' => 'pow(dilution_factor,steps)',
                'stock_conc' => 'final_conc*pow(dilution_factor,steps)',
                'dilution_factor' => 'pow(stock_conc/final_conc,1/steps)',
                'steps' => 'log(stock_conc/final_conc)/log(dilution_factor)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Each step in a serial dilution multiplies the concentration by 1 ÷ D, where D is the dilution factor of that step. After n steps, <strong>C<sub>n</sub> = C₀ ÷ D<sup>n</sup></strong>. This page reports the final concentration and the cumulative factor.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Serial dilution is how a 1 M stock becomes a workable 1 mM solution in three transfers instead of one enormous flask. Each step is more accurate than a single thousand-fold dilution, because the volumes stay in the range a pipette measures well.</p><p>The page reports <strong>concentration after the last step and total dilution factor and fold dilution</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Concentration after the last step</strong></td><td><code>Starting concentration ÷ (Dilution factor per step)^Number of steps</code></td></tr><tr><td><strong>Total dilution factor</strong></td><td><code>(Dilution factor per step)^Number of steps</code></td></tr><tr><td><strong>Fold dilution</strong></td><td><code>(Dilution factor per step)^Number of steps</code></td></tr><tr><td><strong>Starting concentration</strong></td><td><code>Concentration after the last step × (Dilution factor per step)^Number of steps</code></td></tr><tr><td><strong>Dilution factor per step</strong></td><td><code>(Starting concentration ÷ Concentration after the last step)^1 ÷ Number of steps</code></td></tr><tr><td><strong>Number of steps</strong></td><td><code>ln(Starting concentration ÷ Concentration after the last step) ÷ ln(Dilution factor per step)</code></td></tr></tbody></table><p><p>The factors multiply, so the exponents add: three ten-fold steps is a thousand-fold dilution, not thirty-fold. That is the arithmetic error the page exists to prevent.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports concentration after the last step and total dilution factor and fold dilution.</p><ul><li><strong>Starting concentration</strong> — in mol/L. Anything on a single scale — molarity, mg/mL, cells per mL</li><li><strong>Dilution factor per step</strong>. 10 means one part sample plus nine parts diluent</li><li><strong>Number of steps</strong>. Each step is a separate transfer and mix</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Concentration after the last step</strong> — in mol/L</li><li><strong>Total dilution factor</strong></li><li><strong>Fold dilution</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Starting concentration = 1 mol/L, Dilution factor per step = 10, Number of steps = 3 — and the results panel reads:</p><ul><li><strong>Concentration after the last step</strong> = <code>Starting concentration ÷ (Dilution factor per step)^Number of steps</code> = <strong>0.001 mol/L</strong></li><li><strong>Total dilution factor</strong> = <code>(Dilution factor per step)^Number of steps</code> = <strong>1 000</strong></li><li><strong>Fold dilution</strong> = <code>(Dilution factor per step)^Number of steps</code> = <strong>1 000</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 ÷ pow(10,3) = 0.001</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>1 mol/L through three ten-fold steps: 1 ÷ 10³ = 0.001 mol/L, with a total factor of 1000. The intermediate solutions are 0.1 and 0.01 mol/L, which is what a dilution series plate actually holds.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Keep the final concentration inside the measuring range of your assay. A ten-fold series run one step too far lands below the detection limit, and the result is a blank rather than a low reading.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Concentration after the last step</th><th>Total dilution factor</th><th>Fold dilution</th></tr></thead><tbody><tr><td><strong>Starting concentration</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Dilution factor per step</strong> +10 %</td><td>−24.87 %</td><td>+33.1 %</td><td>+33.1 %</td></tr><tr><td><strong>Number of steps</strong> +10 %</td><td>−49.88 %</td><td>+99.53 %</td><td>+99.53 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Number of steps</strong>: a ten per cent move there shifts the result by about 99.5 per cent. The least sensitive is <strong>Starting concentration</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Starting concentration = 0.5, Dilution factor per step = 2, Number of steps = 5, the page reports <strong>Concentration after the last step</strong> = 0.016 mol/L, <strong>Total dilution factor</strong> = 32, <strong>Fold dilution</strong> = 32. Five doubling dilutions take 0.5 mol/L down to 0.0156 mol/L — the classic two-fold series for a titration or an ELISA.</li><li>With Starting concentration = 100, Dilution factor per step = 100, Number of steps = 2, the page reports <strong>Concentration after the last step</strong> = 0.01 mol/L, <strong>Total dilution factor</strong> = 10 000, <strong>Fold dilution</strong> = 10 000. Two hundred-fold steps give a total of ten thousand, so 100 mg/mL becomes 0.01 mg/mL.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Factors added instead of multiplied.</strong> Ten three times is a thousand, not thirty — the single commonest serial-dilution mistake.</li><li><strong>Carry-over between steps.</strong> A tip that is not changed leaves a few microlitres of the previous, stronger solution in the next tube.</li><li><strong>Step count off by one.</strong> The stock itself is step zero; diluting it once is one step, not two.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Concentration after the last step (mol/L), Total dilution factor, Fold dilution.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The concentration comes back in whatever unit went in, because only the factor and the step count do any work. The dilution factors and the fold figure are plain numbers.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need starting concentration and dilution factor per step and number of steps. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Concentration after the last step and total dilution factor and fold dilution should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Starting concentration</strong> ×10</td><td>0.001</td><td>0.01</td><td>ten times larger</td></tr><tr><td><strong>Dilution factor per step</strong> ×10</td><td>0.001</td><td>1 × 10<sup>-6</sup></td><td>×0.001</td></tr><tr><td><strong>Number of steps</strong> ×10</td><td>0.001</td><td>1 × 10<sup>-30</sup></td><td>×1 × 10<sup>-27</sup></td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes perfect mixing and exact volumes.</strong> Real pipettes carry a per cent or so of error that compounds with the step count.</li><li><strong>It ignores the detection limit.</strong> Whether the final solution can be measured is an analytical question, not an arithmetic one.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Planning a standard curve's concentration series.</li></li><li><li>Getting a working concentration from a concentrated stock.</li></li><li><li>Checking a serial dilution someone else has designed.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/solution-dilution">Solution dilution</a> <a href="/chemistry/dilution-factor">Dilution factor</a> <a href="/chemistry/alligation">Alligation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Serial Dilution calculator work out?', 'a' => <<<'TXT'
            It returns concentration after the last step and total dilution factor and fold dilution from starting concentration and dilution factor per step and number of steps. The relationship is Starting concentration ÷ (Dilution factor per step)^Number of steps.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Starting concentration (mol/L), Dilution factor per step, Number of steps. Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: starting concentration in mol/L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Is a 1:10 dilution a dilution factor of 10 or 9?', 'a' => 'Ten. The factor is final volume divided by sample volume — one part sample into nine parts diluent is 1 in 10, a factor of 10.'],
            ['q' => 'How many steps do I need for a million-fold dilution?', 'a' => 'Six ten-fold steps. The page\'s step box accepts up to 20, and the total factor shows the cumulative result as you go.'],
        ],
        'related' => [
            ['path' => '/chemistry/solution-dilution', 'name' => 'Solution dilution'],
            ['path' => '/chemistry/dilution-factor', 'name' => 'Dilution factor'],
            ['path' => '/chemistry/alligation', 'name' => 'Alligation'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
