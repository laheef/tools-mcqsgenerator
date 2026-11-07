<?php

/**
 * Relatedness Coefficient Calculator
 * /biology/relatedness-coefficient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Relatedness Coefficient Calculator',
    'meta' => ['title' => 'Relatedness Coefficient Calculator — Biology', 'description' => 'Relatedness Coefficient Calculator works out coefficient of relationship and Expected shared DNA from meioses from individual 1 and meioses from individual 2.', 'h1' => 'Relatedness Coefficient Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'n1',
                            'label' => 'Meioses from individual 1',
                            'type' => 'number',
                            'help' => 'Steps up to the common ancestor',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Meioses from individual 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'paths',
                            'label' => 'Paths through common ancestors',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'r',
                            'label' => 'Coefficient of relationship',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cm',
                            'label' => 'Expected shared DNA',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'shared_dna',
                            'label' => 'Shared DNA share',
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
            'title' => 'Relatedness',
            'results' => ['r' => 'pow(0.5,n1+n2)*paths*100', 'cm' => 'pow(0.5,n1+n2)*paths*6800', 'shared_dna' => 'pow(0.5,n1+n2)*paths*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Relatedness Coefficient takes Meioses from individual 1, Meioses from individual 2 and Paths through common ancestors and returns Coefficient of relationship and Expected shared DNA. It is a single relationship that reads coefficient of relationship out of meioses from individual 1, not a table of canned results keyed by them. Units for Coefficient of relationship default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Relatedness Coefficient calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Relatedness Coefficient: it takes 3 numbers and reports Coefficient of relationship, Expected shared DNA and Shared DNA share.</p><p>In the form&#039;s own words, Coefficient of relationship = (0.5)^(Meioses from individual 1 + Meioses from individual 2) × Paths through common ancestors × 100.</p><p>The result panel carries Coefficient of relationship, Expected shared DNA and Shared DNA share, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Meioses from individual 1</strong> — a plain number, no unit. Steps up to the common ancestor</li><li><strong>Meioses from individual 2</strong> — a plain number, no unit</li><li><strong>Paths through common ancestors</strong> — a plain number, no unit</li></ul><p>The result boxes are Coefficient of relationship in %, Expected shared DNA in cM, Shared DNA share in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Meioses from individual 1 = 2, Meioses from individual 2 = 2 and Paths through common ancestors = 1; the answers are <strong>Coefficient of relationship</strong> = 6.25 %, <strong>Expected shared DNA</strong> = 425 cM and <strong>Shared DNA share</strong> = 6.25 %.</p><ul><li><strong>Coefficient of relationship</strong> = 6.25 %</li><li><strong>Expected shared DNA</strong> = 425 cM</li><li><strong>Shared DNA share</strong> = 6.25 %</li></ul><p>That is <strong>Coefficient of relationship</strong> = <code>(0.5)^(Meioses from individual 1 + Meioses from individual 2) × Paths through common ancestors × 100</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Coefficient of relationship</strong> = 6.25, <strong>Expected shared DNA</strong> = 425 and <strong>Shared DNA share</strong> = 6.25 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Coefficient of relationship takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Coefficient of relationship</strong> = <code>(0.5)^(Meioses from individual 1 + Meioses from individual 2) × Paths through common ancestors × 100</code></li><li><strong>Expected shared DNA</strong> = <code>(0.5)^(Meioses from individual 1 + Meioses from individual 2) × Paths through common ancestors × 6800</code></li><li><strong>Shared DNA share</strong> = <code>(0.5)^(Meioses from individual 1 + Meioses from individual 2) × Paths through common ancestors × 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Coefficient of relationship</strong> = <code>(0.5)^(Meioses from individual 1 + Meioses from individual 2) × Paths through common ancestors × 100</code> — the form to use when Meioses from individual 1, Meioses from individual 2 and Paths through common ancestors are the values you have.</li><li><strong>Expected shared DNA</strong> = <code>(0.5)^(Meioses from individual 1 + Meioses from individual 2) × Paths through common ancestors × 6800</code> — the form to use when Meioses from individual 1, Meioses from individual 2 and Paths through common ancestors are the values you have.</li><li><strong>Shared DNA share</strong> = <code>(0.5)^(Meioses from individual 1 + Meioses from individual 2) × Paths through common ancestors × 100</code> — the form to use when Meioses from individual 1, Meioses from individual 2 and Paths through common ancestors are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Coefficient of relationship, Expected shared DNA and Shared DNA share can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Meioses from individual 1 from 2 to 4, leaving every other box alone. The panel moves from <strong>Coefficient of relationship</strong> 6.25 %, <strong>Expected shared DNA</strong> 425 cM and <strong>Shared DNA share</strong> 6.25 % to <strong>Coefficient of relationship</strong> 1.56 %, <strong>Expected shared DNA</strong> 106 cM and <strong>Shared DNA share</strong> 1.56 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Coefficient of relationship, Expected shared DNA and Shared DNA share are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Meioses from individual 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Meioses from individual 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Meioses from individual 2 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Meioses from individual 2 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Paths through common ancestors left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Paths through common ancestors is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Meioses from individual 1 is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Relatedness Coefficient form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Meioses from individual 1</strong> takes a plain number with no unit attached. Steps up to the common ancestor. It feeds Coefficient of relationship, Expected shared DNA and Shared DNA share. Fill it from a measurement rather than a memory — Meioses from individual 1 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Meioses from individual 2</strong> takes a plain number with no unit attached. It feeds Coefficient of relationship, Expected shared DNA and Shared DNA share. Fill it from a measurement rather than a memory — Meioses from individual 2 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Paths through common ancestors</strong> takes a plain number with no unit attached. It feeds Coefficient of relationship, Expected shared DNA and Shared DNA share. Fill it from a measurement rather than a memory — Paths through common ancestors is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Coefficient of relationship</strong> is a plain number and the page's own defaults put it at 6.25. It is worked out from Meioses from individual 1, Meioses from individual 2 and Paths through common ancestors. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Expected shared DNA</strong> is a plain number and the page's own defaults put it at 425. It is worked out from Meioses from individual 1, Meioses from individual 2 and Paths through common ancestors. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Shared DNA share</strong> is a plain number and the page's own defaults put it at 6.25. It is worked out from Meioses from individual 1, Meioses from individual 2 and Paths through common ancestors. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Coefficient of relationship</th><th>Expected shared DNA</th><th>Shared DNA share</th></tr></thead><tbody><tr><td><strong>Meioses from individual 1</strong> +10%</td><td>-12.94%</td><td>-12.94%</td><td>-12.94%</td></tr><tr><td><strong>Meioses from individual 2</strong> +10%</td><td>-12.94%</td><td>-12.94%</td><td>-12.94%</td></tr><tr><td><strong>Paths through common ancestors</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Meioses from individual 1 sits at the top — a ten per cent error in that box shows up as roughly 12.9 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Meioses from individual 1 = 1, Meioses from individual 2 = 1 and Paths through common ancestors = 0.5 and the page reports <strong>Coefficient of relationship</strong> = 12.5 %, <strong>Expected shared DNA</strong> = 850 cM and <strong>Shared DNA share</strong> = 12.5 %.</li><li>Feed in Meioses from individual 1 = 6, Meioses from individual 2 = 2 and Paths through common ancestors = 1 and the page reports <strong>Coefficient of relationship</strong> = 0.391 %, <strong>Expected shared DNA</strong> = 26.56 cM and <strong>Shared DNA share</strong> = 0.391 %.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Coefficient of relationship is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Meioses from individual 1, Meioses from individual 2 and Paths through common ancestors and the number you are missing is Coefficient of relationship and Expected shared DNA.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dna-pattern-finder">DNA Pattern Finder Calculator</a>, <a href="/biology/dna-percentage">DNA Percentage Calculator</a> and <a href="/biology/sequence-shuffler">DNA Sequence Shuffler Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Relatedness Coefficient calculator work out?', 'a' => <<<'TXT'
            Coefficient of relationship, Expected shared DNA and Shared DNA share, from Meioses from individual 1, Meioses from individual 2 and Paths through common ancestors. The relationship is Coefficient of relationship = (0.5)^(Meioses from individual 1 + Meioses from individual 2) × Paths through common ancestors × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Meioses from individual 1, Meioses from individual 2, Paths through common ancestors. Fill meioses from individual 1, meioses from individual 2 and paths through common ancestors and leave Coefficient of relationship empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Coefficient of relationship, Expected shared DNA and Shared DNA share can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Coefficient of relationship = 6.25 %, Expected shared DNA = 425 cM and Shared DNA share = 6.25 %. Those are the defaults written into the form — move Meioses from individual 1 and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Coefficient of relationship is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Meioses from individual 1 blank and the page solves for it, reporting Coefficient of relationship instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Coefficient of relationship keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dna-pattern-finder', 'name' => 'DNA Pattern Finder Calculator'],
            ['path' => '/biology/dna-percentage', 'name' => 'DNA Percentage Calculator'],
            ['path' => '/biology/sequence-shuffler', 'name' => 'DNA Sequence Shuffler Calculator'],
        ],
        'authors' => [],
    ],
];
