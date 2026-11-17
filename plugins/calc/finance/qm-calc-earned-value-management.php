<?php

/**
 * Earned value management
 * /finance/earned-value-management
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Earned value management',
    'meta' => ['title' => 'Earned value management — Formula & Results', 'description' => 'Earned value management works out whichever of scheduled progress, actual progress and budget is left blank. The formula is printed in the form\'s own words.', 'h1' => 'Earned value management Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Task #1',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'schprog1',
                            'label' => 'Scheduled progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actprog1',
                            'label' => 'Actual progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budget1',
                            'label' => 'Budget (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costs1',
                            'label' => 'Costs (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Task #2',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'schprog2',
                            'label' => 'Scheduled progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actprog2',
                            'label' => 'Actual progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budget2',
                            'label' => 'Budget (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costs2',
                            'label' => 'Costs (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Task #3',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'schprog3',
                            'label' => 'Scheduled progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actprog3',
                            'label' => 'Actual progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budget3',
                            'label' => 'Budget (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costs3',
                            'label' => 'Costs (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Task #4',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'schprog4',
                            'label' => 'Scheduled progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actprog4',
                            'label' => 'Actual progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budget4',
                            'label' => 'Budget (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costs4',
                            'label' => 'Costs (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Task #5',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'schprog5',
                            'label' => 'Scheduled progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actprog5',
                            'label' => 'Actual progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budget5',
                            'label' => 'Budget (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costs5',
                            'label' => 'Costs (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Task #6',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'schprog6',
                            'label' => 'Scheduled progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actprog6',
                            'label' => 'Actual progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budget6',
                            'label' => 'Budget (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costs6',
                            'label' => 'Costs (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Task #7',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'schprog7',
                            'label' => 'Scheduled progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actprog7',
                            'label' => 'Actual progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budget7',
                            'label' => 'Budget (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costs7',
                            'label' => 'Costs (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Task #8',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'schprog8',
                            'label' => 'Scheduled progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actprog8',
                            'label' => 'Actual progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budget8',
                            'label' => 'Budget (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costs8',
                            'label' => 'Costs (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Task #9',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'schprog9',
                            'label' => 'Scheduled progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actprog9',
                            'label' => 'Actual progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budget9',
                            'label' => 'Budget (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costs9',
                            'label' => 'Costs (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Task #10',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'schprog10',
                            'label' => 'Scheduled progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actprog10',
                            'label' => 'Actual progress (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'help' => 'Enter a percentage from 0 to 100; for example, 50 means half the task is complete.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budget10',
                            'label' => 'Budget (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costs10',
                            'label' => 'Costs (USD)',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'help' => 'Enter an amount in US dollars. Use the same currency basis for every task.',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'EVM report',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => <<<'TXT'
                                not some([schprog1, actprog1, budget1, costs1, schprog2, actprog2, budget2, costs2, schprog3, actprog3, budget3, costs3, schprog4, actprog4, budget4, costs4, schprog5, actprog5, budget5, costs5, schprog6, actprog6, budget6, costs6, schprog7, actprog7, budget7, costs7, schprog8, actprog8, budget8, costs8, schprog9, actprog9, budget9, costs9, schprog10, actprog10, budget10, costs10], hasValue)
                                TXT, 'text' => 'No task information yet — try adding some values!'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'The following tasks are incomplete:'],
                                ['when' => 'some([schprog1, actprog1, budget1, costs1], hasValue) and not(every([schprog1, actprog1, budget1, costs1], hasValue))', 'text' => '• Task #1'],
                                ['when' => 'some([schprog2, actprog2, budget2, costs2], hasValue) and not(every([schprog2, actprog2, budget2, costs2], hasValue))', 'text' => '• Task #2'],
                                ['when' => 'some([schprog3, actprog3, budget3, costs3], hasValue) and not(every([schprog3, actprog3, budget3, costs3], hasValue))', 'text' => '• Task #3'],
                                ['when' => 'some([schprog4, actprog4, budget4, costs4], hasValue) and not(every([schprog4, actprog4, budget4, costs4], hasValue))', 'text' => '• Task #4'],
                                ['when' => 'some([schprog5, actprog5, budget5, costs5], hasValue) and not(every([schprog5, actprog5, budget5, costs5], hasValue))', 'text' => '• Task #5'],
                                ['when' => 'some([schprog6, actprog6, budget6, costs6], hasValue) and not(every([schprog6, actprog6, budget6, costs6], hasValue))', 'text' => '• Task #6'],
                                ['when' => 'some([schprog7, actprog7, budget7, costs7], hasValue) and not(every([schprog7, actprog7, budget7, costs7], hasValue))', 'text' => '• Task #7'],
                                ['when' => 'some([schprog8, actprog8, budget8, costs8], hasValue) and not(every([schprog8, actprog8, budget8, costs8], hasValue))', 'text' => '• Task #8'],
                                ['when' => 'some([schprog9, actprog9, budget9, costs9], hasValue) and not(every([schprog9, actprog9, budget9, costs9], hasValue))', 'text' => '• Task #9'],
                                ['when' => 'some([schprog10, actprog10, budget10, costs10], hasValue) and not(every([schprog10, actprog10, budget10, costs10], hasValue))', 'text' => '• Task #10'],
                                ['when' => null, 'text' => '&nbsp; Their values aren\'t included in the calculations.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Project overview Total budget: {{global.currencySymbol}}{{total_budget.formattedValue}} Actual cost (AC): {{global.currencySymbol}}{{actual_cost.formattedValue}} Earned value (EV): {{global.currencySymbol}}{{earned_value.formattedValue}} Planned value (PV): {{global.currencySymbol}}{{planned_value.formattedValue}} Cost{{cost_result.valueMarkdown}}Schedule{{schedule_result.valueMarkdown}}Prediction
                        TXT],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";function _createForOfIteratorHelper(r,e){var t="undefined"!=typeof Symbol&&r[Symbol.iterator]||r["@@iterator"];if(!t){if(Array.isArray(r)||(t=_unsupportedIterableToArray(r))||e&&r&&"number"==typeof r.length){t&&(r=t);var _n=0,F=function F(){};return{s:F,n:function n(){return _n>=r.length?{done:!0}:{done:!1,value:r[_n++]}},e:function e(r){throw r},f:F}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var o,a=!0,u=!1;return{s:function s(){t=t.call(r)},n:function n(){var r=t.next();return a=r.done,r},e:function e(r){u=!0,o=r},f:function f(){try{a||null==t["return"]||t["return"]()}finally{if(u)throw o}}}}function _unsupportedIterableToArray(r,a){if(r){if("string"==typeof r)return _arrayLikeToArray(r,a);var t={}.toString.call(r).slice(8,-1);return"Object"===t&&r.constructor&&(t=r.constructor.name),"Map"===t||"Set"===t?Array.from(r):"Arguments"===t||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t)?_arrayLikeToArray(r,a):void 0}}function _arrayLikeToArray(r,a){(null==a||a>r.length)&&(a=r.length);for(var e=0,n=Array(a);e<a;e++)n[e]=r[e];return n}var NUM_TASKS=10;var currency_symbol='$';var locale=navigator.language;var fixed_2_options={minimumFractionDigits:2,maximumFractionDigits:2};omni.onResult([],function(ctx,values){var sum_of_pv=0,sum_of_ac=0,sum_of_ev=0,total_budget=0;for(var i=1;i<=NUM_TASKS;i++){var schprog_i=values["schprog"+i]/100;var actprog_i=values["actprog"+i]/100;var budget_i=values["budget"+i];var costs_i=values["costs"+i];if(all_are_undefined([schprog_i,actprog_i,budget_i,costs_i])){continue}else if(none_are_undefined([schprog_i,actprog_i,budget_i,costs_i])){var pv_i=schprog_i*budget_i;var ac_i=costs_i;var ev_i=actprog_i*budget_i;sum_of_ac+=ac_i;sum_of_ev+=ev_i;sum_of_pv+=pv_i;total_budget+=budget_i}}ctx.exportValue("total_budget",total_budget.toLocaleString(locale,fixed_2_options));ctx.exportValue("actual_cost",sum_of_ac.toLocaleString(locale,fixed_2_options));ctx.exportValue("earned_value",sum_of_ev.toLocaleString(locale,fixed_2_options));ctx.exportValue("planned_value",sum_of_pv.toLocaleString(locale,fixed_2_options));var cost_variance=sum_of_ev===0?0:(sum_of_ev-sum_of_ac)/sum_of_ev;var cpi=sum_of_ev/sum_of_ac;if(sum_of_ac===0&&sum_of_ev===0){ctx.exportValue("cost_result","* Inconclusive (AC = ".concat(currency_symbol,"0 & EV = ").concat(currency_symbol,"0)"))}else{ctx.exportValue("cost_result","* Cost performance index (CPI): ".concat(sum_of_ac===0?"\u221E (AC = ".concat(currency_symbol,"0)"):mathjs.round(cpi,3),"\n* Cost variance: ").concat(mathjs.round(cost_variance*100,2)+"%","\n* Conclusion: **").concat(interpret_cost_performance(cpi,cost_variance),"**"))}var schedule_variance=(sum_of_ev-sum_of_pv)/sum_of_pv;var spi=sum_of_ev/sum_of_pv;if(sum_of_pv===0){ctx.exportValue("schedule_result","* Inconclusive (PV = ".concat(currency_symbol,"0)"))}else{ctx.exportValue("schedule_result","* Schedule performance index (SPI):&nbsp;".concat(mathjs.round(spi,3),"\n* Schedule variance: ").concat(mathjs.round(schedule_variance*100,2),"%\n * Conclusion: **").concat(interpret_schedule_performance(spi,schedule_variance),"**"))}if(sum_of_ev===0||sum_of_ac===0){var no_predictions_msg="* There's **not enough information** available to make accurate predictions. This is why:\n";if(sum_of_ac===0){no_predictions_msg+="    * AC = ".concat(currency_symbol,"0\n")}if(sum_of_ev===0){no_predictions_msg+="    * EV = ".concat(currency_symbol,"0")}ctx.exportValue("predictions_result",no_predictions_msg);return}var estimated_cost_to_complete=(total_budget-sum_of_ev)/cpi;var estimated_cost_at_completion=sum_of_ac+estimated_cost_to_complete;var budget_overrun=estimated_cost_at_completion-total_budget;var budget_overrun_status="Exactly on budget";if(budget_overrun>0){budget_overrun_status="".concat(currency_symbol).concat(budget_overrun.toLocaleString(locale,fixed_2_options)," over budget")}else if(budget_overrun<0){budget_overrun_status="".concat(currency_symbol).concat((-budget_overrun).toLocaleString(locale,fixed_2_options)," under budget")}ctx.exportValue("predictions_result","* Estimate to complete (ETC): ".concat(currency_symbol).concat(estimated_cost_to_complete.toLocaleString(locale,fixed_2_options),"\n* Estimate at completion (EAC): ").concat(currency_symbol).concat(estimated_cost_at_completion.toLocaleString(locale,fixed_2_options),"\n* Projected budget overrun: **").concat(budget_overrun_status,"**"))});function all_are_undefined(array){var _iterator=_createForOfIteratorHelper(array),_step;try{for(_iterator.s();!(_step=_iterator.n()).done;){var item=_step.value;if(item!=undefined){return false}}}catch(err){_iterator.e(err)}finally{_iterator.f()}return true}function none_are_undefined(array){var _iterator2=_createForOfIteratorHelper(array),_step2;try{for(_iterator2.s();!(_step2=_iterator2.n()).done;){var item=_step2.value;if(item==undefined){return false}}}catch(err){_iterator2.e(err)}finally{_iterator2.f()}return true}function interpret_schedule_performance(spi,schedule_variance){if(spi===undefined){if(schedule_variance===0){return"on schedule"}if(schedule_variance>0){return"ahead of schedule"}if(schedule_variance<0){return"behind schedule"}}else{if(spi===1){return"on schedule"}if(spi<1){return"behind schedule"}if(spi>1){return"ahead of schedule"}}}function interpret_cost_performance(cpi,cost_variance){if(cpi===undefined){if(cost_variance===0){return"on budget"}if(cost_variance>0){return"under budget"}if(cost_variance<0){return"over budget"}}else{if(cpi===1){return"on budget"}if(cpi<1){return"over budget"}if(cpi>1){return"under budget"}}}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'The Earned value management calculator turns the scheduled progress and the actual progress into the answer.',
        'sections' => [
            ['title' => 'How does the Earned value management calculator work?', 'html' => <<<'TXT'
            <p>The Earned value management calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you type in the scheduled progress (Task #1), the actual progress (Task #1), the budget (Task #1) and the costs (Task #1).</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Entry format</th><th>Role</th></tr></thead><tbody><tr><td><strong>Scheduled progress (Task #1)</strong></td><td>Enter a percentage from 0 to 100.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Actual progress (Task #1)</strong></td><td>Enter a percentage from 0 to 100.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Budget (Task #1)</strong></td><td>Enter an amount in US dollars.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Costs (Task #1)</strong></td><td>Enter an amount in US dollars.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Scheduled progress (Task #2)</strong></td><td>Enter a percentage from 0 to 100.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Actual progress (Task #2)</strong></td><td>Enter a percentage from 0 to 100.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Budget (Task #2)</strong></td><td>Enter an amount in US dollars.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Costs (Task #2)</strong></td><td>Enter an amount in US dollars.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Scheduled progress (Task #3)</strong></td><td>Enter a percentage from 0 to 100.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Actual progress (Task #3)</strong></td><td>Enter a percentage from 0 to 100.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Budget (Task #3)</strong></td><td>Enter an amount in US dollars.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Costs (Task #3)</strong></td><td>Enter an amount in US dollars.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Scheduled progress (Task #4)</strong></td><td>Enter a percentage from 0 to 100.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Actual progress (Task #4)</strong></td><td>Enter a percentage from 0 to 100.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Budget (Task #4)</strong></td><td>Enter an amount in US dollars.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Costs (Task #4)</strong></td><td>Enter an amount in US dollars.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Scheduled progress (Task #5)</strong></td><td>Enter a percentage from 0 to 100.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Actual progress (Task #5)</strong></td><td>Enter a percentage from 0 to 100.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Budget (Task #5)</strong></td><td>Enter an amount in US dollars.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Costs (Task #5)</strong></td><td>Enter an amount in US dollars.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Scheduled progress (Task #6)</strong></td><td>Enter a percentage from 0 to 100.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Actual progress (Task #6)</strong></td><td>Enter a percentage from 0 to 100.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Budget (Task #6)</strong></td><td>Enter an amount in US dollars.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Costs (Task #6)</strong></td><td>Enter an amount in US dollars.</td><td>US Dollar</td><td>You supply it</td></tr></tbody></table><p>The table lists the first 24 of 40 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <p>Enter progress as a percentage from 0 to 100: 50 means half complete. Enter every budget and cost in US dollars, using the same basis for all task rows. This custom calculation does not convert currencies or percentage units, so a mixed scale would make the totals misleading. Results are formatted to two decimal places for money and three decimal places for performance indices.</p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Earned value management calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two offers that quote their costs in different ways</li><li>Preparing questions for a lender, an accountant or an adviser</li><li>Building a monthly budget and testing how one number shifts the rest</li><li>Any time the same 2 figures keep coming back — the scheduled progress and the actual progress </li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Keep the units you enter consistent. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these finance calculators cover the neighbouring steps: <a href="/finance/attrition-rate">Attrition rate</a>, <a href="/finance/auto-loan">Auto loan</a> and <a href="/finance/avc">Average variable cost</a>.</p>
            TXT],
            ['title' => 'Build a consistent set of task inputs', 'html' => <<<'TXT'
            <p>For each task, scheduled progress and actual progress are percentages, while budget and costs are money amounts. Keep the two percentages on the same scale and use the same currency basis for every budget and cost. The calculation combines these task-level entries into project totals; mixing a percentage written as a fraction with one written as a whole-number percent, or mixing currencies without conversion, makes the totals misleading even if the arithmetic runs correctly.</p>
            <p>Use scheduled progress for the share of the task that should be complete at the status date, and actual progress for the share that is complete at that same date. Do not enter a calendar date in either field. A task that is 40 percent complete is not necessarily 40 percent of its planned duration elapsed: progress should represent the project team's chosen measure of completed work. Apply that measure consistently across tasks and reporting periods.</p>
            <p>The task budget is the approved budget for the scope represented by that row, and costs are the actual costs accumulated for that scope by the status date. Avoid putting the full project budget into every row if the project has been split into task budgets; doing so counts the same planned money repeatedly. Conversely, leaving out a task that has a budget or cost will make the project-level picture incomplete. Enter all four values for a task together. The script ignores a row if all of its values are blank and does not treat a partially filled row as a complete observation.</p>
            TXT],
            ['title' => 'Read the cost and schedule indicators in context', 'html' => <<<'TXT'
            <p>The page totals planned value from scheduled progress multiplied by each task's budget, and earned value from actual progress multiplied by that same budget. Actual cost is the sum of the task costs. These totals give a common basis for comparing progress and expenditure: earned value describes the budgeted value of completed work, not the cash spent and not a market valuation of the project.</p>
            <p>The cost performance index compares earned value with actual cost. An index above one means the measured work's budgeted value exceeds the cost entered so far; below one means the cost is greater than that earned value. The cost variance shown here is relative to earned value, so read the percentage with that denominator in mind. A favourable indicator does not guarantee that the final project will finish under budget: estimates depend on the quality of the progress and cost data and on whether current performance continues.</p>
            <p>The schedule performance index compares earned value with planned value at the status date. It is a value-based measure of progress against plan, not a direct statement that the project is a specific number of days early or late. Schedule variance here is also a percentage comparison. A project can have a promising index while a critical milestone is still at risk, so use the indicators with the actual schedule, dependencies, deliverables and team knowledge.</p>
            <p>When a denominator is zero, some ratios cannot be interpreted. The page reports an inconclusive state for those cases rather than a meaningful performance score. A zero can mean no work was planned, no cost was recorded yet, or the inputs are incomplete; it is not automatically evidence of perfect performance. Check the underlying rows before drawing a conclusion.</p>
            TXT],
            ['title' => 'Use the forecast as a scenario, not a promise', 'html' => <<<'TXT'
            <p>The estimate to complete and estimate at completion extend the current cost performance into a projection. In plain terms, the page asks what the remaining work might cost if the observed cost efficiency continues, then combines that estimate with costs already incurred. This is a useful what-if scenario, but it is not a bottom-up estimate from the people doing the remaining work and it does not account for a new risk, scope change, procurement decision or recovery plan unless that effect is already represented in the inputs.</p>
            <p>Before sharing a forecast, record the status date, the scope included, the progress rules used, and the source of each cost. Compare the projection with a current estimate from the project team. If the two differ, investigate the assumptions rather than selecting whichever number is more comfortable. A trend based on a small amount of completed work can swing sharply as more tasks are measured; repeated reports are more informative than a single snapshot.</p>
            <p>Use this calculator alongside a baseline schedule and a cost ledger. Reconcile the task budgets with the approved budget, and make sure actual costs cover the same period and scope as the progress measures. If scope has changed, document the approved change and update the baseline consistently before interpreting a variance. A mathematically precise output can still be a poor project signal when the source data describe different scopes or dates.</p>
            <p>Finally, treat the indicators as prompts for a conversation. Ask which task is driving the gap, whether the status is measured or estimated, and what action would change the next reporting period. The tool can combine consistent inputs quickly; it cannot decide whether a reported percentage is credible, whether a cost is committed or paid, or what a team should do next.</p>
            TXT],
            ['title' => 'Keep the reporting period fixed', 'html' => <<<'TXT'
            <p>Earned-value comparisons are meaningful only when planned progress, actual progress and recorded cost refer to the same status date. If progress is measured at month-end but costs include an additional week, the ratios compare different periods and can distort the picture. Use the same cutoff for each task, explain any late invoices or accruals, and avoid mixing a revised plan with an earlier baseline. When reporting again, preserve the earlier snapshot rather than silently overwriting it; the direction of change is often more useful than one isolated index.</p><p>It also helps to agree on how progress is credited before the project begins. A task may be measured by a tangible deliverable, a count of completed units, or a documented milestone, but the method should be stable across comparable tasks. A subjective percentage can create apparent precision without a repeatable basis. If the work is not meaningfully measurable yet, say so and keep that row out until its values can be supported. Clear definitions make the resulting totals easier to discuss with sponsors and delivery teams.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Earned value management calculator?', 'a' => 'The form asks for the scheduled progress and the actual progress, which is 40 fields in total.'],
            ['q' => 'Can I enter scheduled progress (Task #1) in a different unit?', 'a' => 'Yes. Scheduled progress (Task #1) opens in percent and the chip beside it offers 6 units.'],
            ['q' => 'What is the difference between scheduled and actual progress?', 'a' => 'Scheduled progress is the share expected to be complete by the status date; actual progress is the share measured as complete by that same date.'],
            ['q' => 'What does the calculator use to estimate earned value?', 'a' => 'It multiplies each task budget by actual progress, then adds the task values. Use one consistent progress and currency basis across tasks.'],
            ['q' => 'Why are the results inconclusive when a total is zero?', 'a' => <<<'TXT'
            A zero planned value, earned value or actual cost can make a performance ratio undefined or uninformative. Check whether the rows are complete and the reporting date is aligned.
            TXT],
            ['q' => 'Is the estimate at completion a guaranteed final cost?', 'a' => <<<'TXT'
            No. It extends the observed cost performance as a scenario; it does not account for future scope changes, risks or recovery actions unless they are reflected in the inputs.
            TXT],
            ['q' => 'How should I compare two reporting periods?', 'a' => 'Use the same scope, baseline, currency and status-date rules, and retain each snapshot so changes can be traced rather than overwritten.'],
        ],
        'related' => [
            ['path' => '/finance/attrition-rate', 'name' => 'Attrition rate'],
            ['path' => '/finance/auto-loan', 'name' => 'Auto loan'],
            ['path' => '/finance/avc', 'name' => 'Average variable cost'],
        ],
        'authors' => [],
    ],
];
