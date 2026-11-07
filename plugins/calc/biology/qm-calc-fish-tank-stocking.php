<?php

/**
 * Fish Tank Stocking Calculator
 * /biology/fish-tank-stocking
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fish Tank Stocking Calculator',
    'meta' => ['title' => 'Fish Tank Stocking Calculator — Formula & Results', 'description' => 'Stocking is limited by filter capacity and by the space adult fish need, and both are usually miscalculated because people stock for the size the fish are now.', 'h1' => 'Fish Tank Stocking Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'volume',
                            'label' => 'True water volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '160',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Adult length of the species',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Not the juvenile size',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'fish_count',
                            'label' => 'Fish planned',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'filter',
                            'label' => 'Filter turnover',
                            'type' => 'number',
                            'suffix' => 'L/h',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '800',
                        ],
                        [
                            'name' => 'factor',
                            'label' => 'Stocking factor',
                            'type' => 'number',
                            'suffix' => 'cm per L',
                            'help' => '0.6 for goldfish, 0.8 for cichlids',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.0',
                        ],
                        [
                            'name' => 'capacity',
                            'label' => 'Stocking capacity',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'used',
                            'label' => 'Stocking level',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'biomass',
                            'label' => 'Adult biomass',
                            'type' => 'number',
                            'suffix' => 'g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'turnover',
                            'label' => 'Turnovers per hour',
                            'type' => 'number',
                            'suffix' => 'per hour',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'max_fish',
                            'label' => 'Fish of this size that fit',
                            'type' => 'number',
                            'suffix' => 'fish',
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
                'capacity' => 'volume*factor',
                'used' => 'fish_count*length/max(0.001,volume*factor)*100',
                'biomass' => 'fish_count*pow(length,3)/1000*10',
                'turnover' => 'filter/volume',
                'max_fish' => 'volume*factor/length',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Stocking is limited by filter capacity and by the space adult fish need, and both are usually miscalculated because people stock for the size the fish are now. It returns stocking capacity, stocking level, adult biomass and turnovers per hour, and the panel shows all of them at once.
        
        This calculator gives the inch-per-gallon and surface-area limits, the biomass the filter must process and how many fish of each adult size fit.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Fish Tank Stocking', 'html' => <<<'TXT'
            <p>Capacity (cm of adult fish) = volume (L) × turnover factor; biomass ≈ count × (length/10)³ × 10 g</p>
            <figure class="calc-figure"><img src="/uploads/biology/fish-tank-stocking.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Fish Tank Stocking Calculator — Length is not mass: the biomass curve grows as a cube." title="Fish Tank Stocking Calculator"><figcaption>Length is not mass: the biomass curve grows as a cube.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>V</code></td><td>true water volume</td><td>L</td></tr><tr><td><code>L</code></td><td>adult body length of the species</td><td>cm</td></tr><tr><td><code>factor</code></td><td>cm of fish per litre</td><td>cm/L</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Fish Tank Stocking?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: true water volume of <strong>160</strong> L, adult length of the species of <strong>6</strong> cm, fish planned of <strong>20</strong>, filter turnover of <strong>800</strong> L/h, stocking factor of <strong>1</strong> cm per L.</p>
            <p>Substituting them into the formula gives stocking capacity of <strong>160</strong> cm, stocking level of <strong>75</strong>%, adult biomass of <strong>43.2</strong> g, turnovers per hour of <strong>5</strong> per hour, fish of this size that fit of <strong>26.67</strong> fish.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 60%</td><td><strong>Understocked</strong></td><td>safe, and the filter has headroom</td></tr><tr><td>60 – 90%</td><td><strong>Well stocked</strong></td><td>the target for a display tank</td></tr><tr><td>90 – 110%</td><td><strong>At the limit</strong></td><td>only with strong filtration and weekly changes</td></tr><tr><td>above 110%</td><td><strong>Overstocked</strong></td><td>ammonia spikes, disease and stunted growth</td></tr></tbody></table>
            <ul><li><p>The old inch-per-gallon rule is a volume proxy for oxygen demand and waste, which scale with mass, not length. It fails badly for deep-bodied fish, so the biomass line here is the more honest limit.</p></li><li><p>Freshwater community tanks: about 1 cm of adult fish per litre of net water; cichlids and goldfish need double the volume because they are taller and messier.</p></li><li><p>Filter turnover of five times the tank volume per hour is the usual starting point; the fish load is what actually decides whether it is enough.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Stocking by the size of the juveniles you bought.</li><li>Ignoring that fish grow: 20 small tetras and 20 silver dollars are not the same tank.</li><li>Adding all the fish at once, which overwhelms the bacteria before they multiply.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/aquarium-water-volume">Aquarium water volume</a>. <a href="/biology/ideal-fish-tank-size">Ideal tank size</a>. <a href="/biology/fish-per-liter">Fish per litre</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many fish can I keep in 100 L?', 'a' => 'Roughly 100 cm of adult fish at 1 cm per litre — so about 16 fish of 6 cm, or 8 of 12 cm.'],
            ['q' => 'Does more filtration allow more fish?', 'a' => 'It buys some headroom, but oxygen and swimming space set a hard ceiling.'],
            ['q' => 'What does the Fish Tank Stocking actually calculate?', 'a' => <<<'TXT'
            It returns stocking capacity, stocking level, adult biomass and turnovers per hour. Each one is derived by the formula on this page, so you can check any figure by hand.
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
