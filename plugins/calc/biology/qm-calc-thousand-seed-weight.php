<?php

/**
 * Thousand Seed Weight Calculator
 * /biology/thousand-seed-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Thousand Seed Weight Calculator',
    'meta' => ['title' => 'Thousand Seed Weight Calculator — Formula & Results', 'description' => 'Thousand seed weight — the mass of a thousand seeds — converts plant populations into kilograms of seed and is the fastest way to compare seed lots.', 'h1' => 'Thousand Seed Weight Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'sample_mass',
                            'label' => 'Sample mass',
                            'type' => 'number',
                            'suffix' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4.2',
                        ],
                        [
                            'name' => 'sample_count',
                            'label' => 'Seeds in the sample',
                            'type' => 'number',
                            'suffix' => 'seeds',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'moisture',
                            'label' => 'Moisture content',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Optional — standard is 12–14%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'tsw',
                            'label' => 'Thousand seed weight',
                            'type' => 'number',
                            'suffix' => 'g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'seeds_kg',
                            'label' => 'Seeds per kilogram',
                            'type' => 'number',
                            'suffix' => 'seeds/kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tsw_dry',
                            'label' => 'TSW at 12% moisture',
                            'type' => 'number',
                            'suffix' => 'g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'seed_per_g',
                            'label' => 'Seeds per gram',
                            'type' => 'number',
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
            'title' => 'Seed weight',
            'results' => ['tsw' => 'sample_mass/sample_count*1000', 'seeds_kg' => '1000/(sample_mass/sample_count*1000)*1000', 'tsw_dry' => 'sample_mass/sample_count*1000*(88/(100-moisture))', 'seed_per_g' => 'sample_count/sample_mass'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Thousand seed weight — the mass of a thousand seeds — converts plant populations into kilograms of seed and is the fastest way to compare seed lots. It returns thousand seed weight, seeds per kilogram, TSW at 12% moisture and seeds per gram, and the panel shows all of them at once.
        
        This calculator standardises a sample of any size to the standard TSW figure and gives the seed count per kilogram.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Thousand Seed Weight', 'html' => <<<'TXT'
            <p>TSW (g) = sample mass ÷ seeds in the sample × 1 000</p>
            <figure class="calc-figure"><img src="/uploads/biology/thousand-seed-weight.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Thousand Seed Weight Calculator — A counted sample scaled to a thousand seeds." title="Thousand Seed Weight Calculator"><figcaption>A counted sample scaled to a thousand seeds.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>sample mass</code></td><td>mass of the counted seeds</td><td>g</td></tr><tr><td><code>sample count</code></td><td>number of seeds weighed</td><td>seeds</td></tr><tr><td><code>TSW</code></td><td>thousand seed weight</td><td>g</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Thousand Seed Weight?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: sample mass of <strong>4.2</strong> g, seeds in the sample of <strong>100</strong> seeds, moisture content of <strong>12</strong>%.</p>
            <p>Substituting them into the formula gives thousand seed weight of <strong>42</strong> g, seeds per kilogram of <strong>23,809.52</strong> seeds/kg, tsw at 12% moisture of <strong>42</strong> g, seeds per gram of <strong>23.81</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Count at least 100 seeds and weigh to 0.01 g; the error in TSW falls as the square root of the count, so a 100-seed sample is about ±5%.</p></li><li><p>Moisture matters: the same lot is heavier at 14% than at 10%, which is why standards quote TSW at a stated moisture.</p></li><li><p>TSW is a variety and seed-lot trait — it also predicts seedling vigour, because bigger seeds carry more reserves.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Weighing a scoop instead of counting the seeds in it.</li><li>Comparing TSW between lots at different moisture contents.</li><li>Using field-run seed (with chaff) in a weight-based rate calculation.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a typical thousand seed weight?', 'a' => '40 g for wheat, 300 g for maize, 150 g for soybean, 4 g for oilseed rape.'],
            ['q' => 'How does TSW affect seeding rate?', 'a' => 'Directly and proportionally: doubling TSW doubles the kilograms needed for the same plant population.'],
            ['q' => 'What does the Thousand Seed Weight actually calculate?', 'a' => <<<'TXT'
            It returns thousand seed weight, seeds per kilogram, TSW at 12% moisture and seeds per gram. Each one is derived by the formula on this page, so you can check any figure by hand.
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
