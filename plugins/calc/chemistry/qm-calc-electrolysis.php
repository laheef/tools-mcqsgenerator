<?php

/**
 * Electrolysis Calculator
 * /chemistry/electrolysis
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Electrolysis Calculator',
    'meta' => ['title' => 'Electrolysis Calculator: Mass Deposited by Current', 'description' => 'From the current, the time and the electrons each ion needs, work out how much charge passes through the cell and what mass of metal it therefore deposits.', 'h1' => 'Electrolysis Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'current',
                    'label' => 'Current',
                    'type' => 'number',
                    'suffix' => 'A',
                    'default' => '1',
                    'help' => 'Amperes, held constant through the run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'time',
                    'label' => 'Time',
                    'type' => 'number',
                    'suffix' => 's',
                    'default' => '3600',
                    'help' => 'Seconds; one hour is 3 600',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass',
                    'label' => 'Molar mass of the substance',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '63.546',
                    'help' => 'Copper is 63.546',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'electrons',
                    'label' => 'Electrons per ion',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Two for Cu²⁺, three for Al³⁺, one for Ag⁺',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'charge',
                    'label' => 'Charge passed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'C',
                ],
                [
                    'name' => 'mass',
                    'label' => 'Mass deposited',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'moles',
                    'label' => 'Moles deposited',
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
            'title' => 'Electrolysis',
            'results' => [
                'charge' => 'current*time',
                'mass' => 'molar_mass*current*time/(electrons*96485)',
                'moles' => 'current*time/(electrons*96485)',
                'current' => 'mass*electrons*96485/(molar_mass*time)',
                'time' => 'mass*electrons*96485/(molar_mass*current)',
                'molar_mass' => 'mass*electrons*96485/(current*time)',
                'electrons' => 'molar_mass*current*time/(mass*96485)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Faraday's laws turn current and time into matter: charge is current × time, and <strong>mass = (M × I × t) ÷ (n × F)</strong>, where n is the electrons each ion needs and F is 96 485 coulombs per mole. The page reports the charge, the moles of electrons and the mass deposited.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Electrolysis is the one place where a chemist can count electrons with a stopwatch and an ammeter. One mole of electrons is 96 485 coulombs, and that constant is what connects the electrical world to the molar one.</p><p>The page reports <strong>charge passed and mass deposited and moles deposited</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Charge passed</strong></td><td><code>Current × Time</code></td></tr><tr><td><strong>Mass deposited</strong></td><td><code>Molar mass of the substance × Current × Time ÷ (Electrons per ion × 96485)</code></td></tr><tr><td><strong>Moles deposited</strong></td><td><code>Current × Time ÷ (Electrons per ion × 96485)</code></td></tr><tr><td><strong>Current</strong></td><td><code>Mass deposited × Electrons per ion × 96485 ÷ (Molar mass of the substance × Time)</code></td></tr><tr><td><strong>Time</strong></td><td><code>Mass deposited × Electrons per ion × 96485 ÷ (Molar mass of the substance × Current)</code></td></tr><tr><td><strong>Molar mass of the substance</strong></td><td><code>Mass deposited × Electrons per ion × 96485 ÷ (Current × Time)</code></td></tr><tr><td><strong>Electrons per ion</strong></td><td><code>Molar mass of the substance × Current × Time ÷ (Mass deposited × 96485)</code></td></tr></tbody></table><p><p>Dividing the charge by nF gives moles of the substance directly. For a metal, that is the mass divided by its molar mass; for a gas, the same calculation gives moles of gas, which the ideal gas law then turns into a volume.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports charge passed and mass deposited and moles deposited.</p><ul><li><strong>Current</strong> — in A. Amperes, held constant through the run</li><li><strong>Time</strong> — in s. Seconds; one hour is 3 600</li><li><strong>Molar mass of the substance</strong> — in g/mol. Copper is 63.546</li><li><strong>Electrons per ion</strong>. Two for Cu²⁺, three for Al³⁺, one for Ag⁺</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Charge passed</strong> — in C</li><li><strong>Mass deposited</strong> — in g</li><li><strong>Moles deposited</strong> — in mol</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Current = 1 A, Time = 3 600 s, Molar mass of the substance = 63.546 g/mol, Electrons per ion = 2 — and the results panel reads:</p><ul><li><strong>Charge passed</strong> = <code>Current × Time</code> = <strong>3 600 C</strong></li><li><strong>Mass deposited</strong> = <code>Molar mass of the substance × Current × Time ÷ (Electrons per ion × 96485)</code> = <strong>1.185 g</strong></li><li><strong>Moles deposited</strong> = <code>Current × Time ÷ (Electrons per ion × 96485)</code> = <strong>0.019 mol</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 × 3 600 = 3 600</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>One ampere for an hour is 3 600 C, which is 0.01866 mol of electrons. Copper takes two electrons per ion, so 0.00933 mol of copper is deposited — 1.19 g — and the same charge would deposit 4.02 g of silver, more than three times as much, because silver needs a single electron per ion.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the mass you weigh with the mass this page predicts. A shortfall means a side reaction: hydrogen evolution on the cathode, oxygen on the anode, or metal falling off the electrode as powder.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Charge passed</th><th>Mass deposited</th><th>Moles deposited</th></tr></thead><tbody><tr><td><strong>Current</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Time</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Molar mass of the substance</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Electrons per ion</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Current</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Electrons per ion</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Current = 2, Time = 1 800, Molar mass of the substance = 107.87, Electrons per ion = 1, the page reports <strong>Charge passed</strong> = 3 600 C, <strong>Mass deposited</strong> = 4.025 g, <strong>Moles deposited</strong> = 0.037 mol. Silver from one electron per ion: 3 600 C deposits 4.02 g, which is why silver coulometers are used to measure charge.</li><li>With Current = 5, Time = 7 200, Molar mass of the substance = 26.982, Electrons per ion = 3, the page reports <strong>Charge passed</strong> = 36 000 C, <strong>Mass deposited</strong> = 3.356 g, <strong>Moles deposited</strong> = 0.124 mol. Aluminium at 5 A for two hours: 36 000 C gives 0.124 mol of electrons, so 3.36 g of metal.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Electrons per ion taken as the charge on the ion.</strong> For Cu²⁺ it is 2, but for a complex ion or a gas-evolving reaction it is the number actually transferred at the electrode.</li><li><strong>Current efficiency assumed to be 100 per cent.</strong> In water, part of the current goes to hydrogen or oxygen evolution and the metal yield falls short.</li><li><strong>Time entered in minutes.</strong> The faraday is defined per second, so all times must be in seconds.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Charge passed (C), Mass deposited (g), Moles deposited (mol).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Amperes and seconds give coulombs; coulombs divided by 96 485 give moles of electrons. The mass is in grams because the molar mass is in grams per mole, and the moles deposited is in moles of the substance rather than of electrons.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need current and time and molar mass of the substance and electrons per ion. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Charge passed and mass deposited and moles deposited should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Current</strong> ×10</td><td>3 600</td><td>36 000</td><td>ten times larger</td></tr><tr><td><strong>Time</strong> ×10</td><td>3 600</td><td>36 000</td><td>ten times larger</td></tr><tr><td><strong>Molar mass of the substance</strong> ×10</td><td>3 600</td><td>3 600</td><td>unchanged</td></tr><tr><td><strong>Electrons per ion</strong> ×10</td><td>3 600</td><td>3 600</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes 100 % current efficiency.</strong> Real cells lose current to side reactions, which is what a current-efficiency figure measures.</li><li><strong>It ignores what happens at the other electrode.</strong> The anode reaction must balance the cathode one, and the cell voltage it needs is a thermodynamic question.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing a plating bath's current and time for a target thickness.</li></li><li><li>Checking the charge a coulometer delivered.</li></li><li><li>Working out how much hydrogen or chlorine an electrolysis run produces.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/electromotive-force">Cell EMF</a> <a href="/chemistry/nernst-equation">Nernst equation</a> <a href="/chemistry/mole">Mole</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Electrolysis calculator work out?', 'a' => <<<'TXT'
            It returns charge passed and mass deposited and moles deposited from current and time and molar mass of the substance and electrons per ion. The relationship is Current × Time.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Current (A), Time (s), Molar mass of the substance (g/mol), Electrons per ion. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: current in A; time in s; molar mass of the substance in g/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why 96 485?', 'a' => 'That is Faraday\'s constant: the charge on one mole of electrons, equal to Avogadro\'s number times the elementary charge.'],
            ['q' => 'Does a higher current always mean faster deposition?', 'a' => 'Usually, but above a limiting current the extra current goes into side reactions and the deposit becomes powdery rather than smooth.'],
        ],
        'related' => [
            ['path' => '/chemistry/electromotive-force', 'name' => 'Cell EMF'],
            ['path' => '/chemistry/nernst-equation', 'name' => 'Nernst equation'],
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
