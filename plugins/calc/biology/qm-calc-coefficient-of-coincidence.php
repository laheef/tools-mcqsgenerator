<?php

/**
 * Coefficient of Coincidence Calculator
 * /biology/coefficient-of-coincidence
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Coefficient of Coincidence Calculator',
    'meta' => ['title' => 'Coefficient of Coincidence Calculator — Biology', 'description' => 'The coefficient of coincidence compares observed double crossovers with the doubles the single rates predict. It returns expected double crossovers…', 'h1' => 'Coefficient of Coincidence Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'region1',
                            'label' => 'Recombination frequency, region 1',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'region2',
                            'label' => 'Recombination frequency, region 2',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'observed',
                            'label' => 'Observed double crossovers',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '14',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total offspring',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'expected',
                            'label' => 'Expected double crossovers',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'coc',
                            'label' => 'Coefficient of coincidence',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'interference',
                            'label' => 'Interference',
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
            'title' => 'Crossovers',
            'results' => ['expected' => 'region1/100*region2/100*total', 'coc' => 'observed/(region1/100*region2/100*total)', 'interference' => '1-observed/(region1/100*region2/100*total)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The coefficient of coincidence compares observed double crossovers with the doubles the single rates predict. It returns expected double crossovers, coefficient of coincidence and interference, and the panel shows all of them at once.
        
        The coefficient of coincidence compares observed doubles with expected doubles, and its complement is interference — the quantity that tells you whether crossovers inhibit each other.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Coefficient of Coincidence', 'html' => <<<'TXT'
            <p>Expected doubles = RF₁ × RF₂ × N; CoC = observed ÷ expected; I = 1 − CoC</p>
            <figure class="calc-figure"><img src="/uploads/biology/coefficient-of-coincidence.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Coefficient of Coincidence Calculator — Observed doubles against the number chance predicts." title="Coefficient of Coincidence Calculator"><figcaption>Observed doubles against the number chance predicts.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>RF₁, RF₂</code></td><td>single-crossover frequencies in each interval</td><td>%</td></tr><tr><td><code>N</code></td><td>offspring scored</td><td>individuals</td></tr><tr><td><code>CoC</code></td><td>coefficient of coincidence</td><td>—</td></tr><tr><td><code>I</code></td><td>interference</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Coefficient of Coincidence?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: recombination frequency, region 1 of <strong>10</strong>%, recombination frequency, region 2 of <strong>12</strong>%, observed double crossovers of <strong>14</strong> individuals, total offspring of <strong>1,000</strong> individuals.</p>
            <p>Substituting them into the formula gives expected double crossovers of <strong>12</strong> individuals, coefficient of coincidence of <strong>1.17</strong>, interference of <strong>-0.1667</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>CoC = 1</td><td><strong>No interference</strong></td><td>doubles as often as predicted</td></tr><tr><td>CoC below 1</td><td><strong>Positive interference</strong></td><td>a crossover inhibits a nearby one — the usual case</td></tr><tr><td>CoC above 1</td><td><strong>Negative interference</strong></td><td>doubles more common than predicted, often near a crossover hotspot</td></tr></tbody></table>
            <ul><li><p>Interference is usually strongest near the centromere and weakest at chromosome ends; values around 0.2–0.6 are typical for genes a few map units apart.</p></li><li><p>The expected number of doubles uses the product of the two single frequencies, which assumes independence — exactly the assumption the coefficient tests.</p></li><li><p>Small expected counts make the ratio unstable: with two expected doubles, one observed changes the coefficient by half.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using percentages as fractions in the multiplication.</li><li>Counting each double crossover once per interval instead of once per individual.</li><li>Reporting interference without stating the interval over which it was measured.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does interference of 0.4 mean?', 'a' => '40% of the double crossovers predicted by chance did not occur.'],
            ['q' => 'Can interference be negative?', 'a' => 'Yes, rarely: negative interference means doubles occur more often than expected, which happens near hotspots.'],
            ['q' => 'What does the Coefficient of Coincidence actually calculate?', 'a' => <<<'TXT'
            It returns expected double crossovers, coefficient of coincidence and interference. Each one is derived by the formula on this page, so you can check any figure by hand.
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
