<?php

/**
 * Fence cost
 * /construction/fence-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fence cost',
    'meta' => ['title' => 'Fence Cost Calculator: Materials, Labour and Gates', 'description' => 'Estimate what a fence costs installed: material at a price per foot, labour at its own rate and each gate priced separately, with the total. Units shown.', 'h1' => 'Fence cost', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Fence length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '120',
                    'help' => 'Total run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price_per_ft',
                    'label' => 'Material price',
                    'type' => 'number',
                    'suffix' => '$/ft',
                    'default' => '22',
                    'help' => 'Fence and fixings per foot',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'labour_per_ft',
                    'label' => 'Labour price',
                    'type' => 'number',
                    'suffix' => '$/ft',
                    'default' => '9',
                    'help' => 'Installation per foot',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gates',
                    'label' => 'Gates',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Number of gates',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gate_price',
                    'label' => 'Gate price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '250',
                    'help' => 'Each gate, fitted',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'material',
                    'label' => 'Material',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'labour',
                    'label' => 'Labour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'gates_cost',
                    'label' => 'Gates',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'total',
                    'label' => 'Total',
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
            'title' => 'Fence cost',
            'results' => [
                'material' => 'length*price_per_ft',
                'labour' => 'length*labour_per_ft',
                'gates_cost' => 'gates*gate_price',
                'total' => 'length*price_per_ft+length*labour_per_ft+gates*gate_price',
                'length' => 'material/price_per_ft',
                'price_per_ft' => 'material/length',
                'labour_per_ft' => 'labour/length',
                'gate_price' => 'gates_cost/gates',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Total = length × material rate + length × labour rate + gates × gate price.</strong></p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Fence quotes are usually given as a price per linear foot, which hides the split between material and labour and hides the gates entirely. Pulling the three parts apart makes a quote comparable and shows where a cheaper fence actually saves money.</p><p>The page reports <strong>material and labour and gates and total</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Material</strong></td><td><code>Fence length × Material price</code></td></tr><tr><td><strong>Labour</strong></td><td><code>Fence length × Labour price</code></td></tr><tr><td><strong>Gates</strong></td><td><code>Gates × Gate price</code></td></tr><tr><td><strong>Total</strong></td><td><code>Fence length × Material price+Fence length × Labour price+Gates × Gate price</code></td></tr><tr><td><strong>Fence length</strong></td><td><code>Material ÷ Material price</code></td></tr><tr><td><strong>Material price</strong></td><td><code>Material ÷ Fence length</code></td></tr><tr><td><strong>Labour price</strong></td><td><code>Labour ÷ Fence length</code></td></tr><tr><td><strong>Gate price</strong></td><td><code>Gates ÷ Gates</code></td></tr></tbody></table><p><p>Material and labour both scale with the run, so each is a rate per foot multiplied by the length. Gates do not scale with length — they are a fixed charge per gate, and on a short run they can be the largest single line.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports material and labour and gates and total.</p><ul><li><strong>Fence length</strong> — in ft. Total run</li><li><strong>Material price</strong> — in $/ft. Fence and fixings per foot</li><li><strong>Labour price</strong> — in $/ft. Installation per foot</li><li><strong>Gates</strong>. Number of gates</li><li><strong>Gate price</strong> — in $. Each gate, fitted</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Material</strong> — in $</li><li><strong>Labour</strong> — in $</li><li><strong>Gates</strong> — in $</li><li><strong>Total</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Fence length = 120 ft, Material price = 22 $/ft, Labour price = 9 $/ft, Gates = 1, Gate price = 250 $ — and the results panel reads:</p><ul><li><strong>Material</strong> = <code>Fence length × Material price</code> = <strong>2 640 $</strong></li><li><strong>Labour</strong> = <code>Fence length × Labour price</code> = <strong>1 080 $</strong></li><li><strong>Gates</strong> = <code>Gates × Gate price</code> = <strong>250 $</strong></li><li><strong>Total</strong> = <code>Fence length × Material price+Fence length × Labour price+Gates × Gate price</code> = <strong>3 970 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>120 × 22 = 2 640</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 120 ft run at 22/ft of material and 9/ft of labour is 2 640 plus 1 080, with 1 gate costing 250. The installed total is 3 970.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read labour as a share of the total. Under a third and the job is mostly material, which is normal for a simple run on flat ground; over half means the fence is being installed in difficult ground or at height.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Material</th><th>Labour</th><th>Gates</th><th>Total</th></tr></thead><tbody><tr><td><strong>Fence length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+9.37 %</td></tr><tr><td><strong>Material price</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+6.65 %</td></tr><tr><td><strong>Labour price</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+2.72 %</td></tr><tr><td><strong>Gates</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0.63 %</td></tr><tr><td><strong>Gate price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0.63 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Material price</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Gate price</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Fence length = 60, Gates = 2, the page reports <strong>Material</strong> = 1 320 $, <strong>Labour</strong> = 540 $, <strong>Gates</strong> = 500 $, <strong>Total</strong> = 2 360 $. A short run with two gates: the gates become a large share.</li><li>With Fence length = 300, Material price = 30, Labour price = 12, the page reports <strong>Material</strong> = 9 000 $, <strong>Labour</strong> = 3 600 $, <strong>Gates</strong> = 250 $, <strong>Total</strong> = 12 850 $. An acreage boundary in a heavier fence.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Quotes that exclude gates.</strong> Ask for the gate line separately.</li><li><strong>Cheap material, dear labour.</strong> A kit fence can cost more to fit.</li><li><strong>No allowance for removal.</strong> Old fence disposal is a real charge.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Material ($), Labour ($), Gates ($), Total ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length in feet, rates in dollars per foot, gates priced each.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need fence length and material price and labour price and gates and gate price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Material and labour and gates and total should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Fence length</strong> ×10</td><td>2 640</td><td>26 400</td><td>ten times larger</td></tr><tr><td><strong>Material price</strong> ×10</td><td>2 640</td><td>26 400</td><td>ten times larger</td></tr><tr><td><strong>Labour price</strong> ×10</td><td>2 640</td><td>2 640</td><td>unchanged</td></tr><tr><td><strong>Gates</strong> ×10</td><td>2 640</td><td>2 640</td><td>unchanged</td></tr><tr><td><strong>Gate price</strong> ×10</td><td>2 640</td><td>2 640</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>No ground conditions.</strong> Rock and slope are extra.</li><li><strong>Straight runs.</strong> Corners add posts and labour.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Comparing two fencing quotes.</li></li><li><li>Budgeting for gates and panels.</li></li><li><li>Deciding whether to install yourself.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/fence">Fence</a> <a href="/construction/fence-estimate">Fence estimate</a> <a href="/construction/vinyl-fence-cost">Vinyl fence cost</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fence cost calculator work out?', 'a' => <<<'TXT'
            It returns material and labour and gates and total from fence length and material price and labour price and gates and gate price. The relationship is Fence length × Material price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Fence length (ft), Material price ($/ft), Labour price ($/ft), Gates, Gate price ($). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: fence length in ft; material price in $/ft; labour price in $/ft; gate price in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does a fence cost per foot?', 'a' => 'Material plus labour, so the two rates on this form added together.'],
            ['q' => 'Are gates included in a per foot price?', 'a' => 'Usually not, which is why they are a separate field here.'],
        ],
        'related' => [
            ['path' => '/construction/fence', 'name' => 'Fence'],
            ['path' => '/construction/fence-estimate', 'name' => 'Fence estimate'],
            ['path' => '/construction/vinyl-fence-cost', 'name' => 'Vinyl fence cost'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
