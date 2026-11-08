<?php

/**
 * Protein Solubility Calculator
 * /chemistry/protein-solubility
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Protein Solubility Calculator',
    'meta' => ['title' => 'Protein Solubility Calculator: Salting Out Curve', 'description' => 'Estimate how far a protein\'s solubility falls as salt is added, using the exponential salting-out relation that every purification step is built on in practice.', 'h1' => 'Protein Solubility Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 's0',
                    'label' => 'Solubility in pure water',
                    'type' => 'number',
                    'suffix' => 'mg/mL',
                    'default' => '10',
                    'help' => 'The solubility with no salt present',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ks',
                    'label' => 'Salting-out constant Ks',
                    'type' => 'number',
                    'suffix' => 'L/mol',
                    'default' => '2.5',
                    'help' => 'Roughly 1 to 10 for most proteins; a property of the protein and the salt',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ionic_strength',
                    'label' => 'Ionic strength of the salt',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.5',
                    'help' => 'For ammonium sulfate, 0.5 mol/L is about 12 per cent saturation',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'solubility',
                    'label' => 'Solubility at this salt',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mg/mL',
                ],
                [
                    'name' => 'fraction_remaining',
                    'label' => 'Fraction of the salt-free solubility',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'fold_reduction',
                    'label' => 'Fold reduction in solubility',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Protein Solubility',
            'results' => [
                'solubility' => 's0*exp(-ks*ionic_strength)',
                'fraction_remaining' => 'exp(-ks*ionic_strength)*100',
                'fold_reduction' => '1/exp(-ks*ionic_strength)',
                's0' => 'solubility/exp(-ks*ionic_strength)',
                'ks' => '-log(solubility/s0)/ionic_strength',
                'ionic_strength' => '-log(solubility/s0)/ks',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Salt changes a protein's solubility exponentially: <strong>S = S₀·e<sup>−K<sub>s</sub>·I</sup></strong>, with S₀ the solubility in pure water, K<sub>s</sub> the salting-out constant and I the ionic strength. The page reports the solubility, the fraction remaining, and the fold reduction.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Salting out is the oldest and still the cheapest way to fractionate a protein mixture. At low salt, solubility often rises slightly; past a point it falls exponentially, and the constant that governs the fall differs enough between proteins to separate them.</p><p>The page reports <strong>solubility at this salt and fraction of the salt-free solubility and fold reduction in solubility</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Solubility at this salt</strong></td><td><code>Solubility in pure water × exp(-Salting-out constant Ks × Ionic strength of the salt)</code></td></tr><tr><td><strong>Fraction of the salt-free solubility</strong></td><td><code>exp(-Salting-out constant Ks × Ionic strength of the salt) × 100</code></td></tr><tr><td><strong>Fold reduction in solubility</strong></td><td><code>1 ÷ exp(-Salting-out constant Ks × Ionic strength of the salt)</code></td></tr><tr><td><strong>Solubility in pure water</strong></td><td><code>Solubility at this salt ÷ exp(-Salting-out constant Ks × Ionic strength of the salt)</code></td></tr><tr><td><strong>Salting-out constant Ks</strong></td><td><code>-ln(Solubility at this salt ÷ Solubility in pure water) ÷ Ionic strength of the salt</code></td></tr><tr><td><strong>Ionic strength of the salt</strong></td><td><code>-ln(Solubility at this salt ÷ Solubility in pure water) ÷ Salting-out constant Ks</code></td></tr></tbody></table><p><p>The exponent is the product of the salt's ionic strength and a constant for that protein in that salt. Because it is exponential, a change in ionic strength of 1 mol/L can change the solubility by a factor of a hundred or more.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports solubility at this salt and fraction of the salt-free solubility and fold reduction in solubility.</p><ul><li><strong>Solubility in pure water</strong> — in mg/mL. The solubility with no salt present</li><li><strong>Salting-out constant Ks</strong> — in L/mol. Roughly 1 to 10 for most proteins; a property of the protein and the salt</li><li><strong>Ionic strength of the salt</strong> — in mol/L. For ammonium sulfate, 0.5 mol/L is about 12 per cent saturation</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Solubility at this salt</strong> — in mg/mL</li><li><strong>Fraction of the salt-free solubility</strong> — in %</li><li><strong>Fold reduction in solubility</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Solubility in pure water = 10 mg/mL, Salting-out constant Ks = 2.5 L/mol, Ionic strength of the salt = 0.5 mol/L — and the results panel reads:</p><ul><li><strong>Solubility at this salt</strong> = <code>Solubility in pure water × exp(-Salting-out constant Ks × Ionic strength of the salt)</code> = <strong>2.865 mg/mL</strong></li><li><strong>Fraction of the salt-free solubility</strong> = <code>exp(-Salting-out constant Ks × Ionic strength of the salt) × 100</code> = <strong>28.65 %</strong></li><li><strong>Fold reduction in solubility</strong> = <code>1 ÷ exp(-Salting-out constant Ks × Ionic strength of the salt)</code> = <strong>3.49</strong></li></ul><p>With the numbers written into the formula, the first result is <code>10 × exp(-2.5 × 0.5) = 2.865</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>10 mg/mL in water with Ks = 2.5 and I = 0.5 gives 10 × e<sup>−1.25</sup> = 2.86 mg/mL — 29 per cent of the salt-free value, a 3.5-fold reduction. Doubling the salt to 1.0 mol/L takes it to 0.82 mg/mL.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Purifications are run as stepwise additions: bring the salt to a level where the contaminating proteins precipitate, spin them out, then raise it further to precipitate the target. The gap between the two constants is what makes the separation work.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Solubility at this salt</th><th>Fraction of the salt-free solubility</th><th>Fold reduction in solubility</th></tr></thead><tbody><tr><td><strong>Solubility in pure water</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Salting-out constant Ks</strong> +10 %</td><td>−11.75 %</td><td>−11.75 %</td><td>+13.31 %</td></tr><tr><td><strong>Ionic strength of the salt</strong> +10 %</td><td>−11.75 %</td><td>−11.75 %</td><td>+13.31 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Salting-out constant Ks</strong>: a ten per cent move there shifts the result by about 13.3 per cent. The least sensitive is <strong>Solubility in pure water</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Solubility in pure water = 20, Salting-out constant Ks = 3, Ionic strength of the salt = 1, the page reports <strong>Solubility at this salt</strong> = 0.996 mg/mL, <strong>Fraction of the salt-free solubility</strong> = 4.979 %, <strong>Fold reduction in solubility</strong> = 20.086. A high Ks protein at 1 mol/L: 20 × e⁻³ = 1.0 mg/mL, a twenty-fold drop.</li><li>With Solubility in pure water = 20, Salting-out constant Ks = 1.5, Ionic strength of the salt = 1, the page reports <strong>Solubility at this salt</strong> = 4.463 mg/mL, <strong>Fraction of the salt-free solubility</strong> = 22.313 %, <strong>Fold reduction in solubility</strong> = 4.482. Half the constant leaves 4.5 mg/mL — four times more soluble, which is exactly the difference a step gradient exploits.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Molarity used as ionic strength.</strong> Ammonium sulfate at 0.5 mol/L has an ionic strength of 1.5, because it splits into three ions of charge 1 and 2.</li><li><strong>Ks assumed constant.</strong> It depends on both the protein and the salt, and it changes with temperature.</li><li><strong>Precipitation read as denaturation.</strong> Salted-out protein is usually refoldable; heat or acid precipitation often is not.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Solubility at this salt (mg/mL), Fraction of the salt-free solubility (%), Fold reduction in solubility.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Solubility in milligrams per millilitre, ionic strength in moles per litre and Ks in litres per mole keep the exponent dimensionless. The fraction remaining is a percentage and the fold reduction is a plain ratio.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need solubility in pure water and salting-out constant Ks and ionic strength of the salt. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Solubility at this salt and fraction of the salt-free solubility and fold reduction in solubility should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Solubility in pure water</strong> ×10</td><td>2.865</td><td>28.65</td><td>ten times larger</td></tr><tr><td><strong>Salting-out constant Ks</strong> ×10</td><td>2.865</td><td>3.727 × 10<sup>-5</sup></td><td>×1.301 × 10<sup>-5</sup></td></tr><tr><td><strong>Ionic strength of the salt</strong> ×10</td><td>2.865</td><td>3.727 × 10<sup>-5</sup></td><td>×1.301 × 10<sup>-5</sup></td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A two-constant model.</strong> Real solubility curves bend at low salt and near saturation, where the salt itself runs out of water to dissolve in.</li><li><strong>It assumes one protein.</strong> In a mixture each protein has its own Ks, which is the point — but this page describes a single species.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Planning an ammonium sulfate cut.</li></li><li><li>Estimating how much protein will stay in solution at a given salt level.</li></li><li><li>Comparing two proteins' salting-out behaviour.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/ionic-strength">Ionic strength</a> <a href="/chemistry/isoelectric-point">Isoelectric point</a> <a href="/chemistry/enzyme-activity">Enzyme activity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Protein Solubility calculator work out?', 'a' => <<<'TXT'
            It returns solubility at this salt and fraction of the salt-free solubility and fold reduction in solubility from solubility in pure water and salting-out constant Ks and ionic strength of the salt. The relationship is Solubility in pure water × exp(-Salting-out constant Ks × Ionic strength of the salt).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Solubility in pure water (mg/mL), Salting-out constant Ks (L/mol), Ionic strength of the salt (mol/L). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: solubility in pure water in mg/mL; salting-out constant Ks in L/mol; ionic strength of the salt in mol/L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why does salt make proteins precipitate?', 'a' => 'The ions compete for water, leaving less of it to hydrate the protein. Past a point the protein\'s own interactions win and it comes out of solution.'],
            ['q' => 'Which salt is used most?', 'a' => 'Ammonium sulfate: it is very soluble, its ions are doubly charged so it works at lower molarity, and it stabilises rather than denatures most proteins.'],
        ],
        'related' => [
            ['path' => '/chemistry/ionic-strength', 'name' => 'Ionic strength'],
            ['path' => '/chemistry/isoelectric-point', 'name' => 'Isoelectric point'],
            ['path' => '/chemistry/enzyme-activity', 'name' => 'Enzyme activity'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
