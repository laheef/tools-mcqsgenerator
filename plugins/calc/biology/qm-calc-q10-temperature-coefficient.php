<?php

/**
 * Q10 Temperature Coefficient Calculator
 * /biology/q10-temperature-coefficient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Q10 Temperature Coefficient Calculator',
    'meta' => ['title' => 'Q10 Temperature Coefficient Calculator — Biology', 'description' => 'Q10 is how many times faster a biological rate runs for every 10 °C of warming. Free q10 temperature coefficient calculator: enter your values and get Q10, ra', 'h1' => 'Q10 Temperature Coefficient Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'r1',
                            'label' => 'Rate at temperature 1',
                            'type' => 'number',
                            'suffix' => 'units',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 't1',
                            'label' => 'Temperature 1',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'r2',
                            'label' => 'Rate at temperature 2',
                            'type' => 'number',
                            'suffix' => 'units',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '22',
                        ],
                        [
                            'name' => 't2',
                            'label' => 'Temperature 2',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'q10',
                            'label' => 'Q10',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rate_10',
                            'label' => 'Rate at t1 + 10 °C',
                            'type' => 'number',
                            'suffix' => 'units',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'activation',
                            'label' => 'Apparent activation energy',
                            'type' => 'number',
                            'suffix' => 'kJ/mol',
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
            'title' => 'Temperature response',
            'results' => ['q10' => 'pow(r2/r1,10/(t2-t1))', 'rate_10' => 'r1*pow(r2/r1,10/(t2-t1))', 'activation' => '8.314*(t1+273.15)*(t2+273.15)/((t2+273.15)-(t1+273.15))*log(r2/r1)/1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Q10 Temperature Coefficient takes Rate at temperature 1, Temperature 1 and Rate at temperature 2 and returns Q10 and Rate at t1 + 10 °C. The arithmetic is the whole method: Q10 is worked out from Rate at temperature 1 by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Q10 Temperature Coefficient calculator works', 'html' => <<<'TXT'
            <p>The Q10 Temperature Coefficient calculator applies one relationship to 4 numbers and reports Q10, Rate at t1 + 10 °C and Apparent activation energy.</p><p>The relationship it solves reads Q10 = (Rate at temperature 2 ÷ Rate at temperature 1)^(10 ÷ (Temperature 2 − Temperature 1)).</p><p>What comes back is Q10, Rate at t1 + 10 °C and Apparent activation energy — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Rate at temperature 1</strong> — in units</li><li><strong>Temperature 1</strong> — in °C</li><li><strong>Rate at temperature 2</strong> — in units</li><li><strong>Temperature 2</strong> — in °C</li></ul><p>The result boxes are Q10, Rate at t1 + 10 °C in units, Apparent activation energy in kJ/mol; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Rate at temperature 1 = 10 units, Temperature 1 = 20 °C, Rate at temperature 2 = 22 units and Temperature 2 = 30 °C; the answers are &lt;strong&gt;Q10&lt;/strong&gt; = 2.2, &lt;strong&gt;Rate at t1 + 10 °C&lt;/strong&gt; = 22 units and &lt;strong&gt;Apparent activation energy&lt;/strong&gt; = 58.26 kJ/mol.</p><ul><li><strong>Q10</strong> = 2.2</li><li><strong>Rate at t1 + 10 °C</strong> = 22 units</li><li><strong>Apparent activation energy</strong> = 58.26 kJ/mol</li></ul><p>That is <strong>Q10</strong> = <code>(Rate at temperature 2 ÷ Rate at temperature 1)^(10 ÷ (Temperature 2 − Temperature 1))</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Q10&lt;/strong&gt; = 2.2, &lt;strong&gt;Rate at t1 + 10 °C&lt;/strong&gt; = 22 and &lt;strong&gt;Apparent activation energy&lt;/strong&gt; = 58.26 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Q10 takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Q10</strong> = <code>(Rate at temperature 2 ÷ Rate at temperature 1)^(10 ÷ (Temperature 2 − Temperature 1))</code></li><li><strong>Rate at t1 + 10 °C</strong> = <code>Rate at temperature 1 × (Rate at temperature 2 ÷ Rate at temperature 1)^(10 ÷ (Temperature 2 − Temperature 1))</code></li><li><strong>Apparent activation energy</strong> = <code>8.314 × (Temperature 1 + 273.15) × (Temperature 2 + 273.15) ÷ ((Temperature 2 + 273.15) − (Temperature 1 + 273.15)) × ln(Rate at temperature 2 ÷ Rate at temperature 1) ÷ 1000</code></li></ul><p>Any one of Q10, Rate at t1 + 10 °C and Apparent activation energy can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Rate at temperature 1, from 10 to 20 — and the answers go from &lt;strong&gt;Q10&lt;/strong&gt; 2.2, &lt;strong&gt;Rate at t1 + 10 °C&lt;/strong&gt; 22 units and &lt;strong&gt;Apparent activation energy&lt;/strong&gt; 58.26 kJ/mol to &lt;strong&gt;Q10&lt;/strong&gt; 1.1, &lt;strong&gt;Rate at t1 + 10 °C&lt;/strong&gt; 22 units and &lt;strong&gt;Apparent activation energy&lt;/strong&gt; 7.04 kJ/mol.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Q10, Rate at t1 + 10 °C and Apparent activation energy are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Rate at temperature 1 to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Rate at temperature 1, Temperature 1 and Rate at temperature 2 is what you already know and Q10 and Rate at t1 + 10 °C is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/qpcr-efficiency">qPCR efficiency Calculator</a>, <a href="/biology/quadrat-sampling-density">Quadrat Sampling Density Calculator</a> and <a href="/biology/rabbit-cage-size">Rabbit cage size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Q10 Temperature Coefficient calculator work out?', 'a' => <<<'TXT'
            Q10, Rate at t1 + 10 °C and Apparent activation energy, from Rate at temperature 2, Rate at temperature 1, Temperature 2 and Temperature 1. The relationship is Q10 = (Rate at temperature 2 ÷ Rate at temperature 1)^(10 ÷ (Temperature 2 − Temperature 1)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Rate at temperature 1 (units), Temperature 1 (°C), Rate at temperature 2 (units), Temperature 2 (°C). Enter r1, t1 and r2; Q10 is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Q10, Rate at t1 + 10 °C and Apparent activation energy blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Q10 = 2.2, Rate at t1 + 10 °C = 22 units and Apparent activation energy = 58.26 kJ/mol. Those are the defaults written into the form — move Rate at temperature 1 and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Q10 is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Rate at temperature 1 blank and the page solves for it, reporting Q10 instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Q10 keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/qpcr-efficiency', 'name' => 'qPCR efficiency Calculator'],
            ['path' => '/biology/quadrat-sampling-density', 'name' => 'Quadrat Sampling Density Calculator'],
            ['path' => '/biology/rabbit-cage-size', 'name' => 'Rabbit cage size'],
        ],
        'authors' => [],
    ],
];
