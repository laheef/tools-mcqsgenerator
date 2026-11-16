<?php

/**
 * One-time child costs
 * /everyday-life/child-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'One-time child costs',
    'meta' => ['title' => 'One-time child costs: Formula, Steps & Results', 'description' => 'One-time child costs reports the sum of all one-time costs, nursery, feeding and bath. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'One-time child costs Calculator', 'updated' => '2026-08-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'twinOne',
                            'label' => 'You are expecting...',
                            'type' => 'select',
                            'options' => ['one child ' => '1', 'twins ' => '2'],
                            'dataset' => 'expect',
                            'defaults' => [
                                ['value' => 'one child ', 'when' => null],
                                ['value' => 'one child ', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Twins — double love and double costs? Not always! If there isn\'t a (2x) next to an item, you likely only need it once.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'suggested_price',
                            'label' => 'See the items\' price range?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'pump',
                            'help' => 'Available at the end of each section. We set average values by default.',
                            'defaults' => [
                                ['value' => 'No', 'when' => null],
                                ['value' => 'No', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => ' Nursery',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'crib',
                            'label' => 'Crib/Bassinet',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '230', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '350', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tcrib',
                            'label' => 'Cribs/Bassinets (2x)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '460', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '700', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sleeper',
                            'label' => 'Co-sleeper',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '165', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '375', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tsleeper',
                            'label' => 'Co-sleepers (2x)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '330', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '750', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bedding',
                            'label' => 'Basic bedding & blankets',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '64', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '150', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tbedding',
                            'label' => 'Basic bedding & blankets  (2x)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '128', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '300', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'changing_table',
                            'label' => 'Changing table',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '120', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '250', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monitor',
                            'label' => 'Baby monitor',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '50', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '400', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => '$120 - $850 per crib $130 - $200 per co-sleeper $30 - $90 per bedding set $80 - $250 per changing table $40 - $60 per baby monitor'],
                    ],
                ],
            ],
        ],
        [
            'title' => ' Feeding',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bra',
                            'label' => 'Nursing bras',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '25', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '80', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pillow',
                            'label' => 'Nursing pillow',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '30', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '120', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cloth',
                            'label' => 'Bib',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '50', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '40', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tcloth',
                            'label' => 'Bibs',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '50', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '80', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'if_pump',
                            'label' => 'Are you planning to express?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'pump',
                            'help' => 'Produce milk which is stored and used later.',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'storage_bag',
                            'label' => 'Storage bag',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '50', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '0', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pump',
                            'label' => 'Electric/manual breast pump',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '0', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bottles',
                            'label' => 'Bottles/nipples',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '0', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tbottles',
                            'label' => 'Bottles/nipples (2x)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '0', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'brush',
                            'label' => 'Bottle brush',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '0', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        $10 - $30 per nursing bra $24 - $44 per nursing pillow $6 - $20 per a set of bibs $30 - $350 per breast pump $8 - $30 per set of bottles $7 - $15 per bottle brush
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => ' Bath',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bathtub',
                            'label' => 'Infant bathtub',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '20', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '60', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'washcloth',
                            'label' => 'Washcloths',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '10', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '25', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'twashcloth',
                            'label' => 'Washcloths (2x)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '20', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '50', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'towel',
                            'label' => 'Baby towel with hood',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '16', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '30', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ttowel',
                            'label' => 'Baby towel with hood (2x)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '32', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '60', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'comb',
                            'label' => 'Brush & comb',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '8', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '20', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nailclipper',
                            'label' => 'Baby nail clippers',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '3', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '10', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => '$60 - $150 per car seat $70 - $900 per stroller $25 - $120 per carrier $25 - $200 per diaper bag'],
                    ],
                ],
            ],
        ],
        [
            'title' => ' Transportation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'car_seat',
                            'label' => 'Infant car seats',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '100', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '700', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tcar_seat',
                            'label' => 'Infant car seat (2x)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '200', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '1400', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stroller',
                            'label' => 'Stroller',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '130', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '600', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tstroller',
                            'label' => 'Double stroller',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '160', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '2500', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'carrier',
                            'label' => 'Sling/wrap carrier',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '60', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '300', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tcarrier',
                            'label' => 'Sling/wrap carrier (2x)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '120', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '600', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diaper_bag',
                            'label' => 'Diaper bag',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '50', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '400', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => '$60 - $150 per car seat $70 - $900 per stroller $25 - $120 per carrier $25 - $200 per diaper bag'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Other',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pacifier',
                            'label' => 'Pacifier',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '2', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '20', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tpacifier',
                            'label' => 'Pacifiers (2x)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '4', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '40', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sth_dif',
                            'label' => 'Anything else?',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => 'isUserFromCountry(\'US\')'],
                                ['value' => '0', 'when' => 'isUserFromCountry(\'PL\')'],
                                ['value' => '0', 'when' => 'not(isUserFromCountry(\'US\') or isUserFromCountry(\'PL\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => '$3 - $8 per pacifier'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'In total',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sumSection',
                            'label' => 'The sum of all one-time costs',
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
                            'name' => 'tsum',
                            'label' => 'The sum of all one-time costs',
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
                                ['when' => null, 'text' => <<<'TXT'
                                The one-time costs related to a baby's needs may be incredibly high  but can be surprisingly low. You can significantly reduce your expenses by buying second-hand items or re-using the items you purchased for your older children. At the same time, you help the Earth  stay clean!
                                TXT],
                                ['when' => null, 'text' => 'Detailed costs of each category:'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nursery',
                            'label' => 'Nursery',
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
                            'name' => 'tnursery',
                            'label' => 'Nursery',
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
                            'name' => 'feeding',
                            'label' => 'Feeding',
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
                            'name' => 'tfeeding',
                            'label' => 'Feeding',
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
                            'name' => 'bath',
                            'label' => 'Bath',
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
                            'name' => 'tbath',
                            'label' => 'Bath',
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
                            'name' => 'gear',
                            'label' => 'Transportation',
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
                            'name' => 'tgear',
                            'label' => 'Transportation',
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
                            'name' => 'other',
                            'label' => 'Other',
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
                            'name' => 'tother',
                            'label' => 'Other',
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
            'title' => 'gear = get_gear (car_seat, stroller, carrier, diaper_bag)',
            'results' => ['gear' => 'get_gear(car_seat, stroller, carrier, diaper_bag)'],
        ],
        [
            'title' => 'nursery = get_nursery (crib, changing_table, sleeper, bedding, monitor)',
            'results' => ['nursery' => 'get_nursery(crib, changing_table, sleeper, bedding, monitor)'],
        ],
        [
            'title' => 'feeding = get_feeding (bottles, cloth, brush,pump, bra, pillow, storage_bag, if_pump)',
            'results' => ['feeding' => 'get_feeding(bottles, cloth, brush, pump, bra, pillow, storage_bag, if_pump)'],
        ],
        [
            'title' => 'bath = get_bath(towel, bathtub, comb, nailclipper, washcloth)',
            'results' => ['bath' => 'get_bath(towel, bathtub, comb, nailclipper, washcloth)'],
        ],
        [
            'title' => 'other = get_other(pacifier, sth_dif)',
            'results' => ['other' => 'get_other(pacifier, sth_dif)'],
        ],
        [
            'title' => 'tgear = get_gear (tcar_seat, tstroller, tcarrier, diaper_bag)',
            'results' => ['tgear' => 'get_gear(tcar_seat, tstroller, tcarrier, diaper_bag)'],
        ],
        [
            'title' => 'tnursery = get_nursery (tcrib, changing_table, tsleeper, tbedding, monitor)',
            'results' => ['tnursery' => 'get_nursery(tcrib, changing_table, tsleeper, tbedding, monitor)'],
        ],
        [
            'title' => 'tfeeding = get_feeding (tbottles, tcloth, brush,pump, bra, pillow, storage_bag, if_pump)',
            'results' => ['tfeeding' => 'get_feeding(tbottles, tcloth, brush, pump, bra, pillow, storage_bag, if_pump)'],
        ],
        [
            'title' => 'tbath = get_bath(ttowel, bathtub, comb, nailclipper, twashcloth)',
            'results' => ['tbath' => 'get_bath(ttowel, bathtub, comb, nailclipper, twashcloth)'],
        ],
        [
            'title' => 'tother = get_other(tpacifier, sth_dif)',
            'results' => ['tother' => 'get_other(tpacifier, sth_dif)'],
        ],
        [
            'title' => 'sumSection = get_sum(gear , nursery, feeding,bath,other )',
            'results' => ['sumSection' => <<<'TXT'
            get_sum(get_gear(car_seat, stroller, carrier, diaper_bag), get_nursery(crib, changing_table, sleeper, bedding, monitor), get_feeding(bottles, cloth, brush, pump, bra, pillow, storage_bag, if_pump), get_bath(towel, bathtub, comb, nailclipper, washcloth), get_other(pacifier, sth_dif))
            TXT],
        ],
        [
            'title' => 'tsum = get_sum(tgear, tnursery, tfeeding,tbath,tother )',
            'results' => ['tsum' => <<<'TXT'
            get_sum(get_gear(tcar_seat, tstroller, tcarrier, diaper_bag), get_nursery(tcrib, changing_table, tsleeper, tbedding, monitor), get_feeding(tbottles, tcloth, brush, pump, bra, pillow, storage_bag, if_pump), get_bath(ttowel, bathtub, comb, nailclipper, twashcloth), get_other(tpacifier, sth_dif))
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_gear",function(car_seat,_stroller,_carrier,diaper_bag){var carSeat=Number(car_seat);var stroller=Number(_stroller);var carrier=Number(_carrier);var diaperBag=Number(diaper_bag);var sum=carSeat+stroller+carrier+diaperBag;return sum});omni.define("get_bath",function(towel,bathtub,comb,nailclipper,washcloth){towel=Number(towel);bathtub=Number(bathtub);comb=Number(comb);nailclipper=Number(nailclipper);washcloth=Number(washcloth);var sum=towel+bathtub+comb+nailclipper+washcloth;return sum});omni.define("get_nursery",function(crib,changing_table,sleeper,bedding,monitor){crib=Number(crib);changing_table=Number(changing_table);sleeper=Number(sleeper);bedding=Number(bedding);monitor=Number(monitor);var sum=crib+changing_table+sleeper+bedding+monitor;return sum});omni.define("get_feeding",function(bottles,cloth,brush,pump,bra,pillow,storage_bag,if_pump){bottles=Number(bottles);cloth=Number(cloth);brush=Number(brush);pump=Number(pump);bra=Number(bra);pillow=Number(pillow);storage_bag=Number(storage_bag);if_pump=Number(if_pump);var sum=0;sum=cloth+bra+pillow;if(if_pump==1){sum+=storage_bag+bottles+pump+brush}return sum});omni.define("get_other",function(pacifier,sth_dif){pacifier=Number(pacifier);sth_dif=Number(sth_dif);var sum=pacifier+sth_dif;return sum});omni.define("get_sum",function(gear,nursery,feeding,bath,other){gear=Number(gear);nursery=Number(nursery);feeding=Number(feeding);bath=Number(bath);other=Number(other);var sum=gear+nursery+feeding+bath+other;return sum});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'The One-time child costs calculator returns <strong>transportation (In total)</strong> from the 37 fields on the form.',
        'sections' => [
            ['title' => 'How does the One-time child costs calculator work?', 'html' => <<<'TXT'
            <p>The One-time child costs calculator takes the values in the form, applies the relationship described below and reports <strong>transportation (In total)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (see the items' price range?); then you type in the basic bedding & blankets, the basic bedding & blankets (2x), the changing table and the baby monitor.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as one child and twins. </li><li>Pick the option that matches your case — 2 options, such as no and yes. </li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>Pick the option that matches your case — 2 options, such as no and yes. </li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li></ul><p>The form has 37 fields in total. The ones not listed here work the same way: a label, a unit chip where the quantity has units, and a box that updates the results as soon as it holds a valid number.</p><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>See the items' price range?</strong></td><td>One of 2 options, such as no and yes.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Basic bedding & blankets</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Basic bedding & blankets (2x)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Changing table</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Baby monitor</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Nursing bras</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Nursing pillow</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Bib</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Bibs</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Storage bag</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Electric/manual breast pump</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Bottle brush</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Infant bathtub</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Washcloths</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Washcloths (2x)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Baby towel with hood</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Baby towel with hood (2x)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Brush & comb</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Baby nail clippers</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Infant car seats</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Infant car seat (2x)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Stroller</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Double stroller</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Sling/wrap carrier</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr></tbody></table><p>The table lists the first 24 of 41 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the One-time child costs calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Transportation</span><span class="formula-eq">=</span><span class="formula-rhs">(infant car seats, stroller, sling ÷ wrap carrier, diaper bag)</span></div><div class="formula-row"><span class="formula-lhs">Nursery</span><span class="formula-eq">=</span><span class="formula-rhs">(crib ÷ Bassinet, changing table, co-sleeper, basic bedding &amp; blankets, baby monitor)</span></div><div class="formula-row"><span class="formula-lhs">Feeding</span><span class="formula-eq">=</span><span class="formula-rhs">(bottles ÷ nipples, bib, bottle brush, electric ÷ manual breast pump, nursing bras, nursing pillow, storage bag, are you planning to express?)</span></div><div class="formula-row"><span class="formula-lhs">Bath</span><span class="formula-eq">=</span><span class="formula-rhs">(baby towel with hood, infant bathtub, brush &amp; comb, baby nail clippers, washcloths)</span></div><div class="formula-row"><span class="formula-lhs">Other</span><span class="formula-eq">=</span><span class="formula-rhs">(pacifier, anything else?)</span></div><div class="formula-row"><span class="formula-lhs">Transportation</span><span class="formula-eq">=</span><span class="formula-rhs">(infant car seat (2x), double stroller, sling ÷ wrap carrier (2x), diaper bag)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The One-time child costs calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 1 figures keep coming back — the basic bedding & blankets — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/social-media-time-alternatives">Social Media Time Alternatives</a>, <a href="/everyday-life/sock-size">Sock size</a> and <a href="/everyday-life/socks-loss-index">Lost socks</a>.</p>
            TXT],
            ['title' => 'Practical assumptions and checks', 'html' => <<<'TXT'
            <p>Build the estimate from the items that apply to your household rather than treating every line as compulsory. Enter current one-time prices for the nursery, feeding, bathing, transport and other categories, and use the twin or multiple-child controls carefully. Shared furniture may not need to be doubled, while items intended for each child may. The form’s quantity options help organize the estimate, but your actual shopping list should decide which lines count.</p><p>Prices vary by country, retailer, brand, condition and safety standard. If the tool offers suggested ranges, regard them as planning references, not guaranteed current prices. Check local product-safety guidance before buying used equipment, especially items where standards or expiry dates matter. The total covers listed one-time purchases only; it does not include recurring costs such as childcare, food, clothing replacement or medical care.</p><p>For a practical budget, save a low, expected and high scenario instead of relying on one total. Update prices as you get quotes, and keep a contingency for unlisted essentials. The calculator adds what you enter; it cannot decide which items your family needs or whether a particular purchase is suitable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What costs can I include?', 'a' => 'Enter the one-time prices for the listed nursery, feeding, bathing, transport and other items. Leave an item out or enter zero if it does not apply to your household.'],
            ['q' => 'How do I handle twins?', 'a' => 'Choose the matching expectation option and review which quantities the form applies to two children. Items that are shared, such as some furniture, may not need to be doubled in your own budget.'],
            ['q' => 'Does the total include recurring costs?', 'a' => 'The estimate is for the one-time items and categories shown in the form. It is not a complete monthly budget for ongoing expenses such as food, childcare or replacement supplies.'],
        ],
        'related' => [
            ['path' => '/everyday-life/social-media-time-alternatives', 'name' => 'Social Media Time Alternatives'],
            ['path' => '/everyday-life/sock-size', 'name' => 'Sock size'],
            ['path' => '/everyday-life/socks-loss-index', 'name' => 'Lost socks'],
        ],
    ],
];
