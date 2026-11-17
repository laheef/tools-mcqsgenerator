<?php

/**
 * Markup
 * /finance/markup
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Markup',
    'meta' => ['title' => 'Markup Calculator: Formula, Steps & Examples', 'description' => 'Markup takes cost and returns revenue. Results come back in perc, with any other unit a click away. Every box can be solved for, not only the one in the title.', 'h1' => 'Markup Calculator', 'updated' => '2026-09-29'],
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
                            'name' => 'markup',
                            'label' => 'Markup',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
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
            'title' => 'cost + cost * markup = revenue',
            'results' => ['markup' => '(-cost + revenue)/cost', 'revenue' => 'cost*(markup + 1)', 'cost' => 'revenue/(markup + 1)'],
        ],
        [
            'title' => 'profit = revenue - cost',
            'results' => ['revenue' => 'cost + profit', 'profit' => '-cost + revenue', 'cost' => '-profit + revenue'],
        ],
        [
            'title' => 'markup = profit / cost',
            'results' => ['markup' => 'profit/cost', 'profit' => 'cost*markup', 'cost' => 'profit/markup'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Markup takes Cost and Revenue and returns Markup and Profit. Nothing is looked up on this page: markup is computed from cost and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Markup is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Markup calculator works', 'html' => <<<'TXT'
            <p>Markup answers one question from 2 numbers, and the answer is Markup and Profit.</p><p>The relationship it solves reads Markup = ( − Cost + Revenue) ÷ Cost.</p><p>The answers are Markup and Profit; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Cost</strong> — in USD</li><li><strong>Revenue</strong> — in USD</li></ul><p>The result boxes are Markup in percent, Profit in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Cost = 10 USD and Revenue = 100 USD — through the same formula and the panel reports <strong>Markup</strong> = 9 perc and <strong>Profit</strong> = 90 USD.</p><ul><li><strong>Markup</strong> = 9 perc</li><li><strong>Profit</strong> = 90 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Markup</strong> = <code>( − Cost + Revenue) ÷ Cost</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Markup</strong> = 9 and <strong>Profit</strong> = 90 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Markup offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Markup</strong> = <code>( − Cost + Revenue) ÷ Cost</code></li><li><strong>Revenue</strong> = <code>Cost × (Markup + 1)</code></li><li><strong>Cost</strong> = <code>Revenue ÷ (Markup + 1)</code></li><li><strong>Profit</strong> = <code>− Cost + Revenue</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Markup</strong> = <code>( − Cost + Revenue) ÷ Cost</code> — the form to use when Cost and Revenue are the values you have.</li><li><strong>Revenue</strong> = <code>Cost × (Markup + 1)</code> — the form to use when Cost and Markup are the values you have.</li><li><strong>Cost</strong> = <code>Revenue ÷ (Markup + 1)</code> — the form to use when Revenue and Markup are the values you have.</li><li><strong>Profit</strong> = <code>− Cost + Revenue</code> — the form to use when Cost and Revenue are the values you have.</li><li><strong>Revenue</strong> = <code>Cost + Profit</code> — the form to use when Cost and Profit are the values you have.</li><li><strong>Cost</strong> = <code>− Profit + Revenue</code> — the form to use when Profit and Revenue are the values you have.</li><li><strong>Markup</strong> = <code>Profit ÷ Cost</code> — the form to use when Profit and Cost are the values you have.</li><li><strong>Profit</strong> = <code>Cost × Markup</code> — the form to use when Cost and Markup are the values you have.</li></ul><p>Any one of Markup, Revenue and Cost can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cost, from 10 to 20 — and the answers go from <strong>Markup</strong> 9 perc and <strong>Profit</strong> 90 USD to <strong>Markup</strong> 4 perc and <strong>Profit</strong> 80 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Markup and Profit are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cost left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cost is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Revenue left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Revenue is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Cost and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Markup form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Cost</strong> takes a plain number with no unit attached. The page reads it when it works out Markup, Revenue and Profit. Fill it from a measurement rather than a memory — Cost is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Revenue</strong> takes a plain number with no unit attached. The page reads it when it works out Markup, Cost and Profit. Fill it from a measurement rather than a memory — Revenue is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Markup</strong> is a percent figure and the page's own defaults put it at 9 perc. It is computed from Cost and Revenue, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Profit</strong> is a plain number and the page's own defaults put it at 90. It is computed from Cost and Revenue, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Markup</th><th>Profit</th></tr></thead><tbody><tr><td><strong>Cost</strong> +10%</td><td>-10.1%</td><td>-1.11%</td></tr><tr><td><strong>Revenue</strong> +10%</td><td>+11.11%</td><td>+11.11%</td></tr></tbody></table><p>Ranked by leverage, Revenue sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Cost = 5 USD and Revenue = 50 USD and the page reports <strong>Markup</strong> = 9 perc and <strong>Profit</strong> = 45 USD.</li><li>Feed in Cost = 30 USD and Revenue = 100 USD and the page reports <strong>Markup</strong> = 2.33 perc and <strong>Profit</strong> = 70 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Markup actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Cost and Revenue ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Cost — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Markup in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Markup follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Cost and Revenue measured, Markup and Profit wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/payback-period">Payback period</a>, <a href="/finance/payday-loan">Payday loan Calculator</a> and <a href="/finance/paypal-fee">Paypal fee Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Markup calculator work out?', 'a' => 'Markup and Profit, from Cost and Revenue. The relationship is Markup = ( − Cost + Revenue) ÷ Cost.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Cost (USD), Revenue (USD). With cost and revenue in place, Markup can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Markup, Revenue, Cost and Profit blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Markup = 9 perc and Profit = 90 USD. Those are the defaults written into the form — move Cost and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Markup is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Cost blank and the page solves for it, reporting Markup instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Markup keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/payback-period', 'name' => 'Payback period'],
            ['path' => '/finance/payday-loan', 'name' => 'Payday loan Calculator'],
            ['path' => '/finance/paypal-fee', 'name' => 'Paypal fee Calculator'],
        ],
        'authors' => [],
    ],
];
