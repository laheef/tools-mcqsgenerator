<?php

/**
 * Respiratory Quotient Calculator
 * /biology/respiratory-quotient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Respiratory Quotient Calculator',
    'meta' => ['title' => 'Respiratory Quotient Calculator — Formula & Results', 'description' => 'The respiratory quotient is carbon dioxide produced divided by oxygen consumed. It returns respiratory quotient, non-protein RQ, energy equivalent and fat…', 'h1' => 'Respiratory Quotient Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'co2',
                            'label' => 'CO₂ produced',
                            'type' => 'number',
                            'suffix' => 'mL/min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'o2',
                            'label' => 'O₂ consumed',
                            'type' => 'number',
                            'suffix' => 'mL/min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '250',
                        ],
                        [
                            'name' => 'rq',
                            'label' => 'Respiratory quotient',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fuel',
                            'label' => 'Non-protein RQ',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'energy',
                            'label' => 'Energy equivalent',
                            'type' => 'number',
                            'suffix' => 'kcal/L O₂',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fat_pct',
                            'label' => 'Fat share of fuel',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Gas exchange',
            'results' => ['rq' => 'co2/o2', 'fuel' => 'co2/o2', 'energy' => '5.047*co2/o2', 'fat_pct' => '(1-(co2/o2-0.7)/0.3)*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The respiratory quotient is carbon dioxide produced divided by oxygen consumed. It returns respiratory quotient, non-protein RQ, energy equivalent and fat share of fuel, and the panel shows all of them at once.
        
        It identifies which fuel a tissue is burning — 1.0 for carbohydrate, 0.7 for fat, 0.8 for protein — and it is the link between gas exchange and energy expenditure.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Respiratory Quotient', 'html' => <<<'TXT'
            <p>RQ = VCO₂ ÷ VO₂</p>
            <figure class="calc-figure"><img src="/uploads/biology/respiratory-quotient.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Respiratory Quotient Calculator — Where the ratio falls between fat and carbohydrate." title="Respiratory Quotient Calculator"><figcaption>Where the ratio falls between fat and carbohydrate.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>VCO₂</code></td><td>carbon dioxide produced</td><td>mL/min</td></tr><tr><td><code>VO₂</code></td><td>oxygen consumed</td><td>mL/min</td></tr><tr><td><code>RQ</code></td><td>respiratory quotient</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Respiratory Quotient?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: co₂ produced of <strong>200</strong> mL/min, o₂ consumed of <strong>250</strong> mL/min.</p>
            <p>Substituting them into the formula gives respiratory quotient of <strong>0.8</strong>, non-protein rq of <strong>0.8</strong>, energy equivalent of <strong>4.04</strong> kcal/L O₂, fat share of fuel of <strong>66.67</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0.7</td><td><strong>Fat</strong></td><td>almost pure lipid oxidation</td></tr><tr><td>0.8</td><td><strong>Protein / mixed</strong></td><td>typical of a mixed diet at rest</td></tr><tr><td>1.0</td><td><strong>Carbohydrate</strong></td><td>pure glucose oxidation</td></tr><tr><td>above 1.0</td><td><strong>Not oxidation</strong></td><td>lipogenesis or hyperventilation — check the measurement</td></tr></tbody></table>
            <ul><li><p>An RQ above 1.0 cannot come from burning a fuel: it appears during lipogenesis, when CO₂ is produced without corresponding O₂ use, or when the subject hyperventilates.</p></li><li><p>The energy equivalent rises with RQ, from 4.69 kcal per litre of O₂ for fat to 5.05 for carbohydrate, which is why indirect calorimetry needs the RQ.</p></li><li><p>For whole-body measurements the value is usually called the respiratory exchange ratio (RER) and includes protein oxidation.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using RQ from a spirometry session where the subject was breathing hard.</li><li>Assuming 0.82 is always right for a resting subject.</li><li>Mixing volumes in litres and millilitres between the two boxes.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/basal-metabolic-rate">Basal metabolic rate</a>. <a href="/biology/tidal-volume-lung-capacity">Tidal volume</a>. <a href="/biology/q10-temperature-coefficient">Q10 coefficient</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a normal RQ?', 'a' => '0.7–1.0, with about 0.8 for a mixed diet at rest.'],
            ['q' => 'Why is RQ higher on a high-carbohydrate diet?', 'a' => 'Because carbohydrate oxidation releases more CO₂ per O₂ consumed than fat does.'],
            ['q' => 'What does the Respiratory Quotient actually calculate?', 'a' => <<<'TXT'
            It returns respiratory quotient, non-protein RQ, energy equivalent and fat share of fuel. Each one is derived by the formula on this page, so you can check any figure by hand.
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
