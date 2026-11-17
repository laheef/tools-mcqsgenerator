<?php

/**
 * Monthly income
 * /finance/monthly-income
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Monthly income',
    'meta' => ['title' => 'Monthly income Calculator: Free, With Steps', 'description' => 'Monthly income turns hourly, hours per week and days per week into daily and weekly. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Monthly income Calculator', 'updated' => '2025-10-08'],
    'sections' => [
        [
            'title' => 'How much you earn....',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hourly',
                            'label' => 'Hourly',
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
                            'name' => 'daily',
                            'label' => 'Daily',
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
                            'name' => 'weekly',
                            'label' => 'Weekly',
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
                            'name' => 'yearly',
                            'label' => 'Yearly',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'show_hide',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Adjust number of hours and days' => '1', '' => '0'],
                            'dataset' => 'show_hideDS',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours_per_week',
                            'label' => 'Hours per week',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '40',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_per_week',
                            'label' => 'Days per week',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Select the checkbox to adjust the numbers of hours and days you work.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly',
                            'label' => 'Monthly income',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'weekly = hourly * hours_per_week',
            'results' => ['hours_per_week' => 'weekly/hourly', 'hourly' => 'weekly/hours_per_week', 'weekly' => 'hourly*hours_per_week'],
        ],
        [
            'title' => 'daily = hourly * hours_per_week / days_per_week',
            'results' => ['daily' => 'hourly*hours_per_week/days_per_week', 'days_per_week' => 'hourly*hours_per_week/daily', 'hours_per_week' => 'daily*days_per_week/hourly', 'hourly' => 'daily*days_per_week/hours_per_week'],
        ],
        [
            'title' => 'yearly = hourly * hours_per_week * 52',
            'results' => ['hours_per_week' => '(1/52)*yearly/hourly', 'hourly' => '(1/52)*yearly/hours_per_week', 'yearly' => '52*hourly*hours_per_week'],
        ],
        [
            'title' => 'monthly = hourly * hours_per_week * 52 / 12',
            'results' => ['monthly' => '(13/3)*hourly*hours_per_week', 'hours_per_week' => '(3/13)*monthly/hourly', 'hourly' => '(3/13)*monthly/hours_per_week'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Monthly income takes Hourly and Hours per week and returns Daily and Weekly. Nothing is looked up on this page: daily is computed from hourly and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Daily is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Monthly income calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Monthly income: it takes 2 numbers and reports Daily, Weekly and Yearly.</p><p>Written with the labels from the form, Weekly = Hourly × Hours per week.</p><p>What comes back is Daily, Weekly, Yearly and Days per week — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Hourly</strong> — in USD</li><li><strong>Hours per week</strong> — a plain number, no unit</li></ul><p>The result boxes are Daily in USD, Weekly in USD, Yearly in USD, Days per week, Monthly income in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Daily takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Weekly</strong> = <code>Hourly × Hours per week</code></li><li><strong>Hours per week</strong> = <code>Weekly ÷ Hourly</code></li><li><strong>Hourly</strong> = <code>Weekly ÷ Hours per week</code></li><li><strong>Daily</strong> = <code>Hourly × Hours per week ÷ Days per week</code></li><li><strong>Days per week</strong> = <code>Hourly × Hours per week ÷ Daily</code></li><li><strong>Yearly</strong> = <code>52 × Hourly × Hours per week</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Weekly</strong> = <code>Hourly × Hours per week</code> — the form to use when Hourly and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly ÷ Hourly</code> — the form to use when Weekly and Hourly are the values you have.</li><li><strong>Hourly</strong> = <code>Weekly ÷ Hours per week</code> — the form to use when Weekly and Hours per week are the values you have.</li><li><strong>Daily</strong> = <code>Hourly × Hours per week ÷ Days per week</code> — the form to use when Hourly, Hours per week and Days per week are the values you have.</li><li><strong>Days per week</strong> = <code>Hourly × Hours per week ÷ Daily</code> — the form to use when Hourly, Hours per week and Daily are the values you have.</li><li><strong>Hours per week</strong> = <code>Daily × Days per week ÷ Hourly</code> — the form to use when Daily, Days per week and Hourly are the values you have.</li><li><strong>Hourly</strong> = <code>Daily × Days per week ÷ Hours per week</code> — the form to use when Daily, Days per week and Hours per week are the values you have.</li><li><strong>Yearly</strong> = <code>52 × Hourly × Hours per week</code> — the form to use when Hourly and Hours per week are the values you have.</li></ul><p>Any one of Weekly, Hours per week and Hourly can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Daily, Weekly and Yearly are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Hourly left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hourly is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Hours per week left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hours per week is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Hourly to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Monthly income form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Hourly</strong> takes a plain number with no unit attached. The page reads it when it works out Hours per week, Weekly and Daily. Fill it from a measurement rather than a memory — Hourly is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Hours per week</strong> takes a plain number with no unit attached. The page reads it when it works out Hourly, Weekly and Daily. Fill it from a measurement rather than a memory — Hours per week is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Daily</strong> is a plain number. It is worked out from Hourly, Hours per week and Days per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Weekly</strong> is a plain number. It is worked out from Hourly and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Yearly</strong> is a plain number. It is worked out from Hourly and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Days per week</strong> is a plain number. It is worked out from Hourly, Hours per week and Daily. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly income</strong> is a plain number. It is worked out from Hourly and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Hourly and Hours per week ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Hourly — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Daily in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Daily follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Hourly and Hours per week measured, Daily and Weekly wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/ear">EAR Calculator</a>, <a href="/finance/early-loan-payoff">Early loan payoff Calculator</a> and <a href="/finance/early-retirement">Early retirement</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Monthly income is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Monthly income calculator work out?', 'a' => 'Daily, Weekly, Yearly and Days per week, from Hourly and Hours per week. The relationship is Weekly = Hourly × Hours per week.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hourly (USD), Hours per week. Enter hourly and hours per week; Daily is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Weekly, Hours per week, Hourly and Daily blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Daily is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Hourly blank and the page solves for it, reporting Daily instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Daily at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/ear', 'name' => 'EAR Calculator'],
            ['path' => '/finance/early-loan-payoff', 'name' => 'Early loan payoff Calculator'],
            ['path' => '/finance/early-retirement', 'name' => 'Early retirement'],
        ],
        'authors' => [],
    ],
];
