<?php

/**
 * How much ham per person
 * /food/how-much-ham-per-person
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'How much ham per person',
    'meta' => ['title' => 'How much ham per person Calculator: Free, With Steps', 'description' => 'Estimate how much ham to buy from guest count and serving needs. Appetite, bone-in weight and side dishes change portions, so allow a buffer for your meal.', 'h1' => 'How much ham per person Calculator', 'updated' => '2026-07-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people',
                            'label' => 'No. of people',
                            'type' => 'number',
                            'suffix' => '#',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hamType',
                            'label' => 'Type of ham:',
                            'type' => 'select',
                            'options' => ['Boneless' => '0.45', 'Bone-in' => '0.65'],
                            'dataset' => 'Hamtype',
                            'default' => 'Boneless',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amountOfHamNeeded',
                            'label' => 'Amount of ham needed',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'people * hamType = amountOfHamNeeded',
            'results' => ['people' => 'amountOfHamNeeded/hamType', 'hamType' => 'amountOfHamNeeded/people', 'amountOfHamNeeded' => 'hamType*people'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        How much ham per person takes Type of ham and Amount of ham needed and returns No. of people. It is a single relationship that reads no. of people out of type of ham, not a table of canned results keyed by them. Units for No. of people default to # and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the How much ham per person calculator works', 'html' => <<<'TXT'
            <p>The How much ham per person calculator applies one relationship to 2 numbers and reports No. of people.</p><p>In the form&#039;s own words, No. of people = Amount of ham needed ÷ Type of ham:.</p><p>What comes back is No. of people — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Type of ham</strong> — a plain number, no unit</li><li><strong>Amount of ham needed</strong> — in kilograms</li></ul><p>The result box is No. of people in #. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Type of ham = 0.45 and Amount of ham needed = 10 kg — through the same formula and the panel reports <strong>No. of people</strong> = 22.22 #.</p><ul><li><strong>No. of people</strong> = 22.22 #</li></ul><p>That is <strong>No. of people</strong> = <code>Amount of ham needed ÷ Type of ham:</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>No. of people</strong> = 22.22 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Amount of ham needed offers 7 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>No. of people</strong> = <code>Amount of ham needed ÷ Type of ham:</code></li><li><strong>Type of ham</strong> = <code>Amount of ham needed ÷ No. of people</code></li><li><strong>Amount of ham needed</strong> = <code>Type of ham: × No. of people</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>No. of people</strong> = <code>Amount of ham needed ÷ Type of ham:</code> — the form to use when Amount of ham needed and Type of ham are the values you have.</li><li><strong>Type of ham</strong> = <code>Amount of ham needed ÷ No. of people</code> — the form to use when Amount of ham needed and No. of people are the values you have.</li><li><strong>Amount of ham needed</strong> = <code>Type of ham: × No. of people</code> — the form to use when Type of ham and No. of people are the values you have.</li></ul><p>Any one of No. of people, Type of ham and Amount of ham needed can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Type of ham: from 0.45 to 0.9, leaving every other box alone. The panel moves from <strong>No. of people</strong> 22.22 # to <strong>No. of people</strong> 11.11 #.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Amount of ham needed is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with No. of people is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Type of ham left as a guess.</strong> If Type of ham is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Amount of ham needed left as a guess.</strong> If Amount of ham needed is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Type of ham: and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the How much ham per person form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Type of ham</strong> takes a plain number with no unit attached. Change it and No. of people and Amount of ham needed changes with it. Fill it from a measurement rather than a memory — Type of ham is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Amount of ham needed</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. Change it and No. of people and Type of ham changes with it. Fill it from a measurement rather than a memory — Amount of ham needed is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>No. of people</strong> is a plain number and the page's own defaults put it at 22.22. It is computed from Amount of ham needed and Type of ham, so it changes the moment any of them does. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>No. of people</th></tr></thead><tbody><tr><td><strong>Type of ham</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Amount of ham needed</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Amount of ham needed sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Type of ham = 0.225 and Amount of ham needed = 5 kg and the page reports <strong>No. of people</strong> = 22.22 #.</li><li>Feed in Type of ham = 1.35 and Amount of ham needed = 10 kg and the page reports <strong>No. of people</strong> = 7.41 #.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on How much ham per person actually offers.</p><ul><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> No. of people follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Type of ham and Amount of ham needed are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Type of ham and Amount of ham needed and the number you are missing is No. of people.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/ham-cooking">Ham cooking time</a>, <a href="/food/turkey-size">Turkey size</a> and <a href="/food/thanksgiving">Thanksgiving</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from How much ham per person is a number to act on, so the useful question is what to do with No. of people (#) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> Write down Type of ham and Amount of ham needed alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the How much ham per person calculator work out?', 'a' => 'No. of people, from Amount of ham needed and Type of ham. The relationship is No. of people = Amount of ham needed ÷ Type of ham:.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Type of ham, Amount of ham needed (kilograms). With type of ham and amount of ham needed in place, No. of people can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of No. of people, Type of ham and Amount of ham needed blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'Are the How much ham per person results exact?', 'a' => 'It uses the values and assumptions represented in the form. Real ingredients and conditions can vary, so check units and follow the recipe, product label or safety instructions that apply.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally No. of people is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Type of ham: blank and the page solves for it, reporting No. of people instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. No. of people keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/ham-cooking', 'name' => 'Ham cooking time'],
            ['path' => '/food/turkey-size', 'name' => 'Turkey size'],
            ['path' => '/food/thanksgiving', 'name' => 'Thanksgiving']
        ],
    ],
];
