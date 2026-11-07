<?php

/**
 * Pet sitter rates
 * /biology/pet-sitter-rates
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pet sitter rates',
    'meta' => ['title' => 'Pet sitter rates — Formula, Steps & Examples', 'description' => <<<'TXT'
    Pet sitter rates takes The number of hours pet sitting, Days of care and Pet sitting rate and returns Pet sitting cost. Pet sitting cost is opened in USD; the…
    TXT, 'h1' => 'Pet sitter rates Calculator', 'updated' => '2024-07-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours_sitting',
                            'label' => 'The number of hours pet sitting',
                            'type' => 'number',
                            'help' => 'Hours pet sitting per day.',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_of_care',
                            'label' => 'Days of care',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pet_sitting_cost',
                            'label' => 'Pet sitting cost',
                            'type' => 'number',
                            'help' => 'Total cost for the period.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pet_sitting_rate',
                            'label' => 'Pet sitting rate',
                            'type' => 'number',
                            'suffix' => '/h',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'pet_sitting_cost = hours_sitting * days_of_care * pet_sitting_rate',
            'results' => ['pet_sitting_cost' => 'days_of_care*hours_sitting*pet_sitting_rate', 'pet_sitting_rate' => 'pet_sitting_cost/(days_of_care*hours_sitting)', 'hours_sitting' => 'pet_sitting_cost/(days_of_care*pet_sitting_rate)', 'days_of_care' => 'pet_sitting_cost/(hours_sitting*pet_sitting_rate)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Pet sitter rates takes The number of hours pet sitting, Days of care and Pet sitting rate and returns Pet sitting cost. Nothing is looked up on this page: Pet sitting cost is computed from The number of hours pet sitting and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Pet sitting cost is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Pet sitter rates calculator works', 'html' => <<<'TXT'
            <p>Pet sitter rates answers one question from 3 numbers, and the answer is Pet sitting cost.</p><p>In the form&#039;s own words, Pet sitting cost = Days of care × The number of hours pet sitting × Pet sitting rate.</p><p>What comes back is Pet sitting cost — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>The number of hours pet sitting</strong> — in hours. Hours pet sitting per day.</li><li><strong>Days of care</strong> — a plain number, no unit</li><li><strong>Pet sitting rate</strong> — in /h</li></ul><p>What you get back is Pet sitting cost in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — The number of hours pet sitting = 10 hrs, Days of care = 1 and Pet sitting rate = 1000 /h — through the same formula and the panel reports &lt;strong&gt;Pet sitting cost&lt;/strong&gt; = 10000 USD.</p><ul><li><strong>Pet sitting cost</strong> = 10000 USD</li></ul><p>That is <strong>Pet sitting cost</strong> = <code>Days of care × The number of hours pet sitting × Pet sitting rate</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Pet sitting cost&lt;/strong&gt; = 10000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: The number of hours pet sitting offers 18 units and opens on hours, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Pet sitting cost</strong> = <code>Days of care × The number of hours pet sitting × Pet sitting rate</code></li><li><strong>Pet sitting rate</strong> = <code>Pet sitting cost ÷ (Days of care × The number of hours pet sitting)</code></li><li><strong>The number of hours pet sitting</strong> = <code>Pet sitting cost ÷ (Days of care × Pet sitting rate)</code></li><li><strong>Days of care</strong> = <code>Pet sitting cost ÷ (The number of hours pet sitting × Pet sitting rate)</code></li></ul><p>Any one of Pet sitting cost, Pet sitting rate and The number of hours pet sitting can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — The number of hours pet sitting, from 10 to 20 — and the answers go from &lt;strong&gt;Pet sitting cost&lt;/strong&gt; 10000 USD to &lt;strong&gt;Pet sitting cost&lt;/strong&gt; 20000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside The number of hours pet sitting is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Pet sitting cost is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert The number of hours pet sitting to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are The number of hours pet sitting, Days of care and Pet sitting rate and the number you are missing is Pet sitting cost.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-harness-size">Dog harness size</a>, <a href="/biology/dog-heat-cycle">Dog heat cycle</a> and <a href="/biology/dog-life-expectancy">Dog life expectancy Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pet sitter rates calculator work out?', 'a' => <<<'TXT'
            Pet sitting cost, from Days of care, The number of hours pet sitting and Pet sitting rate. The relationship is Pet sitting cost = Days of care × The number of hours pet sitting × Pet sitting rate.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            The number of hours pet sitting (hours), Days of care, Pet sitting rate (/h). Enter hours_sitting, days_of_care and pet_sitting_rate; Pet sitting cost is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Pet sitting cost, Pet sitting rate, The number of hours pet sitting and Days of care blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Pet sitting cost = 10000 USD. Those are the defaults written into the form — move The number of hours pet sitting and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Pet sitting cost is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave The number of hours pet sitting blank and the page solves for it, reporting Pet sitting cost instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Pet sitting cost keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-harness-size', 'name' => 'Dog harness size'],
            ['path' => '/biology/dog-heat-cycle', 'name' => 'Dog heat cycle'],
            ['path' => '/biology/dog-life-expectancy', 'name' => 'Dog life expectancy Calculator'],
        ],
        'authors' => [],
    ],
];
