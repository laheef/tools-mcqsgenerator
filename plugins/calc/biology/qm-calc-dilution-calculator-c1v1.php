<?php

/**
 * Dilution Calculator (C1V1 = C2V2)
 * /biology/dilution-calculator-c1v1
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dilution Calculator (C1V1 = C2V2)',
    'meta' => ['title' => 'Dilution (C1V1 = C2V2) Calculator — Formula & Results', 'description' => 'Every dilution question is the same equation: the amount of solute before equals the amount after. It returns stock volume, diluent to add and dilution…', 'h1' => 'Dilution Calculator (C1V1 = C2V2)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'c1',
                            'label' => 'Stock concentration',
                            'type' => 'number',
                            'suffix' => 'M',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'v1',
                            'label' => 'Stock volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'c2',
                            'label' => 'Final concentration',
                            'type' => 'number',
                            'suffix' => 'M',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'v2',
                            'label' => 'Final volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'diluent',
                            'label' => 'Diluent to add',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fold',
                            'label' => 'Dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
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
            'title' => 'Dilution',
            'results' => ['v1' => 'c2*v2/c1', 'diluent' => 'v2-c2*v2/c1', 'fold' => 'c1/c2'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Every dilution question is the same equation: the amount of solute before equals the amount after. It returns stock volume, diluent to add and dilution factor, and the panel shows all of them at once.
        
        This calculator solves C₁V₁ = C₂V₂ for whichever value you are missing and tells you how much diluent to add.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Dilution (C1V1 = C2V2)', 'html' => <<<'TXT'
            <p>C₁ × V₁ = C₂ × V₂</p>
            <figure class="calc-figure"><img src="/uploads/biology/dilution-calculator-c1v1.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Dilution Calculator (C1V1 = C2V2) — Concentration before and after, and the volume that bridges them." title="Dilution Calculator (C1V1 = C2V2)"><figcaption>Concentration before and after, and the volume that bridges them.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>C₁</code></td><td>stock concentration</td><td>any</td></tr><tr><td><code>V₁</code></td><td>volume of stock to take</td><td>mL</td></tr><tr><td><code>C₂</code></td><td>final concentration</td><td>any</td></tr><tr><td><code>V₂</code></td><td>final volume</td><td>mL</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Dilution (C1V1 = C2V2)?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: stock concentration of <strong>10</strong> M, final concentration of <strong>0.5</strong> M, final volume of <strong>100</strong> mL.</p>
            <p>Substituting them into the formula gives stock volume of <strong>5</strong> mL, diluent to add of <strong>95</strong> mL, dilution factor of <strong>20</strong> ×.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The confidence check is units: C₁ and C₂ must be in the same unit and V₁ and V₂ in the same unit, or the equation quietly gives a wrong answer.</p></li><li><p>Add the stock to about 80% of the final volume of diluent, then top up to the mark: mixing volumes is not strictly additive.</p></li><li><p>For a dilution series, do it stepwise; a single 1000× dilution is less accurate than three 10× steps because of pipetting error.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Mixing molarity with mass concentration in the same equation.</li><li>Forgetting that V₂ includes the stock volume.</li><li>Using a volumetric flask for a small volume and a beaker for the rest.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What if I want a dilution factor, not a concentration?', 'a' => 'Dilution factor is C₁/C₂; a 1:10 dilution has a factor of 10.'],
            ['q' => 'Can V₁ be larger than V₂?', 'a' => 'No — that would mean concentrating the solution, which a dilution cannot do.'],
            ['q' => 'What does the Dilution (C1V1 = C2V2) actually calculate?', 'a' => 'It returns stock volume, diluent to add and dilution factor. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
