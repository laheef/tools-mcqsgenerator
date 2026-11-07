<?php

/**
 * Ligation Molar Ratio Calculator (Insert : Vector)
 * /biology/ligation-molar-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Ligation Molar Ratio Calculator (Insert : Vector)',
    'meta' => ['title' => 'Ligation Molar Ratio (Insert : Vector) Calculator', 'description' => 'Ligation Molar Ratio Calculator (Insert : Vector) reports insert mass, vector amount, insert amount and Total DNA in the reaction. Every figure is computed.', 'h1' => 'Ligation Molar Ratio Calculator (Insert : Vector)', 'updated' => '2026-10-29'],
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
                            'default' => '100',
                        ],
                        [
                            'name' => 'vector_bp',
                            'label' => 'Vector length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4000',
                        ],
                        [
                            'name' => 'insert_bp',
                            'label' => 'Insert length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '800',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Insert : vector molar ratio',
                            'type' => 'number',
                            'suffix' => ':1',
                            'help' => '3:1 is the usual starting point',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                        [
                            'name' => 'insert_ng',
                            'label' => 'Insert mass',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vector_pmol',
                            'label' => 'Vector amount',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'insert_pmol',
                            'label' => 'Insert amount',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_ng',
                            'label' => 'Total DNA in the reaction',
                            'type' => 'number',
                            'suffix' => 'ng',
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
            'title' => 'Ligation',
            'results' => ['insert_ng' => 'vector_ng*insert_bp/vector_bp*ratio', 'vector_pmol' => 'vector_ng*1000000/(vector_bp*660)', 'insert_pmol' => 'vector_ng*1000000/(vector_bp*660)*ratio', 'total_ng' => 'vector_ng+vector_ng*insert_bp/vector_bp*ratio'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Ligation Molar Ratio Calculator (Insert : Vector) takes Vector mass, Vector length and Insert length and returns Insert mass and Vector amount. The arithmetic is the whole method: insert mass is worked out from vector mass by one formula, applied once. Insert mass comes back in ng unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Ligation Molar Ratio Calculator (Insert : Vector) calculator works', 'html' => <<<'TXT'
            <p>The Ligation Molar Ratio Calculator (Insert : Vector) calculator applies one relationship to 4 numbers and reports Insert mass, Vector amount and Insert amount.</p><p>Written with the labels from the form, Insert mass = Vector mass × Insert length ÷ Vector length × Insert : vector molar ratio.</p><p>The answers are Insert mass, Vector amount, Insert amount and Total DNA in the reaction; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Vector mass</strong> — in ng</li><li><strong>Vector length</strong> — in bp</li><li><strong>Insert length</strong> — in bp</li><li><strong>Insert : vector molar ratio</strong> — in :1. 3:1 is the usual starting point</li></ul><p>The result boxes are Insert mass in ng, Vector amount in pmol, Insert amount in pmol, Total DNA in the reaction in ng; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Vector mass = 100 ng, Vector length = 4000 bp, Insert length = 800 bp and Insert : vector molar ratio = 3 :1 — through the same formula and the panel reports <strong>Insert mass</strong> = 60 ng, <strong>Vector amount</strong> = 37.88 pmol, <strong>Insert amount</strong> = 114 pmol and <strong>Total DNA in the reaction</strong> = 160 ng.</p><ul><li><strong>Insert mass</strong> = 60 ng</li><li><strong>Vector amount</strong> = 37.88 pmol</li><li><strong>Insert amount</strong> = 114 pmol</li><li><strong>Total DNA in the reaction</strong> = 160 ng</li></ul><p>That is <strong>Insert mass</strong> = <code>Vector mass × Insert length ÷ Vector length × Insert : vector molar ratio</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Insert mass</strong> = 60, <strong>Vector amount</strong> = 37.88, <strong>Insert amount</strong> = 114 and <strong>Total DNA in the reaction</strong> = 160 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Insert mass takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Insert mass</strong> = <code>Vector mass × Insert length ÷ Vector length × Insert : vector molar ratio</code></li><li><strong>Vector amount</strong> = <code>Vector mass × 1000000 ÷ (Vector length × 660)</code></li><li><strong>Insert amount</strong> = <code>Vector mass × 1000000 ÷ (Vector length × 660) × Insert : vector molar ratio</code></li><li><strong>Total DNA in the reaction</strong> = <code>Vector mass + Vector mass × Insert length ÷ Vector length × Insert : vector molar ratio</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Insert mass</strong> = <code>Vector mass × Insert length ÷ Vector length × Insert : vector molar ratio</code> — the form to use when Vector mass, Insert length, Vector length and Insert : vector molar ratio are the values you have.</li><li><strong>Vector amount</strong> = <code>Vector mass × 1000000 ÷ (Vector length × 660)</code> — the form to use when Vector mass and Vector length are the values you have.</li><li><strong>Insert amount</strong> = <code>Vector mass × 1000000 ÷ (Vector length × 660) × Insert : vector molar ratio</code> — the form to use when Vector mass, Vector length and Insert : vector molar ratio are the values you have.</li><li><strong>Total DNA in the reaction</strong> = <code>Vector mass + Vector mass × Insert length ÷ Vector length × Insert : vector molar ratio</code> — the form to use when Vector mass, Insert length, Vector length and Insert : vector molar ratio are the values you have.</li></ul><p>Any one of Insert mass, Vector amount and Insert amount can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Vector mass, from 100 to 200 — and the answers go from <strong>Insert mass</strong> 60 ng, <strong>Vector amount</strong> 37.88 pmol, <strong>Insert amount</strong> 114 pmol and <strong>Total DNA in the reaction</strong> 160 ng to <strong>Insert mass</strong> 120 ng, <strong>Vector amount</strong> 75.76 pmol, <strong>Insert amount</strong> 227 pmol and <strong>Total DNA in the reaction</strong> 320 ng.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Insert mass, Vector amount and Insert amount are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Vector mass left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Vector mass is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Vector length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Vector length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Insert length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Insert length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Vector mass to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Vector mass</strong> is measured in ng. Change it and Insert mass, Vector amount and Insert amount changes with it. Have it to hand before you start: Vector mass is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Vector length</strong> is measured in bp. Change it and Insert mass, Vector amount and Insert amount changes with it. Have it to hand before you start: Vector length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Insert length</strong> is measured in bp. Change it and Insert mass and Total DNA in the reaction changes with it. Have it to hand before you start: Insert length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Insert : vector molar ratio</strong> is measured in :1. 3:1 is the usual starting point. Change it and Insert mass, Insert amount and Total DNA in the reaction changes with it. Have it to hand before you start: Insert : vector molar ratio is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Insert mass</strong> is a plain number and the page's own defaults put it at 60. The value follows from Vector mass, Insert length, Vector length and Insert : vector molar ratio. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Vector amount</strong> is a plain number and the page's own defaults put it at 37.88. The value follows from Vector mass and Vector length. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Insert amount</strong> is a plain number and the page's own defaults put it at 114. The value follows from Vector mass, Vector length and Insert : vector molar ratio. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total DNA in the reaction</strong> is a plain number and the page's own defaults put it at 160. The value follows from Vector mass, Insert length, Vector length and Insert : vector molar ratio. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Insert mass</th><th>Vector amount</th><th>Insert amount</th><th>Total DNA in the reaction</th></tr></thead><tbody><tr><td><strong>Vector mass</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Vector length</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td><td>-3.41%</td></tr><tr><td><strong>Insert length</strong> +10%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+3.75%</td></tr><tr><td><strong>Insert : vector molar ratio</strong> +10%</td><td>+10%</td><td>+0%</td><td>+10%</td><td>+3.75%</td></tr></tbody></table><p>Ranked by leverage, Vector mass sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Vector mass = 50 ng, Vector length = 2000 bp, Insert length = 400 bp and Insert : vector molar ratio = 1.5 :1, the answer is <strong>Insert mass</strong> = 15 ng, <strong>Vector amount</strong> = 37.88 pmol, <strong>Insert amount</strong> = 56.82 pmol and <strong>Total DNA in the reaction</strong> = 65 ng.</li><li>With Vector mass = 300 ng, Vector length = 4000 bp, Insert length = 800 bp and Insert : vector molar ratio = 3 :1, the answer is <strong>Insert mass</strong> = 180 ng, <strong>Vector amount</strong> = 114 pmol, <strong>Insert amount</strong> = 341 pmol and <strong>Total DNA in the reaction</strong> = 480 ng.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Insert mass follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Vector mass, Vector length and Insert length are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Vector mass, Vector length and Insert length is what you already know and Insert mass and Vector amount is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/fixation-index-fst">Fixation Index (Fst) Calculator</a>, <a href="/biology/fold-change">Fold Change Calculator</a> and <a href="/biology/fruit-tree-spacing">Fruit Tree Spacing Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Ligation Molar Ratio Calculator (Insert : Vector) calculator work out?', 'a' => <<<'TXT'
            Insert mass, Vector amount, Insert amount and Total DNA in the reaction, from Vector mass, Insert length, Vector length and Insert : vector molar ratio. The relationship is Insert mass = Vector mass × Insert length ÷ Vector length × Insert : vector molar ratio.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Vector mass (ng), Vector length (bp), Insert length (bp), Insert : vector molar ratio (:1). Enter vector mass, vector length and insert length; Insert mass is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Insert mass, Vector amount, Insert amount and Total DNA in the reaction blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Insert mass = 60 ng, Vector amount = 37.88 pmol, Insert amount = 114 pmol and Total DNA in the reaction = 160 ng. The figures come from Vector mass as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Insert mass is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Vector mass left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Insert mass keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/fixation-index-fst', 'name' => 'Fixation Index (Fst) Calculator'],
            ['path' => '/biology/fold-change', 'name' => 'Fold Change Calculator'],
            ['path' => '/biology/fruit-tree-spacing', 'name' => 'Fruit Tree Spacing Calculator'],
        ],
        'authors' => [],
    ],
];
