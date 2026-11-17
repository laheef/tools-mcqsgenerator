<?php

/**
 * Gini coefficient
 * /finance/gini-coefficient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gini coefficient',
    'meta' => ['title' => 'Gini coefficient Calculator: Free, With Steps', 'description' => 'Enter Area A and Area B and get gini coefficient back. Each box lists the units it accepts, and the answer converts between them. Every figure is computed.', 'h1' => 'Gini coefficient Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a',
                            'label' => 'Area A',
                            'type' => 'number',
                            'suffix' => 'unit²',
                            'help' => 'Area between the line of equality and the Lorenz curve.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'b',
                            'label' => 'Area B',
                            'type' => 'number',
                            'suffix' => 'unit²',
                            'help' => 'Area below the Lorenz curve.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gini_coefficient',
                            'label' => 'Gini coefficient',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/gini_coefficient/gini%20coefficient_01.png'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'gini_coefficient = a / (a + b)',
            'results' => ['b' => '-a + a/gini_coefficient', 'a' => '-b*gini_coefficient/(gini_coefficient - 1)', 'gini_coefficient' => 'a/(a + b)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Gini coefficient takes Area A and Area B and returns Gini coefficient. The arithmetic is the whole method: gini coefficient is worked out from area A by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Gini coefficient calculator works', 'html' => <<<'TXT'
            <p>Gini coefficient answers one question from 2 numbers, and the answer is Gini coefficient.</p><p>Written with the labels from the form, Gini coefficient = Area A ÷ (Area A + Area B).</p><p>The answers are Gini coefficient; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Area A</strong> — in unit². Area between the line of equality and the Lorenz curve.</li><li><strong>Area B</strong> — in unit². Area below the Lorenz curve.</li></ul><p>What you get back is Gini coefficient, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Area A = 10 unit² and Area B = 100 unit² — through the same formula and the panel reports <strong>Gini coefficient</strong> = 0.0909.</p><ul><li><strong>Gini coefficient</strong> = 0.0909</li></ul><p>That is <strong>Gini coefficient</strong> = <code>Area A ÷ (Area A + Area B)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Gini coefficient</strong> = 0.0909 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Gini coefficient takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Gini coefficient</strong> = <code>Area A ÷ (Area A + Area B)</code></li><li><strong>Area B</strong> = <code>− Area A + Area A ÷ Gini coefficient</code></li><li><strong>Area A</strong> = <code>− Area B × Gini coefficient ÷ (Gini coefficient − 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Gini coefficient</strong> = <code>Area A ÷ (Area A + Area B)</code> — the form to use when Area A and Area B are the values you have.</li><li><strong>Area B</strong> = <code>− Area A + Area A ÷ Gini coefficient</code> — the form to use when Area A and Gini coefficient are the values you have.</li><li><strong>Area A</strong> = <code>− Area B × Gini coefficient ÷ (Gini coefficient − 1)</code> — the form to use when Area B and Gini coefficient are the values you have.</li></ul><p>Any one of Gini coefficient, Area B and Area A can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Area A, from 10 to 20 — and the answers go from <strong>Gini coefficient</strong> 0.0909 to <strong>Gini coefficient</strong> 0.1667.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gini coefficient is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Area A left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Area A is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Area B left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Area B is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Area A to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Area A</strong> is measured in unit². Area between the line of equality and the Lorenz curve. It feeds Area B and Gini coefficient. Have it to hand before you start: Area A is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Area B</strong> is measured in unit². Area below the Lorenz curve. It feeds Area A and Gini coefficient. Have it to hand before you start: Area B is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Gini coefficient</strong> is a plain number and the page's own defaults put it at 0.0909. The value follows from Area A and Area B. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Gini coefficient</th></tr></thead><tbody><tr><td><strong>Area A</strong> +10%</td><td>+9.01%</td></tr><tr><td><strong>Area B</strong> +10%</td><td>-8.33%</td></tr></tbody></table><p>Ranked by leverage, Area A sits at the top — a ten per cent error in that box shows up as roughly 9 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Area A = 5 unit² and Area B = 50 unit², the answer is <strong>Gini coefficient</strong> = 0.0909.</li><li>With Area A = 30 unit² and Area B = 100 unit², the answer is <strong>Gini coefficient</strong> = 0.2308.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Area A and Area B. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Area A into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Gini coefficient with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Gini coefficient follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Area A and Area B are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Area A and Area B measured, Gini coefficient wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/year-over-year-growth">Year over year growth Calculator</a>, <a href="/finance/yearly-wage">Yearly wage Calculator</a> and <a href="/finance/yield-to-call">Yield to call Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gini coefficient calculator work out?', 'a' => 'Gini coefficient, from Area A and Area B. The relationship is Gini coefficient = Area A ÷ (Area A + Area B).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Area A (unit²), Area B (unit²). Enter area A and area B; Gini coefficient is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Gini coefficient, Area B and Area A blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Gini coefficient = 0.0909. The figures come from Area A as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Gini coefficient is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Area A left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Gini coefficient keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/year-over-year-growth', 'name' => 'Year over year growth Calculator'],
            ['path' => '/finance/yearly-wage', 'name' => 'Yearly wage Calculator'],
            ['path' => '/finance/yield-to-call', 'name' => 'Yield to call Calculator'],
        ],
        'authors' => [],
    ],
];
