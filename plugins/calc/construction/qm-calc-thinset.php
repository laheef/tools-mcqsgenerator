<?php

/**
 * Thinset
 * /construction/thinset
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Thinset',
    'meta' => ['title' => 'Thinset Calculator: Bags of Tile Adhesive Mix', 'description' => 'Work out how many 50 lb bags of thinset a tiled floor needs, from the area, the trowel notch and the coverage the manufacturer quotes for that notch. All shown.', 'h1' => 'Thinset', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'area',
                    'label' => 'Tiled area',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '100',
                    'help' => 'Floor or wall area to be covered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'coverage',
                    'label' => 'Coverage per bag',
                    'type' => 'number',
                    'suffix' => 'ft²/50 lb',
                    'default' => '10',
                    'help' => 'About 10 for a ¼ in square notch',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'coats',
                    'label' => 'Layers',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Two only where a thick bed is being built up',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Wastage',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Mixed adhesive that goes off in the bucket',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bags',
                    'label' => 'Bags of 50 lb thinset',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'weight',
                    'label' => 'Adhesive weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'coverage_used',
                    'label' => 'Coverage used',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Thinset',
            'results' => [
                'bags' => 'ceil(area*coats*(1+waste/100)/coverage-0.000000001)',
                'weight' => 'ceil(area*coats*(1+waste/100)/coverage-0.000000001)*50',
                'coverage_used' => 'area*coats',
                'area' => 'bags*coverage/(coats*(1+waste/100))',
                'waste' => '(bags*coverage/(area*coats)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Thinset is spread with a notched trowel, and the notch sets the coverage: a <strong>¼ × ¼ in</strong> notch lays about 10 ft² per 50 lb bag, a <strong>½ × ½ in</strong> notch about 3.5 ft². Bags = area ÷ coverage.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Thinset coverage is set by the trowel, not by the bag: the same 50 lb bag covers three times as much under a small notch as under a large one. Getting the bag count right is mostly about knowing which trowel the job needs.</p><p>The page reports <strong>bags of 50 lb thinset and adhesive weight and coverage used</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Bags of 50 lb thinset</strong></td><td><code>ceil(Tiled area × Layers × (1+Wastage ÷ 100) ÷ Coverage per bag-0.000000001)</code></td></tr><tr><td><strong>Adhesive weight</strong></td><td><code>ceil(Tiled area × Layers × (1+Wastage ÷ 100) ÷ Coverage per bag-0.000000001) × 50</code></td></tr><tr><td><strong>Coverage used</strong></td><td><code>Tiled area × Layers</code></td></tr><tr><td><strong>Tiled area</strong></td><td><code>Bags of 50 lb thinset × Coverage per bag ÷ (Layers × (1+Wastage ÷ 100))</code></td></tr><tr><td><strong>Wastage</strong></td><td><code>(Bags of 50 lb thinset × Coverage per bag ÷ (Tiled area × Layers)-1) × 100</code></td></tr></tbody></table><p><p>Coverage per bag is a manufacturer's figure for a specific notch and a flat substrate. The waste allowance matters more than on most materials because mixed thinset has a working life of about twenty minutes.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports bags of 50 lb thinset and adhesive weight and coverage used.</p><ul><li><strong>Tiled area</strong> — in ft². Floor or wall area to be covered</li><li><strong>Coverage per bag</strong> — in ft²/50 lb. About 10 for a ¼ in square notch</li><li><strong>Layers</strong>. Two only where a thick bed is being built up</li><li><strong>Wastage</strong> — in %. Mixed adhesive that goes off in the bucket</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Bags of 50 lb thinset</strong></li><li><strong>Adhesive weight</strong> — in lb</li><li><strong>Coverage used</strong> — in ft²</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Tiled area = 100 ft², Coverage per bag = 10 ft²/50 lb, Layers = 1, Wastage = 10 % — and the results panel reads:</p><ul><li><strong>Bags of 50 lb thinset</strong> = <code>ceil(Tiled area × Layers × (1+Wastage ÷ 100) ÷ Coverage per bag-0.000000001)</code> = <strong>11</strong></li><li><strong>Adhesive weight</strong> = <code>ceil(Tiled area × Layers × (1+Wastage ÷ 100) ÷ Coverage per bag-0.000000001) × 50</code> = <strong>550 lb</strong></li><li><strong>Coverage used</strong> = <code>Tiled area × Layers</code> = <strong>100 ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(100 × 1 × (1+10 ÷ 100) ÷ 10-0.000000001) = 11</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>100 ft² of floor with a ¼ in notch: at 10 ft² per bag and ten per cent waste that is 11 bags — 550 lb of adhesive for a hundred square feet, which sounds a lot until you see how much a notched trowel leaves behind.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the bag count with the tile: large-format tile needs a ½ in notch and therefore three times the adhesive. Back-buttering adds more again.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Bags of 50 lb thinset</th><th>Adhesive weight</th><th>Coverage used</th></tr></thead><tbody><tr><td><strong>Tiled area</strong> +10 %</td><td>+18.18 %</td><td>+18.18 %</td><td>+10 %</td></tr><tr><td><strong>Coverage per bag</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Layers</strong> +10 %</td><td>+18.18 %</td><td>+18.18 %</td><td>+10 %</td></tr><tr><td><strong>Wastage</strong> +10 %</td><td>+9.09 %</td><td>+9.09 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Tiled area</strong>: a ten per cent move there shifts the result by about 18.2 per cent. The least sensitive is <strong>Wastage</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Tiled area = 60, Coverage per bag = 3.5, Layers = 1, Wastage = 10, the page reports <strong>Bags of 50 lb thinset</strong> = 19, <strong>Adhesive weight</strong> = 950 lb, <strong>Coverage used</strong> = 60 ft². Sixty square feet of 24 in tile with a ½ in notch: 19 bags.</li><li>With Tiled area = 200, Coverage per bag = 12, Layers = 1, Wastage = 5, the page reports <strong>Bags of 50 lb thinset</strong> = 18, <strong>Adhesive weight</strong> = 900 lb, <strong>Coverage used</strong> = 200 ft². Mosaic on a flat floor with a small notch: 18 bags for twice the area.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Coverage borrowed from another trowel.</strong> Doubling the notch roughly halves the coverage.</li><li><strong>No waste allowance.</strong> Bucket life is short; a mixed batch that skins over is thrown away.</li><li><strong>Thinset used as levelling compound.</strong> Bedding out dips with adhesive uses far more than any coverage figure.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Bags of 50 lb thinset, Adhesive weight (lb), Coverage used (ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Area in square feet and coverage in square feet per 50 lb bag, so the result is a count of bags and their total weight in pounds.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need tiled area and coverage per bag and layers and wastage. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Bags of 50 lb thinset and adhesive weight and coverage used should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Tiled area</strong> ×10</td><td>11</td><td>110</td><td>ten times larger</td></tr><tr><td><strong>Coverage per bag</strong> ×10</td><td>11</td><td>2</td><td>×0.182</td></tr><tr><td><strong>Layers</strong> ×10</td><td>11</td><td>110</td><td>ten times larger</td></tr><tr><td><strong>Wastage</strong> ×10</td><td>11</td><td>20</td><td>×1.818</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Manufacturer figures.</strong> Coverage varies with the substrate's flatness and the trowel's actual wear.</li><li><strong>One trowel.</strong> Mixing notches across a floor needs the area split.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering adhesive for a floor.</li></li><li><li>Comparing trowel sizes by cost.</li></li><li><li>Checking a tiler's materials list.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/tile">Tile</a> <a href="/construction/grout">Grout</a> <a href="/construction/mortar">Mortar</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Thinset calculator work out?', 'a' => <<<'TXT'
            It returns bags of 50 lb thinset and adhesive weight and coverage used from tiled area and coverage per bag and layers and wastage. The relationship is ceil(Tiled area × Layers × (1+Wastage ÷ 100) ÷ Coverage per bag-0.000000001).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Tiled area (ft²), Coverage per bag (ft²/50 lb), Layers, Wastage (%). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: tiled area in ft²; coverage per bag in ft²/50 lb; wastage in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many square feet does a bag of thinset cover?', 'a' => 'About 10 ft² with a ¼ × ¼ in notch and 3.5 ft² with a ½ × ½ in notch on a flat floor.'],
            ['q' => 'How long does mixed thinset last?', 'a' => 'About twenty minutes in the bucket. Mix what you can lay in that time rather than the whole bag at once.'],
        ],
        'related' => [
            ['path' => '/construction/tile', 'name' => 'Tile'],
            ['path' => '/construction/grout', 'name' => 'Grout'],
            ['path' => '/construction/mortar', 'name' => 'Mortar'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
