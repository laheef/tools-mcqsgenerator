<?php

/**
 * Subscription waste
 * /finance/subscription-waste
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Subscription waste',
    'meta' => ['title' => 'Subscription waste: Formula, Steps & Results', 'description' => 'Subscription waste turns service #1 and {{srv1_1.name}} cost per month into !!Total cost per month!! and total cost per month. Every figure is computed.', 'h1' => 'Subscription waste Calculator', 'updated' => '2026-08-07'],
    'sections' => [
        [
            'title' => 'Read me ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Select services and enter their monthly cost (max 2/3 per category). Something missing? Use the “Other” category. Note: Avoid duplicate selections. Some services are already included in other plans (e.g., OneDrive in Microsoft 365).
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Streaming TV',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'srv1_1',
                            'label' => 'Service #1',
                            'type' => 'select',
                            'options' => [
                                'Netflix' => '1',
                                'Amazon Prime Video' => '2',
                                'Hulu' => '3',
                                'HBO Max' => '4',
                                'Paramount+' => '5',
                                'Disney+' => '6',
                                'Peacock' => '7',
                                'ESPN' => '8',
                                'Apple TV' => '9',
                            ],
                            'dataset' => '1_Streaming TV',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln1_1_cost',
                            'label' => '{{srv1_1.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'srv2_1',
                            'label' => 'Service #2',
                            'type' => 'select',
                            'options' => [
                                'Netflix' => '1',
                                'Amazon Prime Video' => '2',
                                'Hulu' => '3',
                                'HBO Max' => '4',
                                'Paramount+' => '5',
                                'Disney+' => '6',
                                'Peacock' => '7',
                                'ESPN' => '8',
                                'Apple TV' => '9',
                            ],
                            'dataset' => '1_Streaming TV',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln2_1_cost',
                            'label' => '{{srv2_1.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'srv3_1',
                            'label' => 'Service #3',
                            'type' => 'select',
                            'options' => [
                                'Netflix' => '1',
                                'Amazon Prime Video' => '2',
                                'Hulu' => '3',
                                'HBO Max' => '4',
                                'Paramount+' => '5',
                                'Disney+' => '6',
                                'Peacock' => '7',
                                'ESPN' => '8',
                                'Apple TV' => '9',
                            ],
                            'dataset' => '1_Streaming TV',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln3_1_cost',
                            'label' => '{{srv3_1.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'MonthlyStreamingTV',
                            'label' => '!!Total cost per month!!',
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
                        ['type' => 'note', 'text' => ' Enter a cost for all of the selected services to see your results. Input 0 to cancel a service.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'E-Commerce &amp; Delivery',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'srv1_2',
                            'label' => 'Service #1',
                            'type' => 'select',
                            'options' => [
                                'Amazon Prime' => '1',
                                'Walmart+' => '2',
                                'DoorDash' => '3',
                                'Uber One' => '4',
                                'Instacart+' => '5',
                            ],
                            'dataset' => '2_E-Commerce & Delivery',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln1_2_cost',
                            'label' => '{{srv1_2.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'srv2_2',
                            'label' => 'Service #2',
                            'type' => 'select',
                            'options' => [
                                'Amazon Prime' => '1',
                                'Walmart+' => '2',
                                'DoorDash' => '3',
                                'Uber One' => '4',
                                'Instacart+' => '5',
                            ],
                            'dataset' => '2_E-Commerce & Delivery',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln2_2_cost',
                            'label' => '{{srv2_2.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'srv3_2',
                            'label' => 'Service #3',
                            'type' => 'select',
                            'options' => [
                                'Amazon Prime' => '1',
                                'Walmart+' => '2',
                                'DoorDash' => '3',
                                'Uber One' => '4',
                                'Instacart+' => '5',
                            ],
                            'dataset' => '2_E-Commerce & Delivery',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln3_2_cost',
                            'label' => '{{srv3_2.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'MonthlyECommerce',
                            'label' => '!!Total cost per month!!',
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
                        ['type' => 'note', 'text' => ' Enter a cost for all of the selected services to see your results. Input 0 to cancel a service.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Music &amp; Audio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'srv1_3',
                            'label' => 'Service #1',
                            'type' => 'select',
                            'options' => [
                                'Spotify' => '1',
                                'Apple Music' => '2',
                                'Amazon Music Unlimited' => '3',
                                'Pandora' => '4',
                                'YouTube Music Premium' => '9',
                            ],
                            'dataset' => '3_Music & Audio',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln1_3_cost',
                            'label' => '{{srv1_3.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'srv2_3',
                            'label' => 'Service #2',
                            'type' => 'select',
                            'options' => [
                                'Spotify' => '1',
                                'Apple Music' => '2',
                                'Amazon Music Unlimited' => '3',
                                'Pandora' => '4',
                                'YouTube Music Premium' => '9',
                            ],
                            'dataset' => '3_Music & Audio',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln2_3_cost',
                            'label' => '{{srv2_3.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'MonthlyMusic',
                            'label' => '!!Total cost per month!!',
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
                        ['type' => 'note', 'text' => ' Enter a cost for all of the selected services to see your results. Input 0 to cancel a service.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Cloud Storage',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'srv1_4',
                            'label' => 'Service #1',
                            'type' => 'select',
                            'options' => ['Google One' => '1', 'Apple iCloud+' => '2', 'Microsoft OneDrive' => '3', 'Dropbox' => '4'],
                            'dataset' => '4_Cloud Storage',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln1_4_cost',
                            'label' => '{{srv1_4.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'srv2_4',
                            'label' => 'Service #2',
                            'type' => 'select',
                            'options' => ['Google One' => '1', 'Apple iCloud+' => '2', 'Microsoft OneDrive' => '3', 'Dropbox' => '4'],
                            'dataset' => '4_Cloud Storage',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln2_4_cost',
                            'label' => '{{srv2_4.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'MonthlyCloud',
                            'label' => '!!Total cost per month!!',
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
                        ['type' => 'note', 'text' => ' Enter a cost for all of the selected services to see your results. Input 0 to cancel a service.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Gaming',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'srv1_5',
                            'label' => 'Service #1',
                            'type' => 'select',
                            'options' => [
                                'Xbox Game Pass' => '1',
                                'PlayStation Plus' => '2',
                                'Nintendo Switch Online' => '3',
                                'EA Play' => '4',
                                'Roblox' => '5',
                            ],
                            'dataset' => '5_Gaming',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln1_5_cost',
                            'label' => '{{srv1_5.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'srv2_5',
                            'label' => 'Service #2',
                            'type' => 'select',
                            'options' => [
                                'Xbox Game Pass' => '1',
                                'PlayStation Plus' => '2',
                                'Nintendo Switch Online' => '3',
                                'EA Play' => '4',
                                'Roblox' => '5',
                            ],
                            'dataset' => '5_Gaming',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln2_5_cost',
                            'label' => '{{srv2_5.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'MonthlyGaming',
                            'label' => '!!Total cost per month!!',
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
                        ['type' => 'note', 'text' => ' Enter a cost for all of the selected services to see your results. Input 0 to cancel a service.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Software &amp; Productivity',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'srv1_6',
                            'label' => 'Service #1',
                            'type' => 'select',
                            'options' => ['Microsoft 365' => '1', 'Adobe Creative Cloud' => '3', 'Canva Pro' => '5', 'Linkedin Premium' => '6'],
                            'dataset' => '6_Software & Productivity',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln1_6_cost',
                            'label' => '{{srv1_6.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'srv2_6',
                            'label' => 'Service #2',
                            'type' => 'select',
                            'options' => ['Microsoft 365' => '1', 'Adobe Creative Cloud' => '3', 'Canva Pro' => '5', 'Linkedin Premium' => '6'],
                            'dataset' => '6_Software & Productivity',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln2_6_cost',
                            'label' => '{{srv2_6.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'srv3_6',
                            'label' => 'Service #3',
                            'type' => 'select',
                            'options' => ['Microsoft 365' => '1', 'Adobe Creative Cloud' => '3', 'Canva Pro' => '5', 'Linkedin Premium' => '6'],
                            'dataset' => '6_Software & Productivity',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln3_6_cost',
                            'label' => '{{srv3_6.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'MonthlySoftware',
                            'label' => '!!Total cost per month!!',
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
                        ['type' => 'note', 'text' => ' Enter a cost for all of the selected services to see your results. Input 0 to cancel a service.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'GenAI Tools',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'srv1_7',
                            'label' => 'Service #1',
                            'type' => 'select',
                            'options' => [
                                'ChatGPT' => '1',
                                'Claude' => '2',
                                'Midjourney' => '3',
                                'Perplexity AI' => '4',
                                'ElevenLabs' => '5',
                            ],
                            'dataset' => '7_GenAI Tools',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln1_7_cost',
                            'label' => '{{srv1_7.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'srv2_7',
                            'label' => 'Service #2',
                            'type' => 'select',
                            'options' => [
                                'ChatGPT' => '1',
                                'Claude' => '2',
                                'Midjourney' => '3',
                                'Perplexity AI' => '4',
                                'ElevenLabs' => '5',
                            ],
                            'dataset' => '7_GenAI Tools',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pln2_7_cost',
                            'label' => '{{srv2_7.name}} cost per month',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'MonthlyGenAI',
                            'label' => '!!Total cost per month!!',
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
                        ['type' => 'note', 'text' => ' Enter a cost for all of the selected services to see your results. Input 0 to cancel a service.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Other',
            'note' => 'Enter the monthly price for each service.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Insert pricing per month.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Other1',
                            'label' => 'Other service #1',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'Other2',
                            'label' => 'Other service #2',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'Other3',
                            'label' => 'Other service #3',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'Other4',
                            'label' => 'Other service #4',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'Other5',
                            'label' => 'Other service #5',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 'MonthlyOther',
                            'label' => '!!Total cost per month!!',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => ' Enter a cost for all of the selected services to see your results. Input 0 to cancel a service.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Total subscription spending',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TotalMonthly',
                            'label' => 'Total cost per month',
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
                            'name' => 'TotalYearly',
                            'label' => 'Total cost per year',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'MonthlyStreamingTV > 0', 'text' => 'Streaming TV: ${{MonthlyStreamingTV.formattedValue}}&nbsp;/&nbsp;mo'],
                                ['when' => 'MonthlyECommerce > 0', 'text' => 'E-Commerce &amp; Delivery: ${{MonthlyECommerce.formattedValue}}&nbsp;/&nbsp;mo'],
                                ['when' => 'MonthlyMusic > 0', 'text' => 'Music &amp; Audio: ${{MonthlyMusic.formattedValue}} / mo'],
                                ['when' => 'MonthlyCloud > 0', 'text' => 'Cloud Storage: ${{MonthlyCloud.formattedValue}} / mo'],
                                ['when' => 'MonthlyGaming > 0', 'text' => 'Gaming: ${{MonthlyGaming.formattedValue}} / mo'],
                                ['when' => 'MonthlySoftware > 0', 'text' => 'Software &amp; Productivity: ${{MonthlySoftware.formattedValue}} / mo'],
                                ['when' => 'MonthlyGenAI > 0', 'text' => 'GenAI Tools: ${{MonthlyGenAI.formattedValue}} / mo'],
                                ['when' => 'MonthlyOther > 0', 'text' => 'Other: ${{MonthlyOther.formattedValue}} / mo'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'TotalMonthly = one_way(MonthlyStreamingTV + MonthlyECommerce + MonthlyMusic + MonthlyCloud + MonthlyGaming + MonthlySoftware + MonthlyGenAI + MonthlyOther)',
            'results' => ['TotalMonthly' => <<<'TXT'
            ((pln1_3_cost + pln2_3_cost) + (pln1_4_cost + pln2_4_cost) + (pln1_5_cost + pln2_5_cost) + (pln1_7_cost + pln2_7_cost) + (pln1_1_cost + pln2_1_cost + pln3_1_cost) + (pln1_2_cost + pln2_2_cost + pln3_2_cost) + (pln1_6_cost + pln2_6_cost + pln3_6_cost) + (Other1 + Other2 + Other3 + Other4 + Other5))
            TXT],
        ],
        [
            'title' => 'MonthlyStreamingTV = one_way(pln1_1_cost + pln2_1_cost + pln3_1_cost)',
            'results' => ['MonthlyStreamingTV' => '(pln1_1_cost + pln2_1_cost + pln3_1_cost)'],
        ],
        [
            'title' => 'MonthlyECommerce = one_way(pln1_2_cost + pln2_2_cost + pln3_2_cost)',
            'results' => ['MonthlyECommerce' => '(pln1_2_cost + pln2_2_cost + pln3_2_cost)'],
        ],
        [
            'title' => 'MonthlyMusic = one_way(pln1_3_cost + pln2_3_cost)',
            'results' => ['MonthlyMusic' => '(pln1_3_cost + pln2_3_cost)'],
        ],
        [
            'title' => 'MonthlyCloud = one_way(pln1_4_cost + pln2_4_cost)',
            'results' => ['MonthlyCloud' => '(pln1_4_cost + pln2_4_cost)'],
        ],
        [
            'title' => 'MonthlyGaming = one_way(pln1_5_cost + pln2_5_cost)',
            'results' => ['MonthlyGaming' => '(pln1_5_cost + pln2_5_cost)'],
        ],
        [
            'title' => 'MonthlySoftware = one_way(pln1_6_cost + pln2_6_cost + pln3_6_cost)',
            'results' => ['MonthlySoftware' => '(pln1_6_cost + pln2_6_cost + pln3_6_cost)'],
        ],
        [
            'title' => 'MonthlyGenAI = one_way(pln1_7_cost + pln2_7_cost)',
            'results' => ['MonthlyGenAI' => '(pln1_7_cost + pln2_7_cost)'],
        ],
        [
            'title' => 'MonthlyOther = one_way(Other1+Other2+Other3+Other4+Other5)',
            'results' => ['MonthlyOther' => '(Other1 + Other2 + Other3 + Other4 + Other5)'],
        ],
        [
            'title' => 'TotalYearly = one_way(TotalMonthly*12)',
            'results' => ['TotalYearly' => <<<'TXT'
            (12*((pln1_3_cost + pln2_3_cost) + (pln1_4_cost + pln2_4_cost) + (pln1_5_cost + pln2_5_cost) + (pln1_7_cost + pln2_7_cost) + (pln1_1_cost + pln2_1_cost + pln3_1_cost) + (pln1_2_cost + pln2_2_cost + pln3_2_cost) + (pln1_6_cost + pln2_6_cost + pln3_6_cost) + (Other1 + Other2 + Other3 + Other4 + Other5)))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Subscription waste takes cost per month, cost per month and cost per month and returns !!Total cost per month!! and !!Total cost per month!!. There is no hidden constant here: change !!Total cost per month!! and cost per month moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Subscription waste calculator works', 'html' => <<<'TXT'
            <p>Subscription waste answers one question from 22 numbers, and the answer is !!Total cost per month!!, !!Total cost per month!! and !!Total cost per month!!.</p><p>What comes back is !!Total cost per month!!, !!Total cost per month!!, !!Total cost per month!! and !!Total cost per month!! — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 22 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>cost per month</strong> — a plain number, no unit</li><li><strong>Other service #1</strong> — a plain number, no unit</li><li><strong>Other service #2</strong> — a plain number, no unit</li><li><strong>Other service #3</strong> — a plain number, no unit</li><li><strong>Other service #4</strong> — a plain number, no unit</li><li><strong>Other service #5</strong> — a plain number, no unit</li></ul><p>The answers come back as !!Total cost per month!!, !!Total cost per month!!, !!Total cost per month!!, !!Total cost per month!!, !!Total cost per month!!, !!Total cost per month!!, !!Total cost per month!!, !!Total cost per month!!, Total cost per month, Total cost per year. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, cost per month = 3, cost per month = 4, cost per month = 5, cost per month = 6, cost per month = 7, cost per month = 8, cost per month = 9, cost per month = 10, cost per month = 2, cost per month = 3, cost per month = 4, cost per month = 5, cost per month = 6, cost per month = 7, cost per month = 8, cost per month = 9, cost per month = 10, Other service #1 = 2, Other service #2 = 3, Other service #3 = 4, Other service #4 = 5 and Other service #5 = 6; the answers are <strong>Total cost per month</strong> = 126, <strong>!!Total cost per month!!</strong> = 12, <strong>!!Total cost per month!!</strong> = 21, <strong>!!Total cost per month!!</strong> = 19, <strong>!!Total cost per month!!</strong> = 5, <strong>!!Total cost per month!!</strong> = 9, <strong>!!Total cost per month!!</strong> = 21, <strong>!!Total cost per month!!</strong> = 19, <strong>!!Total cost per month!!</strong> = 20 and <strong>Total cost per year</strong> = 1512.</p><ul><li><strong>Total cost per month</strong> = 126</li><li><strong>!!Total cost per month!!</strong> = 12</li><li><strong>!!Total cost per month!!</strong> = 21</li><li><strong>!!Total cost per month!!</strong> = 19</li><li><strong>!!Total cost per month!!</strong> = 5</li><li><strong>!!Total cost per month!!</strong> = 9</li><li><strong>!!Total cost per month!!</strong> = 21</li><li><strong>!!Total cost per month!!</strong> = 19</li><li><strong>!!Total cost per month!!</strong> = 20</li><li><strong>Total cost per year</strong> = 1512</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Total cost per month</strong> = 126, <strong>!!Total cost per month!!</strong> = 12, <strong>!!Total cost per month!!</strong> = 21, <strong>!!Total cost per month!!</strong> = 19, <strong>!!Total cost per month!!</strong> = 5, <strong>!!Total cost per month!!</strong> = 9, <strong>!!Total cost per month!!</strong> = 21, <strong>!!Total cost per month!!</strong> = 19, <strong>!!Total cost per month!!</strong> = 20 and <strong>Total cost per year</strong> = 1512 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: !!Total cost per month!! takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>!!Total cost per month!!</strong> = <code>( cost per month + cost per month + cost per month)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>!!Total cost per month!!</strong> = <code>( cost per month + cost per month + cost per month)</code> — the form to use when cost per month, cost per month and cost per month are the values you have.</li><li><strong>!!Total cost per month!!</strong> = <code>( cost per month + cost per month + cost per month)</code> — the form to use when cost per month, cost per month and cost per month are the values you have.</li><li><strong>!!Total cost per month!!</strong> = <code>( cost per month + cost per month)</code> — the form to use when cost per month and cost per month are the values you have.</li><li><strong>!!Total cost per month!!</strong> = <code>( cost per month + cost per month)</code> — the form to use when cost per month and cost per month are the values you have.</li><li><strong>!!Total cost per month!!</strong> = <code>( cost per month + cost per month)</code> — the form to use when cost per month and cost per month are the values you have.</li><li><strong>!!Total cost per month!!</strong> = <code>( cost per month + cost per month + cost per month)</code> — the form to use when cost per month, cost per month and cost per month are the values you have.</li><li><strong>!!Total cost per month!!</strong> = <code>( cost per month + cost per month)</code> — the form to use when cost per month and cost per month are the values you have.</li><li><strong>!!Total cost per month!!</strong> = <code>(Other service #1 + Other service #2 + Other service #3 + Other service #4 + Other service #5)</code> — the form to use when Other service #1, Other service #2, Other service #3 and Other service #4 are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total cost per month, !!Total cost per month!! and !!Total cost per month!! can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double {{srv1_1.name}} cost per month from 3 to 6, leaving every other box alone. The panel moves from <strong>Total cost per month</strong> 126, <strong>!!Total cost per month!!</strong> 12, <strong>!!Total cost per month!!</strong> 21, <strong>!!Total cost per month!!</strong> 19, <strong>!!Total cost per month!!</strong> 5, <strong>!!Total cost per month!!</strong> 9, <strong>!!Total cost per month!!</strong> 21, <strong>!!Total cost per month!!</strong> 19, <strong>!!Total cost per month!!</strong> 20 and <strong>Total cost per year</strong> 1512 to <strong>Total cost per month</strong> 129, <strong>!!Total cost per month!!</strong> 15, <strong>!!Total cost per month!!</strong> 21, <strong>!!Total cost per month!!</strong> 19, <strong>!!Total cost per month!!</strong> 5, <strong>!!Total cost per month!!</strong> 9, <strong>!!Total cost per month!!</strong> 21, <strong>!!Total cost per month!!</strong> 19, <strong>!!Total cost per month!!</strong> 20 and <strong>Total cost per year</strong> 1548.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with !!Total cost per month!!, !!Total cost per month!! and !!Total cost per month!! are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>cost per month left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If cost per month is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>cost per month left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If cost per month is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>cost per month left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If cost per month is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If {{srv1_1.name}} cost per month is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have cost per month, cost per month, cost per month and cost per month ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with cost per month — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check !!Total cost per month!! against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> !!Total cost per month!! follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes cost per month, cost per month and cost per month are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: cost per month, cost per month and cost per month measured, !!Total cost per month!! and !!Total cost per month!! wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/prorated-rent">Prorated rent Calculator</a>, <a href="/finance/prorated-salary">Prorated salary</a> and <a href="/finance/put-call-parity">Put-call parity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Subscription waste calculator work out?', 'a' => <<<'TXT'
            !!Total cost per month!!, !!Total cost per month!!, !!Total cost per month!! and !!Total cost per month!!, from cost per month, cost per month, cost per month and cost per month.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            cost per month, cost per month, cost per month, cost per month, cost per month. Enter cost per month, cost per month and cost per month; !!Total cost per month!! is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total cost per month, !!Total cost per month!!, !!Total cost per month!! and !!Total cost per month!! can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total cost per month = 126, !!Total cost per month!! = 12, !!Total cost per month!! = 21, !!Total cost per month!! = 19, !!Total cost per month!! = 5, !!Total cost per month!! = 9, !!Total cost per month!! = 21, !!Total cost per month!! = 19, !!Total cost per month!! = 20 and Total cost per year = 1512. That comes from the page's own defaults, entered in {{srv1_1.name}} cost per month; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            !!Total cost per month!! is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave {{srv1_1.name}} cost per month blank and the page solves for it, reporting !!Total cost per month!! instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. !!Total cost per month!! keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/prorated-rent', 'name' => 'Prorated rent Calculator'],
            ['path' => '/finance/prorated-salary', 'name' => 'Prorated salary'],
            ['path' => '/finance/put-call-parity', 'name' => 'Put-call parity Calculator'],
        ],
        'authors' => [],
    ],
];
