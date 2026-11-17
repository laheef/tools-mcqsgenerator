<?php

/**
 * Wedding budget
 * /finance/wedding-budget
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wedding budget',
    'meta' => ['title' => 'Wedding budget Calculator — Formula, Units & Example', 'description' => 'Wedding budget turns how much do you want to spend? and number of guests into total. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Wedding budget Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Wedding info',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_budget',
                            'label' => 'How much do you want to spend?',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_guest',
                            'label' => 'Number of guests',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '100', 'when' => null],
                                ['value' => '100', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => ' Bride and Groom',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dress',
                            'label' => 'Bride\'s dress',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'jewelry',
                            'label' => 'Jewelery',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'groom',
                            'label' => 'Groom\'s suit and accessories',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wedRing',
                            'label' => 'Wedding rings',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hair_makeup',
                            'label' => 'Hair and makeup',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bridegroom',
                            'label' => 'Total',
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
            'title' => ' Subcontractors',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'invitations',
                            'label' => 'Wedding stationery',
                            'type' => 'number',
                            'help' => 'Invitations, menus, table and place cards, favors, etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'photographer',
                            'label' => 'Photography & Video',
                            'type' => 'number',
                            'help' => 'Including Photobooth, etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'florist',
                            'label' => 'Florist',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wedd_planner',
                            'label' => 'Wedding planner',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'subc',
                            'label' => 'Total',
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
            'title' => ' Venue, food and drinks',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'venue',
                            'label' => 'Venue',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dinner',
                            'label' => 'Rehearsal dinner',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'catering',
                            'label' => 'Catering',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cake',
                            'label' => 'Wedding cake',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'band',
                            'label' => 'Ceremony musicians / DJs',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'liquors',
                            'label' => 'Liquors',
                            'type' => 'number',
                            'help' => 'Including drink bar, etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ven',
                            'label' => 'Total',
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
            'title' => ' Ceremony',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cerem_site',
                            'label' => 'Ceremony site',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'officiant',
                            'label' => 'Officiant',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cerem',
                            'label' => 'Total',
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
            'title' => ' Transportation and accomodation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hotel',
                            'label' => 'Hotel',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'transportation',
                            'label' => 'Limo rental and transportation',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'transp',
                            'label' => 'Total',
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
            'title' => 'Custom expenses',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oth1',
                            'label' => 'Other 1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oth2',
                            'label' => 'Other 2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oth3',
                            'label' => 'Other 3',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oth4',
                            'label' => 'Other 4',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oth5',
                            'label' => 'Other 5',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cust',
                            'label' => 'Total',
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
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'avgcost',
                            'label' => 'Total average cost per guest',
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
                            'name' => 'budget_balance',
                            'label' => 'Wedding budget balance',
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
                                ['when' => 'budget_balance == 0', 'text' => ' Congratulations! Your budget is perfectly balanced!'],
                                ['when' => 'budget_balance > 0', 'text' => ' Your budget is too much! You are prepared for unexpected costs and can maybe put some money towards the honeymoon!.'],
                                ['when' => 'budget_balance < 0', 'text' => ' Oops! It seems like your budget is not enough. Consider cutting costs or be prepared to spend more money.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'budget_balance= total_budget - bridegroom - subc - ven - transp - cerem',
            'results' => [
                'cerem' => '-bridegroom - budget_balance - subc + total_budget - transp - ven',
                'transp' => '-bridegroom - budget_balance - cerem - subc + total_budget - ven',
                'total_budget' => 'bridegroom + budget_balance + cerem + subc + transp + ven',
                'budget_balance' => '-bridegroom - cerem - subc + total_budget - transp - ven',
                'subc' => '-bridegroom - budget_balance - cerem + total_budget - transp - ven',
                'bridegroom' => '-budget_balance - cerem - subc + total_budget - transp - ven',
                'ven' => '-bridegroom - budget_balance - cerem - subc + total_budget - transp',
            ],
        ],
        [
            'title' => 'bridegroom = dress + groom + hair_makeup + jewelry + wedRing',
            'results' => [
                'wedRing' => 'bridegroom - dress - groom - hair_makeup - jewelry',
                'hair_makeup' => 'bridegroom - dress - groom - jewelry - wedRing',
                'dress' => 'bridegroom - groom - hair_makeup - jewelry - wedRing',
                'groom' => 'bridegroom - dress - hair_makeup - jewelry - wedRing',
                'bridegroom' => 'dress + groom + hair_makeup + jewelry + wedRing',
                'jewelry' => 'bridegroom - dress - groom - hair_makeup - wedRing',
            ],
        ],
        [
            'title' => 'subc = photographer + florist+ wedd_planner + invitations ',
            'results' => [
                'florist' => '-invitations - photographer + subc - wedd_planner',
                'invitations' => '-florist - photographer + subc - wedd_planner',
                'subc' => 'florist + invitations + photographer + wedd_planner',
                'photographer' => '-florist - invitations + subc - wedd_planner',
                'wedd_planner' => '-florist - invitations - photographer + subc',
            ],
        ],
        [
            'title' => 'ven = venue  + catering + dinner + cake + liquors + band',
            'results' => [
                'dinner' => '-band - cake - catering - liquors + ven - venue',
                'venue' => '-band - cake - catering - dinner - liquors + ven',
                'cake' => '-band - catering - dinner - liquors + ven - venue',
                'catering' => '-band - cake - dinner - liquors + ven - venue',
                'liquors' => '-band - cake - catering - dinner + ven - venue',
                'band' => '-cake - catering - dinner - liquors + ven - venue',
                'ven' => 'band + cake + catering + dinner + liquors + venue',
            ],
        ],
        [
            'title' => 'transp = transportation + hotel',
            'results' => ['transp' => 'hotel + transportation', 'hotel' => 'transp - transportation', 'transportation' => '-hotel + transp'],
        ],
        [
            'title' => 'cerem = officiant + cerem_site',
            'results' => ['cerem' => 'cerem_site + officiant', 'cerem_site' => 'cerem - officiant', 'officiant' => 'cerem - cerem_site'],
        ],
        [
            'title' => 'avgcost = (bridegroom + subc + ven + transp + cerem + cust)/num_guest',
            'results' => [
                'avgcost' => '(bridegroom + cerem + cust + subc + transp + ven)/num_guest',
                'cerem' => 'avgcost*num_guest - bridegroom - cust - subc - transp - ven',
                'transp' => 'avgcost*num_guest - bridegroom - cerem - cust - subc - ven',
                'cust' => 'avgcost*num_guest - bridegroom - cerem - subc - transp - ven',
                'subc' => 'avgcost*num_guest - bridegroom - cerem - cust - transp - ven',
                'num_guest' => '(bridegroom + cerem + cust + subc + transp + ven)/avgcost',
                'bridegroom' => 'avgcost*num_guest - cerem - cust - subc - transp - ven',
                'ven' => 'avgcost*num_guest - bridegroom - cerem - cust - subc - transp',
            ],
        ],
        [
            'title' => 'cust = oth1 + oth2 + oth3 + oth4+ oth5',
            'results' => [
                'oth1' => 'cust - oth2 - oth3 - oth4 - oth5',
                'oth2' => 'cust - oth1 - oth3 - oth4 - oth5',
                'oth3' => 'cust - oth1 - oth2 - oth4 - oth5',
                'cust' => 'oth1 + oth2 + oth3 + oth4 + oth5',
                'oth5' => 'cust - oth1 - oth2 - oth3 - oth4',
                'oth4' => 'cust - oth1 - oth2 - oth3 - oth5',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Wedding budget turns How much do you want to spend? into Number of guests and Bride's dress. Nothing is looked up on this page: number of guests is computed from how much do you want to spend? and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Wedding budget calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Wedding budget: it takes 6 numbers and reports Number of guests, Bride&#039;s dress and Jewelery.</p><p>In the form&#039;s own words, Wedding budget balance = − Total − Total − Total + How much do you want to spend? − Total − Total.</p><p>The answers are Number of guests, Bride&#039;s dress, Jewelery and Groom&#039;s suit and accessories; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 6 boxes, and nothing else.</p><ul><li><strong>How much do you want to spend?</strong> — in USD</li><li><strong>Total</strong> — in USD</li><li><strong>Total</strong> — in USD</li><li><strong>Total</strong> — in USD</li><li><strong>Total</strong> — in USD</li><li><strong>Total</strong> — in USD</li></ul><p>The result boxes are Number of guests, Bride&#039;s dress in USD, Jewelery in USD, Groom&#039;s suit and accessories in USD, Wedding rings in USD, Hair and makeup in USD, Wedding stationery in USD, Photography &amp; Video in USD, Florist in USD, Wedding planner in USD, Venue in USD, Rehearsal dinner in USD, Catering in USD, Wedding cake in USD, Ceremony musicians / DJs in USD, Liquors in USD, Ceremony site in USD, Officiant in USD, Hotel in USD, Limo rental and transportation in USD, Other 1 in USD, Other 2 in USD, Other 3 in USD, Other 4 in USD, Other 5 in USD, Total in USD, Total average cost per guest in USD, Wedding budget balance in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, How much do you want to spend? = 10 USD, Number of guests = 100, Bride&amp;#039;s dress = 1000 USD, Jewelery = 10 USD, Groom&amp;#039;s suit and accessories = 100 USD, Wedding rings = 1000 USD, Hair and makeup = 10 USD, Total = 100 USD, Wedding stationery = 1000 USD, Photography &amp;amp; Video = 10 USD, Florist = 100 USD, Wedding planner = 1000 USD, Total = 10 USD, Venue = 100 USD, Rehearsal dinner = 1000 USD, Catering = 10 USD, Wedding cake = 100 USD, Ceremony musicians / DJs = 1000 USD, Liquors = 10 USD, Total = 100 USD, Ceremony site = 1000 USD, Officiant = 10 USD, Hotel = 100 USD, Limo rental and transportation = 1000 USD, Total = 10 USD, Other 1 = 100 USD, Other 2 = 1000 USD, Other 3 = 10 USD, Other 4 = 100 USD, Other 5 = 1000 USD, Total = 10 USD, Total average cost per guest = 100 USD and Wedding budget balance = 1000 USD gives <strong>Total</strong> = -1210 USD.</p><ul><li><strong>Total</strong> = -1210 USD</li></ul><p>The line behind those figures is <strong>Wedding budget balance</strong> = <code>− Total − Total − Total + How much do you want to spend? − Total − Total</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Total</strong> = -1210 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Number of guests takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Wedding budget balance</strong> = <code>− Total − Total − Total + How much do you want to spend? − Total − Total</code></li><li><strong>Total</strong> = <code>− Total − Wedding budget balance − Total + How much do you want to spend? − Total − Total</code></li><li><strong>How much do you want to spend?</strong> = <code>Total + Wedding budget balance + Total + Total + Total + Total</code></li><li><strong>Wedding rings</strong> = <code>Total − Bride&#039;s dress − Groom&#039;s suit and accessories − Hair and makeup − Jewelery</code></li><li><strong>Hair and makeup</strong> = <code>Total − Bride&#039;s dress − Groom&#039;s suit and accessories − Jewelery − Wedding rings</code></li><li><strong>Bride&#039;s dress</strong> = <code>Total − Groom&#039;s suit and accessories − Hair and makeup − Jewelery − Wedding rings</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Wedding budget balance</strong> = <code>− Total − Total − Total + How much do you want to spend? − Total − Total</code> — the form to use when Total, Total, Total and How much do you want to spend? are the values you have.</li><li><strong>Total</strong> = <code>− Total − Wedding budget balance − Total + How much do you want to spend? − Total − Total</code> — the form to use when Total, Wedding budget balance, Total and How much do you want to spend? are the values you have.</li><li><strong>Total</strong> = <code>− Total − Wedding budget balance − Total − Total + How much do you want to spend? − Total</code> — the form to use when Total, Wedding budget balance, Total and Total are the values you have.</li><li><strong>How much do you want to spend?</strong> = <code>Total + Wedding budget balance + Total + Total + Total + Total</code> — the form to use when Total, Wedding budget balance, Total and Total are the values you have.</li><li><strong>Total</strong> = <code>− Total − Wedding budget balance − Total + How much do you want to spend? − Total − Total</code> — the form to use when Total, Wedding budget balance, Total and How much do you want to spend? are the values you have.</li><li><strong>Total</strong> = <code>− Wedding budget balance − Total − Total + How much do you want to spend? − Total − Total</code> — the form to use when Wedding budget balance, Total, Total and How much do you want to spend? are the values you have.</li><li><strong>Total</strong> = <code>− Total − Wedding budget balance − Total − Total + How much do you want to spend? − Total</code> — the form to use when Total, Wedding budget balance, Total and Total are the values you have.</li><li><strong>Total</strong> = <code>Bride&#039;s dress + Groom&#039;s suit and accessories + Hair and makeup + Jewelery + Wedding rings</code> — the form to use when Bride&#039;s dress, Groom&#039;s suit and accessories, Hair and makeup and Jewelery are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Wedding budget balance, Total and Total can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — How much do you want to spend?, from 10 to 20 — and the answers go from <strong>Total</strong> -1210 USD to <strong>Total</strong> -1200 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Number of guests, Bride&#039;s dress and Jewelery are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>How much do you want to spend? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If How much do you want to spend? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert How much do you want to spend? to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Wedding budget form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>How much do you want to spend?</strong> takes a plain number with no unit attached. It feeds Total, Total and Wedding budget balance. Fill it from a measurement rather than a memory — How much do you want to spend? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total</strong> takes a plain number with no unit attached. It feeds Total, Total and How much do you want to spend?. Fill it from a measurement rather than a memory — Total is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total</strong> takes a plain number with no unit attached. It feeds Total, Total and How much do you want to spend?. Fill it from a measurement rather than a memory — Total is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total</strong> takes a plain number with no unit attached. It feeds Total, Total and How much do you want to spend?. Fill it from a measurement rather than a memory — Total is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total</strong> takes a plain number with no unit attached. It feeds Total, How much do you want to spend? and Wedding budget balance. Fill it from a measurement rather than a memory — Total is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total</strong> takes a plain number with no unit attached. It feeds Total, How much do you want to spend? and Wedding budget balance. Fill it from a measurement rather than a memory — Total is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Number of guests follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes How much do you want to spend?, Total and Total are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are How much do you want to spend?, Total and Total and the number you are missing is Number of guests and Bride&#039;s dress.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/income-tax-australia">Income tax Australia Calculator</a>, <a href="/finance/income-tax-philippines">Income tax Philippines Calculator</a> and <a href="/finance/inflation">Inflation Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wedding budget calculator work out?', 'a' => <<<'TXT'
            Number of guests, Bride's dress, Jewelery and Groom's suit and accessories, from Total, Total, Total and How much do you want to spend?. The relationship is Wedding budget balance = − Total − Total − Total + How much do you want to spend? − Total − Total.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            How much do you want to spend? (USD), Total (USD), Total (USD), Total (USD), Total (USD). Fill how much do you want to spend?, total and total and leave Number of guests empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Wedding budget balance, Total, Total and How much do you want to spend? can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Total = -1210 USD. That comes from the page\'s own defaults, entered in How much do you want to spend?; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Number of guests is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave How much do you want to spend? blank and the page solves for it, reporting Number of guests instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Number of guests at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/income-tax-australia', 'name' => 'Income tax Australia Calculator'],
            ['path' => '/finance/income-tax-philippines', 'name' => 'Income tax Philippines Calculator'],
            ['path' => '/finance/inflation', 'name' => 'Inflation Calculator'],
        ],
        'authors' => [],
    ],
];
