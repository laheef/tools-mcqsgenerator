<?php

/**
 * Bond Order Calculator
 * /chemistry/bond-order
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bond Order Calculator',
    'meta' => ['title' => 'Bond Order Calculator: Bonding and Antibonding', 'description' => 'Work out a bond order from a molecule\'s molecular orbital electron counts, and see the total valence electrons and the net bonding surplus behind the answer.', 'h1' => 'Bond Order Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'bonding_e',
                    'label' => 'Electrons in bonding orbitals',
                    'type' => 'number',
                    'default' => '8',
                    'help' => 'Total across all the bonding molecular orbitals that are filled',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'antibonding_e',
                    'label' => 'Electrons in antibonding orbitals',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Total across all the antibonding orbitals that are filled',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bond_order',
                    'label' => 'Bond order',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'total_electrons',
                    'label' => 'Total valence electrons counted',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'net_bonding',
                    'label' => 'Net bonding electrons',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Bond Order',
            'results' => [
                'bond_order' => '(bonding_e-antibonding_e)/2',
                'total_electrons' => 'bonding_e+antibonding_e',
                'net_bonding' => 'bonding_e-antibonding_e',
                'bonding_e' => 'net_bonding+antibonding_e',
                'antibonding_e' => 'bonding_e-net_bonding',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Bond order is the net number of bonding pairs: <strong>bond order = (bonding − antibonding) ÷ 2</strong>. An antibonding electron cancels one bonding electron, so filling an antibonding orbital weakens the bond instead of strengthening it.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Bond order predicts bond length, bond strength and whether the molecule is stable at all. Oxygen's bond order of two and nitrogen's of three are exactly why nitrogen is inert and oxygen is not, and the same arithmetic explains why O₂ is magnetic.</p><p>The page reports <strong>bond order and total valence electrons counted and net bonding electrons</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Bond order</strong></td><td><code>(Electrons in bonding orbitals-Electrons in antibonding orbitals) ÷ 2</code></td></tr><tr><td><strong>Total valence electrons counted</strong></td><td><code>Electrons in bonding orbitals+Electrons in antibonding orbitals</code></td></tr><tr><td><strong>Net bonding electrons</strong></td><td><code>Electrons in bonding orbitals-Electrons in antibonding orbitals</code></td></tr><tr><td><strong>Electrons in bonding orbitals</strong></td><td><code>Net bonding electrons+Electrons in antibonding orbitals</code></td></tr><tr><td><strong>Electrons in antibonding orbitals</strong></td><td><code>Electrons in bonding orbitals-Net bonding electrons</code></td></tr></tbody></table><p><p>Only electrons in the valence molecular orbitals count. For a second-row diatomic, the eight bonding electrons fill σ and π levels and the antibonding ones sit above them; the difference divided by two is the bond order, which can be a half when a single antibonding electron is present.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports bond order and total valence electrons counted and net bonding electrons.</p><ul><li><strong>Electrons in bonding orbitals</strong>. Total across all the bonding molecular orbitals that are filled</li><li><strong>Electrons in antibonding orbitals</strong>. Total across all the antibonding orbitals that are filled</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Bond order</strong></li><li><strong>Total valence electrons counted</strong></li><li><strong>Net bonding electrons</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Electrons in bonding orbitals = 8, Electrons in antibonding orbitals = 2 — and the results panel reads:</p><ul><li><strong>Bond order</strong> = <code>(Electrons in bonding orbitals-Electrons in antibonding orbitals) ÷ 2</code> = <strong>3</strong></li><li><strong>Total valence electrons counted</strong> = <code>Electrons in bonding orbitals+Electrons in antibonding orbitals</code> = <strong>10</strong></li><li><strong>Net bonding electrons</strong> = <code>Electrons in bonding orbitals-Electrons in antibonding orbitals</code> = <strong>6</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(8-2) ÷ 2 = 3</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Eight bonding and two antibonding is a bond order of three, which is nitrogen: a triple bond, 110 pm long and 945 kJ/mol strong. Remove one bonding electron and the order falls to 2.5, which is why N₂⁺ has a longer bond than N₂.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>An order of zero means the molecule does not survive: Be₂ with four bonding and four antibonding electrons is held together by nothing but dispersion forces. Half and quarter orders are real, and they show up as fractional bond lengths.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Bond order</th><th>Total valence electrons counted</th><th>Net bonding electrons</th></tr></thead><tbody><tr><td><strong>Electrons in bonding orbitals</strong> +10 %</td><td>+13.33 %</td><td>+8 %</td><td>+13.33 %</td></tr><tr><td><strong>Electrons in antibonding orbitals</strong> +10 %</td><td>−3.33 %</td><td>+2 %</td><td>−3.33 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Electrons in bonding orbitals</strong>: a ten per cent move there shifts the result by about 13.3 per cent. The least sensitive is <strong>Electrons in antibonding orbitals</strong>, at 3.3 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Electrons in bonding orbitals = 8, Electrons in antibonding orbitals = 4, the page reports <strong>Bond order</strong> = 2, <strong>Total valence electrons counted</strong> = 12, <strong>Net bonding electrons</strong> = 4. Eight and four is a bond order of two — oxygen, with two unpaired electrons in the antibonding π* orbitals.</li><li>With Electrons in bonding orbitals = 10, Electrons in antibonding orbitals = 4, the page reports <strong>Bond order</strong> = 3, <strong>Total valence electrons counted</strong> = 14, <strong>Net bonding electrons</strong> = 6. Ten bonding is a triple bond: six net bonding electrons over two gives three, which is carbon monoxide.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Antibonding electrons added instead of subtracted.</strong> They weaken the bond; adding them makes every molecule look stronger than it is.</li><li><strong>Core electrons counted.</strong> Only the valence molecular orbitals matter — the 1s electrons stay in their atomic orbitals.</li><li><strong>Bond order read as the number of bonds drawn.</strong> A Lewis structure with a double bond is a picture; the molecular orbital calculation can say 2.5.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Bond order, Total valence electrons counted, Net bonding electrons.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>All three results are plain counts or ratios and carry no unit. The bond order is dimensionless and can be fractional, which is not an error.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need electrons in bonding orbitals and electrons in antibonding orbitals. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Bond order and total valence electrons counted and net bonding electrons should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Electrons in bonding orbitals</strong> ×10</td><td>3</td><td>39</td><td>×13</td></tr><tr><td><strong>Electrons in antibonding orbitals</strong> ×10</td><td>3</td><td>-6</td><td>×-2</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes a simple molecular orbital diagram.</strong> Transition metals, with their d orbitals, need a different filling order and often a different answer.</li><li><strong>It is not a bond strength.</strong> Bond order correlates with strength within a series, but energy is a separate calculation.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Predicting whether a diatomic molecule is stable.</li></li><li><li>Explaining bond lengths across a series such as O₂⁺, O₂ and O₂⁻.</li></li><li><li>Checking an MO diagram's electron count.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/atom">Atom</a> <a href="/chemistry/atomic-mass">Atomic mass</a> <a href="/chemistry/percent-ionic-character">Percent ionic character</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bond Order calculator work out?', 'a' => <<<'TXT'
            It returns bond order and total valence electrons counted and net bonding electrons from electrons in bonding orbitals and electrons in antibonding orbitals. The relationship is (Electrons in bonding orbitals-Electrons in antibonding orbitals) ÷ 2.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Electrons in bonding orbitals, Electrons in antibonding orbitals. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => 'It matters that every box is in the unit printed beside it: . The page converts nothing on its own, so a mixed set of units is the most common wrong answer.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Can a bond order be a fraction?', 'a' => <<<'TXT'
            Yes. H₂⁺, with one bonding electron and none antibonding, has a bond order of 0.5 and a real, weak bond. Fractional orders are normal in molecular orbital theory.
            TXT],
            ['q' => 'Why does O₂ have a bond order of 2 and two unpaired electrons?', 'a' => 'Its last two electrons occupy separate π* orbitals, so it loses one bonding pair and is a diradical — which is why liquid oxygen sticks to a magnet.'],
        ],
        'related' => [
            ['path' => '/chemistry/atom', 'name' => 'Atom'],
            ['path' => '/chemistry/atomic-mass', 'name' => 'Atomic mass'],
            ['path' => '/chemistry/percent-ionic-character', 'name' => 'Percent ionic character'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
