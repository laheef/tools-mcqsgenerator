<?php

/**
 * Catch Per Unit Effort Calculator
 * /biology/catch-per-unit-effort
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Catch Per Unit Effort Calculator',
    'meta' => ['title' => 'Catch Per Unit Effort Calculator — Formula & Results', 'description' => <<<'TXT'
    Catch per unit effort standardises catch by how hard you fished: fish per hour, per hundred hooks, per trawl. It returns catch per unit effort, change in CPUE…
    TXT, 'h1' => 'Catch Per Unit Effort Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'catch_count',
                            'label' => 'Catch',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '340',
                        ],
                        [
                            'name' => 'effort',
                            'label' => 'Effort',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'help' => 'Hours, hooks, tows or traps',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'cpue',
                            'label' => 'Catch per unit effort',
                            'type' => 'number',
                            'suffix' => '/hour',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'previous',
                            'label' => 'CPUE in an earlier survey',
                            'type' => 'number',
                            'suffix' => '/hour',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'change',
                            'label' => 'Change in CPUE',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'decline_rate',
                            'label' => 'Implied annual change',
                            'type' => 'number',
                            'suffix' => '%/year',
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
            'title' => 'CPUE',
            'results' => ['cpue' => 'catch_count/effort', 'change' => '(catch_count/effort-previous)/previous*100', 'decline_rate' => '(catch_count/effort-previous)/previous*100/5'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Catch per unit effort standardises catch by how hard you fished: fish per hour, per hundred hooks, per trawl. It returns catch per unit effort, change in CPUE and implied annual change, and the panel shows all of them at once.
        
        It is the classic index of abundance, and comparing it over seasons or years is how a decline is detected before a stock collapses.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Catch Per Unit Effort', 'html' => <<<'TXT'
            <p>CPUE = catch ÷ effort; change (%) = (CPUE_now − CPUE_before) ÷ CPUE_before × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/catch-per-unit-effort.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Catch Per Unit Effort Calculator — CPUE over surveys and the trend it implies." title="Catch Per Unit Effort Calculator"><figcaption>CPUE over surveys and the trend it implies.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>catch</code></td><td>individuals or biomass landed</td><td>individuals or kg</td></tr><tr><td><code>effort</code></td><td>hours, hooks, tows or traps</td><td>effort units</td></tr><tr><td><code>CPUE</code></td><td>catch per unit effort</td><td>individuals per unit</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Catch Per Unit Effort?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: catch of <strong>340</strong> individuals, effort of <strong>40</strong> hours, cpue in an earlier survey of <strong>12</strong> /hour.</p>
            <p>Substituting them into the formula gives catch per unit effort of <strong>8.5</strong> /hour, change in cpue of <strong>-29.17</strong>%, implied annual change of <strong>-5.83</strong> %/year.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>CPUE is assumed proportional to abundance; that assumption fails when fishers concentrate on the last remaining shoals, so catchability rises as the stock falls.</p></li><li><p>Always state the effort unit. A vessel that doubles its gear changes CPUE without any change in the fish.</p></li><li><p>The percentage change divided by the number of years gives a rough annual rate; a proper series needs a regression of log CPUE against time.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Comparing CPUE across different gear, seasons or vessels.</li><li>Reporting catch totals and calling them CPUE.</li><li>Fitting a trend to two points.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/maximum-sustainable-yield">Maximum sustainable yield</a>. <a href="/biology/encounter-rate">Encounter rate</a>. <a href="/biology/mark-recapture-population">Mark–recapture</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why is CPUE used instead of total catch?', 'a' => 'Because total catch mixes abundance with effort — more boats catch more fish even when the stock is unchanged.'],
            ['q' => 'What is hyperstability?', 'a' => 'CPUE staying high while abundance falls, because fishers learn where the remaining fish are.'],
            ['q' => 'What does the Catch Per Unit Effort actually calculate?', 'a' => <<<'TXT'
            It returns catch per unit effort, change in CPUE and implied annual change. Each one is derived by the formula on this page, so you can check any figure by hand.
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
