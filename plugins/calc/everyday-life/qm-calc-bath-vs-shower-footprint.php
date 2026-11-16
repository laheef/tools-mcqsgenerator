<?php

/**
 * Bath vs shower
 * /everyday-life/bath-vs-shower-footprint
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bath vs shower',
    'meta' => ['title' => 'Bath vs shower Calculator — Formula & Results', 'description' => 'Enter compare my water usage on a..., showering style and shower flow rate and Bath vs shower returns shower frequency and total water used for shower.', 'h1' => 'Bath vs shower Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => 'Introduction',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Find out how much water you use while taking a shower  compared to taking a bath , and learn how much water you save or waste when choosing one over the other. Let's see how you can conserve water and help save the Earth in your own little way.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weeklyOrDaily',
                            'label' => 'Compare my water usage on a...',
                            'type' => 'select',
                            'options' => ['weekly basis' => '0', 'daily basis' => '1'],
                            'dataset' => 'Comparison duration option',
                            'defaults' => [
                                ['value' => 'weekly basis', 'when' => null],
                                ['value' => 'weekly basis', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Shower preferences',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'showering_option',
                            'label' => 'Showering style',
                            'type' => 'select',
                            'options' => ['Continuous shower' => '0', 'Staggered shower' => '1'],
                            'dataset' => 'Showering option',
                            'help' => <<<'TXT'
                            Continuous shower: Water is kept on during the entire duration of the shower. Staggered shower: Also known as "submarine shower" or "navy shower", wherein water is turned off or turned down in the middle of shower and back on for rinsing.&nbsp;
                            TXT,
                            'defaults' => [
                                ['value' => 'Continuous shower', 'when' => null],
                                ['value' => 'Continuous shower', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shower_flow_rate',
                            'label' => 'Shower flow rate',
                            'type' => 'number',
                            'help' => 'Flow rate of water coming out of your shower at full power with a default value of 9.5 liters or 2.5 US gallons per minute.',
                            'unit' => '146',
                            'unit_default' => 'L-min',
                            'rounding' => ['omni', '0.01'],
                            'defaults' => [
                                ['value' => '9.5', 'when' => null],
                                ['value' => '2.5', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shower_power',
                            'label' => 'Shower power',
                            'type' => 'select',
                            'options' => ['Full turn' => '1', '3/4 of full turn' => '0.75', 'Half of full turn' => '0.5', 'Quarter turn' => '0.25'],
                            'dataset' => 'Water power',
                            'control' => 'DROPDOWN',
                            'help' => 'How much do you turn your shower knob?',
                            'defaults' => [
                                ['value' => 'Full turn', 'when' => null],
                                ['value' => 'Full turn', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shower_duration',
                            'label' => 'Average shower duration ',
                            'type' => 'number',
                            'help' => 'How long you take a shower.',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shower_frequency',
                            'label' => 'Shower frequency',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shower_frequency_daily',
                            'label' => 'Daily shower frequency',
                            'type' => 'result',
                            'help' => 'How many times do you take a shower in a day?',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '1', 'when' => null],
                                ['value' => '1', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shower_frequency_weekly',
                            'label' => 'Weekly shower frequency',
                            'type' => 'result',
                            'help' => 'How many times do you take a shower in a week?',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '1', 'when' => null],
                                ['value' => '1', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_shower_water',
                            'label' => 'Total water used for shower ',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shower_power_1',
                            'label' => 'Initial shower power',
                            'type' => 'select',
                            'options' => ['Full turn' => '1', '3/4 of full turn' => '0.75', 'Half of full turn' => '0.5', 'Quarter turn' => '0.25'],
                            'dataset' => 'Water power',
                            'control' => 'DROPDOWN',
                            'default' => 'Full turn',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'first_shower_duration',
                            'label' => ' ↳ Initial shower duration ',
                            'type' => 'number',
                            'help' => 'How long you turn the water on to get wet and ready for soaping and lathering.',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shower_power_2',
                            'label' => 'Shower power while lathering',
                            'type' => 'select',
                            'options' => [
                                'Full turn' => '1',
                                '3/4 of full turn' => '0.75',
                                'Half of full turn' => '0.5',
                                'Quarter turn' => '0.25',
                                'Turned off' => '0',
                            ],
                            'dataset' => 'Water power with off',
                            'control' => 'DROPDOWN',
                            'defaults' => [
                                ['value' => 'Turned off', 'when' => null],
                                ['value' => 'Turned off', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'second_shower_duration',
                            'label' => ' ↳ Lathering duration ',
                            'type' => 'number',
                            'help' => 'How long you turn the water on or off while soaping and lathering.',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shower_power_3',
                            'label' => 'Shower power when rinsing',
                            'type' => 'select',
                            'options' => ['Full turn' => '1', '3/4 of full turn' => '0.75', 'Half of full turn' => '0.5', 'Quarter turn' => '0.25'],
                            'dataset' => 'Water power',
                            'control' => 'DROPDOWN',
                            'defaults' => [
                                ['value' => 'Full turn', 'when' => null],
                                ['value' => 'Full turn', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'third_shower_duration',
                            'label' => ' ↳ Rinsing shower duration ',
                            'type' => 'number',
                            'help' => 'How long you turn the water on for rinsing.',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shower_frequency_staggered',
                            'label' => 'Shower frequency (staggered)',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shower_frequency_staggered_daily',
                            'label' => 'Daily shower frequency',
                            'type' => 'result',
                            'help' => 'How many times you take a shower in a day.',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '1', 'when' => null],
                                ['value' => '1', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shower_frequency_staggered_weekly',
                            'label' => 'Weekly shower frequency',
                            'type' => 'result',
                            'help' => 'How many times you take a shower in a week.',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '1', 'when' => null],
                                ['value' => '1', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_shower_water_staggered',
                            'label' => 'Total water used for shower ',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'readonly' => true,
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
                                ['when' => 'showering_option==0 and shower_duration>0 and hasValue(total_shower_water_print)', 'text' => <<<'TXT'
                                Your showering preferences above show that you are using a total of {{total_shower_water_print.formattedValue}}&nbsp;liters ({{total_shower_water_gallons_print.formattedValue}}&nbsp;gallons) for showering {{total_shower_duration_minutes_print.formattedValue}}&nbsp;minutes in a&nbsp;
                                TXT],
                                ['when' => 'showering_option==1 and shower_duration_staggered>0 and water_runtime == shower_duration_staggered and hasValue(total_shower_water_staggered_print)', 'text' => <<<'TXT'
                                Your showering preferences above show that you are using a total of {{total_shower_water_staggered_print.formattedValue}}&nbsp;liters ({{total_shower_water_staggered_gallons_print.formattedValue}}&nbsp;gallons) for showering {{shower_duration_staggered_minutes_print.formattedValue}}&nbsp;minutes in a&nbsp;
                                TXT],
                                ['when' => <<<'TXT'
                                showering_option==1 and shower_duration_staggered>0 and shower_flow_rate>0 and water_runtime != shower_duration_staggered and hasValue(total_shower_water_staggered_print)
                                TXT, 'text' => <<<'TXT'
                                Your showering preferences above show that you are using a total of {{total_shower_water_staggered_print.formattedValue}}&nbsp;liters ({{total_shower_water_staggered_gallons_print.formattedValue}}&nbsp;gallons) for showering {{shower_duration_staggered_minutes_print.formattedValue}}&nbsp;minutes with a total water runtime of {{water_runtime_minutes_print.formattedValue}}&nbsp;minutes in a&nbsp;
                                TXT],
                                ['when' => 'weeklyOrDaily==1', 'text' => 'day.&nbsp;'],
                                ['when' => 'weeklyOrDaily==0', 'text' => 'week.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Bath preferences',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tub_size_options',
                            'label' => 'Bathtub size',
                            'type' => 'select',
                            'options' => [
                                'Small 140-L (37-gal) tub' => '1',
                                'Small 160-L (42-gal) tub' => '2',
                                'Standard 180-L (48-gal) tub' => '3',
                                'Medium-sized 200-L (53-gal) tub' => '4',
                                'Medium-sized 220-L (60-gal) tub' => '5',
                                'Semi-large 260-L (70-gal) tub' => '6',
                                'Large 300-L (80-gal) tub' => '7',
                                'Free-standing 340-L (90-gal) tub' => '8',
                                'Enter a custom tub capacity' => '0',
                            ],
                            'dataset' => 'Tub size',
                            'control' => 'DROPDOWN',
                            'help' => 'Select the last dropdown option to enter a custom bathtub capacity.',
                            'default' => 'Standard 180-L (48-gal) tub',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tub_capacity',
                            'label' => 'Full bathtub capacity',
                            'type' => 'result',
                            'help' => 'Maximum water capacity your bathtub can hold before it reaches overflow level.',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'part_filled',
                            'label' => 'I like to bath in a...',
                            'type' => 'select',
                            'options' => ['fully-filled tub' => '1', '3/4-filled tub' => '0.75', 'half-filled tub' => '0.5', '1/3-filled tub' => '0.3333333333'],
                            'dataset' => 'Part filled',
                            'control' => 'DROPDOWN',
                            'defaults' => [
                                ['value' => 'fully-filled tub', 'when' => null],
                                ['value' => 'fully-filled tub', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dipping_option',
                            'label' => 'I get in the bath...',
                            'type' => 'select',
                            'options' => ['when the water reaches that level' => '0', 'before the water reaches that level' => '1'],
                            'dataset' => 'Dipping option',
                            'control' => 'DROPDOWN',
                            'defaults' => [
                                ['value' => 'when the water reaches that level', 'when' => null],
                                ['value' => 'when the water reaches that level', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'faucet_option',
                            'label' => 'When in the tub,...',
                            'type' => 'select',
                            'options' => ['I keep the faucet on at full power' => '1', 'I keep the faucet on at half power' => '0.5', 'I keep the faucet on at 1/4 power' => '0.25', 'I turn off the faucet' => '0'],
                            'dataset' => 'Faucet option',
                            'control' => 'DROPDOWN',
                            'defaults' => [
                                ['value' => 'I turn off the faucet', 'when' => null],
                                ['value' => 'I turn off the faucet', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'faucet_flow_rate',
                            'label' => 'Faucet flow rate',
                            'type' => 'number',
                            'help' => 'Flow rate of water coming out of your faucet at full power with a default value of 9.5 liters or 2.5 US gallons per minute.',
                            'unit' => '146',
                            'unit_default' => 'L-min',
                            'rounding' => ['omni', '0.01'],
                            'defaults' => [
                                ['value' => '9.5', 'when' => null],
                                ['value' => '2.5', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bath_duration',
                            'label' => 'Average bath duration ',
                            'type' => 'result',
                            'help' => 'Average duration you soak in the bath with the faucet turned on.',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'body_weight',
                            'label' => 'Your weight',
                            'type' => 'number',
                            'help' => 'Will be used to calculate the water your body displaces in the bathtub. ',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bath_frequency',
                            'label' => 'Bath frequency',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bath_frequency_daily',
                            'label' => 'Daily bath frequency',
                            'type' => 'result',
                            'help' => 'How many times do you take a bath in a day?',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '1', 'when' => null],
                                ['value' => '1', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bath_frequency_weekly',
                            'label' => 'Weekly bath frequency',
                            'type' => 'result',
                            'help' => 'How many times do you take a bath in a week?',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '1', 'when' => null],
                                ['value' => '1', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_bath_water',
                            'label' => 'Total water used for bath ',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'readonly' => true,
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
                                ['when' => 'weeklyOrDaily==1 and body_weight>0 and hasValue(total_bath_water_print)', 'text' => <<<'TXT'
                                Based on your bathing preferences above, you are using around {{total_bath_water_print.formattedValue}}&nbsp;liters of water ({{total_bath_water_gallons_print.formattedValue}}&nbsp;gallons) for your bath in a day.
                                TXT],
                                ['when' => 'weeklyOrDaily==0 and body_weight>0 and hasValue(total_bath_water_print)', 'text' => <<<'TXT'
                                Based on your bathing preferences above, you are using around {{total_bath_water_print.formattedValue}}&nbsp;liters of water ({{total_bath_water_gallons_print.formattedValue}}&nbsp;gallons) for your bath in a week.
                                TXT],
                                ['when' => 'dipping_option==0 and overflow>0 and faucet_option==0', 'text' => <<<'TXT'
                                However, by getting in the tub only when it's at your desired level, you let around {{overflow_print.formattedValue}}&nbsp;liters ({{overflow_gallons_print.formattedValue}}&nbsp;gallons) of water to overflow the tub and get wasted.&nbsp;
                                TXT],
                                ['when' => 'weeklyOrDaily==1 and body_weight>0 and faucet_option>0 and bath_duration>0 and overflow>0 and dipping_option==1', 'text' => <<<'TXT'
                                By keeping the faucet on for a total of {{bath_length_minutes_print.formattedValue}}&nbsp;minutes during your bath in a day, you let {{overflow_print.formattedValue}}&nbsp;liters ({{overflow_gallons_print.formattedValue}}&nbsp;gallons) of water to overflow the tub and get wasted.&nbsp;
                                TXT],
                                ['when' => 'weeklyOrDaily==1 and body_weight>0 and faucet_option>0 and bath_duration>0 and overflow>0 and dipping_option==0', 'text' => <<<'TXT'
                                By getting in the tub only when it's at your desired level and by keeping the faucet on for a total of {{bath_length_minutes_print.formattedValue}}&nbsp;minutes during your bath in a day, you let {{overflow_print.formattedValue}}&nbsp;liters ({{overflow_gallons_print.formattedValue}}&nbsp;gallons) of water to overflow the tub and get wasted.&nbsp;
                                TXT],
                                ['when' => 'weeklyOrDaily==0 and body_weight>0 and faucet_option>0 and bath_duration>0 and overflow>0 and dipping_option==1', 'text' => <<<'TXT'
                                By keeping the faucet on for a total of {{bath_length_weekly_minutes_print.formattedValue}}&nbsp;minutes during your bath in a week, you let {{overflow_print.formattedValue}}&nbsp;liters ({{overflow_gallons_print.formattedValue}}&nbsp;gallons) of water to overflow the tub and get wasted.&nbsp;
                                TXT],
                                ['when' => 'weeklyOrDaily==0 and body_weight>0 and faucet_option>0 and bath_duration>0 and overflow>0 and dipping_option==0', 'text' => <<<'TXT'
                                By getting in the tub only when it's at your desired level, and by keeping the faucet on for a total of {{bath_length_weekly_minutes_print.formattedValue}}&nbsp;minutes during your bath in a day, you let {{overflow_print.formattedValue}}&nbsp;liters ({{overflow_gallons_print.formattedValue}}&nbsp;gallons) of water to overflow the tub and get wasted.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => ' You save water when you take&nbsp;'],
                                ['when' => 'total_bath_water > total_shower_water', 'text' => 'showers !'],
                                ['when' => 'total_shower_water > total_bath_water', 'text' => 'baths !'],
                                ['when' => 'weeklyOrDaily==1 and persons >=2', 'text' => <<<'TXT'
                                You can save: {{difference_daily_print.formattedValue}}&nbsp;liters ({{difference_daily_gallons_print.formattedValue}}&nbsp;gallons) per day, {{difference_monthly_print.formattedValue}}&nbsp;liters ({{difference_monthly_gallons_print.formattedValue}}&nbsp;gallons) per month, {{difference_yearly_print.formattedValue}}&nbsp;liters ({{difference_yearly_gallons_print.formattedValue}}&nbsp;gallons) per
                                TXT],
                                ['when' => 'weeklyOrDaily==0 and persons >=2', 'text' => <<<'TXT'
                                You can save: {{difference_daily_print.formattedValue}}&nbsp;liters ({{difference_daily_gallons_print.formattedValue}}&nbsp;gallons) per week, {{difference_per_month_print.formattedValue}}&nbsp;liters ({{difference_per_month_gallons_print.formattedValue}}&nbsp;gallons) per month, {{difference_per_year_print.formattedValue}}&nbsp;liters ({{difference_per_year_gallons_print.formattedValue}}&nbsp;gal
                                TXT],
                                ['when' => 'weeklyOrDaily==1 and persons >=1 and persons <2', 'text' => <<<'TXT'
                                You can save: {{difference_daily_print.formattedValue}}&nbsp;liters ({{difference_daily_gallons_print.formattedValue}}&nbsp;gallons) per day, {{difference_monthly_print.formattedValue}}&nbsp;liters ({{difference_monthly_gallons_print.formattedValue}}&nbsp;gallons) per month, {{difference_yearly_print.formattedValue}}&nbsp;liters ({{difference_yearly_gallons_print.formattedValue}}&nbsp;gallons) per
                                TXT],
                                ['when' => 'weeklyOrDaily==0 and persons >=1 and persons <2', 'text' => <<<'TXT'
                                You can save: {{difference_daily_print.formattedValue}}&nbsp;liters ({{difference_daily_gallons_print.formattedValue}}&nbsp;gallons) per week, {{difference_per_month_print.formattedValue}}&nbsp;liters ({{difference_per_month_gallons_print.formattedValue}}&nbsp;gallons) per month, {{difference_per_year_print.formattedValue}}&nbsp;liters ({{difference_per_year_gallons_print.formattedValue}}&nbsp;gal
                                TXT],
                                ['when' => 'weeklyOrDaily==1 and persons <1', 'text' => <<<'TXT'
                                You can save: {{difference_daily_print.formattedValue}}&nbsp;liters ({{difference_daily_gallons_print.formattedValue}}&nbsp;gallons) per day, {{difference_monthly_print.formattedValue}}&nbsp;liters ({{difference_monthly_gallons_print.formattedValue}}&nbsp;gallons) per month, {{difference_yearly_print.formattedValue}}&nbsp;liters ({{difference_yearly_gallons_print.formattedValue}}&nbsp;gallons) per
                                TXT],
                                ['when' => 'weeklyOrDaily==0 and persons <1', 'text' => <<<'TXT'
                                You can save: {{difference_daily_print.formattedValue}}&nbsp;liters ({{difference_daily_gallons_print.formattedValue}}&nbsp;gallons) per week, {{difference_per_month_print.formattedValue}}&nbsp;liters ({{difference_per_month_gallons_print.formattedValue}}&nbsp;gallons) per month, {{difference_per_year_print.formattedValue}}&nbsp;liters ({{difference_per_year_gallons_print.formattedValue}}&nbsp;gal
                                TXT],
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
                                ['when' => null, 'text' => ' You save water when you take&nbsp;'],
                                ['when' => 'total_bath_water > total_shower_water_staggered', 'text' => 'showers !'],
                                ['when' => 'total_shower_water_staggered > total_bath_water', 'text' => 'baths !'],
                                ['when' => 'weeklyOrDaily==1 and persons_staggered >=2', 'text' => <<<'TXT'
                                You can save: {{difference_staggered_daily_print.formattedValue}}&nbsp;liters ({{difference_staggered_daily_gallons_print.formattedValue}}&nbsp;gallons) per day, {{difference_staggered_monthly_print.formattedValue}}&nbsp;liters ({{difference_staggered_monthly__gallons_print.formattedValue}}&nbsp;gallons) per month, {{difference_staggered_yearly_print.formattedValue}}&nbsp;liters ({{difference_stag
                                TXT],
                                ['when' => 'weeklyOrDaily==0 and persons_staggered >=2', 'text' => <<<'TXT'
                                You can save: {{difference_staggered_daily_print.formattedValue}}&nbsp;liters ({{difference_staggered_daily_gallons_print.formattedValue}}&nbsp;gallons) per week, {{difference_staggered_per_month_print.formattedValue}}&nbsp;liters ({{difference_staggered_per_month_gallons_print.formattedValue}}&nbsp;gallons) per month, {{difference_staggered_per_year_print.formattedValue}}&nbsp;liters ({{differenc
                                TXT],
                                ['when' => 'weeklyOrDaily==1 and persons_staggered >=1 and persons_staggered <2', 'text' => <<<'TXT'
                                You can save: {{difference_staggered_daily_print.formattedValue}}&nbsp;liters ({{difference_staggered_daily_gallons_print.formattedValue}}&nbsp;gallons) per day, {{difference_staggered_monthly_print.formattedValue}}&nbsp;liters ({{difference_staggered_monthly__gallons_print.formattedValue}}&nbsp;gallons) per month, {{difference_staggered_yearly_print.formattedValue}}&nbsp;liters ({{difference_stag
                                TXT],
                                ['when' => 'weeklyOrDaily==0 and persons_staggered >=1 and persons_staggered <2', 'text' => <<<'TXT'
                                You can save: {{difference_staggered_daily_print.formattedValue}}&nbsp;liters ({{difference_staggered_daily_gallons_print.formattedValue}}&nbsp;gallons) per week, {{difference_staggered_per_month_print.formattedValue}}&nbsp;liters ({{difference_staggered_per_month_gallons_print.formattedValue}}&nbsp;gallons) per month, {{difference_staggered_per_year_print.formattedValue}}&nbsp;liters ({{differenc
                                TXT],
                                ['when' => 'weeklyOrDaily==1 and persons_staggered <1', 'text' => <<<'TXT'
                                You can save: {{difference_staggered_daily_print.formattedValue}}&nbsp;liters ({{difference_staggered_daily_gallons_print.formattedValue}}&nbsp;gallons) per day, {{difference_staggered_monthly_print.formattedValue}}&nbsp;liters ({{difference_staggered_monthly__gallons_print.formattedValue}}&nbsp;gallons) per month, {{difference_staggered_yearly_print.formattedValue}}&nbsp;liters ({{difference_stag
                                TXT],
                                ['when' => 'weeklyOrDaily==0 and persons_staggered <1', 'text' => <<<'TXT'
                                You can save: {{difference_staggered_daily_print.formattedValue}}&nbsp;liters ({{difference_staggered_daily_gallons_print.formattedValue}}&nbsp;gallons) per week, {{difference_staggered_per_month_print.formattedValue}}&nbsp;liters ({{difference_staggered_per_month_gallons_print.formattedValue}}&nbsp;gallons) per month, {{difference_staggered_per_year_print.formattedValue}}&nbsp;liters ({{differenc
                                TXT],
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
                                ['when' => 'not(hasValue(difference_daily_print) or hasValue(difference_staggered_daily_print))', 'text' => 'Please complete the information above and expect the results here.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water_price',
                            'label' => 'Water price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0000001'],
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
                                ['when' => <<<'TXT'
                                ((showering_option==0 and total_shower_water > total_bath_water) or (showering_option==1 and total_shower_water_staggered > total_bath_water)) and hasValue(water_price) and water_price>0
                                TXT, 'text' => ' Switching from showers to baths will also save you money!'],
                                ['when' => <<<'TXT'
                                ((showering_option==0 and total_bath_water > total_shower_water) or (showering_option==1 and total_bath_water > total_shower_water_staggered)) and hasValue(water_price) and water_price>0
                                TXT, 'text' => ' Switching from baths to showers will also save you money!'],
                                ['when' => 'showering_option==0 and weeklyOrDaily==1 and hasValue(water_price) and water_price>0', 'text' => '{{savings_cost_print.monetaryValue}} per day, {{savings_cost_monthly_print.monetaryValue}} per month, {{savings_cost_yearly_print.monetaryValue}} a year!&nbsp;'],
                                ['when' => 'showering_option==0 and weeklyOrDaily==0 and hasValue(water_price) and water_price>0', 'text' => <<<'TXT'
                                {{savings_cost_print.monetaryValue}} per week, {{savings_cost_per_month_print.monetaryValue}} per month, {{savings_cost_per_year_print.monetaryValue}} a year!&nbsp;
                                TXT],
                                ['when' => 'showering_option==1 and weeklyOrDaily==1 and hasValue(water_price) and water_price>0', 'text' => <<<'TXT'
                                {{savings_cost_staggered_print.monetaryValue}} per day, {{savings_cost_monthly_staggered_print.monetaryValue}} per month, {{savings_cost_yearly_staggered_print.monetaryValue}} a year!&nbsp;
                                TXT],
                                ['when' => 'showering_option==1 and weeklyOrDaily==0 and hasValue(water_price) and water_price>0', 'text' => <<<'TXT'
                                {{savings_cost_staggered_print.monetaryValue}} per week, {{savings_cost_per_month_staggered_print.monetaryValue}} per month, {{savings_cost_per_year_staggered_print.monetaryValue}} a year!&nbsp;
                                TXT],
                                ['when' => '(hasValue(difference_daily_print) or hasValue(difference_staggered_daily_print)) and not(hasValue(water_price))', 'text' => 'Check how much you can save on water by entering in the field above the price of water in your area.'],
                            ],
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
                            'name' => 'persons',
                            'label' => 'Persons',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'persons_staggered',
                            'label' => 'Persons staggered',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_shower_duration',
                            'label' => 'Total duration the shower is turned on',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shower_duration_staggered',
                            'label' => 'Shower duration',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water_runtime',
                            'label' => 'Water runtime',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_to_fill_tub',
                            'label' => 'Time to fill tub',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_to_fill_tub_at_full_power',
                            'label' => 'Time to fill tub at full power',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'readonly' => true,
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'faucet_power',
                            'label' => 'Faucet power',
                            'type' => 'select',
                            'options' => ['Full turn' => '1', '3/4 of full turn' => '0.75', 'Half of full turn' => '0.5', 'Quarter turn' => '0.25'],
                            'dataset' => 'Water power',
                            'control' => 'DROPDOWN',
                            'defaults' => [
                                ['value' => 'Full turn', 'when' => null],
                                ['value' => 'Full turn', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'human_density',
                            'label' => 'Human density',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '1', 'when' => null],
                                ['value' => '62.43', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water_displaced',
                            'label' => 'Water displaced',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_bath_duration',
                            'label' => 'Total duration the faucet is turned on',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bath_water',
                            'label' => 'Bath water',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_water_displaced',
                            'label' => 'Total water displaced',
                            'type' => 'number',
                            'unit' => '146',
                            'unit_default' => 'L-day',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bath_water_runoff',
                            'label' => 'Water added after getting in the tub',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_water_level',
                            'label' => 'Final water level',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'overflow',
                            'label' => 'Overflow',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water_yearly',
                            'label' => 'Water yearly',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '1905', 'when' => null],
                                ['value' => '1905', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_shower_water_print',
                            'label' => 'Total shower water print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_shower_water_gallons_print',
                            'label' => 'Total shower water gallons print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'usgal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_shower_duration_minutes_print',
                            'label' => 'Total shower duration minutes print',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_shower_water_staggered_print',
                            'label' => 'Total shower water staggered print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_shower_water_staggered_gallons_print',
                            'label' => 'Total shower water staggered gallons print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'usgal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shower_duration_staggered_minutes_print',
                            'label' => 'Shower duration staggered minutes print',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water_runtime_minutes_print',
                            'label' => 'Water runtime minutes print',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_bath_water_print',
                            'label' => 'Total bath water print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_bath_water_gallons_print',
                            'label' => 'Total bath water gallons print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'usgal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'overflow_print',
                            'label' => 'Overflow print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'overflow_gallons_print',
                            'label' => 'Overflow gallons print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'usgal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bath_length_minutes_print',
                            'label' => 'Bath length minutes print',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bath_length_weekly_minutes_print',
                            'label' => 'Bath length weekly minutes print',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_daily_print',
                            'label' => 'Difference daily print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_daily_gallons_print',
                            'label' => 'Difference daily gallons print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'usgal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_monthly_print',
                            'label' => 'Difference monthly print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_monthly_gallons_print',
                            'label' => 'Difference monthly gallons print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'usgal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_yearly_print',
                            'label' => 'Difference yearly print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_yearly_gallons_print',
                            'label' => 'Difference yearly gallons print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'usgal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people_yearly_print',
                            'label' => 'People yearly print',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_per_month_print',
                            'label' => 'Difference per month print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_per_month_gallons_print',
                            'label' => 'Difference per month gallons print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'usgal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_per_year_print',
                            'label' => 'Difference per year print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_per_year_gallons_print',
                            'label' => 'Difference per year gallons print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'usgal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people_per_year_print',
                            'label' => 'People per year print',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_staggered_daily_print',
                            'label' => 'Difference staggered daily print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_staggered_daily_gallons_print',
                            'label' => 'Difference staggered daily gallons print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'usgal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_staggered_monthly_print',
                            'label' => 'Difference staggered monthly print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_staggered_monthly__gallons_print',
                            'label' => 'Difference staggered monthly gallons print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'usgal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_staggered_yearly_print',
                            'label' => 'Difference staggered yearly print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_staggered_yearly_gallons_print',
                            'label' => 'Difference staggered yearly gallons print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'usgal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people_staggered_yearly_print',
                            'label' => 'People staggered yearly print',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_staggered_per_month_print',
                            'label' => 'Difference staggered per month print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_staggered_per_month_gallons_print',
                            'label' => 'Difference staggered per month gallons print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'usgal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_staggered_per_year_print',
                            'label' => 'Difference staggered per year print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_staggered_per_year_gallons_print',
                            'label' => 'Difference staggered per year gallons print',
                            'type' => 'presentation',
                            'unit' => '20',
                            'unit_default' => 'usgal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people_staggered_per_year_print',
                            'label' => 'People staggered per year print',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'savings_cost_print',
                            'label' => 'Savings cost print',
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
                            'name' => 'savings_cost_monthly_print',
                            'label' => 'Savings cost monthly print',
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
                            'name' => 'savings_cost_yearly_print',
                            'label' => 'Savings cost yearly print',
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
                            'name' => 'savings_cost_per_month_print',
                            'label' => 'Savings cost per month print',
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
                            'name' => 'savings_cost_per_year_print',
                            'label' => 'Savings cost per year print',
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
                            'name' => 'savings_cost_staggered_print',
                            'label' => 'Savings cost staggered print',
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
                            'name' => 'savings_cost_monthly_staggered_print',
                            'label' => 'Savings cost monthly staggered print',
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
                            'name' => 'savings_cost_yearly_staggered_print',
                            'label' => 'Savings cost yearly staggered print',
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
                            'name' => 'savings_cost_per_month_staggered_print',
                            'label' => 'Savings cost per month staggered print',
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
                            'name' => 'savings_cost_per_year_staggered_print',
                            'label' => 'Savings cost per year staggered print',
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
            'title' => 'shower_frequency = shower_frequency_daily*weeklyOrDaily + shower_frequency_weekly*(1-weeklyOrDaily)',
            'results' => ['shower_frequency_weekly' => '(-shower_frequency + shower_frequency_daily*weeklyOrDaily)/(weeklyOrDaily - 1)', 'shower_frequency' => 'shower_frequency_daily*weeklyOrDaily - shower_frequency_weekly*weeklyOrDaily + shower_frequency_weekly', 'shower_frequency_daily' => '(shower_frequency + shower_frequency_weekly*weeklyOrDaily - shower_frequency_weekly)/weeklyOrDaily', 'weeklyOrDaily' => '(shower_frequency - shower_frequency_weekly)/(shower_frequency_daily - shower_frequency_weekly)'],
        ],
        [
            'title' => 'shower_frequency_staggered = shower_frequency_staggered_daily*weeklyOrDaily + shower_frequency_staggered_weekly*(1-weeklyOrDaily)',
            'results' => ['shower_frequency_staggered_weekly' => '(-shower_frequency_staggered + shower_frequency_staggered_daily*weeklyOrDaily)/(weeklyOrDaily - 1)', 'shower_frequency_staggered' => 'shower_frequency_staggered_daily*weeklyOrDaily - shower_frequency_staggered_weekly*weeklyOrDaily + shower_frequency_staggered_weekly', 'shower_frequency_staggered_daily' => '(shower_frequency_staggered + shower_frequency_staggered_weekly*weeklyOrDaily - shower_frequency_staggered_weekly)/weeklyOrDaily', 'weeklyOrDaily' => '(shower_frequency_staggered - shower_frequency_staggered_weekly)/(shower_frequency_staggered_daily - shower_frequency_staggered_weekly)'],
        ],
        [
            'title' => 'total_shower_water = shower_duration * shower_power* shower_flow_rate * shower_frequency',
            'results' => [
                'shower_power' => 'total_shower_water/(shower_duration*shower_flow_rate*shower_frequency)',
                'shower_flow_rate' => 'total_shower_water/(shower_duration*shower_frequency*shower_power)',
                'shower_frequency' => 'total_shower_water/(shower_duration*shower_flow_rate*shower_power)',
                'total_shower_water' => 'shower_duration*shower_flow_rate*shower_frequency*shower_power',
                'shower_duration' => 'total_shower_water/(shower_flow_rate*shower_frequency*shower_power)',
            ],
        ],
        [
            'title' => 'total_shower_duration = shower_duration * shower_frequency',
            'results' => ['total_shower_duration' => 'shower_duration*shower_frequency', 'shower_frequency' => 'total_shower_duration/shower_duration', 'shower_duration' => 'total_shower_duration/shower_frequency'],
        ],
        [
            'title' => <<<'TXT'
            total_shower_water_staggered = (first_shower_duration*shower_power_1 + second_shower_duration*shower_power_2 + third_shower_duration*shower_power_3)* shower_flow_rate * shower_frequency_staggered
            TXT,
            'results' => [
                'shower_power_3' => <<<'TXT'
                (-shower_flow_rate*shower_frequency_staggered*(first_shower_duration*shower_power_1 + second_shower_duration*shower_power_2) + total_shower_water_staggered)/(shower_flow_rate*shower_frequency_staggered*third_shower_duration)
                TXT,
                'first_shower_duration' => <<<'TXT'
                (-shower_flow_rate*shower_frequency_staggered*(second_shower_duration*shower_power_2 + shower_power_3*third_shower_duration) + total_shower_water_staggered)/(shower_flow_rate*shower_frequency_staggered*shower_power_1)
                TXT,
                'shower_flow_rate' => <<<'TXT'
                total_shower_water_staggered/(shower_frequency_staggered*(first_shower_duration*shower_power_1 + second_shower_duration*shower_power_2 + shower_power_3*third_shower_duration))
                TXT,
                'shower_frequency_staggered' => <<<'TXT'
                total_shower_water_staggered/(shower_flow_rate*(first_shower_duration*shower_power_1 + second_shower_duration*shower_power_2 + shower_power_3*third_shower_duration))
                TXT,
                'shower_power_1' => <<<'TXT'
                (-shower_flow_rate*shower_frequency_staggered*(second_shower_duration*shower_power_2 + shower_power_3*third_shower_duration) + total_shower_water_staggered)/(first_shower_duration*shower_flow_rate*shower_frequency_staggered)
                TXT,
                'shower_power_2' => <<<'TXT'
                (-shower_flow_rate*shower_frequency_staggered*(first_shower_duration*shower_power_1 + shower_power_3*third_shower_duration) + total_shower_water_staggered)/(second_shower_duration*shower_flow_rate*shower_frequency_staggered)
                TXT,
                'total_shower_water_staggered' => <<<'TXT'
                shower_flow_rate*shower_frequency_staggered*(first_shower_duration*shower_power_1 + second_shower_duration*shower_power_2 + shower_power_3*third_shower_duration)
                TXT,
                'third_shower_duration' => <<<'TXT'
                (-shower_flow_rate*shower_frequency_staggered*(first_shower_duration*shower_power_1 + second_shower_duration*shower_power_2) + total_shower_water_staggered)/(shower_flow_rate*shower_frequency_staggered*shower_power_3)
                TXT,
                'second_shower_duration' => <<<'TXT'
                (-shower_flow_rate*shower_frequency_staggered*(first_shower_duration*shower_power_1 + shower_power_3*third_shower_duration) + total_shower_water_staggered)/(shower_flow_rate*shower_frequency_staggered*shower_power_2)
                TXT,
            ],
        ],
        [
            'title' => 'shower_duration_staggered = (first_shower_duration + second_shower_duration + third_shower_duration) * shower_frequency_staggered',
            'results' => [
                'shower_duration_staggered' => 'shower_frequency_staggered*(first_shower_duration + second_shower_duration + third_shower_duration)',
                'first_shower_duration' => '-second_shower_duration + shower_duration_staggered/shower_frequency_staggered - third_shower_duration',
                'shower_frequency_staggered' => 'shower_duration_staggered/(first_shower_duration + second_shower_duration + third_shower_duration)',
                'third_shower_duration' => '-first_shower_duration - second_shower_duration + shower_duration_staggered/shower_frequency_staggered',
                'second_shower_duration' => '-first_shower_duration + shower_duration_staggered/shower_frequency_staggered - third_shower_duration',
            ],
        ],
        [
            'title' => <<<'TXT'
            water_runtime = ((first_shower_duration*ceil(shower_power_1) + second_shower_duration*ceil(shower_power_2) + third_shower_duration*ceil(shower_power_3)))*shower_frequency_staggered
            TXT,
            'results' => [
                'water_runtime' => <<<'TXT'
                shower_frequency_staggered*(first_shower_duration*ceil(shower_power_1) + second_shower_duration*ceil(shower_power_2) + third_shower_duration*ceil(shower_power_3))
                TXT,
                'first_shower_duration' => <<<'TXT'
                (-shower_frequency_staggered*(second_shower_duration*ceil(shower_power_2) + third_shower_duration*ceil(shower_power_3)) + water_runtime)/(shower_frequency_staggered*ceil(shower_power_1))
                TXT,
                'shower_frequency_staggered' => 'water_runtime/(first_shower_duration*ceil(shower_power_1) + second_shower_duration*ceil(shower_power_2) + third_shower_duration*ceil(shower_power_3))',
                'third_shower_duration' => <<<'TXT'
                (-shower_frequency_staggered*(first_shower_duration*ceil(shower_power_1) + second_shower_duration*ceil(shower_power_2)) + water_runtime)/(shower_frequency_staggered*ceil(shower_power_3))
                TXT,
                'second_shower_duration' => <<<'TXT'
                (-shower_frequency_staggered*(first_shower_duration*ceil(shower_power_1) + third_shower_duration*ceil(shower_power_3)) + water_runtime)/(shower_frequency_staggered*ceil(shower_power_2))
                TXT,
            ],
        ],
        [
            'title' => 'bath_frequency = bath_frequency_daily*weeklyOrDaily + bath_frequency_weekly*(1-weeklyOrDaily)',
            'results' => ['bath_frequency_weekly' => '(-bath_frequency + bath_frequency_daily*weeklyOrDaily)/(weeklyOrDaily - 1)', 'bath_frequency' => 'bath_frequency_daily*weeklyOrDaily - bath_frequency_weekly*weeklyOrDaily + bath_frequency_weekly', 'bath_frequency_daily' => '(bath_frequency + bath_frequency_weekly*weeklyOrDaily - bath_frequency_weekly)/weeklyOrDaily', 'weeklyOrDaily' => '(bath_frequency - bath_frequency_weekly)/(bath_frequency_daily - bath_frequency_weekly)'],
        ],
        [
            'title' => 'bath_water = (tub_capacity*part_filled - (dipping_option*water_displaced)) * bath_frequency',
            'results' => [
                'dipping_option' => '(bath_frequency*part_filled*tub_capacity - bath_water)/(bath_frequency*water_displaced)',
                'bath_water' => 'bath_frequency*(-dipping_option*water_displaced + part_filled*tub_capacity)',
                'tub_capacity' => '(bath_frequency*dipping_option*water_displaced + bath_water)/(bath_frequency*part_filled)',
                'bath_frequency' => '-bath_water/(dipping_option*water_displaced - part_filled*tub_capacity)',
                'part_filled' => '(bath_frequency*dipping_option*water_displaced + bath_water)/(bath_frequency*tub_capacity)',
                'water_displaced' => '(bath_frequency*part_filled*tub_capacity - bath_water)/(bath_frequency*dipping_option)',
            ],
        ],
        [
            'title' => 'water_displaced = body_weight / human_density',
            'results' => ['body_weight' => 'human_density*water_displaced', 'human_density' => 'body_weight/water_displaced', 'water_displaced' => 'body_weight/human_density'],
        ],
        [
            'title' => 'total_water_displaced = ((1-dipping_option)*water_displaced)*bath_frequency',
            'results' => ['bath_frequency' => '-total_water_displaced/(water_displaced*(dipping_option - 1))', 'dipping_option' => '1 - total_water_displaced/(bath_frequency*water_displaced)', 'total_water_displaced' => 'bath_frequency*water_displaced*(1 - dipping_option)', 'water_displaced' => '-total_water_displaced/(bath_frequency*(dipping_option - 1))'],
        ],
        [
            'title' => 'bath_water_runoff = (faucet_option*faucet_flow_rate*bath_duration)*bath_frequency',
            'results' => [
                'faucet_flow_rate' => 'bath_water_runoff/(bath_duration*bath_frequency*faucet_option)',
                'bath_duration' => 'bath_water_runoff/(bath_frequency*faucet_flow_rate*faucet_option)',
                'bath_water_runoff' => 'bath_duration*bath_frequency*faucet_flow_rate*faucet_option',
                'faucet_option' => 'bath_water_runoff/(bath_duration*bath_frequency*faucet_flow_rate)',
                'bath_frequency' => 'bath_water_runoff/(bath_duration*faucet_flow_rate*faucet_option)',
            ],
        ],
        [
            'title' => 'total_bath_water = bath_water + bath_water_runoff',
            'results' => ['bath_water' => '-bath_water_runoff + total_bath_water', 'total_bath_water' => 'bath_water + bath_water_runoff', 'bath_water_runoff' => '-bath_water + total_bath_water'],
        ],
        [
            'title' => 'time_to_fill_tub = (tub_capacity*part_filled - water_displaced * dipping_option) / (faucet_flow_rate * faucet_power)',
            'results' => [
                'faucet_flow_rate' => '(-dipping_option*water_displaced + part_filled*tub_capacity)/(faucet_power*time_to_fill_tub)',
                'dipping_option' => '(-faucet_flow_rate*faucet_power*time_to_fill_tub + part_filled*tub_capacity)/water_displaced',
                'tub_capacity' => '(dipping_option*water_displaced + faucet_flow_rate*faucet_power*time_to_fill_tub)/part_filled',
                'time_to_fill_tub' => '(-dipping_option*water_displaced + part_filled*tub_capacity)/(faucet_flow_rate*faucet_power)',
                'part_filled' => '(dipping_option*water_displaced + faucet_flow_rate*faucet_power*time_to_fill_tub)/tub_capacity',
                'faucet_power' => '(-dipping_option*water_displaced + part_filled*tub_capacity)/(faucet_flow_rate*time_to_fill_tub)',
                'water_displaced' => '(-faucet_flow_rate*faucet_power*time_to_fill_tub + part_filled*tub_capacity)/dipping_option',
            ],
        ],
        [
            'title' => 'total_bath_duration = (bath_duration * ceil(faucet_option) + time_to_fill_tub)*bath_frequency',
            'results' => ['total_bath_duration' => 'bath_frequency*(bath_duration*ceil(faucet_option) + time_to_fill_tub)', 'bath_duration' => '(-bath_frequency*time_to_fill_tub + total_bath_duration)/(bath_frequency*ceil(faucet_option))', 'bath_frequency' => 'total_bath_duration/(bath_duration*ceil(faucet_option) + time_to_fill_tub)', 'time_to_fill_tub' => '-bath_duration*ceil(faucet_option) + total_bath_duration/bath_frequency'],
        ],
        [
            'title' => 'time_to_fill_tub_at_full_power = tub_capacity / faucet_flow_rate',
            'results' => ['faucet_flow_rate' => 'tub_capacity/time_to_fill_tub_at_full_power', 'time_to_fill_tub_at_full_power' => 'tub_capacity/faucet_flow_rate', 'tub_capacity' => 'faucet_flow_rate*time_to_fill_tub_at_full_power'],
        ],
        [
            'title' => 'final_water_level = total_bath_water + total_water_displaced',
            'results' => ['final_water_level' => 'total_bath_water + total_water_displaced', 'total_bath_water' => 'final_water_level - total_water_displaced', 'total_water_displaced' => 'final_water_level - total_bath_water'],
        ],
        [
            'title' => 'overflow = final_water_level - tub_capacity*bath_frequency',
            'results' => ['bath_frequency' => '(final_water_level - overflow)/tub_capacity', 'overflow' => '-bath_frequency*tub_capacity + final_water_level', 'final_water_level' => 'bath_frequency*tub_capacity + overflow', 'tub_capacity' => '(final_water_level - overflow)/bath_frequency'],
        ],
        [
            'title' => 'persons = abs(total_bath_water-total_shower_water)*(365*weeklyOrDaily + 52*(1-weeklyOrDaily))/water_yearly',
            'results' => ['water_yearly' => '(313*weeklyOrDaily + 52)*abs(total_bath_water - total_shower_water)/persons', 'persons' => '(313*weeklyOrDaily + 52)*abs(total_bath_water - total_shower_water)/water_yearly', 'weeklyOrDaily' => '(1/313)*persons*water_yearly/abs(total_bath_water - total_shower_water) - 52/313'],
        ],
        [
            'title' => 'persons_staggered = abs(total_bath_water-total_shower_water_staggered)*(365*weeklyOrDaily + 52*(1-weeklyOrDaily))/water_yearly',
            'results' => ['water_yearly' => '(313*weeklyOrDaily + 52)*abs(total_bath_water - total_shower_water_staggered)/persons_staggered', 'persons_staggered' => '(313*weeklyOrDaily + 52)*abs(total_bath_water - total_shower_water_staggered)/water_yearly', 'weeklyOrDaily' => '(1/313)*persons_staggered*water_yearly/abs(total_bath_water - total_shower_water_staggered) - 52/313'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Bath vs shower calculator works out <strong>weekly shower frequency (Shower preferences)</strong> from the shower flow rate, the average shower duration, the shower frequency and the total water used for shower.

        Editing anything puts the results away until the next press of Calculate — change one value at a time and the updated answer tells you what that value was worth.
        TXT,
        'sections' => [
            ['title' => 'How does the Bath vs shower calculator work?', 'html' => <<<'TXT'
            <p>The Bath vs shower calculator takes the values in the form, applies the relationship described below and reports <strong>weekly shower frequency (Shower preferences)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the showering style, the initial shower power and the shower power while lathering); then you type in the shower flow rate, the average shower duration, the shower frequency and the total water used for shower (Shower preferences).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li><strong>Compare my water usage on a</strong>: pick the option that matches your case — 2 options, such as weekly basis and daily basis. </li><li><strong>Showering style</strong>: pick the option that matches your case — 2 options, such as continuous shower and staggered shower. </li><li><strong>Shower flow rate</strong>: a measured quantity, entered by default in liters per minute. The unit chip switches it to any of the 39 supported units.</li><li><strong>Average shower duration</strong>: a measured quantity, entered by default in minutes. The unit chip switches it to any of the 27 supported units.</li><li><strong>Shower frequency</strong>: a measured quantity, entered by default in days. The unit chip switches it to any of the 27 supported units.</li><li><strong>Total water used for shower (Shower preferences)</strong>: a measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li><strong>Initial shower power</strong>: pick the option that matches your case — 4 options, such as full turn, 3/4 of full turn and half of full turn. </li><li><strong>↳ Initial shower duration</strong>: a measured quantity, entered by default in minutes. The unit chip switches it to any of the 27 supported units.</li><li><strong>Shower power while lathering</strong>: pick the option that matches your case — 5 options, such as full turn, 3/4 of full turn and half of full turn. </li><li><strong>↳ Lathering duration</strong>: a measured quantity, entered by default in minutes. The unit chip switches it to any of the 27 supported units.</li><li><strong>↳ Rinsing shower duration</strong>: a measured quantity, entered by default in minutes. The unit chip switches it to any of the 27 supported units.</li><li><strong>Shower frequency (staggered)</strong>: a measured quantity, entered by default in days. The unit chip switches it to any of the 27 supported units.</li><li><strong>Total water used for shower (Shower preferences)</strong>: a measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li><strong>Bathtub size</strong>: pick the option that matches your case — 9 options, such as small 140-L (37-gal) tub, small 160-L (42-gal) tub and standard 180-L (48-gal) tub. </li><li><strong>I like to bath in a</strong>: pick the option that matches your case — 4 options, such as fully-filled tub, 3/4-filled tub and half-filled tub. </li><li><strong>When in the tub,</strong>: pick the option that matches your case — 4 options, such as I keep the faucet on at full power, I keep the faucet on at half power and I keep the faucet on at 1/4 power. </li><li><strong>Total water used for bath</strong>: a measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li><strong>Water price</strong>: a measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li><strong>Persons</strong>: a plain number with no unit attached.</li><li><strong>Time to fill tub</strong>: a measured quantity, entered by default in minutes. The unit chip switches it to any of the 27 supported units.</li><li><strong>Faucet power</strong>: pick the option that matches your case — 4 options, such as full turn, 3/4 of full turn and half of full turn. </li><li><strong>Human density</strong>: a measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li><strong>Water displaced</strong>: a measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li><strong>Total water displaced</strong>: a measured quantity, entered by default in liters per day. The unit chip switches it to any of the 39 supported units.</li></ul><p>The form has 25 fields in total. The ones not listed here work the same way: a label, a unit chip where the quantity has units, and a box that updates the results as soon as it holds a valid number.</p><p>11 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Showering style</strong></td><td>One of 2 options, such as continuous shower and staggered shower.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Shower flow rate</strong></td><td>A measured quantity, 39 units available.</td><td>liters per minute</td><td>You supply it</td></tr><tr><td><strong>Shower power</strong></td><td>One of 4 options, such as full turn, 3/4 of full turn and half of full turn.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Average shower duration</strong></td><td>A measured quantity, 27 units available.</td><td>minutes</td><td>You supply it</td></tr><tr><td><strong>Shower frequency</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>You supply it</td></tr><tr><td><strong>Daily shower frequency (Shower preferences)</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Weekly shower frequency (Shower preferences)</strong></td><td>A measured quantity, 27 units available.</td><td>weeks</td><td>Calculated</td></tr><tr><td><strong>Total water used for shower (Shower preferences)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>You supply it</td></tr><tr><td><strong>Initial shower power</strong></td><td>One of 4 options, such as full turn, 3/4 of full turn and half of full turn.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>↳ Initial shower duration</strong></td><td>A measured quantity, 27 units available.</td><td>minutes</td><td>You supply it</td></tr><tr><td><strong>Shower power while lathering</strong></td><td>One of 5 options, such as full turn, 3/4 of full turn and half of full turn.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>↳ Lathering duration</strong></td><td>A measured quantity, 27 units available.</td><td>minutes</td><td>You supply it</td></tr><tr><td><strong>Shower power when rinsing</strong></td><td>One of 4 options, such as full turn, 3/4 of full turn and half of full turn.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>↳ Rinsing shower duration</strong></td><td>A measured quantity, 27 units available.</td><td>minutes</td><td>You supply it</td></tr><tr><td><strong>Shower frequency (staggered)</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>You supply it</td></tr><tr><td><strong>Daily shower frequency (Shower preferences)</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Weekly shower frequency (Shower preferences)</strong></td><td>A measured quantity, 27 units available.</td><td>weeks</td><td>Calculated</td></tr><tr><td><strong>Total water used for shower (Shower preferences)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>You supply it</td></tr><tr><td><strong>Bathtub size</strong></td><td>One of 9 options, such as small 140-L (37-gal) tub, small 160-L (42-gal) tub and standard 180-L (48-gal) tub.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Full bathtub capacity</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>Calculated</td></tr><tr><td><strong>Faucet flow rate</strong></td><td>A measured quantity, 39 units available.</td><td>liters per minute</td><td>Calculated</td></tr><tr><td><strong>Average bath duration</strong></td><td>A measured quantity, 27 units available.</td><td>minutes</td><td>Calculated</td></tr><tr><td><strong>Your weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Bath frequency</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr></tbody></table><p>The table lists the first 24 of 43 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Bath vs shower calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Weekly shower frequency</span><span class="formula-eq">=</span><span class="formula-rhs">(-shower frequency + daily shower frequency × compare my water usage on a...) ÷ (compare my water usage on a... − 1)</span></div><div class="formula-row"><span class="formula-lhs">Weekly shower frequency</span><span class="formula-eq">=</span><span class="formula-rhs">(-shower frequency (staggered) + daily shower frequency × compare my water usage on a...) ÷ (compare my water usage on a... − 1)</span></div><div class="formula-row"><span class="formula-lhs">Shower power</span><span class="formula-eq">=</span><span class="formula-rhs">total water used for shower ÷ (average shower duration × shower flow rate × shower frequency)</span></div><div class="formula-row"><span class="formula-lhs">Total duration the shower is turned on</span><span class="formula-eq">=</span><span class="formula-rhs">average shower duration × shower frequency</span></div><div class="formula-row"><span class="formula-lhs">Shower power when rinsing</span><span class="formula-eq">=</span><span class="formula-rhs">(-shower flow rate × shower frequency (staggered) × (↳ Initial shower duration × initial shower power + ↳ Lathering duration × shower power while lathering) + total water used for shower) ÷ (shower flow rate × shower frequency (staggered) × ↳ Rinsing shower duration)</span></div><div class="formula-row"><span class="formula-lhs">Shower duration</span><span class="formula-eq">=</span><span class="formula-rhs">shower frequency (staggered) × (↳ Initial shower duration + ↳ Lathering duration + ↳ Rinsing shower duration)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><strong>Weekly shower frequency (Shower preferences)</strong>: shown in weeks, and convertible to any of the 27 units on that chip.</li><li><strong>Weekly shower frequency (Shower preferences)</strong>: shown in weeks, and convertible to any of the 27 units on that chip.</li><li><strong>Shower power</strong>: the option the calculation settles on.</li><li><strong>Total duration the shower is turned on</strong>: shown in minutes, and convertible to any of the 27 units on that chip.</li><li><strong>Shower power when rinsing</strong>: the option the calculation settles on.</li><li><strong>Average shower duration</strong>: shown in minutes, and convertible to any of the 27 units on that chip.</li><li><strong>Water runtime</strong>: shown in minutes, and convertible to any of the 27 units on that chip.</li><li><strong>Weekly bath frequency</strong>: shown in weeks, and convertible to any of the 27 units on that chip.</li><li><strong>I get in the bath</strong>: the option the calculation settles on.</li><li><strong>Your weight</strong>: shown in kilograms, and convertible to any of the 29 units on that chip.</li><li><strong>Bath frequency</strong>: shown in days, and convertible to any of the 27 units on that chip.</li><li><strong>Faucet flow rate</strong>: shown in liters per minute, and convertible to any of the 39 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li><strong>Shower flow rate</strong>: Flow rate, opening in liters per minute</li><li><strong>Average shower duration</strong>: Time, opening in minutes</li><li><strong>Shower frequency</strong>: Time, opening in days</li><li><strong>Daily shower frequency (Shower preferences)</strong>: Time, opening in days</li><li><strong>Weekly shower frequency (Shower preferences)</strong>: Time, opening in weeks</li><li><strong>Total water used for shower (Shower preferences)</strong>: Volume, opening in liters</li><li><strong>↳ Initial shower duration</strong>: Time, opening in minutes</li><li><strong>↳ Lathering duration</strong>: Time, opening in minutes</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Bath vs shower calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 4 figures keep coming back — the shower flow rate, the average shower duration and the shower frequency — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/price-per-weight">Price per weight</a>, <a href="/everyday-life/pulse-per-mile">Pulse per mile</a> and <a href="/everyday-life/quarantine-books">Quarantine books</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bath vs shower calculator work out?', 'a' => 'It returns weekly shower frequency (Shower preferences), derived from the shower flow rate, the average shower duration and the shower frequency.'],
            ['q' => 'What do I need to enter to use the Bath vs shower calculator?', 'a' => 'The form asks for the shower flow rate, the average shower duration, the shower frequency and the total water used for shower, which is 25 fields in total.'],
            ['q' => 'Can I enter shower flow rate in a different unit?', 'a' => 'Yes. Shower flow rate opens in liters per minute and the chip beside it offers 39 units.'],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => 'There are several choices to make (11 in total), and each one selects a different case rather than scaling the result.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Shower frequency = 168 days.'],
        ],
        'related' => [
            ['path' => '/everyday-life/price-per-weight', 'name' => 'Price per weight'],
            ['path' => '/everyday-life/pulse-per-mile', 'name' => 'Pulse per mile'],
            ['path' => '/everyday-life/quarantine-books', 'name' => 'Quarantine books'],
        ],
    ],
];
