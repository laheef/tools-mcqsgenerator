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
    'meta' => ['title' => 'Cat Benadryl dosage: Formula, Steps & Results', 'description' => <<<'TXT'
    Cat Benadryl dosage takes In mg and returns 🐈 Your cat's weight and Liquid (12.4 mg/5ml concentration). It is a single relationship that reads 🐈 Your cat's…
    TXT, 'h1' => 'Cat Benadryl dosage Calculator', 'updated' => '2026-09-28'],
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
                                    'l' => '🐈  Your cat\'s weight',
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
        Cat Benadryl dosage takes In mg and returns 🐈 Your cat's weight and Liquid (12.4 mg/5ml concentration). It is a single relationship that reads 🐈 Your cat's weight out of In mg, not a table of canned results keyed by them. Units for 🐈 Your cat's weight default to kilograms and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Cat Benadryl dosage calculator works', 'html' => <<<'TXT'
            <p>The Cat Benadryl dosage calculator applies one relationship to 1 number and reports 🐈 Your cat&#039;s weight, Liquid (12.4 mg/5ml concentration) and Tablets of 25 mg.</p><p>Written with the labels from the form, 🐈 Your cat&#039;s weight = In mg.</p><p>The answers are 🐈 Your cat&#039;s weight, Liquid (12.4 mg/5ml concentration), Tablets of 25 mg and Chewable tablets of 12.5 mg; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>In mg</strong> — in milligrams</li></ul><p>The result boxes are 🐈 Your cat&#039;s weight in kilograms, Liquid (12.4 mg/5ml concentration) in milliliters, Tablets of 25 mg in #, Chewable tablets of 12.5 mg in #, Tablets in #, Chewable tablets in #; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, In mg = 10 mg gives &lt;strong&gt;🐈 Your cat&amp;#039;s weight&lt;/strong&gt; = 10 kg, &lt;strong&gt;Tablets&lt;/strong&gt; = 0.4 #, &lt;strong&gt;Liquid (12.4 mg/5ml concentration)&lt;/strong&gt; = 4 ml, &lt;strong&gt;Chewable tablets&lt;/strong&gt; = 0.8 #, &lt;strong&gt;Tablets of 25 mg&lt;/strong&gt; = 0.25 # and &lt;strong&gt;Chewable tablets of 12.5 mg&lt;/strong&gt; = 0.75 #.</p><ul><li><strong>🐈 Your cat&#039;s weight</strong> = 10 kg</li><li><strong>Tablets</strong> = 0.4 #</li><li><strong>Liquid (12.4 mg/5ml concentration)</strong> = 4 ml</li><li><strong>Chewable tablets</strong> = 0.8 #</li><li><strong>Tablets of 25 mg</strong> = 0.25 #</li><li><strong>Chewable tablets of 12.5 mg</strong> = 0.75 #</li></ul><p>The line behind those figures is <strong>🐈 Your cat&#039;s weight</strong> = <code>In mg</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;🐈 Your cat&amp;#039;s weight&lt;/strong&gt; = 10, &lt;strong&gt;Tablets&lt;/strong&gt; = 0.4, &lt;strong&gt;Liquid (12.4 mg/5ml concentration)&lt;/strong&gt; = 4, &lt;strong&gt;Chewable tablets&lt;/strong&gt; = 0.8, &lt;strong&gt;Tablets of 25 mg&lt;/strong&gt; = 0.25 and &lt;strong&gt;Chewable tablets of 12.5 mg&lt;/strong&gt; = 0.75 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: 🐈 Your cat&#039;s weight offers 27 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>🐈 Your cat&#039;s weight</strong> = <code>In mg</code></li><li><strong>In mg</strong> = <code>🐈 Your cat&#039;s weight</code></li><li><strong>Tablets</strong> = <code>(1 ÷ 25) × In mg</code></li><li><strong>Liquid (12.4 mg/5ml concentration)</strong> = <code>(2 ÷ 5) × In mg</code></li><li><strong>Chewable tablets</strong> = <code>(2 ÷ 25) × In mg</code></li><li><strong>Tablets of 25 mg</strong> = <code>(1 ÷ 4) × floor(4 × Tablets)</code></li></ul><p>Any one of 🐈 Your cat&#039;s weight, In mg and Tablets can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double In mg from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;🐈 Your cat&amp;#039;s weight&lt;/strong&gt; 10 kg, &lt;strong&gt;Tablets&lt;/strong&gt; 0.4 #, &lt;strong&gt;Liquid (12.4 mg/5ml concentration)&lt;/strong&gt; 4 ml, &lt;strong&gt;Chewable tablets&lt;/strong&gt; 0.8 #, &lt;strong&gt;Tablets of 25 mg&lt;/strong&gt; 0.25 # and &lt;strong&gt;Chewable tablets of 12.5 mg&lt;/strong&gt; 0.75 # to &lt;strong&gt;🐈 Your cat&amp;#039;s weight&lt;/strong&gt; 20 kg, &lt;strong&gt;Tablets&lt;/strong&gt; 0.8 #, &lt;strong&gt;Liquid (12.4 mg/5ml concentration)&lt;/strong&gt; 8 ml, &lt;strong&gt;Chewable tablets&lt;/strong&gt; 1.6 #, &lt;strong&gt;Tablets of 25 mg&lt;/strong&gt; 0.75 # and &lt;strong&gt;Chewable tablets of 12.5 mg&lt;/strong&gt; 1.5 #.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside In mg is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with 🐈 Your cat&#039;s weight, Liquid (12.4 mg/5ml concentration) and Tablets of 25 mg are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If In mg is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are In mg and the number you are missing is 🐈 Your cat&#039;s weight and Liquid (12.4 mg/5ml concentration).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/simpson-diversity-index">Simpson&#039;s Diversity Index Calculator</a>, <a href="/biology/svi-sludge-volume-index">Sludge Volume Index (SVI) Calculator</a> and <a href="/biology/sod">Sod Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat Benadryl dosage calculator work out?', 'a' => <<<'TXT'
            🐈 Your cat's weight, Liquid (12.4 mg/5ml concentration), Tablets of 25 mg and Chewable tablets of 12.5 mg, from In mg. The relationship is 🐈 Your cat's weight = In mg.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'In mg (milligrams). Enter benadryl_mg; 🐈 Your cat\'s weight is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of 🐈 Your cat's weight, In mg, Tablets and Liquid (12.4 mg/5ml concentration) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            🐈 Your cat's weight = 10 kg, Tablets = 0.4 #, Liquid (12.4 mg/5ml concentration) = 4 ml, Chewable tablets = 0.8 #, Tablets of 25 mg = 0.25 # and Chewable tablets of 12.5 mg = 0.75 #. The figures come from In mg as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally 🐈 Your cat\'s weight is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave In mg blank and the page solves for it, reporting 🐈 Your cat\'s weight instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to 🐈 Your cat\'s weight at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/simpson-diversity-index', 'name' => 'Simpson\'s Diversity Index Calculator'],
            ['path' => '/biology/svi-sludge-volume-index', 'name' => 'Sludge Volume Index (SVI) Calculator'],
            ['path' => '/biology/sod', 'name' => 'Sod Calculator'],
        ],
        'authors' => [],
    ],
];
