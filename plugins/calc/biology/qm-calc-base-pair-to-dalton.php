<?php

/**
 * Base Pair to Dalton Calculator
 * /biology/base-pair-to-dalton
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Base Pair to Dalton Calculator',
    'meta' => ['title' => 'Base Pair to Dalton Calculator — Formula & Results', 'description' => 'Base Pair to Dalton turns Molecule and Length into Molecular weight and Molecular weight. It is a single relationship that reads Molecular weight out of…', 'h1' => 'Base Pair to Dalton Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'kind',
                            'label' => 'Molecule',
                            'type' => 'select',
                            'options' => ['Double-stranded DNA' => '650', 'Single-stranded DNA' => '330', 'RNA' => '340'],
                            'default' => 'Double-stranded DNA',
                        ],
                        [
                            'name' => 'bp',
                            'label' => 'Length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'dalton',
                            'label' => 'Molecular weight',
                            'type' => 'number',
                            'suffix' => 'Da',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kda',
                            'label' => 'Molecular weight',
                            'type' => 'number',
                            'suffix' => 'kDa',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gmol',
                            'label' => 'Molar mass',
                            'type' => 'number',
                            'suffix' => 'g/mol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pg',
                            'label' => 'Mass of one molecule',
                            'type' => 'number',
                            'suffix' => 'pg',
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
            'title' => 'Mass',
            'results' => ['dalton' => 'bp*kind', 'kda' => 'bp*kind/1000', 'gmol' => 'bp*kind', 'pg' => 'bp*kind/602214076000000000000000*1000000000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Base Pair to Dalton turns Molecule and Length into Molecular weight and Molecular weight. It is a single relationship that reads Molecular weight out of Molecule, not a table of canned results keyed by them. Units for Molecular weight default to Da and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Base Pair to Dalton calculator works', 'html' => <<<'TXT'
            <p>Base Pair to Dalton answers one question from 2 numbers, and the answer is Molecular weight, Molecular weight and Molar mass.</p><p>The relationship it solves reads Molecular weight = Length × Molecule.</p><p>The result panel carries Molecular weight, Molecular weight, Molar mass and Mass of one molecule, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Molecule</strong> — a plain number, no unit</li><li><strong>Length</strong> — in bp</li></ul><p>The result boxes are Molecular weight in Da, Molecular weight in kDa, Molar mass in g/mol, Mass of one molecule in pg; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Molecule = 650 and Length = 1000 bp; the answers are &lt;strong&gt;Molecular weight&lt;/strong&gt; = 650000 Da, &lt;strong&gt;Molecular weight&lt;/strong&gt; = 650 kDa, &lt;strong&gt;Molar mass&lt;/strong&gt; = 650000 g/mol and &lt;strong&gt;Mass of one molecule&lt;/strong&gt; = 1.079e-6 pg.</p><ul><li><strong>Molecular weight</strong> = 650000 Da</li><li><strong>Molecular weight</strong> = 650 kDa</li><li><strong>Molar mass</strong> = 650000 g/mol</li><li><strong>Mass of one molecule</strong> = 1.079e-6 pg</li></ul><p>That is <strong>Molecular weight</strong> = <code>Length × Molecule</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Molecular weight&lt;/strong&gt; = 650000, &lt;strong&gt;Molecular weight&lt;/strong&gt; = 650, &lt;strong&gt;Molar mass&lt;/strong&gt; = 650000 and &lt;strong&gt;Mass of one molecule&lt;/strong&gt; = 1.079e-6 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Molecular weight takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Molecular weight</strong> = <code>Length × Molecule</code></li><li><strong>Molar mass</strong> = <code>Length × Molecule</code></li><li><strong>Mass of one molecule</strong> = <code>Length × Molecule ÷ 602214076000000000000000 × 1000000000000</code></li></ul><p>Any one of Molecular weight, Molecular weight and Molar mass can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Molecule from 650 to 1300, leaving every other box alone. The panel moves from &lt;strong&gt;Molecular weight&lt;/strong&gt; 650000 Da, &lt;strong&gt;Molecular weight&lt;/strong&gt; 650 kDa, &lt;strong&gt;Molar mass&lt;/strong&gt; 650000 g/mol and &lt;strong&gt;Mass of one molecule&lt;/strong&gt; 1.079e-6 pg to &lt;strong&gt;Molecular weight&lt;/strong&gt; 1.300e+6 Da, &lt;strong&gt;Molecular weight&lt;/strong&gt; 1300 kDa, &lt;strong&gt;Molar mass&lt;/strong&gt; 1.300e+6 g/mol and &lt;strong&gt;Mass of one molecule&lt;/strong&gt; 2.159e-6 pg.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Molecular weight, Molecular weight and Molar mass are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Molecule and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Molecule and Length and the number you are missing is Molecular weight and Molecular weight.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/daily-light-integral-dli">Daily light integral (DLI) Calculator</a>, <a href="/biology/days-to-maturity">Days to Maturity Calculator</a> and <a href="/biology/dihybrid-cross">Dihybrid Cross (9:3:3:1) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Base Pair to Dalton calculator work out?', 'a' => 'Molecular weight, Molecular weight, Molar mass and Mass of one molecule, from Length and Molecule. The relationship is Molecular weight = Length × Molecule.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Molecule, Length (bp). Fill kind and bp and leave Molecular weight empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Molecular weight, Molecular weight, Molar mass and Mass of one molecule blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Molecular weight = 650000 Da, Molecular weight = 650 kDa, Molar mass = 650000 g/mol and Mass of one molecule = 1.079e-6 pg. That comes from the page's own defaults, entered in Molecule; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Molecular weight is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Molecule left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Molecular weight keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/daily-light-integral-dli', 'name' => 'Daily light integral (DLI) Calculator'],
            ['path' => '/biology/days-to-maturity', 'name' => 'Days to Maturity Calculator'],
            ['path' => '/biology/dihybrid-cross', 'name' => 'Dihybrid Cross (9:3:3:1) Calculator'],
        ],
        'authors' => [],
    ],
];
