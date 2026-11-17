<?php

/**
 * Interest coverage ratio
 * /finance/interest-coverage-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Interest coverage ratio',
    'meta' => ['title' => 'Interest coverage ratio — Formula & Results', 'description' => 'Enter EBIT and interest expense and get interest coverage ratio back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Interest coverage ratio Calculator', 'updated' => '2026-09-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'EBIT',
                            'label' => 'EBIT',
                            'type' => 'number',
                            'help' => 'Earnings before interests and taxes.',
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
                            'name' => 'Interest_Expense',
                            'label' => 'Interest expense',
                            'type' => 'number',
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
                            'name' => 'Interest_Coverage_Ratio',
                            'label' => 'Interest coverage ratio',
                            'type' => 'number',
                            'help' => 'This ratio indicates how many times EBIT covers the interest expense for the period of time you are checking.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Interest_Coverage_Ratio=EBIT/Interest_Expense',
            'results' => ['Interest_Coverage_Ratio' => 'EBIT/Interest_Expense', 'Interest_Expense' => 'EBIT/Interest_Coverage_Ratio', 'EBIT' => 'Interest_Coverage_Ratio*Interest_Expense'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Interest coverage ratio turns EBIT and Interest expense into Interest coverage ratio. It is a single relationship that reads interest coverage ratio out of EBIT, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Interest coverage ratio calculator works', 'html' => <<<'TXT'
            <p>The Interest coverage ratio calculator applies one relationship to 2 numbers and reports Interest coverage ratio.</p><p>Written with the labels from the form, Interest coverage ratio = EBIT ÷ Interest expense.</p><p>The answers are Interest coverage ratio; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>EBIT</strong> — in USD. Earnings before interests and taxes.</li><li><strong>Interest expense</strong> — in USD</li></ul><p>What you get back is Interest coverage ratio, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — EBIT = 10 USD and Interest expense = 100 USD — through the same formula and the panel reports <strong>Interest coverage ratio</strong> = 0.1.</p><ul><li><strong>Interest coverage ratio</strong> = 0.1</li></ul><p>That is <strong>Interest coverage ratio</strong> = <code>EBIT ÷ Interest expense</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Interest coverage ratio</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Interest coverage ratio takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Interest coverage ratio</strong> = <code>EBIT ÷ Interest expense</code></li><li><strong>Interest expense</strong> = <code>EBIT ÷ Interest coverage ratio</code></li><li><strong>EBIT</strong> = <code>Interest coverage ratio × Interest expense</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Interest coverage ratio</strong> = <code>EBIT ÷ Interest expense</code> — the form to use when EBIT and Interest expense are the values you have.</li><li><strong>Interest expense</strong> = <code>EBIT ÷ Interest coverage ratio</code> — the form to use when EBIT and Interest coverage ratio are the values you have.</li><li><strong>EBIT</strong> = <code>Interest coverage ratio × Interest expense</code> — the form to use when Interest coverage ratio and Interest expense are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Interest coverage ratio, Interest expense and EBIT can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double EBIT from 10 to 20, leaving every other box alone. The panel moves from <strong>Interest coverage ratio</strong> 0.1 to <strong>Interest coverage ratio</strong> 0.2.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Interest coverage ratio is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>EBIT left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If EBIT is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Interest expense left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Interest expense is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in EBIT and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Interest coverage ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>EBIT</strong> takes a plain number with no unit attached. Earnings before interests and taxes. Change it and Interest coverage ratio and Interest expense changes with it. Fill it from a measurement rather than a memory — EBIT is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest expense</strong> takes a plain number with no unit attached. Change it and Interest coverage ratio and EBIT changes with it. Fill it from a measurement rather than a memory — Interest expense is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Interest coverage ratio</strong> is a plain number and the page's own defaults put it at 0.1. It is computed from EBIT and Interest expense, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Interest coverage ratio</th></tr></thead><tbody><tr><td><strong>EBIT</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Interest expense</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, EBIT sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in EBIT = 5 USD and Interest expense = 50 USD and the page reports <strong>Interest coverage ratio</strong> = 0.1.</li><li>Feed in EBIT = 30 USD and Interest expense = 100 USD and the page reports <strong>Interest coverage ratio</strong> = 0.3.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have EBIT and Interest expense ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with EBIT — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Interest coverage ratio against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Interest coverage ratio follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes EBIT and Interest expense are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: EBIT and Interest expense measured, Interest coverage ratio wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/california-stimulus-check">California Stimulus Check Calculator</a>, <a href="/finance/california-tax">California tax Calculator</a> and <a href="/finance/call-put-option">Call put option</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Interest coverage ratio is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Interest coverage ratio is a number to act on, so the useful question is what to do with Interest coverage ratio once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down EBIT and Interest expense alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Interest coverage ratio calculator work out?', 'a' => 'Interest coverage ratio, from EBIT and Interest expense. The relationship is Interest coverage ratio = EBIT ÷ Interest expense.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'EBIT (USD), Interest expense (USD). Fill EBIT and interest expense and leave Interest coverage ratio empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Interest coverage ratio, Interest expense and EBIT can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Interest coverage ratio = 0.1. That comes from the page\'s own defaults, entered in EBIT; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Interest coverage ratio is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave EBIT blank and the page solves for it, reporting Interest coverage ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Interest coverage ratio at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/california-stimulus-check', 'name' => 'California Stimulus Check Calculator'],
            ['path' => '/finance/california-tax', 'name' => 'California tax Calculator'],
            ['path' => '/finance/call-put-option', 'name' => 'Call put option'],
        ],
        'authors' => [],
    ],
];
