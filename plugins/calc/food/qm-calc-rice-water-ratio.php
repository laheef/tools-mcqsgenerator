<?php

/**
 * Rice to water ratio
 * /food/rice-water-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rice to water ratio',
    'meta' => ['title' => 'Rice to water ratio: Formula, Steps & Results', 'description' => 'Estimate water for cooking rice from rice type and quantity, or solve for a missing ratio. Check units and follow the recipe or package directions.', 'h1' => 'Rice to water ratio Calculator', 'updated' => '2026-08-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'type',
                            'label' => 'Type of rice',
                            'type' => 'select',
                            'options' => [
                                'White Long Grain' => '26',
                                'White Medium Grain' => '27',
                                'White Short Grain' => '28',
                                'Jasmine' => '31',
                                'Black Japonica' => '34',
                                'Brown Long Grain' => '29',
                                'Brown Medium/Short Grain' => '30',
                                'Texmati' => '33',
                                'Wild' => '35',
                                'Converted (Parboiled)' => '37',
                                'Basmati' => '32',
                                'Sushi (Calrose)' => '36',
                                'Set custom ratio' => '25',
                            ],
                            'dataset' => 'riceType',
                            'control' => 'DROPDOWN',
                            'default' => 'White Long Grain',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratio',
                            'label' => '1 cup of this rice needs',
                            'type' => 'result',
                            'suffix' => 'cups of water',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'uncooked_rice',
                            'label' => 'Amount of uncooked rice',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'water',
                            'label' => 'Amount of water',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cook_time',
                            'label' => 'Cooking time',
                            'type' => 'result',
                            'suffix' => 'mins',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'water = ratio * uncooked_rice',
            'results' => ['uncooked_rice' => 'water/ratio', 'water' => 'ratio*uncooked_rice', 'ratio' => 'water/uncooked_rice'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Rice to water ratio works out 1 cup of this rice needs and Cooking time from Type of rice, Amount of uncooked rice and Amount of water. It is a single relationship that reads 1 cup of this rice needs out of type of rice, not a table of canned results keyed by them. Units for 1 cup of this rice needs default to cups of water and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Rice to water ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Rice to water ratio: it takes 3 numbers and reports 1 cup of this rice needs and Cooking time.</p><p>In the form&#039;s own words, Amount of water = 1 cup of this rice needs × Amount of uncooked rice.</p><p>The answers are 1 cup of this rice needs and Cooking time; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Type of rice</strong> — a plain number, no unit</li><li><strong>Amount of uncooked rice</strong> — in US customary cups</li><li><strong>Amount of water</strong> — in US customary cups</li></ul><p>What you get back is 1 cup of this rice needs in cups of water, Cooking time in mins, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Amount of water</strong> = <code>1 cup of this rice needs × Amount of uncooked rice</code></li><li><strong>Amount of uncooked rice</strong> = <code>Amount of water ÷ 1 cup of this rice needs</code></li><li><strong>1 cup of this rice needs</strong> = <code>Amount of water ÷ Amount of uncooked rice</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Amount of water</strong> = <code>1 cup of this rice needs × Amount of uncooked rice</code> — the form to use when 1 cup of this rice needs and Amount of uncooked rice are the values you have.</li><li><strong>Amount of uncooked rice</strong> = <code>Amount of water ÷ 1 cup of this rice needs</code> — the form to use when Amount of water and 1 cup of this rice needs are the values you have.</li><li><strong>1 cup of this rice needs</strong> = <code>Amount of water ÷ Amount of uncooked rice</code> — the form to use when Amount of water and Amount of uncooked rice are the values you have.</li></ul><p>Any one of Amount of water, Amount of uncooked rice and 1 cup of this rice needs can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Amount of uncooked rice and Amount of water carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> 1 cup of this rice needs and Cooking time are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Type of rice left as a guess.</strong> Anything typed into Type of rice is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Amount of uncooked rice left as a guess.</strong> Anything typed into Amount of uncooked rice is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Convert Type of rice to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Type of rice</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Amount of uncooked rice</strong> is a us customary cups quantity: the page opens it in cups and converts anything else you pick before the formula runs. It feeds Amount of water and 1 cup of this rice needs. Check the field label and unit before calculating.</li><li><strong>Amount of water</strong> is a us customary cups quantity: the page opens it in cups and converts anything else you pick before the formula runs. It feeds Amount of uncooked rice and 1 cup of this rice needs. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>1 cup of this rice needs</strong> is a plain number. The value follows from Amount of water and Amount of uncooked rice. </li><li><strong>Cooking time</strong> is a plain number. </li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>US customary cups</strong> — opens in <em>cups</em>, and the chip also carries L, cl, cc, cm³, m³ and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Type of rice, Amount of uncooked rice and Amount of water. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Type of rice into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare 1 cup of this rice needs in cups of water with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind 1 cup of this rice needs is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover US customary cups. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Type of rice, Amount of uncooked rice and Amount of water and the number you are missing is 1 cup of this rice needs and Cooking time.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/grams-to-tsp">Grams to teaspoons Calculator</a>, <a href="/food/ham-cooking">Ham cooking time Calculator</a> and <a href="/food/healthy-coffee">Healthy coffee Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rice to water ratio calculator work out?', 'a' => <<<'TXT'
            1 cup of this rice needs and Cooking time, from 1 cup of this rice needs and Amount of uncooked rice. The relationship is Amount of water = 1 cup of this rice needs × Amount of uncooked rice.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Type of rice, Amount of uncooked rice (US customary cups), Amount of water (US customary cups). Enter type of rice, amount of uncooked rice and amount of water; 1 cup of this rice needs is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Amount of water, Amount of uncooked rice and 1 cup of this rice needs blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of 1 cup of this rice needs is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Type of rice left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. 1 cup of this rice needs keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/uncooked-to-cooked-rice', 'name' => 'Uncooked to cooked rice'],
            ['path' => '/food/grams-to-cups', 'name' => 'Grams to cups'],
            ['path' => '/food/cooking-measurement', 'name' => 'Cooking measurement']
        ],
    ],
];
