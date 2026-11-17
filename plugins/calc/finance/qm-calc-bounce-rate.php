<?php

/**
 * Bounce rate
 * /finance/bounce-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bounce rate',
    'meta' => ['title' => 'Bounce rate Calculator: Formula, Steps & Examples', 'description' => 'Enter number of website visits and number of one-page visits and get bounce rate back. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Bounce rate Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'visits',
                            'label' => 'Number of website visits',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'one_page',
                            'label' => 'Number of one-page visits',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bounce_rate',
                            'label' => 'Bounce rate',
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
            'title' => 'bounce_rate = one_page / visits',
            'results' => ['one_page' => 'bounce_rate*visits', 'visits' => 'one_page/bounce_rate', 'bounce_rate' => 'one_page/visits'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Number of website visits and Number of one-page visits into Bounce rate and the answer comes back as Bounce rate. It is a single relationship that reads bounce rate out of number of website visits, not a table of canned results keyed by them. Units for Bounce rate default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Bounce rate calculator works', 'html' => <<<'TXT'
            <p>The Bounce rate calculator applies one relationship to 2 numbers and reports Bounce rate.</p><p>The relationship it solves reads Bounce rate = Number of one-page visits ÷ Number of website visits.</p><p>The result panel carries Bounce rate, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Number of website visits</strong> — a plain number, no unit</li><li><strong>Number of one-page visits</strong> — a plain number, no unit</li></ul><p>The answer comes back as Bounce rate in percent. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Number of website visits = 10 and Number of one-page visits = 100 — through the same formula and the panel reports <strong>Bounce rate</strong> = 10 perc.</p><ul><li><strong>Bounce rate</strong> = 10 perc</li></ul><p>The line behind those figures is <strong>Bounce rate</strong> = <code>Number of one-page visits ÷ Number of website visits</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Bounce rate</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Bounce rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Bounce rate</strong> = <code>Number of one-page visits ÷ Number of website visits</code></li><li><strong>Number of one-page visits</strong> = <code>Bounce rate × Number of website visits</code></li><li><strong>Number of website visits</strong> = <code>Number of one-page visits ÷ Bounce rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Bounce rate</strong> = <code>Number of one-page visits ÷ Number of website visits</code> — the form to use when Number of one-page visits and Number of website visits are the values you have.</li><li><strong>Number of one-page visits</strong> = <code>Bounce rate × Number of website visits</code> — the form to use when Bounce rate and Number of website visits are the values you have.</li><li><strong>Number of website visits</strong> = <code>Number of one-page visits ÷ Bounce rate</code> — the form to use when Number of one-page visits and Bounce rate are the values you have.</li></ul><p>Any one of Bounce rate, Number of one-page visits and Number of website visits can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Number of website visits from 10 to 20, leaving every other box alone. The panel moves from <strong>Bounce rate</strong> 10 perc to <strong>Bounce rate</strong> 5 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Bounce rate is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Number of website visits left as a guess.</strong> Anything typed into Number of website visits is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of one-page visits left as a guess.</strong> Anything typed into Number of one-page visits is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Number of website visits is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Bounce rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Number of website visits</strong> takes a plain number with no unit attached. The page reads it when it works out Number of one-page visits and Bounce rate. Fill it from a measurement rather than a memory — Number of website visits is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of one-page visits</strong> takes a plain number with no unit attached. The page reads it when it works out Number of website visits and Bounce rate. Fill it from a measurement rather than a memory — Number of one-page visits is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Bounce rate</strong> is a percent figure and the page's own defaults put it at 10 perc. It is worked out from Number of one-page visits and Number of website visits. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Bounce rate</th></tr></thead><tbody><tr><td><strong>Number of website visits</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Number of one-page visits</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Number of one-page visits: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Number of website visits = 5 and Number of one-page visits = 50 and the page reports <strong>Bounce rate</strong> = 10 perc.</li><li>Feed in Number of website visits = 30 and Number of one-page visits = 100 and the page reports <strong>Bounce rate</strong> = 3.33 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Bounce rate actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Number of website visits and Number of one-page visits ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Number of website visits — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Bounce rate in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Bounce rate is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Number of website visits and Number of one-page visits is what you already know and Bounce rate is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/prorated-rent">Prorated rent Calculator</a>, <a href="/finance/prorated-salary">Prorated salary</a> and <a href="/finance/put-call-parity">Put-call parity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bounce rate calculator work out?', 'a' => <<<'TXT'
            Bounce rate, from Number of one-page visits and Number of website visits. The relationship is Bounce rate = Number of one-page visits ÷ Number of website visits.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of website visits, Number of one-page visits. Enter number of website visits and number of one-page visits; Bounce rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Bounce rate, Number of one-page visits and Number of website visits blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Bounce rate = 10 perc. Those are the defaults written into the form — move Number of website visits and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Bounce rate is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Number of website visits blank and the page solves for it, reporting Bounce rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Bounce rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/prorated-rent', 'name' => 'Prorated rent Calculator'],
            ['path' => '/finance/prorated-salary', 'name' => 'Prorated salary'],
            ['path' => '/finance/put-call-parity', 'name' => 'Put-call parity Calculator'],
        ],
        'authors' => [],
    ],
];
