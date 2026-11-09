<?php

/**
 * Dog crate size
 * /biology/dog-crate-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog crate size',
    'meta' => ['title' => 'Dog crate size Calculator: Formula & Example', 'description' => 'Dog crate size works out minimal crate height from height and length. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Dog crate size Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => 'You dog\'s measurements:',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/dog_crate_calc.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'height',
                            'label' => 'Height',
                            'type' => 'number',
                            'help' => 'With your dog sitting, measure them from the ground to the top of the head or, if they have spikey ears, to the top of the ears.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'help' => 'With your dog standing, measure them from the tip of the nose to the base of the tail.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Crate size',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'addition',
                            'label' => 'Extra length',
                            'type' => 'select',
                            'options' => ['2 in/5.1 cm (small dog)' => '2', '3 in/7.6 cm (medium dog)' => '3', '4 in/10.2 cm (big dog)' => '4'],
                            'dataset' => 'addition',
                            'help' => 'To get the crate dimensions you need to add 2-4 inches to your dog\'s length and height.&nbsp;',
                            'default' => '3 in/7.6 cm (medium dog)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_height',
                            'label' => 'Minimal crate height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_length',
                            'label' => 'Minimal crate length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'final_length = length + addition',
            'results' => ['length' => '-addition + final_length', 'final_length' => 'addition + length', 'addition' => 'final_length - length'],
        ],
        [
            'title' => 'final_height = height + addition',
            'results' => ['addition' => 'final_height - height', 'final_height' => 'addition + height', 'height' => '-addition + final_height'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Dog crate size turns Length and Extra length into Height and Minimal crate height. It is a single relationship that reads height out of length, not a table of canned results keyed by them. Units for Height default to centimeters and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Dog crate size calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dog crate size: it takes 2 numbers and reports Height, Minimal crate height and Minimal crate length.</p><p>The relationship it solves reads Minimal crate length = Extra length + Length.</p><p>What comes back is Height, Minimal crate height and Minimal crate length — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Length</strong> — in centimeters. With your dog standing, measure them from the tip of the nose to the base of the tail.</li><li><strong>Extra length</strong> — a plain number, no unit. To get the crate dimensions you need to add 2-4 inches to your dog&#039;s length and height.&amp;nbsp;</li></ul><p>The answers come back as Height in centimeters, Minimal crate height in centimeters, Minimal crate length in centimeters. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Height = 10 cm, Length = 100 cm, Extra length = 3 and Minimal crate height = 1000 cm — through the same formula and the panel reports <strong>Minimal crate length</strong> = 103 cm.</p><ul><li><strong>Minimal crate length</strong> = 103 cm</li></ul><p>The line behind those figures is <strong>Minimal crate length</strong> = <code>Extra length + Length</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Minimal crate length</strong> = 103 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Height offers 7 units and opens on centimeters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Minimal crate length</strong> = <code>Extra length + Length</code></li><li><strong>Length</strong> = <code>− Extra length + Minimal crate length</code></li><li><strong>Extra length</strong> = <code>Minimal crate length − Length</code></li><li><strong>Minimal crate height</strong> = <code>Extra length + Height</code></li><li><strong>Height</strong> = <code>− Extra length + Minimal crate height</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Minimal crate length</strong> = <code>Extra length + Length</code> — the form to use when Extra length and Length are the values you have.</li><li><strong>Length</strong> = <code>− Extra length + Minimal crate length</code> — the form to use when Extra length and Minimal crate length are the values you have.</li><li><strong>Extra length</strong> = <code>Minimal crate length − Length</code> — the form to use when Minimal crate length and Length are the values you have.</li><li><strong>Minimal crate height</strong> = <code>Extra length + Height</code> — the form to use when Extra length and Height are the values you have.</li><li><strong>Extra length</strong> = <code>Minimal crate height − Height</code> — the form to use when Minimal crate height and Height are the values you have.</li><li><strong>Height</strong> = <code>− Extra length + Minimal crate height</code> — the form to use when Extra length and Minimal crate height are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Minimal crate length, Length and Extra length can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Height from 10 to 20, leaving every other box alone. The panel moves from <strong>Minimal crate length</strong> 103 cm to <strong>Minimal crate length</strong> 103 cm.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Length is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Height, Minimal crate height and Minimal crate length are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Extra length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Extra length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Length is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dog crate size form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Length</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. With your dog standing, measure them from the tip of the nose to the base of the tail. Change it and Minimal crate length and Extra length changes with it. Fill it from a measurement rather than a memory — Length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Extra length</strong> takes a plain number with no unit attached. To get the crate dimensions you need to add 2-4 inches to your dog&#039;s length and height.&amp;nbsp;. Change it and Length, Minimal crate length and Minimal crate height changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Extra length is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Height</strong> is a centimeters figure. It is worked out from Extra length and Minimal crate height. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Minimal crate height</strong> is a centimeters figure. It is worked out from Extra length and Height. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Minimal crate length</strong> is a centimeters figure and the page's own defaults put it at 103 cm. It is worked out from Extra length and Length. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Minimal crate length</th></tr></thead><tbody><tr><td><strong>Height</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Length</strong> +10%</td><td>+9.71%</td></tr><tr><td><strong>Extra length</strong> +10%</td><td>+0.29%</td></tr><tr><td><strong>Minimal crate height</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Length sits at the top — a ten per cent error in that box shows up as roughly 9.7 per cent in the answer. By contrast, Extra length, Height and Minimal crate height barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Height = 5 cm, Length = 50 cm, Extra length = 1.5 and Minimal crate height = 500 cm and the page reports <strong>Minimal crate length</strong> = 51.5 cm.</li><li>Feed in Height = 30 cm, Length = 100 cm, Extra length = 3 and Minimal crate height = 1000 cm and the page reports <strong>Minimal crate length</strong> = 103 cm.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Dog crate size actually offers.</p><ul><li><strong>centimeters</strong> — opens in <em>cm</em>, and the chip also carries cm, m, in, ft, yd and μm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Height follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover centimeters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Length and Extra length measured, Height and Minimal crate height wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog crate size calculator work out?', 'a' => 'Height, Minimal crate height and Minimal crate length, from Extra length and Length. The relationship is Minimal crate length = Extra length + Length.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (centimeters), Extra length. Fill length and extra length and leave Height empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Minimal crate length, Length, Extra length and Minimal crate height can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Minimal crate length = 103 cm. The figures come from Length as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Height is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Length blank and the page solves for it, reporting Height instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Height keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/hamster-age', 'name' => 'Hamster age Calculator'],
            ['path' => '/biology/hardy-weinberg-equilibrium', 'name' => 'Hardy-Weinberg equilibrium Calculator'],
            ['path' => '/biology/hardy-weinberg-dominant-allele', 'name' => 'Hardy–Weinberg from the Dominant Allele Frequency Calculator'],
        ],
        'authors' => [],
    ],
];
