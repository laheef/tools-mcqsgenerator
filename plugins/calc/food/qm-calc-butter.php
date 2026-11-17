<?php

/**
 * Butter
 * /food/butter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Butter',
    'meta' => ['title' => 'Butter Calculator: Formula, Steps & Examples', 'description' => 'Convert butter between common weight and volume units, including grams, sticks, tablespoons and cups. Use consistent units and the correct ingredient density.', 'h1' => 'Butter Calculator', 'updated' => '2026-08-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butterStick',
                            'label' => 'Weight in sticks',
                            'type' => 'number',
                            'unit' => '188',
                            'unit_default' => 'sticks',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butterCup',
                            'label' => 'Volume in cups',
                            'type' => 'number',
                            'unit' => '188',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butterTbsp',
                            'label' => 'Volume in tablespoons',
                            'type' => 'number',
                            'unit' => '188',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butterGram',
                            'label' => 'Weight in grams',
                            'type' => 'number',
                            'unit' => '188',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butterTsp',
                            'label' => 'Volume in teaspoons',
                            'type' => 'number',
                            'unit' => '188',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butterOz',
                            'label' => 'Weight in ounces',
                            'type' => 'number',
                            'unit' => '188',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butterPounds',
                            'label' => 'Weight in pounds',
                            'type' => 'number',
                            'unit' => '188',
                            'unit_default' => 'pounds',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butterMillili',
                            'label' => 'Volume in milliliters',
                            'type' => 'number',
                            'unit' => '188',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'butterStick=butterTbsp',
            'results' => ['butterStick' => 'butterTbsp', 'butterTbsp' => 'butterStick'],
        ],
        [
            'title' => 'butterStick=butterCup',
            'results' => ['butterCup' => 'butterStick', 'butterStick' => 'butterCup'],
        ],
        [
            'title' => 'butterStick=butterOz',
            'results' => ['butterOz' => 'butterStick', 'butterStick' => 'butterOz'],
        ],
        [
            'title' => 'butterStick=butterGram',
            'results' => ['butterGram' => 'butterStick', 'butterStick' => 'butterGram'],
        ],
        [
            'title' => 'butterStick=butterPounds',
            'results' => ['butterStick' => 'butterPounds', 'butterPounds' => 'butterStick'],
        ],
        [
            'title' => 'butterStick=butterMillili',
            'results' => ['butterStick' => 'butterMillili', 'butterMillili' => 'butterStick'],
        ],
        [
            'title' => 'butterStick=butterTsp',
            'results' => ['butterTsp' => 'butterStick', 'butterStick' => 'butterTsp'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Butter works out Weight in sticks and Volume in cups from Volume in tablespoons. Nothing is looked up on this page: weight in sticks is computed from volume in tablespoons and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Weight in sticks is opened in sticks; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Butter calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Butter: it takes 1 number and reports Weight in sticks, Volume in cups and Weight in grams.</p><p>Written with the labels from the form, Weight in sticks = Volume in tablespoons.</p><p>The answers are Weight in sticks, Volume in cups, Weight in grams and Volume in teaspoons; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Volume in tablespoons</strong> — in tablespoons</li></ul><p>The result boxes are Weight in sticks in sticks, Volume in cups in cups, Weight in grams in grams, Volume in teaspoons in teaspoons, Weight in ounces in ounces, Weight in pounds in pounds, Volume in milliliters in milliliters; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Volume in tablespoons = 10 tbsp; the answers are <strong>Weight in sticks</strong> = 10 sticks, <strong>Volume in cups</strong> = 10 cups, <strong>Weight in ounces</strong> = 10 oz, <strong>Weight in grams</strong> = 10 g, <strong>Weight in pounds</strong> = 10 pounds, <strong>Volume in milliliters</strong> = 10 ml and <strong>Volume in teaspoons</strong> = 10 tsp.</p><ul><li><strong>Weight in sticks</strong> = 10 sticks</li><li><strong>Volume in cups</strong> = 10 cups</li><li><strong>Weight in ounces</strong> = 10 oz</li><li><strong>Weight in grams</strong> = 10 g</li><li><strong>Weight in pounds</strong> = 10 pounds</li><li><strong>Volume in milliliters</strong> = 10 ml</li><li><strong>Volume in teaspoons</strong> = 10 tsp</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Weight in sticks</strong> = <code>Volume in tablespoons</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Weight in sticks</strong> = 10, <strong>Volume in cups</strong> = 10, <strong>Weight in ounces</strong> = 10, <strong>Weight in grams</strong> = 10, <strong>Weight in pounds</strong> = 10, <strong>Volume in milliliters</strong> = 10 and <strong>Volume in teaspoons</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Weight in sticks lists 8 options and opens on sticks. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Weight in sticks</strong> = <code>Volume in tablespoons</code></li><li><strong>Volume in tablespoons</strong> = <code>Weight in sticks</code></li><li><strong>Volume in cups</strong> = <code>Weight in sticks</code></li><li><strong>Weight in ounces</strong> = <code>Weight in sticks</code></li><li><strong>Weight in grams</strong> = <code>Weight in sticks</code></li><li><strong>Weight in pounds</strong> = <code>Weight in sticks</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Weight in sticks</strong> = <code>Volume in tablespoons</code> — the form to use when Volume in tablespoons are the values you have.</li><li><strong>Volume in tablespoons</strong> = <code>Weight in sticks</code> — the form to use when Weight in sticks are the values you have.</li><li><strong>Weight in sticks</strong> = <code>Volume in cups</code> — the form to use when Volume in cups are the values you have.</li><li><strong>Volume in cups</strong> = <code>Weight in sticks</code> — the form to use when Weight in sticks are the values you have.</li><li><strong>Weight in sticks</strong> = <code>Weight in ounces</code> — the form to use when Weight in ounces are the values you have.</li><li><strong>Weight in ounces</strong> = <code>Weight in sticks</code> — the form to use when Weight in sticks are the values you have.</li><li><strong>Weight in sticks</strong> = <code>Weight in grams</code> — the form to use when Weight in grams are the values you have.</li><li><strong>Weight in grams</strong> = <code>Weight in sticks</code> — the form to use when Weight in sticks are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Weight in sticks, Volume in tablespoons and Volume in cups can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Volume in tablespoons, from 10 to 20 — and the answers go from <strong>Weight in sticks</strong> 10 sticks, <strong>Volume in cups</strong> 10 cups, <strong>Weight in ounces</strong> 10 oz, <strong>Weight in grams</strong> 10 g, <strong>Weight in pounds</strong> 10 pounds, <strong>Volume in milliliters</strong> 10 ml and <strong>Volume in teaspoons</strong> 10 tsp to <strong>Weight in sticks</strong> 20 sticks, <strong>Volume in cups</strong> 20 cups, <strong>Weight in ounces</strong> 20 oz, <strong>Weight in grams</strong> 20 g, <strong>Weight in pounds</strong> 20 pounds, <strong>Volume in milliliters</strong> 20 ml and <strong>Volume in teaspoons</strong> 20 tsp.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Volume in tablespoons carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Weight in sticks, Volume in cups and Weight in grams are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Volume in tablespoons left as a guess.</strong> Anything typed into Volume in tablespoons is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> If Volume in tablespoons is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Volume in tablespoons</strong> is a tablespoons quantity: the page opens it in tbsp and converts anything else you pick before the formula runs. The page reads it when it works out Weight in sticks. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Weight in sticks</strong> is a sticks figure and the page's own defaults put it at 10 sticks. The value follows from Volume in tablespoons. </li><li><strong>Volume in cups</strong> is a cups figure and the page's own defaults put it at 10 cups. The value follows from Weight in sticks. </li><li><strong>Weight in grams</strong> is a grams figure and the page's own defaults put it at 10 g. The value follows from Weight in sticks. </li><li><strong>Volume in teaspoons</strong> is a teaspoons figure and the page's own defaults put it at 10 tsp. The value follows from Weight in sticks. </li><li><strong>Weight in ounces</strong> is a ounces figure and the page's own defaults put it at 10 oz. The value follows from Weight in sticks. </li><li><strong>Weight in pounds</strong> is a pounds figure and the page's own defaults put it at 10 pounds. The value follows from Weight in sticks. </li><li><strong>Volume in milliliters</strong> is a milliliters figure and the page's own defaults put it at 10 ml. The value follows from Weight in sticks. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Weight in sticks</th><th>Volume in cups</th><th>Weight in ounces</th><th>Weight in grams</th><th>Weight in pounds</th><th>Volume in milliliters</th><th>Volume in teaspoons</th></tr></thead><tbody><tr><td><strong>Volume in tablespoons</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Volume in tablespoons: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. </p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>sticks</strong> — opens in <em>sticks</em>, and the chip also carries cups, tbsp, g, tsp, oz and lb. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Weight in sticks is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover sticks. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Volume in tablespoons is what you already know and Weight in sticks and Volume in cups is what you need — the reverse of that situation is what the rearranged form is for.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/oil-to-butter">Oil to butter</a>, <a href="/food/grams-to-cups">Grams to cups</a> and <a href="/food/cooking-measurement">Cooking measurement</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Butter calculator work out?', 'a' => <<<'TXT'
            Weight in sticks, Volume in cups, Weight in grams and Volume in teaspoons, from Volume in tablespoons. The relationship is Weight in sticks = Volume in tablespoons.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Volume in tablespoons (tablespoons). Enter volume in tablespoons; Weight in sticks is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Weight in sticks, Volume in tablespoons, Volume in cups and Weight in ounces can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'Are the Butter results exact?', 'a' => 'The arithmetic follows the selected ingredient and units, but density, packing and product size can vary. Check the ingredient match and weigh it when a recipe needs precision.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Weight in sticks is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Volume in tablespoons left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Weight in sticks keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/oil-to-butter', 'name' => 'Oil to butter'],
            ['path' => '/food/grams-to-cups', 'name' => 'Grams to cups'],
            ['path' => '/food/cooking-measurement', 'name' => 'Cooking measurement']
        ],
    ],
];
