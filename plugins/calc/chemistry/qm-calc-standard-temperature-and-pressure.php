<?php

/**
 * STP Calculator
 * /chemistry/standard-temperature-and-pressure
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'STP Calculator',
    'meta' => ['title' => 'STP Calculator: Gas Volume at 0 °C and 100 kPa', 'description' => <<<'TXT'
    Convert moles of gas to volume — or volume back to moles — at standard temperature and pressure, with the molar volume at your own conditions shown alongside.
    TXT, 'h1' => 'STP Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'moles',
                    'label' => 'Amount of gas',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '1',
                    'help' => 'Moles, not grams',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'temperature',
                    'label' => 'Temperature',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '273.15',
                    'help' => '273.15 K is 0 °C',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pressure',
                    'label' => 'Pressure',
                    'type' => 'number',
                    'suffix' => 'kPa',
                    'default' => '101.325',
                    'help' => '101.325 kPa is one atmosphere',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L',
                ],
                [
                    'name' => 'molar_volume',
                    'label' => 'Molar volume at these conditions',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L/mol',
                ],
                [
                    'name' => 'molecules',
                    'label' => 'Molecules',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'STP',
            'results' => [
                'volume' => 'moles*8.314*temperature/pressure',
                'molar_volume' => '8.314*temperature/pressure',
                'molecules' => 'moles*6.02214076*100000000000000000000000',
                'moles' => 'volume/molar_volume',
                'temperature' => 'pressure*volume/(moles*8.314)',
                'pressure' => 'moles*8.314*temperature/volume',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>At standard temperature and pressure one mole of an ideal gas occupies a fixed volume: <strong>V = nRT ÷ P</strong>. At 273.15 K and 101.325 kPa that is 22.414 L; at the IUPAC definition of 100 kPa it is 22.71 L. This page reports both the volume and the molar volume at the conditions you give it.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Gas volumes are quoted at standard conditions because gases expand and contract with temperature. Comparing two litres measured at different temperatures without correcting to STP is comparing two different amounts.</p><p>The page reports <strong>volume and molar volume at these conditions and molecules</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume</strong></td><td><code>Amount of gas × 8.314 × Temperature ÷ Pressure</code></td></tr><tr><td><strong>Molar volume at these conditions</strong></td><td><code>8.314 × Temperature ÷ Pressure</code></td></tr><tr><td><strong>Molecules</strong></td><td><code>Amount of gas × 6.02214076 × 1 × 10<sup>23< ÷ sup></code></td></tr><tr><td><strong>Amount of gas</strong></td><td><code>Volume ÷ Molar volume at these conditions</code></td></tr><tr><td><strong>Temperature</strong></td><td><code>Pressure × Volume ÷ (Amount of gas × 8.314)</code></td></tr><tr><td><strong>Pressure</strong></td><td><code>Amount of gas × 8.314 × Temperature ÷ Volume</code></td></tr></tbody></table><p><p>Molar volume is the volume of one mole, so it has the units litres per mole and depends only on temperature and pressure. Multiply it by the moles and you have the volume; divide a measured volume by it and you have the moles.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports volume and molar volume at these conditions and molecules.</p><ul><li><strong>Amount of gas</strong> — in mol. Moles, not grams</li><li><strong>Temperature</strong> — in K. 273.15 K is 0 °C</li><li><strong>Pressure</strong> — in kPa. 101.325 kPa is one atmosphere</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume</strong> — in L</li><li><strong>Molar volume at these conditions</strong> — in L/mol</li><li><strong>Molecules</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Amount of gas = 1 mol, Temperature = 273.15 K, Pressure = 101.325 kPa — and the results panel reads:</p><ul><li><strong>Volume</strong> = <code>Amount of gas × 8.314 × Temperature ÷ Pressure</code> = <strong>22.413 L</strong></li><li><strong>Molar volume at these conditions</strong> = <code>8.314 × Temperature ÷ Pressure</code> = <strong>22.413 L/mol</strong></li><li><strong>Molecules</strong> = <code>Amount of gas × 6.02214076 × 1 × 10<sup>23< ÷ sup></code> = <strong>6.022 × 10<sup>23</sup></strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 × 8.314 × 273.15 ÷ 101.325 = 22.413</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>One mole at 273.15 K and 101.325 kPa: 1 × 8.314 × 273.15 ÷ 101.325 = 22.41 L. Warm the same mole to 298.15 K at the same pressure and it occupies 24.47 L — the same gas, a larger volume.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Remember which standard you are using. The older 22.4 L per mole assumes one atmosphere; the IUPAC standard since 1982 is 100 kPa, which gives 22.71 L. The 1.3 per cent difference matters on a stoichiometry exam answer.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume</th><th>Molar volume at these conditions</th><th>Molecules</th></tr></thead><tbody><tr><td><strong>Amount of gas</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Temperature</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Pressure</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Amount of gas</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Pressure</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Amount of gas = 0.5, Pressure = 101.325, Temperature = 273.15, the page reports <strong>Volume</strong> = 11.206 L, <strong>Molar volume at these conditions</strong> = 22.413 L/mol, <strong>Molecules</strong> = 3.011 × 10<sup>23</sup>. Half a mole at STP is 11.21 L, whatever the gas is.</li><li>With Amount of gas = 1, Pressure = 100, Temperature = 273.15, the page reports <strong>Volume</strong> = 22.71 L, <strong>Molar volume at these conditions</strong> = 22.71 L/mol, <strong>Molecules</strong> = 6.022 × 10<sup>23</sup>. At the IUPAC standard pressure of exactly 100 kPa, one mole is 22.71 L.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Celsius entered.</strong> 0 °C is 273.15 K; entering 0 divides the volume by zero in the algebra and the page has nothing to return.</li><li><strong>22.4 taken as universal.</strong> It holds at one atmosphere and 0 °C only; at 25 °C the figure is 24.5 L.</li><li><strong>Real gas behaviour ignored.</strong> At high pressure or near condensation, the molar volume departs from the ideal figure, and no correction is applied here.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume (L), Molar volume at these conditions (L/mol), Molecules.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The volume comes back in litres because R is in kilopascal-litres per mole per kelvin. A gas volume in cubic centimetres or cubic metres has to be converted before it is entered.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need amount of gas and temperature and pressure. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Volume and molar volume at these conditions and molecules should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Amount of gas</strong> ×10</td><td>22.413</td><td>224.127</td><td>ten times larger</td></tr><tr><td><strong>Temperature</strong> ×10</td><td>22.413</td><td>224.127</td><td>ten times larger</td></tr><tr><td><strong>Pressure</strong> ×10</td><td>22.413</td><td>2.241</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Ideal gas only.</strong> The law is a model, accurate near room temperature and pressure, poor near a boiling point.</li><li><strong>One gas at a time.</strong> In a mixture, each component has its own partial volume — see the partial pressure page.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Converting a gas volume measured in the lab to a standard figure for comparison.</li></li><li><li>Sizing a gas collection vessel for a known number of moles.</li></li><li><li>Checking an exam answer that uses 22.4 L.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/molar-mass-of-gas">Molar mass of a gas</a> <a href="/chemistry/partial-pressure">Partial pressure</a> <a href="/chemistry/mole">Mole</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the STP calculator work out?', 'a' => <<<'TXT'
            It returns volume and molar volume at these conditions and molecules from amount of gas and temperature and pressure. The relationship is Amount of gas × 8.314 × Temperature ÷ Pressure.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Amount of gas (mol), Temperature (K), Pressure (kPa). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: amount of gas in mol; temperature in K; pressure in kPa. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Is STP 22.4 L or 22.7 L?', 'a' => 'Both, depending on the standard. 22.414 L per mole uses 1 atmosphere (101.325 kPa); 22.71 L uses the IUPAC standard of 100 kPa. State which one you used.'],
            ['q' => 'Does the molar volume depend on the gas?', 'a' => <<<'TXT'
            For an ideal gas, no — one mole of any gas occupies the same volume at the same temperature and pressure. Real gases differ slightly, more so as pressure rises.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/molar-mass-of-gas', 'name' => 'Molar mass of a gas'],
            ['path' => '/chemistry/partial-pressure', 'name' => 'Partial pressure'],
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
