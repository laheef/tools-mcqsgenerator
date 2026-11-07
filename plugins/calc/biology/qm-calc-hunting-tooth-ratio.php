<?php

/**
 * Hunting Tooth Ratio Calculator
 * /biology/hunting-tooth-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hunting Tooth Ratio Calculator',
    'meta' => ['title' => 'Hunting Tooth Ratio Calculator — Formula & Results', 'description' => 'The hunting tooth ratio compares the number of teeth on the driving gear with the number on the driven gear, and it predicts how often the same pair of teeth…', 'h1' => 'Hunting Tooth Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'driver',
                            'label' => 'Teeth on the driver (or upper molar)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '21',
                        ],
                        [
                            'name' => 'driven',
                            'label' => 'Teeth on the driven (or lower molar)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '34',
                        ],
                        [
                            'name' => 'revolutions',
                            'label' => 'Driver revolutions observed',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Gear ratio',
                            'type' => 'number',
                            'suffix' => ':1',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hunting',
                            'label' => 'Hunting tooth number',
                            'type' => 'number',
                            'suffix' => 'revolutions',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hunting_pct',
                            'label' => 'Share of one wear cycle per revolution',
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
            'title' => 'Ratio',
            'results' => ['ratio' => 'driven/driver', 'hunting' => 'driver*driven/gcd(driver,driven)', 'hunting_pct' => 'revolutions/(driver*driven/gcd(driver,driven))*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The hunting tooth ratio compares the number of teeth on the driving gear with the number on the driven gear, and it predicts how often the same pair of teeth meets. It returns gear ratio, hunting tooth number and share of one wear cycle per revolution, and the panel shows all of them at once.
        
        In biology the same arithmetic explains carnassial wear and the molar wear gradients used to age mammals.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Hunting Tooth Ratio', 'html' => <<<'TXT'
            <p>Hunting tooth = (T₁ × T₂) ÷ gcd(T₁, T₂); the same tooth pair meets again after that many revolutions of the driver</p>
            <figure class="calc-figure"><img src="/uploads/biology/hunting-tooth-ratio.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Hunting Tooth Ratio Calculator — Twenty-one teeth against thirty-four: every pair eventually meets." title="Hunting Tooth Ratio Calculator"><figcaption>Twenty-one teeth against thirty-four: every pair eventually meets.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>T₁</code></td><td>teeth on the driver</td><td>teeth</td></tr><tr><td><code>T₂</code></td><td>teeth on the driven</td><td>teeth</td></tr><tr><td><code>gcd</code></td><td>greatest common divisor of the two counts</td><td>—</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> The hunting tooth principle is classical gear design; its application to mammalian dentition comes from comparative anatomy of occlusal wear.</p>
            TXT],
            ['title' => 'How do I use the Hunting Tooth Ratio?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: teeth on the driver (or upper molar) of <strong>21</strong>, teeth on the driven (or lower molar) of <strong>34</strong>, driver revolutions observed of <strong>100</strong>.</p>
            <p>Substituting them into the formula gives gear ratio of <strong>1.62</strong>:1, hunting tooth number of <strong>714</strong> revolutions, share of one wear cycle per revolution of <strong>14.01</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>hunting tooth = T₁ × T₂</td><td><strong>Coprime counts</strong></td><td>every tooth meets every other tooth</td></tr><tr><td>hunting tooth = T₁</td><td><strong>Driven is a multiple of driver</strong></td><td>the same few pairs do all the work</td></tr><tr><td>between</td><td><strong>Partially hunting</strong></td><td>wear is spread over part of the gear</td></tr></tbody></table>
            <ul><li><p>Gear designers choose tooth counts with a large common multiple so wear is distributed; cheap gearboxes fail early precisely because this was ignored.</p></li><li><p>In zoology the ratio describes how the upper and lower cheek teeth occlude: matching counts produce grooves that repeat in the same place and wear faster.</p></li><li><p>Ungulates with a large hunting tooth number keep a longer grinding surface, which is one explanation for the many teeth in horse and elephant dentitions.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using the ratio of radii instead of the tooth counts — teeth must mesh one to one.</li><li>Forgetting that a 1:1 gear has the minimum possible hunting tooth, so it wears fastest.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why is a prime number of teeth useful?', 'a' => 'A prime count cannot share a factor with the mating gear, so every tooth meets every other tooth and wear spreads over the whole surface.'],
            ['q' => 'What is the hunting tooth for 21 and 34 teeth?', 'a' => 'gcd(21, 34) = 1, so the hunting tooth is 21 × 34 = 714 driver revolutions.'],
            ['q' => 'What does the Hunting Tooth Ratio actually calculate?', 'a' => <<<'TXT'
            It returns gear ratio, hunting tooth number and share of one wear cycle per revolution. Each one is derived by the formula on this page, so you can check any figure by hand.
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
