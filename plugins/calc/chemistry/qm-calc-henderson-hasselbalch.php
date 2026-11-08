<?php

/**
 * Henderson–Hasselbalch Calculator
 * /chemistry/henderson-hasselbalch
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Henderson–Hasselbalch Calculator',
    'meta' => ['title' => 'Henderson–Hasselbalch Calculator: pKa from pH', 'description' => 'Use the Henderson–Hasselbalch equation backwards: from a measured buffer pH and the acid and base concentrations, recover the pKa and the Ka of that acid.', 'h1' => 'Henderson–Hasselbalch Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'ph',
                    'label' => 'Measured pH of the buffer',
                    'type' => 'number',
                    'default' => '5.0',
                    'help' => 'From the meter, at the working temperature',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'base_conc',
                    'label' => 'Conjugate base concentration [A⁻]',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.05',
                    'help' => 'Moles of the salt per litre',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'acid_conc',
                    'label' => 'Weak acid concentration [HA]',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.1',
                    'help' => 'Moles of the undissociated acid per litre',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pka',
                    'label' => 'pKa of the acid',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ka',
                    'label' => 'Acid dissociation constant (Ka)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L',
                ],
                [
                    'name' => 'ratio',
                    'label' => 'Base to acid ratio',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Henderson–Hasselbalch',
            'results' => ['pka' => 'ph-log10(base_conc/acid_conc)', 'ka' => 'pow(10,-(ph-log10(base_conc/acid_conc)))', 'ratio' => 'base_conc/acid_conc', 'ph' => 'pka+log10(base_conc/acid_conc)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The Henderson–Hasselbalch equation relates pH, pKa and the ratio of conjugate base to acid: <strong>pKa = pH − log₁₀([A⁻] ÷ [HA])</strong>. Where the buffer pH page answers <em>what pH will this recipe give?</em>, this page answers <em>what is the pKa of the acid in my buffer?</em> from a pH measurement.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Measuring a pH is easy; measuring a pKa needs a titration. If the concentrations are known — a buffer made up from a recipe — then one pH reading is enough to recover the pKa, and the recovered value is a useful check that the acid is what the label said.</p><p>The page reports <strong>pKa of the acid and acid dissociation constant (Ka) and base to acid ratio</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>pKa of the acid</strong></td><td><code>Measured pH of the buffer-log₁₀(Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA])</code></td></tr><tr><td><strong>Acid dissociation constant (Ka)</strong></td><td><code>pow(10,-(Measured pH of the buffer-log₁₀(Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA])))</code></td></tr><tr><td><strong>Base to acid ratio</strong></td><td><code>Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA]</code></td></tr><tr><td><strong>Measured pH of the buffer</strong></td><td><code>pKa of the acid+log₁₀(Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA])</code></td></tr></tbody></table><p><p>The equation is the same one rearranged: the pH sits on the left where the pKa used to be, and the logarithm subtrahend switches side. Nothing else changes, which is why the two pages always agree with each other.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports pKa of the acid and acid dissociation constant (Ka) and base to acid ratio.</p><ul><li><strong>Measured pH of the buffer</strong>. From the meter, at the working temperature</li><li><strong>Conjugate base concentration [A⁻]</strong> — in mol/L. Moles of the salt per litre</li><li><strong>Weak acid concentration [HA]</strong> — in mol/L. Moles of the undissociated acid per litre</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>pKa of the acid</strong></li><li><strong>Acid dissociation constant (Ka)</strong> — in mol/L</li><li><strong>Base to acid ratio</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Measured pH of the buffer = 5, Conjugate base concentration [A⁻] = 0.05 mol/L, Weak acid concentration [HA] = 0.1 mol/L — and the results panel reads:</p><ul><li><strong>pKa of the acid</strong> = <code>Measured pH of the buffer-log₁₀(Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA])</code> = <strong>5.301</strong></li><li><strong>Acid dissociation constant (Ka)</strong> = <code>pow(10,-(Measured pH of the buffer-log₁₀(Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA])))</code> = <strong>5 × 10<sup>-6</sup> mol/L</strong></li><li><strong>Base to acid ratio</strong> = <code>Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA]</code> = <strong>0.5</strong></li></ul><p>With the numbers written into the formula, the first result is <code>5-log10(0.05 ÷ 0.1) = 5.301</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A buffer made from 0.1 mol/L acetic acid and 0.05 mol/L sodium acetate reads pH 5.0. The ratio is 0.5, its logarithm is −0.301, so the pKa is 5.0 + 0.301 = 5.301 — higher than the tabulated 4.76, which tells you the acid in the bottle is not pure acetic acid or the meter needs calibrating.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the recovered pKa with the tabulated value for the acid you think you have. Agreement within 0.05 is confirmation; a consistent offset of 0.2 or more is a calibration error, a concentration error, or a different acid.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>pKa of the acid</th><th>Acid dissociation constant (Ka)</th><th>Base to acid ratio</th></tr></thead><tbody><tr><td><strong>Measured pH of the buffer</strong> +10 %</td><td>+9.43 %</td><td>−68.38 %</td><td>+0 %</td></tr><tr><td><strong>Conjugate base concentration [A⁻]</strong> +10 %</td><td>−0.78 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Weak acid concentration [HA]</strong> +10 %</td><td>+0.78 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Measured pH of the buffer</strong>: a ten per cent move there shifts the result by about 68.4 per cent. The least sensitive is <strong>Weak acid concentration [HA]</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Measured pH of the buffer = 4.76, Conjugate base concentration [A⁻] = 0.1, Weak acid concentration [HA] = 0.1, the page reports <strong>pKa of the acid</strong> = 4.76, <strong>Acid dissociation constant (Ka)</strong> = 1.738 × 10<sup>-5</sup> mol/L, <strong>Base to acid ratio</strong> = 1. Equal concentrations put the pH exactly on the pKa — the definition of the half-dissociation point.</li><li>With Measured pH of the buffer = 7.4, Conjugate base concentration [A⁻] = 0.08, Weak acid concentration [HA] = 0.02, the page reports <strong>pKa of the acid</strong> = 6.798, <strong>Acid dissociation constant (Ka)</strong> = 1.592 × 10<sup>-7</sup> mol/L, <strong>Base to acid ratio</strong> = 4. A phosphate buffer at the top of its range: pKa 6.80.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>A pH meter reading activity, not concentration.</strong> At high ionic strength the recovered pKa drifts; the discrepancy is real, not an arithmetic error.</li><li><strong>Concentrations that are not the equilibrium ones.</strong> If a strong acid or base was added to set the pH, the acid and salt figures from the recipe are no longer valid.</li><li><strong>Temperature ignored.</strong> Both the meter and the acid's pKa move with temperature, and they do not move together.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: pKa of the acid, Acid dissociation constant (Ka) (mol/L), Base to acid ratio.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The ratio is unitless and the result is a logarithm, so only the ratio of the two concentrations enters the calculation. Both boxes must use the same unit.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need measured pH of the buffer and conjugate base concentration [A⁻] and weak acid concentration [HA]. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Pka of the acid and acid dissociation constant (ka) and base to acid ratio should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Measured pH of the buffer</strong> ×10</td><td>5.301</td><td>50.301</td><td>×9.489</td></tr><tr><td><strong>Conjugate base concentration [A⁻]</strong> ×10</td><td>5.301</td><td>4.301</td><td>×0.811</td></tr><tr><td><strong>Weak acid concentration [HA]</strong> ×10</td><td>5.301</td><td>6.301</td><td>×1.189</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It needs a buffer, not a solution.</strong> The equation assumes both partners are present; in a solution of the acid alone there is no ratio to speak of.</li><li><strong>It recovers a macroscopic pKa.</strong> For a polyprotic acid this is a weighted average of the microscopic constants, valid only near the pH measured.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a buffer recipe against a pH reading.</li></li><li><li>Recovering an unknown acid's pKa from a prepared buffer.</li></li><li><li>Confirming that a pH meter is behaving before an experiment.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/buffer-ph">Buffer pH</a> <a href="/chemistry/pka">pKa</a> <a href="/chemistry/titration">Titration</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Henderson–Hasselbalch calculator work out?', 'a' => <<<'TXT'
            It returns pKa of the acid and acid dissociation constant (Ka) and base to acid ratio from measured pH of the buffer and conjugate base concentration [A⁻] and weak acid concentration [HA]. The relationship is Measured pH of the buffer-log₁₀(Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA]).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Measured pH of the buffer, Conjugate base concentration [A⁻] (mol/L), Weak acid concentration [HA] (mol/L). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: conjugate base concentration [A⁻] in mol/L; weak acid concentration [HA] in mol/L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How is this different from the buffer pH calculator?', 'a' => 'It is the same equation solved for a different variable. That page takes the pKa and gives the pH; this one takes the pH and gives the pKa.'],
        ],
        'related' => [
            ['path' => '/chemistry/buffer-ph', 'name' => 'Buffer pH'],
            ['path' => '/chemistry/pka', 'name' => 'pKa'],
            ['path' => '/chemistry/titration', 'name' => 'Titration'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
