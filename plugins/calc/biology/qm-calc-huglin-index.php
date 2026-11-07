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
    'meta' => ['title' => 'Huglin Index Calculator — Formula & Results', 'description' => 'Huglin Index works out Huglin index and Climate class (1 very cool … 6 too hot) from Mean daily maximum, Mean daily temperature and Base temperature.', 'h1' => 'Huglin Index Calculator', 'updated' => '2026-10-29'],
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
        Huglin Index works out Huglin index and Climate class (1 very cool … 6 too hot) from Mean daily maximum, Mean daily temperature and Base temperature. Nothing is looked up on this page: Huglin index is computed from Mean daily maximum and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Huglin Index calculator works', 'html' => <<<'TXT'
            <p>The Huglin Index calculator applies one relationship to 5 numbers and reports Huglin index, Climate class (1 very cool … 6 too hot) and Contribution per day.</p><p>The relationship it solves reads Contribution per day = Daylength coefficient (K) × ((max(0,Mean daily maximum − Base temperature) + max(0,Mean daily temperature − Base temperature)) ÷ 2).</p><p>The answers are Huglin index, Climate class (1 very cool … 6 too hot) and Contribution per day; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Mean daily maximum</strong> — in °C. April–September in the north</li><li><strong>Mean daily temperature</strong> — in °C</li><li><strong>Base temperature</strong> — in °C</li><li><strong>Days in the growing period</strong> — in days</li><li><strong>Daylength coefficient (K)</strong> — a plain number, no unit. 1.02 below 40° latitude, 1.00 above</li></ul><p>The result boxes are Huglin index, Climate class (1 very cool … 6 too hot), Contribution per day in °C·day; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Mean daily maximum = 26 °C, Mean daily temperature = 18 °C, Base temperature = 10 °C, Days in the growing period = 180 days and Daylength coefficient (K) = 1.02 — through the same formula and the panel reports &lt;strong&gt;Contribution per day&lt;/strong&gt; = 12.24 °C·day, &lt;strong&gt;Huglin index&lt;/strong&gt; = 2203 and &lt;strong&gt;Climate class (1 very cool … 6 too hot)&lt;/strong&gt; = 4.</p><ul><li><strong>Contribution per day</strong> = 12.24 °C·day</li><li><strong>Huglin index</strong> = 2203</li><li><strong>Climate class (1 very cool … 6 too hot)</strong> = 4</li></ul><p>That is <strong>Contribution per day</strong> = <code>Daylength coefficient (K) × ((max(0,Mean daily maximum − Base temperature) + max(0,Mean daily temperature − Base temperature)) ÷ 2)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Contribution per day&lt;/strong&gt; = 12.24, &lt;strong&gt;Huglin index&lt;/strong&gt; = 2203 and &lt;strong&gt;Climate class (1 very cool … 6 too hot)&lt;/strong&gt; = 4. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Huglin index is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Contribution per day</strong> = <code>Daylength coefficient (K) × ((max(0,Mean daily maximum − Base temperature) + max(0,Mean daily temperature − Base temperature)) ÷ 2)</code></li><li><strong>Huglin index</strong> = <code>Daylength coefficient (K) × ((max(0,Mean daily maximum − Base temperature) + max(0,Mean daily temperature − Base temperature)) ÷ 2) × Days in the growing period</code></li></ul><p>Any one of Contribution per day, Huglin index and Climate class (1 very cool … 6 too hot) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Mean daily maximum, from 26 to 52 — and the answers go from &lt;strong&gt;Contribution per day&lt;/strong&gt; 12.24 °C·day, &lt;strong&gt;Huglin index&lt;/strong&gt; 2203 and &lt;strong&gt;Climate class (1 very cool … 6 too hot)&lt;/strong&gt; 4 to &lt;strong&gt;Contribution per day&lt;/strong&gt; 25.5 °C·day, &lt;strong&gt;Huglin index&lt;/strong&gt; 4590 and &lt;strong&gt;Climate class (1 very cool … 6 too hot)&lt;/strong&gt; 6.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Huglin index, Climate class (1 very cool … 6 too hot) and Contribution per day are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Mean daily maximum to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Mean daily maximum, Mean daily temperature and Base temperature measured, Huglin index and Climate class (1 very cool … 6 too hot) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cricket-chirp-thermometer">Crickets chirping thermometer Calculator</a>, <a href="/biology/crop-coefficient">Crop Coefficient Calculator</a> and <a href="/biology/crop-water-requirement">Crop Water Requirement (ETc) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Huglin Index calculator work out?', 'a' => <<<'TXT'
            Huglin index, Climate class (1 very cool … 6 too hot) and Contribution per day, from Daylength coefficient (K), Mean daily maximum, Base temperature and Mean daily temperature. The relationship is Contribution per day = Daylength coefficient (K) × ((max(0,Mean daily maximum − Base temperature) + max(0,Mean daily temperature − Base temperature)) ÷ 2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mean daily maximum (°C), Mean daily temperature (°C), Base temperature (°C), Days in the growing period (days), Daylength coefficient (K). With tmax, tmean and base in place, Huglin index can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Contribution per day, Huglin index and Climate class (1 very cool … 6 too hot) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Contribution per day = 12.24 °C·day, Huglin index = 2203 and Climate class (1 very cool … 6 too hot) = 4. The figures come from Mean daily maximum as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Huglin index is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mean daily maximum blank and the page solves for it, reporting Huglin index instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Huglin index keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/cricket-chirp-thermometer', 'name' => 'Crickets chirping thermometer Calculator'],
            ['path' => '/biology/crop-coefficient', 'name' => 'Crop Coefficient Calculator'],
            ['path' => '/biology/crop-water-requirement', 'name' => 'Crop Water Requirement (ETc) Calculator'],
        ],
        'authors' => [],
    ],
];
