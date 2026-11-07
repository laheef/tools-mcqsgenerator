<?php

/**
 * Net Primary Productivity Calculator
 * /biology/net-primary-productivity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net Primary Productivity Calculator',
    'meta' => ['title' => 'Net Primary Productivity Calculator — Biology', 'description' => 'Net primary productivity is what plants accumulate after their own respiration: gross photosynthesis minus the carbon they burn to stay alive.', 'h1' => 'Net Primary Productivity Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'gpp',
                            'label' => 'Gross primary production',
                            'type' => 'number',
                            'suffix' => 'g C/m²/yr',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2200',
                        ],
                        [
                            'name' => 'respiration',
                            'label' => 'Plant respiration',
                            'type' => 'number',
                            'suffix' => 'g C/m²/yr',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '900',
                        ],
                        [
                            'name' => 'npp',
                            'label' => 'Net primary productivity',
                            'type' => 'number',
                            'suffix' => 'g C/m²/yr',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ha',
                            'label' => 'Per hectare',
                            'type' => 'number',
                            'suffix' => 'kg C/ha/yr',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'biomass',
                            'label' => 'Dry biomass equivalent',
                            'type' => 'number',
                            'suffix' => 'g/m²/yr',
                            'help' => 'About 2.2 g biomass per g C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'energy',
                            'label' => 'Energy equivalent',
                            'type' => 'number',
                            'suffix' => 'MJ/m²/yr',
                            'help' => 'About 39 kJ per g dry biomass',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'nep',
                            'label' => 'Net ecosystem production (less 10% heterotroph)',
                            'type' => 'number',
                            'suffix' => 'g C/m²/yr',
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
            'title' => 'Productivity',
            'results' => [
                'npp' => 'gpp-respiration',
                'per_ha' => '(gpp-respiration)*10',
                'biomass' => '(gpp-respiration)*2.2',
                'energy' => '(gpp-respiration)*2.2*39/1000',
                'nep' => '(gpp-respiration)*0.9',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Net primary productivity is what plants accumulate after their own respiration: gross photosynthesis minus the carbon they burn to stay alive. It returns net primary productivity, per hectare, dry biomass equivalent and energy equivalent, and the panel shows all of them at once.
        
        This calculator converts between carbon, biomass and energy, and scales a measured rate to a hectare and a year.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Net Primary Productivity', 'html' => <<<'TXT'
            <p>NPP = GPP − R_a; carbon × 2.2 ≈ dry biomass</p>
            <figure class="calc-figure"><img src="/uploads/biology/net-primary-productivity.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Net Primary Productivity Calculator — Gross production, respiration and what is left over." title="Net Primary Productivity Calculator"><figcaption>Gross production, respiration and what is left over.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>GPP</code></td><td>gross primary production</td><td>g C/m²/yr</td></tr><tr><td><code>R_a</code></td><td>autotrophic respiration</td><td>g C/m²/yr</td></tr><tr><td><code>NPP</code></td><td>net primary productivity</td><td>g C/m²/yr</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Net Primary Productivity?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: gross primary production of <strong>2,200</strong> g C/m²/yr, plant respiration of <strong>900</strong> g C/m²/yr.</p>
            <p>Substituting them into the formula gives net primary productivity of <strong>1,300</strong> g C/m²/yr, per hectare of <strong>13,000</strong> kg C/ha/yr, dry biomass equivalent of <strong>2,860</strong> g/m²/yr, energy equivalent of <strong>111.54</strong> MJ/m²/yr, net ecosystem production (less 10% heterotroph) of <strong>1,170</strong> g C/m²/yr.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 200 g C/m²/yr</td><td><strong>Low</strong></td><td>deserts, tundra, open ocean</td></tr><tr><td>400 – 1 200</td><td><strong>Moderate</strong></td><td>temperate grassland and forest</td></tr><tr><td>above 1 500</td><td><strong>High</strong></td><td>tropical rainforest, wetlands, estuaries</td></tr></tbody></table>
            <ul><li><p>NPP is the carbon available to herbivores and decomposers; NEP subtracts their respiration and is the number that matters for carbon storage.</p></li><li><p>The 2.2 factor converts carbon to dry biomass; energy conversion uses about 17–20 kJ per g carbon, or roughly 39 kJ per g of biomass.</p></li><li><p>Global terrestrial NPP is around 56 Pg carbon a year, roughly half of it in the tropics.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Reporting GPP when you mean NPP.</li><li>Converting carbon to biomass with the 0.5 factor used for soil organic matter.</li><li>Scaling a single-day measurement to a year without accounting for seasonality.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the difference between GPP and NPP?', 'a' => 'GPP is everything photosynthesised; NPP is what remains after the plant respires.'],
            ['q' => 'Can NPP be negative?', 'a' => 'Not over a season for a living plant community — but a net carbon loss can occur in disturbed or dark systems.'],
            ['q' => 'What does the Net Primary Productivity actually calculate?', 'a' => <<<'TXT'
            It returns net primary productivity, per hectare, dry biomass equivalent and energy equivalent. Each one is derived by the formula on this page, so you can check any figure by hand.
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
