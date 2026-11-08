<?php

/**
 * Partial Pressure Calculator
 * /chemistry/partial-pressure
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Partial Pressure Calculator',
    'meta' => ['title' => 'Partial Pressure Calculator: Dalton\'s Law, in kPa', 'description' => 'Work out a gas\'s partial pressure from its mole fraction and the total pressure, and the mole fraction a measured partial pressure implies. Units shown.', 'h1' => 'Partial Pressure Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'mole_fraction',
                    'label' => 'Mole fraction of the gas (x)',
                    'type' => 'number',
                    'default' => '0.21',
                    'help' => '0.21 for oxygen in air, 0.0004 for carbon dioxide',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'total_pressure',
                    'label' => 'Total pressure (P)',
                    'type' => 'number',
                    'suffix' => 'kPa',
                    'default' => '101.3',
                    'help' => 'At sea level, 101.3 kPa',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'partial_pressure',
                    'label' => 'Partial pressure (p)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kPa',
                ],
                [
                    'name' => 'partial_atm',
                    'label' => 'Partial pressure',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'atm',
                ],
                [
                    'name' => 'partial_mmhg',
                    'label' => 'Partial pressure',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mmHg',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Partial Pressure',
            'results' => [
                'partial_pressure' => 'mole_fraction*total_pressure',
                'partial_atm' => 'mole_fraction*total_pressure/101.325',
                'partial_mmhg' => 'mole_fraction*total_pressure*760/101.325',
                'mole_fraction' => 'partial_pressure/total_pressure',
                'total_pressure' => 'partial_pressure/mole_fraction',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>In a gas mixture each component exerts the pressure it would exert alone: <strong>p<sub>i</sub> = x<sub>i</sub> × P<sub>total</sub></strong>. Dalton's law says those partial pressures add up to the total, which is why a gas analysis in percent is also an analysis in pressure.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Every gas exchange in physiology and every gas-phase equilibrium is written in partial pressures: oxygen uptake in the lung, carbon dioxide in a fermenter, the driving force of a reaction over a catalyst. Percent by volume is the same number, which makes the conversion almost transparent.</p><p>The page reports <strong>partial pressure (kPa) and partial pressure (atm) and partial pressure (mmHg)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Partial pressure (kPa)</strong></td><td><code>Mole fraction of the gas (x) × Total pressure (P)</code></td></tr><tr><td><strong>Partial pressure (atm)</strong></td><td><code>Mole fraction of the gas (x) × Total pressure (P) ÷ 101.325</code></td></tr><tr><td><strong>Partial pressure (mmHg)</strong></td><td><code>Mole fraction of the gas (x) × Total pressure (P) × 760 ÷ 101.325</code></td></tr><tr><td><strong>Mole fraction of the gas (x)</strong></td><td><code>Partial pressure (kPa) ÷ Total pressure (P)</code></td></tr><tr><td><strong>Total pressure (P)</strong></td><td><code>Partial pressure (kPa) ÷ Mole fraction of the gas (x)</code></td></tr></tbody></table><p><p>Dalton's law is exact for ideal gases and a very good approximation at atmospheric pressure. The mole fraction is the same as the volume fraction, which is why 21 % oxygen is 21 kPa of oxygen in 101 kPa of air.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports partial pressure (kPa) and partial pressure (atm) and partial pressure (mmHg).</p><ul><li><strong>Mole fraction of the gas (x)</strong>. 0.21 for oxygen in air, 0.0004 for carbon dioxide</li><li><strong>Total pressure (P)</strong> — in kPa. At sea level, 101.3 kPa</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Partial pressure (p)</strong> — in kPa</li><li><strong>Partial pressure</strong> — in atm</li><li><strong>Partial pressure</strong> — in mmHg</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mole fraction of the gas (x) = 0.21, Total pressure (P) = 101.3 kPa — and the results panel reads:</p><ul><li><strong>Partial pressure (p)</strong> = <code>Mole fraction of the gas (x) × Total pressure (P)</code> = <strong>21.273 kPa</strong></li><li><strong>Partial pressure</strong> = <code>Mole fraction of the gas (x) × Total pressure (P) ÷ 101.325</code> = <strong>0.21 atm</strong></li><li><strong>Partial pressure</strong> = <code>Mole fraction of the gas (x) × Total pressure (P) × 760 ÷ 101.325</code> = <strong>159.561 mmHg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.21 × 101.3 = 21.273</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Oxygen at a mole fraction of 0.21 in air at 101.3 kPa has a partial pressure of 21.3 kPa — 159 mmHg, the figure printed on every blood-gas report as the inspired oxygen pressure.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the result against the physiological or industrial range you care about. Alveolar oxygen sits near 13 kPa, arterial blood near 12 kPa, and supplemental oxygen at 2 atmospheres pushes it past 40 kPa. For a reaction over a catalyst, it is the partial pressure of the reactant that sets the rate.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Partial pressure (p)</th><th>Partial pressure</th><th>Partial pressure</th></tr></thead><tbody><tr><td><strong>Mole fraction of the gas (x)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Total pressure (P)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Mole fraction of the gas (x)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Total pressure (P)</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mole fraction of the gas (x) = 0.04, Total pressure (P) = 101.3, the page reports <strong>Partial pressure (p)</strong> = 4.052 kPa, <strong>Partial pressure</strong> = 0.04 atm, <strong>Partial pressure</strong> = 30.392 mmHg. Carbon dioxide at 4 % — the concentration in expired air — is 4.05 kPa.</li><li>With Mole fraction of the gas (x) = 0.21, Total pressure (P) = 202.6, the page reports <strong>Partial pressure (p)</strong> = 42.546 kPa, <strong>Partial pressure</strong> = 0.42 atm, <strong>Partial pressure</strong> = 319.121 mmHg. The same 21 % at two atmospheres doubles the partial pressure to 42.5 kPa.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Percent used undivided.</strong> 21 instead of 0.21 gives a partial pressure a hundred times too large.</li><li><strong>Total pressure assumed to be one atmosphere.</strong> At altitude, in a pressurised cabin or in a fermenter, it is not.</li><li><strong>Water vapour left out of the total.</strong> In humid gas at body temperature, water contributes about 6.3 kPa and reduces every dry gas's share.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Partial pressure (p) (kPa), Partial pressure (atm), Partial pressure (mmHg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The result is reported in kPa, atm and mmHg because the three are in daily use: kPa in engineering, atm in chemistry, mmHg in medicine and physiology.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mole fraction of the gas (x) and total pressure (P). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Partial pressure (kpa) and partial pressure (atm) and partial pressure (mmhg) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mole fraction of the gas (x)</strong> ×10</td><td>21.273</td><td>212.73</td><td>ten times larger</td></tr><tr><td><strong>Total pressure (P)</strong> ×10</td><td>21.273</td><td>212.73</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes an ideal gas.</strong> At high pressure, fugacity replaces partial pressure and the law drifts.</li><li><strong>It says nothing about interaction.</strong> Two gases at the same partial pressure can behave very differently if one dissolves or reacts.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Working out the oxygen available at altitude or under pressure.</li></li><li><li>Setting a gas mixture for a fermenter or an incubator.</li></li><li><li>Converting a gas analysis in percent into the pressures an equilibrium needs.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/raoults-law">Raoult&#x27;s law</a> <a href="/chemistry/mole-fraction">Mole fraction</a> <a href="/chemistry/kp">Kp</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Partial Pressure calculator work out?', 'a' => <<<'TXT'
            It returns partial pressure (kPa) and partial pressure (atm) and partial pressure (mmHg) from mole fraction of the gas (x) and total pressure (P). The relationship is Mole fraction of the gas (x) × Total pressure (P).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mole fraction of the gas (x), Total pressure (P) (kPa). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: total pressure (P) in kPa. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Is partial pressure the same as concentration?', 'a' => 'They are proportional through the ideal gas law: p = cRT. A partial pressure is the easier thing to control, which is why gas work is written in it.'],
            ['q' => 'Do the partial pressures really add up to the total?', 'a' => 'For ideal gases, exactly. For real gases at high pressure, the sum of the fugacities does, and the partial pressures only approximately.'],
        ],
        'related' => [
            ['path' => '/chemistry/raoults-law', 'name' => 'Raoult\'s law'],
            ['path' => '/chemistry/mole-fraction', 'name' => 'Mole fraction'],
            ['path' => '/chemistry/kp', 'name' => 'Kp'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
