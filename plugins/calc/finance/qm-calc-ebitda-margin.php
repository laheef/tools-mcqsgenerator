<?php

/**
 * EBITDA margin
 * /finance/ebitda-margin
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'EBITDA margin',
    'meta' => ['title' => 'EBITDA margin Calculator — Formula & Results', 'description' => 'Enter total revenues and EBITDA and get EBITDA margin back. Each figure is computed from the boxes you fill, never read from a table. A worked example follows.', 'h1' => 'EBITDA margin Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_revenues',
                            'label' => 'Total revenues',
                            'type' => 'number',
                            'help' => 'All the money the company made from selling goods or providing services to customers.',
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
                            'name' => 'Ebitda',
                            'label' => 'EBITDA',
                            'type' => 'number',
                            'help' => 'Earnings before interests, taxes, depreciation, and amortization.',
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
                            'name' => 'Ebitda_margin',
                            'label' => 'EBITDA margin',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Ebitda_margin<=0', 'text' => 'Your company looks to be&nbsp;'],
                                ['when' => 'Ebitda_margin<0', 'text' => 'not EBITDA positive yet. Better check its operating cash flow.'],
                                ['when' => 'Ebitda_margin==0', 'text' => 'generating 0 EBITDA. You should check its revenue growth to see when EBITDA could become sizeable.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Ebitda_margin = Ebitda/ total_revenues',
            'results' => ['Ebitda_margin' => 'Ebitda/total_revenues', 'total_revenues' => 'Ebitda/Ebitda_margin', 'Ebitda' => 'Ebitda_margin*total_revenues'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Total revenues and EBITDA into EBITDA margin and the answer comes back as EBITDA margin. There is no hidden constant here: change EBITDA margin and total revenues moves with it. The main result, EBITDA margin, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the EBITDA margin calculator works', 'html' => <<<'TXT'
            <p>EBITDA margin answers one question from 2 numbers, and the answer is EBITDA margin.</p><p>The relationship it solves reads EBITDA margin = EBITDA ÷ Total revenues.</p><p>The answers are EBITDA margin; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Total revenues</strong> — in USD. All the money the company made from selling goods or providing services to customers.</li><li><strong>EBITDA</strong> — in USD. Earnings before interests, taxes, depreciation, and amortization.</li></ul><p>The answer comes back as EBITDA margin in percent. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Total revenues = 10 USD and EBITDA = 100 USD; the answers are <strong>EBITDA margin</strong> = 10 perc.</p><ul><li><strong>EBITDA margin</strong> = 10 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>EBITDA margin</strong> = <code>EBITDA ÷ Total revenues</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>EBITDA margin</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on EBITDA margin lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>EBITDA margin</strong> = <code>EBITDA ÷ Total revenues</code></li><li><strong>Total revenues</strong> = <code>EBITDA ÷ EBITDA margin</code></li><li><strong>EBITDA</strong> = <code>EBITDA margin × Total revenues</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>EBITDA margin</strong> = <code>EBITDA ÷ Total revenues</code> — the form to use when EBITDA and Total revenues are the values you have.</li><li><strong>Total revenues</strong> = <code>EBITDA ÷ EBITDA margin</code> — the form to use when EBITDA and EBITDA margin are the values you have.</li><li><strong>EBITDA</strong> = <code>EBITDA margin × Total revenues</code> — the form to use when EBITDA margin and Total revenues are the values you have.</li></ul><p>Any one of EBITDA margin, Total revenues and EBITDA can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Total revenues from 10 to 20, leaving every other box alone. The panel moves from <strong>EBITDA margin</strong> 10 perc to <strong>EBITDA margin</strong> 5 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> EBITDA margin is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Total revenues left as a guess.</strong> Anything typed into Total revenues is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>EBITDA left as a guess.</strong> Anything typed into EBITDA is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Total revenues and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Total revenues</strong> takes a plain number with no unit attached. All the money the company made from selling goods or providing services to customers. The page reads it when it works out EBITDA margin and EBITDA. Have it to hand before you start: Total revenues is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>EBITDA</strong> takes a plain number with no unit attached. Earnings before interests, taxes, depreciation, and amortization. The page reads it when it works out EBITDA margin and Total revenues. Have it to hand before you start: EBITDA is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>EBITDA margin</strong> is a percent figure and the page's own defaults put it at 10 perc. It is worked out from EBITDA and Total revenues. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>EBITDA margin</th></tr></thead><tbody><tr><td><strong>Total revenues</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>EBITDA</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to EBITDA: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Total revenues = 5 USD and EBITDA = 50 USD, the answer is <strong>EBITDA margin</strong> = 10 perc.</li><li>With Total revenues = 30 USD and EBITDA = 100 USD, the answer is <strong>EBITDA margin</strong> = 3.33 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Total revenues and EBITDA. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Total revenues into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare EBITDA margin in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind EBITDA margin is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Total revenues and EBITDA is what you already know and EBITDA margin is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/net-debt">Net debt Calculator</a>, <a href="/finance/net-effective-rent">Net effective rent Calculator</a> and <a href="/finance/net-income">Net income</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what EBITDA margin is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Total revenues and EBITDA beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the EBITDA margin calculator work out?', 'a' => 'EBITDA margin, from EBITDA and Total revenues. The relationship is EBITDA margin = EBITDA ÷ Total revenues.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Total revenues (USD), EBITDA (USD). Enter total revenues and EBITDA; EBITDA margin is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of EBITDA margin, Total revenues and EBITDA blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'EBITDA margin = 10 perc. That comes from the page\'s own defaults, entered in Total revenues; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of EBITDA margin is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Total revenues left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of EBITDA margin keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/net-debt', 'name' => 'Net debt Calculator'],
            ['path' => '/finance/net-effective-rent', 'name' => 'Net effective rent Calculator'],
            ['path' => '/finance/net-income', 'name' => 'Net income'],
        ],
        'authors' => [],
    ],
];
