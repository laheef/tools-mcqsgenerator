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
    'meta' => ['title' => 'Relatedness Coefficient Calculator — Biology', 'description' => 'Relatedness Coefficient takes Meioses from individual 1, Meioses from individual 2 and Paths through common ancestors and returns Coefficient of relationship…', 'h1' => 'Relatedness Coefficient Calculator', 'updated' => '2026-10-29'],
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
        Relatedness Coefficient takes Meioses from individual 1, Meioses from individual 2 and Paths through common ancestors and returns Coefficient of relationship and Expected shared DNA. It is a single relationship that reads Coefficient of relationship out of Meioses from individual 1, not a table of canned results keyed by them. Units for Coefficient of relationship default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Relatedness Coefficient calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Relatedness Coefficient: it takes 3 numbers and reports Coefficient of relationship, Expected shared DNA and Shared DNA share.</p><p>In the form&#039;s own words, Coefficient of relationship = (0.5)^(Meioses from individual 1 + Meioses from individual 2) × Paths through common ancestors × 100.</p><p>The result panel carries Coefficient of relationship, Expected shared DNA and Shared DNA share, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Meioses from individual 1</strong> — a plain number, no unit. Steps up to the common ancestor</li><li><strong>Meioses from individual 2</strong> — a plain number, no unit</li><li><strong>Paths through common ancestors</strong> — a plain number, no unit</li></ul><p>The result boxes are Coefficient of relationship in %, Expected shared DNA in cM, Shared DNA share in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Meioses from individual 1 = 2, Meioses from individual 2 = 2 and Paths through common ancestors = 1; the answers are &lt;strong&gt;Coefficient of relationship&lt;/strong&gt; = 6.25 %, &lt;strong&gt;Expected shared DNA&lt;/strong&gt; = 425 cM and &lt;strong&gt;Shared DNA share&lt;/strong&gt; = 6.25 %.</p><ul><li><strong>Coefficient of relationship</strong> = 6.25 %</li><li><strong>Expected shared DNA</strong> = 425 cM</li><li><strong>Shared DNA share</strong> = 6.25 %</li></ul><p>That is <strong>Coefficient of relationship</strong> = <code>(0.5)^(Meioses from individual 1 + Meioses from individual 2) × Paths through common ancestors × 100</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Coefficient of relationship&lt;/strong&gt; = 6.25, &lt;strong&gt;Expected shared DNA&lt;/strong&gt; = 425 and &lt;strong&gt;Shared DNA share&lt;/strong&gt; = 6.25 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Coefficient of relationship takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Coefficient of relationship</strong> = <code>(0.5)^(Meioses from individual 1 + Meioses from individual 2) × Paths through common ancestors × 100</code></li><li><strong>Expected shared DNA</strong> = <code>(0.5)^(Meioses from individual 1 + Meioses from individual 2) × Paths through common ancestors × 6800</code></li><li><strong>Shared DNA share</strong> = <code>(0.5)^(Meioses from individual 1 + Meioses from individual 2) × Paths through common ancestors × 100</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Coefficient of relationship, Expected shared DNA and Shared DNA share can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Meioses from individual 1 from 2 to 4, leaving every other box alone. The panel moves from &lt;strong&gt;Coefficient of relationship&lt;/strong&gt; 6.25 %, &lt;strong&gt;Expected shared DNA&lt;/strong&gt; 425 cM and &lt;strong&gt;Shared DNA share&lt;/strong&gt; 6.25 % to &lt;strong&gt;Coefficient of relationship&lt;/strong&gt; 1.56 %, &lt;strong&gt;Expected shared DNA&lt;/strong&gt; 106 cM and &lt;strong&gt;Shared DNA share&lt;/strong&gt; 1.56 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Coefficient of relationship, Expected shared DNA and Shared DNA share are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Meioses from individual 1 is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
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
            Meioses from individual 1, Meioses from individual 2, Paths through common ancestors. Fill n1, n2 and paths and leave Coefficient of relationship empty if you would rather have that one solved instead.
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
