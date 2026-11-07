<?php

/**
 * Mushroom Yield Calculator
 * /biology/mushroom-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mushroom Yield Calculator',
    'meta' => ['title' => 'Mushroom Yield Calculator — Formula & Results', 'description' => <<<'TXT'
    Mushroom yield is reported as biological efficiency: kilograms of fresh mushrooms per 100 kg of dry substrate. It returns biological efficiency, wet substrate…
    TXT, 'h1' => 'Mushroom Yield Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'fresh',
                            'label' => 'Fresh mushrooms harvested',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '18',
                        ],
                        [
                            'name' => 'substrate',
                            'label' => 'Substrate dry weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'help' => 'Dry weight, not wet',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'moisture',
                            'label' => 'Substrate moisture',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Wet weight = dry ÷ (1 − moisture)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '65',
                        ],
                        [
                            'name' => 'blocks',
                            'label' => 'Number of blocks',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'be',
                            'label' => 'Biological efficiency',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'wet_weight',
                            'label' => 'Wet substrate weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_block',
                            'label' => 'Yield per block',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'blocks_needed',
                            'label' => 'Blocks for a 100 kg harvest',
                            'type' => 'number',
                            'suffix' => 'blocks',
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
            'title' => 'Yield',
            'results' => ['be' => 'fresh/substrate*100', 'wet_weight' => 'substrate/(1-moisture/100)', 'per_block' => 'fresh/blocks', 'blocks_needed' => '100/(fresh/blocks)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Mushroom yield is reported as biological efficiency: kilograms of fresh mushrooms per 100 kg of dry substrate. It returns biological efficiency, wet substrate weight, yield per block and blocks for a 100 kg harvest, and the panel shows all of them at once.
        
        This calculator converts your harvest and substrate weights into BE, the yield per block and the number of blocks a target harvest needs.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Mushroom Yield', 'html' => <<<'TXT'
            <p>BE (%) = fresh mushroom weight ÷ dry substrate weight × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/mushroom-yield.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Mushroom Yield Calculator — Fresh harvest against dry substrate: the ratio is the score." title="Mushroom Yield Calculator"><figcaption>Fresh harvest against dry substrate: the ratio is the score.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>fresh</code></td><td>fresh mushrooms harvested</td><td>kg</td></tr><tr><td><code>dry substrate</code></td><td>substrate dry matter at spawning</td><td>kg</td></tr><tr><td><code>BE</code></td><td>biological efficiency</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Mushroom Yield?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: fresh mushrooms harvested of <strong>18</strong> kg, substrate dry weight of <strong>10</strong> kg, substrate moisture of <strong>65</strong>%, number of blocks of <strong>10</strong>.</p>
            <p>Substituting them into the formula gives biological efficiency of <strong>180</strong>%, wet substrate weight of <strong>28.57</strong> kg, yield per block of <strong>1.8</strong> kg, blocks for a 100 kg harvest of <strong>55.56</strong> blocks.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 40%</td><td><strong>Poor</strong></td><td>contamination, wrong moisture or bad spawn run</td></tr><tr><td>40 – 70%</td><td><strong>Low</strong></td><td>typical of a first flush only</td></tr><tr><td>70 – 100%</td><td><strong>Good</strong></td><td>normal for oyster mushrooms over three flushes</td></tr><tr><td>above 100%</td><td><strong>Excellent</strong></td><td>achievable because the mushroom is mostly water</td></tr></tbody></table>
            <ul><li><p>BE above 100% is possible and normal: mushrooms are about 90% water, so the fresh weight can exceed the dry substrate they grew on.</p></li><li><p>Always state whether the substrate weight is wet or dry. A 65% moisture block weighs nearly three times its dry matter, so the two numbers are not comparable.</p></li><li><p>Yield is counted over all flushes. Quoting the first flush only flatters the strain.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using wet substrate weight in the denominator, which halves the apparent BE.</li><li>Harvesting after the veil breaks — heavier, but a lower grade and a shorter shelf life.</li><li>Comparing species: shiitake and oyster mushrooms have very different ceilings.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good biological efficiency for oyster mushrooms?', 'a' => '70–100% over three flushes on straw or sawdust blocks.'],
            ['q' => 'How much substrate do I need for 100 kg of mushrooms?', 'a' => 'At 80% BE, about 125 kg of dry substrate — roughly 360 kg of wet blocks.'],
            ['q' => 'What does the Mushroom Yield actually calculate?', 'a' => <<<'TXT'
            It returns biological efficiency, wet substrate weight, yield per block and blocks for a 100 kg harvest. Each one is derived by the formula on this page, so you can check any figure by hand.
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
