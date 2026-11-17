<?php

/**
 * Liquidity coverage ratio (LCR)
 * /finance/lcr
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Liquidity coverage ratio (LCR)',
    'meta' => ['title' => 'Liquidity coverage ratio (LCR) — Formula & Results', 'description' => 'Liquidity coverage ratio (LCR) works out highly liquid assets and LCR from cash and cash equivalents, marketable securities and expected 30-days cash outflows.', 'h1' => 'Liquidity coverage ratio (LCR) Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Calculate highly liquid assets',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash',
                            'label' => 'Cash and cash equivalents',
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
                            'name' => 'marketable_securities',
                            'label' => 'Marketable securities',
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
            'title' => 'Liquidity coverage ratio (LCR)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'liquid_asset',
                            'label' => 'Highly liquid assets',
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
                            'name' => 'cash_outflows',
                            'label' => 'Expected 30-days cash outflows',
                            'type' => 'number',
                            'help' => 'This is the cash outflows in a stress scenario.',
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
                            'name' => 'lcr',
                            'label' => 'LCR',
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
                                ['when' => 'lcr >= 1', 'text' => 'The bank has enough liquid assets to cover the expected cash outflows in a stress scenario. &nbsp;'],
                                ['when' => 'lcr < 1', 'text' => 'The bank does not have enough liquid assets to cover the expected cash outflows in a stress scenario. The bank may face legal and liquidity issues. '],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'lcr = liquid_asset / cash_outflows',
            'results' => ['liquid_asset' => 'cash_outflows*lcr', 'lcr' => 'liquid_asset/cash_outflows', 'cash_outflows' => 'liquid_asset/lcr'],
        ],
        [
            'title' => 'liquid_asset = cash + marketable_securities',
            'results' => ['liquid_asset' => 'cash + marketable_securities', 'cash' => 'liquid_asset - marketable_securities', 'marketable_securities' => '-cash + liquid_asset'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Liquidity coverage ratio (LCR) turns Highly liquid assets and Expected 30-days cash outflows into Cash and cash equivalents and Marketable securities. The arithmetic is the whole method: cash and cash equivalents is worked out from highly liquid assets by one formula, applied once. Cash and cash equivalents comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Liquidity coverage ratio (LCR) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Liquidity coverage ratio (LCR): it takes 2 numbers and reports Cash and cash equivalents, Marketable securities and LCR.</p><p>The relationship it solves reads LCR = Highly liquid assets ÷ Expected 30-days cash outflows.</p><p>The answers are Cash and cash equivalents, Marketable securities and LCR; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Highly liquid assets</strong> — in USD</li><li><strong>Expected 30-days cash outflows</strong> — in USD. This is the cash outflows in a stress scenario.</li></ul><p>What you get back is Cash and cash equivalents in USD, Marketable securities in USD, LCR in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Cash and cash equivalents = 10 USD, Marketable securities = 100 USD, Expected 30-days cash outflows = 1000 USD and LCR = 10 perc gives <strong>Highly liquid assets</strong> = 10000 USD.</p><ul><li><strong>Highly liquid assets</strong> = 10000 USD</li></ul><p>That is <strong>LCR</strong> = <code>Highly liquid assets ÷ Expected 30-days cash outflows</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Highly liquid assets</strong> = 10000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: LCR offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>LCR</strong> = <code>Highly liquid assets ÷ Expected 30-days cash outflows</code></li><li><strong>Highly liquid assets</strong> = <code>Expected 30-days cash outflows × LCR</code></li><li><strong>Expected 30-days cash outflows</strong> = <code>Highly liquid assets ÷ LCR</code></li><li><strong>Cash and cash equivalents</strong> = <code>Highly liquid assets − Marketable securities</code></li><li><strong>Marketable securities</strong> = <code>− Cash and cash equivalents + Highly liquid assets</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>LCR</strong> = <code>Highly liquid assets ÷ Expected 30-days cash outflows</code> — the form to use when Highly liquid assets and Expected 30-days cash outflows are the values you have.</li><li><strong>Highly liquid assets</strong> = <code>Expected 30-days cash outflows × LCR</code> — the form to use when Expected 30-days cash outflows and LCR are the values you have.</li><li><strong>Expected 30-days cash outflows</strong> = <code>Highly liquid assets ÷ LCR</code> — the form to use when Highly liquid assets and LCR are the values you have.</li><li><strong>Highly liquid assets</strong> = <code>Cash and cash equivalents + Marketable securities</code> — the form to use when Cash and cash equivalents and Marketable securities are the values you have.</li><li><strong>Cash and cash equivalents</strong> = <code>Highly liquid assets − Marketable securities</code> — the form to use when Highly liquid assets and Marketable securities are the values you have.</li><li><strong>Marketable securities</strong> = <code>− Cash and cash equivalents + Highly liquid assets</code> — the form to use when Cash and cash equivalents and Highly liquid assets are the values you have.</li></ul><p>Any one of LCR, Highly liquid assets and Expected 30-days cash outflows can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cash and cash equivalents, from 10 to 20 — and the answers go from <strong>Highly liquid assets</strong> 10000 USD to <strong>Highly liquid assets</strong> 10000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cash and cash equivalents, Marketable securities and LCR are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Highly liquid assets left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Highly liquid assets is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Expected 30-days cash outflows left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Expected 30-days cash outflows is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Highly liquid assets to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Liquidity coverage ratio (LCR) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Highly liquid assets</strong> takes a plain number with no unit attached. The page reads it when it works out LCR, Expected 30-days cash outflows and Cash and cash equivalents. Fill it from a measurement rather than a memory — Highly liquid assets is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Expected 30-days cash outflows</strong> takes a plain number with no unit attached. This is the cash outflows in a stress scenario. The page reads it when it works out Highly liquid assets and LCR. Fill it from a measurement rather than a memory — Expected 30-days cash outflows is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Cash and cash equivalents</strong> is a plain number. It is worked out from Highly liquid assets and Marketable securities. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Marketable securities</strong> is a plain number. It is worked out from Cash and cash equivalents and Highly liquid assets. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>LCR</strong> is a percent figure. It is worked out from Highly liquid assets and Expected 30-days cash outflows. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Highly liquid assets</th></tr></thead><tbody><tr><td><strong>Cash and cash equivalents</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Marketable securities</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Expected 30-days cash outflows</strong> +10%</td><td>+10%</td></tr><tr><td><strong>LCR</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Expected 30-days cash outflows sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Cash and cash equivalents and Marketable securities barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Cash and cash equivalents = 5 USD, Marketable securities = 50 USD, Expected 30-days cash outflows = 500 USD and LCR = 5 perc and the page reports <strong>Highly liquid assets</strong> = 2500 USD.</li><li>Feed in Cash and cash equivalents = 30 USD, Marketable securities = 100 USD, Expected 30-days cash outflows = 1000 USD and LCR = 10 perc and the page reports <strong>Highly liquid assets</strong> = 10000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Liquidity coverage ratio (LCR) actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cash and cash equivalents follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Highly liquid assets and Expected 30-days cash outflows are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Highly liquid assets and Expected 30-days cash outflows measured, Cash and cash equivalents and Marketable securities wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/subscription-waste">Subscription waste Calculator</a>, <a href="/finance/sustainable-growth-rate">Sustainable growth rate Calculator</a> and <a href="/finance/swp">SWP (India) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Liquidity coverage ratio (LCR) calculator work out?', 'a' => <<<'TXT'
            Cash and cash equivalents, Marketable securities and LCR, from Highly liquid assets and Expected 30-days cash outflows. The relationship is LCR = Highly liquid assets ÷ Expected 30-days cash outflows.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Highly liquid assets (USD), Expected 30-days cash outflows (USD). With highly liquid assets and expected 30-days cash outflows in place, Cash and cash equivalents can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of LCR, Highly liquid assets, Expected 30-days cash outflows and Cash and cash equivalents blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Highly liquid assets = 10000 USD. Those are the defaults written into the form — move Highly liquid assets and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Cash and cash equivalents is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Highly liquid assets blank and the page solves for it, reporting Cash and cash equivalents instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Cash and cash equivalents keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/subscription-waste', 'name' => 'Subscription waste Calculator'],
            ['path' => '/finance/sustainable-growth-rate', 'name' => 'Sustainable growth rate Calculator'],
            ['path' => '/finance/swp', 'name' => 'SWP (India) Calculator'],
        ],
        'authors' => [],
    ],
];
