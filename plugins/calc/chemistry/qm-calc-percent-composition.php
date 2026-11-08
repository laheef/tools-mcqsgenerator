<?php

/**
 * Percent Composition Calculator
 * /chemistry/percent-composition
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Percent Composition Calculator',
    'meta' => ['title' => 'Percent Composition Calculator: Element by Mass', 'description' => 'Work out what fraction of a compound\'s mass one element carries, given how many atoms of it the formula holds and the molar masses of the element and compound.', 'h1' => 'Percent Composition Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'atoms',
                    'label' => 'Atoms of this element in the formula',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'The subscript, multiplied by any bracket multiplier — two hydrogen atoms in H₂O is 2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'atomic_mass',
                    'label' => 'Atomic mass of the element',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '22.99',
                    'help' => 'From the periodic table; sodium is 22.99',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'compound_molar_mass',
                    'label' => 'Molar mass of the compound',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '58.44',
                    'help' => 'Sum of every atom in the formula; sodium chloride is 58.44',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'element_mass',
                    'label' => 'Mass contributed by the element',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g/mol',
                ],
                [
                    'name' => 'percent',
                    'label' => 'Mass percent of the element',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'remainder',
                    'label' => 'Mass percent of everything else',
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
            'title' => 'Percent Composition',
            'results' => [
                'element_mass' => 'atoms*atomic_mass',
                'percent' => 'atoms*atomic_mass/compound_molar_mass*100',
                'remainder' => '100-atoms*atomic_mass/compound_molar_mass*100',
                'atoms' => 'element_mass/atomic_mass',
                'atomic_mass' => 'element_mass/atoms',
                'compound_molar_mass' => 'atoms*atomic_mass*100/percent',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The mass fraction of an element in a compound is the mass its atoms contribute divided by the mass of one mole of the compound: <strong>% = n × Ar ÷ Mr × 100</strong>. This page reports that percentage, the grams it accounts for in every 100 g, and what is left for everything else.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Percent composition is the bridge between a formula and a laboratory result. It tells you what a fertiliser bag's nitrogen figure should be, what a mineral assay is expected to report, and whether an elemental analysis came back plausible.</p><p>The page reports <strong>mass contributed by the element and mass percent of the element and mass percent of everything else</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Mass contributed by the element</strong></td><td><code>Atoms of this element in the formula × Atomic mass of the element</code></td></tr><tr><td><strong>Mass percent of the element</strong></td><td><code>Atoms of this element in the formula × Atomic mass of the element ÷ Molar mass of the compound × 100</code></td></tr><tr><td><strong>Mass percent of everything else</strong></td><td><code>100-Atoms of this element in the formula × Atomic mass of the element ÷ Molar mass of the compound × 100</code></td></tr><tr><td><strong>Atoms of this element in the formula</strong></td><td><code>Mass contributed by the element ÷ Atomic mass of the element</code></td></tr><tr><td><strong>Atomic mass of the element</strong></td><td><code>Mass contributed by the element ÷ Atoms of this element in the formula</code></td></tr><tr><td><strong>Molar mass of the compound</strong></td><td><code>Atoms of this element in the formula × Atomic mass of the element × 100 ÷ Mass percent of the element</code></td></tr></tbody></table><p><p>The numerator counts one element and the denominator counts the whole molecule, both in grams per mole, so the units cancel and what is left is a fraction. Multiply by a hundred and it is a percentage by mass — not by volume, and not by moles.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports mass contributed by the element and mass percent of the element and mass percent of everything else.</p><ul><li><strong>Atoms of this element in the formula</strong>. The subscript, multiplied by any bracket multiplier — two hydrogen atoms in H₂O is 2</li><li><strong>Atomic mass of the element</strong> — in g/mol. From the periodic table; sodium is 22.99</li><li><strong>Molar mass of the compound</strong> — in g/mol. Sum of every atom in the formula; sodium chloride is 58.44</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Mass contributed by the element</strong> — in g/mol</li><li><strong>Mass percent of the element</strong> — in %</li><li><strong>Mass percent of everything else</strong> — in %</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Atoms of this element in the formula = 1, Atomic mass of the element = 22.99 g/mol, Molar mass of the compound = 58.44 g/mol — and the results panel reads:</p><ul><li><strong>Mass contributed by the element</strong> = <code>Atoms of this element in the formula × Atomic mass of the element</code> = <strong>22.99 g/mol</strong></li><li><strong>Mass percent of the element</strong> = <code>Atoms of this element in the formula × Atomic mass of the element ÷ Molar mass of the compound × 100</code> = <strong>39.339 %</strong></li><li><strong>Mass percent of everything else</strong> = <code>100-Atoms of this element in the formula × Atomic mass of the element ÷ Molar mass of the compound × 100</code> = <strong>60.661 %</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 × 22.99 = 22.99</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Sodium chloride: one sodium atom at 22.99 g/mol in a formula weighing 58.44 g/mol is 39.34 % sodium, leaving 60.66 % chlorine. Those two numbers add to a hundred exactly, which is the check to run on any composition.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Percentages that do not add to a hundred mean either the compound is a hydrate (water of crystallisation is part of the molar mass but often left out of the comparison) or the molar mass used was for the anhydrous form.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Mass contributed by the element</th><th>Mass percent of the element</th><th>Mass percent of everything else</th></tr></thead><tbody><tr><td><strong>Atoms of this element in the formula</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−6.49 %</td></tr><tr><td><strong>Atomic mass of the element</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−6.49 %</td></tr><tr><td><strong>Molar mass of the compound</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+5.9 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Atoms of this element in the formula</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Molar mass of the compound</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Atoms of this element in the formula = 2, Atomic mass of the element = 1.008, Molar mass of the compound = 18.015, the page reports <strong>Mass contributed by the element</strong> = 2.016 g/mol, <strong>Mass percent of the element</strong> = 11.191 %, <strong>Mass percent of everything else</strong> = 88.809 %. Water is 11.19 % hydrogen by mass, not the two-in-three atom count might suggest.</li><li>With Atoms of this element in the formula = 1, Atomic mass of the element = 55.845, Molar mass of the compound = 159.69, the page reports <strong>Mass contributed by the element</strong> = 55.845 g/mol, <strong>Mass percent of the element</strong> = 34.971 %, <strong>Mass percent of everything else</strong> = 65.029 %. Iron in Fe₂O₃ is 69.94 % of the mass, and that is the number an assay reports.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Atom count taken from the wrong place.</strong> In Ca(OH)₂ the bracket doubles the oxygen and hydrogen but not the calcium; count what the formula actually contains.</li><li><strong>Molar mass of the wrong hydrate.</strong> Copper sulfate pentahydrate is 249.7 g/mol, not 159.6 — using the anhydrous figure inflates every percentage.</li><li><strong>Percent by mass read as percent by moles.</strong> Water is 66.7 % hydrogen atoms and 11.2 % hydrogen by mass; only the second is a composition figure.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Mass contributed by the element (g/mol), Mass percent of the element (%), Mass percent of everything else (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Atomic and molar masses share one unit, grams per mole, so the ratio inside the percent is dimensionless. If one figure is entered in kilograms per kilomole the ratio still works, but mixing grams with kilograms does not.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need atoms of this element in the formula and atomic mass of the element and molar mass of the compound. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Mass contributed by the element and mass percent of the element and mass percent of everything else should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Atoms of this element in the formula</strong> ×10</td><td>22.99</td><td>229.9</td><td>ten times larger</td></tr><tr><td><strong>Atomic mass of the element</strong> ×10</td><td>22.99</td><td>229.9</td><td>ten times larger</td></tr><tr><td><strong>Molar mass of the compound</strong> ×10</td><td>22.99</td><td>22.99</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One element per run.</strong> Run it once per element; the remainders should then add back to a hundred.</li><li><strong>It says nothing about structure.</strong> Two isomers share a composition exactly, which is why percent composition gives a formula and never a structure.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking an elemental analysis for arithmetic slips.</li></li><li><li>Reading a fertiliser label's N-P-K figure against the salt it is made from.</li></li><li><li>Converting a mineral assay's oxide percentages into element percentages.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/empirical-formula">Empirical formula</a> <a href="/chemistry/molar-mass">Molar mass</a> <a href="/chemistry/mass-percent">Mass percent</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Percent Composition calculator work out?', 'a' => <<<'TXT'
            It returns mass contributed by the element and mass percent of the element and mass percent of everything else from atoms of this element in the formula and atomic mass of the element and molar mass of the compound. The relationship is Atoms of this element in the formula × Atomic mass of the element.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Atoms of this element in the formula, Atomic mass of the element (g/mol), Molar mass of the compound (g/mol). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: atomic mass of the element in g/mol; molar mass of the compound in g/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I find the percent of an element in a hydrate?', 'a' => <<<'TXT'
            Include the water in the molar mass. CuSO₄·5H₂O weighs 249.7 g/mol; the copper is still 63.55 g/mol of that, so copper is 25.45 %, not the 39.8 % the anhydrous salt gives.
            TXT],
            ['q' => 'Why do my percentages add to 99.9 and not 100?', 'a' => <<<'TXT'
            Rounding of the atomic masses. A tenth of a percent over the whole compound is normal; a shortfall of several percent means an element is missing from the calculation.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/empirical-formula', 'name' => 'Empirical formula'],
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
            ['path' => '/chemistry/mass-percent', 'name' => 'Mass percent'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
