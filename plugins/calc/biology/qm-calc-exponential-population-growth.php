<?php

/**
 * Exponential Population Growth Calculator
 * /biology/exponential-population-growth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Exponential Population Growth Calculator',
    'meta' => ['title' => 'Exponential Population Growth Calculator — Biology', 'description' => 'Unlimited growth follows N = N₀e^(rt): a constant per-capita rate applied to an ever larger population. It returns population after that time, increase…', 'h1' => 'Exponential Population Growth Calculator', 'updated' => '2026-10-29'],
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
                            'default' => '100',
                        ],
                        [
                            'name' => 'r',
                            'label' => 'Growth rate',
                            'type' => 'number',
                            'suffix' => 'per year',
                            'help' => '0.05 = 5% a year',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.05',
                        ],
                        [
                            'name' => 't',
                            'label' => 'Time',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
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
                            'name' => 'fold',
                            'label' => 'Increase',
                            'type' => 'number',
                            'suffix' => '×',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'doubling',
                            'label' => 'Doubling time',
                            'type' => 'number',
                            'suffix' => 'years',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'target_time',
                            'label' => 'Time to reach 10× the start',
                            'type' => 'number',
                            'suffix' => 'years',
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
            'results' => ['n' => 'n0*exp(r*t)', 'fold' => 'exp(r*t)', 'doubling' => '0.6931471805599453/r', 'target_time' => 'log(10)/r'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Unlimited growth follows N = N₀e^(rt): a constant per-capita rate applied to an ever larger population. It returns population after that time, increase, doubling time and time to reach 10× the start, and the panel shows all of them at once.
        
        This calculator projects the size, the time to a target, and the doubling time that goes with the rate.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Exponential Population Growth', 'html' => <<<'TXT'
            <p>N(t) = N₀ × e^(rt); doubling time = ln2 ÷ r</p>
            <figure class="calc-figure"><img src="/uploads/biology/exponential-population-growth.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Exponential Population Growth Calculator — Exponential growth plotted over time." title="Exponential Population Growth Calculator"><figcaption>Exponential growth plotted over time.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>N₀</code></td><td>starting population</td><td>individuals</td></tr><tr><td><code>r</code></td><td>per-capita growth rate</td><td>per time</td></tr><tr><td><code>t</code></td><td>elapsed time</td><td>time units</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Exponential Population Growth?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: starting population of <strong>100</strong> individuals, growth rate of <strong>0.05</strong> per year, time of <strong>20</strong> years.</p>
            <p>Substituting them into the formula gives population after that time of <strong>271.83</strong> individuals, increase of <strong>2.72</strong> ×, doubling time of <strong>13.86</strong> years, time to reach 10× the start of <strong>46.05</strong> years.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>A constant percentage growth rate means a constantly shrinking doubling time in absolute terms: at 5% a year the population doubles in 14 years, every time.</p></li><li><p>Compounding is why exponential curves look flat and then explode — the first doubling is invisible, the fifth is not.</p></li><li><p>Nothing grows exponentially forever; the value of the calculation is to show how quickly a limit approaches, not to predict the distant future.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Entering 5 for 5% instead of 0.05.</li><li>Mixing an annual rate with a monthly time step.</li><li>Averaging growth rates arithmetically across periods instead of exponentiating.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/logistic-population-growth">Logistic growth</a>. <a href="/biology/maximum-sustainable-yield">Maximum sustainable yield</a>. <a href="/biology/bacterial-growth-curve">Bacterial growth curve</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I find the doubling time?', 'a' => 'Divide 70 by the percentage growth rate for a quick estimate, or use ln2 ÷ r for the exact value.'],
            ['q' => 'What if r is negative?', 'a' => 'The population decays exponentially — the same formula, with a shrinking half-life instead of a doubling time.'],
            ['q' => 'What does the Exponential Population Growth actually calculate?', 'a' => <<<'TXT'
            It returns population after that time, increase, doubling time and time to reach 10× the start. Each one is derived by the formula on this page, so you can check any figure by hand.
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
