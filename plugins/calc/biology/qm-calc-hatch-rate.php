<?php

/**
 * Hatch Rate Calculator
 * /biology/hatch-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hatch Rate Calculator',
    'meta' => ['title' => 'Hatch Rate Calculator: Formula, Steps & Results', 'description' => 'Hatch Rate Calculator turns eggs set and fertile eggs into hatchability (of set) and infertile eggs. Every box can be solved for, not only the one in the title.', 'h1' => 'Hatch Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'eggs_set',
                            'label' => 'Eggs set',
                            'type' => 'number',
                            'suffix' => 'eggs',
                            'help' => 'Everything that went into the incubator',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '48',
                        ],
                        [
                            'name' => 'fertile',
                            'label' => 'Fertile eggs',
                            'type' => 'number',
                            'suffix' => 'eggs',
                            'help' => 'From candling at day 7–10',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'hatched',
                            'label' => 'Chicks hatched',
                            'type' => 'number',
                            'suffix' => 'chicks',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '34',
                        ],
                        [
                            'name' => 'hatch_rate',
                            'label' => 'Hatch rate (of fertile)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hatchability',
                            'label' => 'Hatchability (of set)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'infertile',
                            'label' => 'Infertile eggs',
                            'type' => 'number',
                            'suffix' => 'eggs',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dead_in_shell',
                            'label' => 'Died after candling',
                            'type' => 'number',
                            'suffix' => 'eggs',
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
            'title' => 'Hatch',
            'results' => [
                'hatch_rate' => 'hatched/fertile*100',
                'hatchability' => 'hatched/eggs_set*100',
                'infertile' => 'eggs_set-fertile',
                'dead_in_shell' => 'fertile-hatched',
                'hatched' => 'hatch_rate*fertile/100',
                'fertile' => 'hatched/hatch_rate*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Hatch Rate turns Eggs set, Fertile eggs and Chicks hatched into Hatch rate (of fertile) and Hatchability (of set). There is no hidden constant here: change hatch rate (of fertile) and eggs set moves with it. The main result, Hatch rate (of fertile), is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Hatch Rate calculator works', 'html' => <<<'TXT'
            <p>The Hatch Rate calculator applies one relationship to 3 numbers and reports Hatch rate (of fertile), Hatchability (of set) and Infertile eggs.</p><p>Written with the labels from the form, Hatch rate (of fertile) = Chicks hatched ÷ Fertile eggs × 100.</p><p>What comes back is Hatch rate (of fertile), Hatchability (of set), Infertile eggs and Died after candling — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Eggs set</strong> — in eggs. Everything that went into the incubator</li><li><strong>Fertile eggs</strong> — in eggs. From candling at day 7–10</li><li><strong>Chicks hatched</strong> — in chicks</li></ul><p>What you get back is Hatch rate (of fertile) in %, Hatchability (of set) in %, Infertile eggs in eggs, Died after candling in eggs, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Hatch rate (of fertile) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Hatch rate (of fertile)</strong> = <code>Chicks hatched ÷ Fertile eggs × 100</code></li><li><strong>Hatchability (of set)</strong> = <code>Chicks hatched ÷ Eggs set × 100</code></li><li><strong>Infertile eggs</strong> = <code>Eggs set − Fertile eggs</code></li><li><strong>Died after candling</strong> = <code>Fertile eggs − Chicks hatched</code></li><li><strong>Chicks hatched</strong> = <code>Hatch rate (of fertile) × Fertile eggs ÷ 100</code></li><li><strong>Fertile eggs</strong> = <code>Chicks hatched ÷ Hatch rate (of fertile) × 100</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Hatch rate (of fertile)</strong> = <code>Chicks hatched ÷ Fertile eggs × 100</code> — the form to use when Chicks hatched and Fertile eggs are the values you have.</li><li><strong>Hatchability (of set)</strong> = <code>Chicks hatched ÷ Eggs set × 100</code> — the form to use when Chicks hatched and Eggs set are the values you have.</li><li><strong>Infertile eggs</strong> = <code>Eggs set − Fertile eggs</code> — the form to use when Eggs set and Fertile eggs are the values you have.</li><li><strong>Died after candling</strong> = <code>Fertile eggs − Chicks hatched</code> — the form to use when Fertile eggs and Chicks hatched are the values you have.</li><li><strong>Chicks hatched</strong> = <code>Hatch rate (of fertile) × Fertile eggs ÷ 100</code> — the form to use when Hatch rate (of fertile) and Fertile eggs are the values you have.</li><li><strong>Fertile eggs</strong> = <code>Chicks hatched ÷ Hatch rate (of fertile) × 100</code> — the form to use when Chicks hatched and Hatch rate (of fertile) are the values you have.</li></ul><p>Any one of Hatch rate (of fertile), Hatchability (of set) and Infertile eggs can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Hatch rate (of fertile), Hatchability (of set) and Infertile eggs are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Eggs set left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Eggs set is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Fertile eggs left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Fertile eggs is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Chicks hatched left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Chicks hatched is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Eggs set and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Eggs set</strong> is measured in eggs. Everything that went into the incubator. Change it and Hatchability (of set) and Infertile eggs changes with it. Have it to hand before you start: Eggs set is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Fertile eggs</strong> is measured in eggs. From candling at day 7–10. Change it and Hatch rate (of fertile), Infertile eggs and Died after candling changes with it. Have it to hand before you start: Fertile eggs is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Chicks hatched</strong> is measured in chicks. Change it and Hatch rate (of fertile), Hatchability (of set) and Died after candling changes with it. Have it to hand before you start: Chicks hatched is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Hatch rate (of fertile)</strong> is a plain number. It is computed from Chicks hatched and Fertile eggs, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Hatchability (of set)</strong> is a plain number. It is computed from Chicks hatched and Eggs set, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Infertile eggs</strong> is a plain number. It is computed from Eggs set and Fertile eggs, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Died after candling</strong> is a plain number. It is computed from Fertile eggs and Chicks hatched, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Eggs set, Fertile eggs and Chicks hatched. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Eggs set into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Hatch rate (of fertile) in % with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Hatch rate (of fertile) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Eggs set, Fertile eggs and Chicks hatched and the number you are missing is Hatch rate (of fertile) and Hatchability (of set).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/pcr-cycle-calculator">PCR Cycle Calculator</a>, <a href="/biology/pcr-master-mix-calculator">PCR Master Mix Calculator</a> and <a href="/biology/pcr-primer-stats">PCR Primer Stats Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hatch Rate calculator work out?', 'a' => <<<'TXT'
            Hatch rate (of fertile), Hatchability (of set), Infertile eggs and Died after candling, from Chicks hatched and Fertile eggs. The relationship is Hatch rate (of fertile) = Chicks hatched ÷ Fertile eggs × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Eggs set (eggs), Fertile eggs (eggs), Chicks hatched (chicks). Enter eggs set, fertile eggs and chicks hatched; Hatch rate (of fertile) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Hatch rate (of fertile), Hatchability (of set), Infertile eggs and Died after candling blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Hatch rate (of fertile) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Eggs set left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Hatch rate (of fertile) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/pcr-cycle-calculator', 'name' => 'PCR Cycle Calculator'],
            ['path' => '/biology/pcr-master-mix-calculator', 'name' => 'PCR Master Mix Calculator'],
            ['path' => '/biology/pcr-primer-stats', 'name' => 'PCR Primer Stats Calculator'],
        ],
        'authors' => [],
    ],
];
