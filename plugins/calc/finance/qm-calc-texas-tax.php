<?php

/**
 * Texas tax
 * /finance/texas-tax
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Texas tax',
    'meta' => ['title' => 'Texas tax Calculator — Formula, Units & Example', 'description' => 'Texas tax takes adjusted Gross Income (AGI) and returns retirement contributions. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Texas tax Calculator', 'updated' => '2026-07-13'],
    'sections' => [
        [
            'title' => 'Payroll Taxes',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Income',
                            'label' => 'Adjusted Gross Income (AGI)',
                            'type' => 'number',
                            'prefix' => '$',
                            'unit' => '341',
                            'unit_default' => 'annual',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PayFreq',
                            'label' => 'Pay frequency',
                            'type' => 'select',
                            'options' => [
                                'Daily' => '260',
                                'Weekly' => '52',
                                'Bi-weekly' => '26',
                                'Semi-monthly' => '24',
                                'Monthly' => '12',
                            ],
                            'dataset' => 'pay_freq',
                            'control' => 'DROPDOWN',
                            'help' => 'Set here the period in which you want to see your take-home pay.',
                            'default' => 'Weekly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Year',
                            'label' => 'Year of income',
                            'type' => 'select',
                            'options' => [
                                '2022' => '2022',
                                '2023' => '2023',
                                '2024' => '2024',
                                '2025' => '2025',
                                '2026' => '2026',
                            ],
                            'dataset' => 'year',
                            'control' => 'DROPDOWN',
                            'default' => '2026',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Stat',
                            'label' => 'What is your filling status?',
                            'type' => 'select',
                            'options' => ['Single' => '1', 'Married filing jointly' => '2', 'Married filing separately' => '3', 'Head of household' => '4'],
                            'dataset' => 'filing_status',
                            'control' => 'DROPDOWN',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarDep',
                            'label' => 'Number of additional dependent',
                            'type' => 'number',
                            'suffix' => 'person(s)',
                            'help' => 'The standard number of dependent is one for single and two for married filer. State here only the number of additional dependent.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Deduc',
                            'label' => 'Itemized deductions',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => <<<'TXT'
                            Set here the total of itemized deductions other than retirement contribution relevant to the federal income tax. If you don't set a deduction or it is less than the standard deduction, the standard deduction will be considered.
                            TXT,
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
                            'name' => 'PostTax',
                            'label' => 'Post-tax deductions',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Property Tax',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PropVal',
                            'label' => 'Assessed home value',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => <<<'TXT'
                            Set here the assessed value of your property reduced by the applied exemption. In general, taxpayers can claim a $25,000 exemption on their owner-occupied homes.
                            TXT,
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
                            'name' => 'PropTax',
                            'label' => 'In which county do you live?',
                            'type' => 'select',
                            'options' => [
                                'Anderson' => '0.0137',
                                'Andrews' => '0.0129',
                                'Angelina' => '0.0159',
                                'Aransas' => '0.0115',
                                'Archer' => '0.0148',
                                'Armstrong' => '0.0133',
                                'Atascosa' => '0.0162',
                                'Austin' => '0.0140',
                                'Bailey' => '0.0219',
                                'Bandera' => '0.0102',
                                'Bastrop' => '0.0191',
                                'Baylor' => '0.0143',
                                'Bee' => '0.0128',
                                'Bell' => '0.0219',
                                'Bexar' => '0.0235',
                                'Blanco' => '0.0105',
                                'Borden' => '0.0050',
                                'Bosque' => '0.0105',
                                'Bowie' => '0.0144',
                                'Brazoria' => '0.0202',
                                'Brazos' => '0.0217',
                                'Brewster' => '0.0135',
                                'Briscoe' => '0.0103',
                                'Brooks' => '0.0101',
                                'Brown' => '0.0131',
                                'Burleson' => '0.0112',
                                'Burnet' => '0.0134',
                                'Caldwell' => '0.0157',
                                'Calhoun' => '0.0131',
                                'Callahan' => '0.0114',
                                'Cameron' => '0.0206',
                                'Camp' => '0.0133',
                                'Carson' => '0.0136',
                                'Cass' => '0.0126',
                                'Castro' => '0.0159',
                                'Chambers' => '0.0128',
                                'Cherokee' => '0.0132',
                                'Childress' => '0.0193',
                                'Clay' => '0.0153',
                                'Cochran' => '0.0170',
                                'Coleman' => '0.0130',
                                'Collin' => '0.0200',
                                'Collingsworth' => '0.0174',
                                'Colorado' => '0.0140',
                                'Comal' => '0.0160',
                                'Comanche' => '0.0160',
                                'Concho' => '0.0126',
                                'Cooke' => '0.0145',
                                'Coryell' => '0.0208',
                                'Cottle' => '0.0142',
                                'Crane' => '0.0141',
                                'Crockett' => '0.0037',
                                'Crosby' => '0.0189',
                                'Culberson' => '0.0132',
                                'Dallam' => '0.0141',
                                'Dallas' => '0.0222',
                                'Dawson' => '0.0150',
                                'Deaf Smith' => '0.0148',
                                'Delta' => '0.0114',
                                'Denton' => '0.0215',
                                'DeWitt' => '0.0109',
                                'Dickens' => '0.0119',
                                'Dimmit' => '0.0110',
                                'Donley' => '0.0170',
                                'Duval' => '0.0092',
                                'Eastland' => '0.0130',
                                'Ector' => '0.0153',
                                'Edwards' => '0.0123',
                                'El Paso' => '0.0200',
                                'Ellis' => '0.0258',
                                'Erath' => '0.0148',
                                'Falls' => '0.0154',
                                'Fannin' => '0.0129',
                                'Fayette' => '0.0109',
                                'Fisher' => '0.0157',
                                'Floyd' => '0.0130',
                                'Foard' => '0.0156',
                                'Fort Bend' => '0.0228',
                                'Franklin' => '0.0124',
                                'Freestone' => '0.0118',
                                'Frio' => '0.0160',
                                'Gaines' => '0.0152',
                                'Galveston' => '0.0192',
                                'Garza' => '0.0144',
                                'Gillespie' => '0.0107',
                                'Glasscock' => '0.0040',
                                'Goliad' => '0.0104',
                                'Gonzales' => '0.0129',
                                'Gray' => '0.0142',
                                'Grayson' => '0.0192',
                                'Gregg' => '0.0144',
                                'Grimes' => '0.0120',
                                'Guadalupe' => '0.0180',
                                'Hale' => '0.0150',
                                'Hall' => '0.0152',
                                'Hamilton' => '0.0141',
                                'Hansford' => '0.0149',
                                'Hardeman' => '0.0150',
                                'Hardin' => '0.0110',
                                'Harris' => '0.0213',
                                'Harrison' => '0.0133',
                                'Hartley' => '0.0126',
                                'Haskell' => '0.0119',
                                'Hays' => '0.0233',
                                'Hemphill' => '0.0105',
                                'Henderson' => '0.0135',
                                'Hidalgo' => '0.0218',
                                'Hill' => '0.0152',
                                'Hockley' => '0.0167',
                                'Hood' => '0.0126',
                                'Hopkins' => '0.0138',
                                'Houston' => '0.0112',
                                'Howard' => '0.0135',
                                'Hudspeth' => '0.0117',
                                'Hunt' => '0.0198',
                                'Hutchinson' => '0.0170',
                                'Irion' => '0.0113',
                                'Jack' => '0.0179',
                                'Jackson' => '0.0136',
                                'Jasper' => '0.0115',
                                'Jeff Davis' => '0.0100',
                                'Jefferson' => '0.0189',
                                'Jim Hogg' => '0.0096',
                                'Jim Wells' => '0.0137',
                                'Johnson' => '0.0186',
                                'Jones' => '0.0153',
                                'Karnes' => '0.0102',
                                'Kaufman' => '0.0222',
                                'Kendall' => '0.0129',
                                'Kenedy' => '0.0000',
                                'Kent' => '0.0039',
                                'Kerr' => '0.0124',
                                'Kimble' => '0.0118',
                                'King' => '0.0223',
                                'Kinney' => '0.0114',
                                'Kleberg' => '0.0186',
                                'Knox' => '0.0196',
                                'La Salle' => '0.0128',
                                'Lamar' => '0.0126',
                                'Lamb' => '0.0146',
                                'Lampasas' => '0.0105',
                                'Lavaca' => '0.0094',
                                'Lee' => '0.0122',
                                'Leon' => '0.0068',
                                'Liberty' => '0.0152',
                                'Limestone' => '0.0125',
                                'Lipscomb' => '0.0145',
                                'Live Oak' => '0.0086',
                                'Llano' => '0.0090',
                                'Lubbock' => '0.0203',
                                'Lynn' => '0.0171',
                                'Madison' => '0.0132',
                                'Marion' => '0.0195',
                                'Martin' => '0.0111',
                                'Mason' => '0.0149',
                                'Matagorda' => '0.0071',
                                'Maverick' => '0.0102',
                                'McCulloch' => '0.0087',
                                'McLennan' => '0.0126',
                                'McMullen' => '0.0148',
                                'Medina' => '0.0136',
                                'Menard' => '0.0154',
                                'Midland' => '0.0142',
                                'Milam' => '0.0134',
                                'Mills' => '0.0091',
                                'Mitchell' => '0.0195',
                                'Montague' => '0.0118',
                                'Montgomery' => '0.0204',
                                'Moore' => '0.0136',
                                'Morris' => '0.0108',
                                'Motley' => '0.0113',
                                'Nacogdoches' => '0.0102',
                                'Navarro' => '0.0153',
                                'Newton' => '0.0099',
                                'Nolan' => '0.0164',
                                'Nueces' => '0.0203',
                                'Ochiltree' => '0.0146',
                                'Oldham' => '0.0169',
                                'Orange' => '0.0167',
                                'Palo Pinto' => '0.0148',
                                'Panola' => '0.0094',
                                'Parker' => '0.0211',
                                'Parmer' => '0.0144',
                                'Pecos' => '0.0093',
                                'Polk' => '0.0107',
                                'Potter' => '0.0190',
                                'Presidio' => '0.0128',
                                'Rains' => '0.0120',
                                'Randall' => '0.0180',
                                'Reagan' => '0.0139',
                                'Real' => '0.0090',
                                'Red River' => '0.0137',
                                'Reeves' => '0.0097',
                                'Refugio' => '0.0144',
                                'Roberts' => '0.0101',
                                'Robertson' => '0.0106',
                                'Rockwall' => '0.0214',
                                'Runnels' => '0.0159',
                                'Rusk' => '0.0106',
                                'Sabine' => '0.0098',
                                'San Augustine' => '0.0079',
                                'San Jacinto' => '0.0121',
                                'San Patricio' => '0.0230',
                                'San Saba' => '0.0116',
                                'Schleicher' => '0.0116',
                                'Scurry' => '0.0157',
                                'Shackelford' => '0.0149',
                                'Shelby' => '0.0108',
                                'Sherman' => '0.0182',
                                'Smith' => '0.0155',
                                'Somervell' => '0.0099',
                                'Starr' => '0.0114',
                                'Stephens' => '0.0154',
                                'Sterling' => '0.0109',
                                'Stonewall' => '0.0145',
                                'Sutton' => '0.0173',
                                'Swisher' => '0.0152',
                                'Tarrant' => '0.0226',
                                'Taylor' => '0.0164',
                                'Terrell' => '0.0134',
                                'Terry' => '0.0143',
                                'Throckmorton' => '0.0149',
                                'Titus' => '0.0149',
                                'Tom Green' => '0.0145',
                                'Travis' => '0.0195',
                                'Trinity' => '0.0119',
                                'Tyler' => '0.0117',
                                'Upshur' => '0.0120',
                                'Upton' => '0.0117',
                                'Uvalde' => '0.0137',
                                'Val Verde' => '0.0153',
                                'Van Zandt' => '0.0115',
                                'Victoria' => '0.0195',
                                'Walker' => '0.0132',
                                'Waller' => '0.0150',
                                'Ward' => '0.0040',
                                'Washington' => '0.0138',
                                'Webb' => '0.0221',
                                'Wharton' => '0.0144',
                                'Wheeler' => '0.0155',
                                'Wichita' => '0.0199',
                                'Wilbarger' => '0.0172',
                                'Willacy' => '0.0163',
                                'Williamson' => '0.0230',
                                'Wilson' => '0.0137',
                                'Winkler' => '0.0111',
                                'Wise' => '0.0173',
                                'Wood' => '0.0110',
                                'Yoakum' => '0.0106',
                                'Young' => '0.0140',
                                'Zapata' => '0.0103',
                                'Zavala' => '0.0157',
                            ],
                            'dataset' => 'county',
                            'control' => 'DROPDOWN',
                            'default' => 'Anderson',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PropRate',
                            'label' => 'Applied property tax rate',
                            'type' => 'result',
                            'help' => 'The value reflects the average effective property tax rate levied in the selected county. You can update the tax rate if necessary.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'prop_tax > 0', 'text' => 'The estimated annual property tax is ${{prop_tax.formattedValue}}.'],
                                ['when' => 'annual_tax > 0', 'text' => 'The estimated total annual tax is ${{annual_tax.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 260', 'text' => 'The estimated daily take-home pay is ${{fin_income_period.formattedValue}}.&nbsp;'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 52', 'text' => 'The estimated weekly take-home pay is ${{fin_income_period.formattedValue}}.&nbsp;'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 26', 'text' => 'The estimated bi-weekly take-home pay is ${{fin_income_period.formattedValue}}.&nbsp;'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 24', 'text' => 'The estimated semi-monthly take-home pay is ${{fin_income_period.formattedValue}}.&nbsp;'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 12', 'text' => 'The estimated monthly take-home pay is ${{fin_income_period.formattedValue}}.&nbsp;'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        * Effective tax rate (percentage of gross income). ** A credit of ${{credit.formattedValue}} deducted from the tax amount. *** FICA covers Social Security (${{soc_sec.formattedValue}}) and Medicare tax (${{med_care.formattedValue}}). Local tax includes Employment Training Tax (ETT) and State Disability Insurance (SDI) of ${{local_tax.formattedValue}}.
                        TXT],
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
                            'name' => 'VarYear',
                            'label' => 'Var year',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarPay',
                            'label' => 'Var pay',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Rep',
                            'label' => 'Display..',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'StateID',
                            'label' => 'State id',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarStat',
                            'label' => 'Var stat',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'RetPerc',
                            'label' => 'Ret perc',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TaxState',
                            'label' => 'Where do you live?',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarRep',
                            'label' => 'Var rep',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Ret',
                            'label' => 'Retirement contributions',
                            'type' => 'number',
                            'suffix' => '$',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'prop_tax',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fica',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income_tax',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_tax',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income_aft_tax',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fin_income',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fica_rate',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'take_home_rate',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income_tax_rate',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'local_tax',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'state_tax_after_cred',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_fed',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_fed_rate',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'local_tax_rate',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'state_tax_after_cred_rate',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'soc_sec',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'med_care',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'credit',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stand_dep',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'state_ex',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarStatTable',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarYearTable',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarStateIDTable',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dep_ex',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'per_ex',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'IncomeState',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fin_income_period',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_fed_period',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income_period',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'state_tax_after_cred_period',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'local_tax_period',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income_tax_period',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fica_period',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_deduc',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income_aft_deduc',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Ret = RetPerc * Income ',
            'results' => ['Income' => 'Ret/RetPerc', 'RetPerc' => 'Ret/Income', 'Ret' => 'Income*RetPerc'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getFinalDeduc",function(VarYear,VarStat,StateID,Deduc,Ret,Income){if(VarYear===2022){if(VarStat===1&&Deduc<12950){Deduc=12950}if(VarStat===2&&Deduc<25900){Deduc=25900}if(VarStat===3&&Deduc<12950){Deduc=12950}if(VarStat===4&&Deduc<19400){Deduc=19400}}if(VarYear===2023){if(VarStat===1&&Deduc<13850){Deduc=13850}if(VarStat===2&&Deduc<27700){Deduc=27700}if(VarStat===3&&Deduc<13850){Deduc=13850}if(VarStat===4&&Deduc<20800){Deduc=20800}}if(VarYear===2024){if(VarStat===1&&Deduc<14600){Deduc=14600}if(VarStat===2&&Deduc<29200){Deduc=29200}if(VarStat===3&&Deduc<14600){Deduc=14600}if(VarStat===4&&Deduc<21900){Deduc=21900}}if(VarYear===2025){if(VarStat===1&&Deduc<15750){Deduc=15750}if(VarStat===2&&Deduc<31500){Deduc=31500}if(VarStat===3&&Deduc<15750){Deduc=15750}if(VarStat===4&&Deduc<23625){Deduc=23625}}if(VarYear===2026){if(VarStat===1&&Deduc<16100){Deduc=16100}if(VarStat===2&&Deduc<32200){Deduc=32200}if(VarStat===3&&Deduc<16100){Deduc=16100}if(VarStat===4&&Deduc<24150){Deduc=24150}}if(Income<Deduc+Ret){Deduc=Income}var StandDed=getStandDed(VarStat,StateID,VarYear);console.log(StandDed,Deduc);if(StandDed>=Deduc){return StandDed+Deduc}else{return Deduc}});omni.define("getIncomeTax",function(VarYear,Income,VarStat,StateID,VarDep){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(VarYear===2026){TaxFed=getTaxFed26(Income,VarStat)}if(TaxFed<0){TaxFed=0}var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var Local=0;if(StateID===5){var SDI=0;if(VarYear===2021){SDI=Income*0.012;if(Income>128298){SDI=128298*0.012}}else if(VarYear===2022){SDI=Income*0.011;if(Income>145600){SDI=145600*0.011}}else if(VarYear===2023){SDI=Income*0.012;if(Income>153164){SDI=153164*0.009}}else if(VarYear===2024){SDI=Income*0.011}else if(VarYear===2025){SDI=Income*0.011}var ETT=Income*0.001;if(Income>7000){ETT=7000*0.001}Local=SDI+ETT}var IncomeState=Income-(StandDed+DepEx+PerEx);var StateTax=getStateTax(IncomeState,VarStat,StateID,VarYear);var StateTaxAftCred=StateTax-StandDedCredit-DepExCredit-PerExCredit;var TotIncTax=TaxFed+StateTaxAftCred+Local;return TotIncTax});omni.define("getDepEx",function(VarYear,Income,VarStat,StateID,VarDep){var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}return DepEx});omni.define("getPerEx",function(VarYear,Income,VarStat,StateID){var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}return PerEx});omni.define("getStandDeduc",function(VarYear,Income,VarStat,StateID,VarDep){var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}return StandDed});omni.define("getStateEx",function(VarYear,Income,VarStat,StateID,VarDep){var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var StateEx=PerEx+DepEx;return StateEx});omni.define("getTaxFed",function(VarYear,Income,VarStat){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(VarYear===2026){TaxFed=getTaxFed26(Income,VarStat)}if(TaxFed<0){TaxFed=0}return TaxFed});omni.define("getStateTaxAftCred",function(VarYear,Income,VarStat,StateID,VarDep){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(VarYear===2026){TaxFed=getTaxFed26(Income,VarStat)}if(TaxFed<0){TaxFed=0}var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var IncomeState=Income-(StandDed+DepEx+PerEx);var StateTax=getStateTax(IncomeState,VarStat,StateID,VarYear);var StateTaxAftCred=StateTax-StandDedCredit-DepExCredit-PerExCredit;if(StateTaxAftCred<0){StateTaxAftCred=0}return StateTaxAftCred});omni.define("getLocal",function(VarYear,Income,VarStat,StateID){var Local=0;if(StateID===5){var SDI=0;if(VarYear===2021){SDI=Income*0.012;if(Income>128298){SDI=128298*0.012}}else if(VarYear===2022){SDI=Income*0.011;if(Income>145600){SDI=145600*0.011}}else if(VarYear===2023){SDI=Income*0.012;if(Income>153164){SDI=153164*0.009}}else if(VarYear===2024){SDI=Income*0.011}else if(VarYear===2025){SDI=Income*0.011}var ETT=Income*0.001;if(Income>7000){ETT=7000*0.001}Local=SDI+ETT}if(Local<0){Local=0}return Local});omni.define("getCredit",function(VarYear,Income,VarStat,StateID,VarDep){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(VarYear===2026){TaxFed=getTaxFed26(Income,VarStat)}if(TaxFed<0){TaxFed=0}var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var Credit=StandDedCredit+DepExCredit+PerExCredit;return Credit});omni.define("getFica",function(VarYear,Income,VarStat){var SocSec=Income*0.062;if(VarYear===2022&&Income>147000){SocSec=147000*0.062}else if(VarYear===2023&&Income>160200){SocSec=160200*0.062}else if(VarYear===2024&&Income>168600){SocSec=168600*0.062}else if(VarYear===2025&&Income>176100){SocSec=176100*0.062}else if(VarYear===2026&&Income>184500){SocSec=184500*0.062}var MedCare=0;var MedLimit=200000;if(VarStat===2){MedLimit=250000}else if(VarStat===3){MedLimit=125000}if(Income<=MedLimit){MedCare=Income*0.0145}else{MedCare=MedLimit*0.0145+(Income-MedLimit)*0.0235}var Fica=SocSec+MedCare;return Fica});omni.define("getSocSec",function(VarYear,Income){var SocSec=Income*0.062;if(VarYear===2022&&Income>147000){SocSec=147000*0.062}else if(VarYear===2023&&Income>160200){SocSec=160200*0.062}else if(VarYear===2024&&Income>168600){SocSec=168600*0.062}else if(VarYear===2025&&Income>176100){SocSec=176100*0.062}else if(VarYear===2026&&Income>184500){SocSec=184500*0.062}return SocSec});omni.define("getMedCare",function(VarYear,Income,VarStat){var MedCare=0;var MedLimit=200000;if(VarStat===2){MedLimit=250000}else if(VarStat===3){MedLimit=125000}if(Income<=MedLimit){MedCare=Income*0.0145}else{MedCare=MedLimit*0.0145+(Income-MedLimit)*0.0235}return MedCare});function getTaxBracketFed(Bracket,VarStat,VarYear){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var UnmarBrack1,UnmarBrack2,UnmarBrack3,UnmarBrack4,UnmarBrack5,UnmarBrack6;var MarJointBrack1,MarJointBrack2,MarJointBrack3,MarJointBrack4,MarJointBrack5,MarJointBrack6;var MarSepBrack1,MarSepBrack2,MarSepBrack3,MarSepBrack4,MarSepBrack5,MarSepBrack6;var HeadBrack1,HeadBrack2,HeadBrack3,HeadBrack4,HeadBrack5,HeadBrack6;if(VarYear===2022){UnmarBrack1=10275;UnmarBrack2=41775;UnmarBrack3=89075;UnmarBrack4=170050;UnmarBrack5=215950;UnmarBrack6=539900;MarJointBrack1=20550;MarJointBrack2=83550;MarJointBrack3=178150;MarJointBrack4=340100;MarJointBrack5=431900;MarJointBrack6=647850;MarSepBrack1=10275;MarSepBrack2=41775;MarSepBrack3=89075;MarSepBrack4=170050;MarSepBrack5=215950;MarSepBrack6=323925;HeadBrack1=14650;HeadBrack2=55900;HeadBrack3=89050;HeadBrack4=170050;HeadBrack5=215950;HeadBrack6=539900}if(VarYear===2023){UnmarBrack1=11000;UnmarBrack2=44725;UnmarBrack3=95375;UnmarBrack4=182100;UnmarBrack5=231250;UnmarBrack6=578125;MarJointBrack1=22000;MarJointBrack2=89450;MarJointBrack3=190750;MarJointBrack4=364200;MarJointBrack5=462500;MarJointBrack6=693750;MarSepBrack1=11000;MarSepBrack2=44725;MarSepBrack3=95375;MarSepBrack4=182100;MarSepBrack5=231250;MarSepBrack6=346875;HeadBrack1=15700;HeadBrack2=59850;HeadBrack3=95350;HeadBrack4=182100;HeadBrack5=231250;HeadBrack6=578100}if(VarYear===2024){UnmarBrack1=11600;UnmarBrack2=47150;UnmarBrack3=100525;UnmarBrack4=191950;UnmarBrack5=243725;UnmarBrack6=609350;MarJointBrack1=23200;MarJointBrack2=94300;MarJointBrack3=201050;MarJointBrack4=383900;MarJointBrack5=487450;MarJointBrack6=731200;MarSepBrack1=11600;MarSepBrack2=47150;MarSepBrack3=100525;MarSepBrack4=191950;MarSepBrack5=243725;MarSepBrack6=365600;HeadBrack1=16550;HeadBrack2=63100;HeadBrack3=100500;HeadBrack4=191950;HeadBrack5=243700;HeadBrack6=609350}if(VarYear===2025){UnmarBrack1=11925;UnmarBrack2=48475;UnmarBrack3=103350;UnmarBrack4=197300;UnmarBrack5=250525;UnmarBrack6=626350;MarJointBrack1=23850;MarJointBrack2=96950;MarJointBrack3=206700;MarJointBrack4=394600;MarJointBrack5=501050;MarJointBrack6=751600;MarSepBrack1=11925;MarSepBrack2=48475;MarSepBrack3=103350;MarSepBrack4=197300;MarSepBrack5=250525;MarSepBrack6=375800;HeadBrack1=17000;HeadBrack2=64850;HeadBrack3=103350;HeadBrack4=197300;HeadBrack5=250500;HeadBrack6=626350}if(VarYear===2026){UnmarBrack1=12400;UnmarBrack2=50400;UnmarBrack3=105700;UnmarBrack4=201775;UnmarBrack5=256225;UnmarBrack6=640600;MarJointBrack1=24800;MarJointBrack2=100800;MarJointBrack3=211400;MarJointBrack4=403550;MarJointBrack5=512450;MarJointBrack6=768700;MarSepBrack1=12400;MarSepBrack2=50400;MarSepBrack3=105700;MarSepBrack4=201775;MarSepBrack5=256225;MarSepBrack6=384350;HeadBrack1=17700;HeadBrack2=67450;HeadBrack3=105700;HeadBrack4=201775;HeadBrack5=256200;HeadBrack6=640600}if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Brack;if(Bracket===1){Brack=Brack1}else if(Bracket===2){Brack=Brack2}else if(Bracket===3){Brack=Brack3}else if(Bracket===4){Brack=Brack4}else if(Bracket===5){Brack=Brack5}else if(Bracket===6){Brack=Brack6}return Brack}function getTaxFed22(Inc,VarStat){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=10275;var UnmarBrack2=41775;var UnmarBrack3=89075;var UnmarBrack4=170050;var UnmarBrack5=215950;var UnmarBrack6=539900;var MarJointBrack1=20550;var MarJointBrack2=83550;var MarJointBrack3=178150;var MarJointBrack4=340100;var MarJointBrack5=431900;var MarJointBrack6=647850;var MarSepBrack1=10275;var MarSepBrack2=41775;var MarSepBrack3=89075;var MarSepBrack4=170050;var MarSepBrack5=215950;var MarSepBrack6=323925;var HeadBrack1=14650;var HeadBrack2=55900;var HeadBrack3=89050;var HeadBrack4=170050;var HeadBrack5=215950;var HeadBrack6=539900;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed23(Inc,VarStat){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11000;var UnmarBrack2=44725;var UnmarBrack3=95375;var UnmarBrack4=182100;var UnmarBrack5=231250;var UnmarBrack6=578125;var MarJointBrack1=22000;var MarJointBrack2=89450;var MarJointBrack3=190750;var MarJointBrack4=364200;var MarJointBrack5=462500;var MarJointBrack6=693750;var MarSepBrack1=11000;var MarSepBrack2=44725;var MarSepBrack3=95375;var MarSepBrack4=182100;var MarSepBrack5=231250;var MarSepBrack6=346875;var HeadBrack1=15700;var HeadBrack2=59850;var HeadBrack3=95350;var HeadBrack4=182100;var HeadBrack5=231250;var HeadBrack6=578100;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed24(Inc,VarStat){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11600;var UnmarBrack2=47150;var UnmarBrack3=100525;var UnmarBrack4=191950;var UnmarBrack5=243725;var UnmarBrack6=609350;var MarJointBrack1=23200;var MarJointBrack2=94300;var MarJointBrack3=201050;var MarJointBrack4=383900;var MarJointBrack5=487450;var MarJointBrack6=731200;var MarSepBrack1=11600;var MarSepBrack2=47150;var MarSepBrack3=100525;var MarSepBrack4=191950;var MarSepBrack5=243725;var MarSepBrack6=365600;var HeadBrack1=16550;var HeadBrack2=63100;var HeadBrack3=100500;var HeadBrack4=191950;var HeadBrack5=243700;var HeadBrack6=609350;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed25(Inc,VarStat){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11925;var UnmarBrack2=48475;var UnmarBrack3=103350;var UnmarBrack4=197300;var UnmarBrack5=250525;var UnmarBrack6=626350;var MarJointBrack1=23850;var MarJointBrack2=96950;var MarJointBrack3=206700;var MarJointBrack4=394600;var MarJointBrack5=501050;var MarJointBrack6=751600;var MarSepBrack1=11925;var MarSepBrack2=48475;var MarSepBrack3=103350;var MarSepBrack4=197300;var MarSepBrack5=250525;var MarSepBrack6=375800;var HeadBrack1=17000;var HeadBrack2=64850;var HeadBrack3=103350;var HeadBrack4=197300;var HeadBrack5=250500;var HeadBrack6=626350;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed26(Inc,VarStat){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=12400;var UnmarBrack2=50400;var UnmarBrack3=105700;var UnmarBrack4=201775;var UnmarBrack5=256225;var UnmarBrack6=640600;var MarJointBrack1=24800;var MarJointBrack2=100800;var MarJointBrack3=211400;var MarJointBrack4=403550;var MarJointBrack5=512450;var MarJointBrack6=768700;var MarSepBrack1=12400;var MarSepBrack2=50400;var MarSepBrack3=105700;var MarSepBrack4=201775;var MarSepBrack5=256225;var MarSepBrack6=384350;var HeadBrack1=17700;var HeadBrack2=67450;var HeadBrack3=105700;var HeadBrack4=201775;var HeadBrack5=256200;var HeadBrack6=640600;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxRate(StateID,Bracket,VarYear){var TaxRate=0;if(VarYear===2024){if(StateID===5){if(Bracket===0){TaxRate=0.01}else if(Bracket===1){TaxRate=0.02}else if(Bracket===2){TaxRate=0.04}else if(Bracket===3){TaxRate=0.06}else if(Bracket===4){TaxRate=0.08}else if(Bracket===5){TaxRate=0.093}else if(Bracket===6){TaxRate=0.103}else if(Bracket===7){TaxRate=0.113}else if(Bracket===8){TaxRate=0.123}else if(Bracket===9){TaxRate=0.133}}}else if(VarYear===2022){if(StateID===5){if(Bracket===0){TaxRate=0.01}else if(Bracket===1){TaxRate=0.02}else if(Bracket===2){TaxRate=0.04}else if(Bracket===3){TaxRate=0.06}else if(Bracket===4){TaxRate=0.08}else if(Bracket===5){TaxRate=0.093}else if(Bracket===6){TaxRate=0.103}else if(Bracket===7){TaxRate=0.113}else if(Bracket===8){TaxRate=0.123}else if(Bracket===9){TaxRate=0.133}}}else if(VarYear===2023){if(StateID===5){if(Bracket===0){TaxRate=0.01}else if(Bracket===1){TaxRate=0.02}else if(Bracket===2){TaxRate=0.04}else if(Bracket===3){TaxRate=0.06}else if(Bracket===4){TaxRate=0.08}else if(Bracket===5){TaxRate=0.093}else if(Bracket===6){TaxRate=0.103}else if(Bracket===7){TaxRate=0.113}else if(Bracket===8){TaxRate=0.123}else if(Bracket===9){TaxRate=0.133}}}else if(VarYear===2025){if(StateID===5){if(Bracket===0){TaxRate=0.01}else if(Bracket===1){TaxRate=0.02}else if(Bracket===2){TaxRate=0.04}else if(Bracket===3){TaxRate=0.06}else if(Bracket===4){TaxRate=0.08}else if(Bracket===5){TaxRate=0.093}else if(Bracket===6){TaxRate=0.103}else if(Bracket===7){TaxRate=0.113}else if(Bracket===8){TaxRate=0.123}else if(Bracket===9){TaxRate=0.133}}}return TaxRate}function getTaxBracket(StateID,Status,Bracket,VarYear){var Brack=0;if(VarYear===2024){if(StateID===5){if(Bracket===1){if(Status===1){Brack=10412}if(Status===2){Brack=20824}}else if(Bracket===2){if(Status===1){Brack=24684}if(Status===2){Brack=49368}}else if(Bracket===3){if(Status===1){Brack=38959}if(Status===2){Brack=77918}}else if(Bracket===4){if(Status===1){Brack=54081}if(Status===2){Brack=108162}}else if(Bracket===5){if(Status===1){Brack=68350}if(Status===2){Brack=136700}}else if(Bracket===6){if(Status===1){Brack=349137}if(Status===2){Brack=698274}}else if(Bracket===7){if(Status===1){Brack=418961}if(Status===2){Brack=837922}}else if(Bracket===8){if(Status===1){Brack=698271}if(Status===2){Brack=1000000}}else if(Bracket===9){if(Status===1){Brack=1000000}if(Status===2){Brack=1396542}}}}else if(VarYear===2022){var VarStat=Status;if(StateID===5){if(Bracket===1){if(VarStat===1||VarStat===3){Brack=9325}if(VarStat===2||VarStat===4){Brack=18650}}else if(Bracket===2){if(VarStat===1||VarStat===3){Brack=22107}if(VarStat===2||VarStat===4){Brack=44214}}else if(Bracket===3){if(VarStat===1||VarStat===3){Brack=34892}if(VarStat===2||VarStat===4){Brack=69784}}else if(Bracket===4){if(VarStat===1||VarStat===3){Brack=48435}if(VarStat===2||VarStat===4){Brack=96870}}else if(Bracket===5){if(VarStat===1||VarStat===3){Brack=61214}if(VarStat===2||VarStat===4){Brack=122428}}else if(Bracket===6){if(VarStat===1||VarStat===3){Brack=312686}if(VarStat===2||VarStat===4){Brack=625372}}else if(Bracket===7){if(VarStat===1||VarStat===3){Brack=375221}if(VarStat===2||VarStat===4){Brack=750442}}else if(Bracket===8){if(VarStat===1||VarStat===3){Brack=625369}if(VarStat===2||VarStat===4){Brack=1000000}}else if(Bracket===9){if(VarStat===1||VarStat===3){Brack=1000000}if(VarStat===2||VarStat===4){Brack=1250738}}}}else if(VarYear===2023){if(StateID===5){if(Bracket===1){if(Status===1){Brack=10099}if(Status===2){Brack=20198}}else if(Bracket===2){if(Status===1){Brack=23942}if(Status===2){Brack=47884}}else if(Bracket===3){if(Status===1){Brack=37788}if(Status===2){Brack=75576}}else if(Bracket===4){if(Status===1){Brack=52455}if(Status===2){Brack=104910}}else if(Bracket===5){if(Status===1){Brack=66295}if(Status===2){Brack=132590}}else if(Bracket===6){if(Status===1){Brack=338639}if(Status===2){Brack=677278}}else if(Bracket===7){if(Status===1){Brack=406364}if(Status===2){Brack=812728}}else if(Bracket===8){if(Status===1){Brack=677275}if(Status===2){Brack=1000000}}else if(Bracket===9){if(Status===1){Brack=1000000}if(Status===2){Brack=1354550}}}}else if(VarYear===2025){if(StateID===5){if(Bracket===1){if(Status===1){Brack=10412}if(Status===2){Brack=20824}}else if(Bracket===2){if(Status===1){Brack=24684}if(Status===2){Brack=49368}}else if(Bracket===3){if(Status===1){Brack=38959}if(Status===2){Brack=77918}}else if(Bracket===4){if(Status===1){Brack=54081}if(Status===2){Brack=108162}}else if(Bracket===5){if(Status===1){Brack=68350}if(Status===2){Brack=136700}}else if(Bracket===6){if(Status===1){Brack=349137}if(Status===2){Brack=698274}}else if(Bracket===7){if(Status===1){Brack=418961}if(Status===2){Brack=837922}}else if(Bracket===8){if(Status===1){Brack=698271}if(Status===2){Brack=1000000}}else if(Bracket===9){if(Status===1){Brack=1000000}if(Status===2){Brack=1396542}}}}return Brack}function getStateTax(Inc,VarStat,StateID,VarYear){var Brack1=getTaxBracket(StateID,VarStat,1,VarYear);var Brack2=getTaxBracket(StateID,VarStat,2,VarYear);var Brack3=getTaxBracket(StateID,VarStat,3,VarYear);var Brack4=getTaxBracket(StateID,VarStat,4,VarYear);var Brack5=getTaxBracket(StateID,VarStat,5,VarYear);var Brack6=getTaxBracket(StateID,VarStat,6,VarYear);var Brack7=getTaxBracket(StateID,VarStat,7,VarYear);var Brack8=getTaxBracket(StateID,VarStat,8,VarYear);var Brack9=getTaxBracket(StateID,VarStat,9,VarYear);var Brack10=getTaxBracket(StateID,VarStat,10,VarYear);var Brack11=getTaxBracket(StateID,VarStat,11,VarYear);var Brack12=getTaxBracket(StateID,VarStat,12,VarYear);var TaxRate0=getTaxRate(StateID,0,VarYear);var TaxRate1=getTaxRate(StateID,1,VarYear);var TaxRate2=getTaxRate(StateID,2,VarYear);var TaxRate3=getTaxRate(StateID,3,VarYear);var TaxRate4=getTaxRate(StateID,4,VarYear);var TaxRate5=getTaxRate(StateID,5,VarYear);var TaxRate6=getTaxRate(StateID,6,VarYear);var TaxRate7=getTaxRate(StateID,7,VarYear);var TaxRate8=getTaxRate(StateID,8,VarYear);var TaxRate9=getTaxRate(StateID,9,VarYear);var TaxRate10=getTaxRate(StateID,10,VarYear);var TaxRate11=getTaxRate(StateID,11,VarYear);var TaxRate12=getTaxRate(StateID,12,VarYear);var StateTax=0;var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;var Tax7=(Brack7-Brack6)*TaxRate6+Tax6;var Tax8=(Brack8-Brack7)*TaxRate7+Tax7;var Tax9=(Brack9-Brack8)*TaxRate8+Tax8;var Tax10=(Brack10-Brack9)*TaxRate9+Tax9;var Tax11=(Brack11-Brack10)*TaxRate10+Tax10;var Tax12=(Brack12-Brack11)*TaxRate11+Tax11;if(Inc<=Brack1||Brack1===0){StateTax=Inc*TaxRate0}else if(Inc>Brack1&&(Inc<=Brack2||Brack2===0)){StateTax=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&(Inc<=Brack3||Brack3===0)){StateTax=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&(Inc<=Brack4||Brack4===0)){StateTax=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&(Inc<=Brack5||Brack5===0)){StateTax=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&(Inc<=Brack6||Brack6===0)){StateTax=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6&&(Inc<=Brack7||Brack7===0)){StateTax=Tax6+(Inc-Brack6)*TaxRate6}else if(Inc>Brack7&&(Inc<=Brack8||Brack8===0)){StateTax=Tax7+(Inc-Brack7)*TaxRate7}else if(Inc>Brack8&&(Inc<=Brack9||Brack9===0)){StateTax=Tax8+(Inc-Brack8)*TaxRate8}else if(Inc>Brack9&&(Inc<=Brack10||Brack10===0)){StateTax=Tax9+(Inc-Brack9)*TaxRate9}else if(Inc>Brack10&&(Inc<=Brack11||Brack11===0)){StateTax=Tax10+(Inc-Brack10)*TaxRate10}else if(Inc>Brack11&&(Inc<=Brack12||Brack12===0)){StateTax=Tax11+(Inc-Brack11)*TaxRate11}else if(Inc>Brack12||Brack12!==0){StateTax=Tax12+(Inc-Brack12)*TaxRate12}return StateTax}function getStandDed(VarStat,StateID,VarYear){var StandDed=0;if(VarYear===2024){if(StateID===5){if(VarStat===1||VarStat===3){StandDed=5363}if(VarStat===2||VarStat===4){StandDed=10726}}}else if(VarYear===2022){if(StateID===5){if(VarStat===1||VarStat===3){StandDed=4803}if(VarStat===2||VarStat===4){StandDed=9606}}}else if(VarYear===2023){if(StateID===5){if(VarStat===1||VarStat===3){StandDed=5202}if(VarStat===2||VarStat===4){StandDed=10404}}}return StandDed}function getDepEx(StateID,VarYear){var DepEx=0;if(VarYear===2024){if(StateID===1){DepEx=1000}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=446}else if(StateID===8){DepEx=110}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2775}else if(StateID===14){DepEx=1000}else if(StateID===15){DepEx=40}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===19){DepEx=300}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5600}else if(StateID===23){DepEx=5050}else if(StateID===24){DepEx=1500}else if(StateID===27){DepEx=157}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2500}else if(StateID===36){DepEx=1000}else if(StateID===37){DepEx=249}else if(StateID===39){DepEx=4950}else if(StateID===40){DepEx=4.6}else if(StateID===44){DepEx=1941}else if(StateID===45){DepEx=4850}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}}else if(VarYear===2022){if(StateID===1){DepEx=1000}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2375}else if(StateID===14){DepEx=1000}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5000}else if(StateID===23){DepEx=4450}else if(StateID===24){DepEx=1500}else if(StateID===26){DepEx=2580}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2400}else if(StateID===36){DepEx=1000}else if(StateID===39){DepEx=4350}else if(StateID===40){DepEx=4300}else if(StateID===45){DepEx=4350}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=400}else if(StateID===8){DepEx=110}else if(StateID===15){DepEx=40}else if(StateID===19){DepEx=300}else if(StateID===27){DepEx=146}else if(StateID===37){DepEx=219}else if(StateID===44){DepEx=1750}}else if(VarYear===2023){if(StateID===1){DepEx=1000}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=433}else if(StateID===8){DepEx=110}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2425}else if(StateID===14){DepEx=1000}else if(StateID===15){DepEx=40}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===19){DepEx=300}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5400}else if(StateID===23){DepEx=4800}else if(StateID===24){DepEx=1500}else if(StateID===26){DepEx=2960}else if(StateID===27){DepEx=157}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2400}else if(StateID===36){DepEx=1000}else if(StateID===37){DepEx=236}else if(StateID===39){DepEx=4700}else if(StateID===40){DepEx=4.6}else if(StateID===44){DepEx=1.8}else if(StateID===45){DepEx=4500}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}}else if(VarYear===2025){if(StateID===1){DepEx=1000}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=446}else if(StateID===8){DepEx=110}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2775}else if(StateID===14){DepEx=1000}else if(StateID===15){DepEx=40}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===19){DepEx=300}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5600}else if(StateID===23){DepEx=5050}else if(StateID===24){DepEx=1500}else if(StateID===27){DepEx=157}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2500}else if(StateID===36){DepEx=1000}else if(StateID===37){DepEx=249}else if(StateID===39){DepEx=4950}else if(StateID===40){DepEx=4.6}else if(StateID===44){DepEx=1941}else if(StateID===45){DepEx=4850}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}}return DepEx}function getPerEx(VarYear,VarStat,StateID){var PerEx=0;if(VarYear===2024){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=144}if(VarStat===2||VarStat===4){PerEx=288}}}else if(VarYear===2022){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=129}if(VarStat===2||VarStat===4){PerEx=258}}}else if(VarYear===2023){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=140}if(VarStat===2||VarStat===4){PerEx=280}}}else if(VarYear===2025){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=144}if(VarStat===2||VarStat===4){PerEx=288}}}return PerEx}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Texas tax turns Adjusted Gross Income (AGI), Pay frequency and Year of income into Applied property tax rate and Var year. It is a single relationship that reads applied property tax rate out of adjusted Gross Income (AGI), not a table of canned results keyed by them. Units for Applied property tax rate default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Texas tax calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Texas tax: it takes 16 numbers and reports Applied property tax rate, Var year and Var pay.</p><p>In the form&#039;s own words, Retirement contributions = Adjusted Gross Income (AGI) × Ret perc.</p><p>The result panel carries Applied property tax rate, Var year and Var pay, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 16 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Adjusted Gross Income (AGI)</strong> — in annual</li><li><strong>Pay frequency</strong> — a plain number, no unit. Set here the period in which you want to see your take-home pay.</li><li><strong>Year of income</strong> — a plain number, no unit</li><li><strong>What is your filling status?</strong> — a plain number, no unit</li><li><strong>Number of additional dependent</strong> — in person(s). The standard number of dependent is one for single and two for married filer. State here only the number of additional dependent.</li><li><strong>Itemized deductions</strong> — a plain number, no unit. Set here the total of itemized deductions other than retirement contribution relevant to the federal income tax. If you don&#039;t set a deduction or it is less than the standard deduction, the standard deduction will be considered.</li><li><strong>Post-tax deductions</strong> — a plain number, no unit</li><li><strong>Assessed home value</strong> — a plain number, no unit. Set here the assessed value of your property reduced by the applied exemption. In general, taxpayers can claim a $25,000 exemption on their owner-occupied homes.</li><li><strong>In which county do you live?</strong> — a plain number, no unit</li><li><strong>Display…</strong> — a plain number, no unit</li><li><strong>State id</strong> — a plain number, no unit</li><li><strong>Var stat</strong> — a plain number, no unit</li><li><strong>Ret perc</strong> — a plain number, no unit</li><li><strong>Where do you live?</strong> — a plain number, no unit</li><li><strong>Var rep</strong> — a plain number, no unit</li><li><strong>Retirement contributions</strong> — in $</li></ul><p>What you get back is Applied property tax rate in percent, Var year, Var pay, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Applied property tax rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Retirement contributions</strong> = <code>Adjusted Gross Income (AGI) × Ret perc</code></li><li><strong>Adjusted Gross Income (AGI)</strong> = <code>Retirement contributions ÷ Ret perc</code></li><li><strong>Ret perc</strong> = <code>Retirement contributions ÷ Adjusted Gross Income (AGI)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Retirement contributions</strong> = <code>Adjusted Gross Income (AGI) × Ret perc</code> — the form to use when Adjusted Gross Income (AGI) and Ret perc are the values you have.</li><li><strong>Adjusted Gross Income (AGI)</strong> = <code>Retirement contributions ÷ Ret perc</code> — the form to use when Retirement contributions and Ret perc are the values you have.</li><li><strong>Ret perc</strong> = <code>Retirement contributions ÷ Adjusted Gross Income (AGI)</code> — the form to use when Retirement contributions and Adjusted Gross Income (AGI) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Retirement contributions, Adjusted Gross Income (AGI) and Ret perc can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Adjusted Gross Income (AGI) is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Applied property tax rate, Var year and Var pay are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Adjusted Gross Income (AGI) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Adjusted Gross Income (AGI) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Pay frequency left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Pay frequency is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Adjusted Gross Income (AGI) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Texas tax form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Adjusted Gross Income (AGI)</strong> is a annual quantity: the page opens it in annual and converts anything else you pick before the formula runs. Change it and Ret perc and Retirement contributions changes with it. Fill it from a measurement rather than a memory — Adjusted Gross Income (AGI) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Pay frequency</strong> takes a plain number with no unit attached. Set here the period in which you want to see your take-home pay. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Pay frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year of income</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Year of income is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>What is your filling status?</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — What is your filling status? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of additional dependent</strong> is measured in person(s). The standard number of dependent is one for single and two for married filer. State here only the number of additional dependent. Fill it from a measurement rather than a memory — Number of additional dependent is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Itemized deductions</strong> takes a plain number with no unit attached. Set here the total of itemized deductions other than retirement contribution relevant to the federal income tax. If you don&#039;t set a deduction or it is less than the standard deduction, the standard deduction will be considered. Fill it from a measurement rather than a memory — Itemized deductions is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Post-tax deductions</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Post-tax deductions is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Assessed home value</strong> takes a plain number with no unit attached. Set here the assessed value of your property reduced by the applied exemption. In general, taxpayers can claim a $25,000 exemption on their owner-occupied homes. Fill it from a measurement rather than a memory — Assessed home value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>In which county do you live?</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — In which county do you live? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Display…</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Display… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>State id</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — State id is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Var stat</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Var stat is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Ret perc</strong> takes a plain number with no unit attached. Change it and Adjusted Gross Income (AGI) and Retirement contributions changes with it. Fill it from a measurement rather than a memory — Ret perc is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Where do you live?</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Where do you live? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Var rep</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Var rep is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Retirement contributions</strong> is measured in $. Change it and Adjusted Gross Income (AGI) and Ret perc changes with it. Fill it from a measurement rather than a memory — Retirement contributions is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Applied property tax rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent and annual. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Adjusted Gross Income (AGI), Pay frequency and Year of income measured, Applied property tax rate and Var year wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/stimulus-heroes">Second stimulus check - HEROES Act Calculator</a>, <a href="/finance/second-stimulus-check">Second stimulus check</a> and <a href="/finance/sell-through-rate">Sell-through rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Texas tax calculator work out?', 'a' => <<<'TXT'
            Applied property tax rate, Var year and Var pay, from Adjusted Gross Income (AGI) and Ret perc. The relationship is Retirement contributions = Adjusted Gross Income (AGI) × Ret perc.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Adjusted Gross Income (AGI) (annual), Pay frequency, Year of income, What is your filling status?, Number of additional dependent (person(s)). With adjusted Gross Income (AGI), pay frequency and year of income in place, Applied property tax rate can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Retirement contributions, Adjusted Gross Income (AGI) and Ret perc can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Applied property tax rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Adjusted Gross Income (AGI) blank and the page solves for it, reporting Applied property tax rate instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Applied property tax rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/stimulus-heroes', 'name' => 'Second stimulus check - HEROES Act Calculator'],
            ['path' => '/finance/second-stimulus-check', 'name' => 'Second stimulus check'],
            ['path' => '/finance/sell-through-rate', 'name' => 'Sell-through rate Calculator'],
        ],
        'authors' => [],
    ],
];
