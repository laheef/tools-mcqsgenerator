<?php

/**
 * Percentage return
 * /finance/percentage-return
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Percentage return',
    'meta' => ['title' => 'Percentage return: Formula, Steps & Results', 'description' => 'Percentage return turns invested amount and returned amount into gain or loss. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Percentage return Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Basic percentage return',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'invested_amount',
                            'label' => 'Invested amount',
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
                            'name' => 'returned_amount',
                            'label' => 'Returned amount',
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
                            'name' => 'gain',
                            'label' => 'Gain or loss',
                            'type' => 'number',
                            'help' => 'Gain if positive, loss if negative.',
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
                            'name' => 'ROI',
                            'label' => 'Percentage return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Annualized percentage return',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calc_mode',
                            'label' => 'I want to find...',
                            'type' => 'select',
                            'options' => ['annualized percentage return' => '0', 'time needed' => '1'],
                            'dataset' => 'mode',
                            'default' => 'annualized percentage return',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'start_date', 'label' => 'Start date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'end_date', 'label' => 'End date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_diff',
                            'label' => 'Investment duration',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ROI_ann',
                            'label' => 'Annualized percentage return',
                            'type' => 'number',
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
                            'name' => 'ROI_ann2',
                            'label' => 'Annualized percentage return',
                            'type' => 'number',
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
                            'name' => 'time_diff_result',
                            'label' => 'Investment duration',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'second_investment',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Compare with another investment' => '1', '' => '0'],
                            'dataset' => 'second_investment',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Second investment',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'invested_amount_NEW',
                            'label' => 'Invested amount',
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
                            'name' => 'returned_amount_NEW',
                            'label' => 'Returned amount',
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
                            'name' => 'gain_NEW',
                            'label' => 'Gain or loss',
                            'type' => 'number',
                            'help' => 'Gain if positive, loss if negative.',
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
                            'name' => 'ROI_NEW',
                            'label' => 'Percentage return',
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
            'title' => 'Annualized percentage return',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mode2',
                            'label' => 'I want to find...',
                            'type' => 'select',
                            'options' => ['annualized percentage return' => '0', 'time needed' => '1'],
                            'dataset' => 'mode',
                            'default' => 'annualized percentage return',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'start_date_NEW', 'label' => 'Start date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'end_date_NEW', 'label' => 'End date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_diff_NEW',
                            'label' => 'Investment duration',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ROI_ann_NEW',
                            'label' => 'Annualized percentage return',
                            'type' => 'number',
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
                            'name' => 'ROI_ann2_NEW',
                            'label' => 'Annualized percentage return',
                            'type' => 'number',
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
                            'name' => 'time_diff_result_NEW',
                            'label' => 'Investment duration',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'calc_mode == 0 and mode2 == 0 and ROI_ann_round > ROI_ann_NEW_round', 'text' => <<<'TXT'
                                The first investment looks better! Its annualized return on investment (ROI) is equal to {{ROI_ann.formattedValue}}% as compared to {{ROI_ann_NEW.formattedValue}}% of the second investment.
                                TXT],
                                ['when' => 'calc_mode == 0 and mode2 == 0 and ROI_ann_round < ROI_ann_NEW_round', 'text' => <<<'TXT'
                                The second investment looks better! Its annualized return on investment (ROI) is equal to {{ROI_ann_NEW.formattedValue}}% as compared to {{ROI_ann.formattedValue}}% of the first investment.
                                TXT],
                                ['when' => 'calc_mode == 1 and mode2 == 0 and ROI_ann2_round > ROI_ann_NEW_round', 'text' => <<<'TXT'
                                The first investment looks better! Its annualized return on investment (ROI) is equal to {{ROI_ann2.formattedValue}}% as compared to {{ROI_ann_NEW.formattedValue}}% of the second investment.
                                TXT],
                                ['when' => 'calc_mode == 1 and mode2 == 0 and ROI_ann2_round < ROI_ann_NEW_round', 'text' => <<<'TXT'
                                The second investment looks better! Its annualized return on investment (ROI) is equal to {{ROI_ann_NEW.formattedValue}}% as compared to {{ROI_ann2.formattedValue}}% of the first investment.
                                TXT],
                                ['when' => 'calc_mode == 0 and mode2 == 1 and ROI_ann_round > ROI_ann2_NEW_round', 'text' => <<<'TXT'
                                The first investment looks better! Its annualized return on investment (ROI) is equal to {{ROI_ann.formattedValue}}% as compared to {{ROI_ann2_NEW.formattedValue}}% of the second investment.
                                TXT],
                                ['when' => 'calc_mode == 0 and mode2 == 1 and ROI_ann_round < ROI_ann2_NEW_round', 'text' => <<<'TXT'
                                The second investment looks better! Its annualized return on investment (ROI) is equal to {{ROI_ann2_NEW.formattedValue}}% as compared to {{ROI_ann.formattedValue}}% of the first investment.
                                TXT],
                                ['when' => 'calc_mode == 1 and mode2 == 1 and ROI_ann2_round > ROI_ann2_NEW_round', 'text' => <<<'TXT'
                                The first investment looks better! Its annualized return on investment (ROI) is equal to {{ROI_ann2.formattedValue}}% as compared to {{ROI_ann2_NEW.formattedValue}}% of the second investment.
                                TXT],
                                ['when' => 'calc_mode == 1 and mode2 == 1 and ROI_ann2_round < ROI_ann2_NEW_round', 'text' => <<<'TXT'
                                The second investment looks better! Its annualized return on investment (ROI) is equal to {{ROI_ann2_NEW.formattedValue}}% as compared to {{ROI_ann2.formattedValue}}% of the first investment.
                                TXT],
                                ['when' => <<<'TXT'
                                (calc_mode == 0 and mode2 == 0 and ROI_ann_NEW_round == ROI_ann_round) or (calc_mode == 1 and mode2 == 0 and ROI_ann_NEW_round == ROI_ann2_round) or (calc_mode == 0 and mode2 == 1 and ROI_ann2_NEW_round == ROI_ann_round) or (calc_mode == 1 and mode2 == 1 and ROI_ann2_NEW_round == ROI_ann2_round)
                                TXT, 'text' => 'The annualized return on investment (ROI) of both investments is exactly the same! {{ROI_ann_NEW_round.value}} {{ROI_ann_round.value}}'],
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
                            'name' => 'ROI_ann_round',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ROI_ann2_round',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ROI_ann_NEW_round',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ROI_ann2_NEW_round',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'ROI = (returned_amount - invested_amount) / invested_amount',
            'results' => ['ROI' => '(-invested_amount + returned_amount)/invested_amount', 'returned_amount' => 'invested_amount*(ROI + 1)', 'invested_amount' => 'returned_amount/(ROI + 1)'],
        ],
        [
            'title' => 'gain = returned_amount - invested_amount',
            'results' => ['invested_amount' => '-gain + returned_amount', 'gain' => '-invested_amount + returned_amount', 'returned_amount' => 'gain + invested_amount'],
        ],
        [
            'title' => 'start_date + time_diff = end_date',
            'results' => ['time_diff' => 'end_date - start_date', 'start_date' => 'end_date - time_diff', 'end_date' => 'start_date + time_diff'],
        ],
        [
            'title' => 'ROI_ann = annualized(ROI, time_diff)',
            'results' => ['ROI_ann' => 'annualized(ROI, time_diff)'],
        ],
        [
            'title' => 'time_diff_result = timesearch(ROI, ROI_ann2)',
            'results' => ['time_diff_result' => 'timesearch(ROI, ROI_ann2)'],
        ],
        [
            'title' => 'ROI_NEW = (returned_amount_NEW - invested_amount_NEW) / invested_amount_NEW',
            'results' => ['returned_amount_NEW' => 'invested_amount_NEW*(ROI_NEW + 1)', 'invested_amount_NEW' => 'returned_amount_NEW/(ROI_NEW + 1)', 'ROI_NEW' => '(-invested_amount_NEW + returned_amount_NEW)/invested_amount_NEW'],
        ],
        [
            'title' => 'gain_NEW = returned_amount_NEW - invested_amount_NEW',
            'results' => ['returned_amount_NEW' => 'gain_NEW + invested_amount_NEW', 'invested_amount_NEW' => '-gain_NEW + returned_amount_NEW', 'gain_NEW' => '-invested_amount_NEW + returned_amount_NEW'],
        ],
        [
            'title' => 'start_date_NEW + time_diff_NEW = end_date_NEW',
            'results' => ['time_diff_NEW' => 'end_date_NEW - start_date_NEW', 'end_date_NEW' => 'start_date_NEW + time_diff_NEW', 'start_date_NEW' => 'end_date_NEW - time_diff_NEW'],
        ],
        [
            'title' => 'ROI_ann_NEW = annualized (ROI_NEW, time_diff_NEW)',
            'results' => ['ROI_ann_NEW' => 'annualized(ROI_NEW, time_diff_NEW)'],
        ],
        [
            'title' => 'time_diff_result_NEW = timesearch (ROI_NEW, ROI_ann2_NEW)',
            'results' => ['time_diff_result_NEW' => 'timesearch(ROI_NEW, ROI_ann2_NEW)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("annualized",function(ROI,time_diff){return Math.pow(1+ROI,1/(time_diff/365.25))-1});omni.define("timesearch",function(ROI,ROI_ann2){return Math.log(1+ROI)/Math.log(1+ROI_ann2)*365});omni.define("round2dp",function(num){return mathjs.round(num,2)});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Percentage return works in both directions, between gain or loss and percentage return. Gain or loss comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Percentage return calculator works', 'html' => <<<'TXT'
            <p>The Percentage return calculator applies one relationship to 2 numbers and reports Gain or loss, Percentage return and Start date.</p><p>Written with the labels from the form, Percentage return = ( − Invested amount + Returned amount) ÷ Invested amount.</p><p>The answers are Gain or loss, Percentage return, Start date and End date; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Invested amount</strong> — in USD</li><li><strong>Returned amount</strong> — in USD</li></ul><p>The answers come back as Gain or loss in USD, Percentage return in percent, Start date, End date, Investment duration in years, Annualized percentage return in percent, Investment duration in years, Invested amount in USD, Returned amount in USD, Gain or loss in USD, Percentage return in percent, Start date, End date, Investment duration in years, Annualized percentage return in percent, Investment duration in years. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Percentage return offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Percentage return</strong> = <code>( − Invested amount + Returned amount) ÷ Invested amount</code></li><li><strong>Returned amount</strong> = <code>Invested amount × (Percentage return + 1)</code></li><li><strong>Invested amount</strong> = <code>Returned amount ÷ (Percentage return + 1)</code></li><li><strong>Gain or loss</strong> = <code>− Invested amount + Returned amount</code></li><li><strong>Investment duration</strong> = <code>End date − Start date</code></li><li><strong>Start date</strong> = <code>End date − Investment duration</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Percentage return</strong> = <code>( − Invested amount + Returned amount) ÷ Invested amount</code> — the form to use when Invested amount and Returned amount are the values you have.</li><li><strong>Returned amount</strong> = <code>Invested amount × (Percentage return + 1)</code> — the form to use when Invested amount and Percentage return are the values you have.</li><li><strong>Invested amount</strong> = <code>Returned amount ÷ (Percentage return + 1)</code> — the form to use when Returned amount and Percentage return are the values you have.</li><li><strong>Gain or loss</strong> = <code>− Invested amount + Returned amount</code> — the form to use when Invested amount and Returned amount are the values you have.</li><li><strong>Invested amount</strong> = <code>− Gain or loss + Returned amount</code> — the form to use when Gain or loss and Returned amount are the values you have.</li><li><strong>Returned amount</strong> = <code>Gain or loss + Invested amount</code> — the form to use when Gain or loss and Invested amount are the values you have.</li><li><strong>Investment duration</strong> = <code>End date − Start date</code> — the form to use when End date and Start date are the values you have.</li><li><strong>Start date</strong> = <code>End date − Investment duration</code> — the form to use when End date and Investment duration are the values you have.</li></ul><p>Any one of Percentage return, Returned amount and Invested amount can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gain or loss, Percentage return and Start date are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Invested amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Invested amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Returned amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Returned amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Invested amount to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Invested amount</strong> takes a plain number with no unit attached. It feeds Percentage return, Returned amount and Gain or loss. Have it to hand before you start: Invested amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Returned amount</strong> takes a plain number with no unit attached. It feeds Percentage return, Invested amount and Gain or loss. Have it to hand before you start: Returned amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Invested amount and Returned amount. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Invested amount into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Gain or loss in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Gain or loss follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Invested amount and Returned amount are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Invested amount and Returned amount and the number you are missing is Gain or loss and Percentage return.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/missouri-sales-tax">Missouri sales tax Calculator</a>, <a href="/finance/money-counter">Money counter Calculator</a> and <a href="/finance/money-factor">Money factor</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Percentage return is a number to act on, so the useful question is what to do with Gain or loss (USD), Percentage return (perc) and Start date once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Invested amount and Returned amount alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Percentage return calculator work out?', 'a' => <<<'TXT'
            Gain or loss, Percentage return, Start date and End date, from Invested amount and Returned amount. The relationship is Percentage return = ( − Invested amount + Returned amount) ÷ Invested amount.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Invested amount (USD), Returned amount (USD). Fill invested amount and returned amount and leave Gain or loss empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Percentage return, Returned amount, Invested amount and Gain or loss blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Gain or loss is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Invested amount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Gain or loss keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/missouri-sales-tax', 'name' => 'Missouri sales tax Calculator'],
            ['path' => '/finance/money-counter', 'name' => 'Money counter Calculator'],
            ['path' => '/finance/money-factor', 'name' => 'Money factor'],
        ],
        'authors' => [],
    ],
];
