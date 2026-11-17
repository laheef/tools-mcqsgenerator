<?php

/**
 * Annualized rate of return
 * /finance/annualized-rate-of-return
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Annualized rate of return',
    'meta' => ['title' => 'Annualized rate of return — Formula & Results', 'description' => 'Enter period and period rate and get annualized rate of return back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Annualized rate of return Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'period',
                            'label' => 'Period',
                            'type' => 'select',
                            'options' => [
                                'Annual' => '1',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52',
                                'Daily' => '365',
                            ],
                            'dataset' => 'period',
                            'default' => 'Annual',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'period_rate',
                            'label' => 'Period rate',
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
                            'name' => 'annualized_rate_of_return',
                            'label' => 'Annualized rate of return',
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
            'title' => 'annualized_rate_of_return = ((1 + ((period_rate * period) / period)) ^ period) - 1 ',
            'results' => ['period' => 'log(annualized_rate_of_return + 1)/log(period_rate + 1)', 'period_rate' => 'pow(annualized_rate_of_return + 1, 1/period) - 1', 'annualized_rate_of_return' => 'pow(period_rate + 1, period) - 1'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Annualized rate of return works out Annualized rate of return from Period and Period rate. There is no hidden constant here: change annualized rate of return and period moves with it. The main result, Annualized rate of return, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Annualized rate of return calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Annualized rate of return: it takes 2 numbers and reports Annualized rate of return.</p><p>Written with the labels from the form, Annualized rate of return = (Period rate + 1)^(Period) − 1.</p><p>The answers are Annualized rate of return; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Period</strong> — a plain number, no unit</li><li><strong>Period rate</strong> — in percent</li></ul><p>The result box is Annualized rate of return in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Period = 1 and Period rate = 10 perc gives <strong>Annualized rate of return</strong> = 10 perc.</p><ul><li><strong>Annualized rate of return</strong> = 10 perc</li></ul><p>That is <strong>Annualized rate of return</strong> = <code>(Period rate + 1)^(Period) − 1</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Annualized rate of return</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Annualized rate of return lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Annualized rate of return</strong> = <code>(Period rate + 1)^(Period) − 1</code></li><li><strong>Period</strong> = <code>ln(Annualized rate of return + 1) ÷ ln(Period rate + 1)</code></li><li><strong>Period rate</strong> = <code>(Annualized rate of return + 1)^(1 ÷ Period) − 1</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Annualized rate of return</strong> = <code>(Period rate + 1)^(Period) − 1</code> — the form to use when Period rate and Period are the values you have.</li><li><strong>Period</strong> = <code>ln(Annualized rate of return + 1) ÷ ln(Period rate + 1)</code> — the form to use when Annualized rate of return and Period rate are the values you have.</li><li><strong>Period rate</strong> = <code>(Annualized rate of return + 1)^(1 ÷ Period) − 1</code> — the form to use when Annualized rate of return and Period are the values you have.</li></ul><p>Any one of Annualized rate of return, Period and Period rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Period from 1 to 2, leaving every other box alone. The panel moves from <strong>Annualized rate of return</strong> 10 perc to <strong>Annualized rate of return</strong> 120 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Period rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Annualized rate of return is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Period left as a guess.</strong> Anything typed into Period is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Period rate left as a guess.</strong> Anything typed into Period rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Period is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Annualized rate of return form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Period</strong> takes a plain number with no unit attached. The page reads it when it works out Period rate and Annualized rate of return. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Period is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Period rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Period and Annualized rate of return. Fill it from a measurement rather than a memory — Period rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Annualized rate of return</strong> is a percent figure and the page's own defaults put it at 10 perc. The value follows from Period rate and Period. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Annualized rate of return</th></tr></thead><tbody><tr><td><strong>Period</strong> +10%</td><td>+29.81%</td></tr><tr><td><strong>Period rate</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Period: ten per cent there moves an answer by about 29.8 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Period = 0.5 and Period rate = 5 perc and the page reports <strong>Annualized rate of return</strong> = 1.45 perc.</li><li>Feed in Period = 3 and Period rate = 10 perc and the page reports <strong>Annualized rate of return</strong> = 1330 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Annualized rate of return actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Period and Period rate ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Period — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Annualized rate of return in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Annualized rate of return is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Period and Period rate measured, Annualized rate of return wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/dividend-yield">Dividend yield Calculator</a>, <a href="/finance/double-discount">Double discount Calculator</a> and <a href="/finance/down-payment">Down payment</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Annualized rate of return calculator work out?', 'a' => 'Annualized rate of return, from Period rate and Period. The relationship is Annualized rate of return = (Period rate + 1)^(Period) − 1.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Period, Period rate (percent). Enter period and period rate; Annualized rate of return is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Annualized rate of return, Period and Period rate blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Annualized rate of return = 10 perc. The figures come from Period as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Annualized rate of return is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Period blank and the page solves for it, reporting Annualized rate of return instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Annualized rate of return at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/dividend-yield', 'name' => 'Dividend yield Calculator'],
            ['path' => '/finance/double-discount', 'name' => 'Double discount Calculator'],
            ['path' => '/finance/down-payment', 'name' => 'Down payment'],
        ],
        'authors' => [],
    ],
];
