<?php

/**
 * Water Hardness Calculator
 * /chemistry/water-hardness
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Water Hardness Calculator',
    'meta' => ['title' => 'Water Hardness Calculator: Calcium and Magnesium', 'description' => 'Turn calcium and magnesium concentrations into total hardness expressed as calcium carbonate, in the units that a softener or a water report uses every day.', 'h1' => 'Water Hardness Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'calcium',
                    'label' => 'Calcium concentration',
                    'type' => 'number',
                    'suffix' => 'mg/L',
                    'default' => '80',
                    'help' => 'As Ca²⁺, from a water report or an EDTA titration',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'magnesium',
                    'label' => 'Magnesium concentration',
                    'type' => 'number',
                    'suffix' => 'mg/L',
                    'default' => '24',
                    'help' => 'As Mg²⁺',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hardness',
                    'label' => 'Total hardness as CaCO₃',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mg/L',
                ],
                [
                    'name' => 'hardness_mmol',
                    'label' => 'Hardness',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mmol/L',
                ],
                [
                    'name' => 'grains',
                    'label' => 'Hardness',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gpg',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Water Hardness',
            'results' => [
                'hardness' => '(calcium/40.078+magnesium/24.305)*100.09',
                'hardness_mmol' => 'calcium/40.078+magnesium/24.305',
                'grains' => '(calcium/40.078+magnesium/24.305)*100.09/17.118',
                'calcium' => '(hardness/100.09-magnesium/24.305)*40.078',
                'magnesium' => '(hardness/100.09-calcium/40.078)*24.305',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Hardness is reported as the equivalent mass of calcium carbonate, so both ions are converted onto one scale: <strong>hardness = (Ca ÷ 40.08 + Mg ÷ 24.31) × 100.09</strong>, with the concentrations in milligrams per litre.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Hardness is what makes soap refuse to lather, kettles fur and boilers scale. Because it is caused by two different ions, it is always expressed on a common scale — as if all of it were calcium carbonate.</p><p>The page reports <strong>total hardness as CaCO₃ and hardness (mmol/L) and hardness (gpg)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Total hardness as CaCO₃</strong></td><td><code>(Calcium concentration ÷ 40.078+Magnesium concentration ÷ 24.305) × 100.09</code></td></tr><tr><td><strong>Hardness (mmol per L)</strong></td><td><code>Calcium concentration ÷ 40.078+Magnesium concentration ÷ 24.305</code></td></tr><tr><td><strong>Hardness (gpg)</strong></td><td><code>(Calcium concentration ÷ 40.078+Magnesium concentration ÷ 24.305) × 100.09 ÷ 17.118</code></td></tr><tr><td><strong>Calcium concentration</strong></td><td><code>(Total hardness as CaCO₃ ÷ 100.09-Magnesium concentration ÷ 24.305) × 40.078</code></td></tr><tr><td><strong>Magnesium concentration</strong></td><td><code>(Total hardness as CaCO₃ ÷ 100.09-Calcium concentration ÷ 40.078) × 24.305</code></td></tr></tbody></table><p><p>Each ion's mass is divided by its molar mass to give millimoles, and the sum is multiplied by the molar mass of calcium carbonate. That is why the conversion factors are 2.5 for calcium and 4.1 for magnesium: one millimole of either produces one millimole of carbonate equivalent.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports total hardness as CaCO₃ and hardness (mmol/L) and hardness (gpg).</p><ul><li><strong>Calcium concentration</strong> — in mg/L. As Ca²⁺, from a water report or an EDTA titration</li><li><strong>Magnesium concentration</strong> — in mg/L. As Mg²⁺</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Total hardness as CaCO₃</strong> — in mg/L</li><li><strong>Hardness</strong> — in mmol/L</li><li><strong>Hardness</strong> — in gpg</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Calcium concentration = 80 mg/L, Magnesium concentration = 24 mg/L — and the results panel reads:</p><ul><li><strong>Total hardness as CaCO₃</strong> = <code>(Calcium concentration ÷ 40.078+Magnesium concentration ÷ 24.305) × 100.09</code> = <strong>298.624 mg/L</strong></li><li><strong>Hardness</strong> = <code>Calcium concentration ÷ 40.078+Magnesium concentration ÷ 24.305</code> = <strong>2.984 mmol/L</strong></li><li><strong>Hardness</strong> = <code>(Calcium concentration ÷ 40.078+Magnesium concentration ÷ 24.305) × 100.09 ÷ 17.118</code> = <strong>17.445 gpg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(80 ÷ 40.078+24 ÷ 24.305) × 100.09 = 298.624</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>80 mg/L calcium and 24 mg/L magnesium is 2.00 plus 0.99 millimoles, or about 299 mg/L as CaCO₃ — firmly in the hard range, and about 17.5 grains per gallon.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Below 60 mg/L is soft, 60–120 is moderately hard, 120–180 is hard and above 180 is very hard. Most municipal supplies sit between 100 and 300; groundwater from limestone can exceed 400.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Total hardness as CaCO₃</th><th>Hardness</th><th>Hardness</th></tr></thead><tbody><tr><td><strong>Calcium concentration</strong> +10 %</td><td>+6.69 %</td><td>+6.69 %</td><td>+6.69 %</td></tr><tr><td><strong>Magnesium concentration</strong> +10 %</td><td>+3.31 %</td><td>+3.31 %</td><td>+3.31 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Calcium concentration</strong>: a ten per cent move there shifts the result by about 6.7 per cent. The least sensitive is <strong>Magnesium concentration</strong>, at 3.3 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Calcium concentration = 40, Magnesium concentration = 12, the page reports <strong>Total hardness as CaCO₃</strong> = 149.312 mg/L, <strong>Hardness</strong> = 1.492 mmol/L, <strong>Hardness</strong> = 8.723 gpg. A moderately hard supply at about 150 mg/L — pleasant to drink and kind to pipework.</li><li>With Calcium concentration = 200, Magnesium concentration = 48, the page reports <strong>Total hardness as CaCO₃</strong> = 697.144 mg/L, <strong>Hardness</strong> = 6.965 mmol/L, <strong>Hardness</strong> = 40.726 gpg. A limestone aquifer at 697 mg/L: softeners cannot keep up and the water needs treatment before a boiler sees it.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Calcium reported as CaCO₃ already.</strong> Many lab reports convert, and converting again multiplies the answer by 2.5.</li><li><strong>Magnesium ignored.</strong> In soft waters it is a minor contributor; in hard groundwater it can be a fifth of the total.</li><li><strong>Grains and mg/L mixed.</strong> A softener rated in grains per gallon and a report in milligrams per litre have to be converted before they can be compared.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Total hardness as CaCO₃ (mg/L), Hardness (mmol/L), Hardness (gpg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Both inputs are in milligrams per litre and the main result is too, expressed as calcium carbonate. The millimole figure is the carbonate equivalent per litre, and grains per gallon is the US customary unit — 17.118 mg/L each.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need calcium concentration and magnesium concentration. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Total hardness as caco₃ and hardness (mmol/l) and hardness (gpg) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Calcium concentration</strong> ×10</td><td>298.624</td><td>2 096.738</td><td>×7.021</td></tr><tr><td><strong>Magnesium concentration</strong> ×10</td><td>298.624</td><td>1 188.13</td><td>×3.979</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It counts only calcium and magnesium.</strong> Strontium and iron add hardness but are usually minor; aluminium and silica are counted separately.</li><li><strong>Hardness is not the same as alkalinity.</strong> They are often similar, but a water can be hard and poorly buffered.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a supply against a softener's specification.</li></li><li><li>Deciding whether a boiler needs pretreatment.</li></li><li><li>Converting a lab report into the units a client uses.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/tds">TDS</a> <a href="/chemistry/molarity">Molarity</a> <a href="/chemistry/ppm-to-molarity">PPM to molarity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Water Hardness calculator work out?', 'a' => <<<'TXT'
            It returns total hardness as CaCO₃ and hardness (mmol/L) and hardness (gpg) from calcium concentration and magnesium concentration. The relationship is (Calcium concentration ÷ 40.078+Magnesium concentration ÷ 24.305) × 100.09.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Calcium concentration (mg/L), Magnesium concentration (mg/L). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: calcium concentration in mg/L; magnesium concentration in mg/L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why report hardness as calcium carbonate?', 'a' => 'Because it is a mixture of ions and a single number is easier to specify against. Calcium carbonate is the traditional common denominator.'],
            ['q' => 'Does hard water harm you?', 'a' => 'No — it is a source of dietary calcium and magnesium. It is tough on appliances, not on people.'],
        ],
        'related' => [
            ['path' => '/chemistry/tds', 'name' => 'TDS'],
            ['path' => '/chemistry/molarity', 'name' => 'Molarity'],
            ['path' => '/chemistry/ppm-to-molarity', 'name' => 'PPM to molarity'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
