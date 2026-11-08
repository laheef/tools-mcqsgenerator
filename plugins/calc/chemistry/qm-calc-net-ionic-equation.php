<?php

/**
 * Net Ionic Equation Calculator
 * /chemistry/net-ionic-equation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net Ionic Equation Calculator',
    'meta' => ['title' => 'Net Ionic Equation Calculator: Precipitate Mass', 'description' => 'After the spectator ions cancel, work out which ion limits a precipitation, how much solid actually forms and what is left over in the solution afterwards.', 'h1' => 'Net Ionic Equation Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'cation_moles',
                    'label' => 'Moles of the precipitating cation',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '0.01',
                    'help' => 'Silver ion, in the silver nitrate solution',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'anion_moles',
                    'label' => 'Moles of the precipitating anion',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '0.008',
                    'help' => 'Chloride ion, in the salt solution',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass',
                    'label' => 'Molar mass of the precipitate',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '143.32',
                    'help' => 'Silver chloride is 143.32',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'precipitate_moles',
                    'label' => 'Moles of precipitate',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
                [
                    'name' => 'precipitate_mass',
                    'label' => 'Mass of precipitate',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'excess_moles',
                    'label' => 'Ions left in excess',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Net Ionic Equation',
            'results' => ['precipitate_moles' => 'min(cation_moles,anion_moles)', 'precipitate_mass' => 'min(cation_moles,anion_moles)*molar_mass', 'excess_moles' => 'max(cation_moles,anion_moles)-min(cation_moles,anion_moles)', 'molar_mass' => 'precipitate_mass/min(cation_moles,anion_moles)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A net ionic equation keeps only the ions that actually react. Once the spectators are struck out, the stoichiometry is one-to-one in charge, so the limiting ion sets the precipitate: <strong>mass = min(n<sub>cation</sub>, n<sub>anion</sub>) × M</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Writing the net ionic equation is how a double displacement is reduced to what actually happens: two ions meet a solid. Everything else was watching, and the quantity of solid depends only on the two reacting ions.</p><p>The page reports <strong>moles of precipitate and mass of precipitate and ions left in excess</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Moles of precipitate</strong></td><td><code>min(Moles of the precipitating cation,Moles of the precipitating anion)</code></td></tr><tr><td><strong>Mass of precipitate</strong></td><td><code>min(Moles of the precipitating cation,Moles of the precipitating anion) × Molar mass of the precipitate</code></td></tr><tr><td><strong>Ions left in excess</strong></td><td><code>max(Moles of the precipitating cation,Moles of the precipitating anion)-min(Moles of the precipitating cation,Moles of the precipitating anion)</code></td></tr><tr><td><strong>Molar mass of the precipitate</strong></td><td><code>Mass of precipitate ÷ min(Moles of the precipitating cation,Moles of the precipitating anion)</code></td></tr></tbody></table><p><p>For a 1:1 precipitate the moles of solid are the smaller of the two ion amounts, and the difference is what stays in solution. For a 1:2 salt the amounts must first be divided by their charges, which is why the balanced equation has to be written before the arithmetic.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports moles of precipitate and mass of precipitate and ions left in excess.</p><ul><li><strong>Moles of the precipitating cation</strong> — in mol. Silver ion, in the silver nitrate solution</li><li><strong>Moles of the precipitating anion</strong> — in mol. Chloride ion, in the salt solution</li><li><strong>Molar mass of the precipitate</strong> — in g/mol. Silver chloride is 143.32</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Moles of precipitate</strong> — in mol</li><li><strong>Mass of precipitate</strong> — in g</li><li><strong>Ions left in excess</strong> — in mol</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Moles of the precipitating cation = 0.01 mol, Moles of the precipitating anion = 0.008 mol, Molar mass of the precipitate = 143.32 g/mol — and the results panel reads:</p><ul><li><strong>Moles of precipitate</strong> = <code>min(Moles of the precipitating cation,Moles of the precipitating anion)</code> = <strong>0.008 mol</strong></li><li><strong>Mass of precipitate</strong> = <code>min(Moles of the precipitating cation,Moles of the precipitating anion) × Molar mass of the precipitate</code> = <strong>1.147 g</strong></li><li><strong>Ions left in excess</strong> = <code>max(Moles of the precipitating cation,Moles of the precipitating anion)-min(Moles of the precipitating cation,Moles of the precipitating anion)</code> = <strong>0.002 mol</strong></li></ul><p>With the numbers written into the formula, the first result is <code>min(0.01,0.008) = 0.008</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>0.010 mol of silver ion meeting 0.008 mol of chloride: 0.008 mol of silver chloride forms, which is 1.15 g, and 0.002 mol of silver ion is left in solution — the solution is still slightly cloudy with excess, not exactly balanced.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>A large excess means the precipitate's mass is set by the other ion and more reagent would not help. Equal amounts mean the reaction is at its equivalence point, which is what a titration is trying to hit.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Moles of precipitate</th><th>Mass of precipitate</th><th>Ions left in excess</th></tr></thead><tbody><tr><td><strong>Moles of the precipitating cation</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+50 %</td></tr><tr><td><strong>Moles of the precipitating anion</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−40 %</td></tr><tr><td><strong>Molar mass of the precipitate</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Moles of the precipitating cation</strong>: a ten per cent move there shifts the result by about 50 per cent. The least sensitive is <strong>Molar mass of the precipitate</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Moles of the precipitating cation = 0.02, Moles of the precipitating anion = 0.05, Molar mass of the precipitate = 100.09, the page reports <strong>Moles of precipitate</strong> = 0.02 mol, <strong>Mass of precipitate</strong> = 2.002 g, <strong>Ions left in excess</strong> = 0.03 mol. Carbonate in excess: the calcium limits, giving 0.02 mol and 2.00 g of calcium carbonate.</li><li>With Moles of the precipitating cation = 0.005, Moles of the precipitating anion = 0.005, Molar mass of the precipitate = 233.39, the page reports <strong>Moles of precipitate</strong> = 0.005 mol, <strong>Mass of precipitate</strong> = 1.167 g, <strong>Ions left in excess</strong> = 0 mol. Exactly matched amounts: 0.005 mol and 1.17 g of barium sulfate, with nothing left over.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Spectator ions kept.</strong> Sodium and nitrate do not appear in the net equation, and including them makes the stoichiometry look more complicated than it is.</li><li><strong>Charge ratios ignored.</strong> Silver chloride is 1:1, but silver chromate is 2:1 — the moles of solid are not simply the smaller ion count.</li><li><strong>Solubility ignored.</strong> A sparingly soluble salt leaves some ions in solution; this page assumes the precipitation goes to completion.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Moles of precipitate (mol), Mass of precipitate (g), Ions left in excess (mol).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Moles in, moles and grams out. The molar mass of the solid — not of either ion — is what converts, and it must include every ion in the formula unit.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need moles of the precipitating cation and moles of the precipitating anion and molar mass of the precipitate. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Moles of precipitate and mass of precipitate and ions left in excess should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Moles of the precipitating cation</strong> ×10</td><td>0.008</td><td>0.008</td><td>unchanged</td></tr><tr><td><strong>Moles of the precipitating anion</strong> ×10</td><td>0.008</td><td>0.01</td><td>×1.25</td></tr><tr><td><strong>Molar mass of the precipitate</strong> ×10</td><td>0.008</td><td>0.008</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One precipitate at a time.</strong> Side reactions and complexes change the amounts.</li><li><strong>It ignores solubility products.</strong> Where Ksp matters, a small fraction stays dissolved and the mass is slightly lower.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Finding the mass of precipitate a reaction will give.</li></li><li><li>Checking which reagent is in excess after mixing two solutions.</li></li><li><li>Setting up a gravimetric analysis.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/titration">Titration</a> <a href="/chemistry/theoretical-yield">Theoretical yield</a> <a href="/chemistry/mole">Mole</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Net Ionic Equation calculator work out?', 'a' => <<<'TXT'
            It returns moles of precipitate and mass of precipitate and ions left in excess from moles of the precipitating cation and moles of the precipitating anion and molar mass of the precipitate. The relationship is min(Moles of the precipitating cation,Moles of the precipitating anion).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Moles of the precipitating cation (mol), Moles of the precipitating anion (mol), Molar mass of the precipitate (g/mol). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: moles of the precipitating cation in mol; moles of the precipitating anion in mol; molar mass of the precipitate in g/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is a spectator ion?', 'a' => 'One that appears unchanged on both sides of the full equation. It is cancelled when the net ionic equation is written, and it carries no stoichiometry.'],
            ['q' => 'Why is the precipitate mass set by the smaller amount?', 'a' => 'Because the reaction stops when either ion runs out. For a 1:1 salt that is simply the smaller of the two amounts.'],
        ],
        'related' => [
            ['path' => '/chemistry/titration', 'name' => 'Titration'],
            ['path' => '/chemistry/theoretical-yield', 'name' => 'Theoretical yield'],
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
