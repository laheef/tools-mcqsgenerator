<?php

/**
 * Cattle per acre
 * /biology/cattle-per-acre
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cattle per acre',
    'meta' => ['title' => 'Cattle per acre Calculator: Units & Formula', 'description' => 'Cattle per acre turns cattle type, animal unit equivalent and pasture area into estimated forage yield and monthly forage available. Any box can be the unknown.', 'h1' => 'Cattle per acre Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cattle_type',
                            'label' => 'Cattle type',
                            'type' => 'select',
                            'options' => [
                                'Cow, 1000 lbs with calf to 4 months' => '1',
                                'Cow, 1300 lbs with calf to 4 months' => '1.3',
                                'Cow, 1400 lbs with calf to 4 months' => '1.4',
                                'Cow, 1500 lbs with calf to 4 months' => '1.5',
                                'Yearling steer' => '0.85',
                                'Heifers, 700 lbs' => '0.8',
                                'Bulls, mature (1700 lbs)' => '1.7',
                                'Custom' => '',
                            ],
                            'dataset' => 'animalUnitEquivalent',
                            'control' => 'DROPDOWN',
                            'default' => 'Cow, 1000 lbs with calf to 4 months',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'animal_unit_equivalent',
                            'label' => 'Animal unit equivalent',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Pasture area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'acre',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pasture_yes_no',
                            'label' => 'Do you know the forage production of your field?',
                            'type' => 'select',
                            'options' => ['No, estimate it for me.' => '0', 'Yes, I\'ll enter it myself.' => '1'],
                            'dataset' => 'pastureYesNo',
                            'default' => 'No, estimate it for me.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'precipitation_zone',
                            'label' => 'Annual precipitation',
                            'type' => 'select',
                            'options' => [
                                '250-350 mm' => '0',
                                '350-450 mm' => '1',
                                '450-550 mm' => '2',
                                '550-650 mm' => '3',
                                'Irrigation' => '4',
                            ],
                            'dataset' => 'precipitationZone',
                            'default' => '350-450 mm',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pasture_condition',
                            'label' => 'Pasture condition',
                            'type' => 'select',
                            'options' => ['Excellent' => '0', 'Good' => '1', 'Fair' => '2', 'Poor' => '3'],
                            'dataset' => 'pastureCondition',
                            'default' => 'Good',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Check the table in the "Tame pasture condition classes explanations" section of the article for more detailed explanation.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'forage_production_lb',
                            'label' => 'Estimated forage yield',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'forage_production_custom',
                            'label' => 'Estimated forage yield',
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
                            'name' => 'lb_to_aum_ratio',
                            'label' => 'AUM conversion ratio',
                            'type' => 'number',
                            'help' => 'According to NRCS, 1 AUM equals 915 lb. Other sources give the values between 760 and 930 lb.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '415', 'when' => null],
                                ['value' => '915', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'forage_production_aum',
                            'label' => 'Estimated forage yield',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'acre',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'forage_production_aum_custom',
                            'label' => 'Estimated forage yield',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'acre',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'utilization_rate',
                            'label' => 'Utilization rate',
                            'type' => 'number',
                            'help' => 'The utilization rate for native pastures is usually 25-50%. The tame pasture utilization rate varies between 50-75%.&nbsp;',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
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
                            'name' => 'forage_available',
                            'label' => 'Monthly forage available',
                            'type' => 'number',
                            'help' => 'The amount of forage that can be yielded concerning the utilization rate.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'forage_available_custom',
                            'label' => 'Monthly forage available',
                            'type' => 'number',
                            'help' => 'The amount of forage that can be yielded concerning the utilization rate.',
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
                            'name' => 'total_forage',
                            'label' => 'Total forage available',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_forage_custom',
                            'label' => 'Total forage available',
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
                            'name' => 'total_animal_units_month',
                            'label' => 'Total forage available',
                            'type' => 'number',
                            'suffix' => 'AUM',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_animal_units_month_custom',
                            'label' => 'Total forage available',
                            'type' => 'number',
                            'suffix' => 'AUM',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cattle',
                            'label' => 'Total cattle number',
                            'type' => 'number',
                            'help' => 'Interpreted as a single head of cattle, or a cow and calf pair, depending on the chosen option.',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cattle_custom',
                            'label' => 'Total cattle number',
                            'type' => 'number',
                            'help' => 'Interpreted as a single head of cattle, or a cow and calf pair, depending on the chosen option.',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cattle_per_area',
                            'label' => 'Cattle per area unit',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'acre',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cattle_per_area_custom',
                            'label' => 'Cattle per area unit',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'acre',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'forage_production_lb = getForageProductionLb(precipitation_zone, pasture_condition)',
            'results' => ['forage_production_lb' => 'getForageProductionLb(precipitation_zone, pasture_condition)'],
        ],
        [
            'title' => 'forage_production_aum = getForageProductionAum(precipitation_zone, pasture_condition)',
            'results' => ['forage_production_aum' => 'getForageProductionAum(precipitation_zone, pasture_condition)'],
        ],
        [
            'title' => 'forage_available = getForageOutput(precipitation_zone, pasture_condition, utilization_rate)',
            'results' => ['forage_available' => 'getForageOutput(precipitation_zone, pasture_condition, utilization_rate)'],
        ],
        [
            'title' => 'forage_available_custom = forage_production_custom * utilization_rate',
            'results' => ['forage_available_custom' => 'forage_production_custom*utilization_rate', 'forage_production_custom' => 'forage_available_custom/utilization_rate', 'utilization_rate' => 'forage_available_custom/forage_production_custom'],
        ],
        [
            'title' => 'forage_production_aum_custom = forage_production_custom / lb_to_aum_ratio',
            'results' => ['lb_to_aum_ratio' => 'forage_production_custom/forage_production_aum_custom', 'forage_production_aum_custom' => 'forage_production_custom/lb_to_aum_ratio', 'forage_production_custom' => 'forage_production_aum_custom*lb_to_aum_ratio'],
        ],
        [
            'title' => 'total_forage = getTotalForage(precipitation_zone, pasture_condition, utilization_rate, area)',
            'results' => ['total_forage' => 'getTotalForage(precipitation_zone, pasture_condition, utilization_rate, area)'],
        ],
        [
            'title' => 'total_forage_custom = forage_available_custom * area',
            'results' => ['forage_available_custom' => 'total_forage_custom/area', 'total_forage_custom' => 'area*forage_available_custom', 'area' => 'total_forage_custom/forage_available_custom'],
        ],
        [
            'title' => 'total_animal_units_month = getTotalForageAum(precipitation_zone, pasture_condition, utilization_rate, area, lb_to_aum_ratio)',
            'results' => ['total_animal_units_month' => 'getTotalForageAum(precipitation_zone, pasture_condition, utilization_rate, area, lb_to_aum_ratio)'],
        ],
        [
            'title' => 'total_animal_units_month_custom = total_forage_custom / lb_to_aum_ratio ',
            'results' => ['lb_to_aum_ratio' => 'total_forage_custom/total_animal_units_month_custom', 'total_animal_units_month_custom' => 'total_forage_custom/lb_to_aum_ratio', 'total_forage_custom' => 'lb_to_aum_ratio*total_animal_units_month_custom'],
        ],
        [
            'title' => 'total_cattle = getTotalCattle(precipitation_zone, pasture_condition, utilization_rate, area, lb_to_aum_ratio, animal_unit_equivalent)',
            'results' => ['total_cattle' => 'getTotalCattle(precipitation_zone, pasture_condition, utilization_rate, area, lb_to_aum_ratio, animal_unit_equivalent)'],
        ],
        [
            'title' => 'total_cattle_custom = total_animal_units_month_custom / animal_unit_equivalent',
            'results' => ['animal_unit_equivalent' => 'total_animal_units_month_custom/total_cattle_custom', 'total_animal_units_month_custom' => 'animal_unit_equivalent*total_cattle_custom', 'total_cattle_custom' => 'total_animal_units_month_custom/animal_unit_equivalent'],
        ],
        [
            'title' => 'cattle_per_area = getCattlePerArea(precipitation_zone, pasture_condition, utilization_rate, lb_to_aum_ratio, animal_unit_equivalent)',
            'results' => ['cattle_per_area' => 'getCattlePerArea(precipitation_zone, pasture_condition, utilization_rate, lb_to_aum_ratio, animal_unit_equivalent)'],
        ],
        [
            'title' => 'total_cattle_custom = cattle_per_area_custom * area',
            'results' => ['cattle_per_area_custom' => 'total_cattle_custom/area', 'total_cattle_custom' => 'area*cattle_per_area_custom', 'area' => 'total_cattle_custom/cattle_per_area_custom'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var forageProductionAumDATA=[[0.75,0.5,0.4,0.25],[1.25,0.8,0.6,0.4],[2,1.4,1.1,0.7],[3.3,2.2,1.6,1.1],[7.5,5,3.75,2.5]];var forageProductionLbDATA=[[700,460,370,230],[1150,740,550,370],[1850,1300,1000,650],[3000,2000,1500,1000],[6900,5150,3500,2300]];omni.define("getForageProductionLb",function(precipitation,pastureCondition){return forageProductionLbDATA[precipitation][pastureCondition]});omni.define("getForageProductionAum",function(precipitation,pastureCondition){return forageProductionAumDATA[precipitation][pastureCondition]});omni.define("getForageOutput",function(precipitation,pastureCondition,utilizationRate){return forageProductionLbDATA[precipitation][pastureCondition]*utilizationRate});omni.define("getTotalForage",function(precipitation,pastureCondition,utilizationRate,area){return forageProductionLbDATA[precipitation][pastureCondition]*utilizationRate*area});omni.define("getTotalForageAum",function(precipitation,pastureCondition,utilizationRate,area,lbToAumRatio){return forageProductionLbDATA[precipitation][pastureCondition]*utilizationRate*area/lbToAumRatio});omni.define("getTotalCattle",function(precipitation,pastureCondition,utilizationRate,area,lbToAumRatio,animalUnitEquivalent){return forageProductionLbDATA[precipitation][pastureCondition]*utilizationRate*area/(lbToAumRatio*animalUnitEquivalent)});omni.define("getCattlePerArea",function(precipitation,pastureCondition,utilizationRate,lbToAumRatio,animalUnitEquivalent){return forageProductionLbDATA[precipitation][pastureCondition]*utilizationRate/(lbToAumRatio*animalUnitEquivalent)});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Cattle per acre works out Animal unit equivalent from Cattle type, Pasture area and Do you know the forage production of your field?. The arithmetic is the whole method: animal unit equivalent is worked out from cattle type by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Cattle per acre calculator works', 'html' => <<<'TXT'
            <p>The Cattle per acre calculator applies one relationship to 21 numbers and reports Animal unit equivalent.</p><p>In the form&#039;s own words, Estimated forage yield = getForageProductionLb(Annual precipitation, Pasture condition).</p><p>The answers are Animal unit equivalent; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 21 boxes, and nothing else.</p><ul><li><strong>Cattle type</strong> — a plain number, no unit</li><li><strong>Pasture area</strong> — in acres</li><li><strong>Do you know the forage production of your field?</strong> — a plain number, no unit</li><li><strong>Annual precipitation</strong> — a plain number, no unit</li><li><strong>Pasture condition</strong> — a plain number, no unit</li><li><strong>Estimated forage yield</strong> — a plain number, no unit</li><li><strong>Estimated forage yield</strong> — in kilograms</li><li><strong>AUM conversion ratio</strong> — in kilograms. According to NRCS, 1 AUM equals 915 lb. Other sources give the values between 760 and 930 lb.</li><li><strong>Estimated forage yield</strong> — in acres</li><li><strong>Estimated forage yield</strong> — in acres</li><li><strong>Utilization rate</strong> — in percent. The utilization rate for native pastures is usually 25-50%. The tame pasture utilization rate varies between 50-75%.&amp;nbsp;</li><li><strong>Monthly forage available</strong> — a plain number, no unit. The amount of forage that can be yielded concerning the utilization rate.</li><li><strong>Monthly forage available</strong> — in kilograms. The amount of forage that can be yielded concerning the utilization rate.</li><li><strong>Total forage available</strong> — a plain number, no unit</li><li><strong>Total forage available</strong> — in kilograms</li><li><strong>Total forage available</strong> — in AUM</li><li><strong>Total forage available</strong> — in AUM</li><li><strong>Total cattle number</strong> — a plain number, no unit. Interpreted as a single head of cattle, or a cow and calf pair, depending on the chosen option.</li><li><strong>Total cattle number</strong> — a plain number, no unit. Interpreted as a single head of cattle, or a cow and calf pair, depending on the chosen option.</li><li><strong>Cattle per area unit</strong> — in acres</li><li><strong>Cattle per area unit</strong> — in acres</li></ul><p>What you get back is Animal unit equivalent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Pasture area lists 6 options and opens on acres. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Estimated forage yield</strong> = <code>getForageProductionLb(Annual precipitation, Pasture condition)</code></li><li><strong>Monthly forage available</strong> = <code>getForageOutput(Annual precipitation, Pasture condition, Utilization rate)</code></li><li><strong>Utilization rate</strong> = <code>Monthly forage available ÷ Estimated forage yield</code></li><li><strong>AUM conversion ratio</strong> = <code>Estimated forage yield ÷ Estimated forage yield</code></li><li><strong>Total forage available</strong> = <code>getTotalForage(Annual precipitation, Pasture condition, Utilization rate, Pasture area)</code></li><li><strong>Pasture area</strong> = <code>Total forage available ÷ Monthly forage available</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Estimated forage yield</strong> = <code>getForageProductionLb(Annual precipitation, Pasture condition)</code> — the form to use when Annual precipitation and Pasture condition are the values you have.</li><li><strong>Estimated forage yield</strong> = <code>getForageProductionAum(Annual precipitation, Pasture condition)</code> — the form to use when Annual precipitation and Pasture condition are the values you have.</li><li><strong>Monthly forage available</strong> = <code>getForageOutput(Annual precipitation, Pasture condition, Utilization rate)</code> — the form to use when Annual precipitation, Pasture condition and Utilization rate are the values you have.</li><li><strong>Monthly forage available</strong> = <code>Estimated forage yield × Utilization rate</code> — the form to use when Estimated forage yield and Utilization rate are the values you have.</li><li><strong>Estimated forage yield</strong> = <code>Monthly forage available ÷ Utilization rate</code> — the form to use when Monthly forage available and Utilization rate are the values you have.</li><li><strong>Utilization rate</strong> = <code>Monthly forage available ÷ Estimated forage yield</code> — the form to use when Monthly forage available and Estimated forage yield are the values you have.</li><li><strong>Estimated forage yield</strong> = <code>Estimated forage yield ÷ AUM conversion ratio</code> — the form to use when Estimated forage yield and AUM conversion ratio are the values you have.</li><li><strong>AUM conversion ratio</strong> = <code>Estimated forage yield ÷ Estimated forage yield</code> — the form to use when Estimated forage yield and Estimated forage yield are the values you have.</li></ul><p>Any one of Estimated forage yield, Estimated forage yield and Monthly forage available can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Pasture area, Estimated forage yield and AUM conversion ratio carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Animal unit equivalent is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Cattle type left as a guess.</strong> Anything typed into Cattle type is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Pasture area left as a guess.</strong> Anything typed into Pasture area is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Cattle type to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Cattle type, Pasture area, Do you know the forage production of your field? and Annual precipitation ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Cattle type — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Animal unit equivalent against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Animal unit equivalent is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover acres, kilograms and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cattle type, Pasture area and Do you know the forage production of your field? and the number you are missing is Animal unit equivalent.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Cattle per acre is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Cattle per acre is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Cattle type, Pasture area, Do you know the forage production of your field? and Annual precipitation beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cattle per acre calculator work out?', 'a' => <<<'TXT'
            Animal unit equivalent, from Annual precipitation and Pasture condition. The relationship is Estimated forage yield = getForageProductionLb(Annual precipitation, Pasture condition).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cattle type, Pasture area (acres), Do you know the forage production of your field?, Annual precipitation, Pasture condition. Enter cattle type, pasture area and do you know the forage production of your field?; Animal unit equivalent is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Estimated forage yield, Estimated forage yield, Monthly forage available and Monthly forage available blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Animal unit equivalent is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Cattle type blank and the page solves for it, reporting Animal unit equivalent instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Animal unit equivalent keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/base-pair-to-kda', 'name' => 'Base Pair to kDa Calculator'],
            ['path' => '/biology/bca-assay-calculator', 'name' => 'BCA Assay (standard curve) Calculator'],
            ['path' => '/biology/beer-lambert-a280-protein-concentration', 'name' => 'Beer-Lambert A280 Protein Concentration Calculator'],
        ],
        'authors' => [],
    ],
];
