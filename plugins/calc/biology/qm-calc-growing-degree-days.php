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
    'meta' => ['title' => 'Growing Degree Days Calculator — Formula & Results', 'description' => 'Enter method, daily maximum and daily minimum and Growing Degree Days Calculator returns over seven days at this weather and accumulated over 60 days.', 'h1' => 'Growing Degree Days Calculator', 'updated' => '2026-10-29'],
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
        Enter Method, Daily maximum and Daily minimum into Growing Degree Days and the answer comes back as Growing degree days for the day and Over seven days at this weather. There is no hidden constant here: change growing degree days for the day and method moves with it. The main result, Growing degree days for the day, is reported in GDD.
        TXT,
        'sections' => [
            ['title' => 'How the Growing Degree Days calculator works', 'html' => <<<'TXT'
            <p>Growing Degree Days answers one question from 5 numbers, and the answer is Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days.</p><p>Written with the labels from the form, Growing degree days for the day = if_else(Method&gt;0,max(0,(min(Daily maximum,Upper cut-off) + Daily minimum) ÷ 2 − Base temperature),max(0,(Daily maximum + Daily minimum) ÷ 2 − Base temperature)).</p><p>What comes back is Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Method</strong> — a plain number, no unit</li><li><strong>Daily maximum</strong> — in °C</li><li><strong>Daily minimum</strong> — in °C</li><li><strong>Base temperature</strong> — in °C. 10 °C for maize, 5 °C for wheat</li><li><strong>Upper cut-off</strong> — in °C. Growth stops above this in many models</li></ul><p>What you get back is Growing degree days for the day in GDD, Over seven days at this weather in GDD, Accumulated over 60 days in GDD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Method = 0, Daily maximum = 33 °C, Daily minimum = 12 °C, Base temperature = 10 °C and Upper cut-off = 30 °C gives <strong>Growing degree days for the day</strong> = 12.5 GDD, <strong>Over seven days at this weather</strong> = 87.5 GDD and <strong>Accumulated over 60 days</strong> = 750 GDD.</p><ul><li><strong>Growing degree days for the day</strong> = 12.5 GDD</li><li><strong>Over seven days at this weather</strong> = 87.5 GDD</li><li><strong>Accumulated over 60 days</strong> = 750 GDD</li></ul><p>That is <strong>Growing degree days for the day</strong> = <code>if_else(Method&gt;0,max(0,(min(Daily maximum,Upper cut-off) + Daily minimum) ÷ 2 − Base temperature),max(0,(Daily maximum + Daily minimum) ÷ 2 − Base temperature))</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Growing degree days for the day</strong> = 12.5, <strong>Over seven days at this weather</strong> = 87.5 and <strong>Accumulated over 60 days</strong> = 750. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Growing degree days for the day is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Growing degree days for the day</strong> = <code>if_else(Method&gt;0,max(0,(min(Daily maximum,Upper cut-off) + Daily minimum) ÷ 2 − Base temperature),max(0,(Daily maximum + Daily minimum) ÷ 2 − Base temperature))</code></li><li><strong>Over seven days at this weather</strong> = <code>if_else(Method&gt;0,max(0,(min(Daily maximum,Upper cut-off) + Daily minimum) ÷ 2 − Base temperature),max(0,(Daily maximum + Daily minimum) ÷ 2 − Base temperature)) × 7</code></li><li><strong>Accumulated over 60 days</strong> = <code>if_else(Method&gt;0,max(0,(min(Daily maximum,Upper cut-off) + Daily minimum) ÷ 2 − Base temperature),max(0,(Daily maximum + Daily minimum) ÷ 2 − Base temperature)) × 60</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Growing degree days for the day</strong> = <code>if_else(Method&gt;0,max(0,(min(Daily maximum,Upper cut-off) + Daily minimum) ÷ 2 − Base temperature),max(0,(Daily maximum + Daily minimum) ÷ 2 − Base temperature))</code> — the form to use when Method, Daily maximum, Upper cut-off and Daily minimum are the values you have.</li><li><strong>Over seven days at this weather</strong> = <code>if_else(Method&gt;0,max(0,(min(Daily maximum,Upper cut-off) + Daily minimum) ÷ 2 − Base temperature),max(0,(Daily maximum + Daily minimum) ÷ 2 − Base temperature)) × 7</code> — the form to use when Method, Daily maximum, Upper cut-off and Daily minimum are the values you have.</li><li><strong>Accumulated over 60 days</strong> = <code>if_else(Method&gt;0,max(0,(min(Daily maximum,Upper cut-off) + Daily minimum) ÷ 2 − Base temperature),max(0,(Daily maximum + Daily minimum) ÷ 2 − Base temperature)) × 60</code> — the form to use when Method, Daily maximum, Upper cut-off and Daily minimum are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => ''],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Method left as a guess.</strong> Anything typed into Method is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Daily maximum left as a guess.</strong> Anything typed into Daily maximum is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Daily minimum left as a guess.</strong> Anything typed into Daily minimum is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Method is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Method</strong> takes a plain number with no unit attached. It feeds Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Method is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Daily maximum</strong> is measured in °C. It feeds Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days. Have it to hand before you start: Daily maximum is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Daily minimum</strong> is measured in °C. It feeds Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days. Have it to hand before you start: Daily minimum is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Base temperature</strong> is measured in °C. 10 °C for maize, 5 °C for wheat. It feeds Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days. Have it to hand before you start: Base temperature is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Upper cut-off</strong> is measured in °C. Growth stops above this in many models. It feeds Growing degree days for the day, Over seven days at this weather and Accumulated over 60 days. Have it to hand before you start: Upper cut-off is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Growing degree days for the day</strong> is a plain number and the page's own defaults put it at 12.5. It is worked out from Method, Daily maximum, Upper cut-off and Daily minimum. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Over seven days at this weather</strong> is a plain number and the page's own defaults put it at 87.5. It is worked out from Method, Daily maximum, Upper cut-off and Daily minimum. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Accumulated over 60 days</strong> is a plain number and the page's own defaults put it at 750. It is worked out from Method, Daily maximum, Upper cut-off and Daily minimum. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Growing degree days for the day</th><th>Over seven days at this weather</th><th>Accumulated over 60 days</th></tr></thead><tbody><tr><td><strong>Daily maximum</strong> +10%</td><td>+13.2%</td><td>+13.2%</td><td>+13.2%</td></tr><tr><td><strong>Daily minimum</strong> +10%</td><td>+4.8%</td><td>+4.8%</td><td>+4.8%</td></tr><tr><td><strong>Base temperature</strong> +10%</td><td>-8%</td><td>-8%</td><td>-8%</td></tr><tr><td><strong>Upper cut-off</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Daily maximum: ten per cent there moves an answer by about 13.2 per cent, which is why that is the number to measure twice. By contrast, Upper cut-off barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Method = 0, Daily maximum = 16.5 °C, Daily minimum = 6 °C, Base temperature = 5 °C and Upper cut-off = 15 °C, the answer is <strong>Growing degree days for the day</strong> = 6.25 GDD, <strong>Over seven days at this weather</strong> = 43.75 GDD and <strong>Accumulated over 60 days</strong> = 375 GDD.</li><li>With Method = 0, Daily maximum = 33 °C, Daily minimum = 12 °C, Base temperature = 10 °C and Upper cut-off = 30 °C, the answer is <strong>Growing degree days for the day</strong> = 12.5 GDD, <strong>Over seven days at this weather</strong> = 87.5 GDD and <strong>Accumulated over 60 days</strong> = 750 GDD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Growing degree days for the day is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Method, Daily maximum and Daily minimum are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
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
            Method, Daily maximum (°C), Daily minimum (°C), Base temperature (°C), Upper cut-off (°C). Enter method, daily maximum and daily minimum; Growing degree days for the day is the box to leave alone unless it is the value you came for.
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
