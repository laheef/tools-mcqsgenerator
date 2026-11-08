<?php

/**
 * Percent Solution Calculator
 * /chemistry/percent-solution
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Percent Solution Calculator',
    'meta' => ['title' => 'Percent Solution Calculator: % w/v into g/L', 'description' => 'Make sense of a percent w/v solution: grams of solute per 100 mL, converted to grams per litre and to the mass concentration that a method expects of it.', 'h1' => 'Percent Solution Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'mass_solute',
                    'label' => 'Mass of solute',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '5',
                    'help' => 'Mass dissolved',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume',
                    'label' => 'Volume of solution',
                    'type' => 'number',
                    'suffix' => 'mL',
                    'default' => '100',
                    'help' => 'Final volume in millilitres, after dissolving',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'percent_wv',
                    'label' => 'Concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '% w/v',
                ],
                [
                    'name' => 'g_per_l',
                    'label' => 'Mass concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g/L',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Percent Solution',
            'results' => ['percent_wv' => 'mass_solute/volume*100', 'g_per_l' => 'mass_solute/volume*1000', 'mass_solute' => 'percent_wv*volume/100', 'volume' => 'mass_solute/percent_wv*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A percent w/v solution holds so many grams of solute per 100 mL of solution: <strong>% w/v = (m ÷ V) × 100</strong> with the volume in millilitres. It is the unit of physiological saline, of many pharmaceutical preparations and of most school chemistry — and this page converts it into g/L so it can be carried into a molarity calculation.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Percent w/v is easy to make and easy to check: weigh the solid, dissolve it, fill to the mark. It avoids the molar mass entirely, which is exactly why it is used in pharmacy and in medicine, where the strength of a bag of saline is written as 0.9 % rather than 154 mmol/L.</p><p>The page reports <strong>concentration and mass concentration</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Concentration</strong></td><td><code>Mass of solute ÷ Volume of solution × 100</code></td></tr><tr><td><strong>Mass concentration</strong></td><td><code>Mass of solute ÷ Volume of solution × 1000</code></td></tr><tr><td><strong>Mass of solute</strong></td><td><code>Concentration × Volume of solution ÷ 100</code></td></tr><tr><td><strong>Volume of solution</strong></td><td><code>Mass of solute ÷ Concentration × 100</code></td></tr></tbody></table><p><p>The factor of 100 in the expression is the definition of percent, and the factor of 10 between the two results is the conversion from 100 mL to a litre. 5 % w/v is 50 g/L; the two numbers differ by a factor of ten, not by a convention.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports concentration and mass concentration.</p><ul><li><strong>Mass of solute</strong> — in g. Mass dissolved</li><li><strong>Volume of solution</strong> — in mL. Final volume in millilitres, after dissolving</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Concentration</strong> — in % w/v</li><li><strong>Mass concentration</strong> — in g/L</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass of solute = 5 g, Volume of solution = 100 mL — and the results panel reads:</p><ul><li><strong>Concentration</strong> = <code>Mass of solute ÷ Volume of solution × 100</code> = <strong>5 % w/v</strong></li><li><strong>Mass concentration</strong> = <code>Mass of solute ÷ Volume of solution × 1000</code> = <strong>50 g/L</strong></li></ul><p>With the numbers written into the formula, the first result is <code>5 ÷ 100 × 100 = 5</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>5 g made up to 100 mL is 5 % w/v and 50 g/L. Divide that 50 g/L by the molar mass to get molarity: for glucose, 50 ÷ 180.16 = 0.278 mol/L.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Familiar reference points: normal saline is 0.9 % w/v (9 g/L), glucose for infusion is usually 5 % w/v (50 g/L), and a 10 % w/v solution of a small salt is already strong enough to be near saturation.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Concentration</th><th>Mass concentration</th></tr></thead><tbody><tr><td><strong>Mass of solute</strong> +10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Volume of solution</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Mass of solute</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Volume of solution</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass of solute = 0.9, Volume of solution = 100, the page reports <strong>Concentration</strong> = 0.9 % w/v, <strong>Mass concentration</strong> = 9 g/L. 0.9 % w/v is normal saline, 9 g/L.</li><li>With Mass of solute = 5, Volume of solution = 1 000, the page reports <strong>Concentration</strong> = 0.5 % w/v, <strong>Mass concentration</strong> = 5 g/L. 5 g in a litre is 0.5 % w/v — a tenth of the strength above, despite the same mass of solute.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Volume of water instead of volume of solution.</strong> Fill to the mark; adding 100 mL of water to 5 g of solute gives slightly more than 100 mL of solution.</li><li><strong>% w/v and % w/w confused.</strong> The first counts grams per 100 mL of solution, the second grams per 100 g of solution. For a dilute aqueous solution they are close; for concentrated ones they are not.</li><li><strong>mg/mL read as %.</strong> 10 mg/mL is 1 % w/v, not 10 %.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Concentration (% w/v), Mass concentration (g/L).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The volume box is in millilitres because percent w/v is defined per 100 mL. Entering litres gives an answer a thousand times too large.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass of solute and volume of solution. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Concentration and mass concentration should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass of solute</strong> ×10</td><td>5</td><td>50</td><td>ten times larger</td></tr><tr><td><strong>Volume of solution</strong> ×10</td><td>5</td><td>0.5</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It says nothing about moles.</strong> Percent w/v cannot be used in stoichiometry until it is divided by the molar mass.</li><li><strong>It is temperature-sensitive.</strong> The volume changes with temperature even though the mass does not.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Making up saline, glucose or any solution specified in percent w/v.</li></li><li><li>Converting a medicine's stated strength into a mass concentration.</li></li><li><li>Turning a school practical's percent solution into a molarity for a calculation.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/mass-percent">Mass percent</a> <a href="/chemistry/concentration">Concentration</a> <a href="/chemistry/percentage-concentration-to-molarity">Percent to molarity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Percent Solution calculator work out?', 'a' => 'It returns concentration and mass concentration from mass of solute and volume of solution. The relationship is Mass of solute ÷ Volume of solution × 100.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mass of solute (g), Volume of solution (mL). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass of solute in g; volume of solution in mL. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I turn a percent w/v solution into molarity?', 'a' => 'Multiply by ten to get g/L, then divide by the molar mass. A 5 % w/v glucose solution is 50 g/L and therefore 0.278 mol/L.'],
        ],
        'related' => [
            ['path' => '/chemistry/mass-percent', 'name' => 'Mass percent'],
            ['path' => '/chemistry/concentration', 'name' => 'Concentration'],
            ['path' => '/chemistry/percentage-concentration-to-molarity', 'name' => 'Percent to molarity'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
