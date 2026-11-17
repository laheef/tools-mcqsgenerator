<?php

/**
 * Margin interest
 * /finance/margin-interest
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Margin interest',
    'meta' => ['title' => 'Margin interest — Formula, Steps & Examples', 'description' => 'Enter amount borrowed and interest rate and get margin interest back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Margin interest Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amount_borrowed',
                            'label' => 'Amount borrowed',
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
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
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
                            'name' => 'number_of_days',
                            'label' => 'Number of days',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'margin_interest',
                            'label' => 'Margin interest',
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
            'title' => 'margin_interest = amount_borrowed * interest_rate / 360 * number_of_days',
            'results' => ['amount_borrowed' => '360*margin_interest/(interest_rate*number_of_days)', 'number_of_days' => '360*margin_interest/(amount_borrowed*interest_rate)', 'margin_interest' => '(1/360)*amount_borrowed*interest_rate*number_of_days', 'interest_rate' => '360*margin_interest/(amount_borrowed*number_of_days)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Margin interest works out Margin interest from Amount borrowed, Interest rate and Number of days. Nothing is looked up on this page: margin interest is computed from amount borrowed and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Margin interest is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Margin interest calculator works', 'html' => <<<'TXT'
            <p>The Margin interest calculator applies one relationship to 3 numbers and reports Margin interest.</p><p>The relationship it solves reads Margin interest = (1 ÷ 360) × Amount borrowed × Interest rate × Number of days.</p><p>The result panel carries Margin interest, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Amount borrowed</strong> — in USD</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Number of days</strong> — in days</li></ul><p>The answer comes back as Margin interest in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Amount borrowed = 10 USD, Interest rate = 100 perc and Number of days = 1000 days; the answers are <strong>Margin interest</strong> = 2778 USD.</p><ul><li><strong>Margin interest</strong> = 2778 USD</li></ul><p>The line behind those figures is <strong>Margin interest</strong> = <code>(1 ÷ 360) × Amount borrowed × Interest rate × Number of days</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Margin interest</strong> = 2778. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Margin interest</strong> = <code>(1 ÷ 360) × Amount borrowed × Interest rate × Number of days</code></li><li><strong>Amount borrowed</strong> = <code>360 × Margin interest ÷ (Interest rate × Number of days)</code></li><li><strong>Number of days</strong> = <code>360 × Margin interest ÷ (Amount borrowed × Interest rate)</code></li><li><strong>Interest rate</strong> = <code>360 × Margin interest ÷ (Amount borrowed × Number of days)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Margin interest</strong> = <code>(1 ÷ 360) × Amount borrowed × Interest rate × Number of days</code> — the form to use when Amount borrowed, Interest rate and Number of days are the values you have.</li><li><strong>Amount borrowed</strong> = <code>360 × Margin interest ÷ (Interest rate × Number of days)</code> — the form to use when Margin interest, Interest rate and Number of days are the values you have.</li><li><strong>Number of days</strong> = <code>360 × Margin interest ÷ (Amount borrowed × Interest rate)</code> — the form to use when Margin interest, Amount borrowed and Interest rate are the values you have.</li><li><strong>Interest rate</strong> = <code>360 × Margin interest ÷ (Amount borrowed × Number of days)</code> — the form to use when Margin interest, Amount borrowed and Number of days are the values you have.</li></ul><p>Any one of Margin interest, Amount borrowed and Number of days can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Amount borrowed, from 10 to 20 — and the answers go from <strong>Margin interest</strong> 2778 USD to <strong>Margin interest</strong> 5556 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Margin interest is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Amount borrowed left as a guess.</strong> Anything typed into Amount borrowed is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Interest rate left as a guess.</strong> Anything typed into Interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Amount borrowed is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Margin interest form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Amount borrowed</strong> takes a plain number with no unit attached. The page reads it when it works out Number of days, Margin interest and Interest rate. Fill it from a measurement rather than a memory — Amount borrowed is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Amount borrowed, Number of days and Margin interest. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of days</strong> is measured in days. The page reads it when it works out Amount borrowed, Margin interest and Interest rate. Fill it from a measurement rather than a memory — Number of days is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Margin interest</strong> is a plain number and the page's own defaults put it at 2778. It is computed from Amount borrowed, Interest rate and Number of days, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Margin interest</th></tr></thead><tbody><tr><td><strong>Amount borrowed</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Interest rate</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of days</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Interest rate: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Amount borrowed = 5 USD, Interest rate = 50 perc and Number of days = 500 days and the page reports <strong>Margin interest</strong> = 347 USD.</li><li>Feed in Amount borrowed = 30 USD, Interest rate = 100 perc and Number of days = 1000 days and the page reports <strong>Margin interest</strong> = 8333 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Margin interest actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Margin interest is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Amount borrowed, Interest rate and Number of days are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Amount borrowed, Interest rate and Number of days is what you already know and Margin interest is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/ppf">PPF (India) Calculator</a>, <a href="/finance/ppp">PPP (purchasing power parity) Calculator</a> and <a href="/finance/pre-and-post-money-valuation">Pre and post-money valuation</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Margin interest is a number to act on, so the useful question is what to do with Margin interest (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Amount borrowed, Interest rate and Number of days alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Margin interest calculator work out?', 'a' => <<<'TXT'
            Margin interest, from Amount borrowed, Interest rate and Number of days. The relationship is Margin interest = (1 ÷ 360) × Amount borrowed × Interest rate × Number of days.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Amount borrowed (USD), Interest rate (percent), Number of days (days). Fill amount borrowed, interest rate and number of days and leave Margin interest empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Margin interest, Amount borrowed, Number of days and Interest rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Margin interest = 2778 USD. Those are the defaults written into the form — move Amount borrowed and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Margin interest is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Amount borrowed blank and the page solves for it, reporting Margin interest instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Margin interest keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/ppf', 'name' => 'PPF (India) Calculator'],
            ['path' => '/finance/ppp', 'name' => 'PPP (purchasing power parity) Calculator'],
            ['path' => '/finance/pre-and-post-money-valuation', 'name' => 'Pre and post-money valuation'],
        ],
        'authors' => [],
    ],
];
