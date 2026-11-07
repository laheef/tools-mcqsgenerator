<?php

/**
 * PCR Master Mix Calculator
 * /biology/pcr-master-mix-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PCR Master Mix Calculator',
    'meta' => ['title' => 'PCR Master Mix Calculator — Formula & Results', 'description' => <<<'TXT'
    A master mix is one bulk solution split across every tube in the run. It returns total mix volume, master mix to add, each primer to add and water to add, and…
    TXT, 'h1' => 'PCR Master Mix Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'reactions',
                            'label' => 'Reactions',
                            'type' => 'number',
                            'help' => 'Samples plus controls',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                        [
                            'name' => 'extra',
                            'label' => 'Extra reactions',
                            'type' => 'number',
                            'help' => 'Allowance for pipetting loss',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'rxn_vol',
                            'label' => 'Volume per reaction',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'mm_stock',
                            'label' => 'Master mix stock concentration',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '2× mix is used at half the final volume',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'primer_stock',
                            'label' => 'Primer stock',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'help' => 'Each primer, from a 10 µM working stock',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'primer_final',
                            'label' => 'Primer final concentration',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'template',
                            'label' => 'Template volume per reaction',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total mix volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mm_vol',
                            'label' => 'Master mix to add',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'primer_vol',
                            'label' => 'Each primer to add',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water_vol',
                            'label' => 'Water to add',
                            'type' => 'number',
                            'suffix' => 'µL',
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
            'title' => 'Master mix',
            'results' => ['total' => '(reactions+extra)*rxn_vol', 'mm_vol' => '(reactions+extra)*rxn_vol/mm_stock', 'primer_vol' => '(reactions+extra)*rxn_vol*primer_final/primer_stock', 'water_vol' => '(reactions+extra)*rxn_vol-(reactions+extra)*rxn_vol/mm_stock-(reactions+extra)*rxn_vol*primer_final/primer_stock*2-(reactions+extra)*template'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A master mix is one bulk solution split across every tube in the run. It returns total mix volume, master mix to add, each primer to add and water to add, and the panel shows all of them at once.
        
        This calculator sizes the mix, adds a pipetting allowance and returns the water volume to top up.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the PCR Master Mix', 'html' => <<<'TXT'
            <p>Reactions prepared = reactions + extra; master mix = total ÷ stock fold; water = total − master mix − primers − template</p>
            <figure class="calc-figure"><img src="/uploads/biology/pcr-master-mix-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: PCR Master Mix Calculator — Reactions × volume, then each component's share, then the water." title="PCR Master Mix Calculator"><figcaption>Reactions × volume, then each component's share, then the water.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>total</code></td><td>number of tubes × volume per tube</td><td>µL</td></tr><tr><td><code>mm_vol</code></td><td>2× master mix, used at half the final volume</td><td>µL</td></tr><tr><td><code>primer_vol</code></td><td>each primer, from C1V1 = C2V2</td><td>µL</td></tr><tr><td><code>water_vol</code></td><td>the balance</td><td>µL</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the PCR Master Mix?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: reactions of <strong>24</strong>, extra reactions of <strong>2</strong>, volume per reaction of <strong>25</strong> µL, master mix stock concentration of <strong>2</strong> ×, primer stock of <strong>10</strong> µM, primer final concentration of <strong>0.5</strong> µM, template volume per reaction of <strong>1</strong> µL.</p>
            <p>Substituting them into the formula gives total mix volume of <strong>650</strong> µL, master mix to add of <strong>325</strong> µL, each primer to add of <strong>32.5</strong> µL, water to add of <strong>234</strong> µL.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Prepare for two more reactions than you have tubes. Pipetting loss of 5–10% per component is normal, and running out halfway through a plate is unrecoverable.</p></li><li><p>Add the master mix to the plate first and the template last: template in a well without mix is the classic cause of one empty lane.</p></li><li><p>Primer volume is C1V1 = C2V2 per reaction, then multiplied by the number of reactions — 0.5 µM final from a 10 µM stock is 1.25 µL in a 25 µL reaction.</p></li><li><p>Keep the mix on ice and add polymerase last if it is a hot-start enzyme supplied separately.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Making exactly the number of reactions needed and coming up short.</li><li>Forgetting that the template volume is part of the 25 µL, not additional to it.</li><li>Pipetting the viscous master mix without pre-wetting the tip, which loses several microlitres.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many extra reactions should I make?', 'a' => 'Two, or 10% of the plate — more for a full 96-well plate.'],
            ['q' => 'Why is my water volume negative?', 'a' => 'The components already add up to more than the reaction volume: check the master mix concentration and the template volume.'],
            ['q' => 'Does this work for a 20 µL reaction?', 'a' => 'Yes — set the volume per reaction to 20 and every component rescales.'],
            ['q' => 'What does the PCR Master Mix actually calculate?', 'a' => <<<'TXT'
            It returns total mix volume, master mix to add, each primer to add and water to add. Each one is derived by the formula on this page, so you can check any figure by hand.
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
