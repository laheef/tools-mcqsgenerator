<?php

/**
 * Cat BMI
 * /biology/cat-bmi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cat BMI',
    'meta' => ['title' => 'Cat BMI Calculator: Formula, Steps & Examples', 'description' => 'Cat BMI takes Length of the lower back leg and FBMI and returns Rib cage circumference. It is a single relationship that reads Rib cage circumference out of…', 'h1' => 'Cat BMI Calculator', 'updated' => '2026-09-05'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ribcage',
                            'label' => 'Rib cage circumference',
                            'type' => 'number',
                            'help' => 'Ideally, measured around the 9th rib.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lim',
                            'label' => 'Length of the lower back leg',
                            'type' => 'number',
                            'help' => 'Length of your cat\'s lower back leg from the knee to the ankle.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fbmi',
                            'label' => 'FBMI',
                            'type' => 'number',
                            'help' => 'Feline Body Mass Index.',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'fbmi = (((ribcage/0.7062) - lim )/0.9156) - lim',
            'results' => ['ribcage' => '(8082459/12500000)*fbmi + (16909959/12500000)*lim', 'fbmi' => '-4789/2289*lim + (12500000/8082459)*ribcage', 'lim' => '-2289/4789*fbmi + (12500000/16909959)*ribcage'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cat BMI takes Length of the lower back leg and FBMI and returns Rib cage circumference. It is a single relationship that reads Rib cage circumference out of Length of the lower back leg, not a table of canned results keyed by them. Units for Rib cage circumference default to centimeters and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Cat BMI calculator works', 'html' => <<<'TXT'
            <p>Cat BMI answers one question from 2 numbers, and the answer is Rib cage circumference.</p><p>Written with the labels from the form, Rib cage circumference = (8082459 ÷ 12500000) × FBMI + (16909959 ÷ 12500000) × Length of the lower back leg.</p><p>What comes back is Rib cage circumference — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Length of the lower back leg</strong> — in centimeters. Length of your cat&#039;s lower back leg from the knee to the ankle.</li><li><strong>FBMI</strong> — a plain number, no unit. Feline Body Mass Index.</li></ul><p>The result box is Rib cage circumference in centimeters. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Length of the lower back leg = 10 cm and FBMI = 100 — through the same formula and the panel reports &lt;strong&gt;Rib cage circumference&lt;/strong&gt; = 78.19 cm.</p><ul><li><strong>Rib cage circumference</strong> = 78.19 cm</li></ul><p>That is <strong>Rib cage circumference</strong> = <code>(8082459 ÷ 12500000) × FBMI + (16909959 ÷ 12500000) × Length of the lower back leg</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Rib cage circumference&lt;/strong&gt; = 78.19 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Rib cage circumference offers 31 units and opens on centimeters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Rib cage circumference</strong> = <code>(8082459 ÷ 12500000) × FBMI + (16909959 ÷ 12500000) × Length of the lower back leg</code></li><li><strong>FBMI</strong> = <code>− 4789 ÷ 2289 × Length of the lower back leg + (12500000 ÷ 8082459) × Rib cage circumference</code></li><li><strong>Length of the lower back leg</strong> = <code>− 2289 ÷ 4789 × FBMI + (12500000 ÷ 16909959) × Rib cage circumference</code></li></ul><p>Any one of Rib cage circumference, FBMI and Length of the lower back leg can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Length of the lower back leg from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Rib cage circumference&lt;/strong&gt; 78.19 cm to &lt;strong&gt;Rib cage circumference&lt;/strong&gt; 91.72 cm.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Length of the lower back leg is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Rib cage circumference is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Length of the lower back leg is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Length of the lower back leg and FBMI and the number you are missing is Rib cage circumference.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/mulch">Mulch</a>, <a href="/biology/multi-reverse-translate">Multi Reverse Translate Calculator</a> and <a href="/biology/mushroom-yield">Mushroom Yield Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat BMI calculator work out?', 'a' => <<<'TXT'
            Rib cage circumference, from FBMI and Length of the lower back leg. The relationship is Rib cage circumference = (8082459 ÷ 12500000) × FBMI + (16909959 ÷ 12500000) × Length of the lower back leg.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length of the lower back leg (centimeters), FBMI. With lim and fbmi in place, Rib cage circumference can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Rib cage circumference, FBMI and Length of the lower back leg blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Rib cage circumference = 78.19 cm. Those are the defaults written into the form — move Length of the lower back leg and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Rib cage circumference is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Length of the lower back leg left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Rib cage circumference keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/mulch', 'name' => 'Mulch'],
            ['path' => '/biology/multi-reverse-translate', 'name' => 'Multi Reverse Translate Calculator'],
            ['path' => '/biology/mushroom-yield', 'name' => 'Mushroom Yield Calculator'],
        ],
        'authors' => [],
    ],
];
