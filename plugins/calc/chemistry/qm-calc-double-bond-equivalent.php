<?php

/**
 * Double Bond Equivalent Calculator
 * /chemistry/double-bond-equivalent
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Double Bond Equivalent Calculator',
    'meta' => ['title' => 'Double Bond Equivalent Calculator: From Formula', 'description' => 'Get the number of rings and pi bonds a molecular formula allows, from its carbon, hydrogen, nitrogen and halogen counts in a single line of arithmetic.', 'h1' => 'Double Bond Equivalent Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'carbon',
                    'label' => 'Carbon atoms',
                    'type' => 'number',
                    'default' => '6',
                    'help' => 'C in the formula',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hydrogen',
                    'label' => 'Hydrogen atoms',
                    'type' => 'number',
                    'default' => '6',
                    'help' => 'H in the formula',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'nitrogen',
                    'label' => 'Nitrogen atoms',
                    'type' => 'number',
                    'default' => '0',
                    'help' => 'N in the formula',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'halogen',
                    'label' => 'Halogen atoms',
                    'type' => 'number',
                    'default' => '0',
                    'help' => 'F, Cl, Br or I, counted together',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'dbe',
                    'label' => 'Double bond equivalents',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'max_hydrogen',
                    'label' => 'Hydrogens if fully saturated',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hydrogen_deficit',
                    'label' => 'Hydrogens missing',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Double Bond Equivalent',
            'results' => [
                'dbe' => '(2*carbon+2+nitrogen-hydrogen-halogen)/2',
                'max_hydrogen' => '2*carbon+2+nitrogen-halogen',
                'hydrogen_deficit' => '2*carbon+2+nitrogen-halogen-hydrogen',
                'carbon' => '(2*dbe-2-nitrogen+hydrogen+halogen)/2',
                'hydrogen' => '2*carbon+2+nitrogen-halogen-2*dbe',
                'nitrogen' => '2*dbe-2*carbon-2+hydrogen+halogen',
                'halogen' => '2*carbon+2+nitrogen-hydrogen-2*dbe',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The double bond equivalent counts rings plus pi bonds: <strong>DBE = (2C + 2 + N − H − X) ÷ 2</strong>. Oxygen and sulfur are ignored because they are divalent, so they do not change the hydrogen count a saturated molecule would have.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A molecular formula from a mass spectrometer is only half the answer: dozens of structures share one. The double bond equivalent is the first constraint, because it says how many rings and multiple bonds the structure must contain before any of them are drawn.</p><p>The page reports <strong>double bond equivalents and hydrogens if fully saturated and hydrogens missing</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Double bond equivalents</strong></td><td><code>(2 × Carbon atoms+2+Nitrogen atoms-Hydrogen atoms-Halogen atoms) ÷ 2</code></td></tr><tr><td><strong>Hydrogens if fully saturated</strong></td><td><code>2 × Carbon atoms+2+Nitrogen atoms-Halogen atoms</code></td></tr><tr><td><strong>Hydrogens missing</strong></td><td><code>2 × Carbon atoms+2+Nitrogen atoms-Halogen atoms-Hydrogen atoms</code></td></tr><tr><td><strong>Carbon atoms</strong></td><td><code>(2 × Double bond equivalents-2-Nitrogen atoms+Hydrogen atoms+Halogen atoms) ÷ 2</code></td></tr><tr><td><strong>Hydrogen atoms</strong></td><td><code>2 × Carbon atoms+2+Nitrogen atoms-Halogen atoms-2 × Double bond equivalents</code></td></tr><tr><td><strong>Nitrogen atoms</strong></td><td><code>2 × Double bond equivalents-2 × Carbon atoms-2+Hydrogen atoms+Halogen atoms</code></td></tr><tr><td><strong>Halogen atoms</strong></td><td><code>2 × Carbon atoms+2+Nitrogen atoms-Hydrogen atoms-2 × Double bond equivalents</code></td></tr></tbody></table><p><p>Each ring or pi bond removes two hydrogens from the saturated count, which is why the deficit is divided by two. Nitrogen adds one hydrogen to the saturated formula and each halogen replaces one, so they enter with opposite signs.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports double bond equivalents and hydrogens if fully saturated and hydrogens missing.</p><ul><li><strong>Carbon atoms</strong>. C in the formula</li><li><strong>Hydrogen atoms</strong>. H in the formula</li><li><strong>Nitrogen atoms</strong>. N in the formula</li><li><strong>Halogen atoms</strong>. F, Cl, Br or I, counted together</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Double bond equivalents</strong></li><li><strong>Hydrogens if fully saturated</strong></li><li><strong>Hydrogens missing</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Carbon atoms = 6, Hydrogen atoms = 6, Nitrogen atoms = 0, Halogen atoms = 0 — and the results panel reads:</p><ul><li><strong>Double bond equivalents</strong> = <code>(2 × Carbon atoms+2+Nitrogen atoms-Hydrogen atoms-Halogen atoms) ÷ 2</code> = <strong>4</strong></li><li><strong>Hydrogens if fully saturated</strong> = <code>2 × Carbon atoms+2+Nitrogen atoms-Halogen atoms</code> = <strong>14</strong></li><li><strong>Hydrogens missing</strong> = <code>2 × Carbon atoms+2+Nitrogen atoms-Halogen atoms-Hydrogen atoms</code> = <strong>8</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(2 × 6+2+0-6-0) ÷ 2 = 4</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Benzene, C₆H₆: the saturated alkane would be C₆H₁₄, so eight hydrogens are missing and the DBE is four — three double bonds and one ring, exactly as drawn.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>A DBE of zero means a saturated, ring-free molecule. Four suggests an aromatic ring, and five or more suggests a second ring or a carbonyl alongside it. A negative value means the formula is impossible: too many hydrogens for that many carbons.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Double bond equivalents</th><th>Hydrogens if fully saturated</th><th>Hydrogens missing</th></tr></thead><tbody><tr><td><strong>Carbon atoms</strong> +10 %</td><td>+15 %</td><td>+8.57 %</td><td>+15 %</td></tr><tr><td><strong>Hydrogen atoms</strong> +10 %</td><td>−7.5 %</td><td>+0 %</td><td>−7.5 %</td></tr><tr><td><strong>Nitrogen atoms</strong> +10 %</td><td>+1.25 %</td><td>+0.71 %</td><td>+1.25 %</td></tr><tr><td><strong>Halogen atoms</strong> +10 %</td><td>−1.25 %</td><td>−0.71 %</td><td>−1.25 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Carbon atoms</strong>: a ten per cent move there shifts the result by about 15 per cent. The least sensitive is <strong>Halogen atoms</strong>, at 1.2 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Carbon atoms = 6, Hydrogen atoms = 12, Nitrogen atoms = 0, Halogen atoms = 0, the page reports <strong>Double bond equivalents</strong> = 1, <strong>Hydrogens if fully saturated</strong> = 14, <strong>Hydrogens missing</strong> = 2. Cyclohexane, C₆H₁₂: one DBE, which must be the ring.</li><li>With Carbon atoms = 4, Hydrogen atoms = 9, Nitrogen atoms = 1, Halogen atoms = 0, the page reports <strong>Double bond equivalents</strong> = 1, <strong>Hydrogens if fully saturated</strong> = 11, <strong>Hydrogens missing</strong> = 2. C₄H₉N: (8 + 2 + 1 − 9) ÷ 2 = 1. Nitrogen's extra hydrogen changes the count without adding unsaturation.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Oxygen counted.</strong> Oxygen is divalent and does not change the DBE; a carbonyl's oxygen contributes nothing, though its double bond does.</li><li><strong>Halogens ignored.</strong> Each halogen takes the place of a hydrogen, so chloroform's formula needs them in the count.</li><li><strong>A fractional answer read as an error.</strong> It means the formula is inconsistent — an odd hydrogen count with no nitrogen, most often.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Double bond equivalents, Hydrogens if fully saturated, Hydrogens missing.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>All inputs are atom counts and all outputs are counts. There are no units anywhere in this calculation, which is what makes it a good first check on a proposed formula.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need carbon atoms and hydrogen atoms and nitrogen atoms and halogen atoms. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Double bond equivalents and hydrogens if fully saturated and hydrogens missing should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Carbon atoms</strong> ×10</td><td>4</td><td>58</td><td>×14.5</td></tr><tr><td><strong>Hydrogen atoms</strong> ×10</td><td>4</td><td>-23</td><td>×-5.75</td></tr><tr><td><strong>Nitrogen atoms</strong> ×10</td><td>4</td><td>4.5</td><td>×1.125</td></tr><tr><td><strong>Halogen atoms</strong> ×10</td><td>4</td><td>3.5</td><td>×0.875</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It cannot say what the unsaturation is.</strong> A DBE of four could be a benzene ring or four separate double bonds.</li><li><strong>It assumes normal valences throughout.</strong> Charged species, radicals and hypervalent atoms need the count adjusted by hand.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Narrowing the structures a molecular formula allows.</li></li><li><li>Spotting an impossible formula before drawing anything.</li></li><li><li>Confirming that a proposed structure matches the mass spectrum's formula.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/degree-of-unsaturation">Degree of unsaturation</a> <a href="/chemistry/molar-mass">Molar mass</a> <a href="/chemistry/empirical-formula">Empirical formula</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Double Bond Equivalent calculator work out?', 'a' => <<<'TXT'
            It returns double bond equivalents and hydrogens if fully saturated and hydrogens missing from carbon atoms and hydrogen atoms and nitrogen atoms and halogen atoms. The relationship is (2 × Carbon atoms+2+Nitrogen atoms-Hydrogen atoms-Halogen atoms) ÷ 2.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Carbon atoms, Hydrogen atoms, Nitrogen atoms, Halogen atoms. Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => 'It matters that every box is in the unit printed beside it: . The page converts nothing on its own, so a mixed set of units is the most common wrong answer.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is oxygen left out?', 'a' => <<<'TXT'
            Because it is divalent: an oxygen in the middle of a chain takes the place of a CH₂ group without changing the hydrogen count. C₆H₁₄ and C₆H₁₄O have the same DBE.
            TXT],
            ['q' => 'How do I know whether the DBE is a ring or a double bond?', 'a' => 'You cannot from the formula alone. The infrared spectrum shows the carbonyl and the ring strain, and hydrogen counts from NMR settle it.'],
        ],
        'related' => [
            ['path' => '/chemistry/degree-of-unsaturation', 'name' => 'Degree of unsaturation'],
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
            ['path' => '/chemistry/empirical-formula', 'name' => 'Empirical formula'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
