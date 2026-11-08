<?php

/**
 * Hydrogen Ion Concentration Calculator
 * /chemistry/hydrogen-ion-concentration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hydrogen Ion Concentration Calculator',
    'meta' => ['title' => 'Hydrogen Ion Concentration: From pH to mol/L', 'description' => 'Convert a pH reading back into a hydrogen ion concentration in mol/L and nmol/L, the step every equilibrium or kinetics calculation needs first of all.', 'h1' => 'Hydrogen Ion Concentration Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'ph',
                    'label' => 'pH',
                    'type' => 'number',
                    'default' => '7.4',
                    'help' => 'A pH reading, as the meter shows it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'h_conc',
                    'label' => 'Hydrogen ion concentration [H⁺]',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L',
                ],
                [
                    'name' => 'h_conc_nm',
                    'label' => 'Hydrogen ion concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'nmol/L',
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
            'title' => 'Hydrogen Ion Concentration',
            'results' => ['h_conc' => 'pow(10,-ph)', 'h_conc_nm' => 'pow(10,-ph)*1000000000', 'oh_conc' => '0.00000000000001/pow(10,-ph)', 'ph' => '-log10(h_conc)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>pH is a logarithm, so it has to be undone to be used: <strong>[H⁺] = 10<sup>−pH</sup></strong> mol/L. This page converts a pH reading into the concentration that equilibrium expressions, rate laws and buffer calculations actually take, and reports the hydroxide concentration alongside it.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A pH meter reports a number; an equilibrium expression wants a concentration. The conversion is a single power of ten, but getting it the wrong way round — multiplying where you should divide — is the commonest slip in buffer arithmetic.</p><p>The page reports <strong>hydrogen ion concentration [H⁺] and hydrogen ion concentration and hydroxide ion concentration [OH⁻]</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Hydrogen ion concentration [H⁺]</strong></td><td><code>(10)^-pH</code></td></tr><tr><td><strong>Hydrogen ion concentration</strong></td><td><code>(10)^-pH × 1000000000</code></td></tr><tr><td><strong>Hydroxide ion concentration [OH⁻]</strong></td><td><code>1 × 10<sup>-14< ÷ sup> ÷ (10)^-pH</code></td></tr><tr><td><strong>pH</strong></td><td><code>-log₁₀(Hydrogen ion concentration [H⁺])</code></td></tr></tbody></table><p><p>The nanomolar result is the same quantity scaled up a billion times. Blood plasma at pH 7.4 holds 40 nmol/L of hydrogen ions, which is easier to compare with clinical reference ranges than 4 × 10⁻⁸ mol/L.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs. It reports hydrogen ion concentration [H⁺] and hydrogen ion concentration and hydroxide ion concentration [OH⁻].</p><ul><li><strong>pH</strong>. A pH reading, as the meter shows it</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Hydrogen ion concentration [H⁺]</strong> — in mol/L</li><li><strong>Hydrogen ion concentration</strong> — in nmol/L</li><li><strong>Hydroxide ion concentration [OH⁻]</strong> — in mol/L</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — pH = 7.4 — and the results panel reads:</p><ul><li><strong>Hydrogen ion concentration [H⁺]</strong> = <code>(10)^-pH</code> = <strong>3.981 × 10<sup>-8</sup> mol/L</strong></li><li><strong>Hydrogen ion concentration</strong> = <code>(10)^-pH × 1000000000</code> = <strong>39.811 nmol/L</strong></li><li><strong>Hydroxide ion concentration [OH⁻]</strong> = <code>1 × 10<sup>-14< ÷ sup> ÷ (10)^-pH</code> = <strong>2.512 × 10<sup>-7</sup> mol/L</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pow(10,-7.4) = 3.981 × 10<sup>-8</sup></code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>pH 7.4 gives 10⁻⁷·⁴ = 3.98 × 10⁻⁸ mol/L, or 39.8 nmol/L. The hydroxide concentration is 1 × 10⁻¹⁴ ÷ 3.98 × 10⁻⁸ = 2.51 × 10⁻⁷ mol/L — the pH 6.6 figure, exactly as the pOH of 6.6 implies.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Sanity-check with the neutral point: a pH below 7 gives a hydrogen ion concentration above 10⁻⁷ mol/L, and a pH above 7 gives one below it. The further from 7, the further the exponent moves, in steps of one per pH unit.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Hydrogen ion concentration [H⁺]</th><th>Hydrogen ion concentration</th><th>Hydroxide ion concentration [OH⁻]</th></tr></thead><tbody><tr><td><strong>pH</strong> +10 %</td><td>−81.8 %</td><td>−81.8 %</td><td>+449.54 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>pH</strong>: a ten per cent move there shifts the result by about 449.5 per cent. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With pH = 2, the page reports <strong>Hydrogen ion concentration [H⁺]</strong> = 0.01 mol/L, <strong>Hydrogen ion concentration</strong> = 1 × 10<sup>7</sup> nmol/L, <strong>Hydroxide ion concentration [OH⁻]</strong> = 1 × 10<sup>-12</sup> mol/L. pH 2 is 0.01 mol/L — a 10 mM strong acid, roughly stomach acid.</li><li>With pH = 10, the page reports <strong>Hydrogen ion concentration [H⁺]</strong> = 1 × 10<sup>-10</sup> mol/L, <strong>Hydrogen ion concentration</strong> = 0.1 nmol/L, <strong>Hydroxide ion concentration [OH⁻]</strong> = 0.0001 mol/L. pH 10 is 1 × 10⁻¹⁰ mol/L of H⁺, and 1 mmol/L of OH⁻.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The sign dropped.</strong> 10^pH instead of 10^−pH turns an acidic solution into an absurd one, and the answer still parses.</li><li><strong>pH of a buffer read as free acid.</strong> A buffer at pH 4.7 does not hold 2 × 10⁻⁵ mol/L of acid in total; most of it is undissociated.</li><li><strong>Units of the result.</strong> The output is mol/L, not mmol/L; a solution at pH 3 is 1 mmol/L, not 1 mol/L.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Hydrogen ion concentration [H⁺] (mol/L), Hydrogen ion concentration (nmol/L), Hydroxide ion concentration [OH⁻] (mol/L).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Both concentrations are molar. The nanomolar column exists because physiological concentrations sit in the tens of nanomoles per litre, where a power of ten is easier to read than a negative exponent.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need pH. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Hydrogen ion concentration [h⁺] and hydrogen ion concentration and hydroxide ion concentration [oh⁻] should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>pH</strong> ×10</td><td>3.981 × 10<sup>-8</sup></td><td>1 × 10<sup>-74</sup></td><td>×2.512 × 10<sup>-67</sup></td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It uses the 25 °C ion product.</strong> At other temperatures Kw changes and the hydroxide result moves with it, even though the hydrogen figure does not.</li><li><strong>Concentration is not activity.</strong> In concentrated or high-ionic-strength solutions, the thermodynamically active concentration is lower than the figure here.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Feeding an equilibrium expression with a measured pH.</li></li><li><li>Comparing a physiological pH with a reference range in nmol/L.</li></li><li><li>Working out how much acid a buffer must contain to sit at a given pH.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/ph">pH</a> <a href="/chemistry/pka">pKa</a> <a href="/chemistry/buffer-ph">Buffer pH</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hydrogen Ion Concentration calculator work out?', 'a' => 'It returns hydrogen ion concentration [H⁺] and hydrogen ion concentration and hydroxide ion concentration [OH⁻] from pH. The relationship is (10)^-pH.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'pH. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => 'It matters that every box is in the unit printed beside it: . The page converts nothing on its own, so a mixed set of units is the most common wrong answer.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Is the result the total acid concentration?', 'a' => 'No — it is the free hydrogen ion concentration. A weak acid at pH 3 may be 0.1 mol/L in total and still only hold 10⁻³ mol/L of free H⁺.'],
        ],
        'related' => [
            ['path' => '/chemistry/ph', 'name' => 'pH'],
            ['path' => '/chemistry/pka', 'name' => 'pKa'],
            ['path' => '/chemistry/buffer-ph', 'name' => 'Buffer pH'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
