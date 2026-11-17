<?php

/**
 * Loss ratio
 * /finance/loss-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Loss ratio',
    'meta' => ['title' => 'Loss ratio Calculator: Formula, Steps & Examples', 'description' => 'Enter total premiums earned and insurance claims paid and get loss ratio back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Loss ratio Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Financial results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'premiums',
                            'label' => 'Total premiums earned',
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
                            'name' => 'claims',
                            'label' => 'Insurance claims paid',
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
                            'name' => 'adj',
                            'label' => 'Loss adjustment expense',
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
            'title' => 'Loss ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loss_ratio',
                            'label' => 'Loss ratio',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
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
                                ['when' => 'loss_ratio < 1', 'text' => 'The claims and adjustment expenses are less than the total premiums earned. The insurance company is making a profit on its policies &nbsp;'],
                                ['when' => 'loss_ratio > 1', 'text' => 'The claims and adjustment expenses are more than the total premiums earned. The insurance company is making a loss on its policies &nbsp;'],
                                ['when' => 'loss_ratio == 1', 'text' => 'The claims and adjustment expenses are same as the total premiums earned. The insurance company is just breaking even '],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'loss_ratio = (claims + adj) / premiums',
            'results' => ['premiums' => '(adj + claims)/loss_ratio', 'adj' => '-claims + loss_ratio*premiums', 'loss_ratio' => '(adj + claims)/premiums', 'claims' => '-adj + loss_ratio*premiums'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Loss ratio works out Loss ratio from Total premiums earned, Insurance claims paid and Loss adjustment expense. Nothing is looked up on this page: loss ratio is computed from total premiums earned and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Loss ratio is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Loss ratio calculator works', 'html' => <<<'TXT'
            <p>The Loss ratio calculator applies one relationship to 3 numbers and reports Loss ratio.</p><p>Written with the labels from the form, Loss ratio = (Loss adjustment expense + Insurance claims paid) ÷ Total premiums earned.</p><p>The result panel carries Loss ratio, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Total premiums earned</strong> — in USD</li><li><strong>Insurance claims paid</strong> — in USD</li><li><strong>Loss adjustment expense</strong> — in USD</li></ul><p>What you get back is Loss ratio in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Total premiums earned = 10 USD, Insurance claims paid = 100 USD and Loss adjustment expense = 1000 USD gives <strong>Loss ratio</strong> = 110 perc.</p><ul><li><strong>Loss ratio</strong> = 110 perc</li></ul><p>The line behind those figures is <strong>Loss ratio</strong> = <code>(Loss adjustment expense + Insurance claims paid) ÷ Total premiums earned</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Loss ratio</strong> = 110. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Loss ratio lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Loss ratio</strong> = <code>(Loss adjustment expense + Insurance claims paid) ÷ Total premiums earned</code></li><li><strong>Total premiums earned</strong> = <code>(Loss adjustment expense + Insurance claims paid) ÷ Loss ratio</code></li><li><strong>Loss adjustment expense</strong> = <code>− Insurance claims paid + Loss ratio × Total premiums earned</code></li><li><strong>Insurance claims paid</strong> = <code>− Loss adjustment expense + Loss ratio × Total premiums earned</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Loss ratio</strong> = <code>(Loss adjustment expense + Insurance claims paid) ÷ Total premiums earned</code> — the form to use when Loss adjustment expense, Insurance claims paid and Total premiums earned are the values you have.</li><li><strong>Total premiums earned</strong> = <code>(Loss adjustment expense + Insurance claims paid) ÷ Loss ratio</code> — the form to use when Loss adjustment expense, Insurance claims paid and Loss ratio are the values you have.</li><li><strong>Loss adjustment expense</strong> = <code>− Insurance claims paid + Loss ratio × Total premiums earned</code> — the form to use when Insurance claims paid, Loss ratio and Total premiums earned are the values you have.</li><li><strong>Insurance claims paid</strong> = <code>− Loss adjustment expense + Loss ratio × Total premiums earned</code> — the form to use when Loss adjustment expense, Loss ratio and Total premiums earned are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Loss ratio, Total premiums earned and Loss adjustment expense can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Total premiums earned, from 10 to 20 — and the answers go from <strong>Loss ratio</strong> 110 perc to <strong>Loss ratio</strong> 55 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Loss ratio is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Total premiums earned left as a guess.</strong> Anything typed into Total premiums earned is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Insurance claims paid left as a guess.</strong> Anything typed into Insurance claims paid is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Loss adjustment expense left as a guess.</strong> Anything typed into Loss adjustment expense is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Total premiums earned and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Loss ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total premiums earned</strong> takes a plain number with no unit attached. It feeds Loss adjustment expense, Loss ratio and Insurance claims paid. Fill it from a measurement rather than a memory — Total premiums earned is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Insurance claims paid</strong> takes a plain number with no unit attached. It feeds Total premiums earned, Loss adjustment expense and Loss ratio. Fill it from a measurement rather than a memory — Insurance claims paid is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Loss adjustment expense</strong> takes a plain number with no unit attached. It feeds Total premiums earned, Loss ratio and Insurance claims paid. Fill it from a measurement rather than a memory — Loss adjustment expense is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Loss ratio</strong> is a percent figure and the page's own defaults put it at 110 perc. It is worked out from Loss adjustment expense, Insurance claims paid and Total premiums earned. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Loss ratio</th></tr></thead><tbody><tr><td><strong>Total premiums earned</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Insurance claims paid</strong> +10%</td><td>+0.91%</td></tr><tr><td><strong>Loss adjustment expense</strong> +10%</td><td>+9.09%</td></tr></tbody></table><p>The steepest column belongs to Total premiums earned: ten per cent there moves an answer by about 9.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Total premiums earned = 5 USD, Insurance claims paid = 50 USD and Loss adjustment expense = 500 USD and the page reports <strong>Loss ratio</strong> = 110 perc.</li><li>Feed in Total premiums earned = 30 USD, Insurance claims paid = 100 USD and Loss adjustment expense = 1000 USD and the page reports <strong>Loss ratio</strong> = 36.67 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Loss ratio actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Loss ratio is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Total premiums earned, Insurance claims paid and Loss adjustment expense is what you already know and Loss ratio is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/ctr">CTR Calculator</a>, <a href="/finance/currency-converter">Currency converter Calculator</a> and <a href="/finance/currency-forward">Currency forward Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Loss ratio is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Total premiums earned, Insurance claims paid and Loss adjustment expense beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Loss ratio calculator work out?', 'a' => <<<'TXT'
            Loss ratio, from Loss adjustment expense, Insurance claims paid and Total premiums earned. The relationship is Loss ratio = (Loss adjustment expense + Insurance claims paid) ÷ Total premiums earned.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total premiums earned (USD), Insurance claims paid (USD), Loss adjustment expense (USD). With total premiums earned, insurance claims paid and loss adjustment expense in place, Loss ratio can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Loss ratio, Total premiums earned, Loss adjustment expense and Insurance claims paid can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Loss ratio = 110 perc. Those are the defaults written into the form — move Total premiums earned and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Loss ratio is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total premiums earned blank and the page solves for it, reporting Loss ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Loss ratio at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/ctr', 'name' => 'CTR Calculator'],
            ['path' => '/finance/currency-converter', 'name' => 'Currency converter Calculator'],
            ['path' => '/finance/currency-forward', 'name' => 'Currency forward Calculator'],
        ],
        'authors' => [],
    ],
];
