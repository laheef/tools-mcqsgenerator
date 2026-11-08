<?php

/**
 * Chemical equation balancer
 * /chemistry/chemical-equation-balancer
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Chemical equation balancer',
    'meta' => ['title' => 'Chemical Equation Balancer: Hydrocarbon Combustion', 'description' => 'Balance a hydrocarbon combustion in one step: give the fuel\'s carbon, hydrogen and oxygen atoms and read the coefficients for oxygen, carbon dioxide and water.', 'h1' => 'Chemical equation balancer', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'carbon_atoms',
                    'label' => 'Carbon atoms in the fuel',
                    'type' => 'number',
                    'default' => '8',
                    'help' => 'Eight for octane, C8H18',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hydrogen_atoms',
                    'label' => 'Hydrogen atoms in the fuel',
                    'type' => 'number',
                    'default' => '18',
                    'help' => 'Eighteen for octane',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'oxygen_atoms',
                    'label' => 'Oxygen atoms already in the fuel',
                    'type' => 'number',
                    'default' => '0',
                    'help' => 'Zero for a hydrocarbon; one for ethanol',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'o2_coefficient',
                    'label' => 'Coefficient of O₂',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'co2_coefficient',
                    'label' => 'Coefficient of CO₂',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'h2o_coefficient',
                    'label' => 'Coefficient of H₂O',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'oxygen_mass',
                    'label' => 'Mass of O₂ per mole of fuel',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Chemical equation balancer',
            'results' => [
                'o2_coefficient' => 'carbon_atoms+hydrogen_atoms/4-oxygen_atoms/2',
                'co2_coefficient' => 'carbon_atoms',
                'h2o_coefficient' => 'hydrogen_atoms/2',
                'oxygen_mass' => '(carbon_atoms+hydrogen_atoms/4-oxygen_atoms/2)*31.998',
                'carbon_atoms' => 'co2_coefficient',
                'hydrogen_atoms' => '2*h2o_coefficient',
                'oxygen_atoms' => '2*(carbon_atoms+hydrogen_atoms/4-o2_coefficient)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>For a fuel C<sub>c</sub>H<sub>h</sub>O<sub>o</sub> burning in oxygen, the balanced equation is <strong>fuel + (c + h/4 − o/2) O₂ → c CO₂ + (h/2) H₂O</strong>. The page returns all three coefficients, and the mass of oxygen they imply.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Balancing is where every combustion question starts. The coefficients tell you how much oxygen a fuel demands, how much carbon dioxide it will produce, and — once you divide by the fuel's mass — the stoichiometric air-fuel ratio.</p><p>The page reports <strong>coefficient of O₂ and coefficient of CO₂ and coefficient of H₂O and mass of O₂ per mole of fuel</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Coefficient of O₂</strong></td><td><code>Carbon atoms in the fuel+Hydrogen atoms in the fuel ÷ 4-Oxygen atoms already in the fuel ÷ 2</code></td></tr><tr><td><strong>Coefficient of CO₂</strong></td><td><code>Carbon atoms in the fuel</code></td></tr><tr><td><strong>Coefficient of H₂O</strong></td><td><code>Hydrogen atoms in the fuel ÷ 2</code></td></tr><tr><td><strong>Mass of O₂ per mole of fuel</strong></td><td><code>(Carbon atoms in the fuel+Hydrogen atoms in the fuel ÷ 4-Oxygen atoms already in the fuel ÷ 2) × 31.998</code></td></tr><tr><td><strong>Carbon atoms in the fuel</strong></td><td><code>Coefficient of CO₂</code></td></tr><tr><td><strong>Hydrogen atoms in the fuel</strong></td><td><code>2 × Coefficient of H₂O</code></td></tr><tr><td><strong>Oxygen atoms already in the fuel</strong></td><td><code>2 × (Carbon atoms in the fuel+Hydrogen atoms in the fuel ÷ 4-Coefficient of O₂)</code></td></tr></tbody></table><p><p>The carbon coefficient is simply the number of carbon atoms, because each one becomes a CO₂. Hydrogen appears in pairs in water, so it is halved. Oxygen already in the fuel is subtracted, halved again because it arrives as O₂ rather than as single atoms.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports coefficient of O₂ and coefficient of CO₂ and coefficient of H₂O and mass of O₂ per mole of fuel.</p><ul><li><strong>Carbon atoms in the fuel</strong>. Eight for octane, C8H18</li><li><strong>Hydrogen atoms in the fuel</strong>. Eighteen for octane</li><li><strong>Oxygen atoms already in the fuel</strong>. Zero for a hydrocarbon; one for ethanol</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Coefficient of O₂</strong></li><li><strong>Coefficient of CO₂</strong></li><li><strong>Coefficient of H₂O</strong></li><li><strong>Mass of O₂ per mole of fuel</strong> — in g</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Carbon atoms in the fuel = 8, Hydrogen atoms in the fuel = 18, Oxygen atoms already in the fuel = 0 — and the results panel reads:</p><ul><li><strong>Coefficient of O₂</strong> = <code>Carbon atoms in the fuel+Hydrogen atoms in the fuel ÷ 4-Oxygen atoms already in the fuel ÷ 2</code> = <strong>12.5</strong></li><li><strong>Coefficient of CO₂</strong> = <code>Carbon atoms in the fuel</code> = <strong>8</strong></li><li><strong>Coefficient of H₂O</strong> = <code>Hydrogen atoms in the fuel ÷ 2</code> = <strong>9</strong></li><li><strong>Mass of O₂ per mole of fuel</strong> = <code>(Carbon atoms in the fuel+Hydrogen atoms in the fuel ÷ 4-Oxygen atoms already in the fuel ÷ 2) × 31.998</code> = <strong>399.975 g</strong></li></ul><p>With the numbers written into the formula, the first result is <code>8+18 ÷ 4-0 ÷ 2 = 12.5</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Octane, C₈H₁₈: 8 carbons give 8 CO₂, 18 hydrogens give 9 H₂O, and the oxygen coefficient is 8 + 4.5 = 12.5. The balanced equation is C₈H₁₈ + 12.5 O₂ → 8 CO₂ + 9 H₂O, which is 400 g of oxygen for 114 g of fuel.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Fractional coefficients are correct and often kept: 12.5 O₂ is the honest count per molecule of octane. Double everything if a textbook wants whole numbers — the ratio does not change.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Coefficient of O₂</th><th>Coefficient of CO₂</th><th>Coefficient of H₂O</th><th>Mass of O₂ per mole of fuel</th></tr></thead><tbody><tr><td><strong>Carbon atoms in the fuel</strong> +10 %</td><td>+6.4 %</td><td>+10 %</td><td>+0 %</td><td>+6.4 %</td></tr><tr><td><strong>Hydrogen atoms in the fuel</strong> +10 %</td><td>+3.6 %</td><td>+0 %</td><td>+10 %</td><td>+3.6 %</td></tr><tr><td><strong>Oxygen atoms already in the fuel</strong> +10 %</td><td>−0.4 %</td><td>+0 %</td><td>+0 %</td><td>−0.4 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Carbon atoms in the fuel</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Oxygen atoms already in the fuel</strong>, at 0.4 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Carbon atoms in the fuel = 1, Hydrogen atoms in the fuel = 4, Oxygen atoms already in the fuel = 0, the page reports <strong>Coefficient of O₂</strong> = 2, <strong>Coefficient of CO₂</strong> = 1, <strong>Coefficient of H₂O</strong> = 2, <strong>Mass of O₂ per mole of fuel</strong> = 63.996 g. Methane: 2 O₂ gives 1 CO₂ and 2 H₂O — the simplest complete combustion there is.</li><li>With Carbon atoms in the fuel = 2, Hydrogen atoms in the fuel = 6, Oxygen atoms already in the fuel = 1, the page reports <strong>Coefficient of O₂</strong> = 3, <strong>Coefficient of CO₂</strong> = 2, <strong>Coefficient of H₂O</strong> = 3, <strong>Mass of O₂ per mole of fuel</strong> = 95.994 g. Ethanol: 3 O₂, 2 CO₂ and 3 H₂O. The fuel's own oxygen halves the demand.</li><li>With Carbon atoms in the fuel = 2, Hydrogen atoms in the fuel = 4, Oxygen atoms already in the fuel = 0, the page reports <strong>Coefficient of O₂</strong> = 3, <strong>Coefficient of CO₂</strong> = 2, <strong>Coefficient of H₂O</strong> = 2, <strong>Mass of O₂ per mole of fuel</strong> = 95.994 g. Ethene: 3 O₂, 2 CO₂ and 2 H₂O — an unsaturated fuel with a lower hydrogen count.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Oxygen in the fuel forgotten.</strong> Ethanol needs 3 O₂, not 3.5; the oxygen the molecule already carries is subtracted.</li><li><strong>Water written with one hydrogen.</strong> Water is H₂O, so the hydrogen coefficient is half the fuel's hydrogen count, not the whole of it.</li><li><strong>An incomplete combustion balanced as complete.</strong> Where carbon monoxide appears, the oxygen coefficient is smaller and this page does not apply.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Coefficient of O₂, Coefficient of CO₂, Coefficient of H₂O, Mass of O₂ per mole of fuel (g).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The three coefficients are counts and carry no units. The oxygen mass is in grams per mole of fuel, using 31.998 g/mol for O₂ — multiply the mole coefficient by that to get grams.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need carbon atoms in the fuel and hydrogen atoms in the fuel and oxygen atoms already in the fuel. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Coefficient of o₂ and coefficient of co₂ and coefficient of h₂o and mass of o₂ per mole of fuel should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Carbon atoms in the fuel</strong> ×10</td><td>12.5</td><td>84.5</td><td>×6.76</td></tr><tr><td><strong>Hydrogen atoms in the fuel</strong> ×10</td><td>12.5</td><td>53</td><td>×4.24</td></tr><tr><td><strong>Oxygen atoms already in the fuel</strong> ×10</td><td>12.5</td><td>12</td><td>×0.96</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Hydrocarbons only.</strong> The fuel may contain carbon, hydrogen and oxygen; nitrogen or sulfur in the fuel need their own terms.</li><li><strong>Complete combustion only.</strong> No carbon monoxide, soot or nitrogen oxides appear.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Writing a combustion equation with correct coefficients.</li></li><li><li>Finding the oxygen demand of a fuel before an AFR calculation.</li></li><li><li>Checking a hand-balanced equation.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/air-fuel-ratio-afr">Air-fuel ratio</a> <a href="/chemistry/heat-of-combustion">Heat of combustion</a> <a href="/chemistry/empirical-formula">Empirical formula</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Chemical equation balancer calculator work out?', 'a' => <<<'TXT'
            It returns coefficient of O₂ and coefficient of CO₂ and coefficient of H₂O and mass of O₂ per mole of fuel from carbon atoms in the fuel and hydrogen atoms in the fuel and oxygen atoms already in the fuel. The relationship is Carbon atoms in the fuel+Hydrogen atoms in the fuel ÷ 4-Oxygen atoms already in the fuel ÷ 2.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Carbon atoms in the fuel, Hydrogen atoms in the fuel, Oxygen atoms already in the fuel. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => 'It matters that every box is in the unit printed beside it: . The page converts nothing on its own, so a mixed set of units is the most common wrong answer.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is the oxygen coefficient fractional?', 'a' => <<<'TXT'
            Because it is per molecule of fuel. For octane, 12.5 molecules of O₂ is the exact requirement; doubling the whole equation makes it 25 for two molecules of octane.
            TXT],
            ['q' => 'Does the order of the fuel\'s atoms matter?', 'a' => 'No. Carbon, hydrogen and oxygen counts are all the page needs; how they are arranged in the molecule does not change the balanced equation.'],
        ],
        'related' => [
            ['path' => '/chemistry/air-fuel-ratio-afr', 'name' => 'Air-fuel ratio'],
            ['path' => '/chemistry/heat-of-combustion', 'name' => 'Heat of combustion'],
            ['path' => '/chemistry/empirical-formula', 'name' => 'Empirical formula'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
