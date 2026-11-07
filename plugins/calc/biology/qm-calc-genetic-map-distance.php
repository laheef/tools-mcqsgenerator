<?php

/**
 * Genetic Linkage Distance Calculator
 * /biology/genetic-map-distance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Genetic Linkage Distance Calculator',
    'meta' => ['title' => 'Genetic Linkage Distance Calculator — Biology', 'description' => 'Map distance between two loci is built from recombination frequencies, corrected for double crossovers. It returns map distance, interval 1 (Haldane), map…', 'h1' => 'Genetic Linkage Distance Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'rf1',
                            'label' => 'Recombination, interval 1',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'rf2',
                            'label' => 'Recombination, interval 2',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '11',
                        ],
                        [
                            'name' => 'cm1',
                            'label' => 'Map distance, interval 1 (Haldane)',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cm2',
                            'label' => 'Map distance, interval 2 (Haldane)',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cm_total',
                            'label' => 'Map distance across both',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kosambi_total',
                            'label' => 'Map distance across both (Kosambi)',
                            'type' => 'number',
                            'suffix' => 'cM',
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
            'title' => 'Distance',
            'results' => ['cm1' => '0-0.5*log(1-2*rf1/100)', 'cm2' => '0-0.5*log(1-2*rf2/100)', 'cm_total' => '(0-0.5*log(1-2*rf1/100))+(0-0.5*log(1-2*rf2/100))', 'kosambi_total' => '0.25*log((1+2*(rf1/100+rf2/100-2*rf1/100*rf2/100))/(1-2*(rf1/100+rf2/100-2*rf1/100*rf2/100)))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Map distance between two loci is built from recombination frequencies, corrected for double crossovers. It returns map distance, interval 1 (Haldane), map distance, interval 2 (Haldane), map distance across both and map distance across both (Kosambi), and the panel shows all of them at once.
        
        This calculator converts a recombination frequency into Haldane and Kosambi map distances, and combines two intervals into the distance across both.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Genetic Linkage Distance', 'html' => <<<'TXT'
            <p>Haldane: d = −½ ln(1 − 2r) (r as a fraction); distances add across adjacent intervals</p>
            <figure class="calc-figure"><img src="/uploads/biology/genetic-map-distance.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Genetic Linkage Distance Calculator — Recombination frequency against map distance, with the asymptote at 50%." title="Genetic Linkage Distance Calculator"><figcaption>Recombination frequency against map distance, with the asymptote at 50%.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>r</code></td><td>recombination frequency as a fraction</td><td>0–0.5</td></tr><tr><td><code>d</code></td><td>map distance</td><td>cM</td></tr><tr><td><code>Kosambi</code></td><td>alternative function assuming crossover interference</td><td>cM</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Genetic Linkage Distance?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: recombination, interval 1 of <strong>8</strong>%, recombination, interval 2 of <strong>11</strong>%.</p>
            <p>Substituting them into the formula gives map distance, interval 1 (haldane) of <strong>0.0872</strong> cM, map distance, interval 2 (haldane) of <strong>0.1242</strong> cM, map distance across both of <strong>0.2114</strong> cM, map distance across both (kosambi) of <strong>0.1798</strong> cM.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Haldane's function maps r = 0.5 to infinity, which is the honest statement that independent loci have no measurable distance.</p></li><li><p>Map distances are additive across intervals; recombination frequencies are not, which is why genetic maps are built from many small intervals.</p></li><li><p>Physical distance per centimorgan varies: about 1 Mb per cM in humans on average, but 0.1 Mb in recombination hotspots.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Adding recombination percentages across intervals and calling the sum a map distance.</li><li>Using a mapping function on a frequency above 50%, which cannot exist.</li><li>Mixing Haldane and Kosambi values for the two halves of a three-point cross.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which mapping function should I use?', 'a' => 'Kosambi is the usual choice for real data because crossovers interfere; Haldane is the simpler null model.'],
            ['q' => 'Why is map distance additive but recombination is not?', 'a' => 'Because a double crossover restores the parental arrangement and goes uncounted, so two 20% intervals give 40 cM but only about 33% recombination.'],
            ['q' => 'What does the Genetic Linkage Distance actually calculate?', 'a' => <<<'TXT'
            It returns map distance, interval 1 (Haldane), map distance, interval 2 (Haldane), map distance across both and map distance across both (Kosambi). Each one is derived by the formula on this page, so you can check any figure by hand.
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
