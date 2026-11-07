<?php

/**
 * Fish Per Liter Calculator
 * /biology/fish-per-liter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fish Per Liter Calculator',
    'meta' => ['title' => 'Fish Per Liter Calculator — Formula & Results', 'description' => 'Fish Per Liter Calculator works out fish per litre and litres per fish from number of fish, tank volume and average adult fish length. Every figure is computed.', 'h1' => 'Fish Per Liter Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'fish',
                            'label' => 'Number of fish',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Tank volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Average adult fish length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Adult size, not the size you bought',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Fish per litre',
                            'type' => 'number',
                            'suffix' => 'fish/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_fish',
                            'label' => 'Litres per fish',
                            'type' => 'number',
                            'suffix' => 'L/fish',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cm_per_l',
                            'label' => 'Centimetres of fish per litre',
                            'type' => 'number',
                            'suffix' => 'cm/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'capacity',
                            'label' => 'Fish the tank supports at 0.05 fish/L',
                            'type' => 'number',
                            'suffix' => 'fish',
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
            'title' => 'Stocking',
            'results' => [
                'density' => 'fish/volume',
                'per_fish' => 'volume/fish',
                'cm_per_l' => 'fish*length/volume',
                'capacity' => 'volume*0.05',
                'fish' => 'density*volume',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fish Per Liter takes Number of fish, Tank volume and Average adult fish length and returns Fish per litre and Litres per fish. The arithmetic is the whole method: fish per litre is worked out from number of fish by one formula, applied once. Fish per litre comes back in fish/L unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Fish Per Liter calculator works', 'html' => <<<'TXT'
            <p>Fish Per Liter answers one question from 3 numbers, and the answer is Fish per litre, Litres per fish and Centimetres of fish per litre.</p><p>The relationship it solves reads Fish per litre = Number of fish ÷ Tank volume.</p><p>The answers are Fish per litre, Litres per fish, Centimetres of fish per litre and Fish the tank supports at 0.05 fish/L; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Number of fish</strong> — a plain number, no unit</li><li><strong>Tank volume</strong> — in L</li><li><strong>Average adult fish length</strong> — in cm. Adult size, not the size you bought</li></ul><p>What you get back is Fish per litre in fish/L, Litres per fish in L/fish, Centimetres of fish per litre in cm/L, Fish the tank supports at 0.05 fish/L in fish, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Tank volume = 200 L and Average adult fish length = 4 cm gives <strong>Fish the tank supports at 0.05 fish/L</strong> = 10 fish.</p><ul><li><strong>Fish the tank supports at 0.05 fish/L</strong> = 10 fish</li></ul><p>That is <strong>Fish per litre</strong> = <code>Number of fish ÷ Tank volume</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Fish the tank supports at 0.05 fish/L</strong> = 10 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Fish per litre takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Fish per litre</strong> = <code>Number of fish ÷ Tank volume</code></li><li><strong>Litres per fish</strong> = <code>Tank volume ÷ Number of fish</code></li><li><strong>Centimetres of fish per litre</strong> = <code>Number of fish × Average adult fish length ÷ Tank volume</code></li><li><strong>Fish the tank supports at 0.05 fish/L</strong> = <code>Tank volume × 0.05</code></li><li><strong>Number of fish</strong> = <code>Fish per litre × Tank volume</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Fish per litre</strong> = <code>Number of fish ÷ Tank volume</code> — the form to use when Number of fish and Tank volume are the values you have.</li><li><strong>Litres per fish</strong> = <code>Tank volume ÷ Number of fish</code> — the form to use when Tank volume and Number of fish are the values you have.</li><li><strong>Centimetres of fish per litre</strong> = <code>Number of fish × Average adult fish length ÷ Tank volume</code> — the form to use when Number of fish, Average adult fish length and Tank volume are the values you have.</li><li><strong>Fish the tank supports at 0.05 fish/L</strong> = <code>Tank volume × 0.05</code> — the form to use when Tank volume are the values you have.</li><li><strong>Number of fish</strong> = <code>Fish per litre × Tank volume</code> — the form to use when Fish per litre and Tank volume are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Fish per litre, Litres per fish and Centimetres of fish per litre can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Tank volume, from 200 to 400 — and the answers go from <strong>Fish the tank supports at 0.05 fish/L</strong> 10 fish to <strong>Fish the tank supports at 0.05 fish/L</strong> 20 fish.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Fish per litre, Litres per fish and Centimetres of fish per litre are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Number of fish left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of fish is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Tank volume left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Tank volume is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Average adult fish length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Average adult fish length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Number of fish is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Number of fish</strong> takes a plain number with no unit attached. It feeds Fish per litre, Litres per fish and Centimetres of fish per litre. Have it to hand before you start: Number of fish is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Tank volume</strong> is measured in L. It feeds Fish per litre, Litres per fish and Centimetres of fish per litre. Have it to hand before you start: Tank volume is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Average adult fish length</strong> is measured in cm. Adult size, not the size you bought. It feeds Centimetres of fish per litre. Have it to hand before you start: Average adult fish length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Fish per litre</strong> is a plain number. It is worked out from Number of fish and Tank volume. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Litres per fish</strong> is a plain number. It is worked out from Tank volume and Number of fish. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Centimetres of fish per litre</strong> is a plain number. It is worked out from Number of fish, Average adult fish length and Tank volume. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Fish the tank supports at 0.05 fish/L</strong> is a plain number and the page's own defaults put it at 10. It is worked out from Tank volume. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Fish the tank supports at 0.05 fish/L</th></tr></thead><tbody><tr><td><strong>Tank volume</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Average adult fish length</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Tank volume sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Average adult fish length barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Tank volume = 100 L and Average adult fish length = 2 cm, the answer is <strong>Fish the tank supports at 0.05 fish/L</strong> = 5 fish.</li><li>With Tank volume = 600 L and Average adult fish length = 4 cm, the answer is <strong>Fish the tank supports at 0.05 fish/L</strong> = 30 fish.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Fish per litre follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Number of fish, Tank volume and Average adult fish length measured, Fish per litre and Litres per fish wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-pregnancy">Dog pregnancy Calculator</a>, <a href="/biology/dog-quality-of-life">Dog quality of life</a> and <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fish Per Liter calculator work out?', 'a' => <<<'TXT'
            Fish per litre, Litres per fish, Centimetres of fish per litre and Fish the tank supports at 0.05 fish/L, from Number of fish and Tank volume. The relationship is Fish per litre = Number of fish ÷ Tank volume.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of fish, Tank volume (L), Average adult fish length (cm). Enter number of fish, tank volume and average adult fish length; Fish per litre is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Fish per litre, Litres per fish, Centimetres of fish per litre and Fish the tank supports at 0.05 fish/L can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Fish the tank supports at 0.05 fish/L = 10 fish. The figures come from Number of fish as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Fish per litre is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Number of fish left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Fish per litre at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/dog-pregnancy', 'name' => 'Dog pregnancy Calculator'],
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
        ],
        'authors' => [],
    ],
];
