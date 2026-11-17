<?php

/**
 * VA disability
 * /finance/va-disability
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'VA disability',
    'meta' => ['title' => 'VA disability Calculator — Formula & Results', 'description' => 'VA disability turns condition #1, condition #2 and condition #3 into disability. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'VA disability Calculator', 'updated' => '2025-07-30'],
    'sections' => [
        [
            'title' => 'Disability ranking:',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A1',
                            'label' => 'Condition #1',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                            'default' => '10%',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A2',
                            'label' => 'Condition #2',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A3',
                            'label' => 'Condition #3',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A4',
                            'label' => 'Condition #4',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A5',
                            'label' => 'Condition #5',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A6',
                            'label' => 'Condition #6',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A7',
                            'label' => 'Condition #7',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A8',
                            'label' => 'Condition #8',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A9',
                            'label' => 'Condition #9',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A10',
                            'label' => 'Condition #10',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A11',
                            'label' => 'Condition #11',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A12',
                            'label' => 'Condition #12',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A13',
                            'label' => 'Condition #13',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A14',
                            'label' => 'Condition #14',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A15',
                            'label' => 'Condition #15',
                            'type' => 'select',
                            'options' => [
                                '0%' => '0',
                                '10%' => '0.1',
                                '20%' => '0.2',
                                '30%' => '0.3',
                                '40%' => '0.4',
                                '50%' => '0.5',
                                '60%' => '0.6',
                                '70%' => '0.7',
                                '80%' => '0.8',
                                '90%' => '0.9',
                                '100%' => '1',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'disability',
                            'label' => 'Disability',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Dependent family members',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spouse',
                            'label' => 'Marital status',
                            'type' => 'select',
                            'options' => ['Single' => '0', 'Married' => '1'],
                            'dataset' => 'spouse',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aa',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Spouse receiving Aid & Attendance' => '1', '' => '0'],
                            'dataset' => 'aa',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'childrenU18',
                            'label' => 'Children under age 18 ',
                            'type' => 'select',
                            'options' => [
                                '0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                            ],
                            'dataset' => 'kids',
                            'control' => 'DROPDOWN',
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'childrenO18',
                            'label' => 'School children aged over 18',
                            'type' => 'select',
                            'options' => [
                                '0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                            ],
                            'dataset' => 'kids',
                            'control' => 'DROPDOWN',
                            'help' => 'In a qualifying school program.',
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'parent',
                            'label' => 'Parent',
                            'type' => 'select',
                            'options' => ['None' => '0', 'One' => '1', 'Two' => '2'],
                            'dataset' => 'parent',
                            'control' => 'DROPDOWN',
                            'default' => 'None',
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
                        ['type' => 'note', 'text' => <<<'TXT'
                        Your total cumulative disability: {{cum_dis.formattedValue}}% Total combined disability rating: {{dis_rat.formattedValue}}%  Estimated compensation rate (monthly payments): {{rate.formattedValue}}
                        TXT],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'disability = sum(A1,A2,A3,A4,A5,A6,A7,A8,A9,A10,A11,A12,A13,A14,A15)',
            'results' => [
                'A3' => '-A1 - A10 - A11 - A12 - A13 - A14 - A15 - A2 - A4 - A5 - A6 - A7 - A8 - A9 + disability',
                'A9' => '-A1 - A10 - A11 - A12 - A13 - A14 - A15 - A2 - A3 - A4 - A5 - A6 - A7 - A8 + disability',
                'A11' => '-A1 - A10 - A12 - A13 - A14 - A15 - A2 - A3 - A4 - A5 - A6 - A7 - A8 - A9 + disability',
                'A15' => '-A1 - A10 - A11 - A12 - A13 - A14 - A2 - A3 - A4 - A5 - A6 - A7 - A8 - A9 + disability',
                'A4' => '-A1 - A10 - A11 - A12 - A13 - A14 - A15 - A2 - A3 - A5 - A6 - A7 - A8 - A9 + disability',
                'A5' => '-A1 - A10 - A11 - A12 - A13 - A14 - A15 - A2 - A3 - A4 - A6 - A7 - A8 - A9 + disability',
                'disability' => 'A1 + A10 + A11 + A12 + A13 + A14 + A15 + A2 + A3 + A4 + A5 + A6 + A7 + A8 + A9',
                'A1' => '-A10 - A11 - A12 - A13 - A14 - A15 - A2 - A3 - A4 - A5 - A6 - A7 - A8 - A9 + disability',
                'A7' => '-A1 - A10 - A11 - A12 - A13 - A14 - A15 - A2 - A3 - A4 - A5 - A6 - A8 - A9 + disability',
                'A12' => '-A1 - A10 - A11 - A13 - A14 - A15 - A2 - A3 - A4 - A5 - A6 - A7 - A8 - A9 + disability',
                'A2' => '-A1 - A10 - A11 - A12 - A13 - A14 - A15 - A3 - A4 - A5 - A6 - A7 - A8 - A9 + disability',
                'A6' => '-A1 - A10 - A11 - A12 - A13 - A14 - A15 - A2 - A3 - A4 - A5 - A7 - A8 - A9 + disability',
                'A14' => '-A1 - A10 - A11 - A12 - A13 - A15 - A2 - A3 - A4 - A5 - A6 - A7 - A8 - A9 + disability',
                'A8' => '-A1 - A10 - A11 - A12 - A13 - A14 - A15 - A2 - A3 - A4 - A5 - A6 - A7 - A9 + disability',
                'A13' => '-A1 - A10 - A11 - A12 - A14 - A15 - A2 - A3 - A4 - A5 - A6 - A7 - A8 - A9 + disability',
                'A10' => '-A1 - A11 - A12 - A13 - A14 - A15 - A2 - A3 - A4 - A5 - A6 - A7 - A8 - A9 + disability',
            ],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.onResult([],function(ctx,_ref){var A1=_ref.A1,A2=_ref.A2,A3=_ref.A3,A4=_ref.A4,A5=_ref.A5,A6=_ref.A6,A7=_ref.A7,A8=_ref.A8,A9=_ref.A9,A10=_ref.A10,A11=_ref.A11,A12=_ref.A12,A13=_ref.A13,A14=_ref.A14,A15=_ref.A15,childrenU18=_ref.childrenU18,childrenO18=_ref.childrenO18,parent=_ref.parent,spouse=_ref.spouse,aa=_ref.aa;var varArray=[A1,A2,A3,A4,A5,A6,A7,A8,A9,A10,A11,A12,A13,A14,A15];var numbers=[];var count=0;for(var _i=0,_varArray=varArray;_i<_varArray.length;_i++){var i=_varArray[_i];if(i!==null){numbers.push(i);count+=1}}var max;max=Math.max.apply(Math,numbers);for(var _i2=0;_i2<numbers.length;_i2++){if(numbers[_i2]===max){numbers.splice(_i2,1)}}var results=[];var _final=[];var disability_percentage;for(var _i3=0;_i3<numbers.length;_i3++){results[_i3]=numbers[_i3]*(1-max);max+=results[_i3];_final.push(max*100)}var rounded=round_to(_final[_final.length-1],0);if(count>1){disability_percentage=Math.round(rounded/10)*10}else if(count==1){disability_percentage=Math.round(max*100/10)*10;_final[_final.length-1]=max*100}var money=0;var table3060=[[441.35,635.77,905.04,1146.39,1444.71,1679.35,1887.18,3146.42],[493.35,705.77,992.04,1251.39,1566.71,1819.35,2044.18,3321.85],[535.35,761.77,1062.04,1335.39,1664.71,1931.35,2170.18,3462.64],[577.35,817.77,1132.04,1419.39,1762.71,2043.45,2296.18,3603.43],[483.35,691.77,975.04,1230.39,1542.71,1791.35,2013.18,3287.21],[525.35,747.77,1045.04,1314.39,1640.71,1903.35,2139.18,3428],[476.35,681.77,963.04,1216.39,1526.71,1772.35,1992.18,3263.74],[532.35,756.77,1056.04,1328.39,1656.71,1922.35,2160.18,3450.32],[574.35,812.77,1126.04,1412.39,1754.71,2034.35,2286.18,3591.11],[616.35,868.77,1196.04,1496.39,1852.71,2146.35,2412.18,3731.9],[518.35,737.77,1033.04,1300.39,1624.71,1884.35,2118.18,3404.53],[560.35,793.77,1103.04,1384.39,1722.71,1996.35,2244.18,3545.32]];if(disability_percentage<10){money=0}else if(disability_percentage===10){money=144.14}else if(disability_percentage===20){money=284.93}var percentage_tabl=[30,40,50,60,70,80,90,100];var aatabl=[48,64,81,96,113,129,145,160.89];var childrenUtable=[26,34,43,52,61,69,78,87.17];var childrenOtable=[84,112,140,168,197,225,253,281.57];for(var _i4=0;_i4<9;_i4++){if(disability_percentage===percentage_tabl[_i4]){if(childrenU18===0&&childrenO18===0){if(spouse===0&&parent===0){money=table3060[0][_i4]}else if(spouse===1&&parent===0){money=table3060[1][_i4]+aa*aatabl[_i4]}else if(spouse===1&&parent===1){money=table3060[2][_i4]+aa*aatabl[_i4]}else if(spouse===1&&parent===2){money=table3060[3][_i4]+aa*aatabl[_i4]}else if(spouse===0&&parent===1){money=table3060[4][_i4]}else if(spouse===0&&parent===2){money=table3060[5][_i4]}}else if(childrenU18>0||childrenO18>0){if(spouse===0&&parent===0){if(childrenU18>0&&childrenO18>0){money=table3060[6][_i4]+(childrenU18-1)*childrenUtable[_i4]+childrenO18*childrenOtable[_i4]}else if(childrenU18>0&&childrenO18===0){money=table3060[6][_i4]+(childrenU18-1)*childrenUtable[_i4]}else if(childrenO18>0&&childrenU18===0){money=table3060[6][_i4]+(childrenO18-1)*childrenOtable[_i4]}}else if(spouse===1&&parent===0){if(childrenU18>0&&childrenO18>0){money=table3060[7][_i4]+(childrenU18-1)*childrenUtable[_i4]+childrenO18*childrenOtable[_i4]+aa*aatabl[_i4]}else if(childrenU18>0&&childrenO18===0){money=table3060[7][_i4]+(childrenU18-1)*childrenUtable[_i4]+aa*aatabl[_i4]}else if(childrenO18>0&&childrenU18===0){money=table3060[7][_i4]+(childrenO18-1)*childrenOtable[_i4]+aa*aatabl[_i4]}}else if(spouse===1&&parent===1){if(childrenU18>0&&childrenO18>0){money=table3060[8][_i4]+(childrenU18-1)*childrenUtable[_i4]+childrenO18*childrenOtable[_i4]+aa*aatabl[_i4]}else if(childrenU18>0&&childrenO18===0){money=table3060[8][_i4]+(childrenU18-1)*childrenUtable[_i4]+aa*aatabl[_i4]}else if(childrenO18>0&&childrenU18===0){money=table3060[8][_i4]+(childrenO18-1)*childrenOtable[_i4]+aa*aatabl[_i4]}}else if(spouse===1&&parent===2){if(childrenU18>0&&childrenO18>0){money=table3060[9][_i4]+(childrenU18-1)*childrenUtable[_i4]+childrenO18*childrenOtable[_i4]+aa*aatabl[_i4]}else if(childrenU18>0&&childrenO18===0){money=table3060[9][_i4]+(childrenU18-1)*childrenUtable[_i4]+aa*aatabl[_i4]}else if(childrenO18>0&&childrenU18===0){money=table3060[9][_i4]+(childrenO18-1)*childrenOtable[_i4]+aa*aatabl[_i4]}}else if(spouse===0&&parent===1){if(childrenU18>0&&childrenO18>0){money=table3060[10][_i4]+(childrenU18-1)*childrenUtable[_i4]+childrenO18*childrenOtable[_i4]}else if(childrenU18>0&&childrenO18===0){money=table3060[10][_i4]+(childrenU18-1)*childrenUtable[_i4]}else if(childrenO18>0&&childrenU18===0){money=table3060[10][_i4]+(childrenO18-1)*childrenOtable[_i4]}}else if(spouse===0&&parent===2){if(childrenU18>0&&childrenO18>0){money=table3060[11][_i4]+(childrenU18-1)*childrenUtable[_i4]+childrenO18*childrenOtable[_i4]}else if(childrenU18>0&&childrenO18===0){money=table3060[11][_i4]+(childrenU18-1)*childrenUtable[_i4]}else if(childrenO18>0&&childrenU18===0){money=table3060[11][_i4]+(childrenO18-1)*childrenOtable[_i4]}}}}}ctx.exportValue("cum_dis",round_to(_final[_final.length-1],0));ctx.exportValue("dis_rat",disability_percentage);ctx.exportValue("rate",money.toLocaleString("en-US",{style:"currency",currency:"USD"}))});function round_to(n,k){var factor=Math.pow(10,k+1);n=Math.round(Math.round(n*factor)/10);return n/(factor/10)}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        VA disability works out Disability from Condition #1, Condition #2 and Condition #3. Nothing is looked up on this page: disability is computed from condition #1 and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the VA disability calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind VA disability: it takes 19 numbers and reports Disability.</p><p>Written with the labels from the form, Disability = Condition #1 + Condition #10 + Condition #11 + Condition #12 + Condition #13 + Condition #14 + Condition #15 + Condition #2 + Condition #3 + Condition #4 + Condition #5 + Condition #6 + Condition #7 + Condition #8 + Condition #9.</p><p>What comes back is Disability — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 19 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Condition #1</strong> — a plain number, no unit</li><li><strong>Condition #2</strong> — a plain number, no unit</li><li><strong>Condition #3</strong> — a plain number, no unit</li><li><strong>Condition #4</strong> — a plain number, no unit</li><li><strong>Condition #5</strong> — a plain number, no unit</li><li><strong>Condition #6</strong> — a plain number, no unit</li><li><strong>Condition #7</strong> — a plain number, no unit</li><li><strong>Condition #8</strong> — a plain number, no unit</li><li><strong>Condition #9</strong> — a plain number, no unit</li><li><strong>Condition #10</strong> — a plain number, no unit</li><li><strong>Condition #11</strong> — a plain number, no unit</li><li><strong>Condition #12</strong> — a plain number, no unit</li><li><strong>Condition #13</strong> — a plain number, no unit</li><li><strong>Condition #14</strong> — a plain number, no unit</li><li><strong>Condition #15</strong> — a plain number, no unit</li><li><strong>Marital status</strong> — a plain number, no unit</li><li><strong>Children under age 18</strong> — a plain number, no unit</li><li><strong>School children aged over 18</strong> — a plain number, no unit. In a qualifying school program.</li><li><strong>Parent</strong> — a plain number, no unit</li></ul><p>The result box is Disability. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Marital status = 0, Aa = 0, Children under age 18 = 0, School children aged over 18 = 0 and Parent = 0; the answers are <strong>Condition #1</strong> = 0.1.</p><ul><li><strong>Condition #1</strong> = 0.1</li></ul><p>The line behind those figures is <strong>Disability</strong> = <code>Condition #1 + Condition #10 + Condition #11 + Condition #12 + Condition #13 + Condition #14 + Condition #15 + Condition #2 + Condition #3 + Condition #4 + Condition #5 + Condition #6 + Condition #7 + Condition #8 + Condition #9</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Condition #1</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Disability is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Disability</strong> = <code>Condition #1 + Condition #10 + Condition #11 + Condition #12 + Condition #13 + Condition #14 + Condition #15 + Condition #2 + Condition #3 + Condition #4 + Condition #5 + Condition #6 + Condition #7 + Condition #8 + Condition #9</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Disability</strong> = <code>Condition #1 + Condition #10 + Condition #11 + Condition #12 + Condition #13 + Condition #14 + Condition #15 + Condition #2 + Condition #3 + Condition #4 + Condition #5 + Condition #6 + Condition #7 + Condition #8 + Condition #9</code> — the form to use when Condition #1, Condition #10, Condition #11 and Condition #12 are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Disability, Condition #3 and Condition #9 can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Disability is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Condition #1 left as a guess.</strong> Anything typed into Condition #1 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Condition #2 left as a guess.</strong> Anything typed into Condition #2 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Condition #3 left as a guess.</strong> Anything typed into Condition #3 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Condition #1 to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Condition #1</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #3, Condition #9 and Condition #11. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition #2</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #3, Condition #9 and Condition #11. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition #3</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #9, Condition #11 and Condition #15. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #3 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition #4</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #3, Condition #9 and Condition #11. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #4 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition #5</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #3, Condition #9 and Condition #11. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #5 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition #6</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #3, Condition #9 and Condition #11. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #6 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition #7</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #3, Condition #9 and Condition #11. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #7 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition #8</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #3, Condition #9 and Condition #11. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #8 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition #9</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #3, Condition #11 and Condition #15. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #9 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition #10</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #3, Condition #9 and Condition #11. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #10 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition #11</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #3, Condition #9 and Condition #15. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #11 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition #12</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #3, Condition #9 and Condition #11. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #12 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition #13</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #3, Condition #9 and Condition #11. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #13 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition #14</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #3, Condition #9 and Condition #11. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #14 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition #15</strong> takes a plain number with no unit attached. The page reads it when it works out Condition #3, Condition #9 and Condition #11. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition #15 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Marital status</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Marital status is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Children under age 18</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Children under age 18 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>School children aged over 18</strong> takes a plain number with no unit attached. In a qualifying school program. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: School children aged over 18 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Parent</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Parent is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Disability is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Condition #1, Condition #2 and Condition #3 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Condition #1, Condition #2 and Condition #3 is what you already know and Disability is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/sortino-ratio">Sortino ratio Calculator</a>, <a href="/finance/spending-multiplier">Spending multiplier</a> and <a href="/finance/sdlt-uk">Stamp Duty Land Tax (SDLT) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the VA disability calculator work out?', 'a' => <<<'TXT'
            Disability, from Condition #1, Condition #10, Condition #11 and Condition #12. The relationship is Disability = Condition #1 + Condition #10 + Condition #11 + Condition #12 + Condition #13 + Condition #14 + Condition #15 + Condition #2 + Condition #3 + Condition #4 + Condition #5 + Condition #6 + Condition #7 + Condition #8 + Condition #9.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Condition #1, Condition #2, Condition #3, Condition #4, Condition #5. With condition #1, condition #2 and condition #3 in place, Disability can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Disability, Condition #3, Condition #9 and Condition #11 can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Condition #1 = 0.1. Those are the defaults written into the form — move Condition #1 and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Disability is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Condition #1 left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Disability at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/sortino-ratio', 'name' => 'Sortino ratio Calculator'],
            ['path' => '/finance/spending-multiplier', 'name' => 'Spending multiplier'],
            ['path' => '/finance/sdlt-uk', 'name' => 'Stamp Duty Land Tax (SDLT) Calculator'],
        ],
        'authors' => [],
    ],
];
