<?php

/**
 * Maximum Sustainable Yield Calculator
 * /biology/maximum-sustainable-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Maximum Sustainable Yield Calculator',
    'meta' => ['title' => 'Maximum Sustainable Yield Calculator — Biology', 'description' => 'Maximum sustainable yield is half the carrying capacity, taken at half the maximum growth rate. It returns maximum sustainable yield, stock size at MSY…', 'h1' => 'Maximum Sustainable Yield Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'k',
                            'label' => 'Carrying capacity (K)',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10000',
                        ],
                        [
                            'name' => 'r',
                            'label' => 'Intrinsic growth rate (r)',
                            'type' => 'number',
                            'suffix' => 'per year',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.6',
                        ],
                        [
                            'name' => 'msy',
                            'label' => 'Maximum sustainable yield',
                            'type' => 'number',
                            'suffix' => 'individuals/year',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'stock_at_msy',
                            'label' => 'Stock size at MSY',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'harvest_rate',
                            'label' => 'Sustainable harvest rate',
                            'type' => 'number',
                            'suffix' => '%/year',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'surplus_50',
                            'label' => 'Yield at half of K',
                            'type' => 'number',
                            'suffix' => 'individuals/year',
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
            'title' => 'Yield',
            'results' => ['msy' => 'r*k/4', 'stock_at_msy' => 'k/2', 'harvest_rate' => 'r/2*100', 'surplus_50' => 'r*(k/2)*(1-0.5)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Maximum sustainable yield is half the carrying capacity, taken at half the maximum growth rate. It returns maximum sustainable yield, stock size at MSY, sustainable harvest rate and yield at half of K, and the panel shows all of them at once.
        
        This calculator gives the yield, the stock size to leave behind and the effort that produces it.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Maximum Sustainable Yield', 'html' => <<<'TXT'
            <p>MSY = r × K ÷ 4, taken at N = K ÷ 2</p>
            <figure class="calc-figure"><img src="/uploads/biology/maximum-sustainable-yield.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Maximum Sustainable Yield Calculator — Yield against stock size, peaking at half the carrying capacity." title="Maximum Sustainable Yield Calculator"><figcaption>Yield against stock size, peaking at half the carrying capacity.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>r</code></td><td>intrinsic rate of increase</td><td>per year</td></tr><tr><td><code>K</code></td><td>carrying capacity</td><td>individuals</td></tr><tr><td><code>MSY</code></td><td>maximum sustainable yield</td><td>individuals/year</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Maximum Sustainable Yield?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: carrying capacity (k) of <strong>10,000</strong> individuals, intrinsic growth rate (r) of <strong>0.6</strong> per year.</p>
            <p>Substituting them into the formula gives maximum sustainable yield of <strong>1,500</strong> individuals/year, stock size at msy of <strong>5,000</strong> individuals, sustainable harvest rate of <strong>30</strong> %/year, yield at half of k of <strong>1,500</strong> individuals/year.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>harvest below 50% of MSY</td><td><strong>Conservative</strong></td><td>the stock stays near K</td></tr><tr><td>harvest at MSY</td><td><strong>Maximum</strong></td><td>productive but leaves no margin for bad years</td></tr><tr><td>harvest above MSY</td><td><strong>Overfishing</strong></td><td>the stock declines and the yield falls with it</td></tr></tbody></table>
            <ul><li><p>MSY is a theoretical maximum, not a management target: real stocks fluctuate, and fishing at MSY in a bad year pushes the population below the level that produces it.</p></li><li><p>The model assumes logistic growth, no age structure and no environmental variability. Modern management uses reference points such as B_MSY and F_MSY with buffers.</p></li><li><p>Because yield peaks at K/2, a depleted stock can produce more surplus than a full one — which is why recovery plans sometimes allow fishing before the stock is fully rebuilt.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using r as a percentage in one place and a fraction in another.</li><li>Treating MSY as a fixed tonnage when it depends on the current stock size.</li><li>Applying a single-species formula to a multi-species fishery without accounting for bycatch.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why is MSY at half the carrying capacity?', 'a' => 'Because logistic growth is fastest at K/2, so the population replaces harvested individuals most quickly there.'],
            ['q' => 'Is MSY always sustainable?', 'a' => 'No — it is sustainable only in the deterministic model. In practice it is a ceiling, and management sets targets well below it.'],
            ['q' => 'What does the Maximum Sustainable Yield actually calculate?', 'a' => <<<'TXT'
            It returns maximum sustainable yield, stock size at MSY, sustainable harvest rate and yield at half of K. Each one is derived by the formula on this page, so you can check any figure by hand.
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
