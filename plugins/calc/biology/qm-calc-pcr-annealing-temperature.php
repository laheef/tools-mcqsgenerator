<?php

/**
 * PCR Annealing Temperature Calculator
 * /biology/pcr-annealing-temperature
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PCR Annealing Temperature Calculator',
    'meta' => ['title' => 'PCR Annealing Temperature Calculator — Biology', 'description' => 'Annealing temperature is the one PCR variable worth calculating: too low and you get primer dimers and non-specific bands, too high and you get nothing.', 'h1' => 'PCR Annealing Temperature Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'tm_f',
                            'label' => 'Forward primer Tm',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'tm_r',
                            'label' => 'Reverse primer Tm',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'offset',
                            'label' => 'Offset below the lower Tm',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => '3–5 °C is standard',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'product',
                            'label' => 'Product length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '400',
                        ],
                        [
                            'name' => 'ta',
                            'label' => 'Annealing temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gradient_low',
                            'label' => 'Gradient low',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gradient_high',
                            'label' => 'Gradient high',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tm_gap',
                            'label' => 'Tm difference',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'extension_s',
                            'label' => 'Extension time (Taq, 1 min per kb)',
                            'type' => 'number',
                            'suffix' => 's',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cycles_time',
                            'label' => 'Cycling time for 30 cycles',
                            'type' => 'number',
                            'suffix' => 'min',
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
            'title' => 'Annealing',
            'results' => [
                'ta' => 'min(tm_f,tm_r)-offset',
                'gradient_low' => 'min(tm_f,tm_r)-offset-3',
                'gradient_high' => 'min(tm_f,tm_r)-offset+3',
                'tm_gap' => 'max(tm_f,tm_r)-min(tm_f,tm_r)',
                'extension_s' => 'max(15,product/1000*60)',
                'cycles_time' => '30*(max(tm_f,tm_r)-min(tm_f,tm_r)+max(15,product/1000*60))/60',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Annealing temperature is the one PCR variable worth calculating: too low and you get primer dimers and non-specific bands, too high and you get nothing. It returns annealing temperature, gradient low, gradient high and tm difference, and the panel shows all of them at once.
        
        This calculator uses the primer pair's melting temperatures, the salt and the product length to suggest a starting temperature and a gradient to test.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the PCR Annealing Temperature', 'html' => <<<'TXT'
            <p>Ta = min(Tm) − 5 °C; test a gradient of Ta ± 3 °C</p>
            <figure class="calc-figure"><img src="/uploads/biology/pcr-annealing-temperature.svg" width="720" height="300" loading="lazy" alt="Animated diagram: PCR Annealing Temperature Calculator — Annealing temperature against the primers' melting temperatures." title="PCR Annealing Temperature Calculator"><figcaption>Annealing temperature against the primers' melting temperatures.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>Tm</code></td><td>melting temperature of each primer</td><td>°C</td></tr><tr><td><code>offset</code></td><td>how far below Tm to anneal</td><td>°C</td></tr><tr><td><code>Ta</code></td><td>annealing temperature</td><td>°C</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the PCR Annealing Temperature?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: forward primer tm of <strong>60</strong>°C, reverse primer tm of <strong>60</strong>°C, offset below the lower tm of <strong>5</strong>°C, product length of <strong>400</strong> bp.</p>
            <p>Substituting them into the formula gives annealing temperature of <strong>55</strong>°C, gradient low of <strong>52</strong>°C, gradient high of <strong>58</strong>°C, tm difference of <strong>0</strong>°C, extension time (taq, 1 min per kb) of <strong>24</strong> s, cycling time for 30 cycles of <strong>12</strong> min.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>Tm gap under 2 °C</td><td><strong>Good pair</strong></td><td>both primers anneal at the same temperature</td></tr><tr><td>2 – 5 °C</td><td><strong>Acceptable</strong></td><td>use the lower Tm and expect reduced efficiency</td></tr><tr><td>above 5 °C</td><td><strong>Poor pair</strong></td><td>redesign; a long product will not amplify efficiently</td></tr></tbody></table>
            <ul><li><p>Use the lower of the two Tms, and 5 °C below it as a starting point. The first cycles matter more than the rest, so a two-step or touchdown protocol can rescue a difficult pair.</p></li><li><p>Salt matters: Tm rises about 16.6 °C per log unit of monovalent cation concentration, so a primer quoted in 50 mM Na⁺ is not the same in a 1× Q5 buffer.</p></li><li><p>Add 3 °C if the primers are longer than 22 nt or the product is GC-rich; subtract it for AT-rich templates.</p></li><li><p>Two-step PCR (denature, then anneal/extend at 68–72 °C) is becoming standard for high-fidelity polymerases that extend quickly.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Averaging the two Tms instead of using the lower one.</li><li>Using the manufacturer's default 60 °C for every pair — it works often enough to hide the pairs it fails.</li><li>Changing several variables at once when a single gradient would identify the problem.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/oligo-tm-calculator">Oligo Tm</a>. <a href="/biology/pcr-master-mix-calculator">PCR master mix</a>. <a href="/biology/gc-content-calculator">GC content</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Should annealing temperature be higher or lower than Tm?', 'a' => 'Lower, usually 3–5 °C below the lower primer\'s Tm.'],
            ['q' => 'Why does my product vanish at higher annealing temperatures?', 'a' => 'Because the primers no longer bind; the temperature is above their Tm in your buffer.'],
            ['q' => 'What is a touchdown PCR?', 'a' => 'A program that starts 10 °C above the annealing temperature and steps down, which favours the specific product early and prevents primer dimers later.'],
            ['q' => 'What does the PCR Annealing Temperature actually calculate?', 'a' => <<<'TXT'
            It returns annealing temperature, gradient low, gradient high and tm difference. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];
