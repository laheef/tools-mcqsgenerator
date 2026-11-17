<?php

/**
 * Pence to pounds converter
 * /finance/pence-to-pounds
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pence to pounds converter',
    'meta' => ['title' => 'Pence to pounds converter — Formula & Results', 'description' => 'Pence to pounds converter works out **Pound Sterling** (GBP) from **Pence Sterling** (GBX). Every box can be solved for, not only the one in the title.', 'h1' => 'Pence to pounds converter Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pence',
                            'label' => '**Pence Sterling** (GBX)',
                            'type' => 'number',
                            'suffix' => 'p',
                            'help' => 'Enter the amount in pence (p)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pound',
                            'label' => '**Pound Sterling** (GBP)',
                            'type' => 'number',
                            'prefix' => '£',
                            'help' => 'Enter the amount in pounds (£)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'pence/100=pound',
            'results' => ['pound' => '(1/100)*pence', 'pence' => '100*pound'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Pence to pounds takes **Pence Sterling** (GBX) and returns **Pound Sterling** (GBP). Nothing is looked up on this page: **Pound Sterling** (GBP) is computed from **Pence Sterling** (GBX) and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Pence to pounds calculator works', 'html' => <<<'TXT'
            <p>The Pence to pounds calculator applies one relationship to 1 number and reports **Pound Sterling** (GBP).</p><p>In the form&#039;s own words, **Pound Sterling** (GBP) = (1 ÷ 100) × **Pence Sterling** (GBX).</p><p>What comes back is **Pound Sterling** (GBP) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>**Pence Sterling** (GBX)</strong> — in p. Enter the amount in pence (p)</li></ul><p>The result box is **Pound Sterling** (GBP). It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — **Pence Sterling** (GBX) = 10 p — through the same formula and the panel reports <strong>**Pound Sterling** (GBP)</strong> = 0.1.</p><ul><li><strong>**Pound Sterling** (GBP)</strong> = 0.1</li></ul><p>That is <strong>**Pound Sterling** (GBP)</strong> = <code>(1 ÷ 100) × **Pence Sterling** (GBX)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>**Pound Sterling** (GBP)</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: **Pound Sterling** (GBP) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>**Pound Sterling** (GBP)</strong> = <code>(1 ÷ 100) × **Pence Sterling** (GBX)</code></li><li><strong>**Pence Sterling** (GBX)</strong> = <code>100 × **Pound Sterling** (GBP)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>**Pound Sterling** (GBP)</strong> = <code>(1 ÷ 100) × **Pence Sterling** (GBX)</code> — the form to use when **Pence Sterling** (GBX) are the values you have.</li><li><strong>**Pence Sterling** (GBX)</strong> = <code>100 × **Pound Sterling** (GBP)</code> — the form to use when **Pound Sterling** (GBP) are the values you have.</li></ul><p>Any one of **Pound Sterling** (GBP) and **Pence Sterling** (GBX) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — **Pence Sterling** (GBX), from 10 to 20 — and the answers go from <strong>**Pound Sterling** (GBP)</strong> 0.1 to <strong>**Pound Sterling** (GBP)</strong> 0.2.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with **Pound Sterling** (GBP) is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>**Pence Sterling** (GBX) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If **Pence Sterling** (GBX) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert **Pence Sterling** (GBX) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>**Pence Sterling** (GBX)</strong> is measured in p. Enter the amount in pence (p). Change it and **Pound Sterling** (GBP) changes with it. Have it to hand before you start: **Pence Sterling** (GBX) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>**Pound Sterling** (GBP)</strong> is a plain number and the page's own defaults put it at 0.1. It is computed from **Pence Sterling** (GBX), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>**Pound Sterling** (GBP)</th></tr></thead><tbody><tr><td><strong>**Pence Sterling** (GBX)</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, **Pence Sterling** (GBX) sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With **Pence Sterling** (GBX) = 5 p, the answer is <strong>**Pound Sterling** (GBP)</strong> = 0.05.</li><li>With **Pence Sterling** (GBX) = 30 p, the answer is <strong>**Pound Sterling** (GBP)</strong> = 0.3.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need **Pence Sterling** (GBX). Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type **Pence Sterling** (GBX) into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare **Pound Sterling** (GBP) with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> **Pound Sterling** (GBP) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when **Pence Sterling** (GBX) is what you already know and **Pound Sterling** (GBP) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/sales-commission">Sales commission Calculator</a>, <a href="/finance/sales-tax">Sales tax Calculator</a> and <a href="/finance/sales">Sales</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Pence to pounds is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put **Pence Sterling** (GBX) beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pence to pounds calculator work out?', 'a' => '**Pound Sterling** (GBP), from **Pence Sterling** (GBX). The relationship is **Pound Sterling** (GBP) = (1 ÷ 100) × **Pence Sterling** (GBX).'],
            ['q' => 'Which values do I need before I start?', 'a' => '**Pence Sterling** (GBX) (p). Enter **Pence Sterling** (GBX); **Pound Sterling** (GBP) is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of **Pound Sterling** (GBP) and **Pence Sterling** (GBX) blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            **Pound Sterling** (GBP) = 0.1. That comes from the page's own defaults, entered in **Pence Sterling** (GBX); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally **Pound Sterling** (GBP) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With **Pence Sterling** (GBX) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. **Pound Sterling** (GBP) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/sales-commission', 'name' => 'Sales commission Calculator'],
            ['path' => '/finance/sales-tax', 'name' => 'Sales tax Calculator'],
            ['path' => '/finance/sales', 'name' => 'Sales'],
        ],
        'authors' => [],
    ],
];
