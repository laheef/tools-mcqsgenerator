<?php

/**
 * Arrhenius Equation Calculator
 * /chemistry/arrhenius-equation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Arrhenius Equation Calculator',
    'meta' => ['title' => 'Arrhenius Equation Calculator: k From A, Ea and T', 'description' => 'Work out a rate constant from the pre-exponential factor, the activation energy and the temperature, and see what fraction of collisions clears the barrier.', 'h1' => 'Arrhenius Equation Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'a_factor',
                    'label' => 'Pre-exponential factor A',
                    'type' => 'number',
                    'default' => '10000000000000',
                    'help' => 'In the units of the rate constant; 10¹³ per second is typical for a unimolecular step',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ea',
                    'label' => 'Activation energy Ea',
                    'type' => 'number',
                    'suffix' => 'kJ/mol',
                    'default' => '100',
                    'help' => 'From two rate constants at two temperatures, or the literature',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'temp',
                    'label' => 'Temperature',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '298.15',
                    'help' => 'Absolute temperature: 25 °C is 298.15 K',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rate_constant',
                    'label' => 'Rate constant k',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'boltzmann_fraction',
                    'label' => 'Fraction of collisions with enough energy',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rate_ten_kelvin_higher',
                    'label' => 'Rate constant at T + 10 K',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Arrhenius Equation',
            'results' => [
                'rate_constant' => 'a_factor*exp(-ea*1000/(8.314*temp))',
                'boltzmann_fraction' => 'exp(-ea*1000/(8.314*temp))',
                'rate_ten_kelvin_higher' => 'a_factor*exp(-ea*1000/(8.314*(temp+10)))',
                'a_factor' => 'rate_constant/exp(-ea*1000/(8.314*temp))',
                'ea' => '-8.314*temp*log(rate_constant/a_factor)/1000',
                'temp' => '-ea*1000/(8.314*log(rate_constant/a_factor))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The Arrhenius equation says a rate constant is the frequency factor discounted by the fraction of collisions with enough energy: <strong>k = A·exp(−Ea ÷ RT)</strong>. This page reports k, that exponential fraction, and the rate constant ten kelvin higher.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Every rate constant in a mechanism is a number with a story behind it: how often molecules collide, and what fraction of those collisions clears the barrier. The Arrhenius equation is that story written in three symbols, and it is the reason heating a reaction works at all.</p><p>The page reports <strong>rate constant k and fraction of collisions with enough energy and rate constant at T + 10 K</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Rate constant k</strong></td><td><code>Pre-exponential factor A × exp(-Activation energy Ea × 1000 ÷ (8.314 × Temperature))</code></td></tr><tr><td><strong>Fraction of collisions with enough energy</strong></td><td><code>exp(-Activation energy Ea × 1000 ÷ (8.314 × Temperature))</code></td></tr><tr><td><strong>Rate constant at T + 10 K</strong></td><td><code>Pre-exponential factor A × exp(-Activation energy Ea × 1000 ÷ (8.314 × (Temperature+10)))</code></td></tr><tr><td><strong>Pre-exponential factor A</strong></td><td><code>Rate constant k ÷ exp(-Activation energy Ea × 1000 ÷ (8.314 × Temperature))</code></td></tr><tr><td><strong>Activation energy Ea</strong></td><td><code>-8.314 × Temperature × ln(Rate constant k ÷ Pre-exponential factor A) ÷ 1000</code></td></tr><tr><td><strong>Temperature</strong></td><td><code>-Activation energy Ea × 1000 ÷ (8.314 × ln(Rate constant k ÷ Pre-exponential factor A))</code></td></tr></tbody></table><p><p>The exponent is dimensionless, so Ea and RT must be in the same energy unit. The 1000 in the expression converts kilojoules per mole into joules per mole, which is what R = 8.314 works in.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports rate constant k and fraction of collisions with enough energy and rate constant at T + 10 K.</p><ul><li><strong>Pre-exponential factor A</strong>. In the units of the rate constant; 10¹³ per second is typical for a unimolecular step</li><li><strong>Activation energy Ea</strong> — in kJ/mol. From two rate constants at two temperatures, or the literature</li><li><strong>Temperature</strong> — in K. Absolute temperature: 25 °C is 298.15 K</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Rate constant k</strong></li><li><strong>Fraction of collisions with enough energy</strong></li><li><strong>Rate constant at T + 10 K</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Pre-exponential factor A = 1 × 10<sup>13</sup>, Activation energy Ea = 100 kJ/mol, Temperature = 298.15 K — and the results panel reads:</p><ul><li><strong>Rate constant k</strong> = <code>Pre-exponential factor A × exp(-Activation energy Ea × 1000 ÷ (8.314 × Temperature))</code> = <strong>3.018 × 10<sup>-5</sup></strong></li><li><strong>Fraction of collisions with enough energy</strong> = <code>exp(-Activation energy Ea × 1000 ÷ (8.314 × Temperature))</code> = <strong>3.018 × 10<sup>-18</sup></strong></li><li><strong>Rate constant at T + 10 K</strong> = <code>Pre-exponential factor A × exp(-Activation energy Ea × 1000 ÷ (8.314 × (Temperature+10)))</code> = <strong>0.0001118</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 × 10<sup>13< ÷ sup> × exp(-100 × 1000 ÷ (8.314 × 298.15)) = 3.018 × 10<sup>-5</sup></code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A = 10¹³ s⁻¹ with a 100 kJ/mol barrier at 298.15 K: RT is 2.479 kJ/mol, so the exponent is −40.3 and only 3.0 × 10⁻¹⁸ of the collisions qualify. The rate constant is 3.03 × 10⁻⁵ per second, and ten degrees warmer it is 3.7 times larger.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>The fraction is the number to look at. An exponent around −10 leaves one collision in twenty thousand able to react and the reaction is brisk. An exponent around −40 leaves one in a hundred million billion, and the reaction at room temperature is effectively stopped.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Rate constant k</th><th>Fraction of collisions with enough energy</th><th>Rate constant at T + 10 K</th></tr></thead><tbody><tr><td><strong>Pre-exponential factor A</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Activation energy Ea</strong> +10 %</td><td>−98.23 %</td><td>−98.23 %</td><td>−97.98 %</td></tr><tr><td><strong>Temperature</strong> +10 %</td><td>+3 815.14 %</td><td>+3 815.14 %</td><td>+3 029.4 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Temperature</strong>: a ten per cent move there shifts the result by about 3 815.1 per cent. The least sensitive is <strong>Pre-exponential factor A</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Pre-exponential factor A = 1 × 10<sup>13</sup>, Activation energy Ea = 50, Temperature = 298.15, the page reports <strong>Rate constant k</strong> = 17 373.67, <strong>Fraction of collisions with enough energy</strong> = 1.737 × 10<sup>-9</sup>, <strong>Rate constant at T + 10 K</strong> = 33 432.76. Halving the barrier raises the fraction from 3.0 × 10⁻¹⁸ to 1.7 × 10⁻⁹ — more than half a billion times faster, which is what a catalyst is for.</li><li>With Pre-exponential factor A = 1 × 10<sup>11</sup>, Activation energy Ea = 20, Temperature = 600, the page reports <strong>Rate constant k</strong> = 1.815 × 10<sup>9</sup>, <strong>Fraction of collisions with enough energy</strong> = 0.018, <strong>Rate constant at T + 10 K</strong> = 1.938 × 10<sup>9</sup>. A small barrier at high temperature leaves 1.8 % of collisions productive.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Ea entered in joules and read as kilojoules.</strong> The expression expects kilojoules per mole; a joule figure makes the exponent a thousand times too small.</li><li><strong>The pre-exponential factor guessed.</strong> A ranges over many orders of magnitude, and k is exactly proportional to it, so a guess makes the answer a guess.</li><li><strong>Using the equation beyond its range.</strong> Near a phase change or with a changing mechanism, no single A and Ea describe the data.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Rate constant k, Fraction of collisions with enough energy, Rate constant at T + 10 K.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The rate constant comes back in whatever unit A was entered in, and the fraction has no unit. Entering A per second gives k per second; entering A in litres per mole per second gives k in the same units.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need pre-exponential factor A and activation energy Ea and temperature. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Rate constant k and fraction of collisions with enough energy and rate constant at t + 10 k should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Pre-exponential factor A</strong> ×10</td><td>3.018 × 10<sup>-5</sup></td><td>0.0003018</td><td>ten times larger</td></tr><tr><td><strong>Activation energy Ea</strong> ×10</td><td>3.018 × 10<sup>-5</sup></td><td>6.278 × 10<sup>-163</sup></td><td>×2.08 × 10<sup>-158</sup></td></tr><tr><td><strong>Temperature</strong> ×10</td><td>3.018 × 10<sup>-5</sup></td><td>1.77 × 10<sup>11</sup></td><td>×5.864 × 10<sup>15</sup></td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It is empirical.</strong> A and Ea are fitted, not derived: the equation describes the temperature dependence well but explains none of the chemistry.</li><li><strong>It ignores diffusion and catalysts.</strong> In solution the observed barrier includes the solvent's own temperature dependence.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing a reactor for a target rate at a known temperature.</li></li><li><li>Seeing how much a ten-degree rise actually buys.</li></li><li><li>Back-calculating A from one measured rate constant.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/activation-energy">Activation energy</a> <a href="/chemistry/rate-constant">Rate constant</a> <a href="/chemistry/q10">Q10 coefficient</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Arrhenius Equation calculator work out?', 'a' => <<<'TXT'
            It returns rate constant k and fraction of collisions with enough energy and rate constant at T + 10 K from pre-exponential factor A and activation energy Ea and temperature. The relationship is Pre-exponential factor A × exp(-Activation energy Ea × 1000 ÷ (8.314 × Temperature)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Pre-exponential factor A, Activation energy Ea (kJ/mol), Temperature (K). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: activation energy Ea in kJ/mol; temperature in K. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is the pre-exponential factor physically?', 'a' => <<<'TXT'
            Roughly the frequency of collisions with the right orientation, in the units of the rate constant. For a simple unimolecular step it is near the vibrational frequency, about 10¹³ per second.
            TXT],
            ['q' => 'Does a rate constant double every ten degrees?', 'a' => <<<'TXT'
            Often, yes — but only because typical reaction barriers near room temperature happen to give that. A small barrier doubles per ten degrees twice over; a large one barely moves.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/activation-energy', 'name' => 'Activation energy'],
            ['path' => '/chemistry/rate-constant', 'name' => 'Rate constant'],
            ['path' => '/chemistry/q10', 'name' => 'Q10 coefficient'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
