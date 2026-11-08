<?php

/**
 * Isoelectric Point Calculator
 * /chemistry/isoelectric-point
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Isoelectric Point Calculator',
    'meta' => ['title' => 'Isoelectric Point Calculator: pI From Two pKas', 'description' => 'Find the pH at which an amino acid or a small peptide carries no net charge, and see the charge that it carries at any other pH you care to ask about.', 'h1' => 'Isoelectric Point Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'pka1',
                    'label' => 'First pKa (the acid group)',
                    'type' => 'number',
                    'default' => '2.34',
                    'help' => 'Glycine\'s carboxyl group is 2.34',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pka2',
                    'label' => 'Second pKa (the base group)',
                    'type' => 'number',
                    'default' => '9.6',
                    'help' => 'Glycine\'s amino group is 9.60',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ph',
                    'label' => 'pH of interest',
                    'type' => 'number',
                    'default' => '7.0',
                    'help' => 'The pH you want the net charge at',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pi',
                    'label' => 'Isoelectric point',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'net_charge',
                    'label' => 'Net charge at that pH',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fraction_positive',
                    'label' => 'Fraction with the acid group protonated',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Isoelectric Point',
            'results' => ['pi' => '(pka1+pka2)/2', 'net_charge' => '1/(1+pow(10,ph-pka1))-1/(1+pow(10,pka2-ph))', 'fraction_positive' => '1/(1+pow(10,ph-pka1))', 'pka2' => '2*pi-pka1'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The isoelectric point is the average of the two pKas that bracket the neutral form: <strong>pI = (pK₁ + pK₂) ÷ 2</strong>. At that pH the molecule is a zwitterion, its net charge is zero, and its solubility is at a minimum.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The isoelectric point is where a molecule stops migrating in an electric field, where it precipitates most readily and where a buffer has the least charge to counter. Electrophoresis, isoelectric focusing and protein purification all hang on it.</p><p>The page reports <strong>isoelectric point and net charge at that pH and fraction with the acid group protonated</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Isoelectric point</strong></td><td><code>(First pKa (the acid group)+Second pKa (the base group)) ÷ 2</code></td></tr><tr><td><strong>Net charge at that pH</strong></td><td><code>1 ÷ (1+(10)^pH of interest-First pKa (the acid group))-1 ÷ (1+(10)^Second pKa (the base group)-pH of interest)</code></td></tr><tr><td><strong>Fraction with the acid group protonated</strong></td><td><code>1 ÷ (1+(10)^pH of interest-First pKa (the acid group))</code></td></tr><tr><td><strong>Second pKa (the base group)</strong></td><td><code>2 × Isoelectric point-First pKa (the acid group)</code></td></tr></tbody></table><p><p>The two pKas are the ones either side of the neutral species. For a simple amino acid that is the carboxyl and the amino group; for a peptide with a side chain that ionises, the average is taken over the pair that brackets zero charge, which may be different constants.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports isoelectric point and net charge at that pH and fraction with the acid group protonated.</p><ul><li><strong>First pKa (the acid group)</strong>. Glycine&#x27;s carboxyl group is 2.34</li><li><strong>Second pKa (the base group)</strong>. Glycine&#x27;s amino group is 9.60</li><li><strong>pH of interest</strong>. The pH you want the net charge at</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Isoelectric point</strong></li><li><strong>Net charge at that pH</strong></li><li><strong>Fraction with the acid group protonated</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — First pKa (the acid group) = 2.34, Second pKa (the base group) = 9.6, pH of interest = 7 — and the results panel reads:</p><ul><li><strong>Isoelectric point</strong> = <code>(First pKa (the acid group)+Second pKa (the base group)) ÷ 2</code> = <strong>5.97</strong></li><li><strong>Net charge at that pH</strong> = <code>1 ÷ (1+(10)^pH of interest-First pKa (the acid group))-1 ÷ (1+(10)^Second pKa (the base group)-pH of interest)</code> = <strong>-0.002</strong></li><li><strong>Fraction with the acid group protonated</strong> = <code>1 ÷ (1+(10)^pH of interest-First pKa (the acid group))</code> = <strong>2.188 × 10<sup>-5</sup></strong></li></ul><p>With the numbers written into the formula, the first result is <code>(2.34+9.6) ÷ 2 = 5.97</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Glycine, with pKas of 2.34 and 9.60, has pI = 5.97. At pH 7 its net charge is about −0.0025 — nearly zero on the scale of a whole proton, which is why a solution at pH 7 is mostly zwitterion with a trace of anion.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Below the pI a molecule carries net positive charge; above it, net negative. The further the pH from the pI, the more charge it carries and the more soluble it usually is.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Isoelectric point</th><th>Net charge at that pH</th><th>Fraction with the acid group protonated</th></tr></thead><tbody><tr><td><strong>First pKa (the acid group)</strong> +10 %</td><td>+1.96 %</td><td>+0.63 %</td><td>+71.39 %</td></tr><tr><td><strong>Second pKa (the base group)</strong> +10 %</td><td>+8.04 %</td><td>+89.79 %</td><td>+0 %</td></tr><tr><td><strong>pH of interest</strong> +10 %</td><td>+0 %</td><td>−400.39 %</td><td>−80.05 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>pH of interest</strong>: a ten per cent move there shifts the result by about 400.4 per cent. The least sensitive is <strong>First pKa (the acid group)</strong>, at 71.4 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With First pKa (the acid group) = 2.19, Second pKa (the base group) = 9.67, pH of interest = 6, the page reports <strong>Isoelectric point</strong> = 5.93, <strong>Net charge at that pH</strong> = -5.889 × 10<sup>-5</sup>, <strong>Fraction with the acid group protonated</strong> = 0.0001549. Alanine: pI 5.93, and at pH 6 the charge is already slightly negative.</li><li>With First pKa (the acid group) = 3.65, Second pKa (the base group) = 10.07, pH of interest = 3.65, the page reports <strong>Isoelectric point</strong> = 6.86, <strong>Net charge at that pH</strong> = 0.5, <strong>Fraction with the acid group protonated</strong> = 0.5. At pH equal to the first pKa, half the carboxyl groups are protonated and the net charge is close to +0.5.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The wrong pair of pKas.</strong> For an acidic amino acid such as glutamate the pI averages the two carboxyl pKas, not the carboxyl and the amino group.</li><li><strong>pI read as neutral pH.</strong> A protein's pI can be 5 or 9; it says nothing about neutrality in the pH-7 sense.</li><li><strong>Charge treated as a whole number.</strong> The net charge varies continuously with pH and is rarely exactly zero except at the pI.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Isoelectric point, Net charge at that pH, Fraction with the acid group protonated.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>pKa, pH and pI are all dimensionless logarithms of concentrations — no units belong anywhere on this page, and adding one is the commonest way to confuse a buffer table.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need first pKa (the acid group) and second pKa (the base group) and pH of interest. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Isoelectric point and net charge at that ph and fraction with the acid group protonated should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>First pKa (the acid group)</strong> ×10</td><td>5.97</td><td>16.5</td><td>×2.764</td></tr><tr><td><strong>Second pKa (the base group)</strong> ×10</td><td>5.97</td><td>49.17</td><td>×8.236</td></tr><tr><td><strong>pH of interest</strong> ×10</td><td>5.97</td><td>5.97</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Two pKas only.</strong> A protein with dozens of ionisable groups has an effective pI, not one derivable from two constants.</li><li><strong>It ignores the environment.</strong> Salt, temperature and neighbouring residues shift a pKa by up to a unit.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Choosing a buffer pH for ion-exchange chromatography.</li></li><li><li>Predicting which way a peptide migrates in a gel.</li></li><li><li>Finding the pH of minimum solubility for a precipitation step.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/protein-solubility">Protein solubility</a> <a href="/chemistry/pka">pKa</a> <a href="/chemistry/buffer-ph">Buffer pH</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Isoelectric Point calculator work out?', 'a' => <<<'TXT'
            It returns isoelectric point and net charge at that pH and fraction with the acid group protonated from first pKa (the acid group) and second pKa (the base group) and pH of interest. The relationship is (First pKa (the acid group)+Second pKa (the base group)) ÷ 2.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'First pKa (the acid group), Second pKa (the base group), pH of interest. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => 'It matters that every box is in the unit printed beside it: . The page converts nothing on its own, so a mixed set of units is the most common wrong answer.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is a molecule least soluble at its pI?', 'a' => 'Because its net charge is zero, so molecules attract each other rather than repelling, and they aggregate and precipitate.'],
            ['q' => 'How do I find the pI of a protein?', 'a' => 'Compute it from its sequence, or measure it by isoelectric focusing. Averaging two pKas is the small-molecule version.'],
        ],
        'related' => [
            ['path' => '/chemistry/protein-solubility', 'name' => 'Protein solubility'],
            ['path' => '/chemistry/pka', 'name' => 'pKa'],
            ['path' => '/chemistry/buffer-ph', 'name' => 'Buffer pH'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
