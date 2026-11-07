<?php

/**
 * Farm Pond Fish Stocking Calculator
 * /biology/farm-pond-fish-stocking
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Farm Pond Fish Stocking Calculator',
    'meta' => ['title' => 'Farm Pond Fish Stocking Calculator — Biology', 'description' => 'A farm pond is usually stocked in a ratio, not a single species: bluegill as forage, bass as predators, and often channel catfish alongside.', 'h1' => 'Farm Pond Fish Stocking Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Pond surface area',
                            'type' => 'number',
                            'suffix' => 'hectares',
                            'help' => '1 acre = 0.405 ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.4',
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Stocking rate',
                            'type' => 'number',
                            'suffix' => 'fish/ha',
                            'help' => 'Typical fertilised pond: 2,500–5,000/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2500',
                        ],
                        [
                            'name' => 'predator',
                            'label' => 'Predator share',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Bass or equivalent, typically 10–25%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'pests',
                            'label' => 'Presence of wild fish (1 = yes, 0 = no)',
                            'type' => 'number',
                            'help' => 'Stock heavier if wild fish are present',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total fish to stock',
                            'type' => 'number',
                            'suffix' => 'fish',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'predators',
                            'label' => 'Predators',
                            'type' => 'number',
                            'suffix' => 'fish',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'forage',
                            'label' => 'Forage fish',
                            'type' => 'number',
                            'suffix' => 'fish',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ha',
                            'label' => 'Fish per hectare',
                            'type' => 'number',
                            'suffix' => 'fish/ha',
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
            'title' => 'Stocking',
            'results' => [
                'total' => 'area*rate*(1+0.1*pests)',
                'predators' => 'area*rate*(1+0.1*pests)*predator/100',
                'forage' => 'area*rate*(1+0.1*pests)*(1-predator/100)',
                'per_ha' => 'total/area',
                'area' => 'total/(rate*(1+0.1*pests))',
                'rate' => 'total/(area*(1+0.1*pests))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A farm pond is usually stocked in a ratio, not a single species: bluegill as forage, bass as predators, and often channel catfish alongside. It returns total fish to stock, predators, forage fish and fish per hectare, and the panel shows all of them at once.
        
        This calculator turns pond surface area into a stocking plan — total fish, the predator-to-forage split and the biomass it implies.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Farm Pond Fish Stocking', 'html' => <<<'TXT'
            <p>Total fish = pond area (ha) × stocking rate (fish/ha); predators = total × predator share</p>
            <figure class="calc-figure"><img src="/uploads/biology/farm-pond-fish-stocking.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Farm Pond Fish Stocking Calculator — Area × rate gives the total; the predator share splits it." title="Farm Pond Fish Stocking Calculator"><figcaption>Area × rate gives the total; the predator share splits it.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>area</code></td><td>pond surface area</td><td>ha</td></tr><tr><td><code>rate</code></td><td>fish per hectare</td><td>fish/ha</td></tr><tr><td><code>predator</code></td><td>share of the stock that is predatory</td><td>%</td></tr><tr><td><code>total</code></td><td>fish to stock</td><td>fish</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Farm Pond Fish Stocking?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: predator share of <strong>20</strong>%, presence of wild fish (1 = yes, 0 = no) of <strong>0</strong>.</p>
            <p>Substituting them into the formula gives total fish to stock of <strong>1,000</strong> fish, predators of <strong>200</strong> fish, forage fish of <strong>800</strong> fish, fish per hectare of <strong>2,500</strong> fish/ha, pond surface area of <strong>0.4</strong> hectares, stocking rate of <strong>2,500</strong> fish/ha.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1,000 – 2,500 /ha</td><td><strong>Light</strong></td><td>unfertilised pond, natural productivity only</td></tr><tr><td>2,500 – 5,000 /ha</td><td><strong>Standard</strong></td><td>fertilised pond with a bass-bluegill balance</td></tr><tr><td>above 5,000 /ha</td><td><strong>Intensive</strong></td><td>needs aeration and feeding</td></tr></tbody></table>
            <ul><li><p>The classic bass-bluegill plan stocks forage first and predators a season later, so the forage population is established before anything eats it.</p></li><li><p>If wild fish are already present, stock larger fingerlings and expect lower survival.</p></li><li><p>Pond depth matters as much as area: 1.5–2 m over most of the pond, with deeper water for overwintering, is the usual minimum.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Stocking predators and forage at the same time in a pond with no cover.</li><li>Applying a hatchery's per-acre rate to a hectare (or the reverse) — a factor of 2.47.</li><li>Stocking before the pond has cycled and the food chain has established.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/fish-density">Fish density</a>. <a href="/biology/fish-condition-factor">Fish condition factor</a>. <a href="/biology/farm-pond-fish-stocking">Pond stocking</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many fish per acre should I stock?', 'a' => 'A common starting point is 1,000 fish per acre (about 2,500 per hectare) in a fertilised pond, split roughly 80% forage to 20% predators.'],
            ['q' => 'Can I stock without aeration?', 'a' => 'Yes at low densities with good depth and vegetation control; above about 5,000 fish/ha, summer oxygen becomes the limiting factor.'],
            ['q' => 'What does the Farm Pond Fish Stocking actually calculate?', 'a' => <<<'TXT'
            It returns total fish to stock, predators, forage fish and fish per hectare. Each one is derived by the formula on this page, so you can check any figure by hand.
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
