<?php

/**
 * Days to Maturity Calculator
 * /biology/days-to-maturity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Days to Maturity Calculator',
    'meta' => ['title' => 'Days to Maturity Calculator — Formula & Results', 'description' => 'Days to maturity tells you whether a crop will finish before the season does. It returns harvest day of year, harvest month, days implied by the GDD target…', 'h1' => 'Days to Maturity Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'sow_day',
                            'label' => 'Sowing day of year',
                            'type' => 'number',
                            'suffix' => 'day',
                            'help' => '1 January = 1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'dtm',
                            'label' => 'Days to maturity',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '95',
                        ],
                        [
                            'name' => 'gdd_target',
                            'label' => 'GDD to maturity',
                            'type' => 'number',
                            'suffix' => 'GDD',
                            'help' => 'Optional — use instead of days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1400',
                        ],
                        [
                            'name' => 'gdd_per_day',
                            'label' => 'Average GDD per day',
                            'type' => 'number',
                            'suffix' => 'GDD/day',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '13',
                        ],
                        [
                            'name' => 'harvest_day',
                            'label' => 'Harvest day of year',
                            'type' => 'number',
                            'suffix' => 'day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'harvest_month',
                            'label' => 'Harvest month',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gdd_days',
                            'label' => 'Days implied by the GDD target',
                            'type' => 'number',
                            'suffix' => 'days',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'slack',
                            'label' => 'Days remaining after harvest (season 220 days)',
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
            'title' => 'Maturity',
            'results' => ['harvest_day' => 'sow_day+dtm', 'harvest_month' => 'min(12,1+round((sow_day+dtm-15)/30))', 'gdd_days' => 'gdd_target/gdd_per_day', 'slack' => '220-(sow_day+dtm)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Days to maturity tells you whether a crop will finish before the season does. It returns harvest day of year, harvest month, days implied by the GDD target and days remaining after harvest (season 220 days), and the panel shows all of them at once.
        
        This calculator converts a variety's maturity rating into a calendar date, adjusting for sowing date and the heat the season is actually delivering.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Days to Maturity', 'html' => <<<'TXT'
            <p>Harvest day = sowing day + days to maturity</p>
            <figure class="calc-figure"><img src="/uploads/biology/days-to-maturity.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Days to Maturity Calculator — Sowing date plus maturity rating gives the harvest date." title="Days to Maturity Calculator"><figcaption>Sowing date plus maturity rating gives the harvest date.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>sowing day</code></td><td>day of year the crop was sown</td><td>day</td></tr><tr><td><code>DTM</code></td><td>days to maturity for the variety</td><td>days</td></tr><tr><td><code>GDD</code></td><td>heat required, an alternative to DTM</td><td>°C·day</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Days to Maturity?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: sowing day of year of <strong>120</strong> day, days to maturity of <strong>95</strong> days, gdd to maturity of <strong>1,400</strong> GDD, average gdd per day of <strong>13</strong> GDD/day.</p>
            <p>Substituting them into the formula gives harvest day of year of <strong>215</strong> day, harvest month of <strong>8</strong>, days implied by the gdd target of <strong>107.69</strong> days, days remaining after harvest (season 220 days) of <strong>5</strong> days.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Catalogue days-to-maturity ratings assume a reference temperature; a cool season stretches them and a hot one shortens them, which is why GDD is the better input.</p></li><li><p>Divide the GDD target by the average daily accumulation to get days — a crop needing 1 400 GDD at 13 GDD/day takes about 108 days.</p></li><li><p>Late sowing in a shortening season often needs a shorter-maturity variety rather than more inputs.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Counting from emergence in one place and from sowing in another.</li><li>Using last year's GDD accumulation for this year's forecast.</li><li>Assuming a fixed harvest date ignores the difference between physiological and harvest maturity.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does days to maturity mean?', 'a' => 'The number of days from sowing (or transplanting) to a marketable or physiologically mature crop.'],
            ['q' => 'Why does my crop mature later than the packet says?', 'a' => 'Cooler than expected weather; the rating assumes a reference temperature.'],
            ['q' => 'What does the Days to Maturity actually calculate?', 'a' => <<<'TXT'
            It returns harvest day of year, harvest month, days implied by the GDD target and days remaining after harvest (season 220 days). Each one is derived by the formula on this page, so you can check any figure by hand.
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
