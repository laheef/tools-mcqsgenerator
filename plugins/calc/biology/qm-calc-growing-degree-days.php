<?php

/**
 * Growing Degree Days Calculator
 * /biology/growing-degree-days
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Growing Degree Days Calculator',
    'meta' => ['title' => 'Growing Degree Days Calculator — Formula & Results', 'description' => 'Enter Method, Daily maximum and Daily minimum into Growing Degree Days and the answer comes back as Growing degree days for the day and Over seven days at…', 'h1' => 'Growing Degree Days Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'method',
                            'label' => 'Method',
                            'type' => 'select',
                            'options' => ['Mean temperature, no cap' => '0', 'Cap the maximum at the upper cut-off' => '1'],
                            'default' => 'Mean temperature, no cap',
                        ],
                        [
                            'name' => 'tmax',
                            'label' => 'Daily maximum',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '33',
                        ],
                        [
                            'name' => 'tmin',
                            'label' => 'Daily minimum',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'base',
                            'label' => 'Base temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => '10 °C for maize, 5 °C for wheat',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'upper',
                            'label' => 'Upper cut-off',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => 'Growth stops above this in many models',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'gdd',
                            'label' => 'Growing degree days for the day',
                            'type' => 'number',
                            'suffix' => 'GDD',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gdd_week',
                            'label' => 'Over seven days at this weather',
                            'type' => 'number',
                            'suffix' => 'GDD',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'since_sowing',
                            'label' => 'Accumulated over 60 days',
                            'type' => 'number',
                            'suffix' => 'GDD',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Degree days',
            'results' => ['gdd' => 'if_else(method>0,max(0,(min(tmax,upper)+tmin)/2-base),max(0,(tmax+tmin)/2-base))', 'gdd_week' => 'if_else(method>0,max(0,(min(tmax,upper)+tmin)/2-base),max(0,(tmax+tmin)/2-base))*7', 'since_sowing' => 'if_else(method>0,max(0,(min(tmax,upper)+tmin)/2-base),max(0,(tmax+tmin)/2-base))*60'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Method, Daily maximum and Daily minimum into Growing Degree Days and the answer comes back as Growing degree days for the day and Over seven days at this weather. There is no hidden constant here: change Growing degree days for the day and Method moves with it. The main result, Growing degree days for the day, is reported in GDD.
        TXT,
        'sections' => [
            ['title' => 'How the Growing Degree Days calculator works', 'html' => <<<'TXT'
            <p>Growing Degree Days answers one question from 5 numbers, and the answer is Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days.</p><p>Written with the labels from the form, Growing degree days for the day = if_else(Method&gt;0,max(0,(min(Daily maximum,Upper cut-off) + Daily minimum) ÷ 2 − Base temperature),max(0,(Daily maximum + Daily minimum) ÷ 2 − Base temperature)).</p><p>What comes back is Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Method</strong> — a plain number, no unit</li><li><strong>Daily maximum</strong> — in °C</li><li><strong>Daily minimum</strong> — in °C</li><li><strong>Base temperature</strong> — in °C. 10 °C for maize, 5 °C for wheat</li><li><strong>Upper cut-off</strong> — in °C. Growth stops above this in many models</li></ul><p>What you get back is Growing degree days for the day in GDD, Over seven days at this weather in GDD, Accumulated over 60 days in GDD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Method = 0, Daily maximum = 33 °C, Daily minimum = 12 °C, Base temperature = 10 °C and Upper cut-off = 30 °C gives &lt;strong&gt;Growing degree days for the day&lt;/strong&gt; = 12.5 GDD, &lt;strong&gt;Over seven days at this weather&lt;/strong&gt; = 87.5 GDD and &lt;strong&gt;Accumulated over 60 days&lt;/strong&gt; = 750 GDD.</p><ul><li><strong>Growing degree days for the day</strong> = 12.5 GDD</li><li><strong>Over seven days at this weather</strong> = 87.5 GDD</li><li><strong>Accumulated over 60 days</strong> = 750 GDD</li></ul><p>That is <strong>Growing degree days for the day</strong> = <code>if_else(Method&gt;0,max(0,(min(Daily maximum,Upper cut-off) + Daily minimum) ÷ 2 − Base temperature),max(0,(Daily maximum + Daily minimum) ÷ 2 − Base temperature))</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Growing degree days for the day&lt;/strong&gt; = 12.5, &lt;strong&gt;Over seven days at this weather&lt;/strong&gt; = 87.5 and &lt;strong&gt;Accumulated over 60 days&lt;/strong&gt; = 750. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Growing degree days for the day is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Growing degree days for the day</strong> = <code>if_else(Method&gt;0,max(0,(min(Daily maximum,Upper cut-off) + Daily minimum) ÷ 2 − Base temperature),max(0,(Daily maximum + Daily minimum) ÷ 2 − Base temperature))</code></li><li><strong>Over seven days at this weather</strong> = <code>if_else(Method&gt;0,max(0,(min(Daily maximum,Upper cut-off) + Daily minimum) ÷ 2 − Base temperature),max(0,(Daily maximum + Daily minimum) ÷ 2 − Base temperature)) × 7</code></li><li><strong>Accumulated over 60 days</strong> = <code>if_else(Method&gt;0,max(0,(min(Daily maximum,Upper cut-off) + Daily minimum) ÷ 2 − Base temperature),max(0,(Daily maximum + Daily minimum) ÷ 2 − Base temperature)) × 60</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Method is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Method, Daily maximum and Daily minimum and the number you are missing is Growing degree days for the day and Over seven days at this weather.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/wastewater">Wastewater Calculator</a>, <a href="/biology/water-potential">Water potential Calculator</a> and <a href="/biology/water-soluble-fertilizer">Water soluble fertilizer Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Growing Degree Days calculator work out?', 'a' => <<<'TXT'
            Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days, from Method, Daily maximum, Upper cut-off and Daily minimum. The relationship is Growing degree days for the day = if_else(Method>0,max(0,(min(Daily maximum,Upper cut-off) + Daily minimum) ÷ 2 − Base temperature),max(0,(Daily maximum + Daily minimum) ÷ 2 − Base temperature)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Method, Daily maximum (°C), Daily minimum (°C), Base temperature (°C), Upper cut-off (°C). Enter method, tmax and tmin; Growing degree days for the day is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Growing degree days for the day = 12.5 GDD, Over seven days at this weather = 87.5 GDD and Accumulated over 60 days = 750 GDD. The figures come from Method as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Growing degree days for the day is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Method left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Growing degree days for the day keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/wastewater', 'name' => 'Wastewater Calculator'],
            ['path' => '/biology/water-potential', 'name' => 'Water potential Calculator'],
            ['path' => '/biology/water-soluble-fertilizer', 'name' => 'Water soluble fertilizer Calculator'],
        ],
        'authors' => [],
    ],
];
