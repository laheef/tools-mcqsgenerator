<?php

/**
 * YouTube money
 * /finance/youtube-money
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'YouTube money',
    'meta' => ['title' => 'YouTube money Calculator — Formula & Results', 'description' => 'YouTube money turns RPM and number of views into gross revenue and net revenue. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'YouTube money Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'RPM',
                            'label' => 'RPM',
                            'type' => 'number',
                            'help' => 'Revenue per thousand impressions.',
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
                            'name' => 'number_of_views',
                            'label' => 'Number of views',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gross_revenue',
                            'label' => 'Gross revenue',
                            'type' => 'number',
                            'help' => 'The total amount of money, before including YouTube\'s 45% cut.',
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
                            'name' => 'net_revenue',
                            'label' => 'Net revenue',
                            'type' => 'number',
                            'help' => 'The amount of money you actually get, after including YouTube\'s cut.',
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
            'title' => 'gross_revenue = RPM * number_of_views  / 1000',
            'results' => ['number_of_views' => '1000*gross_revenue/RPM', 'gross_revenue' => '(1/1000)*RPM*number_of_views', 'RPM' => '1000*gross_revenue/number_of_views'],
        ],
        [
            'title' => 'net_revenue = 55/100 * gross_revenue',
            'results' => ['gross_revenue' => '(20/11)*net_revenue', 'net_revenue' => '(11/20)*gross_revenue'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        YouTube money takes RPM and Number of views and returns Gross revenue and Net revenue. There is no hidden constant here: change gross revenue and RPM moves with it. The main result, Gross revenue, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the YouTube money calculator works', 'html' => <<<'TXT'
            <p>The YouTube money calculator applies one relationship to 2 numbers and reports Gross revenue and Net revenue.</p><p>Written with the labels from the form, Gross revenue = (1 ÷ 1000) × RPM × Number of views.</p><p>What comes back is Gross revenue and Net revenue — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>RPM</strong> — in USD. Revenue per thousand impressions.</li><li><strong>Number of views</strong> — in days</li></ul><p>The answers come back as Gross revenue in USD, Net revenue in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, RPM = 10 USD and Number of views = 100 days; the answers are <strong>Gross revenue</strong> = 1 USD and <strong>Net revenue</strong> = 0.55 USD.</p><ul><li><strong>Gross revenue</strong> = 1 USD</li><li><strong>Net revenue</strong> = 0.55 USD</li></ul><p>That is <strong>Gross revenue</strong> = <code>(1 ÷ 1000) × RPM × Number of views</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Gross revenue</strong> = 1 and <strong>Net revenue</strong> = 0.55 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Number of views offers 6 units and opens on days, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Gross revenue</strong> = <code>(1 ÷ 1000) × RPM × Number of views</code></li><li><strong>Number of views</strong> = <code>1000 × Gross revenue ÷ RPM</code></li><li><strong>RPM</strong> = <code>1000 × Gross revenue ÷ Number of views</code></li><li><strong>Net revenue</strong> = <code>(11 ÷ 20) × Gross revenue</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Gross revenue</strong> = <code>(1 ÷ 1000) × RPM × Number of views</code> — the form to use when RPM and Number of views are the values you have.</li><li><strong>Number of views</strong> = <code>1000 × Gross revenue ÷ RPM</code> — the form to use when Gross revenue and RPM are the values you have.</li><li><strong>RPM</strong> = <code>1000 × Gross revenue ÷ Number of views</code> — the form to use when Gross revenue and Number of views are the values you have.</li><li><strong>Net revenue</strong> = <code>(11 ÷ 20) × Gross revenue</code> — the form to use when Gross revenue are the values you have.</li><li><strong>Gross revenue</strong> = <code>(20 ÷ 11) × Net revenue</code> — the form to use when Net revenue are the values you have.</li></ul><p>Any one of Gross revenue, Number of views and RPM can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double RPM from 10 to 20, leaving every other box alone. The panel moves from <strong>Gross revenue</strong> 1 USD and <strong>Net revenue</strong> 0.55 USD to <strong>Gross revenue</strong> 2 USD and <strong>Net revenue</strong> 1.1 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Number of views is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gross revenue and Net revenue are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>RPM left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If RPM is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of views left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of views is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert RPM to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the YouTube money form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>RPM</strong> takes a plain number with no unit attached. Revenue per thousand impressions. The page reads it when it works out Number of views and Gross revenue. Fill it from a measurement rather than a memory — RPM is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of views</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. The page reads it when it works out Gross revenue and RPM. Fill it from a measurement rather than a memory — Number of views is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Gross revenue</strong> is a plain number and the page's own defaults put it at 1. The value follows from RPM and Number of views. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Net revenue</strong> is a plain number and the page's own defaults put it at 0.55. The value follows from Gross revenue. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Gross revenue</th><th>Net revenue</th></tr></thead><tbody><tr><td><strong>RPM</strong> +10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Number of views</strong> +10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Number of views sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in RPM = 5 USD and Number of views = 50 days and the page reports <strong>Gross revenue</strong> = 0.25 USD and <strong>Net revenue</strong> = 0.1375 USD.</li><li>Feed in RPM = 30 USD and Number of views = 100 days and the page reports <strong>Gross revenue</strong> = 3 USD and <strong>Net revenue</strong> = 1.65 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on YouTube money actually offers.</p><ul><li><strong>days</strong> — opens in <em>days</em>, and the chip also carries hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Gross revenue follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are days and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes RPM and Number of views are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are RPM and Number of views and the number you are missing is Gross revenue and Net revenue.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/capm">CAPM (capital asset pricing model) Calculator</a>, <a href="/finance/car-affordability">Car affordability Calculator</a> and <a href="/finance/car-depreciation">Car depreciation Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the YouTube money calculator work out?', 'a' => 'Gross revenue and Net revenue, from RPM and Number of views. The relationship is Gross revenue = (1 ÷ 1000) × RPM × Number of views.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'RPM (USD), Number of views (days). Fill RPM and number of views and leave Gross revenue empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Gross revenue, Number of views, RPM and Net revenue blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Gross revenue = 1 USD and Net revenue = 0.55 USD. That comes from the page\'s own defaults, entered in RPM; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Gross revenue is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave RPM blank and the page solves for it, reporting Gross revenue instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Gross revenue keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/capm', 'name' => 'CAPM (capital asset pricing model) Calculator'],
            ['path' => '/finance/car-affordability', 'name' => 'Car affordability Calculator'],
            ['path' => '/finance/car-depreciation', 'name' => 'Car depreciation Calculator'],
        ],
        'authors' => [],
    ],
];
