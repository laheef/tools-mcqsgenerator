<?php

/**
 * Mass Percent Calculator
 * /chemistry/mass-percent
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mass Percent Calculator',
    'meta' => ['title' => 'Mass Percent Calculator: % w/w of a Solution', 'description' => 'Work out the mass percent of a solution from the mass of solute and the mass of the whole solution, and the grams of solute per kilogram that this implies.', 'h1' => 'Mass Percent Calculator', 'updated' => '2026-10-23'],
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
                    'help' => 'The substance being dissolved',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mass_solution',
                    'label' => 'Mass of solution',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '100',
                    'help' => 'Solute plus solvent — the whole mixture',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'percent',
                    'label' => 'Mass percent',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '% w/w',
                ],
                [
                    'name' => 'g_per_kg',
                    'label' => 'Solute per kilogram of solution',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g/kg',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Mass Percent',
            'results' => ['percent' => 'mass_solute/mass_solution*100', 'g_per_kg' => 'mass_solute/mass_solution*1000', 'mass_solute' => 'percent*mass_solution/100', 'mass_solution' => 'mass_solute/percent*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Mass percent, written % w/w, is the mass of solute divided by the mass of the entire solution: <strong>% = (m<sub>solute</sub> ÷ m<sub>solution</sub>) × 100</strong>. It is the unit on nearly every bottle of concentrated reagent, and it needs no volumetry at all — which is why it survives in an era of volumetric glassware.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Mass percent is how concentrated acids, alkalis and brines are sold. It is also the only concentration unit that can be checked with a balance alone, which makes it the fallback when a volumetric flask is not to hand.</p><p>The page reports <strong>mass percent and solute per kilogram of solution</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Mass percent</strong></td><td><code>Mass of solute ÷ Mass of solution × 100</code></td></tr><tr><td><strong>Solute per kilogram of solution</strong></td><td><code>Mass of solute ÷ Mass of solution × 1000</code></td></tr><tr><td><strong>Mass of solute</strong></td><td><code>Mass percent × Mass of solution ÷ 100</code></td></tr><tr><td><strong>Mass of solution</strong></td><td><code>Mass of solute ÷ Mass percent × 100</code></td></tr></tbody></table><p><p>The denominator is the solution, not the solvent. A solution made from 5 g of salt and 95 g of water is 5 % w/w; made from 5 g and 100 g of water it is 4.76 %.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports mass percent and solute per kilogram of solution.</p><ul><li><strong>Mass of solute</strong> — in g. The substance being dissolved</li><li><strong>Mass of solution</strong> — in g. Solute plus solvent — the whole mixture</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Mass percent</strong> — in % w/w</li><li><strong>Solute per kilogram of solution</strong> — in g/kg</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass of solute = 5 g, Mass of solution = 100 g — and the results panel reads:</p><ul><li><strong>Mass percent</strong> = <code>Mass of solute ÷ Mass of solution × 100</code> = <strong>5 % w/w</strong></li><li><strong>Solute per kilogram of solution</strong> = <code>Mass of solute ÷ Mass of solution × 1000</code> = <strong>50 g/kg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>5 ÷ 100 × 100 = 5</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>5 g of solute in 100 g of solution is 5 % w/w and 50 g/kg. That is the same composition as 50 g in a kilogram, or 500 g in ten kilograms — mass percent is a ratio and scales with the batch.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the figure against the reagent you are handling: household bleach is about 5 % w/w sodium hypochlorite, concentrated hydrochloric acid 37 %, glacial acetic acid 99.5 %, and seawater about 3.5 % dissolved salts.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Mass percent</th><th>Solute per kilogram of solution</th></tr></thead><tbody><tr><td><strong>Mass of solute</strong> +10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Mass of solution</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Mass of solute</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Mass of solution</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass of solute = 35, Mass of solution = 1 000, the page reports <strong>Mass percent</strong> = 3.5 % w/w, <strong>Solute per kilogram of solution</strong> = 35 g/kg. 35 g per kilogram is 3.5 % — the salinity of seawater.</li><li>With Mass of solute = 37, Mass of solution = 100, the page reports <strong>Mass percent</strong> = 37 % w/w, <strong>Solute per kilogram of solution</strong> = 370 g/kg. Concentrated hydrochloric acid, 37 % w/w.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Solvent mass used as solution mass.</strong> Add the solute to the solvent before dividing, or the percentage comes out high.</li><li><strong>w/w read as w/v.</strong> A 5 % w/v solution has 5 g in 100 mL of solution, which is a different composition from 5 g in 100 g.</li><li><strong>Mixing mass percent with mole percent.</strong> The two only agree for equimolar mixtures of equal-mass components.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Mass percent (% w/w), Solute per kilogram of solution (g/kg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Percent means per hundred, so the result of 5 is 5 g per 100 g. The second result rescales the same ratio to a kilogram, which is the form density tables and mixing calculations usually want.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass of solute and mass of solution. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Mass percent and solute per kilogram of solution should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass of solute</strong> ×10</td><td>5</td><td>50</td><td>ten times larger</td></tr><tr><td><strong>Mass of solution</strong> ×10</td><td>5</td><td>0.5</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It needs a complete mass balance.</strong> If the solution lost water to evaporation, the denominator is wrong and every concentration derived from it is wrong too.</li><li><strong>It does not describe volume.</strong> Two 10 % w/w solutions of different solutes have different densities and therefore different molarities.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Reading a reagent bottle and converting to molarity with the density.</li></li><li><li>Formulating brines, syrups and pickles, where the ratio is the recipe.</li></li><li><li>Checking a solution against a specification written in percent by mass.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/percent-solution">Percent solution</a> <a href="/chemistry/mole-fraction">Mole fraction</a> <a href="/chemistry/percentage-concentration-to-molarity">Percent to molarity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mass Percent calculator work out?', 'a' => <<<'TXT'
            It returns mass percent and solute per kilogram of solution from mass of solute and mass of solution. The relationship is Mass of solute ÷ Mass of solution × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mass of solute (g), Mass of solution (g). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass of solute in g; mass of solution in g. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Is mass percent the same as percent concentration?', 'a' => <<<'TXT'
            Only if the label says w/w. Percent w/v uses a volume of solution and percent v/v uses a volume of solute; all three are common and none of them is interchangeable.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/percent-solution', 'name' => 'Percent solution'],
            ['path' => '/chemistry/mole-fraction', 'name' => 'Mole fraction'],
            ['path' => '/chemistry/percentage-concentration-to-molarity', 'name' => 'Percent to molarity'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
