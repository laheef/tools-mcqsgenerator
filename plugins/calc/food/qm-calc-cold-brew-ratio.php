<?php

/**
 * Cold brew ratio
 * /food/cold-brew-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cold brew ratio',
    'meta' => ['title' => 'Cold brew ratio Calculator — Formula, Units & Example', 'description' => 'Plan a cold-brew coffee ratio from coffee, water, strength or caffeine values. Check units and follow the recipe or package directions.', 'h1' => 'Cold brew ratio Calculator', 'updated' => '2024-07-27'],
    'sections' => [
        [
            'title' => 'How would you like your cold brew?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coffee_concentrate_volume',
                            'label' => 'Volume of coffee concentrate ',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'strength_select',
                            'label' => 'Strength',
                            'type' => 'select',
                            'options' => ['Weak (1:5.6)' => '3', 'Regular (1:5.3)' => '2', 'Strong (1:5)' => '1', 'Custom ratio' => '0'],
                            'dataset' => 'strenght_DS',
                            'help' => 'The strength is given by the ratio between grams of coffee and milliliters of water (g of coffee : ml of water).',
                            'default' => 'Strong (1:5)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coffee_strength',
                            'label' => '1:',
                            'type' => 'result',
                            'help' => 'For a custom ratio, input the value for water in the strength ratio (1:water). The larger the value you input, the weaker the strength of your coffee.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coffee_strength_2',
                            'label' => '1:',
                            'type' => 'number',
                            'help' => 'For a custom ratio, input the value for water in the strength ratio (1:water). The larger the value you input, the weaker the strength of your coffee.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caffeine_content',
                            'label' => 'Caffeine content',
                            'type' => 'number',
                            'help' => 'Caffeine content depends significantly upon the type of coffee bean and roasting temperature you use. The value shown corresponds to the average.',
                            'unit' => '21',
                            'unit_default' => 'mgpL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caffeine_content_2',
                            'label' => 'Caffeine content',
                            'type' => 'number',
                            'help' => 'Caffeine content depends significantly upon the type of coffee bean and roasting temperature you use. The value shown corresponds to the average.',
                            'unit' => '21',
                            'unit_default' => 'mgpL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'This is what you’ll need to prepare it',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'required_water',
                            'label' => 'Water at room temperature',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coffee_grounds_mass',
                            'label' => 'Coffee grounds (by mass)',
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
                            'name' => 'coffee_grounds_mass_2',
                            'label' => 'Coffee grounds (by mass)',
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
                            'name' => 'coffee_grounds_volume',
                            'label' => 'Coffee grounds (by volume)',
                            'type' => 'number',
                            'help' => 'The volume of coffee grounds depends on the grind size. For more accurate results, please use the mass of coffee grounds instead.',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coffee_grounds_volume_2',
                            'label' => 'Coffee grounds (by volume)',
                            'type' => 'number',
                            'help' => 'The volume of coffee grounds depends on the grind size. For more accurate results, please use the mass of coffee grounds instead.',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'required_water = coffee_concentrate_volume / 0.8',
            'results' => ['required_water' => '(5/4)*coffee_concentrate_volume', 'coffee_concentrate_volume' => '(4/5)*required_water'],
        ],
        [
            'title' => 'coffee_grounds_mass = required_water / coffee_strength',
            'results' => ['coffee_strength' => 'required_water/coffee_grounds_mass', 'required_water' => 'coffee_grounds_mass*coffee_strength', 'coffee_grounds_mass' => 'required_water/coffee_strength'],
        ],
        [
            'title' => 'coffee_grounds_volume =coffee_grounds_mass * 2.15',
            'results' => ['coffee_grounds_volume' => '(43/20)*coffee_grounds_mass', 'coffee_grounds_mass' => '(20/43)*coffee_grounds_volume'],
        ],
        [
            'title' => 'caffeine_content = coffee_grounds_mass * 13.94 / required_water',
            'results' => ['required_water' => '(697/50)*coffee_grounds_mass/caffeine_content', 'coffee_grounds_mass' => '(50/697)*caffeine_content*required_water', 'caffeine_content' => '(697/50)*coffee_grounds_mass/required_water'],
        ],
        [
            'title' => 'coffee_grounds_mass_2 = required_water / coffee_strength_2',
            'results' => ['required_water' => 'coffee_grounds_mass_2*coffee_strength_2', 'coffee_strength_2' => 'required_water/coffee_grounds_mass_2', 'coffee_grounds_mass_2' => 'required_water/coffee_strength_2'],
        ],
        [
            'title' => 'coffee_grounds_volume_2 = coffee_grounds_mass_2 * 2.15',
            'results' => ['coffee_grounds_mass_2' => '(20/43)*coffee_grounds_volume_2', 'coffee_grounds_volume_2' => '(43/20)*coffee_grounds_mass_2'],
        ],
        [
            'title' => 'caffeine_content_2 = coffee_grounds_mass_2 * 13.94 / required_water',
            'results' => ['required_water' => '(697/50)*coffee_grounds_mass_2/caffeine_content_2', 'caffeine_content_2' => '(697/50)*coffee_grounds_mass_2/required_water', 'coffee_grounds_mass_2' => '(50/697)*caffeine_content_2*required_water'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Cold brew ratio takes Volume of coffee concentrate, Strength and Caffeine content and returns 1. The arithmetic is the whole method: 1 is worked out from volume of coffee concentrate by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Cold brew ratio calculator works', 'html' => <<<'TXT'
            <p>Cold brew ratio answers one question from 10 numbers, and the answer is 1.</p><p>Written with the labels from the form, Water at room temperature = (5 ÷ 4) × Volume of coffee concentrate.</p><p>The result panel carries 1, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 10 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Volume of coffee concentrate</strong> — in US customary cups</li><li><strong>Strength</strong> — a plain number, no unit. The strength is given by the ratio between grams of coffee and milliliters of water (g of coffee: ml of water).</li><li><strong>1</strong> — a plain number, no unit. For a custom ratio, input the value for water in the strength ratio (1:water). The larger the value you input, the weaker the strength of your coffee.</li><li><strong>Caffeine content</strong> — in milligrams per liter. Caffeine content depends significantly upon the type of coffee bean and roasting temperature you use. The value shown corresponds to the average.</li><li><strong>Caffeine content</strong> — in milligrams per liter. Caffeine content depends significantly upon the type of coffee bean and roasting temperature you use. The value shown corresponds to the average.</li><li><strong>Water at room temperature</strong> — in US customary cups</li><li><strong>Coffee grounds (by mass)</strong> — in grams</li><li><strong>Coffee grounds (by mass)</strong> — in grams</li><li><strong>Coffee grounds (by volume)</strong> — in US customary cups. The volume of coffee grounds depends on the grind size. For more accurate results, please use the mass of coffee grounds instead.</li><li><strong>Coffee grounds (by volume)</strong> — in US customary cups. The volume of coffee grounds depends on the grind size. For more accurate results, please use the mass of coffee grounds instead.</li></ul><p>The result box is 1. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Volume of coffee concentrate offers 16 units and opens on US customary cups, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Water at room temperature</strong> = <code>(5 ÷ 4) × Volume of coffee concentrate</code></li><li><strong>Volume of coffee concentrate</strong> = <code>(4 ÷ 5) × Water at room temperature</code></li><li><strong>Coffee grounds (by mass)</strong> = <code>Water at room temperature ÷ 1:</code></li><li><strong>1</strong> = <code>Water at room temperature ÷ Coffee grounds (by mass)</code></li><li><strong>Coffee grounds (by volume)</strong> = <code>(43 ÷ 20) × Coffee grounds (by mass)</code></li><li><strong>Caffeine content</strong> = <code>(697 ÷ 50) × Coffee grounds (by mass) ÷ Water at room temperature</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Water at room temperature</strong> = <code>(5 ÷ 4) × Volume of coffee concentrate</code> — the form to use when Volume of coffee concentrate are the values you have.</li><li><strong>Volume of coffee concentrate</strong> = <code>(4 ÷ 5) × Water at room temperature</code> — the form to use when Water at room temperature are the values you have.</li><li><strong>Coffee grounds (by mass)</strong> = <code>Water at room temperature ÷ 1:</code> — the form to use when Water at room temperature and 1 are the values you have.</li><li><strong>1</strong> = <code>Water at room temperature ÷ Coffee grounds (by mass)</code> — the form to use when Water at room temperature and Coffee grounds (by mass) are the values you have.</li><li><strong>Water at room temperature</strong> = <code>Coffee grounds (by mass) × 1:</code> — the form to use when Coffee grounds (by mass) and 1 are the values you have.</li><li><strong>Coffee grounds (by volume)</strong> = <code>(43 ÷ 20) × Coffee grounds (by mass)</code> — the form to use when Coffee grounds (by mass) are the values you have.</li><li><strong>Coffee grounds (by mass)</strong> = <code>(20 ÷ 43) × Coffee grounds (by volume)</code> — the form to use when Coffee grounds (by volume) are the values you have.</li><li><strong>Caffeine content</strong> = <code>(697 ÷ 50) × Coffee grounds (by mass) ÷ Water at room temperature</code> — the form to use when Coffee grounds (by mass) and Water at room temperature are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Water at room temperature, Volume of coffee concentrate and Coffee grounds (by mass) can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Volume of coffee concentrate, Caffeine content and Caffeine content is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with 1 is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Volume of coffee concentrate left as a guess.</strong> If Volume of coffee concentrate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Strength left as a guess.</strong> If Strength is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Volume of coffee concentrate and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cold brew ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Volume of coffee concentrate</strong> is a us customary cups quantity: the page opens it in cups and converts anything else you pick before the formula runs. Change it and Water at room temperature changes with it. Fill it from a measurement rather than a memory — Volume of coffee concentrate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Strength</strong> takes a plain number with no unit attached. The strength is given by the ratio between grams of coffee and milliliters of water (g of coffee: ml of water). Fill it from a measurement rather than a memory — Strength is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>1</strong> takes a plain number with no unit attached. For a custom ratio, input the value for water in the strength ratio (1:water). The larger the value you input, the weaker the strength of your coffee. Change it and Water at room temperature and Coffee grounds (by mass) changes with it. Fill it from a measurement rather than a memory — 1 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Caffeine content</strong> is a milligrams per liter quantity: the page opens it in mgpL and converts anything else you pick before the formula runs. Caffeine content depends significantly upon the type of coffee bean and roasting temperature you use. The value shown corresponds to the average. Change it and Water at room temperature and Coffee grounds (by mass) changes with it. Fill it from a measurement rather than a memory — Caffeine content is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Caffeine content</strong> is a milligrams per liter quantity: the page opens it in mgpL and converts anything else you pick before the formula runs. Caffeine content depends significantly upon the type of coffee bean and roasting temperature you use. The value shown corresponds to the average. Change it and Water at room temperature and Coffee grounds (by mass) changes with it. Fill it from a measurement rather than a memory — Caffeine content is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Water at room temperature</strong> is a us customary cups quantity: the page opens it in cups and converts anything else you pick before the formula runs. Change it and Volume of coffee concentrate, 1 and Coffee grounds (by mass) changes with it. Fill it from a measurement rather than a memory — Water at room temperature is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Coffee grounds (by mass)</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Change it and 1, Water at room temperature and Coffee grounds (by volume) changes with it. Fill it from a measurement rather than a memory — Coffee grounds (by mass) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Coffee grounds (by mass)</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Change it and Water at room temperature, 1 and Coffee grounds (by volume) changes with it. Fill it from a measurement rather than a memory — Coffee grounds (by mass) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Coffee grounds (by volume)</strong> is a us customary cups quantity: the page opens it in cups and converts anything else you pick before the formula runs. The volume of coffee grounds depends on the grind size. For more accurate results, please use the mass of coffee grounds instead. Change it and Coffee grounds (by mass) changes with it. Fill it from a measurement rather than a memory — Coffee grounds (by volume) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Coffee grounds (by volume)</strong> is a us customary cups quantity: the page opens it in cups and converts anything else you pick before the formula runs. The volume of coffee grounds depends on the grind size. For more accurate results, please use the mass of coffee grounds instead. Change it and Coffee grounds (by mass) changes with it. Fill it from a measurement rather than a memory — Coffee grounds (by volume) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>1</strong> is a plain number. The value follows from Water at room temperature and Coffee grounds (by mass). </li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> 1 follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover US customary cups, milligrams per liter and grams. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Volume of coffee concentrate, Strength and 1 measured, 1 wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/wedding-alcohol">Wedding alcohol Calculator</a>, <a href="/food/yeast-converter">Yeast converter Calculator</a> and <a href="/food/alcohol-by-volume">ABV Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cold brew ratio calculator work out?', 'a' => '1, from Volume of coffee concentrate. The relationship is Water at room temperature = (5 ÷ 4) × Volume of coffee concentrate.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Volume of coffee concentrate (US customary cups), Strength, 1, Caffeine content (milligrams per liter), Caffeine content (milligrams per liter). With volume of coffee concentrate, strength and 1 in place, 1: can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Water at room temperature, Volume of coffee concentrate, Coffee grounds (by mass) and 1 can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of 1: is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Volume of coffee concentrate blank and the page solves for it, reporting 1: instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. 1: keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/coffee-ratio', 'name' => 'Coffee ratio'],
            ['path' => '/food/coffee-to-water-ratio', 'name' => 'Coffee to water ratio'],
            ['path' => '/food/coffee', 'name' => 'Coffee']
        ],
    ],
];
