<?php

/**
 * Round pool volume
 * /construction/round-pool-volume
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Round pool volume',
    'meta' => ['title' => 'Round Pool Volume Calculator: Gallons and Litres', 'description' => 'Work out how many gallons and litres a round or above-ground pool holds from its diameter and water depth, with the cubic footage beside them. Units shown.', 'h1' => 'Round pool volume', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'diameter',
                    'label' => 'Pool diameter',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '18',
                    'help' => 'Across the water line',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Water depth',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '4',
                    'help' => 'Wall height less the freeboard',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_ft3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'gallons',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal',
                ],
                [
                    'name' => 'litres',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L',
                ],
                [
                    'name' => 'surface_area',
                    'label' => 'Surface area',
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
            'title' => 'Round pool volume',
            'results' => [
                'volume_ft3' => 'pi/4*pow(diameter,2)*depth',
                'gallons' => 'pi/4*pow(diameter,2)*depth*7.48052',
                'litres' => 'pi/4*pow(diameter,2)*depth*28.3168',
                'surface_area' => 'pi/4*pow(diameter,2)',
                'diameter' => 'sqrt(4*volume_ft3/(pi*depth))',
                'depth' => '4*volume_ft3/(pi*pow(diameter,2))',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p>A round pool is a cylinder: <strong>volume = π × (diameter ÷ 2)² × depth</strong>, and the gallons follow at 7.48 to the cubic foot.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Above-ground pools are sold by diameter and wall height, and dosed by gallons. The two are related by a circle, which is where the estimate goes wrong: a pool two feet wider holds a fifth more water for the same wall height.</p><p>The page reports <strong>volume (ft³) and volume (gal) and volume (L) and surface area</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume (ft³)</strong></td><td><code>pi ÷ 4 × (Pool diameter)^2 × Water depth</code></td></tr><tr><td><strong>Volume (gal)</strong></td><td><code>pi ÷ 4 × (Pool diameter)^2 × Water depth × 7.48052</code></td></tr><tr><td><strong>Volume (L)</strong></td><td><code>pi ÷ 4 × (Pool diameter)^2 × Water depth × 28.3168</code></td></tr><tr><td><strong>Surface area</strong></td><td><code>pi ÷ 4 × (Pool diameter)^2</code></td></tr><tr><td><strong>Pool diameter</strong></td><td><code>√(4 × Volume (ft³) ÷ (pi × Water depth))</code></td></tr><tr><td><strong>Water depth</strong></td><td><code>4 × Volume (ft³) ÷ (pi × (Pool diameter)^2)</code></td></tr></tbody></table><p><p>The diameter is squared, so the area grows much faster than the pool looks. The water depth is less than the wall height because the water sits a few inches below the top, and that difference is worth a few hundred gallons.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports volume (ft³) and volume (gal) and volume (L) and surface area.</p><ul><li><strong>Pool diameter</strong> — in ft. Across the water line</li><li><strong>Water depth</strong> — in ft. Wall height less the freeboard</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume</strong> — in ft³</li><li><strong>Volume</strong> — in gal</li><li><strong>Volume</strong> — in L</li><li><strong>Surface area</strong> — in ft²</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Pool diameter = 18 ft, Water depth = 4 ft — and the results panel reads:</p><ul><li><strong>Volume</strong> = <code>pi ÷ 4 × (Pool diameter)^2 × Water depth</code> = <strong>1 017.876 ft³</strong></li><li><strong>Volume</strong> = <code>pi ÷ 4 × (Pool diameter)^2 × Water depth × 7.48052</code> = <strong>7 614.242 gal</strong></li><li><strong>Volume</strong> = <code>pi ÷ 4 × (Pool diameter)^2 × Water depth × 28.3168</code> = <strong>28 822.992 L</strong></li><li><strong>Surface area</strong> = <code>pi ÷ 4 × (Pool diameter)^2</code> = <strong>254.469 ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pi ÷ 4 × pow(18,2) × 4 = 1 017.876</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>An 18 ft pool filled to four feet: a surface of 254.469 ft², 1 017.876 ft³ of water and 7 614.242 US gallons — about 28 822.992 litres. Filling it to the wall height instead would add another few hundred.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the gallons against the manufacturer's figure: the label on the pool usually quotes 90 per cent of the wall-height volume, which allows for the freeboard. If the two disagree by more than that, the diameter is being measured at the top rail rather than the water line.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume</th><th>Volume</th><th>Volume</th><th>Surface area</th></tr></thead><tbody><tr><td><strong>Pool diameter</strong> +10 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td></tr><tr><td><strong>Water depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Pool diameter</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Water depth</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Pool diameter = 24, Water depth = 4.5, the page reports <strong>Volume</strong> = 2 035.752 ft³, <strong>Volume</strong> = 15 228.484 gal, <strong>Volume</strong> = 57 645.983 L, <strong>Surface area</strong> = 452.389 ft². A larger round pool — the diameter squared is what makes the difference.</li><li>With Pool diameter = 12, Water depth = 3, the page reports <strong>Volume</strong> = 339.292 ft³, <strong>Volume</strong> = 2 538.081 gal, <strong>Volume</strong> = 9 607.664 L, <strong>Surface area</strong> = 113.097 ft². A paddling pool, where the arithmetic is small enough to check in your head.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Diameter entered as radius.</strong> The formula squares the diameter over four.</li><li><strong>Wall height used as depth.</strong> The water line sits below the top.</li><li><strong>Oval pools entered as round.</strong> An oval is not a circle and holds less per foot of length.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume (ft³), Volume (gal), Volume (L), Surface area (ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Diameter and depth in feet, volume in cubic feet, US gallons and litres, the surface in square feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need pool diameter and water depth. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Volume (ft³) and volume (gal) and volume (l) and surface area should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Pool diameter</strong> ×10</td><td>1 017.876</td><td>101 787.602</td><td>×100</td></tr><tr><td><strong>Water depth</strong> ×10</td><td>1 017.876</td><td>10 178.76</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A plain cylinder.</strong> A dished or hopper bottom holds more.</li><li><strong>No displacement.</strong> People, steps and equipment take up water.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Dosing an above-ground pool.</li></li><li><li>Checking a chemical chart's volume.</li></li><li><li>Sizing a filter's turnover.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/pool">Pool volume</a> <a href="/construction/tank-volume">Tank volume</a> <a href="/construction/pond">Pond</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Round pool volume calculator work out?', 'a' => <<<'TXT'
            It returns volume (ft³) and volume (gal) and volume (L) and surface area from pool diameter and water depth. The relationship is pi ÷ 4 × (Pool diameter)^2 × Water depth.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Pool diameter (ft), Water depth (ft). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: pool diameter in ft; water depth in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many gallons in an 18 ft round pool?', 'a' => 'About 7 614 US gallons at a 4 ft depth.'],
            ['q' => 'Is an oval pool the same as a round one?', 'a' => 'No — an oval holds about two thirds of the circle that encloses it at the same width.'],
        ],
        'related' => [
            ['path' => '/construction/pool', 'name' => 'Pool volume'],
            ['path' => '/construction/tank-volume', 'name' => 'Tank volume'],
            ['path' => '/construction/pond', 'name' => 'Pond'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
