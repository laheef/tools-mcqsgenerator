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
    'meta' => ['title' => 'Days to Maturity Calculator — Formula & Results', 'description' => 'Days to Maturity works out Harvest day of year and Harvest month from Sowing day of year, Days to maturity and GDD to maturity. Harvest day of year, Harvest…', 'h1' => 'Days to Maturity Calculator', 'updated' => '2026-10-29'],
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
        Days to Maturity works out Harvest day of year and Harvest month from Sowing day of year, Days to maturity and GDD to maturity. Nothing is looked up on this page: Harvest day of year is computed from Sowing day of year and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Harvest day of year is opened in day; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Days to Maturity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Days to Maturity: it takes 4 numbers and reports Harvest day of year, Harvest month and Days implied by the GDD target.</p><p>Written with the labels from the form, Harvest day of year = Sowing day of year + Days to maturity.</p><p>The result panel carries Harvest day of year, Harvest month, Days implied by the GDD target and Days remaining after harvest (season 220 days), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Sowing day of year</strong> — in day. 1 January = 1</li><li><strong>Days to maturity</strong> — in days</li><li><strong>GDD to maturity</strong> — in GDD. Optional — use instead of days</li><li><strong>Average GDD per day</strong> — in GDD/day</li></ul><p>What you get back is Harvest day of year in day, Harvest month, Days implied by the GDD target in days, Days remaining after harvest (season 220 days) in days, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Sowing day of year = 120 day, Days to maturity = 95 days, GDD to maturity = 1400 GDD and Average GDD per day = 13 GDD/day gives &lt;strong&gt;Harvest day of year&lt;/strong&gt; = 215 day, &lt;strong&gt;Harvest month&lt;/strong&gt; = 8, &lt;strong&gt;Days implied by the GDD target&lt;/strong&gt; = 108 days and &lt;strong&gt;Days remaining after harvest (season 220 days)&lt;/strong&gt; = 5 days.</p><ul><li><strong>Harvest day of year</strong> = 215 day</li><li><strong>Harvest month</strong> = 8</li><li><strong>Days implied by the GDD target</strong> = 108 days</li><li><strong>Days remaining after harvest (season 220 days)</strong> = 5 days</li></ul><p>That is <strong>Harvest day of year</strong> = <code>Sowing day of year + Days to maturity</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Harvest day of year&lt;/strong&gt; = 215, &lt;strong&gt;Harvest month&lt;/strong&gt; = 8, &lt;strong&gt;Days implied by the GDD target&lt;/strong&gt; = 108 and &lt;strong&gt;Days remaining after harvest (season 220 days)&lt;/strong&gt; = 5. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Harvest day of year is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Harvest day of year</strong> = <code>Sowing day of year + Days to maturity</code></li><li><strong>Harvest month</strong> = <code>min(12,1 + round((Sowing day of year + Days to maturity − 15) ÷ 30))</code></li><li><strong>Days implied by the GDD target</strong> = <code>GDD to maturity ÷ Average GDD per day</code></li><li><strong>Days remaining after harvest (season 220 days)</strong> = <code>220 − (Sowing day of year + Days to maturity)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Harvest day of year, Harvest month and Days implied by the GDD target can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Sowing day of year, from 120 to 240 — and the answers go from &lt;strong&gt;Harvest day of year&lt;/strong&gt; 215 day, &lt;strong&gt;Harvest month&lt;/strong&gt; 8, &lt;strong&gt;Days implied by the GDD target&lt;/strong&gt; 108 days and &lt;strong&gt;Days remaining after harvest (season 220 days)&lt;/strong&gt; 5 days to &lt;strong&gt;Harvest day of year&lt;/strong&gt; 335 day, &lt;strong&gt;Harvest month&lt;/strong&gt; 12, &lt;strong&gt;Days implied by the GDD target&lt;/strong&gt; 108 days and &lt;strong&gt;Days remaining after harvest (season 220 days)&lt;/strong&gt; -115 days.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Harvest day of year, Harvest month and Days implied by the GDD target are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Sowing day of year and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Sowing day of year, Days to maturity and GDD to maturity and the number you are missing is Harvest day of year and Harvest month.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/qpcr-efficiency">qPCR efficiency Calculator</a>, <a href="/biology/quadrat-sampling-density">Quadrat Sampling Density Calculator</a> and <a href="/biology/rabbit-cage-size">Rabbit cage size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Days to Maturity calculator work out?', 'a' => <<<'TXT'
            Harvest day of year, Harvest month, Days implied by the GDD target and Days remaining after harvest (season 220 days), from Sowing day of year and Days to maturity. The relationship is Harvest day of year = Sowing day of year + Days to maturity.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sowing day of year (day), Days to maturity (days), GDD to maturity (GDD), Average GDD per day (GDD/day). With sow_day, dtm and gdd_target in place, Harvest day of year can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Harvest day of year, Harvest month, Days implied by the GDD target and Days remaining after harvest (season 220 days) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Harvest day of year = 215 day, Harvest month = 8, Days implied by the GDD target = 108 days and Days remaining after harvest (season 220 days) = 5 days. The figures come from Sowing day of year as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Harvest day of year is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Sowing day of year blank and the page solves for it, reporting Harvest day of year instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Harvest day of year at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/qpcr-efficiency', 'name' => 'qPCR efficiency Calculator'],
            ['path' => '/biology/quadrat-sampling-density', 'name' => 'Quadrat Sampling Density Calculator'],
            ['path' => '/biology/rabbit-cage-size', 'name' => 'Rabbit cage size'],
        ],
        'authors' => [],
    ],
];
