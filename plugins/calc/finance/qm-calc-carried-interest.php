<?php

/**
 * Carried interest
 * /finance/carried-interest
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Carried interest',
    'meta' => ['title' => 'Carried interest — Formula, Steps & Examples', 'description' => 'Carried interest works out fund return from initial fund value and final fund value. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Carried interest Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Fund return',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ini_fund_value',
                            'label' => 'Initial fund value',
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
                            'name' => 'final_fund_value',
                            'label' => 'Final fund value',
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
                            'name' => 'fund_return',
                            'label' => 'Fund return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Carry interest',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hold_period',
                            'label' => 'Hold period',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hurdle_rate',
                            'label' => 'Hurdle rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'carried_interest',
                            'label' => 'Carried interest',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                            'default' => '20',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gp_catch_up',
                            'label' => 'GP (general partner) catch-up',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'gp_catch_upDS',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'gp_catch_up == 0', 'text' => 'The GP profit split is {{gp_split_no.monetaryValue}}. The total GP carry distribution is {{ci_dis_no.monetaryValue}}&nbsp;'],
                                ['when' => ' gp_catch_up == 1', 'text' => <<<'TXT'
                                The GP catch-up is {{gp_catch_up_yes.monetaryValue}}. The GP profit split is {{gp_split_yes.monetaryValue}}. The total GP carry distribution is {{ci_dis_yes.monetaryValue}}&nbsp;
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'As the fund return is lower than the hurdle rate, you will not incur any carry distribution&nbsp;'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pref_return',
                            'label' => 'Pref return',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'gp_catch_up_1',
                            'label' => 'Gp catch up 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gp_catch_up_2',
                            'label' => 'Gp catch up 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'gp_catch_up_yes',
                            'label' => 'Gp catch up val yes',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'ci_dis_yes',
                            'label' => 'Ci dis',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'gp_split_yes',
                            'label' => 'Gp split',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'gp_catch_up_no',
                            'label' => 'Gp catch up val no',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                        [
                            'name' => 'ci_dis_no',
                            'label' => 'Ci dis no',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'gp_split_no',
                            'label' => 'Gp split no',
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
    ],
    'formula' => [
        [
            'title' => 'fund_return = final_fund_value / ini_fund_value - 1',
            'results' => ['ini_fund_value' => 'final_fund_value/(fund_return + 1)', 'fund_return' => '(final_fund_value - ini_fund_value)/ini_fund_value', 'final_fund_value' => 'ini_fund_value*(fund_return + 1)'],
        ],
        [
            'title' => 'pref_return = one_way(pow((1 + hurdle_rate), hold_period))',
            'results' => ['pref_return' => '(pow(hurdle_rate + 1, hold_period))'],
        ],
        [
            'title' => 'gp_catch_up_1 = one_way(final_fund_value - ini_fund_value * pref_return)',
            'results' => ['gp_catch_up_1' => '(final_fund_value - ini_fund_value*(pow(hurdle_rate + 1, hold_period)))'],
        ],
        [
            'title' => 'gp_catch_up_2 = one_way((ini_fund_value * (pref_return - 1)) / (1 - carried_interest) - (ini_fund_value * (pref_return - 1)))',
            'results' => ['gp_catch_up_2' => '(carried_interest*ini_fund_value*(1 - (pow(hurdle_rate + 1, hold_period)))/(carried_interest - 1))'],
        ],
        [
            'title' => 'gp_catch_up_yes = min(gp_catch_up_1, gp_catch_up_2)',
            'results' => ['gp_catch_up_yes' => <<<'TXT'
            min((final_fund_value - ini_fund_value*(pow(hurdle_rate + 1, hold_period))), (carried_interest*ini_fund_value*(1 - (pow(hurdle_rate + 1, hold_period)))/(carried_interest - 1)))
            TXT],
        ],
        [
            'title' => 'gp_split_yes = one_way((final_fund_value - ini_fund_value * pref_return - gp_catch_up_yes) * carried_interest)',
            'results' => ['gp_split_yes' => <<<'TXT'
            (carried_interest*(final_fund_value - ini_fund_value*(pow(hurdle_rate + 1, hold_period)) - min((final_fund_value - ini_fund_value*(pow(hurdle_rate + 1, hold_period))), (carried_interest*ini_fund_value*(1 - (pow(hurdle_rate + 1, hold_period)))/(carried_interest - 1)))))
            TXT],
        ],
        [
            'title' => 'ci_dis_yes = one_way(gp_catch_up_yes + gp_split_yes)',
            'results' => ['ci_dis_yes' => <<<'TXT'
            ((carried_interest*(final_fund_value - ini_fund_value*(pow(hurdle_rate + 1, hold_period)) - min((final_fund_value - ini_fund_value*(pow(hurdle_rate + 1, hold_period))), (carried_interest*ini_fund_value*(1 - (pow(hurdle_rate + 1, hold_period)))/(carried_interest - 1))))) + min((final_fund_value - ini_fund_value*(pow(hurdle_rate + 1, hold_period))), (carried_interest*ini_fund_value*(1 - (pow(hurdle_rate + 1, hold_period)))/(carried_interest - 1))))
            TXT],
        ],
        [
            'title' => 'gp_split_no = one_way((final_fund_value - ini_fund_value * pref_return - gp_catch_up_no) * carried_interest)',
            'results' => ['gp_split_no' => '(carried_interest*(final_fund_value - gp_catch_up_no - ini_fund_value*(pow(hurdle_rate + 1, hold_period))))'],
        ],
        [
            'title' => 'ci_dis_no = one_way(gp_catch_up_no + gp_split_no)',
            'results' => ['ci_dis_no' => '(gp_catch_up_no + (carried_interest*(final_fund_value - gp_catch_up_no - ini_fund_value*(pow(hurdle_rate + 1, hold_period)))))'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Carried interest takes Initial fund value and Final fund value and returns Fund return and Pref return. There is no hidden constant here: change fund return and initial fund value moves with it. The main result, Fund return, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Carried interest calculator works', 'html' => <<<'TXT'
            <p>The Carried interest calculator applies one relationship to 2 numbers and reports Fund return, Pref return and Gp catch up 1.</p><p>The relationship it solves reads Fund return = (Final fund value − Initial fund value) ÷ Initial fund value.</p><p>The result panel carries Fund return, Pref return, Gp catch up 1 and Gp catch up 2, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Initial fund value</strong> — in USD</li><li><strong>Final fund value</strong> — in USD</li></ul><p>The result boxes are Fund return in percent, Pref return, Gp catch up 1, Gp catch up 2, Gp catch up val yes, Ci dis, Gp split, Ci dis no, Gp split no; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Hold period = 10 yrs, Hurdle rate = 4 perc, Carried interest = 20 perc and GP (general partner) catch-up = 0 gives <strong>Gp catch up val no</strong> = 0 and <strong>Pref return</strong> = 1.</p><ul><li><strong>Gp catch up val no</strong> = 0</li><li><strong>Pref return</strong> = 1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Fund return</strong> = <code>(Final fund value − Initial fund value) ÷ Initial fund value</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Gp catch up val no</strong> = 0 and <strong>Pref return</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Fund return offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Fund return</strong> = <code>(Final fund value − Initial fund value) ÷ Initial fund value</code></li><li><strong>Initial fund value</strong> = <code>Final fund value ÷ (Fund return + 1)</code></li><li><strong>Final fund value</strong> = <code>Initial fund value × (Fund return + 1)</code></li><li><strong>Pref return</strong> = <code>((Hurdle rate + 1)^(Hold period))</code></li><li><strong>Gp catch up 1</strong> = <code>(Final fund value − Initial fund value × ((Hurdle rate + 1)^(Hold period)))</code></li><li><strong>Gp catch up 2</strong> = <code>(Carried interest × Initial fund value × (1 − ((Hurdle rate + 1)^(Hold period))) ÷ (Carried interest − 1))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Fund return</strong> = <code>(Final fund value − Initial fund value) ÷ Initial fund value</code> — the form to use when Final fund value and Initial fund value are the values you have.</li><li><strong>Initial fund value</strong> = <code>Final fund value ÷ (Fund return + 1)</code> — the form to use when Final fund value and Fund return are the values you have.</li><li><strong>Final fund value</strong> = <code>Initial fund value × (Fund return + 1)</code> — the form to use when Initial fund value and Fund return are the values you have.</li><li><strong>Pref return</strong> = <code>((Hurdle rate + 1)^(Hold period))</code> — the form to use when Hurdle rate and Hold period are the values you have.</li><li><strong>Gp catch up 1</strong> = <code>(Final fund value − Initial fund value × ((Hurdle rate + 1)^(Hold period)))</code> — the form to use when Final fund value, Initial fund value, Hurdle rate and Hold period are the values you have.</li><li><strong>Gp catch up 2</strong> = <code>(Carried interest × Initial fund value × (1 − ((Hurdle rate + 1)^(Hold period))) ÷ (Carried interest − 1))</code> — the form to use when Carried interest, Initial fund value, Hurdle rate and Hold period are the values you have.</li><li><strong>Gp catch up val yes</strong> = <code>min((Final fund value − Initial fund value × ((Hurdle rate + 1)^(Hold period))), (Carried interest × Initial fund value × (1 − ((Hurdle rate + 1)^(Hold period))) ÷ (Carried interest − 1)))</code> — the form to use when Final fund value, Initial fund value, Hurdle rate and Hold period are the values you have.</li><li><strong>Gp split no</strong> = <code>(Carried interest × (Final fund value − Gp catch up val no − Initial fund value × ((Hurdle rate + 1)^(Hold period))))</code> — the form to use when Carried interest, Final fund value, Gp catch up val no and Initial fund value are the values you have.</li></ul><p>Any one of Fund return, Initial fund value and Final fund value can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Hold period from 10 to 20, leaving every other box alone. The panel moves from <strong>Gp catch up val no</strong> 0 and <strong>Pref return</strong> 1 to <strong>Gp catch up val no</strong> 0 and <strong>Pref return</strong> 1.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Fund return, Pref return and Gp catch up 1 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Initial fund value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial fund value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Final fund value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Final fund value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Initial fund value to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Carried interest form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial fund value</strong> takes a plain number with no unit attached. The page reads it when it works out Fund return, Final fund value and Gp catch up 1. Fill it from a measurement rather than a memory — Initial fund value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Final fund value</strong> takes a plain number with no unit attached. The page reads it when it works out Initial fund value, Fund return and Gp catch up 1. Fill it from a measurement rather than a memory — Final fund value is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Fund return</strong> is a percent figure. It is worked out from Final fund value and Initial fund value. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Pref return</strong> is a plain number and the page's own defaults put it at 1. It is worked out from Hurdle rate and Hold period. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Gp catch up 1</strong> is a plain number. It is worked out from Final fund value, Initial fund value, Hurdle rate and Hold period. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Gp catch up 2</strong> is a plain number. It is worked out from Carried interest, Initial fund value, Hurdle rate and Hold period. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Gp catch up val yes</strong> is a plain number. It is worked out from Final fund value, Initial fund value, Hurdle rate and Hold period. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Ci dis</strong> is a plain number. It is worked out from Carried interest, Final fund value, Initial fund value and Hurdle rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Gp split</strong> is a plain number. It is worked out from Carried interest, Final fund value, Initial fund value and Hurdle rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Ci dis no</strong> is a plain number. It is worked out from Gp catch up val no, Carried interest, Final fund value and Initial fund value. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Gp split no</strong> is a plain number. It is worked out from Carried interest, Final fund value, Gp catch up val no and Initial fund value. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Fund return is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial fund value and Final fund value are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Initial fund value and Final fund value is what you already know and Fund return and Pref return is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/loss-ratio">Loss ratio Calculator</a>, <a href="/finance/lottery-annuity">Lottery annuity Calculator</a> and <a href="/finance/lottery-tax">Lottery tax Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Carried interest calculator work out?', 'a' => <<<'TXT'
            Fund return, Pref return, Gp catch up 1 and Gp catch up 2, from Final fund value and Initial fund value. The relationship is Fund return = (Final fund value − Initial fund value) ÷ Initial fund value.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial fund value (USD), Final fund value (USD). With initial fund value and final fund value in place, Fund return can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Fund return, Initial fund value, Final fund value and Pref return blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Gp catch up val no = 0 and Pref return = 1. Those are the defaults written into the form — move Initial fund value and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Fund return is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial fund value blank and the page solves for it, reporting Fund return instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Fund return keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/loss-ratio', 'name' => 'Loss ratio Calculator'],
            ['path' => '/finance/lottery-annuity', 'name' => 'Lottery annuity Calculator'],
            ['path' => '/finance/lottery-tax', 'name' => 'Lottery tax Calculator'],
        ],
        'authors' => [],
    ],
];
