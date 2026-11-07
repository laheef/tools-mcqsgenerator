<?php

/**
 * Hardy–Weinberg from the Recessive Homozygote Frequency
 * /biology/hardy-weinberg-recessive-homozygote
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hardy–Weinberg from the Recessive Homozygote Frequency',
    'meta' => ['title' => 'Hardy–Weinberg: Recessive Homozygote Frequency', 'description' => 'Hardy–Weinberg from the Recessive Homozygote Frequency reports recessive allele frequency (q) and dominant allele frequency (p). Any box can be the unknown.', 'h1' => 'Hardy–Weinberg from the Recessive Homozygote Frequency', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'affected',
                            'label' => 'Frequency of the recessive phenotype',
                            'type' => 'number',
                            'help' => 'q², as a decimal',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.04',
                        ],
                        [
                            'name' => 'q',
                            'label' => 'Recessive allele frequency (q)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p',
                            'label' => 'Dominant allele frequency (p)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hetero',
                            'label' => 'Heterozygote frequency',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'homo_dom',
                            'label' => 'Homozygous dominant frequency',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'carriers_per_case',
                            'label' => 'Carriers per affected individual',
                            'type' => 'number',
                            'suffix' => ':1',
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
            'title' => 'Alleles',
            'results' => [
                'q' => 'sqrt(affected)',
                'p' => '1-sqrt(affected)',
                'hetero' => '2*(1-sqrt(affected))*sqrt(affected)',
                'homo_dom' => '(1-sqrt(affected))*(1-sqrt(affected))',
                'carriers_per_case' => '2*(1-sqrt(affected))*sqrt(affected)/affected',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Hardy–Weinberg from the Recessive Homozygote Frequency takes Frequency of the recessive phenotype and returns Recessive allele frequency (q) and Dominant allele frequency (p). It is a single relationship that reads recessive allele frequency (q) out of frequency of the recessive phenotype, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Hardy–Weinberg from the Recessive Homozygote Frequency calculator works', 'html' => <<<'TXT'
            <p>Hardy–Weinberg from the Recessive Homozygote Frequency answers one question from 1 number, and the answer is Recessive allele frequency (q), Dominant allele frequency (p) and Heterozygote frequency.</p><p>Written with the labels from the form, Recessive allele frequency (q) = √(Frequency of the recessive phenotype).</p><p>What comes back is Recessive allele frequency (q), Dominant allele frequency (p), Heterozygote frequency and Homozygous dominant frequency — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Frequency of the recessive phenotype</strong> — a plain number, no unit. q², as a decimal</li></ul><p>The answers come back as Recessive allele frequency (q), Dominant allele frequency (p), Heterozygote frequency, Homozygous dominant frequency, Carriers per affected individual in :1. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Frequency of the recessive phenotype = 0.04 gives <strong>Recessive allele frequency (q)</strong> = 0.2, <strong>Dominant allele frequency (p)</strong> = 0.8, <strong>Heterozygote frequency</strong> = 0.32, <strong>Homozygous dominant frequency</strong> = 0.64 and <strong>Carriers per affected individual</strong> = 8 :1.</p><ul><li><strong>Recessive allele frequency (q)</strong> = 0.2</li><li><strong>Dominant allele frequency (p)</strong> = 0.8</li><li><strong>Heterozygote frequency</strong> = 0.32</li><li><strong>Homozygous dominant frequency</strong> = 0.64</li><li><strong>Carriers per affected individual</strong> = 8 :1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Recessive allele frequency (q)</strong> = <code>√(Frequency of the recessive phenotype)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Recessive allele frequency (q)</strong> = 0.2, <strong>Dominant allele frequency (p)</strong> = 0.8, <strong>Heterozygote frequency</strong> = 0.32, <strong>Homozygous dominant frequency</strong> = 0.64 and <strong>Carriers per affected individual</strong> = 8 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Recessive allele frequency (q) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Recessive allele frequency (q)</strong> = <code>√(Frequency of the recessive phenotype)</code></li><li><strong>Dominant allele frequency (p)</strong> = <code>1 − √(Frequency of the recessive phenotype)</code></li><li><strong>Heterozygote frequency</strong> = <code>2 × (1 − √(Frequency of the recessive phenotype)) × √(Frequency of the recessive phenotype)</code></li><li><strong>Homozygous dominant frequency</strong> = <code>(1 − √(Frequency of the recessive phenotype)) × (1 − √(Frequency of the recessive phenotype))</code></li><li><strong>Carriers per affected individual</strong> = <code>2 × (1 − √(Frequency of the recessive phenotype)) × √(Frequency of the recessive phenotype) ÷ Frequency of the recessive phenotype</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Recessive allele frequency (q)</strong> = <code>√(Frequency of the recessive phenotype)</code> — the form to use when Frequency of the recessive phenotype are the values you have.</li><li><strong>Dominant allele frequency (p)</strong> = <code>1 − √(Frequency of the recessive phenotype)</code> — the form to use when Frequency of the recessive phenotype are the values you have.</li><li><strong>Heterozygote frequency</strong> = <code>2 × (1 − √(Frequency of the recessive phenotype)) × √(Frequency of the recessive phenotype)</code> — the form to use when Frequency of the recessive phenotype are the values you have.</li><li><strong>Homozygous dominant frequency</strong> = <code>(1 − √(Frequency of the recessive phenotype)) × (1 − √(Frequency of the recessive phenotype))</code> — the form to use when Frequency of the recessive phenotype are the values you have.</li><li><strong>Carriers per affected individual</strong> = <code>2 × (1 − √(Frequency of the recessive phenotype)) × √(Frequency of the recessive phenotype) ÷ Frequency of the recessive phenotype</code> — the form to use when Frequency of the recessive phenotype are the values you have.</li></ul><p>Any one of Recessive allele frequency (q), Dominant allele frequency (p) and Heterozygote frequency can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Frequency of the recessive phenotype from 0.04 to 0.08, leaving every other box alone. The panel moves from <strong>Recessive allele frequency (q)</strong> 0.2, <strong>Dominant allele frequency (p)</strong> 0.8, <strong>Heterozygote frequency</strong> 0.32, <strong>Homozygous dominant frequency</strong> 0.64 and <strong>Carriers per affected individual</strong> 8 :1 to <strong>Recessive allele frequency (q)</strong> 0.2828, <strong>Dominant allele frequency (p)</strong> 0.7172, <strong>Heterozygote frequency</strong> 0.4057, <strong>Homozygous dominant frequency</strong> 0.5143 and <strong>Carriers per affected individual</strong> 5.07 :1.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Recessive allele frequency (q), Dominant allele frequency (p) and Heterozygote frequency are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Frequency of the recessive phenotype left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Frequency of the recessive phenotype is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Frequency of the recessive phenotype is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Hardy–Weinberg from the Recessive Homozygote Frequency form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Frequency of the recessive phenotype</strong> takes a plain number with no unit attached. q², as a decimal. The page reads it when it works out Recessive allele frequency (q), Dominant allele frequency (p) and Heterozygote frequency. Fill it from a measurement rather than a memory — Frequency of the recessive phenotype is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Recessive allele frequency (q)</strong> is a plain number and the page's own defaults put it at 0.2. It is computed from Frequency of the recessive phenotype, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Dominant allele frequency (p)</strong> is a plain number and the page's own defaults put it at 0.8. It is computed from Frequency of the recessive phenotype, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Heterozygote frequency</strong> is a plain number and the page's own defaults put it at 0.32. It is computed from Frequency of the recessive phenotype, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Homozygous dominant frequency</strong> is a plain number and the page's own defaults put it at 0.64. It is computed from Frequency of the recessive phenotype, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Carriers per affected individual</strong> is a plain number and the page's own defaults put it at 8. It is computed from Frequency of the recessive phenotype, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Recessive allele frequency (q)</th><th>Dominant allele frequency (p)</th><th>Heterozygote frequency</th><th>Homozygous dominant frequency</th><th>Carriers per affected individual</th></tr></thead><tbody><tr><td><strong>Frequency of the recessive phenotype</strong> +10%</td><td>+4.88%</td><td>-1.22%</td><td>+3.6%</td><td>-2.43%</td><td>-5.82%</td></tr></tbody></table><p>Ranked by leverage, Frequency of the recessive phenotype sits at the top — a ten per cent error in that box shows up as roughly 5.8 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Frequency of the recessive phenotype = 0.02 and the page reports <strong>Recessive allele frequency (q)</strong> = 0.1414, <strong>Dominant allele frequency (p)</strong> = 0.8586, <strong>Heterozygote frequency</strong> = 0.2428, <strong>Homozygous dominant frequency</strong> = 0.7372 and <strong>Carriers per affected individual</strong> = 12.14 :1.</li><li>Feed in Frequency of the recessive phenotype = 0.12 and the page reports <strong>Recessive allele frequency (q)</strong> = 0.3464, <strong>Dominant allele frequency (p)</strong> = 0.6536, <strong>Heterozygote frequency</strong> = 0.4528, <strong>Homozygous dominant frequency</strong> = 0.4272 and <strong>Carriers per affected individual</strong> = 3.77 :1.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Recessive allele frequency (q) is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Frequency of the recessive phenotype measured, Recessive allele frequency (q) and Dominant allele frequency (p) wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/sheep-gestation">Sheep gestation Calculator</a>, <a href="/biology/simpson-diversity-index">Simpson&#039;s Diversity Index Calculator</a> and <a href="/biology/svi-sludge-volume-index">Sludge Volume Index (SVI) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hardy–Weinberg from the Recessive Homozygote Frequency calculator work out?', 'a' => <<<'TXT'
            Recessive allele frequency (q), Dominant allele frequency (p), Heterozygote frequency and Homozygous dominant frequency, from Frequency of the recessive phenotype. The relationship is Recessive allele frequency (q) = √(Frequency of the recessive phenotype).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Frequency of the recessive phenotype. Enter frequency of the recessive phenotype; Recessive allele frequency (q) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Recessive allele frequency (q), Dominant allele frequency (p), Heterozygote frequency and Homozygous dominant frequency blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Recessive allele frequency (q) = 0.2, Dominant allele frequency (p) = 0.8, Heterozygote frequency = 0.32, Homozygous dominant frequency = 0.64 and Carriers per affected individual = 8 :1. The figures come from Frequency of the recessive phenotype as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Recessive allele frequency (q) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Frequency of the recessive phenotype blank and the page solves for it, reporting Recessive allele frequency (q) instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Recessive allele frequency (q) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/sheep-gestation', 'name' => 'Sheep gestation Calculator'],
            ['path' => '/biology/simpson-diversity-index', 'name' => 'Simpson\'s Diversity Index Calculator'],
            ['path' => '/biology/svi-sludge-volume-index', 'name' => 'Sludge Volume Index (SVI) Calculator'],
        ],
        'authors' => [],
    ],
];
