<?php

/**
 * Real interest rate
 * /finance/real-interest-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Real interest rate',
    'meta' => ['title' => 'Real interest rate Calculator: Free, With Steps', 'description' => 'Real interest rate takes nominal interest rate and returns real interest rate. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Real interest rate Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nominal_interest_rate',
                            'label' => 'Nominal interest rate',
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
                            'name' => 'inflation',
                            'label' => 'Expected inflation rate',
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
                            'name' => 'real_interest_rate',
                            'label' => 'Real interest rate',
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
            'title' => 'real_interest_rate = nominal_interest_rate - inflation',
            'results' => ['real_interest_rate' => '-inflation + nominal_interest_rate', 'nominal_interest_rate' => 'inflation + real_interest_rate', 'inflation' => 'nominal_interest_rate - real_interest_rate'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Real interest rate works out Real interest rate from Nominal interest rate and Expected inflation rate. The arithmetic is the whole method: real interest rate is worked out from nominal interest rate by one formula, applied once. Real interest rate comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Real interest rate calculator works', 'html' => <<<'TXT'
            <p>Real interest rate answers one question from 2 numbers, and the answer is Real interest rate.</p><p>Written with the labels from the form, Real interest rate = − Expected inflation rate + Nominal interest rate.</p><p>The result panel carries Real interest rate, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Nominal interest rate</strong> — in percent</li><li><strong>Expected inflation rate</strong> — in percent</li></ul><p>What you get back is Real interest rate in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Nominal interest rate = 10 perc and Expected inflation rate = 100 perc; the answers are <strong>Real interest rate</strong> = -90 perc.</p><ul><li><strong>Real interest rate</strong> = -90 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Real interest rate</strong> = <code>− Expected inflation rate + Nominal interest rate</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Real interest rate</strong> = -90. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Real interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Real interest rate</strong> = <code>− Expected inflation rate + Nominal interest rate</code></li><li><strong>Nominal interest rate</strong> = <code>Expected inflation rate + Real interest rate</code></li><li><strong>Expected inflation rate</strong> = <code>Nominal interest rate − Real interest rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Real interest rate</strong> = <code>− Expected inflation rate + Nominal interest rate</code> — the form to use when Expected inflation rate and Nominal interest rate are the values you have.</li><li><strong>Nominal interest rate</strong> = <code>Expected inflation rate + Real interest rate</code> — the form to use when Expected inflation rate and Real interest rate are the values you have.</li><li><strong>Expected inflation rate</strong> = <code>Nominal interest rate − Real interest rate</code> — the form to use when Nominal interest rate and Real interest rate are the values you have.</li></ul><p>Any one of Real interest rate, Nominal interest rate and Expected inflation rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Nominal interest rate, from 10 to 20 — and the answers go from <strong>Real interest rate</strong> -90 perc to <strong>Real interest rate</strong> -80 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Nominal interest rate and Expected inflation rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Real interest rate is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Nominal interest rate left as a guess.</strong> Anything typed into Nominal interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Expected inflation rate left as a guess.</strong> Anything typed into Expected inflation rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Nominal interest rate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Nominal interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Real interest rate and Expected inflation rate changes with it. Have it to hand before you start: Nominal interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Expected inflation rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Real interest rate and Nominal interest rate changes with it. Have it to hand before you start: Expected inflation rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Real interest rate</strong> is a percent figure and the page's own defaults put it at -90 perc. The value follows from Expected inflation rate and Nominal interest rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Real interest rate</th></tr></thead><tbody><tr><td><strong>Nominal interest rate</strong> +10%</td><td>+1.11%</td></tr><tr><td><strong>Expected inflation rate</strong> +10%</td><td>-11.11%</td></tr></tbody></table><p>The steepest column belongs to Expected inflation rate: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Nominal interest rate = 5 perc and Expected inflation rate = 50 perc, the answer is <strong>Real interest rate</strong> = -45 perc.</li><li>With Nominal interest rate = 30 perc and Expected inflation rate = 100 perc, the answer is <strong>Real interest rate</strong> = -70 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Nominal interest rate and Expected inflation rate. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Nominal interest rate into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Real interest rate in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Real interest rate is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Nominal interest rate and Expected inflation rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Nominal interest rate and Expected inflation rate measured, Real interest rate wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/intrinsic-value">Intrinsic value Calculator</a>, <a href="/finance/inventory-turnover">Inventory turnover</a> and <a href="/finance/investment">Investment Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Real interest rate calculator work out?', 'a' => <<<'TXT'
            Real interest rate, from Expected inflation rate and Nominal interest rate. The relationship is Real interest rate = − Expected inflation rate + Nominal interest rate.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Nominal interest rate (percent), Expected inflation rate (percent). Fill nominal interest rate and expected inflation rate and leave Real interest rate empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Real interest rate, Nominal interest rate and Expected inflation rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Real interest rate = -90 perc. Those are the defaults written into the form — move Nominal interest rate and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Real interest rate is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Nominal interest rate left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Real interest rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/intrinsic-value', 'name' => 'Intrinsic value Calculator'],
            ['path' => '/finance/inventory-turnover', 'name' => 'Inventory turnover'],
            ['path' => '/finance/investment', 'name' => 'Investment Calculator'],
        ],
        'authors' => [],
    ],
];
