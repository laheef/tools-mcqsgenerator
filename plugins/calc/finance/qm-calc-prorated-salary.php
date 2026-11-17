<?php

/**
 * Prorated salary
 * /finance/prorated-salary
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Prorated salary',
    'meta' => ['title' => 'Prorated salary — Formula, Steps & Examples', 'description' => 'Prorated salary works out num Wking Days 0 and Num Wking Days 1 and reports both. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Prorated salary Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => 'Work schedule and salary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year',
                            'label' => 'Year',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2025',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthOfTheYear',
                            'label' => 'Month of the year',
                            'type' => 'select',
                            'options' => [
                                'January' => '1',
                                'February' => '2',
                                'March' => '3',
                                'April' => '4',
                                'May' => '5',
                                'June' => '6',
                                'July' => '7',
                                'August' => '8',
                                'September' => '9',
                                'October' => '10',
                                'November' => '11',
                                'December' => '12',
                            ],
                            'dataset' => 'monthOfTheYear',
                            'control' => 'DROPDOWN',
                            'default' => 'January',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'grossMonthlySalary',
                            'label' => 'Gross salary',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '2000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberOfDaysWorked',
                            'label' => 'Number of days worked',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberOfHolidays',
                            'label' => 'Number of holidays',
                            'type' => 'number',
                            'help' => 'Number of national holidays within the period worked.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberOfApprovedLeave',
                            'label' => 'Number of approved leave',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daysWorkedPerWeek',
                            'label' => 'Days worked per week',
                            'type' => 'select',
                            'options' => [
                                'Seven' => '7',
                                'Six' => '6',
                                'Five' => '5',
                                'Four' => '4',
                                'Three' => '3',
                                'Two' => '2',
                                'One' => '1',
                            ],
                            'dataset' => 'daysWorkederWeek',
                            'control' => 'DROPDOWN',
                            'default' => 'Five',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Choose your days off per week',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'offDays1',
                            'label' => 'First day off',
                            'type' => 'select',
                            'options' => [
                                'Sunday' => '0',
                                'Monday' => '1',
                                'Tuesday' => '2',
                                'Wednesday' => '3',
                                'Thursday' => '4',
                                'Friday' => '5',
                                'Saturday' => '6',
                            ],
                            'dataset' => 'offDays',
                            'control' => 'DROPDOWN',
                            'default' => 'Sunday',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'offDays2',
                            'label' => 'Second day off',
                            'type' => 'select',
                            'options' => [
                                'Sunday' => '0',
                                'Monday' => '1',
                                'Tuesday' => '2',
                                'Wednesday' => '3',
                                'Thursday' => '4',
                                'Friday' => '5',
                                'Saturday' => '6',
                            ],
                            'dataset' => 'offDays',
                            'control' => 'DROPDOWN',
                            'default' => 'Saturday',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'offDays3',
                            'label' => 'Third day off',
                            'type' => 'select',
                            'options' => [
                                'Sunday' => '0',
                                'Monday' => '1',
                                'Tuesday' => '2',
                                'Wednesday' => '3',
                                'Thursday' => '4',
                                'Friday' => '5',
                                'Saturday' => '6',
                            ],
                            'dataset' => 'offDays',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'offDays4',
                            'label' => 'Fourth day off',
                            'type' => 'select',
                            'options' => [
                                'Sunday' => '0',
                                'Monday' => '1',
                                'Tuesday' => '2',
                                'Wednesday' => '3',
                                'Thursday' => '4',
                                'Friday' => '5',
                                'Saturday' => '6',
                            ],
                            'dataset' => 'offDays',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'offDays5',
                            'label' => 'Fifth day off',
                            'type' => 'select',
                            'options' => [
                                'Sunday' => '0',
                                'Monday' => '1',
                                'Tuesday' => '2',
                                'Wednesday' => '3',
                                'Thursday' => '4',
                                'Friday' => '5',
                                'Saturday' => '6',
                            ],
                            'dataset' => 'offDays',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'offDays6',
                            'label' => 'Sixth day off',
                            'type' => 'select',
                            'options' => [
                                'Sunday' => '0',
                                'Monday' => '1',
                                'Tuesday' => '2',
                                'Wednesday' => '3',
                                'Thursday' => '4',
                                'Friday' => '5',
                                'Saturday' => '6',
                            ],
                            'dataset' => 'offDays',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You cannot enter the same day twice. Please choose a different day. {{duplicate_off_days_2.value}}'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Prorated salary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'numWkingDays_0 >= toBePaidFor_0 and daysWorkedPerWeek == 7', 'text' => 'You have {{numWkingDays_1.formattedValue}} working days in the month. Your prorated salary is: {{proratedSalary_1.monetaryValue}}'],
                                ['when' => 'numWkingDays_1 >= toBePaidFor_1 and daysWorkedPerWeek == 6', 'text' => 'You have {{numWkingDays_1.formattedValue}} working days in the month. Your prorated salary is: {{proratedSalary_1.monetaryValue}}'],
                                ['when' => 'numWkingDays_2 >= toBePaidFor_2 and daysWorkedPerWeek == 5 and duplicate_off_days_2 == 0', 'text' => 'You have {{numWkingDays_2.formattedValue}} working days in the month. Your prorated salary is: {{proratedSalary_2.monetaryValue}}'],
                                ['when' => 'numWkingDays_3 >= toBePaidFor_3 and daysWorkedPerWeek == 4 and duplicate_off_days_3 == 0', 'text' => 'You have {{numWkingDays_3.formattedValue}} working days in the month. Your prorated salary is: {{proratedSalary_3.monetaryValue}}'],
                                ['when' => 'numWkingDays_4 >= toBePaidFor_4 and daysWorkedPerWeek == 3  and duplicate_off_days_4 == 0', 'text' => 'You have {{numWkingDays_4.formattedValue}} working days in the month. Your prorated salary is: {{proratedSalary_4.monetaryValue}}'],
                                ['when' => 'numWkingDays_5 >= toBePaidFor_5 and daysWorkedPerWeek == 2 and duplicate_off_days_5 == 0', 'text' => 'You have {{numWkingDays_5.formattedValue}} working days in the month. Your prorated salary is: {{proratedSalary_5.monetaryValue}}'],
                                ['when' => 'numWkingDays_6 >= toBePaidFor_6 and daysWorkedPerWeek == 1  and duplicate_off_days_6 == 0', 'text' => 'You have {{numWkingDays_6.formattedValue}} working days in the month. Your prorated salary is: {{proratedSalary_6.monetaryValue}}'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'numWkingDays_0 < toBePaidFor_0 and daysWorkedPerWeek == 7', 'text' => 'Are you sure? You have only {{numWkingDays_0.formattedValue}} working days in this month. You are claiming for more days than the total number of working days.'],
                                ['when' => 'numWkingDays_1 < toBePaidFor_1 and daysWorkedPerWeek == 6', 'text' => 'Are you sure? You have only {{numWkingDays_1.formattedValue}} working days in this month. You are claiming for more days than the total number of working days.'],
                                ['when' => 'numWkingDays_2 < toBePaidFor_2 and daysWorkedPerWeek == 5', 'text' => 'Are you sure? You have only {{numWkingDays_2.formattedValue}} working days in this month. You are claiming for more days than the total number of working days.'],
                                ['when' => 'numWkingDays_3 < toBePaidFor_3 and daysWorkedPerWeek == 4', 'text' => 'Are you sure? You have only {{numWkingDays_3.formattedValue}} working days in this month. You are claiming for more days than the total number of working days.'],
                                ['when' => 'numWkingDays_4 < toBePaidFor_4 and daysWorkedPerWeek == 3', 'text' => 'Are you sure? You have only {{numWkingDays_4.formattedValue}} working days in this month. You are claiming for more days than the total number of working days.'],
                                ['when' => 'numWkingDays_5 < toBePaidFor_5 and daysWorkedPerWeek == 2', 'text' => 'Are you sure? You have only {{numWkingDays_5.formattedValue}} working days in this month. You are claiming for more days than the total number of working days.'],
                                ['when' => 'numWkingDays_6 < toBePaidFor_6 and daysWorkedPerWeek == 1', 'text' => 'Are you sure? You have only {{numWkingDays_6.formattedValue}} working days in this month. You are claiming for more days than the total number of working days.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numWkingDays_0',
                            'label' => 'Num wking days 0',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numWkingDays_1',
                            'label' => 'Num wking days 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numWkingDays_2',
                            'label' => 'Num wking days off2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numWkingDays_3',
                            'label' => 'Num wking days 3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numWkingDays_4',
                            'label' => 'Num wking days 4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numWkingDays_5',
                            'label' => 'Num wking days 5',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numWkingDays_6',
                            'label' => 'Num wking days 6',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'toBePaidFor_0',
                            'label' => 'To be paid for 0',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'toBePaidFor_1',
                            'label' => 'To be paid for 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'toBePaidFor_2',
                            'label' => 'To be paid for 2off',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'toBePaidFor_3',
                            'label' => 'To be paid for 3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'toBePaidFor_4',
                            'label' => 'To be paid for 4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'toBePaidFor_5',
                            'label' => 'To be paid for 5',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'toBePaidFor_6',
                            'label' => 'To be paid for 6',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'proratedSalary_0',
                            'label' => 'Prorated salary 0',
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
                            'name' => 'proratedSalary_1',
                            'label' => 'Prorated salary 1',
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
                            'name' => 'proratedSalary_2',
                            'label' => 'Prorated salary 2',
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
                            'name' => 'proratedSalary_3',
                            'label' => 'Prorated salary 3',
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
                            'name' => 'proratedSalary_4',
                            'label' => 'Prorated salary 4',
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
                            'name' => 'proratedSalary_5',
                            'label' => 'Prorated salary 5',
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
                            'name' => 'proratedSalary_6',
                            'label' => 'Prorated salary 6',
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
                            'name' => 'duplicate_off_days_2',
                            'label' => 'Duplicate off days 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'duplicate_off_days_3',
                            'label' => 'Duplicate off days 3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'duplicate_off_days_4',
                            'label' => 'Duplicate off days 4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'duplicate_off_days_5',
                            'label' => 'Duplicate off days 5',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'duplicate_off_days_6',
                            'label' => 'Duplicate off days 6',
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
            'title' => <<<'TXT'
            numWkingDays_0 = get_working_days_off(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, 10, 11, 12, 13, 14, 15)
            TXT,
            'results' => ['numWkingDays_0' => <<<'TXT'
            get_working_days_off(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, 10, 11, 12, 13, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            numWkingDays_1 = get_working_days_off(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, 11, 12, 13, 14, 15)
            TXT,
            'results' => ['numWkingDays_1' => <<<'TXT'
            get_working_days_off(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, 11, 12, 13, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            numWkingDays_2 = get_working_days_off(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, 12, 13, 14, 15)
            TXT,
            'results' => ['numWkingDays_2' => <<<'TXT'
            get_working_days_off(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, 12, 13, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            numWkingDays_3 = get_working_days_off(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, 13, 14, 15)
            TXT,
            'results' => ['numWkingDays_3' => <<<'TXT'
            get_working_days_off(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, 13, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            numWkingDays_4 = get_working_days_off(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, 14, 15)
            TXT,
            'results' => ['numWkingDays_4' => <<<'TXT'
            get_working_days_off(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            numWkingDays_5 = get_working_days_off(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, offDays5, 15)
            TXT,
            'results' => ['numWkingDays_5' => <<<'TXT'
            get_working_days_off(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, offDays5, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            numWkingDays_6 = get_working_days_off(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, offDays5, offDays6)
            TXT,
            'results' => ['numWkingDays_6' => <<<'TXT'
            get_working_days_off(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, offDays5, offDays6)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            toBePaidFor_0 = get_to_be_paid(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, 10, 11, 12, 13, 14, 15)
            TXT,
            'results' => ['toBePaidFor_0' => 'get_to_be_paid(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, 10, 11, 12, 13, 14, 15)'],
        ],
        [
            'title' => <<<'TXT'
            toBePaidFor_1 = get_to_be_paid(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, 11, 12, 13, 14, 15)
            TXT,
            'results' => ['toBePaidFor_1' => <<<'TXT'
            get_to_be_paid(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, 11, 12, 13, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            toBePaidFor_2 = get_to_be_paid(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, 12, 13, 14, 15)
            TXT,
            'results' => ['toBePaidFor_2' => <<<'TXT'
            get_to_be_paid(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, 12, 13, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            toBePaidFor_3 = get_to_be_paid(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, 13, 14, 15)
            TXT,
            'results' => ['toBePaidFor_3' => <<<'TXT'
            get_to_be_paid(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, 13, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            toBePaidFor_4 = get_to_be_paid(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, 14, 15)
            TXT,
            'results' => ['toBePaidFor_4' => <<<'TXT'
            get_to_be_paid(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            toBePaidFor_5 = get_to_be_paid(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, offDays5, 15)
            TXT,
            'results' => ['toBePaidFor_5' => <<<'TXT'
            get_to_be_paid(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, offDays5, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            toBePaidFor_6 = get_to_be_paid(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, offDays5, offDays6)
            TXT,
            'results' => ['toBePaidFor_6' => <<<'TXT'
            get_to_be_paid(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, offDays5, offDays6)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            proratedSalary_0 = get_prorated_salary(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, 10, 1, 12, 13, 14, 15)
            TXT,
            'results' => ['proratedSalary_0' => <<<'TXT'
            get_prorated_salary(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, 10, 1, 12, 13, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            proratedSalary_1 = get_prorated_salary(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, 11, 12, 13, 14, 15)
            TXT,
            'results' => ['proratedSalary_1' => <<<'TXT'
            get_prorated_salary(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, 11, 12, 13, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            proratedSalary_2 = get_prorated_salary(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, 12, 13, 14, 15)
            TXT,
            'results' => ['proratedSalary_2' => <<<'TXT'
            get_prorated_salary(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, 12, 13, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            proratedSalary_3 = get_prorated_salary(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1,offDays2, offDays3, 13, 14, 15)
            TXT,
            'results' => ['proratedSalary_3' => <<<'TXT'
            get_prorated_salary(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, 13, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            proratedSalary_4 = get_prorated_salary(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1,offDays2, offDays3, offDays4, 14, 15)
            TXT,
            'results' => ['proratedSalary_4' => <<<'TXT'
            get_prorated_salary(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            proratedSalary_5 = get_prorated_salary(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1,offDays2, offDays3, offDays4, offDays5, 15)
            TXT,
            'results' => ['proratedSalary_5' => <<<'TXT'
            get_prorated_salary(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, offDays5, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            proratedSalary_6 = get_prorated_salary(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1,offDays2, offDays3, offDays4, offDays5, offDays6)
            TXT,
            'results' => ['proratedSalary_6' => <<<'TXT'
            get_prorated_salary(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, offDays5, offDays6)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            duplicate_off_days_2 = get_duplicate_off_days(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, 12, 13, 14, 15)
            TXT,
            'results' => ['duplicate_off_days_2' => <<<'TXT'
            get_duplicate_off_days(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, 12, 13, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            duplicate_off_days_3 = get_duplicate_off_days(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, 13, 14, 15)
            TXT,
            'results' => ['duplicate_off_days_3' => <<<'TXT'
            get_duplicate_off_days(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, 13, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            duplicate_off_days_4 = get_duplicate_off_days(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, 14, 15)
            TXT,
            'results' => ['duplicate_off_days_4' => <<<'TXT'
            get_duplicate_off_days(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, 14, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            duplicate_off_days_5 = get_duplicate_off_days(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, offDays5, 15)
            TXT,
            'results' => ['duplicate_off_days_5' => <<<'TXT'
            get_duplicate_off_days(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, offDays5, 15)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            duplicate_off_days_6 = get_duplicate_off_days(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, offDays5, offDays6)
            TXT,
            'results' => ['duplicate_off_days_6' => <<<'TXT'
            get_duplicate_off_days(year, monthOfTheYear, grossMonthlySalary, numberOfDaysWorked, numberOfHolidays, numberOfApprovedLeave, daysWorkedPerWeek, offDays1, offDays2, offDays3, offDays4, offDays5, offDays6)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_working_days_off",function(year,monthOfTheYear,grossMonthlySalary,numberOfDaysWorked,numberOfHolidays,numberOfApprovedLeave,daysWorkedPerWeek,offDays1,offDays2,offDays3,offDays4,offDays5,offDays6){var working_days=calculate_prorated_salary(year,monthOfTheYear,grossMonthlySalary,numberOfDaysWorked,numberOfHolidays,numberOfApprovedLeave,daysWorkedPerWeek,offDays1,offDays2,offDays3,offDays4,offDays5,offDays6)[0];return working_days});omni.define("get_to_be_paid",function(year,monthOfTheYear,grossMonthlySalary,numberOfDaysWorked,numberOfHolidays,numberOfApprovedLeave,daysWorkedPerWeek,offDays1,offDays2,offDays3,offDays4,offDays5,offDays6){var to_be_paid=calculate_prorated_salary(year,monthOfTheYear,grossMonthlySalary,numberOfDaysWorked,numberOfHolidays,numberOfApprovedLeave,daysWorkedPerWeek,offDays1,offDays2,offDays3,offDays4,offDays5,offDays6)[1];return to_be_paid});omni.define("get_prorated_salary",function(year,monthOfTheYear,grossMonthlySalary,numberOfDaysWorked,numberOfHolidays,numberOfApprovedLeave,daysWorkedPerWeek,offDays1,offDays2,offDays3,offDays4,offDays5,offDays6){var prorated_salary=calculate_prorated_salary(year,monthOfTheYear,grossMonthlySalary,numberOfDaysWorked,numberOfHolidays,numberOfApprovedLeave,daysWorkedPerWeek,offDays1,offDays2,offDays3,offDays4,offDays5,offDays6)[2];return prorated_salary});omni.define("get_duplicate_off_days",function(year,monthOfTheYear,grossMonthlySalary,numberOfDaysWorked,numberOfHolidays,numberOfApprovedLeave,daysWorkedPerWeek,offDays1,offDays2,offDays3,offDays4,offDays5,offDays6){var duplicate_off_days=calculate_prorated_salary(year,monthOfTheYear,grossMonthlySalary,numberOfDaysWorked,numberOfHolidays,numberOfApprovedLeave,daysWorkedPerWeek,offDays1,offDays2,offDays3,offDays4,offDays5,offDays6)[3];return duplicate_off_days});function calculate_prorated_salary(year,monthOfTheYear,grossMonthlySalary,numberOfDaysWorked,numberOfHolidays,numberOfApprovedLeave,daysWorkedPerWeek,offDays1,offDays2,offDays3,offDays4,offDays5,offDays6){var month=monthOfTheYear;var numOfDays=0;numOfDays=new Date(year,month,0).getDate();var weekenddays=0;var numWkingDays=0;var proratedSalary=0;var duplicate_off_days=0;var offDays_array=[offDays1,offDays2,offDays3,offDays4,offDays5,offDays6].filter(function(d){return d!==undefined});for(var i=0;i<offDays_array.length;i++){for(var j=i+1;j<offDays_array.length;j++){if(offDays_array[i]===offDays_array[j]){duplicate_off_days=1}}}if(daysWorkedPerWeek===7){numWkingDays=numOfDays}else{for(var _i=1;_i<=numOfDays;_i++){var checkDay=new Date(year,month-1,_i).getDay();if(offDays_array.includes(checkDay)){weekenddays++}}numWkingDays=numOfDays-weekenddays}var toBePaidFor=numberOfDaysWorked+numberOfHolidays+numberOfApprovedLeave;if(numWkingDays>=toBePaidFor){proratedSalary=grossMonthlySalary/numWkingDays*toBePaidFor}return[numWkingDays,toBePaidFor,proratedSalary,duplicate_off_days]}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Year, Month of the year and Gross salary into Prorated salary and the answer comes back as Num wking days 0 and Num wking days 1. There is no hidden constant here: change num wking days 0 and year moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Prorated salary calculator works', 'html' => <<<'TXT'
            <p>Prorated salary answers one question from 7 numbers, and the answer is Num wking days 0, Num wking days 1 and Num wking days off2.</p><p>The relationship it solves reads Num wking days 0 = get_working_days_off(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, 10, 11, 12, 13, 14, 15).</p><p>The answers are Num wking days 0, Num wking days 1, Num wking days off2 and Num wking days 3; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs.</p><ul><li><strong>Year</strong> — a plain number, no unit</li><li><strong>Month of the year</strong> — a plain number, no unit</li><li><strong>Gross salary</strong> — in USD</li><li><strong>Number of days worked</strong> — a plain number, no unit</li><li><strong>Number of holidays</strong> — a plain number, no unit. Number of national holidays within the period worked.</li><li><strong>Number of approved leave</strong> — a plain number, no unit</li><li><strong>Days worked per week</strong> — a plain number, no unit</li></ul><p>What you get back is Num wking days 0, Num wking days 1, Num wking days off2, Num wking days 3, Num wking days 4, Num wking days 5, Num wking days 6, To be paid for 0, To be paid for 1, To be paid for 2off, To be paid for 3, To be paid for 4, To be paid for 5, To be paid for 6, Prorated salary 0, Prorated salary 1, Prorated salary 2, Prorated salary 3, Prorated salary 4, Prorated salary 5, Prorated salary 6, Duplicate off days 2, Duplicate off days 3, Duplicate off days 4, Duplicate off days 5, Duplicate off days 6, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Num wking days 0 is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Num wking days 0</strong> = <code>get_working_days_off(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, 10, 11, 12, 13, 14, 15)</code></li><li><strong>Num wking days 1</strong> = <code>get_working_days_off(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, First day off, 11, 12, 13, 14, 15)</code></li><li><strong>Num wking days off2</strong> = <code>get_working_days_off(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, First day off, Second day off, 12, 13, 14, 15)</code></li><li><strong>Num wking days 3</strong> = <code>get_working_days_off(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, First day off, Second day off, Third day off, 13, 14, 15)</code></li><li><strong>Num wking days 4</strong> = <code>get_working_days_off(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, First day off, Second day off, Third day off, Fourth day off, 14, 15)</code></li><li><strong>Num wking days 5</strong> = <code>get_working_days_off(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, First day off, Second day off, Third day off, Fourth day off, Fifth day off, 15)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Num wking days 0</strong> = <code>get_working_days_off(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, 10, 11, 12, 13, 14, 15)</code> — the form to use when Year, Month of the year, Gross salary and Number of days worked are the values you have.</li><li><strong>Num wking days 1</strong> = <code>get_working_days_off(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, First day off, 11, 12, 13, 14, 15)</code> — the form to use when Year, Month of the year, Gross salary and Number of days worked are the values you have.</li><li><strong>Num wking days off2</strong> = <code>get_working_days_off(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, First day off, Second day off, 12, 13, 14, 15)</code> — the form to use when Year, Month of the year, Gross salary and Number of days worked are the values you have.</li><li><strong>Num wking days 3</strong> = <code>get_working_days_off(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, First day off, Second day off, Third day off, 13, 14, 15)</code> — the form to use when Year, Month of the year, Gross salary and Number of days worked are the values you have.</li><li><strong>Num wking days 4</strong> = <code>get_working_days_off(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, First day off, Second day off, Third day off, Fourth day off, 14, 15)</code> — the form to use when Year, Month of the year, Gross salary and Number of days worked are the values you have.</li><li><strong>Num wking days 5</strong> = <code>get_working_days_off(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, First day off, Second day off, Third day off, Fourth day off, Fifth day off, 15)</code> — the form to use when Year, Month of the year, Gross salary and Number of days worked are the values you have.</li><li><strong>To be paid for 0</strong> = <code>get_to_be_paid(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, 10, 11, 12, 13, 14, 15)</code> — the form to use when Year, Month of the year, Gross salary and Number of days worked are the values you have.</li></ul><p>Any one of Num wking days 0, Num wking days 1 and Num wking days off2 can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Num wking days 0, Num wking days 1 and Num wking days off2 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Year left as a guess.</strong> Anything typed into Year is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Month of the year left as a guess.</strong> Anything typed into Month of the year is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Gross salary left as a guess.</strong> Anything typed into Gross salary is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Year to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Year</strong> takes a plain number with no unit attached. The page reads it when it works out Num wking days 0, Num wking days 1 and Num wking days off2. Have it to hand before you start: Year is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Month of the year</strong> takes a plain number with no unit attached. The page reads it when it works out Num wking days 0, Num wking days 1 and Num wking days off2. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Month of the year is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Gross salary</strong> takes a plain number with no unit attached. The page reads it when it works out Num wking days 0, Num wking days 1 and Num wking days off2. Have it to hand before you start: Gross salary is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of days worked</strong> takes a plain number with no unit attached. The page reads it when it works out Num wking days 0, Num wking days 1 and Num wking days off2. Have it to hand before you start: Number of days worked is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of holidays</strong> takes a plain number with no unit attached. Number of national holidays within the period worked. The page reads it when it works out Num wking days 0, Num wking days 1 and Num wking days off2. Have it to hand before you start: Number of holidays is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of approved leave</strong> takes a plain number with no unit attached. The page reads it when it works out Num wking days 0, Num wking days 1 and Num wking days off2. Have it to hand before you start: Number of approved leave is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Days worked per week</strong> takes a plain number with no unit attached. The page reads it when it works out Num wking days 0, Num wking days 1 and Num wking days off2. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Days worked per week is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Num wking days 0 is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Year, Month of the year and Gross salary are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Year, Month of the year and Gross salary and the number you are missing is Num wking days 0 and Num wking days 1.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/salary-inflation">Salary inflation Calculator</a>, <a href="/finance/salary-to-hourly">Salary to hourly</a> and <a href="/finance/salary-with-overtime">Salary with overtime</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Prorated salary calculator work out?', 'a' => <<<'TXT'
            Num wking days 0, Num wking days 1, Num wking days off2 and Num wking days 3, from Year, Month of the year, Gross salary and Number of days worked. The relationship is Num wking days 0 = get_working_days_off(Year, Month of the year, Gross salary, Number of days worked, Number of holidays, Number of approved leave, Days worked per week, 10, 11, 12, 13, 14, 15).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Year, Month of the year, Gross salary (USD), Number of days worked, Number of holidays. Enter year, month of the year and gross salary; Num wking days 0 is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Num wking days 0, Num wking days 1, Num wking days off2 and Num wking days 3 blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Num wking days 0 is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Year left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Num wking days 0 keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/salary-inflation', 'name' => 'Salary inflation Calculator'],
            ['path' => '/finance/salary-to-hourly', 'name' => 'Salary to hourly'],
            ['path' => '/finance/salary-with-overtime', 'name' => 'Salary with overtime'],
        ],
        'authors' => [],
    ],
];
