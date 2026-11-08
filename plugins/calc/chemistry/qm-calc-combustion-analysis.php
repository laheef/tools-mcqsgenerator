<?php

/**
 * Combustion Analysis Calculator
 * /chemistry/combustion-analysis
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Combustion Analysis Calculator',
    'meta' => ['title' => 'Combustion Analysis Calculator: C, H and O Mass', 'description' => 'Recover the masses of carbon, hydrogen and oxygen in a sample from the carbon dioxide and water it produces when burnt, ready to turn into an empirical formula.', 'h1' => 'Combustion Analysis Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'sample_mass',
                    'label' => 'Mass of the sample burnt',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '1.0',
                    'help' => 'Weighed before combustion',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'co2_mass',
                    'label' => 'Mass of CO₂ collected',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '1.5',
                    'help' => 'From the absorption tube, corrected for the blank',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'h2o_mass',
                    'label' => 'Mass of H₂O collected',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '0.61',
                    'help' => 'From the second absorption tube',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'carbon_mass',
                    'label' => 'Mass of carbon in the sample',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'hydrogen_mass',
                    'label' => 'Mass of hydrogen in the sample',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'oxygen_mass',
                    'label' => 'Mass of oxygen by difference',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'percent_carbon',
                    'label' => 'Carbon by mass',
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
            'title' => 'Combustion Analysis',
            'results' => [
                'carbon_mass' => 'co2_mass*12.011/44.01',
                'hydrogen_mass' => 'h2o_mass*2.016/18.015',
                'oxygen_mass' => 'sample_mass-co2_mass*12.011/44.01-h2o_mass*2.016/18.015',
                'percent_carbon' => 'co2_mass*12.011/44.01/sample_mass*100',
                'co2_mass' => 'carbon_mass*44.01/12.011',
                'h2o_mass' => 'hydrogen_mass*18.015/2.016',
                'sample_mass' => 'carbon_mass+hydrogen_mass+oxygen_mass',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Burning a sample converts all its carbon to CO₂ and all its hydrogen to H₂O. Weigh those two, and the masses of C and H follow from the ratios of molar masses: <strong>m(C) = m(CO₂) × 12.011 ÷ 44.01</strong>. Oxygen is whatever mass is left, and it can only be found that way.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Combustion analysis is how an unknown organic compound is identified from a few milligrams. Every carbon atom becomes one CO₂ and every two hydrogen atoms one H₂O, so the two tube masses carry the whole elemental composition.</p><p>The page reports <strong>mass of carbon in the sample and mass of hydrogen in the sample and mass of oxygen by difference and carbon by mass</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Mass of carbon in the sample</strong></td><td><code>Mass of CO₂ collected × 12.011 ÷ 44.01</code></td></tr><tr><td><strong>Mass of hydrogen in the sample</strong></td><td><code>Mass of H₂O collected × 2.016 ÷ 18.015</code></td></tr><tr><td><strong>Mass of oxygen by difference</strong></td><td><code>Mass of the sample burnt-Mass of CO₂ collected × 12.011 ÷ 44.01-Mass of H₂O collected × 2.016 ÷ 18.015</code></td></tr><tr><td><strong>Carbon by mass</strong></td><td><code>Mass of CO₂ collected × 12.011 ÷ 44.01 ÷ Mass of the sample burnt × 100</code></td></tr><tr><td><strong>Mass of CO₂ collected</strong></td><td><code>Mass of carbon in the sample × 44.01 ÷ 12.011</code></td></tr><tr><td><strong>Mass of H₂O collected</strong></td><td><code>Mass of hydrogen in the sample × 18.015 ÷ 2.016</code></td></tr><tr><td><strong>Mass of the sample burnt</strong></td><td><code>Mass of carbon in the sample+Mass of hydrogen in the sample+Mass of oxygen by difference</code></td></tr></tbody></table><p><p>12.011 ÷ 44.01 is the carbon fraction of carbon dioxide by mass, and 2.016 ÷ 18.015 is the hydrogen fraction of water. Oxygen cannot be weighed directly, so it is found by subtracting the other two from the sample mass.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports mass of carbon in the sample and mass of hydrogen in the sample and mass of oxygen by difference and carbon by mass.</p><ul><li><strong>Mass of the sample burnt</strong> — in g. Weighed before combustion</li><li><strong>Mass of CO₂ collected</strong> — in g. From the absorption tube, corrected for the blank</li><li><strong>Mass of H₂O collected</strong> — in g. From the second absorption tube</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Mass of carbon in the sample</strong> — in g</li><li><strong>Mass of hydrogen in the sample</strong> — in g</li><li><strong>Mass of oxygen by difference</strong> — in g</li><li><strong>Carbon by mass</strong> — in %</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass of the sample burnt = 1 g, Mass of CO₂ collected = 1.5 g, Mass of H₂O collected = 0.61 g — and the results panel reads:</p><ul><li><strong>Mass of carbon in the sample</strong> = <code>Mass of CO₂ collected × 12.011 ÷ 44.01</code> = <strong>0.409 g</strong></li><li><strong>Mass of hydrogen in the sample</strong> = <code>Mass of H₂O collected × 2.016 ÷ 18.015</code> = <strong>0.068 g</strong></li><li><strong>Mass of oxygen by difference</strong> = <code>Mass of the sample burnt-Mass of CO₂ collected × 12.011 ÷ 44.01-Mass of H₂O collected × 2.016 ÷ 18.015</code> = <strong>0.522 g</strong></li><li><strong>Carbon by mass</strong> = <code>Mass of CO₂ collected × 12.011 ÷ 44.01 ÷ Mass of the sample burnt × 100</code> = <strong>40.937 %</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1.5 × 12.011 ÷ 44.01 = 0.409</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 1.00 g sample giving 1.50 g of CO₂ and 0.61 g of H₂O contains 0.409 g of carbon and 0.068 g of hydrogen. The remaining 0.523 g must be oxygen — that subtraction is the only route to it.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>If the three masses add to slightly more than the sample, the CO₂ figure includes a blank or the sample was wet. A shortfall of several per cent usually means an element the analysis cannot see — nitrogen, sulfur, a halogen.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Mass of carbon in the sample</th><th>Mass of hydrogen in the sample</th><th>Mass of oxygen by difference</th><th>Carbon by mass</th></tr></thead><tbody><tr><td><strong>Mass of the sample burnt</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+19.14 %</td><td>−9.09 %</td></tr><tr><td><strong>Mass of CO₂ collected</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−7.84 %</td><td>+10 %</td></tr><tr><td><strong>Mass of H₂O collected</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>−1.31 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Mass of the sample burnt</strong>: a ten per cent move there shifts the result by about 19.1 per cent. The least sensitive is <strong>Mass of CO₂ collected</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass of the sample burnt = 2, Mass of CO₂ collected = 2.933, Mass of H₂O collected = 1.2, the page reports <strong>Mass of carbon in the sample</strong> = 0.8 g, <strong>Mass of hydrogen in the sample</strong> = 0.134 g, <strong>Mass of oxygen by difference</strong> = 1.065 g, <strong>Carbon by mass</strong> = 40.023 %. 2.0 g giving 2.933 g of CO₂ and 1.2 g of water is 0.800 g of carbon and 0.134 g of hydrogen — about 47 % oxygen left over.</li><li>With Mass of the sample burnt = 0.5, Mass of CO₂ collected = 1.571, Mass of H₂O collected = 0, the page reports <strong>Mass of carbon in the sample</strong> = 0.429 g, <strong>Mass of hydrogen in the sample</strong> = 0 g, <strong>Mass of oxygen by difference</strong> = 0.071 g, <strong>Carbon by mass</strong> = 85.75 %. No water at all means a carbon-only sample, or a leak in the second absorption tube.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using 12 ÷ 44 as exact.</strong> It is close, but with 44.01 and 12.011 the third decimal place of the answer holds up.</li><li><strong>Assuming the remainder is oxygen.</strong> Nitrogen, sulfur and halogens also hide in the difference; a nitrogen-containing sample needs a Dumas or Kjeldahl figure too.</li><li><strong>Forgetting the blank.</strong> The absorption tubes gain mass from the air in the apparatus; a blank run is what makes the numbers trustworthy.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Mass of carbon in the sample (g), Mass of hydrogen in the sample (g), Mass of oxygen by difference (g), Carbon by mass (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>All masses in the same unit — grams throughout. The percentage that comes back is by mass, and it is the figure the empirical formula page wants.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass of the sample burnt and mass of CO₂ collected and mass of H₂O collected. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Mass of carbon in the sample and mass of hydrogen in the sample and mass of oxygen by difference and carbon by mass should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass of the sample burnt</strong> ×10</td><td>0.409</td><td>0.409</td><td>unchanged</td></tr><tr><td><strong>Mass of CO₂ collected</strong> ×10</td><td>0.409</td><td>4.094</td><td>ten times larger</td></tr><tr><td><strong>Mass of H₂O collected</strong> ×10</td><td>0.409</td><td>0.409</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes complete combustion.</strong> Soot in the tube is carbon that never became CO₂, and it disappears from the balance.</li><li><strong>It cannot see oxygen.</strong> By difference it can, which means one bad mass corrupts the oxygen figure doubly.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Starting an empirical formula determination.</li></li><li><li>Confirming the composition of a synthesised organic compound.</li></li><li><li>Checking a combustion result for a plausible mass balance.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/empirical-formula">Empirical formula</a> <a href="/chemistry/percent-composition">Percent composition</a> <a href="/chemistry/combustion-reaction">Combustion reaction</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Combustion Analysis calculator work out?', 'a' => <<<'TXT'
            It returns mass of carbon in the sample and mass of hydrogen in the sample and mass of oxygen by difference and carbon by mass from mass of the sample burnt and mass of CO₂ collected and mass of H₂O collected. The relationship is Mass of CO₂ collected × 12.011 ÷ 44.01.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mass of the sample burnt (g), Mass of CO₂ collected (g), Mass of H₂O collected (g). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass of the sample burnt in g; mass of CO₂ collected in g; mass of H₂O collected in g. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is oxygen found by difference?', 'a' => <<<'TXT'
            Because it is the only element that leaves no dedicated product — its atoms end up split between CO₂ and H₂O. Subtract the carbon and hydrogen masses from the sample and what remains is oxygen, provided nothing else is present.
            TXT],
            ['q' => 'How much sample do I need?', 'a' => 'A few milligrams is standard for a modern analyser. Below about 1 mg, the weighing error starts to matter more than the chemistry.'],
        ],
        'related' => [
            ['path' => '/chemistry/empirical-formula', 'name' => 'Empirical formula'],
            ['path' => '/chemistry/percent-composition', 'name' => 'Percent composition'],
            ['path' => '/chemistry/combustion-reaction', 'name' => 'Combustion reaction'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
