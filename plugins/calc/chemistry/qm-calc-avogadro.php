<?php

/**
 * Avogadro's Number Calculator
 * /chemistry/avogadro
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Avogadro\'s Number Calculator',
    'meta' => ['title' => 'Avogadro\'s Number Calculator: Particles / Moles', 'description' => 'Divide a counted number of particles by the moles they represent and compare the result with the defined 6.022 140 76 × 10²³ particles per mole of substance.', 'h1' => 'Avogadro\'s Number Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'particles',
                    'label' => 'Number of particles (N)',
                    'type' => 'number',
                    'default' => '1204428152000000000000000',
                    'help' => 'Counted or calculated number of particles',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'moles',
                    'label' => 'Amount of substance (n)',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '2',
                    'help' => 'Moles those particles represent',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'avogadro',
                    'label' => 'Avogadro\'s constant (Nₐ)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '1/mol',
                ],
                [
                    'name' => 'moles_check',
                    'label' => 'Amount implied by the count',
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
            'title' => 'Avogadro\'s Number',
            'results' => ['avogadro' => 'particles/moles', 'moles_check' => 'particles/602214076000000000000000', 'particles' => 'avogadro*moles', 'moles' => 'particles/avogadro'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Avogadro's constant is the number of particles in one mole, <strong>N<sub>A</sub> = N ÷ n</strong>. Since the 2019 revision of SI it is fixed by definition at 6.022 140 76 × 10²³ mol⁻¹, so this page is really a check: divide a counted number of particles by the moles they represent and see whether the arithmetic and the count agree.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The constant is exact, but counts never are. This page is how you find out how far a measured count lands from the definition — a useful check on a particle-counting experiment, a coulometry run, or a student's first calculation.</p><p>The page reports <strong>avogadro's constant (Nₐ) and amount implied by the count</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Avogadro&#x27;s constant (Nₐ)</strong></td><td><code>Number of particles (N) ÷ Amount of substance (n)</code></td></tr><tr><td><strong>Amount implied by the count</strong></td><td><code>Number of particles (N) ÷ 6.022 × 10<sup>23< ÷ sup></code></td></tr><tr><td><strong>Number of particles (N)</strong></td><td><code>Avogadro's constant (Nₐ) × Amount of substance (n)</code></td></tr><tr><td><strong>Amount of substance (n)</strong></td><td><code>Number of particles (N) ÷ Avogadro's constant (Nₐ)</code></td></tr></tbody></table><p><p>The second result is the same division the other way round: it applies the defined constant to the count, so a discrepancy in the first result shows up here as a mole figure that disagrees with the one you typed.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports avogadro's constant (Nₐ) and amount implied by the count.</p><ul><li><strong>Number of particles (N)</strong>. Counted or calculated number of particles</li><li><strong>Amount of substance (n)</strong> — in mol. Moles those particles represent</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Avogadro&#x27;s constant (Nₐ)</strong> — in 1/mol</li><li><strong>Amount implied by the count</strong> — in mol</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Number of particles (N) = 1.204 × 10<sup>24</sup>, Amount of substance (n) = 2 mol — and the results panel reads:</p><ul><li><strong>Avogadro&#x27;s constant (Nₐ)</strong> = <code>Number of particles (N) ÷ Amount of substance (n)</code> = <strong>6.022 × 10<sup>23</sup> 1/mol</strong></li><li><strong>Amount implied by the count</strong> = <code>Number of particles (N) ÷ 6.022 × 10<sup>23< ÷ sup></code> = <strong>2 mol</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1.204 × 10<sup>24< ÷ sup> ÷ 2 = 6.022 × 10<sup>23</sup></code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>1.2044 × 10²⁴ particles over 2 mol gives 6.022 × 10²³ mol⁻¹, the defined value to four significant figures. The check result returns exactly 2 mol.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Agreement to the first four digits means the count and the amount are consistent. The constant is exact, so any gap between the two is a gap in the count, the mole figure or the arithmetic that produced them — never in the definition itself.</p><p>A result within a few per cent is a normal experimental spread. A factor of two or ten out is a unit or a mole-basis error, not a measurement.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Avogadro&#x27;s constant (Nₐ)</th><th>Amount implied by the count</th></tr></thead><tbody><tr><td><strong>Number of particles (N)</strong> +10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Amount of substance (n)</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Number of particles (N)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Amount of substance (n)</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Number of particles (N) = 6.022 × 10<sup>23</sup>, Amount of substance (n) = 1, the page reports <strong>Avogadro&#x27;s constant (Nₐ)</strong> = 6.022 × 10<sup>23</sup> 1/mol, <strong>Amount implied by the count</strong> = 1 mol. One mole of anything is exactly the defined constant.</li><li>With Number of particles (N) = 1 × 10<sup>20</sup>, Amount of substance (n) = 0.0001, the page reports <strong>Avogadro&#x27;s constant (Nₐ)</strong> = 1 × 10<sup>24</sup> 1/mol, <strong>Amount implied by the count</strong> = 0.0001661 mol. Small counts work the same way: 10²⁰ particles in 0.1 mmol still gives 10²⁴ per mole.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Particles entered per litre.</strong> A concentration is not a count; multiply by the volume first, or the answer is off by that volume.</li><li><strong>Moles entered as millimoles.</strong> 2 mmol is 0.002 mol and changes the result by a factor of a thousand.</li><li><strong>Formula units counted as atoms.</strong> Avogadro's number counts whatever you counted; mixing the two gives a result that is wrong by the atoms-per-unit factor.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Avogadro's constant (Nₐ) (1/mol), Amount implied by the count (mol).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The result carries the unit mol⁻¹ — per mole — because it is a number of particles divided by a number of moles. It is a defined constant, not a measurement, so it should reproduce to the digits you typed.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need number of particles (N) and amount of substance (n). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Avogadro's constant (nₐ) and amount implied by the count should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Number of particles (N)</strong> ×10</td><td>6.022 × 10<sup>23</sup></td><td>6.022 × 10<sup>24</sup></td><td>ten times larger</td></tr><tr><td><strong>Amount of substance (n)</strong> ×10</td><td>6.022 × 10<sup>23</sup></td><td>6.022 × 10<sup>22</sup></td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It cannot validate a count.</strong> If the particle figure came from the same moles by the same constant, the answer is circular and proves nothing.</li><li><strong>It assumes identical particles.</strong> A mixture needs a statement of what was counted before the division means anything.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a particle-counting experiment against the defined constant.</li></li><li><li>Converting between molar and molecular scales in a calculation.</li></li><li><li>Teaching why the mole is a count rather than a mass.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/moles-to-atoms">Moles to atoms</a> <a href="/chemistry/mole">Mole</a> <a href="/chemistry/molar-mass">Molar mass</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Avogadro\'s Number calculator work out?', 'a' => <<<'TXT'
            It returns avogadro's constant (Nₐ) and amount implied by the count from number of particles (N) and amount of substance (n). The relationship is Number of particles (N) ÷ Amount of substance (n).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Number of particles (N), Amount of substance (n) (mol). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: amount of substance (n) in mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Is Avogadro\'s number a measured value?', 'a' => <<<'TXT'
            No longer. Since 2019 the mole is defined by fixing Avogadro's constant at exactly 6.022 140 76 × 10²³ mol⁻¹, so the number is exact and the mole is what the measurement defines.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/moles-to-atoms', 'name' => 'Moles to atoms'],
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
