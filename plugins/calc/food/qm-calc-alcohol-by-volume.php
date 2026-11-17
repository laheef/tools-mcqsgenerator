<?php

/**
 * ABV
 * /food/alcohol-by-volume
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'ABV',
    'meta' => ['title' => 'ABV Calculator — Free, With Worked Examples', 'description' => 'Estimate beer alcohol by volume from original and apparent extract readings. Check units and follow the recipe or package directions.', 'h1' => 'ABV Calculator', 'updated' => '2026-07-28'],
    'sections' => [
        [
            'title' => 'Beer gravity',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'original_extract',
                            'label' => 'Original extract (OE)',
                            'type' => 'number',
                            'help' => 'Concentration of dissolved solids before fermentation.',
                            'unit' => '190',
                            'unit_default' => 'p',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'apparent_extract',
                            'label' => 'Apparent extract (AE)',
                            'type' => 'number',
                            'help' => 'Concentration of dissolved solids, measured directly with a hydrometer.',
                            'unit' => '190',
                            'unit_default' => 'p',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'real_extract',
                            'label' => 'Real extract (RE)',
                            'type' => 'number',
                            'help' => 'The true concentration of dissolved solids.',
                            'unit' => '190',
                            'unit_default' => 'p',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'apparent_fermentation',
                            'label' => 'Apparent degree of fermentation (ADF)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'real_fermentation',
                            'label' => 'Real degree of fermentation (RDF)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Alcohol content',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'alcohol_by_volume',
                            'label' => 'Alcohol by volume (ABV)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'alcohol_by_weight',
                            'label' => 'Alcohol by weight (ABW)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'proof_uk',
                            'label' => 'Proof (UK)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'proof_us',
                            'label' => 'Proof (US)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Alcohol volume in your beer',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_volume',
                            'label' => 'Total volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'alcohol_content',
                            'label' => 'Alcohol content',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'alcohol_by_weight =(0.372+0.00357*original_extract)*(original_extract-apparent_extract)',
            'results' => ['alcohol_by_weight' => '-357/100000*apparent_extract*original_extract - 93/250*apparent_extract + (357/100000)*pow(original_extract, 2) + (93/250)*original_extract', 'apparent_extract' => '(1/3)*(-100000*alcohol_by_weight + 357*pow(original_extract, 2) + 37200*original_extract)/(119*original_extract + 12400)', 'original_extract' => '(1/2)*apparent_extract + (1/714)*sqrt(142800000*alcohol_by_weight + 127449*pow(apparent_extract, 2) + 26560800*apparent_extract + 1383840000) - 6200/119'],
        ],
        [
            'title' => <<<'TXT'
            real_extract =0.496815689*alcohol_by_weight+1.001534136*apparent_extract-0.000591051*alcohol_by_weight*apparent_extract-0.000294307*apparent_extract^2-0.0084747*alcohol_by_weight^2+0.000183564*alcohol_by_weight^3+0.000011151*apparent_extract^3+0.000002452*alcohol_by_weight^2*apparent_extract^2
            TXT,
            'results' => ['alcohol_by_weight' => <<<'TXT'
            (1/275346)*(-81371764323*apparent_extract - 4*pow(613*pow(apparent_extract, 2) - 2118675, 2) + (-1226*pow(apparent_extract, 2) - pow(634063308939837*pow(apparent_extract, 3) - 16734756547767609*pow(apparent_extract, 2) + 56948798160556069032*apparent_extract - 56861564787000000000*real_extract + 413019*(591051*apparent_extract - 496815689)*(613*pow(apparent_extract, 2) - 2118675) + 8*pow(613*pow(apparent_extract, 2) - 2118675, 3) + sqrt(-pow(81371764323*apparent_extract + 4*pow(613*pow(apparent_extract, 2) - 2118675, 2) - 68398106351697, 3) + pow(634063308939837*pow(apparent_extract, 3) - 16734756547767609*pow(apparent_extract, 2) + 56948798160556069032*apparent_extract - 56861564787000000000*real_extract - 413019*(-591051*apparent_extract + 496815689)*(613*pow(apparent_extract, 2) - 2118675) + 8*pow(613*pow(apparent_extract, 2) - 2118675, 3), 2)), 1/3) + 4237350)*pow(634063308939837*pow(apparent_extract, 3) - 16734756547767609*pow(apparent_extract, 2) + 56948798160556069032*apparent_extract - 56861564787000000000*real_extract + 413019*(591051*apparent_extract - 496815689)*(613*pow(apparent_extract, 2) - 2118675) + 8*pow(613*pow(apparent_extract, 2) - 2118675, 3) + sqrt(-pow(81371764323*apparent_extract + 4*pow(613*pow(apparent_extract, 2) - 2118675, 2) - 68398106351697, 3) + pow(634063308939837*pow(apparent_extract, 3) - 16734756547767609*pow(apparent_extract, 2) + 56948798160556069032*apparent_extract - 56861564787000000000*real_extract - 413019*(-591051*apparent_extract + 496815689)*(613*pow(apparent_extract, 2) - 2118675) + 8*pow(613*pow(apparent_extract, 2) - 2118675, 3), 2)), 1/3) + 68398106351697)/pow(634063308939837*pow(apparent_extract, 3) - 16734756547767609*pow(apparent_extract, 2) + 56948798160556069032*apparent_extract - 56861564787000000000*real_extract + 413019*(591051*apparent_extract - 496815689)*(613*pow(apparent_extract, 2) - 2118675) + 8*pow(613*pow(apparent_extract, 2) - 2118675, 3) + sqrt(-pow(81371764323*apparent_extract + 4*pow(613*pow(apparent_extract, 2) - 2118675, 2) - 68398106351697, 3) + pow(634063308939837*pow(apparent_extract, 3) - 16734756547767609*pow(apparent_extract, 2) + 56948798160556069032*apparent_extract - 56861564787000000000*real_extract - 413019*(-591051*apparent_extract + 496815689)*(613*pow(apparent_extract, 2) - 2118675) + 8*pow(613*pow(apparent_extract, 2) - 2118675, 3), 2)), 1/3)
            TXT, 'apparent_extract' => <<<'TXT'
            (1/66906)*(2*pow(2, 1/3)*(-19772429103*alcohol_by_weight - pow(2452*pow(alcohol_by_weight, 2) - 294307, 2) + 33504321451608) + (-4904*pow(alcohol_by_weight, 2) - pow(2, 2/3)*pow(616281184370628*pow(alcohol_by_weight, 3) - 28452191895936900*pow(alcohol_by_weight, 2) + 1667964095524338003*alcohol_by_weight - 3357309627000000000*real_extract + 301077*(197017*alcohol_by_weight - 333844712)*(2452*pow(alcohol_by_weight, 2) - 294307) + 2*pow(2452*pow(alcohol_by_weight, 2) - 294307, 3) + sqrt(-4*pow(19772429103*alcohol_by_weight + pow(2452*pow(alcohol_by_weight, 2) - 294307, 2) - 33504321451608, 3) + pow(616281184370628*pow(alcohol_by_weight, 3) - 28452191895936900*pow(alcohol_by_weight, 2) + 1667964095524338003*alcohol_by_weight - 3357309627000000000*real_extract - 301077*(-197017*alcohol_by_weight + 333844712)*(2452*pow(alcohol_by_weight, 2) - 294307) + 2*pow(2452*pow(alcohol_by_weight, 2) - 294307, 3), 2)), 1/3) + 588614)*pow(616281184370628*pow(alcohol_by_weight, 3) - 28452191895936900*pow(alcohol_by_weight, 2) + 1667964095524338003*alcohol_by_weight - 3357309627000000000*real_extract + 301077*(197017*alcohol_by_weight - 333844712)*(2452*pow(alcohol_by_weight, 2) - 294307) + 2*pow(2452*pow(alcohol_by_weight, 2) - 294307, 3) + sqrt(-4*pow(19772429103*alcohol_by_weight + pow(2452*pow(alcohol_by_weight, 2) - 294307, 2) - 33504321451608, 3) + pow(616281184370628*pow(alcohol_by_weight, 3) - 28452191895936900*pow(alcohol_by_weight, 2) + 1667964095524338003*alcohol_by_weight - 3357309627000000000*real_extract - 301077*(-197017*alcohol_by_weight + 333844712)*(2452*pow(alcohol_by_weight, 2) - 294307) + 2*pow(2452*pow(alcohol_by_weight, 2) - 294307, 3), 2)), 1/3))/pow(616281184370628*pow(alcohol_by_weight, 3) - 28452191895936900*pow(alcohol_by_weight, 2) + 1667964095524338003*alcohol_by_weight - 3357309627000000000*real_extract + 301077*(197017*alcohol_by_weight - 333844712)*(2452*pow(alcohol_by_weight, 2) - 294307) + 2*pow(2452*pow(alcohol_by_weight, 2) - 294307, 3) + sqrt(-4*pow(19772429103*alcohol_by_weight + pow(2452*pow(alcohol_by_weight, 2) - 294307, 2) - 33504321451608, 3) + pow(616281184370628*pow(alcohol_by_weight, 3) - 28452191895936900*pow(alcohol_by_weight, 2) + 1667964095524338003*alcohol_by_weight - 3357309627000000000*real_extract - 301077*(-197017*alcohol_by_weight + 333844712)*(2452*pow(alcohol_by_weight, 2) - 294307) + 2*pow(2452*pow(alcohol_by_weight, 2) - 294307, 3), 2)), 1/3)
            TXT, 'real_extract' => <<<'TXT'
            (45891/250000000)*pow(alcohol_by_weight, 3) + (613/250000000)*pow(alcohol_by_weight, 2)*pow(apparent_extract, 2) - 84747/10000000*pow(alcohol_by_weight, 2) - 591051/1000000000*alcohol_by_weight*apparent_extract + (496815689/1000000000)*alcohol_by_weight + (11151/1000000000)*pow(apparent_extract, 3) - 294307/1000000000*pow(apparent_extract, 2) + (125191767/125000000)*apparent_extract
            TXT],
        ],
        [
            'title' => 'alcohol_by_volume  =alcohol_by_weight*(1.308*10^-5+3.868*10^-3*apparent_extract+1.275*10^-5*apparent_extract^2+6.3*10^-8*apparent_extract^3+1)/0.7907',
            'results' => ['alcohol_by_weight' => '790700000*alcohol_by_volume/(63*pow(apparent_extract, 3) + 12750*pow(apparent_extract, 2) + 3868000*apparent_extract + 1000013080)', 'apparent_extract' => <<<'TXT'
            -1/63*pow(20, 1/3)*pow(-78457207500*alcohol_by_volume/alcohol_by_weight + 63*sqrt(1550902849256250000*pow(alcohol_by_volume, 2)/pow(alcohol_by_weight, 2) - 3051040647857455000*alcohol_by_volume/alcohol_by_weight + 1659297729963388701) + 77173154113, 1/3) - 4250/63 + (6316550/63)*pow(2, 1/3)*pow(5, 2/3)/pow(-78457207500*alcohol_by_volume/alcohol_by_weight + 63*sqrt(1550902849256250000*pow(alcohol_by_volume, 2)/pow(alcohol_by_weight, 2) - 3051040647857455000*alcohol_by_volume/alcohol_by_weight + 1659297729963388701) + 77173154113, 1/3)
            TXT, 'alcohol_by_volume' => '(1/790700000)*alcohol_by_weight*(63*pow(apparent_extract, 3) + 12750*pow(apparent_extract, 2) + 3868000*apparent_extract + 1000013080)'],
        ],
        [
            'title' => 'apparent_fermentation=100*(original_extract-apparent_extract)/original_extract',
            'results' => ['apparent_fermentation' => '-100*apparent_extract/original_extract + 100', 'apparent_extract' => '(1/100)*original_extract*(-apparent_fermentation + 100)', 'original_extract' => '-100*apparent_extract/(apparent_fermentation - 100)'],
        ],
        [
            'title' => 'real_fermentation=(100*(original_extract-real_extract)/original_extract)*(1/(1-0.005161*real_extract))',
            'results' => ['real_fermentation' => '100000000*(-original_extract + real_extract)/(original_extract*(5161*real_extract - 1000000))', 'real_extract' => '1000000*original_extract*(real_fermentation - 100)/(5161*original_extract*real_fermentation - 100000000)', 'original_extract' => '100000000*real_extract/(5161*real_extract*real_fermentation - 1000000*real_fermentation + 100000000)'],
        ],
        [
            'title' => 'proof_us = 2*alcohol_by_volume',
            'results' => ['proof_us' => '2*alcohol_by_volume', 'alcohol_by_volume' => '(1/2)*proof_us'],
        ],
        [
            'title' => '0.5715*proof_uk = alcohol_by_volume',
            'results' => ['proof_uk' => '(2000/1143)*alcohol_by_volume', 'alcohol_by_volume' => '(1143/2000)*proof_uk'],
        ],
        [
            'title' => 'alcohol_content = alcohol_by_volume  *total_volume/100',
            'results' => ['total_volume' => '100*alcohol_content/alcohol_by_volume', 'alcohol_content' => '(1/100)*alcohol_by_volume*total_volume', 'alcohol_by_volume' => '100*alcohol_content/total_volume'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        ABV takes Original extract (OE) and Apparent extract (AE) and returns Real extract (RE) and Apparent degree of fermentation (ADF). Nothing is looked up on this page: real extract (RE) is computed from original extract (OE) and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Real extract (RE) is opened in degrees Plato; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the ABV calculator works', 'html' => <<<'TXT'
            <p>The ABV calculator applies one relationship to 2 numbers and reports Real extract (RE), Apparent degree of fermentation (ADF) and Real degree of fermentation (RDF).</p><p>Written with the labels from the form, Alcohol by weight (ABW) = − 357 ÷ 100000 × Apparent extract (AE) × Original extract (OE) − 93 ÷ 250 × Apparent extract (AE) + (357 ÷ 100000) × (Original extract (OE))^(2) + (93 ÷ 250) × Original extract (OE).</p><p>What comes back is Real extract (RE), Apparent degree of fermentation (ADF), Real degree of fermentation (RDF) and Alcohol by volume (ABV) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Original extract (OE)</strong> — in degrees Plato. Concentration of dissolved solids before fermentation.</li><li><strong>Apparent extract (AE)</strong> — in degrees Plato. Concentration of dissolved solids, measured directly with a hydrometer.</li></ul><p>The answers come back as Real extract (RE) in degrees Plato, Apparent degree of fermentation (ADF) in %, Real degree of fermentation (RDF) in %, Alcohol by volume (ABV) in %, Alcohol by weight (ABW) in %, Proof (UK), Proof (US), Total volume in liters, Alcohol content in milliliters. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Original extract (OE) = 10 p, Apparent extract (AE) = 100 p, Real extract (RE) = 1000 p, Apparent degree of fermentation (ADF) = 10 %, Real degree of fermentation (RDF) = 100 %, Alcohol by volume (ABV) = 1000 %, Proof (UK) = 10, Proof (US) = 100, Total volume = 1000 liters and Alcohol content = 10 ml; the answers are <strong>Alcohol by weight (ABW)</strong> = -36.69 %.</p><ul><li><strong>Alcohol by weight (ABW)</strong> = -36.69 %</li></ul><p>That is <strong>Alcohol by weight (ABW)</strong> = <code>− 357 ÷ 100000 × Apparent extract (AE) × Original extract (OE) − 93 ÷ 250 × Apparent extract (AE) + (357 ÷ 100000) × (Original extract (OE))^(2) + (93 ÷ 250) × Original extract (OE)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Alcohol by weight (ABW)</strong> = -36.69 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Real extract (RE) offers 1 units and opens on degrees Plato, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Alcohol by weight (ABW)</strong> = <code>− 357 ÷ 100000 × Apparent extract (AE) × Original extract (OE) − 93 ÷ 250 × Apparent extract (AE) + (357 ÷ 100000) × (Original extract (OE))^(2) + (93 ÷ 250) × Original extract (OE)</code></li><li><strong>Apparent extract (AE)</strong> = <code>(1 ÷ 3) × ( − 100000 × Alcohol by weight (ABW) + 357 × (Original extract (OE))^(2) + 37200 × Original extract (OE)) ÷ (119 × Original extract (OE) + 12400)</code></li><li><strong>Original extract (OE)</strong> = <code>(1 ÷ 2) × Apparent extract (AE) + (1 ÷ 714) × √(142800000 × Alcohol by weight (ABW) + 127449 × (Apparent extract (AE))^(2) + 26560800 × Apparent extract (AE) + 1383840000) − 6200 ÷ 119</code></li><li><strong>Alcohol by volume (ABV)</strong> = <code>(1 ÷ 790700000) × Alcohol by weight (ABW) × (63 × (Apparent extract (AE))^(3) + 12750 × (Apparent extract (AE))^(2) + 3868000 × Apparent extract (AE) + 1000013080)</code></li><li><strong>Apparent degree of fermentation (ADF)</strong> = <code>− 100 × Apparent extract (AE) ÷ Original extract (OE) + 100</code></li><li><strong>Real degree of fermentation (RDF)</strong> = <code>100000000 × ( − Original extract (OE) + Real extract (RE)) ÷ (Original extract (OE) × (5161 × Real extract (RE) − 1000000))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Alcohol by weight (ABW)</strong> = <code>− 357 ÷ 100000 × Apparent extract (AE) × Original extract (OE) − 93 ÷ 250 × Apparent extract (AE) + (357 ÷ 100000) × (Original extract (OE))^(2) + (93 ÷ 250) × Original extract (OE)</code> — the form to use when Apparent extract (AE) and Original extract (OE) are the values you have.</li><li><strong>Apparent extract (AE)</strong> = <code>(1 ÷ 3) × ( − 100000 × Alcohol by weight (ABW) + 357 × (Original extract (OE))^(2) + 37200 × Original extract (OE)) ÷ (119 × Original extract (OE) + 12400)</code> — the form to use when Alcohol by weight (ABW) and Original extract (OE) are the values you have.</li><li><strong>Original extract (OE)</strong> = <code>(1 ÷ 2) × Apparent extract (AE) + (1 ÷ 714) × √(142800000 × Alcohol by weight (ABW) + 127449 × (Apparent extract (AE))^(2) + 26560800 × Apparent extract (AE) + 1383840000) − 6200 ÷ 119</code> — the form to use when Apparent extract (AE) and Alcohol by weight (ABW) are the values you have.</li><li><strong>Alcohol by volume (ABV)</strong> = <code>(1 ÷ 790700000) × Alcohol by weight (ABW) × (63 × (Apparent extract (AE))^(3) + 12750 × (Apparent extract (AE))^(2) + 3868000 × Apparent extract (AE) + 1000013080)</code> — the form to use when Alcohol by weight (ABW) and Apparent extract (AE) are the values you have.</li><li><strong>Alcohol by weight (ABW)</strong> = <code>790700000 × Alcohol by volume (ABV) ÷ (63 × (Apparent extract (AE))^(3) + 12750 × (Apparent extract (AE))^(2) + 3868000 × Apparent extract (AE) + 1000013080)</code> — the form to use when Alcohol by volume (ABV) and Apparent extract (AE) are the values you have.</li><li><strong>Apparent degree of fermentation (ADF)</strong> = <code>− 100 × Apparent extract (AE) ÷ Original extract (OE) + 100</code> — the form to use when Apparent extract (AE) and Original extract (OE) are the values you have.</li><li><strong>Apparent extract (AE)</strong> = <code>(1 ÷ 100) × Original extract (OE) × ( − Apparent degree of fermentation (ADF) + 100)</code> — the form to use when Original extract (OE) and Apparent degree of fermentation (ADF) are the values you have.</li><li><strong>Original extract (OE)</strong> = <code>− 100 × Apparent extract (AE) ÷ (Apparent degree of fermentation (ADF) − 100)</code> — the form to use when Apparent extract (AE) and Apparent degree of fermentation (ADF) are the values you have.</li></ul><p>Any one of Alcohol by weight (ABW), Apparent extract (AE) and Original extract (OE) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Original extract (OE), from 10 to 20 — and the answers go from <strong>Alcohol by weight (ABW)</strong> -36.69 % to <strong>Alcohol by weight (ABW)</strong> -35.47 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Original extract (OE) and Apparent extract (AE) is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Real extract (RE), Apparent degree of fermentation (ADF) and Real degree of fermentation (RDF) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Original extract (OE) left as a guess.</strong> If Original extract (OE) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Apparent extract (AE) left as a guess.</strong> If Apparent extract (AE) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If Original extract (OE) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Original extract (OE)</strong> is a degrees plato quantity: the page opens it in p and converts anything else you pick before the formula runs. Concentration of dissolved solids before fermentation. Change it and Alcohol by weight (ABW), Apparent extract (AE) and Apparent degree of fermentation (ADF) changes with it. Check the field label and unit before calculating.</li><li><strong>Apparent extract (AE)</strong> is a degrees plato quantity: the page opens it in p and converts anything else you pick before the formula runs. Concentration of dissolved solids, measured directly with a hydrometer. Change it and Alcohol by weight (ABW), Original extract (OE) and Real extract (RE) changes with it. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Real extract (RE) is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover degrees Plato and liters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Original extract (OE) and Apparent extract (AE) measured, Real extract (RE) and Apparent degree of fermentation (ADF) wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/alcohol-dilution">Alcohol dilution</a>, <a href="/food/wedding-alcohol">Wedding alcohol</a> and <a href="/food/priming-sugar">Priming sugar</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what ABV is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Original extract (OE) and Apparent extract (AE) beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the ABV calculator work out?', 'a' => <<<'TXT'
            Real extract (RE), Apparent degree of fermentation (ADF), Real degree of fermentation (RDF) and Alcohol by volume (ABV), from Apparent extract (AE) and Original extract (OE). The relationship is Alcohol by weight (ABW) = − 357 ÷ 100000 × Apparent extract (AE) × Original extract (OE) − 93 ÷ 250 × Apparent extract (AE) + (357 ÷ 100000) × (Original extract (OE))^(2) + (93 ÷ 250) × Original extract (OE).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Original extract (OE) (degrees Plato), Apparent extract (AE) (degrees Plato). Fill original extract (OE) and apparent extract (AE) and leave Real extract (RE) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Alcohol by weight (ABW), Apparent extract (AE), Original extract (OE) and Real extract (RE) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'Are the ABV results exact?', 'a' => 'It follows the selected inputs and displayed relationship, but ingredients and process conditions vary. Check units, measure carefully and follow a tested recipe or relevant brewing guidance.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Real extract (RE) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Original extract (OE) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Real extract (RE) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/alcohol-dilution', 'name' => 'Alcohol dilution'],
            ['path' => '/food/wedding-alcohol', 'name' => 'Wedding alcohol'],
            ['path' => '/food/priming-sugar', 'name' => 'Priming sugar']
        ],
    ],
];
