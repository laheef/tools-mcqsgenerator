<?php

/**
 * Specific Productivity Calculator (qP)
 * /biology/specific-productivity-qp
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Specific Productivity Calculator (qP)',
    'meta' => ['title' => 'Specific Productivity Calculator (qP) — Biology', 'description' => 'Specific productivity is the amount of product one cell makes per day, which is the only fair way to compare cell lines, media and processes of different sizes.', 'h1' => 'Specific Productivity Calculator (qP)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'titre',
                            'label' => 'Product titre',
                            'type' => 'number',
                            'suffix' => 'g/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.5',
                        ],
                        [
                            'name' => 'vcd',
                            'label' => 'Viable cell density',
                            'type' => 'number',
                            'suffix' => '10⁶/mL',
                            'help' => 'Time-weighted average, not the peak',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'days',
                            'label' => 'Production phase',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Working volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2000',
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Target titre',
                            'type' => 'number',
                            'suffix' => 'g/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4.0',
                        ],
                        [
                            'name' => 'qp',
                            'label' => 'Specific productivity',
                            'type' => 'number',
                            'suffix' => 'pg/cell/d',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total product per batch',
                            'type' => 'number',
                            'suffix' => 'g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_litre_day',
                            'label' => 'Volumetric productivity',
                            'type' => 'number',
                            'suffix' => 'g/L/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'days_needed',
                            'label' => 'Days needed for the target titre',
                            'type' => 'number',
                            'suffix' => 'days',
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
            'title' => 'Productivity',
            'results' => ['qp' => 'titre/(vcd*days)*1000', 'total' => 'titre*volume', 'per_litre_day' => 'titre/days', 'days_needed' => 'target/(titre/days)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Specific productivity is the amount of product one cell makes per day, which is the only fair way to compare cell lines, media and processes of different sizes. It returns specific productivity, total product per batch, volumetric productivity and days needed for the target titre, and the panel shows all of them at once.
        
        This calculator derives qP from titre, cell density and culture time, then projects the titre a longer run would give.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Specific Productivity (qP)', 'html' => <<<'TXT'
            <p>qP = titre ÷ (VCD × days) × 1000 [pg/cell/day], with VCD in 10⁶ cells/mL</p>
            <figure class="calc-figure"><img src="/uploads/biology/specific-productivity-qp.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Specific Productivity Calculator (qP) — Titre accumulates while viable cells hold — the area is the IVCC." title="Specific Productivity Calculator (qP)"><figcaption>Titre accumulates while viable cells hold — the area is the IVCC.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>titre</code></td><td>product concentration at harvest</td><td>g/L</td></tr><tr><td><code>VCD</code></td><td>time-weighted mean viable cell density</td><td>10⁶/mL</td></tr><tr><td><code>t</code></td><td>duration of the production phase</td><td>days</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Specific Productivity (qP)?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: product titre of <strong>2.5</strong> g/L, viable cell density of <strong>12</strong> 10⁶/mL, production phase of <strong>10</strong> days, working volume of <strong>2,000</strong> L, target titre of <strong>4</strong> g/L.</p>
            <p>Substituting them into the formula gives specific productivity of <strong>20.83</strong> pg/cell/d, total product per batch of <strong>5,000</strong> g, volumetric productivity of <strong>0.25</strong> g/L/day, days needed for the target titre of <strong>16</strong> days.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1 – 10</td><td><strong>Low</strong></td><td>unoptimised CHO pools</td></tr><tr><td>10 – 30</td><td><strong>Typical</strong></td><td>stable CHO fed-batch processes</td></tr><tr><td>30 – 60</td><td><strong>High</strong></td><td>optimised hosts, strong promoters, good media</td></tr><tr><td>above 60</td><td><strong>Very high</strong></td><td>check the assay — this is unusual</td></tr></tbody></table>
            <ul><li><p>Use the integral of viable cell concentration over time (IVCC) rather than a single VCD reading; a run that peaks at 20 × 10⁶ cells/mL for two days produces far less than one that holds 10 × 10⁶ for ten days.</p></li><li><p>qP is the fair comparison between a 2 L bioreactor and a 2 000 L tank, because titre alone rewards scale and harvest timing.</p></li><li><p>Volumetric productivity (g/L/day) is what capacity planning uses; specific productivity is what cell-line development optimises.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Plugging in peak VCD instead of the time-weighted average, which understates qP badly.</li><li>Comparing qP across products with different molecular weights without converting to molar terms.</li><li>Ignoring the harvest/clarification losses between the bioreactor and the reported titre.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/bacterial-growth-curve">Growth curve</a>. <a href="/biology/specific-growth-rate-from-od">Specific growth rate from OD</a>. <a href="/biology/transfection-setup">Transfection setup</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a typical qP for CHO cells?', 'a' => 'Roughly 10–30 pg/cell/day in fed-batch, with high producers reaching 40–60.'],
            ['q' => 'How do I calculate IVCC?', 'a' => 'Trapezoidal integration of viable cell density against time over the production phase; qP = product ÷ IVCC.'],
            ['q' => 'What does the Specific Productivity (qP) actually calculate?', 'a' => <<<'TXT'
            It returns specific productivity, total product per batch, volumetric productivity and days needed for the target titre. Each one is derived by the formula on this page, so you can check any figure by hand.
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
