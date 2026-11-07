<?php

/**
 * Omega-3 for dogs
 * /biology/omega-3-for-dogs
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Omega-3 for dogs',
    'meta' => ['title' => 'Omega-3 for dogs Calculator: Units & Formula', 'description' => 'Omega-3 for dogs converts a dog\'s weight and a chosen purpose into a total daily dose with the metabolic-scaling rule. Scaling runs on weight to the power 3/4.', 'h1' => 'Omega-3 for dogs Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dog',
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
                            'name' => 'purpose',
                            'label' => 'Purpose/disorder',
                            'type' => 'select',
                            'options' => [
                                'NRC recommended allowance' => '30',
                                'NRC safe upper limit ' => '370',
                                'Idiopathic hyperlipidemia' => '120',
                                'Kidney disease' => '140',
                                'Cardiovascular disorders' => '115',
                                'Osteoarthritis' => '310',
                                'Inflammatory or immunologic' => '125',
                                'Custom' => '',
                            ],
                            'dataset' => 'purpose',
                            'control' => 'DROPDOWN',
                            'help' => 'NRC stands for the National Research Council.',
                            'default' => 'NRC recommended allowance',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dose',
                            'label' => 'Dose',
                            'type' => 'result',
                            'suffix' => 'mg/kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_dose',
                            'label' => 'Total Omega-3 dose',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dose_custom',
                            'label' => 'Dose ',
                            'type' => 'number',
                            'suffix' => 'mg/kg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_dose_custom',
                            'label' => 'Total Omega-3 dose',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => '(dog^0.75)* dose = total_dose',
            'results' => ['dog' => 'pow(total_dose/dose, 4/3)', 'dose' => 'total_dose/pow(dog, 3/4)', 'total_dose' => 'pow(dog, 3/4)*dose'],
        ],
        [
            'title' => '(dog^0.75) * dose_custom = total_dose_custom',
            'results' => ['dog' => 'pow(total_dose_custom/dose_custom, 4/3)', 'total_dose_custom' => 'pow(dog, 3/4)*dose_custom', 'dose_custom' => 'total_dose_custom/pow(dog, 3/4)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Dog's weight, Purpose/disorder and Total Omega-3 dose into Omega-3 for dogs and the answer comes back as Dose. The arithmetic is the whole method: dose is worked out from dog's weight by one formula, applied once. Dose comes back in mg/kg unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Omega-3 for dogs calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Omega-3 for dogs: it takes 5 numbers and reports Dose.</p><p>In the form&#039;s own words, Dog&#039;s weight = (Total Omega-3 dose ÷ Dose)^(4 ÷ 3).</p><p>The result panel carries Dose, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Dog&#039;s weight</strong> — in kilograms</li><li><strong>Purpose/disorder</strong> — a plain number, no unit. NRC stands for the National Research Council.</li><li><strong>Total Omega-3 dose</strong> — in milligrams</li><li><strong>Dose</strong> — in mg/kg</li><li><strong>Total Omega-3 dose</strong> — in milligrams</li></ul><p>The answer comes back as Dose in mg/kg. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Dog&#039;s weight lists 7 options and opens on kilograms. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Dog&#039;s weight</strong> = <code>(Total Omega-3 dose ÷ Dose)^(4 ÷ 3)</code></li><li><strong>Dose</strong> = <code>Total Omega-3 dose ÷ (Dog&#039;s weight)^(3 ÷ 4)</code></li><li><strong>Total Omega-3 dose</strong> = <code>(Dog&#039;s weight)^(3 ÷ 4) × Dose</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Dog&#039;s weight</strong> = <code>(Total Omega-3 dose ÷ Dose)^(4 ÷ 3)</code> — the form to use when Total Omega-3 dose and Dose are the values you have.</li><li><strong>Dose</strong> = <code>Total Omega-3 dose ÷ (Dog&#039;s weight)^(3 ÷ 4)</code> — the form to use when Total Omega-3 dose and Dog&#039;s weight are the values you have.</li><li><strong>Total Omega-3 dose</strong> = <code>(Dog&#039;s weight)^(3 ÷ 4) × Dose</code> — the form to use when Dog&#039;s weight and Dose are the values you have.</li><li><strong>Dog&#039;s weight</strong> = <code>(Total Omega-3 dose ÷ Dose)^(4 ÷ 3)</code> — the form to use when Total Omega-3 dose and Dose are the values you have.</li><li><strong>Total Omega-3 dose</strong> = <code>(Dog&#039;s weight)^(3 ÷ 4) × Dose</code> — the form to use when Dog&#039;s weight and Dose are the values you have.</li><li><strong>Dose</strong> = <code>Total Omega-3 dose ÷ (Dog&#039;s weight)^(3 ÷ 4)</code> — the form to use when Total Omega-3 dose and Dog&#039;s weight are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Dog&#039;s weight, Dose and Total Omega-3 dose can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Dog&#039;s weight, Total Omega-3 dose and Total Omega-3 dose carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Dose is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Dog&#039;s weight left as a guess.</strong> Anything typed into Dog&amp;#039;s weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Purpose/disorder left as a guess.</strong> Anything typed into Purpose/disorder is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Dog&#039;s weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Dog&#039;s weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. The page reads it when it works out Dose, Total Omega-3 dose and Total Omega-3 dose. Have it to hand before you start: Dog&#039;s weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Purpose/disorder</strong> takes a plain number with no unit attached. NRC stands for the National Research Council. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Purpose/disorder is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total Omega-3 dose</strong> is a milligrams quantity: the page opens it in mg and converts anything else you pick before the formula runs. The page reads it when it works out Dog's weight and Dose. Have it to hand before you start: Total Omega-3 dose is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dose</strong> is measured in mg/kg. The page reads it when it works out Dog's weight and Total Omega-3 dose. Have it to hand before you start: Dose is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total Omega-3 dose</strong> is a milligrams quantity: the page opens it in mg and converts anything else you pick before the formula runs. The page reads it when it works out Dog's weight and Dose. Have it to hand before you start: Total Omega-3 dose is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Dose</strong> is a plain number. It is worked out from Total Omega-3 dose and Dog's weight. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Dog&#039;s weight, Purpose/disorder, Total Omega-3 dose and Dose. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Dog&amp;#039;s weight into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Dose in mg/kg with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Dose is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Dog&#039;s weight, Purpose/disorder and Total Omega-3 dose are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Dog&#039;s weight, Purpose/disorder and Total Omega-3 dose measured, Dose wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/species-richness">Species Richness Calculator</a>, <a href="/biology/specific-growth-rate-od">Specific Growth Rate from OD Calculator</a> and <a href="/biology/specific-growth-rate-from-od">Specific Growth Rate from OD Readings Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Omega-3 for dogs calculator work out?', 'a' => 'Dose, from Total Omega-3 dose and Dose. The relationship is Dog\'s weight = (Total Omega-3 dose ÷ Dose)^(4 ÷ 3).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Dog's weight (kilograms), Purpose/disorder, Total Omega-3 dose (milligrams), Dose (mg/kg), Total Omega-3 dose (milligrams). With dog's weight, purpose/disorder and total Omega-3 dose in place, Dose can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Dog's weight, Dose, Total Omega-3 dose and Total Omega-3 dose can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Dose is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Dog's weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Dose keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/species-richness', 'name' => 'Species Richness Calculator'],
            ['path' => '/biology/specific-growth-rate-od', 'name' => 'Specific Growth Rate from OD Calculator'],
            ['path' => '/biology/specific-growth-rate-from-od', 'name' => 'Specific Growth Rate from OD Readings Calculator'],
        ],
        'authors' => [],
    ],
];
