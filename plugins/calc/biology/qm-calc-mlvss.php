<?php

/**
 * Mixed liquor volatile suspended solids
 * /biology/mlvss
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mixed liquor volatile suspended solids',
    'meta' => ['title' => 'Mixed liquor volatile suspended solids: Steps & Units', 'description' => 'Mixed liquor volatile suspended solids takes method, sample volume and weight of filter paper and returns MLSS and fixed solids. A worked example follows.', 'h1' => 'Mixed liquor volatile suspended solids Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'method',
                            'label' => 'Method',
                            'type' => 'select',
                            'options' => ['Laboratory' => '1', 'Industrial' => '2'],
                            'dataset' => 'method',
                            'default' => 'Laboratory',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Mixed liquor suspended solid experiment',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MLSS_sample',
                            'label' => 'Sample volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'dm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MLSS_before',
                            'label' => 'Weight of filter paper',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MLSS_after',
                            'label' => 'Weight of filter paper + residue',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MLSS',
                            'label' => 'MLSS',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Fixed solids experiment',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FS_sample',
                            'label' => 'Sample volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'dm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FS_before',
                            'label' => 'Weight of crucible',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FS_after',
                            'label' => 'Weight of crucible + ash',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Fixed_solids',
                            'label' => 'Fixed solids',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Flow rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flow_mgd',
                            'label' => 'Flow',
                            'type' => 'number',
                            'unit' => '146',
                            'unit_default' => 'm-day',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'HRT',
                            'label' => 'HRT',
                            'type' => 'number',
                            'help' => 'Hydraulic retention time.',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Chemical oxygen demand',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_untreated_influent_COD',
                            'label' => 'Average untreated in-fluent COD',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_primary_treated_COD',
                            'label' => 'Average primary treated COD',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'primary_effluent_COD',
                            'label' => 'Primary effluent COD',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'COD_lb_day',
                            'label' => 'COD added to aeration',
                            'type' => 'number',
                            'unit' => '147',
                            'unit_default' => 'kgd',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Aerator dimensions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'l',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'w',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'side_wall_depth',
                            'label' => 'Sidewall depth',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'free_board',
                            'label' => 'Free-board',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aeration_vol_mg',
                            'label' => 'Aeration volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Biological component',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'F_M_ratio',
                            'label' => 'F/M ratio',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Food to microorganism ratio. Please note that the full units are mass unit per day of COD / mass unit of MLVSS. Use the unit switcher on the right to change the mass unit selected.
                            TXT,
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
                            'name' => 'MLVSS_lbs',
                            'label' => 'MLVSS (mass)',
                            'type' => 'number',
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
                            'name' => 'MLVSS',
                            'label' => 'MLVSS (conc.)',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'mgpL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'primary_effluent_COD = average_untreated_influent_COD - average_primary_treated_COD',
            'results' => ['average_untreated_influent_COD' => 'average_primary_treated_COD + primary_effluent_COD', 'average_primary_treated_COD' => 'average_untreated_influent_COD - primary_effluent_COD', 'primary_effluent_COD' => '-average_primary_treated_COD + average_untreated_influent_COD'],
        ],
        [
            'title' => 'COD_lb_day = flow_mgd * primary_effluent_COD * 8.34 / 1000',
            'results' => ['primary_effluent_COD' => '(50000/417)*COD_lb_day/flow_mgd', 'COD_lb_day' => '(417/50000)*flow_mgd*primary_effluent_COD', 'flow_mgd' => '(50000/417)*COD_lb_day/primary_effluent_COD'],
        ],
        [
            'title' => 'aeration_vol_mg = (l * w * (side_wall_depth - free_board) * 7.48) ',
            'results' => [
                'free_board' => '-25/187*aeration_vol_mg/(l*w) + side_wall_depth',
                'l' => '-25/187*aeration_vol_mg/(w*(free_board - side_wall_depth))',
                'w' => '-25/187*aeration_vol_mg/(l*(free_board - side_wall_depth))',
                'aeration_vol_mg' => '(187/25)*l*w*(-free_board + side_wall_depth)',
                'side_wall_depth' => '(25/187)*aeration_vol_mg/(l*w) + free_board',
            ],
        ],
        [
            'title' => 'HRT = aeration_vol_mg / (flow_mgd / 24)',
            'results' => ['aeration_vol_mg' => '(1/24)*HRT*flow_mgd', 'HRT' => '24*aeration_vol_mg/flow_mgd', 'flow_mgd' => '24*aeration_vol_mg/HRT'],
        ],
        [
            'title' => 'MLVSS_lbs = COD_lb_day / F_M_ratio',
            'results' => ['MLVSS_lbs' => 'COD_lb_day/F_M_ratio', 'F_M_ratio' => 'COD_lb_day/MLVSS_lbs', 'COD_lb_day' => 'F_M_ratio*MLVSS_lbs'],
        ],
        [
            'title' => 'MLVSS = MLVSS_lbs / (aeration_vol_mg * 8.34 / 1000000)',
            'results' => ['MLVSS_lbs' => '(417/50000000)*MLVSS*aeration_vol_mg', 'aeration_vol_mg' => '(50000000/417)*MLVSS_lbs/MLVSS', 'MLVSS' => '(50000000/417)*MLVSS_lbs/aeration_vol_mg'],
        ],
        [
            'title' => 'MLSS = ((MLSS_after - MLSS_before)) / MLSS_sample',
            'results' => ['MLSS_after' => 'MLSS*MLSS_sample + MLSS_before', 'MLSS' => '(MLSS_after - MLSS_before)/MLSS_sample', 'MLSS_before' => '-MLSS*MLSS_sample + MLSS_after', 'MLSS_sample' => '(MLSS_after - MLSS_before)/MLSS'],
        ],
        [
            'title' => 'Fixed_solids = ((FS_after - FS_before)) / FS_sample',
            'results' => ['FS_after' => 'FS_before + FS_sample*Fixed_solids', 'FS_sample' => '(FS_after - FS_before)/Fixed_solids', 'Fixed_solids' => '(FS_after - FS_before)/FS_sample', 'FS_before' => 'FS_after - FS_sample*Fixed_solids'],
        ],
        [
            'title' => 'MLVSS = MLSS - Fixed_solids',
            'results' => ['Fixed_solids' => 'MLSS - MLVSS', 'MLSS' => 'Fixed_solids + MLVSS', 'MLVSS' => '-Fixed_solids + MLSS'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Mixed liquor volatile suspended solids works out Sample volume and Weight of filter paper from Average untreated in-fluent COD and Average primary treated COD. Nothing is looked up on this page: sample volume is computed from average untreated in-fluent COD and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Sample volume is opened in cubic decimeters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Mixed liquor volatile suspended solids calculator works', 'html' => <<<'TXT'
            <p>The Mixed liquor volatile suspended solids calculator applies one relationship to 2 numbers and reports Sample volume, Weight of filter paper and Weight of filter paper + residue.</p><p>In the form&#039;s own words, Primary effluent COD = − Average primary treated COD + Average untreated in-fluent COD.</p><p>The answers are Sample volume, Weight of filter paper, Weight of filter paper + residue and MLSS; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Average untreated in-fluent COD</strong> — in grams per liter</li><li><strong>Average primary treated COD</strong> — in grams per liter</li></ul><p>The answers come back as Sample volume in cubic decimeters, Weight of filter paper in grams, Weight of filter paper + residue in grams, MLSS in grams per liter, Sample volume in cubic decimeters, Weight of crucible in grams, Weight of crucible + ash in grams, Fixed solids in grams per liter, Flow in cubic meters per day, HRT in hours / minutes, Primary effluent COD in grams per liter, COD added to aeration in kilograms per day, Length in meters, Width in meters, Sidewall depth in meters, Free-board in meters, Aeration volume in cubic meters, F/M ratio, MLVSS (mass) in kilograms, MLVSS (conc.) in milligrams per liter. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Sample volume lists 17 options and opens on cubic decimeters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Primary effluent COD</strong> = <code>− Average primary treated COD + Average untreated in-fluent COD</code></li><li><strong>Average untreated in-fluent COD</strong> = <code>Average primary treated COD + Primary effluent COD</code></li><li><strong>Average primary treated COD</strong> = <code>Average untreated in-fluent COD − Primary effluent COD</code></li><li><strong>COD added to aeration</strong> = <code>(417 ÷ 50000) × Flow × Primary effluent COD</code></li><li><strong>Flow</strong> = <code>(50000 ÷ 417) × COD added to aeration ÷ Primary effluent COD</code></li><li><strong>Aeration volume</strong> = <code>(187 ÷ 25) × Length × Width × ( − Free-board + Sidewall depth)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Primary effluent COD</strong> = <code>− Average primary treated COD + Average untreated in-fluent COD</code> — the form to use when Average primary treated COD and Average untreated in-fluent COD are the values you have.</li><li><strong>Average untreated in-fluent COD</strong> = <code>Average primary treated COD + Primary effluent COD</code> — the form to use when Average primary treated COD and Primary effluent COD are the values you have.</li><li><strong>Average primary treated COD</strong> = <code>Average untreated in-fluent COD − Primary effluent COD</code> — the form to use when Average untreated in-fluent COD and Primary effluent COD are the values you have.</li><li><strong>COD added to aeration</strong> = <code>(417 ÷ 50000) × Flow × Primary effluent COD</code> — the form to use when Flow and Primary effluent COD are the values you have.</li><li><strong>Primary effluent COD</strong> = <code>(50000 ÷ 417) × COD added to aeration ÷ Flow</code> — the form to use when COD added to aeration and Flow are the values you have.</li><li><strong>Flow</strong> = <code>(50000 ÷ 417) × COD added to aeration ÷ Primary effluent COD</code> — the form to use when COD added to aeration and Primary effluent COD are the values you have.</li><li><strong>Aeration volume</strong> = <code>(187 ÷ 25) × Length × Width × ( − Free-board + Sidewall depth)</code> — the form to use when Length, Width, Free-board and Sidewall depth are the values you have.</li><li><strong>Free-board</strong> = <code>− 25 ÷ 187 × Aeration volume ÷ (Length × Width) + Sidewall depth</code> — the form to use when Aeration volume, Length, Width and Sidewall depth are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Primary effluent COD, Average untreated in-fluent COD and Average primary treated COD can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Average untreated in-fluent COD and Average primary treated COD carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Sample volume, Weight of filter paper and Weight of filter paper + residue are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Average untreated in-fluent COD left as a guess.</strong> Anything typed into Average untreated in-fluent COD is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Average primary treated COD left as a guess.</strong> Anything typed into Average primary treated COD is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Average untreated in-fluent COD and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Mixed liquor volatile suspended solids form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Average untreated in-fluent COD</strong> is a grams per liter quantity: the page opens it in gperL and converts anything else you pick before the formula runs. The page reads it when it works out Average primary treated COD and Primary effluent COD. Fill it from a measurement rather than a memory — Average untreated in-fluent COD is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Average primary treated COD</strong> is a grams per liter quantity: the page opens it in gperL and converts anything else you pick before the formula runs. The page reads it when it works out Average untreated in-fluent COD and Primary effluent COD. Fill it from a measurement rather than a memory — Average primary treated COD is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Average untreated in-fluent COD and Average primary treated COD ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Average untreated in-fluent COD — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Sample volume in dm3 against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Sample volume is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover cubic decimeters, grams and grams per liter. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Average untreated in-fluent COD and Average primary treated COD and the number you are missing is Sample volume and Weight of filter paper.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Mixed liquor volatile suspended solids is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mixed liquor volatile suspended solids calculator work out?', 'a' => <<<'TXT'
            Sample volume, Weight of filter paper, Weight of filter paper + residue and MLSS, from Average primary treated COD and Average untreated in-fluent COD. The relationship is Primary effluent COD = − Average primary treated COD + Average untreated in-fluent COD.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Average untreated in-fluent COD (grams per liter), Average primary treated COD (grams per liter). Fill average untreated in-fluent COD and average primary treated COD and leave Sample volume empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Primary effluent COD, Average untreated in-fluent COD, Average primary treated COD and COD added to aeration can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Sample volume is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Average untreated in-fluent COD blank and the page solves for it, reporting Sample volume instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Sample volume keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/respiratory-quotient', 'name' => 'Respiratory Quotient Calculator'],
            ['path' => '/biology/restriction-digest', 'name' => 'Restriction Digest Calculator'],
            ['path' => '/biology/restriction-digest-setup', 'name' => 'Restriction Digest Reaction Setup Calculator — Formula & Resul'],
        ],
        'authors' => [],
    ],
];
