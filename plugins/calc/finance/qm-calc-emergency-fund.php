<?php

/**
 * Emergency fund
 * /finance/emergency-fund
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Emergency fund',
    'meta' => ['title' => 'Emergency fund Calculator — Formula & Results', 'description' => 'Emergency fund turns average monthly expenses and months of savings desired into emergency fund. Every box can be solved for, not only the one in the title.', 'h1' => 'Emergency fund Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_monthly_savings',
                            'label' => 'Average monthly expenses',
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
                            'name' => 'months_of_savings_desired',
                            'label' => 'Months of savings desired',
                            'type' => 'number',
                            'suffix' => 'months',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'emergency_fund',
                            'label' => 'Emergency fund',
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
    ],
    'formula' => [
        [
            'title' => 'emergency_fund = average_monthly_savings * months_of_savings_desired',
            'results' => ['average_monthly_savings' => 'emergency_fund/months_of_savings_desired', 'emergency_fund' => 'average_monthly_savings*months_of_savings_desired', 'months_of_savings_desired' => 'emergency_fund/average_monthly_savings'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Emergency fund works out Emergency fund from Average monthly expenses and Months of savings desired. The arithmetic is the whole method: emergency fund is worked out from average monthly expenses by one formula, applied once. Emergency fund comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Emergency fund calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Emergency fund: it takes 2 numbers and reports Emergency fund.</p><p>Written with the labels from the form, Emergency fund = Average monthly expenses × Months of savings desired.</p><p>The answers are Emergency fund; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Average monthly expenses</strong> — in USD</li><li><strong>Months of savings desired</strong> — in months</li></ul><p>The result box is Emergency fund in USD. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Average monthly expenses = 10 USD and Months of savings desired = 100 months gives <strong>Emergency fund</strong> = 1000 USD.</p><ul><li><strong>Emergency fund</strong> = 1000 USD</li></ul><p>The line behind those figures is <strong>Emergency fund</strong> = <code>Average monthly expenses × Months of savings desired</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Emergency fund</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Emergency fund is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Emergency fund</strong> = <code>Average monthly expenses × Months of savings desired</code></li><li><strong>Average monthly expenses</strong> = <code>Emergency fund ÷ Months of savings desired</code></li><li><strong>Months of savings desired</strong> = <code>Emergency fund ÷ Average monthly expenses</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Emergency fund</strong> = <code>Average monthly expenses × Months of savings desired</code> — the form to use when Average monthly expenses and Months of savings desired are the values you have.</li><li><strong>Average monthly expenses</strong> = <code>Emergency fund ÷ Months of savings desired</code> — the form to use when Emergency fund and Months of savings desired are the values you have.</li><li><strong>Months of savings desired</strong> = <code>Emergency fund ÷ Average monthly expenses</code> — the form to use when Emergency fund and Average monthly expenses are the values you have.</li></ul><p>Any one of Emergency fund, Average monthly expenses and Months of savings desired can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Average monthly expenses, from 10 to 20 — and the answers go from <strong>Emergency fund</strong> 1000 USD to <strong>Emergency fund</strong> 2000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Emergency fund is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Average monthly expenses left as a guess.</strong> Anything typed into Average monthly expenses is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Months of savings desired left as a guess.</strong> Anything typed into Months of savings desired is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Average monthly expenses is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Emergency fund form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Average monthly expenses</strong> takes a plain number with no unit attached. It feeds Emergency fund and Months of savings desired. Fill it from a measurement rather than a memory — Average monthly expenses is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Months of savings desired</strong> is measured in months. It feeds Average monthly expenses and Emergency fund. Fill it from a measurement rather than a memory — Months of savings desired is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Emergency fund</strong> is a plain number and the page's own defaults put it at 1000. It is worked out from Average monthly expenses and Months of savings desired. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Emergency fund</th></tr></thead><tbody><tr><td><strong>Average monthly expenses</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Months of savings desired</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Months of savings desired: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Average monthly expenses = 5 USD and Months of savings desired = 50 months and the page reports <strong>Emergency fund</strong> = 250 USD.</li><li>Feed in Average monthly expenses = 30 USD and Months of savings desired = 100 months and the page reports <strong>Emergency fund</strong> = 3000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Average monthly expenses and Months of savings desired ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Average monthly expenses — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Emergency fund in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Emergency fund is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Average monthly expenses and Months of savings desired are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Average monthly expenses and Months of savings desired is what you already know and Emergency fund is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/variable-annuity">Variable annuity Calculator</a>, <a href="/finance/vat">VAT Calculator</a> and <a href="/finance/velocity-of-money">Velocity of money</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Emergency fund is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Emergency fund calculator work out?', 'a' => <<<'TXT'
            Emergency fund, from Average monthly expenses and Months of savings desired. The relationship is Emergency fund = Average monthly expenses × Months of savings desired.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Average monthly expenses (USD), Months of savings desired (months). With average monthly expenses and months of savings desired in place, Emergency fund can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Emergency fund, Average monthly expenses and Months of savings desired blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Emergency fund = 1000 USD. Those are the defaults written into the form — move Average monthly expenses and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Emergency fund is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Average monthly expenses blank and the page solves for it, reporting Emergency fund instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Emergency fund keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/variable-annuity', 'name' => 'Variable annuity Calculator'],
            ['path' => '/finance/vat', 'name' => 'VAT Calculator'],
            ['path' => '/finance/velocity-of-money', 'name' => 'Velocity of money'],
        ],
        'authors' => [],
    ],
];
