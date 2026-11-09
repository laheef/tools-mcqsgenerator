<?php

/**
 * Dog water intake
 * /biology/dog-water-intake
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog water intake',
    'meta' => ['title' => 'Dog water intake Calculator: Units & Formula', 'description' => 'Enter activity level and weight and Dog water intake returns daily water intake. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Dog water intake Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'activity_level',
                            'label' => 'Activity level',
                            'type' => 'select',
                            'options' => ['Low' => '40', 'Medium' => '50', 'High ' => '60'],
                            'default' => 'Medium',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water_intake',
                            'label' => 'Daily water intake',
                            'type' => 'number',
                            'help' => 'The calculated value is approximation. It may differ based on the dog\'s health, diet and other important factors.',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        This tool is for information purposes only; water intake should always be calculated separately and double-checked by the health care provider. Consult a veterinarian.
                        TXT],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'water_intake = weight * activity_level',
            'results' => ['weight' => 'water_intake/activity_level', 'water_intake' => 'activity_level*weight', 'activity_level' => 'water_intake/weight'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Dog water intake works out Daily water intake from Activity level and Weight. Nothing is looked up on this page: daily water intake is computed from activity level and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Daily water intake is opened in milliliters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Dog water intake calculator works', 'html' => <<<'TXT'
            <p>The Dog water intake calculator applies one relationship to 2 numbers and reports Daily water intake.</p><p>The relationship it solves reads Daily water intake = Activity level × Weight.</p><p>The answers are Daily water intake; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Activity level</strong> — a plain number, no unit</li><li><strong>Weight</strong> — in kilograms</li></ul><p>What you get back is Daily water intake in milliliters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Activity level = 50 and Weight = 10 kg — through the same formula and the panel reports <strong>Daily water intake</strong> = 500 ml.</p><ul><li><strong>Daily water intake</strong> = 500 ml</li></ul><p>That is <strong>Daily water intake</strong> = <code>Activity level × Weight</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Daily water intake</strong> = 500. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Daily water intake lists 16 options and opens on milliliters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Daily water intake</strong> = <code>Activity level × Weight</code></li><li><strong>Weight</strong> = <code>Daily water intake ÷ Activity level</code></li><li><strong>Activity level</strong> = <code>Daily water intake ÷ Weight</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Daily water intake</strong> = <code>Activity level × Weight</code> — the form to use when Activity level and Weight are the values you have.</li><li><strong>Weight</strong> = <code>Daily water intake ÷ Activity level</code> — the form to use when Daily water intake and Activity level are the values you have.</li><li><strong>Activity level</strong> = <code>Daily water intake ÷ Weight</code> — the form to use when Daily water intake and Weight are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Daily water intake, Weight and Activity level can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Activity level, from 50 to 100 — and the answers go from <strong>Daily water intake</strong> 500 ml to <strong>Daily water intake</strong> 1000 ml.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Daily water intake is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Activity level left as a guess.</strong> Anything typed into Activity level is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Weight left as a guess.</strong> Anything typed into Weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Activity level is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Activity level</strong> takes a plain number with no unit attached. It feeds Weight and Daily water intake. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Activity level is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. It feeds Daily water intake and Activity level. Have it to hand before you start: Weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Daily water intake</strong> is a milliliters figure and the page's own defaults put it at 500 ml. It is computed from Activity level and Weight, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Daily water intake</th></tr></thead><tbody><tr><td><strong>Activity level</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Weight</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Activity level: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Activity level = 25 and Weight = 5 kg, the answer is <strong>Daily water intake</strong> = 125 ml.</li><li>With Activity level = 150 and Weight = 10 kg, the answer is <strong>Daily water intake</strong> = 1500 ml.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>milliliters</strong> — opens in <em>ml</em>, and the chip also carries L, µl, cl, cc, cm³ and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Activity level and Weight. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Activity level into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Daily water intake in ml with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Daily water intake is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are milliliters and kilograms and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Activity level and Weight are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Activity level and Weight measured, Daily water intake wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog water intake calculator work out?', 'a' => 'Daily water intake, from Activity level and Weight. The relationship is Daily water intake = Activity level × Weight.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Activity level, Weight (kilograms). With activity level and weight in place, Daily water intake can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Daily water intake, Weight and Activity level can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Daily water intake = 500 ml. The figures come from Activity level as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Daily water intake is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Activity level left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Daily water intake at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/how-big-will-my-cat-get', 'name' => 'How big will my cat get Calculator'],
            ['path' => '/biology/huglin-index', 'name' => 'Huglin Index Calculator'],
            ['path' => '/biology/hunting-tooth-ratio', 'name' => 'Hunting Tooth Ratio Calculator'],
        ],
        'authors' => [],
    ],
];
