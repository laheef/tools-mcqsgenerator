<?php

/**
 * Debt avalanche
 * /finance/debt-avalanche
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Debt avalanche',
    'meta' => ['title' => 'Debt avalanche Calculator: Free, With Steps', 'description' => 'Debt avalanche turns how many debts do you have?, balance #1 and interest rate #1 into total debt. Results come back in USD, with any other unit a click away.', 'h1' => 'Debt avalanche Calculator', 'updated' => '2025-10-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'NumberDebts',
                            'label' => 'How many debts do you have?',
                            'type' => 'select',
                            'options' => [
                                'Two' => '2',
                                'Three' => '3',
                                'Four' => '4',
                                'Five' => '5',
                                'Six' => '6',
                            ],
                            'dataset' => 'debtNumber',
                            'control' => 'DROPDOWN',
                            'default' => 'Two',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt #1',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Debt1',
                            'label' => 'Balance #1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '1000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r1',
                            'label' => 'Interest rate #1',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pmt1',
                            'label' => 'Payment #1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '100',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt #2',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Debt2',
                            'label' => 'Balance #2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '5000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r2',
                            'label' => 'Interest rate #2',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pmt2',
                            'label' => 'Payment #2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '200',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt #3',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Debt3',
                            'label' => 'Balance #3',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '1000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r3',
                            'label' => 'Interest rate #3',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pmt3',
                            'label' => 'Payment #3',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '200',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt #4',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Debt4',
                            'label' => 'Balance #4',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '6000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r4',
                            'label' => 'Interest rate #4',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pmt4',
                            'label' => 'Payment #4',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '80',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt #5',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Debt5',
                            'label' => 'Balance #5',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '3500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r5',
                            'label' => 'Interest rate #5',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '16',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pmt5',
                            'label' => 'Payment #5',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '65',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt #6',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Debt6',
                            'label' => 'Balance #6',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r6',
                            'label' => 'Interest rate #6',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pmt6',
                            'label' => 'Payment #6',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '50',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Avalanche method effect',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TotalDebt',
                            'label' => 'Total debt',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        If you turn to the avalanche repayment method, you can save {{intDiff.monetaryValue}} on interest, and you will pay off your debts {{termDiff.formattedValue}} months earlier than otherwise. To do so, keep the total monthly payment constant by reallocating the payment amount to the debt with the highest interest rate after paying off one of your debts.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'debtCurAPR',
                            'label' => 'Debt cur apr',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'debtAPR',
                            'label' => 'Debt apr',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pmtMonth',
                            'label' => 'Pmt month',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'debtCurPeriod',
                            'label' => 'Debt cur period',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'debtPeriod',
                            'label' => 'Debt period',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'intCurPaid',
                            'label' => 'Int cur paid',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'intPaid',
                            'label' => 'Int paid',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalCurPaid',
                            'label' => 'Total cur paid',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalPaid',
                            'label' => 'Total paid',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'intDiff',
                            'label' => 'Int diff',
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
                            'name' => 'termDiff',
                            'label' => 'Term diff',
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
            'title' => 'TotalDebt = getTotalDebt(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts)',
            'results' => ['TotalDebt' => 'getTotalDebt(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts)'],
        ],
        [
            'title' => 'debtCurAPR = getAvaMethodTable(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts, r1, r2, r3, r4, r5, r6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6)',
            'results' => ['debtCurAPR' => 'getAvaMethodTable(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts, r1, r2, r3, r4, r5, r6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6)'],
        ],
        [
            'title' => 'debtAPR = getDebtAPR(debtCurAPR)',
            'results' => ['debtAPR' => 'getDebtAPR(getAvaMethodTable(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts, r1, r2, r3, r4, r5, r6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6))'],
        ],
        [
            'title' => 'pmtMonth = getPmtMonth(debtCurAPR)',
            'results' => ['pmtMonth' => 'getPmtMonth(getAvaMethodTable(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts, r1, r2, r3, r4, r5, r6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6))'],
        ],
        [
            'title' => 'debtCurPeriod = getDebtCurPeriod(debtCurAPR)',
            'results' => ['debtCurPeriod' => 'getDebtCurPeriod(getAvaMethodTable(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts, r1, r2, r3, r4, r5, r6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6))'],
        ],
        [
            'title' => 'debtPeriod = getDebtPeriod(debtCurAPR)',
            'results' => ['debtPeriod' => 'getDebtPeriod(getAvaMethodTable(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts, r1, r2, r3, r4, r5, r6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6))'],
        ],
        [
            'title' => 'totalCurPaid = getTotalCurPaid(debtCurAPR)',
            'results' => ['totalCurPaid' => 'getTotalCurPaid(getAvaMethodTable(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts, r1, r2, r3, r4, r5, r6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6))'],
        ],
        [
            'title' => 'totalPaid = getTotalPaid(debtCurAPR)',
            'results' => ['totalPaid' => 'getTotalPaid(getAvaMethodTable(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts, r1, r2, r3, r4, r5, r6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6))'],
        ],
        [
            'title' => 'intCurPaid = getIntCurPaid(debtCurAPR)',
            'results' => ['intCurPaid' => 'getIntCurPaid(getAvaMethodTable(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts, r1, r2, r3, r4, r5, r6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6))'],
        ],
        [
            'title' => 'intPaid = getIntPaid(debtCurAPR)',
            'results' => ['intPaid' => 'getIntPaid(getAvaMethodTable(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts, r1, r2, r3, r4, r5, r6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6))'],
        ],
        [
            'title' => 'intDiff = one_way(intCurPaid - intPaid)',
            'results' => ['intDiff' => <<<'TXT'
            (getIntCurPaid(getAvaMethodTable(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts, r1, r2, r3, r4, r5, r6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6)) - getIntPaid(getAvaMethodTable(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts, r1, r2, r3, r4, r5, r6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6)))
            TXT],
        ],
        [
            'title' => 'termDiff = one_way(debtCurPeriod - debtPeriod)',
            'results' => ['termDiff' => <<<'TXT'
            (getDebtCurPeriod(getAvaMethodTable(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts, r1, r2, r3, r4, r5, r6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6)) - getDebtPeriod(getAvaMethodTable(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts, r1, r2, r3, r4, r5, r6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6)))
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getTotalDebt",function(_Debt1,_Debt2,_Debt3,_Debt4,_Debt5,_Debt6,_NumberDebts){var Debt1=Number(_Debt1);var Debt2=Number(_Debt2);var Debt3=Number(_Debt3);var Debt4=Number(_Debt4);var Debt5=Number(_Debt5);var Debt6=Number(_Debt6);var numberDebts=Number(_NumberDebts);if(numberDebts==5){Debt6=0}if(numberDebts==4){Debt5=0;Debt6=0}if(numberDebts==3){Debt4=0;Debt5=0;Debt6=0}if(numberDebts==2){Debt3=0;Debt4=0;Debt5=0;Debt6=0}var TotalDebt=Debt1+Debt2+Debt3+Debt4+Debt5+Debt6;return TotalDebt});var debtAPR=0;var pmtMonth=0;var debtPeriod=0;var debtCurPeriod=0;var totalCurPaid=0;var totalPaid=0;var intCurPaid=0;var intPaid=0;omni.define("getAvaMethodTable",function(_Debt1,_Debt2,_Debt3,_Debt4,_Debt5,_Debt6,_NumberDebts,_r1,_r2,_r3,_r4,_r5,_r6,_Pmt1,_Pmt2,_Pmt3,_Pmt4,_Pmt5,_Pmt6){var numberDebts=Number(_NumberDebts);var Debt1=Number(_Debt1);var Debt2=Number(_Debt2);var Debt3=Number(_Debt3);var Debt4=Number(_Debt4);var Debt5=Number(_Debt5);var Debt6=Number(_Debt6);var r1=Number(_r1);var r2=Number(_r2);var r3=Number(_r3);var r4=Number(_r4);var r5=Number(_r5);var r6=Number(_r6);var Pmt1=Number(_Pmt1);var Pmt2=Number(_Pmt2);var Pmt3=Number(_Pmt3);var Pmt4=Number(_Pmt4);var Pmt5=Number(_Pmt5);var Pmt6=Number(_Pmt6);if(numberDebts==5){Debt6=0;r6=0;Pmt6=0}if(numberDebts==4){Debt5=0;Debt6=0;r5=0;r6=0;Pmt5=0;Pmt6=0}if(numberDebts==3){Debt4=0;Debt5=0;Debt6=0;r4=0;r5=0;r6=0;Pmt4=0;Pmt5=0;Pmt6=0}if(numberDebts==2){Debt3=0;Debt4=0;Debt5=0;Debt6=0;r3=0;r4=0;r5=0;r6=0;Pmt3=0;Pmt4=0;Pmt5=0;Pmt6=0}var debtTotal=Debt1+Debt2+Debt3+Debt4+Debt5+Debt6;var rTotal=r1+r2+r3+r4+r5+r6;var rWeight=(Debt1*r1+Debt2*r2+Debt3*r3+Debt4*r4+Debt5*r5+Debt6*r6)/debtTotal;var debtCurAPR=8*100*rWeight/(8*100)*100;var VarT1=2;var VarT2=2;var VarT3=2;var VarT4=2;var VarT5=2;var VarT6=2;var periods=600;var q=12;var i;pmtMonth=Pmt1+Pmt2+Pmt3+Pmt4+Pmt5+Pmt6;var princBal=debtTotal;var princBalOpen=0;var princMonth=0;var intMonth=0;var pmtModT=0;var pmtLast=0;intPaid=0;totalPaid=0;debtPeriod=0;var princCurBal=debtTotal;var princCurBalOpen=0;var princCurMonth=0;var intCurMonth=0;var pmtModCurT=0;intCurPaid=0;totalCurPaid=0;debtCurPeriod=0;var int1=0;var int2=0;var int3=0;var int4=0;var int5=0;var int6=0;var bal1=Debt1;var bal2=Debt2;var bal3=Debt3;var bal4=Debt4;var bal5=Debt5;var bal6=Debt6;var balOpen1=0;var balOpen2=0;var balOpen3=0;var balOpen4=0;var balOpen5=0;var balOpen6=0;var princ1=0;var princ2=0;var princ3=0;var princ4=0;var princ5=0;var princ6=0;var pmtMod1=Pmt1;var pmtMod2=Pmt2;var pmtMod3=Pmt3;var pmtMod4=Pmt4;var pmtMod5=Pmt5;var pmtMod6=Pmt6;var intCur1=0;var intCur2=0;var intCur3=0;var intCur4=0;var intCur5=0;var intCur6=0;var balCur1=Debt1;var balCur2=Debt2;var balCur3=Debt3;var balCur4=Debt4;var balCur5=Debt5;var balCur6=Debt6;var balCurOpen1=0;var balCurOpen2=0;var balCurOpen3=0;var balCurOpen4=0;var balCurOpen5=0;var balCurOpen6=0;var princCur1=0;var princCur2=0;var princCur3=0;var princCur4=0;var princCur5=0;var princCur6=0;var pmtModCur1=Pmt1;var pmtModCur2=Pmt2;var pmtModCur3=Pmt3;var pmtModCur4=Pmt4;var pmtModCur5=Pmt5;var pmtModCur6=Pmt6;var pmtResT=0;var rHigst;var rAdj1=r1;var rAdj2=r2;var rAdj3=r3;var rAdj4=r4;var rAdj5=r5;var rAdj6=r6;for(i=0;i<=periods;i++){balOpen1=bal1;balOpen2=bal2;balOpen3=bal3;balOpen4=bal4;balOpen5=bal5;balOpen6=bal6;balCurOpen1=balCur1;balCurOpen2=balCur2;balCurOpen3=balCur3;balCurOpen4=balCur4;balCurOpen5=balCur5;balCurOpen6=balCur6;princBalOpen=princBal;princCurBalOpen=princCurBal;if(i>0){int1=bal1*r1/q;int2=bal2*r2/q;int3=bal3*r3/q;int4=bal4*r4/q;int5=bal5*r5/q;int6=bal6*r6/q;intMonth=int1+int2+int3+int4+int5+int6;intCur1=balCur1*r1/q;intCur2=balCur2*r2/q;intCur3=balCur3*r3/q;intCur4=balCur4*r4/q;intCur5=balCur5*r5/q;intCur6=balCur6*r6/q;intCurMonth=intCur1+intCur2+intCur3+intCur4+intCur5+intCur6;if(balOpen1<pmtMod1){pmtMod1=balOpen1+int1}if(balOpen2<pmtMod2){pmtMod2=balOpen2+int2}if(balOpen3<pmtMod3){pmtMod3=balOpen3+int3}if(balOpen4<pmtMod4){pmtMod4=balOpen4+int4}if(balOpen5<pmtMod5){pmtMod5=balOpen5+int5}if(balOpen6<pmtMod6){pmtMod6=balOpen6+int6}if(balCurOpen1<pmtModCur1){pmtModCur1=balCurOpen1+intCur1}if(balCurOpen2<pmtModCur2){pmtModCur2=balCurOpen2+intCur2}if(balCurOpen3<pmtModCur3){pmtModCur3=balCurOpen3+intCur3}if(balCurOpen4<pmtModCur4){pmtModCur4=balCurOpen4+intCur4}if(balCurOpen5<pmtModCur5){pmtModCur5=balCurOpen5+intCur5}if(balCurOpen6<pmtModCur6){pmtModCur6=balCurOpen6+intCur6}if(princBalOpen!==0){pmtModT=pmtMod1+pmtMod2+pmtMod3+pmtMod4+pmtMod5+pmtMod6}if(princCurBalOpen!==0){pmtModCurT=pmtModCur1+pmtModCur2+pmtModCur3+pmtModCur4+pmtModCur5+pmtModCur6}pmtResT=pmtMonth-pmtModT;if(balOpen1<=pmtMod1||VarT1==1){rAdj1=0}if(balOpen2<=pmtMod2||VarT2==1){rAdj2=0}if(balOpen3<=pmtMod3||VarT3==1){rAdj3=0}if(balOpen4<=pmtMod4||VarT4==1){rAdj4=0}if(balOpen5<=pmtMod5||VarT5==1){rAdj5=0}if(balOpen6<=pmtMod6||VarT6==1){rAdj6=0}if(pmtResT>0){rHigst=Math.max(rAdj1,rAdj2,rAdj3,rAdj4,rAdj5,rAdj6);if(rHigst==rAdj1&&rHigst>0&&balOpen1>=pmtMod1+pmtResT){pmtMod1=pmtMod1+pmtResT}else if(rHigst==rAdj2&&rHigst>0&&balOpen2>=pmtMod2+pmtResT){pmtMod2=pmtMod2+pmtResT}else if(rHigst==rAdj3&&rHigst>0&&balOpen3>=pmtMod3+pmtResT){pmtMod3=pmtMod3+pmtResT}else if(rHigst==rAdj4&&rHigst>0&&balOpen4>=pmtMod4+pmtResT){pmtMod4=pmtMod4+pmtResT}else if(rHigst==rAdj5&&rHigst>0&&balOpen5>=pmtMod5+pmtResT){pmtMod5=pmtMod5+pmtResT}else if(rHigst==rAdj6&&rHigst>0&&balOpen6>=pmtMod6+pmtResT){pmtMod6=pmtMod6+pmtResT}}princ1=pmtMod1-int1;princ2=pmtMod2-int2;princ3=pmtMod3-int3;princ4=pmtMod4-int4;princ5=pmtMod5-int5;princ6=pmtMod6-int6;princCur1=pmtModCur1-intCur1;princCur2=pmtModCur2-intCur2;princCur3=pmtModCur3-intCur3;princCur4=pmtModCur4-intCur4;princCur5=pmtModCur5-intCur5;princCur6=pmtModCur6-intCur6;if(princBalOpen!==0){pmtModT=pmtMod1+pmtMod2+pmtMod3+pmtMod4+pmtMod5+pmtMod6}if(princCurBalOpen!==0){pmtModCurT=pmtModCur1+pmtModCur2+pmtModCur3+pmtModCur4+pmtModCur5+pmtModCur6}princMonth=pmtModT-intMonth;princCurMonth=pmtModCurT-intCurMonth;bal1=bal1-princ1;bal2=bal2-princ2;bal3=bal3-princ3;bal4=bal4-princ4;bal5=bal5-princ5;bal6=bal6-princ6;balCur1=balCur1-princCur1;balCur2=balCur2-princCur2;balCur3=balCur3-princCur3;balCur4=balCur4-princCur4;balCur5=balCur5-princCur5;balCur6=balCur6-princCur6;princBal=princBal-princMonth;princCurBal=princCurBal-princCurMonth}if(balOpen1<=0){balOpen1=0}if(balOpen2<=0){balOpen2=0}if(balOpen3<=0){balOpen3=0}if(balOpen4<=0){balOpen4=0}if(balOpen5<=0){balOpen5=0}if(balOpen6<=0){balOpen6=0}if(bal1<=0){bal1=0}if(bal2<=0){bal2=0}if(bal3<=0){bal3=0}if(bal4<=0){bal4=0}if(bal5<=0){bal5=0}if(bal6<=0){bal6=0}if(princ1<=0){princ1=0}if(princ2<=0){princ2=0}if(princ3<=0){princ3=0}if(princ4<=0){princ4=0}if(princ5<=0){princ5=0}if(princ6<=0){princ6=0}if(int1<=0){int1=0}if(int2<=0){int2=0}if(int3<=0){int3=0}if(int4<=0){int4=0}if(int5<=0){int5=0}if(int6<=0){int6=0}if(balCurOpen1<=0){balCurOpen1=0}if(balCurOpen2<=0){balCurOpen2=0}if(balCurOpen3<=0){balCurOpen3=0}if(balCurOpen4<=0){balCurOpen4=0}if(balCurOpen5<=0){balCurOpen5=0}if(balCurOpen6<=0){balCurOpen6=0}if(balCur1<=0){balCur1=0}if(balCur2<=0){balCur2=0}if(balCur3<=0){balCur3=0}if(balCur4<=0){balCur4=0}if(balCur5<=0){balCur5=0}if(balCur6<=0){balCur6=0}if(princCur1<=0){princCur1=0}if(princCur2<=0){princCur2=0}if(princCur3<=0){princCur3=0}if(princCur4<=0){princCur4=0}if(princCur5<=0){princCur5=0}if(princCur6<=0){princCur6=0}if(intCur1<=0){intCur1=0}if(intCur2<=0){intCur2=0}if(intCur3<=0){intCur3=0}if(intCur4<=0){intCur4=0}if(intCur5<=0){intCur5=0}if(intCur6<=0){intCur6=0}if(princBalOpen<=0){princBalOpen=0}if(princBal<=0){princBal=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){intMonth=0}if(princBal<0.01){princMonth=princBalOpen}if(princCurBalOpen<=0){princCurBalOpen=0}if(princCurBal<=0){princCurBal=0}if(princCurMonth<=0){princCurMonth=0}if(intCurMonth<=0){intCurMonth=0}if(princCurBal<0.01){princCurMonth=princCurBalOpen}intPaid+=intMonth;intCurPaid+=intCurMonth;if(intMonth!==0){totalPaid+=pmtModT}if(intCurMonth!==0){totalCurPaid+=pmtModCurT}if(princBalOpen>0.0001&&princBal<0.0001){debtPeriod=i;pmtLast=pmtModT}if(princCurBalOpen>0.0001&&princCurBal<0.0001){debtCurPeriod=i}}var iteration=0;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;debtAPR=0;var guess=rTotal/numberDebts/12;var iOld;var iNew=guess;debtPeriod=debtPeriod-1+pmtLast/pmtMonth;do{iOld=iNew;var dividend=pmtMonth-pmtMonth*Math.pow(1+iNew,-debtPeriod)-iNew*debtTotal;var divisor=pmtMonth*debtPeriod*Math.pow(1+iNew,-debtPeriod-1)-debtTotal;iNew=iNew-dividend/divisor;++iteration}while(Math.abs(iOld-iNew)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);debtAPR=iNew*q*100;return debtCurAPR});omni.define("getDebtAPR",function(debtCurAPR){if(debtCurAPR){return debtAPR}});omni.define("getPmtMonth",function(debtCurAPR){if(debtCurAPR){return pmtMonth}});omni.define("getDebtPeriod",function(debtCurAPR){if(debtCurAPR){return Math.ceil(debtPeriod)}});omni.define("getDebtCurPeriod",function(debtCurAPR){if(debtCurAPR){return Math.ceil(debtCurPeriod)}});omni.define("getTotalCurPaid",function(debtCurAPR){if(debtCurAPR){return totalCurPaid}});omni.define("getTotalPaid",function(debtCurAPR){if(debtCurAPR){return totalPaid}});omni.define("getIntCurPaid",function(debtCurAPR){if(debtCurAPR){return intCurPaid}});omni.define("getIntPaid",function(debtCurAPR){if(debtCurAPR){return intPaid}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Debt avalanche turns How many debts do you have?, Balance #1 and Balance #2 into Total debt and Debt cur apr. It is a single relationship that reads total debt out of how many debts do you have?, not a table of canned results keyed by them. Units for Total debt default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Debt avalanche calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Debt avalanche: it takes 7 numbers and reports Total debt, Debt cur apr and Debt apr.</p><p>The relationship it solves reads Total debt = getTotalDebt(Balance #1, Balance #2, Balance #3, Balance #4, Balance #5, Balance #6, How many debts do you have?).</p><p>The answers are Total debt, Debt cur apr, Debt apr and Pmt month; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 7 boxes, and nothing else.</p><ul><li><strong>How many debts do you have?</strong> — a plain number, no unit</li><li><strong>Balance #1</strong> — in USD</li><li><strong>Balance #2</strong> — in USD</li><li><strong>Balance #3</strong> — in USD</li><li><strong>Balance #4</strong> — in USD</li><li><strong>Balance #5</strong> — in USD</li><li><strong>Balance #6</strong> — in USD</li></ul><p>The result boxes are Total debt in USD, Debt cur apr, Debt apr, Pmt month, Debt cur period, Debt period, Int cur paid, Int paid, Total cur paid, Total paid, Int diff, Term diff; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Interest rate #1 offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total debt</strong> = <code>getTotalDebt(Balance #1, Balance #2, Balance #3, Balance #4, Balance #5, Balance #6, How many debts do you have?)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total debt</strong> = <code>getTotalDebt(Balance #1, Balance #2, Balance #3, Balance #4, Balance #5, Balance #6, How many debts do you have?)</code> — the form to use when Balance #1, Balance #2, Balance #3 and Balance #4 are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total debt, Debt cur apr and Debt apr can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total debt, Debt cur apr and Debt apr are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>How many debts do you have? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If How many debts do you have? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Balance #1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Balance #1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Balance #2 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Balance #2 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert How many debts do you have? to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Debt avalanche form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>How many debts do you have?</strong> takes a plain number with no unit attached. Change it and Total debt, Debt cur apr and Debt apr changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — How many debts do you have? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Balance #1</strong> takes a plain number with no unit attached. Change it and Total debt, Debt cur apr and Debt apr changes with it. Fill it from a measurement rather than a memory — Balance #1 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Balance #2</strong> takes a plain number with no unit attached. Change it and Total debt, Debt cur apr and Debt apr changes with it. Fill it from a measurement rather than a memory — Balance #2 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Balance #3</strong> takes a plain number with no unit attached. Change it and Total debt, Debt cur apr and Debt apr changes with it. Fill it from a measurement rather than a memory — Balance #3 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Balance #4</strong> takes a plain number with no unit attached. Change it and Total debt, Debt cur apr and Debt apr changes with it. Fill it from a measurement rather than a memory — Balance #4 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Balance #5</strong> takes a plain number with no unit attached. Change it and Total debt, Debt cur apr and Debt apr changes with it. Fill it from a measurement rather than a memory — Balance #5 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Balance #6</strong> takes a plain number with no unit attached. Change it and Total debt, Debt cur apr and Debt apr changes with it. Fill it from a measurement rather than a memory — Balance #6 is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 12 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total debt</strong> is a plain number. It is computed from Balance #1, Balance #2, Balance #3 and Balance #4, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Debt cur apr</strong> is a plain number. It is computed from Balance #1, Balance #2, Balance #3 and Balance #4, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Debt apr</strong> is a plain number. It is computed from Balance #1, Balance #2, Balance #3 and Balance #4, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Pmt month</strong> is a plain number. It is computed from Balance #1, Balance #2, Balance #3 and Balance #4, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Debt cur period</strong> is a plain number. It is computed from Balance #1, Balance #2, Balance #3 and Balance #4, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Debt period</strong> is a plain number. It is computed from Balance #1, Balance #2, Balance #3 and Balance #4, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Int cur paid</strong> is a plain number. It is computed from Balance #1, Balance #2, Balance #3 and Balance #4, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Int paid</strong> is a plain number. It is computed from Balance #1, Balance #2, Balance #3 and Balance #4, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total cur paid</strong> is a plain number. It is computed from Balance #1, Balance #2, Balance #3 and Balance #4, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total paid</strong> is a plain number. It is computed from Balance #1, Balance #2, Balance #3 and Balance #4, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Int diff</strong> is a plain number. It is computed from Balance #1, Balance #2, Balance #3 and Balance #4, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Term diff</strong> is a plain number. It is computed from Balance #1, Balance #2, Balance #3 and Balance #4, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total debt follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when How many debts do you have?, Balance #1 and Balance #2 is what you already know and Total debt and Debt cur apr is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/deferred-annuity">Deferred annuity Calculator</a>, <a href="/finance/deferred-payment-loan">Deferred payment loan Calculator</a> and <a href="/finance/degree-of-operating-leverage">Degree of operating leverage Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Debt avalanche calculator work out?', 'a' => <<<'TXT'
            Total debt, Debt cur apr, Debt apr and Pmt month, from Balance #1, Balance #2, Balance #3 and Balance #4. The relationship is Total debt = getTotalDebt(Balance #1, Balance #2, Balance #3, Balance #4, Balance #5, Balance #6, How many debts do you have?).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            How many debts do you have?, Balance #1 (USD), Balance #2 (USD), Balance #3 (USD), Balance #4 (USD). Fill how many debts do you have?, balance #1 and balance #2 and leave Total debt empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Total debt, Debt cur apr, Debt apr and Pmt month can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Total debt is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave How many debts do you have? blank and the page solves for it, reporting Total debt instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Total debt keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/deferred-annuity', 'name' => 'Deferred annuity Calculator'],
            ['path' => '/finance/deferred-payment-loan', 'name' => 'Deferred payment loan Calculator'],
            ['path' => '/finance/degree-of-operating-leverage', 'name' => 'Degree of operating leverage Calculator'],
        ],
        'authors' => [],
    ],
];
