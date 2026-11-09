<?php

/**
 * Dog Metacam dosage
 * /biology/dog-metacam
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog Metacam dosage',
    'meta' => ['title' => 'Dog Metacam dosage Calculator: Steps & Units', 'description' => 'Dog Metacam dosage works out tablets Maintain1 and Tablets Maintain25 from dog\'s weight, metacam form and solution\'s strength. Every figure is computed.', 'h1' => 'Dog Metacam dosage Calculator', 'updated' => '2026-08-19'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Did you know that you can create your own tailored calculator using our AI Editor? Try it now '],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Dog\'s weight',
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
                            'name' => 'form',
                            'label' => 'Metacam form',
                            'type' => 'select',
                            'options' => ['Solution' => '1', 'Tablets' => '0'],
                            'dataset' => 'form',
                            'default' => 'Solution',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'strength',
                            'label' => 'Solution\'s strength',
                            'type' => 'select',
                            'options' => ['0.5 mg/mL' => '0.5', '1.5 mg/mL' => '1.5'],
                            'dataset' => 'tablets_strength',
                            'default' => '0.5 mg/mL',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'not(hasValue(weight))', 'text' => 'Input your dog\'s weight to get the results...&nbsp;'],
                                ['when' => 'form==1 and weight>0', 'text' => <<<'TXT'
                                1⃣ On the first day of therapy, your dog should receive {{firstDay.value}}&nbsp;mg of Metacam, which translates to {{firstAmount.value}} ml of the solution.  For the treatments after day 1, your dog should receive {{otherDoses.value}}&nbsp;mg of Metacam daily, which is {{otherAmount.value}}&nbsp;ml of the solution.
                                TXT],
                                ['when' => 'form==0 and weight<=20', 'text' => <<<'TXT'
                                1⃣ On the first day of therapy, your dog should receive {{firstDay1.value}} tablet(s) of Metacam 1&nbsp;mg.  For the treatments after day 1, your dog should receive about {{tabletsMaintain1.value}}&nbsp;tablet(s) of Metacam 1&nbsp;mg.&nbsp;
                                TXT],
                                ['when' => 'form==0 and weight>20', 'text' => <<<'TXT'
                                1⃣ On the first day of therapy, your dog should receive {{firstDay25.value}} tablet(s) of Metacam 2.5 mg.  For the treatments after day 1, your dog should receive {{tabletsMaintain25.value}} tablet(s) of Metacam 2.5 mg.
                                TXT],
                                ['when' => 'form==0 and weight<4', 'text' => 'For smaller dogs, Metacam solution would be a better choice.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firstDay',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'otherDoses',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firstAmount',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'otherAmount',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tabletsMaintain1',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tabletsMaintain25',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firstDay1',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firstDay25',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tabletsMaintain1',
                            'label' => 'Tablets Maintain1',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tabletsMaintain25',
                            'label' => 'Tablets Maintain25',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'tabletsMaintain1 = get_tablets_1(weight)',
            'results' => ['tabletsMaintain1' => 'get_tablets_1(weight)'],
        ],
        [
            'title' => 'tabletsMaintain25 = get_tablets_25(weight)',
            'results' => ['tabletsMaintain25' => 'get_tablets_25(weight)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_tablets_1",function(weight){if(weight>=4&&weight<=7){return 0.5}else if(weight<=10){return 1}else if(weight<=15){return 1.5}else if(weight<=20){return 2}else{return 1}});omni.define("get_tablets_25",function(weight){if(weight>20&&weight<=25){return 1}else if(weight<=35){return 1.5}else if(weight<=50){return 2}else{return 1}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Dog's weight, Metacam form and Solution's strength into Dog Metacam dosage and the answer comes back as Tablets Maintain1 and Tablets Maintain25. Nothing is looked up on this page: tablets Maintain1 is computed from dog's weight and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Dog Metacam dosage calculator works', 'html' => <<<'TXT'
            <p>Dog Metacam dosage answers one question from 3 numbers, and the answer is Tablets Maintain1 and Tablets Maintain25.</p><p>In the form&#039;s own words, Tablets Maintain1 = get_tablets_1(Dog&#039;s weight).</p><p>The result panel carries Tablets Maintain1 and Tablets Maintain25, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Dog&#039;s weight</strong> — in kilograms</li><li><strong>Metacam form</strong> — a plain number, no unit</li><li><strong>Solution&#039;s strength</strong> — a plain number, no unit</li></ul><p>The result boxes are Tablets Maintain1, Tablets Maintain25; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Dog&#039;s weight lists 7 options and opens on kilograms. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Tablets Maintain1</strong> = <code>get_tablets_1(Dog&#039;s weight)</code></li><li><strong>Tablets Maintain25</strong> = <code>get_tablets_25(Dog&#039;s weight)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Tablets Maintain1</strong> = <code>get_tablets_1(Dog&#039;s weight)</code> — the form to use when Dog&#039;s weight are the values you have.</li><li><strong>Tablets Maintain25</strong> = <code>get_tablets_25(Dog&#039;s weight)</code> — the form to use when Dog&#039;s weight are the values you have.</li></ul><p>Any one of Tablets Maintain1 and Tablets Maintain25 can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Dog&#039;s weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Tablets Maintain1 and Tablets Maintain25 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Dog&#039;s weight left as a guess.</strong> Anything typed into Dog&amp;#039;s weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Metacam form left as a guess.</strong> Anything typed into Metacam form is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Dog&#039;s weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dog Metacam dosage form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Dog&#039;s weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. The page reads it when it works out Tablets Maintain1 and Tablets Maintain25. Fill it from a measurement rather than a memory — Dog&#039;s weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Metacam form</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Metacam form is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Solution&#039;s strength</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Solution&#039;s strength is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Tablets Maintain1</strong> is a plain number. It is computed from Dog's weight, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Tablets Maintain25</strong> is a plain number. It is computed from Dog's weight, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Dog Metacam dosage actually offers.</p><ul><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Dog&#039;s weight, Metacam form and Solution&#039;s strength ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Dog&amp;#039;s weight — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Tablets Maintain1 against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Tablets Maintain1 is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Dog&#039;s weight, Metacam form and Solution&#039;s strength are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Dog&#039;s weight, Metacam form and Solution&#039;s strength measured, Tablets Maintain1 and Tablets Maintain25 wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Dog Metacam dosage is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog Metacam dosage calculator work out?', 'a' => 'Tablets Maintain1 and Tablets Maintain25, from Dog\'s weight. The relationship is Tablets Maintain1 = get_tablets_1(Dog\'s weight).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Dog's weight (kilograms), Metacam form, Solution's strength. Enter dog's weight, metacam form and solution's strength; Tablets Maintain1 is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Tablets Maintain1 and Tablets Maintain25 blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Tablets Maintain1 is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Dog\'s weight blank and the page solves for it, reporting Tablets Maintain1 instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Tablets Maintain1 at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/specific-growth-rate-od', 'name' => 'Specific Growth Rate from OD Calculator'],
            ['path' => '/biology/specific-growth-rate-from-od', 'name' => 'Specific Growth Rate from OD Readings Calculator'],
            ['path' => '/biology/specific-productivity-qp', 'name' => 'Specific Productivity (qP) Calculator'],
        ],
        'authors' => [],
    ],
];
