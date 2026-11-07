<?php

/**
 * Chicken Hatch Date Calculator
 * /biology/chicken-hatch-date
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Chicken Hatch Date Calculator',
    'meta' => ['title' => 'Chicken Hatch Date Calculator — Formula & Results', 'description' => 'Chicken eggs hatch 21 days after they are set, with a one-day window either side. It returns days remaining, candle on day, stop turning on day and hatch day…', 'h1' => 'Chicken Hatch Date Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'set_day',
                            'label' => 'Day of month you set the eggs',
                            'type' => 'number',
                            'suffix' => 'day',
                            'help' => '1–31',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'set_month',
                            'label' => 'Month',
                            'type' => 'number',
                            'suffix' => 'month',
                            'help' => '1 = January, 12 = December',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'elapsed',
                            'label' => 'Days already incubated',
                            'type' => 'number',
                            'suffix' => 'days',
                            'help' => 'Leave 0 if you set them today',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'hatch_day',
                            'label' => 'Hatch day (day of month)',
                            'type' => 'number',
                            'suffix' => 'day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hatch_month',
                            'label' => 'Hatch month',
                            'type' => 'number',
                            'suffix' => 'month',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_days',
                            'label' => 'Incubation period',
                            'type' => 'number',
                            'suffix' => 'days',
                            'help' => '21 for chickens, 28 duck, 28–30 goose',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '21',
                        ],
                        [
                            'name' => 'remaining',
                            'label' => 'Days remaining',
                            'type' => 'number',
                            'suffix' => 'days',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'candle_at',
                            'label' => 'Candle on day',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'lockdown_at',
                            'label' => 'Stop turning on day',
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
            'title' => 'Timeline',
            'results' => [
                'remaining' => 'total_days-elapsed',
                'candle_at' => '7',
                'lockdown_at' => 'total_days-3',
                'hatch_day' => 'set_day+total_days',
                'hatch_month' => 'set_month+0',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Chicken eggs hatch 21 days after they are set, with a one-day window either side. It returns days remaining, candle on day, stop turning on day and hatch day (day of month), and the panel shows all of them at once.
        
        This calculator counts forward from the day you set the eggs to the hatch date, tells you which incubation stage the eggs are at today, and flags the days when you should candle and when to stop turning.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Chicken Hatch Date', 'html' => <<<'TXT'
            <p>Hatch date = set date + 21 days; lockdown (stop turning, raise humidity) at day 18</p>
            <figure class="calc-figure"><img src="/uploads/biology/chicken-hatch-date.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Chicken Hatch Date Calculator — Set date plus incubation period lands on hatch day." title="Chicken Hatch Date Calculator"><figcaption>Set date plus incubation period lands on hatch day.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>set date</code></td><td>the day the eggs went in</td><td>date</td></tr><tr><td><code>total_days</code></td><td>incubation period for the species</td><td>days</td></tr><tr><td><code>hatch date</code></td><td>expected hatch</td><td>date</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Chicken Hatch Date?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: day of month you set the eggs of <strong>1</strong> day, month of <strong>4</strong> month, days already incubated of <strong>0</strong> days, incubation period of <strong>21</strong> days.</p>
            <p>Substituting them into the formula gives days remaining of <strong>21</strong> days, candle on day of <strong>7</strong>, stop turning on day of <strong>18</strong>, hatch day (day of month) of <strong>22</strong> day, hatch month of <strong>4</strong> month.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>day 1 – 7</td><td><strong>Setting</strong></td><td>temperature and humidity stabilising</td></tr><tr><td>day 7 – 10</td><td><strong>Candling</strong></td><td>clear eggs can be removed</td></tr><tr><td>day 18</td><td><strong>Lockdown</strong></td><td>stop turning, raise humidity to 65–70%</td></tr><tr><td>day 21</td><td><strong>Hatch</strong></td><td>chicks emerge over 12–24 hours</td></tr></tbody></table>
            <ul><li><p>The hatch date moves by up to a day either way with temperature: a forced-air incubator running 0.5 °C cool can add a day, and a still-air one can finish early.</p></li><li><p>If you set eggs on several days, treat each batch separately — a two-day spread becomes a two-day spread at hatch.</p></li><li><p>Month arithmetic here is a plain addition of the day number; if the sum passes the end of the month, count into the next month when you plan your calendar.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Counting the set day as day 1 when the eggs went in late in the evening.</li><li>Leaving the turner on past day 18, which is a common cause of malpositioned chicks.</li><li>Opening the incubator during hatch, which drops humidity exactly when the chicks need it.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>Most real jobs need two or three of these together:</p><p><a href="/biology/egg-incubation-hatch-date">Egg incubation hatch date</a>. <a href="/biology/hatch-rate">Hatch rate</a>. <a href="/biology/chicken-years-to-human-years">Chicken years to human years</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How long do chicken eggs take to hatch?', 'a' => '21 days at 37.5 °C in a forced-air incubator. Ducks take 28, quail 17–18, geese 28–30.'],
            ['q' => 'What is lockdown?', 'a' => 'The last three days, when turning stops, humidity goes up to about 65–70% and the incubator stays closed.'],
            ['q' => 'What does the Chicken Hatch Date actually calculate?', 'a' => <<<'TXT'
            It returns days remaining, candle on day, stop turning on day and hatch day (day of month). Each one is derived by the formula on this page, so you can check any figure by hand.
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
