<?php

/**
 * Turkey defrost time
 * /food/turkey-defrost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Turkey defrost time',
    'meta' => ['title' => 'Turkey defrost time — Free Online Calculator', 'description' => <<<'TXT'
    Estimate turkey thawing time by weight and method, then plan from a start or serving time. Use as a guide; follow safe-handling instructions.
    TXT, 'h1' => 'Turkey defrost time Calculator', 'updated' => '2026-07-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'method',
                            'label' => 'Defrosting method ',
                            'type' => 'select',
                            'options' => ['Cold water' => '1', 'Refrigerator' => '2'],
                            'dataset' => 'defrost_methodDS',
                            'default' => 'Cold water',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Turkey size ',
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
                            'name' => 'water',
                            'label' => 'Thawing time ⏲',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fridge',
                            'label' => 'Thawing time ⏲',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'water = weight * 30',
            'results' => ['water' => '30*weight', 'weight' => '(1/30)*water'],
        ],
        [
            'title' => 'fridge = weight * (1/4)',
            'results' => ['weight' => '4*fridge', 'fridge' => '(1/4)*weight'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Turkey defrost time takes Turkey size and returns Thawing time ⏲ and Thawing time ⏲. Nothing is looked up on this page: thawing time ⏲ is computed from turkey size and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Thawing time ⏲ is opened in hours / minutes; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Turkey defrost time calculator works', 'html' => <<<'TXT'
            <p>The Turkey defrost time calculator applies one relationship to 1 number and reports Thawing time ⏲ and Thawing time ⏲.</p><p>Written with the labels from the form, Thawing time ⏲ = 30 × Turkey size.</p><p>What comes back is Thawing time ⏲ and Thawing time ⏲ — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Turkey size</strong> — in kilograms</li></ul><p>The answers come back as Thawing time ⏲ in hours / minutes, Thawing time ⏲ in days. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Thawing time ⏲ offers 9 units and opens on hours / minutes, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Thawing time ⏲</strong> = <code>30 × Turkey size</code></li><li><strong>Turkey size</strong> = <code>(1 ÷ 30) × Thawing time ⏲</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Thawing time ⏲</strong> = <code>30 × Turkey size</code> — the form to use when Turkey size are the values you have.</li><li><strong>Turkey size</strong> = <code>(1 ÷ 30) × Thawing time ⏲</code> — the form to use when Thawing time ⏲ are the values you have.</li><li><strong>Thawing time ⏲</strong> = <code>(1 ÷ 4) × Turkey size</code> — the form to use when Turkey size are the values you have.</li><li><strong>Turkey size</strong> = <code>4 × Thawing time ⏲</code> — the form to use when Thawing time ⏲ are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Thawing time ⏲, Turkey size and Thawing time ⏲ can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Turkey size is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Thawing time ⏲ and Thawing time ⏲ are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Turkey size left as a guess.</strong> If Turkey size is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Turkey size and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Turkey defrost time form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Turkey size</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. The page reads it when it works out Thawing time ⏲ and Thawing time ⏲. Fill it from a measurement rather than a memory — Turkey size is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Thawing time ⏲</strong> is a hours / minutes figure. It is computed from Turkey size, so it changes the moment any of them does. </li><li><strong>Thawing time ⏲</strong> is a days figure. It is computed from Turkey size, so it changes the moment any of them does. </li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Turkey defrost time actually offers.</p><ul><li><strong>hours / minutes</strong> — opens in <em>hrsmin</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Turkey size ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Turkey size — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Thawing time ⏲ in hrsmin against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Thawing time ⏲ follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are hours / minutes and kilograms and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Turkey size are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Turkey size is what you already know and Thawing time ⏲ and Thawing time ⏲ is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/pounds-to-cups">Pounds to cups Calculator</a>, <a href="/food/priming-sugar">Priming sugar Calculator</a> and <a href="/food/quarantine-food">Quarantine food Calculator</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Turkey defrost time is a number to act on, so the useful question is what to do with Thawing time ⏲ (hrsmin) and Thawing time ⏲ (days) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> Write down Turkey size alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Turkey defrost time calculator work out?', 'a' => 'Thawing time ⏲ and Thawing time ⏲, from Turkey size. The relationship is Thawing time ⏲ = 30 × Turkey size.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Turkey size (kilograms). Fill turkey size and leave Thawing time ⏲ empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Thawing time ⏲, Turkey size and Thawing time ⏲ can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Thawing time ⏲ is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Turkey size blank and the page solves for it, reporting Thawing time ⏲ instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Thawing time ⏲ keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/food/turkey-thawing', 'name' => 'Turkey thawing'],
            ['path' => '/food/turkey-size', 'name' => 'Turkey size'],
            ['path' => '/food/turkey-cooking-time', 'name' => 'Turkey cooking time']
        ],
    ],
];
