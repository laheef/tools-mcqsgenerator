<?php

/**
 * Cross exchange rate
 * /finance/cross-exchange-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cross exchange rate',
    'meta' => ['title' => 'Cross exchange rate: Formula, Steps & Results', 'description' => 'Cross exchange rate reports exchange rate A/C, Exchange rate B/C and Cross rate A/B. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Cross exchange rate Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'First currency pair',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'exchange_rateAC',
                            'label' => 'Exchange rate A/C',
                            'type' => 'number',
                            'help' => 'The currency A to currency C exchange rate.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'exchange_rateCA',
                            'label' => 'or exchange rate C/A',
                            'type' => 'number',
                            'help' => 'The currency C to currency A exchange rate.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Second currency pair',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'exchange_rateBC',
                            'label' => 'Exchange rate B/C',
                            'type' => 'number',
                            'help' => 'The currency B to currency C exchange rate.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'exchange_rateCB',
                            'label' => 'or exchange rate C/B',
                            'type' => 'number',
                            'help' => 'The currency B to currency C exchange rate.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Cross rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cross_rateAB',
                            'label' => 'Cross rate A/B',
                            'type' => 'number',
                            'help' => 'The currency A to currency B exchange rate.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cross_rateBA',
                            'label' => 'or cross rate B/A',
                            'type' => 'number',
                            'help' => 'The currency B to currency A exchange rate.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Capital letters "A", "B", "C" each represent different currencies. A currency pair can be expressed in two forms, but you only need to enter one for each pair.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'cross_rateAB = exchange_rateAC / exchange_rateBC',
            'results' => ['exchange_rateAC' => 'cross_rateAB*exchange_rateBC', 'cross_rateAB' => 'exchange_rateAC/exchange_rateBC', 'exchange_rateBC' => 'exchange_rateAC/cross_rateAB'],
        ],
        [
            'title' => 'exchange_rateAC = 1 / exchange_rateCA',
            'results' => ['exchange_rateAC' => '1/exchange_rateCA', 'exchange_rateCA' => '1/exchange_rateAC'],
        ],
        [
            'title' => 'exchange_rateBC = 1 / exchange_rateCB',
            'results' => ['exchange_rateBC' => '1/exchange_rateCB', 'exchange_rateCB' => '1/exchange_rateBC'],
        ],
        [
            'title' => 'cross_rateAB = 1 / cross_rateBA',
            'results' => ['cross_rateAB' => '1/cross_rateBA', 'cross_rateBA' => '1/cross_rateAB'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Cross exchange rate works out or exchange rate C/A and or exchange rate C/B from Exchange rate A/C and Exchange rate B/C. The arithmetic is the whole method: or exchange rate C/A is worked out from exchange rate A/C by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Cross exchange rate calculator works', 'html' => <<<'TXT'
            <p>The Cross exchange rate calculator applies one relationship to 2 numbers and reports or exchange rate C/A, or exchange rate C/B and Cross rate A/B.</p><p>Written with the labels from the form, Cross rate A/B = Exchange rate A/C ÷ Exchange rate B/C.</p><p>The answers are or exchange rate C/A, or exchange rate C/B, Cross rate A/B and or cross rate B/A; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Exchange rate A/C</strong> — a plain number, no unit. The currency A to currency C exchange rate.</li><li><strong>Exchange rate B/C</strong> — a plain number, no unit. The currency B to currency C exchange rate.</li></ul><p>What you get back is or exchange rate C/A, or exchange rate C/B, Cross rate A/B, or cross rate B/A, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Exchange rate B/C = 10 and Cross rate A/B = 100 — through the same formula and the panel reports <strong>Exchange rate A/C</strong> = 1000, <strong>or exchange rate C/A</strong> = 0.001, <strong>or exchange rate C/B</strong> = 0.1 and <strong>or cross rate B/A</strong> = 0.01.</p><ul><li><strong>Exchange rate A/C</strong> = 1000</li><li><strong>or exchange rate C/A</strong> = 0.001</li><li><strong>or exchange rate C/B</strong> = 0.1</li><li><strong>or cross rate B/A</strong> = 0.01</li></ul><p>That is <strong>Cross rate A/B</strong> = <code>Exchange rate A/C ÷ Exchange rate B/C</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Exchange rate A/C</strong> = 1000, <strong>or exchange rate C/A</strong> = 0.001, <strong>or exchange rate C/B</strong> = 0.1 and <strong>or cross rate B/A</strong> = 0.01. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as or exchange rate C/A is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cross rate A/B</strong> = <code>Exchange rate A/C ÷ Exchange rate B/C</code></li><li><strong>Exchange rate A/C</strong> = <code>Cross rate A/B × Exchange rate B/C</code></li><li><strong>Exchange rate B/C</strong> = <code>Exchange rate A/C ÷ Cross rate A/B</code></li><li><strong>or exchange rate C/A</strong> = <code>1 ÷ Exchange rate A/C</code></li><li><strong>or exchange rate C/B</strong> = <code>1 ÷ Exchange rate B/C</code></li><li><strong>or cross rate B/A</strong> = <code>1 ÷ Cross rate A/B</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Cross rate A/B</strong> = <code>Exchange rate A/C ÷ Exchange rate B/C</code> — the form to use when Exchange rate A/C and Exchange rate B/C are the values you have.</li><li><strong>Exchange rate A/C</strong> = <code>Cross rate A/B × Exchange rate B/C</code> — the form to use when Cross rate A/B and Exchange rate B/C are the values you have.</li><li><strong>Exchange rate B/C</strong> = <code>Exchange rate A/C ÷ Cross rate A/B</code> — the form to use when Exchange rate A/C and Cross rate A/B are the values you have.</li><li><strong>Exchange rate A/C</strong> = <code>1 ÷ or exchange rate C/A</code> — the form to use when or exchange rate C/A are the values you have.</li><li><strong>or exchange rate C/A</strong> = <code>1 ÷ Exchange rate A/C</code> — the form to use when Exchange rate A/C are the values you have.</li><li><strong>Exchange rate B/C</strong> = <code>1 ÷ or exchange rate C/B</code> — the form to use when or exchange rate C/B are the values you have.</li><li><strong>or exchange rate C/B</strong> = <code>1 ÷ Exchange rate B/C</code> — the form to use when Exchange rate B/C are the values you have.</li><li><strong>Cross rate A/B</strong> = <code>1 ÷ or cross rate B/A</code> — the form to use when or cross rate B/A are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cross rate A/B, Exchange rate A/C and Exchange rate B/C can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Exchange rate B/C, from 10 to 20 — and the answers go from <strong>Exchange rate A/C</strong> 1000, <strong>or exchange rate C/A</strong> 0.001, <strong>or exchange rate C/B</strong> 0.1 and <strong>or cross rate B/A</strong> 0.01 to <strong>Exchange rate A/C</strong> 2000, <strong>or exchange rate C/A</strong> 5.000e-4, <strong>or exchange rate C/B</strong> 0.05 and <strong>or cross rate B/A</strong> 0.01.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> or exchange rate C/A, or exchange rate C/B and Cross rate A/B are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Exchange rate A/C left as a guess.</strong> Anything typed into Exchange rate A/C is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Exchange rate B/C left as a guess.</strong> Anything typed into Exchange rate B/C is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Exchange rate A/C and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cross exchange rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Exchange rate A/C</strong> takes a plain number with no unit attached. The currency A to currency C exchange rate. The page reads it when it works out Cross rate A/B, Exchange rate B/C and or exchange rate C/A. Fill it from a measurement rather than a memory — Exchange rate A/C is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Exchange rate B/C</strong> takes a plain number with no unit attached. The currency B to currency C exchange rate. The page reads it when it works out Exchange rate A/C, Cross rate A/B and or exchange rate C/B. Fill it from a measurement rather than a memory — Exchange rate B/C is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>or exchange rate C/A</strong> is a plain number and the page's own defaults put it at 0.001. The value follows from Exchange rate A/C. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>or exchange rate C/B</strong> is a plain number and the page's own defaults put it at 0.1. The value follows from Exchange rate B/C. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cross rate A/B</strong> is a plain number. The value follows from Exchange rate A/C and Exchange rate B/C. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>or cross rate B/A</strong> is a plain number and the page's own defaults put it at 0.01. The value follows from Cross rate A/B. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Exchange rate A/C</th><th>or exchange rate C/A</th><th>or exchange rate C/B</th><th>or cross rate B/A</th></tr></thead><tbody><tr><td><strong>Exchange rate B/C</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>-9.09%</td><td>+0%</td></tr><tr><td><strong>Cross rate A/B</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>+0%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Cross rate A/B: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Exchange rate B/C = 5 and Cross rate A/B = 50 and the page reports <strong>Exchange rate A/C</strong> = 250, <strong>or exchange rate C/A</strong> = 0.004, <strong>or exchange rate C/B</strong> = 0.2 and <strong>or cross rate B/A</strong> = 0.02.</li><li>Feed in Exchange rate B/C = 30 and Cross rate A/B = 100 and the page reports <strong>Exchange rate A/C</strong> = 3000, <strong>or exchange rate C/A</strong> = 3.333e-4, <strong>or exchange rate C/B</strong> = 0.0333 and <strong>or cross rate B/A</strong> = 0.01.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind or exchange rate C/A is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Exchange rate A/C and Exchange rate B/C are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Exchange rate A/C and Exchange rate B/C and the number you are missing is or exchange rate C/A and or exchange rate C/B.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/nav">Net asset value (NAV)</a>, <a href="/finance/net-debt">Net debt Calculator</a> and <a href="/finance/net-effective-rent">Net effective rent Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cross exchange rate calculator work out?', 'a' => <<<'TXT'
            or exchange rate C/A, or exchange rate C/B, Cross rate A/B and or cross rate B/A, from Exchange rate A/C and Exchange rate B/C. The relationship is Cross rate A/B = Exchange rate A/C ÷ Exchange rate B/C.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Exchange rate A/C, Exchange rate B/C. Enter exchange rate A/C and exchange rate B/C; or exchange rate C/A is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Cross rate A/B, Exchange rate A/C, Exchange rate B/C and or exchange rate C/A can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Exchange rate A/C = 1000, or exchange rate C/A = 0.001, or exchange rate C/B = 0.1 and or cross rate B/A = 0.01. That comes from the page's own defaults, entered in Exchange rate A/C; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            or exchange rate C/A is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Exchange rate A/C blank and the page solves for it, reporting or exchange rate C/A instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of or exchange rate C/A keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/nav', 'name' => 'Net asset value (NAV)'],
            ['path' => '/finance/net-debt', 'name' => 'Net debt Calculator'],
            ['path' => '/finance/net-effective-rent', 'name' => 'Net effective rent Calculator'],
        ],
        'authors' => [],
    ],
];
