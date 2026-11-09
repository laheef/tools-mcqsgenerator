<?php

/**
 * Livestock fence cost
 * /biology/livestock-fence
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Livestock fence cost',
    'meta' => ['title' => 'Livestock fence cost Calculator: Steps & Units', 'description' => 'Livestock fence cost works out 8" Wood posts total cost from fence type and length. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Livestock fence cost Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => 'Fence details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fenceType',
                            'label' => 'Fence type',
                            'type' => 'select',
                            'options' => [
                                'Woven wire' => '1',
                                'Barbed wire' => '2',
                                'High-tensile non-electric' => '3',
                                'High-tensile electrified' => '4',
                                'Electrified polywire' => '5',
                                'Custom' => '0',
                            ],
                            'control' => 'DROPDOWN',
                            'help' => 'What type of fence are you interested in constructing?',
                            'default' => 'Woven wire',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'fenceLength',
                            'label' => ' Length',
                            'type' => 'number',
                            'help' => 'Also equivalent to the perimeter of the lot you want to fence.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '30', 'when' => null],
                                ['value' => '100', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                        [
                            'name' => 'fenceHeight',
                            'label' => ' Height',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '1.2', 'when' => null],
                                ['value' => '4', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fencepostSpacing',
                            'label' => ' Desired spacing of posts',
                            'type' => 'number',
                            'help' => 'Distance between two adjacent posts.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '2.5', 'when' => null],
                                ['value' => '8', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'material',
                            'label' => 'Desired fence post material',
                            'type' => 'select',
                            'options' => ['Wood' => '1', 'Steel' => '2'],
                            'dataset' => 'Fence post material',
                            'default' => 'Wood',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => ' Post requirements',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'woodpostRequired8in',
                            'label' => '8" Wood end posts needed',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'woodpostUnitPrice8in',
                            'label' => ' 8" Wood post unit price',
                            'type' => 'result',
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
                            'name' => 'woodpostTotalCost8in',
                            'label' => '8" Wood posts total cost',
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
                            'name' => 'fencePostsNeeded',
                            'label' => 'Fence posts needed',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fencepostUnitPrice',
                            'label' => ' Fence post unit price',
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
                            'name' => 'fencepostTotalCost',
                            'label' => 'Fence posts total cost',
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
                            'name' => 'fiberglasspostsRequired',
                            'label' => 'Fiberglass posts needed',
                            'type' => 'number',
                            'help' => 'Number of fiberglass posts needed.',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fiberglasspostsUnitPrice',
                            'label' => ' Fiberglass post unit price',
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
                            'name' => 'fiberglasspostsTotalCost',
                            'label' => 'Fiberglass posts total cost',
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
            'title' => ' Wire requirements',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wovenwireRollLength',
                            'label' => ' Woven wire length per roll',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '10', 'when' => null],
                                ['value' => '30', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wovenwireRequiredRolls',
                            'label' => 'Woven wire rolls needed',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wovenwireUnitPrice',
                            'label' => ' Woven wire price per roll',
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
                            'name' => 'wovenwireTotalCost',
                            'label' => 'Woven wires total cost',
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
                            'name' => 'additionalBarbedWires',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Install additional barbed wires' => '1', '' => '0'],
                            'dataset' => 'Additional barbed wires',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'barbedWireSpacingOptions',
                            'label' => 'Average barbed wire vertical spacing',
                            'type' => 'select',
                            'options' => [
                                '4" (≈ 10 cm)' => '1',
                                '6" (≈ 15 cm)' => '2',
                                '8" (≈ 20 cm)' => '3',
                                '10" (≈ 25 cm)' => '4',
                                '12" (≈ 30 cm)' => '5',
                                '14" (≈ 35 cm)' => '6',
                                '16" (≈ 40 cm)' => '7',
                                'Enter a custom average wire spacing' => '0',
                            ],
                            'dataset' => 'Wire spacing options',
                            'control' => 'DROPDOWN',
                            'default' => '8" (≈ 20 cm)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'averageBarbedWireSpacing',
                            'label' => ' Average barbed wire spacing',
                            'type' => 'result',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'barbedwireRuns',
                            'label' => 'Barbed wire horizontal runs',
                            'type' => 'number',
                            'help' => 'Number of barbed wires to run through the fence length.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberOfAdditionalBarbedWireRuns',
                            'label' => 'Number of additional barbed wire runs',
                            'type' => 'select',
                            'options' => ['1' => '1', '2' => '2', '3' => '3'],
                            'dataset' => 'Additional barbed wire runs',
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'barbedwireRollLength',
                            'label' => ' Barbed wire length per roll',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '10', 'when' => null],
                                ['value' => '30', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'barbedwireRequiredRolls',
                            'label' => 'Barbed wire rolls needed',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'additionalBarbedWireRolls',
                            'label' => 'Barbed wire rolls needed',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'barbedwireUnitPrice',
                            'label' => ' Barbed wire price per roll',
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
                            'name' => 'barbedwireTotalCost',
                            'label' => 'Barbed wires total cost',
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
                            'name' => 'additional',
                            'label' => ' Barbed wire price per roll',
                            'type' => 'result',
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
                            'name' => 'additionalBarbedwireTotalCost',
                            'label' => 'Additional barbed wire total cost',
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
                            'name' => 'htWireSpacingOptions',
                            'label' => 'High-tensile wire spacing options',
                            'type' => 'select',
                            'options' => [
                                '4" (≈ 10 cm)' => '1',
                                '6" (≈ 15 cm)' => '2',
                                '8" (≈ 20 cm)' => '3',
                                '10" (≈ 25 cm)' => '4',
                                '12" (≈ 30 cm)' => '5',
                                '14" (≈ 35 cm)' => '6',
                                '16" (≈ 40 cm)' => '7',
                                'Enter a custom average wire spacing' => '0',
                            ],
                            'dataset' => 'Wire spacing options',
                            'control' => 'DROPDOWN',
                            'default' => '6" (≈ 15 cm)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'htWireSpacing',
                            'label' => ' Average high-tensile wire spacing',
                            'type' => 'result',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'htWireRuns',
                            'label' => 'High-tensile wire runs needed',
                            'type' => 'number',
                            'help' => 'Number of high-tensile wire runs needed.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'htWireRequiredLength',
                            'label' => 'High-tensile wire total length needed',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'htWireUnitPrice',
                            'label' => 'High-tensile wire unit price',
                            'type' => 'number',
                            'help' => 'Cost of high-tensile wires.',
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
                            'name' => 'htWireTotalCost',
                            'label' => 'Hight-tensile wire total cost',
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
                            'name' => 'polywireSpacingOptions',
                            'label' => 'Polywire spacing options',
                            'type' => 'select',
                            'options' => [
                                '4" (≈ 10 cm)' => '1',
                                '6" (≈ 15 cm)' => '2',
                                '8" (≈ 20 cm)' => '3',
                                '10" (≈ 25 cm)' => '4',
                                '12" (≈ 30 cm)' => '5',
                                '14" (≈ 35 cm)' => '6',
                                '16" (≈ 40 cm)' => '7',
                                'Enter a custom average wire spacing' => '0',
                            ],
                            'dataset' => 'Wire spacing options',
                            'control' => 'DROPDOWN',
                            'default' => '12" (≈ 30 cm)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'polywireSpacing',
                            'label' => ' Average polywire spacing',
                            'type' => 'result',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'polywireRuns',
                            'label' => 'Polywire runs needed',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'polywireRequiredLength',
                            'label' => 'Polywire length needed',
                            'type' => 'number',
                            'help' => 'Length of Polywire needed.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'polywireUnitPrice',
                            'label' => ' Polywire unit price',
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
                            'name' => 'polywireTotalCost',
                            'label' => 'Polywire total cost',
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
            'title' => ' Mounting hardware requirements',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'clipsOrStaplesSpacingOptions',
                            'label' => 'Clips or staples spacing options',
                            'type' => 'select',
                            'options' => [
                                '4" (≈ 10 cm)' => '1',
                                '6" (≈ 15 cm)' => '2',
                                '8" (≈ 20 cm)' => '3',
                                '10" (≈ 25 cm)' => '4',
                                '12" (≈ 30 cm)' => '5',
                                '14" (≈ 35 cm)' => '6',
                                '16" (≈ 40 cm)' => '7',
                                'Enter a custom average wire spacing' => '0',
                            ],
                            'dataset' => 'Wire spacing options',
                            'control' => 'DROPDOWN',
                            'default' => '4" (≈ 10 cm)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stapleSpacing',
                            'label' => 'Clips or staples vertical spacing',
                            'type' => 'result',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'clipsOrStaples',
                            'label' => 'Clips or staples needed',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'clipsOrStaplesUnitPrice',
                            'label' => 'Clips or staples unit price',
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
                            'name' => 'clipsOrStaplesTotalCost',
                            'label' => 'Clips or staples total cost',
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
                            'name' => 'springsRequired',
                            'label' => 'Springs needed',
                            'type' => 'number',
                            'help' => 'Number of springs needed.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'springsUnitPrice',
                            'label' => ' Spring unit price',
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
                            'name' => 'springsTotalCost',
                            'label' => 'Springs total cost',
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
                            'name' => 'strainersRequired',
                            'label' => 'Strainers needed',
                            'type' => 'number',
                            'help' => 'Number of wire strainers needed.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'strainerUnitPrice',
                            'label' => ' Strainer unit price',
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
                            'name' => 'strainersTotalCost',
                            'label' => 'Strainers total cost',
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
                            'name' => 'clipsForFiberglassPosts',
                            'label' => 'Clips for fiberglass posts',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'clipsForFiberglassPostsUnitPrice',
                            'label' => ' Clips for fiberglass posts unit price',
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
                            'name' => 'clipsForFiberglassPostsTotalCost',
                            'label' => 'Clips for fiberglass posts total cost',
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
                            'name' => 'useStaysOptions',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Use fence stays' => '1', '' => '0'],
                            'dataset' => 'Stays options',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'staysSpacing',
                            'label' => 'Horizontal stays spacing',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '45', 'when' => null],
                                ['value' => '18', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'staysRequired',
                            'label' => ' Fence stays needed',
                            'type' => 'number',
                            'help' => 'Number of fence stays needed.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'staysUnitPrice',
                            'label' => ' Fence stay unit price',
                            'type' => 'result',
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
                            'name' => 'staysTotalCost',
                            'label' => 'Stays total cost',
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
                            'name' => 'useHingeJointOptions',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Use hinge joint wires' => '1', '' => '0'],
                            'dataset' => 'Hinged joint options',
                            'control' => 'CHECKBOX',
                            'help' => 'Are you using hinge joint wires?',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hingeJointRollLength',
                            'label' => ' Hinge joint wire length per roll',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '10', 'when' => null],
                                ['value' => '30', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hingeJointRequired',
                            'label' => 'Hinge joint needed',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hingeJointUnitPrice',
                            'label' => ' Hinge joint wire price per roll',
                            'type' => 'result',
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
                            'name' => 'hingejointTotalCost',
                            'label' => 'Hinge joint total cost',
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
            'title' => ' Electrical requirements',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberOfElectrifiedWires',
                            'label' => ' Number of electrified wires needed',
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
                            'name' => 'energizerRequired',
                            'label' => 'Energizer capacity needed',
                            'type' => 'number',
                            'help' => 'Recommended capacity of energizer needed for the fence length.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'energizerUnitPrice',
                            'label' => ' Energizer unit price',
                            'type' => 'number',
                            'help' => 'Total cost of Energizer required',
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
                            'name' => 'energizerTotalCost',
                            'label' => 'Energizer total cost',
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
                            'name' => 'rodsRequiredOptions',
                            'label' => 'Grounding or lightning rods needed',
                            'type' => 'select',
                            'options' => ['1' => '1', '2' => '2', '3' => '3', 'Enter a custom number of grounding rods' => '0'],
                            'dataset' => 'Grounding quantity options',
                            'control' => 'DROPDOWN',
                            'default' => '3',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rodsRequired',
                            'label' => ' Your desired number of grounding or lightning rods',
                            'type' => 'result',
                            'help' => 'Number of grounding or lightning rods needed.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rodsUnitPrice',
                            'label' => ' Grounding or lightning rod unit price',
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
                            'name' => 'rodsTotalCost',
                            'label' => 'Grounding or lightning rods total cost',
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
                            'name' => 'switchRequired',
                            'label' => ' Cut-out switch needed',
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
                            'name' => 'switchUnitPrice',
                            'label' => ' Cut-out switch unit price',
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
                            'name' => 'switchTotalCost',
                            'label' => 'Cut-out switch total cost',
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
            'title' => ' More materials needed',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'addConcreteFootingOptions',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Add concrete footing for the posts' => '1', '' => '0'],
                            'dataset' => 'Concrete footing options',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'concreteRequired',
                            'label' => ' Concrete volume needed',
                            'type' => 'result',
                            'help' => 'Volume of concrete for fence posts fabrication or for fence posts foundation.',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'concreteUnitPrice',
                            'label' => ' Concrete price per unit volume',
                            'type' => 'result',
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
                            'name' => 'concreteTotalCost',
                            'label' => 'Concrete total cost',
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
            'title' => '‍ Labor cost',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'includeLaborCostOptions',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include labor cost' => '1', '' => '0'],
                            'dataset' => 'Include labor cost',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'laborRequired',
                            'label' => ' Estimated labor hours',
                            'type' => 'result',
                            'help' => 'Estimated number of hours needed for the fence construction.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'laborCost',
                            'label' => ' Labor cost per unit time',
                            'type' => 'result',
                            'help' => 'Labor cost per time (hour, day, week, month, etc.).',
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
                            'name' => 'laborTotalCost',
                            'label' => 'Labor total cost',
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
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm1',
                            'label' => 'M1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm2',
                            'label' => 'M2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm3',
                            'label' => 'M3',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm4',
                            'label' => 'M4',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm5',
                            'label' => 'M5',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm6',
                            'label' => 'M6',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p1',
                            'label' => 'P1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p2',
                            'label' => 'P2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => ' Construction cost',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalCostWovenWire',
                            'label' => ' Total cost',
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
                            'name' => 'totalCostBarbedWire',
                            'label' => ' Total cost',
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
                            'name' => 'totalCostHtWire',
                            'label' => ' Total cost',
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
                            'name' => 'totalCostElectrifiedHtWire',
                            'label' => ' Total cost',
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
                            'name' => 'totalCostElectrifiedPolywire',
                            'label' => ' Total cost',
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
                            'name' => 'totalCostCustomFence',
                            'label' => ' Total cost',
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
                            'name' => 'tcplWovenWire',
                            'label' => ' Total cost per unit length',
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
                            'name' => 'tcplBarbedWire',
                            'label' => ' Total cost per unit length',
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
                            'name' => 'tcplHtWire',
                            'label' => ' Total cost per unit length',
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
                            'name' => 'tcplElectrifiedHtWire',
                            'label' => ' Total cost per unit length',
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
                            'name' => 'tcplElectrifiedPolywire',
                            'label' => ' Total cost per unit length',
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
                            'name' => 'tcplCustomFence',
                            'label' => ' Total cost per unit length',
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
            'title' => 'woodpostTotalCost8in = one_way(woodpostUnitPrice8in * woodpostRequired8in)',
            'results' => ['woodpostTotalCost8in' => '(woodpostRequired8in*woodpostUnitPrice8in)'],
        ],
        [
            'title' => <<<'TXT'
            fencePostsNeeded = one_way((1 - m6) * (p1 * ((floor(fenceLength / fencepostSpacing) + 1 - woodpostRequired8in) * (1- m5) + m5 * 2) + p2 * ((floor(fenceLength / fencepostSpacing) + 1) * (1- m5) + m5 * 2)) + m6 * (floor(fenceLength / fencepostSpacing) + 1))
            TXT,
            'results' => ['fencePostsNeeded' => <<<'TXT'
            (-m5*m6*p1*woodpostRequired8in + m5*m6*p1*floor(fenceLength/fencepostSpacing) - m5*m6*p1 + m5*m6*p2*floor(fenceLength/fencepostSpacing) - m5*m6*p2 + m5*p1*woodpostRequired8in - m5*p1*floor(fenceLength/fencepostSpacing) + m5*p1 - m5*p2*floor(fenceLength/fencepostSpacing) + m5*p2 + m6*p1*woodpostRequired8in - m6*p1*floor(fenceLength/fencepostSpacing) - m6*p1 - m6*p2*floor(fenceLength/fencepostSpacing) - m6*p2 + m6*floor(fenceLength/fencepostSpacing) + m6 - p1*woodpostRequired8in + p1*floor(fenceLength/fencepostSpacing) + p1 + p2*floor(fenceLength/fencepostSpacing) + p2)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            fencepostTotalCost = one_way(fencepostUnitPrice * (1 - m6) * (p1 * ((floor(fenceLength / fencepostSpacing) + 1 - woodpostRequired8in) * (1- m5) + m5 * 2) + p2 * ((floor(fenceLength / fencepostSpacing) + 1) * (1- m5) + m5 * 2)) + m6 * (floor(fenceLength / fencepostSpacing) + 1))
            TXT,
            'results' => ['fencepostTotalCost' => <<<'TXT'
            (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6)
            TXT],
        ],
        [
            'title' => 'fiberglasspostsRequired = floor(fenceLength / fencepostSpacing) - 1',
            'results' => ['fiberglasspostsRequired' => 'floor(fenceLength/fencepostSpacing) - 1'],
        ],
        [
            'title' => 'fiberglasspostsTotalCost = one_way(fiberglasspostsUnitPrice * (floor(fenceLength / fencepostSpacing) - 1))',
            'results' => ['fiberglasspostsTotalCost' => '(fiberglasspostsUnitPrice*(floor(fenceLength/fencepostSpacing) - 1))'],
        ],
        [
            'title' => 'wovenwireRequiredRolls = ceil(fenceLength / wovenwireRollLength)',
            'results' => ['wovenwireRequiredRolls' => 'ceil(fenceLength/wovenwireRollLength)'],
        ],
        [
            'title' => 'wovenwireTotalCost = one_way(wovenwireUnitPrice * ceil(fenceLength / wovenwireRollLength))',
            'results' => ['wovenwireTotalCost' => '(wovenwireUnitPrice*ceil(fenceLength/wovenwireRollLength))'],
        ],
        [
            'title' => 'barbedwireRuns = floor(fenceHeight * 12 / averageBarbedWireSpacing)',
            'results' => ['barbedwireRuns' => 'floor(12*fenceHeight/averageBarbedWireSpacing)'],
        ],
        [
            'title' => 'barbedwireRequiredRolls = ceil((fenceLength * barbedwireRuns) / barbedwireRollLength)',
            'results' => ['barbedwireRequiredRolls' => 'ceil(fenceLength*floor(12*fenceHeight/averageBarbedWireSpacing)/barbedwireRollLength)'],
        ],
        [
            'title' => 'barbedwireTotalCost = one_way(barbedwireUnitPrice * ceil((fenceLength * barbedwireRuns) / barbedwireRollLength))',
            'results' => ['barbedwireTotalCost' => '(barbedwireUnitPrice*ceil(fenceLength*floor(12*fenceHeight/averageBarbedWireSpacing)/barbedwireRollLength))'],
        ],
        [
            'title' => 'htWireRuns = floor(fenceHeight * 12 / htWireSpacing) + 1',
            'results' => ['htWireRuns' => 'floor(12*fenceHeight/htWireSpacing) + 1'],
        ],
        [
            'title' => 'htWireRequiredLength = one_way((floor(fenceHeight * 12 / htWireSpacing) + 1) * fenceLength)',
            'results' => ['htWireRequiredLength' => '(fenceLength*(floor(12*fenceHeight/htWireSpacing) + 1))'],
        ],
        [
            'title' => 'htWireTotalCost = one_way(htWireUnitPrice * (floor(fenceHeight * 12 / htWireSpacing) + 1) * fenceLength)',
            'results' => ['htWireTotalCost' => '(fenceLength*htWireUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1))'],
        ],
        [
            'title' => 'polywireRuns = floor(fenceHeight * 12 / polywireSpacing) + 1',
            'results' => ['polywireRuns' => 'floor(12*fenceHeight/polywireSpacing) + 1'],
        ],
        [
            'title' => 'polywireRequiredLength = one_way(fenceLength * (floor(fenceHeight * 12 / polywireSpacing) + 1))',
            'results' => ['polywireRequiredLength' => '(fenceLength*(floor(12*fenceHeight/polywireSpacing) + 1))'],
        ],
        [
            'title' => 'polywireTotalCost = one_way(polywireUnitPrice * fenceLength * (floor(fenceHeight * 12 / polywireSpacing) + 1))',
            'results' => ['polywireTotalCost' => '(fenceLength*polywireUnitPrice*(floor(12*fenceHeight/polywireSpacing) + 1))'],
        ],
        [
            'title' => <<<'TXT'
            clipsOrStaples = one_way(m1 * ((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / stapleSpacing) + 1)) + m2 * ((floor(fenceLength / fencepostSpacing) + 1) * floor(fenceHeight * 12 / averageBarbedWireSpacing)) + m3 * (one_way((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / htWireSpacing) + 1))) + m4 * (one_way((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / htWireSpacing) + 1))) + m5 * (2 * (floor(fenceHeight * 12 / polywireSpacing) + 1)) + m6 * ((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / stapleSpacing) + 1)))
            TXT,
            'results' => ['clipsOrStaples' => <<<'TXT'
            (m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            clipsOrStaplesTotalCost = one_way(clipsOrStaplesUnitPrice * (m1 * ((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / stapleSpacing) + 1)) + m2 * ((floor(fenceLength / fencepostSpacing) + 1) * floor(fenceHeight * 12 / averageBarbedWireSpacing)) + m3 * (one_way((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / htWireSpacing) + 1))) + m4 * (one_way((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / htWireSpacing) + 1))) + m5 * (2 * (floor(fenceHeight * 12 / polywireSpacing) + 1)) + m6 * ((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / stapleSpacing) + 1))))
            TXT,
            'results' => ['clipsOrStaplesTotalCost' => <<<'TXT'
            (clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6))
            TXT],
        ],
        [
            'title' => 'clipsForFiberglassPosts = (floor(fenceLength / fencepostSpacing) + 1 - 2) * (floor(fenceHeight * 12 / polywireSpacing) + 1)',
            'results' => ['clipsForFiberglassPosts' => 'floor(12*fenceHeight/polywireSpacing)*floor(fenceLength/fencepostSpacing) - floor(12*fenceHeight/polywireSpacing) + floor(fenceLength/fencepostSpacing) - 1'],
        ],
        [
            'title' => <<<'TXT'
            clipsForFiberglassPostsTotalCost = one_way(clipsForFiberglassPostsUnitPrice * ((floor(fenceLength / fencepostSpacing) + 1 - 2) * (floor(fenceHeight * 12 / polywireSpacing) + 1)))
            TXT,
            'results' => ['clipsForFiberglassPostsTotalCost' => <<<'TXT'
            (clipsForFiberglassPostsUnitPrice*(floor(12*fenceHeight/polywireSpacing)*floor(fenceLength/fencepostSpacing) - floor(12*fenceHeight/polywireSpacing) + floor(fenceLength/fencepostSpacing) - 1))
            TXT],
        ],
        [
            'title' => 'springsRequired = floor(fenceHeight * 12 / htWireSpacing) + 1',
            'results' => ['springsRequired' => 'floor(12*fenceHeight/htWireSpacing) + 1'],
        ],
        [
            'title' => 'springsTotalCost = one_way(springsUnitPrice * (floor(fenceHeight * 12 / htWireSpacing) + 1))',
            'results' => ['springsTotalCost' => '(springsUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1))'],
        ],
        [
            'title' => 'strainersRequired = floor(fenceHeight * 12 / htWireSpacing) + 1',
            'results' => ['strainersRequired' => 'floor(12*fenceHeight/htWireSpacing) + 1'],
        ],
        [
            'title' => 'strainersTotalCost = one_way(strainerUnitPrice * (floor(fenceHeight * 12 / htWireSpacing) + 1))',
            'results' => ['strainersTotalCost' => '(strainerUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1))'],
        ],
        [
            'title' => 'staysRequired = ceil(fencepostSpacing / staysSpacing)',
            'results' => ['staysRequired' => 'ceil(fencepostSpacing/staysSpacing)'],
        ],
        [
            'title' => 'staysTotalCost = ceil(staysUnitPrice * fencepostSpacing / staysSpacing)',
            'results' => ['staysTotalCost' => 'ceil(fencepostSpacing*staysUnitPrice/staysSpacing)'],
        ],
        [
            'title' => 'hingeJointRequired = ceil((fenceLength * useHingeJointOptions) / hingeJointRollLength)',
            'results' => ['hingeJointRequired' => 'ceil(fenceLength*useHingeJointOptions/hingeJointRollLength)'],
        ],
        [
            'title' => 'hingejointTotalCost = one_way(hingeJointUnitPrice * ceil((fenceLength * useHingeJointOptions) / hingeJointRollLength))',
            'results' => ['hingejointTotalCost' => '(hingeJointUnitPrice*ceil(fenceLength*useHingeJointOptions/hingeJointRollLength))'],
        ],
        [
            'title' => 'energizerRequired = one_way(fenceLength * numberOfElectrifiedWires) + 0.25 * (fenceLength * numberOfElectrifiedWires)',
            'results' => ['energizerRequired' => '(1/4)*fenceLength*numberOfElectrifiedWires + (fenceLength*numberOfElectrifiedWires)'],
        ],
        [
            'title' => 'energizerTotalCost = one_way(energizerUnitPrice * (one_way(fenceLength * numberOfElectrifiedWires) + 0.25 * (fenceLength * numberOfElectrifiedWires)))',
            'results' => ['energizerTotalCost' => '((1/4)*energizerUnitPrice*(fenceLength*numberOfElectrifiedWires + 4*(fenceLength*numberOfElectrifiedWires)))'],
        ],
        [
            'title' => 'switchTotalCost = one_way(switchUnitPrice * switchRequired)',
            'results' => ['switchTotalCost' => '(switchRequired*switchUnitPrice)'],
        ],
        [
            'title' => 'rodsTotalCost = one_way(rodsUnitPrice * rodsRequired)',
            'results' => ['rodsTotalCost' => '(rodsRequired*rodsUnitPrice)'],
        ],
        [
            'title' => 'concreteTotalCost = one_way(concreteUnitPrice * concreteRequired)',
            'results' => ['concreteTotalCost' => '(concreteRequired*concreteUnitPrice)'],
        ],
        [
            'title' => 'laborTotalCost = one_way(laborCost * laborRequired)',
            'results' => ['laborTotalCost' => '(laborCost*laborRequired)'],
        ],
        [
            'title' => 'additionalBarbedWireRolls = ceil((numberOfAdditionalBarbedWireRuns * fenceLength) / barbedwireRollLength)',
            'results' => ['additionalBarbedWireRolls' => 'ceil(fenceLength*numberOfAdditionalBarbedWireRuns/barbedwireRollLength)'],
        ],
        [
            'title' => 'additionalBarbedwireTotalCost = one_way(additional * ceil((numberOfAdditionalBarbedWireRuns * fenceLength) / barbedwireRollLength))',
            'results' => ['additionalBarbedwireTotalCost' => '(additional*ceil(fenceLength*numberOfAdditionalBarbedWireRuns/barbedwireRollLength))'],
        ],
        [
            'title' => <<<'TXT'
            totalCostWovenWire = one_way(woodpostTotalCost8in + fencepostTotalCost + wovenwireTotalCost + additionalBarbedwireTotalCost + clipsOrStaplesTotalCost + laborTotalCost)
            TXT,
            'results' => ['totalCostWovenWire' => <<<'TXT'
            ((additional*ceil(fenceLength*numberOfAdditionalBarbedWireRuns/barbedwireRollLength)) + (clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (laborCost*laborRequired) + (woodpostRequired8in*woodpostUnitPrice8in) + (wovenwireUnitPrice*ceil(fenceLength/wovenwireRollLength)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))
            TXT],
        ],
        [
            'title' => 'totalCostBarbedWire = one_way(woodpostTotalCost8in + fencepostTotalCost + barbedwireTotalCost + clipsOrStaplesTotalCost + laborTotalCost)',
            'results' => ['totalCostBarbedWire' => <<<'TXT'
            ((barbedwireUnitPrice*ceil(fenceLength*floor(12*fenceHeight/averageBarbedWireSpacing)/barbedwireRollLength)) + (clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (laborCost*laborRequired) + (woodpostRequired8in*woodpostUnitPrice8in) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            totalCostHtWire = one_way(woodpostTotalCost8in + fencepostTotalCost + htWireTotalCost + clipsOrStaplesTotalCost + springsTotalCost + strainersTotalCost + laborTotalCost)
            TXT,
            'results' => ['totalCostHtWire' => <<<'TXT'
            ((clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (laborCost*laborRequired) + (springsUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (strainerUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (woodpostRequired8in*woodpostUnitPrice8in) + (fenceLength*htWireUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            totalCostElectrifiedHtWire = one_way(woodpostTotalCost8in + fencepostTotalCost + htWireTotalCost + clipsOrStaplesTotalCost + springsTotalCost + strainersTotalCost + energizerTotalCost + rodsTotalCost + switchTotalCost + laborTotalCost)
            TXT,
            'results' => ['totalCostElectrifiedHtWire' => <<<'TXT'
            ((clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + ((1/4)*energizerUnitPrice*(fenceLength*numberOfElectrifiedWires + 4*(fenceLength*numberOfElectrifiedWires))) + (laborCost*laborRequired) + (rodsRequired*rodsUnitPrice) + (springsUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (strainerUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (switchRequired*switchUnitPrice) + (woodpostRequired8in*woodpostUnitPrice8in) + (fenceLength*htWireUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            totalCostElectrifiedPolywire = one_way(fencepostTotalCost + fiberglasspostsTotalCost + polywireTotalCost + clipsOrStaplesTotalCost + energizerTotalCost + rodsTotalCost + switchTotalCost + laborTotalCost)
            TXT,
            'results' => ['totalCostElectrifiedPolywire' => <<<'TXT'
            ((clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + ((1/4)*energizerUnitPrice*(fenceLength*numberOfElectrifiedWires + 4*(fenceLength*numberOfElectrifiedWires))) + (fiberglasspostsUnitPrice*(floor(fenceLength/fencepostSpacing) - 1)) + (laborCost*laborRequired) + (rodsRequired*rodsUnitPrice) + (switchRequired*switchUnitPrice) + (fenceLength*polywireUnitPrice*(floor(12*fenceHeight/polywireSpacing) + 1)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            totalCostCustomFence = one_way(fencepostTotalCost + wovenwireTotalCost + additionalBarbedwireTotalCost + clipsOrStaplesTotalCost + strainersTotalCost + staysTotalCost + hingejointTotalCost + concreteTotalCost + laborTotalCost)
            TXT,
            'results' => ['totalCostCustomFence' => <<<'TXT'
            (ceil(fencepostSpacing*staysUnitPrice/staysSpacing) + (additional*ceil(fenceLength*numberOfAdditionalBarbedWireRuns/barbedwireRollLength)) + (clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (concreteRequired*concreteUnitPrice) + (hingeJointUnitPrice*ceil(fenceLength*useHingeJointOptions/hingeJointRollLength)) + (laborCost*laborRequired) + (strainerUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (wovenwireUnitPrice*ceil(fenceLength/wovenwireRollLength)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            tcplWovenWire = one_way((woodpostTotalCost8in + fencepostTotalCost + wovenwireTotalCost + additionalBarbedwireTotalCost + clipsOrStaplesTotalCost + laborTotalCost) / fenceLength)
            TXT,
            'results' => ['tcplWovenWire' => <<<'TXT'
            (((additional*ceil(fenceLength*numberOfAdditionalBarbedWireRuns/barbedwireRollLength)) + (clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (laborCost*laborRequired) + (woodpostRequired8in*woodpostUnitPrice8in) + (wovenwireUnitPrice*ceil(fenceLength/wovenwireRollLength)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))/fenceLength)
            TXT],
        ],
        [
            'title' => 'tcplBarbedWire = one_way((woodpostTotalCost8in + fencepostTotalCost + barbedwireTotalCost + clipsOrStaplesTotalCost + laborTotalCost) / fenceLength)',
            'results' => ['tcplBarbedWire' => <<<'TXT'
            (((barbedwireUnitPrice*ceil(fenceLength*floor(12*fenceHeight/averageBarbedWireSpacing)/barbedwireRollLength)) + (clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (laborCost*laborRequired) + (woodpostRequired8in*woodpostUnitPrice8in) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))/fenceLength)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            tcplHtWire = one_way((woodpostTotalCost8in + fencepostTotalCost + htWireTotalCost + clipsOrStaplesTotalCost + springsTotalCost + strainersTotalCost + laborTotalCost) / fenceLength)
            TXT,
            'results' => ['tcplHtWire' => <<<'TXT'
            (((clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (laborCost*laborRequired) + (springsUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (strainerUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (woodpostRequired8in*woodpostUnitPrice8in) + (fenceLength*htWireUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))/fenceLength)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            tcplElectrifiedHtWire = one_way((woodpostTotalCost8in + fencepostTotalCost + htWireTotalCost + clipsOrStaplesTotalCost + springsTotalCost + strainersTotalCost + energizerTotalCost + rodsTotalCost + switchTotalCost + laborTotalCost) / fenceLength)
            TXT,
            'results' => ['tcplElectrifiedHtWire' => <<<'TXT'
            (((clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + ((1/4)*energizerUnitPrice*(fenceLength*numberOfElectrifiedWires + 4*(fenceLength*numberOfElectrifiedWires))) + (laborCost*laborRequired) + (rodsRequired*rodsUnitPrice) + (springsUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (strainerUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (switchRequired*switchUnitPrice) + (woodpostRequired8in*woodpostUnitPrice8in) + (fenceLength*htWireUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))/fenceLength)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            tcplElectrifiedPolywire = one_way((fencepostTotalCost + fiberglasspostsTotalCost + polywireTotalCost + clipsOrStaplesTotalCost + energizerTotalCost + rodsTotalCost + switchTotalCost + laborTotalCost) / fenceLength)
            TXT,
            'results' => ['tcplElectrifiedPolywire' => <<<'TXT'
            (((clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + ((1/4)*energizerUnitPrice*(fenceLength*numberOfElectrifiedWires + 4*(fenceLength*numberOfElectrifiedWires))) + (fiberglasspostsUnitPrice*(floor(fenceLength/fencepostSpacing) - 1)) + (laborCost*laborRequired) + (rodsRequired*rodsUnitPrice) + (switchRequired*switchUnitPrice) + (fenceLength*polywireUnitPrice*(floor(12*fenceHeight/polywireSpacing) + 1)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))/fenceLength)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            tcplCustomFence = one_way((fencepostTotalCost + wovenwireTotalCost + additionalBarbedwireTotalCost + clipsOrStaplesTotalCost + strainersTotalCost + staysTotalCost + hingejointTotalCost + concreteTotalCost + laborTotalCost) / fenceLength)
            TXT,
            'results' => ['tcplCustomFence' => <<<'TXT'
            ((ceil(fencepostSpacing*staysUnitPrice/staysSpacing) + (additional*ceil(fenceLength*numberOfAdditionalBarbedWireRuns/barbedwireRollLength)) + (clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (concreteRequired*concreteUnitPrice) + (hingeJointUnitPrice*ceil(fenceLength*useHingeJointOptions/hingeJointRollLength)) + (laborCost*laborRequired) + (strainerUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (wovenwireUnitPrice*ceil(fenceLength/wovenwireRollLength)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))/fenceLength)
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Fence type, Length and Height into Livestock fence cost and the answer comes back as 8" Wood end posts needed and 8" Wood post unit price. It is a single relationship that reads 8" Wood end posts needed out of fence type, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Livestock fence cost calculator works', 'html' => <<<'TXT'
            <p>Livestock fence cost answers one question from 78 numbers, and the answer is 8&quot; Wood end posts needed, 8&quot; Wood post unit price and Average barbed wire spacing.</p><p>The relationship it solves reads 8&quot; Wood posts total cost = (8&quot; Wood end posts needed × 8&quot; Wood post unit price).</p><p>The answers are 8&quot; Wood end posts needed, 8&quot; Wood post unit price, Average barbed wire spacing and Barbed wire price per roll; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 78 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Fence type</strong> — a plain number, no unit. What type of fence are you interested in constructing?</li><li><strong>Length</strong> — in meters. Also equivalent to the perimeter of the lot you want to fence.</li><li><strong>Height</strong> — a plain number, no unit</li><li><strong>Desired spacing of posts</strong> — in meters. Distance between two adjacent posts.</li><li><strong>Desired fence post material</strong> — a plain number, no unit</li><li><strong>8&quot; Wood posts total cost</strong> — in USD</li><li><strong>Fence posts needed</strong> — a plain number, no unit</li><li><strong>Fence post unit price</strong> — in USD</li><li><strong>Fence posts total cost</strong> — in USD</li><li><strong>Fiberglass posts needed</strong> — a plain number, no unit. Number of fiberglass posts needed.</li><li><strong>Fiberglass post unit price</strong> — in USD</li><li><strong>Fiberglass posts total cost</strong> — in USD</li><li><strong>Woven wire length per roll</strong> — in meters</li><li><strong>Woven wire rolls needed</strong> — a plain number, no unit</li><li><strong>Woven wire price per roll</strong> — in USD</li><li><strong>Woven wires total cost</strong> — in USD</li><li><strong>Average barbed wire vertical spacing</strong> — a plain number, no unit</li><li><strong>Barbed wire horizontal runs</strong> — a plain number, no unit. Number of barbed wires to run through the fence length.</li><li><strong>Number of additional barbed wire runs</strong> — a plain number, no unit</li><li><strong>Barbed wire length per roll</strong> — in meters</li><li><strong>Barbed wire rolls needed</strong> — a plain number, no unit</li><li><strong>Barbed wire rolls needed</strong> — a plain number, no unit</li><li><strong>Barbed wire price per roll</strong> — in USD</li><li><strong>Barbed wires total cost</strong> — in USD</li><li><strong>Additional barbed wire total cost</strong> — in USD</li><li><strong>High-tensile wire spacing options</strong> — a plain number, no unit</li><li><strong>High-tensile wire runs needed</strong> — a plain number, no unit. Number of high-tensile wire runs needed.</li><li><strong>High-tensile wire total length needed</strong> — a plain number, no unit</li><li><strong>High-tensile wire unit price</strong> — in USD. Cost of high-tensile wires.</li><li><strong>Hight-tensile wire total cost</strong> — in USD</li><li><strong>Polywire spacing options</strong> — a plain number, no unit</li><li><strong>Polywire runs needed</strong> — a plain number, no unit</li><li><strong>Polywire length needed</strong> — a plain number, no unit. Length of Polywire needed.</li><li><strong>Polywire unit price</strong> — in USD</li><li><strong>Polywire total cost</strong> — in USD</li><li><strong>Clips or staples spacing options</strong> — a plain number, no unit</li><li><strong>Clips or staples needed</strong> — a plain number, no unit</li><li><strong>Clips or staples unit price</strong> — in USD</li><li><strong>Clips or staples total cost</strong> — in USD</li><li><strong>Springs needed</strong> — a plain number, no unit. Number of springs needed.</li><li><strong>Spring unit price</strong> — in USD</li><li><strong>Springs total cost</strong> — in USD</li><li><strong>Strainers needed</strong> — a plain number, no unit. Number of wire strainers needed.</li><li><strong>Strainer unit price</strong> — in USD</li><li><strong>Strainers total cost</strong> — in USD</li><li><strong>Clips for fiberglass posts</strong> — a plain number, no unit</li><li><strong>Clips for fiberglass posts unit price</strong> — in USD</li><li><strong>Clips for fiberglass posts total cost</strong> — in USD</li><li><strong>Horizontal stays spacing</strong> — in centimeters</li><li><strong>Fence stays needed</strong> — a plain number, no unit. Number of fence stays needed.</li><li><strong>Stays total cost</strong> — in USD</li><li><strong>Hinge joint wire length per roll</strong> — a plain number, no unit</li><li><strong>Hinge joint needed</strong> — a plain number, no unit</li><li><strong>Hinge joint total cost</strong> — in USD</li><li><strong>Number of electrified wires needed</strong> — a plain number, no unit</li><li><strong>Energizer capacity needed</strong> — a plain number, no unit. Recommended capacity of energizer needed for the fence length.</li><li><strong>Energizer unit price</strong> — in USD. Total cost of Energizer required</li><li><strong>Energizer total cost</strong> — in USD</li><li><strong>Grounding or lightning rods needed</strong> — a plain number, no unit</li><li><strong>Grounding or lightning rod unit price</strong> — in USD</li><li><strong>Grounding or lightning rods total cost</strong> — in USD</li><li><strong>Cut-out switch needed</strong> — a plain number, no unit</li><li><strong>Cut-out switch unit price</strong> — in USD</li><li><strong>Cut-out switch total cost</strong> — in USD</li><li><strong>Concrete total cost</strong> — in USD</li><li><strong>Labor total cost</strong> — in USD</li><li><strong>Total cost</strong> — in USD</li><li><strong>Total cost</strong> — in USD</li><li><strong>Total cost</strong> — in USD</li><li><strong>Total cost</strong> — in USD</li><li><strong>Total cost</strong> — in USD</li><li><strong>Total cost</strong> — in USD</li><li><strong>Total cost per unit length</strong> — in USD</li><li><strong>Total cost per unit length</strong> — in USD</li><li><strong>Total cost per unit length</strong> — in USD</li><li><strong>Total cost per unit length</strong> — in USD</li><li><strong>Total cost per unit length</strong> — in USD</li><li><strong>Total cost per unit length</strong> — in USD</li></ul><p>What you get back is 8&quot; Wood end posts needed, 8&quot; Wood post unit price in USD, Average barbed wire spacing in centimeters, Barbed wire price per roll in USD, Average high-tensile wire spacing in centimeters, Average polywire spacing in centimeters, Clips or staples vertical spacing in centimeters, Fence stay unit price in USD, Hinge joint wire price per roll in USD, Your desired number of grounding or lightning rods, Concrete volume needed in cubic meters, Concrete price per unit volume in USD, Estimated labor hours, Labor cost per unit time in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Fence type = 1, Length = 30 m, Height = 1.2, Desired spacing of posts = 2.5 m, Desired fence post material = 1, Fence post unit price = 6 USD, Fiberglass post unit price = 7 USD, Woven wire length per roll = 10 m, Woven wire price per roll = 9 USD, Additional Barbed Wires = 0, Average barbed wire vertical spacing = 3, Number of additional barbed wire runs = 1, Barbed wire length per roll = 10 m, Barbed wire price per roll = 2 USD, High-tensile wire spacing options = 2, High-tensile wire unit price = 3 USD, Polywire spacing options = 5, Polywire unit price = 4 USD, Clips or staples spacing options = 1, Clips or staples unit price = 5 USD, Spring unit price = 6 USD, Strainer unit price = 7 USD, Clips for fiberglass posts unit price = 8 USD, Use Stays Options = 0, Horizontal stays spacing = 45 cm, Use Hinge Joint Options = 0, Hinge joint wire length per roll = 10, Number of electrified wires needed = 1, Energizer unit price = 3 USD, Grounding or lightning rods needed = 3, Grounding or lightning rod unit price = 4 USD, Cut-out switch needed = 1, Cut-out switch unit price = 6 USD, Add Concrete Footing Options = 0 and Include Labor Cost Options = 0 — through the same formula and the panel reports <strong>8&amp;quot; Wood posts total cost</strong> = 0 USD, <strong>Fence posts needed</strong> = 0, <strong>Fence posts total cost</strong> = 0 USD, <strong>Fiberglass posts needed</strong> = 11, <strong>Fiberglass posts total cost</strong> = 77 USD, <strong>Woven wire rolls needed</strong> = 3, <strong>Woven wires total cost</strong> = 27 USD, <strong>Fence stays needed</strong> = 1, <strong>Stays total cost</strong> = 0 USD, <strong>Hinge joint needed</strong> = 0, <strong>Hinge joint total cost</strong> = 0 USD, <strong>Energizer capacity needed</strong> = 37.5, <strong>Energizer total cost</strong> = 113 USD, <strong>Cut-out switch total cost</strong> = 6 USD, <strong>Grounding or lightning rods total cost</strong> = 0 USD, <strong>Concrete total cost</strong> = 0 USD, <strong>Labor total cost</strong> = 0 USD, <strong>Barbed wire rolls needed</strong> = 3 and <strong>Additional barbed wire total cost</strong> = 0 USD.</p><ul><li><strong>8&quot; Wood posts total cost</strong> = 0 USD</li><li><strong>Fence posts needed</strong> = 0</li><li><strong>Fence posts total cost</strong> = 0 USD</li><li><strong>Fiberglass posts needed</strong> = 11</li><li><strong>Fiberglass posts total cost</strong> = 77 USD</li><li><strong>Woven wire rolls needed</strong> = 3</li><li><strong>Woven wires total cost</strong> = 27 USD</li><li><strong>Fence stays needed</strong> = 1</li><li><strong>Stays total cost</strong> = 0 USD</li><li><strong>Hinge joint needed</strong> = 0</li><li><strong>Hinge joint total cost</strong> = 0 USD</li><li><strong>Energizer capacity needed</strong> = 37.5</li><li><strong>Energizer total cost</strong> = 113 USD</li><li><strong>Cut-out switch total cost</strong> = 6 USD</li><li><strong>Grounding or lightning rods total cost</strong> = 0 USD</li><li><strong>Concrete total cost</strong> = 0 USD</li><li><strong>Labor total cost</strong> = 0 USD</li><li><strong>Barbed wire rolls needed</strong> = 3</li><li><strong>Additional barbed wire total cost</strong> = 0 USD</li></ul><p>That is <strong>8&quot; Wood posts total cost</strong> = <code>(8&quot; Wood end posts needed × 8&quot; Wood post unit price)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>8&amp;quot; Wood posts total cost</strong> = 0, <strong>Fence posts needed</strong> = 0, <strong>Fence posts total cost</strong> = 0, <strong>Fiberglass posts needed</strong> = 11, <strong>Fiberglass posts total cost</strong> = 77, <strong>Woven wire rolls needed</strong> = 3, <strong>Woven wires total cost</strong> = 27, <strong>Fence stays needed</strong> = 1, <strong>Stays total cost</strong> = 0, <strong>Hinge joint needed</strong> = 0, <strong>Hinge joint total cost</strong> = 0, <strong>Energizer capacity needed</strong> = 37.5, <strong>Energizer total cost</strong> = 113, <strong>Cut-out switch total cost</strong> = 6, <strong>Grounding or lightning rods total cost</strong> = 0, <strong>Concrete total cost</strong> = 0, <strong>Labor total cost</strong> = 0, <strong>Barbed wire rolls needed</strong> = 3 and <strong>Additional barbed wire total cost</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Average barbed wire spacing lists 7 options and opens on centimeters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>8&quot; Wood posts total cost</strong> = <code>(8&quot; Wood end posts needed × 8&quot; Wood post unit price)</code></li><li><strong>Fiberglass posts needed</strong> = <code>floor(Length ÷ Desired spacing of posts) − 1</code></li><li><strong>Fiberglass posts total cost</strong> = <code>(Fiberglass post unit price × (floor(Length ÷ Desired spacing of posts) − 1))</code></li><li><strong>Woven wire rolls needed</strong> = <code>ceil(Length ÷ Woven wire length per roll)</code></li><li><strong>Woven wires total cost</strong> = <code>(Woven wire price per roll × ceil(Length ÷ Woven wire length per roll))</code></li><li><strong>Barbed wire horizontal runs</strong> = <code>floor(12 × Height ÷ Average barbed wire spacing)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>8&quot; Wood posts total cost</strong> = <code>(8&quot; Wood end posts needed × 8&quot; Wood post unit price)</code> — the form to use when 8&quot; Wood end posts needed and 8&quot; Wood post unit price are the values you have.</li><li><strong>Fiberglass posts needed</strong> = <code>floor(Length ÷ Desired spacing of posts) − 1</code> — the form to use when Length and Desired spacing of posts are the values you have.</li><li><strong>Fiberglass posts total cost</strong> = <code>(Fiberglass post unit price × (floor(Length ÷ Desired spacing of posts) − 1))</code> — the form to use when Fiberglass post unit price, Length and Desired spacing of posts are the values you have.</li><li><strong>Woven wire rolls needed</strong> = <code>ceil(Length ÷ Woven wire length per roll)</code> — the form to use when Length and Woven wire length per roll are the values you have.</li><li><strong>Woven wires total cost</strong> = <code>(Woven wire price per roll × ceil(Length ÷ Woven wire length per roll))</code> — the form to use when Woven wire price per roll, Length and Woven wire length per roll are the values you have.</li><li><strong>Barbed wire horizontal runs</strong> = <code>floor(12 × Height ÷ Average barbed wire spacing)</code> — the form to use when Height and Average barbed wire spacing are the values you have.</li><li><strong>Barbed wire rolls needed</strong> = <code>ceil(Length × floor(12 × Height ÷ Average barbed wire spacing) ÷ Barbed wire length per roll)</code> — the form to use when Length, Height, Average barbed wire spacing and Barbed wire length per roll are the values you have.</li><li><strong>Barbed wires total cost</strong> = <code>(Barbed wire price per roll × ceil(Length × floor(12 × Height ÷ Average barbed wire spacing) ÷ Barbed wire length per roll))</code> — the form to use when Barbed wire price per roll, Length, Height and Average barbed wire spacing are the values you have.</li></ul><p>Any one of 8&quot; Wood posts total cost, Fence posts needed and Fence posts total cost can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length, Desired spacing of posts and Woven wire length per roll carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> 8&quot; Wood end posts needed, 8&quot; Wood post unit price and Average barbed wire spacing are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Fence type left as a guess.</strong> Anything typed into Fence type is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Length left as a guess.</strong> Anything typed into Length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Fence type and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Fence type, Length and Height is what you already know and 8&quot; Wood end posts needed and 8&quot; Wood post unit price is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Livestock fence cost calculator work out?', 'a' => <<<'TXT'
            8" Wood end posts needed, 8" Wood post unit price, Average barbed wire spacing and Barbed wire price per roll, from 8" Wood end posts needed and 8" Wood post unit price. The relationship is 8" Wood posts total cost = (8" Wood end posts needed × 8" Wood post unit price).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Fence type, Length (meters), Height, Desired spacing of posts (meters), Desired fence post material. Enter fence type, length and height; 8" Wood end posts needed is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of 8" Wood posts total cost, Fence posts needed, Fence posts total cost and Fiberglass posts needed blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            8" Wood posts total cost = 0 USD, Fence posts needed = 0, Fence posts total cost = 0 USD, Fiberglass posts needed = 11, Fiberglass posts total cost = 77 USD, Woven wire rolls needed = 3, Woven wires total cost = 27 USD, Fence stays needed = 1, Stays total cost = 0 USD, Hinge joint needed = 0, Hinge joint total cost = 0 USD, Energizer capacity needed = 37.5, Energizer total cost = 113 USD, Cut-out switch total cost = 6 USD, Grounding or lightning rods total cost = 0 USD, Concrete total cost = 0 USD, Labor total cost = 0 USD, Barbed wire rolls needed = 3 and Additional barbed wire total cost = 0 USD. That comes from the page's own defaults, entered in Fence type; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            8" Wood end posts needed is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Fence type left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of 8" Wood end posts needed keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/allometric-equation', 'name' => 'Allometric Equation Calculator'],
            ['path' => '/biology/amino-acid-composition', 'name' => 'Amino Acid Composition Calculator'],
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
        ],
        'authors' => [],
    ],
];
