<?php

/**
 * Bacterial Growth Curve Calculator (generation time)
 * /biology/bacterial-growth-curve
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bacterial Growth Curve Calculator (generation time)',
    'meta' => ['title' => 'Bacterial Growth Curve (generation time) Calculator', 'description' => 'Two OD readings taken at two times contain everything needed to describe exponential growth: the specific growth rate, the doubling time and the number of…', 'h1' => 'Bacterial Growth Curve Calculator (generation time)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'od1',
                            'label' => 'First OD600',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.1',
                        ],
                        [
                            'name' => 'od2',
                            'label' => 'Second OD600',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.8',
                        ],
                        [
                            'name' => 't1',
                            'label' => 'First reading time',
                            'type' => 'number',
                            'suffix' => 'h',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 't2',
                            'label' => 'Second reading time',
                            'type' => 'number',
                            'suffix' => 'h',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
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
                            'name' => 'doubling',
                            'label' => 'Doubling time',
                            'type' => 'number',
                            'suffix' => 'min',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'generations',
                            'label' => 'Generations elapsed',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fold',
                            'label' => 'Fold increase',
                            'type' => 'number',
                            'suffix' => '×',
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
            'title' => 'Growth',
            'results' => ['mu' => '(log(od2)-log(od1))/(t2-t1)', 'doubling' => '0.6931471805599453/((log(od2)-log(od1))/(t2-t1))*60', 'generations' => '(log(od2)-log(od1))/0.6931471805599453', 'fold' => 'od2/od1'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Two OD readings taken at two times contain everything needed to describe exponential growth: the specific growth rate, the doubling time and the number of generations. It returns specific growth rate, doubling time, generations elapsed and fold increase, and the panel shows all of them at once.
        
        This calculator extracts them and shows the projected curve.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Bacterial Growth Curve (generation time)', 'html' => <<<'TXT'
            <p>µ = (ln OD₂ − ln OD₁) ÷ (t₂ − t₁); doubling time = ln2 ÷ µ</p>
            <figure class="calc-figure"><img src="/uploads/biology/bacterial-growth-curve.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Bacterial Growth Curve Calculator (generation time) — A straight line on a log scale, and the doubling time it implies." title="Bacterial Growth Curve Calculator (generation time)"><figcaption>A straight line on a log scale, and the doubling time it implies.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>OD</code></td><td>optical density in the linear range</td><td>AU</td></tr><tr><td><code>t</code></td><td>time of the reading</td><td>h</td></tr><tr><td><code>µ</code></td><td>specific growth rate</td><td>h⁻¹</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Bacterial Growth Curve (generation time)?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: first od600 of <strong>0.1</strong>, second od600 of <strong>0.8</strong>, first reading time of <strong>0</strong> h, second reading time of <strong>4</strong> h.</p>
            <p>Substituting them into the formula gives specific growth rate of <strong>0.5199</strong> h⁻¹, doubling time of <strong>80</strong> min, generations elapsed of <strong>3</strong>, fold increase of <strong>8</strong> ×.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 0.05</td><td><strong>Lag</strong></td><td>the culture has not started dividing</td></tr><tr><td>0.1 – 1.0</td><td><strong>Exponential</strong></td><td>the window the maths assumes</td></tr><tr><td>above 1.0</td><td><strong>Stationary approach</strong></td><td>OD is no longer linear with cell number</td></tr></tbody></table>
            <ul><li><p>The formula assumes exponential growth with no lag and no death. Use readings inside the linear OD range (0.1–1.0), taken during log phase.</p></li><li><p>µ has units of reciprocal time, so a rate of 0.7 h⁻¹ is a doubling time of about an hour.</p></li><li><p>Dilute and read again if your second OD is above 1.0: saturation bends the curve and makes µ look smaller than it is.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using readings that span the lag phase, which gives a nonsense negative rate.</li><li>Mixing OD values from different path lengths or instruments.</li><li>Reporting a doubling time without the medium and temperature it was measured in.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a typical doubling time for E. coli?', 'a' => 'About 20 minutes at 37 °C in rich medium; 60 minutes or more in minimal medium.'],
            ['q' => 'Why is my growth rate negative?', 'a' => 'The second OD is lower than the first — the culture is dying, or the readings were entered in the wrong order.'],
            ['q' => 'What does the Bacterial Growth Curve (generation time) actually calculate?', 'a' => <<<'TXT'
            It returns specific growth rate, doubling time, generations elapsed and fold increase. Each one is derived by the formula on this page, so you can check any figure by hand.
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
