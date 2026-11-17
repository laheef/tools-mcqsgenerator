<?php

/**
 * Forward premium
 * /finance/forward-premium
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Forward premium',
    'meta' => ['title' => 'Forward premium — Formula, Steps & Examples', 'description' => 'Forward premium turns spot rate, forward rate and forward contract duration into annualized forward premium. The formula is printed in the form\'s own words.', 'h1' => 'Forward premium Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Forward premium',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'spot_rate',
                            'label' => 'Spot rate',
                            'type' => 'number',
                            'rounding' => ['standard', '4'],
                            'min' => 4,
                        ],
                        [
                            'name' => 'forward_rate',
                            'label' => 'Forward rate',
                            'type' => 'number',
                            'rounding' => ['standard', '4'],
                            'min' => 4,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'forward_premium',
                            'label' => 'Forward premium',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'forward_premium > 0', 'text' => 'The forward rate is higher than the spot rate, so there is a forward premium. '],
                                ['when' => 'forward_premium == 0', 'text' => 'The forward rate and spot rate are the same, so there is no forward premium or forward discount. '],
                                ['when' => 'forward_premium < 0', 'text' => 'The forward rate is lower than the spot rate, so there is a forward discount. '],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Annualized forward premium',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'forward_contract_duration',
                            'label' => 'Forward contract duration',
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
                            'name' => 'annualized_forward_premium',
                            'label' => 'Annualized forward premium',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
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
            'title' => 'forward_premium = (forward_rate - spot_rate) / spot_rate',
            'results' => ['forward_rate' => 'spot_rate*(forward_premium + 1)', 'forward_premium' => '(forward_rate - spot_rate)/spot_rate', 'spot_rate' => 'forward_rate/(forward_premium + 1)'],
        ],
        [
            'title' => 'annualized_forward_premium = forward_premium * (360 / forward_contract_duration)',
            'results' => ['annualized_forward_premium' => '360*forward_premium/forward_contract_duration', 'forward_premium' => '(1/360)*annualized_forward_premium*forward_contract_duration', 'forward_contract_duration' => '360*forward_premium/annualized_forward_premium'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Forward premium turns Spot rate and Forward rate into Forward premium and Forward contract duration. Nothing is looked up on this page: forward premium is computed from spot rate and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Forward premium is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Forward premium calculator works', 'html' => <<<'TXT'
            <p>Forward premium answers one question from 2 numbers, and the answer is Forward premium, Forward contract duration and Annualized forward premium.</p><p>In the form&#039;s own words, Forward premium = (Forward rate − Spot rate) ÷ Spot rate.</p><p>What comes back is Forward premium, Forward contract duration and Annualized forward premium — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Spot rate</strong> — a plain number, no unit</li><li><strong>Forward rate</strong> — a plain number, no unit</li></ul><p>What you get back is Forward premium in percent, Forward contract duration in days, Annualized forward premium in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Spot rate = 10, Forward rate = 100, Forward contract duration = 1000 days and Annualized forward premium = 10 perc; the answers are <strong>Forward premium</strong> = 9 perc.</p><ul><li><strong>Forward premium</strong> = 9 perc</li></ul><p>The line behind those figures is <strong>Forward premium</strong> = <code>(Forward rate − Spot rate) ÷ Spot rate</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Forward premium</strong> = 9 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Forward premium offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Forward premium</strong> = <code>(Forward rate − Spot rate) ÷ Spot rate</code></li><li><strong>Forward rate</strong> = <code>Spot rate × (Forward premium + 1)</code></li><li><strong>Spot rate</strong> = <code>Forward rate ÷ (Forward premium + 1)</code></li><li><strong>Annualized forward premium</strong> = <code>360 × Forward premium ÷ Forward contract duration</code></li><li><strong>Forward contract duration</strong> = <code>360 × Forward premium ÷ Annualized forward premium</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Forward premium</strong> = <code>(Forward rate − Spot rate) ÷ Spot rate</code> — the form to use when Forward rate and Spot rate are the values you have.</li><li><strong>Forward rate</strong> = <code>Spot rate × (Forward premium + 1)</code> — the form to use when Spot rate and Forward premium are the values you have.</li><li><strong>Spot rate</strong> = <code>Forward rate ÷ (Forward premium + 1)</code> — the form to use when Forward rate and Forward premium are the values you have.</li><li><strong>Annualized forward premium</strong> = <code>360 × Forward premium ÷ Forward contract duration</code> — the form to use when Forward premium and Forward contract duration are the values you have.</li><li><strong>Forward premium</strong> = <code>(1 ÷ 360) × Annualized forward premium × Forward contract duration</code> — the form to use when Annualized forward premium and Forward contract duration are the values you have.</li><li><strong>Forward contract duration</strong> = <code>360 × Forward premium ÷ Annualized forward premium</code> — the form to use when Forward premium and Annualized forward premium are the values you have.</li></ul><p>Any one of Forward premium, Forward rate and Spot rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Spot rate, from 10 to 20 — and the answers go from <strong>Forward premium</strong> 9 perc to <strong>Forward premium</strong> 4 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Forward premium, Forward contract duration and Annualized forward premium are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Spot rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Spot rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Forward rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Forward rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Spot rate to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Forward premium form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Spot rate</strong> takes a plain number with no unit attached. The page reads it when it works out Forward rate and Forward premium. Fill it from a measurement rather than a memory — Spot rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Forward rate</strong> takes a plain number with no unit attached. The page reads it when it works out Forward premium and Spot rate. Fill it from a measurement rather than a memory — Forward rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Forward premium</strong> is a percent figure and the page's own defaults put it at 9 perc. The value follows from Forward rate and Spot rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Forward contract duration</strong> is a plain number. The value follows from Forward premium and Annualized forward premium. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annualized forward premium</strong> is a percent figure. The value follows from Forward premium and Forward contract duration. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Forward premium</th></tr></thead><tbody><tr><td><strong>Spot rate</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>Forward rate</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Forward contract duration</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Annualized forward premium</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Forward rate sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. By contrast, Forward contract duration and Annualized forward premium barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Spot rate = 5, Forward rate = 50, Forward contract duration = 500 days and Annualized forward premium = 5 perc and the page reports <strong>Forward premium</strong> = 9 perc.</li><li>Feed in Spot rate = 30, Forward rate = 100, Forward contract duration = 1000 days and Annualized forward premium = 10 perc and the page reports <strong>Forward premium</strong> = 2.33 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Forward premium actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Forward premium follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Spot rate and Forward rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Spot rate and Forward rate measured, Forward premium and Forward contract duration wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/zakat">Zakat Calculator</a>, <a href="/finance/12-hour-shift">12 hour shift</a> and <a href="/finance/28-36-rule">28/36 Rule Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Forward premium calculator work out?', 'a' => <<<'TXT'
            Forward premium, Forward contract duration and Annualized forward premium, from Forward rate and Spot rate. The relationship is Forward premium = (Forward rate − Spot rate) ÷ Spot rate.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Spot rate, Forward rate. With spot rate and forward rate in place, Forward premium can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Forward premium, Forward rate, Spot rate and Annualized forward premium blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Forward premium = 9 perc. The figures come from Spot rate as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Forward premium is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Spot rate blank and the page solves for it, reporting Forward premium instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Forward premium keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/zakat', 'name' => 'Zakat Calculator'],
            ['path' => '/finance/12-hour-shift', 'name' => '12 hour shift'],
            ['path' => '/finance/28-36-rule', 'name' => '28/36 Rule Calculator'],
        ],
        'authors' => [],
    ],
];
