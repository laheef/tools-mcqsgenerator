<?php

/**
 * pH Calculator
 * /chemistry/ph
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'pH Calculator',
    'meta' => ['title' => 'pH Calculator: From Hydrogen Ion Concentration', 'description' => 'Turn a hydrogen ion concentration into pH, pOH and the hydroxide concentration with one logarithmic step, then read the answer against familiar solutions.', 'h1' => 'pH Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'h_conc',
                    'label' => 'Hydrogen ion concentration [H⁺]',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.0000001',
                    'help' => 'Molar concentration of H⁺; pure water is 1 × 10⁻⁷',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ph',
                    'label' => 'pH',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'poh',
                    'label' => 'pOH',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'oh_conc',
                    'label' => 'Hydroxide ion concentration [OH⁻]',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'pH',
            'results' => ['ph' => '-log10(h_conc)', 'poh' => '14+log10(h_conc)', 'oh_conc' => '0.00000000000001/h_conc', 'h_conc' => 'pow(10,-ph)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>pH is the negative base-10 logarithm of the hydrogen ion concentration: <strong>pH = −log₁₀[H⁺]</strong>. This page converts a concentration in mol/L into pH, and from there into pOH and the hydroxide concentration, using the water ion product Kw = 1 × 10⁻¹⁴ at 25 °C.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The logarithm is the whole point: hydrogen ion concentrations in ordinary solutions span fourteen orders of magnitude, from 1 mol/L in strong acid to 10⁻¹⁴ mol/L in strong base. pH squeezes that range into a scale of numbers people can hold in their heads, and every buffer, enzyme and corrosion question is asked on it.</p><p>The page reports <strong>pH and pOH and hydroxide ion concentration [OH⁻]</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>pH</strong></td><td><code>-log₁₀(Hydrogen ion concentration [H⁺])</code></td></tr><tr><td><strong>pOH</strong></td><td><code>14+log₁₀(Hydrogen ion concentration [H⁺])</code></td></tr><tr><td><strong>Hydroxide ion concentration [OH⁻]</strong></td><td><code>1 × 10<sup>-14< ÷ sup> ÷ Hydrogen ion concentration [H⁺]</code></td></tr><tr><td><strong>Hydrogen ion concentration [H⁺]</strong></td><td><code>(10)^-pH</code></td></tr></tbody></table><p><p>pH is defined on activity, not concentration, and the two part company above about 0.1 mol/L. For the dilute solutions this page is normally used on, the difference is smaller than the precision of your measurement.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs. It reports pH and pOH and hydroxide ion concentration [OH⁻].</p><ul><li><strong>Hydrogen ion concentration [H⁺]</strong> — in mol/L. Molar concentration of H⁺; pure water is 1 × 10⁻⁷</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>pH</strong></li><li><strong>pOH</strong></li><li><strong>Hydroxide ion concentration [OH⁻]</strong> — in mol/L</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Hydrogen ion concentration [H⁺] = 1 × 10<sup>-7</sup> mol/L — and the results panel reads:</p><ul><li><strong>pH</strong> = <code>-log₁₀(Hydrogen ion concentration [H⁺])</code> = <strong>7</strong></li><li><strong>pOH</strong> = <code>14+log₁₀(Hydrogen ion concentration [H⁺])</code> = <strong>7</strong></li><li><strong>Hydroxide ion concentration [OH⁻]</strong> = <code>1 × 10<sup>-14< ÷ sup> ÷ Hydrogen ion concentration [H⁺]</code> = <strong>1 × 10<sup>-7</sup> mol/L</strong></li></ul><p>With the numbers written into the formula, the first result is <code>-log10(1 × 10<sup>-7< ÷ sup>) = 7</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Pure water at 25 °C has [H⁺] = 1 × 10⁻⁷ mol/L, so pH = 7 exactly, pOH = 7, and [OH⁻] = 1 × 10⁻⁷ mol/L. Those three results are the neutral point the whole scale is built around.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the pH against the chemistry you are doing: stomach acid sits near 1.5, lemon juice near 2, black coffee near 5, blood at 7.35–7.45, seawater at 8.1, and household ammonia at 11. A change of one pH unit is a tenfold change in hydrogen ion concentration, so a shift from 7.4 to 7.1 is a doubling of acidity, not a rounding error.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>pH</th><th>pOH</th><th>Hydroxide ion concentration [OH⁻]</th></tr></thead><tbody><tr><td><strong>Hydrogen ion concentration [H⁺]</strong> +10 %</td><td>−0.59 %</td><td>+0.59 %</td><td>−9.09 %</td></tr></tbody></table><p><p>Because pH is logarithmic, a ten per cent change in concentration moves it by only 0.04 — and that is the point. Large-sounding pH differences are enormous concentration differences, and small concentration errors are almost invisible on the scale.</p></p><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Hydrogen ion concentration [H⁺]</strong>: a ten per cent move there shifts the result by about 9.1 per cent. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Hydrogen ion concentration [H⁺] = 0.001, the page reports <strong>pH</strong> = 3, <strong>pOH</strong> = 11, <strong>Hydroxide ion concentration [OH⁻]</strong> = 1 × 10<sup>-11</sup> mol/L. A millimolar strong acid gives pH 3, pOH 11.</li><li>With Hydrogen ion concentration [H⁺] = 1 × 10<sup>-11</sup>, the page reports <strong>pH</strong> = 11, <strong>pOH</strong> = 3, <strong>Hydroxide ion concentration [OH⁻]</strong> = 0.001 mol/L. A base: pH 11, pOH 3, and a hydroxide concentration of 1 mmol/L.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>pH used as a concentration.</strong> Averaging, diluting or mixing pH values is arithmetically meaningless; convert to concentrations, mix those, then convert back.</li><li><strong>Temperature ignored.</strong> Kw rises with temperature, so neutral pH is 7.00 at 25 °C but about 6.8 at 50 °C — a neutral solution can read below 7.</li><li><strong>Activity read as concentration.</strong> In seawater or a 1 M salt solution, pH measured with an electrode and pH calculated from the amount added differ by a real margin.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: pH, pOH, Hydroxide ion concentration [OH⁻] (mol/L).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>pH itself carries no unit. The concentration must be in mol per litre — a figure in mmol/L has to be divided by a thousand first, or the answer is exactly three units too low.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need hydrogen ion concentration [H⁺]. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Ph and poh and hydroxide ion concentration [oh⁻] should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Hydrogen ion concentration [H⁺]</strong> ×10</td><td>7</td><td>6</td><td>×0.857</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes a single dominant acid.</strong> In a mixture, [H⁺] is the total from every source, and this page converts whatever concentration you give it.</li><li><strong>It says nothing about buffering.</strong> Two solutions at pH 7.4 behave completely differently when acid is added; the buffer capacity page is the next step.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a measured hydrogen ion concentration against a pH meter.</li></li><li><li>Converting a stated pH into the concentration an equilibrium calculation needs.</li></li><li><li>Seeing how large a pH change a given dilution really is.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/hydrogen-ion-concentration">Hydrogen ion concentration</a> <a href="/chemistry/pka">pKa</a> <a href="/chemistry/buffer-ph">Buffer pH</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the pH calculator work out?', 'a' => <<<'TXT'
            It returns pH and pOH and hydroxide ion concentration [OH⁻] from hydrogen ion concentration [H⁺]. The relationship is -log₁₀(Hydrogen ion concentration [H⁺]).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hydrogen ion concentration [H⁺] (mol/L). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: hydrogen ion concentration [H⁺] in mol/L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is pH 7 neutral?', 'a' => <<<'TXT'
            Because at 25 °C water dissociates into 10⁻⁷ mol/L each of H⁺ and OH⁻, and pH is the negative logarithm of the first. Neutrality means the two are equal, not that the number is 7 forever.
            TXT],
            ['q' => 'Does pH depend on temperature?', 'a' => <<<'TXT'
            Yes. The ion product of water increases with temperature, so neutral pH falls to about 6.8 at 50 °C and rises to about 7.5 at 0 °C. Comparisons should be made at the same temperature.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/hydrogen-ion-concentration', 'name' => 'Hydrogen ion concentration'],
            ['path' => '/chemistry/pka', 'name' => 'pKa'],
            ['path' => '/chemistry/buffer-ph', 'name' => 'Buffer pH'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
