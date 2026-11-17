<?php

/**
 * Annualized return
 * /finance/annualized-return
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Annualized return',
    'meta' => ['title' => 'Annualized return Calculator: Free, With Steps', 'description' => 'Enter calculate annualized return from, Total return (R) and beginning value and Annualized return returns annualized return. Any box can be the unknown.', 'h1' => 'Annualized return Calculator', 'updated' => '2026-09-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mode_select',
                            'label' => 'Calculate annualized return from',
                            'type' => 'select',
                            'options' => ['Total return (%)' => '0', 'Beginning and ending values' => '1'],
                            'dataset' => 'mode_selectDS',
                            'default' => 'Total return (%)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'R',
                            'label' => 'Total return (R)',
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
                            'name' => 'v_initial',
                            'label' => 'Beginning value',
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
                            'name' => 'v_final',
                            'label' => 'Ending value',
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
                            'name' => 'n',
                            'label' => 'Holding period (n)',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'an_return_per',
                            'label' => 'Annualized return',
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
                            'name' => 'an_return_vals',
                            'label' => 'Annualized return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
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
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'Monthly equivalent:&nbsp;'],
                                ['when' => 'mode_select == 0', 'text' => '{{month_eq_per.value}}%'],
                                ['when' => 'mode_select == 1', 'text' => '{{month_eq_vals.value}}%'],
                                ['when' => null, 'text' => 'Quarterly equivalent:&nbsp;'],
                                ['when' => 'mode_select == 0', 'text' => '{{quarter_eq_per.value}}%'],
                                ['when' => 'mode_select == 1', 'text' => '{{quarter_eq_vals.value}}%'],
                            ],
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
                            'name' => 'month_eq_per',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quarter_eq_per',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'month_eq_vals',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quarter_eq_vals',
                            'label' => '',
                            'type' => 'presentation',
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
            'title' => 'an_return_per = (1 +R) ^ (1/n) - 1',
            'results' => ['an_return_per' => 'pow(R + 1, 1/n) - 1', 'n' => 'log(R + 1)/log(an_return_per + 1)', 'R' => 'pow(an_return_per + 1, n) - 1'],
        ],
        [
            'title' => 'an_return_vals = (v_final / v_initial) ^ (1/n) - 1',
            'results' => ['v_final' => 'v_initial*pow(an_return_vals + 1, n)', 'an_return_vals' => 'pow(v_final/v_initial, 1/n) - 1', 'v_initial' => 'v_final*pow(an_return_vals + 1, -n)', 'n' => 'log(v_final/v_initial)/log(an_return_vals + 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Annualized return works out Beginning value and Ending value from Total return (R) and Holding period (n). There is no hidden constant here: change beginning value and total return (R) moves with it. The main result, Beginning value, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Annualized return calculator works', 'html' => <<<'TXT'
            <p>The Annualized return calculator applies one relationship to 2 numbers and reports Beginning value, Ending value and Annualized return.</p><p>The relationship it solves reads Annualized return = (Total return (R) + 1)^(1 ÷ Holding period (n)) − 1.</p><p>The answers are Beginning value, Ending value, Annualized return and Annualized return; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Total return (R)</strong> — in percent</li><li><strong>Holding period (n)</strong> — in years</li></ul><p>The result boxes are Beginning value in USD, Ending value in USD, Annualized return in percent, Annualized return in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Annualized return lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Annualized return</strong> = <code>(Total return (R) + 1)^(1 ÷ Holding period (n)) − 1</code></li><li><strong>Holding period (n)</strong> = <code>ln(Total return (R) + 1) ÷ ln(Annualized return + 1)</code></li><li><strong>Total return (R)</strong> = <code>(Annualized return + 1)^(Holding period (n)) − 1</code></li><li><strong>Ending value</strong> = <code>Beginning value × (Annualized return + 1)^(Holding period (n))</code></li><li><strong>Beginning value</strong> = <code>Ending value × (Annualized return + 1)^(− Holding period (n))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Annualized return</strong> = <code>(Total return (R) + 1)^(1 ÷ Holding period (n)) − 1</code> — the form to use when Total return (R) and Holding period (n) are the values you have.</li><li><strong>Holding period (n)</strong> = <code>ln(Total return (R) + 1) ÷ ln(Annualized return + 1)</code> — the form to use when Total return (R) and Annualized return are the values you have.</li><li><strong>Total return (R)</strong> = <code>(Annualized return + 1)^(Holding period (n)) − 1</code> — the form to use when Annualized return and Holding period (n) are the values you have.</li><li><strong>Annualized return</strong> = <code>(Ending value ÷ Beginning value)^(1 ÷ Holding period (n)) − 1</code> — the form to use when Ending value, Beginning value and Holding period (n) are the values you have.</li><li><strong>Ending value</strong> = <code>Beginning value × (Annualized return + 1)^(Holding period (n))</code> — the form to use when Beginning value, Annualized return and Holding period (n) are the values you have.</li><li><strong>Beginning value</strong> = <code>Ending value × (Annualized return + 1)^(− Holding period (n))</code> — the form to use when Ending value, Annualized return and Holding period (n) are the values you have.</li><li><strong>Holding period (n)</strong> = <code>ln(Ending value ÷ Beginning value) ÷ ln(Annualized return + 1)</code> — the form to use when Ending value, Beginning value and Annualized return are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Annualized return, Holding period (n) and Total return (R) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Total return (R) carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Beginning value, Ending value and Annualized return are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Total return (R) left as a guess.</strong> Anything typed into Total return (R) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Holding period (n) left as a guess.</strong> Anything typed into Holding period (n) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Total return (R) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Total return (R)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Annualized return and Holding period (n). Have it to hand before you start: Total return (R) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Holding period (n)</strong> is measured in years. The page reads it when it works out Annualized return, Total return (R) and Ending value. Have it to hand before you start: Holding period (n) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Beginning value</strong> is a plain number. It is worked out from Ending value, Annualized return and Holding period (n). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Ending value</strong> is a plain number. It is worked out from Beginning value, Annualized return and Holding period (n). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Annualized return</strong> is a percent figure. It is worked out from Total return (R) and Holding period (n). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Annualized return</strong> is a percent figure. It is worked out from Ending value, Beginning value and Holding period (n). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Total return (R) and Holding period (n). Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Total return (R) into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Beginning value in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Beginning value is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total return (R) and Holding period (n) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Total return (R) and Holding period (n) is what you already know and Beginning value and Ending value is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/earned-value-management">Earned value management Calculator</a>, <a href="/finance/earnest-money">Earnest money Calculator</a> and <a href="/finance/ebt">Earnings before tax (EBT) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Annualized return calculator work out?', 'a' => <<<'TXT'
            Beginning value, Ending value, Annualized return and Annualized return, from Total return (R) and Holding period (n). The relationship is Annualized return = (Total return (R) + 1)^(1 ÷ Holding period (n)) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total return (R) (percent), Holding period (n) (years). With total return (R) and holding period (n) in place, Beginning value can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Annualized return, Holding period (n), Total return (R) and Annualized return can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Beginning value is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Total return (R) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Beginning value keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/earned-value-management', 'name' => 'Earned value management Calculator'],
            ['path' => '/finance/earnest-money', 'name' => 'Earnest money Calculator'],
            ['path' => '/finance/ebt', 'name' => 'Earnings before tax (EBT) Calculator'],
        ],
        'authors' => [],
    ],
];
