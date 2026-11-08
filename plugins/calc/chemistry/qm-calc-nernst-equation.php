<?php

/**
 * Nernst Equation Calculator
 * /chemistry/nernst-equation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Nernst Equation Calculator',
    'meta' => ['title' => 'Nernst Equation Calculator: E from E° and Q Value', 'description' => 'Adjust a standard electrode potential for the concentrations actually present, and see the millivolts per decade the cell is working with. Units shown.', 'h1' => 'Nernst Equation Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'e0',
                    'label' => 'Standard cell potential (E°)',
                    'type' => 'number',
                    'suffix' => 'V',
                    'default' => '1.1',
                    'help' => 'From a table of standard potentials',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'n',
                    'label' => 'Electrons transferred (n)',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'From the balanced half-reactions',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'q',
                    'label' => 'Reaction quotient (Q)',
                    'type' => 'number',
                    'default' => '1',
                    'help' => '[products] ÷ [reactants], each raised to its coefficient',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'temperature',
                    'label' => 'Temperature (T)',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '298.15',
                    'help' => 'Kelvin',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'e',
                    'label' => 'Cell potential (E)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'V',
                ],
                [
                    'name' => 'e_mv',
                    'label' => 'Cell potential',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mV',
                ],
                [
                    'name' => 'slope_mv',
                    'label' => 'Potential per decade of Q',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mV',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Nernst Equation',
            'results' => [
                'e' => 'e0-8.314*temperature/(n*96485)*log(q)',
                'e_mv' => '(e0-8.314*temperature/(n*96485)*log(q))*1000',
                'slope_mv' => '2.302585*8.314*temperature/(n*96485)*1000',
                'e0' => 'e+8.314*temperature/(n*96485)*log(q)',
                'q' => 'exp((e0-e)*n*96485/(8.314*temperature))',
                'temperature' => '(e0-e)*n*96485/(8.314*log(q))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A cell's potential falls as its products accumulate and its reactants are consumed. The Nernst equation states that: <strong>E = E° − (2.303RT ÷ nF) log₁₀Q</strong>, which at 25 °C collapses to E° − (0.0592 ÷ n) log₁₀Q.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Standard potentials describe a situation that never quite exists — everything at unit activity. The Nernst equation is how a real cell's voltage is predicted from what is actually in it, and it is the basis of every pH electrode, ion-selective sensor and battery voltage curve.</p><p>The page reports <strong>cell potential (V) and cell potential (mV) and potential per decade of Q</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Cell potential (V)</strong></td><td><code>Standard cell potential (E°)-8.314 × Temperature (T) ÷ (Electrons transferred (n) × 96485) × ln(Reaction quotient (Q))</code></td></tr><tr><td><strong>Cell potential (mV)</strong></td><td><code>(Standard cell potential (E°)-8.314 × Temperature (T) ÷ (Electrons transferred (n) × 96485) × ln(Reaction quotient (Q))) × 1000</code></td></tr><tr><td><strong>Potential per decade of Q</strong></td><td><code>2.302585 × 8.314 × Temperature (T) ÷ (Electrons transferred (n) × 96485) × 1000</code></td></tr><tr><td><strong>Standard cell potential (E°)</strong></td><td><code>Cell potential (V)+8.314 × Temperature (T) ÷ (Electrons transferred (n) × 96485) × ln(Reaction quotient (Q))</code></td></tr><tr><td><strong>Reaction quotient (Q)</strong></td><td><code>exp((Standard cell potential (E°)-Cell potential (V)) × Electrons transferred (n) × 96485 ÷ (8.314 × Temperature (T)))</code></td></tr><tr><td><strong>Temperature (T)</strong></td><td><code>(Standard cell potential (E°)-Cell potential (V)) × Electrons transferred (n) × 96485 ÷ (8.314 × ln(Reaction quotient (Q)))</code></td></tr></tbody></table><p><p>The 2.303 converts natural to base-10 logarithms; the page uses the natural logarithm with the full RT/nF factor, so it stays correct at any temperature. At 25 °C the coefficient works out to 59.2 mV per decade for a one-electron process.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports cell potential (V) and cell potential (mV) and potential per decade of Q.</p><ul><li><strong>Standard cell potential (E°)</strong> — in V. From a table of standard potentials</li><li><strong>Electrons transferred (n)</strong>. From the balanced half-reactions</li><li><strong>Reaction quotient (Q)</strong>. [products] ÷ [reactants], each raised to its coefficient</li><li><strong>Temperature (T)</strong> — in K. Kelvin</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Cell potential (E)</strong> — in V</li><li><strong>Cell potential</strong> — in mV</li><li><strong>Potential per decade of Q</strong> — in mV</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Standard cell potential (E°) = 1.1 V, Electrons transferred (n) = 2, Reaction quotient (Q) = 1, Temperature (T) = 298.15 K — and the results panel reads:</p><ul><li><strong>Cell potential (E)</strong> = <code>Standard cell potential (E°)-8.314 × Temperature (T) ÷ (Electrons transferred (n) × 96485) × ln(Reaction quotient (Q))</code> = <strong>1.1 V</strong></li><li><strong>Cell potential</strong> = <code>(Standard cell potential (E°)-8.314 × Temperature (T) ÷ (Electrons transferred (n) × 96485) × ln(Reaction quotient (Q))) × 1000</code> = <strong>1 100 mV</strong></li><li><strong>Potential per decade of Q</strong> = <code>2.302585 × 8.314 × Temperature (T) ÷ (Electrons transferred (n) × 96485) × 1000</code> = <strong>29.578 mV</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1.1-8.314 × 298.15 ÷ (2 × 96485) × log(1) = 1.1</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Taking a standard potential of 1.1 V, two electrons and Q = 1 leaves the logarithm at zero and the potential at 1.1 V — the standard state. The slope result, 29.6 mV per decade, is half the familiar 59 mV because two electrons are transferred per reaction event.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the slope against the number of electrons: 59 mV per decade for one, 30 for two, 20 for three. A measured slope well away from that in a real sensor is the diagnostic for a failing electrode — the classic check on a pH meter is that it delivers close to 59 mV per pH unit.</p></p><table class="calc-table"><thead><tr><th>Range</th><th>What it means</th></tr></thead><tbody><tr><td><strong>Q = 1</strong></td><td>The standard potential, by definition.</td></tr><tr><td><strong>Q = 10</strong></td><td>The potential falls by one slope unit (59 mV for n = 1).</td></tr><tr><td><strong>Q = 100</strong></td><td>Two decades: 118 mV down for a one-electron process.</td></tr></tbody></table>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Cell potential (E)</th><th>Cell potential</th><th>Potential per decade of Q</th></tr></thead><tbody><tr><td><strong>Standard cell potential (E°)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Electrons transferred (n)</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td></tr><tr><td><strong>Reaction quotient (Q)</strong> +10 %</td><td>−0.11 %</td><td>−0.11 %</td><td>+0 %</td></tr><tr><td><strong>Temperature (T)</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Standard cell potential (E°)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Reaction quotient (Q)</strong>, at 0.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Standard cell potential (E°) = 1.1, Electrons transferred (n) = 2, Reaction quotient (Q) = 10, Temperature (T) = 298.15, the page reports <strong>Cell potential (E)</strong> = 1.07 V, <strong>Cell potential</strong> = 1 070.422 mV, <strong>Potential per decade of Q</strong> = 29.578 mV. One decade of Q: E drops from 1.1 V to 1.070 V.</li><li>With Standard cell potential (E°) = 0, Electrons transferred (n) = 1, Reaction quotient (Q) = 1 × 10<sup>-7</sup>, Temperature (T) = 298.15, the page reports <strong>Cell potential (E)</strong> = 0.414 V, <strong>Cell potential</strong> = 414.094 mV, <strong>Potential per decade of Q</strong> = 59.156 mV. The hydrogen electrode at pH 7 reads −0.414 V — the pH term in every electrode potential.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Q inverted.</strong> Products over reactants is the convention; the reciprocal flips the sign of the correction and moves the potential the wrong way.</li><li><strong>n left at 1.</strong> Each electron changes the slope by a factor, so a two-electron reaction with n = 1 has twice the correction it should.</li><li><strong>E° and E confused.</strong> E° is a constant; E depends on the mixture. Quoting E° for a working cell overstates it whenever products have built up.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Cell potential (E) (V), Cell potential (mV), Potential per decade of Q (mV).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Potentials are reported in volts and millivolts because electrode work is done in millivolts: 59 mV per decade is the number every electrochemist knows.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need standard cell potential (E°) and electrons transferred (n) and reaction quotient (Q) and temperature (T). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Cell potential (v) and cell potential (mv) and potential per decade of q should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Standard cell potential (E°)</strong> ×10</td><td>1.1</td><td>11</td><td>ten times larger</td></tr><tr><td><strong>Electrons transferred (n)</strong> ×10</td><td>1.1</td><td>1.1</td><td>unchanged</td></tr><tr><td><strong>Reaction quotient (Q)</strong> ×10</td><td>1.1</td><td>1.07</td><td>×0.973</td></tr><tr><td><strong>Temperature (T)</strong> ×10</td><td>1.1</td><td>1.1</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes Nernstian behaviour.</strong> Real electrodes have junction potentials, drift and a finite response time.</li><li><strong>It ignores activity coefficients.</strong> At high ionic strength, Q computed from concentrations is not the thermodynamically correct ratio.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Predicting a cell's voltage from its concentrations.</li></li><li><li>Working out the potential of an electrode at a given pH.</li></li><li><li>Checking that a pH or ion-selective electrode is responding properly.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/electromotive-force">Cell EMF</a> <a href="/chemistry/reaction-quotient">Reaction quotient</a> <a href="/chemistry/ph">pH</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Nernst Equation calculator work out?', 'a' => <<<'TXT'
            It returns cell potential (V) and cell potential (mV) and potential per decade of Q from standard cell potential (E°) and electrons transferred (n) and reaction quotient (Q) and temperature (T). The relationship is Standard cell potential (E°)-8.314 × Temperature (T) ÷ (Electrons transferred (n) × 96485) × ln(Reaction quotient (Q)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Standard cell potential (E°) (V), Electrons transferred (n), Reaction quotient (Q), Temperature (T) (K). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: standard cell potential (E°) in V; temperature (T) in K. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why 59 mV per decade?', 'a' => 'Because (RT/F) ln 10 at 25 °C is 0.0592 V. It is the voltage equivalent of a tenfold concentration change for a one-electron process.'],
            ['q' => 'What is Q here?', 'a' => 'The reaction quotient — products over reactants, each raised to its coefficient, with solids and pure liquids omitted.'],
        ],
        'related' => [
            ['path' => '/chemistry/electromotive-force', 'name' => 'Cell EMF'],
            ['path' => '/chemistry/reaction-quotient', 'name' => 'Reaction quotient'],
            ['path' => '/chemistry/ph', 'name' => 'pH'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
