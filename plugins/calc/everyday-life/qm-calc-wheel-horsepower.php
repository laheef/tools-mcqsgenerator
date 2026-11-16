<?php

/**
 * Wheel horsepower
 * /everyday-life/wheel-horsepower
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wheel horsepower',
    'meta' => ['title' => 'Wheel horsepower — Formula, Steps & Examples', 'description' => 'Wheel horsepower works out gearbox efficiency and propeller shaft efficiency and reports both. Every box can be solved for, not only the one in the title.', 'h1' => 'Wheel horsepower Calculator', 'updated' => '2026-08-22'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'drive_type',
                            'label' => 'Drive type',
                            'type' => 'select',
                            'options' => ['Rear wheel drive (RWD)' => '1', 'Front wheel drive (FWD)' => '2'],
                            'default' => 'Rear wheel drive (RWD)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bhp',
                            'label' => 'Engine horsepower',
                            'type' => 'number',
                            'unit' => '13',
                            'unit_default' => 'hp_m',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Gearbox',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gearbox_efficiency_rwd',
                            'label' => 'Gearbox efficiency',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gearbox_efficiency_fwd',
                            'label' => 'Gearbox efficiency',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Gearbox parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bearing_efficiency_rwd',
                            'label' => 'Bearing efficiency',
                            'type' => 'number',
                            'help' => 'Typical bearing efficiency: 0.99.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bearings_no_rwd',
                            'label' => 'Number of bearings',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gear_mesh_rwd',
                            'label' => 'Gear mesh efficiency',
                            'type' => 'number',
                            'help' => 'Typical helical gear mesh efficiency: 0.98.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gear_mesh_no_rwd',
                            'label' => 'Number of gear meshes',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bearing_efficiency_fwd',
                            'label' => 'Bearing efficiency',
                            'type' => 'number',
                            'help' => 'Typical bearing efficiency: 0.99.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bearings_no_fwd',
                            'label' => 'Number of bearings',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gear_mesh_fwd',
                            'label' => 'Gear mesh efficiency',
                            'type' => 'number',
                            'help' => 'Typical helical gear mesh efficiency: 0.98.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gear_mesh_no_fwd',
                            'label' => 'Number of gear meshes',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Propeller shaft',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'propeller_shaft_eff',
                            'label' => 'Propeller shaft efficiency',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Propeller shaft parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bearings_rwd',
                            'label' => 'Bearing efficiency',
                            'type' => 'number',
                            'help' => 'Typical bearing efficiency: 0.99.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'propeller_shaft_bearings_rwd',
                            'label' => 'Number of bearings',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'joint_efficiency_rwd',
                            'label' => 'Universal joint efficiency',
                            'type' => 'number',
                            'help' => 'Typical universal joint efficiency: 0.99.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'joints_no_rwd',
                            'label' => 'Number of universal joints',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Differential',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'differential_efficiency',
                            'label' => 'Differential efficiency',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Differential parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'differential_bearings_rwd',
                            'label' => 'Bearing efficiency',
                            'type' => 'number',
                            'help' => 'Typical bearing efficiency: 0.99.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'differential_bearings_no_rwd',
                            'label' => 'Number of bearings',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'differential_gear_mesh_rwd',
                            'label' => 'Gear mesh efficiency',
                            'type' => 'number',
                            'help' => 'Typical bevel gear mesh efficiency: 0.96.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'differential_gear_no_rwd',
                            'label' => 'Number of gear meshes',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Driveshaft',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'driveshaft_rwd',
                            'label' => 'Driveshaft efficiency',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Driveshaft parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rzeppa_joint_eff',
                            'label' => 'Rzeppa joint efficiency',
                            'type' => 'number',
                            'help' => 'Typical rzeppa joint efficiency: 0.99.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tripod_joint',
                            'label' => 'Tripod joint efficiency',
                            'type' => 'number',
                            'help' => 'Typical tripod joint efficiency: 0.99.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Differential efficiency',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'differential_eff_fwd',
                            'label' => 'Differential efficiency',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Differential efficiency parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'differential_bearing_fwd',
                            'label' => 'Bearing efficiency',
                            'type' => 'number',
                            'help' => 'Typical bearing efficiency: 0.99.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'differential_bearings_no_fwd',
                            'label' => 'Number of bearings',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'differential_gear_mesh_fwd',
                            'label' => 'Gear mesh efficiency',
                            'type' => 'number',
                            'help' => 'Typical bevel gear mesh efficiency: 0.96.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'differential_gear_no_fwd',
                            'label' => 'Number of gear meshes',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Driveshaft efficiency',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'driveshaft_fwd',
                            'label' => 'Driveshaft efficiency',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Driveshaft efficiency parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'driveshaft_joint_eff_fwd',
                            'label' => 'Universal joint efficiency',
                            'type' => 'number',
                            'help' => 'Typical universal joint efficiency: 0.99.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'joints_no_fwd',
                            'label' => 'Number of universal joints',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bearing_eff_fwd',
                            'label' => 'Bearing efficiency',
                            'type' => 'number',
                            'help' => 'Typical bearing efficiency: 0.99.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'driveshaft_bearings_no_fwd',
                            'label' => 'Number of bearings',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'velocity_joint_fwd',
                            'label' => 'Constant velocity joint efficiency',
                            'type' => 'number',
                            'help' => 'Typical constant velocity joint efficiency: 0.99',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'velocity_joints_no_fwd',
                            'label' => 'Number of constant velocity joints',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Wheel horsepower',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'neta_f',
                            'label' => 'Front wheel drivetrain efficiency',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'neta_r',
                            'label' => 'Rear wheel drivetrain efficiency',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'whp_f',
                            'label' => 'Wheel horsepower',
                            'type' => 'number',
                            'unit' => '13',
                            'unit_default' => 'hp_m',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'whp_r',
                            'label' => 'Wheel horsepower',
                            'type' => 'number',
                            'unit' => '13',
                            'unit_default' => 'hp_m',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'whp_r = bhp * neta_r',
            'results' => ['neta_r' => 'whp_r/bhp', 'whp_r' => 'bhp*neta_r', 'bhp' => 'whp_r/neta_r'],
        ],
        [
            'title' => 'neta_r = gearbox_efficiency_rwd * propeller_shaft_eff * differential_efficiency * driveshaft_rwd',
            'results' => [
                'neta_r' => 'differential_efficiency*driveshaft_rwd*gearbox_efficiency_rwd*propeller_shaft_eff',
                'propeller_shaft_eff' => 'neta_r/(differential_efficiency*driveshaft_rwd*gearbox_efficiency_rwd)',
                'gearbox_efficiency_rwd' => 'neta_r/(differential_efficiency*driveshaft_rwd*propeller_shaft_eff)',
                'driveshaft_rwd' => 'neta_r/(differential_efficiency*gearbox_efficiency_rwd*propeller_shaft_eff)',
                'differential_efficiency' => 'neta_r/(driveshaft_rwd*gearbox_efficiency_rwd*propeller_shaft_eff)',
            ],
        ],
        [
            'title' => 'gearbox_efficiency_rwd = (bearing_efficiency_rwd^bearings_no_rwd) * (gear_mesh_rwd^gear_mesh_no_rwd)',
            'results' => [
                'gear_mesh_no_rwd' => 'log(pow(bearing_efficiency_rwd, -bearings_no_rwd)*gearbox_efficiency_rwd)/log(gear_mesh_rwd)',
                'gearbox_efficiency_rwd' => 'pow(bearing_efficiency_rwd, bearings_no_rwd)*pow(gear_mesh_rwd, gear_mesh_no_rwd)',
                'bearings_no_rwd' => 'log(pow(gear_mesh_rwd, -gear_mesh_no_rwd)*gearbox_efficiency_rwd)/log(bearing_efficiency_rwd)',
                'bearing_efficiency_rwd' => 'pow(pow(gear_mesh_rwd, -gear_mesh_no_rwd)*gearbox_efficiency_rwd, 1/bearings_no_rwd)',
                'gear_mesh_rwd' => 'pow(pow(bearing_efficiency_rwd, -bearings_no_rwd)*gearbox_efficiency_rwd, 1/gear_mesh_no_rwd)',
            ],
        ],
        [
            'title' => 'propeller_shaft_eff = (bearings_rwd^propeller_shaft_bearings_rwd) * (joint_efficiency_rwd^joints_no_rwd)',
            'results' => [
                'bearings_rwd' => 'pow(pow(joint_efficiency_rwd, -joints_no_rwd)*propeller_shaft_eff, 1/propeller_shaft_bearings_rwd)',
                'propeller_shaft_bearings_rwd' => 'log(pow(joint_efficiency_rwd, -joints_no_rwd)*propeller_shaft_eff)/log(bearings_rwd)',
                'joints_no_rwd' => 'log(pow(bearings_rwd, -propeller_shaft_bearings_rwd)*propeller_shaft_eff)/log(joint_efficiency_rwd)',
                'propeller_shaft_eff' => 'pow(bearings_rwd, propeller_shaft_bearings_rwd)*pow(joint_efficiency_rwd, joints_no_rwd)',
                'joint_efficiency_rwd' => 'pow(pow(bearings_rwd, -propeller_shaft_bearings_rwd)*propeller_shaft_eff, 1/joints_no_rwd)',
            ],
        ],
        [
            'title' => 'differential_efficiency = (differential_bearings_rwd^differential_bearings_no_rwd) * (differential_gear_mesh_rwd^differential_gear_no_rwd)',
            'results' => [
                'differential_bearings_rwd' => 'pow(differential_efficiency*pow(differential_gear_mesh_rwd, -differential_gear_no_rwd), 1/differential_bearings_no_rwd)',
                'differential_efficiency' => 'pow(differential_bearings_rwd, differential_bearings_no_rwd)*pow(differential_gear_mesh_rwd, differential_gear_no_rwd)',
                'differential_gear_no_rwd' => 'log(pow(differential_bearings_rwd, -differential_bearings_no_rwd)*differential_efficiency)/log(differential_gear_mesh_rwd)',
                'differential_bearings_no_rwd' => 'log(differential_efficiency*pow(differential_gear_mesh_rwd, -differential_gear_no_rwd))/log(differential_bearings_rwd)',
                'differential_gear_mesh_rwd' => 'pow(pow(differential_bearings_rwd, -differential_bearings_no_rwd)*differential_efficiency, 1/differential_gear_no_rwd)',
            ],
        ],
        [
            'title' => 'driveshaft_rwd = tripod_joint * rzeppa_joint_eff',
            'results' => ['driveshaft_rwd' => 'rzeppa_joint_eff*tripod_joint', 'rzeppa_joint_eff' => 'driveshaft_rwd/tripod_joint', 'tripod_joint' => 'driveshaft_rwd/rzeppa_joint_eff'],
        ],
        [
            'title' => 'whp_f = bhp * neta_f',
            'results' => ['neta_f' => 'whp_f/bhp', 'bhp' => 'whp_f/neta_f', 'whp_f' => 'bhp*neta_f'],
        ],
        [
            'title' => 'neta_f = gearbox_efficiency_fwd * differential_eff_fwd * driveshaft_fwd',
            'results' => ['driveshaft_fwd' => 'neta_f/(differential_eff_fwd*gearbox_efficiency_fwd)', 'neta_f' => 'differential_eff_fwd*driveshaft_fwd*gearbox_efficiency_fwd', 'differential_eff_fwd' => 'neta_f/(driveshaft_fwd*gearbox_efficiency_fwd)', 'gearbox_efficiency_fwd' => 'neta_f/(differential_eff_fwd*driveshaft_fwd)'],
        ],
        [
            'title' => 'gearbox_efficiency_fwd = (bearing_efficiency_fwd^bearings_no_fwd) * (gear_mesh_fwd^gear_mesh_no_fwd)',
            'results' => [
                'gear_mesh_fwd' => 'pow(pow(bearing_efficiency_fwd, -bearings_no_fwd)*gearbox_efficiency_fwd, 1/gear_mesh_no_fwd)',
                'gear_mesh_no_fwd' => 'log(pow(bearing_efficiency_fwd, -bearings_no_fwd)*gearbox_efficiency_fwd)/log(gear_mesh_fwd)',
                'bearings_no_fwd' => 'log(pow(gear_mesh_fwd, -gear_mesh_no_fwd)*gearbox_efficiency_fwd)/log(bearing_efficiency_fwd)',
                'bearing_efficiency_fwd' => 'pow(pow(gear_mesh_fwd, -gear_mesh_no_fwd)*gearbox_efficiency_fwd, 1/bearings_no_fwd)',
                'gearbox_efficiency_fwd' => 'pow(bearing_efficiency_fwd, bearings_no_fwd)*pow(gear_mesh_fwd, gear_mesh_no_fwd)',
            ],
        ],
        [
            'title' => 'differential_eff_fwd = (differential_bearing_fwd^differential_bearings_no_fwd) * (differential_gear_mesh_fwd^differential_gear_no_fwd)',
            'results' => [
                'differential_gear_no_fwd' => 'log(pow(differential_bearing_fwd, -differential_bearings_no_fwd)*differential_eff_fwd)/log(differential_gear_mesh_fwd)',
                'differential_bearings_no_fwd' => 'log(differential_eff_fwd*pow(differential_gear_mesh_fwd, -differential_gear_no_fwd))/log(differential_bearing_fwd)',
                'differential_gear_mesh_fwd' => 'pow(pow(differential_bearing_fwd, -differential_bearings_no_fwd)*differential_eff_fwd, 1/differential_gear_no_fwd)',
                'differential_eff_fwd' => 'pow(differential_bearing_fwd, differential_bearings_no_fwd)*pow(differential_gear_mesh_fwd, differential_gear_no_fwd)',
                'differential_bearing_fwd' => 'pow(differential_eff_fwd*pow(differential_gear_mesh_fwd, -differential_gear_no_fwd), 1/differential_bearings_no_fwd)',
            ],
        ],
        [
            'title' => 'driveshaft_fwd = (driveshaft_joint_eff_fwd^joints_no_fwd) * (bearing_eff_fwd^driveshaft_bearings_no_fwd) * (velocity_joint_fwd^velocity_joints_no_fwd)',
            'results' => [
                'joints_no_fwd' => 'log(pow(bearing_eff_fwd, -driveshaft_bearings_no_fwd)*driveshaft_fwd*pow(velocity_joint_fwd, -velocity_joints_no_fwd))/log(driveshaft_joint_eff_fwd)',
                'velocity_joints_no_fwd' => 'log(pow(bearing_eff_fwd, -driveshaft_bearings_no_fwd)*driveshaft_fwd*pow(driveshaft_joint_eff_fwd, -joints_no_fwd))/log(velocity_joint_fwd)',
                'bearing_eff_fwd' => 'pow(driveshaft_fwd*pow(driveshaft_joint_eff_fwd, -joints_no_fwd)*pow(velocity_joint_fwd, -velocity_joints_no_fwd), 1/driveshaft_bearings_no_fwd)',
                'velocity_joint_fwd' => 'pow(pow(bearing_eff_fwd, -driveshaft_bearings_no_fwd)*driveshaft_fwd*pow(driveshaft_joint_eff_fwd, -joints_no_fwd), 1/velocity_joints_no_fwd)',
                'driveshaft_bearings_no_fwd' => 'log(driveshaft_fwd*pow(driveshaft_joint_eff_fwd, -joints_no_fwd)*pow(velocity_joint_fwd, -velocity_joints_no_fwd))/log(bearing_eff_fwd)',
                'driveshaft_joint_eff_fwd' => 'pow(pow(bearing_eff_fwd, -driveshaft_bearings_no_fwd)*driveshaft_fwd*pow(velocity_joint_fwd, -velocity_joints_no_fwd), 1/joints_no_fwd)',
                'driveshaft_fwd' => 'pow(bearing_eff_fwd, driveshaft_bearings_no_fwd)*pow(driveshaft_joint_eff_fwd, joints_no_fwd)*pow(velocity_joint_fwd, velocity_joints_no_fwd)',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Give the Wheel horsepower calculator the engine horsepower, the gearbox efficiency and the bearing efficiency and it returns <strong>rear wheel drivetrain efficiency</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Wheel horsepower calculator work?', 'html' => <<<'TXT'
            <p>The Wheel horsepower calculator takes the values in the form, applies the relationship described below and reports <strong>rear wheel drivetrain efficiency</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the drive type); then you type in the engine horsepower, the gearbox efficiency (Gearbox), the gearbox efficiency (Gearbox) and the bearing efficiency (Gearbox parameters).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as rear wheel drive (RWD) and front wheel drive (FWD). </li><li>A measured quantity, entered by default in mechanical horsepowers. The unit chip switches it to any of the 21 supported units.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li></ul><p>The form has 30 fields in total. The ones not listed here work the same way: a label, a unit chip where the quantity has units, and a box that updates the results as soon as it holds a valid number.</p><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Drive type</strong></td><td>One of 2 options, such as rear wheel drive (RWD) and front wheel drive (FWD).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Engine horsepower</strong></td><td>A measured quantity, 21 units available.</td><td>mechanical horsepowers</td><td>You supply it</td></tr><tr><td><strong>Gearbox efficiency (Gearbox)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Gearbox efficiency (Gearbox)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Bearing efficiency (Gearbox parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of bearings (Gearbox parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Gear mesh efficiency (Gearbox parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of gear meshes (Gearbox parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Bearing efficiency (Gearbox parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of bearings (Gearbox parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Gear mesh efficiency (Gearbox parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Number of gear meshes (Gearbox parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Propeller shaft efficiency</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Bearing efficiency (Propeller shaft parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Number of bearings (Propeller shaft parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Universal joint efficiency (Propeller shaft parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of universal joints (Propeller shaft parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Differential efficiency (Differential)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Bearing efficiency (Differential parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Number of bearings (Differential parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Gear mesh efficiency (Differential parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of gear meshes (Differential parameters)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Driveshaft efficiency (Driveshaft)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Rzeppa joint efficiency</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr></tbody></table><p>The table lists the first 24 of 39 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Wheel horsepower calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Rear wheel drivetrain efficiency</span><span class="formula-eq">=</span><span class="formula-rhs">wheel horsepower ÷ engine horsepower</span></div><div class="formula-row"><span class="formula-lhs">Rear wheel drivetrain efficiency</span><span class="formula-eq">=</span><span class="formula-rhs">differential efficiency × driveshaft efficiency × gearbox efficiency × propeller shaft efficiency</span></div><div class="formula-row"><span class="formula-lhs">Number of gear meshes</span><span class="formula-eq">=</span><span class="formula-rhs">the natural log of ((bearing efficiency ^ -number of bearings) × gearbox efficiency) ÷ the natural log of (gear mesh efficiency)</span></div><div class="formula-row"><span class="formula-lhs">Bearing efficiency</span><span class="formula-eq">=</span><span class="formula-rhs">((universal joint efficiency ^ -number of universal joints) × propeller shaft efficiency, 1 ÷ number of bearings)</span></div><div class="formula-row"><span class="formula-lhs">Bearing efficiency</span><span class="formula-eq">=</span><span class="formula-rhs">(differential efficiency × (gear mesh efficiency ^ -number of gear meshes), 1 ÷ number of bearings)</span></div><div class="formula-row"><span class="formula-lhs">Driveshaft efficiency</span><span class="formula-eq">=</span><span class="formula-rhs">rzeppa joint efficiency × tripod joint efficiency</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Drive type</strong> set to Rear wheel drive (RWD), <strong>Engine horsepower</strong> = 10 hp(l) and <strong>Wheel horsepower</strong> = 10 hp(l). Working through the relationship above gives <strong>Rear wheel drivetrain efficiency</strong> = 1.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Rear wheel drivetrain efficiency</strong> = 1 should be roughly the size you expected from <strong>Drive type</strong> set to Rear wheel drive (RWD) and <strong>Engine horsepower</strong> = 10 hp(l).</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Power, opening in mechanical horsepowers</li><li>Power, opening in mechanical horsepowers</li><li>Power, opening in mechanical horsepowers</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Wheel horsepower calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Any time the same 3 figures keep coming back — the engine horsepower, the gearbox efficiency and the bearing efficiency — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/jeans-size">Jeans size</a>, <a href="/everyday-life/keystrokes-per-hour">Keystrokes per hour</a> and <a href="/everyday-life/korean-age">Korean age</a>.</p>
            TXT],
            ['title' => 'Detailed use notes', 'html' => <<<'TXT'
            <p>Wheel horsepower estimates the power that reaches the wheels after losses through the drivetrain. The calculation depends on the selected drive layout and the efficiency values for components such as the gearbox, bearings, joints, gear meshes, differential and driveshaft. These values multiply through the power path, so several small losses can combine into a noticeable difference between engine horsepower and wheel horsepower.</p><p>Use efficiency as a fraction or percentage according to the field’s instructions, and check that each component applies to the vehicle configuration. A front-wheel-drive, rear-wheel-drive or other layout can route power through different parts. The result is an engineering estimate, not a substitute for a chassis-dynamometer measurement. Real losses vary with temperature, load, lubrication, tyre condition, gear selection and test method. Compare figures only when the measurement point and assumptions are similar.</p>
            TXT],
            ['title' => 'Before using the estimate', 'html' => <<<'TXT'
            <p>Build the drivetrain estimate from the components that carry power in the selected layout. The gearbox, bearings, gears, joints, differential and driveshaft each contribute an efficiency factor; multiplying the applicable factors by engine horsepower estimates power remaining at the wheels. Use the controls for the actual drive type so the calculation does not include components the vehicle does not have or omit components that it does.</p><p>Efficiency values are estimates and may be represented as percentages or decimal fractions, so follow each field’s format. Small changes across several components can compound. The result is not the same as a measured wheel-horsepower figure from a dynamometer: temperature, lubrication, gear, tyres, load and testing method matter. Compare vehicles only when measurement conditions and assumptions are similar, and rely on a qualified technician for tuning decisions.</p>
            TXT],
            ['title' => 'Interpreting drivetrain losses', 'html' => <<<'TXT'
            <p>Each efficiency input represents a fraction of power transmitted through a component, so the overall result is sensitive to both the selected path and the values assigned to it. A component with 95% efficiency passes approximately 95% of the power entering it; several such stages multiply rather than simply subtracting a single percentage once. Check that a percentage field is not mistakenly entered as a whole-number percent where a fractional value is expected.</p><p>Use a consistent engine-power basis and confirm the result unit. The estimate is useful for exploring assumptions, but a real drivetrain’s losses vary with load, speed, temperature and condition. Do not treat a model result as a measured dyno value.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wheel horsepower calculator work out?', 'a' => 'It returns rear wheel drivetrain efficiency, derived from the engine horsepower, the gearbox efficiency and the bearing efficiency.'],
            ['q' => 'What do I need to enter to use the Wheel horsepower calculator?', 'a' => 'The form asks for the engine horsepower, the gearbox efficiency and the bearing efficiency, which is 30 fields in total.'],
            ['q' => 'Can I enter engine horsepower in a different unit?', 'a' => 'Yes. Engine horsepower opens in mechanical horsepowers and the chip beside it offers 21 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Rear wheel drivetrain efficiency = 1.'],
        ],
        'related' => [
            ['path' => '/everyday-life/jeans-size', 'name' => 'Jeans size'],
            ['path' => '/everyday-life/keystrokes-per-hour', 'name' => 'Keystrokes per hour'],
            ['path' => '/everyday-life/korean-age', 'name' => 'Korean age'],
        ],
    ],
];
