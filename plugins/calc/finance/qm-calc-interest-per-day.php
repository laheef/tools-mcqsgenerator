<?php

/**
 * Interest per day
 * /finance/interest-per-day
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Interest per day',
    'meta' => ['title' => 'Interest per day — Formula, Steps & Examples', 'description' => 'Interest per day works out interest rate per day from loan balance and annual interest rate. Every box can be solved for, not only the one in the title.', 'h1' => 'Interest per day Calculator', 'updated' => '2026-07-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'P',
                            'label' => 'Loan balance',
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
                            'name' => 'r',
                            'label' => 'Annual interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daily_interest',
                            'label' => 'Interest per day',
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
                            'name' => 'daily_interest_rate',
                            'label' => 'Interest rate per day',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'daily_interest = P * daily_interest_rate',
            'results' => ['daily_interest' => 'P*daily_interest_rate', 'P' => 'daily_interest/daily_interest_rate', 'daily_interest_rate' => 'daily_interest/P'],
        ],
        [
            'title' => 'daily_interest_rate = r / 365',
            'results' => ['r' => '365*daily_interest_rate', 'daily_interest_rate' => '(1/365)*r'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Interest per day works out Annual interest rate and Interest per day from Loan balance and Interest rate per day. The arithmetic is the whole method: annual interest rate is worked out from loan balance by one formula, applied once. Annual interest rate comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Interest per day calculator works', 'html' => <<<'TXT'
            <p>Interest per day answers one question from 2 numbers, and the answer is Annual interest rate and Interest per day.</p><p>In the form&#039;s own words, Interest per day = Loan balance × Interest rate per day.</p><p>The answers are Annual interest rate and Interest per day; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Loan balance</strong> — in USD</li><li><strong>Interest rate per day</strong> — in percent</li></ul><p>The result boxes are Annual interest rate in percent, Interest per day in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Loan balance = 10 USD and Interest rate per day = 100 perc — through the same formula and the panel reports <strong>Interest per day</strong> = 1000 USD and <strong>Annual interest rate</strong> = 36500 perc.</p><ul><li><strong>Interest per day</strong> = 1000 USD</li><li><strong>Annual interest rate</strong> = 36500 perc</li></ul><p>That is <strong>Interest per day</strong> = <code>Loan balance × Interest rate per day</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Interest per day</strong> = 1000 and <strong>Annual interest rate</strong> = 36500. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Annual interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Interest per day</strong> = <code>Loan balance × Interest rate per day</code></li><li><strong>Loan balance</strong> = <code>Interest per day ÷ Interest rate per day</code></li><li><strong>Interest rate per day</strong> = <code>Interest per day ÷ Loan balance</code></li><li><strong>Annual interest rate</strong> = <code>365 × Interest rate per day</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Interest per day</strong> = <code>Loan balance × Interest rate per day</code> — the form to use when Loan balance and Interest rate per day are the values you have.</li><li><strong>Loan balance</strong> = <code>Interest per day ÷ Interest rate per day</code> — the form to use when Interest per day and Interest rate per day are the values you have.</li><li><strong>Interest rate per day</strong> = <code>Interest per day ÷ Loan balance</code> — the form to use when Interest per day and Loan balance are the values you have.</li><li><strong>Interest rate per day</strong> = <code>(1 ÷ 365) × Annual interest rate</code> — the form to use when Annual interest rate are the values you have.</li><li><strong>Annual interest rate</strong> = <code>365 × Interest rate per day</code> — the form to use when Interest rate per day are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Interest per day, Loan balance and Interest rate per day can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Loan balance, from 10 to 20 — and the answers go from <strong>Interest per day</strong> 1000 USD and <strong>Annual interest rate</strong> 36500 perc to <strong>Interest per day</strong> 2000 USD and <strong>Annual interest rate</strong> 36500 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate per day carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Annual interest rate and Interest per day are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Loan balance left as a guess.</strong> Anything typed into Loan balance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Interest rate per day left as a guess.</strong> Anything typed into Interest rate per day is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Loan balance and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Interest per day form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Loan balance</strong> takes a plain number with no unit attached. The page reads it when it works out Interest per day and Interest rate per day. Fill it from a measurement rather than a memory — Loan balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate per day</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Interest per day, Loan balance and Annual interest rate. Fill it from a measurement rather than a memory — Interest rate per day is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Annual interest rate</strong> is a percent figure and the page's own defaults put it at 36500 perc. The value follows from Interest rate per day. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Interest per day</strong> is a plain number and the page's own defaults put it at 1000. The value follows from Loan balance and Interest rate per day. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Interest per day</th><th>Annual interest rate</th></tr></thead><tbody><tr><td><strong>Loan balance</strong> +10%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Interest rate per day</strong> +10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Interest rate per day: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Loan balance = 5 USD and Interest rate per day = 50 perc and the page reports <strong>Interest per day</strong> = 250 USD and <strong>Annual interest rate</strong> = 18250 perc.</li><li>Feed in Loan balance = 30 USD and Interest rate per day = 100 perc and the page reports <strong>Interest per day</strong> = 3000 USD and <strong>Annual interest rate</strong> = 36500 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Interest per day actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Annual interest rate is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Loan balance and Interest rate per day and the number you are missing is Annual interest rate and Interest per day.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/biden-tax-plan">Biden&#039;s Tax Plan Calculator</a>, <a href="/finance/bill-rate">Bill rate Calculator</a> and <a href="/finance/billable-hours">Billable hours Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Interest per day calculator work out?', 'a' => <<<'TXT'
            Annual interest rate and Interest per day, from Loan balance and Interest rate per day. The relationship is Interest per day = Loan balance × Interest rate per day.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan balance (USD), Interest rate per day (percent). With loan balance and interest rate per day in place, Annual interest rate can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Interest per day, Loan balance, Interest rate per day and Annual interest rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Interest per day = 1000 USD and Annual interest rate = 36500 perc. Those are the defaults written into the form — move Loan balance and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Annual interest rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Loan balance blank and the page solves for it, reporting Annual interest rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Annual interest rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/biden-tax-plan', 'name' => 'Biden\'s Tax Plan Calculator'],
            ['path' => '/finance/bill-rate', 'name' => 'Bill rate Calculator'],
            ['path' => '/finance/billable-hours', 'name' => 'Billable hours Calculator'],
        ],
        'authors' => [],
    ],
];
