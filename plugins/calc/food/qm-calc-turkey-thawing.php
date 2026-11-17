<?php

/**
 * Turkey thawing
 * /food/turkey-thawing
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Turkey thawing',
    'meta' => ['title' => 'Turkey Thawing Time Calculator — USDA Planning Rates', 'description' => 'Estimate turkey thawing time by weight in kg for refrigerator or cold water. Plan a start or deadline; use the microwave manual and safe-handling guidance.', 'h1' => 'Turkey Thawing Time Calculator', 'updated' => '2026-10-23'],
    'raw' => [
        'vars' => [
            'end_date' => ['type' => 'datetime', 'rnd' => null],
            'fridge_time' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'method' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'JIuBc_GsLqNPVdZfhVMXc', 'c' => null],
                ],
                'ds' => 'Kx2pPDtktuwB9FbVOBeW-',
            ],
            'start_date' => ['type' => 'datetime', 'rnd' => null],
            'start_end_vs' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '0FlUIBAqo4U9Ju05M56NX', 'c' => null],
                ],
                'ds' => 'OyuTRRgYP03Ty06kerSD6',
            ],
            'thawed_time_end' => ['type' => 'datetime', 'rnd' => null],
            'thawed_time_end_hour' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'thawed_time_start' => ['type' => 'datetime', 'rnd' => null],
            'thawed_time_start_hour' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'water_time' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '7', 'c' => null],
                ],
            ],
        ],
        'groups' => [
            [
                'uid' => 'qJIucqpTqgxjY_hXCXs5m',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'This calculator estimates turkey thawing time for refrigerator and cold-water methods. It does not estimate microwave thawing time; use the appliance manufacturer’s instructions.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'L0YGIAjH_U8mhcr0jx0v1',
                'title' => 'Thawing details',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'method',
                                    'vt' => 'valueSelect',
                                    'l' => 'Thawing method ',
                                    'ds' => 'Kx2pPDtktuwB9FbVOBeW-',
                                    'opts' => [
                                        ['JIuBc_GsLqNPVdZfhVMXc', ' Refrigerator', '1'],
                                        ['1P2g9Eutr01sVHDVUBq9O', ' Cold water', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Keep the refrigerator at 40&nbsp;°F (4&nbsp;°C) or below.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Turkey size (kg)',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'start_end_vs',
                                    'vt' => 'valueSelect',
                                    'l' => 'Will you set the starting or ending time?',
                                    'ds' => 'OyuTRRgYP03Ty06kerSD6',
                                    'opts' => [
                                        ['0FlUIBAqo4U9Ju05M56NX', 'Start time', '1'],
                                        ['JLy8U7lZrxMc0hfoZBYLD', 'End time', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'start_date', 'vt' => 'datetime', 'l' => 'Start time  '],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'end_date', 'vt' => 'datetime', 'l' => 'End time  '],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'ZPStSKPu7YboER0r7W93-',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'fridge_time',
                                    'vt' => 'numerical',
                                    'l' => 'Refrigerator estimate (days)',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'water_time',
                                    'vt' => 'numerical',
                                    'l' => 'Cold-water estimate (hours)',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        ['hasValue(thawed_time_start) and start_end_vs == 1', 'Looks like your turkey should be ready to cook by {{thawed_time_start.longValue}} .&nbsp;'],
                                        ['hasValue(thawed_time_start) and start_end_vs == 1 and (method == 1 or method == 2)', 'We\'re afraid that could be a little late. Have you considered one of the faster, safe thawing methods?'],
                                        [null, 'If you are short on time, do not thaw on the counter or in hot water. Use only a safe method and follow official instructions; cook to a verified safe internal temperature.'], 
                                        ['method == 2 and (thawed_time_start_hour <= 6 or (1 <= thawed_time_end_hour <= 6))', ' Note that the process requires changing water every 30 minutes. Unless you want to stay up all night changing water, we suggest choosing a different method.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        ['method == 1', '• To thaw a turkey properly, follow the steps in the "Thawing in the fridge" section of the article.'],
                                        ['method == 2', '• To thaw a turkey properly, follow the steps in the "What else do you need to know when defrosting your turkey" section of the article.'],
                                        ['method < 4', '• Remember that defrosting is not all – cooking takes time too! Use the turkey cook time calculator for a cooking time estimation ⏲.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'tIOzhK8v8T7bqkMDK4qV8',
                'title' => 'Additional information',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, '• To ensure your health, we base this calculator on the data provided by the U. S. Department of Agriculture\'s official recommendations.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '2LJZKdt_V4ZqTzoap4mnh',
                'title' => 'Hidden',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'thawed_time_end', 'vt' => 'datetime', 'l' => 'Thawed time end'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'thawed_time_start', 'vt' => 'datetime', 'l' => 'Thawed time start'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'thawed_time_end_hour', 'vt' => 'numerical', 'l' => 'Thawed time end hour'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'thawed_time_start_hour', 'vt' => 'numerical', 'l' => 'Thawed time start hour'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'water_time = weight * 66 / 60',
                'var' => [
                    [
                        'l' => 'water_time',
                        'f' => '66*weight/60',
                        'r' => ['weight'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '(60/66)*water_time',
                        'r' => ['water_time'],
                    ],
                ],
            ],
            [
                'formula' => 'fridge_time = weight / 2',
                'var' => [
                    [
                        'l' => 'fridge_time',
                        'f' => '(1/2)*weight',
                        'r' => ['weight'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '2*fridge_time',
                        'r' => ['fridge_time'],
                    ],
                ],
            ],
            [
                'formula' => 'thawed_time_start = if_else(method < 2, start_date + fridge_time, start_date + water_time / 24)',
                'var' => [
                    [
                        'l' => 'thawed_time_start',
                        'f' => 'start_date + if_else(method < 2, fridge_time, water_time / 24)',
                        'r' => ['fridge_time', 'method', 'start_date', 'water_time'],
                    ],
                ],
            ],
            [
                'formula' => 'thawed_time_end = if_else(method < 2, end_date - fridge_time, end_date - water_time / 24)',
                'var' => [
                    [
                        'l' => 'thawed_time_end',
                        'f' => 'end_date - if_else(method < 2, fridge_time, water_time / 24)',
                        'r' => ['end_date', 'fridge_time', 'method', 'water_time'],
                    ],
                ],
            ],
            [
                'formula' => 'thawed_time_start_hour = getHour(thawed_time_start)',
                'var' => [
                    [
                        'l' => 'thawed_time_start_hour',
                        'f' => 'getHour(start_date + if_else(method < 2, fridge_time * 24 * 60 * 60 * 1000, water_time * 60 * 60 * 1000))',
                        'r' => ['fridge_time', 'method', 'start_date', 'water_time'],
                    ],
                ],
            ],
            [
                'formula' => 'thawed_time_end_hour = getHour(thawed_time_end)',
                'var' => [
                    [
                        'l' => 'thawed_time_end_hour',
                        'f' => 'getHour(end_date - if_else(method < 2, fridge_time * 24 * 60 * 60 * 1000, water_time * 60 * 60 * 1000))',
                        'r' => ['end_date', 'fridge_time', 'method', 'water_time'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'Kx2pPDtktuwB9FbVOBeW-' => [
                'name' => 'Thawing method',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'JIuBc_GsLqNPVdZfhVMXc', 'label' => ' Refrigerator', 'value' => '1'],
                    ['uid' => '1P2g9Eutr01sVHDVUBq9O', 'label' => ' Cold water', 'value' => '2'],
                ],
            ],
            'OyuTRRgYP03Ty06kerSD6' => [
                'name' => 'Start or end time',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '0FlUIBAqo4U9Ju05M56NX', 'label' => 'Start time', 'value' => '1'],
                    ['uid' => 'JLy8U7lZrxMc0hfoZBYLD', 'label' => 'End time', 'value' => '2'],
                ],
            ],
        ],
        'js' => '"use strict";omni.define("getHour",function(time){var date=new Date(time);return date.getUTCHours()});//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Estimate turkey thawing time by weight and method, then plan backward from a meal deadline or forward from the time you start. Refrigerator and cold-water estimates use rounded USDA planning rates. Microwave thawing is not timed here; follow your appliance manual and cook the turkey immediately after microwave thawing.
        TXT,
        'sections' => [
            ['title' => 'What this turkey thawing calculator estimates', 'html' => <<<'TXT'
            <p>Choose a thawing method, enter the turkey’s weight, and use the date-and-time controls to calculate when it should be ready. You can plan in either direction: enter a start time to estimate the finish, or a deadline to estimate when thawing must begin. The page reports a refrigerator estimate in days and a cold-water estimate in hours. Microwave thawing is not included in the timed methods because its duration depends on the appliance and manufacturer instructions.</p>
            <p>For refrigerator thawing, the calculator uses about half a day per kilogram. That is a rounded conversion of USDA guidance to allow about 24 hours for each 4 to 5 pounds. For cold-water thawing, it uses about 66 minutes per kilogram, a rounded conversion of the USDA rule of roughly 30 minutes per pound. Rounding makes the arithmetic easy to use; it does not make thawing exact.</p>
            <p>Weight, shape, packaging, refrigerator temperature and how well the bird is sealed can change the real time. A dense, irregular bird may still have icy areas when a simple weight estimate says it should be thawed. Treat the result as a planning estimate and inspect the turkey before cooking.</p>
            TXT],
            ['title' => 'The two USDA-based planning rates', 'html' => <<<'TXT'
            <p><strong>Refrigerator:</strong> allow about one day for every 4 to 5 pounds, with the turkey kept in a refrigerator at 40°F (4°C) or below. At that rate, a 12-pound turkey needs roughly 2½ to 3 days; a 16-pound turkey needs roughly 3 to 4 days. The calculator uses a middle-of-range planning rate, so use the longer end when a firm meal deadline matters.</p>
            <p><strong>Cold water:</strong> allow about 30 minutes per pound. Keep the turkey in airtight wrapping or a leakproof bag, submerge it in cold tap water, and change the water every 30 minutes so it stays cold. A 12-pound turkey therefore takes about 6 hours by this estimate; a 16-pound turkey takes about 8 hours. Cook it immediately after it has thawed.</p>
            <p>The calculator’s rates are conversions of those rules into metric weight and minutes or days. They are not separate USDA predictions for every bird. See the <a href="https://www.fsis.usda.gov/food-safety/safe-food-handling-and-preparation/poultry/turkey-farm-table">USDA FSIS Turkey from Farm to Table guide</a> for the full handling instructions and other safe-thawing details.</p>
            TXT],
            ['title' => 'Microwave thawing needs the appliance instructions', 'html' => <<<'TXT'
            <p>Microwave thawing is not a single dependable minutes-per-kilogram rule. Microwave wattage, turntable, shape of the bird and the manufacturer’s directions all affect the time, so this calculator does not provide a microwave duration. Use the appliance manual, check the bird as directed, and rotate or rearrange it if the manufacturer calls for that.</p>
            <p>USDA advises cooking turkey immediately after thawing it in a microwave because some areas may begin to warm or cook while other areas remain frozen. Do not thaw poultry on the counter or in hot water. Those methods are not offered here: the outside can warm while the center remains frozen, leaving the food in conditions that encourage bacterial growth.</p>
            TXT],
            ['title' => 'Planning from a start time or a meal deadline', 'html' => <<<'TXT'
            <p>Select whether you know when thawing starts or when you need the turkey ready. Enter the corresponding date and time, choose a method, and provide the turkey’s weight. For a start-time plan, the estimate adds the method’s duration to your start. For a deadline plan, it subtracts the duration from the time you entered.</p>
            <p>Use the deadline as a planning checkpoint, not as a guarantee that the bird is ready to cook. Leave a margin for a colder refrigerator, an irregular shape or a frozen cavity. If the turkey is still icy, continue thawing safely rather than leaving it at room temperature to catch up.</p>
            <p>The time-zone display and daylight-saving changes can also matter when the date spans a clock change. Confirm the final local date and time before scheduling cooking. The calculator does not know your appliance, refrigerator temperature, travel time or meal-preparation sequence.</p>
            TXT],
            ['title' => 'A practical workflow', 'html' => <<<'TXT'
            <ol><li><strong>Weigh the turkey.</strong> Enter the weight in kilograms. Convert other units before typing: divide pounds by about 2.20462 to get kilograms.</li><li><strong>Choose a safe method.</strong> Refrigerator thawing is easiest to plan ahead. Cold-water thawing is faster but requires water changes and immediate cooking. Microwave thawing is not timed by this calculator; follow the appliance manual.</li><li><strong>Enter the date or deadline.</strong> Choose start time if thawing has begun or end time if you are planning backward from when you need the turkey ready.</li><li><strong>Read the estimate with a buffer.</strong> If the turkey is not fully thawed at the estimated time, keep using a safe method. Do not switch to counter thawing or a hot bath.</li><li><strong>Check before cooking.</strong> Look for remaining ice in the cavity and confirm the bird is thawed enough for the recipe and safe handling.</li></ol>
            <p>For cold-water thawing, remember that the timer is not a set-and-forget step: the water must be changed every 30 minutes and the bird cooked once thawed.</p>
            TXT],
            ['title' => 'Food-safety limits matter more than the clock', 'html' => <<<'TXT'
            <p>A time estimate cannot test the center of a turkey, verify refrigerator temperature or detect that the water has warmed. It also cannot determine whether the packaging is watertight. Follow the official method instructions and keep raw poultry separate from ready-to-eat food, utensils and work surfaces.</p>
            <p>Thawing is only one part of safe preparation. USDA recommends cooking poultry to a safe minimum internal temperature of 165°F (74°C), measured with a food thermometer in the thickest areas. Time in the oven is not a substitute for checking temperature. If the bird is stuffed, the center of the stuffing also needs to reach 165°F; USDA recommends cooking stuffing separately for optimum safety.</p>
            <p>Wash hands and clean surfaces after handling raw poultry. Refrigerate perishable food promptly. For current guidance, consult USDA FSIS rather than using this calculator as food-safety advice.</p>
            TXT],
            ['title' => 'What the result cannot know', 'html' => <<<'TXT'
            <p>This calculator uses weight and a selected method. It does not measure the actual turkey, read a refrigerator thermometer, account for the shape of the bird or check whether the cavity is still frozen. A larger bird does not always thaw like a smaller bird multiplied by a constant; packaging and temperature make a difference.</p>
            <p>Enter the turkey weight in kilograms; the form does not convert pounds or other units automatically. The displayed time is rounded for readability. That precision is mathematical, not a promise about the food. If the estimate ends shortly before cooking, plan earlier. The extra margin is particularly useful when using refrigerator thawing because that method takes days rather than hours.</p>
            <p>Do not treat a calculator time as permission to use unsafe room-temperature or hot-water thawing. If your plan slips, choose the refrigerator or a correctly managed cold-water method, or follow official microwave instructions and cook immediately after microwave thawing.</p>
            TXT],
            ['title' => 'Sources and further planning', 'html' => <<<'TXT'
            <p>The refrigerator and cold-water rates here are rounded metric conversions of the USDA Food Safety and Inspection Service’s turkey thawing guidance. No microwave time is calculated; use the appliance manufacturer’s defrost instructions and cook the turkey immediately after microwave thawing.</p>
            <p>For safe cooking temperatures, storage and full thawing procedures, use the <a href="https://www.fsis.usda.gov/food-safety/safe-food-handling-and-preparation/poultry/turkey-farm-table">USDA FSIS turkey guide</a>. Once thawing is planned, the <a href="/food/turkey-cooking-time">turkey cooking-time calculator</a> can help with a separate oven-time estimate; always verify doneness with a food thermometer.</p>
            TXT],
            ['title' => 'Quick examples by turkey weight', 'html' => <<<'TXT'
            <p>The table below shows the calculator’s two planning rates for a few kilogram weights: refrigerator thawing uses 0.5 day per kilogram, and cold-water thawing uses 66 minutes per kilogram. They are rounded planning estimates, not guarantees.</p>
            <table><thead><tr><th>Turkey weight</th><th>Refrigerator estimate</th><th>Cold-water estimate</th></tr></thead><tbody>
            <tr><td>4 kg (8.8 lb)</td><td>2 days</td><td>4.4 hours</td></tr>
            <tr><td>6 kg (13.2 lb)</td><td>3 days</td><td>6.6 hours</td></tr>
            <tr><td>8 kg (17.6 lb)</td><td>4 days</td><td>8.8 hours</td></tr>
            </tbody></table>
            <p>These are arithmetic examples, not guarantees. USDA’s refrigerator rule is a range—about a day per 4 to 5 pounds—so a particular bird may need more time than the middle-rate estimate. Shape, packaging, refrigerator temperature and how frozen the bird was all matter. If you have a strict serving time, plan on the longer end and keep a backup cooking plan.</p>
            TXT],
            ['title' => 'Keeping refrigerator thawing on track', 'html' => <<<'TXT'
            <p>Set the wrapped turkey on a tray or in a pan to catch drips, and place it where raw juices cannot contact food that will be eaten without cooking. Keep the refrigerator at 40°F (4°C) or below. A cold refrigerator slows bacterial growth, but it does not make the clock predictable; check the appliance temperature with a refrigerator thermometer if you are unsure.</p>
            <p>Leave enough space around the package for cold air to circulate. Do not stack other food on a leaking or wet package. If the wrapper is damaged, place the bird in a leakproof container. Wash hands and any surfaces that contact raw poultry or its juices.</p>
            <p>A refrigerator-thawed turkey can remain refrigerated for a short period before cooking, but the estimate on this page covers thawing time only. It does not calculate storage life. Follow the package instructions and USDA guidance for the next step; if you need to delay cooking, do not leave the bird on a counter.</p>
            TXT],
            ['title' => 'Managing the cold-water method', 'html' => <<<'TXT'
            <p>Cold-water thawing is faster than refrigerator thawing, but it needs active attention. Keep the turkey in its original leakproof wrapper or put it in a leakproof bag. Submerge it fully in cold tap water, using a clean container large enough to keep the bird covered. Set a timer to replace the water every 30 minutes; water that warms up defeats the method’s purpose.</p>
            <p>Plan the full period so someone can make those changes. Do not leave the turkey in a sink of water overnight, and do not use warm or hot water to speed the process. Once the bird has thawed by the cold-water method, cook it immediately rather than returning it to the refrigerator for later.</p>
            <p>If you cannot maintain the water changes, switch to refrigerator thawing with sufficient time. If the meal is near, consult USDA instructions for safe alternatives. The output here only estimates the time from weight; it cannot verify that water stayed cold or that the center is thawed.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How long does a turkey take to thaw in the refrigerator?', 'a' => 'USDA guidance is about 24 hours for every 4 to 5 pounds in a refrigerator at 40°F (4°C) or below. This calculator uses a rounded midpoint of 0.5 day per kilogram; enter the weight in kilograms and allow extra time if your schedule is tight.'],
            ['q' => 'How long does cold-water thawing take?', 'a' => 'Plan on roughly 30 minutes per pound. Keep the turkey in leakproof wrapping, change the cold water every 30 minutes, and cook the turkey immediately after it thaws.'],
            ['q' => 'Can I thaw a turkey on the counter or in hot water?', 'a' => 'No. Neither method is offered by this calculator. Use the refrigerator, correctly managed cold water, or microwave directions from the appliance manual.'],
            ['q' => 'Does this calculator estimate microwave thawing time?', 'a' => 'No. Microwave ovens and turkey shapes vary; follow the appliance manual and cook immediately after microwave thawing.'],
            ['q' => 'Does the calculator tell me whether the turkey is safe to cook?', 'a' => 'No. It estimates a schedule from weight and method; it cannot sense ice or temperature. Check the bird and use a food thermometer during cooking.'],
            ['q' => 'What temperature should cooked turkey reach?', 'a' => 'USDA recommends 165°F (74°C) in the thickest areas, measured with a food thermometer. This thawing calculator does not measure cooking temperature.'],
        ],
        'related' => [
            ['path' => '/food/turkey-defrost', 'name' => 'Turkey defrost time'],
            ['path' => '/food/turkey-cooking-time', 'name' => 'Turkey cooking time'],
            ['path' => '/food/turkey-size', 'name' => 'Turkey size']
        ],
    ],
];
