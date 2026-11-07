<?php

/**
 * Plasmid Molar Ratio Calculator
 * /biology/plasmid-molar-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Plasmid Molar Ratio Calculator',
    'meta' => ['title' => 'Plasmid Molar Ratio Calculator — Formula & Results', 'description' => 'Plasmid Molar Ratio turns Vector mass, Vector length and Insert 1 length into Insert 1 mass and Insert 2 mass. Insert 1 mass, Insert 2 mass, Total DNA and…', 'h1' => 'Plasmid Molar Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'vector_ng',
                            'label' => 'Vector mass',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'vector_bp',
                            'label' => 'Vector length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5000',
                        ],
                        [
                            'name' => 'insert1_bp',
                            'label' => 'Insert 1 length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '800',
                        ],
                        [
                            'name' => 'insert2_bp',
                            'label' => 'Insert 2 length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'help' => 'Leave at 0 for a two-part ligation',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Insert : vector molar ratio',
                            'type' => 'number',
                            'suffix' => '×',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                        [
                            'name' => 'insert1_ng',
                            'label' => 'Insert 1 mass',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'insert2_ng',
                            'label' => 'Insert 2 mass',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_ng',
                            'label' => 'Total DNA',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_fmol',
                            'label' => 'Total DNA in the reaction',
                            'type' => 'number',
                            'suffix' => 'fmol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vector_fmol',
                            'label' => 'Vector molecules',
                            'type' => 'number',
                            'suffix' => 'fmol',
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
            'results' => [
                'insert1_ng' => 'ratio*vector_ng*insert1_bp/vector_bp',
                'insert2_ng' => 'if_else(insert2_bp>0,ratio*vector_ng*insert2_bp/vector_bp,0)',
                'total_ng' => 'vector_ng+ratio*vector_ng*insert1_bp/vector_bp+if_else(insert2_bp>0,ratio*vector_ng*insert2_bp/vector_bp,0)',
                'vector_fmol' => 'vector_ng*1000000/(660*vector_bp)',
                'total_fmol' => '(vector_ng+ratio*vector_ng*insert1_bp/vector_bp+if_else(insert2_bp>0,ratio*vector_ng*insert2_bp/vector_bp,0))*1000000/(660*(vector_bp+insert1_bp+insert2_bp))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Plasmid Molar Ratio turns Vector mass, Vector length and Insert 1 length into Insert 1 mass and Insert 2 mass. The arithmetic is the whole method: Insert 1 mass is worked out from Vector mass by one formula, applied once. Insert 1 mass comes back in ng unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Plasmid Molar Ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Plasmid Molar Ratio: it takes 5 numbers and reports Insert 1 mass, Insert 2 mass and Total DNA.</p><p>The relationship it solves reads Insert 1 mass = Insert: vector molar ratio × Vector mass × Insert 1 length ÷ Vector length.</p><p>The result panel carries Insert 1 mass, Insert 2 mass, Total DNA and Total DNA in the reaction, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Vector mass</strong> — in ng</li><li><strong>Vector length</strong> — in bp</li><li><strong>Insert 1 length</strong> — in bp</li><li><strong>Insert 2 length</strong> — in bp. Leave at 0 for a two-part ligation</li><li><strong>Insert: vector molar ratio</strong> — in ×</li></ul><p>The answers come back as Insert 1 mass in ng, Insert 2 mass in ng, Total DNA in ng, Total DNA in the reaction in fmol, Vector molecules in fmol. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Vector mass = 50 ng, Vector length = 5000 bp, Insert 1 length = 800 bp, Insert 2 length = 6 bp and Insert: vector molar ratio = 3 × — through the same formula and the panel reports &lt;strong&gt;Insert 1 mass&lt;/strong&gt; = 24 ng, &lt;strong&gt;Insert 2 mass&lt;/strong&gt; = 0.18 ng, &lt;strong&gt;Total DNA&lt;/strong&gt; = 74.18 ng, &lt;strong&gt;Vector molecules&lt;/strong&gt; = 15.15 fmol and &lt;strong&gt;Total DNA in the reaction&lt;/strong&gt; = 19.36 fmol.</p><ul><li><strong>Insert 1 mass</strong> = 24 ng</li><li><strong>Insert 2 mass</strong> = 0.18 ng</li><li><strong>Total DNA</strong> = 74.18 ng</li><li><strong>Vector molecules</strong> = 15.15 fmol</li><li><strong>Total DNA in the reaction</strong> = 19.36 fmol</li></ul><p>The line behind those figures is <strong>Insert 1 mass</strong> = <code>Insert: vector molar ratio × Vector mass × Insert 1 length ÷ Vector length</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Insert 1 mass&lt;/strong&gt; = 24, &lt;strong&gt;Insert 2 mass&lt;/strong&gt; = 0.18, &lt;strong&gt;Total DNA&lt;/strong&gt; = 74.18, &lt;strong&gt;Vector molecules&lt;/strong&gt; = 15.15 and &lt;strong&gt;Total DNA in the reaction&lt;/strong&gt; = 19.36 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Insert 1 mass takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Insert 1 mass</strong> = <code>Insert: vector molar ratio × Vector mass × Insert 1 length ÷ Vector length</code></li><li><strong>Insert 2 mass</strong> = <code>if_else(Insert 2 length&gt;0,Insert: vector molar ratio × Vector mass × Insert 2 length ÷ Vector length,0)</code></li><li><strong>Total DNA</strong> = <code>Vector mass + Insert: vector molar ratio × Vector mass × Insert 1 length ÷ Vector length + if_else(Insert 2 length&gt;0,Insert: vector molar ratio × Vector mass × Insert 2 length ÷ Vector length,0)</code></li><li><strong>Vector molecules</strong> = <code>Vector mass × 1000000 ÷ (660 × Vector length)</code></li></ul><p>Any one of Insert 1 mass, Insert 2 mass and Total DNA can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Vector mass, from 50 to 100 — and the answers go from &lt;strong&gt;Insert 1 mass&lt;/strong&gt; 24 ng, &lt;strong&gt;Insert 2 mass&lt;/strong&gt; 0.18 ng, &lt;strong&gt;Total DNA&lt;/strong&gt; 74.18 ng, &lt;strong&gt;Vector molecules&lt;/strong&gt; 15.15 fmol and &lt;strong&gt;Total DNA in the reaction&lt;/strong&gt; 19.36 fmol to &lt;strong&gt;Insert 1 mass&lt;/strong&gt; 48 ng, &lt;strong&gt;Insert 2 mass&lt;/strong&gt; 0.36 ng, &lt;strong&gt;Total DNA&lt;/strong&gt; 148 ng, &lt;strong&gt;Vector molecules&lt;/strong&gt; 30.3 fmol and &lt;strong&gt;Total DNA in the reaction&lt;/strong&gt; 38.72 fmol.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Insert 1 mass, Insert 2 mass and Total DNA are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Vector mass is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Vector mass, Vector length and Insert 1 length and the number you are missing is Insert 1 mass and Insert 2 mass.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/cat-age">Cat age</a>, <a href="/biology/cat-benadryl-dosage">Cat Benadryl dosage Calculator</a> and <a href="/biology/cat-bmi">Cat BMI Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Plasmid Molar Ratio calculator work out?', 'a' => <<<'TXT'
            Insert 1 mass, Insert 2 mass, Total DNA and Total DNA in the reaction, from Insert: vector molar ratio, Vector mass, Insert 1 length and Vector length. The relationship is Insert 1 mass = Insert: vector molar ratio × Vector mass × Insert 1 length ÷ Vector length.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Vector mass (ng), Vector length (bp), Insert 1 length (bp), Insert 2 length (bp), Insert: vector molar ratio (×). Enter vector_ng, vector_bp and insert1_bp; Insert 1 mass is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Insert 1 mass, Insert 2 mass, Total DNA and Vector molecules blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Insert 1 mass = 24 ng, Insert 2 mass = 0.18 ng, Total DNA = 74.18 ng, Vector molecules = 15.15 fmol and Total DNA in the reaction = 19.36 fmol. Those are the defaults written into the form — move Vector mass and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Insert 1 mass is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Vector mass blank and the page solves for it, reporting Insert 1 mass instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Insert 1 mass keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cat-age', 'name' => 'Cat age'],
            ['path' => '/biology/cat-benadryl-dosage', 'name' => 'Cat Benadryl dosage Calculator'],
            ['path' => '/biology/cat-bmi', 'name' => 'Cat BMI Calculator'],
        ],
        'authors' => [],
    ],
];
