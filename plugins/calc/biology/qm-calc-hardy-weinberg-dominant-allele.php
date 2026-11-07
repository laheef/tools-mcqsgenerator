<?php

/**
 * Hardy–Weinberg from the Dominant Allele Frequency
 * /biology/hardy-weinberg-dominant-allele
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hardy–Weinberg from the Dominant Allele Frequency',
    'meta' => ['title' => 'Hardy–Weinberg from the Dominant Allele Frequency', 'description' => 'Hardy–Weinberg from the Dominant Allele Frequency reports recessive allele frequency (q), AA individuals expected, aa individuals expected and carriers.', 'h1' => 'Hardy–Weinberg from the Dominant Allele Frequency', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'p',
                            'label' => 'Dominant allele frequency (p)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.8',
                        ],
                        [
                            'name' => 'n',
                            'label' => 'Sample size',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'q',
                            'label' => 'Recessive allele frequency (q)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'aa',
                            'label' => 'AA individuals expected',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ab',
                            'label' => 'Aa individuals expected',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bb',
                            'label' => 'aa individuals expected',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'carrier_pct',
                            'label' => 'Carriers',
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
            'title' => 'Genotypes',
            'results' => [
                'q' => '1-p',
                'aa' => 'p*p*n',
                'ab' => '2*p*(1-p)*n',
                'bb' => '(1-p)*(1-p)*n',
                'carrier_pct' => '2*p*(1-p)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Hardy–Weinberg from the Dominant Allele Frequency takes Dominant allele frequency (p) and Sample size and returns Recessive allele frequency (q) and AA individuals expected. There is no hidden constant here: change recessive allele frequency (q) and dominant allele frequency (p) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Hardy–Weinberg from the Dominant Allele Frequency calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Hardy–Weinberg from the Dominant Allele Frequency: it takes 2 numbers and reports Recessive allele frequency (q), AA individuals expected and Aa individuals expected.</p><p>The relationship it solves reads Recessive allele frequency (q) = 1 − Dominant allele frequency (p).</p><p>The result panel carries Recessive allele frequency (q), AA individuals expected, Aa individuals expected and aa individuals expected, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Dominant allele frequency (p)</strong> — a plain number, no unit</li><li><strong>Sample size</strong> — in individuals</li></ul><p>The answers come back as Recessive allele frequency (q), AA individuals expected in individuals, Aa individuals expected in individuals, aa individuals expected in individuals, Carriers in %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Dominant allele frequency (p) = 0.8 and Sample size = 500 individuals; the answers are <strong>Recessive allele frequency (q)</strong> = 0.2, <strong>AA individuals expected</strong> = 320 individuals, <strong>Aa individuals expected</strong> = 160 individuals, <strong>aa individuals expected</strong> = 20 individuals and <strong>Carriers</strong> = 32 %.</p><ul><li><strong>Recessive allele frequency (q)</strong> = 0.2</li><li><strong>AA individuals expected</strong> = 320 individuals</li><li><strong>Aa individuals expected</strong> = 160 individuals</li><li><strong>aa individuals expected</strong> = 20 individuals</li><li><strong>Carriers</strong> = 32 %</li></ul><p>That is <strong>Recessive allele frequency (q)</strong> = <code>1 − Dominant allele frequency (p)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Recessive allele frequency (q)</strong> = 0.2, <strong>AA individuals expected</strong> = 320, <strong>Aa individuals expected</strong> = 160, <strong>aa individuals expected</strong> = 20 and <strong>Carriers</strong> = 32 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Recessive allele frequency (q) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Recessive allele frequency (q)</strong> = <code>1 − Dominant allele frequency (p)</code></li><li><strong>AA individuals expected</strong> = <code>Dominant allele frequency (p) × Dominant allele frequency (p) × Sample size</code></li><li><strong>Aa individuals expected</strong> = <code>2 × Dominant allele frequency (p) × (1 − Dominant allele frequency (p)) × Sample size</code></li><li><strong>aa individuals expected</strong> = <code>(1 − Dominant allele frequency (p)) × (1 − Dominant allele frequency (p)) × Sample size</code></li><li><strong>Carriers</strong> = <code>2 × Dominant allele frequency (p) × (1 − Dominant allele frequency (p)) × 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Recessive allele frequency (q)</strong> = <code>1 − Dominant allele frequency (p)</code> — the form to use when Dominant allele frequency (p) are the values you have.</li><li><strong>AA individuals expected</strong> = <code>Dominant allele frequency (p) × Dominant allele frequency (p) × Sample size</code> — the form to use when Dominant allele frequency (p) and Sample size are the values you have.</li><li><strong>Aa individuals expected</strong> = <code>2 × Dominant allele frequency (p) × (1 − Dominant allele frequency (p)) × Sample size</code> — the form to use when Dominant allele frequency (p) and Sample size are the values you have.</li><li><strong>aa individuals expected</strong> = <code>(1 − Dominant allele frequency (p)) × (1 − Dominant allele frequency (p)) × Sample size</code> — the form to use when Dominant allele frequency (p) and Sample size are the values you have.</li><li><strong>Carriers</strong> = <code>2 × Dominant allele frequency (p) × (1 − Dominant allele frequency (p)) × 100</code> — the form to use when Dominant allele frequency (p) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Recessive allele frequency (q), AA individuals expected and Aa individuals expected can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Dominant allele frequency (p) from 0.8 to 1.6, leaving every other box alone. The panel moves from <strong>Recessive allele frequency (q)</strong> 0.2, <strong>AA individuals expected</strong> 320 individuals, <strong>Aa individuals expected</strong> 160 individuals, <strong>aa individuals expected</strong> 20 individuals and <strong>Carriers</strong> 32 % to <strong>Recessive allele frequency (q)</strong> -0.6, <strong>AA individuals expected</strong> 1280 individuals, <strong>Aa individuals expected</strong> -960 individuals, <strong>aa individuals expected</strong> 180 individuals and <strong>Carriers</strong> -192 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Recessive allele frequency (q), AA individuals expected and Aa individuals expected are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Dominant allele frequency (p) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dominant allele frequency (p) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Sample size left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Sample size is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Dominant allele frequency (p) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Dominant allele frequency (p)</strong> takes a plain number with no unit attached. The page reads it when it works out Recessive allele frequency (q), AA individuals expected and Aa individuals expected. Have it to hand before you start: Dominant allele frequency (p) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Sample size</strong> is measured in individuals. The page reads it when it works out AA individuals expected, Aa individuals expected and aa individuals expected. Have it to hand before you start: Sample size is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Recessive allele frequency (q)</strong> is a plain number and the page's own defaults put it at 0.2. The value follows from Dominant allele frequency (p). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>AA individuals expected</strong> is a plain number and the page's own defaults put it at 320. The value follows from Dominant allele frequency (p) and Sample size. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Aa individuals expected</strong> is a plain number and the page's own defaults put it at 160. The value follows from Dominant allele frequency (p) and Sample size. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>aa individuals expected</strong> is a plain number and the page's own defaults put it at 20. The value follows from Dominant allele frequency (p) and Sample size. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Carriers</strong> is a plain number and the page's own defaults put it at 32. The value follows from Dominant allele frequency (p). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Recessive allele frequency (q)</th><th>AA individuals expected</th><th>Aa individuals expected</th><th>aa individuals expected</th><th>Carriers</th></tr></thead><tbody><tr><td><strong>Dominant allele frequency (p)</strong> +10%</td><td>-40%</td><td>+21%</td><td>-34%</td><td>-64%</td><td>-34%</td></tr><tr><td><strong>Sample size</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Dominant allele frequency (p) sits at the top — a ten per cent error in that box shows up as roughly 64 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Dominant allele frequency (p) = 0.4 and Sample size = 250 individuals, the answer is <strong>Recessive allele frequency (q)</strong> = 0.6, <strong>AA individuals expected</strong> = 40 individuals, <strong>Aa individuals expected</strong> = 120 individuals, <strong>aa individuals expected</strong> = 90 individuals and <strong>Carriers</strong> = 48 %.</li><li>With Dominant allele frequency (p) = 2.4 and Sample size = 500 individuals, the answer is <strong>Recessive allele frequency (q)</strong> = -1.4, <strong>AA individuals expected</strong> = 2880 individuals, <strong>Aa individuals expected</strong> = -3360 individuals, <strong>aa individuals expected</strong> = 980 individuals and <strong>Carriers</strong> = -672 %.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Recessive allele frequency (q) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Dominant allele frequency (p) and Sample size are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Dominant allele frequency (p) and Sample size is what you already know and Recessive allele frequency (q) and AA individuals expected is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/autosomal-dominant-pedigree">Autosomal Dominant Pedigree Analyzer Calculator</a>, <a href="/biology/autosomal-recessive-risk">Autosomal Recessive Inheritance Risk Calculator</a> and <a href="/biology/bacteria-growth">Bacteria growth Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hardy–Weinberg from the Dominant Allele Frequency calculator work out?', 'a' => <<<'TXT'
            Recessive allele frequency (q), AA individuals expected, Aa individuals expected and aa individuals expected, from Dominant allele frequency (p). The relationship is Recessive allele frequency (q) = 1 − Dominant allele frequency (p).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Dominant allele frequency (p), Sample size (individuals). Enter dominant allele frequency (p) and sample size; Recessive allele frequency (q) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Recessive allele frequency (q), AA individuals expected, Aa individuals expected and aa individuals expected can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Recessive allele frequency (q) = 0.2, AA individuals expected = 320 individuals, Aa individuals expected = 160 individuals, aa individuals expected = 20 individuals and Carriers = 32 %. That comes from the page's own defaults, entered in Dominant allele frequency (p); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Recessive allele frequency (q) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Dominant allele frequency (p) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Recessive allele frequency (q) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/autosomal-dominant-pedigree', 'name' => 'Autosomal Dominant Pedigree Analyzer Calculator'],
            ['path' => '/biology/autosomal-recessive-risk', 'name' => 'Autosomal Recessive Inheritance Risk Calculator'],
            ['path' => '/biology/bacteria-growth', 'name' => 'Bacteria growth Calculator'],
        ],
        'authors' => [],
    ],
];
