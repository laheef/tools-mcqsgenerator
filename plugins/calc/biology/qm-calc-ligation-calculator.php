<?php

/**
 * Ligation Calculator
 * /biology/ligation-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Ligation Calculator',
    'meta' => ['title' => 'Ligation Calculator: Formula, Steps & Results', 'description' => 'Ligation Calculator works out insert mass needed and vector in the reaction from vector mass, vector length and insert length. Every figure is computed.', 'h1' => 'Ligation Calculator', 'updated' => '2026-10-29'],
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
                            'help' => 'The amount you will put in the reaction',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'vector_bp',
                            'label' => 'Vector length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3000',
                        ],
                        [
                            'name' => 'insert_bp',
                            'label' => 'Insert length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Insert : vector ratio',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '3 is the usual starting point',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                        [
                            'name' => 'insert_ng',
                            'label' => 'Insert mass needed',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vector_pmol',
                            'label' => 'Vector in the reaction',
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
            'title' => 'Ligation',
            'results' => ['insert_ng' => 'ratio*vector_ng*insert_bp/vector_bp', 'vector_ng' => 'insert_ng*vector_bp/(ratio*insert_bp)', 'vector_pmol' => 'vector_ng*1000000000/(660*vector_bp)/1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Vector mass, Vector length and Insert length into Ligation and the answer comes back as Insert mass needed and Vector in the reaction. Nothing is looked up on this page: insert mass needed is computed from vector mass and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Insert mass needed is opened in ng; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Ligation calculator works', 'html' => <<<'TXT'
            <p>Ligation answers one question from 4 numbers, and the answer is Insert mass needed and Vector in the reaction.</p><p>Written with the labels from the form, Insert mass needed = Insert : vector ratio × Vector mass × Insert length ÷ Vector length.</p><p>What comes back is Insert mass needed and Vector in the reaction — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Vector mass</strong> — in ng. The amount you will put in the reaction</li><li><strong>Vector length</strong> — in bp</li><li><strong>Insert length</strong> — in bp</li><li><strong>Insert : vector ratio</strong> — in ×. 3 is the usual starting point</li></ul><p>The answers come back as Insert mass needed in ng, Vector in the reaction in fmol. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Insert mass needed is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Insert mass needed</strong> = <code>Insert : vector ratio × Vector mass × Insert length ÷ Vector length</code></li><li><strong>Vector mass</strong> = <code>Insert mass needed × Vector length ÷ (Insert : vector ratio × Insert length)</code></li><li><strong>Vector in the reaction</strong> = <code>Vector mass × 1000000000 ÷ (660 × Vector length) ÷ 1000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Insert mass needed</strong> = <code>Insert : vector ratio × Vector mass × Insert length ÷ Vector length</code> — the form to use when Insert : vector ratio, Vector mass, Insert length and Vector length are the values you have.</li><li><strong>Vector mass</strong> = <code>Insert mass needed × Vector length ÷ (Insert : vector ratio × Insert length)</code> — the form to use when Insert mass needed, Vector length, Insert : vector ratio and Insert length are the values you have.</li><li><strong>Vector in the reaction</strong> = <code>Vector mass × 1000000000 ÷ (660 × Vector length) ÷ 1000</code> — the form to use when Vector mass and Vector length are the values you have.</li></ul><p>Any one of Insert mass needed, Vector mass and Vector in the reaction can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Insert mass needed and Vector in the reaction are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Vector mass left as a guess.</strong> Anything typed into Vector mass is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Vector length left as a guess.</strong> Anything typed into Vector length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Insert length left as a guess.</strong> Anything typed into Insert length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Vector mass and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Vector mass</strong> is measured in ng. The amount you will put in the reaction. It feeds Insert mass needed and Vector in the reaction. Have it to hand before you start: Vector mass is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Vector length</strong> is measured in bp. It feeds Insert mass needed, Vector mass and Vector in the reaction. Have it to hand before you start: Vector length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Insert length</strong> is measured in bp. It feeds Insert mass needed and Vector mass. Have it to hand before you start: Insert length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Insert : vector ratio</strong> is measured in ×. 3 is the usual starting point. It feeds Insert mass needed and Vector mass. Have it to hand before you start: Insert : vector ratio is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Insert mass needed</strong> is a plain number. It is worked out from Insert : vector ratio, Vector mass, Insert length and Vector length. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Vector in the reaction</strong> is a plain number. It is worked out from Vector mass and Vector length. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Vector mass, Vector length, Insert length and Insert : vector ratio. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Vector mass into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Insert mass needed in ng with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Insert mass needed is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Vector mass, Vector length and Insert length are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Vector mass, Vector length and Insert length is what you already know and Insert mass needed and Vector in the reaction is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/swine-gestation">Swine gestation Calculator</a>, <a href="/biology/sorensen-index">Sørensen Similarity Index Calculator</a> and <a href="/biology/tajimas-d">Tajima&#039;s D Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Ligation calculator work out?', 'a' => <<<'TXT'
            Insert mass needed and Vector in the reaction, from Insert : vector ratio, Vector mass, Insert length and Vector length. The relationship is Insert mass needed = Insert : vector ratio × Vector mass × Insert length ÷ Vector length.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Vector mass (ng), Vector length (bp), Insert length (bp), Insert : vector ratio (×). With vector mass, vector length and insert length in place, Insert mass needed can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Insert mass needed, Vector mass and Vector in the reaction blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Insert mass needed is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Vector mass left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Insert mass needed keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/swine-gestation', 'name' => 'Swine gestation Calculator'],
            ['path' => '/biology/sorensen-index', 'name' => 'Sørensen Similarity Index Calculator'],
            ['path' => '/biology/tajimas-d', 'name' => 'Tajima\'s D Calculator'],
        ],
        'authors' => [],
    ],
];
