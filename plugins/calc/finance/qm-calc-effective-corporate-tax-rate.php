<?php

/**
 * Effective corporate tax rate
 * /finance/effective-corporate-tax-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Effective corporate tax rate',
    'meta' => ['title' => 'Effective corporate tax rate — Formula & Results', 'description' => 'Effective corporate tax rate works out effective corporate tax rate. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Effective corporate tax rate Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'earnings_before_tax',
                            'label' => 'Earnings before tax',
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
                            'name' => 'income_tax',
                            'label' => 'Income tax paid',
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
                            'name' => 'effective_corporate_tax',
                            'label' => 'Effective corporate tax rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'effective_corporate_tax = income_tax / earnings_before_tax',
            'results' => ['earnings_before_tax' => 'income_tax/effective_corporate_tax', 'income_tax' => 'earnings_before_tax*effective_corporate_tax', 'effective_corporate_tax' => 'income_tax/earnings_before_tax'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Effective corporate tax rate works out Effective corporate tax rate from Earnings before tax and Income tax paid. There is no hidden constant here: change effective corporate tax rate and earnings before tax moves with it. The main result, Effective corporate tax rate, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Effective corporate tax rate calculator works', 'html' => <<<'TXT'
            <p>Effective corporate tax rate answers one question from 2 numbers, and the answer is Effective corporate tax rate.</p><p>The relationship it solves reads Effective corporate tax rate = Income tax paid ÷ Earnings before tax.</p><p>What comes back is Effective corporate tax rate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Earnings before tax</strong> — in USD</li><li><strong>Income tax paid</strong> — in USD</li></ul><p>The result box is Effective corporate tax rate in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Earnings before tax = 10 USD and Income tax paid = 100 USD gives <strong>Effective corporate tax rate</strong> = 10 perc.</p><ul><li><strong>Effective corporate tax rate</strong> = 10 perc</li></ul><p>The line behind those figures is <strong>Effective corporate tax rate</strong> = <code>Income tax paid ÷ Earnings before tax</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Effective corporate tax rate</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Effective corporate tax rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Effective corporate tax rate</strong> = <code>Income tax paid ÷ Earnings before tax</code></li><li><strong>Earnings before tax</strong> = <code>Income tax paid ÷ Effective corporate tax rate</code></li><li><strong>Income tax paid</strong> = <code>Earnings before tax × Effective corporate tax rate</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Effective corporate tax rate</strong> = <code>Income tax paid ÷ Earnings before tax</code> — the form to use when Income tax paid and Earnings before tax are the values you have.</li><li><strong>Earnings before tax</strong> = <code>Income tax paid ÷ Effective corporate tax rate</code> — the form to use when Income tax paid and Effective corporate tax rate are the values you have.</li><li><strong>Income tax paid</strong> = <code>Earnings before tax × Effective corporate tax rate</code> — the form to use when Earnings before tax and Effective corporate tax rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Effective corporate tax rate, Earnings before tax and Income tax paid can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Earnings before tax from 10 to 20, leaving every other box alone. The panel moves from <strong>Effective corporate tax rate</strong> 10 perc to <strong>Effective corporate tax rate</strong> 5 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Effective corporate tax rate is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Earnings before tax left as a guess.</strong> Anything typed into Earnings before tax is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Income tax paid left as a guess.</strong> Anything typed into Income tax paid is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Earnings before tax and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Effective corporate tax rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Earnings before tax</strong> takes a plain number with no unit attached. It feeds Income tax paid and Effective corporate tax rate. Fill it from a measurement rather than a memory — Earnings before tax is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Income tax paid</strong> takes a plain number with no unit attached. It feeds Earnings before tax and Effective corporate tax rate. Fill it from a measurement rather than a memory — Income tax paid is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Effective corporate tax rate</strong> is a percent figure and the page's own defaults put it at 10 perc. The value follows from Income tax paid and Earnings before tax. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Effective corporate tax rate</th></tr></thead><tbody><tr><td><strong>Earnings before tax</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Income tax paid</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Income tax paid: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Earnings before tax = 5 USD and Income tax paid = 50 USD and the page reports <strong>Effective corporate tax rate</strong> = 10 perc.</li><li>Feed in Earnings before tax = 30 USD and Income tax paid = 100 USD and the page reports <strong>Effective corporate tax rate</strong> = 3.33 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Effective corporate tax rate actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Earnings before tax and Income tax paid ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Earnings before tax — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Effective corporate tax rate in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Effective corporate tax rate is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Earnings before tax and Income tax paid are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Earnings before tax and Income tax paid is what you already know and Effective corporate tax rate is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/eps-growth">Earnings per share (EPS) growth Calculator</a>, <a href="/finance/eps">Earnings per share</a> and <a href="/finance/ebit">EBIT Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Effective corporate tax rate calculator work out?', 'a' => <<<'TXT'
            Effective corporate tax rate, from Income tax paid and Earnings before tax. The relationship is Effective corporate tax rate = Income tax paid ÷ Earnings before tax.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Earnings before tax (USD), Income tax paid (USD). Enter earnings before tax and income tax paid; Effective corporate tax rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Effective corporate tax rate, Earnings before tax and Income tax paid can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Effective corporate tax rate = 10 perc. That comes from the page's own defaults, entered in Earnings before tax; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Effective corporate tax rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Earnings before tax blank and the page solves for it, reporting Effective corporate tax rate instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Effective corporate tax rate at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/eps-growth', 'name' => 'Earnings per share (EPS) growth Calculator'],
            ['path' => '/finance/eps', 'name' => 'Earnings per share'],
            ['path' => '/finance/ebit', 'name' => 'EBIT Calculator'],
        ],
        'authors' => [],
    ],
];
