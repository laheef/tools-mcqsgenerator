<?php

/**
 * Options spread
 * /finance/options-spread
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Options spread',
    'meta' => ['title' => 'Options spread Calculator — Formula & Results', 'description' => 'Options spread works out net debit spread and maximum loss from select calculator mode:, your target price at expiration and amount of options you will trade.', 'h1' => 'Options spread Calculator', 'updated' => '2026-09-28'],
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
                            'label' => 'Select calculator mode:',
                            'type' => 'select',
                            'options' => ['Bull call spread' => '0', 'Bull put spread' => '1', 'Bear call spread' => '2', 'Bear put spread' => '3'],
                            'dataset' => 'selectDS',
                            'default' => 'Bull call spread',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tp',
                            'label' => 'Your target price at expiration',
                            'type' => 'number',
                            'help' => 'Input here the price you expect at expiration and see whether you earn or lose money.',
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
                            'label' => 'Amount of options you will trade',
                            'type' => 'number',
                            'help' => 'Remember that each option contract refers to the right over 100 shares. Therefore, for a 4 option contract, you are buying the rights to 400 shares.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'choicemain == 0', 'text' => 'Purchasing a call with a lower strike price than the short call provides a bullish strategy.'],
                                ['when' => 'choicemain == 2', 'text' => 'Purchasing a call with a higher strike price than the written call provides a bearish strategy.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'The call you buy (long call)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sp_bc',
                            'label' => 'Strike price of the call you buy',
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
                            'name' => 'bc',
                            'label' => 'Premium spent for buying the call',
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
                            'name' => 'bec_sp_lc',
                            'label' => 'Strike price of the call you buy',
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
                            'name' => 'bec_lc',
                            'label' => 'Premium spent for buying the call',
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
            'title' => 'The put you buy (long put)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sp_lp',
                            'label' => 'Strike price of the put you buy',
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
                            'name' => 'lp',
                            'label' => 'Premium spent for buying the put',
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
                            'name' => 'bep_sp_lp',
                            'label' => 'Strike price of the put you buy',
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
                            'name' => 'bep_lp',
                            'label' => 'Premium spent for buying the put',
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
            'title' => 'The call you sell (short call)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sp_sc',
                            'label' => 'Strike price of the call you sell',
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
                            'name' => 'sc',
                            'label' => 'Premium received for selling the call',
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
                            'name' => 'bec_sp_sc',
                            'label' => 'Strike price of the call you sell',
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
                            'name' => 'bec_sc',
                            'label' => 'Premium received for selling the call',
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
                        ['type' => 'note', 'text' => <<<'TXT'
                        Improper setup for a bull call spread. Please keep a higher strike price (lower premium to receive) for a short call and a lower strike price (higher premium to pay) for a long call.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Improper setup for a bear call spread. Please keep a higher strike price (lower premium to pay) for the long call and a lower strike price (higher premium to receive) for the short call.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'The put you sell (short put)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sp_sp',
                            'label' => 'Strike price of the put you sell',
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
                            'name' => 'sp',
                            'label' => 'Premium received for selling the put',
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
                            'name' => 'bep_sp_sp',
                            'label' => 'Strike price of the put you sell',
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
                            'name' => 'bep_sp',
                            'label' => 'Premium received for selling the put',
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
                        ['type' => 'note', 'text' => <<<'TXT'
                        Improper setup for a bull put spread. Please keep a higher strike price (higher premium to receive) for a short put and a lower strike price (lower premium to pay) for a long put.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Improper setup for a bear put spread. Please keep a higher strike price (higher premium to pay) for a long put and a lower strike price (lower premium to receive) for a short put.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Bull call estimated returns',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bc_ps',
                            'label' => 'Net debit spread',
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
                            'name' => 'bc_ml',
                            'label' => 'Maximum loss',
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
                            'name' => 'bc_maxp',
                            'label' => 'Maximum profit',
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
                            'name' => 'bc_b',
                            'label' => 'Breakeven price',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => '(tp < sp_bc and tp != undefined and sp_bc != undefined)', 'text' => 'Your current target price is below the long call strike price. You will incur the maximum loss.'],
                                ['when' => '(tp > sp_sc and tp != undefined and sp_sc != undefined)', 'text' => 'Your current target price is above the short call strike price. You will earn the maximum profit.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bc_pp',
                            'label' => 'Potential profit',
                            'type' => 'number',
                            'help' => 'For the potential profit you need to input your target price at expiration.',
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
            'title' => 'Bull put estimated returns',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bp_pe',
                            'label' => 'Net credit spread',
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
                            'name' => 'bp_ml',
                            'label' => 'Maximum loss',
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
                            'name' => 'bp_b',
                            'label' => 'Breakeven price',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => '(tp < sp_lp and tp != undefined and sp_lp != undefined)', 'text' => 'Your current target price is below the long put strike price. You will incur the maximum loss.'],
                                ['when' => '(tp > sp_sp and tp != undefined and sp_sp != undefined)', 'text' => 'Your current stock price is above the short put strike price. You will earn the maximum profit.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bp_maxp',
                            'label' => 'Maximum profit',
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
                            'name' => 'bp_pp',
                            'label' => 'Potential profit',
                            'type' => 'number',
                            'help' => 'For the potential profit you need to input your target price at expiration.',
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
            'title' => 'Bear call estimated returns',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bec_pe',
                            'label' => 'Net credit spread',
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
                            'name' => 'bec_ml',
                            'label' => 'Maximum loss',
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
                            'name' => 'bec_maxp',
                            'label' => 'Maximum profit',
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
                            'name' => 'bec_b',
                            'label' => 'Breakeven price',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => '(tp > bec_sp_lc and tp != undefined and bec_sp_lc != undefined)', 'text' => 'Your current target price is above the long call strike price. You will incur the maximum loss.'],
                                ['when' => '(tp < bec_sp_sc and tp != undefined and bec_sp_sc != undefined)', 'text' => 'Your current stock price is below the short call strike price. You will earn the maximum profit.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bec_pp',
                            'label' => 'Potential profit',
                            'type' => 'number',
                            'help' => 'For the potential profit you need to input your target price at expiration.',
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
            'title' => 'Bear put estimated returns',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bep_ps',
                            'label' => 'Net debit spread',
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
                            'name' => 'bep_ml',
                            'label' => 'Maximum loss',
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
                            'name' => 'bep_maxp',
                            'label' => 'Maximum profit',
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
                            'name' => 'bep_b',
                            'label' => 'Breakeven price',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => '(tp > bep_sp_lp and tp != undefined and bep_sp_lp != undefined)', 'text' => 'Your current target price is above the long put strike price. You will incur the maximum loss.'],
                                ['when' => '(tp < bep_sp_sp and tp != undefined and bep_sp_sp != undefined)', 'text' => 'Your current stock price is below the short put strike price. You will earn the maximum profit.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bep_pp',
                            'label' => 'Potential profit',
                            'type' => 'number',
                            'help' => 'For the potential profit you need to input your target price at expiration.',
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
            'title' => 'bc_ps=(sc-bc)*n',
            'results' => ['sc' => 'bc + bc_ps/n', 'n' => '-bc_ps/(bc - sc)', 'bc_ps' => 'n*(-bc + sc)', 'bc' => '-bc_ps/n + sc'],
        ],
        [
            'title' => 'bc_ml=(sc-bc)*n*100',
            'results' => ['bc' => '-1/100*bc_ml/n + sc', 'bc_ml' => '100*n*(-bc + sc)', 'sc' => 'bc + (1/100)*bc_ml/n', 'n' => '-bc_ml/(100*bc - 100*sc)'],
        ],
        [
            'title' => 'bc_maxp=((sp_sc-sp_bc)+(sc-bc))*100*n',
            'results' => [
                'bc' => '-1/100*bc_maxp/n + sc - sp_bc + sp_sc',
                'bc_maxp' => '100*n*(-bc + sc - sp_bc + sp_sc)',
                'sp_bc' => '-bc - 1/100*bc_maxp/n + sc + sp_sc',
                'sc' => 'bc + (1/100)*bc_maxp/n + sp_bc - sp_sc',
                'n' => '-bc_maxp/(100*bc - 100*sc + 100*sp_bc - 100*sp_sc)',
                'sp_sc' => 'bc + (1/100)*bc_maxp/n - sc + sp_bc',
            ],
        ],
        [
            'title' => 'bc_b=sp_bc-(sc-bc)',
            'results' => ['bc' => 'bc_b + sc - sp_bc', 'bc_b' => 'bc - sc + sp_bc', 'sc' => 'bc - bc_b + sp_bc', 'sp_bc' => '-bc + bc_b + sc'],
        ],
        [
            'title' => 'bc_pp=(tp-sp_bc+(sc-bc))*n*100',
            'results' => [
                'bc' => '-1/100*bc_pp/n + sc - sp_bc + tp',
                'tp' => 'bc + (1/100)*bc_pp/n - sc + sp_bc',
                'sp_bc' => '-bc - 1/100*bc_pp/n + sc + tp',
                'sc' => 'bc + (1/100)*bc_pp/n + sp_bc - tp',
                'bc_pp' => '100*n*(-bc + sc - sp_bc + tp)',
                'n' => '-bc_pp/(100*bc - 100*sc + 100*sp_bc - 100*tp)',
            ],
        ],
        [
            'title' => 'bp_pe=(sp-lp)*n',
            'results' => ['lp' => '-bp_pe/n + sp', 'bp_pe' => 'n*(-lp + sp)', 'n' => '-bp_pe/(lp - sp)', 'sp' => 'bp_pe/n + lp'],
        ],
        [
            'title' => 'bp_ml=-((sp_sp-sp_lp)-(sp-lp))*n*100',
            'results' => [
                'sp_lp' => '(1/100)*bp_ml/n + lp - sp + sp_sp',
                'lp' => '-1/100*bp_ml/n + sp + sp_lp - sp_sp',
                'bp_ml' => '100*n*(-lp + sp + sp_lp - sp_sp)',
                'sp_sp' => '-1/100*bp_ml/n - lp + sp + sp_lp',
                'n' => '-bp_ml/(100*lp - 100*sp - 100*sp_lp + 100*sp_sp)',
                'sp' => '(1/100)*bp_ml/n + lp - sp_lp + sp_sp',
            ],
        ],
        [
            'title' => 'bp_maxp= (sp-lp)*n*100',
            'results' => ['lp' => '-1/100*bp_maxp/n + sp', 'bp_maxp' => '100*n*(-lp + sp)', 'n' => '-bp_maxp/(100*lp - 100*sp)', 'sp' => '(1/100)*bp_maxp/n + lp'],
        ],
        [
            'title' => 'bp_b=sp_sp-(sp-lp)',
            'results' => ['sp' => '-bp_b + lp + sp_sp', 'lp' => 'bp_b + sp - sp_sp', 'bp_b' => 'lp - sp + sp_sp', 'sp_sp' => 'bp_b - lp + sp'],
        ],
        [
            'title' => 'bep_ps=-(bep_lp-bep_sp)*n',
            'results' => ['bep_ps' => 'n*(-bep_lp + bep_sp)', 'bep_lp' => '-bep_ps/n + bep_sp', 'bep_sp' => 'bep_lp + bep_ps/n', 'n' => '-bep_ps/(bep_lp - bep_sp)'],
        ],
        [
            'title' => 'bep_ml=-(bep_lp-bep_sp)*n*100',
            'results' => ['bep_ml' => '100*n*(-bep_lp + bep_sp)', 'bep_sp' => 'bep_lp + (1/100)*bep_ml/n', 'bep_lp' => '-1/100*bep_ml/n + bep_sp', 'n' => '-bep_ml/(100*bep_lp - 100*bep_sp)'],
        ],
        [
            'title' => 'bep_maxp = ((bep_sp_lp-bep_sp_sp)-(bep_lp-bep_sp))*n*100',
            'results' => [
                'bep_sp' => 'bep_lp + (1/100)*bep_maxp/n - bep_sp_lp + bep_sp_sp',
                'n' => '-bep_maxp/(100*bep_lp - 100*bep_sp - 100*bep_sp_lp + 100*bep_sp_sp)',
                'bep_sp_sp' => '-bep_lp - 1/100*bep_maxp/n + bep_sp + bep_sp_lp',
                'bep_lp' => '-1/100*bep_maxp/n + bep_sp + bep_sp_lp - bep_sp_sp',
                'bep_sp_lp' => 'bep_lp + (1/100)*bep_maxp/n - bep_sp + bep_sp_sp',
                'bep_maxp' => '100*n*(-bep_lp + bep_sp + bep_sp_lp - bep_sp_sp)',
            ],
        ],
        [
            'title' => 'bep_b=(bep_sp_lp-(bep_lp-bep_sp))',
            'results' => ['bep_b' => '-bep_lp + bep_sp + bep_sp_lp', 'bep_lp' => '-bep_b + bep_sp + bep_sp_lp', 'bep_sp' => 'bep_b + bep_lp - bep_sp_lp', 'bep_sp_lp' => 'bep_b + bep_lp - bep_sp'],
        ],
        [
            'title' => 'bec_pe=(bec_sc-bec_lc)*n',
            'results' => ['bec_pe' => 'n*(-bec_lc + bec_sc)', 'bec_lc' => '-bec_pe/n + bec_sc', 'bec_sc' => 'bec_lc + bec_pe/n', 'n' => '-bec_pe/(bec_lc - bec_sc)'],
        ],
        [
            'title' => 'bec_ml=-((bec_sp_lc-bec_sp_sc)-(bec_sc-bec_lc))*n*100',
            'results' => [
                'bec_sp_lc' => '-bec_lc - 1/100*bec_ml/n + bec_sc + bec_sp_sc',
                'bec_sc' => 'bec_lc + (1/100)*bec_ml/n + bec_sp_lc - bec_sp_sc',
                'bec_ml' => '100*n*(-bec_lc + bec_sc - bec_sp_lc + bec_sp_sc)',
                'n' => '-bec_ml/(100*bec_lc - 100*bec_sc + 100*bec_sp_lc - 100*bec_sp_sc)',
                'bec_sp_sc' => 'bec_lc + (1/100)*bec_ml/n - bec_sc + bec_sp_lc',
                'bec_lc' => '-1/100*bec_ml/n + bec_sc - bec_sp_lc + bec_sp_sc',
            ],
        ],
        [
            'title' => 'bec_maxp = (bec_sc-bec_lc)*n*100',
            'results' => ['bec_lc' => '-1/100*bec_maxp/n + bec_sc', 'bec_sc' => 'bec_lc + (1/100)*bec_maxp/n', 'bec_maxp' => '100*n*(-bec_lc + bec_sc)', 'n' => '-bec_maxp/(100*bec_lc - 100*bec_sc)'],
        ],
        [
            'title' => 'bec_b=bec_sp_sc+(bec_sc-bec_lc)',
            'results' => ['bec_sp_sc' => 'bec_b + bec_lc - bec_sc', 'bec_lc' => '-bec_b + bec_sc + bec_sp_sc', 'bec_b' => '-bec_lc + bec_sc + bec_sp_sc', 'bec_sc' => 'bec_b + bec_lc - bec_sp_sc'],
        ],
        [
            'title' => 'bp_pp=(tp-sp_sp+sp-lp)*n*100',
            'results' => [
                'bp_pp' => '100*n*(-lp + sp - sp_sp + tp)',
                'tp' => '(1/100)*bp_pp/n + lp - sp + sp_sp',
                'lp' => '-1/100*bp_pp/n + sp - sp_sp + tp',
                'sp_sp' => '-1/100*bp_pp/n - lp + sp + tp',
                'n' => '-bp_pp/(100*lp - 100*sp + 100*sp_sp - 100*tp)',
                'sp' => '(1/100)*bp_pp/n + lp + sp_sp - tp',
            ],
        ],
        [
            'title' => 'bec_pp=(bec_sp_sc-tp+bec_sc-bec_lc)*n*100',
            'results' => [
                'bec_sc' => 'bec_lc + (1/100)*bec_pp/n - bec_sp_sc + tp',
                'tp' => '-bec_lc - 1/100*bec_pp/n + bec_sc + bec_sp_sc',
                'n' => '-bec_pp/(100*bec_lc - 100*bec_sc - 100*bec_sp_sc + 100*tp)',
                'bec_sp_sc' => 'bec_lc + (1/100)*bec_pp/n - bec_sc + tp',
                'bec_pp' => '100*n*(-bec_lc + bec_sc + bec_sp_sc - tp)',
                'bec_lc' => '-1/100*bec_pp/n + bec_sc + bec_sp_sc - tp',
            ],
        ],
        [
            'title' => 'bep_pp=(bep_sp_lp-tp+bep_sp-bep_lp)*n*100',
            'results' => [
                'bep_pp' => '100*n*(-bep_lp + bep_sp + bep_sp_lp - tp)',
                'tp' => '-bep_lp - 1/100*bep_pp/n + bep_sp + bep_sp_lp',
                'bep_sp' => 'bep_lp + (1/100)*bep_pp/n - bep_sp_lp + tp',
                'n' => '-bep_pp/(100*bep_lp - 100*bep_sp - 100*bep_sp_lp + 100*tp)',
                'bep_lp' => '-1/100*bep_pp/n + bep_sp + bep_sp_lp - tp',
                'bep_sp_lp' => 'bep_lp + (1/100)*bep_pp/n - bep_sp + tp',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Options spread takes Amount of options you will trade and returns Your target price at expiration and Strike price of the call you buy. Nothing is looked up on this page: your target price at expiration is computed from amount of options you will trade and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Your target price at expiration is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Options spread calculator works', 'html' => <<<'TXT'
            <p>The Options spread calculator applies one relationship to 3 numbers and reports Your target price at expiration, Strike price of the call you buy and Strike price of the call you buy.</p><p>Written with the labels from the form, Net debit spread = Amount of options you will trade × ( − Premium spent for buying the call + Premium received for selling the call).</p><p>What comes back is Your target price at expiration, Strike price of the call you buy, Strike price of the call you buy and Premium spent for buying the call — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Amount of options you will trade</strong> — a plain number, no unit. Remember that each option contract refers to the right over 100 shares. Therefore, for a 4 option contract, you are buying the rights to 400 shares.</li><li><strong>Premium spent for buying the call</strong> — in USD</li><li><strong>Premium received for selling the call</strong> — in USD</li></ul><p>What you get back is Your target price at expiration in USD, Strike price of the call you buy in USD, Strike price of the call you buy in USD, Premium spent for buying the call in USD, Strike price of the put you buy in USD, Premium spent for buying the put in USD, Strike price of the put you buy in USD, Premium spent for buying the put in USD, Strike price of the call you sell in USD, Strike price of the call you sell in USD, Premium received for selling the call in USD, Strike price of the put you sell in USD, Premium received for selling the put in USD, Strike price of the put you sell in USD, Premium received for selling the put in USD, Net debit spread in USD, Maximum loss in USD, Maximum profit in USD, Breakeven price in USD, Potential profit in USD, Net credit spread in USD, Maximum loss in USD, Breakeven price in USD, Maximum profit in USD, Potential profit in USD, Net credit spread in USD, Maximum loss in USD, Maximum profit in USD, Breakeven price in USD, Potential profit in USD, Net debit spread in USD, Maximum loss in USD, Maximum profit in USD, Breakeven price in USD, Potential profit in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Your target price at expiration takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Net debit spread</strong> = <code>Amount of options you will trade × ( − Premium spent for buying the call + Premium received for selling the call)</code></li><li><strong>Premium received for selling the call</strong> = <code>Premium spent for buying the call + Net debit spread ÷ Amount of options you will trade</code></li><li><strong>Amount of options you will trade</strong> = <code>− Net debit spread ÷ (Premium spent for buying the call − Premium received for selling the call)</code></li><li><strong>Premium spent for buying the call</strong> = <code>− Net debit spread ÷ Amount of options you will trade + Premium received for selling the call</code></li><li><strong>Maximum loss</strong> = <code>100 × Amount of options you will trade × ( − Premium spent for buying the call + Premium received for selling the call)</code></li><li><strong>Maximum profit</strong> = <code>100 × Amount of options you will trade × ( − Premium spent for buying the call + Premium received for selling the call − Strike price of the call you buy + Strike price of the call you sell)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Net debit spread</strong> = <code>Amount of options you will trade × ( − Premium spent for buying the call + Premium received for selling the call)</code> — the form to use when Amount of options you will trade, Premium spent for buying the call and Premium received for selling the call are the values you have.</li><li><strong>Premium received for selling the call</strong> = <code>Premium spent for buying the call + Net debit spread ÷ Amount of options you will trade</code> — the form to use when Premium spent for buying the call, Net debit spread and Amount of options you will trade are the values you have.</li><li><strong>Amount of options you will trade</strong> = <code>− Net debit spread ÷ (Premium spent for buying the call − Premium received for selling the call)</code> — the form to use when Net debit spread, Premium spent for buying the call and Premium received for selling the call are the values you have.</li><li><strong>Premium spent for buying the call</strong> = <code>− Net debit spread ÷ Amount of options you will trade + Premium received for selling the call</code> — the form to use when Net debit spread, Amount of options you will trade and Premium received for selling the call are the values you have.</li><li><strong>Maximum loss</strong> = <code>100 × Amount of options you will trade × ( − Premium spent for buying the call + Premium received for selling the call)</code> — the form to use when Amount of options you will trade, Premium spent for buying the call and Premium received for selling the call are the values you have.</li><li><strong>Premium spent for buying the call</strong> = <code>− 1 ÷ 100 × Maximum loss ÷ Amount of options you will trade + Premium received for selling the call</code> — the form to use when Maximum loss, Amount of options you will trade and Premium received for selling the call are the values you have.</li><li><strong>Premium received for selling the call</strong> = <code>Premium spent for buying the call + (1 ÷ 100) × Maximum loss ÷ Amount of options you will trade</code> — the form to use when Premium spent for buying the call, Maximum loss and Amount of options you will trade are the values you have.</li><li><strong>Amount of options you will trade</strong> = <code>− Maximum loss ÷ (100 × Premium spent for buying the call − 100 × Premium received for selling the call)</code> — the form to use when Maximum loss, Premium spent for buying the call and Premium received for selling the call are the values you have.</li></ul><p>Any one of Net debit spread, Premium received for selling the call and Amount of options you will trade can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Your target price at expiration, Strike price of the call you buy and Strike price of the call you buy are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Amount of options you will trade left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Amount of options you will trade is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Premium spent for buying the call left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Premium spent for buying the call is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Premium received for selling the call left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Premium received for selling the call is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Amount of options you will trade to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Options spread form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Amount of options you will trade</strong> takes a plain number with no unit attached. Remember that each option contract refers to the right over 100 shares. Therefore, for a 4 option contract, you are buying the rights to 400 shares. It feeds Premium received for selling the call, Net debit spread and Premium spent for buying the call. Fill it from a measurement rather than a memory — Amount of options you will trade is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Premium spent for buying the call</strong> takes a plain number with no unit attached. It feeds Premium received for selling the call, Amount of options you will trade and Net debit spread. Fill it from a measurement rather than a memory — Premium spent for buying the call is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Premium received for selling the call</strong> takes a plain number with no unit attached. It feeds Amount of options you will trade, Net debit spread and Premium spent for buying the call. Fill it from a measurement rather than a memory — Premium received for selling the call is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Your target price at expiration follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Amount of options you will trade, Premium spent for buying the call and Premium received for selling the call and the number you are missing is Your target price at expiration and Strike price of the call you buy.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/lumpsum">Lumpsum (India)</a>, <a href="/finance/lumpsum-plus-sip">Lumpsum plus SIP</a> and <a href="/finance/magi">MAGI Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Options spread calculator work out?', 'a' => <<<'TXT'
            Your target price at expiration, Strike price of the call you buy, Strike price of the call you buy and Premium spent for buying the call, from Amount of options you will trade, Premium spent for buying the call and Premium received for selling the call. The relationship is Net debit spread = Amount of options you will trade × ( − Premium spent for buying the call + Premium received for selling the call).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Amount of options you will trade, Premium spent for buying the call (USD), Premium received for selling the call (USD). With amount of options you will trade, premium spent for buying the call and premium received for selling the call in place, Your target price at expiration can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Net debit spread, Premium received for selling the call, Amount of options you will trade and Premium spent for buying the call blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Your target price at expiration is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Amount of options you will trade blank and the page solves for it, reporting Your target price at expiration instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Your target price at expiration keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/lumpsum', 'name' => 'Lumpsum (India)'],
            ['path' => '/finance/lumpsum-plus-sip', 'name' => 'Lumpsum plus SIP'],
            ['path' => '/finance/magi', 'name' => 'MAGI Calculator'],
        ],
        'authors' => [],
    ],
];
