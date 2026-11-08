<?php

/**
 * Osmotic Pressure Calculator
 * /chemistry/osmotic-pressure
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Osmotic Pressure Calculator',
    'meta' => ['title' => 'Osmotic Pressure Calculator: π = iMRT, Step by Step', 'description' => 'Work out the pressure a solution exerts across a semipermeable membrane, from the particle count, molarity and temperature. The formula and units are shown.', 'h1' => 'Osmotic Pressure Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'van_t_hoff',
                    'label' => 'Van\'t Hoff factor (i)',
                    'type' => 'number',
                    'default' => '2',
                    'help' => '2 for NaCl, 1 for glucose',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molarity',
                    'label' => 'Molarity (M)',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.15',
                    'help' => 'Moles per litre of solution',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'temperature',
                    'label' => 'Temperature (T)',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '310.15',
                    'help' => 'Kelvin: 37 °C is 310.15 K',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pressure_kpa',
                    'label' => 'Osmotic pressure (π)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kPa',
                ],
                [
                    'name' => 'pressure_atm',
                    'label' => 'Osmotic pressure',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'atm',
                ],
                [
                    'name' => 'osmolarity',
                    'label' => 'Osmolarity (iM)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'osmol/L',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Osmotic Pressure',
            'results' => [
                'pressure_kpa' => 'van_t_hoff*molarity*8.314*temperature',
                'pressure_atm' => 'van_t_hoff*molarity*8.314*temperature/101.325',
                'osmolarity' => 'van_t_hoff*molarity',
                'van_t_hoff' => 'pressure_kpa/(molarity*8.314*temperature)',
                'molarity' => 'pressure_kpa/(van_t_hoff*8.314*temperature)',
                'temperature' => 'pressure_kpa/(van_t_hoff*molarity*8.314)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Osmotic pressure is the pressure needed to stop solvent crossing a semipermeable membrane: <strong>π = iMRT</strong>, with i the van't Hoff factor, M the molarity, R = 8.314 J/(mol·K) and T the temperature in kelvin.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Osmotic pressure is the colligative property that matters most in biology: cell volumes are set by it, and an intravenous fluid has to match blood's osmolarity or cells swell and burst. It is also the largest of the four colligative effects — a millimolar solution generates a pressure you can measure on a dial.</p><p>The page reports <strong>osmotic pressure (kPa) and osmotic pressure (atm) and osmolarity (iM)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Osmotic pressure (kPa)</strong></td><td><code>Van't Hoff factor (i) × Molarity (M) × 8.314 × Temperature (T)</code></td></tr><tr><td><strong>Osmotic pressure (atm)</strong></td><td><code>Van't Hoff factor (i) × Molarity (M) × 8.314 × Temperature (T) ÷ 101.325</code></td></tr><tr><td><strong>Osmolarity (iM)</strong></td><td><code>Van't Hoff factor (i) × Molarity (M)</code></td></tr><tr><td><strong>Van&#x27;t Hoff factor (i)</strong></td><td><code>Osmotic pressure (kPa) ÷ (Molarity (M) × 8.314 × Temperature (T))</code></td></tr><tr><td><strong>Molarity (M)</strong></td><td><code>Osmotic pressure (kPa) ÷ (Van't Hoff factor (i) × 8.314 × Temperature (T))</code></td></tr><tr><td><strong>Temperature (T)</strong></td><td><code>Osmotic pressure (kPa) ÷ (Van't Hoff factor (i) × Molarity (M) × 8.314)</code></td></tr></tbody></table><p><p>R = 8.314 J/(mol·K) with molarity in mol/L gives pascals directly, because a joule is a pascal-cubic metre and a litre is 10⁻³ m³. The page reports kPa so the number stays readable.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports osmotic pressure (kPa) and osmotic pressure (atm) and osmolarity (iM).</p><ul><li><strong>Van&#x27;t Hoff factor (i)</strong>. 2 for NaCl, 1 for glucose</li><li><strong>Molarity (M)</strong> — in mol/L. Moles per litre of solution</li><li><strong>Temperature (T)</strong> — in K. Kelvin: 37 °C is 310.15 K</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Osmotic pressure (π)</strong> — in kPa</li><li><strong>Osmotic pressure</strong> — in atm</li><li><strong>Osmolarity (iM)</strong> — in osmol/L</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Van't Hoff factor (i) = 2, Molarity (M) = 0.15 mol/L, Temperature (T) = 310.15 K — and the results panel reads:</p><ul><li><strong>Osmotic pressure (π)</strong> = <code>Van't Hoff factor (i) × Molarity (M) × 8.314 × Temperature (T)</code> = <strong>773.576 kPa</strong></li><li><strong>Osmotic pressure</strong> = <code>Van't Hoff factor (i) × Molarity (M) × 8.314 × Temperature (T) ÷ 101.325</code> = <strong>7.635 atm</strong></li><li><strong>Osmolarity (iM)</strong> = <code>Van't Hoff factor (i) × Molarity (M)</code> = <strong>0.3 osmol/L</strong></li></ul><p>With the numbers written into the formula, the first result is <code>2 × 0.15 × 8.314 × 310.15 = 773.576</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Normal saline, 0.154 mol/L of sodium chloride at 310.15 K with i = 2, gives π = 2 × 0.154 × 8.314 × 310.15 = 794 kPa — about 7.8 atmospheres, the pressure that keeps red cells the right shape. Its osmolarity is 0.308 osmol/L, which is blood's.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the osmolarity rather than the pressure when comparing with biology: blood plasma sits at about 0.29 osmol/L, so 0.308 is isotonic and 0.15 would be hypotonic, letting water into cells. The pressure figure is more useful to an engineer sizing a membrane.</p></p><table class="calc-table"><thead><tr><th>Range</th><th>What it means</th></tr></thead><tbody><tr><td><strong>0.15 osmol/L</strong></td><td>Hypotonic: water enters cells, which swell.</td></tr><tr><td><strong>0.29–0.31 osmol/L</strong></td><td>Isotonic: the physiological range for mammalian cells.</td></tr><tr><td><strong>Above 0.5 osmol/L</strong></td><td>Hypertonic: cells lose water and shrivel.</td></tr></tbody></table>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Osmotic pressure (π)</th><th>Osmotic pressure</th><th>Osmolarity (iM)</th></tr></thead><tbody><tr><td><strong>Van&#x27;t Hoff factor (i)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Molarity (M)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Temperature (T)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Van&#x27;t Hoff factor (i)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Temperature (T)</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Van&#x27;t Hoff factor (i) = 1, Molarity (M) = 0.3, Temperature (T) = 310.15, the page reports <strong>Osmotic pressure (π)</strong> = 773.576 kPa, <strong>Osmotic pressure</strong> = 7.635 atm, <strong>Osmolarity (iM)</strong> = 0.3 osmol/L. 0.3 M glucose is isotonic with blood: 773 kPa at 37 °C.</li><li>With Van&#x27;t Hoff factor (i) = 1, Molarity (M) = 0.001, Temperature (T) = 298.15, the page reports <strong>Osmotic pressure (π)</strong> = 2.479 kPa, <strong>Osmotic pressure</strong> = 0.024 atm, <strong>Osmolarity (iM)</strong> = 0.001 osmol/L. Even a millimolar solution exerts 2.48 kPa — enough to move a column of water 25 cm high.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>i left at 1 for a salt.</strong> Half the real pressure, and a fluid that will haemolyse cells.</li><li><strong>Temperature in Celsius.</strong> 37 instead of 310.15 understates the pressure by a factor of eight.</li><li><strong>Molarity used for a concentrated solution.</strong> Above about 0.1 mol/L, osmolarity and osmolality diverge and the measured pressure follows the second more closely.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Osmotic pressure (π) (kPa), Osmotic pressure (atm), Osmolarity (iM) (osmol/L).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Osmolarity is in osmol/L — the same as molarity multiplied by the particle count, and numerically equal to it for a non-electrolyte. Pressure is reported in kPa and in atmospheres because clinical and engineering work use different units.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need van't Hoff factor (i) and molarity (M) and temperature (T). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Osmotic pressure (kpa) and osmotic pressure (atm) and osmolarity (im) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Van&#x27;t Hoff factor (i)</strong> ×10</td><td>773.576</td><td>7 735.761</td><td>ten times larger</td></tr><tr><td><strong>Molarity (M)</strong> ×10</td><td>773.576</td><td>7 735.761</td><td>ten times larger</td></tr><tr><td><strong>Temperature (T)</strong> ×10</td><td>773.576</td><td>7 735.761</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes a semipermeable membrane.</strong> A leaky membrane lets the solute through and the pressure falls towards zero.</li><li><strong>It assumes ideal dilute behaviour.</strong> At physiological ionic strength, osmotic coefficients are noticeably below 1, so measured pressures run a little lower.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking that an intravenous fluid is isotonic.</li></li><li><li>Sizing the pressure a membrane has to withstand.</li></li><li><li>Working out how much a cryoprotectant will shrink cells before freezing.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/freezing-point-depression">Freezing point depression</a> <a href="/chemistry/molarity">Molarity</a> <a href="/chemistry/raoults-law">Raoult&#x27;s law</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Osmotic Pressure calculator work out?', 'a' => <<<'TXT'
            It returns osmotic pressure (kPa) and osmotic pressure (atm) and osmolarity (iM) from van't Hoff factor (i) and molarity (M) and temperature (T). The relationship is Van't Hoff factor (i) × Molarity (M) × 8.314 × Temperature (T).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Van\'t Hoff factor (i), Molarity (M) (mol/L), Temperature (T) (K). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: molarity (M) in mol/L; temperature (T) in K. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why does saline have i = 2?', 'a' => 'Because sodium chloride dissociates into two ions, and each ion contributes to the particle count that sets the pressure.'],
            ['q' => 'Is osmotic pressure the same as oncotic pressure?', 'a' => 'Oncotic pressure is the part of it contributed by proteins across a capillary wall. The physics is the same; the setting is biological.'],
        ],
        'related' => [
            ['path' => '/chemistry/freezing-point-depression', 'name' => 'Freezing point depression'],
            ['path' => '/chemistry/molarity', 'name' => 'Molarity'],
            ['path' => '/chemistry/raoults-law', 'name' => 'Raoult\'s law'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
