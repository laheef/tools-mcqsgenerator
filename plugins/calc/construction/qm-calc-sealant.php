<?php

/**
 * Sealant
 * /construction/sealant
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sealant',
    'meta' => ['title' => 'Sealant Calculator: Tubes for a Joint Run Tool', 'description' => 'Work out how many tubes or cartridges of sealant a run of joints takes from the joint size, tube volume and wastage, with the cost of the batch. Units shown.', 'h1' => 'Sealant', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Joint length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '60',
                    'help' => 'Total run to be sealed',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Joint width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.375',
                    'help' => 'The gap',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Joint depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.25',
                    'help' => 'Sealant thickness',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tube',
                    'label' => 'Tube volume',
                    'type' => 'number',
                    'suffix' => 'mL',
                    'default' => '310',
                    'help' => '310 mL cartridge, 600 mL sausage',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Wastage',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Gun waste and spoil',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per tube',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '12',
                    'help' => 'Delivered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_ml',
                    'label' => 'Sealant volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mL',
                ],
                [
                    'name' => 'tubes',
                    'label' => 'Tubes needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Sealant',
            'results' => [
                'volume_ml' => 'length*12*width*depth*16.3871',
                'tubes' => 'ceil(length*12*width*depth*16.3871*(1+waste/100)/tube)',
                'cost' => 'ceil(length*12*width*depth*16.3871*(1+waste/100)/tube)*price',
                'length' => 'volume_ml/(12*width*depth*16.3871)',
                'width' => 'volume_ml/(length*12*depth*16.3871)',
                'depth' => 'volume_ml/(length*12*width*16.3871)',
                'price' => 'cost/tubes',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Volume = length × width × depth</strong>, then <strong>tubes = ceiling(volume × (1 + waste) ÷ tube volume)</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Sealant is cheap per tube and annoying to run out of: a joint half-sealed while you drive to the shop is a joint that has to be redone. The volume of a joint is smaller than it looks — a sixty-foot run at three eighths by a quarter is a bit over a litre — so the arithmetic is worth doing before the trip.</p><p>The page reports <strong>sealant volume and tubes needed and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Sealant volume</strong></td><td><code>Joint length × 12 × Joint width × Joint depth × 16.3871</code></td></tr><tr><td><strong>Tubes needed</strong></td><td><code>ceil(Joint length × 12 × Joint width × Joint depth × 16.3871 × (1+Wastage ÷ 100) ÷ Tube volume)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(Joint length × 12 × Joint width × Joint depth × 16.3871 × (1+Wastage ÷ 100) ÷ Tube volume) × Price per tube</code></td></tr><tr><td><strong>Joint length</strong></td><td><code>Sealant volume ÷ (12 × Joint width × Joint depth × 16.3871)</code></td></tr><tr><td><strong>Joint width</strong></td><td><code>Sealant volume ÷ (Joint length × 12 × Joint depth × 16.3871)</code></td></tr><tr><td><strong>Joint depth</strong></td><td><code>Sealant volume ÷ (Joint length × 12 × Joint width × 16.3871)</code></td></tr><tr><td><strong>Price per tube</strong></td><td><code>Cost ÷ Tubes needed</code></td></tr></tbody></table><p><p>The joint is treated as a rectangular slot: length times width times depth, with the length converted from feet to inches and the result converted from cubic inches to millilitres at 16.39. The tube count rounds up, because half a tube is no use.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports sealant volume and tubes needed and cost.</p><ul><li><strong>Joint length</strong> — in ft. Total run to be sealed</li><li><strong>Joint width</strong> — in in. The gap</li><li><strong>Joint depth</strong> — in in. Sealant thickness</li><li><strong>Tube volume</strong> — in mL. 310 mL cartridge, 600 mL sausage</li><li><strong>Wastage</strong> — in %. Gun waste and spoil</li><li><strong>Price per tube</strong> — in $. Delivered</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Sealant volume</strong> — in mL</li><li><strong>Tubes needed</strong></li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Joint length = 60 ft, Joint width = 0.375 in, Joint depth = 0.25 in, Tube volume = 310 mL, Wastage = 10 %, Price per tube = 12 $ — and the results panel reads:</p><ul><li><strong>Sealant volume</strong> = <code>Joint length × 12 × Joint width × Joint depth × 16.3871</code> = <strong>1 106.129 mL</strong></li><li><strong>Tubes needed</strong> = <code>ceil(Joint length × 12 × Joint width × Joint depth × 16.3871 × (1+Wastage ÷ 100) ÷ Tube volume)</code> = <strong>4</strong></li><li><strong>Cost</strong> = <code>ceil(Joint length × 12 × Joint width × Joint depth × 16.3871 × (1+Wastage ÷ 100) ÷ Tube volume) × Price per tube</code> = <strong>48 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>60 × 12 × 0.375 × 0.25 × 16.3871 = 1 106.129</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Sixty feet of joint at 3/8 by 1/4 in holds 1 106.129 mL of sealant, or 4 cartridges of 310 mL once wastage is allowed. At $12 a tube that is 48, which is the sort of price that makes a backer rod worthwhile.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the tubes against the volume: a 310 mL cartridge holds a little over a third of a litre. If a small run is asking for ten tubes, the joint depth has probably been entered in the wrong unit.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Sealant volume</th><th>Tubes needed</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Joint length</strong> +10 %</td><td>+10 %</td><td>+25 %</td><td>+25 %</td></tr><tr><td><strong>Joint width</strong> +10 %</td><td>+10 %</td><td>+25 %</td><td>+25 %</td></tr><tr><td><strong>Joint depth</strong> +10 %</td><td>+10 %</td><td>+25 %</td><td>+25 %</td></tr><tr><td><strong>Tube volume</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Wastage</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Price per tube</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Joint length</strong>: a ten per cent move there shifts the result by about 25 per cent. The least sensitive is <strong>Wastage</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Joint length = 200, Joint width = 0.5, Joint depth = 0.375, Tube volume = 600, Wastage = 15, Price per tube = 18, the page reports <strong>Sealant volume</strong> = 7 374.195 mL, <strong>Tubes needed</strong> = 15, <strong>Cost</strong> = 270 $. A long expansion joint in sausage packs: bigger joints, fewer packs.</li><li>With Joint length = 20, Joint width = 0.25, Joint depth = 0.25, Tube volume = 310, Wastage = 5, Price per tube = 9, the page reports <strong>Sealant volume</strong> = 245.806 mL, <strong>Tubes needed</strong> = 1, <strong>Cost</strong> = 9 $. A small window run where one tube covers the job.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Joint depth over-filled.</strong> Sealant needs a backer and a correct depth to stretch.</li><li><strong>Wastage left at zero.</strong> A gun always leaves some in the tube.</li><li><strong>Tube volume guessed.</strong> A sausage is 600 mL, a cartridge 310.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Sealant volume (mL), Tubes needed, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Joint length in feet, width and depth in inches, volume in millilitres, tube count as whole tubes, wastage as a percentage and cost in dollars.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need joint length and joint width and joint depth and tube volume and wastage and price per tube. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Sealant volume and tubes needed and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Joint length</strong> ×10</td><td>1 106.129</td><td>11 061.292</td><td>ten times larger</td></tr><tr><td><strong>Joint width</strong> ×10</td><td>1 106.129</td><td>11 061.293</td><td>ten times larger</td></tr><tr><td><strong>Joint depth</strong> ×10</td><td>1 106.129</td><td>11 061.292</td><td>ten times larger</td></tr><tr><td><strong>Tube volume</strong> ×10</td><td>1 106.129</td><td>1 106.129</td><td>unchanged</td></tr><tr><td><strong>Wastage</strong> ×10</td><td>1 106.129</td><td>1 106.129</td><td>unchanged</td></tr><tr><td><strong>Price per tube</strong> ×10</td><td>1 106.129</td><td>1 106.129</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A rectangular joint.</strong> A fillet uses less, a deep gap needs a backer.</li><li><strong>No movement allowance.</strong> Joint design is a separate question.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying sealant for a run of joints.</li></li><li><li>Comparing cartridges with sausages.</li></li><li><li>Pricing a sealing job.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/thinset">Thinset</a> <a href="/construction/mortar">Mortar</a> <a href="/construction/grout">Grout</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sealant calculator work out?', 'a' => <<<'TXT'
            It returns sealant volume and tubes needed and cost from joint length and joint width and joint depth and tube volume and wastage and price per tube. The relationship is Joint length × 12 × Joint width × Joint depth × 16.3871.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Joint length (ft), Joint width (in), Joint depth (in), Tube volume (mL), Wastage (%), Price per tube ($). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: joint length in ft; joint width in in; joint depth in in; tube volume in mL; wastage in %; price per tube in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many tubes of sealant for 60 feet of joint?', 'a' => 'About four 310 mL cartridges at 3/8 by 1/4 in with ten per cent wastage.'],
            ['q' => 'How much sealant is in a cartridge?', 'a' => '310 mL in a standard cartridge and 600 mL in a sausage.'],
        ],
        'related' => [
            ['path' => '/construction/thinset', 'name' => 'Thinset'],
            ['path' => '/construction/mortar', 'name' => 'Mortar'],
            ['path' => '/construction/grout', 'name' => 'Grout'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
