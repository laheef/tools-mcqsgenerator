<?php

/**
 * Alligation Calculator
 * /chemistry/alligation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Alligation Calculator',
    'meta' => ['title' => 'Alligation Calculator: Mixing Two Strengths', 'description' => 'Find the proportions in which two solutions of different strengths must be mixed to reach a target strength, worked out by the alligation cross method.', 'h1' => 'Alligation Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'strong_percent',
                    'label' => 'Strength of the stronger solution',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '70',
                    'help' => 'Concentration in per cent, as the label states it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'weak_percent',
                    'label' => 'Strength of the weaker solution',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '0',
                    'help' => 'Use 0 for water or any diluent that carries none of the solute',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'target_percent',
                    'label' => 'Strength wanted',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '30',
                    'help' => 'Between the other two figures',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'parts_strong',
                    'label' => 'Parts of the strong solution',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'parts_weak',
                    'label' => 'Parts of the weak solution',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ratio',
                    'label' => 'Ratio of strong to weak',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Alligation',
            'results' => [
                'parts_strong' => 'target_percent-weak_percent',
                'parts_weak' => 'strong_percent-target_percent',
                'ratio' => '(target_percent-weak_percent)/(strong_percent-target_percent)',
                'strong_percent' => 'target_percent+parts_weak',
                'weak_percent' => 'target_percent-parts_strong',
                'target_percent' => 'weak_percent+parts_strong',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Alligation gives the mixing ratio directly: the parts of the strong solution are the difference between the target and the weak strength, and the parts of the weak one are the difference between the strong strength and the target. The two differences always add up to the strength gap.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Alligation is the fastest way to answer the question every pharmacy and plant asks: how much of each stock do I mix to hit this strength? It needs no volumes and no molar masses, only the three percentages.</p><p>The page reports <strong>parts of the strong solution and parts of the weak solution and ratio of strong to weak</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Parts of the strong solution</strong></td><td><code>Strength wanted-Strength of the weaker solution</code></td></tr><tr><td><strong>Parts of the weak solution</strong></td><td><code>Strength of the stronger solution-Strength wanted</code></td></tr><tr><td><strong>Ratio of strong to weak</strong></td><td><code>(Strength wanted-Strength of the weaker solution) ÷ (Strength of the stronger solution-Strength wanted)</code></td></tr><tr><td><strong>Strength of the stronger solution</strong></td><td><code>Strength wanted+Parts of the weak solution</code></td></tr><tr><td><strong>Strength of the weaker solution</strong></td><td><code>Strength wanted-Parts of the strong solution</code></td></tr><tr><td><strong>Strength wanted</strong></td><td><code>Strength of the weaker solution+Parts of the strong solution</code></td></tr></tbody></table><p><p>The cross is a weighted average written sideways. Reading diagonally: target minus weak gives parts of strong, and strong minus target gives parts of weak. The parts are volumes, not percentages, and any unit works as long as both are the same.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports parts of the strong solution and parts of the weak solution and ratio of strong to weak.</p><ul><li><strong>Strength of the stronger solution</strong> — in %. Concentration in per cent, as the label states it</li><li><strong>Strength of the weaker solution</strong> — in %. Use 0 for water or any diluent that carries none of the solute</li><li><strong>Strength wanted</strong> — in %. Between the other two figures</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Parts of the strong solution</strong></li><li><strong>Parts of the weak solution</strong></li><li><strong>Ratio of strong to weak</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Strength of the stronger solution = 70 %, Strength of the weaker solution = 0 %, Strength wanted = 30 % — and the results panel reads:</p><ul><li><strong>Parts of the strong solution</strong> = <code>Strength wanted-Strength of the weaker solution</code> = <strong>30</strong></li><li><strong>Parts of the weak solution</strong> = <code>Strength of the stronger solution-Strength wanted</code> = <strong>40</strong></li><li><strong>Ratio of strong to weak</strong> = <code>(Strength wanted-Strength of the weaker solution) ÷ (Strength of the stronger solution-Strength wanted)</code> = <strong>0.75</strong></li></ul><p>With the numbers written into the formula, the first result is <code>30-0 = 30</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>70 % alcohol diluted to 30 %: parts strong = 30 − 0 = 30, parts weak = 70 − 30 = 40. So 30 volumes of the 70 % solution with 40 volumes of water gives 70 volumes at 30 % — a 3 : 4 ratio, not 1 : 1.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Sanity-check the ratio against the target's position. A target close to the weak strength needs mostly weak solution, and a target near the middle needs roughly equal parts. If the ratio comes out the other way round, the diagonals were read in the wrong direction.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Parts of the strong solution</th><th>Parts of the weak solution</th><th>Ratio of strong to weak</th></tr></thead><tbody><tr><td><strong>Strength of the stronger solution</strong> +10 %</td><td>+0 %</td><td>+17.5 %</td><td>−14.89 %</td></tr><tr><td><strong>Strength of the weaker solution</strong> +10 %</td><td>−0.33 %</td><td>+0 %</td><td>−0.33 %</td></tr><tr><td><strong>Strength wanted</strong> +10 %</td><td>+10 %</td><td>−7.5 %</td><td>+18.92 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Strength wanted</strong>: a ten per cent move there shifts the result by about 18.9 per cent. The least sensitive is <strong>Strength of the weaker solution</strong>, at 0.3 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Strength of the stronger solution = 95, Strength of the weaker solution = 0, Strength wanted = 70, the page reports <strong>Parts of the strong solution</strong> = 70, <strong>Parts of the weak solution</strong> = 25, <strong>Ratio of strong to weak</strong> = 2.8. 70 % from 95 % stock: 70 parts stock to 25 parts diluent, a 14 : 5 ratio.</li><li>With Strength of the stronger solution = 20, Strength of the weaker solution = 5, Strength wanted = 12, the page reports <strong>Parts of the strong solution</strong> = 7, <strong>Parts of the weak solution</strong> = 8, <strong>Ratio of strong to weak</strong> = 0.875. 12 % from 20 % and 5 %: 7 parts strong with 8 parts weak, almost equal.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Volumes added without contraction.</strong> Alcohol and water shrink when mixed, so 30 mL plus 40 mL can come to less than 70 mL; make up to volume instead.</li><li><strong>Percent w/w and w/v mixed.</strong> The percentages must be the same kind — both by mass or both by volume — or the ratio is meaningless.</li><li><strong>A target outside the two strengths.</strong> No mixture of 5 % and 20 % can give 30 %; the page will return a negative part, which is the signal that the problem is impossible.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Parts of the strong solution, Parts of the weak solution, Ratio of strong to weak.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The inputs are percentages and the outputs are parts — read them as millilitres per hundred millilitres, or litres per hundred litres, whichever suits your batch. The ratio is unitless.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need strength of the stronger solution and strength of the weaker solution and strength wanted. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Parts of the strong solution and parts of the weak solution and ratio of strong to weak should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Strength of the stronger solution</strong> ×10</td><td>30</td><td>30</td><td>unchanged</td></tr><tr><td><strong>Strength of the weaker solution</strong> ×10</td><td>30</td><td>29</td><td>×0.967</td></tr><tr><td><strong>Strength wanted</strong> ×10</td><td>30</td><td>300</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Two components only.</strong> Three stocks need the algebra or two alligation steps.</li><li><strong>It assumes volumes are additive</strong>, which is close for dilute aqueous solutions and poor for alcohol and strong electrolytes.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Compounding a dilution to a stated strength.</li></li><li><li>Mixing two fuel grades to a target octane.</li></li><li><li>Adjusting a cleaner's concentration for a job.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/solution-dilution">Solution dilution</a> <a href="/chemistry/dilution-factor">Dilution factor</a> <a href="/chemistry/percent-solution">Percent solution</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Alligation calculator work out?', 'a' => <<<'TXT'
            It returns parts of the strong solution and parts of the weak solution and ratio of strong to weak from strength of the stronger solution and strength of the weaker solution and strength wanted. The relationship is Strength wanted-Strength of the weaker solution.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Strength of the stronger solution (%), Strength of the weaker solution (%), Strength wanted (%). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: strength of the stronger solution in %; strength of the weaker solution in %; strength wanted in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why do the parts add up to the strength gap?', 'a' => <<<'TXT'
            Because the mixture's strength is a weighted average of the two, and the weights are the parts. (Target − weak) + (strong − target) = strong − weak, always.
            TXT],
            ['q' => 'Can I use alligation for molarity?', 'a' => 'Yes, any two concentrations on the same scale — molarity, percentage, ppm — as long as the target and both stocks share it.'],
        ],
        'related' => [
            ['path' => '/chemistry/solution-dilution', 'name' => 'Solution dilution'],
            ['path' => '/chemistry/dilution-factor', 'name' => 'Dilution factor'],
            ['path' => '/chemistry/percent-solution', 'name' => 'Percent solution'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
