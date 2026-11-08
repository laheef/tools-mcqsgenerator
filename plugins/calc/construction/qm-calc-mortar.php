<?php

/**
 * Mortar
 * /construction/mortar
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mortar',
    'meta' => ['title' => 'Mortar Calculator: Bags Needed to Lay Blocks', 'description' => 'Work out the mortar a block or brick wall needs from its area, the joint size and the wall\'s thickness, in cubic feet and in 80 lb bags of mix. All shown.', 'h1' => 'Mortar', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'wall_area',
                    'label' => 'Wall area',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '200',
                    'help' => 'Face area, openings deducted',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'joint',
                    'label' => 'Joint thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.375',
                    'help' => '⅜ in for block, ⅜ to ½ for brick',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'unit_depth',
                    'label' => 'Wall thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '8',
                    'help' => 'The joint\'s depth into the wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Wastage',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Mortar that falls off the trowel',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mortar_ft3',
                    'label' => 'Mortar volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'bags_80lb',
                    'label' => 'Bags of mortar mix (80 lb)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'joint_fraction',
                    'label' => 'Joint share of the wall face',
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
            'title' => 'Mortar',
            'results' => [
                'mortar_ft3' => 'wall_area*joint/(joint+8)*unit_depth/12*(1+waste/100)',
                'bags_80lb' => 'ceil(wall_area*joint/(joint+8)*unit_depth/12*(1+waste/100)/0.7)',
                'joint_fraction' => 'joint/(joint+8)*100',
                'wall_area' => 'mortar_ft3/(joint/(joint+8)*unit_depth/12*(1+waste/100))',
                'joint' => '8*mortar_ft3/(wall_area*unit_depth/12*(1+waste/100)-mortar_ft3)',
                'unit_depth' => 'mortar_ft3/(wall_area*joint/(joint+8)*(1+waste/100))*12',
                'waste' => '(mortar_ft3/(wall_area*joint/(joint+8)*unit_depth/12)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Mortar fills the joints and the beds between units. For a wall of <strong>A</strong> square feet, the mortar volume is the joint's share of the face times the wall's thickness: <strong>A × joint/(joint + 8) × depth</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Mortar is a small part of a wall's cost but a large part of its appearance and strength. Ordering it by the bag from the wall area avoids the common habit of estimating a bag per so many blocks, which drifts badly with joint size.</p><p>The page reports <strong>mortar volume and bags of mortar mix (80 lb) and joint share of the wall face</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Mortar volume</strong></td><td><code>Wall area × Joint thickness ÷ (Joint thickness+8) × Wall thickness ÷ 12 × (1+Wastage ÷ 100)</code></td></tr><tr><td><strong>Bags of mortar mix (80 lb)</strong></td><td><code>ceil(Wall area × Joint thickness ÷ (Joint thickness+8) × Wall thickness ÷ 12 × (1+Wastage ÷ 100) ÷ 0.7)</code></td></tr><tr><td><strong>Joint share of the wall face</strong></td><td><code>Joint thickness ÷ (Joint thickness+8) × 100</code></td></tr><tr><td><strong>Wall area</strong></td><td><code>Mortar volume ÷ (Joint thickness ÷ (Joint thickness+8) × Wall thickness ÷ 12 × (1+Wastage ÷ 100))</code></td></tr><tr><td><strong>Joint thickness</strong></td><td><code>8 × Mortar volume ÷ (Wall area × Wall thickness ÷ 12 × (1+Wastage ÷ 100)-Mortar volume)</code></td></tr><tr><td><strong>Wall thickness</strong></td><td><code>Mortar volume ÷ (Wall area × Joint thickness ÷ (Joint thickness+8) × (1+Wastage ÷ 100)) × 12</code></td></tr><tr><td><strong>Wastage</strong></td><td><code>(Mortar volume ÷ (Wall area × Joint thickness ÷ (Joint thickness+8) × Wall thickness ÷ 12)-1) × 100</code></td></tr></tbody></table><p><p>The joint fraction is the joint divided by the unit-plus-joint module — for a ⅜ joint against an 8 in unit that is about 4.5 per cent of the face. Multiplying by the wall thickness gives the volume behind that face.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports mortar volume and bags of mortar mix (80 lb) and joint share of the wall face.</p><ul><li><strong>Wall area</strong> — in ft². Face area, openings deducted</li><li><strong>Joint thickness</strong> — in in. ⅜ in for block, ⅜ to ½ for brick</li><li><strong>Wall thickness</strong> — in in. The joint&#x27;s depth into the wall</li><li><strong>Wastage</strong> — in %. Mortar that falls off the trowel</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Mortar volume</strong> — in ft³</li><li><strong>Bags of mortar mix (80 lb)</strong></li><li><strong>Joint share of the wall face</strong> — in %</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Wall area = 200 ft², Joint thickness = 0.375 in, Wall thickness = 8 in, Wastage = 10 % — and the results panel reads:</p><ul><li><strong>Mortar volume</strong> = <code>Wall area × Joint thickness ÷ (Joint thickness+8) × Wall thickness ÷ 12 × (1+Wastage ÷ 100)</code> = <strong>6.567 ft³</strong></li><li><strong>Bags of mortar mix (80 lb)</strong> = <code>ceil(Wall area × Joint thickness ÷ (Joint thickness+8) × Wall thickness ÷ 12 × (1+Wastage ÷ 100) ÷ 0.7)</code> = <strong>10</strong></li><li><strong>Joint share of the wall face</strong> = <code>Joint thickness ÷ (Joint thickness+8) × 100</code> = <strong>4.478 %</strong></li></ul><p>With the numbers written into the formula, the first result is <code>200 × 0.375 ÷ (0.375+8) × 8 ÷ 12 × (1+10 ÷ 100) = 6.567</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 200 ft² block wall, 8 in thick, ⅜ joints: the joint is 4.5 per cent of the face, so the mortar is 200 × 0.045 × 0.667 = 6.0 ft³, 6.6 ft³ with waste, or ten bags of mix.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>This page assumes the joint is fully bedded, which is right for solid brick and for block laid with a full bed. Hollow block is usually face-shell bedded and uses about a third of the figure; the site rule of thumb is 2½ bags of mix per hundred 8 in blocks. A count far above that means the joints are oversized, and much below means they are not full, which is a strength problem rather than a saving.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Mortar volume</th><th>Bags of mortar mix (80 lb)</th><th>Joint share of the wall face</th></tr></thead><tbody><tr><td><strong>Wall area</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Joint thickness</strong> +10 %</td><td>+9.51 %</td><td>+10 %</td><td>+9.51 %</td></tr><tr><td><strong>Wall thickness</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Wastage</strong> +10 %</td><td>+0.91 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Wall area</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Wastage</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Wall area = 100, Joint thickness = 0.375, Wall thickness = 8, Wastage = 10, the page reports <strong>Mortar volume</strong> = 3.284 ft³, <strong>Bags of mortar mix (80 lb)</strong> = 5, <strong>Joint share of the wall face</strong> = 4.478 %. A hundred square feet of block: 3.3 ft³ of mortar, five bags.</li><li>With Wall area = 150, Joint thickness = 0.5, Wall thickness = 4.5, Wastage = 15, the page reports <strong>Mortar volume</strong> = 3.805 ft³, <strong>Bags of mortar mix (80 lb)</strong> = 6, <strong>Joint share of the wall face</strong> = 5.882 %. Brick veneer with ½ in joints: 3.8 ft³ of mortar and six bags.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Openings not deducted.</strong> Mortar is only used where there is wall.</li><li><strong>Joint thickness treated as unimportant.</strong> Going from ⅜ to ½ in raises the mortar volume by nearly a third.</li><li><strong>Bag yield assumed like concrete.</strong> Mortar mix yields about 0.7 ft³ per 80 lb bag, more than concrete because there is no coarse aggregate.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Mortar volume (ft³), Bags of mortar mix (80 lb), Joint share of the wall face (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The wall area is in square feet and the thicknesses in inches; the joint fraction is a percentage of the face, and the volume lands in cubic feet, which is what the bag yield is quoted in.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need wall area and joint thickness and wall thickness and wastage. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Mortar volume and bags of mortar mix (80 lb) and joint share of the wall face should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Wall area</strong> ×10</td><td>6.567</td><td>65.672</td><td>ten times larger</td></tr><tr><td><strong>Joint thickness</strong> ×10</td><td>6.567</td><td>46.809</td><td>×7.128</td></tr><tr><td><strong>Wall thickness</strong> ×10</td><td>6.567</td><td>65.672</td><td>ten times larger</td></tr><tr><td><strong>Wastage</strong> ×10</td><td>6.567</td><td>11.94</td><td>×1.818</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>An estimate of the joint fill.</strong> Tooling, waste and the mason's habit move the number more than the arithmetic does.</li><li><strong>One unit size.</strong> A wall of mixed units needs the area split.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering mortar for a block wall.</li></li><li><li>Pricing a masonry job's materials.</li></li><li><li>Checking that joints are being filled.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/brick">Brick</a> <a href="/construction/concrete-block">Concrete block</a> <a href="/construction/grout">Grout</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mortar calculator work out?', 'a' => <<<'TXT'
            It returns mortar volume and bags of mortar mix (80 lb) and joint share of the wall face from wall area and joint thickness and wall thickness and wastage. The relationship is Wall area × Joint thickness ÷ (Joint thickness+8) × Wall thickness ÷ 12 × (1+Wastage ÷ 100).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Wall area (ft²), Joint thickness (in), Wall thickness (in), Wastage (%). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: wall area in ft²; joint thickness in in; wall thickness in in; wastage in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many blocks will a bag of mortar lay?', 'a' => 'About 40 standard 8 in blocks, which is roughly 2½ bags per hundred blocks.'],
            ['q' => 'Does joint size really matter?', 'a' => 'Yes — it is the whole mortar volume. A ½ in joint uses nearly a third more mortar than a ⅜ in one over the same wall.'],
        ],
        'related' => [
            ['path' => '/construction/brick', 'name' => 'Brick'],
            ['path' => '/construction/concrete-block', 'name' => 'Concrete block'],
            ['path' => '/construction/grout', 'name' => 'Grout'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
