<?php

/**
 * Money counter
 * /finance/money-counter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Money counter',
    'meta' => ['title' => 'Money counter Calculator — Formula, Units & Example', 'description' => 'Money counter turns currency, $1 and $2 into total money. Any box can be the unknown. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Money counter Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'currency',
                            'label' => 'Currency',
                            'type' => 'select',
                            'options' => [
                                'USD - US Dollar' => '0',
                                'GBP - Pound Sterling' => '1',
                                'EUR - Euro' => '2',
                                'CAD - Canadian Dollar' => '3',
                                'AUD - Australian Dollar' => '4',
                                'CHF - Swiss Franc' => '5',
                                'NZD - New Zealand Dollar' => '6',
                                'INR - Indian Rupee' => '7',
                                'PHP - Philippine Peso' => '8',
                                'MYR - Malaysian Ringgit' => '9',
                                'PLN - Polish Zloty' => '10',
                            ],
                            'control' => 'DROPDOWN',
                            'default' => 'USD - US Dollar',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coins',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include coins' => '1', '' => '0'],
                            'dataset' => 'Count option',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Banknotes',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usd_1',
                            'label' => '$1',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usd_2',
                            'label' => '$2',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usd_5',
                            'label' => '$5',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usd_10',
                            'label' => '$10',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usd_20',
                            'label' => '$20',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usd_50',
                            'label' => '$50',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usd_100',
                            'label' => '$100',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gbp_5',
                            'label' => '£5',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gbp_10',
                            'label' => '£10',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gbp_20',
                            'label' => '£20',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gbp_50',
                            'label' => '£50',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_5',
                            'label' => '€5',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_10',
                            'label' => '€10',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_20',
                            'label' => '€20',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_50',
                            'label' => '€50',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_100',
                            'label' => '€100',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_200',
                            'label' => '€200',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_500',
                            'label' => '€500',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cad_1',
                            'label' => '$1',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cad_5',
                            'label' => '$5',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cad_10',
                            'label' => '$10',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cad_20',
                            'label' => '$20',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cad_50',
                            'label' => '$50',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cad_100',
                            'label' => '$100',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aud_5',
                            'label' => '$5',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aud_10',
                            'label' => '$10',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aud_20',
                            'label' => '$20',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aud_50',
                            'label' => '$50',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aud_100',
                            'label' => '$100',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chf_10',
                            'label' => '₣10',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chf_20',
                            'label' => '₣20',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chf_50',
                            'label' => '₣50',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chf_100',
                            'label' => '₣100',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chf_200',
                            'label' => '₣200',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chf_1000',
                            'label' => '₣1,000',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nzd_10',
                            'label' => '$10',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nzd_20',
                            'label' => '$20',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nzd_50',
                            'label' => '$50',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nzd_100',
                            'label' => '$100',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_2',
                            'label' => '₹2',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_5',
                            'label' => '₹5',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_10',
                            'label' => '₹10',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_20',
                            'label' => '₹20',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_50',
                            'label' => '₹50',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_100',
                            'label' => '₹100',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_200',
                            'label' => '₹200',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_500',
                            'label' => '₹500',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_2000',
                            'label' => '₹2,000',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_20',
                            'label' => '₱20',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_50',
                            'label' => '₱50',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_100',
                            'label' => '₱100',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_200',
                            'label' => '₱200',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_500',
                            'label' => '₱500',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_1000',
                            'label' => '₱1,000',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myr_1',
                            'label' => 'RM 1',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myr_2',
                            'label' => 'RM 2',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myr_5',
                            'label' => 'RM 5',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myr_10',
                            'label' => 'RM 10',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myr_20',
                            'label' => 'RM 20',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myr_50',
                            'label' => 'RM 50',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myr_100',
                            'label' => 'RM 100',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_10',
                            'label' => '10zł',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_20',
                            'label' => '20zł',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_50',
                            'label' => '50zł',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_100',
                            'label' => '100zł',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_200',
                            'label' => '200zł',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Coins',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usd_0_01',
                            'label' => '1¢',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usd_0_05',
                            'label' => '5¢',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usd_0_10',
                            'label' => '10¢',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usd_0_25',
                            'label' => '25¢',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usd_0_50',
                            'label' => '50¢',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usd_0_100',
                            'label' => '$1',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gbp_0_01',
                            'label' => '1p',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gbp_0_02',
                            'label' => '2p',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gbp_0_05',
                            'label' => '5p',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gbp_0_10',
                            'label' => '10p',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gbp_0_20',
                            'label' => '20p',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gbp_0_50',
                            'label' => '50p',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gbp_0_100',
                            'label' => '£1',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gbp_0_200',
                            'label' => '£2',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_0_01',
                            'label' => '1c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_0_02',
                            'label' => '2c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_0_05',
                            'label' => '5c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_0_10',
                            'label' => '10c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_0_20',
                            'label' => '20c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_0_50',
                            'label' => '50c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_0_100',
                            'label' => '€1',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_0_200',
                            'label' => '€2',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cad_0_01',
                            'label' => '1¢',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cad_0_05',
                            'label' => '5¢',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cad_0_10',
                            'label' => '10¢',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cad_0_25',
                            'label' => '25¢',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cad_0_50',
                            'label' => '50¢',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cad_0_100',
                            'label' => '$1',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cad_0_200',
                            'label' => '$2',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aud_0_05',
                            'label' => '5c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aud_0_10',
                            'label' => '10c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aud_0_20',
                            'label' => '20c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aud_0_50',
                            'label' => '50c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aud_0_100',
                            'label' => '$1',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aud_0_200',
                            'label' => '$2',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chf_0_05',
                            'label' => '5c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chf_0_10',
                            'label' => '10c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chf_0_20',
                            'label' => '20c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chf_0_50',
                            'label' => '₣½',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chf_0_100',
                            'label' => '₣1',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chf_0_200',
                            'label' => '₣2',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chf_0_500',
                            'label' => '₣5',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nzd_0_10',
                            'label' => '10c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nzd_0_20',
                            'label' => '20c',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nzd_0_50',
                            'label' => '50',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nzd_0_100',
                            'label' => '$1',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nzd_0_200',
                            'label' => '$2',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_0_50',
                            'label' => '50 paise',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_0_100',
                            'label' => '₹1',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_0_200',
                            'label' => '₹2',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_0_500',
                            'label' => '₹5',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_0_1000',
                            'label' => '₹10',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_0_2000',
                            'label' => '₹20',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_0_01',
                            'label' => '1¢',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_0_05',
                            'label' => '5¢',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_0_10',
                            'label' => '10¢',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_0_25',
                            'label' => '25¢',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_0_100',
                            'label' => '₱1',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_0_500',
                            'label' => '₱5',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_0_1000',
                            'label' => '₱10',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_0_2000',
                            'label' => '₱20',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myr_0_01',
                            'label' => '1 sen',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myr_0_05',
                            'label' => '5 sen',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myr_0_10',
                            'label' => '10 sen',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myr_0_20',
                            'label' => '20 sen',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myr_0_50',
                            'label' => '50 sen',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myr_0_100',
                            'label' => 'RM 1',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_0_01',
                            'label' => '1gr',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_0_02',
                            'label' => '2gr',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_0_05',
                            'label' => '5gr',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_0_10',
                            'label' => '10gr',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_0_20',
                            'label' => '20gr',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_0_50',
                            'label' => '50gr',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_0_100',
                            'label' => '1zł',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_0_200',
                            'label' => '2zł',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_0_500',
                            'label' => '5zł',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
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
                            'name' => 'usd_total',
                            'label' => 'Total money',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gbp_total',
                            'label' => 'Total money',
                            'type' => 'number',
                            'prefix' => '£',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eur_total',
                            'label' => 'Total money',
                            'type' => 'number',
                            'prefix' => '€',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cad_total',
                            'label' => 'Total money',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aud_total',
                            'label' => 'Total money',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chf_total',
                            'label' => 'Total money',
                            'type' => 'number',
                            'prefix' => '₣',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nzd_total',
                            'label' => 'Total money',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inr_total',
                            'label' => 'Total money',
                            'type' => 'number',
                            'prefix' => '₹',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'php_total',
                            'label' => 'Total money',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myr_total',
                            'label' => 'Total money',
                            'type' => 'number',
                            'prefix' => 'RM',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln_total',
                            'label' => 'Total money',
                            'type' => 'number',
                            'prefix' => 'zł',
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
            'title' => 'usd_total = usd_calc(usd_1, usd_2, usd_5, usd_10, usd_20, usd_50, usd_100, usd_0_01, usd_0_05, usd_0_10, usd_0_25, usd_0_50, usd_0_100)',
            'results' => ['usd_total' => 'usd_calc(usd_1, usd_2, usd_5, usd_10, usd_20, usd_50, usd_100, usd_0_01, usd_0_05, usd_0_10, usd_0_25, usd_0_50, usd_0_100)'],
        ],
        [
            'title' => 'gbp_total = gbp_calc(gbp_5, gbp_10, gbp_20, gbp_50, gbp_0_01, gbp_0_02, gbp_0_05, gbp_0_10, gbp_0_20, gbp_0_50, gbp_0_100, gbp_0_200)',
            'results' => ['gbp_total' => 'gbp_calc(gbp_5, gbp_10, gbp_20, gbp_50, gbp_0_01, gbp_0_02, gbp_0_05, gbp_0_10, gbp_0_20, gbp_0_50, gbp_0_100, gbp_0_200)'],
        ],
        [
            'title' => 'eur_total = eur_calc(eur_5, eur_10, eur_20, eur_50, eur_100, eur_200, eur_500, eur_0_01, eur_0_02, eur_0_05, eur_0_10, eur_0_20, eur_0_50, eur_0_100, eur_0_200)',
            'results' => ['eur_total' => 'eur_calc(eur_5, eur_10, eur_20, eur_50, eur_100, eur_200, eur_500, eur_0_01, eur_0_02, eur_0_05, eur_0_10, eur_0_20, eur_0_50, eur_0_100, eur_0_200)'],
        ],
        [
            'title' => 'cad_total = cad_calc(cad_1, cad_5, cad_10, cad_20, cad_50, cad_100, cad_0_01, cad_0_05, cad_0_10, cad_0_25, cad_0_50, cad_0_100, cad_0_200)',
            'results' => ['cad_total' => 'cad_calc(cad_1, cad_5, cad_10, cad_20, cad_50, cad_100, cad_0_01, cad_0_05, cad_0_10, cad_0_25, cad_0_50, cad_0_100, cad_0_200)'],
        ],
        [
            'title' => 'aud_total = aud_calc(aud_5, aud_10, aud_20, aud_50, aud_100, aud_0_05, aud_0_10, aud_0_20, aud_0_50, aud_0_100, aud_0_200)',
            'results' => ['aud_total' => 'aud_calc(aud_5, aud_10, aud_20, aud_50, aud_100, aud_0_05, aud_0_10, aud_0_20, aud_0_50, aud_0_100, aud_0_200)'],
        ],
        [
            'title' => 'chf_total = chf_calc(chf_10, chf_20, chf_50, chf_100, chf_200, chf_1000, chf_0_05, chf_0_10, chf_0_20, chf_0_50, chf_0_100, chf_0_200, chf_0_500)',
            'results' => ['chf_total' => 'chf_calc(chf_10, chf_20, chf_50, chf_100, chf_200, chf_1000, chf_0_05, chf_0_10, chf_0_20, chf_0_50, chf_0_100, chf_0_200, chf_0_500)'],
        ],
        [
            'title' => 'nzd_total = nzd_calc(nzd_10, nzd_20, nzd_50, nzd_100, nzd_0_10, nzd_0_20, nzd_0_50, nzd_0_100, nzd_0_200)',
            'results' => ['nzd_total' => 'nzd_calc(nzd_10, nzd_20, nzd_50, nzd_100, nzd_0_10, nzd_0_20, nzd_0_50, nzd_0_100, nzd_0_200)'],
        ],
        [
            'title' => <<<'TXT'
            inr_total = inr_calc(inr_2, inr_5, inr_10, inr_20, inr_50, inr_100, inr_200, inr_500, inr_2000, inr_0_50, inr_0_100, inr_0_200, inr_0_500, inr_0_1000, inr_0_2000)
            TXT,
            'results' => ['inr_total' => 'inr_calc(inr_2, inr_5, inr_10, inr_20, inr_50, inr_100, inr_200, inr_500, inr_2000, inr_0_50, inr_0_100, inr_0_200, inr_0_500, inr_0_1000, inr_0_2000)'],
        ],
        [
            'title' => 'php_total = php_calc(php_20, php_50, php_100, php_200, php_500, php_1000, php_0_01, php_0_05, php_0_10, php_0_25, php_0_100, php_0_500, php_0_1000, php_0_2000)',
            'results' => ['php_total' => 'php_calc(php_20, php_50, php_100, php_200, php_500, php_1000, php_0_01, php_0_05, php_0_10, php_0_25, php_0_100, php_0_500, php_0_1000, php_0_2000)'],
        ],
        [
            'title' => 'myr_total = myr_calc(myr_1, myr_2, myr_5, myr_10, myr_20, myr_50, myr_100, myr_0_01, myr_0_05, myr_0_10, myr_0_20, myr_0_50, myr_0_100)',
            'results' => ['myr_total' => 'myr_calc(myr_1, myr_2, myr_5, myr_10, myr_20, myr_50, myr_100, myr_0_01, myr_0_05, myr_0_10, myr_0_20, myr_0_50, myr_0_100)'],
        ],
        [
            'title' => 'pln_total = pln_calc(pln_10, pln_20, pln_50, pln_100, pln_200, pln_0_01, pln_0_02, pln_0_05, pln_0_10, pln_0_20, pln_0_50, pln_0_100, pln_0_200, pln_0_500)',
            'results' => ['pln_total' => 'pln_calc(pln_10, pln_20, pln_50, pln_100, pln_200, pln_0_01, pln_0_02, pln_0_05, pln_0_10, pln_0_20, pln_0_50, pln_0_100, pln_0_200, pln_0_500)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("usd_calc",function(usd_1,usd_2,usd_5,usd_10,usd_20,usd_50,usd_100,usd_0_01,usd_0_05,usd_0_10,usd_0_25,usd_0_50,usd_0_100){return 0.01*usd_0_01+0.05*usd_0_05+0.1*usd_0_10+0.25*usd_0_25+0.5*usd_0_50+usd_0_100+usd_1+2*usd_2+5*usd_5+10*usd_10+20*usd_20+50*usd_50+100*usd_100});omni.define("gbp_calc",function(gbp_5,gbp_10,gbp_20,gbp_50,gbp_0_01,gbp_0_02,gbp_0_05,gbp_0_10,gbp_0_20,gbp_0_50,gbp_0_100,gbp_0_200){return 0.01*gbp_0_01+0.02*gbp_0_02+0.05*gbp_0_05+0.1*gbp_0_10+0.2*gbp_0_20+0.5*gbp_0_50+gbp_0_100+2*gbp_0_200+5*gbp_5+10*gbp_10+20*gbp_20+50*gbp_50});omni.define("eur_calc",function(eur_5,eur_10,eur_20,eur_50,eur_100,eur_200,eur_500,eur_0_01,eur_0_02,eur_0_05,eur_0_10,eur_0_20,eur_0_50,eur_0_100,eur_0_200){return 0.01*eur_0_01+0.02*eur_0_02+0.05*eur_0_05+0.1*eur_0_10+0.2*eur_0_20+0.5*eur_0_50+eur_0_100+2*eur_0_200+5*eur_5+10*eur_10+20*eur_20+50*eur_50+100*eur_100+200*eur_200+500*eur_500});omni.define("cad_calc",function(cad_1,cad_5,cad_10,cad_20,cad_50,cad_100,cad_0_01,cad_0_05,cad_0_10,cad_0_25,cad_0_50,cad_0_100,cad_0_200){return 0.01*cad_0_01+0.05*cad_0_05+0.1*cad_0_10+0.25*cad_0_25+0.5*cad_0_50+cad_0_100+2*cad_0_200+cad_1+5*cad_5+10*cad_10+20*cad_20+50*cad_50+100*cad_100});omni.define("aud_calc",function(aud_5,aud_10,aud_20,aud_50,aud_100,aud_0_05,aud_0_10,aud_0_20,aud_0_50,aud_0_100,aud_0_200){return 0.05*aud_0_05+0.1*aud_0_10+0.2*aud_0_20+0.5*aud_0_50+aud_0_100+2*aud_0_200+5*aud_5+10*aud_10+20*aud_20+50*aud_50+100*aud_100});omni.define("chf_calc",function(chf_10,chf_20,chf_50,chf_100,chf_200,chf_1000,chf_0_05,chf_0_10,chf_0_20,chf_0_50,chf_0_100,chf_0_200,chf_0_500){return 0.05*chf_0_05+0.1*chf_0_10+0.2*chf_0_20+0.5*chf_0_50+chf_0_100+2*chf_0_200+5*chf_0_500+10*chf_10+20*chf_20+50*chf_50+100*chf_100+200*chf_200+1000*chf_1000});omni.define("nzd_calc",function(nzd_10,nzd_20,nzd_50,nzd_100,nzd_0_10,nzd_0_20,nzd_0_50,nzd_0_100,nzd_0_200){return 0.1*nzd_0_10+0.2*nzd_0_20+0.5*nzd_0_50+nzd_0_100+2*nzd_0_200+10*nzd_10+20*nzd_20+50*nzd_50+100*nzd_100});omni.define("inr_calc",function(inr_2,inr_5,inr_10,inr_20,inr_50,inr_100,inr_200,inr_500,inr_2000,inr_0_50,inr_0_100,inr_0_200,inr_0_500,inr_0_1000,inr_0_2000){return 0.5*inr_0_50+inr_0_100+2*inr_0_200+5*inr_0_500+10*inr_0_1000+20*inr_0_2000+2*inr_2+5*inr_5+10*inr_10+20*inr_20+50*inr_50+100*inr_100+200*inr_200+500*inr_500+2000*inr_2000});omni.define("php_calc",function(php_20,php_50,php_100,php_200,php_500,php_1000,php_0_01,php_0_05,php_0_10,php_0_25,php_0_100,php_0_500,php_0_1000,php_0_2000){return 0.01*php_0_01+0.05*php_0_05+0.1*php_0_10+0.25*php_0_25+php_0_100+5*php_0_500+10*php_0_1000+20*php_0_2000+20*php_20+50*php_50+100*php_100+200*php_200+500*php_500+1000*php_1000});omni.define("myr_calc",function(myr_1,myr_2,myr_5,myr_10,myr_20,myr_50,myr_100,myr_0_01,myr_0_05,myr_0_10,myr_0_20,myr_0_50,myr_0_100){return 0.01*myr_0_01+0.05*myr_0_05+0.1*myr_0_10+0.2*myr_0_20+0.5*myr_0_50+myr_0_100+myr_1+2*myr_2+5*myr_5+10*myr_10+20*myr_20+50*myr_50+100*myr_100});omni.define("pln_calc",function(pln_10,pln_20,pln_50,pln_100,pln_200,pln_0_01,pln_0_02,pln_0_05,pln_0_10,pln_0_20,pln_0_50,pln_0_100,pln_0_200,pln_0_500){return 0.01*pln_0_01+ +0.02*pln_0_02+0.05*pln_0_05+0.1*pln_0_10+0.2*pln_0_20+0.5*pln_0_50+pln_0_100+2*pln_0_200+5*pln_0_500+10*pln_10+20*pln_20+50*pln_50+100*pln_100+200*pln_200});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Money counter takes $1, $2 and $5 and returns Total money and Total money. Nothing is looked up on this page: total money is computed from $1 and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Money counter calculator works', 'html' => <<<'TXT'
            <p>Money counter answers one question from 13 numbers, and the answer is Total money, Total money and Total money.</p><p>In the form&#039;s own words, Total money = usd_calc($1, $2, $5, $10, $20, $50, $100, 1¢, 5¢, 10¢, 25¢, 50¢, $1).</p><p>The result panel carries Total money, Total money, Total money and Total money, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 13 boxes and the page has everything it needs.</p><ul><li><strong>$1</strong> — a plain number, no unit</li><li><strong>$2</strong> — a plain number, no unit</li><li><strong>$5</strong> — a plain number, no unit</li><li><strong>$10</strong> — a plain number, no unit</li><li><strong>$20</strong> — a plain number, no unit</li><li><strong>$50</strong> — a plain number, no unit</li><li><strong>$100</strong> — a plain number, no unit</li><li><strong>1¢</strong> — a plain number, no unit</li><li><strong>5¢</strong> — a plain number, no unit</li><li><strong>10¢</strong> — a plain number, no unit</li><li><strong>25¢</strong> — a plain number, no unit</li><li><strong>50¢</strong> — a plain number, no unit</li><li><strong>$1</strong> — a plain number, no unit</li></ul><p>The answers come back as Total money, Total money, Total money, Total money, Total money, Total money, Total money, Total money, Total money, Total money, Total money. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Total money takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total money</strong> = <code>usd_calc($1, $2, $5, $10, $20, $50, $100, 1¢, 5¢, 10¢, 25¢, 50¢, $1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total money</strong> = <code>usd_calc($1, $2, $5, $10, $20, $50, $100, 1¢, 5¢, 10¢, 25¢, 50¢, $1)</code> — the form to use when $1, $2, $5 and $10 are the values you have.</li><li><strong>Total money</strong> = <code>gbp_calc(£5, £10, £20, £50, 1p, 2p, 5p, 10p, 20p, 50p, £1, £2)</code> — the form to use when £5, £10, £20 and £50 are the values you have.</li><li><strong>Total money</strong> = <code>eur_calc(€5, €10, €20, €50, €100, €200, €500, 1c, 2c, 5c, 10c, 20c, 50c, €1, €2)</code> — the form to use when €5, €10, €20 and €50 are the values you have.</li><li><strong>Total money</strong> = <code>cad_calc($1, $5, $10, $20, $50, $100, 1¢, 5¢, 10¢, 25¢, 50¢, $1, $2)</code> — the form to use when $1, $5, $10 and $20 are the values you have.</li><li><strong>Total money</strong> = <code>aud_calc($5, $10, $20, $50, $100, 5c, 10c, 20c, 50c, $1, $2)</code> — the form to use when $5, $10, $20 and $50 are the values you have.</li><li><strong>Total money</strong> = <code>chf_calc(₣10, ₣20, ₣50, ₣100, ₣200, ₣1,000, 5c, 10c, 20c, ₣½, ₣1, ₣2, ₣5)</code> — the form to use when ₣10, ₣20, ₣50 and ₣100 are the values you have.</li><li><strong>Total money</strong> = <code>nzd_calc($10, $20, $50, $100, 10c, 20c, 50, $1, $2)</code> — the form to use when $10, $20, $50 and $100 are the values you have.</li><li><strong>Total money</strong> = <code>inr_calc(₹2, ₹5, ₹10, ₹20, ₹50, ₹100, ₹200, ₹500, ₹2,000, 50 paise, ₹1, ₹2, ₹5, ₹10, ₹20)</code> — the form to use when ₹2, ₹5, ₹10 and ₹20 are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total money, Total money and Total money can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total money, Total money and Total money are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>$1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If $1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>$2 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If $2 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>$5 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If $5 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in $1 and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>$1</strong> takes a plain number with no unit attached. Change it and Total money changes with it. Have it to hand before you start: $1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>$2</strong> takes a plain number with no unit attached. Change it and Total money changes with it. Have it to hand before you start: $2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>$5</strong> takes a plain number with no unit attached. Change it and Total money changes with it. Have it to hand before you start: $5 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>$10</strong> takes a plain number with no unit attached. Change it and Total money changes with it. Have it to hand before you start: $10 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>$20</strong> takes a plain number with no unit attached. Change it and Total money changes with it. Have it to hand before you start: $20 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>$50</strong> takes a plain number with no unit attached. Change it and Total money changes with it. Have it to hand before you start: $50 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>$100</strong> takes a plain number with no unit attached. Change it and Total money changes with it. Have it to hand before you start: $100 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>1¢</strong> takes a plain number with no unit attached. Change it and Total money changes with it. Have it to hand before you start: 1¢ is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>5¢</strong> takes a plain number with no unit attached. Change it and Total money changes with it. Have it to hand before you start: 5¢ is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>10¢</strong> takes a plain number with no unit attached. Change it and Total money changes with it. Have it to hand before you start: 10¢ is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>25¢</strong> takes a plain number with no unit attached. Change it and Total money changes with it. Have it to hand before you start: 25¢ is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>50¢</strong> takes a plain number with no unit attached. Change it and Total money changes with it. Have it to hand before you start: 50¢ is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>$1</strong> takes a plain number with no unit attached. Change it and Total money changes with it. Have it to hand before you start: $1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need $1, $2, $5 and $10. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type $1 into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Total money with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total money follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes $1, $2 and $5 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: $1, $2 and $5 measured, Total money and Total money wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/subscription-waste">Subscription waste Calculator</a>, <a href="/finance/sustainable-growth-rate">Sustainable growth rate Calculator</a> and <a href="/finance/swp">SWP (India) Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Money counter is a number to act on, so the useful question is what to do with Total money, Total money and Total money once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down $1, $2, $5 and $10 alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Money counter calculator work out?', 'a' => <<<'TXT'
            Total money, Total money, Total money and Total money, from $1, $2, $5 and $10. The relationship is Total money = usd_calc($1, $2, $5, $10, $20, $50, $100, 1¢, 5¢, 10¢, 25¢, 50¢, $1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => '$1, $2, $5, $10, $20. With $1, $2 and $5 in place, Total money can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Total money, Total money, Total money and Total money can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total money is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With $1 left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Total money keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/subscription-waste', 'name' => 'Subscription waste Calculator'],
            ['path' => '/finance/sustainable-growth-rate', 'name' => 'Sustainable growth rate Calculator'],
            ['path' => '/finance/swp', 'name' => 'SWP (India) Calculator'],
        ],
        'authors' => [],
    ],
];
