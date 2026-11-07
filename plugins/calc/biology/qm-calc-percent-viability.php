<?php

/**
 * Percent Viability Calculator
 * /biology/percent-viability
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Percent Viability Calculator',
    'meta' => ['title' => 'Percent Viability Calculator — Formula & Results', 'description' => 'Percent viability is live cells as a share of all cells, and there are three ways to measure it: dye exclusion, metabolic reduction and membrane integrity.', 'h1' => 'Percent Viability Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'live',
                            'label' => 'Live cells',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '920',
                        ],
                        [
                            'name' => 'dead',
                            'label' => 'Dead cells',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '80',
                        ],
                        [
                            'name' => 'viability',
                            'label' => 'Viability',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dead_pct',
                            'label' => 'Non-viable',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Live to dead ratio',
                            'type' => 'number',
                            'suffix' => ':1',
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
            'title' => 'Viability',
            'results' => ['viability' => 'live/(live+dead)*100', 'dead_pct' => 'dead/(live+dead)*100', 'ratio' => 'live/dead'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Percent viability is live cells as a share of all cells, and there are three ways to measure it: dye exclusion, metabolic reduction and membrane integrity. It returns viability, non-viable and live to dead ratio, and the panel shows all of them at once.
        
        This calculator handles the live/dead form and the control-relative form, and reports the cytotoxicity that goes with it.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Percent Viability', 'html' => <<<'TXT'
            <p>Viability (%) = live ÷ (live + dead) × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/percent-viability.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Percent Viability Calculator — Live and dead cells as a share of the population." title="Percent Viability Calculator"><figcaption>Live and dead cells as a share of the population.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>live</code></td><td>cells excluding the dye or reducing the substrate</td><td>cells</td></tr><tr><td><code>dead</code></td><td>cells taking up the dye</td><td>cells</td></tr><tr><td><code>viability</code></td><td>live share of the population</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Percent Viability?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: live cells of <strong>920</strong> cells, dead cells of <strong>80</strong> cells.</p>
            <p>Substituting them into the formula gives viability of <strong>92</strong>%, non-viable of <strong>8</strong>%, live to dead ratio of <strong>11.5</strong>:1.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>95 – 100%</td><td><strong>Healthy</strong></td><td>normal for a fresh culture</td></tr><tr><td>80 – 95%</td><td><strong>Reduced</strong></td><td>harvest stress or a mild treatment</td></tr><tr><td>below 80%</td><td><strong>Low</strong></td><td>check conditions before the experiment</td></tr></tbody></table>
            <ul><li><p>A viability of 50% can mean 50% of the cells are dead, or that every cell is half as metabolically active — the two methods answer different questions.</p></li><li><p>Always quote the method: trypan blue, PI/FACS and ATP assays give different numbers on the same population.</p></li><li><p>For cytotoxicity reporting, the complement of viability assumes the untreated control was 100% viable, which is rarely exactly true.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Counting fewer than 100 cells, where a single cell is a whole percentage point.</li><li>Using total cells (live + dead) as the denominator in one place and live cells in another.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/trypan-blue-cell-viability">Trypan blue viability</a>. <a href="/biology/alamarblue-cell-viability">AlamarBlue viability</a>. <a href="/biology/percent-inhibition">Percent inhibition</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What viability is acceptable for an experiment?', 'a' => '90% or better at the start of most assays; treatments that drop it below 70% usually confound the readout with cytotoxicity.'],
            ['q' => 'What does the Percent Viability actually calculate?', 'a' => 'It returns viability, non-viable and live to dead ratio. Each one is derived by the formula on this page, so you can check any figure by hand.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
            ['q' => 'Does it work in both directions?', 'a' => <<<'TXT'
            Where the maths allows it, yes: the page states which values it solves for and which you supply. A field marked as a result is always computed, never typed into.
            TXT],
        ],
        'related' => [],
    ],
];
