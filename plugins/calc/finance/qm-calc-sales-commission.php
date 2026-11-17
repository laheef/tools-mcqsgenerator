<?php

/**
 * Sales commission
 * /finance/sales-commission
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sales commission',
    'meta' => ['title' => 'Sales commission — Formula, Steps & Examples', 'description' => 'Sales commission takes gross sales or revenue, Cost of goods sold (COGS) and selling expenses and returns gross profit and discount. Any box can be the unknown.', 'h1' => 'Sales commission Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Gross profit elements',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'SalesG',
                            'label' => 'Gross sales or revenue',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '10000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'COGS',
                            'label' => 'Cost of goods sold (COGS)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '4000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ProfitG',
                            'label' => 'Gross profit',
                            'type' => 'number',
                            'help' => 'Gross profit = gross sales - cost of goods sold.',
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
            'title' => 'Sales related costs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CostSell',
                            'label' => 'Selling expenses',
                            'type' => 'number',
                            'help' => 'Selling expenses are the costs associated with distributing, marketing, and selling a product or service.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '200',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DiscPer',
                            'label' => 'Discount rate',
                            'type' => 'number',
                            'help' => 'Discount rate = discount / gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Disc',
                            'label' => 'Discount',
                            'type' => 'number',
                            'help' => 'Discount = gross sales * discount rate.',
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
                        ['type' => 'note', 'text' => 'The gross sales doesn\'t cover the given costs (cost of goods sold + base salary + selling expenses).'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Labor cost elements',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'SalaryBase',
                            'label' => 'Base salary',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '780',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ComPer',
                            'label' => 'Commission rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ComType',
                            'label' => 'Commission based on...',
                            'type' => 'select',
                            'options' => [
                                'total gross sales' => '1',
                                'gross margin' => '21',
                                'excess above sales target' => '3',
                                'excess above sales margin target' => '2',
                                'gross margin and base pay target' => '4',
                                'tiered commission' => '31',
                            ],
                            'dataset' => 'ComissionType',
                            'control' => 'DROPDOWN',
                            'default' => 'gross margin and base pay target',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ComTier',
                            'label' => 'Total commission',
                            'type' => 'number',
                            'help' => 'Set the details in the section titled "Tiered commissions" below.',
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
                            'name' => 'Com',
                            'label' => 'Commission',
                            'type' => 'number',
                            'help' => 'Commission = gross sales × commission rate.',
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
                            'name' => 'SalesTarget',
                            'label' => 'Sales threshold (quota)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '8000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'sales_dif > 0', 'text' => 'The actual gross sales exceeds the target by {{sales_dif.monetaryValue}}.'],
                                ['when' => 'sales_dif <= 0', 'text' => 'The actual gross sales doesn\'t exceed the target—commission is not calculated.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Com3',
                            'label' => 'Commission',
                            'type' => 'number',
                            'help' => 'This commission is based on the gross sales surplus.',
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
                            'name' => 'MarginTarget',
                            'label' => 'Sales margin target',
                            'type' => 'number',
                            'help' => 'With this setting you can determine the level of gross sales (i.e. gross sales threshold) that covers the base salary while ensuring the given margin target.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '35',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'ComBase != 0', 'text' => <<<'TXT'
                                The gross sales threshold (quota) adjusted for margin, that is, the minimum gross sales to cover the base salary (without commission) while keeping a {{MarginTarget.formattedValue}}% operational margin is {{SalesThreshold.monetaryValue}}.
                                TXT],
                                ['when' => 'ComBase < -0.1', 'text' => <<<'TXT'
                                The actual gross sales needs to be {{neg_ComBase.monetaryValue}} more to reach the target. Since the actual gross sales is lower than the sales treshold (quota), there is no commission calculated.&nbsp;
                                TXT],
                                ['when' => 'ComBase > 0.1 and ((-0.1 <= ComPer <= 0.1) or ComPer > 0.1)', 'text' => 'The actual gross sales exceeds the target by {{ComBase.monetaryValue}}.&nbsp;'],
                                ['when' => 'noresult == 0 and -0.1 <= ComBase <= 0.1', 'text' => <<<'TXT'
                                The actual gross sales of {{SalesG.monetaryValue}} just covers the base salary (without commission) while keeping the {{MarginTarget.formattedValue}}% margin target. Since the actual sales doesn't exceed the target, there is no commission calculated.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Com2',
                            'label' => 'Commission',
                            'type' => 'number',
                            'help' => 'This commission is based on the gross sales surplus above th margin target.',
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
                        ['type' => 'note', 'text' => 'At least one of the expenses (base salary, COGS, selling expenses or discount) needs to be set for the calculation to work.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ComMar',
                            'label' => 'Commission',
                            'type' => 'number',
                            'help' => 'This commission is based on the gross sales surplus above the margin target.',
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
                            'name' => 'BasePayPer',
                            'label' => 'Base pay target',
                            'type' => 'number',
                            'help' => 'Base pay to gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TargetGross',
                            'label' => 'Gross margin target',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'SalesThres',
                            'label' => 'Sales threshold',
                            'type' => 'number',
                            'help' => 'Sales threshold = (base salary / base pay to sales) / (gross margin / gross margin target).',
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
                        ['type' => 'note', 'text' => 'Since the gross sales doesn\'t exceed the sales threshold, commission is not calculated.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ComBase4',
                            'label' => 'Commission base',
                            'type' => 'number',
                            'help' => 'Commission base = gross sales - sales threshold.',
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
                            'name' => 'Com4',
                            'label' => 'Commission',
                            'type' => 'number',
                            'help' => 'Commission = sales threshold × commission rate.',
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
                            'name' => 'LaborCost',
                            'label' => 'Total labor cost or OTE',
                            'type' => 'number',
                            'help' => 'OTE = base salary + commission.',
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
                            'name' => 'LaborCost2',
                            'label' => 'Total labor cost or OTE',
                            'type' => 'number',
                            'help' => 'OTE = base salary + commission.',
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
                            'name' => 'LaborCost3',
                            'label' => 'Total labor cost or OTE',
                            'type' => 'number',
                            'help' => 'OTE = base salary + commission.',
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
                            'name' => 'LaborCost4',
                            'label' => 'Total labor cost or OTE',
                            'type' => 'number',
                            'help' => 'OTE = base salary + commission.',
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
                            'name' => 'LaborCostMar',
                            'label' => 'Total labor cost or OTE',
                            'type' => 'number',
                            'help' => 'OTE = base salary + commission.',
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
                            'name' => 'LaborCostTier',
                            'label' => 'Total labor cost or OTE',
                            'type' => 'number',
                            'help' => 'OTE = base salary + commission.',
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
            'title' => 'Tiered commissions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ComRateT0',
                            'label' => 'Rate up to Tier #1',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Tier1',
                            'label' => 'Tier #1',
                            'type' => 'number',
                            'help' => 'You must set at least Tier #1.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '1000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Tier2 > Tier1 and Tier1 == 0', 'text' => 'Tier #1 must be given if Tier #2 is set.'],
                                ['when' => 'Tier1 == 0', 'text' => 'Tier #1 must be set.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ComRateT1',
                            'label' => 'Rate above Tier #1',
                            'type' => 'number',
                            'help' => 'You must set the rate above Tier #1.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Rate above Tier #1 must be set.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Tier2',
                            'label' => 'Tier #2',
                            'type' => 'number',
                            'help' => 'Set to zero in case you don\'t need it.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '2500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Tier2 <= Tier1 and Tier1 > 0 and Tier2 != 0', 'text' => 'Tier #2 must be larger than Tier #1.'],
                                ['when' => 'Tier3 > Tier2 and Tier2 == 0', 'text' => 'Tier #2 must be given if Tier #3 is set.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ComRateT2',
                            'label' => 'Rate above Tier #2',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'If Tier #2 is set, the commission rate must be larger than zero.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Tier3',
                            'label' => 'Tier #3',
                            'type' => 'number',
                            'help' => 'Set to zero in case you don\'t need it.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '5000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Tier #3 must be larger than Tier #2.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ComRateT3',
                            'label' => 'Rate above Tier #3',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'If Tier #3 is set, the commission rate must be larger than zero.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Operational profit elements',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CostOp',
                            'label' => 'Operational cost',
                            'type' => 'number',
                            'help' => 'Operational cost = labor cost + selling expenses + discount.',
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
                            'name' => 'CostOp2',
                            'label' => 'Operational cost',
                            'type' => 'number',
                            'help' => 'Operational cost = labor cost + selling expenses + discount.',
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
                            'name' => 'CostOp3',
                            'label' => 'Operational cost',
                            'type' => 'number',
                            'help' => 'Operational cost = labor cost + selling expenses + discount.',
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
                            'name' => 'CostOp4',
                            'label' => 'Operational cost',
                            'type' => 'number',
                            'help' => 'Operational cost = labor cost + selling expenses + discount.',
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
                            'name' => 'CostOpTier',
                            'label' => 'Operational cost',
                            'type' => 'number',
                            'help' => 'Operational cost = labor cost + selling expenses + discount.',
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
                            'name' => 'CostOpMar',
                            'label' => 'Operational cost',
                            'type' => 'number',
                            'help' => 'Operational cost = labor cost + selling expenses + discount.',
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
                            'name' => 'ProfitOp',
                            'label' => 'Operational profit',
                            'type' => 'number',
                            'help' => 'Operational profit = gross profit − operational cost.',
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
                            'name' => 'ProfitOp2',
                            'label' => 'Operational profit',
                            'type' => 'number',
                            'help' => 'Operational profit = gross profit − operational cost.',
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
                            'name' => 'ProfitOp3',
                            'label' => 'Operational profit',
                            'type' => 'number',
                            'help' => 'Operational profit = gross profit − operational cost.',
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
                            'name' => 'ProfitOp4',
                            'label' => 'Operational profit',
                            'type' => 'number',
                            'help' => 'Operational profit = gross profit − operational cost.',
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
                            'name' => 'ProfitOpMar',
                            'label' => 'Operational profit',
                            'type' => 'number',
                            'help' => 'Operational profit = gross profit − operational cost.',
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
                            'name' => 'ProfitOpTier',
                            'label' => 'Operational profit',
                            'type' => 'number',
                            'help' => 'Operational profit = gross profit − operational cost.',
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
                            'name' => 'MarginGross',
                            'label' => 'Gross sales margin ',
                            'type' => 'number',
                            'help' => 'Gross sales margin = gross profit − (base salary + selling expenses + discount) or gross sales margin = operational profit + commission.',
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
            'title' => 'Further metrics',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MarginOP',
                            'label' => 'Operational margin (Sales margin)',
                            'type' => 'number',
                            'help' => 'Operational margin = operational profit / gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MarginOP2',
                            'label' => 'Operational margin (Sales margin)',
                            'type' => 'number',
                            'help' => 'Operational margin = operational profit / gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MarginOP3',
                            'label' => 'Operational margin (Sales margin)',
                            'type' => 'number',
                            'help' => 'Operational margin = operational profit / gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MarginOP4',
                            'label' => 'Operational margin (Sales margin)',
                            'type' => 'number',
                            'help' => 'Operational margin = operational profit / gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MarginOPMar',
                            'label' => 'Operational margin (Sales margin)',
                            'type' => 'number',
                            'help' => 'Operational margin = operational profit / gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MarginOPTier',
                            'label' => 'Operational margin (Sales margin)',
                            'type' => 'number',
                            'help' => 'Operational margin = operational profit / gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MarginGross2',
                            'label' => 'Gross margin rate',
                            'type' => 'number',
                            'help' => 'Gross margin rate = gross profit / gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LaborCostPerc',
                            'label' => 'Labor cost to sales',
                            'type' => 'number',
                            'help' => 'Labor cost to sales = labor cost / gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LaborCostPerc2',
                            'label' => 'Labor cost to sales',
                            'type' => 'number',
                            'help' => 'Labor cost to sales = labor cost / gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LaborCostPerc3',
                            'label' => 'Labor cost to sales',
                            'type' => 'number',
                            'help' => 'Labor cost to sales = labor cost / gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LaborCostPerc4',
                            'label' => 'Labor cost to sales',
                            'type' => 'number',
                            'help' => 'Labor cost to sales = labor cost / gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LaborCostPercTier',
                            'label' => 'Labor cost to sales',
                            'type' => 'number',
                            'help' => 'Labor cost to sales = labor cost / gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LaborCostPercMar',
                            'label' => 'Labor cost to sales',
                            'type' => 'number',
                            'help' => 'Labor cost to sales = labor cost / gross sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
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
                            'name' => 'SalesThreshold',
                            'label' => 'Sales threshold',
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
                            'name' => 'ComT0',
                            'label' => 'Com t0',
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
                            'name' => 'ComT1',
                            'label' => 'Com t1',
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
                            'name' => 'ComT2',
                            'label' => 'Com t2',
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
                            'name' => 'ComT3',
                            'label' => 'Com t3',
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
                            'name' => 'sales_dif',
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
                            'name' => 'ComBase',
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
                            'name' => 'neg_ComBase',
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
                            'name' => 'noresult',
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
                            'name' => 'initial_val',
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
                            'name' => 'condition',
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
            'title' => 'ProfitG = one_way(SalesG - COGS)',
            'results' => ['ProfitG' => '(-COGS + SalesG)'],
        ],
        [
            'title' => 'CostOp = one_way(SalaryBase + Com + CostSell + Disc)',
            'results' => ['CostOp' => '(Com + CostSell + Disc + SalaryBase)'],
        ],
        [
            'title' => 'Disc = SalesG * DiscPer',
            'results' => ['SalesG' => 'Disc/DiscPer', 'DiscPer' => 'Disc/SalesG', 'Disc' => 'DiscPer*SalesG'],
        ],
        [
            'title' => 'Com2 =returnCom2(COGS, SalaryBase, CostSell, MarginTarget, SalesG, ComPer, Disc)',
            'results' => ['Com2' => 'returnCom2(COGS, SalaryBase, CostSell, MarginTarget, SalesG, ComPer, Disc)'],
        ],
        [
            'title' => 'CostOp2 = one_way(SalaryBase + Com2+ CostSell + Disc)',
            'results' => ['CostOp2' => '(CostSell + Disc + SalaryBase + returnCom2(COGS, SalaryBase, CostSell, MarginTarget, SalesG, ComPer, Disc))'],
        ],
        [
            'title' => 'CostOpTier = one_way(SalaryBase + ComTier+ CostSell + Disc)',
            'results' => ['CostOpTier' => '(CostSell + Disc + SalaryBase + returnComTier(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG))'],
        ],
        [
            'title' => 'CostOpMar = one_way(SalaryBase + ComMar+ CostSell + Disc)',
            'results' => ['CostOpMar' => '(CostSell + Disc + SalaryBase + (ComPer*(-CostSell - Disc - SalaryBase + (-COGS + SalesG))))'],
        ],
        [
            'title' => 'CostOp3 = one_way(SalaryBase + Com3 + CostSell + Disc)',
            'results' => ['CostOp3' => '(CostSell + Disc + SalaryBase + returnCom3(SalesG, SalesTarget, ComPer))'],
        ],
        [
            'title' => 'CostOp4 = one_way(SalaryBase + Com4 + CostSell + Disc)',
            'results' => ['CostOp4' => '(CostSell + Disc + SalaryBase + returnCom4(returnComBase4(SalesG, (SalaryBase*TargetGross/(BasePayPer*((-COGS + SalesG)/SalesG)))), ComPer))'],
        ],
        [
            'title' => 'ProfitOp = one_way(ProfitG - CostOp)',
            'results' => ['ProfitOp' => '((-COGS + SalesG) - (Com + CostSell + Disc + SalaryBase))'],
        ],
        [
            'title' => 'ProfitOp2 = one_way(ProfitG - CostOp2)',
            'results' => ['ProfitOp2' => '((-COGS + SalesG) - (CostSell + Disc + SalaryBase + returnCom2(COGS, SalaryBase, CostSell, MarginTarget, SalesG, ComPer, Disc)))'],
        ],
        [
            'title' => 'ProfitOp3 = one_way(ProfitG - CostOp3)',
            'results' => ['ProfitOp3' => '((-COGS + SalesG) - (CostSell + Disc + SalaryBase + returnCom3(SalesG, SalesTarget, ComPer)))'],
        ],
        [
            'title' => 'ProfitOp4 = one_way(ProfitG - CostOp4)',
            'results' => ['ProfitOp4' => <<<'TXT'
            ((-COGS + SalesG) - (CostSell + Disc + SalaryBase + returnCom4(returnComBase4(SalesG, (SalaryBase*TargetGross/(BasePayPer*((-COGS + SalesG)/SalesG)))), ComPer)))
            TXT],
        ],
        [
            'title' => 'ProfitOpTier = one_way(ProfitG - CostOpTier)',
            'results' => ['ProfitOpTier' => '((-COGS + SalesG) - (CostSell + Disc + SalaryBase + returnComTier(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG)))'],
        ],
        [
            'title' => 'ProfitOpMar = one_way(ProfitG - CostOpMar)',
            'results' => ['ProfitOpMar' => '((-COGS + SalesG) - (CostSell + Disc + SalaryBase + (ComPer*(-CostSell - Disc - SalaryBase + (-COGS + SalesG)))))'],
        ],
        [
            'title' => 'MarginOP = one_way(ProfitOp  / SalesG)',
            'results' => ['MarginOP' => '(((-COGS + SalesG) - (Com + CostSell + Disc + SalaryBase))/SalesG)'],
        ],
        [
            'title' => 'MarginOP2 = one_way(ProfitOp2  / SalesG)',
            'results' => ['MarginOP2' => '(((-COGS + SalesG) - (CostSell + Disc + SalaryBase + returnCom2(COGS, SalaryBase, CostSell, MarginTarget, SalesG, ComPer, Disc)))/SalesG)'],
        ],
        [
            'title' => 'MarginOP3 = one_way(ProfitOp3  / SalesG)',
            'results' => ['MarginOP3' => '(((-COGS + SalesG) - (CostSell + Disc + SalaryBase + returnCom3(SalesG, SalesTarget, ComPer)))/SalesG)'],
        ],
        [
            'title' => 'MarginOP4 = one_way(ProfitOp4  / SalesG)',
            'results' => ['MarginOP4' => <<<'TXT'
            (((-COGS + SalesG) - (CostSell + Disc + SalaryBase + returnCom4(returnComBase4(SalesG, (SalaryBase*TargetGross/(BasePayPer*((-COGS + SalesG)/SalesG)))), ComPer)))/SalesG)
            TXT],
        ],
        [
            'title' => 'MarginOPTier = one_way(ProfitOpTier  / SalesG)',
            'results' => ['MarginOPTier' => '(((-COGS + SalesG) - (CostSell + Disc + SalaryBase + returnComTier(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG)))/SalesG)'],
        ],
        [
            'title' => 'MarginOPMar = one_way(ProfitOpMar  / SalesG)',
            'results' => ['MarginOPMar' => '(((-COGS + SalesG) - (CostSell + Disc + SalaryBase + (ComPer*(-CostSell - Disc - SalaryBase + (-COGS + SalesG)))))/SalesG)'],
        ],
        [
            'title' => 'Com = SalesG * ComPer',
            'results' => ['ComPer' => 'Com/SalesG', 'SalesG' => 'Com/ComPer', 'Com' => 'ComPer*SalesG'],
        ],
        [
            'title' => 'LaborCost = one_way(SalaryBase + Com)',
            'results' => ['LaborCost' => '(Com + SalaryBase)'],
        ],
        [
            'title' => 'LaborCost2 = one_way(SalaryBase + Com2)',
            'results' => ['LaborCost2' => '(SalaryBase + returnCom2(COGS, SalaryBase, CostSell, MarginTarget, SalesG, ComPer, Disc))'],
        ],
        [
            'title' => 'LaborCost3 = one_way(SalaryBase + Com3)',
            'results' => ['LaborCost3' => '(SalaryBase + returnCom3(SalesG, SalesTarget, ComPer))'],
        ],
        [
            'title' => 'LaborCost4 = one_way(SalaryBase + Com4)',
            'results' => ['LaborCost4' => '(SalaryBase + returnCom4(returnComBase4(SalesG, (SalaryBase*TargetGross/(BasePayPer*((-COGS + SalesG)/SalesG)))), ComPer))'],
        ],
        [
            'title' => 'LaborCostTier = one_way(SalaryBase + ComTier)',
            'results' => ['LaborCostTier' => '(SalaryBase + returnComTier(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG))'],
        ],
        [
            'title' => 'LaborCostMar = one_way(SalaryBase + ComMar)',
            'results' => ['LaborCostMar' => '(SalaryBase + (ComPer*(-CostSell - Disc - SalaryBase + (-COGS + SalesG))))'],
        ],
        [
            'title' => 'LaborCostPerc = one_way(LaborCost / SalesG)',
            'results' => ['LaborCostPerc' => '((Com + SalaryBase)/SalesG)'],
        ],
        [
            'title' => 'LaborCostPerc2 = one_way(LaborCost2 / SalesG)',
            'results' => ['LaborCostPerc2' => '((SalaryBase + returnCom2(COGS, SalaryBase, CostSell, MarginTarget, SalesG, ComPer, Disc))/SalesG)'],
        ],
        [
            'title' => 'LaborCostPerc3 = one_way(LaborCost3 / SalesG)',
            'results' => ['LaborCostPerc3' => '((SalaryBase + returnCom3(SalesG, SalesTarget, ComPer))/SalesG)'],
        ],
        [
            'title' => 'LaborCostPerc4 = one_way(LaborCost4 / SalesG)',
            'results' => ['LaborCostPerc4' => '((SalaryBase + returnCom4(returnComBase4(SalesG, (SalaryBase*TargetGross/(BasePayPer*((-COGS + SalesG)/SalesG)))), ComPer))/SalesG)'],
        ],
        [
            'title' => 'LaborCostPercTier = one_way(LaborCostTier/ SalesG)',
            'results' => ['LaborCostPercTier' => '((SalaryBase + returnComTier(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG))/SalesG)'],
        ],
        [
            'title' => 'LaborCostPercMar = one_way(LaborCostMar/ SalesG)',
            'results' => ['LaborCostPercMar' => '((SalaryBase + (ComPer*(-CostSell - Disc - SalaryBase + (-COGS + SalesG))))/SalesG)'],
        ],
        [
            'title' => 'Com3 = returnCom3(SalesG, SalesTarget, ComPer)',
            'results' => ['Com3' => 'returnCom3(SalesG, SalesTarget, ComPer)'],
        ],
        [
            'title' => 'ComMar = one_way(ComPer * MarginGross)',
            'results' => ['ComMar' => '(ComPer*(-CostSell - Disc - SalaryBase + (-COGS + SalesG)))'],
        ],
        [
            'title' => 'MarginGross = one_way((ProfitG - (SalaryBase + CostSell + Disc)))',
            'results' => ['MarginGross' => '(-CostSell - Disc - SalaryBase + (-COGS + SalesG))'],
        ],
        [
            'title' => 'ComTier =returnComTier(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG)',
            'results' => ['ComTier' => 'returnComTier(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG)'],
        ],
        [
            'title' => 'MarginGross2 = one_way(ProfitG / SalesG)',
            'results' => ['MarginGross2' => '((-COGS + SalesG)/SalesG)'],
        ],
        [
            'title' => 'SalesThres = one_way((SalaryBase / BasePayPer) / (MarginGross2 / TargetGross))',
            'results' => ['SalesThres' => '(SalaryBase*TargetGross/(BasePayPer*((-COGS + SalesG)/SalesG)))'],
        ],
        [
            'title' => 'ComBase4 = returnComBase4(SalesG, SalesThres)',
            'results' => ['ComBase4' => 'returnComBase4(SalesG, (SalaryBase*TargetGross/(BasePayPer*((-COGS + SalesG)/SalesG))))'],
        ],
        [
            'title' => 'Com4 = returnCom4(ComBase4, ComPer)',
            'results' => ['Com4' => 'returnCom4(returnComBase4(SalesG, (SalaryBase*TargetGross/(BasePayPer*((-COGS + SalesG)/SalesG)))), ComPer)'],
        ],
        [
            'title' => 'SalesThreshold = get_SalesThreshold(SalesG, COGS, SalaryBase, CostSell, Disc, MarginTarget)',
            'results' => ['SalesThreshold' => 'get_SalesThreshold(SalesG, COGS, SalaryBase, CostSell, Disc, MarginTarget)'],
        ],
        [
            'title' => 'ComT0 = get_ComT(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG, 0)',
            'results' => ['ComT0' => 'get_ComT(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG, 0)'],
        ],
        [
            'title' => 'ComT1 = get_ComT(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG, 1)',
            'results' => ['ComT1' => 'get_ComT(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG, 1)'],
        ],
        [
            'title' => 'ComT2 = get_ComT(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG, 2)',
            'results' => ['ComT2' => 'get_ComT(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG, 2)'],
        ],
        [
            'title' => 'ComT3 = get_ComT(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG, 3)',
            'results' => ['ComT3' => 'get_ComT(ComRateT0, ComRateT1, ComRateT2, ComRateT3, Tier1, Tier2, Tier3, SalesG, 3)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";function com_rate(ComRateT0,ComRateT1,ComRateT2,ComRateT3,Tier1,Tier2,Tier3,SalesG){var ComT0=0;var ComT1=0;var ComT2=0;var ComT3=0;ComT0=ComRateT0*SalesG;ComT1=ComRateT1*(Tier2-Tier1);ComT2=ComRateT2*(Tier3-Tier2);ComT3=ComRateT3*(SalesG-Tier3);if(Tier1<=SalesG){if(ComRateT0<0){ComRateT0=0}ComT0=ComRateT0*Tier1}if(Tier1>SalesG){ComT0=ComRateT0*SalesG;Tier1=SalesG}if(Tier1<=SalesG&&Tier2>=SalesG||Tier2===0){ComT0=Tier1*ComRateT0;ComT1=(SalesG-Tier1)*ComRateT1;ComT2=0;ComT3=0;Tier2=SalesG}if(Tier2<=SalesG&&Tier3>=SalesG||Tier3===0){ComT0=Tier1*ComRateT0;ComT1=(Tier2-Tier1)*ComRateT1;ComT2=(SalesG-Tier2)*ComRateT2;ComT3=0;Tier3=SalesG}if(Tier3<=SalesG){ComT0=Tier1*ComRateT0;ComT1=(Tier2-Tier1)*ComRateT1;ComT2=(Tier3-Tier2)*ComRateT2;ComT3=(SalesG-Tier3)*ComRateT3}var comT=[ComT0,ComT1,ComT2,ComT3];return comT}omni.define("get_ComT",function(ComRateT0,ComRateT1,ComRateT2,ComRateT3,Tier1,Tier2,Tier3,SalesG,index){var comT_index=com_rate(ComRateT0,ComRateT1,ComRateT2,ComRateT3,Tier1,Tier2,Tier3,SalesG)[index];return comT_index});omni.define("get_noresult",function(SalaryBase,COGS,CostSell,Disc,VarCom){var noresult=0;if(SalaryBase===0&&COGS===0&&CostSell===0&&Disc===0&&VarCom===2){noresult=1}return noresult});omni.define("get_SalesThreshold",function(SalesG,COGS,SalaryBase,CostSell,Disc,MarginTarget){var iteration=0;var MAX_ITERATIONS=500000;var MIN_PRECISION=1e-7;var oldI_SalesG;var newI_SalesG=(SalesG-COGS-SalaryBase-CostSell-Disc)/SalesG;do{oldI_SalesG=newI_SalesG;var dividend=(newI_SalesG-COGS-(SalaryBase+CostSell+Disc))/newI_SalesG-MarginTarget;var divisor=(COGS+SalaryBase+CostSell+Disc)/mathjs.pow(newI_SalesG,2);newI_SalesG=newI_SalesG-dividend/divisor;++iteration}while(Math.abs(oldI_SalesG-newI_SalesG)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var SalesThreshold=newI_SalesG;return SalesThreshold});omni.define("returnComTier",function(ComRateT0,ComRateT1,ComRateT2,ComRateT3,Tier1,Tier2,Tier3,SalesG){var ComT0=0;var ComT1=0;var ComT2=0;var ComT3=0;var ComTier=0;var hide=0;if(Tier1>0&&ComRateT1===0){hide=1}if(Tier2>0&&ComRateT2===0){hide=1}if(Tier3>0&&ComRateT3===0){hide=1}if(Tier2<=Tier1&&Tier1>0&&Tier2!==0){hide=1}if(Tier3<=Tier2&&Tier2>0&&Tier3!==0){hide=1}if(Tier2>Tier1&&Tier1===0){hide=1}if(Tier3>Tier2&&Tier2===0){hide=1}if(Tier1===0){hide=1}ComT0=ComRateT0*SalesG;ComT1=ComRateT1*(SalesG-Tier1);ComT2=ComRateT2*(SalesG-Tier2);ComT3=ComRateT3*(SalesG-Tier3);if(Tier1<=SalesG){if(ComRateT0<0){ComRateT0=0}ComT0=ComRateT0*Tier1}if(Tier1>SalesG){ComT0=ComRateT0*SalesG;Tier1=SalesG}if(Tier1<=SalesG&&Tier2>=SalesG||Tier2===0){ComT0=Tier1*ComRateT0;ComT1=(SalesG-Tier1)*ComRateT1;ComT2=0;ComT3=0;Tier2=SalesG}if(Tier2<=SalesG&&Tier3>=SalesG||Tier3===0){ComT0=Tier1*ComRateT0;ComT1=(SalesG-Tier1)*ComRateT1;ComT2=(SalesG-Tier2)*ComRateT2;ComT3=0;Tier3=SalesG}if(Tier3<=SalesG){ComT0=Tier1*ComRateT0;ComT1=(SalesG-Tier1)*ComRateT1;ComT2=(SalesG-Tier2)*ComRateT2;ComT3=(SalesG-Tier3)*ComRateT3}if(hide===0){ComTier=ComT0+ComT1+ComT2+ComT3}else{ComTier=0}return mathjs.bignumber(mathjs.round(ComTier,0))});omni.define("returnComBase4",function(SalesG,SalesThres){var ComBase4=SalesG-SalesThres;if(ComBase4<0){ComBase4=0}return mathjs.bignumber(mathjs.round(ComBase4,0))});omni.define("returnCom4",function(ComBase4,ComPer){var Com4=ComBase4*ComPer;if(Com4<0){Com4=0}return mathjs.bignumber(mathjs.round(Com4,0))});omni.define("returnCom3",function(SalesG,SalesTarget,ComPer){var Com3=(SalesG-SalesTarget)*ComPer;if(Com3<0){Com3=0}return mathjs.bignumber(mathjs.round(Com3,0))});omni.define("returnCom2",function(COGS,SalaryBase,CostSell,MarginTarget,SalesG,ComPer,Disc){var iteration=0;var MAX_ITERATIONS=500000;var MIN_PRECISION=1e-7;var oldI_SalesG;var newI_SalesG=(SalesG-COGS-SalaryBase-CostSell-Disc)/SalesG;do{oldI_SalesG=newI_SalesG;var dividend=(newI_SalesG-COGS-(SalaryBase+CostSell+Disc))/newI_SalesG-MarginTarget;var divisor=(COGS+SalaryBase+CostSell+Disc)/mathjs.pow(newI_SalesG,2);newI_SalesG=newI_SalesG-dividend/divisor;++iteration}while(Math.abs(oldI_SalesG-newI_SalesG)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var SalesThreshold=newI_SalesG;var ComBase=SalesG-SalesThreshold;var Com2=ComBase*ComPer;if(Com2<=0){Com2=0}if(SalaryBase===0&&COGS===0&&CostSell===0&&Disc===0){Com2=0}return mathjs.bignumber(mathjs.round(Com2,0))});omni.define("get_condition",function(SalesG,COGS,SalaryBase,CostSell,Disc){if(SalesG>COGS+SalaryBase+CostSell+Disc){return 1}return 0});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Gross sales or revenue and Cost of goods sold (COGS) into Sales commission and the answer comes back as Gross profit and Discount rate. It is a single relationship that reads gross profit out of gross sales or revenue, not a table of canned results keyed by them. Units for Gross profit default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Sales commission calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Sales commission: it takes 2 numbers and reports Gross profit, Discount rate and Discount.</p><p>In the form&#039;s own words, Gross profit = ( − Cost of goods sold (COGS) + Gross sales or revenue).</p><p>What comes back is Gross profit, Discount rate, Discount and Commission rate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Gross sales or revenue</strong> — in USD</li><li><strong>Cost of goods sold (COGS)</strong> — in USD</li></ul><p>The answers come back as Gross profit in USD, Discount rate in percent, Discount in USD, Commission rate in percent, Total commission in USD, Commission in USD, Commission in USD, Commission in USD, Commission in USD, Sales threshold in USD, Commission base in USD, Commission in USD, Total labor cost or OTE in USD, Total labor cost or OTE in USD, Total labor cost or OTE in USD, Total labor cost or OTE in USD, Total labor cost or OTE in USD, Total labor cost or OTE in USD, Operational cost in USD, Operational cost in USD, Operational cost in USD, Operational cost in USD, Operational cost in USD, Operational cost in USD, Operational profit in USD, Operational profit in USD, Operational profit in USD, Operational profit in USD, Operational profit in USD, Operational profit in USD, Gross sales margin in USD, Operational margin (Sales margin) in percent, Operational margin (Sales margin) in percent, Operational margin (Sales margin) in percent, Operational margin (Sales margin) in percent, Operational margin (Sales margin) in percent, Operational margin (Sales margin) in percent, Gross margin rate in percent, Labor cost to sales in percent, Labor cost to sales in percent, Labor cost to sales in percent, Labor cost to sales in percent, Labor cost to sales in percent, Labor cost to sales in percent, Sales threshold in USD, Com t0 in USD, Com t1 in USD, Com t2 in USD, Com t3 in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Discount rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Gross profit</strong> = <code>( − Cost of goods sold (COGS) + Gross sales or revenue)</code></li><li><strong>Operational cost</strong> = <code>(Commission + Selling expenses + Discount + Base salary)</code></li><li><strong>Discount</strong> = <code>Discount rate × Gross sales or revenue</code></li><li><strong>Gross sales or revenue</strong> = <code>Discount ÷ Discount rate</code></li><li><strong>Discount rate</strong> = <code>Discount ÷ Gross sales or revenue</code></li><li><strong>Commission</strong> = <code>returnCom2(Cost of goods sold (COGS), Base salary, Selling expenses, Sales margin target, Gross sales or revenue, Commission rate, Discount)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Gross profit</strong> = <code>( − Cost of goods sold (COGS) + Gross sales or revenue)</code> — the form to use when Cost of goods sold (COGS) and Gross sales or revenue are the values you have.</li><li><strong>Operational cost</strong> = <code>(Commission + Selling expenses + Discount + Base salary)</code> — the form to use when Commission, Selling expenses, Discount and Base salary are the values you have.</li><li><strong>Discount</strong> = <code>Discount rate × Gross sales or revenue</code> — the form to use when Discount rate and Gross sales or revenue are the values you have.</li><li><strong>Gross sales or revenue</strong> = <code>Discount ÷ Discount rate</code> — the form to use when Discount and Discount rate are the values you have.</li><li><strong>Discount rate</strong> = <code>Discount ÷ Gross sales or revenue</code> — the form to use when Discount and Gross sales or revenue are the values you have.</li><li><strong>Commission</strong> = <code>returnCom2(Cost of goods sold (COGS), Base salary, Selling expenses, Sales margin target, Gross sales or revenue, Commission rate, Discount)</code> — the form to use when Cost of goods sold (COGS), Base salary, Selling expenses and Sales margin target are the values you have.</li><li><strong>Operational cost</strong> = <code>(Selling expenses + Discount + Base salary + returnCom2(Cost of goods sold (COGS), Base salary, Selling expenses, Sales margin target, Gross sales or revenue, Commission rate, Discount))</code> — the form to use when Selling expenses, Discount, Base salary and Cost of goods sold (COGS) are the values you have.</li><li><strong>Operational cost</strong> = <code>(Selling expenses + Discount + Base salary + returnComTier(Rate up to Tier #1, Rate above Tier #1, Rate above Tier #2, Rate above Tier #3, Tier #1, Tier #2, Tier #3, Gross sales or revenue))</code> — the form to use when Selling expenses, Discount, Base salary and Rate up to Tier #1 are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Gross profit, Operational cost and Discount can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Gross profit, Discount rate and Discount are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Gross sales or revenue left as a guess.</strong> Anything typed into Gross sales or revenue is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Cost of goods sold (COGS) left as a guess.</strong> Anything typed into Cost of goods sold (COGS) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Gross sales or revenue is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Sales commission form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Gross sales or revenue</strong> takes a plain number with no unit attached. The page reads it when it works out Gross profit, Discount rate and Discount. Fill it from a measurement rather than a memory — Gross sales or revenue is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cost of goods sold (COGS)</strong> takes a plain number with no unit attached. The page reads it when it works out Gross profit, Commission and Operational cost. Fill it from a measurement rather than a memory — Cost of goods sold (COGS) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Gross sales or revenue and Cost of goods sold (COGS) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Gross sales or revenue — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Gross profit in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Gross profit is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Gross sales or revenue and Cost of goods sold (COGS) measured, Gross profit and Discount rate wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/net-to-gross">Net to gross Calculator</a>, <a href="/finance/net-worth">Net worth Calculator</a> and <a href="/finance/new-jersey-sales-tax">New Jersey sales tax</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Sales commission is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sales commission calculator work out?', 'a' => <<<'TXT'
            Gross profit, Discount rate, Discount and Commission rate, from Cost of goods sold (COGS) and Gross sales or revenue. The relationship is Gross profit = ( − Cost of goods sold (COGS) + Gross sales or revenue).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Gross sales or revenue (USD), Cost of goods sold (COGS) (USD). Enter gross sales or revenue and cost of goods sold (COGS); Gross profit is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Gross profit, Operational cost, Discount and Gross sales or revenue can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Gross profit is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Gross sales or revenue blank and the page solves for it, reporting Gross profit instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Gross profit keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/net-to-gross', 'name' => 'Net to gross Calculator'],
            ['path' => '/finance/net-worth', 'name' => 'Net worth Calculator'],
            ['path' => '/finance/new-jersey-sales-tax', 'name' => 'New Jersey sales tax'],
        ],
        'authors' => [],
    ],
];
