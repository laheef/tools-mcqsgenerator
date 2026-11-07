<?php

/**
 * Huglin Index Calculator
 * /biology/huglin-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Huglin Index Calculator',
    'meta' => ['title' => 'Huglin Index Calculator — Formula & Results', 'description' => 'The Huglin index measures the heat available for grape ripening, weighting daytime temperatures more heavily than night ones. It returns contribution per day…', 'h1' => 'Huglin Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'tmax',
                            'label' => 'Mean daily maximum',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => 'April–September in the north',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '26',
                        ],
                        [
                            'name' => 'tmean',
                            'label' => 'Mean daily temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '18',
                        ],
                        [
                            'name' => 'base',
                            'label' => 'Base temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'days',
                            'label' => 'Days in the growing period',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '180',
                        ],
                        [
                            'name' => 'coef',
                            'label' => 'Daylength coefficient (K)',
                            'type' => 'number',
                            'help' => '1.02 below 40° latitude, 1.00 above',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.02',
                        ],
                        [
                            'name' => 'huglin',
                            'label' => 'Huglin index',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'class_no',
                            'label' => 'Climate class (1 very cool … 6 too hot)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_day',
                            'label' => 'Contribution per day',
                            'type' => 'number',
                            'suffix' => '°C·day',
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
            'title' => 'Huglin',
            'results' => ['per_day' => 'coef*((max(0,tmax-base)+max(0,tmean-base))/2)', 'huglin' => 'coef*((max(0,tmax-base)+max(0,tmean-base))/2)*days', 'class_no' => <<<'TXT'
            if_else(coef*((max(0,tmax-base)+max(0,tmean-base))/2)*days<=1500,1,if_else(coef*((max(0,tmax-base)+max(0,tmean-base))/2)*days<=1800,2,if_else(coef*((max(0,tmax-base)+max(0,tmean-base))/2)*days<=2100,3,if_else(coef*((max(0,tmax-base)+max(0,tmean-base))/2)*days<=2400,4,if_else(coef*((max(0,tmax-base)+max(0,tmean-base))/2)*days<=3000,5,6)))))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Huglin index measures the heat available for grape ripening, weighting daytime temperatures more heavily than night ones. It returns contribution per day, huglin index and climate class (1 very cool … 6 too hot), and the panel shows all of them at once.
        
        It is the standard climate index for matching a grape variety to a site, and it decides which varieties can ripen there.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Huglin Index', 'html' => <<<'TXT'
            <p>HI = K × [(T_max − 10) + (T_mean − 10)] ÷ 2, summed over the growing period</p>
            <figure class="calc-figure"><img src="/uploads/biology/huglin-index.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Huglin Index Calculator — The heat accumulated across the growing period." title="Huglin Index Calculator"><figcaption>The heat accumulated across the growing period.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>T_max</code></td><td>mean daily maximum</td><td>°C</td></tr><tr><td><code>T_mean</code></td><td>mean daily temperature</td><td>°C</td></tr><tr><td><code>K</code></td><td>daylength coefficient</td><td>—</td></tr><tr><td><code>HI</code></td><td>Huglin heliothermal index</td><td>°C·day</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Huglin Index?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: mean daily maximum of <strong>26</strong>°C, mean daily temperature of <strong>18</strong>°C, base temperature of <strong>10</strong>°C, days in the growing period of <strong>180</strong> days, daylength coefficient (k) of <strong>1.02</strong>.</p>
            <p>Substituting them into the formula gives contribution per day of <strong>12.24</strong> °C·day, huglin index of <strong>2,203.2</strong>, climate class (1 very cool … 6 too hot) of <strong>4</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 1 500 (class 1)</td><td><strong>Very cool</strong></td><td>early varieties only; sparkling base wines</td></tr><tr><td>1 500 – 1 800 (class 2)</td><td><strong>Cool</strong></td><td>Pinot Noir, Chardonnay, Riesling</td></tr><tr><td>1 800 – 2 100 (class 3)</td><td><strong>Temperate</strong></td><td>Cabernet Franc, Merlot, Sauvignon Blanc</td></tr><tr><td>2 100 – 2 400 (class 4)</td><td><strong>Warm</strong></td><td>Cabernet Sauvignon, Syrah, Grenache</td></tr><tr><td>2 400 – 3 000 (class 5)</td><td><strong>Very warm</strong></td><td>late-ripening Mediterranean varieties</td></tr><tr><td>above 3 000 (class 6)</td><td><strong>Too hot</strong></td><td>heat stress and irrigation become the limit</td></tr></tbody></table>
            <ul><li><p>The formula weights the maximum temperature fully, which is what distinguishes it from growing degree days.</p></li><li><p>The daylength coefficient K is 1.02 below 40° latitude and 1.00 above it, correcting for longer summer days in the south.</p></li><li><p>Huglin is usually calculated over the frost-free period from April to September in the northern hemisphere, October to March in the south.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Summing over a full year rather than the growing period.</li><li>Forgetting the K coefficient and comparing sites at different latitudes.</li><li>Using the Huglin index to compare varieties without checking their own heat requirements.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What Huglin index suits Cabernet Sauvignon?', 'a' => 'About 2 100–2 400, which is why it struggles to ripen in cool maritime climates.'],
            ['q' => 'Is Huglin better than growing degree days?', 'a' => 'For viticulture it usually is, because the extra weight on daytime heat matches ripening better than a plain mean.'],
            ['q' => 'What does the Huglin Index actually calculate?', 'a' => <<<'TXT'
            It returns contribution per day, huglin index and climate class (1 very cool … 6 too hot). Each one is derived by the formula on this page, so you can check any figure by hand.
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
