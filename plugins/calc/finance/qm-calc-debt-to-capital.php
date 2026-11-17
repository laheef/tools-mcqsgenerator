<?php

/**
 * Debt-to-capital ratio
 * /finance/debt-to-capital
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Debt-to-capital ratio',
    'meta' => ['title' => 'Debt-to-capital ratio Calculator: Free, With Steps', 'description' => 'Debt-to-capital ratio works out debt to capital ratio from interest bearing debt. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Debt-to-capital ratio Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_bearing_debt',
                            'label' => 'Interest bearing debt',
                            'type' => 'number',
                            'help' => 'Includes all financial debt: bonds, short term debt, long term debt, current part of long term debt, etc.',
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
                            'name' => 'equity',
                            'label' => 'Shareholder\'s equity',
                            'type' => 'number',
                            'help' => 'Includes market value of equity, preferred stock, and minority interest.',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Debt_to_capital_ratio > 0.5 and Debt_to_capital_ratio < 1', 'text' => 'Your debt-to-capital-ratio input value implies a negative equity or a negative interest bearing debt. Such situation should not be analyzed with this ratio.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Debt_to_capital_ratio',
                            'label' => 'Debt to capital ratio',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Debt_to_capital_ratio > 0.7 and Debt_to_capital_ratio < 1', 'text' => 'Your company looks to be VEEEERY LEVERAGED. We recommend you to check its interest coverage ratio.'],
                                ['when' => 'Debt_to_capital_ratio > 0 and Debt_to_capital_ratio > 0.49 and Debt_to_capital_ratio < 0.51 and Debt_to_capital_ratio < 1', 'text' => <<<'TXT'
                                Your company looks to be financed equally between interest-bearing debt and shareholder's equity. We recommend you to check its profitability to equity: ROE ratio.
                                TXT],
                                ['when' => 'Debt_to_capital_ratio < 0.3 and Debt_to_capital_ratio > 0', 'text' => 'Your company looks to be slightly leveraged. We recommend you to check its revenue growth to confirm if business is expanding its operations.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Debt_to_capital_ratio = interest_bearing_debt/(equity+interest_bearing_debt)',
            'results' => ['equity' => '-interest_bearing_debt + interest_bearing_debt/Debt_to_capital_ratio', 'Debt_to_capital_ratio' => 'interest_bearing_debt/(equity + interest_bearing_debt)', 'interest_bearing_debt' => '-Debt_to_capital_ratio*equity/(Debt_to_capital_ratio - 1)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Debt-to-capital ratio turns Interest bearing debt and Shareholder's equity into Debt to capital ratio. The arithmetic is the whole method: debt to capital ratio is worked out from interest bearing debt by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Debt-to-capital ratio calculator works', 'html' => <<<'TXT'
            <p>The Debt-to-capital ratio calculator applies one relationship to 2 numbers and reports Debt to capital ratio.</p><p>The relationship it solves reads Debt to capital ratio = Interest bearing debt ÷ (Shareholder&#039;s equity + Interest bearing debt).</p><p>The answers are Debt to capital ratio; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Interest bearing debt</strong> — in USD. Includes all financial debt: bonds, short term debt, long term debt, current part of long term debt, etc.</li><li><strong>Shareholder&#039;s equity</strong> — in USD. Includes market value of equity, preferred stock, and minority interest.</li></ul><p>What you get back is Debt to capital ratio, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Interest bearing debt = 10 USD and Shareholder&amp;#039;s equity = 100 USD — through the same formula and the panel reports <strong>Debt to capital ratio</strong> = 0.0909.</p><ul><li><strong>Debt to capital ratio</strong> = 0.0909</li></ul><p>The line behind those figures is <strong>Debt to capital ratio</strong> = <code>Interest bearing debt ÷ (Shareholder&#039;s equity + Interest bearing debt)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Debt to capital ratio</strong> = 0.0909 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Debt to capital ratio takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Debt to capital ratio</strong> = <code>Interest bearing debt ÷ (Shareholder&#039;s equity + Interest bearing debt)</code></li><li><strong>Shareholder&#039;s equity</strong> = <code>− Interest bearing debt + Interest bearing debt ÷ Debt to capital ratio</code></li><li><strong>Interest bearing debt</strong> = <code>− Debt to capital ratio × Shareholder&#039;s equity ÷ (Debt to capital ratio − 1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Debt to capital ratio</strong> = <code>Interest bearing debt ÷ (Shareholder&#039;s equity + Interest bearing debt)</code> — the form to use when Interest bearing debt and Shareholder&#039;s equity are the values you have.</li><li><strong>Shareholder&#039;s equity</strong> = <code>− Interest bearing debt + Interest bearing debt ÷ Debt to capital ratio</code> — the form to use when Interest bearing debt and Debt to capital ratio are the values you have.</li><li><strong>Interest bearing debt</strong> = <code>− Debt to capital ratio × Shareholder&#039;s equity ÷ (Debt to capital ratio − 1)</code> — the form to use when Debt to capital ratio and Shareholder&#039;s equity are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Debt to capital ratio, Shareholder&#039;s equity and Interest bearing debt can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Interest bearing debt, from 10 to 20 — and the answers go from <strong>Debt to capital ratio</strong> 0.0909 to <strong>Debt to capital ratio</strong> 0.1667.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Debt to capital ratio is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Interest bearing debt left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Interest bearing debt is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Shareholder&#039;s equity left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Shareholder&amp;#039;s equity is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Interest bearing debt and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Interest bearing debt</strong> takes a plain number with no unit attached. Includes all financial debt: bonds, short term debt, long term debt, current part of long term debt, etc. Change it and Shareholder's equity and Debt to capital ratio changes with it. Have it to hand before you start: Interest bearing debt is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Shareholder&#039;s equity</strong> takes a plain number with no unit attached. Includes market value of equity, preferred stock, and minority interest. Change it and Debt to capital ratio and Interest bearing debt changes with it. Have it to hand before you start: Shareholder&#039;s equity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Debt to capital ratio</strong> is a plain number and the page's own defaults put it at 0.0909. It is worked out from Interest bearing debt and Shareholder's equity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Debt to capital ratio</th></tr></thead><tbody><tr><td><strong>Interest bearing debt</strong> +10%</td><td>+9.01%</td></tr><tr><td><strong>Shareholder&#039;s equity</strong> +10%</td><td>-8.33%</td></tr></tbody></table><p>Ranked by leverage, Interest bearing debt sits at the top — a ten per cent error in that box shows up as roughly 9 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Interest bearing debt = 5 USD and Shareholder&#039;s equity = 50 USD, the answer is <strong>Debt to capital ratio</strong> = 0.0909.</li><li>With Interest bearing debt = 30 USD and Shareholder&#039;s equity = 100 USD, the answer is <strong>Debt to capital ratio</strong> = 0.2308.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Interest bearing debt and Shareholder&#039;s equity. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Interest bearing debt into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Debt to capital ratio with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Debt to capital ratio follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Interest bearing debt and Shareholder&#039;s equity measured, Debt to capital ratio wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/operating-cash-flow">Operating cash flow</a>, <a href="/finance/operating-margin">Operating margin Calculator</a> and <a href="/finance/opportunity-cost">Opportunity cost Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Debt-to-capital ratio is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Interest bearing debt and Shareholder&#039;s equity beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Debt-to-capital ratio calculator work out?', 'a' => <<<'TXT'
            Debt to capital ratio, from Interest bearing debt and Shareholder's equity. The relationship is Debt to capital ratio = Interest bearing debt ÷ (Shareholder's equity + Interest bearing debt).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Interest bearing debt (USD), Shareholder's equity (USD). Enter interest bearing debt and shareholder's equity; Debt to capital ratio is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Debt to capital ratio, Shareholder's equity and Interest bearing debt can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Debt to capital ratio = 0.0909. Those are the defaults written into the form — move Interest bearing debt and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Debt to capital ratio is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Interest bearing debt left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Debt to capital ratio keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/operating-cash-flow', 'name' => 'Operating cash flow'],
            ['path' => '/finance/operating-margin', 'name' => 'Operating margin Calculator'],
            ['path' => '/finance/opportunity-cost', 'name' => 'Opportunity cost Calculator'],
        ],
        'authors' => [],
    ],
];
