<?php

/**
 * Logistic Population Growth Calculator
 * /biology/logistic-population-growth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Logistic Population Growth Calculator',
    'meta' => ['title' => 'Logistic Population Growth Calculator — Biology', 'description' => 'Logistic growth starts exponential and slows as a population approaches its carrying capacity. It returns population after that time, growth rate at the…', 'h1' => 'Logistic Population Growth Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'n0',
                            'label' => 'Starting population',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'k',
                            'label' => 'Carrying capacity',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'r',
                            'label' => 'Intrinsic growth rate',
                            'type' => 'number',
                            'suffix' => 'per unit time',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.4',
                        ],
                        [
                            'name' => 't',
                            'label' => 'Time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'n',
                            'label' => 'Population after that time',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'growth',
                            'label' => 'Growth rate at the start',
                            'type' => 'number',
                            'suffix' => 'individuals/time',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'n_half',
                            'label' => 'Population at half of K',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 't_half',
                            'label' => 'Time to reach K/2',
                            'type' => 'number',
                            'suffix' => 'time units',
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
            'results' => ['n' => 'k/(1+((k-n0)/n0)*exp(-1*r*t))', 'growth' => 'r*n0*(1-n0/k)', 'n_half' => 'k/2', 't_half' => 'log((k/(k/2))-1)/((k-n0)/n0)/r'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Logistic growth starts exponential and slows as a population approaches its carrying capacity. It returns population after that time, growth rate at the start, population at half of K and time to reach K/2, and the panel shows all of them at once.
        
        This calculator projects the population size forward, gives the growth rate at the current size, and shows when the population reaches half of K — the point of fastest growth.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Logistic Population Growth', 'html' => <<<'TXT'
            <p>N(t) = K ÷ [1 + ((K − N₀) ÷ N₀) e^(−rt)]</p>
            <figure class="calc-figure"><img src="/uploads/biology/logistic-population-growth.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Logistic Population Growth Calculator — The S-shaped curve, from exponential to a plateau at K." title="Logistic Population Growth Calculator"><figcaption>The S-shaped curve, from exponential to a plateau at K.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>N₀</code></td><td>starting population</td><td>individuals</td></tr><tr><td><code>K</code></td><td>carrying capacity</td><td>individuals</td></tr><tr><td><code>r</code></td><td>intrinsic rate of increase</td><td>per time</td></tr><tr><td><code>t</code></td><td>time elapsed</td><td>time units</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Logistic Population Growth?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: starting population of <strong>50</strong> individuals, carrying capacity of <strong>1,000</strong> individuals, intrinsic growth rate of <strong>0.4</strong> per unit time, time of <strong>10</strong>.</p>
            <p>Substituting them into the formula gives population after that time of <strong>741.84</strong> individuals, growth rate at the start of <strong>19</strong> individuals/time, population at half of k of <strong>500</strong> individuals, time to reach k/2 of <strong>0</strong> time units.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The inflection point is at N = K/2, where growth is fastest; after it the curve flattens toward K without ever crossing it.</p></li><li><p>r sets the speed and K sets the ceiling: a large r with a small K produces a sharp rise and an early plateau.</p></li><li><p>The model assumes a closed population with no age structure, and it ignores the lag that produces overshoot and collapse in real populations.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using a per-generation r with a time step in years.</li><li>Starting above K, where the formula predicts decline — which is correct, but often unexpected.</li><li>Mixing a percentage growth rate with the exponential r: for small rates they coincide, for large ones they do not.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the difference between exponential and logistic growth?', 'a' => 'Exponential growth has no ceiling; logistic growth slows as the population approaches K.'],
            ['q' => 'When is growth fastest?', 'a' => 'At half the carrying capacity, which is the inflection point of the sigmoid curve.'],
            ['q' => 'What does the Logistic Population Growth actually calculate?', 'a' => <<<'TXT'
            It returns population after that time, growth rate at the start, population at half of K and time to reach K/2. Each one is derived by the formula on this page, so you can check any figure by hand.
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
