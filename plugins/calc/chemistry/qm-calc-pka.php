<?php

/**
 * pKa Calculator
 * /chemistry/pka
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'pKa Calculator',
    'meta' => ['title' => 'pKa Calculator: From Ka, With Kb of the Base', 'description' => 'Convert an acid dissociation constant into pKa and into the Kb of its conjugate base, the two numbers that decide where an acid can be used as a buffer.', 'h1' => 'pKa Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'ka',
                    'label' => 'Acid dissociation constant (Ka)',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.000018',
                    'help' => 'Acetic acid is 1.8 × 10⁻⁵; formic acid 1.8 × 10⁻⁴',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pka',
                    'label' => 'pKa',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'kb',
                    'label' => 'Kb of the conjugate base',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pkb',
                    'label' => 'pKb of the conjugate base',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'pKa',
            'results' => ['pka' => '-log10(ka)', 'kb' => '0.00000000000001/ka', 'pkb' => '14+log10(ka)', 'ka' => 'pow(10,-pka)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>pKa is the negative base-10 logarithm of the acid dissociation constant, <strong>pKa = −log₁₀Ka</strong>, and it is the pH at which an acid is half dissociated. This page converts Ka into pKa and reports Kb for the conjugate base, using Ka × Kb = Kw = 1 × 10⁻¹⁴.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The pKa is the one number that tells you where an acid is useful. It sets the pH at which the acid and its conjugate base are present in equal amounts, which is exactly the centre of the buffer range — and it predicts charge state, solubility and reactivity for every molecule with an ionisable group.</p><p>The page reports <strong>pKa and kb of the conjugate base and pKb of the conjugate base</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>pKa</strong></td><td><code>-log₁₀(Acid dissociation constant (Ka))</code></td></tr><tr><td><strong>Kb of the conjugate base</strong></td><td><code>1 × 10<sup>-14< ÷ sup> ÷ Acid dissociation constant (Ka)</code></td></tr><tr><td><strong>pKb of the conjugate base</strong></td><td><code>14+log₁₀(Acid dissociation constant (Ka))</code></td></tr><tr><td><strong>Acid dissociation constant (Ka)</strong></td><td><code>(10)^-pKa</code></td></tr></tbody></table><p><p>Ka and Kb are reciprocal through the water ion product, so pKa + pKb = 14 at 25 °C. A weak acid with pKa 4.76 has a conjugate base with pKb 9.24 — which is why acetate is such a poor base.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs. It reports pKa and kb of the conjugate base and pKb of the conjugate base.</p><ul><li><strong>Acid dissociation constant (Ka)</strong> — in mol/L. Acetic acid is 1.8 × 10⁻⁵; formic acid 1.8 × 10⁻⁴</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>pKa</strong></li><li><strong>Kb of the conjugate base</strong></li><li><strong>pKb of the conjugate base</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Acid dissociation constant (Ka) = 1.8 × 10<sup>-5</sup> mol/L — and the results panel reads:</p><ul><li><strong>pKa</strong> = <code>-log₁₀(Acid dissociation constant (Ka))</code> = <strong>4.745</strong></li><li><strong>Kb of the conjugate base</strong> = <code>1 × 10<sup>-14< ÷ sup> ÷ Acid dissociation constant (Ka)</code> = <strong>5.556 × 10<sup>-10</sup></strong></li><li><strong>pKb of the conjugate base</strong> = <code>14+log₁₀(Acid dissociation constant (Ka))</code> = <strong>9.255</strong></li></ul><p>With the numbers written into the formula, the first result is <code>-log10(1.8 × 10<sup>-5< ÷ sup>) = 4.745</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Acetic acid has Ka = 1.8 × 10⁻⁵, so pKa = 4.745 and its conjugate base, the acetate ion, has Kb = 5.56 × 10⁻¹⁰ and pKb 9.255. The two pK values add to 14, as they must.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the pKa against the pH you intend to work at. A buffer is effective within about one pH unit of its pKa; more than two units away, the acid or the base dominates and the buffering collapses. Below pKa 0 the acid is strong enough to be fully dissociated in water; above about 14 it is not an acid in water at all.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>pKa</th><th>Kb of the conjugate base</th><th>pKb of the conjugate base</th></tr></thead><tbody><tr><td><strong>Acid dissociation constant (Ka)</strong> +10 %</td><td>−0.87 %</td><td>−9.09 %</td><td>+0.45 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Acid dissociation constant (Ka)</strong>: a ten per cent move there shifts the result by about 9.1 per cent. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Acid dissociation constant (Ka) = 1.8 × 10<sup>-5</sup>, the page reports <strong>pKa</strong> = 4.745, <strong>Kb of the conjugate base</strong> = 5.556 × 10<sup>-10</sup>, <strong>pKb of the conjugate base</strong> = 9.255. Acetic acid: pKa 4.745, the standard acetate buffer.</li><li>With Acid dissociation constant (Ka) = 1, the page reports <strong>pKa</strong> = 0, <strong>Kb of the conjugate base</strong> = 1 × 10<sup>-14</sup>, <strong>pKb of the conjugate base</strong> = 14. Ka = 1 is pKa 0 — the boundary of strong-acid behaviour.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Ka and pKa swapped.</strong> A larger Ka means a stronger acid and a smaller pKa; quoting a big pKa for a strong acid is the classic sign that the two were confused.</li><li><strong>pKa quoted without the temperature.</strong> Ionisation is strongly temperature dependent; the literature value for Tris moves by about 0.03 per degree.</li><li><strong>pKa used for a polyprotic acid.</strong> Phosphoric acid has three, at 2.15, 7.20 and 12.35; a single number describes only one of them.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: pKa, Kb of the conjugate base, pKb of the conjugate base.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Ka is a concentration (mol/L for a weak acid), but pKa is a logarithm and therefore unitless. That is one reason the pKa is quoted in tables.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need acid dissociation constant (Ka). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Pka and kb of the conjugate base and pkb of the conjugate base should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Acid dissociation constant (Ka)</strong> ×10</td><td>4.745</td><td>3.745</td><td>×0.789</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes the 25 °C ion product.</strong> At other temperatures pKa and pKb no longer sum to exactly 14.</li><li><strong>It describes one ionisation.</strong> A molecule with several acidic groups has a microscopic pKa for each; the macroscopic value is a weighted average.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Choosing a buffer system for a target pH.</li></li><li><li>Predicting the charge of a molecule at a given pH.</li></li><li><li>Comparing acid strengths without writing scientific notation.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/ph">pH</a> <a href="/chemistry/henderson-hasselbalch">Henderson–Hasselbalch</a> <a href="/chemistry/isoelectric-point">Isoelectric point</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the pKa calculator work out?', 'a' => <<<'TXT'
            It returns pKa and kb of the conjugate base and pKb of the conjugate base from acid dissociation constant (Ka). The relationship is -log₁₀(Acid dissociation constant (Ka)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Acid dissociation constant (Ka) (mol/L). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: acid dissociation constant (Ka) in mol/L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What does a pKa of 4.76 mean in practice?', 'a' => 'At pH 4.76, half of the acid is dissociated and half is not. One unit below, roughly 90 % is undissociated; one unit above, roughly 90 % is dissociated.'],
            ['q' => 'Why is pKa more useful than Ka?', 'a' => 'Because it sits on the same scale as pH. Choosing a buffer means matching a pKa to a target pH, and that comparison is impossible on a scale of 10⁻⁵.'],
        ],
        'related' => [
            ['path' => '/chemistry/ph', 'name' => 'pH'],
            ['path' => '/chemistry/henderson-hasselbalch', 'name' => 'Henderson–Hasselbalch'],
            ['path' => '/chemistry/isoelectric-point', 'name' => 'Isoelectric point'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
