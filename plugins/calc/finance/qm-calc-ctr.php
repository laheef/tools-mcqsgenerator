<?php

/**
 * CTR
 * /finance/ctr
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CTR',
    'meta' => ['title' => 'CTR Calculator — Free, With Worked Examples', 'description' => 'CTR takes ad impressions and number of clicks and returns click through rate (CTR). Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'CTR Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ad_impressions',
                            'label' => 'Ad impressions',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'clicks',
                            'label' => 'Number of clicks',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'click_through_rate',
                            'label' => 'Click through rate (CTR)',
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
            'title' => 'click_through_rate = clicks / ad_impressions',
            'results' => ['clicks' => 'ad_impressions*click_through_rate', 'click_through_rate' => 'clicks/ad_impressions', 'ad_impressions' => 'clicks/click_through_rate'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        CTR works out Click through rate (CTR) from Ad impressions and Number of clicks. There is no hidden constant here: change click through rate (CTR) and ad impressions moves with it. The main result, Click through rate (CTR), is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the CTR calculator works', 'html' => <<<'TXT'
            <p>The CTR calculator applies one relationship to 2 numbers and reports Click through rate (CTR).</p><p>Written with the labels from the form, Click through rate (CTR) = Number of clicks ÷ Ad impressions.</p><p>The answers are Click through rate (CTR); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Ad impressions</strong> — a plain number, no unit</li><li><strong>Number of clicks</strong> — a plain number, no unit</li></ul><p>The result box is Click through rate (CTR) in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Ad impressions = 10 and Number of clicks = 100; the answers are <strong>Click through rate (CTR)</strong> = 10 perc.</p><ul><li><strong>Click through rate (CTR)</strong> = 10 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Click through rate (CTR)</strong> = <code>Number of clicks ÷ Ad impressions</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Click through rate (CTR)</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Click through rate (CTR) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Click through rate (CTR)</strong> = <code>Number of clicks ÷ Ad impressions</code></li><li><strong>Number of clicks</strong> = <code>Ad impressions × Click through rate (CTR)</code></li><li><strong>Ad impressions</strong> = <code>Number of clicks ÷ Click through rate (CTR)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Click through rate (CTR)</strong> = <code>Number of clicks ÷ Ad impressions</code> — the form to use when Number of clicks and Ad impressions are the values you have.</li><li><strong>Number of clicks</strong> = <code>Ad impressions × Click through rate (CTR)</code> — the form to use when Ad impressions and Click through rate (CTR) are the values you have.</li><li><strong>Ad impressions</strong> = <code>Number of clicks ÷ Click through rate (CTR)</code> — the form to use when Number of clicks and Click through rate (CTR) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Click through rate (CTR), Number of clicks and Ad impressions can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Ad impressions from 10 to 20, leaving every other box alone. The panel moves from <strong>Click through rate (CTR)</strong> 10 perc to <strong>Click through rate (CTR)</strong> 5 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Click through rate (CTR) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Ad impressions left as a guess.</strong> Anything typed into Ad impressions is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of clicks left as a guess.</strong> Anything typed into Number of clicks is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Ad impressions is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the CTR form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Ad impressions</strong> takes a plain number with no unit attached. The page reads it when it works out Number of clicks and Click through rate (CTR). Fill it from a measurement rather than a memory — Ad impressions is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of clicks</strong> takes a plain number with no unit attached. The page reads it when it works out Click through rate (CTR) and Ad impressions. Fill it from a measurement rather than a memory — Number of clicks is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Click through rate (CTR)</strong> is a percent figure and the page's own defaults put it at 10 perc. It is worked out from Number of clicks and Ad impressions. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Click through rate (CTR)</th></tr></thead><tbody><tr><td><strong>Ad impressions</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Number of clicks</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Number of clicks: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Ad impressions = 5 and Number of clicks = 50 and the page reports <strong>Click through rate (CTR)</strong> = 10 perc.</li><li>Feed in Ad impressions = 30 and Number of clicks = 100 and the page reports <strong>Click through rate (CTR)</strong> = 3.33 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on CTR actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Ad impressions and Number of clicks ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Ad impressions — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Click through rate (CTR) in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Click through rate (CTR) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Ad impressions and Number of clicks are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Ad impressions and Number of clicks measured, Click through rate (CTR) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/arv">ARV Calculator</a>, <a href="/finance/attrition-rate">Attrition rate</a> and <a href="/finance/auto-loan">Auto loan</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from CTR is a number to act on, so the useful question is what to do with Click through rate (CTR) (perc) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Ad impressions and Number of clicks alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CTR calculator work out?', 'a' => 'Click through rate (CTR), from Number of clicks and Ad impressions. The relationship is Click through rate (CTR) = Number of clicks ÷ Ad impressions.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Ad impressions, Number of clicks. Fill ad impressions and number of clicks and leave Click through rate (CTR) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Click through rate (CTR), Number of clicks and Ad impressions can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Click through rate (CTR) = 10 perc. That comes from the page\'s own defaults, entered in Ad impressions; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Click through rate (CTR) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Ad impressions blank and the page solves for it, reporting Click through rate (CTR) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Click through rate (CTR) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/arv', 'name' => 'ARV Calculator'],
            ['path' => '/finance/attrition-rate', 'name' => 'Attrition rate'],
            ['path' => '/finance/auto-loan', 'name' => 'Auto loan'],
        ],
        'authors' => [],
    ],
];
