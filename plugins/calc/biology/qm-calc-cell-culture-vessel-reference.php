<?php

/**
 * Cell Culture Dish / Plate / Flask Reference
 * /biology/cell-culture-vessel-reference
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell Culture Dish / Plate / Flask Reference',
    'meta' => ['title' => 'Cell Culture Dish / Plate / Flask Reference', 'description' => 'Every plasticware format has a growth area, a working volume and a recommended cell number, and mixing them up is a classic source of inconsistent experiments.', 'h1' => 'Cell Culture Dish / Plate / Flask Reference', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'vessel',
                            'label' => 'Format',
                            'type' => 'select',
                            'options' => [
                                'T25 flask' => '25',
                                'T75 flask' => '75',
                                'T175 flask' => '175',
                                '35 mm dish' => '8',
                                '60 mm dish' => '21',
                                '100 mm dish' => '55',
                                '6-well plate (per well)' => '9.6',
                                '12-well plate (per well)' => '3.8',
                                '24-well plate (per well)' => '1.9',
                                '96-well plate (per well)' => '0.32',
                            ],
                            'control' => 'SELECT',
                            'default' => 'T75 flask',
                        ],
                        [
                            'name' => 'factor',
                            'label' => 'Number of vessels',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'medium_per_cm2',
                            'label' => 'Medium per cm²',
                            'type' => 'number',
                            'suffix' => 'mL/cm²',
                            'help' => '0.15–0.25 mL/cm² is the usual range',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.2',
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Target seeding density',
                            'type' => 'number',
                            'suffix' => 'cells/cm²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20000',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Growth area',
                            'type' => 'number',
                            'suffix' => 'cm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'medium',
                            'label' => 'Medium per vessel',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cells',
                            'label' => 'Cells per vessel at that density',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_area',
                            'label' => 'Total growth area',
                            'type' => 'number',
                            'suffix' => 'cm²',
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
            'title' => 'Vessel',
            'results' => ['area' => 'vessel', 'medium' => 'vessel*medium_per_cm2', 'cells' => 'vessel*target', 'total_area' => 'vessel*factor'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Every plasticware format has a growth area, a working volume and a recommended cell number, and mixing them up is a classic source of inconsistent experiments. It returns growth area, medium per vessel, cells per vessel at that density and total growth area, and the panel shows all of them at once.
        
        This reference converts between formats and tells you how much medium and how many cells a vessel takes.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Cell Culture Dish / Plate / Flask Reference', 'html' => <<<'TXT'
            <p>Medium (mL) ≈ 0.2 × growth area (cm²); cells = growth area × target density</p>
            <figure class="calc-figure"><img src="/uploads/biology/cell-culture-vessel-reference.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Cell Culture Dish / Plate / Flask Reference — Growth area, medium and cells for the format you picked." title="Cell Culture Dish / Plate / Flask Reference"><figcaption>Growth area, medium and cells for the format you picked.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>vessel</code></td><td>growth area of one vessel</td><td>cm²</td></tr><tr><td><code>medium</code></td><td>working volume</td><td>mL</td></tr><tr><td><code>cells</code></td><td>cells to seed</td><td>cells</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Cell Culture Dish / Plate / Flask Reference?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: format set to <strong>75.0</strong>, number of vessels of <strong>1</strong>, medium per cm² of <strong>0.2</strong> mL/cm², target seeding density of <strong>20,000</strong> cells/cm².</p>
            <p>Substituting them into the formula gives growth area of <strong>75</strong> cm², medium per vessel of <strong>15</strong> mL, cells per vessel at that density of <strong>1,500,000</strong> cells, total growth area of <strong>75</strong> cm².</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The 0.2 mL/cm² rule keeps the depth of medium at about 2 mm, which is what most protocols assume for gas exchange and autocrine signalling.</p></li><li><p>Multi-well plates are quoted per well: a 6-well plate is 9.6 cm² per well, about 58 cm² in total.</p></li><li><p>Transwell and low-attachment formats have their own areas and should not be substituted.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using the plate's total area when the protocol is per well.</li><li>Filling a T175 with the T25 volume (or the reverse) and calling the difference a medium effect.</li><li>Forgetting that medium volume changes the drug concentration in a dose–response assay.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much medium does a T75 flask need?', 'a' => 'About 15 mL at the usual 0.2 mL/cm², with a range of 10–20 mL depending on the protocol.'],
            ['q' => 'How many cells in a confluent T75?', 'a' => 'Roughly 7–8 million for most adherent lines, which is about 10⁵ cells/cm².'],
            ['q' => 'What does the Cell Culture Dish / Plate / Flask Reference actually calculate?', 'a' => <<<'TXT'
            It returns growth area, medium per vessel, cells per vessel at that density and total growth area. Each one is derived by the formula on this page, so you can check any figure by hand.
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
