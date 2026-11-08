<?php

/**
 * Mole Fraction Calculator
 * /chemistry/mole-fraction
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mole Fraction Calculator',
    'meta' => ['title' => 'Mole Fraction Calculator: x1 and x2 Fractions', 'description' => 'Work out the mole fraction of each component in a two-component mixture from their amounts in moles, and check that the two fractions add up to exactly one.', 'h1' => 'Mole Fraction Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'n1',
                    'label' => 'Moles of component 1 (n₁)',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '2',
                    'help' => 'Amount of the first substance',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'n2',
                    'label' => 'Moles of component 2 (n₂)',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '6',
                    'help' => 'Amount of the second substance',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'x1',
                    'label' => 'Mole fraction of component 1 (x₁)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'x2',
                    'label' => 'Mole fraction of component 2 (x₂)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Mole Fraction',
            'results' => ['x1' => 'n1/(n1+n2)', 'x2' => 'n2/(n1+n2)', 'n1' => 'x1*n2/(1-x1)', 'n2' => 'x2*n1/(1-x2)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The mole fraction of a component is its moles divided by the total moles, <strong>x₁ = n₁ ÷ (n₁ + n₂)</strong>. It is unitless, lies between 0 and 1, and the fractions of a mixture always add to exactly 1 — which makes it the natural variable for Raoult's law and every gas-phase calculation.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Mole fraction is what partial pressure and vapour pressure are made of. In a gas mixture the partial pressure of a component is its mole fraction times the total pressure; above a liquid mixture, the vapour pressure of each component is its mole fraction times its pure vapour pressure.</p><p>The page reports <strong>mole fraction of component 1 (x₁) and mole fraction of component 2 (x₂)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Mole fraction of component 1 (x₁)</strong></td><td><code>Moles of component 1 (n₁) ÷ (Moles of component 1 (n₁)+Moles of component 2 (n₂))</code></td></tr><tr><td><strong>Mole fraction of component 2 (x₂)</strong></td><td><code>Moles of component 2 (n₂) ÷ (Moles of component 1 (n₁)+Moles of component 2 (n₂))</code></td></tr><tr><td><strong>Moles of component 1 (n₁)</strong></td><td><code>Mole fraction of component 1 (x₁) × Moles of component 2 (n₂) ÷ (1-Mole fraction of component 1 (x₁))</code></td></tr><tr><td><strong>Moles of component 2 (n₂)</strong></td><td><code>Mole fraction of component 2 (x₂) × Moles of component 1 (n₁) ÷ (1-Mole fraction of component 2 (x₂))</code></td></tr></tbody></table><p><p>Only the ratio matters. Doubling both amounts leaves both fractions unchanged, which is why the page does not ask for a volume or a mass — the composition alone determines the answer.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports mole fraction of component 1 (x₁) and mole fraction of component 2 (x₂).</p><ul><li><strong>Moles of component 1 (n₁)</strong> — in mol. Amount of the first substance</li><li><strong>Moles of component 2 (n₂)</strong> — in mol. Amount of the second substance</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Mole fraction of component 1 (x₁)</strong></li><li><strong>Mole fraction of component 2 (x₂)</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Moles of component 1 (n₁) = 2 mol, Moles of component 2 (n₂) = 6 mol — and the results panel reads:</p><ul><li><strong>Mole fraction of component 1 (x₁)</strong> = <code>Moles of component 1 (n₁) ÷ (Moles of component 1 (n₁)+Moles of component 2 (n₂))</code> = <strong>0.25</strong></li><li><strong>Mole fraction of component 2 (x₂)</strong> = <code>Moles of component 2 (n₂) ÷ (Moles of component 1 (n₁)+Moles of component 2 (n₂))</code> = <strong>0.75</strong></li></ul><p>With the numbers written into the formula, the first result is <code>2 ÷ (2+6) = 0.25</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>2 mol of one component and 6 mol of another is 2 ÷ 8 = 0.25 and 6 ÷ 8 = 0.75. Those two fractions would give partial pressures of 0.25 atm and 0.75 atm in a gas at one atmosphere.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check that the two results add to 1: they must, to the last digit the page prints. A total that is off by a few per cent means the numbers were rounded before they were entered, not that the arithmetic is wrong.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Mole fraction of component 1 (x₁)</th><th>Mole fraction of component 2 (x₂)</th></tr></thead><tbody><tr><td><strong>Moles of component 1 (n₁)</strong> +10 %</td><td>+7.32 %</td><td>−2.44 %</td></tr><tr><td><strong>Moles of component 2 (n₂)</strong> +10 %</td><td>−6.98 %</td><td>+2.33 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Moles of component 1 (n₁)</strong>: a ten per cent move there shifts the result by about 7.3 per cent. The least sensitive is <strong>Moles of component 2 (n₂)</strong>, at 7 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Moles of component 1 (n₁) = 1, Moles of component 2 (n₂) = 1, the page reports <strong>Mole fraction of component 1 (x₁)</strong> = 0.5, <strong>Mole fraction of component 2 (x₂)</strong> = 0.5. Equal amounts give equal fractions — an equimolar mixture, 0.5 and 0.5.</li><li>With Moles of component 1 (n₁) = 0.02, Moles of component 2 (n₂) = 9.98, the page reports <strong>Mole fraction of component 1 (x₁)</strong> = 0.002, <strong>Mole fraction of component 2 (x₂)</strong> = 0.998. A dilute solute: 0.002 mole fraction, which is 2 parts per thousand.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Mass used as moles.</strong> A mixture that is 50 % by mass is rarely 50 % by mole, because the molecules differ in mass.</li><li><strong>A third component ignored.</strong> The fractions of a three-component mixture are computed over the total of all three; this page handles two.</li><li><strong>Fractions reported as percentages.</strong> 0.25 and 25 % are the same composition, but the arithmetic downstream expects one or the other.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Mole fraction of component 1 (x₁), Mole fraction of component 2 (x₂).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Mole fraction has no unit at all. Percent by mole is the same number times a hundred; parts per million is the same number times a million.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need moles of component 1 (n₁) and moles of component 2 (n₂). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Mole fraction of component 1 (x₁) and mole fraction of component 2 (x₂) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Moles of component 1 (n₁)</strong> ×10</td><td>0.25</td><td>0.769</td><td>×3.077</td></tr><tr><td><strong>Moles of component 2 (n₂)</strong> ×10</td><td>0.25</td><td>0.032</td><td>×0.129</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It describes composition, not behaviour.</strong> Two mixtures with identical mole fractions can behave completely differently if the components interact.</li><li><strong>It is limited to two components.</strong> For three or more, total the moles of all components and divide each by that total.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Partial pressures in a gas mixture.</li></li><li><li>Raoult's law and vapour pressure above a liquid mixture.</li></li><li><li>Expressing the composition of an alloy, a solvent blend or a distillate.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/mass-percent">Mass percent</a> <a href="/chemistry/partial-pressure">Partial pressure</a> <a href="/chemistry/raoults-law">Raoult&#x27;s law</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mole Fraction calculator work out?', 'a' => <<<'TXT'
            It returns mole fraction of component 1 (x₁) and mole fraction of component 2 (x₂) from moles of component 1 (n₁) and moles of component 2 (n₂). The relationship is Moles of component 1 (n₁) ÷ (Moles of component 1 (n₁)+Moles of component 2 (n₂)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Moles of component 1 (n₁) (mol), Moles of component 2 (n₂) (mol). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: moles of component 1 (n₁) in mol; moles of component 2 (n₂) in mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Do the mole fractions always add to one?', 'a' => 'Yes, by definition, because each is a share of the same total. If they do not, one of the amounts you typed is wrong or a component was left out.'],
            ['q' => 'How is mole fraction different from mass percent?', 'a' => <<<'TXT'
            Mass percent divides by mass, mole fraction divides by moles. For a mixture of water and ethanol the two differ substantially because a mole of ethanol weighs 46 g and a mole of water 18 g.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/mass-percent', 'name' => 'Mass percent'],
            ['path' => '/chemistry/partial-pressure', 'name' => 'Partial pressure'],
            ['path' => '/chemistry/raoults-law', 'name' => 'Raoult\'s law'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
