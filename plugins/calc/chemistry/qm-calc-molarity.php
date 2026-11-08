<?php

/**
 * Molarity Calculator
 * /chemistry/molarity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Molarity Calculator',
    'meta' => ['title' => 'Molarity Calculator: Moles per Litre of Solution', 'description' => 'Work out molarity from moles of solute and litres of solution, or solve backwards for the moles or the volume that a target strength of solution needs.', 'h1' => 'Molarity Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'moles',
                    'label' => 'Moles of solute (n)',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '0.5',
                    'help' => 'Amount dissolved',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume',
                    'label' => 'Volume of solution (V)',
                    'type' => 'number',
                    'suffix' => 'L',
                    'default' => '0.25',
                    'help' => 'Final volume, measured after the solute has dissolved',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molarity',
                    'label' => 'Molarity (M)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L',
                ],
                [
                    'name' => 'millimolarity',
                    'label' => 'Molarity',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mmol/L',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Molarity',
            'results' => ['molarity' => 'moles/volume', 'millimolarity' => 'moles/volume*1000', 'moles' => 'molarity*volume', 'volume' => 'moles/molarity'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Molarity is the number of moles of solute in one litre of solution, <strong>M = n ÷ V</strong>, and it is the concentration unit that balanced equations speak. This page solves the relationship in all three directions, so it answers both <em>how strong is this?</em> and <em>what do I need to make it?</em></p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Molarity is the unit chemistry happens in: one mole of A reacts with two moles of B, so the reacting ratio is a ratio of molarities times volumes. Every titration reduces to that idea, and every stock solution is described by it.</p><p>The page reports <strong>molarity (mol/L) and molarity (mmol/L)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Molarity (mol per L)</strong></td><td><code>Moles of solute (n) ÷ Volume of solution (V)</code></td></tr><tr><td><strong>Molarity (mmol per L)</strong></td><td><code>Moles of solute (n) ÷ Volume of solution (V) × 1000</code></td></tr><tr><td><strong>Moles of solute (n)</strong></td><td><code>Molarity (mol per L) × Volume of solution (V)</code></td></tr><tr><td><strong>Volume of solution (V)</strong></td><td><code>Moles of solute (n) ÷ Molarity (mol per L)</code></td></tr></tbody></table><p><p>M is mol per litre, so the volume must be in litres. A 500 mL volumetric flask is 0.5 L, and a 50 mL aliquot is 0.05 L — the conversion is where most errors on this page enter.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports molarity (mol/L) and molarity (mmol/L).</p><ul><li><strong>Moles of solute (n)</strong> — in mol. Amount dissolved</li><li><strong>Volume of solution (V)</strong> — in L. Final volume, measured after the solute has dissolved</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Molarity (M)</strong> — in mol/L</li><li><strong>Molarity</strong> — in mmol/L</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Moles of solute (n) = 0.5 mol, Volume of solution (V) = 0.25 L — and the results panel reads:</p><ul><li><strong>Molarity (M)</strong> = <code>Moles of solute (n) ÷ Volume of solution (V)</code> = <strong>2 mol/L</strong></li><li><strong>Molarity</strong> = <code>Moles of solute (n) ÷ Volume of solution (V) × 1000</code> = <strong>2 000 mmol/L</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.5 ÷ 0.25 = 2</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Half a mole made up to 250 mL gives 2 mol/L. Reverse the question and the same numbers say that 2 M in 250 mL needs 0.5 mol; the page answers whichever box you leave empty.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read molarity against the reaction you have in mind. Millimolar solutions are typical for enzyme work, 0.1–1 M for general synthesis, and 10 M and above only for concentrated acids and ammonia, where the solute is most of the solution.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Molarity (M)</th><th>Molarity</th></tr></thead><tbody><tr><td><strong>Moles of solute (n)</strong> +10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Volume of solution (V)</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Moles of solute (n)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Volume of solution (V)</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Moles of solute (n) = 1, Volume of solution (V) = 1, the page reports <strong>Molarity (M)</strong> = 1 mol/L, <strong>Molarity</strong> = 1 000 mmol/L. One mole in one litre is 1 M, the definition.</li><li>With Moles of solute (n) = 0.01, Volume of solution (V) = 0.1, the page reports <strong>Molarity (M)</strong> = 0.1 mol/L, <strong>Molarity</strong> = 100 mmol/L. 10 mmol in 100 mL is still 0.1 M — molarity is a ratio, not a quantity.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Volume in millilitres.</strong> 250, not 0.25, gives an answer a thousand times out.</li><li><strong>Volume before dissolving.</strong> Solid solutes add volume; make up to the mark after dissolution, not before.</li><li><strong>Moles left in millimoles.</strong> The molarity result inherits the factor of a thousand exactly.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Molarity (M) (mol/L), Molarity (mmol/L).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>1 M = 1 mol/L = 1 mmol/mL. The millimolar result is the same number times a thousand, which is why a 2 M stock is a 2 000 mM stock and a 1:1000 dilution of it is 2 mM.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need moles of solute (n) and volume of solution (V). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Molarity (mol/l) and molarity (mmol/l) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Moles of solute (n)</strong> ×10</td><td>2</td><td>20</td><td>ten times larger</td></tr><tr><td><strong>Volume of solution (V)</strong> ×10</td><td>2</td><td>0.2</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Molarity depends on temperature.</strong> The volume expands with heat, so a solution made at 20 °C is slightly less molar at 37 °C. Molality does not move.</li><li><strong>It counts formula units, not ions.</strong> A 1 M solution of NaCl is 2 mol/L in ions, which matters for every colligative and conductivity property.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Preparing a stock solution to a stated strength.</li></li><li><li>Converting a titration's titre into the concentration of the unknown.</li></li><li><li>Working out what dilution a working solution needs from a stock.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/concentration">Concentration</a> <a href="/chemistry/molality">Molality</a> <a href="/chemistry/solution-dilution">Solution dilution</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Molarity calculator work out?', 'a' => <<<'TXT'
            It returns molarity (mol/L) and molarity (mmol/L) from moles of solute (n) and volume of solution (V). The relationship is Moles of solute (n) ÷ Volume of solution (V).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Moles of solute (n) (mol), Volume of solution (V) (L). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: moles of solute (n) in mol; volume of solution (V) in L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Is molarity the same as molality?', 'a' => <<<'TXT'
            No. Molarity is moles per litre of solution; molality is moles per kilogram of solvent. They agree closely in dilute aqueous solutions and diverge as the solute takes up volume.
            TXT],
            ['q' => 'What does a 1 M solution mean in practice?', 'a' => 'One mole of the substance dissolved and made up to one litre in total. For sodium chloride that is 58.44 g in a 1 L flask filled to the mark.'],
        ],
        'related' => [
            ['path' => '/chemistry/concentration', 'name' => 'Concentration'],
            ['path' => '/chemistry/molality', 'name' => 'Molality'],
            ['path' => '/chemistry/solution-dilution', 'name' => 'Solution dilution'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
