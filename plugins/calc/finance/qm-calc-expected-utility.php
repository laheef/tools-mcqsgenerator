<?php

/**
 * Expected utility
 * /finance/expected-utility
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Expected utility',
    'meta' => ['title' => 'Expected utility Calculator: Free, With Steps', 'description' => 'Enter probability and monetary value and get expected utility back. Every box can be solved for, not only the one in the title. A worked example follows.', 'h1' => 'Expected utility Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Event 1',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'probability_event_1',
                            'label' => 'Probability',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'monetary_value_1',
                            'label' => 'Monetary value',
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
        [
            'title' => 'Event 2',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'probability_event_2',
                            'label' => 'Probability',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'monetary_value_2',
                            'label' => 'Monetary value',
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
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'expected_utility',
                            'label' => 'Expected utility',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'expected_utility = probability_event_1 * monetary_value_1 ^ 0.5  + probability_event_2 * monetary_value_2 ^ 0.5',
            'results' => [
                'monetary_value_2' => 'pow(expected_utility - sqrt(monetary_value_1)*probability_event_1, 2)/pow(probability_event_2, 2)',
                'expected_utility' => 'sqrt(monetary_value_1)*probability_event_1 + sqrt(monetary_value_2)*probability_event_2',
                'probability_event_1' => '(expected_utility - sqrt(monetary_value_2)*probability_event_2)/sqrt(monetary_value_1)',
                'monetary_value_1' => 'pow(expected_utility - sqrt(monetary_value_2)*probability_event_2, 2)/pow(probability_event_1, 2)',
                'probability_event_2' => '(expected_utility - sqrt(monetary_value_1)*probability_event_1)/sqrt(monetary_value_2)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Expected utility works out Expected utility from Probability, Monetary value and Probability. Nothing is looked up on this page: expected utility is computed from probability and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Expected utility calculator works', 'html' => <<<'TXT'
            <p>The Expected utility calculator applies one relationship to 4 numbers and reports Expected utility.</p><p>The relationship it solves reads Expected utility = √(Monetary value) × Probability + √(Monetary value) × Probability.</p><p>The answers are Expected utility; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Probability</strong> — in percent</li><li><strong>Monetary value</strong> — in USD</li><li><strong>Probability</strong> — in percent</li><li><strong>Monetary value</strong> — in USD</li></ul><p>The result box is Expected utility. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Probability = 10 perc, Monetary value = 100 USD, Probability = 1000 perc and Monetary value = 10 USD; the answers are <strong>Expected utility</strong> = 3262.</p><ul><li><strong>Expected utility</strong> = 3262</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Expected utility</strong> = <code>√(Monetary value) × Probability + √(Monetary value) × Probability</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Expected utility</strong> = 3262. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Probability lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Expected utility</strong> = <code>√(Monetary value) × Probability + √(Monetary value) × Probability</code></li><li><strong>Monetary value</strong> = <code>(Expected utility − √(Monetary value) × Probability)^(2) ÷ (Probability)^(2)</code></li><li><strong>Probability</strong> = <code>(Expected utility − √(Monetary value) × Probability) ÷ √(Monetary value)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Expected utility</strong> = <code>√(Monetary value) × Probability + √(Monetary value) × Probability</code> — the form to use when Monetary value, Probability, Monetary value and Probability are the values you have.</li><li><strong>Monetary value</strong> = <code>(Expected utility − √(Monetary value) × Probability)^(2) ÷ (Probability)^(2)</code> — the form to use when Expected utility, Monetary value, Probability and Probability are the values you have.</li><li><strong>Probability</strong> = <code>(Expected utility − √(Monetary value) × Probability) ÷ √(Monetary value)</code> — the form to use when Expected utility, Monetary value, Probability and Monetary value are the values you have.</li><li><strong>Monetary value</strong> = <code>(Expected utility − √(Monetary value) × Probability)^(2) ÷ (Probability)^(2)</code> — the form to use when Expected utility, Monetary value, Probability and Probability are the values you have.</li><li><strong>Probability</strong> = <code>(Expected utility − √(Monetary value) × Probability) ÷ √(Monetary value)</code> — the form to use when Expected utility, Monetary value, Probability and Monetary value are the values you have.</li></ul><p>Any one of Expected utility, Monetary value and Probability can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Probability, from 10 to 20 — and the answers go from <strong>Expected utility</strong> 3262 to <strong>Expected utility</strong> 3362.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Probability and Probability carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Expected utility is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Probability left as a guess.</strong> Anything typed into Probability is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Monetary value left as a guess.</strong> Anything typed into Monetary value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Probability and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Probability</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Monetary value, Expected utility and Monetary value. Have it to hand before you start: Probability is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Monetary value</strong> takes a plain number with no unit attached. It feeds Monetary value, Expected utility and Probability. Have it to hand before you start: Monetary value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Probability</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Monetary value, Expected utility and Probability. Have it to hand before you start: Probability is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Monetary value</strong> takes a plain number with no unit attached. It feeds Expected utility, Probability and Monetary value. Have it to hand before you start: Monetary value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Expected utility</strong> is a plain number and the page's own defaults put it at 3262. It is worked out from Monetary value, Probability, Monetary value and Probability. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Expected utility</th></tr></thead><tbody><tr><td><strong>Probability</strong> +10%</td><td>+0.31%</td></tr><tr><td><strong>Monetary value</strong> +10%</td><td>+0.15%</td></tr><tr><td><strong>Probability</strong> +10%</td><td>+9.69%</td></tr><tr><td><strong>Monetary value</strong> +10%</td><td>+4.73%</td></tr></tbody></table><p>The steepest column belongs to Probability: ten per cent there moves an answer by about 9.7 per cent, which is why that is the number to measure twice. By contrast, Probability and Monetary value barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Probability = 5 perc, Monetary value = 50 USD, Probability = 500 perc and Monetary value = 5 USD, the answer is <strong>Expected utility</strong> = 1153.</li><li>With Probability = 30 perc, Monetary value = 100 USD, Probability = 1000 perc and Monetary value = 10 USD, the answer is <strong>Expected utility</strong> = 3462.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Expected utility is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Probability, Monetary value and Probability are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Probability, Monetary value and Probability and the number you are missing is Expected utility.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/continuous-compound">Continuous compound interest Calculator</a>, <a href="/finance/contribution-margin">Contribution margin</a> and <a href="/finance/online-marketing-roi">Conversion rate Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Expected utility is a number to act on, so the useful question is what to do with Expected utility once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Probability, Monetary value, Probability and Monetary value alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Expected utility calculator work out?', 'a' => <<<'TXT'
            Expected utility, from Monetary value, Probability, Monetary value and Probability. The relationship is Expected utility = √(Monetary value) × Probability + √(Monetary value) × Probability.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Probability (percent), Monetary value (USD), Probability (percent), Monetary value (USD). With probability, monetary value and probability in place, Expected utility can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Expected utility, Monetary value, Probability and Monetary value blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Expected utility = 3262. The figures come from Probability as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Expected utility is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Probability left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Expected utility at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/continuous-compound', 'name' => 'Continuous compound interest Calculator'],
            ['path' => '/finance/contribution-margin', 'name' => 'Contribution margin'],
            ['path' => '/finance/online-marketing-roi', 'name' => 'Conversion rate Calculator'],
        ],
        'authors' => [],
    ],
];
