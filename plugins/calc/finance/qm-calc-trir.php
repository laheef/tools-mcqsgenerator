<?php

/**
 * TRIR
 * /finance/trir
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'TRIR',
    'meta' => ['title' => 'TRIR Calculator — Free, With Worked Examples', 'description' => 'Enter hours worked and number of injuries and get TRIR back. A worked example follows. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'TRIR Calculator', 'updated' => '2026-09-21'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hoursWorked',
                            'label' => 'Hours worked',
                            'type' => 'number',
                            'help' => 'Total hours worked by all your employees during past 12 months - exclude paid vacation, sick leave, holidays, etc.',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'injuriesNumber',
                            'label' => 'Number of injuries',
                            'type' => 'number',
                            'help' => 'OSHA recordable injuries - see the detailed list of recordable injuries in the article.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'trir',
                            'label' => 'TRIR',
                            'type' => 'number',
                            'help' => 'Total Recordable Incident Rate of your company.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'trir >0 and trir <= 3', 'text' => ' Your TRIR rate level is low.'],
                                ['when' => 'trir >3 and trir <= 8', 'text' => ' Your TRIR rate level is moderate.'],
                                ['when' => 'trir > 8', 'text' => 'Your TRIR rate level is high!'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'trir = (injuriesNumber * 200000) / hoursWorked',
            'results' => ['hoursWorked' => '200000*injuriesNumber/trir', 'trir' => '200000*injuriesNumber/hoursWorked', 'injuriesNumber' => '(1/200000)*hoursWorked*trir'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Hours worked and Number of injuries into TRIR and the answer comes back as TRIR. Nothing is looked up on this page: TRIR is computed from hours worked and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the TRIR calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind TRIR: it takes 2 numbers and reports TRIR.</p><p>In the form&#039;s own words, TRIR = 200000 × Number of injuries ÷ Hours worked.</p><p>The answers are TRIR; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Hours worked</strong> — in hours. Total hours worked by all your employees during past 12 months - exclude paid vacation, sick leave, holidays, etc.</li><li><strong>Number of injuries</strong> — a plain number, no unit. OSHA recordable injuries - see the detailed list of recordable injuries in the article.</li></ul><p>The answer comes back as TRIR. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Hours worked = 10 hrs and Number of injuries = 100 — through the same formula and the panel reports <strong>TRIR</strong> = 2.000e+6.</p><ul><li><strong>TRIR</strong> = 2.000e+6</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>TRIR</strong> = <code>200000 × Number of injuries ÷ Hours worked</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>TRIR</strong> = 2.000e+6. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Hours worked lists 8 options and opens on hours. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>TRIR</strong> = <code>200000 × Number of injuries ÷ Hours worked</code></li><li><strong>Hours worked</strong> = <code>200000 × Number of injuries ÷ TRIR</code></li><li><strong>Number of injuries</strong> = <code>(1 ÷ 200000) × Hours worked × TRIR</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>TRIR</strong> = <code>200000 × Number of injuries ÷ Hours worked</code> — the form to use when Number of injuries and Hours worked are the values you have.</li><li><strong>Hours worked</strong> = <code>200000 × Number of injuries ÷ TRIR</code> — the form to use when Number of injuries and TRIR are the values you have.</li><li><strong>Number of injuries</strong> = <code>(1 ÷ 200000) × Hours worked × TRIR</code> — the form to use when Hours worked and TRIR are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of TRIR, Hours worked and Number of injuries can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Hours worked, from 10 to 20 — and the answers go from <strong>TRIR</strong> 2.000e+6 to <strong>TRIR</strong> 1.000e+6.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Hours worked carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> TRIR is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Hours worked left as a guess.</strong> Anything typed into Hours worked is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of injuries left as a guess.</strong> Anything typed into Number of injuries is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Hours worked is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the TRIR form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Hours worked</strong> is a hours quantity: the page opens it in hrs and converts anything else you pick before the formula runs. Total hours worked by all your employees during past 12 months - exclude paid vacation, sick leave, holidays, etc. Change it and TRIR and Number of injuries changes with it. Fill it from a measurement rather than a memory — Hours worked is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of injuries</strong> takes a plain number with no unit attached. OSHA recordable injuries - see the detailed list of recordable injuries in the article. Change it and Hours worked and TRIR changes with it. Fill it from a measurement rather than a memory — Number of injuries is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>TRIR</strong> is a plain number and the page's own defaults put it at 2.000e+6. It is computed from Number of injuries and Hours worked, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>TRIR</th></tr></thead><tbody><tr><td><strong>Hours worked</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Number of injuries</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Number of injuries: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Hours worked = 5 hrs and Number of injuries = 50 and the page reports <strong>TRIR</strong> = 2.000e+6.</li><li>Feed in Hours worked = 30 hrs and Number of injuries = 100 and the page reports <strong>TRIR</strong> = 666667.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on TRIR actually offers.</p><ul><li><strong>hours</strong> — opens in <em>hrs</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Hours worked and Number of injuries ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Hours worked — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check TRIR against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind TRIR is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover hours. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Hours worked and Number of injuries is what you already know and TRIR is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/income-elasticity-demand">Income elasticity of demand Calculator</a>, <a href="/finance/income-tax-pakistan">Income tax - Pakistan</a> and <a href="/finance/income-tax-australia">Income tax Australia Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the TRIR calculator work out?', 'a' => 'TRIR, from Number of injuries and Hours worked. The relationship is TRIR = 200000 × Number of injuries ÷ Hours worked.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hours worked (hours), Number of injuries. Fill hours worked and number of injuries and leave TRIR empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. TRIR, Hours worked and Number of injuries can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'TRIR = 2.000e+6. That comes from the page\'s own defaults, entered in Hours worked; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            TRIR is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Hours worked blank and the page solves for it, reporting TRIR instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to TRIR at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/income-elasticity-demand', 'name' => 'Income elasticity of demand Calculator'],
            ['path' => '/finance/income-tax-pakistan', 'name' => 'Income tax - Pakistan'],
            ['path' => '/finance/income-tax-australia', 'name' => 'Income tax Australia Calculator'],
        ],
        'authors' => [],
    ],
];
