<?php

/**
 * Dry Matter Intake Calculator
 * /biology/dry-matter-intake
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dry Matter Intake Calculator',
    'meta' => ['title' => 'Dry Matter Intake Calculator — Formula & Results', 'description' => 'Dry matter intake is how much feed an animal actually eats once the water is taken out, and it is the number nutritionists formulate against.', 'h1' => 'Dry Matter Intake Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Body weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'feed',
                            'label' => 'Feed type',
                            'type' => 'select',
                            'options' => ['Pasture / forage' => '1', 'Hay' => '2', 'Silage' => '3', 'Concentrate' => '4'],
                            'default' => 'Hay',
                        ],
                        [
                            'name' => 'dm',
                            'label' => 'Dry matter of the feed',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Hay ~88%, silage ~35%, grain ~88%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '88',
                        ],
                        [
                            'name' => 'asfed',
                            'label' => 'Feed offered',
                            'type' => 'number',
                            'suffix' => 'kg/day',
                            'help' => 'Weight as it comes out of the bag or bale',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '14',
                        ],
                        [
                            'name' => 'intake',
                            'label' => 'Dry matter intake',
                            'type' => 'number',
                            'suffix' => 'kg/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pct_bw',
                            'label' => 'Intake as % of body weight',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Target intake',
                            'type' => 'number',
                            'suffix' => 'kg/day',
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
            'title' => 'Intake',
            'results' => ['intake' => 'asfed*dm/100', 'pct_bw' => 'asfed*dm/100/weight*100', 'target' => 'weight*if_else(feed==1, 0.025, if_else(feed==2, 0.022, if_else(feed==3, 0.020, 0.018)))', 'asfed' => 'intake*100/dm'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dry matter intake is how much feed an animal actually eats once the water is taken out, and it is the number nutritionists formulate against. It returns dry matter intake, intake as % of body weight, target intake and feed offered, and the panel shows all of them at once.
        
        This calculator estimates intake from body weight and feed type, converts as-fed weights into dry matter, and reports the percentage of body weight consumed.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Dry Matter Intake', 'html' => <<<'TXT'
            <p>Dry matter intake = as-fed weight × dry-matter % ÷ 100; target intake ≈ 1.8–2.5% of body weight depending on feed</p>
            <figure class="calc-figure"><img src="/uploads/biology/dry-matter-intake.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Dry Matter Intake Calculator — As-fed weight, dry-matter percentage and body weight give intake." title="Dry Matter Intake Calculator"><figcaption>As-fed weight, dry-matter percentage and body weight give intake.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>weight</code></td><td>body weight</td><td>kg</td></tr><tr><td><code>asfed</code></td><td>feed offered, as fed</td><td>kg/day</td></tr><tr><td><code>dm</code></td><td>dry matter content of that feed</td><td>%</td></tr><tr><td><code>intake</code></td><td>dry matter actually eaten</td><td>kg/day</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Dry Matter Intake?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: body weight of <strong>500</strong> kg, feed type set to <strong>2.0</strong>, dry matter of the feed of <strong>88</strong>%.</p>
            <p>Substituting them into the formula gives dry matter intake of <strong>12.32</strong> kg/day, intake as % of body weight of <strong>2.46</strong>%, target intake of <strong>11</strong> kg/day, feed offered of <strong>14</strong> kg/day.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1.8 – 2.0% of BW</td><td><strong>Concentrate-heavy</strong></td><td>high-energy rations</td></tr><tr><td>2.0 – 2.2% of BW</td><td><strong>Silage-based</strong></td><td>wet forage limits intake</td></tr><tr><td>2.2 – 2.5% of BW</td><td><strong>Hay / pasture</strong></td><td>the usual range for dry forage</td></tr></tbody></table>
            <ul><li><p>Two feeds with the same as-fed weight can differ by a factor of three in dry matter: 10 kg of silage at 35% DM is 3.5 kg of dry matter, 10 kg of hay at 88% is 8.8 kg.</p></li><li><p>Intake as a percentage of body weight is how guidelines are written, so it is the number to compare against them.</p></li><li><p>Palatability, water access and fibre length all cap intake before the arithmetic does.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Comparing a silage ration with a hay ration on an as-fed basis.</li><li>Assuming the dry matter percentage on the label is the same as the batch in the yard.</li><li>Feeding to a target intake without checking what is actually refused.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a normal dry matter intake for cattle?', 'a' => 'About 2–2.5% of body weight on dry forage and 1.8–2% on high-concentrate rations.'],
            ['q' => 'Why does dry matter matter more than as-fed weight?', 'a' => 'Because water has no nutritional value: dry matter is the part of the feed the animal can actually use.'],
            ['q' => 'What does the Dry Matter Intake actually calculate?', 'a' => <<<'TXT'
            It returns dry matter intake, intake as % of body weight, target intake and feed offered. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];
