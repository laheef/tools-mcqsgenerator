<?php

/**
 * Vinyl fence cost
 * /construction/vinyl-fence-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vinyl fence cost',
    'meta' => ['title' => 'Vinyl Fence Cost Calculator: Sections, Posts, Labour', 'description' => 'Add up an installed vinyl fence: sections and posts at their prices, gates as a fixed charge, and labour at a rate per foot of run. The formula is shown.', 'h1' => 'Vinyl fence cost', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Fence length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '100',
                    'help' => 'Straight run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'section_price',
                    'label' => 'Section price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '65',
                    'help' => 'Panel and rails',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'post_price',
                    'label' => 'Post price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '25',
                    'help' => 'Each post',
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
                    'default' => '350',
                    'help' => 'Each gate fitted',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'labour_per_ft',
                    'label' => 'Labour price',
                    'type' => 'number',
                    'suffix' => '$/ft',
                    'default' => '8',
                    'help' => 'Installation per foot',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sections',
                    'label' => 'Sections',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'posts',
                    'label' => 'Posts',
                    'type' => 'number',
                    'readonly' => true,
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
            'title' => 'Vinyl fence cost',
            'results' => [
                'sections' => 'ceil(length/8)',
                'posts' => 'ceil(length/8)+1',
                'material' => 'ceil(length/8)*section_price+(ceil(length/8)+1)*post_price+gates*gate_price',
                'labour' => 'length*labour_per_ft',
                'total' => 'ceil(length/8)*section_price+(ceil(length/8)+1)*post_price+gates*gate_price+length*labour_per_ft',
                'length' => 'material/(section_price+labour_per_ft)',
                'section_price' => '(material-(ceil(length/8)+1)*post_price-gates*gate_price)/ceil(length/8)',
                'gate_price' => '(material-ceil(length/8)*section_price-(ceil(length/8)+1)*post_price)/gates',
                'labour_per_ft' => 'labour/length',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>Sections = length ÷ 8</strong>; <strong>total = sections × section price + posts × post price + gates × gate price + length × labour rate</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Vinyl is usually quoted as an installed price, and the quote bundles a section price, a post price, the gates and a labour rate. Separating them shows what a change of panel or a second gate actually costs.</p><p>The page reports <strong>sections and posts and material and labour and total</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Sections</strong></td><td><code>ceil(Fence length ÷ 8)</code></td></tr><tr><td><strong>Posts</strong></td><td><code>ceil(Fence length ÷ 8)+1</code></td></tr><tr><td><strong>Material</strong></td><td><code>ceil(Fence length ÷ 8) × Section price+(ceil(Fence length ÷ 8)+1) × Post price+Gates × Gate price</code></td></tr><tr><td><strong>Labour</strong></td><td><code>Fence length × Labour price</code></td></tr><tr><td><strong>Total</strong></td><td><code>ceil(Fence length ÷ 8) × Section price+(ceil(Fence length ÷ 8)+1) × Post price+Gates × Gate price+Fence length × Labour price</code></td></tr><tr><td><strong>Fence length</strong></td><td><code>Material ÷ (Section price+Labour price)</code></td></tr><tr><td><strong>Section price</strong></td><td><code>(Material-(ceil(Fence length ÷ 8)+1) × Post price-Gates × Gate price) ÷ ceil(Fence length ÷ 8)</code></td></tr><tr><td><strong>Gate price</strong></td><td><code>(Material-ceil(Fence length ÷ 8) × Section price-(ceil(Fence length ÷ 8)+1) × Post price) ÷ Gates</code></td></tr><tr><td><strong>Labour price</strong></td><td><code>Labour ÷ Fence length</code></td></tr></tbody></table><p><p>Sections are counted at eight foot nominal width because that is what vinyl panels are made in. Material is sections plus posts plus gates; labour is a rate per foot of the whole run, which does not care how the sections divide.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports sections and posts and material and labour and total.</p><ul><li><strong>Fence length</strong> — in ft. Straight run</li><li><strong>Section price</strong> — in $. Panel and rails</li><li><strong>Post price</strong> — in $. Each post</li><li><strong>Gates</strong>. Number of gates</li><li><strong>Gate price</strong> — in $. Each gate fitted</li><li><strong>Labour price</strong> — in $/ft. Installation per foot</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Sections</strong></li><li><strong>Posts</strong></li><li><strong>Material</strong> — in $</li><li><strong>Labour</strong> — in $</li><li><strong>Total</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Fence length = 100 ft, Section price = 65 $, Post price = 25 $, Gates = 1, Gate price = 350 $, Labour price = 8 $/ft — and the results panel reads:</p><ul><li><strong>Sections</strong> = <code>ceil(Fence length ÷ 8)</code> = <strong>13</strong></li><li><strong>Posts</strong> = <code>ceil(Fence length ÷ 8)+1</code> = <strong>14</strong></li><li><strong>Material</strong> = <code>ceil(Fence length ÷ 8) × Section price+(ceil(Fence length ÷ 8)+1) × Post price+Gates × Gate price</code> = <strong>1 545 $</strong></li><li><strong>Labour</strong> = <code>Fence length × Labour price</code> = <strong>800 $</strong></li><li><strong>Total</strong> = <code>ceil(Fence length ÷ 8) × Section price+(ceil(Fence length ÷ 8)+1) × Post price+Gates × Gate price+Fence length × Labour price</code> = <strong>2 345 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(100 ÷ 8) = 13</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>21.164 ft at 365 a section and 25 a post is 13 sections and 14 posts, so 1 545 of material. Labour at 37.799/ft adds 800, for 2 345 installed.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read labour as a share of the total. Vinyl is a heavy material to handle, so labour usually runs between a quarter and a third of an installed price. Well under that suggests a quote that has forgotten the digging.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Sections</th><th>Posts</th><th>Material</th><th>Labour</th><th>Total</th></tr></thead><tbody><tr><td><strong>Fence length</strong> +10 %</td><td>−76.92 %</td><td>−71.43 %</td><td>−58.25 %</td><td>−76.72 %</td><td>−64.55 %</td></tr><tr><td><strong>Section price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+283.14 %</td><td>+0 %</td><td>+186.55 %</td></tr><tr><td><strong>Post price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+2.27 %</td><td>+0 %</td><td>+1.49 %</td></tr><tr><td><strong>Gates</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+2.27 %</td><td>+0 %</td><td>+1.49 %</td></tr><tr><td><strong>Gate price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+2.27 %</td><td>+0 %</td><td>+1.49 %</td></tr><tr><td><strong>Labour price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+419.74 %</td><td>+143.2 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Labour price</strong>: a ten per cent move there shifts the result by about 419.7 per cent. The least sensitive is <strong>Gate price</strong>, at 2.3 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Fence length = 60, Gates = 2, Gate price = 400, the page reports <strong>Sections</strong> = 8, <strong>Posts</strong> = 9, <strong>Material</strong> = 1 545 $, <strong>Labour</strong> = 480 $, <strong>Total</strong> = 2 025 $. A short run where the gates dominate the bill.</li><li>With Fence length = 240, Labour price = 10, the page reports <strong>Sections</strong> = 30, <strong>Posts</strong> = 31, <strong>Material</strong> = 3 075 $, <strong>Labour</strong> = 2 400 $, <strong>Total</strong> = 5 475 $. A long boundary with a higher labour rate.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Gates bundled into the section price.</strong> They are a separate charge.</li><li><strong>Posts assumed in the section.</strong> They are not.</li><li><strong>Removal of an old fence.</strong> Always an extra.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Sections, Posts, Material ($), Labour ($), Total ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length in feet, prices per section, per post and per gate, labour in dollars per foot.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need fence length and section price and post price and gates and gate price and labour price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Sections and posts and material and labour and total should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Fence length</strong> ×10</td><td>13</td><td>27</td><td>×2.077</td></tr><tr><td><strong>Section price</strong> ×10</td><td>13</td><td>13</td><td>unchanged</td></tr><tr><td><strong>Post price</strong> ×10</td><td>13</td><td>13</td><td>unchanged</td></tr><tr><td><strong>Gates</strong> ×10</td><td>13</td><td>13</td><td>unchanged</td></tr><tr><td><strong>Gate price</strong> ×10</td><td>13</td><td>13</td><td>unchanged</td></tr><tr><td><strong>Labour price</strong> ×10</td><td>13</td><td>13</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Fixed section width.</strong> Custom widths change the count.</li><li><strong>No permit or survey costs.</strong></li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Comparing vinyl with timber quotes.</li></li><li><li>Budgeting for a second gate.</li></li><li><li>Checking an installed price per foot.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/vinyl-fence">Vinyl fence</a> <a href="/construction/fence-cost">Fence cost</a> <a href="/construction/fence">Fence</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Vinyl fence cost calculator work out?', 'a' => <<<'TXT'
            It returns sections and posts and material and labour and total from fence length and section price and post price and gates and gate price and labour price. The relationship is ceil(Fence length ÷ 8).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Fence length (ft), Section price ($), Post price ($), Gates, Gate price ($), Labour price ($/ft). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: fence length in ft; section price in $; post price in $; gate price in $; labour price in $/ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What does an installed vinyl fence cost per foot?', 'a' => 'Add the material and labour columns, then divide by the length — that is the rate to compare.'],
            ['q' => 'How many sections in 100 feet?', 'a' => 'Thirteen, rounded up from twelve and a half, with fourteen posts.'],
        ],
        'related' => [
            ['path' => '/construction/vinyl-fence', 'name' => 'Vinyl fence'],
            ['path' => '/construction/fence-cost', 'name' => 'Fence cost'],
            ['path' => '/construction/fence', 'name' => 'Fence'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
