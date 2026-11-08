<?php

/**
 * Average Atomic Mass Calculator
 * /chemistry/average-atomic-mass
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Average Atomic Mass Calculator',
    'meta' => ['title' => 'Average Atomic Mass Calculator: Two Isotopes', 'description' => 'Combine two isotopes, each with its percentage abundance and its exact atomic mass, into the average atomic mass the periodic table prints for that element.', 'h1' => 'Average Atomic Mass Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'abundance_1',
                    'label' => 'Abundance of isotope 1',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '75.77',
                    'help' => 'Chlorine-35 is 75.77 %',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mass_1',
                    'label' => 'Mass of isotope 1',
                    'type' => 'number',
                    'suffix' => 'u',
                    'default' => '34.9689',
                    'help' => 'Exact mass from the mass spectrum',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'abundance_2',
                    'label' => 'Abundance of isotope 2',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '24.23',
                    'help' => 'Chlorine-37 is 24.23 %',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mass_2',
                    'label' => 'Mass of isotope 2',
                    'type' => 'number',
                    'suffix' => 'u',
                    'default' => '36.9659',
                    'help' => 'Exact mass, not the mass number',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'average_mass',
                    'label' => 'Average atomic mass',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'u',
                ],
                [
                    'name' => 'total_abundance',
                    'label' => 'Total abundance',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'heavier_fraction',
                    'label' => 'Mass contributed by isotope 2',
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
            'title' => 'Average Atomic Mass',
            'results' => [
                'average_mass' => '(abundance_1*mass_1+abundance_2*mass_2)/(abundance_1+abundance_2)',
                'total_abundance' => 'abundance_1+abundance_2',
                'heavier_fraction' => 'abundance_2*mass_2/(abundance_1*mass_1+abundance_2*mass_2)*100',
                'abundance_1' => 'abundance_2*(average_mass-mass_2)/(mass_1-average_mass)',
                'abundance_2' => 'abundance_1*(mass_1-average_mass)/(average_mass-mass_2)',
                'mass_1' => '((abundance_1+abundance_2)*average_mass-abundance_2*mass_2)/abundance_1',
                'mass_2' => '((abundance_1+abundance_2)*average_mass-abundance_1*mass_1)/abundance_2',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The atomic mass on the periodic table is a weighted average: <strong>Ar = (a₁m₁ + a₂m₂) ÷ (a₁ + a₂)</strong>. Enter each isotope's percentage abundance and its exact mass in atomic mass units, and the page returns the figure a periodic table would list.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>No atom of chlorine weighs 35.45 u; that figure is the average over a bottle of chlorine atoms. Every molar mass in the rest of chemistry depends on this weighting, which is why the isotopes' exact masses rather than their mass numbers appear in it.</p><p>The page reports <strong>average atomic mass and total abundance and mass contributed by isotope 2</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Average atomic mass</strong></td><td><code>(Abundance of isotope 1 × Mass of isotope 1+Abundance of isotope 2 × Mass of isotope 2) ÷ (Abundance of isotope 1+Abundance of isotope 2)</code></td></tr><tr><td><strong>Total abundance</strong></td><td><code>Abundance of isotope 1+Abundance of isotope 2</code></td></tr><tr><td><strong>Mass contributed by isotope 2</strong></td><td><code>Abundance of isotope 2 × Mass of isotope 2 ÷ (Abundance of isotope 1 × Mass of isotope 1+Abundance of isotope 2 × Mass of isotope 2) × 100</code></td></tr><tr><td><strong>Abundance of isotope 1</strong></td><td><code>Abundance of isotope 2 × (Average atomic mass-Mass of isotope 2) ÷ (Mass of isotope 1-Average atomic mass)</code></td></tr><tr><td><strong>Abundance of isotope 2</strong></td><td><code>Abundance of isotope 1 × (Mass of isotope 1-Average atomic mass) ÷ (Average atomic mass-Mass of isotope 2)</code></td></tr><tr><td><strong>Mass of isotope 1</strong></td><td><code>((Abundance of isotope 1+Abundance of isotope 2) × Average atomic mass-Abundance of isotope 2 × Mass of isotope 2) ÷ Abundance of isotope 1</code></td></tr><tr><td><strong>Mass of isotope 2</strong></td><td><code>((Abundance of isotope 1+Abundance of isotope 2) × Average atomic mass-Abundance of isotope 1 × Mass of isotope 1) ÷ Abundance of isotope 2</code></td></tr></tbody></table><p><p>Dividing by the total abundance rather than by a hundred makes the page tolerant of abundances that sum to something other than a hundred — useful when a figure comes off a partial analysis.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports average atomic mass and total abundance and mass contributed by isotope 2.</p><ul><li><strong>Abundance of isotope 1</strong> — in %. Chlorine-35 is 75.77 %</li><li><strong>Mass of isotope 1</strong> — in u. Exact mass from the mass spectrum</li><li><strong>Abundance of isotope 2</strong> — in %. Chlorine-37 is 24.23 %</li><li><strong>Mass of isotope 2</strong> — in u. Exact mass, not the mass number</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Average atomic mass</strong> — in u</li><li><strong>Total abundance</strong> — in %</li><li><strong>Mass contributed by isotope 2</strong> — in %</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Abundance of isotope 1 = 75.77 %, Mass of isotope 1 = 34.969 u, Abundance of isotope 2 = 24.23 %, Mass of isotope 2 = 36.966 u — and the results panel reads:</p><ul><li><strong>Average atomic mass</strong> = <code>(Abundance of isotope 1 × Mass of isotope 1+Abundance of isotope 2 × Mass of isotope 2) ÷ (Abundance of isotope 1+Abundance of isotope 2)</code> = <strong>35.453 u</strong></li><li><strong>Total abundance</strong> = <code>Abundance of isotope 1+Abundance of isotope 2</code> = <strong>100 %</strong></li><li><strong>Mass contributed by isotope 2</strong> = <code>Abundance of isotope 2 × Mass of isotope 2 ÷ (Abundance of isotope 1 × Mass of isotope 1+Abundance of isotope 2 × Mass of isotope 2) × 100</code> = <strong>25.264 %</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(75.77 × 34.969+24.23 × 36.966) ÷ (75.77+24.23) = 35.453</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Chlorine: 0.7577 × 34.9689 + 0.2423 × 36.9659 gives 35.45 u, the figure on the periodic table. The masses are 34.9689 and 36.9659, not 35 and 37 — using the mass numbers gives 35.48, which is close but not the table's value.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the total abundance first. A total near 100 % and an answer close to the table value means the isotope data is consistent; a total of 92 % means an isotope is missing and the average has been pulled towards the one you did enter.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Average atomic mass</th><th>Total abundance</th><th>Mass contributed by isotope 2</th></tr></thead><tbody><tr><td><strong>Abundance of isotope 1</strong> +10 %</td><td>−0.1 %</td><td>+7.58 %</td><td>−6.95 %</td></tr><tr><td><strong>Mass of isotope 1</strong> +10 %</td><td>+7.47 %</td><td>+0 %</td><td>−6.95 %</td></tr><tr><td><strong>Abundance of isotope 2</strong> +10 %</td><td>+0.1 %</td><td>+2.42 %</td><td>+7.29 %</td></tr><tr><td><strong>Mass of isotope 2</strong> +10 %</td><td>+2.53 %</td><td>+0 %</td><td>+7.29 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Abundance of isotope 1</strong>: a ten per cent move there shifts the result by about 7.6 per cent. The least sensitive is <strong>Mass of isotope 2</strong>, at 7.3 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Abundance of isotope 1 = 69.15, Mass of isotope 1 = 62.93, Abundance of isotope 2 = 30.85, Mass of isotope 2 = 64.928, the page reports <strong>Average atomic mass</strong> = 63.546 u, <strong>Total abundance</strong> = 100 %, <strong>Mass contributed by isotope 2</strong> = 31.521 %. Copper's two isotopes average to 63.55 u, which is the table's figure and not a whole number.</li><li>With Abundance of isotope 1 = 50.69, Mass of isotope 1 = 78.918, Abundance of isotope 2 = 49.31, Mass of isotope 2 = 80.916, the page reports <strong>Average atomic mass</strong> = 79.904 u, <strong>Total abundance</strong> = 100 %, <strong>Mass contributed by isotope 2</strong> = 49.935 %. Bromine comes out at 79.90 u — an almost even split, so the average sits nearly midway between the two masses.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Mass numbers used instead of isotope masses.</strong> 35 and 37 are labels; the actual masses are 34.9689 and 36.9659, and the difference shows in the second decimal.</li><li><strong>Abundances that do not sum to a hundred.</strong> Either an isotope is missing or one figure is wrong; the total abundance here tells you which.</li><li><strong>The average treated as a real atom.</strong> No single chlorine atom weighs 35.45 u — a mass spectrometer shows two clean peaks, nothing in between.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Average atomic mass (u), Total abundance (%), Mass contributed by isotope 2 (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Isotope masses are in unified atomic mass units, which are numerically identical to grams per mole for the average. The abundances are percentages and the total abundance that comes back is a percentage too.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need abundance of isotope 1 and mass of isotope 1 and abundance of isotope 2 and mass of isotope 2. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Average atomic mass and total abundance and mass contributed by isotope 2 should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Abundance of isotope 1</strong> ×10</td><td>35.453</td><td>35.031</td><td>×0.988</td></tr><tr><td><strong>Mass of isotope 1</strong> ×10</td><td>35.453</td><td>273.916</td><td>×7.726</td></tr><tr><td><strong>Abundance of isotope 2</strong> ×10</td><td>35.453</td><td>36.49</td><td>×1.029</td></tr><tr><td><strong>Mass of isotope 2</strong> ×10</td><td>35.453</td><td>116.064</td><td>×3.274</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Two isotopes at a time.</strong> Elements such as tin have ten; combine the results in pairs, or weight them all by abundance directly.</li><li><strong>It assumes a natural sample.</strong> An enriched or depleted sample has different abundances and, for some elements, a measurably different molar mass.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking isotope data against the periodic table.</li></li><li><li>Finding the abundance ratio a measured average implies.</li></li><li><li>Explaining why atomic masses are not whole numbers.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/atomic-mass">Atomic mass</a> <a href="/chemistry/atom">Atom</a> <a href="/chemistry/molar-mass">Molar mass</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Average Atomic Mass calculator work out?', 'a' => <<<'TXT'
            It returns average atomic mass and total abundance and mass contributed by isotope 2 from abundance of isotope 1 and mass of isotope 1 and abundance of isotope 2 and mass of isotope 2. The relationship is (Abundance of isotope 1 × Mass of isotope 1+Abundance of isotope 2 × Mass of isotope 2) ÷ (Abundance of isotope 1+Abundance of isotope 2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Abundance of isotope 1 (%), Mass of isotope 1 (u), Abundance of isotope 2 (%), Mass of isotope 2 (u). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: abundance of isotope 1 in %; mass of isotope 1 in u; abundance of isotope 2 in %; mass of isotope 2 in u. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is chlorine\'s atomic mass 35.45 and not 35.5?', 'a' => <<<'TXT'
            Because the isotopes' exact masses are 34.9689 and 36.9659 u at abundances of 75.77 and 24.23 %. The weighted average lands at 35.45; rounding the isotope masses to 35 and 37 gives a slightly different answer.
            TXT],
            ['q' => 'Does the average atomic mass change from sample to sample?', 'a' => 'Slightly, because natural isotope ratios vary with the source. That variation is why the periodic table quotes an interval for some elements.'],
        ],
        'related' => [
            ['path' => '/chemistry/atomic-mass', 'name' => 'Atomic mass'],
            ['path' => '/chemistry/atom', 'name' => 'Atom'],
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
