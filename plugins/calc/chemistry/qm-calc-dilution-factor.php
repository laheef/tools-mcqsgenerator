<?php

/**
 * Dilution Factor Calculator
 * /chemistry/dilution-factor
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dilution Factor Calculator',
    'meta' => ['title' => 'Dilution Factor Calculator: V2 over V1 Volumes', 'description' => 'Work out the dilution factor from the sample and final volumes, the diluent to add, and the fraction of the original concentration left in the tube itself.', 'h1' => 'Dilution Factor Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'initial_volume',
                    'label' => 'Volume of sample',
                    'type' => 'number',
                    'suffix' => 'mL',
                    'default' => '1',
                    'help' => 'How much of the stock went in',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'final_volume',
                    'label' => 'Final volume',
                    'type' => 'number',
                    'suffix' => 'mL',
                    'default' => '10',
                    'help' => 'The volume it was made up to',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'dilution_factor',
                    'label' => 'Dilution factor',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '×',
                ],
                [
                    'name' => 'diluent_volume',
                    'label' => 'Diluent to add',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mL',
                ],
                [
                    'name' => 'fraction_remaining',
                    'label' => 'Fraction of the original concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Dilution Factor',
            'results' => [
                'dilution_factor' => 'final_volume/initial_volume',
                'diluent_volume' => 'final_volume-initial_volume',
                'fraction_remaining' => 'initial_volume/final_volume',
                'initial_volume' => 'final_volume/dilution_factor',
                'final_volume' => 'initial_volume*dilution_factor',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A dilution factor is the ratio of the final volume to the volume of sample it contains: <strong>DF = V<sub>final</sub> ÷ V<sub>sample</sub></strong>. A 1 in 10 dilution has a factor of 10, and the concentration of the original is ten times the concentration of the result — which is why every serial dilution is a chain of factors multiplied together.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The dilution factor is the number written on a tube and used weeks later to correct an instrument reading. Getting it wrong is silent: the assay still reports a number, just one that is off by the factor you miscounted.</p><p>The page reports <strong>dilution factor and diluent to add and fraction of the original concentration</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Dilution factor</strong></td><td><code>Final volume ÷ Volume of sample</code></td></tr><tr><td><strong>Diluent to add</strong></td><td><code>Final volume-Volume of sample</code></td></tr><tr><td><strong>Fraction of the original concentration</strong></td><td><code>Volume of sample ÷ Final volume</code></td></tr><tr><td><strong>Volume of sample</strong></td><td><code>Final volume ÷ Dilution factor</code></td></tr><tr><td><strong>Final volume</strong></td><td><code>Volume of sample × Dilution factor</code></td></tr></tbody></table><p><p>Two conventions coexist: a 1:10 dilution means one part sample in ten parts total (factor 10), while a 1:9 dilution means one part sample plus nine parts diluent — which is also a factor of 10. This page uses volumes, so the ambiguity never arises.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports dilution factor and diluent to add and fraction of the original concentration.</p><ul><li><strong>Volume of sample</strong> — in mL. How much of the stock went in</li><li><strong>Final volume</strong> — in mL. The volume it was made up to</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Dilution factor</strong> — in ×</li><li><strong>Diluent to add</strong> — in mL</li><li><strong>Fraction of the original concentration</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Volume of sample = 1 mL, Final volume = 10 mL — and the results panel reads:</p><ul><li><strong>Dilution factor</strong> = <code>Final volume ÷ Volume of sample</code> = <strong>10 ×</strong></li><li><strong>Diluent to add</strong> = <code>Final volume-Volume of sample</code> = <strong>9 mL</strong></li><li><strong>Fraction of the original concentration</strong> = <code>Volume of sample ÷ Final volume</code> = <strong>0.1</strong></li></ul><p>With the numbers written into the formula, the first result is <code>10 ÷ 1 = 10</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>1 mL made up to 10 mL is a dilution factor of 10, with 9 mL of diluent added and a tenth of the original concentration left in the tube. Three such steps in a row give a factor of 1 000.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>The fraction remaining is the number an assay reading is multiplied by to recover the original concentration. A reading of 0.4 absorbance taken on a 1-in-10 dilution corresponds to a 4-fold stronger original, if the response is linear.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Dilution factor</th><th>Diluent to add</th><th>Fraction of the original concentration</th></tr></thead><tbody><tr><td><strong>Volume of sample</strong> +10 %</td><td>−9.09 %</td><td>−1.11 %</td><td>+10 %</td></tr><tr><td><strong>Final volume</strong> +10 %</td><td>+10 %</td><td>+11.11 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Final volume</strong>: a ten per cent move there shifts the result by about 11.1 per cent. The least sensitive is <strong>Volume of sample</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Volume of sample = 0.5, Final volume = 10, the page reports <strong>Dilution factor</strong> = 20 ×, <strong>Diluent to add</strong> = 9.5 mL, <strong>Fraction of the original concentration</strong> = 0.05. 0.5 mL in 10 mL is a 20-fold dilution, a common serum dilution for immunoassays.</li><li>With Volume of sample = 1, Final volume = 2, the page reports <strong>Dilution factor</strong> = 2 ×, <strong>Diluent to add</strong> = 1 mL, <strong>Fraction of the original concentration</strong> = 0.5. A twofold dilution is the smallest step worth making accurately.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Diluent volume entered as final volume.</strong> Adding 9 mL of water to 1 mL of sample gives 10 mL; the box wants the 10, not the 9.</li><li><strong>Pipetting error at small volumes.</strong> A 1 µL pipette into 1 mL carries a relative error ten times larger than a 10 µL into 1 mL.</li><li><strong>Forgetting the factor later.</strong> The factor belongs on the tube, not in memory; the page is a check on that note.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Dilution factor (×), Diluent to add (mL), Fraction of the original concentration.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The volumes only need to be in the same unit. Microlitres into millilitres are fine as long as both boxes are converted — and the ratio, unlike the result, is unitless.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need volume of sample and final volume. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Dilution factor and diluent to add and fraction of the original concentration should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Volume of sample</strong> ×10</td><td>10</td><td>1</td><td>ten times smaller</td></tr><tr><td><strong>Final volume</strong> ×10</td><td>10</td><td>100</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes the volumes are additive.</strong> A large volume of a concentrated stock in a small volume of water can leave the final volume short of the sum.</li><li><strong>It does not account for the assay's own dilution.</strong> A plate reader that takes up 200 µL has its own factor; multiply the two.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Recording what a dilution actually was, on the tube and in the notebook.</li></li><li><li>Correcting an instrument reading back to the original concentration.</li></li><li><li>Planning a dilution series so each step is a manageable volume.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/solution-dilution">Solution dilution</a> <a href="/chemistry/serial-dilution">Serial dilution</a> <a href="/chemistry/molarity">Molarity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dilution Factor calculator work out?', 'a' => <<<'TXT'
            It returns dilution factor and diluent to add and fraction of the original concentration from volume of sample and final volume. The relationship is Final volume ÷ Volume of sample.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Volume of sample (mL), Final volume (mL). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: volume of sample in mL; final volume in mL. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Is 1:10 the same as a 10-fold dilution?', 'a' => <<<'TXT'
            In most laboratory usage, yes: one part in ten total is a factor of 10. But a 1:10 written by a pharmacologist sometimes means one part plus nine of diluent, which is also a factor of 10 — the two readings coincide here, and it is the 1:1 ratios where they do not.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/solution-dilution', 'name' => 'Solution dilution'],
            ['path' => '/chemistry/serial-dilution', 'name' => 'Serial dilution'],
            ['path' => '/chemistry/molarity', 'name' => 'Molarity'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
