<?php

/**
 * Oil to butter
 * /food/oil-to-butter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Oil to butter',
    'meta' => ['title' => 'Oil to butter Calculator — Formula & Results', 'description' => 'Convert a recipe amount of oil to a butter or margarine equivalent, including mass or volume. Check the ingredient, packing and units before using the result.', 'h1' => 'Oil to butter Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Oil to butter',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oil',
                            'label' => 'Liquid cooking oil',
                            'type' => 'number',
                            'unit' => '188',
                            'unit_default' => 'g',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butter',
                            'label' => 'Butter / margarine',
                            'type' => 'number',
                            'unit' => '188',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Coconut oil conversion',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coconut_oil_mass',
                            'label' => 'Mass',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coconut_oil_volume',
                            'label' => 'Volume',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'oil=0.75*butter',
            'results' => ['butter' => '(4/3)*oil', 'oil' => '(3/4)*butter'],
        ],
        [
            'title' => 'coconut_oil_mass=0.8*butter',
            'results' => ['butter' => '(5/4)*coconut_oil_mass', 'coconut_oil_mass' => '(4/5)*butter'],
        ],
        [
            'title' => 'coconut_oil_volume=0.75*butter',
            'results' => ['butter' => '(4/3)*coconut_oil_volume', 'coconut_oil_volume' => '(3/4)*butter'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Oil to butter turns Butter / margarine into Liquid cooking oil and Mass. There is no hidden constant here: change liquid cooking oil and butter / margarine moves with it. The main result, Liquid cooking oil, is reported in grams.
        TXT,
        'sections' => [
            ['title' => 'How the Oil to butter calculator works', 'html' => <<<'TXT'
            <p>Oil to butter answers one question from 1 number, and the answer is Liquid cooking oil, Mass and Volume.</p><p>The relationship it solves reads Liquid cooking oil = (3 ÷ 4) × Butter / margarine.</p><p>The result panel carries Liquid cooking oil, Mass and Volume, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Butter / margarine</strong> — in grams</li></ul><p>What you get back is Liquid cooking oil in grams, Mass in grams, Volume in milliliters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Butter / margarine = 10 g gives <strong>Liquid cooking oil</strong> = 7.5 g, <strong>Mass</strong> = 8 g and <strong>Volume</strong> = 7.5 ml.</p><ul><li><strong>Liquid cooking oil</strong> = 7.5 g</li><li><strong>Mass</strong> = 8 g</li><li><strong>Volume</strong> = 7.5 ml</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Liquid cooking oil</strong> = <code>(3 ÷ 4) × Butter / margarine</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Liquid cooking oil</strong> = 7.5, <strong>Mass</strong> = 8 and <strong>Volume</strong> = 7.5 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Liquid cooking oil offers 8 units and opens on grams, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Liquid cooking oil</strong> = <code>(3 ÷ 4) × Butter / margarine</code></li><li><strong>Butter / margarine</strong> = <code>(4 ÷ 3) × Liquid cooking oil</code></li><li><strong>Mass</strong> = <code>(4 ÷ 5) × Butter / margarine</code></li><li><strong>Volume</strong> = <code>(3 ÷ 4) × Butter / margarine</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Liquid cooking oil</strong> = <code>(3 ÷ 4) × Butter / margarine</code> — the form to use when Butter / margarine are the values you have.</li><li><strong>Butter / margarine</strong> = <code>(4 ÷ 3) × Liquid cooking oil</code> — the form to use when Liquid cooking oil are the values you have.</li><li><strong>Mass</strong> = <code>(4 ÷ 5) × Butter / margarine</code> — the form to use when Butter / margarine are the values you have.</li><li><strong>Butter / margarine</strong> = <code>(5 ÷ 4) × Mass</code> — the form to use when Mass are the values you have.</li><li><strong>Volume</strong> = <code>(3 ÷ 4) × Butter / margarine</code> — the form to use when Butter / margarine are the values you have.</li><li><strong>Butter / margarine</strong> = <code>(4 ÷ 3) × Volume</code> — the form to use when Volume are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Liquid cooking oil, Butter / margarine and Mass can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Butter / margarine from 10 to 20, leaving every other box alone. The panel moves from <strong>Liquid cooking oil</strong> 7.5 g, <strong>Mass</strong> 8 g and <strong>Volume</strong> 7.5 ml to <strong>Liquid cooking oil</strong> 15 g, <strong>Mass</strong> 16 g and <strong>Volume</strong> 15 ml.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Butter / margarine is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Liquid cooking oil, Mass and Volume are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Butter / margarine left as a guess.</strong> If Butter / margarine is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Butter / margarine and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Butter / margarine</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Change it and Liquid cooking oil, Mass and Volume changes with it. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Liquid cooking oil</strong> is a grams figure and the page's own defaults put it at 7.5 g. It is computed from Butter / margarine, so it changes the moment any of them does. </li><li><strong>Mass</strong> is a grams figure and the page's own defaults put it at 8 g. It is computed from Butter / margarine, so it changes the moment any of them does. </li><li><strong>Volume</strong> is a milliliters figure and the page's own defaults put it at 7.5 ml. It is computed from Butter / margarine, so it changes the moment any of them does. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Liquid cooking oil</th><th>Mass</th><th>Volume</th></tr></thead><tbody><tr><td><strong>Butter / margarine</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Butter / margarine sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Butter / margarine = 5 g, the answer is <strong>Liquid cooking oil</strong> = 3.75 g, <strong>Mass</strong> = 4 g and <strong>Volume</strong> = 3.75 ml.</li><li>With Butter / margarine = 30 g, the answer is <strong>Liquid cooking oil</strong> = 22.5 g, <strong>Mass</strong> = 24 g and <strong>Volume</strong> = 22.5 ml.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>grams</strong> — opens in <em>g</em>, and the chip also carries cups, tbsp, g, tsp, oz and lb. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>grams</strong> — opens in <em>g</em>, and the chip also carries g, mg, lb, oz and st. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>milliliters</strong> — opens in <em>ml</em>, and the chip also carries US tbsp, ml, US cups, pinches, US fl oz and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Liquid cooking oil follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover grams and milliliters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Butter / margarine measured, Liquid cooking oil and Mass wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/butter">Butter</a>, <a href="/food/cooking-measurement">Cooking measurement</a> and <a href="/food/grams-to-cups">Grams to cups</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Oil to butter calculator work out?', 'a' => 'Liquid cooking oil, Mass and Volume, from Butter / margarine. The relationship is Liquid cooking oil = (3 ÷ 4) × Butter / margarine.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Butter / margarine (grams). With butter / margarine in place, Liquid cooking oil can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Liquid cooking oil, Butter / margarine, Mass and Volume can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'Are the Oil to butter results exact?', 'a' => 'The arithmetic follows the selected ingredient and units, but density, packing and product size can vary. Check the ingredient match and weigh it when a recipe needs precision.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Liquid cooking oil is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Butter / margarine left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Liquid cooking oil keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/butter', 'name' => 'Butter'],
            ['path' => '/food/cooking-measurement', 'name' => 'Cooking measurement'],
            ['path' => '/food/grams-to-cups', 'name' => 'Grams to cups']
        ],
    ],
];
