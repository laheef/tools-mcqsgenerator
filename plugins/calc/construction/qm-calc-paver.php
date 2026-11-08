<?php

/**
 * Paver
 * /construction/paver
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Paver',
    'meta' => ['title' => 'Paver Calculator: Blocks, Sand and Cost Tool', 'description' => 'Work out how many pavers a patio needs from its area and the block size, with the joint, a waste allowance and the price per block. The formula is shown.', 'h1' => 'Paver', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Patio length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '16',
                    'help' => 'Being paved',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Patio width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Across it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'paver_length',
                    'label' => 'Paver length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '8',
                    'help' => 'Nominal block size',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'paver_width',
                    'label' => 'Paver width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'help' => 'Nominal block size',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'joint',
                    'label' => 'Joint width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.125',
                    'help' => 'Sand joint',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Waste',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Cuts and breakage',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per paver',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '1.4',
                    'help' => 'Delivered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area_ft2',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'module_ft2',
                    'label' => 'Paver module',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'pavers',
                    'label' => 'Pavers',
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
            'title' => 'Paver',
            'results' => [
                'area_ft2' => 'length*width',
                'module_ft2' => '(paver_length+joint)*(paver_width+joint)/144',
                'pavers' => 'ceil(length*width*(1+waste/100)/((paver_length+joint)*(paver_width+joint)/144))',
                'cost' => 'ceil(length*width*(1+waste/100)/((paver_length+joint)*(paver_width+joint)/144))*price',
                'length' => 'area_ft2/width',
                'width' => 'area_ft2/length',
                'paver_length' => 'module_ft2*144/(paver_width+joint)-joint',
                'paver_width' => 'module_ft2*144/(paver_length+joint)-joint',
                'price' => 'cost/pavers',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Pavers = ceiling(area × (1 + waste) ÷ module)</strong>, where the module is the block plus its joint, and the cost follows from the count.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Pavers are sold by the piece and laid on a pattern, and the count depends on the joint as much as the block: a 4 by 8 block with an eighth-inch joint covers a little over a third of a square foot, so a hundred square feet is near 280 blocks.</p><p>The page reports <strong>area and paver module and pavers and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area</strong></td><td><code>Patio length × Patio width</code></td></tr><tr><td><strong>Paver module</strong></td><td><code>(Paver length+Joint width) × (Paver width+Joint width) ÷ 144</code></td></tr><tr><td><strong>Pavers</strong></td><td><code>ceil(Patio length × Patio width × (1+Waste ÷ 100) ÷ ((Paver length+Joint width) × (Paver width+Joint width) ÷ 144))</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(Patio length × Patio width × (1+Waste ÷ 100) ÷ ((Paver length+Joint width) × (Paver width+Joint width) ÷ 144)) × Price per paver</code></td></tr><tr><td><strong>Patio length</strong></td><td><code>Area ÷ Patio width</code></td></tr><tr><td><strong>Patio width</strong></td><td><code>Area ÷ Patio length</code></td></tr><tr><td><strong>Paver length</strong></td><td><code>Paver module × 144 ÷ (Paver width+Joint width)-Joint width</code></td></tr><tr><td><strong>Paver width</strong></td><td><code>Paver module × 144 ÷ (Paver length+Joint width)-Joint width</code></td></tr><tr><td><strong>Price per paver</strong></td><td><code>Cost ÷ Pavers</code></td></tr></tbody></table><p><p>The joint is added to both sides of every block, which is what makes the grid close. The waste allowance then covers the edge cuts, and since pavers are bought by the piece rather than the pallet, the count rounds up once.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs. It reports area and paver module and pavers and cost.</p><ul><li><strong>Patio length</strong> — in ft. Being paved</li><li><strong>Patio width</strong> — in ft. Across it</li><li><strong>Paver length</strong> — in in. Nominal block size</li><li><strong>Paver width</strong> — in in. Nominal block size</li><li><strong>Joint width</strong> — in in. Sand joint</li><li><strong>Waste</strong> — in %. Cuts and breakage</li><li><strong>Price per paver</strong> — in $. Delivered</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in ft²</li><li><strong>Paver module</strong> — in ft²</li><li><strong>Pavers</strong></li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Patio length = 16 ft, Patio width = 12 ft, Paver length = 8 in, Paver width = 4 in, Joint width = 0.125 in, Waste = 10 %, Price per paver = 1.4 $ — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Patio length × Patio width</code> = <strong>192 ft²</strong></li><li><strong>Paver module</strong> = <code>(Paver length+Joint width) × (Paver width+Joint width) ÷ 144</code> = <strong>0.233 ft²</strong></li><li><strong>Pavers</strong> = <code>ceil(Patio length × Patio width × (1+Waste ÷ 100) ÷ ((Paver length+Joint width) × (Paver width+Joint width) ÷ 144))</code> = <strong>908</strong></li><li><strong>Cost</strong> = <code>ceil(Patio length × Patio width × (1+Waste ÷ 100) ÷ ((Paver length+Joint width) × (Paver width+Joint width) ÷ 144)) × Price per paver</code> = <strong>1 271.2 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>16 × 12 = 192</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 16 by 12 ft patio is 192 ft². In 4 by 8 blocks with an eighth-inch joint each module is 0.233 ft², so the job takes 908 pavers and 1 271.2 at $1.40 each.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the count against the area: 4 by 8 pavers work out near 2.8 per square foot, and 12 in squares near one. A count far above that means the block size has been entered in centimetres.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Paver module</th><th>Pavers</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Patio length</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10.02 %</td><td>+10.02 %</td></tr><tr><td><strong>Patio width</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10.02 %</td><td>+10.02 %</td></tr><tr><td><strong>Paver length</strong> +10 %</td><td>+0 %</td><td>+9.85 %</td><td>−8.92 %</td><td>−8.92 %</td></tr><tr><td><strong>Paver width</strong> +10 %</td><td>+0 %</td><td>+9.7 %</td><td>−8.81 %</td><td>−8.81 %</td></tr><tr><td><strong>Joint width</strong> +10 %</td><td>+0 %</td><td>+0.46 %</td><td>−0.44 %</td><td>−0.44 %</td></tr><tr><td><strong>Waste</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0.88 %</td><td>+0.88 %</td></tr><tr><td><strong>Price per paver</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Patio length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Joint width</strong>, at 0.5 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Patio length = 20, Patio width = 14, Paver length = 12, Paver width = 12, Joint width = 0.125, Waste = 8, Price per paver = 3.2, the page reports <strong>Area</strong> = 280 ft², <strong>Paver module</strong> = 1.021 ft², <strong>Pavers</strong> = 297, <strong>Cost</strong> = 950.4 $. Large square pavers: a quarter of the pieces at twice the price.</li><li>With Patio length = 30, Patio width = 10, Paver length = 8, Paver width = 4, Joint width = 0.125, Waste = 15, Price per paver = 1.1, the page reports <strong>Area</strong> = 300 ft², <strong>Paver module</strong> = 0.233 ft², <strong>Pavers</strong> = 1 483, <strong>Cost</strong> = 1 631.3 $. A long path with a lot of cutting: the waste allowance climbs.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Joint left out.</strong> The sand joint is part of the module.</li><li><strong>Waste too low.</strong> A curved edge can waste twenty per cent.</li><li><strong>Bedding sand forgotten.</strong> It is a separate calculation.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (ft²), Paver module (ft²), Pavers, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Patio dimensions in feet, paver size and joint in inches, module in square feet, pavers as a whole count and cost in dollars.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need patio length and patio width and paver length and paver width and joint width and waste and price per paver. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Area and paver module and pavers and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Patio length</strong> ×10</td><td>192</td><td>1 920</td><td>ten times larger</td></tr><tr><td><strong>Patio width</strong> ×10</td><td>192</td><td>1 920</td><td>ten times larger</td></tr><tr><td><strong>Paver length</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Paver width</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Joint width</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Waste</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Price per paver</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A rectangular area.</strong> Circles and curves need a layout drawing.</li><li><strong>Pavers only.</strong> Base, bedding sand and edging are extra.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering pavers for a patio.</li></li><li><li>Comparing block sizes by count.</li></li><li><li>Pricing a paving job.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/paver-sand">Paver sand</a> <a href="/construction/tile">Tile</a> <a href="/construction/asphalt">Asphalt</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Paver calculator work out?', 'a' => <<<'TXT'
            It returns area and paver module and pavers and cost from patio length and patio width and paver length and paver width and joint width and waste and price per paver. The relationship is Patio length × Patio width.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Patio length (ft), Patio width (ft), Paver length (in), Paver width (in), Joint width (in), Waste (%), Price per paver ($). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: patio length in ft; patio width in ft; paver length in in; paver width in in; joint width in in; waste in %; price per paver in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many pavers in a square foot?', 'a' => 'About 2.8 for a 4 by 8 block with a sand joint, and one for a 12 in square.'],
            ['q' => 'How much waste should I allow for pavers?', 'a' => 'Ten per cent for a straight layout and fifteen for a curved one.'],
        ],
        'related' => [
            ['path' => '/construction/paver-sand', 'name' => 'Paver sand'],
            ['path' => '/construction/tile', 'name' => 'Tile'],
            ['path' => '/construction/asphalt', 'name' => 'Asphalt'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
