<?php

/**
 * Serial Dilution Planner
 * /biology/serial-dilution-planner
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Serial Dilution Planner',
    'meta' => ['title' => 'Serial Dilution Planner — Formula & Results', 'description' => 'A serial dilution builds a concentration series by transferring a fixed volume from tube to tube. It returns transfer volume, diluent per tube, final…', 'h1' => 'Serial Dilution Planner', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'stock',
                            'label' => 'Starting concentration',
                            'type' => 'number',
                            'help' => 'Any unit — mg/mL, µM, CFU/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'factor',
                            'label' => 'Dilution factor per step',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '10 for a tenfold series',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'steps',
                            'label' => 'Number of steps',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'tube_vol',
                            'label' => 'Volume in each tube',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'transfer',
                            'label' => 'Transfer volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diluent',
                            'label' => 'Diluent per tube',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'final',
                            'label' => 'Final concentration',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_diluent',
                            'label' => 'Diluent needed in total',
                            'type' => 'number',
                            'suffix' => 'µL',
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
            'title' => 'Series',
            'results' => ['transfer' => 'tube_vol/factor', 'diluent' => 'tube_vol-tube_vol/factor', 'final' => 'stock/pow(factor,steps)', 'total_diluent' => '(tube_vol-tube_vol/factor)*steps'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A serial dilution builds a concentration series by transferring a fixed volume from tube to tube. It returns transfer volume, diluent per tube, final concentration and diluent needed in total, and the panel shows all of them at once.
        
        This planner gives the transfer volume, the diluent volume, every concentration in the series and the total volume of diluent you need to prepare.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Serial Dilution Planner', 'html' => <<<'TXT'
            <p>Transfer = tube volume ÷ dilution factor; C(n) = C₀ ÷ factorⁿ</p>
            <figure class="calc-figure"><img src="/uploads/biology/serial-dilution-planner.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Serial Dilution Planner — Every step divides the concentration by the same factor." title="Serial Dilution Planner"><figcaption>Every step divides the concentration by the same factor.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>factor</code></td><td>how much each step dilutes</td><td>×</td></tr><tr><td><code>steps</code></td><td>number of transfers</td><td>—</td></tr><tr><td><code>transfer</code></td><td>volume moved from the previous tube</td><td>µL</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Serial Dilution Planner?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: starting concentration of <strong>1,000</strong>, dilution factor per step of <strong>10</strong> ×, number of steps of <strong>6</strong>, volume in each tube of <strong>1,000</strong> µL.</p>
            <p>Substituting them into the formula gives transfer volume of <strong>100</strong> µL, diluent per tube of <strong>900</strong> µL, final concentration of <strong>0.001</strong>, diluent needed in total of <strong>5,400</strong> µL.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The transfer volume must not exceed a tenth of the tube volume to keep the previous tube's contents from being disturbed — that is the point of the factor.</p></li><li><p>The last tube is a disposal tube: the series has one more tube than transfers.</p></li><li><p>Each step multiplies the error of the previous one, so keep the numbers exact rather than rounding the intermediate concentrations.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Changing tips for the transfer but not for the mixing, which carries over the previous tube.</li><li>Diluting into the same volume you took from (which leaves the tube short).</li><li>Assuming a tenfold series over six steps gives 10⁻⁶ when it gives 10⁻⁶ from a starting concentration of 1 — write the series out.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/cfu-ml-calculator">CFU/mL</a>. <a href="/biology/dilution-calculator-c1v1">C1V1 dilution</a>. <a href="/biology/hemocytometer-cell-counter">Hemocytometer counter</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many tubes do I need for a 10⁻⁶ dilution?', 'a' => 'Six transfers, so seven tubes including the starting material.'],
            ['q' => 'Why is my transfer volume so small?', 'a' => 'Because the tube volume is small or the factor is large; increase the tube volume or use a two-step dilution.'],
            ['q' => 'What does the Serial Dilution Planner actually calculate?', 'a' => <<<'TXT'
            It returns transfer volume, diluent per tube, final concentration and diluent needed in total. Each one is derived by the formula on this page, so you can check any figure by hand.
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
