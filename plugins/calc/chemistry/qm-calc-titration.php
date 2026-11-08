<?php

/**
 * Titration Calculator
 * /chemistry/titration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Titration Calculator',
    'meta' => ['title' => 'Titration Calculator: Concentration from Titre', 'description' => 'Find the unknown concentration from a titration: enter the titrant strength, the volumes delivered and the stoichiometry, and read the analyte back out.', 'h1' => 'Titration Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'c1',
                    'label' => 'Titrant concentration (c₁)',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.1',
                    'help' => 'The standard solution, of known strength',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'v1',
                    'label' => 'Titre volume (V₁)',
                    'type' => 'number',
                    'suffix' => 'mL',
                    'default' => '25',
                    'help' => 'The volume delivered, from the burette',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'n1',
                    'label' => 'Titrant coefficient (n₁)',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Its coefficient in the balanced equation: 2 for H₂SO₄ against NaOH',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'v2',
                    'label' => 'Analyte volume (V₂)',
                    'type' => 'number',
                    'suffix' => 'mL',
                    'default' => '25',
                    'help' => 'The aliquot that was titrated',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'n2',
                    'label' => 'Analyte coefficient (n₂)',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Its coefficient in the same equation: 2 for NaOH against H₂SO₄',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'c2',
                    'label' => 'Analyte concentration (c₂)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L',
                ],
                [
                    'name' => 'moles_analyte',
                    'label' => 'Amount of analyte in the aliquot',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mmol',
                ],
                [
                    'name' => 'moles_titrant',
                    'label' => 'Amount of titrant delivered',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mmol',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Titration',
            'results' => [
                'c2' => 'c1*v1*n2/(v2*n1)',
                'moles_titrant' => 'c1*v1',
                'moles_analyte' => 'c1*v1*n2/n1',
                'c1' => 'c2*v2*n1/(v1*n2)',
                'v1' => 'c2*v2*n1/(c1*n2)',
                'v2' => 'c1*v1*n2/(c2*n1)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A titration measures the volume of a standard solution needed to react completely with an unknown. Equating the moles gives <strong>c<sub>2</sub> = c<sub>1</sub>V<sub>1</sub>n<sub>1</sub> ÷ (V<sub>2</sub>n<sub>2</sub>)</strong>, where the n terms are the stoichiometric coefficients from the balanced equation.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Everything in a titration reduces to one sentence: the moles of titrant delivered are in a fixed ratio to the moles of analyte present. The burette measures the first, the balanced equation supplies the ratio, and the analyte concentration falls out.</p><p>The page reports <strong>analyte concentration (c₂) and amount of analyte in the aliquot and amount of titrant delivered</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Analyte concentration (c₂)</strong></td><td><code>Titrant concentration (c₁) × Titre volume (V₁) × Analyte coefficient (n₂) ÷ (Analyte volume (V₂) × Titrant coefficient (n₁))</code></td></tr><tr><td><strong>Amount of titrant delivered</strong></td><td><code>Titrant concentration (c₁) × Titre volume (V₁)</code></td></tr><tr><td><strong>Amount of analyte in the aliquot</strong></td><td><code>Titrant concentration (c₁) × Titre volume (V₁) × Analyte coefficient (n₂) ÷ Titrant coefficient (n₁)</code></td></tr><tr><td><strong>Titrant concentration (c₁)</strong></td><td><code>Analyte concentration (c₂) × Analyte volume (V₂) × Titrant coefficient (n₁) ÷ (Titre volume (V₁) × Analyte coefficient (n₂))</code></td></tr><tr><td><strong>Titre volume (V₁)</strong></td><td><code>Analyte concentration (c₂) × Analyte volume (V₂) × Titrant coefficient (n₁) ÷ (Titrant concentration (c₁) × Analyte coefficient (n₂))</code></td></tr><tr><td><strong>Analyte volume (V₂)</strong></td><td><code>Titrant concentration (c₁) × Titre volume (V₁) × Analyte coefficient (n₂) ÷ (Analyte concentration (c₂) × Titrant coefficient (n₁))</code></td></tr></tbody></table><p><p>The coefficients n₁ and n₂ are what make sulfuric acid and sodium hydroxide behave differently from hydrochloric acid and sodium hydroxide. One mole of H₂SO₄ neutralises two moles of NaOH, so with the acid as titrant n₁ = 1 and n₂ = 2; with the acid as analyte the two swap.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports analyte concentration (c₂) and amount of analyte in the aliquot and amount of titrant delivered.</p><ul><li><strong>Titrant concentration (c₁)</strong> — in mol/L. The standard solution, of known strength</li><li><strong>Titre volume (V₁)</strong> — in mL. The volume delivered, from the burette</li><li><strong>Titrant coefficient (n₁)</strong>. Its coefficient in the balanced equation: 2 for H₂SO₄ against NaOH</li><li><strong>Analyte volume (V₂)</strong> — in mL. The aliquot that was titrated</li><li><strong>Analyte coefficient (n₂)</strong>. Its coefficient in the same equation: 2 for NaOH against H₂SO₄</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Analyte concentration (c₂)</strong> — in mol/L</li><li><strong>Amount of analyte in the aliquot</strong> — in mmol</li><li><strong>Amount of titrant delivered</strong> — in mmol</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Titrant concentration (c₁) = 0.1 mol/L, Titre volume (V₁) = 25 mL, Titrant coefficient (n₁) = 1, Analyte volume (V₂) = 25 mL, Analyte coefficient (n₂) = 1 — and the results panel reads:</p><ul><li><strong>Analyte concentration (c₂)</strong> = <code>Titrant concentration (c₁) × Titre volume (V₁) × Analyte coefficient (n₂) ÷ (Analyte volume (V₂) × Titrant coefficient (n₁))</code> = <strong>0.1 mol/L</strong></li><li><strong>Amount of analyte in the aliquot</strong> = <code>Titrant concentration (c₁) × Titre volume (V₁) × Analyte coefficient (n₂) ÷ Titrant coefficient (n₁)</code> = <strong>2.5 mmol</strong></li><li><strong>Amount of titrant delivered</strong> = <code>Titrant concentration (c₁) × Titre volume (V₁)</code> = <strong>2.5 mmol</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.1 × 25 × 1 ÷ (25 × 1) = 0.1</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>25.00 mL of 0.1 mol/L sodium hydroxide reaches the endpoint at 25.00 mL against a monoprotic acid of the same volume. The coefficients are both 1, the volumes cancel, and the acid is 0.1 mol/L — as close to a demonstration of the arithmetic as chemistry offers.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the two mole results before the concentration. They should stand in the ratio the equation demands; if they do not, a coefficient was entered on the wrong row, and the concentration is wrong by exactly that factor.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Analyte concentration (c₂)</th><th>Amount of analyte in the aliquot</th><th>Amount of titrant delivered</th></tr></thead><tbody><tr><td><strong>Titrant concentration (c₁)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Titre volume (V₁)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Titrant coefficient (n₁)</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Analyte volume (V₂)</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Analyte coefficient (n₂)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Titrant concentration (c₁)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Analyte volume (V₂)</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Titrant concentration (c₁) = 0.1, Titre volume (V₁) = 20, Titrant coefficient (n₁) = 2, Analyte volume (V₂) = 25, Analyte coefficient (n₂) = 1, the page reports <strong>Analyte concentration (c₂)</strong> = 0.04 mol/L, <strong>Amount of analyte in the aliquot</strong> = 1 mmol, <strong>Amount of titrant delivered</strong> = 2 mmol. A diprotic titrant: 20 mL of 0.1 M delivers 2 mmol of acid, and with two acid molecules per analyte molecule that is 1 mmol of analyte in 25 mL — 0.04 mol/L.</li><li>With Titrant concentration (c₁) = 0.05, Titre volume (V₁) = 12.5, Titrant coefficient (n₁) = 1, Analyte volume (V₂) = 50, Analyte coefficient (n₂) = 1, the page reports <strong>Analyte concentration (c₂)</strong> = 0.013 mol/L, <strong>Amount of analyte in the aliquot</strong> = 0.625 mmol, <strong>Amount of titrant delivered</strong> = 0.625 mmol. A dilute analyte: 0.625 mmol in 50 mL is 0.0125 mol/L.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Coefficients swapped.</strong> Putting n₁ where n₂ belongs inverts the stoichiometry and gives an answer off by the square of the coefficient.</li><li><strong>Volumes left in litres.</strong> Both volumes are in millilitres here; converting one and not the other breaks the ratio.</li><li><strong>The endpoint read as the equivalence point.</strong> An indicator changes colour near, not at, the equivalence point; the difference is the indicator error.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Analyte concentration (c₂) (mol/L), Amount of analyte in the aliquot (mmol), Amount of titrant delivered (mmol).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Concentration in mol/L with volumes in mL gives millimoles directly — the unit the mole results are reported in. That is why the numbers multiply so cleanly on this page.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need titrant concentration (c₁) and titre volume (V₁) and titrant coefficient (n₁) and analyte volume (V₂) and analyte coefficient (n₂). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Analyte concentration (c₂) and amount of analyte in the aliquot and amount of titrant delivered should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Titrant concentration (c₁)</strong> ×10</td><td>0.1</td><td>1</td><td>ten times larger</td></tr><tr><td><strong>Titre volume (V₁)</strong> ×10</td><td>0.1</td><td>1</td><td>ten times larger</td></tr><tr><td><strong>Titrant coefficient (n₁)</strong> ×10</td><td>0.1</td><td>0.01</td><td>ten times smaller</td></tr><tr><td><strong>Analyte volume (V₂)</strong> ×10</td><td>0.1</td><td>0.01</td><td>ten times smaller</td></tr><tr><td><strong>Analyte coefficient (n₂)</strong> ×10</td><td>0.1</td><td>1</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes a single clean reaction.</strong> Side reactions, a second acidic proton or a slow endpoint all shift the result.</li><li><strong>It cannot correct for a blank.</strong> If the solvent consumes titrant, the blank volume has to be subtracted from the titre before it is entered.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Finding the concentration of an unknown acid or base.</li></li><li><li>Assaying a reagent against a primary standard.</li></li><li><li>Checking the strength of a solution made up from a recipe.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/normality">Normality</a> <a href="/chemistry/neutralization">Neutralization</a> <a href="/chemistry/concentration">Concentration</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Titration calculator work out?', 'a' => <<<'TXT'
            It returns analyte concentration (c₂) and amount of analyte in the aliquot and amount of titrant delivered from titrant concentration (c₁) and titre volume (V₁) and titrant coefficient (n₁) and analyte volume (V₂) and analyte coefficient (n₂). The relationship is Titrant concentration (c₁) × Titre volume (V₁) × Analyte coefficient (n₂) ÷ (Analyte volume (V₂) × Titrant coefficient (n₁)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Titrant concentration (c₁) (mol/L), Titre volume (V₁) (mL), Titrant coefficient (n₁), Analyte volume (V₂) (mL), Analyte coefficient (n₂). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: titrant concentration (c₁) in mol/L; titre volume (V₁) in mL; analyte volume (V₂) in mL. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is the difference between the endpoint and the equivalence point?', 'a' => <<<'TXT'
            The equivalence point is where the stoichiometry is exactly satisfied; the endpoint is where the indicator changes colour. A well-chosen indicator keeps the two within a drop.
            TXT],
            ['q' => 'Do I use the volume of the aliquot or the total volume?', 'a' => <<<'TXT'
            The aliquot — the amount of analyte solution actually titrated, before any diluent was added. If the analyte was diluted, the dilution factor has to be applied afterwards.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/normality', 'name' => 'Normality'],
            ['path' => '/chemistry/neutralization', 'name' => 'Neutralization'],
            ['path' => '/chemistry/concentration', 'name' => 'Concentration'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
