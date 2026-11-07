<?php

/**
 * Feed Conversion Ratio Calculator
 * /biology/feed-conversion-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Feed Conversion Ratio Calculator',
    'meta' => ['title' => 'Feed Conversion Ratio Calculator — Formula & Results', 'description' => 'Feed Conversion Ratio works out Feed conversion ratio and Feed efficiency (gain per kg feed) from Feed offered, Starting weight and Finishing weight.', 'h1' => 'Feed Conversion Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'feed',
                            'label' => 'Feed offered',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'help' => 'Total over the period',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1200',
                        ],
                        [
                            'name' => 'start',
                            'label' => 'Starting weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'end',
                            'label' => 'Finishing weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '105',
                        ],
                        [
                            'name' => 'deaths',
                            'label' => 'Animals lost',
                            'type' => 'number',
                            'suffix' => 'head',
                            'help' => 'Their feed was still consumed',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'price',
                            'label' => 'Feed price',
                            'type' => 'number',
                            'suffix' => 'per kg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.42',
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Target FCR',
                            'type' => 'number',
                            'help' => 'What a good herd achieves',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.6',
                        ],
                        [
                            'name' => 'fcr',
                            'label' => 'Feed conversion ratio',
                            'type' => 'number',
                            'suffix' => 'kg/kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'efficiency',
                            'label' => 'Feed efficiency (gain per kg feed)',
                            'type' => 'number',
                            'suffix' => 'kg/kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_gain',
                            'label' => 'Total liveweight gain',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cost',
                            'label' => 'Feed cost per kg of gain',
                            'type' => 'number',
                            'suffix' => 'per kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'feed_per_head',
                            'label' => 'Feed per surviving animal',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'target_feed',
                            'label' => 'Feed the target FCR would need',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Conversion',
            'results' => [
                'total_gain' => 'max(0,end-start)',
                'fcr' => 'feed/max(0.0001,end-start)',
                'efficiency' => 'max(0,end-start)/max(0.0001,feed)',
                'cost' => 'price*feed/max(0.0001,end-start)',
                'feed_per_head' => 'feed/max(1,100-deaths)*100',
                'target_feed' => 'max(0,end-start)*target',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Feed Conversion Ratio works out Feed conversion ratio and Feed efficiency (gain per kg feed) from Feed offered, Starting weight and Finishing weight. Nothing is looked up on this page: Feed conversion ratio is computed from Feed offered and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Feed conversion ratio is opened in kg/kg; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Feed Conversion Ratio calculator works', 'html' => <<<'TXT'
            <p>Feed Conversion Ratio answers one question from 6 numbers, and the answer is Feed conversion ratio, Feed efficiency (gain per kg feed) and Total liveweight gain.</p><p>The relationship it solves reads Total liveweight gain = max(0,Finishing weight − Starting weight).</p><p>The result panel carries Feed conversion ratio, Feed efficiency (gain per kg feed), Total liveweight gain and Feed cost per kg of gain, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>Feed offered</strong> — in kg. Total over the period</li><li><strong>Starting weight</strong> — in kg</li><li><strong>Finishing weight</strong> — in kg</li><li><strong>Animals lost</strong> — in head. Their feed was still consumed</li><li><strong>Feed price</strong> — in per kg</li><li><strong>Target FCR</strong> — a plain number, no unit. What a good herd achieves</li></ul><p>What you get back is Feed conversion ratio in kg/kg, Feed efficiency (gain per kg feed) in kg/kg, Total liveweight gain in kg, Feed cost per kg of gain in per kg, Feed per surviving animal in kg, Feed the target FCR would need in kg, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Feed offered = 1200 kg, Starting weight = 30 kg, Finishing weight = 105 kg, Animals lost = 6 head, Feed price = 0.42 per kg and Target FCR = 2.6 gives &lt;strong&gt;Total liveweight gain&lt;/strong&gt; = 75 kg, &lt;strong&gt;Feed conversion ratio&lt;/strong&gt; = 16 kg/kg, &lt;strong&gt;Feed efficiency (gain per kg feed)&lt;/strong&gt; = 0.0625 kg/kg, &lt;strong&gt;Feed cost per kg of gain&lt;/strong&gt; = 6.72 per kg, &lt;strong&gt;Feed per surviving animal&lt;/strong&gt; = 1277 kg and &lt;strong&gt;Feed the target FCR would need&lt;/strong&gt; = 195 kg.</p><ul><li><strong>Total liveweight gain</strong> = 75 kg</li><li><strong>Feed conversion ratio</strong> = 16 kg/kg</li><li><strong>Feed efficiency (gain per kg feed)</strong> = 0.0625 kg/kg</li><li><strong>Feed cost per kg of gain</strong> = 6.72 per kg</li><li><strong>Feed per surviving animal</strong> = 1277 kg</li><li><strong>Feed the target FCR would need</strong> = 195 kg</li></ul><p>The line behind those figures is <strong>Total liveweight gain</strong> = <code>max(0,Finishing weight − Starting weight)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Total liveweight gain&lt;/strong&gt; = 75, &lt;strong&gt;Feed conversion ratio&lt;/strong&gt; = 16, &lt;strong&gt;Feed efficiency (gain per kg feed)&lt;/strong&gt; = 0.0625, &lt;strong&gt;Feed cost per kg of gain&lt;/strong&gt; = 6.72, &lt;strong&gt;Feed per surviving animal&lt;/strong&gt; = 1277 and &lt;strong&gt;Feed the target FCR would need&lt;/strong&gt; = 195. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Feed conversion ratio is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total liveweight gain</strong> = <code>max(0,Finishing weight − Starting weight)</code></li><li><strong>Feed conversion ratio</strong> = <code>Feed offered ÷ max(0.0001,Finishing weight − Starting weight)</code></li><li><strong>Feed efficiency (gain per kg feed)</strong> = <code>max(0,Finishing weight − Starting weight) ÷ max(0.0001,Feed offered)</code></li><li><strong>Feed cost per kg of gain</strong> = <code>Feed price × Feed offered ÷ max(0.0001,Finishing weight − Starting weight)</code></li><li><strong>Feed per surviving animal</strong> = <code>Feed offered ÷ max(1,100 − Animals lost) × 100</code></li><li><strong>Feed the target FCR would need</strong> = <code>max(0,Finishing weight − Starting weight) × Target FCR</code></li></ul><p>Any one of Total liveweight gain, Feed conversion ratio and Feed efficiency (gain per kg feed) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Feed offered, from 1200 to 2400 — and the answers go from &lt;strong&gt;Total liveweight gain&lt;/strong&gt; 75 kg, &lt;strong&gt;Feed conversion ratio&lt;/strong&gt; 16 kg/kg, &lt;strong&gt;Feed efficiency (gain per kg feed)&lt;/strong&gt; 0.0625 kg/kg, &lt;strong&gt;Feed cost per kg of gain&lt;/strong&gt; 6.72 per kg, &lt;strong&gt;Feed per surviving animal&lt;/strong&gt; 1277 kg and &lt;strong&gt;Feed the target FCR would need&lt;/strong&gt; 195 kg to &lt;strong&gt;Total liveweight gain&lt;/strong&gt; 75 kg, &lt;strong&gt;Feed conversion ratio&lt;/strong&gt; 32 kg/kg, &lt;strong&gt;Feed efficiency (gain per kg feed)&lt;/strong&gt; 0.0313 kg/kg, &lt;strong&gt;Feed cost per kg of gain&lt;/strong&gt; 13.44 per kg, &lt;strong&gt;Feed per surviving animal&lt;/strong&gt; 2553 kg and &lt;strong&gt;Feed the target FCR would need&lt;/strong&gt; 195 kg.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Feed conversion ratio, Feed efficiency (gain per kg feed) and Total liveweight gain are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Feed offered and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Feed offered, Starting weight and Finishing weight and the number you are missing is Feed conversion ratio and Feed efficiency (gain per kg feed).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/crop-coefficient">Crop Coefficient Calculator</a>, <a href="/biology/crop-water-requirement">Crop Water Requirement (ETc) Calculator</a> and <a href="/biology/crop-water-stress-index">Crop Water Stress Index Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Feed Conversion Ratio calculator work out?', 'a' => <<<'TXT'
            Feed conversion ratio, Feed efficiency (gain per kg feed), Total liveweight gain and Feed cost per kg of gain, from Finishing weight and Starting weight. The relationship is Total liveweight gain = max(0,Finishing weight − Starting weight).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Feed offered (kg), Starting weight (kg), Finishing weight (kg), Animals lost (head), Feed price (per kg). Fill feed, start and end and leave Feed conversion ratio empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total liveweight gain, Feed conversion ratio, Feed efficiency (gain per kg feed) and Feed cost per kg of gain blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total liveweight gain = 75 kg, Feed conversion ratio = 16 kg/kg, Feed efficiency (gain per kg feed) = 0.0625 kg/kg, Feed cost per kg of gain = 6.72 per kg, Feed per surviving animal = 1277 kg and Feed the target FCR would need = 195 kg. That comes from the page's own defaults, entered in Feed offered; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Feed conversion ratio is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Feed offered left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Feed conversion ratio keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/crop-coefficient', 'name' => 'Crop Coefficient Calculator'],
            ['path' => '/biology/crop-water-requirement', 'name' => 'Crop Water Requirement (ETc) Calculator'],
            ['path' => '/biology/crop-water-stress-index', 'name' => 'Crop Water Stress Index Calculator'],
        ],
        'authors' => [],
    ],
];
