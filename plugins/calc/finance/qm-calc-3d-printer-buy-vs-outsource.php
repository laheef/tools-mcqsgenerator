<?php

/**
 * 3D printer - buy vs outsource
 * /finance/3d-printer-buy-vs-outsource
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '3D printer - buy vs outsource',
    'meta' => ['title' => '3D printer - buy vs outsource — Formula & Results', 'description' => '3D printer - buy vs outsource takes i want to buy a printer for, printer model and printer price and returns total electrical cost and total buying cost.', 'h1' => '3D printer - buy vs outsource Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'This calculator compares the costs of buying vs. outsourcing a 3D printer. To start, choose your goal:'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'choicemain',
                            'label' => ' I want to buy a printer for',
                            'type' => 'select',
                            'options' => ['Educational/personal use' => '0', 'Commercial use' => '1'],
                            'dataset' => 'goal',
                            'default' => 'Educational/personal use',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'In the commercial mode, we assume you run a 3D printing service business and want to determine how much to charge per produced model.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Total buying cost',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Here, you are the 3D printer service owner. This section will determine your manufacturing costs.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'printer_cost',
                            'label' => 'Printer model',
                            'type' => 'select',
                            'options' => [
                                'Anet 8' => '170',
                                'Voxelab Aquila' => '168',
                                'da Vinci mini w+' => '169.95',
                                'MP Select Mini V2' => '200',
                                'Ender 3' => '229',
                                'CR-10 V2' => '499',
                                'M3D Micro' => '299',
                                'Wanhao Duplicator i3' => '350',
                                'Artillery Genius DIY' => '300',
                                'JG Maker Magic' => '290',
                                'Neva Magis' => '567',
                                'Finder 2.0' => '500',
                                'Up Mini 2' => '599',
                                'Prusa i3 MK3' => '749',
                                'Witbox 2' => '1600',
                                'Custom' => '',
                            ],
                            'dataset' => 'printer',
                            'control' => 'DROPDOWN',
                            'help' => 'If you want to consider electrical consumption of each printer, please hit the advanced mode button.',
                            'default' => 'Anet 8',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'printer_price',
                            'label' => 'Printer price',
                            'type' => 'result',
                            'help' => 'Please enter your own price if you have a discount ',
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
                            'name' => 'filler_cost',
                            'label' => 'Filament',
                            'type' => 'select',
                            'options' => [
                                'Enter your own' => '',
                                'PLA' => '17.5',
                                'ABS' => '17.5',
                                'PETG' => '17.5',
                                'Nylon' => '61.5',
                                'TPU' => '98.5',
                                'TPE' => '98.5',
                                'Soft PLA' => '98.5',
                                'Polycarbonate' => '61.5',
                                'ASA' => '40',
                            ],
                            'dataset' => 'filament',
                            'control' => 'DROPDOWN',
                            'help' => 'For each of the suggested materials, we use an average price and density. You can set your own values if you want.',
                            'default' => 'PLA',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'filler_price',
                            'label' => 'Filament price',
                            'type' => 'result',
                            'suffix' => '/kg',
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
                            'name' => 'filler_density',
                            'label' => 'Filament density',
                            'type' => 'result',
                            'suffix' => 'kg/m3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'model_volume',
                            'label' => 'Volume of your 3D model',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cm3',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantityowner',
                            'label' => 'How many models do you want to print?',
                            'type' => 'number',
                            'suffix' => 'models',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'choice1',
                            'label' => 'Do you have free slicing software license?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'yesno',
                            'help' => 'This is computer software used in the 3D printing process for converting a 3D model to specific instructions for the printer.',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lic_soft',
                            'label' => 'Slicing software cost',
                            'type' => 'number',
                            'suffix' => '$',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.00',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lc',
                            'label' => 'Total labor cost',
                            'type' => 'number',
                            'suffix' => '$',
                            'help' => 'How much you would pay someone if you needed more help with your business?',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'accessories',
                            'label' => 'Extra 3D printer accessories',
                            'type' => 'number',
                            'help' => 'Safety glasses, safety gloves, etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0.00',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'equipment_power',
                            'label' => 'Equipment power consumption',
                            'type' => 'result',
                            'suffix' => 'Watts',
                            'unit' => '13',
                            'unit_default' => 'w',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_kwh',
                            'label' => 'Electricity cost',
                            'type' => 'number',
                            'suffix' => '/kWh',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0.104',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time',
                            'label' => 'Usage time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'heated_bed',
                            'label' => 'Heated bed',
                            'type' => 'number',
                            'suffix' => 'Watts',
                            'help' => 'It is an extra 3D printer module that makes the cooling process more controlled.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '150',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_HB',
                            'label' => 'Time using heated bed mode',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'electrical_cost',
                            'label' => 'Total electrical cost',
                            'type' => 'number',
                            'help' => 'For detailed electrical cost calculation, please check the advanced mode of this calculator.',
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
                            'name' => 'choice5',
                            'label' => 'Are you going to buy a ready-to-print design?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'yesno',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'modeling_owner',
                            'label' => '3D modeling cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0.0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_owner_cost',
                            'label' => 'Total buying cost',
                            'type' => 'number',
                            'help' => 'The overall cost of doing the 3D model by yourself. It excludes electrical costs, which can be added in advanced mode.',
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
                            'name' => 'total_owner_cost_comm',
                            'label' => 'Total manufacturing cost',
                            'type' => 'number',
                            'help' => 'The overall cost of doing the 3D model by yourself. It excludes electrical costs, which can be added in advanced mode.',
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
            'title' => 'Total outsourcing service cost',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'If you are considering outsourcing the production of your 3D models, please input the outsourcing related costs.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'choice2',
                            'label' => 'Are you going to buy a design?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'yesno',
                            'help' => '3D modeling cost includes hiring a designer or buying a ready-to-print model from the web.',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'designer',
                            'label' => '3D modeling cost',
                            'type' => 'number',
                            'suffix' => '$',
                            'help' => 'In case you pay a designer, consider his/her whole project price.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rent_cost',
                            'label' => 'Outsourcing price per model',
                            'type' => 'number',
                            'help' => 'This is the price you would pay per model in case you will outsource the 3D printing services.',
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
                        ['type' => 'note', 'text' => 'Psst! We are going to use the same quantity of models to be printed specified above.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ship_cost_out',
                            'label' => 'Shipping outsourcing cost ',
                            'type' => 'number',
                            'help' => 'Costs related to bring the outsourced products to YOUR location.',
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
                            'name' => 'total_outsourcing_comm',
                            'label' => 'Total outsourcing cost',
                            'type' => 'number',
                            'help' => 'The overall cost of outsourcing the production of your 3D models.',
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
                                ['when' => 'total_outsourcing_comm > total_owner_cost_comm', 'text' => 'Considering the amount of 3D models you want to sell, and the outsourcing cost,&nbsp;it makes more sense for you to buy a printer.'],
                                ['when' => 'total_outsourcing_comm < total_owner_cost_comm', 'text' => 'Considering the amount of 3D models you want to sell, and the outsourcing cost,&nbsp;it makes more sense for you to outsource the production.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantityrenting',
                            'label' => 'How many models do you want to print?',
                            'type' => 'number',
                            'suffix' => 'models',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ship_cost',
                            'label' => 'Shipping cost',
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
                            'name' => 'total_renting_cost',
                            'label' => 'Total outsourcing cost',
                            'type' => 'number',
                            'help' => 'The overall cost of outsourcing the production of your 3D models.',
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
                                ['when' => 'choicemain == 0 and total_renting_cost > total_owner_cost', 'text' => <<<'TXT'
                                For the volume and quantity you have to 3D print, it is more cost-efficient to consider buying your own 3D printer . It is {{savingPercentOwn.formattedValue}}% cheaper and you would save {{savingAmountOwn.monetaryValue}}.
                                TXT],
                                ['when' => 'choicemain == 0 and total_renting_cost < total_owner_cost', 'text' => <<<'TXT'
                                For the volume and quantity you have to 3D print, it is more cost-efficient to consider outsourcing 3D printing professional services  . It is {{savingPercentRent.formattedValue}}% cheaper and you would save {{savingAmountRent.monetaryValue}}.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Sales',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Now, let\'s talk about sales. Define your selling price per model and shipping costs to see if you are profitable.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'choice3',
                            'label' => 'I want to base my breakeven on:',
                            'type' => 'select',
                            'options' => ['Buying costs' => '0', 'Outsourcing costs' => '1'],
                            'dataset' => 'costs',
                            'default' => 'Buying costs',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ship_cost_comm',
                            'label' => 'Total shipping cost to your clients',
                            'type' => 'number',
                            'help' => 'This will be the whole sum you will charge to your clientes for amount of models you defined above.',
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
                            'name' => 'rent_cost_comm',
                            'label' => 'Your selling price per model',
                            'type' => 'number',
                            'help' => 'This is the price you would charge per model to your clients in case you run a 3D printing service business.',
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
                            'name' => 'total_selling',
                            'label' => 'Total selling price',
                            'type' => 'number',
                            'help' => 'This is the price you would charge to your clients in case you run a 3D printing service business.',
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
                                ['when' => 'choice3 == 0 and total_selling > total_owner_cost_comm', 'text' => <<<'TXT'
                                You are earning money . Your profit is {{sellingProfit.monetaryValue}} ({{gainPercentOwn.formattedValue}}%) so far over your manufacturing costs. Have a desired profit? Type it down!
                                TXT],
                                ['when' => 'choice3 == 0 and total_selling < total_owner_cost_comm', 'text' => 'You are losing money. . Your losses are {{sellingLoss.monetaryValue}} ({{gainPercentOwn.formattedValue}}%). Try increasing your selling price per model.'],
                                ['when' => 'choice3 == 0 and hasValue(total_selling) and total_selling == total_owner_cost_comm', 'text' => <<<'TXT'
                                You are at breakeven. Increase your selling price per model to start making money. You can also try selling less models but keeping the same selling price per model.
                                TXT],
                                ['when' => 'choice3 == 1 and total_selling > total_outsourcing_comm', 'text' => <<<'TXT'
                                You are earning money . Your profit is {{sellingProfitOutsource.monetaryValue}} ({{gainPercentOutsource.formattedValue}}%) so far over your outsourcing costs. Have a desired profit? Type it down!
                                TXT],
                                ['when' => 'choice3 == 1 and total_selling < total_outsourcing_comm', 'text' => <<<'TXT'
                                You are losing money. . Your losses are {{sellingLossOutsource.monetaryValue}} ({{gainPercentOutsource.formattedValue}}%). Try increasing your selling price per model.
                                TXT],
                                ['when' => 'choice3 == 1 and hasValue(total_selling) and total_selling == total_outsourcing_comm', 'text' => <<<'TXT'
                                You are at breakeven. Increase your selling price per model to start making money. You can also try selling less models but keeping the same selling price per model.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'target_profit',
                            'label' => 'Target profit',
                            'type' => 'number',
                            'help' => 'How much you intend to earn after selling all models?',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Are you really sure somebody is charging you more than a million USD for a single 3D model?'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'For a proper cost-related comparison, you should use the same quantity of models to be printed in the owner and outsourcing section.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'choice3 == 0 and total_selling > total_owner_cost_comm and hasValue(target_profit)', 'text' => 'For such target profit and the amount of 3D models you plan to produce, you have to sell them at {{selling_cost_comm_model_own.monetaryValue}} per model.'],
                                ['when' => 'choice3 == 0 and total_selling < total_owner_cost_comm', 'text' => 'Considering the amount of 3D models you want to sell, your recommended selling price per model for breakeven is {{breakevenPriceOwn.monetaryValue}}'],
                                ['when' => 'choice3 == 0 and total_selling > total_outsourcing_comm and hasValue(target_profit)', 'text' => 'For such target profit and the amount of 3D models you plan to produce, you have to sell them at {{selling_cost_comm_model_outsource.monetaryValue}} per model.'],
                                ['when' => 'choice3 == 1 and total_selling < total_outsourcing_comm', 'text' => 'Considering the amount of 3D models you want to sell, your recommended selling price per model for breakeven is {{breakevenPriceOutsource.monetaryValue}}'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'lemonade_stand/riches.gif'],
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
                            'name' => 'savingPercentOwn',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'savingPercentRent',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'savingAmountOwn',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'savingAmountRent',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'sellingProfit',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'gainPercentOwn',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'gainPercentOutsource',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'sellingLoss',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'breakevenPriceOwn',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'breakevenPriceOutsource',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'sellingProfitOutsource',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'sellingLossOutsource',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'selling_cost_comm_model_own',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'selling_cost_comm_model_outsource',
                            'label' => '',
                            'type' => 'presentation',
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
            'title' => 'total_owner_cost = one_way(printer_price  + electrical_cost + filler_price *filler_density*model_volume*quantityowner + lic_soft + accessories+modeling_owner)',
            'results' => ['total_owner_cost' => '(accessories + electrical_cost + filler_density*filler_price*model_volume*quantityowner + lic_soft + modeling_owner + printer_price)'],
        ],
        [
            'title' => 'electrical_cost = ((equipment_power/1000) * time + (heated_bed/1000)*time_HB )* cost_kwh',
            'results' => [
                'equipment_power' => '(-cost_kwh*heated_bed*time_HB + 1000*electrical_cost)/(cost_kwh*time)',
                'time' => '(-cost_kwh*heated_bed*time_HB + 1000*electrical_cost)/(cost_kwh*equipment_power)',
                'heated_bed' => '(-cost_kwh*equipment_power*time + 1000*electrical_cost)/(cost_kwh*time_HB)',
                'time_HB' => '(-cost_kwh*equipment_power*time + 1000*electrical_cost)/(cost_kwh*heated_bed)',
                'electrical_cost' => '(1/1000)*cost_kwh*(equipment_power*time + heated_bed*time_HB)',
                'cost_kwh' => '1000*electrical_cost/(equipment_power*time + heated_bed*time_HB)',
            ],
        ],
        [
            'title' => 'total_renting_cost = rent_cost*quantityrenting + ship_cost +designer',
            'results' => [
                'total_renting_cost' => 'designer + quantityrenting*rent_cost + ship_cost',
                'rent_cost' => '(-designer - ship_cost + total_renting_cost)/quantityrenting',
                'designer' => '-quantityrenting*rent_cost - ship_cost + total_renting_cost',
                'quantityrenting' => '(-designer - ship_cost + total_renting_cost)/rent_cost',
                'ship_cost' => '-designer - quantityrenting*rent_cost + total_renting_cost',
            ],
        ],
        [
            'title' => <<<'TXT'
            total_owner_cost_comm = one_way(printer_price  + electrical_cost + filler_price *filler_density*model_volume*quantityowner + lic_soft + lc +accessories+modeling_owner)
            TXT,
            'results' => ['total_owner_cost_comm' => '(accessories + electrical_cost + filler_density*filler_price*model_volume*quantityowner + lc + lic_soft + modeling_owner + printer_price)'],
        ],
        [
            'title' => 'total_outsourcing_comm=one_way(rent_cost*quantityowner + ship_cost_out +designer)',
            'results' => ['total_outsourcing_comm' => '(designer + quantityowner*rent_cost + ship_cost_out)'],
        ],
        [
            'title' => 'total_selling=rent_cost_comm*quantityowner + ship_cost_comm',
            'results' => ['quantityowner' => '(-ship_cost_comm + total_selling)/rent_cost_comm', 'total_selling' => 'quantityowner*rent_cost_comm + ship_cost_comm', 'ship_cost_comm' => '-quantityowner*rent_cost_comm + total_selling', 'rent_cost_comm' => '(-ship_cost_comm + total_selling)/quantityowner'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        3D printer - buy vs outsource turns I want to buy a printer for, Printer model and Filament into Printer price and Filament price. It is a single relationship that reads printer price out of i want to buy a printer for, not a table of canned results keyed by them. Units for Printer price default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the 3D printer - buy vs outsource calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind 3D printer - buy vs outsource: it takes 31 numbers and reports Printer price, Filament price and Filament density.</p><p>Written with the labels from the form, Total buying cost = (Extra 3D printer accessories + Total electrical cost + Filament density × Filament price × Volume of your 3D model × How many models do you want to print? + Slicing software cost + 3D modeling cost + Printer price).</p><p>The answers are Printer price, Filament price, Filament density and Equipment power consumption; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 31 boxes and the page has everything it needs.</p><ul><li><strong>I want to buy a printer for</strong> — a plain number, no unit</li><li><strong>Printer model</strong> — a plain number, no unit. If you want to consider electrical consumption of each printer, please hit the advanced mode button.</li><li><strong>Filament</strong> — a plain number, no unit. For each of the suggested materials, we use an average price and density. You can set your own values if you want.</li><li><strong>Volume of your 3D model</strong> — in cubic centimeters</li><li><strong>How many models do you want to print?</strong> — in models</li><li><strong>Do you have free slicing software license?</strong> — a plain number, no unit. This is computer software used in the 3D printing process for converting a 3D model to specific instructions for the printer.</li><li><strong>Slicing software cost</strong> — in $</li><li><strong>Total labor cost</strong> — in $. How much you would pay someone if you needed more help with your business?</li><li><strong>Extra 3D printer accessories</strong> — in USD. Safety glasses, safety gloves, etc.</li><li><strong>Electricity cost</strong> — in /kWh</li><li><strong>Usage time</strong> — in hours</li><li><strong>Heated bed</strong> — in Watts. It is an extra 3D printer module that makes the cooling process more controlled.</li><li><strong>Time using heated bed mode</strong> — in hours</li><li><strong>Total electrical cost</strong> — in USD. For detailed electrical cost calculation, please check the advanced mode of this calculator.</li><li><strong>Are you going to buy a ready-to-print design?</strong> — a plain number, no unit</li><li><strong>3D modeling cost</strong> — in USD</li><li><strong>Total buying cost</strong> — in USD. The overall cost of doing the 3D model by yourself. It excludes electrical costs, which can be added in advanced mode.</li><li><strong>Total manufacturing cost</strong> — in USD. The overall cost of doing the 3D model by yourself. It excludes electrical costs, which can be added in advanced mode.</li><li><strong>Are you going to buy a design?</strong> — a plain number, no unit. 3D modeling cost includes hiring a designer or buying a ready-to-print model from the web.</li><li><strong>3D modeling cost</strong> — in $. In case you pay a designer, consider his/her whole project price.</li><li><strong>Outsourcing price per model</strong> — in USD. This is the price you would pay per model in case you will outsource the 3D printing services.</li><li><strong>Shipping outsourcing cost</strong> — in USD. Costs related to bring the outsourced products to YOUR location.</li><li><strong>Total outsourcing cost</strong> — in USD. The overall cost of outsourcing the production of your 3D models.</li><li><strong>How many models do you want to print?</strong> — in models</li><li><strong>Shipping cost</strong> — in USD</li><li><strong>Total outsourcing cost</strong> — in USD. The overall cost of outsourcing the production of your 3D models.</li><li><strong>I want to base my breakeven on</strong> — a plain number, no unit</li><li><strong>Total shipping cost to your clients</strong> — in USD. This will be the whole sum you will charge to your clientes for amount of models you defined above.</li><li><strong>Your selling price per model</strong> — in USD. This is the price you would charge per model to your clients in case you run a 3D printing service business.</li><li><strong>Total selling price</strong> — in USD. This is the price you would charge to your clients in case you run a 3D printing service business.</li><li><strong>Target profit</strong> — in USD. How much you intend to earn after selling all models?</li></ul><p>The answers come back as Printer price in USD, Filament price in /kg, Filament density in kg/m3, Equipment power consumption in Watts. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Equipment power consumption offers 6 units and opens on watts, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total buying cost</strong> = <code>(Extra 3D printer accessories + Total electrical cost + Filament density × Filament price × Volume of your 3D model × How many models do you want to print? + Slicing software cost + 3D modeling cost + Printer price)</code></li><li><strong>Total electrical cost</strong> = <code>(1 ÷ 1000) × Electricity cost × (Equipment power consumption × Usage time + Heated bed × Time using heated bed mode)</code></li><li><strong>Equipment power consumption</strong> = <code>( − Electricity cost × Heated bed × Time using heated bed mode + 1000 × Total electrical cost) ÷ (Electricity cost × Usage time)</code></li><li><strong>Usage time</strong> = <code>( − Electricity cost × Heated bed × Time using heated bed mode + 1000 × Total electrical cost) ÷ (Electricity cost × Equipment power consumption)</code></li><li><strong>Heated bed</strong> = <code>( − Electricity cost × Equipment power consumption × Usage time + 1000 × Total electrical cost) ÷ (Electricity cost × Time using heated bed mode)</code></li><li><strong>Time using heated bed mode</strong> = <code>( − Electricity cost × Equipment power consumption × Usage time + 1000 × Total electrical cost) ÷ (Electricity cost × Heated bed)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total buying cost</strong> = <code>(Extra 3D printer accessories + Total electrical cost + Filament density × Filament price × Volume of your 3D model × How many models do you want to print? + Slicing software cost + 3D modeling cost + Printer price)</code> — the form to use when Extra 3D printer accessories, Total electrical cost, Filament density and Filament price are the values you have.</li><li><strong>Total electrical cost</strong> = <code>(1 ÷ 1000) × Electricity cost × (Equipment power consumption × Usage time + Heated bed × Time using heated bed mode)</code> — the form to use when Electricity cost, Equipment power consumption, Usage time and Heated bed are the values you have.</li><li><strong>Equipment power consumption</strong> = <code>( − Electricity cost × Heated bed × Time using heated bed mode + 1000 × Total electrical cost) ÷ (Electricity cost × Usage time)</code> — the form to use when Electricity cost, Heated bed, Time using heated bed mode and Total electrical cost are the values you have.</li><li><strong>Usage time</strong> = <code>( − Electricity cost × Heated bed × Time using heated bed mode + 1000 × Total electrical cost) ÷ (Electricity cost × Equipment power consumption)</code> — the form to use when Electricity cost, Heated bed, Time using heated bed mode and Total electrical cost are the values you have.</li><li><strong>Heated bed</strong> = <code>( − Electricity cost × Equipment power consumption × Usage time + 1000 × Total electrical cost) ÷ (Electricity cost × Time using heated bed mode)</code> — the form to use when Electricity cost, Equipment power consumption, Usage time and Total electrical cost are the values you have.</li><li><strong>Time using heated bed mode</strong> = <code>( − Electricity cost × Equipment power consumption × Usage time + 1000 × Total electrical cost) ÷ (Electricity cost × Heated bed)</code> — the form to use when Electricity cost, Equipment power consumption, Usage time and Total electrical cost are the values you have.</li><li><strong>Electricity cost</strong> = <code>1000 × Total electrical cost ÷ (Equipment power consumption × Usage time + Heated bed × Time using heated bed mode)</code> — the form to use when Total electrical cost, Equipment power consumption, Usage time and Heated bed are the values you have.</li><li><strong>Total outsourcing cost</strong> = <code>3D modeling cost + How many models do you want to print? × Outsourcing price per model + Shipping cost</code> — the form to use when 3D modeling cost, How many models do you want to print?, Outsourcing price per model and Shipping cost are the values you have.</li></ul><p>Any one of Total buying cost, Total electrical cost and Equipment power consumption can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Volume of your 3D model, Usage time and Time using heated bed mode is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Printer price, Filament price and Filament density are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>I want to buy a printer for left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If I want to buy a printer for is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Printer model left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Printer model is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If I want to buy a printer for is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Printer price follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are watts, cubic centimeters and hours and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes I want to buy a printer for, Printer model and Filament are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are I want to buy a printer for, Printer model and Filament and the number you are missing is Printer price and Filament price.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/pvifa">PVIFA</a>, <a href="/finance/quick-ratio">Quick ratio</a> and <a href="/finance/rate-of-pay">Rate of pay</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 3D printer - buy vs outsource calculator work out?', 'a' => <<<'TXT'
            Printer price, Filament price, Filament density and Equipment power consumption, from Extra 3D printer accessories, Total electrical cost, Filament density and Filament price. The relationship is Total buying cost = (Extra 3D printer accessories + Total electrical cost + Filament density × Filament price × Volume of your 3D model × How many models do you want to print? + Slicing software cost + 3D modeling cost + Printer price).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            I want to buy a printer for, Printer model, Filament, Volume of your 3D model (cubic centimeters), How many models do you want to print? (models). Enter i want to buy a printer for, printer model and filament; Printer price is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total buying cost, Total electrical cost, Equipment power consumption and Usage time blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Printer price is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave I want to buy a printer for blank and the page solves for it, reporting Printer price instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Printer price keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/pvifa', 'name' => 'PVIFA'],
            ['path' => '/finance/quick-ratio', 'name' => 'Quick ratio'],
            ['path' => '/finance/rate-of-pay', 'name' => 'Rate of pay'],
        ],
        'authors' => [],
    ],
];
