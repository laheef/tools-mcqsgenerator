<?php

/**
 * Website ad revenue
 * /finance/website-ad-revenue
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Website ad revenue',
    'meta' => ['title' => 'Website ad revenue: Formula, Steps & Results', 'description' => 'Website ad revenue turns visits and page views per visit into page views. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Website ad revenue Calculator', 'updated' => '2026-09-28'],
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
                            'label' => 'Visits',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pageviews_per_visit',
                            'label' => 'Page views per visit',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pageviews',
                            'label' => 'Page views',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'page_RPM',
                            'label' => 'Page RPM',
                            'type' => 'number',
                            'help' => 'Page revenue per thousand impressions. How much ALL of your ads earn per 1000 pageviews.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
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
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'visits * pageviews_per_visit = pageviews',
            'results' => ['pageviews_per_visit' => 'pageviews/visits', 'visits' => 'pageviews/pageviews_per_visit', 'pageviews' => 'pageviews_per_visit*visits'],
        ],
        [
            'title' => 'pageviews * page_RPM / 1000 = revenue',
            'results' => ['page_RPM' => '1000*revenue/pageviews', 'revenue' => '(1/1000)*page_RPM*pageviews', 'pageviews' => '1000*revenue/page_RPM'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Website ad revenue turns Visits and Page views into Page views per visit and Page RPM. The arithmetic is the whole method: page views per visit is worked out from visits by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Website ad revenue calculator works', 'html' => <<<'TXT'
            <p>The Website ad revenue calculator applies one relationship to 2 numbers and reports Page views per visit, Page RPM and Revenue.</p><p>The relationship it solves reads Page views per visit = Page views ÷ Visits.</p><p>What comes back is Page views per visit, Page RPM and Revenue — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Visits</strong> — a plain number, no unit</li><li><strong>Page views</strong> — a plain number, no unit</li></ul><p>The result boxes are Page views per visit, Page RPM in USD, Revenue in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Visits = 10, Page views = 100, Page RPM = 1000 USD and Revenue = 10 USD gives <strong>Page views per visit</strong> = 10.</p><ul><li><strong>Page views per visit</strong> = 10</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Page views per visit</strong> = <code>Page views ÷ Visits</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Page views per visit</strong> = 10 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Page views per visit takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Page views per visit</strong> = <code>Page views ÷ Visits</code></li><li><strong>Visits</strong> = <code>Page views ÷ Page views per visit</code></li><li><strong>Page views</strong> = <code>Page views per visit × Visits</code></li><li><strong>Page RPM</strong> = <code>1000 × Revenue ÷ Page views</code></li><li><strong>Revenue</strong> = <code>(1 ÷ 1000) × Page RPM × Page views</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Page views per visit</strong> = <code>Page views ÷ Visits</code> — the form to use when Page views and Visits are the values you have.</li><li><strong>Visits</strong> = <code>Page views ÷ Page views per visit</code> — the form to use when Page views and Page views per visit are the values you have.</li><li><strong>Page views</strong> = <code>Page views per visit × Visits</code> — the form to use when Page views per visit and Visits are the values you have.</li><li><strong>Page RPM</strong> = <code>1000 × Revenue ÷ Page views</code> — the form to use when Revenue and Page views are the values you have.</li><li><strong>Revenue</strong> = <code>(1 ÷ 1000) × Page RPM × Page views</code> — the form to use when Page RPM and Page views are the values you have.</li><li><strong>Page views</strong> = <code>1000 × Revenue ÷ Page RPM</code> — the form to use when Revenue and Page RPM are the values you have.</li></ul><p>Any one of Page views per visit, Visits and Page views can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Visits, from 10 to 20 — and the answers go from <strong>Page views per visit</strong> 10 to <strong>Page views per visit</strong> 5.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Page views per visit, Page RPM and Revenue are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Visits left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Visits is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Page views left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Page views is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Visits and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Visits</strong> takes a plain number with no unit attached. The page reads it when it works out Page views per visit and Page views. Have it to hand before you start: Visits is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Page views</strong> takes a plain number with no unit attached. The page reads it when it works out Page views per visit, Visits and Page RPM. Have it to hand before you start: Page views is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Page views per visit</strong> is a plain number and the page's own defaults put it at 10. It is computed from Page views and Visits, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Page RPM</strong> is a plain number. It is computed from Revenue and Page views, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Revenue</strong> is a plain number. It is computed from Page RPM and Page views, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Page views per visit</th></tr></thead><tbody><tr><td><strong>Visits</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Page views</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Page RPM</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Revenue</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Page views sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Page RPM and Revenue barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Visits = 5, Page views = 50, Page RPM = 500 USD and Revenue = 5 USD, the answer is <strong>Page views per visit</strong> = 10.</li><li>With Visits = 30, Page views = 100, Page RPM = 1000 USD and Revenue = 10 USD, the answer is <strong>Page views per visit</strong> = 3.33.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Visits and Page views. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Visits into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Page views per visit with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Page views per visit follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Visits and Page views and the number you are missing is Page views per visit and Page RPM.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/mva">Market value added (MVA) Calculator</a>, <a href="/finance/margin-2-sets">Markup and margin (2 sets) Calculator</a> and <a href="/finance/markup">Markup Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Website ad revenue calculator work out?', 'a' => 'Page views per visit, Page RPM and Revenue, from Page views and Visits. The relationship is Page views per visit = Page views ÷ Visits.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Visits, Page views. Fill visits and page views and leave Page views per visit empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Page views per visit, Visits, Page views and Page RPM blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Page views per visit = 10. Those are the defaults written into the form — move Visits and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Page views per visit is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Visits left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Page views per visit at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/mva', 'name' => 'Market value added (MVA) Calculator'],
            ['path' => '/finance/margin-2-sets', 'name' => 'Markup and margin (2 sets) Calculator'],
            ['path' => '/finance/markup', 'name' => 'Markup Calculator'],
        ],
        'authors' => [],
    ],
];
