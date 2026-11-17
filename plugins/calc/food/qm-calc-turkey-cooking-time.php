<?php

/**
 * Turkey roasting-time range
 * /food/turkey-cooking-time
 *
 * Uses the USDA FSIS approximate table for a fully thawed, unstuffed whole
 * turkey in a 325 F oven. The output is a planning range, never a doneness test.
 */

return [
    'name' => 'Turkey Roasting Time Calculator',
    'meta' => [
        'title' => 'Turkey Roasting Time Calculator — USDA Table',
        'description' => 'Get USDA approximate roasting-time ranges for a thawed, unstuffed whole turkey at 325°F. Verify 165°F with a food thermometer; time is not a safety test.',
        'h1' => 'Turkey Roasting Time Calculator',
        'updated' => '2026-10-23',
    ],
    'sections' => [
        [
            'title' => 'Choose a USDA weight range',
            'note' => 'For a fully thawed, unstuffed whole turkey roasted at 325°F (163°C). The result is an approximate time range, not a doneness check. USDA recommends cooking stuffing separately; use a thermometer to verify the turkey reaches 165°F (74°C) in the recommended locations.',
            'fields' => [
                [
                    'name' => 'weightBand',
                    'label' => 'Turkey weight range',
                    'type' => 'select',
                    'dataset' => 'turkeyWeightBand',
                    'control' => 'SELECT',
                    'options' => [
                        '8–12 lb (3.63–5.44 kg)' => '1',
                        '12–14 lb (5.44–6.35 kg)' => '2',
                        '14–18 lb (6.35–8.16 kg)' => '3',
                        '18–20 lb (8.16–9.07 kg)' => '4',
                        '20–24 lb (9.07–10.89 kg)' => '5',
                    ],
                    'default' => '8–12 lb (3.63–5.44 kg)',
                ],
                [
                    'name' => 'timeFromHours',
                    'label' => 'Approximate lower time (hours)',
                    'type' => 'number',
                    'unit' => 'omni',
                    'readonly' => true,
                    'rounding' => ['standard', '2'],
                ],
                [
                    'name' => 'timeToHours',
                    'label' => 'Approximate upper time (hours)',
                    'type' => 'number',
                    'unit' => 'omni',
                    'readonly' => true,
                    'rounding' => ['standard', '2'],
                ],
            ],
        ],
    ],
    'formula' => [
        'timeFromHours' => 'if_else(weightBand == 1, 2.75, if_else(weightBand == 2, 3, if_else(weightBand == 3, 3.75, if_else(weightBand == 4, 4.25, 4.5))))',
        'timeToHours' => 'if_else(weightBand == 1, 3, if_else(weightBand == 2, 3.75, if_else(weightBand == 3, 4.25, if_else(weightBand == 4, 4.5, 5))))',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Choose the USDA weight band for a fully thawed, unstuffed whole turkey and this calculator returns the corresponding approximate roasting-time range at 325°F (163°C). For example, the USDA table lists 2¾–3 hours for an 8–12 lb turkey. Times help with scheduling only: they cannot confirm that meat is cooked. Use a food thermometer and verify 165°F (74°C) in the thickest part of the breast and the innermost parts of the thigh and wing. USDA recommends cooking stuffing separately.
        TXT,
        'sections' => [
            [
                'title' => 'What this calculator returns',
                'html' => <<<'TXT'
                <p>This tool looks up the approximate roasting-time range published by the U.S. Department of Agriculture’s Food Safety and Inspection Service (USDA FSIS) for an unstuffed whole turkey at an oven temperature of 325°F (163°C). Select the weight band printed on the package or determined by weighing the bird. The result shows the lower and upper ends of that published range in hours.</p>
                <p>The result is a schedule estimate, not a cooking instruction for every turkey and not a food-safety test. Ovens, pans, bird shape and starting conditions vary. A turkey may need more or less time than the table suggests. Check internal temperature with a food thermometer; do not decide that a turkey is safe because a timer has reached the displayed number.</p>
                <p>The table used here is specifically for a fully thawed, unstuffed whole turkey roasted at 325°F. It does not cover turkey breast-only products, stuffed birds, other oven temperatures, convection settings, deep-frying, smoking, grilling, or cooking from frozen. For those situations, use the relevant tested instructions and verify doneness as USDA advises.</p>
                TXT,
            ],
            [
                'title' => 'The USDA time bands in the calculator',
                'html' => <<<'TXT'
                <p>USDA FSIS publishes approximate unstuffed roasting times at 325°F (163°C). The calculator uses these ranges:</p>
                <table><thead><tr><th>Whole turkey weight</th><th>Approximate roasting time</th></tr></thead><tbody>
                <tr><td>8–12 lb (about 3.6–5.4 kg)</td><td>2¾–3 hours</td></tr>
                <tr><td>12–14 lb (about 5.4–6.4 kg)</td><td>3–3¾ hours</td></tr>
                <tr><td>14–18 lb (about 6.4–8.2 kg)</td><td>3¾–4¼ hours</td></tr>
                <tr><td>18–20 lb (about 8.2–9.1 kg)</td><td>4¼–4½ hours</td></tr>
                <tr><td>20–24 lb (about 9.1–10.9 kg)</td><td>4½–5 hours</td></tr>
                </tbody></table>
                <p>The kilogram figures in the selector are rounded conversions of the pound ranges. If your measured weight is close to a boundary, check the original package weight and the USDA table rather than treating the rounded kilogram label as an exact cutoff. This tool selects one published band; it does not interpolate between bands or promise that a particular bird will be ready at a specific minute.</p>
                TXT,
            ],
            [
                'title' => 'How to use the weight selector',
                'html' => <<<'TXT'
                <ol><li>Confirm that you are cooking a whole turkey that is fully thawed and unstuffed. This page does not calculate for other forms or methods.</li><li>Find the turkey’s weight on its package or weigh it. Choose the matching pound band in the selector; the approximate kilogram equivalents are shown to help metric users.</li><li>Read the lower and upper cooking-time estimates. Use them to plan when to begin checking, not as a substitute for monitoring the oven or checking temperature.</li><li>Start checking with a food thermometer before the upper time is reached. If the turkey has not reached the safe temperature, continue cooking and check again.</li><li>Check the correct parts of the bird. A temperature reading from only one place may miss a cooler area.</li></ol>
                <p>If the turkey weighs less than 8 lb or more than 24 lb, falls outside the selector, or is a breast rather than a whole bird, do not extrapolate a time from this calculator. Use a source that covers that exact product and cooking method, and keep checking temperature rather than stretching the listed range.</p>
                TXT,
            ],
            [
                'title' => 'Why the answer is a range, not one exact time',
                'html' => <<<'TXT'
                <p>The source table itself provides approximate intervals. A 12–14 lb turkey is listed at about 3–3¾ hours, not at one exact finish time. The calculator preserves that range instead of inventing a midpoint or implying minute-level accuracy. Start checking as the range approaches, and allow for variation in your oven and the bird.</p>
                <p>Several factors influence how quickly heat reaches the center: the bird’s shape and thickness, whether it is completely thawed, the accuracy of the oven thermostat, how often the oven door is opened, the pan and rack, and how the bird is positioned. The weight band cannot capture all of those details. A time calculation therefore cannot establish doneness or make an unsafe process safe.</p>
                <p>Do not shorten the cooking period by choosing a “fast” setting or raising the oven temperature based on this page. The displayed table is tied to 325°F. If you use another preparation or oven setting, follow a recipe tested for it and continue using a thermometer. The same applies if your turkey is covered, in an oven bag, spatchcocked, or cooked with a different appliance: those methods are outside this lookup.</p>
                TXT,
            ],
            [
                'title' => 'Oven temperature and preparation',
                'html' => <<<'TXT'
                <p>USDA’s timetable is for an oven set to 325°F (163°C), and its roasting guidance says not to set the oven below 325°F. Preheat the oven according to the cooking instructions you are following. Use a shallow roasting pan and rack as directed by USDA or by a tested recipe. This calculator does not alter its time range for a lower temperature, a fan setting, or a different appliance.</p>
                <p>Use a fully thawed turkey for the table’s estimate. If it is still frozen or icy, do not assume that choosing a heavier range compensates. USDA provides separate guidance for cooking from frozen, and the process may take at least 50 percent longer than for a fully thawed turkey. Follow the official instructions for that case rather than applying this unstuffed, thawed-bird calculator.</p>
                <p>Follow package directions for any special product, including a pre-stuffed frozen turkey. USDA advises that only inspected frozen pre-stuffed turkeys should be purchased and that they should be cooked from the frozen state without thawing; the package directions govern. That product is not covered by this calculator.</p>
                TXT,
            ],
            [
                'title' => 'Use a thermometer to check doneness',
                'html' => <<<'TXT'
                <p>USDA FSIS says a whole turkey is safe when it reaches a minimum internal temperature of 165°F (74°C). Use a food thermometer; color, clear juices, a pop-up indicator, elapsed time, and the calculator’s result are not substitutes for measuring temperature.</p>
                <p>For a whole turkey, USDA advises checking the innermost part of the thigh and wing and the thickest part of the breast. Insert the thermometer into the thickest portion without touching bone, and check more than one location. If a reading is below 165°F, continue cooking and recheck. Clean the thermometer between readings if it contacts raw or undercooked meat.</p>
                <p>After cooking, USDA recommends letting the turkey stand for 20 minutes before carving. The rest time is separate from the approximate oven-time range. Handle the cooked bird with clean utensils and surfaces, and refrigerate leftovers promptly according to current food-safety guidance.</p>
                TXT,
            ],
            [
                'title' => 'Why stuffing is not included',
                'html' => <<<'TXT'
                <p>This calculator covers unstuffed turkey only. USDA says stuffing a whole turkey is not recommended for optimum safety and recommends cooking stuffing separately in a casserole. A stuffed bird can take longer, and the center of the stuffing must also reach 165°F (74°C). This page does not calculate stuffed-turkey times, so do not add a guessed number of minutes to the unstuffed range.</p>
                <p>If you choose to stuff a turkey, use current USDA instructions: prepare ingredients safely, fill the cavities loosely, cook immediately, and verify the center of the stuffing reaches 165°F with a food thermometer. Follow the same safe temperature check for the turkey meat itself. A time estimate for an unstuffed turkey cannot verify either temperature.</p>
                <p>Cooking stuffing separately makes it easier to verify its temperature and is USDA’s recommended approach. Whether stuffing is inside or outside the bird, treat it as food that requires safe handling and a measured temperature—not as something that is done merely because the turkey’s estimated time has passed.</p>
                TXT,
            ],
            [
                'title' => 'Thawing, serving and other methods',
                'html' => <<<'TXT'
                <p>The time bands assume a fully thawed bird. For refrigerator thawing, USDA recommends allowing approximately 24 hours for every 4–5 lb while the refrigerator is at 40°F (4°C) or below. Cold-water thawing requires leakproof wrapping, cold tap water, changing the water every 30 minutes, and cooking immediately once thawed. Microwave thawing requires the appliance manufacturer’s directions and immediate cooking. See our <a href="/food/turkey-thawing">Turkey thawing calculator</a> for a separate planning aid; it also does not assess readiness or replace official instructions.</p>
                <p>If your meal schedule changes, do not leave raw turkey at room temperature to make up time. Choose a safe thawing method, keep the bird cold until cooking, and follow the handling guidance for your product. A cooking-time range cannot tell whether thawing was completed safely or how long raw poultry has been held.</p>
                <p>This page also does not calculate frying, grilling, smoking, roasting at a different temperature, or cooking a turkey breast alone. Each method changes how heat reaches the food. Use instructions written for the specific method and verify the required temperature with a food thermometer.</p>
                TXT,
            ],
            [
                'title' => 'Worked examples',
                'html' => <<<'TXT'
                <p><strong>An 8–12 lb whole turkey:</strong> select the first band. The result is 2.75–3 hours, which is the calculator’s numeric display of USDA’s 2¾–3 hour interval. Begin checking temperature before the high end; do not stop cooking until the thermometer confirms the safe temperature.</p>
                <p><strong>A 15 lb whole turkey:</strong> choose the 14–18 lb band. The published approximate range is 3¾–4¼ hours. The tool does not calculate an exact time for 15 lb because the USDA timetable gives a range for the band.</p>
                <p><strong>A 22 lb whole turkey:</strong> choose the 20–24 lb band. The output is 4½–5 hours at 325°F for a fully thawed, unstuffed bird. The actual cooking time may differ; use the thermometer readings, not the clock, to decide when it is done.</p>
                <p>These examples all use the same table lookup. The “lower” and “upper” outputs are simply the published interval endpoints expressed in decimal hours. For example, 2¾ hours is 2.75 hours, and 4¼ hours is 4.25 hours.</p>
                TXT,
            ],
            [
                'title' => 'Sources and limits',
                'html' => <<<'TXT'
                <p>The weight bands and approximate unstuffed roasting intervals are taken from USDA FSIS’s <a href="https://www.fsis.usda.gov/food-safety/safe-food-handling-and-preparation/poultry/lets-talk-turkey-roasting">Let’s Talk Turkey—A Consumer Guide to Safely Roasting a Turkey</a>. The USDA page specifies a 325°F oven and emphasizes that times are approximate and a food thermometer must be used. Its <a href="https://www.fsis.usda.gov/food-safety/safe-food-handling-and-preparation/poultry/turkey-farm-table">Turkey from Farm to Table</a> guide gives additional safe-handling and temperature information.</p>
                <p>This calculator reproduces only the five whole-turkey, unstuffed weight bands in that table. It does not cover breast-only sizes, stuffing, frozen cooking, alternate oven settings, recipe adjustments, or doneness verification. Consult the source guidance and product directions for any case that differs.</p>
                TXT,
            ],
        ],
        'faq' => [
            ['q' => 'What does the Turkey Roasting Time Calculator estimate?', 'a' => 'It returns the USDA approximate roasting-time range for a fully thawed, unstuffed whole turkey at 325°F, based on the selected weight band.'],
            ['q' => 'Does the result tell me when the turkey is safe to eat?', 'a' => 'No. Use a food thermometer and verify 165°F (74°C) in the thickest part of the breast and the innermost parts of the thigh and wing.'],
            ['q' => 'Why does the calculator show a range?', 'a' => 'USDA publishes approximate intervals rather than exact finish times. Ovens and birds vary, so the range is for planning and temperature checks determine doneness.'],
            ['q' => 'Can I use this for stuffed turkey?', 'a' => 'No. The calculator is for unstuffed whole turkey. USDA recommends cooking stuffing separately; if you stuff the bird, follow USDA instructions and verify the stuffing center reaches 165°F (74°C).'],
            ['q' => 'Can I use the table for a frozen turkey or a different oven temperature?', 'a' => 'No. The table is for a fully thawed bird in a 325°F oven. Use USDA instructions for cooking from frozen or for other methods and settings.'],
            ['q' => 'What if my turkey weight is outside the listed ranges?', 'a' => 'This calculator covers only 8–24 lb whole turkeys. Do not extrapolate outside those bands; consult a tested source for the product and method you are using.'],
        ],
        'related' => [
            ['path' => '/food/turkey-thawing', 'name' => 'Turkey thawing'],
            ['path' => '/food/turkey-defrost', 'name' => 'Turkey defrost time'],
            ['path' => '/food/ham-cooking', 'name' => 'Ham cooking time'],
        ],
    ],
];
