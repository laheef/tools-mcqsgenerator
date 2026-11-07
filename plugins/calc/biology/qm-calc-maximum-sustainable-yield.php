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
    'meta' => ['title' => 'Maximum Sustainable Yield Calculator — Biology', 'description' => 'Maximum Sustainable Yield Calculator takes carrying capacity (K) and intrinsic growth rate (r) and returns stock size at MSY and sustainable harvest rate.', 'h1' => 'Maximum Sustainable Yield Calculator', 'updated' => '2026-10-29'],
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
        Maximum Sustainable Yield turns Carrying capacity (K) and Intrinsic growth rate (r) into Maximum sustainable yield and Stock size at MSY. Nothing is looked up on this page: maximum sustainable yield is computed from carrying capacity (K) and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Maximum sustainable yield is opened in individuals/year; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Maximum Sustainable Yield calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Maximum Sustainable Yield: it takes 2 numbers and reports Maximum sustainable yield, Stock size at MSY and Sustainable harvest rate.</p><p>The relationship it solves reads Maximum sustainable yield = Intrinsic growth rate (r) × Carrying capacity (K) ÷ 4.</p><p>The result panel carries Maximum sustainable yield, Stock size at MSY, Sustainable harvest rate and Yield at half of K, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Carrying capacity (K)</strong> — in individuals</li><li><strong>Intrinsic growth rate (r)</strong> — in per year</li></ul><p>The answers come back as Maximum sustainable yield in individuals/year, Stock size at MSY in individuals, Sustainable harvest rate in %/year, Yield at half of K in individuals/year. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Carrying capacity (K) = 10000 individuals and Intrinsic growth rate (r) = 0.6 per year — through the same formula and the panel reports <strong>Maximum sustainable yield</strong> = 1500 individuals/year, <strong>Stock size at MSY</strong> = 5000 individuals, <strong>Sustainable harvest rate</strong> = 30 %/year and <strong>Yield at half of K</strong> = 1500 individuals/year.</p><ul><li><strong>Maximum sustainable yield</strong> = 1500 individuals/year</li><li><strong>Stock size at MSY</strong> = 5000 individuals</li><li><strong>Sustainable harvest rate</strong> = 30 %/year</li><li><strong>Yield at half of K</strong> = 1500 individuals/year</li></ul><p>The line behind those figures is <strong>Maximum sustainable yield</strong> = <code>Intrinsic growth rate (r) × Carrying capacity (K) ÷ 4</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Maximum sustainable yield</strong> = 1500, <strong>Stock size at MSY</strong> = 5000, <strong>Sustainable harvest rate</strong> = 30 and <strong>Yield at half of K</strong> = 1500 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Maximum sustainable yield takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Maximum sustainable yield</strong> = <code>Intrinsic growth rate (r) × Carrying capacity (K) ÷ 4</code></li><li><strong>Stock size at MSY</strong> = <code>Carrying capacity (K) ÷ 2</code></li><li><strong>Sustainable harvest rate</strong> = <code>Intrinsic growth rate (r) ÷ 2 × 100</code></li><li><strong>Yield at half of K</strong> = <code>Intrinsic growth rate (r) × (Carrying capacity (K) ÷ 2) × (1 − 0.5)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Maximum sustainable yield</strong> = <code>Intrinsic growth rate (r) × Carrying capacity (K) ÷ 4</code> — the form to use when Intrinsic growth rate (r) and Carrying capacity (K) are the values you have.</li><li><strong>Stock size at MSY</strong> = <code>Carrying capacity (K) ÷ 2</code> — the form to use when Carrying capacity (K) are the values you have.</li><li><strong>Sustainable harvest rate</strong> = <code>Intrinsic growth rate (r) ÷ 2 × 100</code> — the form to use when Intrinsic growth rate (r) are the values you have.</li><li><strong>Yield at half of K</strong> = <code>Intrinsic growth rate (r) × (Carrying capacity (K) ÷ 2) × (1 − 0.5)</code> — the form to use when Intrinsic growth rate (r) and Carrying capacity (K) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Maximum sustainable yield, Stock size at MSY and Sustainable harvest rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Carrying capacity (K), from 10000 to 20000 — and the answers go from <strong>Maximum sustainable yield</strong> 1500 individuals/year, <strong>Stock size at MSY</strong> 5000 individuals, <strong>Sustainable harvest rate</strong> 30 %/year and <strong>Yield at half of K</strong> 1500 individuals/year to <strong>Maximum sustainable yield</strong> 3000 individuals/year, <strong>Stock size at MSY</strong> 10000 individuals, <strong>Sustainable harvest rate</strong> 30 %/year and <strong>Yield at half of K</strong> 3000 individuals/year.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Maximum sustainable yield, Stock size at MSY and Sustainable harvest rate are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Carrying capacity (K) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Carrying capacity (K) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Intrinsic growth rate (r) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Intrinsic growth rate (r) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Carrying capacity (K) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Carrying capacity (K)</strong> is measured in individuals. The page reads it when it works out Maximum sustainable yield, Stock size at MSY and Yield at half of K. Have it to hand before you start: Carrying capacity (K) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Intrinsic growth rate (r)</strong> is measured in per year. The page reads it when it works out Maximum sustainable yield, Sustainable harvest rate and Yield at half of K. Have it to hand before you start: Intrinsic growth rate (r) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Maximum sustainable yield</strong> is a plain number and the page's own defaults put it at 1500. It is computed from Intrinsic growth rate (r) and Carrying capacity (K), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Stock size at MSY</strong> is a plain number and the page's own defaults put it at 5000. It is computed from Carrying capacity (K), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Sustainable harvest rate</strong> is a plain number and the page's own defaults put it at 30. It is computed from Intrinsic growth rate (r), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Yield at half of K</strong> is a plain number and the page's own defaults put it at 1500. It is computed from Intrinsic growth rate (r) and Carrying capacity (K), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Maximum sustainable yield</th><th>Stock size at MSY</th><th>Sustainable harvest rate</th><th>Yield at half of K</th></tr></thead><tbody><tr><td><strong>Carrying capacity (K)</strong> +10%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Intrinsic growth rate (r)</strong> +10%</td><td>+10%</td><td>+0%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Carrying capacity (K) sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Carrying capacity (K) = 5000 individuals and Intrinsic growth rate (r) = 0.3 per year, the answer is <strong>Maximum sustainable yield</strong> = 375 individuals/year, <strong>Stock size at MSY</strong> = 2500 individuals, <strong>Sustainable harvest rate</strong> = 15 %/year and <strong>Yield at half of K</strong> = 375 individuals/year.</li><li>With Carrying capacity (K) = 30000 individuals and Intrinsic growth rate (r) = 0.6 per year, the answer is <strong>Maximum sustainable yield</strong> = 4500 individuals/year, <strong>Stock size at MSY</strong> = 15000 individuals, <strong>Sustainable harvest rate</strong> = 30 %/year and <strong>Yield at half of K</strong> = 4500 individuals/year.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Maximum sustainable yield follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
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
            Carrying capacity (K) (individuals), Intrinsic growth rate (r) (per year). Fill carrying capacity (K) and intrinsic growth rate (r) and leave Maximum sustainable yield empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Maximum sustainable yield, Stock size at MSY, Sustainable harvest rate and Yield at half of K can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Maximum sustainable yield = 1500 individuals/year, Stock size at MSY = 5000 individuals, Sustainable harvest rate = 30 %/year and Yield at half of K = 1500 individuals/year. The figures come from Carrying capacity (K) as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Maximum sustainable yield is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
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
