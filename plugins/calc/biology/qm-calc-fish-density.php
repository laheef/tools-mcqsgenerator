<?php

/**
 * Fish Density Calculator
 * /biology/fish-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fish Density Calculator',
    'meta' => ['title' => 'Fish Density Calculator — Formula & Results', 'description' => 'Fish density is the number of fish per litre or per cubic metre of water, and it is the number that decides whether a tank, pond or raceway is stocked sensibly.', 'h1' => 'Fish Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'fish',
                            'label' => 'Number of fish',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Water volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'help' => 'Net water volume, not the tank\'s outside size',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'weight',
                            'label' => 'Average fish weight',
                            'type' => 'number',
                            'suffix' => 'g',
                            'help' => 'Optional: adds a biomass figure',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Fish per litre',
                            'type' => 'number',
                            'suffix' => 'fish/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_fish',
                            'label' => 'Litres per fish',
                            'type' => 'number',
                            'suffix' => 'L/fish',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'biomass',
                            'label' => 'Biomass density',
                            'type' => 'number',
                            'suffix' => 'g/L',
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
            'title' => 'Density',
            'results' => [
                'density' => 'fish/volume',
                'per_fish' => 'volume/fish',
                'biomass' => 'fish*weight/volume',
                'fish' => 'density*volume',
                'volume' => 'fish/density',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fish density is the number of fish per litre or per cubic metre of water, and it is the number that decides whether a tank, pond or raceway is stocked sensibly. It returns fish per litre, litres per fish, biomass density and number of fish, and the panel shows all of them at once.
        
        Enter fish and volume and the calculator returns fish per litre, litres per fish and the biomass density in grams per litre.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Fish Density', 'html' => <<<'TXT'
            <p>Density (fish/L) = number of fish ÷ water volume in litres</p>
            <figure class="calc-figure"><img src="/uploads/biology/fish-density.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Fish Density Calculator — Fish over litres gives density; average weight adds the biomass load." title="Fish Density Calculator"><figcaption>Fish over litres gives density; average weight adds the biomass load.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>fish</code></td><td>number of fish</td><td>fish</td></tr><tr><td><code>volume</code></td><td>net water volume</td><td>L</td></tr><tr><td><code>weight</code></td><td>average weight per fish</td><td>g</td></tr><tr><td><code>biomass</code></td><td>grams of fish per litre</td><td>g/L</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Fish Density?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: average fish weight of <strong>15</strong> g.</p>
            <p>Substituting them into the formula gives fish per litre of <strong>0.1</strong> fish/L, litres per fish of <strong>10</strong> L/fish, biomass density of <strong>1.5</strong> g/L, number of fish of <strong>20</strong>, water volume of <strong>200</strong> L.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>up to 0.02 fish/L</td><td><strong>Light</strong></td><td>50 L or more per fish</td></tr><tr><td>0.02 – 0.05 fish/L</td><td><strong>Moderate</strong></td><td>20–50 L per fish</td></tr><tr><td>0.05 – 0.1 fish/L</td><td><strong>Heavy</strong></td><td>10–20 L per fish, needs strong filtration</td></tr><tr><td>above 0.1 fish/L</td><td><strong>Very heavy</strong></td><td>under 10 L per fish; only with serious filtration</td></tr></tbody></table>
            <ul><li><p>Fish per litre is the inverse of litres per fish, so 0.05 fish/L is the same statement as 20 L per fish. Both are shown because different guidelines use different ones.</p></li><li><p>Biomass density is the number that actually constrains a system: 20 g/L of small fish is a different load from 20 g/L of large ones, but it is closer to the truth than counting fish.</p></li><li><p>Volume should be net water volume. Gravel, decorations and a sump that is not running do not count.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using the aquarium's advertised capacity rather than the water actually in it.</li><li>Judging by fish count alone when the fish are still growing.</li><li>Forgetting that density limits depend on the species: a betta and a koi are not the same calculation.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/fish-per-liter">Fish per litre</a>. <a href="/biology/fish-condition-factor">Fish condition factor</a>. <a href="/biology/farm-pond-fish-stocking">Farm pond fish stocking</a>. <a href="/other/aquarium-volume">Aquarium water volume</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many fish per litre is safe?', 'a' => <<<'TXT'
            As a starting point, 1 cm of adult fish length per litre is the old freshwater rule, which corresponds to roughly 20–30 L per small fish. Large or messy fish need far more.
            TXT],
            ['q' => 'Does this work for ponds?', 'a' => 'Yes — enter the pond volume in litres (1 m³ = 1000 L). Pond stocking is usually quoted in fish per m³, which is the same ratio at a different scale.'],
            ['q' => 'What does the Fish Density actually calculate?', 'a' => <<<'TXT'
            It returns fish per litre, litres per fish, biomass density and number of fish. Each one is derived by the formula on this page, so you can check any figure by hand.
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
