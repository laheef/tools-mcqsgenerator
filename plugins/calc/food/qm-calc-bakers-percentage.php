<?php

/**
 * Baker's percentage
 * /food/bakers-percentage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Baker\'s percentage',
    'meta' => ['title' => 'Baker\'s percentage — Free Online Calculator', 'description' => 'Calculate baker’s percentages from ingredient weight and total flour weight, or solve for a missing amount. Use as a guide.', 'h1' => 'Baker\'s percentage Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ingredient_weight',
                            'label' => 'Ingredient weight',
                            'type' => 'number',
                            'help' => 'The weight of the ingredient that you\'ll use alongside flour in your baking recipe.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_flour',
                            'label' => 'Total flour weight',
                            'type' => 'number',
                            'help' => 'The total weight of the flour you\'ll be using in your baking recipe.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bakers_percentage',
                            'label' => 'Baker\'s percentage ‍',
                            'type' => 'number',
                            'help' => 'The ratio of the ingredient\'s mass to the flour\'s mass, expressed as a percentage.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'bakers_percentage = ingredient_weight/total_flour',
            'results' => ['bakers_percentage' => 'ingredient_weight/total_flour', 'total_flour' => 'ingredient_weight/bakers_percentage', 'ingredient_weight' => 'bakers_percentage*total_flour'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Baker's percentage turns Ingredient weight and Total flour weight into Baker's percentage ‍. It is a single relationship that reads baker's percentage ‍ out of ingredient weight, not a table of canned results keyed by them. Units for Baker's percentage ‍ default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Baker\'s percentage calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Baker&#039;s percentage: it takes 2 numbers and reports Baker&#039;s percentage ‍.</p><p>In the form&#039;s own words, Baker&#039;s percentage ‍ = Ingredient weight ÷ Total flour weight.</p><p>The result panel carries Baker&#039;s percentage ‍, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Ingredient weight</strong> — in grams. The weight of the ingredient that you&#039;ll use alongside flour in your baking recipe.</li><li><strong>Total flour weight</strong> — in grams. The total weight of the flour you&#039;ll be using in your baking recipe.</li></ul><p>What you get back is Baker&#039;s percentage ‍ in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Ingredient weight = 10 g and Total flour weight = 100 g gives <strong>Baker&amp;#039;s percentage ‍</strong> = 0.1 perc.</p><ul><li><strong>Baker&#039;s percentage ‍</strong> = 0.1 perc</li></ul><p>The line behind those figures is <strong>Baker&#039;s percentage ‍</strong> = <code>Ingredient weight ÷ Total flour weight</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Baker&amp;#039;s percentage ‍</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Baker&#039;s percentage ‍ offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Baker&#039;s percentage ‍</strong> = <code>Ingredient weight ÷ Total flour weight</code></li><li><strong>Total flour weight</strong> = <code>Ingredient weight ÷ Baker&#039;s percentage ‍</code></li><li><strong>Ingredient weight</strong> = <code>Baker&#039;s percentage ‍ × Total flour weight</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Baker&#039;s percentage ‍</strong> = <code>Ingredient weight ÷ Total flour weight</code> — the form to use when Ingredient weight and Total flour weight are the values you have.</li><li><strong>Total flour weight</strong> = <code>Ingredient weight ÷ Baker&#039;s percentage ‍</code> — the form to use when Ingredient weight and Baker&#039;s percentage ‍ are the values you have.</li><li><strong>Ingredient weight</strong> = <code>Baker&#039;s percentage ‍ × Total flour weight</code> — the form to use when Baker&#039;s percentage ‍ and Total flour weight are the values you have.</li></ul><p>Any one of Baker&#039;s percentage ‍, Total flour weight and Ingredient weight can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Ingredient weight from 10 to 20, leaving every other box alone. The panel moves from <strong>Baker&amp;#039;s percentage ‍</strong> 0.1 perc to <strong>Baker&amp;#039;s percentage ‍</strong> 0.2 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Ingredient weight and Total flour weight is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Baker&#039;s percentage ‍ is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Ingredient weight left as a guess.</strong> If Ingredient weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total flour weight left as a guess.</strong> If Total flour weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Convert Ingredient weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Baker&#039;s percentage form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Ingredient weight</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. The weight of the ingredient that you&#039;ll use alongside flour in your baking recipe. Change it and Baker's percentage ‍ and Total flour weight changes with it. Fill it from a measurement rather than a memory — Ingredient weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total flour weight</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. The total weight of the flour you&#039;ll be using in your baking recipe. Change it and Baker's percentage ‍ and Ingredient weight changes with it. Fill it from a measurement rather than a memory — Total flour weight is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Baker&#039;s percentage ‍</strong> is a percent figure and the page's own defaults put it at 0.1 perc. The value follows from Ingredient weight and Total flour weight. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Baker&#039;s percentage ‍</th></tr></thead><tbody><tr><td><strong>Ingredient weight</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Total flour weight</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Ingredient weight sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Ingredient weight = 5 g and Total flour weight = 50 g and the page reports <strong>Baker&#039;s percentage ‍</strong> = 0.1 perc.</li><li>Feed in Ingredient weight = 30 g and Total flour weight = 100 g and the page reports <strong>Baker&#039;s percentage ‍</strong> = 0.3 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Baker&#039;s percentage actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>grams</strong> — opens in <em>g</em>, and the chip also carries g, mg, lb, oz and st. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Baker&#039;s percentage ‍ follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent and grams. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Ingredient weight and Total flour weight is what you already know and Baker&#039;s percentage ‍ is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/sourdough">Sourdough</a>, <a href="/food/self-rising-flour">Self-rising flour</a> and <a href="/food/perfect-pizza">Pizza baking</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Baker\'s percentage calculator work out?', 'a' => 'Baker\'s percentage ‍, from Ingredient weight and Total flour weight. The relationship is Baker\'s percentage ‍ = Ingredient weight ÷ Total flour weight.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Ingredient weight (grams), Total flour weight (grams). Enter ingredient weight and total flour weight; Baker's percentage ‍ is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Baker's percentage ‍, Total flour weight and Ingredient weight blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'Are the Baker\'s percentage results exact?', 'a' => 'It uses the values and assumptions represented in the form. Real ingredients and conditions can vary, so check units and follow the recipe, product label or safety instructions that apply.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Baker\'s percentage ‍ is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Ingredient weight blank and the page solves for it, reporting Baker\'s percentage ‍ instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Baker\'s percentage ‍ at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/food/sourdough', 'name' => 'Sourdough'],
            ['path' => '/food/self-rising-flour', 'name' => 'Self-rising flour'],
            ['path' => '/food/perfect-pizza', 'name' => 'Pizza baking']
        ],
    ],
];
