<?php

/**
 * Blended rate
 * /finance/blended-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Blended rate',
    'meta' => ['title' => 'Blended rate Calculator — Formula, Units & Example', 'description' => 'Blended rate turns balance and rate into trigger onresult. Each figure is computed from the boxes you fill, never read from a table. A worked example follows.', 'h1' => 'Blended rate Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'For each amortization you enter below, please make sure they all have the same payment period.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amortization 1',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p0',
                            'label' => 'Balance',
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
                            'name' => 'r0',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '10', 'when' => null],
                                ['value' => '10', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amortization 2',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p1',
                            'label' => 'Balance',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '200', 'when' => null],
                                ['value' => '200', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r1',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '5', 'when' => null],
                                ['value' => '5', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amortization 3',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p2',
                            'label' => 'Balance',
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
                            'name' => 'r2',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amortization 4',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p3',
                            'label' => 'Balance',
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
                            'name' => 'r3',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amortization 5',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p4',
                            'label' => 'Balance',
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
                            'name' => 'r4',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amortization 6',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p5',
                            'label' => 'Balance',
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
                            'name' => 'r5',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amortization 7',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p6',
                            'label' => 'Balance',
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
                            'name' => 'r6',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amortization 8',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p7',
                            'label' => 'Balance',
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
                            'name' => 'r7',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amortization 9',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p8',
                            'label' => 'Balance',
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
                            'name' => 'r8',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amortization 10',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p9',
                            'label' => 'Balance',
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
                            'name' => 'r9',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'trigger_onResult',
                            'label' => 'Trigger onresult',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Final output',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        The effective blended rate for the entered balances with their corresponding interest rates is {{blend_rate.formattedValue}}%. The total balance of the balances entered above is {{global.currencySymbol}}{{total_balance.formattedValue}}.
                        TXT],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'trigger_onResult = (p0*r0 + p1*r1 + p2*r2 + p3*r3 + p4*r4 + p5*r5 + p6*r6 + p7*r7 + p8*r8 + p9*r9)/(p0 + p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9)',
            'results' => [
                'p9' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult)/(r9 - trigger_onResult)
                TXT,
                'p0' => <<<'TXT'
                (-p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/(r0 - trigger_onResult)
                TXT,
                'p1' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/(r1 - trigger_onResult)
                TXT,
                'r7' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/p7
                TXT,
                'p7' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/(r7 - trigger_onResult)
                TXT,
                'r9' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult + p9*trigger_onResult)/p9
                TXT,
                'p4' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/(r4 - trigger_onResult)
                TXT,
                'r4' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/p4
                TXT,
                'p5' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/(r5 - trigger_onResult)
                TXT,
                'p8' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p9*r9 + p9*trigger_onResult)/(r8 - trigger_onResult)
                TXT,
                'r0' => <<<'TXT'
                (p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/p0
                TXT,
                'r5' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/p5
                TXT,
                'p3' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/(r3 - trigger_onResult)
                TXT,
                'trigger_onResult' => '(p0*r0 + p1*r1 + p2*r2 + p3*r3 + p4*r4 + p5*r5 + p6*r6 + p7*r7 + p8*r8 + p9*r9)/(p0 + p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9)',
                'p2' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/(r2 - trigger_onResult)
                TXT,
                'p6' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/(r6 - trigger_onResult)
                TXT,
                'r2' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/p2
                TXT,
                'r3' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/p3
                TXT,
                'r6' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/p6
                TXT,
                'r1' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult - p8*r8 + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/p1
                TXT,
                'r8' => <<<'TXT'
                (-p0*r0 + p0*trigger_onResult - p1*r1 + p1*trigger_onResult - p2*r2 + p2*trigger_onResult - p3*r3 + p3*trigger_onResult - p4*r4 + p4*trigger_onResult - p5*r5 + p5*trigger_onResult - p6*r6 + p6*trigger_onResult - p7*r7 + p7*trigger_onResult + p8*trigger_onResult - p9*r9 + p9*trigger_onResult)/p8
                TXT,
            ],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var nVariables=10;omni.onResult([],function(ctx,_ref){var p0=_ref.p0,p1=_ref.p1,p2=_ref.p2,p3=_ref.p3,p4=_ref.p4,p5=_ref.p5,p6=_ref.p6,p7=_ref.p7,p8=_ref.p8,p9=_ref.p9,r0=_ref.r0,r1=_ref.r1,r2=_ref.r2,r3=_ref.r3,r4=_ref.r4,r5=_ref.r5,r6=_ref.r6,r7=_ref.r7,r8=_ref.r8,r9=_ref.r9;var p_array=[p0,p1,p2,p3,p4,p5,p6,p7,p8,p9];var r_array=[r0,r1,r2,r3,r4,r5,r6,r7,r8,r9];var p_value;var r_value;var total_interest=0;var total_balance=0;var i;for(i=0;i<nVariables;i++){p_value=p_array[i];r_value=r_array[i];if(p_value!==undefined&&r_value!==undefined){total_interest+=p_value*r_value/100}}for(i=0;i<nVariables;i++){p_value=p_array[i];if(p_value!==undefined){total_balance+=p_value}}ctx.exportValue("blend_rate",mathjs.round(total_interest/total_balance*100,3));ctx.exportValue("total_balance",mathjs.round(total_balance,2))});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Blended rate turns Balance, Rate and Balance into Trigger onresult. Nothing is looked up on this page: trigger onresult is computed from balance and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Blended rate calculator works', 'html' => <<<'TXT'
            <p>The Blended rate calculator applies one relationship to 20 numbers and reports Trigger onresult.</p><p>The answers are Trigger onresult; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 20 boxes and the page has everything it needs.</p><ul><li><strong>Balance</strong> — in USD</li><li><strong>Rate</strong> — in %</li><li><strong>Balance</strong> — in USD</li><li><strong>Rate</strong> — in %</li><li><strong>Balance</strong> — in USD</li><li><strong>Rate</strong> — in %</li><li><strong>Balance</strong> — in USD</li><li><strong>Rate</strong> — in %</li><li><strong>Balance</strong> — in USD</li><li><strong>Rate</strong> — in %</li><li><strong>Balance</strong> — in USD</li><li><strong>Rate</strong> — in %</li><li><strong>Balance</strong> — in USD</li><li><strong>Rate</strong> — in %</li><li><strong>Balance</strong> — in USD</li><li><strong>Rate</strong> — in %</li><li><strong>Balance</strong> — in USD</li><li><strong>Rate</strong> — in %</li><li><strong>Balance</strong> — in USD</li><li><strong>Rate</strong> — in %</li></ul><p>The answer comes back as Trigger onresult. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Balance = 10000 USD, Rate = 10 %, Balance = 200 USD, Rate = 5 %, Balance = 100 USD, Rate = 1000 %, Balance = 10 USD, Rate = 100 %, Balance = 1000 USD, Rate = 10 %, Balance = 100 USD, Rate = 1000 %, Balance = 10 USD, Rate = 100 %, Balance = 1000 USD, Rate = 10 %, Balance = 100 USD, Rate = 1000 %, Balance = 10 USD and Rate = 100 %; the answers are <strong>Trigger onresult</strong> = 33.84.</p><ul><li><strong>Trigger onresult</strong> = 33.84</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Trigger onresult</strong> = 33.84 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Trigger onresult takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul></ul><p>Any one of Trigger onresult, Balance and Balance can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Balance, from 10000 to 20000 — and the answers go from <strong>Trigger onresult</strong> 33.84 to <strong>Trigger onresult</strong> 23.26.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Trigger onresult is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Balance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Balance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Balance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Balance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Balance to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Balance</strong> takes a plain number with no unit attached. The page reads it when it works out Balance, Balance and Rate. Have it to hand before you start: Balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Rate</strong> is measured in %. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Balance</strong> takes a plain number with no unit attached. The page reads it when it works out Balance, Balance and Rate. Have it to hand before you start: Balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Rate</strong> is measured in %. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Balance</strong> takes a plain number with no unit attached. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Rate</strong> is measured in %. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Balance</strong> takes a plain number with no unit attached. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Rate</strong> is measured in %. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Balance</strong> takes a plain number with no unit attached. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Rate</strong> is measured in %. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Balance</strong> takes a plain number with no unit attached. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Rate</strong> is measured in %. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Balance</strong> takes a plain number with no unit attached. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Rate</strong> is measured in %. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Balance</strong> takes a plain number with no unit attached. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Rate</strong> is measured in %. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Balance</strong> takes a plain number with no unit attached. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Rate</strong> is measured in %. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Balance</strong> takes a plain number with no unit attached. The page reads it when it works out Balance, Balance and Rate. Have it to hand before you start: Balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Rate</strong> is measured in %. The page reads it when it works out Balance, Balance and Balance. Have it to hand before you start: Rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Trigger onresult</strong> is a plain number and the page's own defaults put it at 33.84. The value follows from Balance, Rate, Balance and Rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Trigger onresult</th></tr></thead><tbody><tr><td><strong>Balance</strong> +10%</td><td>-5.21%</td></tr><tr><td><strong>Rate</strong> +10%</td><td>+2.36%</td></tr><tr><td><strong>Balance</strong> +10%</td><td>-0.14%</td></tr><tr><td><strong>Rate</strong> +10%</td><td>+0.02%</td></tr><tr><td><strong>Balance</strong> +10%</td><td>+2.28%</td></tr><tr><td><strong>Rate</strong> +10%</td><td>+2.36%</td></tr><tr><td><strong>Balance</strong> +10%</td><td>+0.02%</td></tr><tr><td><strong>Rate</strong> +10%</td><td>+0.02%</td></tr><tr><td><strong>Balance</strong> +10%</td><td>-0.56%</td></tr><tr><td><strong>Rate</strong> +10%</td><td>+0.24%</td></tr><tr><td><strong>Balance</strong> +10%</td><td>+2.28%</td></tr><tr><td><strong>Rate</strong> +10%</td><td>+2.36%</td></tr><tr><td><strong>Balance</strong> +10%</td><td>+0.02%</td></tr><tr><td><strong>Rate</strong> +10%</td><td>+0.02%</td></tr><tr><td><strong>Balance</strong> +10%</td><td>-0.56%</td></tr><tr><td><strong>Rate</strong> +10%</td><td>+0.24%</td></tr><tr><td><strong>Balance</strong> +10%</td><td>+2.28%</td></tr><tr><td><strong>Rate</strong> +10%</td><td>+2.36%</td></tr><tr><td><strong>Balance</strong> +10%</td><td>+0.02%</td></tr><tr><td><strong>Rate</strong> +10%</td><td>+0.02%</td></tr></tbody></table><p>Ranked by leverage, Balance sits at the top — a ten per cent error in that box shows up as roughly 5.2 per cent in the answer. By contrast, Rate, Rate and Balance barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Balance = 5000 USD, Rate = 5 %, Balance = 100 USD, Rate = 2.5 %, Balance = 50 USD, Rate = 500 %, Balance = 5 USD, Rate = 50 %, Balance = 500 USD, Rate = 5 %, Balance = 50 USD, Rate = 500 %, Balance = 5 USD, Rate = 50 %, Balance = 500 USD, Rate = 5 %, Balance = 50 USD, Rate = 500 %, Balance = 5 USD and Rate = 50 %, the answer is <strong>Trigger onresult</strong> = 16.92.</li><li>With Balance = 30000 USD, Rate = 10 %, Balance = 200 USD, Rate = 5 %, Balance = 100 USD, Rate = 1000 %, Balance = 10 USD, Rate = 100 %, Balance = 1000 USD, Rate = 10 %, Balance = 100 USD, Rate = 1000 %, Balance = 10 USD, Rate = 100 %, Balance = 1000 USD, Rate = 10 %, Balance = 100 USD, Rate = 1000 %, Balance = 10 USD and Rate = 100 %, the answer is <strong>Trigger onresult</strong> = 19.18.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Trigger onresult follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Balance, Rate and Balance are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Balance, Rate and Balance and the number you are missing is Trigger onresult.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/long-term-care">Long term care</a>, <a href="/finance/lgd">Loss given default Calculator</a> and <a href="/finance/loss-ratio">Loss ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Blended rate calculator work out?', 'a' => 'Trigger onresult, from Balance, Rate, Balance and Rate.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Balance (USD), Rate (%), Balance (USD), Rate (%), Balance (USD). Fill balance, rate and balance and leave Trigger onresult empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Trigger onresult, Balance, Balance and Balance blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Trigger onresult = 33.84. Those are the defaults written into the form — move Balance and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Trigger onresult is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Balance left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Trigger onresult at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/long-term-care', 'name' => 'Long term care'],
            ['path' => '/finance/lgd', 'name' => 'Loss given default Calculator'],
            ['path' => '/finance/loss-ratio', 'name' => 'Loss ratio Calculator'],
        ],
        'authors' => [],
    ],
];
