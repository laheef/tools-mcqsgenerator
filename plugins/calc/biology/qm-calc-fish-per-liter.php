<?php

/**
 * Fish Per Liter Calculator
 * /biology/fish-per-liter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fish Per Liter Calculator',
    'meta' => ['title' => 'Fish Per Liter Calculator — Formula & Results', 'description' => 'Stocking an aquarium or a tank system comes down to one ratio: how many fish one litre of water supports. It returns fish per litre, litres per fish…', 'h1' => 'Fish Per Liter Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Tank volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Average adult fish length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Adult size, not the size you bought',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
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
                            'name' => 'cm_per_l',
                            'label' => 'Centimetres of fish per litre',
                            'type' => 'number',
                            'suffix' => 'cm/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'capacity',
                            'label' => 'Fish the tank supports at 0.05 fish/L',
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
                'density' => 'fish/volume',
                'per_fish' => 'volume/fish',
                'cm_per_l' => 'fish*length/volume',
                'capacity' => 'volume*0.05',
                'fish' => 'density*volume',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Stocking an aquarium or a tank system comes down to one ratio: how many fish one litre of water supports. It returns fish per litre, litres per fish, centimetres of fish per litre and fish the tank supports at 0.05 fish/L, and the panel shows all of them at once.
        
        This calculator converts between fish per litre, litres per fish and the total a tank of a given size can hold, and adds the traditional centimetres of fish per litre rule as a cross-check.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Fish Per Liter', 'html' => <<<'TXT'
            <p>Fish per litre = number of fish ÷ tank volume in litres</p>
            <figure class="calc-figure"><img src="/uploads/biology/fish-per-liter.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Fish Per Liter Calculator — Centimetres of adult fish per litre, with the traditional band in the middle." title="Fish Per Liter Calculator"><figcaption>Centimetres of adult fish per litre, with the traditional band in the middle.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>fish</code></td><td>number of fish</td><td>fish</td></tr><tr><td><code>volume</code></td><td>tank volume</td><td>L</td></tr><tr><td><code>length</code></td><td>adult length of the species</td><td>cm</td></tr><tr><td><code>cm_per_l</code></td><td>centimetres of fish per litre</td><td>cm/L</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Fish Per Liter?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: tank volume of <strong>200</strong> L, average adult fish length of <strong>4</strong> cm.</p>
            <p>Substituting them into the formula gives fish per litre of <strong>0.1</strong> fish/L, litres per fish of <strong>10</strong> L/fish, centimetres of fish per litre of <strong>0.4</strong> cm/L, fish the tank supports at 0.05 fish/l of <strong>10</strong> fish, number of fish of <strong>20</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 0.5 cm/L</td><td><strong>Understocked</strong></td><td>room to grow</td></tr><tr><td>0.5 – 1 cm/L</td><td><strong>Traditional rule</strong></td><td>the old inch-per-gallon style guidance</td></tr><tr><td>above 2 cm/L</td><td><strong>Overstocked</strong></td><td>needs heavy filtration and frequent water changes</td></tr></tbody></table>
            <ul><li><p>The centimetre-per-litre figure is the classic freshwater rule of thumb (about 1 cm of adult fish per litre). It is crude but it is what most guidance is based on.</p></li><li><p>Species matter more than the number: goldfish produce several times the waste of a same-length tetra.</p></li><li><p>Always size for the adult, not the juvenile you are buying.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Stocking by current size and then not upgrading as the fish grow.</li><li>Ignoring filtration, which determines how much of the load can actually be processed.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/fish-density">Fish density</a>. <a href="/other/aquarium-volume">Aquarium water volume</a>. <a href="/biology/fish-condition-factor">Fish condition factor</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many fish can I put in a 200 litre tank?', 'a' => 'About 10 small community fish at 0.05 fish/L, or the same tank could hold fewer larger fish — the biomass, not the count, is the real limit.'],
            ['q' => 'What does the Fish Per Liter actually calculate?', 'a' => <<<'TXT'
            It returns fish per litre, litres per fish, centimetres of fish per litre and fish the tank supports at 0.05 fish/L. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
            ['q' => 'Does it work in both directions?', 'a' => <<<'TXT'
            Where the maths allows it, yes: the page states which values it solves for and which you supply. A field marked as a result is always computed, never typed into.
            TXT],
        ],
        'related' => [],
    ],
];
