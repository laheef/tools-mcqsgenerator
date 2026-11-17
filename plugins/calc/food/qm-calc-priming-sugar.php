<?php

/**
 * Priming sugar
 * /food/priming-sugar
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Priming sugar',
    'meta' => ['title' => 'Priming sugar Calculator — Formula & Results', 'description' => 'Estimate priming sugar for a target carbonation level using beer volume and style. Check units and follow the recipe or package directions.', 'h1' => 'Priming sugar Calculator', 'updated' => '2026-07-28'],
    'sections' => [
        [
            'title' => 'What style of beer would you like to make?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'style',
                            'label' => 'Style',
                            'type' => 'select',
                            'options' => [
                                'American Amber Ale' => '1',
                                'American Barley Wine' => '2',
                                'American Brown Ale' => '3',
                                'American Pale Ale' => '4',
                                'American Wheat Beer' => '5',
                                'Baltic Porter' => '6',
                                'Barley Wine' => '7',
                                'Bavarian Dunkel' => '8',
                                'Bavarian Hefe Weizen' => '9',
                                'Bavarian Helles' => '10',
                                'Belgian Blond' => '11',
                                'Belgian Dubbel' => '12',
                                'Belgian Strong Golden Ale' => '13',
                                'Belgian Tripel' => '14',
                                'Biѐre de Garde' => '15',
                                'Bock' => '16',
                                'Breakfast Stout' => '17',
                                'British Bitter' => '18',
                                'British Old Ale' => '19',
                                'California Common' => '20',
                                'Cream Ale' => '21',
                                'Czech Pilsner' => '22',
                                'Dopplebock' => '23',
                                'Double IPA' => '24',
                                'Dry Irish Stout' => '25',
                                'Dunkelweizen' => '26',
                                'English Brown Ale' => '27',
                                'English Pale Ale' => '28',
                                'Extra Special Bitter' => '29',
                                'German Alt' => '30',
                                'Imperial Stout' => '31',
                                'India Pale Ale' => '32',
                                'Irish Red Ale' => '33',
                                'Kölsch' => '34',
                                'Maibock' => '35',
                                'Mild Ale' => '36',
                                'Oktoberfest' => '37',
                                'Phat Tyre Amber Ale' => '38',
                                'Porter' => '39',
                                'Rauchbier' => '40',
                                'Roggenbier' => '41',
                                'Saison' => '42',
                                'Schwarzbier' => '43',
                                'Scottish 60/-' => '44',
                                'Scottish 80/-' => '45',
                                'Scottish Wee Heavy' => '46',
                                'Stout' => '47',
                                'Winter Ale' => '48',
                                'Witbier' => '49',
                                'Custom' => '50',
                            ],
                            'dataset' => 'beer_styleDS',
                            'control' => 'DROPDOWN',
                            'default' => 'Custom',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Input some numbers:',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_carbonation',
                            'label' => 'Final CO==2== volume',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beer_volume',
                            'label' => 'Volume of your brew',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temp',
                            'label' => 'Fermentation temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'carbon',
                            'label' => 'Current CO==2== volume',
                            'type' => 'number',
                            'help' => 'The volume of CO₂ before refermentation.',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'show_current_CO2',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show current CO==2== volume' => '1', '' => '0'],
                            'dataset' => 'show_current_CO2DS',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How much priming sugar do you need?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sugar_kind',
                            'label' => 'Priming sugar type',
                            'type' => 'select',
                            'options' => ['Table sugar (sucrose)' => '1', 'Corn sugar (dextrose)' => '0.91', 'Dry malt extract (DME)' => '0.6800133487', 'Honey' => '0.779'],
                            'dataset' => 'sugar kind',
                            'default' => 'Table sugar (sucrose)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'priming_sugar',
                            'label' => 'Priming sugar',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'carbon=3.0378 - 0.050062*temp+0.00026555*temp^2',
            'results' => ['temp' => '(20/5311)*sqrt(265550000*carbon - 180136829) + 500620/5311', 'carbon' => '(5311/20000000)*pow(temp, 2) - 25031/500000*temp + 15189/5000'],
        ],
        [
            'title' => 'final_carbonation =0.065811*sugar_kind*priming_sugar/beer_volume + carbon',
            'results' => [
                'final_carbonation' => 'carbon + (65811/1000000)*priming_sugar*sugar_kind/beer_volume',
                'priming_sugar' => '(1000000/65811)*beer_volume*(-carbon + final_carbonation)/sugar_kind',
                'beer_volume' => '-65811*priming_sugar*sugar_kind/(1000000*carbon - 1000000*final_carbonation)',
                'sugar_kind' => '(1000000/65811)*beer_volume*(-carbon + final_carbonation)/priming_sugar',
                'carbon' => 'final_carbonation - 65811/1000000*priming_sugar*sugar_kind/beer_volume',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Priming sugar takes Fermentation temperature and returns Final CO₂ volume and Volume of your brew. The arithmetic is the whole method: final CO₂ volume is worked out from fermentation temperature by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Priming sugar calculator works', 'html' => <<<'TXT'
            <p>Priming sugar answers one question from 1 number, and the answer is Final CO₂ volume, Volume of your brew and Current CO₂ volume.</p><p>In the form&#039;s own words, Current CO₂ volume = (5311 ÷ 20000000) × (Fermentation temperature)^(2) − 25031 ÷ 500000 × Fermentation temperature + 15189 ÷ 5000.</p><p>The result panel carries Final CO₂ volume, Volume of your brew, Current CO₂ volume and Priming sugar type, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Fermentation temperature</strong> — in Celsius</li></ul><p>The result boxes are Final CO₂ volume, Volume of your brew in liters, Current CO₂ volume, Priming sugar type, Priming sugar in grams; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Style = 50 and Show current CO 2 = 0 gives <strong>Priming sugar type</strong> = 1.</p><ul><li><strong>Priming sugar type</strong> = 1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Current CO₂ volume</strong> = <code>(5311 ÷ 20000000) × (Fermentation temperature)^(2) − 25031 ÷ 500000 × Fermentation temperature + 15189 ÷ 5000</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Priming sugar type</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Volume of your brew offers 16 units and opens on liters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Current CO₂ volume</strong> = <code>(5311 ÷ 20000000) × (Fermentation temperature)^(2) − 25031 ÷ 500000 × Fermentation temperature + 15189 ÷ 5000</code></li><li><strong>Fermentation temperature</strong> = <code>(20 ÷ 5311) × √(265550000 × Current CO₂ volume − 180136829) + 500620 ÷ 5311</code></li><li><strong>Final CO₂ volume</strong> = <code>Current CO₂ volume + (65811 ÷ 1000000) × Priming sugar × Priming sugar type ÷ Volume of your brew</code></li><li><strong>Priming sugar</strong> = <code>(1000000 ÷ 65811) × Volume of your brew × ( − Current CO₂ volume + Final CO₂ volume) ÷ Priming sugar type</code></li><li><strong>Volume of your brew</strong> = <code>− 65811 × Priming sugar × Priming sugar type ÷ (1000000 × Current CO₂ volume − 1000000 × Final CO₂ volume)</code></li><li><strong>Priming sugar type</strong> = <code>(1000000 ÷ 65811) × Volume of your brew × ( − Current CO₂ volume + Final CO₂ volume) ÷ Priming sugar</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Current CO₂ volume</strong> = <code>(5311 ÷ 20000000) × (Fermentation temperature)^(2) − 25031 ÷ 500000 × Fermentation temperature + 15189 ÷ 5000</code> — the form to use when Fermentation temperature are the values you have.</li><li><strong>Fermentation temperature</strong> = <code>(20 ÷ 5311) × √(265550000 × Current CO₂ volume − 180136829) + 500620 ÷ 5311</code> — the form to use when Current CO₂ volume are the values you have.</li><li><strong>Final CO₂ volume</strong> = <code>Current CO₂ volume + (65811 ÷ 1000000) × Priming sugar × Priming sugar type ÷ Volume of your brew</code> — the form to use when Current CO₂ volume, Priming sugar, Priming sugar type and Volume of your brew are the values you have.</li><li><strong>Priming sugar</strong> = <code>(1000000 ÷ 65811) × Volume of your brew × ( − Current CO₂ volume + Final CO₂ volume) ÷ Priming sugar type</code> — the form to use when Volume of your brew, Current CO₂ volume, Final CO₂ volume and Priming sugar type are the values you have.</li><li><strong>Volume of your brew</strong> = <code>− 65811 × Priming sugar × Priming sugar type ÷ (1000000 × Current CO₂ volume − 1000000 × Final CO₂ volume)</code> — the form to use when Priming sugar, Priming sugar type, Current CO₂ volume and Final CO₂ volume are the values you have.</li><li><strong>Priming sugar type</strong> = <code>(1000000 ÷ 65811) × Volume of your brew × ( − Current CO₂ volume + Final CO₂ volume) ÷ Priming sugar</code> — the form to use when Volume of your brew, Current CO₂ volume, Final CO₂ volume and Priming sugar are the values you have.</li><li><strong>Current CO₂ volume</strong> = <code>Final CO₂ volume − 65811 ÷ 1000000 × Priming sugar × Priming sugar type ÷ Volume of your brew</code> — the form to use when Final CO₂ volume, Priming sugar, Priming sugar type and Volume of your brew are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Current CO₂ volume, Fermentation temperature and Final CO₂ volume can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Style, from 50 to 100 — and the answers go from <strong>Priming sugar type</strong> 1 to <strong>Priming sugar type</strong> 1.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Fermentation temperature is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Final CO₂ volume, Volume of your brew and Current CO₂ volume are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Fermentation temperature left as a guess.</strong> If Fermentation temperature is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If Fermentation temperature is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Priming sugar form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Fermentation temperature</strong> is a celsius quantity: the page opens it in C and converts anything else you pick before the formula runs. It feeds Current CO₂ volume. Fill it from a measurement rather than a memory — Fermentation temperature is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Final CO₂ volume</strong> is a plain number. It is worked out from Current CO₂ volume, Priming sugar, Priming sugar type and Volume of your brew. </li><li><strong>Volume of your brew</strong> is a liters figure. It is worked out from Priming sugar, Priming sugar type, Current CO₂ volume and Final CO₂ volume. </li><li><strong>Current CO₂ volume</strong> is a plain number. It is worked out from Fermentation temperature. </li><li><strong>Priming sugar type</strong> is a plain number and the page's own defaults put it at 1. It is worked out from Volume of your brew, Current CO₂ volume, Final CO₂ volume and Priming sugar. </li><li><strong>Priming sugar</strong> is a grams figure. It is worked out from Volume of your brew, Current CO₂ volume, Final CO₂ volume and Priming sugar type. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Priming sugar type</th></tr></thead><tbody><tr><td><strong>Style</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Style sits at the top — a ten per cent error in that box shows up as roughly 0 per cent in the answer. By contrast, Style barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Style = 25 and Show current CO 2 = 0 and the page reports <strong>Priming sugar type</strong> = 1.</li><li>Feed in Style = 150 and Show current CO 2 = 0 and the page reports <strong>Priming sugar type</strong> = 1.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Priming sugar actually offers.</p><ul><li><strong>liters</strong> — opens in <em>liters</em>, and the chip also carries L, cl, cc, cm³, m³ and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>grams</strong> — opens in <em>g</em>, and the chip also carries g, mg, lb, oz and st. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>Celsius</strong> — opens in <em>C</em>, and the chip also carries °F, K and °R. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Final CO₂ volume is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are liters, grams and Celsius and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Fermentation temperature are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Fermentation temperature is what you already know and Final CO₂ volume and Volume of your brew is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/alcohol-by-volume">ABV</a>, <a href="/food/yeast-converter">Yeast converter</a> and <a href="/food/sulfur">Sulfur</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Priming sugar calculator work out?', 'a' => <<<'TXT'
            Final CO₂ volume, Volume of your brew, Current CO₂ volume and Priming sugar type, from Fermentation temperature. The relationship is Current CO₂ volume = (5311 ÷ 20000000) × (Fermentation temperature)^(2) − 25031 ÷ 500000 × Fermentation temperature + 15189 ÷ 5000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Fermentation temperature (Celsius). Enter fermentation temperature; Final CO₂ volume is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Current CO₂ volume, Fermentation temperature, Final CO₂ volume and Priming sugar can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'Are the Priming sugar results exact?', 'a' => 'It follows the selected inputs and displayed relationship, but ingredients and process conditions vary. Check units, measure carefully and follow a tested recipe or relevant brewing guidance.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Final CO₂ volume is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Fermentation temperature blank and the page solves for it, reporting Final CO₂ volume instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Final CO₂ volume keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/food/alcohol-by-volume', 'name' => 'ABV'],
            ['path' => '/food/yeast-converter', 'name' => 'Yeast converter'],
            ['path' => '/food/sulfur', 'name' => 'Sulfur']
        ],
    ],
];
