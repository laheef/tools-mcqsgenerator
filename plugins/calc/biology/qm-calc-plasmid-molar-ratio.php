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
    'meta' => ['title' => 'Plasmid Molar Ratio Calculator — Formula & Results', 'description' => 'Plasmid Molar Ratio Calculator works out insert 1 mass and insert 2 mass from vector mass and vector length. The formula is printed in the form\'s own words.', 'h1' => 'Plasmid Molar Ratio Calculator', 'updated' => '2026-10-29'],
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
        Plasmid Molar Ratio turns Vector mass, Vector length and Insert 1 length into Insert 1 mass and Insert 2 mass. The arithmetic is the whole method: insert 1 mass is worked out from vector mass by one formula, applied once. Insert 1 mass comes back in ng unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Plasmid Molar Ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Plasmid Molar Ratio: it takes 5 numbers and reports Insert 1 mass, Insert 2 mass and Total DNA.</p><p>The relationship it solves reads Insert 1 mass = Insert : vector molar ratio × Vector mass × Insert 1 length ÷ Vector length.</p><p>The result panel carries Insert 1 mass, Insert 2 mass, Total DNA and Total DNA in the reaction, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Vector mass</strong> — in ng</li><li><strong>Vector length</strong> — in bp</li><li><strong>Insert 1 length</strong> — in bp</li><li><strong>Insert 2 length</strong> — in bp. Leave at 0 for a two-part ligation</li><li><strong>Insert : vector molar ratio</strong> — in ×</li></ul><p>The answers come back as Insert 1 mass in ng, Insert 2 mass in ng, Total DNA in ng, Total DNA in the reaction in fmol, Vector molecules in fmol. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Vector mass = 50 ng, Vector length = 5000 bp, Insert 1 length = 800 bp, Insert 2 length = 6 bp and Insert : vector molar ratio = 3 × — through the same formula and the panel reports <strong>Insert 1 mass</strong> = 24 ng, <strong>Insert 2 mass</strong> = 0.18 ng, <strong>Total DNA</strong> = 74.18 ng, <strong>Vector molecules</strong> = 15.15 fmol and <strong>Total DNA in the reaction</strong> = 19.36 fmol.</p><ul><li><strong>Insert 1 mass</strong> = 24 ng</li><li><strong>Insert 2 mass</strong> = 0.18 ng</li><li><strong>Total DNA</strong> = 74.18 ng</li><li><strong>Vector molecules</strong> = 15.15 fmol</li><li><strong>Total DNA in the reaction</strong> = 19.36 fmol</li></ul><p>The line behind those figures is <strong>Insert 1 mass</strong> = <code>Insert : vector molar ratio × Vector mass × Insert 1 length ÷ Vector length</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Insert 1 mass</strong> = 24, <strong>Insert 2 mass</strong> = 0.18, <strong>Total DNA</strong> = 74.18, <strong>Vector molecules</strong> = 15.15 and <strong>Total DNA in the reaction</strong> = 19.36 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Insert 1 mass takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Insert 1 mass</strong> = <code>Insert : vector molar ratio × Vector mass × Insert 1 length ÷ Vector length</code></li><li><strong>Insert 2 mass</strong> = <code>if_else(Insert 2 length&gt;0,Insert : vector molar ratio × Vector mass × Insert 2 length ÷ Vector length,0)</code></li><li><strong>Total DNA</strong> = <code>Vector mass + Insert : vector molar ratio × Vector mass × Insert 1 length ÷ Vector length + if_else(Insert 2 length&gt;0,Insert : vector molar ratio × Vector mass × Insert 2 length ÷ Vector length,0)</code></li><li><strong>Vector molecules</strong> = <code>Vector mass × 1000000 ÷ (660 × Vector length)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Insert 1 mass</strong> = <code>Insert : vector molar ratio × Vector mass × Insert 1 length ÷ Vector length</code> — the form to use when Insert : vector molar ratio, Vector mass, Insert 1 length and Vector length are the values you have.</li><li><strong>Insert 2 mass</strong> = <code>if_else(Insert 2 length&gt;0,Insert : vector molar ratio × Vector mass × Insert 2 length ÷ Vector length,0)</code> — the form to use when Insert 2 length, Insert : vector molar ratio, Vector mass and Vector length are the values you have.</li><li><strong>Total DNA</strong> = <code>Vector mass + Insert : vector molar ratio × Vector mass × Insert 1 length ÷ Vector length + if_else(Insert 2 length&gt;0,Insert : vector molar ratio × Vector mass × Insert 2 length ÷ Vector length,0)</code> — the form to use when Vector mass, Insert : vector molar ratio, Insert 1 length and Vector length are the values you have.</li><li><strong>Vector molecules</strong> = <code>Vector mass × 1000000 ÷ (660 × Vector length)</code> — the form to use when Vector mass and Vector length are the values you have.</li></ul><p>Any one of Insert 1 mass, Insert 2 mass and Total DNA can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Vector mass, from 50 to 100 — and the answers go from <strong>Insert 1 mass</strong> 24 ng, <strong>Insert 2 mass</strong> 0.18 ng, <strong>Total DNA</strong> 74.18 ng, <strong>Vector molecules</strong> 15.15 fmol and <strong>Total DNA in the reaction</strong> 19.36 fmol to <strong>Insert 1 mass</strong> 48 ng, <strong>Insert 2 mass</strong> 0.36 ng, <strong>Total DNA</strong> 148 ng, <strong>Vector molecules</strong> 30.3 fmol and <strong>Total DNA in the reaction</strong> 38.72 fmol.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Insert 1 mass, Insert 2 mass and Total DNA are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Vector mass left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Vector mass is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Vector length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Vector length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Insert 1 length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Insert 1 length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Vector mass is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Plasmid Molar Ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Vector mass</strong> is measured in ng. It feeds Insert 1 mass, Insert 2 mass and Total DNA. Fill it from a measurement rather than a memory — Vector mass is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Vector length</strong> is measured in bp. It feeds Insert 1 mass, Insert 2 mass and Total DNA. Fill it from a measurement rather than a memory — Vector length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Insert 1 length</strong> is measured in bp. It feeds Insert 1 mass, Total DNA and Total DNA in the reaction. Fill it from a measurement rather than a memory — Insert 1 length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Insert 2 length</strong> is measured in bp. Leave at 0 for a two-part ligation. It feeds Insert 2 mass, Total DNA and Total DNA in the reaction. Fill it from a measurement rather than a memory — Insert 2 length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Insert : vector molar ratio</strong> is measured in ×. It feeds Insert 1 mass, Insert 2 mass and Total DNA. Fill it from a measurement rather than a memory — Insert : vector molar ratio is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Insert 1 mass</strong> is a plain number and the page's own defaults put it at 24. The value follows from Insert : vector molar ratio, Vector mass, Insert 1 length and Vector length. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Insert 2 mass</strong> is a plain number and the page's own defaults put it at 0.18. The value follows from Insert 2 length, Insert : vector molar ratio, Vector mass and Vector length. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total DNA</strong> is a plain number and the page's own defaults put it at 74.18. The value follows from Vector mass, Insert : vector molar ratio, Insert 1 length and Vector length. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total DNA in the reaction</strong> is a plain number and the page's own defaults put it at 19.36. The value follows from Vector mass, Insert : vector molar ratio, Insert 1 length and Vector length. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Vector molecules</strong> is a plain number and the page's own defaults put it at 15.15. The value follows from Vector mass and Vector length. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Insert 1 mass</th><th>Insert 2 mass</th><th>Total DNA</th><th>Vector molecules</th><th>Total DNA in the reaction</th></tr></thead><tbody><tr><td><strong>Vector mass</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Vector length</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-2.96%</td><td>-9.09%</td><td>-10.66%</td></tr><tr><td><strong>Insert 1 length</strong> +10%</td><td>+10%</td><td>+0%</td><td>+3.24%</td><td>+0%</td><td>+1.83%</td></tr><tr><td><strong>Insert 2 length</strong> +10%</td><td>+0%</td><td>+10%</td><td>+0.02%</td><td>+0%</td><td>+0.01%</td></tr><tr><td><strong>Insert : vector molar ratio</strong> +10%</td><td>+10%</td><td>+10%</td><td>+3.26%</td><td>+0%</td><td>+3.26%</td></tr></tbody></table><p>Ranked by leverage, Vector length sits at the top — a ten per cent error in that box shows up as roughly 10.7 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Vector mass = 25 ng, Vector length = 2500 bp, Insert 1 length = 400 bp, Insert 2 length = 3 bp and Insert : vector molar ratio = 1.5 × and the page reports <strong>Insert 1 mass</strong> = 6 ng, <strong>Insert 2 mass</strong> = 0.045 ng, <strong>Total DNA</strong> = 31.05 ng, <strong>Vector molecules</strong> = 15.15 fmol and <strong>Total DNA in the reaction</strong> = 16.2 fmol.</li><li>Feed in Vector mass = 150 ng, Vector length = 5000 bp, Insert 1 length = 800 bp, Insert 2 length = 6 bp and Insert : vector molar ratio = 3 × and the page reports <strong>Insert 1 mass</strong> = 72 ng, <strong>Insert 2 mass</strong> = 0.54 ng, <strong>Total DNA</strong> = 223 ng, <strong>Vector molecules</strong> = 45.45 fmol and <strong>Total DNA in the reaction</strong> = 58.07 fmol.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Insert 1 mass follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Vector mass, Vector length and Insert 1 length are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Vector mass, Vector length and Insert 1 length and the number you are missing is Insert 1 mass and Insert 2 mass.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/cat-age">Cat age</a>, <a href="/biology/cat-benadryl-dosage">Cat Benadryl dosage Calculator</a> and <a href="/biology/cat-bmi">Cat BMI Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Plasmid Molar Ratio calculator work out?', 'a' => <<<'TXT'
            Insert 1 mass, Insert 2 mass, Total DNA and Total DNA in the reaction, from Insert : vector molar ratio, Vector mass, Insert 1 length and Vector length. The relationship is Insert 1 mass = Insert : vector molar ratio × Vector mass × Insert 1 length ÷ Vector length.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Vector mass (ng), Vector length (bp), Insert 1 length (bp), Insert 2 length (bp), Insert : vector molar ratio (×). Enter vector mass, vector length and insert 1 length; Insert 1 mass is the box to leave alone unless it is the value you came for.
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
