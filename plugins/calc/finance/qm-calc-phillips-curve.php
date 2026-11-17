<?php

/**
 * Phillips curve
 * /finance/phillips-curve
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Phillips curve',
    'meta' => ['title' => 'Phillips curve Calculator: Free, With Steps', 'description' => 'Phillips curve reports inflation rate (π), percentage rate of money wage growth, kappa parameter (κ) and lambda parameter (λ). Every figure is computed.', 'h1' => 'Phillips curve Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'type',
                            'label' => 'Phillips curve version ',
                            'type' => 'select',
                            'options' => ['Traditional' => '1', 'New classical' => '2', 'New Keynesian' => '3'],
                            'dataset' => 'DATA',
                            'default' => 'Traditional',
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
                            'name' => 'Inflation',
                            'label' => 'Inflation rate (π)',
                            'type' => 'number',
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
                            'name' => 'Unemployment',
                            'label' => 'Unemployment rate (U)',
                            'type' => 'number',
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
                            'name' => 'UnemploymentNatural',
                            'label' => 'Natural rate of unemployment (Uₙ)',
                            'type' => 'number',
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
                            'name' => 'InflationExpectation',
                            'label' => 'Inflation expectation (Eₜ{πₜ₊₁})',
                            'type' => 'number',
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
                            'name' => 'InflationExpectation2',
                            'label' => 'Inflation expectation (πₑ)',
                            'type' => 'number',
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
                            'name' => 'yGap',
                            'label' => 'Output gap (ỹ)',
                            'type' => 'number',
                            'help' => 'The difference between the actual output and its potential level.',
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
                            'name' => 'discount',
                            'label' => 'Households’ discount factor (β)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.99',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wage_growth',
                            'label' => 'Percentage rate of money wage growth',
                            'type' => 'number',
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
                            'name' => 'wage_growth_trend',
                            'label' => 'Trend rate of growth of money wages',
                            'type' => 'number',
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
                            'name' => 'DeltaUnemployment',
                            'label' => 'Change in unemployment rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'theta',
                            'label' => 'Price stickiness (θ)',
                            'type' => 'number',
                            'help' => 'This parameter represents the average time over which prices are kept fixed.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.75',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sigma',
                            'label' => 'Utility of consumption (σ)',
                            'type' => 'number',
                            'help' => 'Intertemporal elasticity of substitution.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fi',
                            'label' => 'Disutility of labor (φ)',
                            'type' => 'number',
                            'help' => 'The inverse labor supply elasticity.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'alfa',
                            'label' => 'Elasticity of labor (α)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.25',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eps',
                            'label' => 'Demand elasticity (ɛ)',
                            'type' => 'number',
                            'help' => 'The measure of the change in the quantity purchased of a product in relation to a change in its price.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '9',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kappa',
                            'label' => 'Kappa parameter (κ)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shocks',
                            'label' => 'Unexpected exogenous supply shocks (v)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '-0.02',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ConstantB',
                            'label' => 'Constant (b)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lambda_param',
                            'label' => 'Lambda parameter (λ)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Inflation  =InflationExpectation2 - ConstantB * (Unemployment  - UnemploymentNatural) + shocks ',
            'results' => [
                'shocks' => 'ConstantB*Unemployment - ConstantB*UnemploymentNatural + Inflation - InflationExpectation2',
                'ConstantB' => '(-Inflation + InflationExpectation2 + shocks)/(Unemployment - UnemploymentNatural)',
                'InflationExpectation2' => 'ConstantB*Unemployment - ConstantB*UnemploymentNatural + Inflation - shocks',
                'UnemploymentNatural' => '(ConstantB*Unemployment + Inflation - InflationExpectation2 - shocks)/ConstantB',
                'Unemployment' => '(ConstantB*UnemploymentNatural - Inflation + InflationExpectation2 + shocks)/ConstantB',
                'Inflation' => '-ConstantB*Unemployment + ConstantB*UnemploymentNatural + InflationExpectation2 + shocks',
            ],
        ],
        [
            'title' => 'Inflation  =discount  * InflationExpectation + kappa * yGap',
            'results' => [
                'yGap' => '(Inflation - InflationExpectation*discount)/kappa',
                'discount' => '(Inflation - kappa*yGap)/InflationExpectation',
                'Inflation' => 'InflationExpectation*discount + kappa*yGap',
                'InflationExpectation' => '(Inflation - kappa*yGap)/discount',
                'kappa' => '(Inflation - InflationExpectation*discount)/yGap',
            ],
        ],
        [
            'title' => 'kappa = (lambda_param * ((1-alfa)*sigma + fi + alfa)/((1 - alfa) + alfa * eps))',
            'results' => [
                'alfa' => '(fi*lambda_param - kappa + lambda_param*sigma)/(eps*kappa - kappa + lambda_param*sigma - lambda_param)',
                'fi' => '(alfa*eps*kappa - alfa*kappa + kappa + lambda_param*(alfa*sigma - alfa - sigma))/lambda_param',
                'eps' => '(alfa*kappa + alfa*lambda_param*(1 - sigma) - kappa + lambda_param*(fi + sigma))/(alfa*kappa)',
                'kappa' => 'lambda_param*(-alfa*sigma + alfa + fi + sigma)/(alfa*eps - alfa + 1)',
                'sigma' => '(-alfa*eps*kappa + alfa*kappa + alfa*lambda_param + fi*lambda_param - kappa)/(lambda_param*(alfa - 1))',
                'lambda_param' => 'kappa*(alfa*eps - alfa + 1)/(-alfa*sigma + alfa + fi + sigma)',
            ],
        ],
        [
            'title' => 'lambda_param = (((1 - theta) * (1 + theta * discount))/theta)',
            'results' => ['discount' => '(-lambda_param*theta - theta + 1)/(theta*(theta - 1))', 'theta' => '(1/2)*(discount - lambda_param + sqrt(pow(discount, 2) - 2*discount*lambda_param + 2*discount + pow(lambda_param, 2) + 2*lambda_param + 1) - 1)/discount', 'lambda_param' => '-discount*theta + discount - 1 + 1/theta'],
        ],
        [
            'title' => 'wage_growth = wage_growth_trend - DeltaUnemployment',
            'results' => ['DeltaUnemployment' => '-wage_growth + wage_growth_trend', 'wage_growth_trend' => 'DeltaUnemployment + wage_growth', 'wage_growth' => '-DeltaUnemployment + wage_growth_trend'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Phillips curve works out Kappa parameter (κ) and Lambda parameter (λ) from Phillips curve version, Inflation rate (π) and Unemployment rate (U). There is no hidden constant here: change kappa parameter (κ) and phillips curve version moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Phillips curve calculator works', 'html' => <<<'TXT'
            <p>Phillips curve answers one question from 18 numbers, and the answer is Kappa parameter (κ) and Lambda parameter (λ).</p><p>The relationship it solves reads Inflation rate (π) = − Constant (b) × Unemployment rate (U) + Constant (b) × Natural rate of unemployment (Uₙ) + Inflation expectation (πₑ) + Unexpected exogenous supply shocks (v).</p><p>The answers are Kappa parameter (κ) and Lambda parameter (λ); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 18 boxes, and nothing else.</p><ul><li><strong>Phillips curve version</strong> — a plain number, no unit</li><li><strong>Inflation rate (π)</strong> — in percent</li><li><strong>Unemployment rate (U)</strong> — in percent</li><li><strong>Natural rate of unemployment (Uₙ)</strong> — in percent</li><li><strong>Inflation expectation (Eₜ{πₜ₊₁})</strong> — in percent</li><li><strong>Inflation expectation (πₑ)</strong> — in percent</li><li><strong>Output gap (ỹ)</strong> — in percent. The difference between the actual output and its potential level.</li><li><strong>Households’ discount factor (β)</strong> — a plain number, no unit</li><li><strong>Percentage rate of money wage growth</strong> — in percent</li><li><strong>Trend rate of growth of money wages</strong> — in percent</li><li><strong>Change in unemployment rate</strong> — in percent</li><li><strong>Price stickiness (θ)</strong> — a plain number, no unit. This parameter represents the average time over which prices are kept fixed.</li><li><strong>Utility of consumption (σ)</strong> — a plain number, no unit. Intertemporal elasticity of substitution.</li><li><strong>Disutility of labor (φ)</strong> — a plain number, no unit. The inverse labor supply elasticity.</li><li><strong>Elasticity of labor (α)</strong> — a plain number, no unit</li><li><strong>Demand elasticity (ɛ)</strong> — a plain number, no unit. The measure of the change in the quantity purchased of a product in relation to a change in its price.</li><li><strong>Unexpected exogenous supply shocks (v)</strong> — a plain number, no unit</li><li><strong>Constant (b)</strong> — a plain number, no unit</li></ul><p>The result boxes are Kappa parameter (κ), Lambda parameter (λ); they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Inflation rate (π) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Inflation rate (π)</strong> = <code>− Constant (b) × Unemployment rate (U) + Constant (b) × Natural rate of unemployment (Uₙ) + Inflation expectation (πₑ) + Unexpected exogenous supply shocks (v)</code></li><li><strong>Unexpected exogenous supply shocks (v)</strong> = <code>Constant (b) × Unemployment rate (U) − Constant (b) × Natural rate of unemployment (Uₙ) + Inflation rate (π) − Inflation expectation (πₑ)</code></li><li><strong>Constant (b)</strong> = <code>( − Inflation rate (π) + Inflation expectation (πₑ) + Unexpected exogenous supply shocks (v)) ÷ (Unemployment rate (U) − Natural rate of unemployment (Uₙ))</code></li><li><strong>Inflation expectation (πₑ)</strong> = <code>Constant (b) × Unemployment rate (U) − Constant (b) × Natural rate of unemployment (Uₙ) + Inflation rate (π) − Unexpected exogenous supply shocks (v)</code></li><li><strong>Natural rate of unemployment (Uₙ)</strong> = <code>(Constant (b) × Unemployment rate (U) + Inflation rate (π) − Inflation expectation (πₑ) − Unexpected exogenous supply shocks (v)) ÷ Constant (b)</code></li><li><strong>Unemployment rate (U)</strong> = <code>(Constant (b) × Natural rate of unemployment (Uₙ) − Inflation rate (π) + Inflation expectation (πₑ) + Unexpected exogenous supply shocks (v)) ÷ Constant (b)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Inflation rate (π)</strong> = <code>− Constant (b) × Unemployment rate (U) + Constant (b) × Natural rate of unemployment (Uₙ) + Inflation expectation (πₑ) + Unexpected exogenous supply shocks (v)</code> — the form to use when Constant (b), Unemployment rate (U), Natural rate of unemployment (Uₙ) and Inflation expectation (πₑ) are the values you have.</li><li><strong>Unexpected exogenous supply shocks (v)</strong> = <code>Constant (b) × Unemployment rate (U) − Constant (b) × Natural rate of unemployment (Uₙ) + Inflation rate (π) − Inflation expectation (πₑ)</code> — the form to use when Constant (b), Unemployment rate (U), Natural rate of unemployment (Uₙ) and Inflation rate (π) are the values you have.</li><li><strong>Constant (b)</strong> = <code>( − Inflation rate (π) + Inflation expectation (πₑ) + Unexpected exogenous supply shocks (v)) ÷ (Unemployment rate (U) − Natural rate of unemployment (Uₙ))</code> — the form to use when Inflation rate (π), Inflation expectation (πₑ), Unexpected exogenous supply shocks (v) and Unemployment rate (U) are the values you have.</li><li><strong>Inflation expectation (πₑ)</strong> = <code>Constant (b) × Unemployment rate (U) − Constant (b) × Natural rate of unemployment (Uₙ) + Inflation rate (π) − Unexpected exogenous supply shocks (v)</code> — the form to use when Constant (b), Unemployment rate (U), Natural rate of unemployment (Uₙ) and Inflation rate (π) are the values you have.</li><li><strong>Natural rate of unemployment (Uₙ)</strong> = <code>(Constant (b) × Unemployment rate (U) + Inflation rate (π) − Inflation expectation (πₑ) − Unexpected exogenous supply shocks (v)) ÷ Constant (b)</code> — the form to use when Constant (b), Unemployment rate (U), Inflation rate (π) and Inflation expectation (πₑ) are the values you have.</li><li><strong>Unemployment rate (U)</strong> = <code>(Constant (b) × Natural rate of unemployment (Uₙ) − Inflation rate (π) + Inflation expectation (πₑ) + Unexpected exogenous supply shocks (v)) ÷ Constant (b)</code> — the form to use when Constant (b), Natural rate of unemployment (Uₙ), Inflation rate (π) and Inflation expectation (πₑ) are the values you have.</li><li><strong>Inflation rate (π)</strong> = <code>Inflation expectation (Eₜ{πₜ₊₁}) × Households’ discount factor (β) + Kappa parameter (κ) × Output gap (ỹ)</code> — the form to use when Inflation expectation (Eₜ{πₜ₊₁}), Households’ discount factor (β), Kappa parameter (κ) and Output gap (ỹ) are the values you have.</li><li><strong>Output gap (ỹ)</strong> = <code>(Inflation rate (π) − Inflation expectation (Eₜ{πₜ₊₁}) × Households’ discount factor (β)) ÷ Kappa parameter (κ)</code> — the form to use when Inflation rate (π), Inflation expectation (Eₜ{πₜ₊₁}), Households’ discount factor (β) and Kappa parameter (κ) are the values you have.</li></ul><p>Any one of Inflation rate (π), Unexpected exogenous supply shocks (v) and Constant (b) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Inflation rate (π), Unemployment rate (U) and Natural rate of unemployment (Uₙ) carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Kappa parameter (κ) and Lambda parameter (λ) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Phillips curve version left as a guess.</strong> Anything typed into Phillips curve version is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Inflation rate (π) left as a guess.</strong> Anything typed into Inflation rate (π) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Phillips curve version to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Phillips curve version, Inflation rate (π), Unemployment rate (U) and Natural rate of unemployment (Uₙ). Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Phillips curve version into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Kappa parameter (κ) with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Kappa parameter (κ) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Phillips curve version, Inflation rate (π) and Unemployment rate (U) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Phillips curve version, Inflation rate (π) and Unemployment rate (U) is what you already know and Kappa parameter (κ) and Lambda parameter (λ) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/cash-act-2020">CASH Act of 2020</a>, <a href="/finance/cash-back">Cash back Calculator</a> and <a href="/finance/cash-conversion-cycle">Cash conversion cycle Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Phillips curve calculator work out?', 'a' => <<<'TXT'
            Kappa parameter (κ) and Lambda parameter (λ), from Constant (b), Unemployment rate (U), Natural rate of unemployment (Uₙ) and Inflation expectation (πₑ). The relationship is Inflation rate (π) = − Constant (b) × Unemployment rate (U) + Constant (b) × Natural rate of unemployment (Uₙ) + Inflation expectation (πₑ) + Unexpected exogenous supply shocks (v).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Phillips curve version, Inflation rate (π) (percent), Unemployment rate (U) (percent), Natural rate of unemployment (Uₙ) (percent), Inflation expectation (Eₜ{πₜ₊₁}) (percent). Fill phillips curve version, inflation rate (π) and unemployment rate (U) and leave Kappa parameter (κ) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Inflation rate (π), Unexpected exogenous supply shocks (v), Constant (b) and Inflation expectation (πₑ) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Kappa parameter (κ) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Phillips curve version left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Kappa parameter (κ) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/cash-act-2020', 'name' => 'CASH Act of 2020'],
            ['path' => '/finance/cash-back', 'name' => 'Cash back Calculator'],
            ['path' => '/finance/cash-conversion-cycle', 'name' => 'Cash conversion cycle Calculator'],
        ],
        'authors' => [],
    ],
];
