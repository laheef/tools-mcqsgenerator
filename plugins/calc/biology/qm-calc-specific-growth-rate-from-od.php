<?php

/**
 * Specific Growth Rate from OD Readings
 * /biology/specific-growth-rate-from-od
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Specific Growth Rate from OD Readings',
    'meta' => ['title' => 'Specific Growth Rate from OD Readings Calculator', 'description' => 'The specific growth rate µ is the slope of ln(OD) against time, and it is the standard way to compare growth conditions. It returns specific growth rate…', 'h1' => 'Specific Growth Rate from OD Readings', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'od_start',
                            'label' => 'OD at start',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.05',
                        ],
                        [
                            'name' => 'od_end',
                            'label' => 'OD at end',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.9',
                        ],
                        [
                            'name' => 'hours',
                            'label' => 'Time between readings',
                            'type' => 'number',
                            'suffix' => 'h',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                        [
                            'name' => 'mu',
                            'label' => 'Specific growth rate',
                            'type' => 'number',
                            'suffix' => 'h⁻¹',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'doubling_h',
                            'label' => 'Doubling time',
                            'type' => 'number',
                            'suffix' => 'h',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'generations',
                            'label' => 'Generations',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cells_end',
                            'label' => 'Cell density at the end',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
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
            'title' => 'Rate',
            'results' => ['mu' => '(log(od_end)-log(od_start))/hours', 'doubling_h' => '0.6931471805599453/((log(od_end)-log(od_start))/hours)', 'generations' => '(log(od_end)-log(od_start))/0.6931471805599453', 'cells_end' => 'od_end*800000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The specific growth rate µ is the slope of ln(OD) against time, and it is the standard way to compare growth conditions. It returns specific growth rate, doubling time, generations and cell density at the end, and the panel shows all of them at once.
        
        This calculator computes it from a series of OD readings, with the doubling time and the generation count that follow from it.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Specific Growth Rate from OD Readings', 'html' => <<<'TXT'
            <p>µ = ln(OD_end ÷ OD_start) ÷ Δt</p>
            <figure class="calc-figure"><img src="/uploads/biology/specific-growth-rate-from-od.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Specific Growth Rate from OD Readings — ln(OD) against time: the slope is the growth rate." title="Specific Growth Rate from OD Readings"><figcaption>ln(OD) against time: the slope is the growth rate.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>OD</code></td><td>absorbance at 600 nm</td><td>AU</td></tr><tr><td><code>µ</code></td><td>specific growth rate</td><td>h⁻¹</td></tr><tr><td><code>Δt</code></td><td>time between readings</td><td>h</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Specific Growth Rate from OD Readings?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: od at start of <strong>0.05</strong>, od at end of <strong>0.9</strong>, time between readings of <strong>3</strong> h.</p>
            <p>Substituting them into the formula gives specific growth rate of <strong>0.9635</strong> h⁻¹, doubling time of <strong>0.7194</strong> h, generations of <strong>4.17</strong>, cell density at the end of <strong>720,000,000</strong> cells/mL.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>µ above 0.6 h⁻¹</td><td><strong>Fast</strong></td><td>rich medium, optimal temperature</td></tr><tr><td>µ 0.3 – 0.6 h⁻¹</td><td><strong>Moderate</strong></td><td>typical of minimal medium with a good carbon source</td></tr><tr><td>µ below 0.3 h⁻¹</td><td><strong>Slow</strong></td><td>stress, a poor carbon source, or a suboptimal temperature</td></tr></tbody></table>
            <ul><li><p>Doubling time is ln2/µ — 0.693 divided by the rate — not 1/µ. Mixing the two is the most common error in growth-rate reporting.</p></li><li><p>Take at least three readings across log phase and fit a line rather than using two points; two points hide the moment the culture leaves exponential growth.</p></li><li><p>µ is temperature- and medium-dependent; a Q10-style comparison only makes sense when nothing else changed.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using OD values below 0.05, where the blank error dominates.</li><li>Fitting a line through lag, log and stationary points together.</li><li>Reporting 1/µ as the doubling time.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the difference between µ and the doubling time?', 'a' => 'µ is the rate of exponential increase per unit time; doubling time is the time to double, ln2/µ.'],
            ['q' => 'Can I use this for mammalian cells?', 'a' => 'Yes, provided the readings are in the linear range or replaced by cell counts.'],
            ['q' => 'What does the Specific Growth Rate from OD Readings actually calculate?', 'a' => <<<'TXT'
            It returns specific growth rate, doubling time, generations and cell density at the end. Each one is derived by the formula on this page, so you can check any figure by hand.
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
