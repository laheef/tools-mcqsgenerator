<?php

/**
 * Margin
 * /finance/margin
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Margin',
    'meta' => ['title' => 'Margin Calculator: Formula, Steps & Examples', 'description' => 'Margin reports revenue and profit. Each box lists the units it accepts, and the answer converts between them. The formula is printed in the form\'s own words.', 'h1' => 'Margin Calculator', 'updated' => '2025-03-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost',
                            'label' => 'Cost',
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
                            'name' => 'margin',
                            'label' => 'Margin',
                            'type' => 'number',
                            'help' => 'Profit margin is the ratio of profit to revenue.',
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
                            'name' => 'revenue',
                            'label' => 'Revenue',
                            'type' => 'number',
                            'help' => 'The price you sell the product for.',
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
                            'name' => 'profit',
                            'label' => 'Profit',
                            'type' => 'number',
                            'help' => 'Money gained from selling the product.',
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
            'title' => 'cost + cost * ( 1 / (1 - margin) - 1) = revenue',
            'results' => ['revenue' => '-cost/(margin - 1)', 'margin' => '(-cost + revenue)/revenue', 'cost' => 'revenue*(1 - margin)'],
        ],
        [
            'title' => 'profit = cost + cost * ( 1 / (1 - margin) - 1) - cost',
            'results' => ['margin' => 'profit/(cost + profit)', 'profit' => '-cost*margin/(margin - 1)', 'cost' => '-profit + profit/margin'],
        ],
        [
            'title' => 'profit = revenue - cost',
            'results' => ['revenue' => 'cost + profit', 'profit' => '-cost + revenue', 'cost' => '-profit + revenue'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Cost and Margin into Margin and the answer comes back as Revenue and Profit. The arithmetic is the whole method: revenue is worked out from cost by one formula, applied once. Revenue comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Margin calculator works', 'html' => <<<'TXT'
            <p>Margin answers one question from 2 numbers, and the answer is Revenue and Profit.</p><p>The relationship it solves reads Revenue = − Cost ÷ (Margin − 1).</p><p>The result panel carries Revenue and Profit, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Cost</strong> — in USD</li><li><strong>Margin</strong> — in percent. Profit margin is the ratio of profit to revenue.</li></ul><p>The answers come back as Revenue in USD, Profit in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Cost = 10 USD and Margin = 100 perc — through the same formula and the panel reports <strong>Revenue</strong> = -0.101 USD and <strong>Profit</strong> = -10.1 USD.</p><ul><li><strong>Revenue</strong> = -0.101 USD</li><li><strong>Profit</strong> = -10.1 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Revenue</strong> = <code>− Cost ÷ (Margin − 1)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Revenue</strong> = -0.101 and <strong>Profit</strong> = -10.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Margin lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Revenue</strong> = <code>− Cost ÷ (Margin − 1)</code></li><li><strong>Margin</strong> = <code>( − Cost + Revenue) ÷ Revenue</code></li><li><strong>Cost</strong> = <code>Revenue × (1 − Margin)</code></li><li><strong>Profit</strong> = <code>− Cost × Margin ÷ (Margin − 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Revenue</strong> = <code>− Cost ÷ (Margin − 1)</code> — the form to use when Cost and Margin are the values you have.</li><li><strong>Margin</strong> = <code>( − Cost + Revenue) ÷ Revenue</code> — the form to use when Cost and Revenue are the values you have.</li><li><strong>Cost</strong> = <code>Revenue × (1 − Margin)</code> — the form to use when Revenue and Margin are the values you have.</li><li><strong>Profit</strong> = <code>− Cost × Margin ÷ (Margin − 1)</code> — the form to use when Cost and Margin are the values you have.</li><li><strong>Margin</strong> = <code>Profit ÷ (Cost + Profit)</code> — the form to use when Profit and Cost are the values you have.</li><li><strong>Cost</strong> = <code>− Profit + Profit ÷ Margin</code> — the form to use when Profit and Margin are the values you have.</li><li><strong>Profit</strong> = <code>− Cost + Revenue</code> — the form to use when Cost and Revenue are the values you have.</li><li><strong>Revenue</strong> = <code>Cost + Profit</code> — the form to use when Cost and Profit are the values you have.</li></ul><p>Any one of Revenue, Margin and Cost can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cost, from 10 to 20 — and the answers go from <strong>Revenue</strong> -0.101 USD and <strong>Profit</strong> -10.1 USD to <strong>Revenue</strong> -0.202 USD and <strong>Profit</strong> -20.2 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Margin carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Revenue and Profit are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Cost left as a guess.</strong> Anything typed into Cost is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Margin left as a guess.</strong> Anything typed into Margin is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Cost is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Cost</strong> takes a plain number with no unit attached. The page reads it when it works out Revenue, Margin and Profit. Have it to hand before you start: Cost is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Margin</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Profit margin is the ratio of profit to revenue. The page reads it when it works out Revenue, Cost and Profit. Have it to hand before you start: Margin is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Revenue</strong> is a plain number and the page's own defaults put it at -0.101. The value follows from Cost and Margin. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Profit</strong> is a plain number and the page's own defaults put it at -10.1. The value follows from Cost and Margin. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Revenue</th><th>Profit</th></tr></thead><tbody><tr><td><strong>Cost</strong> +10%</td><td>-10%</td><td>-10%</td></tr><tr><td><strong>Margin</strong> +10%</td><td>+9.17%</td><td>+0.09%</td></tr></tbody></table><p>The steepest column belongs to Cost: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Cost = 5 USD and Margin = 50 perc, the answer is <strong>Revenue</strong> = -0.102 USD and <strong>Profit</strong> = -5.1 USD.</li><li>With Cost = 30 USD and Margin = 100 perc, the answer is <strong>Revenue</strong> = -0.303 USD and <strong>Profit</strong> = -30.3 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Cost and Margin. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Cost into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Revenue in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Revenue is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cost and Margin and the number you are missing is Revenue and Profit.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/land-loan-payment">Land loan</a>, <a href="/finance/lease-mileage">Lease mileage Calculator</a> and <a href="/finance/lease">Lease</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Margin calculator work out?', 'a' => 'Revenue and Profit, from Cost and Margin. The relationship is Revenue = − Cost ÷ (Margin − 1).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Cost (USD), Margin (percent). With cost and margin in place, Revenue can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Revenue, Margin, Cost and Profit blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Revenue = -0.101 USD and Profit = -10.1 USD. That comes from the page\'s own defaults, entered in Cost; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Revenue is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Cost left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Revenue at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/land-loan-payment', 'name' => 'Land loan'],
            ['path' => '/finance/lease-mileage', 'name' => 'Lease mileage Calculator'],
            ['path' => '/finance/lease', 'name' => 'Lease'],
        ],
        'authors' => [],
    ],
];
