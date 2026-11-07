<?php

/**
 * Q10 Temperature Coefficient Calculator
 * /biology/q10-temperature-coefficient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Q10 Temperature Coefficient Calculator',
    'meta' => ['title' => 'Q10 Temperature Coefficient Calculator — Biology', 'description' => 'Q10 is how many times faster a biological rate runs for every 10 °C of warming. It returns Q10, rate at t1 + 10 °C and apparent activation energy, and the…', 'h1' => 'Q10 Temperature Coefficient Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'r1',
                            'label' => 'Rate at temperature 1',
                            'type' => 'number',
                            'suffix' => 'units',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 't1',
                            'label' => 'Temperature 1',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'r2',
                            'label' => 'Rate at temperature 2',
                            'type' => 'number',
                            'suffix' => 'units',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '22',
                        ],
                        [
                            'name' => 't2',
                            'label' => 'Temperature 2',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'q10',
                            'label' => 'Q10',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rate_10',
                            'label' => 'Rate at t1 + 10 °C',
                            'type' => 'number',
                            'suffix' => 'units',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'activation',
                            'label' => 'Apparent activation energy',
                            'type' => 'number',
                            'suffix' => 'kJ/mol',
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
            'title' => 'Temperature response',
            'results' => ['q10' => 'pow(r2/r1,10/(t2-t1))', 'rate_10' => 'r1*pow(r2/r1,10/(t2-t1))', 'activation' => '8.314*(t1+273.15)*(t2+273.15)/((t2+273.15)-(t1+273.15))*log(r2/r1)/1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Q10 is how many times faster a biological rate runs for every 10 °C of warming. It returns Q10, rate at t1 + 10 °C and apparent activation energy, and the panel shows all of them at once.
        
        A Q10 of 2 — the rule of thumb for most enzyme and respiration rates — means doubling per 10 °C, and it is the standard way to compare thermal sensitivity across processes.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Q10 Temperature Coefficient', 'html' => <<<'TXT'
            <p>Q10 = (R₂ ÷ R₁)^[10 ÷ (T₂ − T₁)]</p>
            <figure class="calc-figure"><img src="/uploads/biology/q10-temperature-coefficient.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Q10 Temperature Coefficient Calculator — Rate against temperature, and the fold change per 10 °C." title="Q10 Temperature Coefficient Calculator"><figcaption>Rate against temperature, and the fold change per 10 °C.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>R₁, R₂</code></td><td>rates at two temperatures</td><td>any unit</td></tr><tr><td><code>T₁, T₂</code></td><td>the two temperatures</td><td>°C</td></tr><tr><td><code>Q10</code></td><td>fold change per 10 °C</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Q10 Temperature Coefficient?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: rate at temperature 1 of <strong>10</strong> units, temperature 1 of <strong>20</strong>°C, rate at temperature 2 of <strong>22</strong> units, temperature 2 of <strong>30</strong>°C.</p>
            <p>Substituting them into the formula gives q10 of <strong>2.2</strong>, rate at t1 + 10 °c of <strong>22</strong> units, apparent activation energy of <strong>58.26</strong> kJ/mol.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1.0 – 1.5</td><td><strong>Weakly temperature dependent</strong></td><td>physical processes, diffusion</td></tr><tr><td>1.5 – 2.5</td><td><strong>Typical biological range</strong></td><td>most enzyme reactions and respiration</td></tr><tr><td>above 3</td><td><strong>Strongly temperature dependent</strong></td><td>or a rate still below its optimum</td></tr></tbody></table>
            <ul><li><p>Q10 is only meaningful over a range where the rate is monotonic: above an enzyme's optimum the rate falls with temperature and Q10 becomes less than one.</p></li><li><p>The apparent activation energy is the Arrhenius equivalent of the same measurement; 50–70 kJ/mol is typical of biological rates.</p></li><li><p>Ecosystem respiration commonly shows Q10 near 2, which is why warming of 2 °C is expected to raise soil respiration by about 15% — before acclimation.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using a temperature difference that is not exactly 10 °C without the exponent.</li><li>Mixing °C and K in the formula — differences are fine, but the activation-energy calculation needs kelvin.</li><li>Fitting Q10 across a range that includes a thermal optimum.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does Q10 = 2 mean?', 'a' => 'The rate doubles for every 10 °C increase in temperature.'],
            ['q' => 'Is Q10 constant?', 'a' => 'No — it varies with temperature and species, which is why ecologists now fit Arrhenius-type curves instead.'],
            ['q' => 'What does the Q10 Temperature Coefficient actually calculate?', 'a' => 'It returns Q10, rate at t1 + 10 °C and apparent activation energy. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
