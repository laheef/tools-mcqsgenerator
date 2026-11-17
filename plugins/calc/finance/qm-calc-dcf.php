<?php

/**
 * Discounted cash flow
 * /finance/dcf
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Discounted cash flow',
    'meta' => ['title' => 'Discounted cash flow: Formula, Steps & Results', 'description' => 'Discounted cash flow works out growth value and terminal value and reports both. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Discounted cash flow Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'choicemain',
                            'label' => 'DCF method',
                            'type' => 'select',
                            'options' => ['Free cash flow to firm (FCFF)' => '0', 'Earnings per share (EPS)' => '1'],
                            'dataset' => 'DCF method options',
                            'default' => 'Free cash flow to firm (FCFF)',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'DCF using FCFF',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p1',
                            'label' => 'First FCFF',
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
                            'name' => 'p2',
                            'label' => 'Second FCFF',
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
                            'name' => 'p3',
                            'label' => 'Third FCFF',
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
                            'name' => 'p4',
                            'label' => 'Fourth FCFF',
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
                            'name' => 'p5',
                            'label' => 'Fifth FCFF',
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
                            'name' => 'p6',
                            'label' => 'Sixth FCFF ',
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
                            'name' => 'p7',
                            'label' => 'Seventh FCFF',
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
            'title' => 'Net debt',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash',
                            'label' => 'Cash',
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
                            'name' => 'outstandingdebt',
                            'label' => 'Outstanding debt',
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
            'title' => 'Growth and discount rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g',
                            'label' => 'Perpetual growth',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wacc',
                            'label' => 'Weighted average cost of capital',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Shares and its market value',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'outstandingshares',
                            'label' => 'Outstanding shares',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Share price',
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
            'title' => 'Results',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => 'DCF using EPS',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'EPS',
                            'label' => 'Earnings per share',
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
                            'name' => 'discount_rate',
                            'label' => 'Discount rate',
                            'type' => 'number',
                            'help' => 'Usually, this is the weighted average cost of capital or WACC.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '11.00',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Predictable growth',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'growth_rate',
                            'label' => 'Growth rate',
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
                            'name' => 'next_years',
                            'label' => 'Over the next...',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Terminal growth',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'terminal_growth_rate',
                            'label' => 'Terminal growth rate',
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
                            'name' => 'terminal_duration',
                            'label' => 'Over the next...',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Company value',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'growth_value',
                            'label' => 'Growth value',
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
                            'name' => 'terminal_value',
                            'label' => 'Terminal value',
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
                            'name' => 'DCF',
                            'label' => 'Total intrinsic value',
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
            'title' => 'Hidden variables - exported strings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'string1',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'The projected cash flows, discount rate, and perpetual growth rate give:' => '1',
                                '• The terminal value of ' => '2',
                                '• The value of the firm equal to ' => '3',
                                '• The value of the equity equal to ' => '4',
                                '• The fair value per share equal to ' => '5',
                                'The company is overvalued by ' => '6',
                                'The company is undervalued by ' => '7',
                            ],
                            'dataset' => 'Exported strings',
                            'control' => 'DROPDOWN',
                            'default' => 'The projected cash flows, discount rate, and perpetual growth rate give:',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'string2',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'The projected cash flows, discount rate, and perpetual growth rate give:' => '1',
                                '• The terminal value of ' => '2',
                                '• The value of the firm equal to ' => '3',
                                '• The value of the equity equal to ' => '4',
                                '• The fair value per share equal to ' => '5',
                                'The company is overvalued by ' => '6',
                                'The company is undervalued by ' => '7',
                            ],
                            'dataset' => 'Exported strings',
                            'control' => 'DROPDOWN',
                            'default' => '• The terminal value of ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'string3',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'The projected cash flows, discount rate, and perpetual growth rate give:' => '1',
                                '• The terminal value of ' => '2',
                                '• The value of the firm equal to ' => '3',
                                '• The value of the equity equal to ' => '4',
                                '• The fair value per share equal to ' => '5',
                                'The company is overvalued by ' => '6',
                                'The company is undervalued by ' => '7',
                            ],
                            'dataset' => 'Exported strings',
                            'control' => 'DROPDOWN',
                            'default' => '• The value of the firm equal to ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'string4',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'The projected cash flows, discount rate, and perpetual growth rate give:' => '1',
                                '• The terminal value of ' => '2',
                                '• The value of the firm equal to ' => '3',
                                '• The value of the equity equal to ' => '4',
                                '• The fair value per share equal to ' => '5',
                                'The company is overvalued by ' => '6',
                                'The company is undervalued by ' => '7',
                            ],
                            'dataset' => 'Exported strings',
                            'control' => 'DROPDOWN',
                            'default' => '• The value of the equity equal to ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'string5',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'The projected cash flows, discount rate, and perpetual growth rate give:' => '1',
                                '• The terminal value of ' => '2',
                                '• The value of the firm equal to ' => '3',
                                '• The value of the equity equal to ' => '4',
                                '• The fair value per share equal to ' => '5',
                                'The company is overvalued by ' => '6',
                                'The company is undervalued by ' => '7',
                            ],
                            'dataset' => 'Exported strings',
                            'control' => 'DROPDOWN',
                            'default' => '• The fair value per share equal to ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'string6',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'The projected cash flows, discount rate, and perpetual growth rate give:' => '1',
                                '• The terminal value of ' => '2',
                                '• The value of the firm equal to ' => '3',
                                '• The value of the equity equal to ' => '4',
                                '• The fair value per share equal to ' => '5',
                                'The company is overvalued by ' => '6',
                                'The company is undervalued by ' => '7',
                            ],
                            'dataset' => 'Exported strings',
                            'control' => 'DROPDOWN',
                            'default' => 'The company is overvalued by ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'string7',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'The projected cash flows, discount rate, and perpetual growth rate give:' => '1',
                                '• The terminal value of ' => '2',
                                '• The value of the firm equal to ' => '3',
                                '• The value of the equity equal to ' => '4',
                                '• The fair value per share equal to ' => '5',
                                'The company is overvalued by ' => '6',
                                'The company is undervalued by ' => '7',
                            ],
                            'dataset' => 'Exported strings',
                            'control' => 'DROPDOWN',
                            'default' => 'The company is undervalued by ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'string8',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'The projected cash flows, discount rate, and perpetual growth rate give:' => '1',
                                '• The terminal value of ' => '2',
                                '• The value of the firm equal to ' => '3',
                                '• The value of the equity equal to ' => '4',
                                '• The fair value per share equal to ' => '5',
                                'The company is overvalued by ' => '6',
                                'The company is undervalued by ' => '7',
                            ],
                            'dataset' => 'Exported strings',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'print1', 'label' => 'Print1', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'print2', 'label' => 'Print2', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'result2', 'label' => 'Result2', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'print3', 'label' => 'Print3', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'result3', 'label' => 'Result3', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'print4', 'label' => 'Print4', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'result4', 'label' => 'Result4', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'print5', 'label' => 'Print5', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'result5', 'label' => 'Result5', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'print67', 'label' => 'Print67', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'result67', 'label' => 'Result67', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'growth_value= EPS*((1+growth_rate)/(1+discount_rate))*(1-((1+growth_rate)/(1+discount_rate))^next_years)/(1-((1+growth_rate)/(1+discount_rate)))',
            'results' => ['EPS' => <<<'TXT'
            growth_value*(-discount_rate + growth_rate)/(growth_rate*pow((growth_rate + 1)/(discount_rate + 1), next_years) - growth_rate + pow((growth_rate + 1)/(discount_rate + 1), next_years) - 1)
            TXT, 'growth_value' => <<<'TXT'
            EPS*(-growth_rate*pow((growth_rate + 1)/(discount_rate + 1), next_years) + growth_rate - pow((growth_rate + 1)/(discount_rate + 1), next_years) + 1)/(discount_rate - growth_rate)
            TXT, 'next_years' => 'log((EPS*growth_rate + EPS - discount_rate*growth_value + growth_rate*growth_value)/(EPS*(growth_rate + 1)))/log((growth_rate + 1)/(discount_rate + 1))'],
        ],
        [
            'title' => <<<'TXT'
            terminal_value = EPS*((1+growth_rate)/(1+discount_rate))^next_years *((1+terminal_growth_rate)/(1+discount_rate))/(1-((1+terminal_growth_rate)/(1+discount_rate)))*(1-((1+terminal_growth_rate)/(1+discount_rate))^terminal_duration)
            TXT,
            'results' => [
                'terminal_value' => <<<'TXT'
                EPS*pow((growth_rate + 1)/(discount_rate + 1), next_years)*(-terminal_growth_rate*pow((terminal_growth_rate + 1)/(discount_rate + 1), terminal_duration) + terminal_growth_rate - pow((terminal_growth_rate + 1)/(discount_rate + 1), terminal_duration) + 1)/(discount_rate - terminal_growth_rate)
                TXT,
                'EPS' => <<<'TXT'
                terminal_value*pow((growth_rate + 1)/(discount_rate + 1), -next_years)*(-discount_rate + terminal_growth_rate)/(terminal_growth_rate*pow((terminal_growth_rate + 1)/(discount_rate + 1), terminal_duration) - terminal_growth_rate + pow((terminal_growth_rate + 1)/(discount_rate + 1), terminal_duration) - 1)
                TXT,
                'terminal_duration' => <<<'TXT'
                log(pow((growth_rate + 1)/(discount_rate + 1), -next_years)*(EPS*terminal_growth_rate*pow((growth_rate + 1)/(discount_rate + 1), next_years) + EPS*pow((growth_rate + 1)/(discount_rate + 1), next_years) - discount_rate*terminal_value + terminal_growth_rate*terminal_value)/(EPS*(terminal_growth_rate + 1)))/log((terminal_growth_rate + 1)/(discount_rate + 1))
                TXT,
                'growth_rate' => <<<'TXT'
                discount_rate*pow(-terminal_value*(discount_rate - terminal_growth_rate)/(EPS*(terminal_growth_rate + 1)*(pow((terminal_growth_rate + 1)/(discount_rate + 1), terminal_duration) - 1)), 1/next_years) + pow(-terminal_value*(discount_rate - terminal_growth_rate)/(EPS*(terminal_growth_rate + 1)*(pow((terminal_growth_rate + 1)/(discount_rate + 1), terminal_duration) - 1)), 1/next_years) - 1
                TXT,
                'next_years' => <<<'TXT'
                log(-terminal_value*(discount_rate - terminal_growth_rate)/(EPS*(terminal_growth_rate + 1)*(pow((terminal_growth_rate + 1)/(discount_rate + 1), terminal_duration) - 1)))/log((growth_rate + 1)/(discount_rate + 1))
                TXT,
            ],
        ],
        [
            'title' => 'DCF = growth_value+terminal_value',
            'results' => ['terminal_value' => 'DCF - growth_value', 'DCF' => 'growth_value + terminal_value', 'growth_value' => 'DCF - terminal_value'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.onResult(["g","wacc"],function(ctx,values){var pList=[];for(var i=1;i<=7;i++){var p=values["p".concat(i)];if(p!==undefined&&p!==null&&!isNaN(p)){pList.push(p)}}if(pList[pList.length-1]===undefined){pList.pop()}for(var _i=0;_i<pList.length;_i++){if(pList[_i]===undefined){pList.splice(_i,1);_i--}}var g=values.g;var wacc=values.wacc;var outstandingdebt=values.outstandingdebt;var cash=values.cash;var outstandingshares=values.outstandingshares;var price=values.price;var pListLength=pList.length;var lastpvalue=pList[pListLength-1];var terminalvalue=tvn(lastpvalue,g,wacc);var valuefirm1=valuefirmprojectable(pList,wacc);var valuefirmfinal=valuefirm1+terminalvalue/Math.pow(1+wacc/100,pListLength);var valueequity=valuefirmfinal-outstandingdebt+cash;var fairvalue=valueequity/outstandingshares;var undervaluepercentage=(fairvalue-price)/price*100;var overvaluepercentage=(price-fairvalue)/fairvalue*100;if(lastpvalue>0){if(g!==undefined&&wacc!==undefined&&wacc>g){ctx.exportValue("print1",ctx.getRawInput("string1"));ctx.exportValue("print2",ctx.getRawInput("string2"));ctx.exportValue("result2",mathjs.round(terminalvalue,2))}if(wacc!==undefined&&g!==undefined&&wacc>g){ctx.exportValue("print3",ctx.getRawInput("string3"));ctx.exportValue("result3",mathjs.round(valuefirmfinal,2))}if(wacc!==undefined&&g!==undefined&&wacc>g&&outstandingdebt!==undefined&&cash!==undefined){ctx.exportValue("print4",ctx.getRawInput("string4"));ctx.exportValue("result4",mathjs.round(valueequity,2))}if(valueequity!==undefined&&outstandingshares!==undefined&&wacc>g){ctx.exportValue("print5",ctx.getRawInput("string5"));ctx.exportValue("result5",mathjs.round(fairvalue,2))}if(price>fairvalue&&fairvalue!==undefined&&outstandingshares!==undefined&&price!==undefined&&wacc>g){ctx.exportValue("print67",ctx.getRawInput("string6"));ctx.exportValue("result67",mathjs.round(overvaluepercentage,2))}else if(price<fairvalue&&valueequity!==undefined&&outstandingshares!==undefined&&price!==undefined&&wacc>g){ctx.exportValue("print67",ctx.getRawInput("string7"));ctx.exportValue("result67",mathjs.round(undervaluepercentage,2))}}});function valuefirmprojectable(array,wacc){var i;var result=0;for(i=0;i<array.length;i++){result+=array[i]/Math.pow(1+wacc/100,i+1)}return result}function tvn(lastpvalue,g,wacc){return lastpvalue*(1+g/100)/(wacc/100-g/100)}//# sourceURL=customJs.js
    /*
     * Shared helpers for the hand-written repairs in data/calc/supplement/.
     *
     * Every supplement script is evaluated in its own closed scope, so anything the
     * repairs have in common has to travel with each one. Supplement::apply()
     * prepends this file to every page script it merges.
     */
    
    /**
     * The numbers in one free-text box: "1, 2, 3", "1 2 3", "1;2;3" or one per line.
     *
     * A statistics page that asked for fifty separate boxes now asks for one, and
     * the visitor types a list the way they would in a spreadsheet cell. Anything
     * that is not a number is ignored rather than turned into NaN — a stray comma
     * or an accidental letter must not poison the whole set.
     */
    function snumlist(text) {
      if (typeof text !== 'string' || text.trim() === '') return [];
      var out = [];
      text.split(/[\s,;]+/).forEach(function (piece) {
        if (piece === '') return;
        var n = Number(piece.replace(/(\d),(?=\d{3}\b)/g, '$1'));
        if (isFinite(n)) out.push(n);
      });
      return out;
    }
    
    /** Median of an already sorted array of numbers. */
    function smedian(sorted) {
      var n = sorted.length;
      if (!n) return NaN;
      var mid = Math.floor(n / 2);
      return n % 2 ? sorted[mid] : (sorted[mid - 1] + sorted[mid]) / 2;
    }
    
    /** The numbers a visitor actually typed, in field order, skipping blanks. */
    function snumbers(values, pattern, limit) {
      var out = [];
      for (var i = 1; i <= limit; i++) {
        var key = pattern.replace('%d', i);
        var raw = values[key];
        if (raw === undefined || raw === null || raw === '') continue;
        var n = Number(raw);
        if (!isFinite(n)) continue;
        out.push({ key: key, n: n });
      }
      return out;
    }
    
    /** A plain number, no trailing zeros, at most `d` decimals. */
    function snum(n, d) {
      if (!isFinite(n)) return '—';
      var v = Number(n.toFixed(d === undefined ? 4 : d));
      return String(v);
    }
    
    /** Round to `d` decimals but keep it a number. */
    function sround(n, d) {
      var f = Math.pow(10, d === undefined ? 2 : d);
      return Math.round(n * f) / f;
    }
    
    /** Greatest common divisor of two whole numbers. */
    function sgcd(x, y) {
      x = Math.abs(Math.round(x));
      y = Math.abs(Math.round(y));
      return y === 0 ? x : sgcd(y, x % y);
    }
    
    /** "10" / "1/3" — a fraction reduced to lowest terms. */
    function sfrac(part, whole) {
      if (!whole) return '—';
      var a = Math.round(part), b = Math.round(whole);
      var g = sgcd(a, b) || 1;
      if (g > 1) { a = a / g; b = b / g; }
      return b === 1 ? String(a) : a + '/' + b;
    }
    
    /** Minimal escape for text that came out of the definition or a label. */
    function sesc(s) {
      return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }
    
    /**
     * A table from a header list and rows of cells. Cells are printed as they are
     * given, so a caller can pass a pre-formatted string.
     */
    function stable(head, rows, foot) {
      var html = '<table><thead><tr>';
      head.forEach(function (h) { html += '<th>' + h + '</th>'; });
      html += '</tr></thead><tbody>';
      rows.forEach(function (r) {
        html += '<tr>';
        r.forEach(function (c) { html += '<td>' + c + '</td>'; });
        html += '</tr>';
      });
      if (foot) {
        html += '<tr>';
        foot.forEach(function (c) { html += '<th>' + c + '</th>'; });
        html += '</tr>';
      }
      return html + '</tbody></table>';
    }
    
    /** Turn a list of [label, value] pairs into "A: 3, B: 4" style prose. */
    function slist(pairs) {
      return pairs.map(function (p) { return p[0] + ': ' + p[1]; }).join(', ');
    }
    
    /**
     * Tidy a value a page script published.
     *
     * The harvested scripts speak the reference site's front-end dialect: `==2==`
     * for a subscript, `**bold**`, `<br>` between lines, and often a trailing
     * comma or a dangling colon left where a second half of a sentence used to
     * follow. Our panel prints the string as plain text, so those markers would
     * land on screen as punctuation soup. This turns them into something readable
     * without changing the value itself.
     */
    function sclean(value) {
      var s = value === null || value === undefined ? '' : String(value);
      var sub = {'0': '₀', '1': '₁', '2': '₂', '3': '₃', '4': '₄',
                 '5': '₅', '6': '₆', '7': '₇', '8': '₈', '9': '₉'};
      s = s.replace(/==(\d+)==/g, function (all, d) {
        return d.split('').map(function (c) { return sub[c] || c; }).join('');
      });
      /* the same convention for superscripts: "^^+^^" is a charge, "^^2^^" an index */
      var sup = {'0': '⁰', '1': '¹', '2': '²', '3': '³', '4': '⁴',
                 '5': '⁵', '6': '⁶', '7': '⁷', '8': '⁸', '9': '⁹',
                 '+': '⁺', '-': '⁻'};
      s = s.replace(/\^\^([0-9+-]+)\^\^/g, function (all, d) {
        return d.split('').map(function (c) { return sup[c] || c; }).join('');
      });
      s = s.replace(/\*\*(.+?)\*\*/g, '$1');
      s = s.replace(/<br\s*\/?>/gi, ' ');
      s = s.replace(/<\/(p|div|li)>/gi, ' ');
      s = s.replace(/<[^>]+>/g, '');
      s = s.replace(/&nbsp;/g, ' ').replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&');
      /* invisible characters the reference used as "this line is blank": an Arabic
         letter mark, a zero-width space, a byte-order mark. They render as nothing
         and would otherwise keep an empty row looking filled. */
      s = s.replace(/[\u061C\u200B\u200C\u200D\uFEFF\u00AD]/g, '');
      s = s.replace(/\s+/g, ' ').trim();
      s = s.replace(/[,;:\-–—]\s*$/, '').trim();
      return s;
    }
    
    /**
     * Turn a drop-down option's id back into its label.
     *
     * Several harvested scripts publish `ctx.getRawInput("…")` of a select, which
     * is the option's uid (`z3nTqAbVhlMSz-B46c7Xk`) and not the words the visitor
     * picked. The uid is in the page markup as an option value or a radio value,
     * so the label is one lookup away.
     */
    function sdelabel(value) {
      if (typeof value !== 'string' || !/[A-Za-z0-9_-]{20,28}/.test(value)) { return value; }
      var one = function (id) {
        if (!/^[A-Za-z0-9_-]{20,28}$/.test(id)) { return id; }
        var el = document.querySelector('[value="' + id + '"]');
        if (!el) { return id; }
        if (el.tagName === 'OPTION') { return (el.textContent || '').trim() || id; }
        var lab = el.closest ? el.closest('label') : null;
        return lab ? ((lab.textContent || '').trim() || id) : id;
      };
      /* a published value can be several ids joined by commas ("Possibilities,
         MD4, NTLM"), so map each piece rather than the whole string */
      return value.split(/\s*,\s*/).map(one).join(', ');
    }
    
    /* The page hook has already run by the time this one does, so the values
       below are its results: tidy the reference site's markup out of them
       before they reach the panel. */
    omni.onResult([], function (ctx, values) {
      var rows = [
        'print1',
        'print2',
        'result2',
        'print3',
        'result3',
        'print4',
        'result4',
        'print5',
        'result5',
        'print67',
        'result67'
      ];
      rows.forEach(function (name) {
        var v = values[name];
        if (typeof v !== 'string' || v.trim() === '') { return; }
        var text = sclean(sdelabel(v));
        ctx.exportValue(name, text === '' ? null : text);
      });
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter DCF method, First FCFF and Second FCFF into Discounted cash flow and the answer comes back as Print1 and Print2. There is no hidden constant here: change print1 and DCF method moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Discounted cash flow calculator works', 'html' => <<<'TXT'
            <p>The Discounted cash flow calculator applies one relationship to 23 numbers and reports Print1, Print2 and Result2.</p><p>In the form&#039;s own words, Growth value = Earnings per share × ( − Growth rate × ((Growth rate + 1) ÷ (Discount rate + 1))^(Over the next...) + Growth rate − ((Growth rate + 1) ÷ (Discount rate + 1))^(Over the next...) + 1) ÷ (Discount rate − Growth rate).</p><p>What comes back is Print1, Print2, Result2 and Print3 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 23 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>DCF method</strong> — a plain number, no unit</li><li><strong>First FCFF</strong> — in USD</li><li><strong>Second FCFF</strong> — in USD</li><li><strong>Third FCFF</strong> — in USD</li><li><strong>Fourth FCFF</strong> — in USD</li><li><strong>Fifth FCFF</strong> — in USD</li><li><strong>Sixth FCFF</strong> — in USD</li><li><strong>Seventh FCFF</strong> — in USD</li><li><strong>Cash</strong> — in USD</li><li><strong>Outstanding debt</strong> — in USD</li><li><strong>Perpetual growth</strong> — in %</li><li><strong>Weighted average cost of capital</strong> — in %</li><li><strong>Outstanding shares</strong> — a plain number, no unit</li><li><strong>Share price</strong> — in USD</li><li><strong>Earnings per share</strong> — in USD</li><li><strong>Discount rate</strong> — in percent. Usually, this is the weighted average cost of capital or WACC.</li><li><strong>Growth rate</strong> — in percent</li><li><strong>Over the next…</strong> — in years</li><li><strong>Terminal growth rate</strong> — in percent</li><li><strong>Over the next…</strong> — in years</li><li><strong>Growth value</strong> — in USD</li><li><strong>Terminal value</strong> — in USD</li><li><strong>Total intrinsic value</strong> — in USD</li></ul><p>The result boxes are Print1, Print2, Result2, Print3, Result3, Print4, Result4, Print5, Result5, Print67, Result67; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, DCF method = 0, First FCFF = 3 USD, Second FCFF = 4 USD, Third FCFF = 5 USD, Fourth FCFF = 6 USD, Fifth FCFF = 7 USD, Sixth FCFF = 8 USD, Seventh FCFF = 9 USD, Cash = 10 USD, Outstanding debt = 2 USD, Perpetual growth = 3 %, Weighted average cost of capital = 4 %, Outstanding shares = 5, Share price = 6 USD, Discount rate = 11 perc and Terminal growth rate = 8 perc; the answers are <strong>String 1</strong> = 1, <strong>String 2</strong> = 2, <strong>String 3</strong> = 3, <strong>String 4</strong> = 4, <strong>String 5</strong> = 5, <strong>String 6</strong> = 6 and <strong>String 7</strong> = 7.</p><ul><li><strong>String 1</strong> = 1</li><li><strong>String 2</strong> = 2</li><li><strong>String 3</strong> = 3</li><li><strong>String 4</strong> = 4</li><li><strong>String 5</strong> = 5</li><li><strong>String 6</strong> = 6</li><li><strong>String 7</strong> = 7</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Growth value</strong> = <code>Earnings per share × ( − Growth rate × ((Growth rate + 1) ÷ (Discount rate + 1))^(Over the next...) + Growth rate − ((Growth rate + 1) ÷ (Discount rate + 1))^(Over the next...) + 1) ÷ (Discount rate − Growth rate)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>String 1</strong> = 1, <strong>String 2</strong> = 2, <strong>String 3</strong> = 3, <strong>String 4</strong> = 4, <strong>String 5</strong> = 5, <strong>String 6</strong> = 6 and <strong>String 7</strong> = 7. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Discount rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Growth value</strong> = <code>Earnings per share × ( − Growth rate × ((Growth rate + 1) ÷ (Discount rate + 1))^(Over the next...) + Growth rate − ((Growth rate + 1) ÷ (Discount rate + 1))^(Over the next...) + 1) ÷ (Discount rate − Growth rate)</code></li><li><strong>Earnings per share</strong> = <code>Growth value × ( − Discount rate + Growth rate) ÷ (Growth rate × ((Growth rate + 1) ÷ (Discount rate + 1))^(Over the next...) − Growth rate + ((Growth rate + 1) ÷ (Discount rate + 1))^(Over the next...) − 1)</code></li><li><strong>Over the next…</strong> = <code>ln((Earnings per share × Growth rate + Earnings per share − Discount rate × Growth value + Growth rate × Growth value) ÷ (Earnings per share × (Growth rate + 1))) ÷ ln((Growth rate + 1) ÷ (Discount rate + 1))</code></li><li><strong>Total intrinsic value</strong> = <code>Growth value + Terminal value</code></li><li><strong>Terminal value</strong> = <code>Total intrinsic value − Growth value</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Growth value</strong> = <code>Earnings per share × ( − Growth rate × ((Growth rate + 1) ÷ (Discount rate + 1))^(Over the next...) + Growth rate − ((Growth rate + 1) ÷ (Discount rate + 1))^(Over the next...) + 1) ÷ (Discount rate − Growth rate)</code> — the form to use when Earnings per share, Growth rate, Discount rate and Over the next… are the values you have.</li><li><strong>Earnings per share</strong> = <code>Growth value × ( − Discount rate + Growth rate) ÷ (Growth rate × ((Growth rate + 1) ÷ (Discount rate + 1))^(Over the next...) − Growth rate + ((Growth rate + 1) ÷ (Discount rate + 1))^(Over the next...) − 1)</code> — the form to use when Growth value, Discount rate, Growth rate and Over the next… are the values you have.</li><li><strong>Over the next…</strong> = <code>ln((Earnings per share × Growth rate + Earnings per share − Discount rate × Growth value + Growth rate × Growth value) ÷ (Earnings per share × (Growth rate + 1))) ÷ ln((Growth rate + 1) ÷ (Discount rate + 1))</code> — the form to use when Earnings per share, Growth rate, Discount rate and Growth value are the values you have.</li><li><strong>Total intrinsic value</strong> = <code>Growth value + Terminal value</code> — the form to use when Growth value and Terminal value are the values you have.</li><li><strong>Terminal value</strong> = <code>Total intrinsic value − Growth value</code> — the form to use when Total intrinsic value and Growth value are the values you have.</li><li><strong>Growth value</strong> = <code>Total intrinsic value − Terminal value</code> — the form to use when Total intrinsic value and Terminal value are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Growth value, Earnings per share and Over the next… can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Discount rate, Growth rate and Over the next… carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Print1, Print2 and Result2 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>DCF method left as a guess.</strong> Anything typed into DCF method is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>First FCFF left as a guess.</strong> Anything typed into First FCFF is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If DCF method is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need DCF method, First FCFF, Second FCFF and Third FCFF. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type DCF method into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Print1 with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Print1 is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes DCF method, First FCFF and Second FCFF are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when DCF method, First FCFF and Second FCFF is what you already know and Print1 and Print2 is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/jumbo-loan">Jumbo loan Calculator</a>, <a href="/finance/labor-cost">Labor cost Calculator</a> and <a href="/finance/labor-force-participation-rate">Labor force participation rate Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Discounted cash flow is a number to act on, so the useful question is what to do with Print1, Print2 and Result2 once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down DCF method, First FCFF, Second FCFF and Third FCFF alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Discounted cash flow calculator work out?', 'a' => <<<'TXT'
            Print1, Print2, Result2 and Print3, from Earnings per share, Growth rate, Discount rate and Over the next…. The relationship is Growth value = Earnings per share × ( − Growth rate × ((Growth rate + 1) ÷ (Discount rate + 1))^(Over the next...) + Growth rate − ((Growth rate + 1) ÷ (Discount rate + 1))^(Over the next...) + 1) ÷ (Discount rate − Growth rate).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            DCF method, First FCFF (USD), Second FCFF (USD), Third FCFF (USD), Fourth FCFF (USD). Fill DCF method, first FCFF and second FCFF and leave Print1 empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Growth value, Earnings per share, Over the next… and Terminal value can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            String 1 = 1, String 2 = 2, String 3 = 3, String 4 = 4, String 5 = 5, String 6 = 6 and String 7 = 7. That comes from the page's own defaults, entered in DCF method; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Print1 is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With DCF method left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Print1 at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/jumbo-loan', 'name' => 'Jumbo loan Calculator'],
            ['path' => '/finance/labor-cost', 'name' => 'Labor cost Calculator'],
            ['path' => '/finance/labor-force-participation-rate', 'name' => 'Labor force participation rate Calculator'],
        ],
        'authors' => [],
    ],
];
