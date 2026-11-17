<?php

/**
 * Net to gross
 * /finance/net-to-gross
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net to gross',
    'meta' => ['title' => 'Net to gross Calculator — Formula & Results', 'description' => 'Net to gross takes percentage tax (from net) and returns net amount and percentage tax (from gross). Every box can be solved for, not only the one in the title.', 'h1' => 'Net to gross Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net',
                            'label' => 'Net amount',
                            'type' => 'number',
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
                            'name' => 'tax_from_net',
                            'label' => 'Percentage tax (from net)',
                            'type' => 'number',
                            'help' => 'The tax rate calculated from the net value. For example, if the net price is $100 and you add an 8% tax, the gross price is $108.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_from_gross',
                            'label' => 'Percentage tax (from gross)',
                            'type' => 'number',
                            'help' => 'The tax rate calculated from the gross value. For example, a gross amount of $100 with 19% of taxation results in a net amount of $81.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gross',
                            'label' => 'Gross amount',
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
                            'name' => 'difference',
                            'label' => 'Tax amount',
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
            'title' => 'gross = net * (1+tax_from_net)',
            'results' => ['gross' => 'net*(tax_from_net + 1)', 'tax_from_net' => '(gross - net)/net', 'net' => 'gross/(tax_from_net + 1)'],
        ],
        [
            'title' => 'difference = gross - net',
            'results' => ['gross' => 'difference + net', 'difference' => 'gross - net', 'net' => '-difference + gross'],
        ],
        [
            'title' => 'net = gross * (1-tax_from_gross)',
            'results' => ['tax_from_gross' => '(gross - net)/gross', 'gross' => '-net/(tax_from_gross - 1)', 'net' => 'gross*(-tax_from_gross + 1)'],
        ],
        [
            'title' => 'tax_from_gross = 1 - 1 / (1+tax_from_net)',
            'results' => ['tax_from_gross' => 'tax_from_net/(tax_from_net + 1)', 'tax_from_net' => '-tax_from_gross/(tax_from_gross - 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Net to gross works out Percentage tax (from gross) and Gross amount from Net amount and Percentage tax (from net). Nothing is looked up on this page: percentage tax (from gross) is computed from net amount and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Percentage tax (from gross) is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Net to gross calculator works', 'html' => <<<'TXT'
            <p>The Net to gross calculator applies one relationship to 2 numbers and reports Percentage tax (from gross), Gross amount and Tax amount.</p><p>Written with the labels from the form, Gross amount = Net amount × (Percentage tax (from net) + 1).</p><p>The result panel carries Percentage tax (from gross), Gross amount and Tax amount, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Net amount</strong> — in USD</li><li><strong>Percentage tax (from net)</strong> — in percent. The tax rate calculated from the net value. For example, if the net price is $100 and you add an 8% tax, the gross price is $108.</li></ul><p>What you get back is Percentage tax (from gross) in percent, Gross amount in USD, Tax amount in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Net amount = 10 USD and Percentage tax (from net) = 100 perc; the answers are <strong>Gross amount</strong> = 1010 USD, <strong>Tax amount</strong> = 1000 USD and <strong>Percentage tax (from gross)</strong> = 0.9901 perc.</p><ul><li><strong>Gross amount</strong> = 1010 USD</li><li><strong>Tax amount</strong> = 1000 USD</li><li><strong>Percentage tax (from gross)</strong> = 0.9901 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Gross amount</strong> = <code>Net amount × (Percentage tax (from net) + 1)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Gross amount</strong> = 1010, <strong>Tax amount</strong> = 1000 and <strong>Percentage tax (from gross)</strong> = 0.9901. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Percentage tax (from gross) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Gross amount</strong> = <code>Net amount × (Percentage tax (from net) + 1)</code></li><li><strong>Percentage tax (from net)</strong> = <code>(Gross amount − Net amount) ÷ Net amount</code></li><li><strong>Net amount</strong> = <code>Gross amount ÷ (Percentage tax (from net) + 1)</code></li><li><strong>Tax amount</strong> = <code>Gross amount − Net amount</code></li><li><strong>Percentage tax (from gross)</strong> = <code>(Gross amount − Net amount) ÷ Gross amount</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Gross amount</strong> = <code>Net amount × (Percentage tax (from net) + 1)</code> — the form to use when Net amount and Percentage tax (from net) are the values you have.</li><li><strong>Percentage tax (from net)</strong> = <code>(Gross amount − Net amount) ÷ Net amount</code> — the form to use when Gross amount and Net amount are the values you have.</li><li><strong>Net amount</strong> = <code>Gross amount ÷ (Percentage tax (from net) + 1)</code> — the form to use when Gross amount and Percentage tax (from net) are the values you have.</li><li><strong>Tax amount</strong> = <code>Gross amount − Net amount</code> — the form to use when Gross amount and Net amount are the values you have.</li><li><strong>Gross amount</strong> = <code>Tax amount + Net amount</code> — the form to use when Tax amount and Net amount are the values you have.</li><li><strong>Net amount</strong> = <code>− Tax amount + Gross amount</code> — the form to use when Tax amount and Gross amount are the values you have.</li><li><strong>Net amount</strong> = <code>Gross amount × ( − Percentage tax (from gross) + 1)</code> — the form to use when Gross amount and Percentage tax (from gross) are the values you have.</li><li><strong>Percentage tax (from gross)</strong> = <code>(Gross amount − Net amount) ÷ Gross amount</code> — the form to use when Gross amount and Net amount are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Gross amount, Percentage tax (from net) and Net amount can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Net amount, from 10 to 20 — and the answers go from <strong>Gross amount</strong> 1010 USD, <strong>Tax amount</strong> 1000 USD and <strong>Percentage tax (from gross)</strong> 0.9901 perc to <strong>Gross amount</strong> 2020 USD, <strong>Tax amount</strong> 2000 USD and <strong>Percentage tax (from gross)</strong> 0.9901 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Percentage tax (from net) carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Percentage tax (from gross), Gross amount and Tax amount are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Net amount left as a guess.</strong> Anything typed into Net amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Percentage tax (from net) left as a guess.</strong> Anything typed into Percentage tax (from net) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Net amount and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Net amount</strong> takes a plain number with no unit attached. The page reads it when it works out Gross amount, Percentage tax (from net) and Tax amount. Have it to hand before you start: Net amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Percentage tax (from net)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The tax rate calculated from the net value. For example, if the net price is $100 and you add an 8% tax, the gross price is $108. The page reads it when it works out Gross amount, Net amount and Percentage tax (from gross). Have it to hand before you start: Percentage tax (from net) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Percentage tax (from gross)</strong> is a percent figure and the page's own defaults put it at 0.9901 perc. It is worked out from Gross amount and Net amount. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Gross amount</strong> is a plain number and the page's own defaults put it at 1010. It is worked out from Net amount and Percentage tax (from net). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tax amount</strong> is a plain number and the page's own defaults put it at 1000. It is worked out from Gross amount and Net amount. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Gross amount</th><th>Tax amount</th><th>Percentage tax (from gross)</th></tr></thead><tbody><tr><td><strong>Net amount</strong> +10%</td><td>+10%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Percentage tax (from net)</strong> +10%</td><td>+9.9%</td><td>+10%</td><td>+0.09%</td></tr></tbody></table><p>The steepest column belongs to Percentage tax (from net): ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Net amount = 5 USD and Percentage tax (from net) = 50 perc, the answer is <strong>Gross amount</strong> = 255 USD, <strong>Tax amount</strong> = 250 USD and <strong>Percentage tax (from gross)</strong> = 0.9804 perc.</li><li>With Net amount = 30 USD and Percentage tax (from net) = 100 perc, the answer is <strong>Gross amount</strong> = 3030 USD, <strong>Tax amount</strong> = 3000 USD and <strong>Percentage tax (from gross)</strong> = 0.9901 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Percentage tax (from gross) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Net amount and Percentage tax (from net) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Net amount and Percentage tax (from net) measured, Percentage tax (from gross) and Gross amount wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/unlevered-free-cash-flow">Unlevered free cash flow Calculator</a>, <a href="/finance/unpaid-work">Unpaid work</a> and <a href="/finance/us-income-percentile">US income percentile Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Net to gross calculator work out?', 'a' => <<<'TXT'
            Percentage tax (from gross), Gross amount and Tax amount, from Net amount and Percentage tax (from net). The relationship is Gross amount = Net amount × (Percentage tax (from net) + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Net amount (USD), Percentage tax (from net) (percent). Fill net amount and percentage tax (from net) and leave Percentage tax (from gross) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Gross amount, Percentage tax (from net), Net amount and Tax amount can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Gross amount = 1010 USD, Tax amount = 1000 USD and Percentage tax (from gross) = 0.9901 perc. Those are the defaults written into the form — move Net amount and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Percentage tax (from gross) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Net amount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Percentage tax (from gross) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/unlevered-free-cash-flow', 'name' => 'Unlevered free cash flow Calculator'],
            ['path' => '/finance/unpaid-work', 'name' => 'Unpaid work'],
            ['path' => '/finance/us-income-percentile', 'name' => 'US income percentile Calculator'],
        ],
        'authors' => [],
    ],
];
