<?php

/**
 * Raoult's Law Calculator
 * /chemistry/raoults-law
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Raoult\'s Law Calculator',
    'meta' => ['title' => 'Raoult\'s Law Calculator: Vapour Pressure Above a Mix', 'description' => 'Work out the vapour pressure of one component above an ideal mixture from its mole fraction and the pressure of the pure liquid. The formula is shown.', 'h1' => 'Raoult\'s Law Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'mole_fraction',
                    'label' => 'Mole fraction in the liquid (x)',
                    'type' => 'number',
                    'default' => '0.3',
                    'help' => 'Between 0 and 1',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pure_pressure',
                    'label' => 'Vapour pressure of the pure liquid (p°)',
                    'type' => 'number',
                    'suffix' => 'kPa',
                    'default' => '2.34',
                    'help' => 'For water at 20 °C, 2.34 kPa; for ethanol, 5.95 kPa',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'partial_pressure',
                    'label' => 'Partial vapour pressure (p)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kPa',
                ],
                [
                    'name' => 'total_pressure',
                    'label' => 'Total if the rest is the other component',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kPa',
                ],
                [
                    'name' => 'pressure_drop',
                    'label' => 'Drop from the pure liquid',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kPa',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Raoult\'s Law',
            'results' => [
                'partial_pressure' => 'mole_fraction*pure_pressure',
                'pressure_drop' => 'pure_pressure-mole_fraction*pure_pressure',
                'total_pressure' => 'mole_fraction*pure_pressure+(1-mole_fraction)*pure_pressure',
                'mole_fraction' => 'partial_pressure/pure_pressure',
                'pure_pressure' => 'partial_pressure/mole_fraction',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Raoult's law says the partial vapour pressure of a component is proportional to how much of it is present: <strong>p<sub>i</sub> = x<sub>i</sub> × p°<sub>i</sub></strong>, where x is the mole fraction in the liquid and p° the vapour pressure of the pure liquid.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Raoult's law is the simplest statement about mixtures: each component contributes vapour in proportion to its share of the surface. It is the ideal case that real mixtures are measured against, and the reference for every activity coefficient.</p><p>The page reports <strong>partial vapour pressure (p) and total if the rest is the other component and drop from the pure liquid</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Partial vapour pressure (p)</strong></td><td><code>Mole fraction in the liquid (x) × Vapour pressure of the pure liquid (p°)</code></td></tr><tr><td><strong>Drop from the pure liquid</strong></td><td><code>Vapour pressure of the pure liquid (p°)-Mole fraction in the liquid (x) × Vapour pressure of the pure liquid (p°)</code></td></tr><tr><td><strong>Total if the rest is the other component</strong></td><td><code>Mole fraction in the liquid (x) × Vapour pressure of the pure liquid (p°)+(1-Mole fraction in the liquid (x)) × Vapour pressure of the pure liquid (p°)</code></td></tr><tr><td><strong>Mole fraction in the liquid (x)</strong></td><td><code>Partial vapour pressure (p) ÷ Vapour pressure of the pure liquid (p°)</code></td></tr><tr><td><strong>Vapour pressure of the pure liquid (p°)</strong></td><td><code>Partial vapour pressure (p) ÷ Mole fraction in the liquid (x)</code></td></tr></tbody></table><p><p>The drop from the pure liquid is simply the solute's share of the surface: with 30 % of the liquid being solute, 30 % of the vapour pressure disappears. That is the mechanism behind vapour pressure lowering, the fourth colligative property.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports partial vapour pressure (p) and total if the rest is the other component and drop from the pure liquid.</p><ul><li><strong>Mole fraction in the liquid (x)</strong>. Between 0 and 1</li><li><strong>Vapour pressure of the pure liquid (p°)</strong> — in kPa. For water at 20 °C, 2.34 kPa; for ethanol, 5.95 kPa</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Partial vapour pressure (p)</strong> — in kPa</li><li><strong>Total if the rest is the other component</strong> — in kPa</li><li><strong>Drop from the pure liquid</strong> — in kPa</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mole fraction in the liquid (x) = 0.3, Vapour pressure of the pure liquid (p°) = 2.34 kPa — and the results panel reads:</p><ul><li><strong>Partial vapour pressure (p)</strong> = <code>Mole fraction in the liquid (x) × Vapour pressure of the pure liquid (p°)</code> = <strong>0.702 kPa</strong></li><li><strong>Total if the rest is the other component</strong> = <code>Mole fraction in the liquid (x) × Vapour pressure of the pure liquid (p°)+(1-Mole fraction in the liquid (x)) × Vapour pressure of the pure liquid (p°)</code> = <strong>2.34 kPa</strong></li><li><strong>Drop from the pure liquid</strong> = <code>Vapour pressure of the pure liquid (p°)-Mole fraction in the liquid (x) × Vapour pressure of the pure liquid (p°)</code> = <strong>1.638 kPa</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.3 × 2.34 = 0.702</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Water at 20 °C has a vapour pressure of 2.34 kPa. With a mole fraction of 0.3 water in an ideal mixture, its partial pressure is 0.70 kPa and the pressure has dropped by 1.64 kPa. In a sealed container, that is the difference between 70 % and 30 % relative humidity above the liquid.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check that the partial pressure is below the pure value — Raoult's law reduces vapour pressure and never raises it. A mixture with a higher vapour pressure than the pure component is showing positive deviation, and it is no longer obeying the law.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Partial vapour pressure (p)</th><th>Total if the rest is the other component</th><th>Drop from the pure liquid</th></tr></thead><tbody><tr><td><strong>Mole fraction in the liquid (x)</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−4.29 %</td></tr><tr><td><strong>Vapour pressure of the pure liquid (p°)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Vapour pressure of the pure liquid (p°)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Mole fraction in the liquid (x)</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mole fraction in the liquid (x) = 1, Vapour pressure of the pure liquid (p°) = 2.34, the page reports <strong>Partial vapour pressure (p)</strong> = 2.34 kPa, <strong>Total if the rest is the other component</strong> = 2.34 kPa, <strong>Drop from the pure liquid</strong> = 0 kPa. A pure liquid is the whole surface: the partial pressure is the pure one.</li><li>With Mole fraction in the liquid (x) = 0.02, Vapour pressure of the pure liquid (p°) = 101.3, the page reports <strong>Partial vapour pressure (p)</strong> = 2.026 kPa, <strong>Total if the rest is the other component</strong> = 101.3 kPa, <strong>Drop from the pure liquid</strong> = 99.274 kPa. A trace of a volatile solvent in a non-volatile solute: 2.03 kPa still escapes.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Mass fraction used as mole fraction.</strong> They coincide only for equal molar masses; for water and ethanol they differ by a factor of 2.5.</li><li><strong>The wrong component's pressure.</strong> Each component has its own p°, and the partial pressure of each is computed separately.</li><li><strong>Ideal behaviour assumed for a non-ideal mixture.</strong> Ethanol and water, or acetone and chloroform, deviate strongly and can form azeotropes.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Partial vapour pressure (p) (kPa), Total if the rest is the other component (kPa), Drop from the pure liquid (kPa).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Mole fraction is unitless, so the result carries the unit of the pressure you entered — kPa here. p° must be the vapour pressure at the same temperature as the mixture.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mole fraction in the liquid (x) and vapour pressure of the pure liquid (p°). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Partial vapour pressure (p) and total if the rest is the other component and drop from the pure liquid should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mole fraction in the liquid (x)</strong> ×10</td><td>0.702</td><td>7.02</td><td>ten times larger</td></tr><tr><td><strong>Vapour pressure of the pure liquid (p°)</strong> ×10</td><td>0.702</td><td>7.02</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It holds for ideal mixtures only.</strong> Strongly interacting components give positive or negative deviations, corrected by an activity coefficient.</li><li><strong>It describes the liquid surface, not the gas.</strong> The vapour phase composition needs its own calculation from the partial pressures.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Estimating the vapour pressure above a solvent mixture.</li></li><li><li>Working out how much a dissolved solid lowers a solvent's vapour pressure.</li></li><li><li>Starting point for a distillation calculation.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/partial-pressure">Partial pressure</a> <a href="/chemistry/vapor-pressure">Vapour pressure</a> <a href="/chemistry/mole-fraction">Mole fraction</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Raoult\'s Law calculator work out?', 'a' => <<<'TXT'
            It returns partial vapour pressure (p) and total if the rest is the other component and drop from the pure liquid from mole fraction in the liquid (x) and vapour pressure of the pure liquid (p°). The relationship is Mole fraction in the liquid (x) × Vapour pressure of the pure liquid (p°).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mole fraction in the liquid (x), Vapour pressure of the pure liquid (p°) (kPa). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: vapour pressure of the pure liquid (p°) in kPa. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is a positive deviation from Raoult\'s law?', 'a' => <<<'TXT'
            A mixture whose components escape more readily than the law predicts — usually because the two liquids interact less strongly with each other than with themselves. Ethanol and water are the familiar example.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/partial-pressure', 'name' => 'Partial pressure'],
            ['path' => '/chemistry/vapor-pressure', 'name' => 'Vapour pressure'],
            ['path' => '/chemistry/mole-fraction', 'name' => 'Mole fraction'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
