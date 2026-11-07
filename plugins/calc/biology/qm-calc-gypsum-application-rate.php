<?php

/**
 * Gypsum Application Rate Calculator
 * /biology/gypsum-application-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gypsum Application Rate Calculator',
    'meta' => ['title' => 'Gypsum Application Rate Calculator — Biology', 'description' => 'Gypsum Application Rate takes Area, Soil texture and Exchangeable sodium percentage and returns Gypsum rate and Gypsum needed. There is no hidden constant…', 'h1' => 'Gypsum Application Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'area_ha',
                            'label' => 'Area',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'texture',
                            'label' => 'Soil texture',
                            'type' => 'select',
                            'options' => ['Sand' => '1.5', 'Loam' => '3', 'Clay' => '5'],
                            'help' => 'Sets the tonnes per hectare for a one-unit pH-neutral treatment',
                            'default' => 'Loam',
                        ],
                        [
                            'name' => 'esp',
                            'label' => 'Exchangeable sodium percentage',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Above 15% the soil is sodic',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'esp_target',
                            'label' => 'Target ESP',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Below 7% is considered non-sodic',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'rate_tha',
                            'label' => 'Gypsum rate',
                            'type' => 'number',
                            'suffix' => 't/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_t',
                            'label' => 'Gypsum needed',
                            'type' => 'number',
                            'suffix' => 't',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bags_25kg',
                            'label' => '25 kg bags',
                            'type' => 'number',
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
            'title' => 'Rate',
            'results' => ['rate_tha' => 'texture*(esp-esp_target)/10', 'total_t' => 'area_ha*texture*(esp-esp_target)/10', 'bags_25kg' => 'area_ha*texture*(esp-esp_target)/10*40'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Gypsum Application Rate takes Area, Soil texture and Exchangeable sodium percentage and returns Gypsum rate and Gypsum needed. There is no hidden constant here: change Gypsum rate and Area moves with it. The main result, Gypsum rate, is reported in t/ha.
        TXT,
        'sections' => [
            ['title' => 'How the Gypsum Application Rate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Gypsum Application Rate: it takes 4 numbers and reports Gypsum rate, Gypsum needed and 25 kg bags.</p><p>The relationship it solves reads Gypsum rate = Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10.</p><p>The result panel carries Gypsum rate, Gypsum needed and 25 kg bags, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Area</strong> — in ha</li><li><strong>Soil texture</strong> — a plain number, no unit. Sets the tonnes per hectare for a one-unit pH-neutral treatment</li><li><strong>Exchangeable sodium percentage</strong> — in %. Above 15% the soil is sodic</li><li><strong>Target ESP</strong> — in %. Below 7% is considered non-sodic</li></ul><p>The answers come back as Gypsum rate in t/ha, Gypsum needed in t, 25 kg bags. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Area = 1 ha, Soil texture = 3, Exchangeable sodium percentage = 15 % and Target ESP = 5 %; the answers are &lt;strong&gt;Gypsum rate&lt;/strong&gt; = 3 t/ha, &lt;strong&gt;Gypsum needed&lt;/strong&gt; = 3 t and &lt;strong&gt;25 kg bags&lt;/strong&gt; = 120.</p><ul><li><strong>Gypsum rate</strong> = 3 t/ha</li><li><strong>Gypsum needed</strong> = 3 t</li><li><strong>25 kg bags</strong> = 120</li></ul><p>That is <strong>Gypsum rate</strong> = <code>Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Gypsum rate&lt;/strong&gt; = 3, &lt;strong&gt;Gypsum needed&lt;/strong&gt; = 3 and &lt;strong&gt;25 kg bags&lt;/strong&gt; = 120 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Gypsum rate takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Gypsum rate</strong> = <code>Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10</code></li><li><strong>Gypsum needed</strong> = <code>Area × Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10</code></li><li><strong>25 kg bags</strong> = <code>Area × Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10 × 40</code></li></ul><p>Any one of Gypsum rate, Gypsum needed and 25 kg bags can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Area from 1 to 2, leaving every other box alone. The panel moves from &lt;strong&gt;Gypsum rate&lt;/strong&gt; 3 t/ha, &lt;strong&gt;Gypsum needed&lt;/strong&gt; 3 t and &lt;strong&gt;25 kg bags&lt;/strong&gt; 120 to &lt;strong&gt;Gypsum rate&lt;/strong&gt; 3 t/ha, &lt;strong&gt;Gypsum needed&lt;/strong&gt; 6 t and &lt;strong&gt;25 kg bags&lt;/strong&gt; 240.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gypsum rate, Gypsum needed and 25 kg bags are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Area is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Area, Soil texture and Exchangeable sodium percentage is what you already know and Gypsum rate and Gypsum needed is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cat-bmi">Cat BMI Calculator</a>, <a href="/biology/cat-calorie">Cat calorie Calculator</a> and <a href="/biology/cat-chocolate-toxicity">Cat chocolate toxicity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gypsum Application Rate calculator work out?', 'a' => <<<'TXT'
            Gypsum rate, Gypsum needed and 25 kg bags, from Soil texture, Exchangeable sodium percentage and Target ESP. The relationship is Gypsum rate = Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Area (ha), Soil texture, Exchangeable sodium percentage (%), Target ESP (%). Enter area_ha, texture and esp; Gypsum rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Gypsum rate, Gypsum needed and 25 kg bags blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Gypsum rate = 3 t/ha, Gypsum needed = 3 t and 25 kg bags = 120. The figures come from Area as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Gypsum rate is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Area blank and the page solves for it, reporting Gypsum rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Gypsum rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cat-bmi', 'name' => 'Cat BMI Calculator'],
            ['path' => '/biology/cat-calorie', 'name' => 'Cat calorie Calculator'],
            ['path' => '/biology/cat-chocolate-toxicity', 'name' => 'Cat chocolate toxicity Calculator'],
        ],
        'authors' => [],
    ],
];
