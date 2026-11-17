<?php

/**
 * Popcorn
 * /food/popcorn
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Popcorn',
    'meta' => ['title' => 'Popcorn Calculator: Formula, Steps & Examples', 'description' => 'Estimate popcorn quantities from guest count and portion size. Serving needs vary with appetite, snacks and event length, so use the result as a starting point.', 'h1' => 'Popcorn Calculator', 'updated' => '2026-07-30'],
    'sections' => [
        [
            'title' => 'Estimate how much popcorn you need',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people',
                            'label' => 'I\'m serving',
                            'type' => 'number',
                            'suffix' => 'people',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'portion_size',
                            'label' => 'Portion size',
                            'type' => 'select',
                            'options' => ['Standard portion' => '2', 'Small (movie theater size)' => '8', 'Medium (movie theater size)' => '12', 'Large (movie theater size)' => '18'],
                            'default' => 'Standard portion',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'popcorn',
                            'label' => 'Cups of popcorn ',
                            'type' => 'number',
                            'unit' => '88',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kernels',
                            'label' => 'Kernels needed ',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Calories per serving',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flavor',
                            'label' => 'Flavor',
                            'type' => 'select',
                            'options' => [
                                'Air-popped popcorn' => '31',
                                'Oil-popped popcorn' => '40',
                                'Microwave - butter flavor' => '43',
                                'Microwave - cheddar flavor' => '42',
                                'Movie theater - butter flavor' => '58',
                                'Movie theater - caramel corn' => '131',
                            ],
                            'dataset' => 'Popcorn flavor',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calories',
                            'label' => 'Calories',
                            'type' => 'number',
                            'suffix' => 'kcal/portion',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'popcorn = portion_size',
            'results' => ['portion_size' => 'popcorn', 'popcorn' => 'portion_size'],
        ],
        [
            'title' => 'kernels = people*popcorn/(2*0.9)',
            'results' => ['kernels' => '(5/9)*people*popcorn', 'popcorn' => '(9/5)*kernels/people', 'people' => '(9/5)*kernels/popcorn'],
        ],
        [
            'title' => 'calories = popcorn*flavor',
            'results' => ['flavor' => 'calories/popcorn', 'popcorn' => 'calories/flavor', 'calories' => 'flavor*popcorn'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Popcorn works out I'm serving and Cups of popcorn from Portion size. It is a single relationship that reads i'm serving out of portion size, not a table of canned results keyed by them. Units for I'm serving default to people and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Popcorn calculator works', 'html' => <<<'TXT'
            <p>The Popcorn calculator applies one relationship to 1 number and reports I&#039;m serving, Cups of popcorn and Kernels needed.</p><p>Written with the labels from the form, Cups of popcorn = Portion size.</p><p>The answers are I&#039;m serving, Cups of popcorn, Kernels needed and Flavor; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Portion size</strong> — a plain number, no unit</li></ul><p>The answers come back as I&#039;m serving in people, Cups of popcorn in 1 cup (~237 ml), Kernels needed in tablespoons (15 ml), Flavor, Calories in kcal/portion. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — I&amp;#039;m serving = 10 people, Portion size = 2, Kernels needed = 100 tbsp and Calories = 1000 kcal/portion — through the same formula and the panel reports <strong>Cups of popcorn</strong> = 2 cups and <strong>Flavor</strong> = 500.</p><ul><li><strong>Cups of popcorn</strong> = 2 cups</li><li><strong>Flavor</strong> = 500</li></ul><p>The line behind those figures is <strong>Cups of popcorn</strong> = <code>Portion size</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Cups of popcorn</strong> = 2 and <strong>Flavor</strong> = 500. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Cups of popcorn lists 4 options and opens on 1 cup (~237 ml). </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cups of popcorn</strong> = <code>Portion size</code></li><li><strong>Portion size</strong> = <code>Cups of popcorn</code></li><li><strong>Kernels needed</strong> = <code>(5 ÷ 9) × I&#039;m serving × Cups of popcorn</code></li><li><strong>I&#039;m serving</strong> = <code>(9 ÷ 5) × Kernels needed ÷ Cups of popcorn</code></li><li><strong>Calories</strong> = <code>Flavor × Cups of popcorn</code></li><li><strong>Flavor</strong> = <code>Calories ÷ Cups of popcorn</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Cups of popcorn</strong> = <code>Portion size</code> — the form to use when Portion size are the values you have.</li><li><strong>Portion size</strong> = <code>Cups of popcorn</code> — the form to use when Cups of popcorn are the values you have.</li><li><strong>Kernels needed</strong> = <code>(5 ÷ 9) × I&#039;m serving × Cups of popcorn</code> — the form to use when I&#039;m serving and Cups of popcorn are the values you have.</li><li><strong>Cups of popcorn</strong> = <code>(9 ÷ 5) × Kernels needed ÷ I&#039;m serving</code> — the form to use when Kernels needed and I&#039;m serving are the values you have.</li><li><strong>I&#039;m serving</strong> = <code>(9 ÷ 5) × Kernels needed ÷ Cups of popcorn</code> — the form to use when Kernels needed and Cups of popcorn are the values you have.</li><li><strong>Calories</strong> = <code>Flavor × Cups of popcorn</code> — the form to use when Flavor and Cups of popcorn are the values you have.</li><li><strong>Flavor</strong> = <code>Calories ÷ Cups of popcorn</code> — the form to use when Calories and Cups of popcorn are the values you have.</li><li><strong>Cups of popcorn</strong> = <code>Calories ÷ Flavor</code> — the form to use when Calories and Flavor are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cups of popcorn, Portion size and Kernels needed can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double I&#039;m serving from 10 to 20, leaving every other box alone. The panel moves from <strong>Cups of popcorn</strong> 2 cups and <strong>Flavor</strong> 500 to <strong>Cups of popcorn</strong> 2 cups and <strong>Flavor</strong> 500.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> I&#039;m serving, Cups of popcorn and Kernels needed are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Portion size left as a guess.</strong> Anything typed into Portion size is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Portion size and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Portion size</strong> takes a plain number with no unit attached. It feeds Cups of popcorn. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>I&#039;m serving</strong> is a plain number. The value follows from Kernels needed and Cups of popcorn. </li><li><strong>Cups of popcorn</strong> is a 1 cup (~237 ml) figure and the page's own defaults put it at 2 cups. The value follows from Portion size. </li><li><strong>Kernels needed</strong> is a tablespoons (15 ml) figure. The value follows from I'm serving and Cups of popcorn. </li><li><strong>Flavor</strong> is a plain number and the page's own defaults put it at 500. The value follows from Calories and Cups of popcorn. </li><li><strong>Calories</strong> is a plain number. The value follows from Flavor and Cups of popcorn. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cups of popcorn</th><th>Flavor</th></tr></thead><tbody><tr><td><strong>I&#039;m serving</strong> +10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Portion size</strong> +10%</td><td>+10%</td><td>-9.09%</td></tr><tr><td><strong>Kernels needed</strong> +10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Calories</strong> +10%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Portion size: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, I&#039;m serving and Kernels needed barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With I&#039;m serving = 5 people, Portion size = 1, Kernels needed = 50 tbsp and Calories = 500 kcal/portion, the answer is <strong>Cups of popcorn</strong> = 1 cups and <strong>Flavor</strong> = 500.</li><li>With I&#039;m serving = 30 people, Portion size = 2, Kernels needed = 100 tbsp and Calories = 1000 kcal/portion, the answer is <strong>Cups of popcorn</strong> = 2 cups and <strong>Flavor</strong> = 500.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>1 cup (~237 ml)</strong> — opens in <em>cups</em>, and the chip also carries small bags, large bags and medium bags. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>tablespoons (15 ml)</strong> — opens in <em>tbsp</em>, and the chip also carries US tbsp, ml, US cups, pinches, US fl oz and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind I&#039;m serving is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are 1 cup (~237 ml) and tablespoons (15 ml) and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Portion size are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Portion size is what you already know and I&#039;m serving and Cups of popcorn is what you need — the reverse of that situation is what the rearranged form is for.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/party-drink">Party drink</a>, <a href="/food/donut">Donut</a> and <a href="/food/thanksgiving">Thanksgiving</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Popcorn calculator work out?', 'a' => 'I\'m serving, Cups of popcorn, Kernels needed and Flavor, from Portion size. The relationship is Cups of popcorn = Portion size.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Portion size. With portion size in place, I\'m serving can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Cups of popcorn, Portion size, Kernels needed and I'm serving can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'Are the Popcorn results exact?', 'a' => 'It uses the values and assumptions represented in the form. Real ingredients and conditions can vary, so check units and follow the recipe, product label or safety instructions that apply.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of I\'m serving is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Portion size left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. I\'m serving keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/party-drink', 'name' => 'Party drink'],
            ['path' => '/food/donut', 'name' => 'Donut'],
            ['path' => '/food/thanksgiving', 'name' => 'Thanksgiving']
        ],
    ],
];
