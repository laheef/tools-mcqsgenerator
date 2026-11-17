<?php

/**
 * Google AdSense
 * /finance/google-adsense
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Google AdSense',
    'meta' => ['title' => 'Google AdSense Calculator — Formula, Units & Example', 'description' => 'Google AdSense works out ad impressions and number of clicks and reports both. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Google AdSense Calculator', 'updated' => '2024-07-21'],
    'sections' => [
        [
            'title' => 'Ad impressions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pageviews',
                            'label' => 'Number of pageviews',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ads_per_page',
                            'label' => 'Number of ads per page',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ad_impressions',
                            'label' => 'Ad impressions',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Number of clicks',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ctr',
                            'label' => 'Click through rate (CTR)',
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
                            'name' => 'num_clicks',
                            'label' => 'Number of clicks',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Google AdSense revenue',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cpc',
                            'label' => 'Cost per click (CPC)',
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
                            'name' => 'revenue',
                            'label' => 'Google AdSense revenue',
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
            'title' => 'ad_impressions = pageviews * ads_per_page',
            'results' => ['ads_per_page' => 'ad_impressions/pageviews', 'pageviews' => 'ad_impressions/ads_per_page', 'ad_impressions' => 'ads_per_page*pageviews'],
        ],
        [
            'title' => 'num_clicks = ad_impressions * ctr',
            'results' => ['num_clicks' => 'ad_impressions*ctr', 'ad_impressions' => 'num_clicks/ctr', 'ctr' => 'num_clicks/ad_impressions'],
        ],
        [
            'title' => 'revenue = num_clicks * cpc',
            'results' => ['revenue' => 'cpc*num_clicks', 'num_clicks' => 'revenue/cpc', 'cpc' => 'revenue/num_clicks'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Number of pageviews and Number of ads per page into Google AdSense and the answer comes back as Ad impressions and Click through rate (CTR). There is no hidden constant here: change ad impressions and number of pageviews moves with it. The main result, Ad impressions, is reported in days.
        TXT,
        'sections' => [
            ['title' => 'How the Google AdSense calculator works', 'html' => <<<'TXT'
            <p>The Google AdSense calculator applies one relationship to 2 numbers and reports Ad impressions, Click through rate (CTR) and Number of clicks.</p><p>Written with the labels from the form, Ad impressions = Number of ads per page × Number of pageviews.</p><p>The result panel carries Ad impressions, Click through rate (CTR), Number of clicks and Cost per click (CPC), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Number of pageviews</strong> — in days</li><li><strong>Number of ads per page</strong> — a plain number, no unit</li></ul><p>The result boxes are Ad impressions in days, Click through rate (CTR) in percent, Number of clicks in days, Cost per click (CPC) in USD, Google AdSense revenue in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Number of pageviews = 10 days, Number of ads per page = 100, Click through rate (CTR) = 1000 perc, Number of clicks = 10 days, Cost per click (CPC) = 100 USD and Google AdSense revenue = 1000 USD; the answers are <strong>Ad impressions</strong> = 1000 days.</p><ul><li><strong>Ad impressions</strong> = 1000 days</li></ul><p>That is <strong>Ad impressions</strong> = <code>Number of ads per page × Number of pageviews</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Ad impressions</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Ad impressions lists 6 options and opens on days. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Ad impressions</strong> = <code>Number of ads per page × Number of pageviews</code></li><li><strong>Number of ads per page</strong> = <code>Ad impressions ÷ Number of pageviews</code></li><li><strong>Number of pageviews</strong> = <code>Ad impressions ÷ Number of ads per page</code></li><li><strong>Number of clicks</strong> = <code>Ad impressions × Click through rate (CTR)</code></li><li><strong>Click through rate (CTR)</strong> = <code>Number of clicks ÷ Ad impressions</code></li><li><strong>Google AdSense revenue</strong> = <code>Cost per click (CPC) × Number of clicks</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Ad impressions</strong> = <code>Number of ads per page × Number of pageviews</code> — the form to use when Number of ads per page and Number of pageviews are the values you have.</li><li><strong>Number of ads per page</strong> = <code>Ad impressions ÷ Number of pageviews</code> — the form to use when Ad impressions and Number of pageviews are the values you have.</li><li><strong>Number of pageviews</strong> = <code>Ad impressions ÷ Number of ads per page</code> — the form to use when Ad impressions and Number of ads per page are the values you have.</li><li><strong>Number of clicks</strong> = <code>Ad impressions × Click through rate (CTR)</code> — the form to use when Ad impressions and Click through rate (CTR) are the values you have.</li><li><strong>Ad impressions</strong> = <code>Number of clicks ÷ Click through rate (CTR)</code> — the form to use when Number of clicks and Click through rate (CTR) are the values you have.</li><li><strong>Click through rate (CTR)</strong> = <code>Number of clicks ÷ Ad impressions</code> — the form to use when Number of clicks and Ad impressions are the values you have.</li><li><strong>Google AdSense revenue</strong> = <code>Cost per click (CPC) × Number of clicks</code> — the form to use when Cost per click (CPC) and Number of clicks are the values you have.</li><li><strong>Number of clicks</strong> = <code>Google AdSense revenue ÷ Cost per click (CPC)</code> — the form to use when Google AdSense revenue and Cost per click (CPC) are the values you have.</li></ul><p>Any one of Ad impressions, Number of ads per page and Number of pageviews can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Number of pageviews from 10 to 20, leaving every other box alone. The panel moves from <strong>Ad impressions</strong> 1000 days to <strong>Ad impressions</strong> 2000 days.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Number of pageviews carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Ad impressions, Click through rate (CTR) and Number of clicks are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Number of pageviews left as a guess.</strong> Anything typed into Number of pageviews is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of ads per page left as a guess.</strong> Anything typed into Number of ads per page is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Number of pageviews to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Google AdSense form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Number of pageviews</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. It feeds Number of ads per page and Ad impressions. Fill it from a measurement rather than a memory — Number of pageviews is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of ads per page</strong> takes a plain number with no unit attached. It feeds Number of pageviews and Ad impressions. Fill it from a measurement rather than a memory — Number of ads per page is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Ad impressions</strong> is a days figure and the page's own defaults put it at 1000 days. It is computed from Number of ads per page and Number of pageviews, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Click through rate (CTR)</strong> is a percent figure. It is computed from Number of clicks and Ad impressions, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Number of clicks</strong> is a days figure. It is computed from Ad impressions and Click through rate (CTR), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Cost per click (CPC)</strong> is a plain number. It is computed from Google AdSense revenue and Number of clicks, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Google AdSense revenue</strong> is a plain number. It is computed from Cost per click (CPC) and Number of clicks, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Ad impressions</th></tr></thead><tbody><tr><td><strong>Number of pageviews</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of ads per page</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Click through rate (CTR)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of clicks</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Cost per click (CPC)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Google AdSense revenue</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Number of ads per page: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Click through rate (CTR), Number of clicks and Cost per click (CPC) barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Google AdSense actually offers.</p><ul><li><strong>days</strong> — opens in <em>days</em>, and the chip also carries hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Ad impressions is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover days and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Number of pageviews and Number of ads per page and the number you are missing is Ad impressions and Click through rate (CTR).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/rental-property">Rental property</a>, <a href="/finance/reserve-ratio">Reserve ratio Calculator</a> and <a href="/finance/residual-income">Residual income</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Google AdSense calculator work out?', 'a' => <<<'TXT'
            Ad impressions, Click through rate (CTR), Number of clicks and Cost per click (CPC), from Number of ads per page and Number of pageviews. The relationship is Ad impressions = Number of ads per page × Number of pageviews.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of pageviews (days), Number of ads per page. Fill number of pageviews and number of ads per page and leave Ad impressions empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Ad impressions, Number of ads per page, Number of pageviews and Number of clicks blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Ad impressions = 1000 days. That comes from the page\'s own defaults, entered in Number of pageviews; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Ad impressions is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Number of pageviews blank and the page solves for it, reporting Ad impressions instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Ad impressions keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/rental-property', 'name' => 'Rental property'],
            ['path' => '/finance/reserve-ratio', 'name' => 'Reserve ratio Calculator'],
            ['path' => '/finance/residual-income', 'name' => 'Residual income'],
        ],
        'authors' => [],
    ],
];
