<?php

/**
 * 50/30/20 rule
 * /finance/50-30-20-rule
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '50/30/20 rule',
    'meta' => ['title' => '50/30/20 rule Calculator — Formula & Results', 'description' => '50/30/20 rule works out necessities (50%) and wants (30%) and reports both. Each box lists the units it accepts, and the answer converts between them.', 'h1' => '50/30/20 rule Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_income_at',
                            'label' => 'Your monthly after-tax income',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Your 50/30/20 distribution:',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fifty',
                            'label' => 'Necessities (50%)',
                            'type' => 'number',
                            'help' => 'Necessities include rent payment, groceries, and other monthly "must-haves."',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'thirty',
                            'label' => 'Wants (30%)',
                            'type' => 'number',
                            'help' => 'This category includes expenses for activities and things you desire, but do not necessarily need.&nbsp;',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'twenty',
                            'label' => 'Savings (20%)',
                            'type' => 'number',
                            'help' => 'Savings account and loan payment.&nbsp;',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'fifty = (monthly_income_at * 50)/100',
            'results' => ['fifty' => '(1/2)*monthly_income_at', 'monthly_income_at' => '2*fifty'],
        ],
        [
            'title' => 'thirty = (monthly_income_at * 30)/100',
            'results' => ['monthly_income_at' => '(10/3)*thirty', 'thirty' => '(3/10)*monthly_income_at'],
        ],
        [
            'title' => 'twenty = (monthly_income_at * 20)/100',
            'results' => ['twenty' => '(1/5)*monthly_income_at', 'monthly_income_at' => '5*twenty'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Your monthly after-tax income into 50/30/20 rule and the answer comes back as Necessities (50%) and Wants (30%). Nothing is looked up on this page: necessities (50%) is computed from your monthly after-tax income and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Necessities (50%) is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the 50/30/20 rule calculator works', 'html' => <<<'TXT'
            <p>The 50/30/20 rule calculator applies one relationship to 1 number and reports Necessities (50%), Wants (30%) and Savings (20%).</p><p>The relationship it solves reads Necessities (50%) = (1 ÷ 2) × Your monthly after-tax income.</p><p>The answers are Necessities (50%), Wants (30%) and Savings (20%); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Your monthly after-tax income</strong> — in USD</li></ul><p>The answers come back as Necessities (50%) in USD, Wants (30%) in USD, Savings (20%) in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Your monthly after-tax income = 10 USD; the answers are <strong>Necessities (50%)</strong> = 5 USD, <strong>Wants (30%)</strong> = 3 USD and <strong>Savings (20%)</strong> = 2 USD.</p><ul><li><strong>Necessities (50%)</strong> = 5 USD</li><li><strong>Wants (30%)</strong> = 3 USD</li><li><strong>Savings (20%)</strong> = 2 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Necessities (50%)</strong> = <code>(1 ÷ 2) × Your monthly after-tax income</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Necessities (50%)</strong> = 5, <strong>Wants (30%)</strong> = 3 and <strong>Savings (20%)</strong> = 2. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Necessities (50%) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Necessities (50%)</strong> = <code>(1 ÷ 2) × Your monthly after-tax income</code></li><li><strong>Your monthly after-tax income</strong> = <code>2 × Necessities (50%)</code></li><li><strong>Wants (30%)</strong> = <code>(3 ÷ 10) × Your monthly after-tax income</code></li><li><strong>Savings (20%)</strong> = <code>(1 ÷ 5) × Your monthly after-tax income</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Necessities (50%)</strong> = <code>(1 ÷ 2) × Your monthly after-tax income</code> — the form to use when Your monthly after-tax income are the values you have.</li><li><strong>Your monthly after-tax income</strong> = <code>2 × Necessities (50%)</code> — the form to use when Necessities (50%) are the values you have.</li><li><strong>Wants (30%)</strong> = <code>(3 ÷ 10) × Your monthly after-tax income</code> — the form to use when Your monthly after-tax income are the values you have.</li><li><strong>Your monthly after-tax income</strong> = <code>(10 ÷ 3) × Wants (30%)</code> — the form to use when Wants (30%) are the values you have.</li><li><strong>Savings (20%)</strong> = <code>(1 ÷ 5) × Your monthly after-tax income</code> — the form to use when Your monthly after-tax income are the values you have.</li><li><strong>Your monthly after-tax income</strong> = <code>5 × Savings (20%)</code> — the form to use when Savings (20%) are the values you have.</li></ul><p>Any one of Necessities (50%), Your monthly after-tax income and Wants (30%) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Your monthly after-tax income, from 10 to 20 — and the answers go from <strong>Necessities (50%)</strong> 5 USD, <strong>Wants (30%)</strong> 3 USD and <strong>Savings (20%)</strong> 2 USD to <strong>Necessities (50%)</strong> 10 USD, <strong>Wants (30%)</strong> 6 USD and <strong>Savings (20%)</strong> 4 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Necessities (50%), Wants (30%) and Savings (20%) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Your monthly after-tax income left as a guess.</strong> Anything typed into Your monthly after-tax income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Your monthly after-tax income and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Your monthly after-tax income</strong> takes a plain number with no unit attached. Change it and Necessities (50%), Wants (30%) and Savings (20%) changes with it. Have it to hand before you start: Your monthly after-tax income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Necessities (50%)</strong> is a plain number and the page's own defaults put it at 5. The value follows from Your monthly after-tax income. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Wants (30%)</strong> is a plain number and the page's own defaults put it at 3. The value follows from Your monthly after-tax income. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Savings (20%)</strong> is a plain number and the page's own defaults put it at 2. The value follows from Your monthly after-tax income. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Necessities (50%)</th><th>Wants (30%)</th><th>Savings (20%)</th></tr></thead><tbody><tr><td><strong>Your monthly after-tax income</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Your monthly after-tax income: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Your monthly after-tax income = 5 USD, the answer is <strong>Necessities (50%)</strong> = 2.5 USD, <strong>Wants (30%)</strong> = 1.5 USD and <strong>Savings (20%)</strong> = 1 USD.</li><li>With Your monthly after-tax income = 30 USD, the answer is <strong>Necessities (50%)</strong> = 15 USD, <strong>Wants (30%)</strong> = 9 USD and <strong>Savings (20%)</strong> = 6 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Your monthly after-tax income. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Your monthly after-tax income into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Necessities (50%) in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Necessities (50%) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Your monthly after-tax income and the number you are missing is Necessities (50%) and Wants (30%).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/discount-rate">Discount rate Calculator</a>, <a href="/finance/discount">Discount</a> and <a href="/finance/dcf">Discounted cash flow Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 50/30/20 rule calculator work out?', 'a' => <<<'TXT'
            Necessities (50%), Wants (30%) and Savings (20%), from Your monthly after-tax income. The relationship is Necessities (50%) = (1 ÷ 2) × Your monthly after-tax income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Your monthly after-tax income (USD). Fill your monthly after-tax income and leave Necessities (50%) empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Necessities (50%), Your monthly after-tax income, Wants (30%) and Savings (20%) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Necessities (50%) = 5 USD, Wants (30%) = 3 USD and Savings (20%) = 2 USD. Those are the defaults written into the form — move Your monthly after-tax income and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Necessities (50%) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Your monthly after-tax income left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Necessities (50%) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/discount-rate', 'name' => 'Discount rate Calculator'],
            ['path' => '/finance/discount', 'name' => 'Discount'],
            ['path' => '/finance/dcf', 'name' => 'Discounted cash flow Calculator'],
        ],
        'authors' => [],
    ],
];
