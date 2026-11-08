<?php

/**
 * Half-Life Calculator
 * /chemistry/half-life
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Half-Life Calculator',
    'meta' => ['title' => 'Half-Life Calculator: Amount Left After a Given Time', 'description' => 'Follow a decaying substance through its half-lives: how much of it remains after a given time, how many half-lives have passed, and what fraction is left.', 'h1' => 'Half-Life Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'initial_amount',
                    'label' => 'Starting amount',
                    'type' => 'number',
                    'suffix' => 'mg',
                    'default' => '100',
                    'help' => 'Mass, activity or count — the unit carries through unchanged',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'half_life',
                    'label' => 'Half-life',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '6',
                    'help' => 'Hours in this example; the same unit as the elapsed time',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'time',
                    'label' => 'Elapsed time',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '24',
                    'help' => 'Measured on the same clock as the half-life',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'remaining',
                    'label' => 'Amount remaining',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mg',
                ],
                [
                    'name' => 'half_lives',
                    'label' => 'Half-lives elapsed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fraction_remaining',
                    'label' => 'Fraction remaining',
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
            'title' => 'Half-Life',
            'results' => [
                'remaining' => 'initial_amount*pow(0.5,time/half_life)',
                'half_lives' => 'time/half_life',
                'fraction_remaining' => 'pow(0.5,time/half_life)*100',
                'initial_amount' => 'remaining/pow(0.5,time/half_life)',
                'half_life' => 'time*log(2)/log(initial_amount/remaining)',
                'time' => 'half_life*log(initial_amount/remaining)/log(2)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Each half-life halves what is left, so after n half-lives the amount is <strong>N = N₀ × (1/2)<sup>n</sup></strong>, with n = t ÷ t½. The page reports the remaining amount, the number of half-lives elapsed and the percentage left.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Half-life is how decay is reported because it does not depend on how much you started with. Four half-lives leave a sixteenth whether the starting amount was a microgram or a tonne, which is why the number travels so well between fields.</p><p>The page reports <strong>amount remaining and half-lives elapsed and fraction remaining</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Amount remaining</strong></td><td><code>Starting amount × (0.5)^Elapsed time ÷ Half-life</code></td></tr><tr><td><strong>Half-lives elapsed</strong></td><td><code>Elapsed time ÷ Half-life</code></td></tr><tr><td><strong>Fraction remaining</strong></td><td><code>(0.5)^Elapsed time ÷ Half-life × 100</code></td></tr><tr><td><strong>Starting amount</strong></td><td><code>Amount remaining ÷ (0.5)^Elapsed time ÷ Half-life</code></td></tr><tr><td><strong>Half-life</strong></td><td><code>Elapsed time × ln(2) ÷ ln(Starting amount ÷ Amount remaining)</code></td></tr><tr><td><strong>Elapsed time</strong></td><td><code>Half-life × ln(Starting amount ÷ Amount remaining) ÷ ln(2)</code></td></tr></tbody></table><p><p>Halving repeatedly is the same as multiplying by a half in each half-life, which is why the exponent is the number of half-lives rather than the time. Because 0.5 raised to a power is easy to chain, the tenth half-life leaves one part in a thousand, not one in ten.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports amount remaining and half-lives elapsed and fraction remaining.</p><ul><li><strong>Starting amount</strong> — in mg. Mass, activity or count — the unit carries through unchanged</li><li><strong>Half-life</strong> — in h. Hours in this example; the same unit as the elapsed time</li><li><strong>Elapsed time</strong> — in h. Measured on the same clock as the half-life</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Amount remaining</strong> — in mg</li><li><strong>Half-lives elapsed</strong></li><li><strong>Fraction remaining</strong> — in %</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Starting amount = 100 mg, Half-life = 6 h, Elapsed time = 24 h — and the results panel reads:</p><ul><li><strong>Amount remaining</strong> = <code>Starting amount × (0.5)^Elapsed time ÷ Half-life</code> = <strong>6.25 mg</strong></li><li><strong>Half-lives elapsed</strong> = <code>Elapsed time ÷ Half-life</code> = <strong>4</strong></li><li><strong>Fraction remaining</strong> = <code>(0.5)^Elapsed time ÷ Half-life × 100</code> = <strong>6.25 %</strong></li></ul><p>With the numbers written into the formula, the first result is <code>100 × pow(0.5,24 ÷ 6) = 6.25</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>100 mg with a 6-hour half-life, read after 24 hours: four half-lives have passed, so what is left is 100 ÷ 16 = 6.25 mg, or 6.25 % of the starting amount.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Count in half-lives rather than in hours: after 1 half-life 50 % remains, after 3 it is 12.5 %, after 7 it is 0.78 %, after 10 it is 0.098 %. Ten half-lives is the usual definition of "gone" in radiochemistry, and about the point where a measurement stops being possible.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Amount remaining</th><th>Half-lives elapsed</th><th>Fraction remaining</th></tr></thead><tbody><tr><td><strong>Starting amount</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Half-life</strong> +10 %</td><td>+28.67 %</td><td>−9.09 %</td><td>+28.67 %</td></tr><tr><td><strong>Elapsed time</strong> +10 %</td><td>−24.21 %</td><td>+10 %</td><td>−24.21 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Half-life</strong>: a ten per cent move there shifts the result by about 28.7 per cent. The least sensitive is <strong>Starting amount</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Starting amount = 80, Half-life = 12.3, Elapsed time = 36.9, the page reports <strong>Amount remaining</strong> = 10 mg, <strong>Half-lives elapsed</strong> = 3, <strong>Fraction remaining</strong> = 12.5 %. Three half-lives leave 10 mg — an eighth of 80, whatever the substance.</li><li>With Starting amount = 500, Half-life = 5 730, Elapsed time = 17 190, the page reports <strong>Amount remaining</strong> = 62.5 mg, <strong>Half-lives elapsed</strong> = 3, <strong>Fraction remaining</strong> = 12.5 %. Carbon-14 after three half-lives: 62.5 mg of a 500 mg sample, 12.5 %.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Halving at the wrong interval.</strong> Two half-lives is a quarter, not a third; the halving is multiplicative, never additive.</li><li><strong>Mismatched units.</strong> A half-life in hours with an elapsed time in minutes moves the answer by a factor of sixty.</li><li><strong>Half-life treated as a shelf life.</strong> After one half-life half remains; there is no time at which all of it is gone.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Amount remaining (mg), Half-lives elapsed, Fraction remaining (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The remaining amount is in whatever unit the starting amount used, because the fraction is dimensionless. The half-lives elapsed is a plain number, and the fraction is a percentage.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need starting amount and half-life and elapsed time. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Amount remaining and half-lives elapsed and fraction remaining should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Starting amount</strong> ×10</td><td>6.25</td><td>62.5</td><td>ten times larger</td></tr><tr><td><strong>Half-life</strong> ×10</td><td>6.25</td><td>75.786</td><td>×12.126</td></tr><tr><td><strong>Elapsed time</strong> ×10</td><td>6.25</td><td>9.095 × 10<sup>-11</sup></td><td>×1.455 × 10<sup>-11</sup></td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes a single decay process.</strong> A substance eliminated by two routes at once has a curve that is not a single exponential.</li><li><strong>It says nothing about what the substance becomes.</strong> The daughter product may itself be radioactive, which is what a decay chain is.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Working out how much of a reagent survives a storage period.</li></li><li><li>Reading a radiopharmaceutical's activity at the time of use.</li></li><li><li>Finding a half-life from two amounts measured at known times.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/radioactive-decay">Radioactive decay</a> <a href="/chemistry/carbon-dating">Carbon dating</a> <a href="/chemistry/rate-constant">Rate constant</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Half-Life calculator work out?', 'a' => <<<'TXT'
            It returns amount remaining and half-lives elapsed and fraction remaining from starting amount and half-life and elapsed time. The relationship is Starting amount × (0.5)^Elapsed time ÷ Half-life.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Starting amount (mg), Half-life (h), Elapsed time (h). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: starting amount in mg; half-life in h; elapsed time in h. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much is left after five half-lives?', 'a' => 'One thirty-second, about 3.1 %. After ten, one thousandth and a bit. The fraction halves each time; it never reaches zero.'],
            ['q' => 'Can I find the half-life from two measurements?', 'a' => 'Yes — enter one as the starting amount, the other as the remaining amount and the time between them, then solve for the half-life. The page will return it.'],
        ],
        'related' => [
            ['path' => '/chemistry/radioactive-decay', 'name' => 'Radioactive decay'],
            ['path' => '/chemistry/carbon-dating', 'name' => 'Carbon dating'],
            ['path' => '/chemistry/rate-constant', 'name' => 'Rate constant'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
