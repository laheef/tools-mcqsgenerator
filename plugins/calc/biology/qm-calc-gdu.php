<?php

/**
 * GDU (growing degree units)
 * /biology/gdu
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GDU (growing degree units)',
    'meta' => ['title' => 'GDU (growing degree units) — Formula & Results', 'description' => 'GDU (growing degree units) takes Maximum growing temperature for crop, Base temperature and Daily maximum temperature and returns Growing degree units (GDU)…', 'h1' => 'GDU (growing degree units) Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'base_temp' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '10', 'c' => null],
                ],
            ],
            'base_temp_f' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '50', 'c' => null],
                ],
            ],
            'gdu' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gdu_f' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'max_crop_temp' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '30', 'c' => null],
                ],
            ],
            'max_crop_temp_f' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '86', 'c' => null],
                ],
            ],
            'max_temp' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'max_temp_f' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'min_temp' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'min_temp_f' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'temp_unit' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'BRcKqLQ6G32GI0q9eXgXZ', 'c' => null],
                    ['v' => 'htrN5K5xfwHTqz_YdDI3N', 'c' => 'userUsesImperialUnits()'],
                ],
                'ds' => '1ablvJg37Q8wFXmG0w4Gy',
            ],
        ],
        'groups' => [
            [
                'uid' => '2aCsGlh8a2vNCo_FJ-JXY',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'temp_unit',
                                    'vt' => 'valueSelect',
                                    'l' => 'Which temperature unit will you be using?',
                                    'ds' => '1ablvJg37Q8wFXmG0w4Gy',
                                    'opts' => [
                                        ['BRcKqLQ6G32GI0q9eXgXZ', 'Celsius', '0'],
                                        ['htrN5K5xfwHTqz_YdDI3N', 'Fahrenheit', '1'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'max_crop_temp', 'vt' => 'numerical', 'l' => 'Maximum growing temperature for crop'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'base_temp',
                                    'vt' => 'numerical',
                                    'l' => 'Base temperature',
                                    'h' => 'Minimum growing temperature for crop.',
                                    'us' => '40',
                                    'du' => 'C',
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
                                    'n' => 'max_temp',
                                    'vt' => 'numerical',
                                    'l' => 'Daily maximum temperature',
                                    'us' => '40',
                                    'du' => 'C',
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
                                    'n' => 'min_temp',
                                    'vt' => 'numerical',
                                    'l' => 'Daily minimum temperature',
                                    'us' => '40',
                                    'du' => 'C',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'gdu', 'vt' => 'numerical', 'l' => 'Growing degree units (GDU)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'max_crop_temp_f',
                                    'vt' => 'numerical',
                                    'l' => 'Maximum growing temperature for crop',
                                    'us' => '40',
                                    'du' => 'F',
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
                                    'n' => 'base_temp_f',
                                    'vt' => 'numerical',
                                    'l' => 'Base temperature',
                                    'h' => 'Minimum growing temperature for crop.',
                                    'us' => '40',
                                    'du' => 'F',
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
                                    'n' => 'max_temp_f',
                                    'vt' => 'numerical',
                                    'l' => 'Daily maximum temperature',
                                    'us' => '40',
                                    'du' => 'F',
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
                                    'n' => 'min_temp_f',
                                    'vt' => 'numerical',
                                    'l' => 'Daily minimum temperature',
                                    'us' => '40',
                                    'du' => 'F',
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
                                    'n' => 'gdu_f',
                                    'vt' => 'numerical',
                                    'l' => 'Growing degree units (GDU)',
                                    'us' => '40',
                                    'du' => 'F',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'gdu = (min(max_temp, max_crop_temp) + max(min_temp, base_temp)) / 2 - base_temp',
                'var' => [
                    [
                        'l' => 'gdu',
                        'f' => '-base_temp + (1/2)*max(base_temp, min_temp) + (1/2)*min(max_crop_temp, max_temp)',
                        'r' => ['base_temp', 'max_crop_temp', 'max_temp', 'min_temp'],
                    ],
                ],
            ],
            [
                'formula' => 'gdu_f = (min(max_temp_f, max_crop_temp_f) + max(min_temp_f, base_temp_f)) / 2 - base_temp_f ',
                'var' => [
                    [
                        'l' => 'gdu_f',
                        'f' => '-base_temp_f + (1/2)*max(base_temp_f, min_temp_f) + (1/2)*min(max_crop_temp_f, max_temp_f)',
                        'r' => ['base_temp_f', 'max_crop_temp_f', 'max_temp_f', 'min_temp_f'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '1ablvJg37Q8wFXmG0w4Gy' => [
                'name' => 'temp_unit',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'BRcKqLQ6G32GI0q9eXgXZ', 'label' => 'Celsius', 'value' => '0'],
                    ['uid' => 'htrN5K5xfwHTqz_YdDI3N', 'label' => 'Fahrenheit', 'value' => '1'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        GDU (growing degree units) takes Maximum growing temperature for crop, Base temperature and Daily maximum temperature and returns Growing degree units (GDU) and Growing degree units (GDU). It is a single relationship that reads Growing degree units (GDU) out of Maximum growing temperature for crop, not a table of canned results keyed by them. Units for Growing degree units (GDU) default to Celsius and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the GDU (growing degree units) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind GDU (growing degree units): it takes 4 numbers and reports Growing degree units (GDU) and Growing degree units (GDU).</p><p>The relationship it solves reads Growing degree units (GDU) = − Base temperature + (1 ÷ 2) × max(Base temperature, Daily minimum temperature) + (1 ÷ 2) × min(Maximum growing temperature for crop, Daily maximum temperature).</p><p>The answers are Growing degree units (GDU) and Growing degree units (GDU); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Maximum growing temperature for crop</strong> — in Celsius</li><li><strong>Base temperature</strong> — in Celsius. Minimum growing temperature for crop.</li><li><strong>Daily maximum temperature</strong> — in Celsius</li><li><strong>Daily minimum temperature</strong> — in Celsius</li></ul><p>What you get back is Growing degree units (GDU) in Celsius, Growing degree units (GDU) in Fahrenheit, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Which temperature unit will you be using? = 0, Maximum growing temperature for crop = 30 C, Base temperature = 10 C, Daily maximum temperature = 5 C, Daily minimum temperature = 6 C, Maximum growing temperature for crop = 86 F, Base temperature = 50 F, Daily maximum temperature = 9 F and Daily minimum temperature = 10 F; the answers are &lt;strong&gt;Growing degree units (GDU)&lt;/strong&gt; = -2.5 C and &lt;strong&gt;Growing degree units (GDU)&lt;/strong&gt; = -20.5 F.</p><ul><li><strong>Growing degree units (GDU)</strong> = -2.5 C</li><li><strong>Growing degree units (GDU)</strong> = -20.5 F</li></ul><p>That is <strong>Growing degree units (GDU)</strong> = <code>− Base temperature + (1 ÷ 2) × max(Base temperature, Daily minimum temperature) + (1 ÷ 2) × min(Maximum growing temperature for crop, Daily maximum temperature)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Growing degree units (GDU)&lt;/strong&gt; = -2.5 and &lt;strong&gt;Growing degree units (GDU)&lt;/strong&gt; = -20.5 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Growing degree units (GDU) offers 28 units and opens on Celsius, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Growing degree units (GDU)</strong> = <code>− Base temperature + (1 ÷ 2) × max(Base temperature, Daily minimum temperature) + (1 ÷ 2) × min(Maximum growing temperature for crop, Daily maximum temperature)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Growing degree units (GDU)</strong> = <code>− Base temperature + (1 ÷ 2) × max(Base temperature, Daily minimum temperature) + (1 ÷ 2) × min(Maximum growing temperature for crop, Daily maximum temperature)</code> — the form to use when Base temperature, Maximum growing temperature for crop, Daily maximum temperature and Daily minimum temperature are the values you have.</li><li><strong>Growing degree units (GDU)</strong> = <code>− Base temperature + (1 ÷ 2) × max(Base temperature, Daily minimum temperature) + (1 ÷ 2) × min(Maximum growing temperature for crop, Daily maximum temperature)</code> — the form to use when Base temperature, Maximum growing temperature for crop, Daily maximum temperature and Daily minimum temperature are the values you have.</li></ul><p>Any one of Growing degree units (GDU) and Growing degree units (GDU) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => ''],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Maximum growing temperature for crop, Base temperature and Daily maximum temperature is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Growing degree units (GDU) and Growing degree units (GDU) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Maximum growing temperature for crop left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Maximum growing temperature for crop is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Base temperature left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Base temperature is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Maximum growing temperature for crop to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the GDU (growing degree units) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Maximum growing temperature for crop</strong> is a celsius quantity: the page opens it in C and converts anything else you pick before the formula runs. Change it and Growing degree units (GDU) changes with it. Fill it from a measurement rather than a memory — Maximum growing temperature for crop is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Base temperature</strong> is a celsius quantity: the page opens it in C and converts anything else you pick before the formula runs. Minimum growing temperature for crop. Change it and Growing degree units (GDU) changes with it. Fill it from a measurement rather than a memory — Base temperature is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Daily maximum temperature</strong> is a celsius quantity: the page opens it in C and converts anything else you pick before the formula runs. Change it and Growing degree units (GDU) changes with it. Fill it from a measurement rather than a memory — Daily maximum temperature is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Daily minimum temperature</strong> is a celsius quantity: the page opens it in C and converts anything else you pick before the formula runs. Change it and Growing degree units (GDU) changes with it. Fill it from a measurement rather than a memory — Daily minimum temperature is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Growing degree units (GDU)</strong> is a celsius figure and the page's own defaults put it at -2.5 C. It is computed from Base temperature, Maximum growing temperature for crop, Daily maximum temperature and Daily minimum temperature, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Growing degree units (GDU)</strong> is a fahrenheit figure and the page's own defaults put it at -20.5 F. It is computed from Base temperature, Maximum growing temperature for crop, Daily maximum temperature and Daily minimum temperature, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Growing degree units (GDU)</th><th>Growing degree units (GDU)</th></tr></thead><tbody><tr><td><strong>Maximum growing temperature for crop</strong> +10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Base temperature</strong> +10%</td><td>-20%</td><td>+0%</td></tr><tr><td><strong>Daily maximum temperature</strong> +10%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Daily minimum temperature</strong> +10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Maximum growing temperature for crop</strong> +10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Base temperature</strong> +10%</td><td>+0%</td><td>-12.2%</td></tr><tr><td><strong>Daily maximum temperature</strong> +10%</td><td>+0%</td><td>+2.2%</td></tr><tr><td><strong>Daily minimum temperature</strong> +10%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Base temperature sits at the top — a ten per cent error in that box shows up as roughly 20 per cent in the answer. By contrast, Maximum growing temperature for crop, Daily minimum temperature and Maximum growing temperature for crop barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Which temperature unit will you be using? = 0, Maximum growing temperature for crop = 15 C, Base temperature = 5 C, Daily maximum temperature = 2.5 C, Daily minimum temperature = 3 C, Maximum growing temperature for crop = 43 F, Base temperature = 25 F, Daily maximum temperature = 4.5 F and Daily minimum temperature = 5 F and the page reports <strong>Growing degree units (GDU)</strong> = -1.25 C and <strong>Growing degree units (GDU)</strong> = -10.25 F.</li><li>Feed in Which temperature unit will you be using? = 0, Maximum growing temperature for crop = 30 C, Base temperature = 10 C, Daily maximum temperature = 5 C, Daily minimum temperature = 6 C, Maximum growing temperature for crop = 86 F, Base temperature = 50 F, Daily maximum temperature = 9 F and Daily minimum temperature = 10 F and the page reports <strong>Growing degree units (GDU)</strong> = -2.5 C and <strong>Growing degree units (GDU)</strong> = -20.5 F.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on GDU (growing degree units) actually offers.</p><ul><li><strong>Celsius</strong> — 28 units. It opens in <em>C</em>, and the chip also carries °F, K, °R, °De, °N and °Ré. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Growing degree units (GDU) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are Celsius and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Maximum growing temperature for crop, Base temperature and Daily maximum temperature are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Maximum growing temperature for crop, Base temperature and Daily maximum temperature is what you already know and Growing degree units (GDU) and Growing degree units (GDU) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/tajimas-d">Tajima&#039;s D Calculator</a>, <a href="/biology/tff-membrane-area">TFF Membrane Area and Flux Calculator</a> and <a href="/biology/thousand-seed-weight">Thousand Seed Weight Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GDU (growing degree units) calculator work out?', 'a' => <<<'TXT'
            Growing degree units (GDU) and Growing degree units (GDU), from Base temperature, Maximum growing temperature for crop, Daily maximum temperature and Daily minimum temperature. The relationship is Growing degree units (GDU) = − Base temperature + (1 ÷ 2) × max(Base temperature, Daily minimum temperature) + (1 ÷ 2) × min(Maximum growing temperature for crop, Daily maximum temperature).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Maximum growing temperature for crop (Celsius), Base temperature (Celsius), Daily maximum temperature (Celsius), Daily minimum temperature (Celsius). Fill max_crop_temp, base_temp and max_temp and leave Growing degree units (GDU) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Growing degree units (GDU) and Growing degree units (GDU) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Growing degree units (GDU) = -2.5 C and Growing degree units (GDU) = -20.5 F. The figures come from Maximum growing temperature for crop as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Growing degree units (GDU) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Maximum growing temperature for crop blank and the page solves for it, reporting Growing degree units (GDU) instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Growing degree units (GDU) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/tajimas-d', 'name' => 'Tajima\'s D Calculator'],
            ['path' => '/biology/tff-membrane-area', 'name' => 'TFF Membrane Area and Flux Calculator'],
            ['path' => '/biology/thousand-seed-weight', 'name' => 'Thousand Seed Weight Calculator'],
        ],
        'authors' => [],
    ],
];
