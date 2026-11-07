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
    'meta' => ['title' => 'Cat BMI Calculator: Formula, Steps & Examples', 'description' => 'Cat BMI works out FBMI from rib cage circumference and length of the lower back leg. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Cat BMI Calculator', 'updated' => '2026-09-05'],
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
        Cat BMI takes Rib cage circumference and Length of the lower back leg and returns FBMI. It is a single relationship that reads FBMI out of rib cage circumference, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Cat BMI calculator works', 'html' => <<<'TXT'
            <p>Cat BMI answers one question from 2 numbers, and the answer is FBMI.</p><p>Written with the labels from the form, Rib cage circumference = (8082459 ÷ 12500000) × FBMI + (16909959 ÷ 12500000) × Length of the lower back leg.</p><p>What comes back is FBMI — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Rib cage circumference</strong> — in centimeters. Ideally, measured around the 9th rib.</li><li><strong>Length of the lower back leg</strong> — in centimeters. Length of your cat&#039;s lower back leg from the knee to the ankle.</li></ul><p>The result box is FBMI. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Length of the lower back leg = 10 cm and FBMI = 100 — through the same formula and the panel reports <strong>Rib cage circumference</strong> = 78.19 cm.</p><ul><li><strong>Rib cage circumference</strong> = 78.19 cm</li></ul><p>That is <strong>Rib cage circumference</strong> = <code>(8082459 ÷ 12500000) × FBMI + (16909959 ÷ 12500000) × Length of the lower back leg</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Rib cage circumference</strong> = 78.19 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Rib cage circumference offers 31 units and opens on centimeters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Rib cage circumference</strong> = <code>(8082459 ÷ 12500000) × FBMI + (16909959 ÷ 12500000) × Length of the lower back leg</code></li><li><strong>FBMI</strong> = <code>− 4789 ÷ 2289 × Length of the lower back leg + (12500000 ÷ 8082459) × Rib cage circumference</code></li><li><strong>Length of the lower back leg</strong> = <code>− 2289 ÷ 4789 × FBMI + (12500000 ÷ 16909959) × Rib cage circumference</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Rib cage circumference</strong> = <code>(8082459 ÷ 12500000) × FBMI + (16909959 ÷ 12500000) × Length of the lower back leg</code> — the form to use when FBMI and Length of the lower back leg are the values you have.</li><li><strong>FBMI</strong> = <code>− 4789 ÷ 2289 × Length of the lower back leg + (12500000 ÷ 8082459) × Rib cage circumference</code> — the form to use when Length of the lower back leg and Rib cage circumference are the values you have.</li><li><strong>Length of the lower back leg</strong> = <code>− 2289 ÷ 4789 × FBMI + (12500000 ÷ 16909959) × Rib cage circumference</code> — the form to use when FBMI and Rib cage circumference are the values you have.</li></ul><p>Any one of Rib cage circumference, FBMI and Length of the lower back leg can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Length of the lower back leg from 10 to 20, leaving every other box alone. The panel moves from <strong>Rib cage circumference</strong> 78.19 cm to <strong>Rib cage circumference</strong> 91.72 cm.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Rib cage circumference and Length of the lower back leg is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with FBMI is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Rib cage circumference left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Rib cage circumference is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Length of the lower back leg left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Length of the lower back leg is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Rib cage circumference is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Rib cage circumference</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Ideally, measured around the 9th rib. It feeds FBMI and Length of the lower back leg. Have it to hand before you start: Rib cage circumference is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Length of the lower back leg</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Length of your cat&#039;s lower back leg from the knee to the ankle. It feeds Rib cage circumference and FBMI. Have it to hand before you start: Length of the lower back leg is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>FBMI</strong> is a plain number. It is computed from Length of the lower back leg and Rib cage circumference, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Rib cage circumference</th></tr></thead><tbody><tr><td><strong>Length of the lower back leg</strong> +10%</td><td>+1.73%</td></tr><tr><td><strong>FBMI</strong> +10%</td><td>+8.27%</td></tr></tbody></table><p>Ranked by leverage, FBMI sits at the top — a ten per cent error in that box shows up as roughly 8.3 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Length of the lower back leg = 5 cm and FBMI = 50, the answer is <strong>Rib cage circumference</strong> = 39.09 cm.</li><li>With Length of the lower back leg = 30 cm and FBMI = 100, the answer is <strong>Rib cage circumference</strong> = 105 cm.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>centimeters</strong> — 31 units. It opens in <em>cm</em>, and the chip also carries in, m, ft, Å, nm and pm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> FBMI follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover centimeters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Rib cage circumference and Length of the lower back leg and the number you are missing is FBMI.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/mulch">Mulch</a>, <a href="/biology/multi-reverse-translate">Multi Reverse Translate Calculator</a> and <a href="/biology/mushroom-yield">Mushroom Yield Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat BMI calculator work out?', 'a' => <<<'TXT'
            FBMI, from FBMI and Length of the lower back leg. The relationship is Rib cage circumference = (8082459 ÷ 12500000) × FBMI + (16909959 ÷ 12500000) × Length of the lower back leg.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Rib cage circumference (centimeters), Length of the lower back leg (centimeters). With rib cage circumference and length of the lower back leg in place, FBMI can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Rib cage circumference, FBMI and Length of the lower back leg blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Rib cage circumference = 78.19 cm. Those are the defaults written into the form — move Rib cage circumference and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally FBMI is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Rib cage circumference left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. FBMI keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/mulch', 'name' => 'Mulch'],
            ['path' => '/biology/multi-reverse-translate', 'name' => 'Multi Reverse Translate Calculator'],
            ['path' => '/biology/mushroom-yield', 'name' => 'Mushroom Yield Calculator'],
        ],
        'authors' => [],
    ],
];
