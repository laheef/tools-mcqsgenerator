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
    'meta' => ['title' => 'Feed Conversion Ratio Calculator — Formula & Results', 'description' => 'Feed conversion ratio is the kilograms of feed it takes to add one kilogram of gain. It returns total liveweight gain, feed conversion ratio, feed efficiency…', 'h1' => 'Feed Conversion Ratio Calculator', 'updated' => '2026-10-29'],
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
        Feed conversion ratio is the kilograms of feed it takes to add one kilogram of gain. It returns total liveweight gain, feed conversion ratio, feed efficiency (gain per kg feed) and feed cost per kg of gain, and the panel shows all of them at once.
        
        This calculator returns FCR, its inverse (feed efficiency), the feed cost per kilogram of gain and the improvement from a target FCR.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Feed Conversion Ratio', 'html' => <<<'TXT'
            <p>FCR = feed consumed ÷ liveweight gain; feed efficiency = gain ÷ feed = 1 ÷ FCR</p>
            <figure class="calc-figure"><img src="/uploads/biology/feed-conversion-ratio.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Feed Conversion Ratio Calculator — Feed in, gain out: the ratio is the whole story of feed cost." title="Feed Conversion Ratio Calculator"><figcaption>Feed in, gain out: the ratio is the whole story of feed cost.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>feed</code></td><td>dry or as-fed feed consumed</td><td>kg</td></tr><tr><td><code>gain</code></td><td>weight gained over the same period</td><td>kg</td></tr><tr><td><code>FCR</code></td><td>feed conversion ratio</td><td>kg/kg</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Feed conversion ratio is the standard performance measure in livestock recording schemes; values quoted here follow typical commercial breed benchmarks.</p>
            TXT],
            ['title' => 'How do I use the Feed Conversion Ratio?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: feed offered of <strong>1,200</strong> kg, starting weight of <strong>30</strong> kg, finishing weight of <strong>105</strong> kg, animals lost of <strong>0</strong> head, feed price of <strong>0.42</strong> per kg, target fcr of <strong>2.6</strong>.</p>
            <p>Substituting them into the formula gives total liveweight gain of <strong>75</strong> kg, feed conversion ratio of <strong>16</strong> kg/kg, feed efficiency (gain per kg feed) of <strong>0.0625</strong> kg/kg, feed cost per kg of gain of <strong>6.72</strong> per kg, feed per surviving animal of <strong>1,200</strong> kg, feed the target fcr would need of <strong>195</strong> kg.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 1.8</td><td><strong>Excellent</strong></td><td>modern broilers and well-run pig units</td></tr><tr><td>1.8 – 2.5</td><td><strong>Good</strong></td><td>typical efficient pig finishing</td></tr><tr><td>2.5 – 4.0</td><td><strong>Average</strong></td><td>beef feedlot, older genetics</td></tr><tr><td>above 4.0</td><td><strong>Poor</strong></td><td>check feed wastage, health and weighing accuracy</td></tr></tbody></table>
            <ul><li><p>Always compare FCR over the same weight range. A pig from 30 to 105 kg converts far better than the same pig from 8 to 30 kg, because maintenance is spread over more gain.</p></li><li><p>Feed efficiency is the same information upside down: an FCR of 2.5 is an efficiency of 0.40 kg of gain per kg of feed.</p></li><li><p>Deaths do not change FCR as calculated on surviving animals unless you divide by the weight gain of the animals actually placed, which is what makes the figure honest.</p></li><li><p>Report whether the feed weight is as-fed or dry matter. Silage at 35% dry matter looks like a wonderful FCR until you realise most of the weight was water.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Recording feed delivered to the bunk instead of feed consumed — spillage and refusals inflate the number.</li><li>Weighing animals once, at the end, after a different interval for each pen.</li><li>Comparing FCR across species: poultry, pigs and cattle live on completely different scales.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>Most real jobs need two or three of these together:</p><p><a href="/biology/dry-matter-intake">Dry matter intake</a>. <a href="/biology/pig-weight">Pig weight from measurements</a>. <a href="/biology/chicken-feed-amount">Chicken feed amount</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good feed conversion ratio for broilers?', 'a' => 'Around 1.5–1.7 kg of feed per kg of liveweight for modern broiler strains over a 42-day cycle.'],
            ['q' => 'Why does my FCR get worse as animals get heavier?', 'a' => 'Maintenance requirements scale with body weight while gain does not, so the marginal cost of each extra kilogram rises.'],
            ['q' => 'Does adding water to feed change FCR?', 'a' => 'It changes as-fed FCR but not dry-matter FCR, which is why dry-matter figures are the only ones that compare across farms.'],
            ['q' => 'What does the Feed Conversion Ratio actually calculate?', 'a' => <<<'TXT'
            It returns total liveweight gain, feed conversion ratio, feed efficiency (gain per kg feed) and feed cost per kg of gain. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];
