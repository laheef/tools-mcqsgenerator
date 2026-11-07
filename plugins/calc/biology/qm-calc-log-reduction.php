<?php

/**
 * Log Reduction
 * /biology/log-reduction
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Log Reduction',
    'meta' => ['title' => 'Log Reduction Calculator — Formula & Results', 'description' => 'Log Reduction works out perecentage reduction from initial CFU amount and Final CFU amount. Results come back in perc, with any other unit a click away.', 'h1' => 'Log Reduction Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_CFU',
                            'label' => 'Initial CFU amount',
                            'type' => 'number',
                            'help' => 'Amount of Colony Forming Units in sample before treatment.',
                            'unit' => '120',
                            'unit_default' => 'x10e7',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_CFU',
                            'label' => 'Final CFU amount',
                            'type' => 'number',
                            'help' => 'Amount of Colony Forming Units in sample after treatment.',
                            'unit' => '120',
                            'unit_default' => 'x10e5',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'log_reduction',
                            'label' => 'Log reduction',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'perecentage_reduction',
                            'label' => 'Perecentage reduction',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'log_reduction = log(initial_CFU/final_CFU)/log(10)',
            'results' => ['final_CFU' => 'initial_CFU*exp(-log_reduction*log(10))', 'log_reduction' => 'log(initial_CFU/final_CFU)/log(10)', 'initial_CFU' => 'final_CFU*exp(log_reduction*log(10))'],
        ],
        [
            'title' => 'perecentage_reduction = (initial_CFU - final_CFU)/initial_CFU',
            'results' => ['final_CFU' => 'initial_CFU*(1 - perecentage_reduction)', 'perecentage_reduction' => '(-final_CFU + initial_CFU)/initial_CFU', 'initial_CFU' => '-final_CFU/(perecentage_reduction - 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Log Reduction works out Log reduction and Perecentage reduction from Initial CFU amount and Final CFU amount. There is no hidden constant here: change log reduction and initial CFU amount moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Log Reduction calculator works', 'html' => <<<'TXT'
            <p>Log Reduction answers one question from 2 numbers, and the answer is Log reduction and Perecentage reduction.</p><p>Written with the labels from the form, Final CFU amount = Initial CFU amount × e^( − Log reduction × ln(10)).</p><p>The result panel carries Log reduction and Perecentage reduction, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Initial CFU amount</strong> — in times 10 to the 7. Amount of Colony Forming Units in sample before treatment.</li><li><strong>Final CFU amount</strong> — in times 10 to the 5. Amount of Colony Forming Units in sample after treatment.</li></ul><p>The result boxes are Log reduction, Perecentage reduction in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Initial CFU amount = 10 x10e7 and Log reduction = 100 — through the same formula and the panel reports <strong>Final CFU amount</strong> = 1.000e-99 x10e5 and <strong>Perecentage reduction</strong> = 1 perc.</p><ul><li><strong>Final CFU amount</strong> = 1.000e-99 x10e5</li><li><strong>Perecentage reduction</strong> = 1 perc</li></ul><p>That is <strong>Final CFU amount</strong> = <code>Initial CFU amount × e^( − Log reduction × ln(10))</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Final CFU amount</strong> = 1.000e-99 and <strong>Perecentage reduction</strong> = 1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Perecentage reduction lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Final CFU amount</strong> = <code>Initial CFU amount × e^( − Log reduction × ln(10))</code></li><li><strong>Log reduction</strong> = <code>ln(Initial CFU amount ÷ Final CFU amount) ÷ ln(10)</code></li><li><strong>Initial CFU amount</strong> = <code>Final CFU amount × e^(Log reduction × ln(10))</code></li><li><strong>Perecentage reduction</strong> = <code>( − Final CFU amount + Initial CFU amount) ÷ Initial CFU amount</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Final CFU amount</strong> = <code>Initial CFU amount × e^( − Log reduction × ln(10))</code> — the form to use when Initial CFU amount and Log reduction are the values you have.</li><li><strong>Log reduction</strong> = <code>ln(Initial CFU amount ÷ Final CFU amount) ÷ ln(10)</code> — the form to use when Initial CFU amount and Final CFU amount are the values you have.</li><li><strong>Initial CFU amount</strong> = <code>Final CFU amount × e^(Log reduction × ln(10))</code> — the form to use when Final CFU amount and Log reduction are the values you have.</li><li><strong>Final CFU amount</strong> = <code>Initial CFU amount × (1 − Perecentage reduction)</code> — the form to use when Initial CFU amount and Perecentage reduction are the values you have.</li><li><strong>Perecentage reduction</strong> = <code>( − Final CFU amount + Initial CFU amount) ÷ Initial CFU amount</code> — the form to use when Final CFU amount and Initial CFU amount are the values you have.</li><li><strong>Initial CFU amount</strong> = <code>− Final CFU amount ÷ (Perecentage reduction − 1)</code> — the form to use when Final CFU amount and Perecentage reduction are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Final CFU amount, Log reduction and Initial CFU amount can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Initial CFU amount from 10 to 20, leaving every other box alone. The panel moves from <strong>Final CFU amount</strong> 1.000e-99 x10e5 and <strong>Perecentage reduction</strong> 1 perc to <strong>Final CFU amount</strong> 2.000e-99 x10e5 and <strong>Perecentage reduction</strong> 1 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Initial CFU amount and Final CFU amount carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Log reduction and Perecentage reduction are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial CFU amount left as a guess.</strong> Anything typed into Initial CFU amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Final CFU amount left as a guess.</strong> Anything typed into Final CFU amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Initial CFU amount to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Log Reduction form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial CFU amount</strong> is a times 10 to the 7 quantity: the page opens it in x10e7 and converts anything else you pick before the formula runs. Amount of Colony Forming Units in sample before treatment. The page reads it when it works out Final CFU amount, Log reduction and Perecentage reduction. Fill it from a measurement rather than a memory — Initial CFU amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Final CFU amount</strong> is a times 10 to the 5 quantity: the page opens it in x10e5 and converts anything else you pick before the formula runs. Amount of Colony Forming Units in sample after treatment. The page reads it when it works out Log reduction, Initial CFU amount and Perecentage reduction. Fill it from a measurement rather than a memory — Final CFU amount is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Log reduction</strong> is a plain number. The value follows from Initial CFU amount and Final CFU amount. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Perecentage reduction</strong> is a percent figure and the page's own defaults put it at 1 perc. The value follows from Final CFU amount and Initial CFU amount. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Final CFU amount</th><th>Perecentage reduction</th></tr></thead><tbody><tr><td><strong>Initial CFU amount</strong> +10%</td><td>—</td><td>+0%</td></tr><tr><td><strong>Log reduction</strong> +10%</td><td>—</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Initial CFU amount: ten per cent there moves an answer by about 0 per cent, which is why that is the number to measure twice. By contrast, Initial CFU amount and Log reduction barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Initial CFU amount = 5 x10e7 and Log reduction = 50 and the page reports <strong>Final CFU amount</strong> = 5.000e-5 x10e5 and <strong>Perecentage reduction</strong> = 1 perc.</li><li>Feed in Initial CFU amount = 30 x10e7 and Log reduction = 100 and the page reports <strong>Final CFU amount</strong> = 3.000e-99 x10e5 and <strong>Perecentage reduction</strong> = 1 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Log Reduction actually offers.</p><ul><li><strong>percent</strong> — 6 units. It opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>times 10 to the 5</strong> — 69 units. It opens in <em>x10e5</em>, and the chip also carries × 10⁵, × 10⁰, × 10⁻²³, × 10²³, × 10²² and × 10⁻²⁷. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Log reduction is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and times 10 to the 5 and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial CFU amount and Final CFU amount are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Initial CFU amount and Final CFU amount is what you already know and Log reduction and Perecentage reduction is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/specimen-size-from-image">Actual Specimen Size from Image Calculator</a>, <a href="/biology/agarose-gel-calculator">Agarose Gel (gel percentage and loading) Calculator</a> and <a href="/biology/alamarblue-cell-viability">AlamarBlue Cell Viability / Percent Reduction Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Log Reduction calculator work out?', 'a' => <<<'TXT'
            Log reduction and Perecentage reduction, from Initial CFU amount and Log reduction. The relationship is Final CFU amount = Initial CFU amount × e^( − Log reduction × ln(10)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial CFU amount (times 10 to the 7), Final CFU amount (times 10 to the 5). With initial CFU amount and final CFU amount in place, Log reduction can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Final CFU amount, Log reduction, Initial CFU amount and Perecentage reduction can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Final CFU amount = 1.000e-99 x10e5 and Perecentage reduction = 1 perc. Those are the defaults written into the form — move Initial CFU amount and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Log reduction is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial CFU amount blank and the page solves for it, reporting Log reduction instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Log reduction keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/specimen-size-from-image', 'name' => 'Actual Specimen Size from Image Calculator'],
            ['path' => '/biology/agarose-gel-calculator', 'name' => 'Agarose Gel (gel percentage and loading) Calculator'],
            ['path' => '/biology/alamarblue-cell-viability', 'name' => 'AlamarBlue Cell Viability / Percent Reduction Calculator'],
        ],
        'authors' => [],
    ],
];
