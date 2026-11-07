<?php

/**
 * Livestock Water Requirement Calculator
 * /biology/livestock-water-requirement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Livestock Water Requirement Calculator',
    'meta' => ['title' => 'Livestock Water Requirement Calculator — Biology', 'description' => 'Water intake scales with dry-matter intake and with heat, and it is the number most often under-designed on a farm. It returns water per animal per day, herd…', 'h1' => 'Livestock Water Requirement Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'species',
                            'label' => 'Species',
                            'type' => 'select',
                            'options' => [
                                'Cattle' => '1',
                                'Sheep' => '2',
                                'Goat' => '3',
                                'Pig' => '4',
                                'Horse' => '5',
                                'Poultry' => '6',
                            ],
                            'control' => 'SELECT',
                            'default' => 'Cattle',
                        ],
                        [
                            'name' => 'head',
                            'label' => 'Number of animals',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'weight',
                            'label' => 'Average body weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'help' => 'Adult weight',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'temp',
                            'label' => 'Ambient temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => 'Daily average or expected maximum',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'per_head',
                            'label' => 'Water per animal per day',
                            'type' => 'number',
                            'suffix' => 'L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'daily',
                            'label' => 'Herd water per day',
                            'type' => 'number',
                            'suffix' => 'L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'weekly',
                            'label' => 'Herd water per week',
                            'type' => 'number',
                            'suffix' => 'L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'flow',
                            'label' => 'Peak flow for a 4-hour drinking window',
                            'type' => 'number',
                            'suffix' => 'L/h',
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
            'title' => 'Water',
            'results' => [
                'per_head' => <<<'TXT'
                if_else(species==1, weight*0.10, if_else(species==2, weight*0.08, if_else(species==3, weight*0.09, if_else(species==4, weight*0.12, if_else(species==5, weight*0.06, weight*0.20)))))*(1+max(0,temp-20)*0.02)
                TXT,
                'daily' => 'head*per_head',
                'weekly' => 'head*per_head*7',
                'flow' => 'head*per_head/4',
                'head' => 'daily/per_head',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Water intake scales with dry-matter intake and with heat, and it is the number most often under-designed on a farm. It returns water per animal per day, herd water per day, herd water per week and peak flow for a 4-hour drinking window, and the panel shows all of them at once.
        
        This calculator estimates daily and weekly water demand for a herd from body weight, species and temperature, together with the peak flow rate a trough has to deliver.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Livestock Water Requirement', 'html' => <<<'TXT'
            <p>Daily water (L/animal) = body weight × species factor × temperature correction; temperature correction = 1 + 0.02 × (temp − 20 °C) above 20 °C</p>
            <figure class="calc-figure"><img src="/uploads/biology/livestock-water-requirement.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Livestock Water Requirement Calculator — Daily demand by species at the temperature you entered." title="Livestock Water Requirement Calculator"><figcaption>Daily demand by species at the temperature you entered.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>weight</code></td><td>average body weight</td><td>kg</td></tr><tr><td><code>species factor</code></td><td>litres per kg of body weight for that species</td><td>L/kg</td></tr><tr><td><code>head</code></td><td>number of animals</td><td>head</td></tr><tr><td><code>per_head</code></td><td>daily water per animal</td><td>L/day</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Livestock Water Requirement?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: species set to <strong>1.0</strong>, average body weight of <strong>500</strong> kg, ambient temperature of <strong>25</strong>°C.</p>
            <p>Substituting them into the formula gives water per animal per day of <strong>55</strong> L, herd water per day of <strong>1,100</strong> L, herd water per week of <strong>7,700</strong> L, peak flow for a 4-hour drinking window of <strong>275</strong> L/h, number of animals of <strong>20</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>cattle</td><td><strong>0.10 L/kg</strong></td><td>roughly 50 L for a 500 kg cow at 20 °C</td></tr><tr><td>sheep / goat</td><td><strong>0.08–0.09 L/kg</strong></td><td>4–6 L for a 50 kg ewe</td></tr><tr><td>pig</td><td><strong>0.12 L/kg</strong></td><td>about 18 L for a 150 kg sow</td></tr><tr><td>poultry</td><td><strong>0.20 L/kg</strong></td><td>approximately 0.3 L per hen per day</td></tr></tbody></table>
            <ul><li><p>Intake climbs steeply with heat: a 500 kg cow needs about 50 L at 20 °C and around 70 L at 40 °C, which is why summer failures are usually a flow problem rather than a volume one.</p></li><li><p>Lactation adds 30–50% for dairy cattle; the calculator deliberately gives the maintenance figure and says so.</p></li><li><p>Peak flow matters: animals drink most of their water in a few hours after milking or feeding, so a trough sized for the daily total can still leave the herd waiting.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Sizing storage for the daily total but not the trough's refill rate.</li><li>Ignoring the temperature term in summer, which is where most shortfalls appear.</li><li>Using mature weight for growing animals, which overstates demand.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/dry-matter-intake">Dry matter intake</a>. <a href="/biology/pasture-stocking-rate">Pasture stocking rate</a>. <a href="/biology/chicken-feed-amount">Chicken feed amount</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much water does a cow drink a day?', 'a' => 'About 40–70 litres for a 500 kg beef cow at moderate temperatures, rising to 100 litres or more in heat or during lactation.'],
            ['q' => 'How do I size a trough?', 'a' => 'Give the herd its daily requirement in one to two hours of refill, which is what the peak flow figure here approximates.'],
            ['q' => 'What does the Livestock Water Requirement actually calculate?', 'a' => <<<'TXT'
            It returns water per animal per day, herd water per day, herd water per week and peak flow for a 4-hour drinking window. Each one is derived by the formula on this page, so you can check any figure by hand.
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
