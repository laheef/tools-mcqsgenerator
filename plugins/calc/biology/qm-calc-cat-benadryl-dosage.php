<?php

/**
 * Cat Benadryl dosage
 * /biology/cat-benadryl-dosage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cat Benadryl dosage',
    'meta' => ['title' => 'Cat Benadryl dosage Calculator: Units & Formula', 'description' => 'Cat Benadryl dosage turns your cat\'s weight into diphenhydramine in milligrams, then into tablets, chewable tablets or millilitres of the 12.4 mg/5 mL liquid.', 'h1' => 'Cat Benadryl dosage Calculator', 'updated' => '2026-09-28'],
    'raw' => [
        'vars' => [
            'benadryl_mg' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'chewable_tablets' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'chewable_tablets_show' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'liquid' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'tablets' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'tablets_show' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => '6urlD_DdtN5Fmd6R8z-uJ',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => '  Your cat\'s weight',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'KRNcuXDqY2iB17zcIAlMG',
                'title' => 'Benadryl dosage',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'benadryl_mg',
                                    'vt' => 'numerical',
                                    'l' => 'In mg',
                                    'us' => '22',
                                    'du' => 'mg',
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
                                    'n' => 'liquid',
                                    'vt' => 'numerical',
                                    'l' => 'Liquid (12.4 mg/5ml concentration)',
                                    'us' => '20',
                                    'du' => 'ml',
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
                                    'n' => 'tablets_show',
                                    'vt' => 'numerical',
                                    'l' => 'Tablets of 25 mg',
                                    'suf' => '#',
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
                                    'n' => 'chewable_tablets_show',
                                    'vt' => 'numerical',
                                    'l' => 'Chewable tablets of 12.5 mg',
                                    'suf' => '#',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'eVerNpQDYbAdL3eb8Zfmc',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1_FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'tablets',
                                    'vt' => 'numerical',
                                    'l' => 'Tablets',
                                    'suf' => '#',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'chewable_tablets',
                                    'vt' => 'numerical',
                                    'l' => 'Chewable tablets',
                                    'suf' => '#',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'weight = benadryl_mg',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => 'benadryl_mg',
                        'r' => ['benadryl_mg'],
                    ],
                    [
                        'l' => 'benadryl_mg',
                        'f' => 'weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'benadryl_mg/ 25 = tablets',
                'var' => [
                    [
                        'l' => 'tablets',
                        'f' => '(1/25)*benadryl_mg',
                        'r' => ['benadryl_mg'],
                    ],
                    [
                        'l' => 'benadryl_mg',
                        'f' => '25*tablets',
                        'r' => ['tablets'],
                    ],
                ],
            ],
            [
                'formula' => 'benadryl_mg/ 2.5 = liquid',
                'var' => [
                    [
                        'l' => 'liquid',
                        'f' => '(2/5)*benadryl_mg',
                        'r' => ['benadryl_mg'],
                    ],
                    [
                        'l' => 'benadryl_mg',
                        'f' => '(5/2)*liquid',
                        'r' => ['liquid'],
                    ],
                ],
            ],
            [
                'formula' => 'benadryl_mg/ 12.5 = chewable_tablets',
                'var' => [
                    [
                        'l' => 'chewable_tablets',
                        'f' => '(2/25)*benadryl_mg',
                        'r' => ['benadryl_mg'],
                    ],
                    [
                        'l' => 'benadryl_mg',
                        'f' => '(25/2)*chewable_tablets',
                        'r' => ['chewable_tablets'],
                    ],
                ],
            ],
            [
                'formula' => 'tablets_show = floor(4*tablets)/4',
                'var' => [
                    [
                        'l' => 'tablets_show',
                        'f' => '(1/4)*floor(4*tablets)',
                        'r' => ['tablets'],
                    ],
                ],
            ],
            [
                'formula' => ' chewable_tablets_show = floor(chewable_tablets*4)/4',
                'var' => [
                    [
                        'l' => 'chewable_tablets_show',
                        'f' => '(1/4)*floor(4*chewable_tablets)',
                        'r' => ['chewable_tablets'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cat Benadryl dosage takes In mg and returns Your cat's weight and Liquid (12.4 mg/5ml concentration). It is a single relationship that reads your cat's weight out of in mg, not a table of canned results keyed by them. Units for Your cat's weight default to kilograms and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Cat Benadryl dosage calculator works', 'html' => <<<'TXT'
            <p>The Cat Benadryl dosage calculator applies one relationship to 1 number and reports Your cat&#039;s weight, Liquid (12.4 mg/5ml concentration) and Tablets of 25 mg.</p><p>Written with the labels from the form, Your cat&#039;s weight = In mg.</p><p>The answers are Your cat&#039;s weight, Liquid (12.4 mg/5ml concentration), Tablets of 25 mg and Chewable tablets of 12.5 mg; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>In mg</strong> — in milligrams</li></ul><p>The result boxes are Your cat&#039;s weight in kilograms, Liquid (12.4 mg/5ml concentration) in milliliters, Tablets of 25 mg in #, Chewable tablets of 12.5 mg in #, Tablets in #, Chewable tablets in #; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, In mg = 10 mg gives <strong>Your cat&amp;#039;s weight</strong> = 10 kg, <strong>Tablets</strong> = 0.4 #, <strong>Liquid (12.4 mg/5ml concentration)</strong> = 4 ml, <strong>Chewable tablets</strong> = 0.8 #, <strong>Tablets of 25 mg</strong> = 0.25 # and <strong>Chewable tablets of 12.5 mg</strong> = 0.75 #.</p><ul><li><strong>Your cat&#039;s weight</strong> = 10 kg</li><li><strong>Tablets</strong> = 0.4 #</li><li><strong>Liquid (12.4 mg/5ml concentration)</strong> = 4 ml</li><li><strong>Chewable tablets</strong> = 0.8 #</li><li><strong>Tablets of 25 mg</strong> = 0.25 #</li><li><strong>Chewable tablets of 12.5 mg</strong> = 0.75 #</li></ul><p>The line behind those figures is <strong>Your cat&#039;s weight</strong> = <code>In mg</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Your cat&amp;#039;s weight</strong> = 10, <strong>Tablets</strong> = 0.4, <strong>Liquid (12.4 mg/5ml concentration)</strong> = 4, <strong>Chewable tablets</strong> = 0.8, <strong>Tablets of 25 mg</strong> = 0.25 and <strong>Chewable tablets of 12.5 mg</strong> = 0.75 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Your cat&#039;s weight offers 7 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Your cat&#039;s weight</strong> = <code>In mg</code></li><li><strong>In mg</strong> = <code>Your cat&#039;s weight</code></li><li><strong>Tablets</strong> = <code>(1 ÷ 25) × In mg</code></li><li><strong>Liquid (12.4 mg/5ml concentration)</strong> = <code>(2 ÷ 5) × In mg</code></li><li><strong>Chewable tablets</strong> = <code>(2 ÷ 25) × In mg</code></li><li><strong>Tablets of 25 mg</strong> = <code>(1 ÷ 4) × floor(4 × Tablets)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Your cat&#039;s weight</strong> = <code>In mg</code> — the form to use when In mg are the values you have.</li><li><strong>In mg</strong> = <code>Your cat&#039;s weight</code> — the form to use when Your cat&#039;s weight are the values you have.</li><li><strong>Tablets</strong> = <code>(1 ÷ 25) × In mg</code> — the form to use when In mg are the values you have.</li><li><strong>In mg</strong> = <code>25 × Tablets</code> — the form to use when Tablets are the values you have.</li><li><strong>Liquid (12.4 mg/5ml concentration)</strong> = <code>(2 ÷ 5) × In mg</code> — the form to use when In mg are the values you have.</li><li><strong>In mg</strong> = <code>(5 ÷ 2) × Liquid (12.4 mg/5ml concentration)</code> — the form to use when Liquid (12.4 mg/5ml concentration) are the values you have.</li><li><strong>Chewable tablets</strong> = <code>(2 ÷ 25) × In mg</code> — the form to use when In mg are the values you have.</li><li><strong>In mg</strong> = <code>(25 ÷ 2) × Chewable tablets</code> — the form to use when Chewable tablets are the values you have.</li></ul><p>Any one of Your cat&#039;s weight, In mg and Tablets can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double In mg from 10 to 20, leaving every other box alone. The panel moves from <strong>Your cat&amp;#039;s weight</strong> 10 kg, <strong>Tablets</strong> 0.4 #, <strong>Liquid (12.4 mg/5ml concentration)</strong> 4 ml, <strong>Chewable tablets</strong> 0.8 #, <strong>Tablets of 25 mg</strong> 0.25 # and <strong>Chewable tablets of 12.5 mg</strong> 0.75 # to <strong>Your cat&amp;#039;s weight</strong> 20 kg, <strong>Tablets</strong> 0.8 #, <strong>Liquid (12.4 mg/5ml concentration)</strong> 8 ml, <strong>Chewable tablets</strong> 1.6 #, <strong>Tablets of 25 mg</strong> 0.75 # and <strong>Chewable tablets of 12.5 mg</strong> 1.5 #.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside In mg is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Your cat&#039;s weight, Liquid (12.4 mg/5ml concentration) and Tablets of 25 mg are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>In mg left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If In mg is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If In mg is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cat Benadryl dosage form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>In mg</strong> is a milligrams quantity: the page opens it in mg and converts anything else you pick before the formula runs. Change it and Your cat's weight, Tablets and Liquid (12.4 mg/5ml concentration) changes with it. Fill it from a measurement rather than a memory — In mg is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Your cat&#039;s weight</strong> is a kilograms figure and the page's own defaults put it at 10 kg. The value follows from In mg. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Liquid (12.4 mg/5ml concentration)</strong> is a milliliters figure and the page's own defaults put it at 4 ml. The value follows from In mg. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tablets of 25 mg</strong> is a plain number and the page's own defaults put it at 0.25. The value follows from Tablets. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Chewable tablets of 12.5 mg</strong> is a plain number and the page's own defaults put it at 0.75. The value follows from Chewable tablets. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tablets</strong> is a plain number and the page's own defaults put it at 0.4. The value follows from In mg. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Chewable tablets</strong> is a plain number and the page's own defaults put it at 0.8. The value follows from In mg. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Your cat&#039;s weight</th><th>Tablets</th><th>Liquid (12.4 mg/5ml concentration)</th><th>Chewable tablets</th><th>Tablets of 25 mg</th><th>Chewable tablets of 12.5 mg</th></tr></thead><tbody><tr><td><strong>In mg</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, In mg sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in In mg = 5 mg and the page reports <strong>Your cat&#039;s weight</strong> = 5 kg, <strong>Tablets</strong> = 0.2 #, <strong>Liquid (12.4 mg/5ml concentration)</strong> = 2 ml, <strong>Chewable tablets</strong> = 0.4 #, <strong>Tablets of 25 mg</strong> = 0 # and <strong>Chewable tablets of 12.5 mg</strong> = 0.25 #.</li><li>Feed in In mg = 30 mg and the page reports <strong>Your cat&#039;s weight</strong> = 30 kg, <strong>Tablets</strong> = 1.2 #, <strong>Liquid (12.4 mg/5ml concentration)</strong> = 12 ml, <strong>Chewable tablets</strong> = 2.4 #, <strong>Tablets of 25 mg</strong> = 1 # and <strong>Chewable tablets of 12.5 mg</strong> = 2.25 #.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Cat Benadryl dosage actually offers.</p><ul><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>milliliters</strong> — opens in <em>ml</em>, and the chip also carries L, µl, cl, cc, cm³ and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Your cat&#039;s weight follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and milliliters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes In mg are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are In mg and the number you are missing is Your cat&#039;s weight and Liquid (12.4 mg/5ml concentration).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/simpson-diversity-index">Simpson&#039;s Diversity Index Calculator</a>, <a href="/biology/svi-sludge-volume-index">Sludge Volume Index (SVI) Calculator</a> and <a href="/biology/sod">Sod Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat Benadryl dosage calculator work out?', 'a' => <<<'TXT'
            Your cat's weight, Liquid (12.4 mg/5ml concentration), Tablets of 25 mg and Chewable tablets of 12.5 mg, from In mg. The relationship is Your cat's weight = In mg.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'In mg (milligrams). Enter in mg; Your cat\'s weight is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Your cat's weight, In mg, Tablets and Liquid (12.4 mg/5ml concentration) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Your cat's weight = 10 kg, Tablets = 0.4 #, Liquid (12.4 mg/5ml concentration) = 4 ml, Chewable tablets = 0.8 #, Tablets of 25 mg = 0.25 # and Chewable tablets of 12.5 mg = 0.75 #. The figures come from In mg as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Your cat's weight is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave In mg blank and the page solves for it, reporting Your cat\'s weight instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Your cat\'s weight at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/simpson-diversity-index', 'name' => 'Simpson\'s Diversity Index Calculator'],
            ['path' => '/biology/svi-sludge-volume-index', 'name' => 'Sludge Volume Index (SVI) Calculator'],
            ['path' => '/biology/sod', 'name' => 'Sod Calculator'],
        ],
        'authors' => [],
    ],
];
