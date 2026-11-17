<?php

/**
 * Sell-through rate
 * /finance/sell-through-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sell-through rate',
    'meta' => ['title' => 'Sell-through rate: Formula, Steps & Results', 'description' => 'Sell-through rate turns number of units sold and number of units received into sell-through rate. Results come back in perc, with any other unit a click away.', 'h1' => 'Sell-through rate Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'units_sold',
                            'label' => 'Number of units sold',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'units_received',
                            'label' => 'Number of units received',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'str',
                            'label' => 'Sell-through rate',
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
            'title' => 'str = units_sold / units_received',
            'results' => ['units_sold' => 'str*units_received', 'str' => 'units_sold/units_received', 'units_received' => 'units_sold/str'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sell-through rate turns Number of units sold and Number of units received into Sell-through rate. It is a single relationship that reads sell-through rate out of number of units sold, not a table of canned results keyed by them. Units for Sell-through rate default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Sell-through rate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Sell-through rate: it takes 2 numbers and reports Sell-through rate.</p><p>In the form&#039;s own words, Sell-through rate = Number of units sold ÷ Number of units received.</p><p>The answers are Sell-through rate; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Number of units sold</strong> — a plain number, no unit</li><li><strong>Number of units received</strong> — a plain number, no unit</li></ul><p>What you get back is Sell-through rate in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Number of units sold = 10 and Number of units received = 100 gives <strong>Sell-through rate</strong> = 0.1 perc.</p><ul><li><strong>Sell-through rate</strong> = 0.1 perc</li></ul><p>That is <strong>Sell-through rate</strong> = <code>Number of units sold ÷ Number of units received</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Sell-through rate</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Sell-through rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Sell-through rate</strong> = <code>Number of units sold ÷ Number of units received</code></li><li><strong>Number of units sold</strong> = <code>Sell-through rate × Number of units received</code></li><li><strong>Number of units received</strong> = <code>Number of units sold ÷ Sell-through rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Sell-through rate</strong> = <code>Number of units sold ÷ Number of units received</code> — the form to use when Number of units sold and Number of units received are the values you have.</li><li><strong>Number of units sold</strong> = <code>Sell-through rate × Number of units received</code> — the form to use when Sell-through rate and Number of units received are the values you have.</li><li><strong>Number of units received</strong> = <code>Number of units sold ÷ Sell-through rate</code> — the form to use when Number of units sold and Sell-through rate are the values you have.</li></ul><p>Any one of Sell-through rate, Number of units sold and Number of units received can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Number of units sold from 10 to 20, leaving every other box alone. The panel moves from <strong>Sell-through rate</strong> 0.1 perc to <strong>Sell-through rate</strong> 0.2 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Sell-through rate is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Number of units sold left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of units sold is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of units received left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of units received is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Number of units sold to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Sell-through rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Number of units sold</strong> takes a plain number with no unit attached. Change it and Sell-through rate and Number of units received changes with it. Fill it from a measurement rather than a memory — Number of units sold is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of units received</strong> takes a plain number with no unit attached. Change it and Number of units sold and Sell-through rate changes with it. Fill it from a measurement rather than a memory — Number of units received is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Sell-through rate</strong> is a percent figure and the page's own defaults put it at 0.1 perc. It is worked out from Number of units sold and Number of units received. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Sell-through rate</th></tr></thead><tbody><tr><td><strong>Number of units sold</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of units received</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Number of units sold sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Number of units sold = 5 and Number of units received = 50 and the page reports <strong>Sell-through rate</strong> = 0.1 perc.</li><li>Feed in Number of units sold = 30 and Number of units received = 100 and the page reports <strong>Sell-through rate</strong> = 0.3 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Sell-through rate actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Number of units sold and Number of units received ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Number of units sold — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Sell-through rate in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Sell-through rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Number of units sold and Number of units received are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Number of units sold and Number of units received measured, Sell-through rate wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/cash-flow-to-debt">Cash flow to debt ratio Calculator</a>, <a href="/finance/cash-ratio">Cash ratio</a> and <a href="/finance/cash-on-cash-return">Cash-on-cash return Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sell-through rate calculator work out?', 'a' => <<<'TXT'
            Sell-through rate, from Number of units sold and Number of units received. The relationship is Sell-through rate = Number of units sold ÷ Number of units received.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of units sold, Number of units received. Fill number of units sold and number of units received and leave Sell-through rate empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Sell-through rate, Number of units sold and Number of units received blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Sell-through rate = 0.1 perc. The figures come from Number of units sold as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Sell-through rate is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Number of units sold blank and the page solves for it, reporting Sell-through rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Sell-through rate at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/cash-flow-to-debt', 'name' => 'Cash flow to debt ratio Calculator'],
            ['path' => '/finance/cash-ratio', 'name' => 'Cash ratio'],
            ['path' => '/finance/cash-on-cash-return', 'name' => 'Cash-on-cash return Calculator'],
        ],
        'authors' => [],
    ],
];
