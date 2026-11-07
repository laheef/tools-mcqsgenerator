<?php

/**
 * Growing Degree Days Calculator
 * /biology/growing-degree-days
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Growing Degree Days Calculator',
    'meta' => ['title' => 'Growing Degree Days Calculator — Formula & Results', 'description' => 'Growing degree days count the heat a crop has accumulated above its base temperature. It returns growing degree days for the day, over seven days at this…', 'h1' => 'Growing Degree Days Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'method',
                            'label' => 'Method',
                            'type' => 'select',
                            'options' => ['Mean temperature, no cap' => '0', 'Cap the maximum at the upper cut-off' => '1'],
                            'default' => 'Mean temperature, no cap',
                        ],
                        [
                            'name' => 'tmax',
                            'label' => 'Daily maximum',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '33',
                        ],
                        [
                            'name' => 'tmin',
                            'label' => 'Daily minimum',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'base',
                            'label' => 'Base temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => '10 °C for maize, 5 °C for wheat',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'upper',
                            'label' => 'Upper cut-off',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => 'Growth stops above this in many models',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'gdd',
                            'label' => 'Growing degree days for the day',
                            'type' => 'number',
                            'suffix' => 'GDD',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gdd_week',
                            'label' => 'Over seven days at this weather',
                            'type' => 'number',
                            'suffix' => 'GDD',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'since_sowing',
                            'label' => 'Accumulated over 60 days',
                            'type' => 'number',
                            'suffix' => 'GDD',
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
            'title' => 'Degree days',
            'results' => ['gdd' => 'if_else(method>0,max(0,(min(tmax,upper)+tmin)/2-base),max(0,(tmax+tmin)/2-base))', 'gdd_week' => 'if_else(method>0,max(0,(min(tmax,upper)+tmin)/2-base),max(0,(tmax+tmin)/2-base))*7', 'since_sowing' => 'if_else(method>0,max(0,(min(tmax,upper)+tmin)/2-base),max(0,(tmax+tmin)/2-base))*60'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Growing degree days count the heat a crop has accumulated above its base temperature. It returns growing degree days for the day, over seven days at this weather and accumulated over 60 days, and the panel shows all of them at once.
        
        They predict development far better than calendar days do, which is why sowing dates, variety maturity and pest emergence are all scheduled on them.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Growing Degree Days', 'html' => <<<'TXT'
            <p>GDD = max(0, (T_max + T_min)/2 − T_base)</p>
            <figure class="calc-figure"><img src="/uploads/biology/growing-degree-days.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Growing Degree Days Calculator — Degree days accumulating across a season." title="Growing Degree Days Calculator"><figcaption>Degree days accumulating across a season.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>T_max, T_min</code></td><td>daily maximum and minimum air temperature</td><td>°C</td></tr><tr><td><code>T_base</code></td><td>temperature below which development stops</td><td>°C</td></tr><tr><td><code>GDD</code></td><td>degree days accumulated in one day</td><td>°C·day</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Growing Degree Days?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: method set to <strong>0.0</strong>, daily maximum of <strong>33</strong>°C, daily minimum of <strong>12</strong>°C, base temperature of <strong>10</strong>°C, upper cut-off of <strong>30</strong>°C.</p>
            <p>Substituting them into the formula gives growing degree days for the day of <strong>12.5</strong> GDD, over seven days at this weather of <strong>87.5</strong> GDD, accumulated over 60 days of <strong>750</strong> GDD.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0 GDD</td><td><strong>No development</strong></td><td>below the base temperature all day</td></tr><tr><td>5 – 15 GDD/day</td><td><strong>Normal growing weather</strong></td><td>typical of a temperate summer</td></tr><tr><td>above 25 GDD/day</td><td><strong>Very rapid</strong></td><td>heat that may also stress the crop</td></tr></tbody></table>
            <ul><li><p>Base temperatures are crop-specific: 0 °C for cool-season grasses, 5 °C for wheat, 10 °C for maize and soybean, 15.5 °C for cotton.</p></li><li><p>The upper cut-off matters in hot climates: without it, a 40 °C day adds heat the plant cannot use and maturity predictions come out early.</p></li><li><p>Accumulate from sowing, not from 1 January, if you are timing a crop rather than a season.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using the mean of hourly readings instead of the daily maximum and minimum.</li><li>Mixing Fahrenheit maxima with Celsius minima.</li><li>Assuming a single GDD target fits every variety — early and late maturities differ by hundreds of degree days.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many GDD does maize need to mature?', 'a' => 'About 2 400–2 800 GDD (50 °F base) depending on the hybrid; in Celsius-base-10 terms, roughly 1 300–1 500.'],
            ['q' => 'What if the minimum is below the base temperature?', 'a' => 'The standard method still uses the daily mean; more refined models floor each half-day at the base temperature.'],
            ['q' => 'What does the Growing Degree Days actually calculate?', 'a' => <<<'TXT'
            It returns growing degree days for the day, over seven days at this weather and accumulated over 60 days. Each one is derived by the formula on this page, so you can check any figure by hand.
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
