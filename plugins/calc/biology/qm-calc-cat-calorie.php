<?php

/**
 * Cat calorie
 * /biology/cat-calorie
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cat calorie',
    'meta' => ['title' => 'Cat calorie Calculator: Formula, Steps & Examples', 'description' => 'Cat calorie turns weight, condition and maintenance coefficient into resting energy and maintenance energy. The formula is printed in the form\'s own words.', 'h1' => 'Cat calorie Calculator', 'updated' => '2026-07-23'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
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
                            'name' => 'condition',
                            'label' => 'Condition',
                            'type' => 'select',
                            'options' => [
                                'Neutered adult' => '1.6',
                                'Non-neutered adult' => '1.8',
                                'Weight loss' => '1',
                                'Weight gain' => '1.7',
                                '0 to 4 months old kitten' => '3',
                                '4 months kitten to adult' => '2',
                                'Set custom maintenance coefficient' => '',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                            'default' => 'Neutered adult',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'resting_energy',
                            'label' => 'Resting energy',
                            'type' => 'number',
                            'help' => 'The energy required to perform basic bodily functions, such as digestion, respiration, heart and brain functions.',
                            'unit' => '44',
                            'unit_default' => 'kcal',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maintenance_energy',
                            'label' => 'Maintenance energy',
                            'type' => 'number',
                            'help' => 'The total number of calories required on a daily basis.&nbsp;',
                            'unit' => '44',
                            'unit_default' => 'kcal',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Maintenance coefficient',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maintenance_coefficient',
                            'label' => 'Maintenance coefficient',
                            'type' => 'result',
                            'help' => <<<'TXT'
                            A maintenance multiplier that is a factor based on the condition of the cat, like age, whether the cat is neutered or not and whether the cat is on a weight loss or gain plan.
                            TXT,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'resting_energy = (weight ^ 0.75) *70',
            'results' => ['weight' => '(1/4900)*pow(70, 2/3)*pow(resting_energy, 4/3)', 'resting_energy' => '70*pow(weight, 3/4)'],
        ],
        [
            'title' => 'maintenance_energy = resting_energy *maintenance_coefficient',
            'results' => ['resting_energy' => 'maintenance_energy/maintenance_coefficient', 'maintenance_coefficient' => 'maintenance_energy/resting_energy', 'maintenance_energy' => 'maintenance_coefficient*resting_energy'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Weight, Condition and Resting energy into Cat calorie and the answer comes back as Maintenance coefficient. There is no hidden constant here: change maintenance coefficient and weight moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Cat calorie calculator works', 'html' => <<<'TXT'
            <p>The Cat calorie calculator applies one relationship to 4 numbers and reports Maintenance coefficient.</p><p>Written with the labels from the form, Weight = (1 ÷ 4900) × (70)^(2 ÷ 3) × (Resting energy)^(4 ÷ 3).</p><p>The answers are Maintenance coefficient; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Weight</strong> — in kilograms</li><li><strong>Condition</strong> — a plain number, no unit</li><li><strong>Resting energy</strong> — in kilocalories. The energy required to perform basic bodily functions, such as digestion, respiration, heart and brain functions.</li><li><strong>Maintenance energy</strong> — in kilocalories. The total number of calories required on a daily basis.&amp;nbsp;</li></ul><p>The result box is Maintenance coefficient. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Weight lists 27 options and opens on kilograms. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Weight</strong> = <code>(1 ÷ 4900) × (70)^(2 ÷ 3) × (Resting energy)^(4 ÷ 3)</code></li><li><strong>Resting energy</strong> = <code>70 × (Weight)^(3 ÷ 4)</code></li><li><strong>Maintenance coefficient</strong> = <code>Maintenance energy ÷ Resting energy</code></li><li><strong>Maintenance energy</strong> = <code>Maintenance coefficient × Resting energy</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Weight</strong> = <code>(1 ÷ 4900) × (70)^(2 ÷ 3) × (Resting energy)^(4 ÷ 3)</code> — the form to use when Resting energy are the values you have.</li><li><strong>Resting energy</strong> = <code>70 × (Weight)^(3 ÷ 4)</code> — the form to use when Weight are the values you have.</li><li><strong>Resting energy</strong> = <code>Maintenance energy ÷ Maintenance coefficient</code> — the form to use when Maintenance energy and Maintenance coefficient are the values you have.</li><li><strong>Maintenance coefficient</strong> = <code>Maintenance energy ÷ Resting energy</code> — the form to use when Maintenance energy and Resting energy are the values you have.</li><li><strong>Maintenance energy</strong> = <code>Maintenance coefficient × Resting energy</code> — the form to use when Maintenance coefficient and Resting energy are the values you have.</li></ul><p>Any one of Weight, Resting energy and Maintenance coefficient can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Weight, Resting energy and Maintenance energy carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Maintenance coefficient is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Weight left as a guess.</strong> Anything typed into Weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Condition left as a guess.</strong> Anything typed into Condition is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. It feeds Resting energy. Have it to hand before you start: Weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Condition</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Condition is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Resting energy</strong> is a kilocalories quantity: the page opens it in kcal and converts anything else you pick before the formula runs. The energy required to perform basic bodily functions, such as digestion, respiration, heart and brain functions. It feeds Weight, Maintenance coefficient and Maintenance energy. Have it to hand before you start: Resting energy is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Maintenance energy</strong> is a kilocalories quantity: the page opens it in kcal and converts anything else you pick before the formula runs. The total number of calories required on a daily basis.&amp;nbsp;. It feeds Resting energy and Maintenance coefficient. Have it to hand before you start: Maintenance energy is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Maintenance coefficient</strong> is a plain number. It is worked out from Maintenance energy and Resting energy. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>kilograms</strong> — 27 units. It opens in <em>kg</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>kilocalories</strong> — 33 units. It opens in <em>kcal</em>, and the chip also carries kJ, eV, J, thm, kWh and ft-lb. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Weight, Condition, Resting energy and Maintenance energy. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Weight into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Maintenance coefficient with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Maintenance coefficient is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and kilocalories and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Weight, Condition and Resting energy are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Weight, Condition and Resting energy and the number you are missing is Maintenance coefficient.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dna-percentage">DNA Percentage Calculator</a>, <a href="/biology/sequence-shuffler">DNA Sequence Shuffler Calculator</a> and <a href="/biology/dna-to-mrna">DNA to mRNA</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat calorie calculator work out?', 'a' => 'Maintenance coefficient, from Resting energy. The relationship is Weight = (1 ÷ 4900) × (70)^(2 ÷ 3) × (Resting energy)^(4 ÷ 3).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Weight (kilograms), Condition, Resting energy (kilocalories), Maintenance energy (kilocalories). Fill weight, condition and resting energy and leave Maintenance coefficient empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Weight, Resting energy, Maintenance coefficient and Maintenance energy blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Maintenance coefficient is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Maintenance coefficient keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dna-percentage', 'name' => 'DNA Percentage Calculator'],
            ['path' => '/biology/sequence-shuffler', 'name' => 'DNA Sequence Shuffler Calculator'],
            ['path' => '/biology/dna-to-mrna', 'name' => 'DNA to mRNA'],
        ],
        'authors' => [],
    ],
];
