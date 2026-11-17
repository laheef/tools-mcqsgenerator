<?php

/**
 * Cups to pounds
 * /food/cups-to-pounds
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cups to pounds',
    'meta' => ['title' => 'Cups to pounds Calculator — Formula & Results', 'description' => 'Convert ingredient volume to weight using its density, or solve for a missing value. Check the ingredient, packing and units before using the result.', 'h1' => 'Cups to pounds Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'substance',
                            'label' => 'Ingredient',
                            'type' => 'select',
                            'options' => [
                                'Almonds' => '460',
                                'Breadcrumbs' => '450',
                                'Butter' => '959',
                                'Cashew nuts' => '500',
                                'Chocolate chips' => '730',
                                'Coconut (shredded)' => '406',
                                'Coffee (fresh beans)' => '561',
                                'Coffee (roast beans)' => '423',
                                'Cream (light)' => '2012',
                                'Cream (heavy)' => '994',
                                'Eggs (raw)' => '1025',
                                'Flour (all purpose, bread, or wheat)' => '530',
                                'Flour (cake)' => '482',
                                'Honey' => '1420',
                                'Jam' => '1339',
                                'Juice' => '1060',
                                'Maple syrup ' => '1320',
                                'Mayonnaise' => '910',
                                'Milk' => '1030',
                                'Milk (condensed)' => '1293',
                                'Milk (evaporated) ' => '1065',
                                'Peanuts (shelled)' => '641',
                                'Peanut butter' => '1082',
                                'Oats (quick or rolled)' => '338',
                                'Oil (vegetable, olive, coconut)' => '946',
                                'Rice (uncooked)' => '760',
                                'Salt' => '1217',
                                'Sugar (granulated or brown)' => '845',
                                'Sugar (powdered) ' => '511',
                                'Sunflower seeds' => '620',
                                'Walnuts' => '495',
                                'Water ' => '1000',
                                'Yogurt, plain' => '1060',
                                'Custom ingredient' => '',
                            ],
                            'dataset' => 'Substance',
                            'control' => 'DROPDOWN',
                            'default' => 'Water ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'density',
                            'label' => 'Density',
                            'type' => 'result',
                            'unit' => '21',
                            'unit_default' => 'ozcu-in',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volume',
                            'label' => 'Volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mass',
                            'label' => 'Weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'lb',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'mass = density * volume',
            'results' => ['mass' => 'density*volume', 'volume' => 'mass/density', 'density' => 'mass/volume'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Ingredient, Volume and Weight into Cups to pounds and the answer comes back as Density. There is no hidden constant here: change density and ingredient moves with it. The main result, Density, is reported in ounces per cubic inch.
        TXT,
        'sections' => [
            ['title' => 'How the Cups to pounds calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cups to pounds: it takes 3 numbers and reports Density.</p><p>The relationship it solves reads Weight = Density × Volume.</p><p>What comes back is Density — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Ingredient</strong> — a plain number, no unit</li><li><strong>Volume</strong> — in US customary cups</li><li><strong>Weight</strong> — in pounds</li></ul><p>The result box is Density in ounces per cubic inch. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Weight</strong> = <code>Density × Volume</code></li><li><strong>Volume</strong> = <code>Weight ÷ Density</code></li><li><strong>Density</strong> = <code>Weight ÷ Volume</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Weight</strong> = <code>Density × Volume</code> — the form to use when Density and Volume are the values you have.</li><li><strong>Volume</strong> = <code>Weight ÷ Density</code> — the form to use when Weight and Density are the values you have.</li><li><strong>Density</strong> = <code>Weight ÷ Volume</code> — the form to use when Weight and Volume are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Weight, Volume and Density can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Volume and Weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Density is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Ingredient left as a guess.</strong> Anything typed into Ingredient is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Volume left as a guess.</strong> Anything typed into Volume is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> If Ingredient is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cups to pounds form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Ingredient</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Ingredient is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Volume</strong> is a us customary cups quantity: the page opens it in cups and converts anything else you pick before the formula runs. Change it and Weight and Density changes with it. Fill it from a measurement rather than a memory — Volume is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Weight</strong> is a pounds quantity: the page opens it in lb and converts anything else you pick before the formula runs. Change it and Volume and Density changes with it. Fill it from a measurement rather than a memory — Weight is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Density</strong> is a ounces per cubic inch figure. The value follows from Weight and Volume. </li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Cups to pounds actually offers.</p><ul><li><strong>ounces per cubic inch</strong> — opens in <em>ozcu-in</em>, and the chip also carries kg/m³, lb/cu ft, g/mL, g/cm³, mg/mL and lb/US gal. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>US customary cups</strong> — opens in <em>cups</em>, and the chip also carries L, cl, cc, cm³, m³ and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>pounds</strong> — opens in <em>lb</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Ingredient, Volume and Weight ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Ingredient — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Density in ozcu-in against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Density is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover ounces per cubic inch, US customary cups and pounds. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Ingredient, Volume and Weight is what you already know and Density is what you need — the reverse of that situation is what the rearranged form is for.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/pounds-to-cups">Pounds to cups</a>, <a href="/food/grams-to-cups">Grams to cups</a> and <a href="/food/cooking-measurement">Cooking measurement</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which values do I need before I start?', 'a' => 'Ingredient, Volume (US customary cups), Weight (pounds). With ingredient, volume and weight in place, Density can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Weight, Volume and Density can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Density is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Ingredient blank and the page solves for it, reporting Density instead of the usual answer.'],
        ],
        'related' => [
            ['path' => '/food/pounds-to-cups', 'name' => 'Pounds to cups'],
            ['path' => '/food/grams-to-cups', 'name' => 'Grams to cups'],
            ['path' => '/food/cooking-measurement', 'name' => 'Cooking measurement']
        ],
    ],
];
