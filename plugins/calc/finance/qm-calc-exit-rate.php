<?php

/**
 * Exit rate
 * /finance/exit-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Exit rate',
    'meta' => ['title' => 'Exit rate Calculator: Formula, Steps & Examples', 'description' => 'Enter number of pageviews and number of exits and get exit rate back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Exit rate Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_pageviews',
                            'label' => 'Number of pageviews',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_exits',
                            'label' => 'Number of exits',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'exit_rate',
                            'label' => 'Exit rate',
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
            'title' => 'exit_rate = number_of_exits / number_of_pageviews',
            'results' => ['number_of_exits' => 'exit_rate*number_of_pageviews', 'number_of_pageviews' => 'number_of_exits/exit_rate', 'exit_rate' => 'number_of_exits/number_of_pageviews'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Exit rate works out Exit rate from Number of pageviews and Number of exits. The arithmetic is the whole method: exit rate is worked out from number of pageviews by one formula, applied once. Exit rate comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Exit rate calculator works', 'html' => <<<'TXT'
            <p>Exit rate answers one question from 2 numbers, and the answer is Exit rate.</p><p>In the form&#039;s own words, Exit rate = Number of exits ÷ Number of pageviews.</p><p>The result panel carries Exit rate, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Number of pageviews</strong> — a plain number, no unit</li><li><strong>Number of exits</strong> — a plain number, no unit</li></ul><p>The result box is Exit rate in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Number of pageviews = 10 and Number of exits = 100 gives <strong>Exit rate</strong> = 10 perc.</p><ul><li><strong>Exit rate</strong> = 10 perc</li></ul><p>The line behind those figures is <strong>Exit rate</strong> = <code>Number of exits ÷ Number of pageviews</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Exit rate</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Exit rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Exit rate</strong> = <code>Number of exits ÷ Number of pageviews</code></li><li><strong>Number of exits</strong> = <code>Exit rate × Number of pageviews</code></li><li><strong>Number of pageviews</strong> = <code>Number of exits ÷ Exit rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Exit rate</strong> = <code>Number of exits ÷ Number of pageviews</code> — the form to use when Number of exits and Number of pageviews are the values you have.</li><li><strong>Number of exits</strong> = <code>Exit rate × Number of pageviews</code> — the form to use when Exit rate and Number of pageviews are the values you have.</li><li><strong>Number of pageviews</strong> = <code>Number of exits ÷ Exit rate</code> — the form to use when Number of exits and Exit rate are the values you have.</li></ul><p>Any one of Exit rate, Number of exits and Number of pageviews can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Number of pageviews, from 10 to 20 — and the answers go from <strong>Exit rate</strong> 10 perc to <strong>Exit rate</strong> 5 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Exit rate is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Number of pageviews left as a guess.</strong> Anything typed into Number of pageviews is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of exits left as a guess.</strong> Anything typed into Number of exits is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Number of pageviews and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Exit rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Number of pageviews</strong> takes a plain number with no unit attached. Change it and Number of exits and Exit rate changes with it. Fill it from a measurement rather than a memory — Number of pageviews is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of exits</strong> takes a plain number with no unit attached. Change it and Number of pageviews and Exit rate changes with it. Fill it from a measurement rather than a memory — Number of exits is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Exit rate</strong> is a percent figure and the page's own defaults put it at 10 perc. It is computed from Number of exits and Number of pageviews, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Exit rate</th></tr></thead><tbody><tr><td><strong>Number of pageviews</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Number of exits</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Number of exits: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Number of pageviews = 5 and Number of exits = 50 and the page reports <strong>Exit rate</strong> = 10 perc.</li><li>Feed in Number of pageviews = 30 and Number of exits = 100 and the page reports <strong>Exit rate</strong> = 3.33 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Exit rate actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Number of pageviews and Number of exits ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Number of pageviews — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Exit rate in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Exit rate is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Number of pageviews and Number of exits are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Number of pageviews and Number of exits and the number you are missing is Exit rate.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/net-income">Net income</a>, <a href="/finance/net-operating-assets">Net operating assets Calculator</a> and <a href="/finance/net-operating-income">Net operating income Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Exit rate is a number to act on, so the useful question is what to do with Exit rate (perc) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Number of pageviews and Number of exits alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Exit rate calculator work out?', 'a' => 'Exit rate, from Number of exits and Number of pageviews. The relationship is Exit rate = Number of exits ÷ Number of pageviews.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Number of pageviews, Number of exits. Enter number of pageviews and number of exits; Exit rate is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Exit rate, Number of exits and Number of pageviews blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Exit rate = 10 perc. The figures come from Number of pageviews as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Exit rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Number of pageviews blank and the page solves for it, reporting Exit rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Exit rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/net-income', 'name' => 'Net income'],
            ['path' => '/finance/net-operating-assets', 'name' => 'Net operating assets Calculator'],
            ['path' => '/finance/net-operating-income', 'name' => 'Net operating income Calculator'],
        ],
        'authors' => [],
    ],
];
