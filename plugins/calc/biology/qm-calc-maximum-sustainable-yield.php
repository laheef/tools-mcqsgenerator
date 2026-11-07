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
    'meta' => ['title' => 'Maximum Sustainable Yield Calculator — Biology', 'description' => 'Maximum Sustainable Yield turns Carrying capacity (K) and Intrinsic growth rate (r) into Maximum sustainable yield and Stock size at MSY.', 'h1' => 'Maximum Sustainable Yield Calculator', 'updated' => '2026-10-29'],
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
        Maximum Sustainable Yield turns Carrying capacity (K) and Intrinsic growth rate (r) into Maximum sustainable yield and Stock size at MSY. Nothing is looked up on this page: Maximum sustainable yield is computed from Carrying capacity (K) and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Maximum sustainable yield is opened in individuals/year; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Maximum Sustainable Yield calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Maximum Sustainable Yield: it takes 2 numbers and reports Maximum sustainable yield, Stock size at MSY and Sustainable harvest rate.</p><p>The relationship it solves reads Maximum sustainable yield = Intrinsic growth rate (r) × Carrying capacity (K) ÷ 4.</p><p>The result panel carries Maximum sustainable yield, Stock size at MSY, Sustainable harvest rate and Yield at half of K, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Carrying capacity (K)</strong> — in individuals</li><li><strong>Intrinsic growth rate (r)</strong> — in per year</li></ul><p>The answers come back as Maximum sustainable yield in individuals/year, Stock size at MSY in individuals, Sustainable harvest rate in %/year, Yield at half of K in individuals/year. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Carrying capacity (K) = 10000 individuals and Intrinsic growth rate (r) = 0.6 per year — through the same formula and the panel reports &lt;strong&gt;Maximum sustainable yield&lt;/strong&gt; = 1500 individuals/year, &lt;strong&gt;Stock size at MSY&lt;/strong&gt; = 5000 individuals, &lt;strong&gt;Sustainable harvest rate&lt;/strong&gt; = 30 %/year and &lt;strong&gt;Yield at half of K&lt;/strong&gt; = 1500 individuals/year.</p><ul><li><strong>Maximum sustainable yield</strong> = 1500 individuals/year</li><li><strong>Stock size at MSY</strong> = 5000 individuals</li><li><strong>Sustainable harvest rate</strong> = 30 %/year</li><li><strong>Yield at half of K</strong> = 1500 individuals/year</li></ul><p>The line behind those figures is <strong>Maximum sustainable yield</strong> = <code>Intrinsic growth rate (r) × Carrying capacity (K) ÷ 4</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Maximum sustainable yield&lt;/strong&gt; = 1500, &lt;strong&gt;Stock size at MSY&lt;/strong&gt; = 5000, &lt;strong&gt;Sustainable harvest rate&lt;/strong&gt; = 30 and &lt;strong&gt;Yield at half of K&lt;/strong&gt; = 1500 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Maximum sustainable yield takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Maximum sustainable yield</strong> = <code>Intrinsic growth rate (r) × Carrying capacity (K) ÷ 4</code></li><li><strong>Stock size at MSY</strong> = <code>Carrying capacity (K) ÷ 2</code></li><li><strong>Sustainable harvest rate</strong> = <code>Intrinsic growth rate (r) ÷ 2 × 100</code></li><li><strong>Yield at half of K</strong> = <code>Intrinsic growth rate (r) × (Carrying capacity (K) ÷ 2) × (1 − 0.5)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Maximum sustainable yield, Stock size at MSY and Sustainable harvest rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Carrying capacity (K), from 10000 to 20000 — and the answers go from &lt;strong&gt;Maximum sustainable yield&lt;/strong&gt; 1500 individuals/year, &lt;strong&gt;Stock size at MSY&lt;/strong&gt; 5000 individuals, &lt;strong&gt;Sustainable harvest rate&lt;/strong&gt; 30 %/year and &lt;strong&gt;Yield at half of K&lt;/strong&gt; 1500 individuals/year to &lt;strong&gt;Maximum sustainable yield&lt;/strong&gt; 3000 individuals/year, &lt;strong&gt;Stock size at MSY&lt;/strong&gt; 10000 individuals, &lt;strong&gt;Sustainable harvest rate&lt;/strong&gt; 30 %/year and &lt;strong&gt;Yield at half of K&lt;/strong&gt; 3000 individuals/year.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Maximum sustainable yield, Stock size at MSY and Sustainable harvest rate are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Carrying capacity (K) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Carrying capacity (K) and Intrinsic growth rate (r) measured, Maximum sustainable yield and Stock size at MSY wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/cat-quality-of-life">Cat quality of life Calculator</a>, <a href="/biology/catch-per-unit-effort">Catch Per Unit Effort Calculator</a> and <a href="/biology/catculator">Catculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Maximum Sustainable Yield calculator work out?', 'a' => <<<'TXT'
            Maximum sustainable yield, Stock size at MSY, Sustainable harvest rate and Yield at half of K, from Intrinsic growth rate (r) and Carrying capacity (K). The relationship is Maximum sustainable yield = Intrinsic growth rate (r) × Carrying capacity (K) ÷ 4.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Carrying capacity (K) (individuals), Intrinsic growth rate (r) (per year). Fill k and r and leave Maximum sustainable yield empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Maximum sustainable yield, Stock size at MSY, Sustainable harvest rate and Yield at half of K can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Maximum sustainable yield = 1500 individuals/year, Stock size at MSY = 5000 individuals, Sustainable harvest rate = 30 %/year and Yield at half of K = 1500 individuals/year. The figures come from Carrying capacity (K) as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Maximum sustainable yield is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Carrying capacity (K) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Maximum sustainable yield keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/cat-quality-of-life', 'name' => 'Cat quality of life Calculator'],
            ['path' => '/biology/catch-per-unit-effort', 'name' => 'Catch Per Unit Effort Calculator'],
            ['path' => '/biology/catculator', 'name' => 'Catculator'],
        ],
        'authors' => [],
    ],
];
