<?php

/**
 * Radioactive Decay Calculator
 * /chemistry/radioactive-decay
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Radioactive Decay Calculator',
    'meta' => ['title' => 'Radioactive Decay Calculator: Activity and Atoms', 'description' => 'From an initial activity and a half-life, get the activity after a given time, the decay constant in per second, and the number of atoms behind that count.', 'h1' => 'Radioactive Decay Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'initial_activity',
                    'label' => 'Initial activity',
                    'type' => 'number',
                    'suffix' => 'Bq',
                    'default' => '1000',
                    'help' => 'Becquerels: decays per second',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'half_life',
                    'label' => 'Half-life',
                    'type' => 'number',
                    'suffix' => 's',
                    'default' => '3600',
                    'help' => 'In seconds here; one hour is 3600',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'time',
                    'label' => 'Elapsed time',
                    'type' => 'number',
                    'suffix' => 's',
                    'default' => '7200',
                    'help' => 'On the same clock as the half-life',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'activity',
                    'label' => 'Activity after the time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'Bq',
                ],
                [
                    'name' => 'decay_constant',
                    'label' => 'Decay constant λ',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '1/s',
                ],
                [
                    'name' => 'atoms_initial',
                    'label' => 'Radioactive atoms at the start',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fraction_decayed',
                    'label' => 'Fraction decayed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Radioactive Decay',
            'results' => [
                'decay_constant' => 'log(2)/half_life',
                'activity' => 'initial_activity*exp(-log(2)/half_life*time)',
                'atoms_initial' => 'initial_activity/(log(2)/half_life)',
                'fraction_decayed' => '(1-exp(-log(2)/half_life*time))*100',
                'initial_activity' => 'activity*exp(log(2)/half_life*time)',
                'half_life' => 'log(2)*time/log(initial_activity/activity)',
                'time' => 'log(initial_activity/activity)*half_life/log(2)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Activity falls exponentially: <strong>A = A₀·e<sup>−λt</sup></strong>, with the decay constant λ = ln 2 ÷ t½. This page reports the activity left, λ in per second, and the number of radioactive atoms the starting activity implies, since N = A ÷ λ.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Activity is what a detector measures; atom count is what the inventory holds. The link between them is λ, and it is a surprisingly large number: a becquerel is one decay per second, so a million becquerels of a substance with a half-life of an hour means five billion atoms.</p><p>The page reports <strong>activity after the time and decay constant λ and radioactive atoms at the start and fraction decayed</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Decay constant λ</strong></td><td><code>ln(2) ÷ Half-life</code></td></tr><tr><td><strong>Activity after the time</strong></td><td><code>Initial activity × exp(-ln(2) ÷ Half-life × Elapsed time)</code></td></tr><tr><td><strong>Radioactive atoms at the start</strong></td><td><code>Initial activity ÷ (ln(2) ÷ Half-life)</code></td></tr><tr><td><strong>Fraction decayed</strong></td><td><code>(1-exp(-ln(2) ÷ Half-life × Elapsed time)) × 100</code></td></tr><tr><td><strong>Initial activity</strong></td><td><code>Activity after the time × exp(ln(2) ÷ Half-life × Elapsed time)</code></td></tr><tr><td><strong>Half-life</strong></td><td><code>ln(2) × Elapsed time ÷ ln(Initial activity ÷ Activity after the time)</code></td></tr><tr><td><strong>Elapsed time</strong></td><td><code>ln(Initial activity ÷ Activity after the time) × Half-life ÷ ln(2)</code></td></tr></tbody></table><p><p>λ has units of per second and is the probability that any one atom decays in the next second. Dividing the activity by it converts a rate into a population, which is why the answer for a long-lived isotope is enormous.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports activity after the time and decay constant λ and radioactive atoms at the start and fraction decayed.</p><ul><li><strong>Initial activity</strong> — in Bq. Becquerels: decays per second</li><li><strong>Half-life</strong> — in s. In seconds here; one hour is 3600</li><li><strong>Elapsed time</strong> — in s. On the same clock as the half-life</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Activity after the time</strong> — in Bq</li><li><strong>Decay constant λ</strong> — in 1/s</li><li><strong>Radioactive atoms at the start</strong></li><li><strong>Fraction decayed</strong> — in %</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Initial activity = 1 000 Bq, Half-life = 3 600 s, Elapsed time = 7 200 s — and the results panel reads:</p><ul><li><strong>Activity after the time</strong> = <code>Initial activity × exp(-ln(2) ÷ Half-life × Elapsed time)</code> = <strong>250 Bq</strong></li><li><strong>Decay constant λ</strong> = <code>ln(2) ÷ Half-life</code> = <strong>0.0001925 1/s</strong></li><li><strong>Radioactive atoms at the start</strong> = <code>Initial activity ÷ (ln(2) ÷ Half-life)</code> = <strong>5.194 × 10<sup>6</sup></strong></li><li><strong>Fraction decayed</strong> = <code>(1-exp(-ln(2) ÷ Half-life × Elapsed time)) × 100</code> = <strong>75 %</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 000 × exp(-log(2) ÷ 3 600 × 7 200) = 250</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>1000 Bq with a one-hour half-life, read after two hours: 250 Bq remains, λ = 1.925 × 10⁻⁴ per second, and the starting activity needed 5.19 million atoms to produce it. Three quarters of the activity is gone.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the activity you measure with the date on the vial. A source reading a quarter of its stated activity has passed two half-lives, which is what a radiopharmaceutical's working life is planned around.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Activity after the time</th><th>Decay constant λ</th><th>Radioactive atoms at the start</th><th>Fraction decayed</th></tr></thead><tbody><tr><td><strong>Initial activity</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Half-life</strong> +10 %</td><td>+13.43 %</td><td>−9.09 %</td><td>+10 %</td><td>−4.48 %</td></tr><tr><td><strong>Elapsed time</strong> +10 %</td><td>−12.94 %</td><td>+0 %</td><td>+0 %</td><td>+4.31 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Half-life</strong>: a ten per cent move there shifts the result by about 13.4 per cent. The least sensitive is <strong>Initial activity</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Initial activity = 4 000, Half-life = 8, Elapsed time = 24, the page reports <strong>Activity after the time</strong> = 500 Bq, <strong>Decay constant λ</strong> = 0.087 1/s, <strong>Radioactive atoms at the start</strong> = 46 166.241, <strong>Fraction decayed</strong> = 87.5 %. Three half-lives in a day: 500 Bq left of 4 000, and 87.5 % decayed.</li><li>With Initial activity = 10 000, Half-life = 3 600, Elapsed time = 1 800, the page reports <strong>Activity after the time</strong> = 7 071.068 Bq, <strong>Decay constant λ</strong> = 0.0001925 1/s, <strong>Radioactive atoms at the start</strong> = 5.194 × 10<sup>7</sup>, <strong>Fraction decayed</strong> = 29.289 %. Half a half-life leaves 70.7 % — 7 071 Bq — because the decay is exponential rather than linear.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Becquerels and counts per minute mixed.</strong> 1 Bq is 1 decay per second, so a counter reading in cpm is sixty times smaller when converted, not the other way.</li><li><strong>Half-life in the wrong unit.</strong> 3 600 entered as hours rather than seconds changes λ by a factor of 3 600.</li><li><strong>Atom count read as the sample's mass.</strong> N is the number of radioactive atoms, and the mass behind it needs the molar mass and Avogadro's number.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Activity after the time (Bq), Decay constant λ (1/s), Radioactive atoms at the start, Fraction decayed (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Activity in becquerels, time in seconds, λ in per second — the three fit together with no conversion factors. The atom count is a plain number, and the fraction decayed is a percentage.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need initial activity and half-life and elapsed time. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Activity after the time and decay constant λ and radioactive atoms at the start and fraction decayed should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Initial activity</strong> ×10</td><td>250</td><td>2 500</td><td>ten times larger</td></tr><tr><td><strong>Half-life</strong> ×10</td><td>250</td><td>870.551</td><td>×3.482</td></tr><tr><td><strong>Elapsed time</strong> ×10</td><td>250</td><td>0.0009537</td><td>×3.815 × 10<sup>-6</sup></td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes one isotope.</strong> A sample holding a decay chain has activity from the daughters as well, and the curve is not a single exponential.</li><li><strong>Measurement efficiency is not included.</strong> A detector registering 250 counts per second may be seeing fewer decays than that, or more, depending on geometry.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Working out a source's activity after a delay.</li></li><li><li>Converting a measured activity into an atom count.</li></li><li><li>Checking a radionuclide's decay after transport.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/half-life">Half-life</a> <a href="/chemistry/carbon-dating">Carbon dating</a> <a href="/chemistry/rate-constant">Rate constant</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Radioactive Decay calculator work out?', 'a' => <<<'TXT'
            It returns activity after the time and decay constant λ and radioactive atoms at the start and fraction decayed from initial activity and half-life and elapsed time. The relationship is ln(2) ÷ Half-life.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Initial activity (Bq), Half-life (s), Elapsed time (s). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: initial activity in Bq; half-life in s; elapsed time in s. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is the atom count so much larger than the activity?', 'a' => <<<'TXT'
            Because each atom decays only rarely. With a one-hour half-life, λ is about 2 × 10⁻⁴ per second, so it takes several thousand atoms to give one decay per second.
            TXT],
            ['q' => 'What is a becquerel?', 'a' => 'One decay per second. A curie, the older unit, is 3.7 × 10¹⁰ Bq — the activity of a gram of radium.'],
        ],
        'related' => [
            ['path' => '/chemistry/half-life', 'name' => 'Half-life'],
            ['path' => '/chemistry/carbon-dating', 'name' => 'Carbon dating'],
            ['path' => '/chemistry/rate-constant', 'name' => 'Rate constant'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
